<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// JHtml::_('behavior.caption');

$doc   = JFactory::getDocument();
$tmpl  = JFactory::getApplication()->getTemplate();
JHtml::_('jquery.framework');
// $doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/masonry/masonry.min.js');
// $doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/masonry/lazyload.min.js');
$doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/isotope/isotope.min.js');

$doc->addScriptDeclaration("
	jQuery(document).ready(function($){
		if($('.items-leading.grid').length){

			var grid = $('.grid').isotope({
			  // set itemSelector so .grid-sizer is not used in layout
			  itemSelector: '.grid-item',
			  percentPosition: true,
			  masonry: {
			    // use element for option
			    columnWidth: '.grid-sizer'
			  }
			})

			// filter items on button click
			$('.cat-navbar').on( 'click', 'a', function() {
			  var filterValue = $(this).attr('data-filter');
			  grid.isotope({ filter: filterValue });
			});

			// change is-checked class on buttons
			$('.cat-navbar').each( function( i, buttonGroup ) {
			  var buttonGroup = $( buttonGroup );
			  buttonGroup.on( 'click', 'a', function() {
			    buttonGroup.find('.is-checked').removeClass('is-checked');
			    $( this ).addClass('is-checked');
			  });
			});

		}

	})
");

$dispatcher = JEventDispatcher::getInstance();

$this->category->text = $this->category->description;
$dispatcher->trigger('onContentPrepare', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$this->category->description = $this->category->text;

$results = $dispatcher->trigger('onContentAfterTitle', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayTitle = trim(implode("\n", $results));

$results = $dispatcher->trigger('onContentBeforeDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$beforeDisplayContent = trim(implode("\n", $results));

$results = $dispatcher->trigger('onContentAfterDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayContent = trim(implode("\n", $results));

?>
<section class="wrapper blog-view bg-light">
	<div class="container blog <?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Blog">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg">
				<?php if ($this->params->def('show_description_image', 1) && $this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
					<?php echo JLayoutHelper::render('joomla.content.cover_image', array('image' => $this->category->getParams()->get('image'), 'alt' => htmlspecialchars($this->category->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'))); ?>
				<?php endif; ?>
				<?php if ($this->params->get('show_page_heading')) : ?>
					<?php echo JLayoutHelper::render('joomla.content.title.title_heading', $this->escape($this->params->get('page_heading'))) ?>
				<?php endif; ?>
				<?php if ($this->params->get('show_category_title', 1)) : ?>
					<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->category->title) ?>
				<?php endif; ?>
				<?php if ($this->params->get('page_subheading')) : ?>
					<?php echo JLayoutHelper::render('joomla.content.title.subtitle', $this->escape($this->params->get('page_subheading'))) ?>
				<?php endif; ?>
				<?php echo $afterDisplayTitle; ?>

				<div class="cat-navbar inline-menu">
					<?php if ($this->maxLevel != 0 && count($this->children[$this->category->id]) > 0) : ?>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a class="nav-link is-checked" data-filter="*" title="Tutti">
									<i class="fal fa-sync-alt"></i>
								</a>
							</li>
							<?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
								<?php if ($this->params->get('show_empty_categories') || $child->numitems || count($child->getChildren())) : ?>
									<li class="list-inline-item">
										<a class="nav-link" data-filter=".<?= $child->alias ?>" title="<?php echo $this->escape($child->title); ?>">
											<?php echo $this->escape($child->title); ?>
										</a>
									</li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>

				<?php if ($beforeDisplayContent || $afterDisplayContent || $this->params->get('show_description', 1)) : ?>
					<div class="category-desc clearfix">
						<?php echo $beforeDisplayContent; ?>
						<?php if ($this->params->get('show_description') && $this->category->description) : ?>
							<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
						<?php endif; ?>
						<?php echo $afterDisplayContent; ?>
					</div>
				<?php endif; ?>

				<?php if ($this->params->get('show_cat_tags', 1) && !empty($this->category->tags->itemTags)) : ?>
					<?php $this->category->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
					<?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
				<?php endif; ?>

				<?php if (empty($this->lead_items) && empty($this->link_items) && empty($this->intro_items)) : ?>
					<?php if ($this->params->get('show_no_articles', 1)) : ?>
						<?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_('COM_CONTENT_NO_ARTICLES')); ?>
					<?php endif; ?>
				<?php endif; ?>

				<?php $leadingcount = 0; ?>
				<?php if (!empty($this->lead_items)) : ?>
					<?php $col = 12/$this->columns; ?>
					<div class="row items-leading grid">
						<div class="grid-sizer col-12 col-sm-12 col-md-6 col-lg-<?php echo $col ?>"></div>
						<?php foreach ($this->lead_items as &$item) : ?>
							<div class="grid-item <?= $item->category_alias ?> col-12 col-sm-12 col-md-6 col-lg-<?php echo $col ?> <?php echo ($item->featured) ? 'item-featured' : ''; ?> mb-3 leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>">
								<?php
								$this->item = &$item;
								echo $this->loadTemplate('lead');
								?>
							</div>
							<?php $leadingcount++; ?>
						<?php endforeach; ?>
					</div><!-- end items-leading -->
				<?php endif; ?>

				<?php if (!empty($this->intro_items)) : ?>
				<div class="row items-intro">
					<?php foreach ($this->intro_items as $key => &$item) : ?>
						<div class="col-12 mb-3 item <?php echo $item->state == 0 ? ' system-unpublished' : null; ?>">
							<?php $this->item = &$item; ?>
							<?php echo $this->loadTemplate('item'); ?>
						</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>

				<?php if (!empty($this->link_items)) : ?>
				<div class="row mt-3">
					<div class="col-12 items-more">
						<ul class="list-group list-small">
							<?php foreach ($this->link_items as $key => &$item) : ?>
								<?php $this->item = &$item; ?>
								<?php echo $this->loadTemplate('links'); ?>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<?php endif; ?>

				<?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
					<div class="col-12 mt-3">
					<?php if ($this->params->def('show_pagination_results', 1)) : ?>
						<div class="text-center"><?php echo $this->pagination->getPagesCounter(); ?></div>
					<?php endif; ?>
						<div class="d-flex justify-content-center mt-2"><?php echo $this->pagination->getPagesLinks(); ?></div>
					</div>
				<?php endif; ?>
			</div>

		</div>
	</div>
</section>

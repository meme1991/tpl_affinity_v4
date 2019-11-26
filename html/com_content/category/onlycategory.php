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
// $doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/isotope/isotope.min.js');

// $doc->addScriptDeclaration("
// 	jQuery(document).ready(function($){
// 		// if($('.items-leading.grid').length){
// 		// 	var grid = $('.items-leading.grid').masonry({
// 		// 		itemSelector: '.grid-item',
// 		// 		columnWidth: '.grid-sizer',
// 		// 		percentPosition: true
// 		// 	});
// 		//
// 		// 	grid.imagesLoaded().progress( function() {
// 		// 		grid.masonry('layout');
// 		// 	});
// 		// }
//
// 		if($('.items-leading.grid').length){
//
// 			var grid = $('.grid').isotope({
// 			  // set itemSelector so .grid-sizer is not used in layout
// 			  itemSelector: '.grid-item',
// 			  percentPosition: true,
// 			  masonry: {
// 			    // use element for option
// 			    columnWidth: '.grid-sizer'
// 			  }
// 			})
//
// 			// filter items on button click
// 			$('.cat-navbar').on( 'click', 'a', function() {
// 			  var filterValue = $(this).attr('data-filter');
// 			  grid.isotope({ filter: filterValue });
// 			});
//
// 			// change is-checked class on buttons
// 			$('.cat-navbar').each( function( i, buttonGroup ) {
// 			  var buttonGroup = $( buttonGroup );
// 			  buttonGroup.on( 'click', 'a', function() {
// 			    buttonGroup.find('.is-checked').removeClass('is-checked');
// 			    $( this ).addClass('is-checked');
// 			  });
// 			});
//
// 		}
//
// 	})
// ");

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
<section class="wrapper blog-view">
	<div class="container blog <?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Blog">
		<div class="row">
			<div class="col-12">
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

				<?php if ($this->maxLevel != 0 && count($this->children[$this->category->id]) > 0) : ?>
					<?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
						<?php if ($this->params->get('show_empty_categories') || $child->numitems || count($child->getChildren())) : ?>
						<div class="card list-default py-3">
							<div class="list-h d-md-flex justify-content-md-between">
							  <h4 class="card-title d-inline mb-3">
							    <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($child->id, $child->language)); ?>" title="<?php echo $child->title ?>">
							      <?php echo $child->title ?>
							    </a>
							  </h4>
							  <div class="">
							    <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($child->id, $child->language)); ?>" class="btn btn-primary btn-radius" title="<?php echo $this->escape($child->title) ?>">
							      <i class="fas fa-arrow-right"></i>
							    </a>
							  </div>
							</div>
						</div>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>

		</div>
	</div>
</section>

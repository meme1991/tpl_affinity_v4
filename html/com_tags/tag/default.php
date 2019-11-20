<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note that there are certain parts of this layout used only when there is exactly one tag.
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
$isSingleTag = (count($this->item) == 1);

$doc  = JFactory::getDocument();
$tmpl = JFactory::getApplication()->getTemplate();
JHtml::_('jquery.framework');
$doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/masonry/masonry.min.js');
$doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/masonry/lazyload.min.js');
$doc->addScriptDeclaration("
	jQuery(document).ready(function($){
		if($('.tag-category .grid').length){
			var grid = $('.tag-category .grid').masonry({
				itemSelector: '.grid-item',
				columnWidth: '.grid-sizer',
				percentPosition: true
			});

			grid.imagesLoaded().progress( function() {
				grid.masonry('layout');
			});
		}
	})
");

?>
<section class="wrapper tag-category <?php echo $this->pageclass_sfx; ?>">
	<div class="container">
		<div class="row">
			<?php // se c'è solo un tag, prende l'immagine se esiste del tag ?>
			<?php $images = json_decode($this->item[0]->images); ?>
			<?php if ($this->params->get('tag_list_show_tag_image', 1) == 1 && !empty($images->image_fulltext)) : ?>
				<?php echo JLayoutHelper::render('joomla.content.cover_image', array('image' => htmlspecialchars($images->image_fulltext, ENT_COMPAT, 'UTF-8'), 'alt' => htmlspecialchars($images->image_fulltext_alt))); ?>
			<?php endif; ?>

			<?php // se ci sono più tags, prende l'immagine dal menù se esiste ?>
			<?php if ($this->params->get('show_description_image', 1) == 1 && $this->params->get('tag_list_image')) : ?>
				<?php echo JLayoutHelper::render('joomla.content.cover_image', array('image' => $this->params->get('tag_list_image'), 'alt' => $this->params->get('page_heading'))); ?>
			<?php endif; ?>

			<?php if ($this->params->get('show_page_heading')) : ?>
			  <?php echo JLayoutHelper::render('joomla.content.title.title_heading', $this->escape($this->params->get('page_heading'))) ?>
			<?php endif; ?>

			<?php if ($this->params->get('show_tag_title', 1)) : ?>
			  <?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->tags_title) ?>
			<?php endif; ?>

			<?php if($this->params->get('tag_list_show_tag_description', 1) AND ($this->item[0]->description != '' OR $this->params->get('tag_list_description', '') > '' )) : ?>
				<div class="col-12 category-desc mt-3">
				<?php // We only show a tag description if there is a single tag. ?>
				<?php if (count($this->item) == 1 && (1 || $this->params->get('tag_list_show_tag_description', 1))) : ?>
					<?php if ($this->params->get('tag_list_show_tag_description') == 1 && $this->item[0]->description) : ?>
						<p class="mb-3"><?php echo strip_tags($this->item[0]->description, '<strong><a>') ?></p>
					<?php endif; ?>
				<?php endif; ?>
				<?php // If there are multiple tags and a description or image has been supplied use that. ?>
				<?php if ($this->params->get('tag_list_show_tag_description', 1)) : ?>
					<?php if ($this->params->get('tag_list_description', '') > '') : ?>
						<p class="mb-3"><?php echo strip_tags($this->params->get('tag_list_description'), '<strong><a>') ?></p>
					<?php endif; ?>
				<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="col-12 mt-3">
				<?php echo $this->loadTemplate('items'); ?>
			</div>

			<?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
				<div class="pagination">
					<div class="col-12 mt-3">
					<?php if ($this->params->def('show_pagination_results', 1)) : ?>
						<div class="text-center"><?php echo $this->pagination->getPagesCounter(); ?></div>
					<?php endif; ?>
					<div class="d-flex justify-content-center mt-2"><?php echo $this->pagination->getPagesLinks(); ?></div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

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

$doc  = JFactory::getDocument();
$tmpl = JFactory::getApplication()->getTemplate();
JHtml::_('jquery.framework');
$doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/masonry/masonry.min.js', 'text/javascript', true, false);
$doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/masonry/lazyload.min.js', 'text/javascript', true, false);
$doc->addScriptDeclaration("
	jQuery(document).ready(function($){
		if($('.featured-view .grid').length){
			var grid = $('.featured-view .grid').masonry({
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
<section class="wrapper featured-view bg-light" itemscope itemtype="https://schema.org/Blog">
	<div class="container">
		<div class="row">
			<?php if ($this->params->get('show_page_heading') != 0) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_section', $this->escape($this->params->get('page_heading'))); ?>
			<?php endif; ?>
		</div>
		<div class="row grid mt-3">
			<?php $col = 12/$this->columns; ?>
			<div class="grid-sizer col-12 col-sm-12 col-md-6 col-lg-<?php echo $col ?>"></div>
			<?php $list = array_merge($this->lead_items, $this->intro_items, $this->link_items); ?>
			<?php if (!empty($list)) : ?>
				<?php foreach ($list as &$item) : ?>
					<div class="grid-item col-12 col-sm-12 col-md-6 col-lg-<?php echo $col ?> mb-3">
						<?php $this->item = &$item; ?>
						<?php echo $this->loadTemplate('item'); ?>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
		<div class="row">
			<div class="col-12 mt-3">
				<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<div class="text-center"><?php echo $this->pagination->getPagesCounter(); ?></div>
			<?php endif; ?>
				<div class="d-flex justify-content-center mt-2"><?php echo $this->pagination->getPagesLinks(); ?></div>
			</div>
		</div>
		<?php else:  ?>
		<div class="row">
			<div class="col-12 mt-4 text-center">
				<p><a href="<?php echo JURI::base(true) ?>/tutte-le-notizie" class="btn btn-primary icon-go"><?php echo JText::_('TPL_AFFINITY_MORE_ARTICLE') ?></a></p>
			</div>
		</div>
		<?php endif; ?>

	</div>
</section>

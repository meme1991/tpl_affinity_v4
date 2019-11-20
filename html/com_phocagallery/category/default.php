<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php
$doc   = JFactory::getDocument();
// $tmpl  = JFactory::getApplication()->getTemplate();
unset($doc->_styleSheets[JURI::root(true).'/media/com_phocagallery/css/main/phocagallery.css']);
unset($doc->_styleSheets[JURI::root(true).'/media/com_phocagallery/css/main/rating.css']);
unset($doc->_styleSheets[JURI::root(true).'/media/com_phocagallery/css/custom/default.css']);
unset($doc->_styleSheets[JURI::root(true).'/media/system/css/modal.css']);

$tmpl = JFactory::getApplication()->getTemplate();
JHtml::_('jquery.framework');
$doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/masonry/masonry.min.js');
$doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/masonry/lazyload.min.js');
$doc->addScriptDeclaration("
	jQuery(document).ready(function($){
		if($('.pg-category-view .grid').length){
			var grid = $('.pg-category-view .grid').masonry({
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
<div class="pg-category wrapper pg-category-view <?php echo $this->params->get( 'pageclass_sfx' ) ?> pg-cv">
	<div class="container">
		<div class="row">
			<?php if ($this->tmpl['show_page_heading'] != 0 AND $this->params->get( 'page_heading' ) != '') : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_heading', $this->params->get( 'page_heading' )) ?>
			<?php endif; ?>

			<?php if ($this->tmpl['display_cat_name_title'] == 1 && isset($this->category->title) && $this->category->title != '') : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->category->title) ?>
			<?php endif; ?>

			<?php // Category Description ?>
			<?php if (isset($this->category->description) && $this->category->description != '' ) : ?>
				<div class="col-12 mt-3">
					<?php echo JHTML::_('content.prepare', $this->category->description) ?>
				</div>
			<?php endif; ?>
		</div>

			<?php $this->checkRights = 1; ?>
			<?php if ((int)$this->tagId > 0) : ?>
				<?php // Search by tags ?>
				<?php $this->checkRights = 1; ?>
				<?php // Categories View in Category View ?>
				<?php if ($this->tmpl['display_categories_cv']) : ?>
					<?php echo $this->loadTemplate('categories'); ?>
				<?php endif; ?>
				<?php echo $this->loadTemplate('images'); ?>
				<?php echo $this->loadTemplate('pagination'); ?>
			<?php else : ?>
				<?php // Standard category displaying ?>
				<?php $this->checkRights = 0; ?>
				<?php // Categories View in Category View ?>
				<?php if ($this->tmpl['display_categories_cv']) : ?>
					<?php echo $this->loadTemplate('categories'); ?>
				<?php endif; ?>
				<?php // Rendering images ?>
				<?php echo $this->loadTemplate('images'); ?>
				<?php echo $this->loadTemplate('pagination'); ?>
			<?php endif; ?>

	</div><!-- end .container -->
</div>

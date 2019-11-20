<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php
$doc  = JFactory::getDocument();
// $tmpl = JFactory::getApplication()->getTemplate();
unset($doc->_styleSheets[JURI::root(true).'/media/com_phocagallery/css/main/phocagallery.css']);
unset($doc->_styleSheets[JURI::root(true).'/media/com_phocagallery/css/main/rating.css']);
unset($doc->_styleSheets[JURI::root(true).'/media/com_phocagallery/css/custom/default.css']);
// $doc->addStyleSheet(JUri::base(true).'/templates/'.$tmpl.'/css/phocagallery_theme/categories.min.css');
?>
<div class="container wrapper pg-categories-view <?php echo $this->params->get( 'pageclass_sfx' ) ?>">
	<div class="row">
		<?php if ($this->params->get('show_page_heading')) : ?>
			<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->params->get('page_heading'))) ?>
		<?php endif; ?>

		<?php if ($this->tmpl['categories_description'] != '') : ?>
			<div class="col-12 category-desc mt-3">
				<?php echo JHTML::_('content.prepare', $this->tmpl['categories_description']) ?>
			</div>
		<?php endif; ?>
	</div>
	<?php echo $this->loadTemplate('categories'); ?>
	<?php echo $this->loadTemplate('pagination'); ?>
</div>

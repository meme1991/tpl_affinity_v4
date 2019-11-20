<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php if ($this->params->get('show_ordering_categories') || $this->params->get('show_pagination_limit_categories') || $this->params->get('show_pagination_categories')) : ?>
	<form action="<?php echo htmlspecialchars($this->tmpl['action']) ?>" method="post" name="adminForm">
		<div class="row">
			<?php if (count($this->categories)) : ?>
			<div class="pagination sorting-filter col-12 d-flex align-items-center">
				<?php if ($this->params->get('show_ordering_categories')) : ?>
					<?php echo JText::_('COM_PHOCAGALLERY_ORDER_FRONT') .'&nbsp;'.$this->tmpl['ordering']; ?>
				<?php endif; ?>
				<?php if ($this->params->get('show_pagination_limit_categories')) : ?>
					<?php echo JText::_('COM_PHOCAGALLERY_DISPLAY_NUM') .'&nbsp;'.$this->tmpl['pagination']->getLimitBox(); ?>
				<?php endif; ?>
				<?php if ($this->params->get('show_pagination_categories')) : ?>
				<div class="pagination col-12 d-flex align-items-center justify-content-center">
					<div class="counter"><?php echo $this->tmpl['pagination']->getPagesCounter() ?></div>
					<div class="pagination"><?php echo $this->tmpl['pagination']->getPagesLinks() ?></div>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<input type="hidden" name="controller" value="categories" />
			<?php echo JHtml::_( 'form.token' ); ?>
		</div>
	</form>
<?php endif; ?>

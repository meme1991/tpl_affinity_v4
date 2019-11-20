<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php if ($this->params->get('show_ordering_images') || $this->params->get('show_pagination_limit_category') || $this->params->get('show_pagination_category')) : ?>
	<form action="<?php echo htmlspecialchars($this->tmpl['action']) ?>" method="post" name="adminForm">
		<div class="row mt-3">
		<?php if (count($this->items)) : ?>
			<div class="pagination sorting-filter col-12 d-flex align-items-center">
			<?php if ($this->params->get('show_ordering_images')) : ?>
				<?php echo JText::_('COM_PHOCAGALLERY_ORDER_FRONT') .'&nbsp;'.$this->tmpl['ordering']; ?>
			<?php endif; ?>
			<?php if ($this->params->get('show_pagination_limit_category')) : ?>
				<?php echo JText::_('COM_PHOCAGALLERY_DISPLAY_NUM') .'&nbsp;'.$this->tmpl['pagination']->getLimitBox(); ?>
			<?php endif; ?>
			</div>
			<?php if ($this->params->get('show_pagination_category')) : ?>
			<div class="pagination col-12 d-flex align-items-center justify-content-center mt-3">
				<!-- <div class="counter"><?php echo $this->tmpl['pagination']->getPagesCounter() ?></div> -->
				<div class="pagination"><?php echo $this->tmpl['pagination']->getPagesLinks() ?></div>
			</div>
			<?php endif; ?>
		<?php endif; ?>

		<input type="hidden" name="controller" value="category" />
		<?php echo JHtml::_( 'form.token' ); ?>
		</div>
	</form>
<?php endif; ?>

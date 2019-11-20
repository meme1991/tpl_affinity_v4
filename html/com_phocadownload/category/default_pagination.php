<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php $this->t['action'] = str_replace('&amp;', '&', $this->t['action']); ?>
<?php $this->t['action'] = htmlspecialchars($this->t['action']); ?>

<div class="pagination my-3 w-100">
	<form action="<?php echo $this->t['action'] ?>" method="post" name="adminForm" class="w-100">
		<?php if ($this->t['p']->get('show_ordering_files') || $this->t['p']->get('show_pagination_limit') || $this->t['p']->get('show_pagination')) : ?>
			<div class="pagination sorting-filter d-flex align-items-center">
			<?php echo JText::_('COM_PHOCADOWNLOAD_ORDER_FRONT') .'&nbsp;'.$this->t['ordering']. ' &nbsp;'; ?>

			<?php if ($this->t['p']->get('show_pagination_limit')) : ?>
				<?php echo JText::_('COM_PHOCADOWNLOAD_DISPLAY_NUM').'&nbsp;' ?>
				<?php echo $this->t['pagination']->getLimitBox() ?>
			<?php endif; ?>

			<!-- <?php if ($this->t['p']->get('show_pagination')) : ?>
				<?php echo $this->t['pagination']->getPagesCounter() ?>
			<?php endif; ?> -->
			</div>
		<?php endif; ?>

		<?php if ($this->t['p']->get('show_pagination')) : ?>
			<div class="d-flex align-items-center justify-content-center mt-3 <?php echo $this->t['p']->get( 'pageclass_sfx' ) ?>" id="pg-pagination" >
				<?php echo $this->t['pagination']->getPagesLinks() ?>
			</div>
		<?php endif; ?>
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
</div>

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
?>
<section class="wrapper archive">
	<div class="container">
		<div class="row">
			<div class="col-12 mt-3">
				<?php if ($this->params->get('show_page_heading')) : ?>
					<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->params->get('page_heading'))) ?>
				<?php endif; ?>
				<form id="adminForm" action="<?php echo JRoute::_('index.php'); ?>" method="post">
					<div class="row">
						<div class="col-12">
							<fieldset class="filters">
								<div class="filter-search d-flex justify-content-between">
									<?php if ($this->params->get('filter_field') !== 'hide') : ?>
										<label class="filter-search-lbl element-invisible sr-only" for="filter-search"><?php echo JText::_('COM_CONTENT_TITLE_FILTER_LABEL') . '&#160;'; ?></label>
										<input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->filter); ?>" class="form-control" onchange="document.getElementById('adminForm').submit();" placeholder="<?php echo JText::_('COM_CONTENT_TITLE_FILTER_LABEL'); ?>" />
									<?php endif; ?>

									<fieldset>
										<?php echo $this->form->monthField; ?>
										<?php echo $this->form->yearField; ?>
										<?php echo $this->form->limitField; ?>
										<button type="submit" class="btn btn-primary"><?php echo JText::_('<i class="fa fa-filter" aria-hidden="true"></i> Filtra'); ?></button>
									</fieldset>
									<input type="hidden" name="view" value="archive" />
									<input type="hidden" name="option" value="com_content" />
									<input type="hidden" name="limitstart" value="0" />
								</div>
							</fieldset>
						</div>
					</div>
					<?php if($this->items) : ?>
					<div class="row">
						<div class="col-12">
							<ul class="list-group list-small">
								<?php echo $this->loadTemplate('items'); ?>
							</ul>
						</div>
					</div>
					<div class="col-12 mt-3 py-2 bg-light">
						<?php if ($this->params->def('show_pagination_results', 1)) : ?>
							<div class="text-center"><?php echo $this->pagination->getPagesCounter(); ?></div>
						<?php endif; ?>
						<div class="d-flex justify-content-center mt-2"><?php echo $this->pagination->getPagesLinks(); ?></div>
					</div>
					<?php else: ?>
						<?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_('Non ci sono elementi archiviati')); ?>
					<?php endif; ?>
				</form>
			</div>
		</div>
	</div>
</section>

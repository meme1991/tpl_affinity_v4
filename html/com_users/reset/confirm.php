<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
?>
<?php //echo JLayoutHelper::render('joomla.content.hero', array('height' => '200px')); ?>
<div class="wrapper bg-light-gray">
	<div class="container com_users remind<?php echo $this->pageclass_sfx; ?>">
		<div class="row justify-content-center">
			<div class="col-12 col-sm-8 col-md-6">
				<?php if ($this->params->get('show_page_heading')) : ?>
					<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->params->get('page_heading'))) ?>
				<?php endif; ?>

				<form action="<?php echo JRoute::_('index.php?option=com_users&task=reset.confirm'); ?>" method="post" class="form-validate form-horizontal well">
					<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
						<fieldset>
							<?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_($fieldset->label)); ?>
							<?php foreach ($this->form->getFieldset($fieldset->name) as $name => $field) : ?>
								<div class="control-group mt-2">
									<div class="control-label">
										<?php echo $field->label; ?>
									</div>
									<div class="controls">
										<?php echo $field->input; ?>
										</div>
									</div>
							<?php endforeach; ?>
						</fieldset>
					<?php endforeach; ?>

					<div class="control-group mt-3">
						<div class="controls">
							<button type="submit" class="btn btn-primary btn-block validate"><i class="fas fa-check-circle pr-2"></i> <?php echo JText::_('JSUBMIT'); ?></button>
						</div>
					</div>
					<?php echo JHtml::_('form.token'); ?>
				</form>
			</div>
		</div>
	</div>
</div>

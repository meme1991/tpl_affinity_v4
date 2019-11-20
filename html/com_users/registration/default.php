<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
?>
<?php //echo JLayoutHelper::render('joomla.content.hero', array('height' => '200px')); ?>
<div class="wrapper bg-light-gray">
	<div class="container com_users registration <?php echo $this->pageclass_sfx; ?>">
		<div class="row justify-content-center">
			<?php //if ($this->params->get('show_page_heading')) : ?>
				<div class="col-12 col-md-8">
					<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->params->get('page_heading'))) ?>
				</div>
			<?php //endif; ?>
			<div class="col-12 col-md-8">
				<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate form-horizontal well" enctype="multipart/form-data">
					<?php // Iterate through the form fieldsets and display each one. ?>
					<?php foreach ($this->form->getFieldsets() as $i => $fieldset) : ?>
						<?php if($fieldset->name == "default") $form_list[0] = $fieldset ?>
						<?php if($fieldset->name == "profile") $form_list[1] = $fieldset ?>
						<?php if($fieldset->name == "fields-1") $form_list[2] = $fieldset ?>
						<?php if($fieldset->name == "privacyconsent") $form_list[3] = $fieldset ?>
						<?php if($fieldset->name == "terms") $form_list[4] = $fieldset ?>
					<?php endforeach; ?>

					<?php for($c=0;$c<5;$c++) : ?>
						<?php //var_dump($fieldset->name) ?>
						<?php $fieldset = $form_list[$c]; ?>
						<?php $class = ($fieldset->name == "privacyconsent" OR $fieldset->name == "terms") ? "mt-3" : "" ?>
						<fieldset class="<?= $class ?>">
							<?php if (isset($fieldset->label) AND ($fieldset->name == "privacyconsent" OR $fieldset->name == "terms")) : ?>
								<legend><?php echo JText::_($fieldset->label); ?></legend>
							<?php endif; ?>

							<?php if($fieldset->name == 'default') : ?>
								<?php $fields = $this->form->getFieldset($fieldset->name); ?>
								<?php if (count($fields)) : ?>
									<?php foreach ($fields as $k => $field) : ?>
										<?php if($field->name != "jform[captcha]") : ?>
											<?php echo $field->renderField(); ?>
										<?php else: ?>
											<?php $captcha_filed = $field ?>
										<?php endif; ?>
									<?php endforeach; ?>
								<?php endif; ?>
							<?php else: ?>
								<?php echo $this->form->renderFieldset($fieldset->name); ?>
							<?php endif; ?>

						</fieldset>
					<?php endfor; ?>
					<fieldset>
						<?php echo $captcha_filed->renderField() ?>
					</fieldset>
					<div class="control-group mt-3">
						<div class="controls">
							<button type="submit" class="btn btn-primary validate">
								<?php echo JText::_('JREGISTER'); ?>
							</button>
							<a class="btn" href="<?php echo JRoute::_(''); ?>" title="<?php echo JText::_('JCANCEL'); ?>">
								<?php echo JText::_('JCANCEL'); ?>
							</a>
							<input type="hidden" name="option" value="com_users" />
							<input type="hidden" name="task" value="registration.register" />
						</div>
					</div>
					<?php echo JHtml::_('form.token'); ?>
				</form>
			</div>
		</div>
	</div>
</div>

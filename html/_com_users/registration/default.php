<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

//JHtml::_('behavior.keepalive');
//JHtml::_('behavior.formvalidator');
$doc  = JFactory::getDocument();
$tmpl = JFactory::getApplication()->getTemplate();
JHtml::_('jquery.framework');
$doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/jsvalidator/registrationValidation.min.js?v=1.6.0');
?>
<div class="wrapper container com_users registration <?php echo $this->pageclass_sfx; ?>">
	<div class="row justify-content-center">
		<div class="col-12 col-sm-12 col-md-10 col-lg-8">
			<?php if ($this->params->get('show_page_heading')) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->params->get('page_heading'))) ?>
			<?php endif; ?>

			<form id="member-registration" novalidate action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate mt-3" enctype="multipart/form-data">
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-6">
						<label for="jform_name"><?= JText::_('TPL_AFFINITY_REGISTRATION_NAME') ?></label>
						<input type="text" placeholder="<?= JText::_('TPL_AFFINITY_REGISTRATION_NAME_PLACEHOLDER') ?>" name="jform[name]" id="jform_name" class="form-control required invalid" size="30" required="required" aria-required="true" aria-invalid="true">
						<div class="valid-feedback"><?= JText::sprintf('TPL_AFFINITY_VALIDATION_OK', '<i class="fas fa-check-circle"></i>') ?></div>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-6">
						<label for="jform_username"><?= JText::_('TPL_AFFINITY_REGISTRATION_USERNAME') ?></label>
						<input type="text" placeholder="<?= JText::_('TPL_AFFINITY_REGISTRATION_USERNAME_PLACEHOLDER') ?>" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[_-]).{6,20})" minlength="6" maxlength="20" name="jform[username]" id="jform_username" class="form-control validate-username required invalid" size="30" required="required" aria-required="true" aria-invalid="true" onchange="validUsername()">
						<div class="valid-feedback"><?= JText::sprintf('TPL_AFFINITY_VALIDATION_OK', '<i class="fas fa-check-circle"></i>') ?></div>
						<div class="invalid-feedback"><?= JText::sprintf('TPL_AFFINITY_VALIDATION_USER_INVALID', '<i class="fas fa-times-circle"></i>') ?></div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-6">
						<label for="jform_password1"><?= JText::_('TPL_AFFINITY_REGISTRATION_PASSWORD') ?> <i class="fas fa-question-circle help" data-toggle="tooltip" data-placement="top" title="Una lettera maiuscola, una minuscola, un numero e minimo 8 caratteri"></i> </label>
						<input type="password" placeholder="<?= JText::_('TPL_AFFINITY_REGISTRATION_PASSWORD_PLACEHOLDER') ?>" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[_-]).{6,20})" minlength="6" maxlength="20" name="jform[password1]" id="jform_password1" autocomplete="off" class="form-control validate-password required invalid" size="30" maxlength="99" required="required" aria-required="true" aria-invalid="true" onchange="validPassword()">
						<div class="valid-feedback"><?= JText::sprintf('TPL_AFFINITY_VALIDATION_OK', '<i class="fas fa-check-circle"></i>') ?></div>
						<div class="invalid-feedback"><?= JText::sprintf('TPL_AFFINITY_VALIDATION_PASSWORD_INVALID', '<i class="fas fa-times-circle"></i>') ?></div>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-6">
						<label for="jform_password2"><?= JText::_('TPL_AFFINITY_REGISTRATION_PASSWORD1') ?></label>
						<input type="password" placeholder="<?= JText::_('TPL_AFFINITY_REGISTRATION_PASSWORD1_PLACEHOLDER') ?>" name="jform[password2]" id="jform_password2" autocomplete="off" class="form-control validate-password required invalid" size="30" maxlength="99" required="required" aria-required="true" aria-invalid="true" onchange="validPasswordConfirm()">
						<div class="valid-feedback"><?= JText::sprintf('TPL_AFFINITY_VALIDATION_OK', '<i class="fas fa-check-circle"></i>') ?></div>
						<div class="invalid-feedback"><?= JText::sprintf('TPL_AFFINITY_VALIDATION_PASSWORD_CONFIRM_INVALID', '<i class="fas fa-times-circle"></i>') ?></div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12 col-sm-12 col-md-6">
						<label for="jform_email1"><?= JText::_('TPL_AFFINITY_REGISTRATION_EMAIL') ?></label>
						<input type="email" placeholder="<?= JText::_('TPL_AFFINITY_REGISTRATION_EMAIL_PLACEHOLDER') ?>" name="jform[email1]" class="form-control validate-email required invalid" id="jform_email1" value="" size="30" autocomplete="email" required="required" aria-required="true" aria-invalid="true" onchange="validEmail()">
						<div class="valid-feedback"><?= JText::sprintf('TPL_AFFINITY_VALIDATION_OK', '<i class="fas fa-check-circle"></i>') ?></div>
						<div class="invalid-feedback"><?= JText::sprintf('TPL_AFFINITY_VALIDATION_EMAIL_INVALID', '<i class="fas fa-times-circle"></i>') ?></div>
					</div>
					<div class="form-group col-12 col-sm-12 col-md-6">
						<label for="jform_email2"><?= JText::_('TPL_AFFINITY_REGISTRATION_EMAIL1') ?></label>
						<input type="email" placeholder="<?= JText::_('TPL_AFFINITY_REGISTRATION_EMAIL1_PLACEHOLDER') ?>" name="jform[email2]" class="form-control validate-email required invalid" id="jform_email2" size="30" required="required" aria-required="true" aria-invalid="true" onchange="validEmailConfirm()">
						<div class="valid-feedback"><?= JText::sprintf('TPL_AFFINITY_VALIDATION_OK', '<i class="fas fa-check-circle"></i>') ?></div>
						<div class="invalid-feedback"><?= JText::sprintf('TPL_AFFINITY_VALIDATION_EMAIL_CONFIRM_INVALID', '<i class="fas fa-times-circle"></i>') ?></div>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-12">
						<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
							<?php $fields = $this->form->getFieldset($fieldset->name); ?>
							<?php if (count($fields)) : ?>
								<?php // Iterate through the fields in the set and display them. ?>
								<?php foreach ($fields as $field) : ?>
									<?php if($field->type == 'Captcha'): ?>
										<?php echo $field->input ?>
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="form-group terms mb-3 bg-light">
					<span class="title">Trattamento dati</span>
					<p>Ho letto la vostra <a href="https://www.spedi.it/privacy-policy">Informaiva sulla privacy</a> e acconsento al trattamento dei dati.</p>
					<input type="checkbox" name="jform[acceptTermsForm]" value="1" id="jform_acceptTermsForm" required="required">
			    <label class="form-check-label" for="jform_acceptTermsForm">
			    	Acconsento al trattamento
			    </label>
				</div>

				<div class="form-row">
					<div class="form-group col-12">
						<button type="submit" class="btn btn-primary btn-block validate mb-3">
							<i class="fas fa-check-circle"></i> <?= JText::_('TPL_AFFINITY_REGISTRATION_GO'); ?>
						</button>
						<input type="hidden" name="option" value="com_users" />
						<input type="hidden" name="task" value="registration.register" />
					</div>
				</div>
				<?php echo JHtml::_('form.token'); ?>
			</form>
		</div>
	</div>
</div>

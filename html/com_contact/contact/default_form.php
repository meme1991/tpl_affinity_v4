<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
$doc  = JFactory::getDocument();
$tmpl = JFactory::getApplication()->getTemplate();
$doc->addScriptDeclaration("
	jQuery(document).ready(function($){
		$('#contact-form').submit(function(event){
			if(!$('#jform_acceptForm').is(':checked')){
				event.preventDefault();
				event.stopPropagation();
			}
		});})
");

$this->form->setFieldAttribute('contact_name', 'hint', 'es. Mario Rossi');
$this->form->setFieldAttribute('contact_email', 'hint', 'es. mario.rossi@email.it');
$this->form->setFieldAttribute('contact_subject', 'hint', "Inserisci l'oggetto della mail");
$this->form->setFieldAttribute('contact_message', 'hint', 'Inserisci il tuo messaggio');
?>

<div class="col-12 col-lg-4 mt-3 mt-lg-0 py-3 form-module bg-light">
	<div class="aside-title">
		<h4><?php echo JText::_('TPL_AFFINITY_FORM_CONTACT_LABEL') ?></h4>
	</div>
	<div class="contact-form">
		<form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate form-horizontal well custom-form">
			<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
				<?php if ($fieldset->name === 'captcha' && !$this->captchaEnabled) : ?>
					<?php continue; ?>
				<?php endif; ?>
				<?php $fields = $this->form->getFieldset($fieldset->name); ?>
				<?php if (count($fields)) : ?>
					<?php foreach ($fields as $k => $field) : ?>
					<div class="form-group mb-3">
						<?php echo $field->label; ?>
          	<?php echo $field->input; ?>
					</div>
						<?php //echo $field->renderField(); ?>
					<?php endforeach; ?>
				<?php endif; ?>
			<?php endforeach; ?>
			<div class="form-group terms mb-3 bg-light">
				<span class="title">Trattamento dati</span>
				<p>Acconsento al trattamento dei miei dati personali al fine di ricevere una risposta al mio messaggio, come indicato nella <a href="https://www.spedi.it/privacy-policy">Informaiva sulla privacy</a></p>
				<input type="checkbox" name="jform[acceptTermsForm]" value="1" id="jform_acceptTermsForm" required="required">
		    <label class="form-check-label" for="jform_acceptTermsForm">
		    	Acconsento al trattamento
		    </label>
			</div>
			<div class="control-group mt-2">
				<div class="controls">
					<button class="btn btn-primary btn-block validate" type="submit"><?php echo JText::_('TPL_AFFINITY_FORM_SEND_LABEL'); ?> <i class="fas fa-paper-plane pl-2"></i></button>
					<input type="hidden" name="option" value="com_contact" />
					<input type="hidden" name="task" value="contact.submit" />
					<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
					<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
					<?php echo JHtml::_('form.token'); ?>
				</div>
			</div>
		</form>
	</div>
</div>

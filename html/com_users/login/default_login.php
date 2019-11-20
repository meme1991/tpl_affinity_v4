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
<section class="wrapper bg-light-gray">
	<div class="container com_users login <?php echo $this->pageclass_sfx; ?>">
		<div class="row justify-content-center">
			<?php $usersConfig = JComponentHelper::getParams('com_users'); ?>
			<?php if ($usersConfig->get('allowUserRegistration')) : ?>
			<div class="col-12 col-sm-12 col-md-6 col-lg-5 py-3 py-md-0 d-flex justify-content-center align-items-center bg-light">
				<div class="text-center">
					<?php echo JLayoutHelper::render('joomla.content.title.title_page', 'Registrati') ?>
						<p class="lead my-3"><?php echo JText::_('Non possiedi ancora un accout? <br>Registrane subito uno.'); ?></p>
						<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>" class="btn btn-outline-primary btn-block text-uppercase">
							<?= JText::_("TPL_AFFINITY_BOOKING_SARDINIA_HERO_REGISTRATI") ?>
						</a>
				</div>
			</div>
			<?php endif; ?>
			<div class="col-12 col-sm-12 col-md-6 col-lg-5">
				<?php if ($this->params->get('show_page_heading')) : ?>
					<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->params->get('page_heading'))) ?>
				<?php endif; ?>

				<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="form-validate form-horizontal well">

					<fieldset>
						<?php foreach ($this->form->getFieldset('credentials') as $field) : ?>
							<?php if (!$field->hidden) : ?>
								<div class="control-group mt-2">
									<div class="control-label">
										<?php echo $field->label; ?>
									</div>
									<div class="controls">
										<?php echo $field->input; ?>
									</div>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>

						<?php if ($this->tfa) : ?>
							<div class="control-group mt-2">
								<div class="control-label">
									<?php echo $this->form->getField('secretkey')->label; ?>
								</div>
								<div class="controls">
									<?php echo $this->form->getField('secretkey')->input; ?>
								</div>
							</div>
						<?php endif; ?>

						<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
						<div  class="control-group mt-2">
							<div class="control-label d-inline-block"><label><?php echo JText::_('COM_USERS_LOGIN_REMEMBER_ME') ?></label></div>
							<div class="controls d-inline-block"><input id="remember" type="checkbox" name="remember" class="inputbox" value="yes"/></div>
						</div>
						<?php endif; ?>

						<div class="control-group mt-2">
							<div class="controls">
								<button type="submit" class="btn btn-primary btn-block">
									<?php echo JText::_('JLOGIN'); ?>
								</button>
							</div>
						</div>

						<?php $return = $this->form->getValue('return', '', $this->params->get('login_redirect_url', $this->params->get('login_redirect_menuitem'))); ?>
						<input type="hidden" name="return" value="<?php echo base64_encode($return); ?>" />
						<?php echo JHtml::_('form.token'); ?>
					</fieldset>
				</form>
				<ul class="list-unstyled mt-3">
					<li>
						<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>" class="size-xs">
							<?php echo JText::_('COM_USERS_LOGIN_RESET'); ?>
						</a>
					</li>
					<li>
						<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>" class="size-xs">
							<?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

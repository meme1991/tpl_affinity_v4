<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php //echo JLayoutHelper::render('joomla.content.hero', array('height' => '200px')); ?>
<div class="wrapper container com_users logout bg-light-gray <?php echo $this->pageclass_sfx; ?>">
	<div class="row justify-content-center">
		<div class="col-12 col-sm-8 col-md-6">
			<?php if ($this->params->get('show_page_heading')) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->params->get('page_heading'))) ?>
			<?php endif; ?>

			<?php if (($this->params->get('logoutdescription_show') == 1 && str_replace(' ', '', $this->params->get('logout_description')) != '')|| $this->params->get('logout_image') != '') : ?>
			<div class="logout-description mt-3">
			<?php endif; ?>

				<?php if ($this->params->get('logoutdescription_show') == 1) : ?>
					<?php echo $this->params->get('logout_description'); ?>
				<?php endif; ?>

				<?php if ($this->params->get('logout_image') != '') : ?>
					<img src="<?php echo $this->escape($this->params->get('logout_image')); ?>" class="thumbnail pull-right logout-image" alt="<?php echo JText::_('COM_USER_LOGOUT_IMAGE_ALT'); ?>"/>
				<?php endif; ?>

			<?php if (($this->params->get('logoutdescription_show') == 1 && str_replace(' ', '', $this->params->get('logout_description')) != '')|| $this->params->get('logout_image') != '') : ?>
			</div>
			<?php endif; ?>

			<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.logout'); ?>" method="post" class="form-horizontal well mt-3">
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn btn-primary btn-block"><i class="far fa-sign-out pr-2"></i> <?php echo JText::_('JLOGOUT'); ?></button>
					</div>
				</div>
				<?php if ($this->params->get('logout_redirect_url')) : ?>
					<input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('logout_redirect_url', $this->form->getValue('return'))); ?>" />
				<?php else : ?>
					<input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('logout_redirect_menuitem', $this->form->getValue('return'))); ?>" />
				<?php endif; ?>
				<?php echo JHtml::_('form.token'); ?>
			</form>
		</div>
	</div>
</div>

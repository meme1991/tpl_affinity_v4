<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
$class_sfx = $params->get('moduleclass_sfx');
$bootstrap_size = ($params->get('bootstrap_size') == 0) ? '' : '-'.$params->get('bootstrap_size');
?>
<div class="mod_login logout btn-group featured-htop <?php echo $class_sfx ?>">
  <button type="button" class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="fas fa-user-circle fa-lg mr-2"></i>
		<?php if ($params->get('name') == 0) : ?>
			<?php echo JText::_( htmlspecialchars($user->get('name'), ENT_COMPAT, 'UTF-8')); ?>
		<?php else : ?>
			<?php echo JText::_( htmlspecialchars($user->get('username'), ENT_COMPAT, 'UTF-8')); ?>
		<?php endif; ?>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
		<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">
			<?php if ($params->get('profilelink')) : ?>
				<ul class="list-unstyled">
					<li>
						<a href="<?php echo JRoute::_('index.php?option=com_users&view=profile'); ?>">
						<?php echo JText::_('MOD_LOGIN_PROFILE'); ?></a>
					</li>
				</ul>
			<?php endif; ?>

			<div class="form-group mb-0 row" id="form-login-submit">
				<div class="col-12">
					<button type="submit" name="Submit" class="btn btn-primary logout-button"><i class='far fa-sign-out mr-2' aria-hidden='true'></i><?php echo JText::_('JLOGOUT'); ?></button>
				</div>
				<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="user.logout" />
				<input type="hidden" name="return" value="<?php echo $return; ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</form>

  </div>
</div>

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
$user = JFactory::getUser();
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
				<ul class="list-unstyled">
          <?php if ($params->get('profilelink')) : ?>
            <li class="nav-item">
              <h6 class="dropdown-header">Il mio profilo</h6>
  					</li>
  					<li class="nav-item">
  						<a class="dropdown-item" href="<?php echo JRoute::_('index.php?option=com_users&view=profile'); ?>">
    						<i class="far fa-user mr-2"></i><?php echo JText::_('MOD_LOGIN_PROFILE'); ?>
              </a>
  					</li>
            <li class="nav-item">
  						<a class="dropdown-item" href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id='.(int)$user->id) ?>">
    						<i class="far fa-edit mr-2"></i><?php echo JText::_('TPL_AFFINITY_EDIT_PROFILE'); ?>
              </a>
  					</li>
            <li class="nav-item">
  						<a class="dropdown-item" href="<?php echo JRoute::_("index.php?".$_SERVER['QUERY_STRING']."&layout=default_params"); ?>">
    						<i class="far fa-cog mr-2"></i><?php echo JText::_('TPL_AFFINITY_SETTINGS'); ?>
              </a>
  					</li>
            <div class="dropdown-divider"></div>
          <?php endif; ?>
          <li class="nav-item">
            <button type="submit" name="Submit" class="text-dark dropdown-item logout-button"><i class='far fa-sign-out mr-2'></i><?php echo JText::_('JLOGOUT'); ?></button>
					</li>
				</ul>

			<div class="form-group mb-0 row" id="form-login-submit">
				<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="user.logout" />
				<input type="hidden" name="return" value="<?php echo $return; ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</form>

  </div>
</div>

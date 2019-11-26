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
?>
<div class="inline-menu mod_login">
  <form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">
  	<ul class="list-inline">
      <li class="list-inline-item delimiter">
          <?php if ($params->get('profilelink')) : ?>
            <?php $profile_link = JRoute::_('index.php?option=com_users&view=profile'); ?>
          <?php else: ?>
            <?php $profile_link = '#' ?>
          <?php endif; ?>
          <a href="<?= $profile_link ?>" title="Profilo di <?php echo JText::_( htmlspecialchars($user->get('name'), ENT_COMPAT, 'UTF-8')); ?>">
          Ciao,
          <?php if ($params->get('name') == 0) : ?>
      			<?php echo JText::_( htmlspecialchars($user->get('name'), ENT_COMPAT, 'UTF-8')); ?>
      		<?php else : ?>
      			<?php echo JText::_( htmlspecialchars($user->get('username'), ENT_COMPAT, 'UTF-8')); ?>
      		<?php endif; ?>
        </a>
      </li>
      <li class="list-inline-item">
        <button type="submit" name="Submit" class="btn btn-link" href="<?php echo JRoute::_('index.php?option=com_users&view=login'); ?>" title="Logout">Esci</button>
      </li>
    </ul>

    <input type="hidden" name="option" value="com_users" />
    <input type="hidden" name="task" value="user.logout" />
    <input type="hidden" name="return" value="<?php echo $return; ?>" />
    <?php echo JHtml::_('form.token'); ?>
  </form>
</div>

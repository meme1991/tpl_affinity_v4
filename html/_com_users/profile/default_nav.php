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
<div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar-alt">
  <ul class="list-group list-striped list-hover">
    <li class="list-group-item <?php if($_REQUEST['layout'] == 'default_core') echo 'active' ?>">
      <a href="<?php echo JRoute::_("index.php?".$_SERVER['QUERY_STRING']."&layout=default_core"); ?>">
        <i class="fas fa-user mr-2"></i><?= JText::_("TPL_AFFINITY_PROFILE") ?>
      </a>
    </li>
    <?php if (JFactory::getUser()->id == $this->data->id) : ?>
      <li class="list-group-item <?php if($_REQUEST['layout'] == 'edit') echo 'active' ?>">
        <a href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id=' . (int) $this->data->id); ?>">
          <i class="fas fa-edit mr-2"></i><?= JText::_("TPL_AFFINITY_EDIT_PROFILE") ?>
        </a>
      </li>
    <?php endif; ?>
    <li class="list-group-item <?php if($_REQUEST['layout'] == 'default_params') echo 'active' ?>">
      <a href="<?php echo JRoute::_("index.php?".$_SERVER['QUERY_STRING']."&layout=default_params"); ?>">
        <i class="fas fa-cog mr-2"></i><?= JText::_("TPL_AFFINITY_SETTINGS") ?>
      </a>
    </li>
  </ul>
</div>

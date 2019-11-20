<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="inline-menu ">
	<ul class="list-inline">
    <li class="list-inline-item delimiter">
      <a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>" title="Registrati">Registrati</a>
    </li>
    <li class="list-inline-item">
      <a href="<?php echo JRoute::_('index.php?option=com_users&view=login'); ?>" title="Accedi">Accedi</a>
    </li>
  </ul>
</div>

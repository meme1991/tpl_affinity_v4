<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<a class="nav-side__header nav-side__header--item d-flex justify-content-between align-items-center link-default" data-toggle="collapse" href="#navsideCollapse-<?php echo $item->id ?>" aria-expanded="false" aria-controls="navsideCollapse-<?php echo $item->id ?>">
  <?php echo $item->title; ?>
  <i class="fal fa-angle-down fa-3x"></i>
</a>

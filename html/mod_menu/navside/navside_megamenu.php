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
<a class="nav-side__header nav-side__header--item d-flex justify-content-between align-items-center link-default"
   data-toggle="collapse"
   href="#navsideCollapse-<?php echo $item->id ?>"
   aria-expanded="false"
   aria-controls="navsideCollapse-<?php echo $item->id ?>"
   >
  <?php echo $item->title; ?>
  <i class="fa fa-angle-down fa-3x"></i>
</a>
<div class="nav-side__body collapse" id="navsideCollapse-<?php echo $item->id ?>">
  <!-- render module -->
  <?php $modules = JModuleHelper::getModules($megaPosName); ?>
  <?php //$attribs['style'] = 'sidebar'; ?>
  <?php foreach ($modules AS $module ) : ?>
    <?php echo JModuleHelper::renderModule($module); ?>
  <?php endforeach; ?>
  <!-- render module -->
</div>

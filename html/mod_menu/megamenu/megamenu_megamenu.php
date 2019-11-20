<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$class = ($item->anchor_css != '') ? ' '.$item->anchor_css : '';

// costruisco il titolo del links se ci sono delle icone
$title = $item->title;
if($iconYN AND $pos == 1)
	$title = '<i class="'.$icon.' mr-1"></i>'.$item->title;
elseif($iconYN AND $pos == 0)
	$title = $item->title.'<i class="'.$icon.' ml-1"></i>';
?>
<a class="nav-link dropdown-toggle<?php echo $class ?>"
  title="<?php echo $title ?>"
  href="<?php echo $item->flink ?>"
  id="navbarDropdownMenuLink-<?php echo $item->id ?>"
  data-toggle="dropdown"
  aria-haspopup="true"
  aria-expanded="false">
  <?php echo $title ?>
</a>
<div class="dropdown-menu <?php echo $megaClass ?>"
  <?php //if($megaWidth == 2) echo 'style="width: '.$megaLarge.'px"' ?>
  aria-labelledby="navbarDropdownMenuLink-<?php echo $item->id ?>">
    <div class="container-fluid">
      <div class="row">
      <!-- render module -->
      <?php $modules = JModuleHelper::getModules($megaPosName); ?>
      <?php //$attribs['style'] = 'sidebar'; ?>
      <?php foreach ($modules AS $module ) : ?>
        <?php echo JModuleHelper::renderModule($module); ?>
      <?php endforeach; ?>
      <!-- render module -->
    </div>
  </div>
</div>

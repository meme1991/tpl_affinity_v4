<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// differenzio la classe a seonda del livello di profondità
if($item->level > 1){
	$class = 'dropdown-item';
} else{
	$class = 'nav-link';
}

$class .= $item->anchor_css ? ' '.trim($item->anchor_css) : '';
$title  = $item->anchor_title ? $item->anchor_title : $item->title;

$dropdownClass = '';
$dropdownAttr  = '';
if ($item->deeper){
	$dropdownClass = ' dropdown-toggle';
	$dropdownAttr  = 'id="navbarDropdownMenuLink'.$item->id.'"
										data-toggle="dropdown"
										aria-haspopup="true"
										aria-expanded="false"';
}
$class .= $dropdownClass;

switch ($item->browserNav) {
	case   0: $target = ''; break;
	case   1: $target = 'target=_blank'; break;
	case   2: $target = 'target=_parent'; break;
	default : $target = ''; break;
}

// costruisco il titolo del links se ci sono delle icone
$title = $item->title;
if($iconYN AND $pos == 1)
	$title = '<i class="'.$icon.' mr-1"></i>'.$item->title;
elseif($iconYN AND $pos == 0)
	$title = $item->title.'<i class="'.$icon.' ml-1"></i>';
?>
<a class="<?php echo $class ?>"
	href="<?php echo $item->flink ?>"
	<?php echo $dropdownAttr ?>
	title="<?php echo $item->title ?>"
	<?php echo $target ?>>
	<?php echo $title; ?>
</a>

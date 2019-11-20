<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>
<ul class="list-group <?php echo $class_sfx ?>" <?php
	$tag = '';
	if ($params->get('tag_id') != null){
		$tag = $params->get('tag_id') . '';
		echo ' id="' . $tag . '"';
	}
?>>
<?php
/* item uno per uno */
foreach ($list as $i => &$item)
{
	// accesskey
	$accesskey = '';
	if($item->params->get('accesskey-yn')){
		$accesskey = $item->params->get('accesskey');
	}

	/* icone */
	$iconYN = $item->params->get('menu-icon-yn');
	if($iconYN){
		$icon = $item->params->get('menu-icon');
		$pos  = $item->params->get('menu-icon-pos');
	}

	/* modal */
	$modal = $item->params->get('modal');
	if($modal){
		$modal_toggle = $item->params->get('option1');
		$modal_target = $item->params->get('option2');
	}

	$class = 'item-' . $item->id;
	/* corrente */
	if ($item->id == $active_id){
		$class .= ' current';
	}
	/* se attivo */
	if (in_array($item->id, $path)){
		$class .= ' active';
	}
	elseif ($item->type == 'alias'){
		$aliasToId = $item->params->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1]){
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path)){
			$class .= ' alias-parent-active';
		}
	}

	// Render the menu item.
	switch ($item->type) :
		// case 'separator':
		case 'url':
		case 'component':
		// case 'heading':
			require JModuleHelper::getLayoutPath('mod_menu', '/list/list_' . $item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', '/list/list_url');
			break;
	endswitch;
}
?>
</ul>

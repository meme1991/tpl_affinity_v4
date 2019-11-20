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
<?php // ce da mettere la classe mr-auto dal tag nel modulo menu ?>
<?php // bootstrap size ?>
<?php $bootstrap_size = ($params->get('bootstrap_size') == 0) ? '' : '-'.$params->get('bootstrap_size'); ?>
<div class="inline-menu <?php echo $class_sfx ?>">
	<ul class="list-inline" <?php
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

		// delimiter
		$delimiter = $item->params->get('delimiter');
		$delimiter = ($delimiter) ? ' delimiter' : '';

		$class = 'list-inline-item'.$delimiter.' item-' . $item->id;

		// link featured
		$linkfeatured = $item->params->get('linkfeatured-set');
		$linkfeatured_color = '';
		if($linkfeatured){
			$class .= ' featured-htop';
			$linkfeatured_color = $item->params->get('linkfeatured-color');
			if($linkfeatured_color)
				$linkfeatured_color = ' style="background-color: '.$item->params->get('linkfeatured-color').'"';
		}

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

		if ($item->deeper){
			$class     .= ' deeper dropdown';
			// $item->type = 'dropdown';
		}

		if ($item->parent){
			$class .= ' parent';
		}


		if (!empty($class)){
			$class = ' class="' . trim($class) . '"';
		}

		echo '<li' . $class.$linkfeatured_color . '>';

		// Render the menu item.
		switch ($item->type) :
			//case 'separator':
			case 'url':
			case 'component':
			case 'heading':
				require JModuleHelper::getLayoutPath('mod_menu', '/inline/inline_' . $item->type);
				break;

			default:
				require JModuleHelper::getLayoutPath('mod_menu', '/inline/inline_url');
				break;
		endswitch;


		// if ($item->deeper){
		// 	// la prossima voce è più profonda.
		// 	echo '<div class="dropdown-menu inline-menu-dropdown" aria-labelledby="navbarCollapseMenuLink-'.$item->id.'">';
		// 	echo '<div class="inline-menu">';
		// 	echo '<ul class="list-inline">';
		// } elseif ($item->shallower){
		// 	// La prossima voce è meno profonda.
		// 	echo str_repeat('</ul></div></div>', $item->level_diff);
		// }
		// else{
		// 	// La prossima voce è allo stesso livello di profondità.
		// 	echo '</li>';
		// }
		echo '</li>';

		// if ($item->deeper){
		// 	// la prossima voce è più profonda.
		// 	// echo '<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-'.$item->id.'">';
		// 	echo '<div class="collapse" id="navbarCollapseMenuLink-'.$item->id.'">';
		// } else{
		// 	if ($item->shallower){
		// 		// La prossima voce è meno profonda.
		// 		echo str_repeat('</div>', $item->level_diff);
		// 	} else{
		// 		// La prossima voce è allo stesso livello di profondità.
		// 		// ma al primo livello
		// 		if($item->level == 1)
		// 			echo '</li>';
		// 	}
		// }


	}
	?>
	</ul>
</div>

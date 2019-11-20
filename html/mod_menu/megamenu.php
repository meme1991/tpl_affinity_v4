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
<ul class="navbar-nav <?php echo $class_sfx ?>" <?php
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
	/* megamenù setting */

	// $megaWidth   	  = $item->params->get('megamenu-width');
	// $megaLarge      = $item->params->get('megamenu-width-large');
	// $megaContainer  = $item->params->get('megamenu-container');

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

	$class = 'nav-item item-' . $item->id;
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
		$class .= ' deeper dropdown';
	}

	if ($item->parent){
		$class .= ' parent';
	}

	// se la voce è impostata come megamenù
	$megaClass = '';
	$isMega 	= $item->params->get('megamenu-set');
	if($isMega){
		$class      .= ' dropdown mega-dropdown';
		$item->type  = 'megamenu';
		$megaPosName = $item->params->get('megamenu-pos-name');
		$megaClass   = ' megamenu-fw';

		// imposto la classe a seconda del tipo di contenitore
		// switch ($megaWidth) {
		// 	case 0: $megaClass = ' megamenu-fixed'; break;
		// 	case 1: $megaClass = ' megamenu-fw'; break;
		// 	case 2: $megaClass = ' megamenu-width'; break;
		// }
	}

	if (!empty($class)){
		$class = ' class="' . trim($class) . '"';
	}

	// <li> solo per il primo livello di menù, non nei dropdown
	// if($item->level == 1){
	// 	echo '<li' . $class . '>';
	// }

	echo '<li' . $class . '>';

	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'url':
		case 'component':
		case 'heading':
		case 'megamenu':
			require JModuleHelper::getLayoutPath('mod_menu', '/megamenu/megamenu_' . $item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', '/megamenu/megamenu_url');
			break;
	endswitch;

	if ($item->deeper){
		// la prossima voce è più profonda.
		echo '<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-'.$item->id.'">';
		echo '<ul class="list-unstyled">';
	} elseif ($item->shallower){
		// La prossima voce è meno profonda.
		echo str_repeat('</ul></div></li>', $item->level_diff);
	} else{
		// La prossima voce è allo stesso livello di profondità.
		echo '</li>';
	}



	// if ($item->deeper){
	// 	// la prossima voce è più profonda.
	// 	echo '<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-'.$item->id.'">';
	// } else{
	// 	if ($item->shallower){
	// 		// La prossima voce è meno profonda.
	// 		echo str_repeat('</div></li>', $item->level_diff);
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

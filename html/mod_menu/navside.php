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
// ce da mettere la classe mr-auto dal tag nel modulo menu
?>
<nav class="menu-side">
	<div class="nav-side">
		<?php //echo $module->title ?>
		<div class="nav-side__body" id="navsideCollapseMod-<?php echo $module->id ?>">
			<ul class="list-unstyled mb-0 <?php echo $class_sfx ?>" <?php
				$tag = '';
				if ($params->get('tag_id') != null){
					$tag = $params->get('tag_id') . '';
					echo ' id="' . $tag . '"';
				}
			?>>
			<?php
			/* item uno per uno */
			foreach ($list as $i => &$item){
				/* accesskey */
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

				if ($item->deeper){
					$class .= ' deeper dropdown';
				}

				if ($item->parent){
					$class .= ' parent';
				}

				// is megamenu
				if($item->params->get('megamenu-set')){
					$item->type  = "megamenu";
					$megaPosName = $item->params->get('megamenu-pos-name');
					$class      .= ' deeper dropdown parent';
				}

				if (!empty($class)){
					$class = ' class="' . trim($class) . '"';
				}

				echo '<li' . $class . '>';

				// Render the menu item.
				switch ($item->type) :
					case 'separator':
					case 'url':
					case 'component':
					case 'heading':
					case 'megamenu':
						require JModuleHelper::getLayoutPath('mod_menu', '/navside/navside_' . $item->type);
						break;

					default:
						require JModuleHelper::getLayoutPath('mod_menu', '/navside/navside_url');
						break;
				endswitch;

				if ($item->deeper){
					// la prossima voce è più profonda.
					echo '<div class="nav-side__body collapse" id="navsideCollapse-'.$item->id.'">';
					echo '<ul class="list-unstyled mb-0">';
				} elseif ($item->shallower){
					// La prossima voce è meno profonda.
					echo str_repeat('</li></ul></div>', $item->level_diff);
				} else{
					// La prossima voce è allo stesso livello di profondità.
					echo '</li>';
				}

			}
			?>
			</ul>
		</div>
	</div>
</nav>

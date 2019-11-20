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
<?php $bootstrap_size = ($params->get('bootstrap_size') == 0) ? '' : '-'.$params->get('bootstrap_size'); ?>
<div class="col-12 col-sm-12 col-md-6 col-lg<?php echo $bootstrap_size ?> mega-block mb-3 <?php echo $class_sfx ?>">
	<?php if($module->showtitle) : ?>
		<h5 class="mega-block-header d-none d-md-block"><?php echo $module->title ?></h5>
		<h5 class="mega-block-header d-block d-md-none d-flex justify-content-between" data-toggle="collapse" href="#megablockCollapse<?php echo $module->id ?>" aria-expanded="false" aria-controls="megablockCollapse<?php echo $module->id ?>"><?php echo $module->title ?> <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></h5>
	<?php endif; ?>
	<div class="megablockCollapse" id="megablockCollapse<?php echo $module->id ?>">
		<ul class="list-unstyled">

			<?php
			/* item uno per uno */
			foreach ($list as $i => &$item){
				/* icone */
				$iconYN = $item->params->get('menu-icon-yn');
				if($iconYN){
					$icon = $item->params->get('menu-icon');
					$pos  = $item->params->get('menu-icon-pos');
				}

				// accesskey
				$accesskey = '';
				if($item->params->get('accesskey-yn')){
					$accesskey = $item->params->get('accesskey');
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
					// elseif (in_array($aliasToId, $path)){
					// 	$class .= ' alias-parent-active';
					// }
				}

				// link featured
				$linkfeatured = $item->params->get('linkfeatured-set');
				$linkfeatured_color = '';
				if($linkfeatured){
					$class .= ' featured-megamenu';
					$linkfeatured_color = $item->params->get('linkfeatured-color');
					if($linkfeatured_color)
						$linkfeatured_color = ' style="background-color: '.$item->params->get('linkfeatured-color').'"';
				}

				if (!empty($class)){
					$class = ' class="' . trim($class) . '"';
				}

				echo '<li' . $class.$linkfeatured_color . '>';

				// Render the menu item.
				switch ($item->type) :
					case 'separator':
					case 'url':
					case 'component':
					case 'heading':
						require JModuleHelper::getLayoutPath('mod_menu', '/topmegamenu/topmegamenu_' . $item->type);
						break;

					default:
						require JModuleHelper::getLayoutPath('mod_menu', '/topmegamenu/topmegamenu_url');
						break;
				endswitch;

				echo '</li>';
			}
			?>

		</ul>
	</div>
</div>

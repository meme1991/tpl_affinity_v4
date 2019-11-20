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
<div class="wrapper entrypoint">
	<div class="container">
		<div class="row">
			<?php if($module->showtitle) : ?>
			<div class="col-12 title-section">
				<h2><?php echo $module->title ?></h2>
			</div>
			<?php endif; ?>
			<?php
			/* item uno per uno */
			foreach ($list as $i => &$item){
				// accesskey
				$accesskey = '';
				if($item->params->get('accesskey-yn')){
					$accesskey = $item->params->get('accesskey');
				}

				// entrypoint description
				$entrypoint_desc = $item->params->get('entrypoint-desc');

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

				if (!empty($class)){
					$class = ' class="' . trim($class) . '"';
				}

				// Render the menu item.
				switch ($item->type) :
					// case 'separator':
					case 'url':
					case 'component':
					// case 'heading':
						require JModuleHelper::getLayoutPath('mod_menu', '/entrypoint/entrypoint_' . $item->type);
						break;

					default:
						require JModuleHelper::getLayoutPath('mod_menu', '/entrypoint/entrypoint_url');
						break;
				endswitch;
			}
			?>
		</div>
	</div>
</div>

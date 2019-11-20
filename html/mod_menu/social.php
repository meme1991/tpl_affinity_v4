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
<div class="social-bar mb-3 <?php echo $class_sfx ?>">
	<ul class="list-inline mb-0" <?php
		$tag = '';
		if ($params->get('tag_id') != null){
			$tag = $params->get('tag_id') . '';
			echo ' id="' . $tag . '"';
		}
	?>>
	<li class="list-inline-item"><?php echo JText::_('TPL_AFFINITY_PLACEHOLDER_FOLLOWUS') ?></li>
	<?php
	/* item uno per uno */
	foreach ($list as $i => &$item)
	{
		/* icone */
		$iconYN = $item->params->get('menu-icon-yn');
		if($iconYN){
			$icon = $item->params->get('menu-icon');
			$pos  = $item->params->get('menu-icon-pos');
		}

		$class = 'list-inline-item item-' . $item->id;

		if (!empty($class)){
			$class = ' class="' . trim($class) . '"';
		}

		echo '<li' . $class . '>';
		// Render the menu item.
		require JModuleHelper::getLayoutPath('mod_menu', '/social/social_url');
		echo '</li>';
	}
	?>
	</ul>
</div>

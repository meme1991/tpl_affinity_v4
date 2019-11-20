<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$col = ($params->get('bootstrap_size')) ? $params->get('bootstrap_size') : 12;
?>
<?php if($list) : ?>
	<ul class="list-group list-striped list-hover">
    <?php require JModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default') . '_items'); ?>
	</ul>
<?php endif; ?>

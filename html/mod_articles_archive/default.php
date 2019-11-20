<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_archive
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php if (!empty($list)) : ?>
	<ul class="list-group list-striped list-hover archive-module<?php echo $moduleclass_sfx; ?>">
	<?php foreach ($list as $item) : ?>
	<li class="list-group-item">
		<a href="<?php echo $item->link; ?>" title="<?php echo $item->text; ?>">
			<?php echo $item->text; ?>
		</a>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>

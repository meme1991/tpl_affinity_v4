<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

foreach ($list as $item) : ?>
<li class="list-group-item d-flex justify-content-between <?php if ($_SERVER['REQUEST_URI'] === JRoute::_(ContentHelperRoute::getCategoryRoute($item->id))) echo 'active'; ?>">
	<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>" title="<?php echo $item->title; ?>">
		<?php echo $item->title; ?>
	</a>
	<?php if ($params->get('show_children', 0) && (($params->get('maxlevel', 0) == 0)
		|| ($params->get('maxlevel') >= ($item->level - $startLevel)))
		&& count($item->getChildren())) : ?>
	<button class="btn btn-link btn-collapse icon-down btn-sm" type="button" data-toggle="collapse" data-target="#ModCategories-<?php echo $item->id; ?>" aria-expanded="false" aria-controls="ModCategories-<?php echo $item->id; ?>"></button>
	<?php endif; ?>
</li>

	<?php // se la categoria è attiva, allora la faccio vedere espansa se esistono sottocategorie ?>
		<?php if ($params->get('show_children', 0) && (($params->get('maxlevel', 0) == 0)
			|| ($params->get('maxlevel') >= ($item->level - $startLevel)))
			&& count($item->getChildren())) : ?>
			<div class="collapse fade w-100" id="ModCategories-<?php echo $item->id; ?>">
				<ul class="list-group list-striped list-hover list-parent">
				<?php $temp = $list; ?>
				<?php $list = $item->getChildren(); ?>
				<?php require JModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default') . '_items'); ?>
				<?php $list = $temp; ?>
				</ul>
			</div>
		<?php endif; ?>
<?php endforeach; ?>

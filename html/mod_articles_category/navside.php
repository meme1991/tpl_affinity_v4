<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<?php if($list) : ?>
	<ul class="list-unstyled mb-0">
	<?php $k = 0; ?>
	<?php foreach ($list as $group_name => $group) : ?>
		<?php $id = substr(md5($group_name), 1, 5); ?>
		<li class="deeper dropdown parent">
			<a class="nav-side__header nav-side__header--item d-flex justify-content-between align-items-center" data-toggle="collapse" href="#navsideCollapseModCat-<?php echo $id ?>" aria-expanded="false" aria-controls="navsideCollapseModCat-<?php echo $id ?>">
				<?php echo $group_name ?>
				<i class="fa fa-angle-down fa-3x" aria-hidden="true"></i>
			</a>
			<div class="nav-side__body collapse" id="navsideCollapseModCat-<?php echo $id ?>">
				<ul class="list-unstyled mb-0">
				<?php foreach ($group as $item) : ?>
					<li>
						<a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>" class="link-default">
							<?php echo $item->title; ?>
						</a>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		</li>
		<?php $k++; ?>
	<?php endforeach; ?>
	</ul>
<?php else : ?>
	<ul class="list-unstyled mb-0">
	<?php foreach ($list as $item) : ?>
		<li>
			<a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>" class="link-default"><?php echo $item->title; ?></a>
		</li>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>

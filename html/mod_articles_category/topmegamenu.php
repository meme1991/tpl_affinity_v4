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
<?php $bootstrap_size = ($params->get('bootstrap_size') == 0) ? '' : '-'.$params->get('bootstrap_size'); ?>

<?php $catid = $params->get('catid'); ?>
<?php if(count($catid) == 1) : ?>
	<?php $catid = $catid[0]; ?>
<?php else: ?>
	<?php echo json_encode(array("Categories Error" => "Too many categories selected")); ?>
<?php endif; ?>

<?php if($list) : ?>
	<?php if ($grouped) : ?>
		<?php echo json_encode(array("Layout Error" => "Group Layout not supported")); ?>
	<?php else : ?>
		<div class="col-12 col-sm-12 col-md-6 col-lg<?php echo $bootstrap_size ?> mega-block mb-3">
			<?php if($module->showtitle) : ?>
				<?php $cat_link = JRoute::_(ContentHelperRoute::getCategoryRoute($catid)); ?>
				<?php $module->title = "<a href='".$cat_link."' title='".$module->title."'>".$module->title."<i class=\"fas fa-chevron-right ml-2\"></i></a>"; ?>
				<h5 class="mega-block-header d-none d-md-block"><?php echo $module->title ?></h5>
				<h5 class="mega-block-header d-block d-md-none d-flex justify-content-between" data-toggle="collapse" href="#megablockCollapse<?php echo $module->id ?>" aria-expanded="false" aria-controls="megablockCollapse<?php echo $module->id ?>"><?php echo $module->title ?> <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></h5>
			<?php endif; ?>
			<div class="megablockCollapse" id="megablockCollapse<?php echo $module->id ?>">
				<ul class="list-unstyled">
					<?php foreach ($list as $item) : ?>
						<li>
							<a href="<?= $item->link; ?>" title="<?= $item->title; ?>" class="dropdown-item"><?= $item->title; ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>

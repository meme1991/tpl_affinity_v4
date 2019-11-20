<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php $bootstrap_size = ($params->get('bootstrap_size') == 0) ? '' : '-'.$params->get('bootstrap_size'); ?>
<?php if($list) : ?>
	<div class="col-12 col-sm-12 col-md-6 col-lg<?php echo $bootstrap_size ?> mega-block mb-3">
		<?php if($module->showtitle) : ?>
			<?php $parent_link = JRoute::_(ContentHelperRoute::getCategoryRoute($params->get('parent'))); ?>
			<?php $module->title = "<a href='".$parent_link."' title='".$module->title."'>".$module->title."<i class=\"fas fa-chevron-right ml-2\"></i></a>"; ?>
			<h5 class="mega-block-header d-none d-md-block"><?php echo $module->title ?></h5>
			<h5 class="mega-block-header d-block d-md-none d-flex justify-content-between" data-toggle="collapse" href="#megablockCollapse<?php echo $module->id ?>" aria-expanded="false" aria-controls="megablockCollapse<?php echo $module->id ?>"><?php echo $module->title ?> <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i></h5>
		<?php endif; ?>
		<div class="megablockCollapse" id="megablockCollapse<?php echo $module->id ?>">
			<ul class="list-unstyled">
				<?php require JModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'default') . '_items'); ?>
			</ul>
		</div>
	</div>
<?php endif; ?>

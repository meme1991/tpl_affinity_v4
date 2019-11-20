<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="wrapper com_users profile bg-light-gray <?php echo $this->pageclass_sfx; ?>">
	<div class="container">
		<div class="row justify-content-center">
			<?php //if ($this->params->get('show_page_heading')) : ?>
			<div class="col-12 col-sm-12 col-md-8">
				<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->params->get('page_heading'))) ?>
			</div>
			<?php //endif; ?>

			<?php if (JFactory::getUser()->id == $this->data->id) : ?>
				<div class="col-12 col-sm-12 col-md-8 mt-3">
					<div class="toolbar">
						<!-- render module -->
						<?php $modules = JModuleHelper::getModules('account'); ?>
						<?php //$attribs['style'] = 'sidebar'; ?>
						<?php foreach ($modules AS $module ) : ?>
							<?php echo JModuleHelper::renderModule($module); ?>
						<?php endforeach; ?>
						<!-- render module -->
					</div>
				</div>
			<?php endif; ?>
		</div>
		<?php echo $this->loadTemplate('core'); ?>
		<?php echo $this->loadTemplate('params'); ?>
		<?php echo $this->loadTemplate('custom'); ?>
	</div>
</div>

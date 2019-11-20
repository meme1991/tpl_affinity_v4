<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="wrapper com_users profile <?php echo $this->pageclass_sfx; ?>">
	<div class="container">
		<div class="row mb-5">
			<?php //if ($this->params->get('show_page_heading')) : ?>
				<div class="col-12 mb-5">
					<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->params->get('page_heading'))) ?>
				</div>
			<?php //endif; ?>

			<div class="col-12 col-sm-12 col-md d-flex align-items-center action-block">
				<a href="<?php echo JRoute::_("index.php?".$_SERVER['QUERY_STRING']."&layout=default_core"); ?>">
					<span class="fa-stack fa-2x">
					  <i class="fas fa-circle fa-stack-2x text-light"></i>
					  <i class="fas fa-user fa-stack-1x text-primary"></i>
					</span>
					<span class="ml-3"><?= JText::_("TPL_AFFINITY_PROFILE") ?></span>
				</a>
			</div>
			<?php if (JFactory::getUser()->id == $this->data->id) : ?>
				<div class="col-12 col-sm-12 col-md d-flex align-items-center action-block">
					<a href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id=' . (int) $this->data->id); ?>">
						<span class="fa-stack fa-2x">
						  <i class="fas fa-circle fa-stack-2x text-light"></i>
						  <i class="fas fa-edit fa-stack-1x text-primary"></i>
						</span>
						<span class="ml-3"><?= JText::_("TPL_AFFINITY_EDIT_PROFILE") ?></span>
					</a>
				</div>
			<?php endif; ?>

			<div class="col-12 col-sm-12 col-md d-flex align-items-center action-block">
				<a href="<?php echo JRoute::_("index.php?".$_SERVER['QUERY_STRING']."&layout=default_params"); ?>">
					<span class="fa-stack fa-2x">
					  <i class="fas fa-circle fa-stack-2x text-light"></i>
					  <i class="fas fa-cog fa-stack-1x text-primary"></i>
					</span>
					<span class="ml-3"><?= JText::_("TPL_AFFINITY_SETTINGS") ?></span>
				</a>
			</div>

		</div>
	</div>
</div>

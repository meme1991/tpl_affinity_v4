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
<div class="wrapper container com_users profile <?php echo $this->pageclass_sfx; ?>">
	<div class="row justify-content-center">
		<?php if ($this->params->get('show_page_heading')) : ?>
			<div class="col-12">
				<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->params->get('page_heading'))) ?>
			</div>
		<?php endif; ?>
		<?php echo $this->loadTemplate('core'); ?>
		<?php echo $this->loadTemplate('params'); ?>
		<?php //echo $this->loadTemplate('custom'); ?>
	</div>
</div>

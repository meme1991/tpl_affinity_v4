<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note that there are certain parts of this layout used only when there is exactly one tag.

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
$description = $this->params->get('all_tags_description');
$descriptionImage = $this->params->get('all_tags_description_image');
?>
<section class="wrapper tags-list <?php echo $this->pageclass_sfx; ?>">
	<div class="container">
		<div class="row">
			<?php if ($this->params->get('all_tags_show_description_image') && !empty($descriptionImage)) : ?>
				<?php echo JLayoutHelper::render('joomla.content.cover_image', array('image' => $descriptionImage, 'alt' => $this->params->get('page_heading'))); ?>
			<?php endif; ?>

			<?php if ($this->params->get('show_page_heading')) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->params->get('page_heading'))) ?>
			<?php endif; ?>

			<?php if (!empty($description)) : ?>
				<div class="col-12 mt-3">
					<p><?php echo $description; ?></p>
				</div>
			<?php endif; ?>

			<div class="col-12 mt-3">
				<?php echo $this->loadTemplate('items'); ?>
			</div>

		</div>
	</div>
</section>

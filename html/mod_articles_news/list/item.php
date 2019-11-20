<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<li class="list-group-item">
	<?php if ($params->get('item_title')) : ?>
		<?php if ($item->link !== '' && $params->get('link_titles')) : ?>
			<a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
				<?php echo $item->title; ?>
			</a>
		<?php else : ?>
			<?php echo $item->title; ?>
		<?php endif; ?>
	<?php endif; ?>
	<!-- <small class="d-block icon-clock"><?php echo JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC1')); ?></small> -->
</li>

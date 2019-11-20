<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_related_items
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<ul class="list-group list-striped list-hover">
<?php foreach ($list as $item) : ?>
	<li class="list-group-item flex-column align-items-start">
		<a href="<?php echo $item->route; ?>" title="<?php echo $item->title; ?>"><?php echo $item->title; ?></a>
		<?php if ($showDate) : ?>
			<small class="icon-clock d-block" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_PUBLISH_DATE') ?>"><?php echo JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC1')) ?></small>
		<?php endif; ?>
	</li>
<?php endforeach; ?>
</ul>

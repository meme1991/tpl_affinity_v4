<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

?>
<small class="text-uppercase" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_CATEGORY') ?>">
	<?php $title = $this->escape($displayData['item']->category_title); ?>
	<?php if ($displayData['params']->get('link_category') && $displayData['item']->catslug) : ?>
		<?php $url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($displayData['item']->catslug)) . '" itemprop="genre">' . $title . '</a>'; ?>
		<?php echo JText::sprintf($url); ?>
	<?php else : ?>
		<?php echo JText::sprintf('<span itemprop="genre">' . $title . '</span>'); ?>
	<?php endif; ?>
</small>

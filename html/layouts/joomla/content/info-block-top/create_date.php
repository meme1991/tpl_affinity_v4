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
<small class="d-none d-md-block" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_CREATED_DATE') ?>" itemprop="datePublished" content="<?php echo JHtml::_('date', $displayData['item']->created, JText::_('Y-m-d')) ?>">
	<span class="sr-only"><?php echo JText::_('TPL_AFFINITY_CREATED_DATE') ?></span>
	<?php echo JHtml::_('date', $displayData['item']->created, JText::_('DATE_FORMAT_LC1')); ?>
</small>

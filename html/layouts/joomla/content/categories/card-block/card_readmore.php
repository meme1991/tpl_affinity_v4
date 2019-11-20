<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$item   = $displayData['item'];
$link   = JRoute::_(ContentHelperRoute::getCategoryRoute($item->id, $item->language));
?>
<a href="<?php echo $link ?>" class="btn btn-primary btn-block icon-go" title="<?php echo $this->escape($item->title) ?>">
  <?php echo JText::_('TPL_AFFINITY_ACCESS') ?>
</a>

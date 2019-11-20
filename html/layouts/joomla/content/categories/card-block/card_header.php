<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$item  = $displayData['item'];
$link  = JRoute::_(ContentHelperRoute::getCategoryRoute($item->id, $item->language))
?>
<!-- titolo -->
<h4 class="card-title">
  <a href="<?php echo $link ?>" title="<?php echo $item->title ?>">
    <?php echo $item->title ?>
  </a>
</h4>
<!-- titolo -->

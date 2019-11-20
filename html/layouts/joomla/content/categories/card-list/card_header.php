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
$link  = JRoute::_(ContentHelperRoute::getCategoryRoute($item->id, $item->language));
?>
<div class="list-h d-md-flex justify-content-md-between">
  <!-- titolo -->
  <h4 class="card-title d-inline mb-3">
    <a href="<?php echo $link ?>" title="<?php echo $item->title ?>">
      <?php echo $item->title ?>
    </a>
  </h4>
  <!-- titolo -->

  <div class="">
    <a href="<?php echo $link ?>" class="btn btn-primary btn-radius" title="<?php echo $this->escape($item->title) ?>">
      <i class="fas fa-arrow-right"></i>
    </a>
  </div>
</div>

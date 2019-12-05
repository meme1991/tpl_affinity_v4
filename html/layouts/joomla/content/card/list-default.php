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
<article class="card card-list" itemscope="" itemtype="http://schema.org/Article">
  <!-- <div class="row"> -->
    <!-- <div class="col-4 card-image d-flex align-items-stretch">

    </div> -->
    <div class="card-image">
      <?php echo JLayoutHelper::render('joomla.content.card.list-default.list_image', $displayData); ?>
    </div>
    <div class="card-block">
      <?php echo JLayoutHelper::render('joomla.content.card.list-default.list_header', $displayData); ?>
      <?php echo JLayoutHelper::render('joomla.content.card.list-default.list_intro', $displayData); ?>
      <?php echo JLayoutHelper::render('joomla.content.card.list-default.list_readmore', $displayData); ?>
    </div>
  <!-- </div> -->
</article>

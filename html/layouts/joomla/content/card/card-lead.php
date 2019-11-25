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
<article class="card card-lead" itemscope="" itemtype="http://schema.org/Article">
  <div class="container-fluid">
    <div class="row">
      <div class="col-6 lead-image">
        <?php echo JLayoutHelper::render('joomla.content.card.card-lead.card_image', $displayData); ?>
      </div>
      <div class="col-6 lead-text">
        <?php echo JLayoutHelper::render('joomla.content.card.card-lead.card_header', $displayData); ?>
        <?php echo JLayoutHelper::render('joomla.content.card.card-lead.card_intro', $displayData); ?>
        <?php echo JLayoutHelper::render('joomla.content.card.card-lead.card_readmore', $displayData); ?>
      </div>
    </div>
  </div>
</article>


<?php //echo JLayoutHelper::render('joomla.content.card.card-lead.card_image', $displayData); ?>
<!-- <div class="card-block"> -->
  <?php //echo JLayoutHelper::render('joomla.content.card.card-lead.card_header', $displayData); ?>
  <?php //echo JLayoutHelper::render('joomla.content.card.card-lead.card_intro', $displayData); ?>
  <?php //echo JLayoutHelper::render('joomla.content.card.card-lead.card_readmore', $displayData); ?>
<!-- </div> -->

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
<article class="card card-default" itemscope="" itemtype="http://schema.org/Article">
  <?php echo JLayoutHelper::render('joomla.content.card.card-default.card_image', $displayData); ?>
  <div class="card-block">
    <?php echo JLayoutHelper::render('joomla.content.card.card-default.card_header', $displayData); ?>
    <?php echo JLayoutHelper::render('joomla.content.card.card-default.card_intro', $displayData); ?>
    <?php echo JLayoutHelper::render('joomla.content.card.card-default.card_readmore', $displayData); ?>
  </div>
</article>

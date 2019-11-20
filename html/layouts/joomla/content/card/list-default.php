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
<article class="col-12 card list-default p-3" itemscope="" itemtype="http://schema.org/Article">
  <?php echo JLayoutHelper::render('joomla.content.card.list-default.list_header', $displayData); ?>
  <div class="list-body">
    <?php echo JLayoutHelper::render('joomla.content.card.list-default.list_image', $displayData); ?>
    <?php echo JLayoutHelper::render('joomla.content.card.list-default.list_intro', $displayData); ?>
  </div>
  <?php echo JLayoutHelper::render('joomla.content.card.list-default.list_readmore', $displayData); ?>
</article>

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
<div class="card card-block py-3 mb-3">
  <?php echo JLayoutHelper::render('joomla.content.categories.card-block.card_header', $displayData); ?>
  <?php echo JLayoutHelper::render('joomla.content.categories.card-block.card_image', $displayData); ?>
  <?php echo JLayoutHelper::render('joomla.content.categories.card-block.card_intro', $displayData); ?>
  <?php echo JLayoutHelper::render('joomla.content.categories.card-block.card_readmore', $displayData); ?>
</div>

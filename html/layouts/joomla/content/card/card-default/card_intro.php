<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$params  = $displayData->params;
$catLink = JRoute::_(ContentHelperRoute::getCategoryRoute($displayData->catid));
?>
<?php if($params->get('show_intro')) : ?>
  <div class="card-text">
  <?php if($displayData->fulltext != '') : // >>> è settato il leggi tutto... ?>
    <?php echo $displayData->introtext ?>
  <?php else: // >>> leggi tutto non è settato... ?>
    <p><?php echo JHtml::_('string.truncate', strip_tags($displayData->introtext), 300) ?></p>
  <?php endif; ?>
  </div>
<?php endif; ?>

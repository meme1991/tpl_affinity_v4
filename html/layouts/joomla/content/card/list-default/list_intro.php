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

  <?php if($displayData->fulltext != '') : // >>> è settato il leggi tutto... ?>
    <div class="card-text">
      <?php echo $displayData->introtext ?>
    </div>
  <?php else: // >>> leggi tutto non è settato... ?>
    <p class="card-text">
      <?php echo JHtml::_('string.truncate', strip_tags($displayData->introtext), 300) ?>
    </p>
  <?php endif; ?>

<?php endif; ?>

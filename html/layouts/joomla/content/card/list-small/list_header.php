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
$link    = JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language));
$catLink = JRoute::_(ContentHelperRoute::getCategoryRoute($displayData->catid));
?>

<div class="d-flex justify-content-between">
  <?php if($params->get('show_publish_date')) : ?>
    <small class="icon-clock" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_PUBLISH_DATE') ?>">
      <span class="sr-only"><?php echo JText::_('TPL_AFFINITY_PUBLISH_DATE') ?></span>
      <?php echo JHtml::_('date', $displayData->publish_up, JText::_('DATE_FORMAT_LC1')) ?>
    </small>
  <?php endif; ?>

  <?php if($params->get('show_category')) : ?>
    <small data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_CATEGORY') ?>">
      <span class="sr-only"><?php echo JText::_('TPL_AFFINITY_CATEGORY') ?></span>
      <?php if($params->get('link_category')) : ?>
      <a href="<?php echo $catLink ?>">
        <?php echo $displayData->category_title ?>
      </a>
      <?php else: ?>
        <?php echo $displayData->category_title ?>
      <?php endif; ?>
    </small>
  <?php endif; ?>
</div>
<!-- titolo -->
<?php if($params->get('show_title')) : ?>
  <h4>
    <?php if($params->get('link_titles')) : ?>
      <a href="<?php echo $link ?>" title="<?php echo $displayData->title ?>">
        <?php echo $displayData->title ?>
      </a>
    <?php else : ?>
      <?php echo $displayData->title ?>
    <?php endif; ?>
  </h4>
<?php endif; ?>
<!-- titolo -->

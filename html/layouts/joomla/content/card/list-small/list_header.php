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
<div class="list-header d-flex justify-content-between">
  <!-- date -->
  <meta itemprop="dateModified" content="<?php echo JHtml::_('date', $displayData->modified, JText::_('Y-m-d')) ?>">

  <?php if($params->get('show_publish_date')) : ?>
    <small class="list-published" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_PUBLISH_DATE') ?>" itemprop="datePublished" content="<?php echo JHtml::_('date', $displayData->publish_up, JText::_('Y-m-d')) ?>">
      <span class="sr-only"><?php echo JText::_('TPL_AFFINITY_PUBLISH_DATE') ?></span>
      <?php echo JHtml::_('date', $displayData->publish_up, JText::_('D, d M Y')) ?>
    </small>
  <?php else : ?>
    <meta itemprop="datePublished" content="<?php echo JHtml::_('date', $displayData->publish_up, JText::_('Y-m-d')) ?>">
  <?php endif; ?>
  <!-- date -->

  <?php if($params->get('show_category')) : ?>
    <small class="list-category" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_CATEGORY') ?>">
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
  <h4 class="list-title" itemprop="headline" content="<?php echo $displayData->title ?>">
    <?php if($params->get('link_titles')) : ?>
      <a href="<?php echo $link ?>" title="<?php echo $displayData->title ?>">
        <?php echo $displayData->title ?>
      </a>
    <?php else : ?>
      <?php echo $displayData->title ?>
    <?php endif; ?>
  </h3>
<?php endif; ?>
<!-- titolo -->

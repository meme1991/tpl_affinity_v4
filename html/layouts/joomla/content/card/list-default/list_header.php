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

$app            = JFactory::getApplication();
$templateparams	= $app->getTemplate(true)->params;
$logo_s         = $templateparams->get('logo-s');
?>

<div class="list-h">

  <!-- meta informazioni solo per aziende o comuni -->
  <span itemprop="author" itemscope="" itemtype="https://schema.org/Person">
    <meta itemprop="name" content="<?php echo JFactory::getApplication()->get('sitename') ?>">
  </span>

  <span itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
    <span itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
      <meta itemprop="url" content="<?php echo JURI::base().$logo_s ?>">
    </span>
    <meta itemprop="name" content="<?php echo JFactory::getApplication()->get('sitename') ?>">
  </span>

  <div class="d-flex justify-content-between">
    <!-- date -->
    <div class="d-flex justify-content-start">
      <?php if($params->get('show_create_date')) : ?>
        <small data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_CREATED_DATE') ?>">
          <span class="sr-only"><?php echo JText::_('TPL_AFFINITY_CREATED_DATE') ?></span>
          <?php echo JHtml::_('date', $displayData->created, JText::_('DATE_FORMAT_LC1')) ?>
        </small>
      <?php endif; ?>

      <?php if($params->get('show_modify_date')) : ?>
        <small data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_MODIFIED_DATE') ?>" itemprop="dateModified" content="<?php echo JHtml::_('date', $displayData->modified, JText::_('Y-m-d')) ?>">
          <i class="fa fa-pencil-square-o"></i>
          <span class="sr-only"><?php echo JText::_('TPL_AFFINITY_MODIFIED_DATE') ?></span>
          <?php echo JHtml::_('date', $displayData->modified, JText::_('DATE_FORMAT_LC1')) ?>
        </small>
      <?php else : ?>
        <meta itemprop="dateModified" content="<?php echo JHtml::_('date', $displayData->modified, JText::_('Y-m-d')) ?>">
      <?php endif; ?>

      <?php if($params->get('show_publish_date')) : ?>
        <small class="icon-clock" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_PUBLISH_DATE') ?>" itemprop="datePublished" content="<?php echo JHtml::_('date', $displayData->publish_up, JText::_('Y-m-d')) ?>">
          <span class="sr-only"><?php echo JText::_('TPL_AFFINITY_PUBLISH_DATE') ?></span>
          <?php echo JHtml::_('date', $displayData->publish_up, JText::_('DATE_FORMAT_LC1')) ?>
        </small>
      <?php else : ?>
        <meta itemprop="datePublished" content="<?php echo JHtml::_('date', $displayData->publish_up, JText::_('Y-m-d')) ?>">
      <?php endif; ?>
    </div>
    <!-- date -->

    <!-- autore e categoria -->
    <?php if($params->get('show_category') OR $params->get('show_author')) : ?>
    <div class="d-flex justify-content-end">
      <?php if($params->get('show_category')) : ?>
        <small class="card-category" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_CATEGORY') ?>">
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

      <?php if($params->get('show_author')) : ?>
        <?php $author = ($displayData->created_by_alias ?: $displayData->author); ?>
        <small class="card-author" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_AUTHOR') ?>" itemprop="author" itemscope="" itemtype="https://schema.org/Person" content="<?php echo $author ?>">
          <span class="sr-only"><?php echo JText::_('TPL_AFFINITY_AUTHOR') ?></span>
          <?php if($params->get('link_author')) : ?>
          <a href="<?php echo $displayData->contact_link ?>" itemprop="name">
            <?php echo $author ?>
          </a>
          <?php else: ?>
            <?php echo $author ?>
          <?php endif; ?>
        </small>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    <!-- autore e categoria -->
  </div>

  <!-- titolo -->
  <?php if($params->get('show_title')) : ?>
    <h3 class="card-title mb-3" itemprop="headline" content="<?php echo $displayData->title ?>">
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
</div>

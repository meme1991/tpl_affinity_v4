<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$params = $displayData->params;
$link   = JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language));
?>
<?php if($params->get('show_readmore')) : ?>
<div class="d-flex justify-content-end">
  <?php if($params->get('show_readmore')) : ?>
    <a href="<?php echo $link ?>" class="btn btn-primary btn-sm icon-go" title="<?php echo $this->escape($displayData->title) ?>" itemscope="" itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="<?php echo $link ?>">
      <?php echo JText::_('TPL_AFFINITY_READ_MORE') ?>
    </a>
  <?php endif; ?>
</div>
<?php endif; ?>

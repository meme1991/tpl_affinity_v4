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
// $catLink = JRoute::_(ContentHelperRoute::getCategoryRoute($displayData->catid));
?>
<!-- titolo -->
<?php if($params->get('show_title')) : ?>
  <h4 class="card-title">
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

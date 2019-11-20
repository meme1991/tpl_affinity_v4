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
  <a href="<?php echo $link ?>" class="btn btn-primary btn-block icon-go" title="<?php echo $this->escape($displayData->title) ?>">
    <?php echo JText::_('TPL_AFFINITY_ACCESS') ?>
  </a>
<?php endif; ?>

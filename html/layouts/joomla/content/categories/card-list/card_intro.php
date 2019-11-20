<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$item   = $displayData['item'];
$params = $displayData['params'];
?>
<?php if ($params->get('show_subcat_desc_cat') == 1) : ?>
  <?php if ($item->description) : ?>
    <p class="card-text">
      <?php echo JHtml::_('string.truncate', strip_tags($item->description), 200) ?>
    </p>
  <?php endif; ?>
<?php endif; ?>

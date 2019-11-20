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
$limit = ($params->get('introtext_limit')) ? $params->get('introtext_limit') : 200;
?>
<?php if($params->get('show_intro')) : ?>
  <p class="card-text"><?php echo JHtml::_('string.truncate', strip_tags($displayData->introtext), $limit) ?></p>
<?php endif; ?>

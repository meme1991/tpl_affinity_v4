<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$attributes = array();

$flink  = JFilterOutput::ampReplace(htmlspecialchars($item->flink));

if ($item->anchor_title)
	$attributes['title'] = $item->anchor_title;
else
	$attributes['title'] = $item->title;

if ($item->anchor_css)
	$attributes['class'] = $item->anchor_css;

if ($item->anchor_rel)
	$attributes['rel'] = $item->anchor_rel;

switch ($item->browserNav) {
	case   1: $attributes['target'] = '_blank'; break;
	case   2: $attributes['target'] = '_parent'; break;
}

// costruisco il titolo del links
$title = '<span class="fa-stack">
					  <i class="fas fa-circle fa-stack-2x"></i>
					  <i class="'.$icon.' fa-stack-1x fa-inverse"></i>
					</span>';
?>
<?php echo JHtml::_('link', JFilterOutput::ampReplace(htmlspecialchars($flink, ENT_COMPAT, 'UTF-8', false)), $title, $attributes); ?>

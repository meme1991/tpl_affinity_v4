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
	$attributes['class'] = trim($item->anchor_css);

if ($item->anchor_rel)
	$attributes['rel'] = $item->anchor_rel;

switch ($item->browserNav) {
	case   1: $attributes['target'] = '_blank'; break;
	case   2: $attributes['target'] = '_parent'; break;
}

if ($accesskey)
	$attributes['accesskey'] = $accesskey;

// costruisco il titolo del links se ci sono delle icone
$title = $item->title;
?>
<div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-3 entrypoint-default">
  <div class="top d-flex align-items-center clearfix">
    <div class="icon float-left d-flex justify-content-center align-items-center">
      <i class="svg-icon <?php echo $icon ?> fa-2x"></i>
    </div>
    <h3 class="mb-0">
      <?php echo JHtml::_('link', JFilterOutput::ampReplace(htmlspecialchars($flink, ENT_COMPAT, 'UTF-8', false)), $title, $attributes); ?>
    </h3>
  </div>
  <div class="bottom mt-3">
		<?php if($entrypoint_desc) : ?>
	    <p><?php echo $entrypoint_desc ?></p>
		<?php endif; ?>
    <!-- <p><a href="<?php echo $flink ?>" title="<?php echo $title ?>"><?php echo JText::_("TPL_AFFINITY_GO") ?> <i class="fal fa-long-arrow-right"></i></a></p> -->
  </div>
</div>

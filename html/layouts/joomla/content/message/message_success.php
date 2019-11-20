<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

if(is_array($displayData)){
  $title = $displayData['title'];
  $msg   = $displayData['msg'];
}else{
  $title = "TPL_AFFINITY_MESSAGE_HEADER_SUCCESS";
  $msg   = $displayData;
}
?>
<div class="alert alert-success" role="alert">
  <i class="icon far fa-check-circle"></i>
  <h6><?= JText::_($title) ?></h6>
  <p><?= $msg ?></p>
</div>

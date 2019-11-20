<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout - Titolo sezione 
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
?>
<?php if($displayData->showtitle) : ?>
<div class="col-12 title-section mb-3">
  <h2><?php echo $displayData->title ?></h2>
</div>
<?php endif; ?>

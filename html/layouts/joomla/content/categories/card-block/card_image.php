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
$link   = JRoute::_(ContentHelperRoute::getCategoryRoute($item->id, $item->language));
$alt    = ($item->getParams()->get('image_alt') != '') ? $item->getParams()->get('image_alt') : $item->title;
?>
<?php if ($params->get('show_description_image') && $item->getParams()->get('image')) : ?>
  <figure class="default">
    <img src="<?php echo $item->getParams()->get('image'); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($alt, ENT_COMPAT, 'UTF-8'); ?>" />
    <figcaption class="d-flex justify-content-center align-items-center">
      <i class="far fa-external-link fa-3x" aria-hidden="true"></i>
    </figcaption>
    <a href="<?php echo $link ?>" title="<?php echo $item->title ?>"></a>
  </figure>
<?php endif; ?>

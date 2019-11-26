<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
$image = $displayData['image'];
$alt   = $displayData['alt'];
?>
<figure class="cover-image" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
	<img src="<?php echo $image ?>" alt="<?php echo $alt ?>" itemprop="url">
</figure>

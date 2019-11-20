<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Letters 'a' to 'e'
foreach (range('a', 'e') as $char) :
	$link = $this->contact->params->get('link' . $char);
	$label = $this->contact->params->get('link' . $char . '_name');

	if (!$link) :
		continue;
	endif;

	// Add 'http://' if not present
	$link = (0 === strpos($link, 'http')) ? $link : 'http://' . $link;

	// If no label is present, take the link
	$label = $label ?: $link;
	?>
	<div class="field">
		<h4 class="fw-600 icon-link"><?php echo $label; ?></h4>
		<a href="<?php echo $link; ?>" itemprop="url"><?php echo $label; ?></a>
	</div>
<?php endforeach; ?>

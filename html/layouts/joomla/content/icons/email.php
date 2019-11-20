<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$params = $displayData['params'];
$legacy = $displayData['legacy'];

?>
<?php if ($params->get('show_icons')) : ?>
	<?php if ($legacy) : ?>
		<?php echo JHtml::_('image', 'system/emailButton.png', JText::_('JGLOBAL_EMAIL'), null, true); ?>
	<?php else : ?>
		<span class="fa-stack fa-sm">
		  <i class="fas fa-circle fa-stack-2x"></i>
		  <i class="fal fa-envelope fa-stack-1x fa-inverse"></i>
		</span>
	<?php endif; ?>
<?php else : ?>
<?php endif; ?>

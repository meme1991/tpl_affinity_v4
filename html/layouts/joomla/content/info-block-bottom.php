<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
//$blockPosition = $displayData['params']->get('info_block_position', 0);
?>
<?php if($displayData['params']->get('show_hits') OR $displayData['params']->get('show_modify_date')) : ?>
<div class="article-info-bottom sep-line-top pt-2 d-flex justify-content-between">
	<!-- VISITE -->
	<?php if ($displayData['params']->get('show_hits')) : ?>
		<?php echo $this->sublayout('hits', $displayData); ?>
	<?php endif; ?>

	<!-- DATA DI UTLIMA MODIFICA -->
	<?php if ($displayData['params']->get('show_modify_date')) : ?>
		<?php echo $this->sublayout('modify_date', $displayData); ?>
	<?php endif; ?>
</div>
<?php endif; ?>
<meta itemprop="dateModified" content="<?php echo JHtml::_('date', $displayData['item']->modified, JText::_('Y-m-d')) ?>">

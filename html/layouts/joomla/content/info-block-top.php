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
<div class="article-info-top">
	<!-- CATEGORIA DI APPARTENENZA -->
	<?php if ($displayData['params']->get('show_category')) : ?>
		<div class="d-flex justify-content-between">
			<?php echo $this->sublayout('category', $displayData); ?>
		</div>
	<?php endif; ?>

	<!-- DATA PUBBLICAZIONE, CREAZIONE E AUTORE -->
	<?php if ($displayData['params']->get('show_publish_date') OR $displayData['params']->get('show_create_date') OR $displayData['params']->get('show_author')) : ?>
		<div class="d-flex justify-content-between mt-2">
			<?php if ($displayData['params']->get('show_publish_date')) : ?>
				<?php echo $this->sublayout('publish_date', $displayData); ?>
			<?php endif; ?>

			<?php if ($displayData['params']->get('show_create_date')) : ?>
				<?php echo $this->sublayout('create_date', $displayData); ?>
			<?php endif; ?>

			<?php if ($displayData['params']->get('show_author') && !empty($displayData['item']->author )) : ?>
				<?php echo $this->sublayout('author', $displayData); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>

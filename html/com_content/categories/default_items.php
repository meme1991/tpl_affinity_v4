<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php if ($this->maxLevelcat != 0 && count($this->items[$this->parent->id]) > 0) : ?>
	<?php foreach ($this->items[$this->parent->id] as $id => $item) : ?>
		<?php if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) : ?>
			<div class="col-12 col-sm-12 col-md-6 col-lg-4">
				<?php echo JLayoutHelper::render('joomla.content.categories.card-block',  array('item' => $item, 'params' => $this->params)); ?>
			</div>

			<?php // EVENTUALI LIVELLI DI SOTTOCATEGORIE ?>
			<?php if (count($item->getChildren()) > 0 && $this->maxLevelcat > 1) : ?>
				<?php $this->items[$item->id] = $item->getChildren(); ?>
				<?php $this->parent = $item; ?>
				<?php $this->maxLevelcat--; ?>
				<?php echo $this->loadTemplate('items'); ?>
				<?php $this->parent = $item->getParent(); ?>
				<?php $this->maxLevelcat++; ?>
			<?php endif; ?>
			<?php // EVENTUALI LIVELLI DI SOTTOCATEGORIE ?>

		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>

<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

$lang  = JFactory::getLanguage();
?>
<?php if ($this->maxLevel != 0 && count($this->children[$this->category->id]) > 0) : ?>
	<?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
		<?php if ($this->params->get('show_empty_categories') || $child->numitems || count($child->getChildren())) : ?>
			<li class="list-group-item d-flex justify-content-between">
			<?php if ($lang->isRtl()) : ?>
				<!-- categoria padre -->
				<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($child->id)); ?>" title="<?php echo $this->escape($child->title); ?>">
					<?php echo $this->escape($child->title); ?>
				</a>
				<?php if (count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
					<button class="btn btn-link btn-collapse icon-down btn-sm ml-auto" type="button" data-toggle="collapse" data-target="#category-<?php echo $child->id; ?>" aria-expanded="false" aria-controls="category-<?php echo $child->id; ?>"></button>
				<?php endif; ?>
				<!-- end categoria padre -->
			<?php else : ?>
				<!-- categoria figlio -->
				<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($child->id)); ?>" title="<?php echo $this->escape($child->title); ?>">
					<?php echo $this->escape($child->title); ?>
				</a>
				<?php if (count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
					<button class="btn btn-link btn-collapse icon-down btn-sm ml-auto" type="button" data-toggle="collapse" data-target="#category-<?php echo $child->id; ?>" aria-expanded="false" aria-controls="category-<?php echo $child->id; ?>"></button>
				<?php endif; ?>

				<!-- end categoria figlio -->
			<?php endif; ?>
			</li>

			<?php if (count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
			<div class="collapse w-100" id="category-<?php echo $child->id; ?>">
				<ul class="list-group children-list list-striped list-hover list-parent">
				<?php
				$this->children[$child->id] = $child->getChildren();
				$this->category = $child;
				$this->maxLevel--;
				echo $this->loadTemplate('children');
				$this->category = $child->getParent();
				$this->maxLevel++;
				?>
				</ul>
			</div>
			<?php endif; ?>

		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>

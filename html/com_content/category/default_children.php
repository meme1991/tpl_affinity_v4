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

$class = ' class="first"';
$lang  = JFactory::getLanguage();
?>
<?php if (count($this->children[$this->category->id]) > 0) : ?>
	<ul class="list-group children-list list-striped list-hover">
	<?php foreach ($this->children[$this->category->id] as $id => $child) : ?>

		<?php if ($this->params->get('show_empty_categories') || $child->getNumItems(true) || count($child->getChildren())) : ?>
			<?php if (!isset($this->children[$this->category->id][$id + 1])) : ?>
				<?php $class = ' class="last"'; ?>
			<?php endif; ?>

			<li class="list-group-item">
			<?php if ($lang->isRtl()) : ?>
				<!-- categoria padre -->
					<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($child->id)); ?>">
						<?php echo $this->escape($child->title); ?>
					</a>
				<?php if ( $this->params->get('show_cat_num_articles', 1)) : ?>
					<span class="badge badge-default badge-pill ml-2">
						<?php echo $child->getNumItems(true); ?>
					</span>
				<?php endif; ?>
				<?php if (count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
					<button class="btn btn-primary btn-sm ml-auto" type="button" data-toggle="collapse" data-target="#category-<?php echo $child->id; ?>" aria-expanded="false" aria-controls="category-<?php echo $child->id; ?>">
				    <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
				  </button>
				<?php endif; ?>
				<!-- end categoria padre -->
			<?php else : ?>
				<!-- categoria figlio -->
				<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($child->id)); ?>">
					<?php echo $this->escape($child->title); ?>
				</a>
				<?php if ( $this->params->get('show_cat_num_articles', 1)) : ?>
					<span class="badge badge-default badge-pill ml-2">
						<?php echo $child->getNumItems(true); ?>
					</span>
				<?php endif; ?>
				<?php if (count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
					<button class="btn btn-secondary btn-collapse icon-down btn-sm ml-auto" type="button" data-toggle="collapse" data-target="#category-<?php echo $child->id; ?>" aria-expanded="false" aria-controls="category-<?php echo $child->id; ?>">
				    <!-- <i class="fa fa-chevron-circle-down" aria-hidden="true"></i> -->
				  </button>
				<?php endif; ?>

				<?php if ($this->params->get('show_subcat_desc') == 1) : ?>
					<?php if ($child->description) : ?>
						<div class="category-desc">
							<?php echo JHtml::_('content.prepare', $child->description, '', 'com_content.category'); ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>

				<!-- end categoria figlio -->
			<?php endif; ?>
			</li>

			<?php if (count($child->getChildren()) > 0 && $this->maxLevel > 1) : ?>
			<div class="collapse fade w-100" id="category-<?php echo $child->id; ?>">
				<?php
				$this->children[$child->id] = $child->getChildren();
				$this->category = $child;
				$this->maxLevel--;
				echo $this->loadTemplate('children');
				$this->category = $child->getParent();
				$this->maxLevel++;
				?>
			</div>
			<?php endif; ?>

		<?php endif; ?>
	<?php endforeach; ?>
	</ul>
<?php endif; ?>

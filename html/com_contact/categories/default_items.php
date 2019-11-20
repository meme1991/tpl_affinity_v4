<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="row grid mt-3">
<?php if ($this->maxLevelcat != 0 && count($this->items[$this->parent->id]) > 0) : ?>
	<?php foreach ($this->items[$this->parent->id] as $id => $item) : ?>
		<div class="grid-item col-12 col-sm-6 col-md-6 col-lg-4">
			<div class="card card-block py-3">

				<h4 class="card-title">
					<a href="<?php echo JRoute::_(ContactHelperRoute::getCategoryRoute($item->id, $item->language)) ?>" title="<?php echo $this->escape($item->title); ?>">
					<?php echo $this->escape($item->title); ?>
					</a>
				</h4>

				<?php if ($item->getParams()->get('image')) : ?>
					<?php $alt = ($item->getParams()->get('image_alt')) ? $item->getParams()->get('image_alt') : $item->title; ?>
					<figure class="default">
						<img src="<?php echo $item->getParams()->get('image') ?>" class="img-fluid" alt="<?php echo $alt ?>" />
						<figcaption class="d-flex justify-content-center align-items-center">
							<i class="far fa-external-link fa-3x"></i>
						</figcaption>
						<a href="<?php echo JRoute::_(ContactHelperRoute::getCategoryRoute($item->id, $item->language)) ?>" title="<?php echo $item->title ?>"></a>
					</figure>
				<?php endif; ?>

				<?php if ($this->params->get('show_subcat_desc_cat') == 1 AND $item->description) : ?>
				  <div class="card-body px-0 pt-0">
						<?php if ($item->description) : ?>
							<p class="mb-0"><?php echo JHtml::_('string.truncate', strip_tags($item->description), 200) ?></p>
						<?php endif; ?>
				  </div>
				<?php endif; ?>

				<div class="d-flex">
					<a href="<?php echo JRoute::_(ContactHelperRoute::getCategoryRoute($item->id, $item->language)); ?>" title="<?php echo $this->escape($item->title); ?>" class="btn btn-primary btn-block icon-go">
						<?php echo JText::_('TPL_AFFINITY_ACCESS') ?>
					</a>
				</div>

			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>
</div>

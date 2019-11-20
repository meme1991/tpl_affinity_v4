<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// aside layout

$col = ($params->get('bootstrap_size')) ? $params->get('bootstrap_size') : 12;
?>
<?php if($list) : ?>
	<?php if ($grouped) : ?>
		<ul class="list-group list-striped">
		<?php $k = 0; ?>
		<?php foreach ($list as $group_name => $group) : ?>
			<li class="list-group-item d-flex justify-content-between">
				<h5><?php echo $group_name ?></h5>
				<a class="btn btn-link btn-collapse icon-down" data-toggle="collapse" href="#groupCollapseID<?php echo $k ?>" aria-expanded="false" aria-controls="groupCollapseID<?php echo $k ?>"></a>
			</li>
			<div class="collapse w-100" id="groupCollapseID<?php echo $k ?>">
				<ul class="list-group list-striped list-hover list-parent">
				<?php foreach ($group as $item) : ?>
					<li class="list-group-item flex-column align-items-start <?php echo $item->active; ?>">
						<?php if ($params->get('link_titles') == 1) : ?>
							<a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>">
								<?php echo $item->title; ?>
							</a>
						<?php else : ?>
						<span><?php echo $item->title; ?></span>
						<?php endif; ?>
						<?php if ($item->displayDate) : ?>
						<small class="icon-clock mt-2"><?php echo JHtml::_('date', $item->displayDate, JText::_('DATE_FORMAT_LC1')) ?></small>
						<?php endif; ?>
						<?php if ($params->get('show_introtext')) : ?>
							<p class="mt-2 small"><?php echo JHtml::_('string.truncate', strip_tags($item->displayIntrotext), 200); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
			<?php $k++; ?>
		<?php endforeach; ?>
		</ul>
	<?php else : ?>
		<ul class="list-group list-striped list-hover">
		<?php foreach ($list as $item) : ?>
			<li class="list-group-item flex-column align-items-start <?php echo $item->active; ?>">
				<a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>"><?php echo $item->title; ?></a>
				<?php if ($item->displayDate) : ?>
				<small class="icon-clock mt-2"><?php echo JHtml::_('date', $item->displayDate, JText::_('DATE_FORMAT_LC1')) ?></small>
				<?php endif; ?>
				<?php if ($params->get('show_introtext')) : ?>
					<p class="mt-2 small"><?php echo JHtml::_('string.truncate', strip_tags($item->displayIntrotext), 200); ?></p>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>

<?php  // end render layout ?>
<?php endif; ?>

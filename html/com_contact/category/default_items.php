<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>
<div class="row mt-3">
	<div class="col-12 contact-category">
	<?php if (empty($this->items)) :?>
		<?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_('COM_CONTACT_NO_CONTACTS')); ?>
	<?php else : ?>
		<div class="row grid">
			<?php foreach ($this->items as $i => $item) : ?>
				<?php if (in_array($item->access, $this->user->getAuthorisedViewLevels())) : ?>
					<div class="grid-item col-12 col-sm-6 col-md-6 col-lg-4">

						<div class="card card-block py-3">
							<?php if ($this->params->get('show_position_headings')) : ?>
								<small><?php echo JText::sprintf('TPL_AFFINITY_CONTACT_POSITION', $item->con_position); ?></small>
							<?php endif; ?>
							<h4 class="card-title">
								<a href="<?php echo JRoute::_(ContactHelperRoute::getContactRoute($item->slug, $item->catid)); ?>" title="<?php echo $item->name; ?>">
									<?php echo $item->name; ?>
								</a>
							</h4>

							<?php if ($this->params->get('show_image_heading') AND !empty($this->items[$i]->image)) : ?>
								<figure class="default">
							    <img src="<?php echo $this->items[$i]->image ?>" class="img-fluid" alt="<?php echo $item->name; ?>" />
							    <figcaption class="d-flex justify-content-center align-items-center">
							      <i class="far fa-external-link fa-3x"></i>
							    </figcaption>
							    <a href="<?php echo JRoute::_(ContactHelperRoute::getContactRoute($item->slug, $item->catid)); ?>" title="<?php echo $item->name; ?>"></a>
							  </figure>
							<?php endif; ?>

							<?php if ($this->params->get('show_email_headings') OR $this->params->get('show_telephone_headings')) : ?>
							  <div class="card-body px-0 pt-0">
									<?php if ($this->params->get('show_email_headings')) : ?>
										<p class="mb-0 size-small"><?php echo JText::sprintf('TPL_AFFINITY_CONTACT_EMAIL', $item->email_to); ?></p>
									<?php endif; ?>
									<?php if ($this->params->get('show_telephone_headings') && !empty($item->telephone)) : ?>
										<p class="mb-0 size-small"><?php echo JText::sprintf('TPL_AFFINITY_CONTACT_TELEFONO', $item->telephone); ?></p>
									<?php endif; ?>
							  </div>
							<?php endif; ?>
							<div class="read-more text-center">
						    <a href="<?php echo JRoute::_(ContactHelperRoute::getContactRoute($item->slug, $item->catid)); ?>" class="btn btn-link btn-sm" title="<?php echo $item->name ?>">
						      <?php echo JText::_('CONTATTA') ?>
						    </a>
							</div>

						</div>

					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>

		<?php if ($this->params->get('show_pagination', 2)) : ?>
		<div class="row">
			<div class="col-12 mt-3">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<div class="text-center"><?php echo $this->pagination->getPagesCounter(); ?></div>
			<?php endif; ?>
				<div class="d-flex justify-content-center mt-2"><?php echo $this->pagination->getPagesLinks(); ?></div>
			</div>
		</div>
		<?php endif; ?>

	<?php endif; ?>
	</div>
</div>

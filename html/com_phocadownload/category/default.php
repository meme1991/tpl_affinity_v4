<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php $tmpl = JFactory::getApplication()->getTemplate(); ?>
<?php require_once JPATH_ROOT . '/templates/'.$tmpl.'/libreries/extHelper.inc.php'; ?>
<section class="wrapper pd-category-view">
	<div class="container <?php echo $this->t['p']->get( 'pageclass_sfx' ) ?>">
		<div class="row">
			<?php if ($this->t['p']->get('show_page_heading')) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_heading', $this->escape($this->t['p']->get('page_heading'))) ?>
			<?php endif; ?>
			<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->category[0]->title) ?>

			<?php if(!empty($this->files)): ?>
				<div class="col-12 col-sm-12 col-md-12 col-lg mt-3">
					<?php // Search by tags - the category rights must be checked for every file ?>
					<?php $this->checkRights = 1; ?>
					<?php if ((int)$this->t['tagid'] > 0) { ?>
						<?php echo $this->loadTemplate('files'); ?>
						<?php $this->checkRights = 1; ?>
						<?php if (count($this->files)) { ?>
							<?php echo $this->loadTemplate('pagination'); ?>
						<?php } ?>
					<?php } else { ?>
						<div class="pd-category">
							<?php if (!empty($this->category[0])) { ?>
								<?php // USER RIGHT - Access of categories (if file is included in some not accessed category) - - - - - ?>
								<?php // ACCESS is handled in SQL query, ACCESS USER ID is handled here (specific users) ?>
								<?php $rightDisplay	= 0; ?>
								<?php if (!empty($this->category[0])) : ?>
									<?php $rightDisplay = PhocaDownloadAccess::getUserRight('accessuserid', $this->category[0]->cataccessuserid, $this->category[0]->cataccess, $this->t['user']->getAuthorisedViewLevels(), $this->t['user']->get('id', 0), 0); ?>
								<?php endif; ?>

								<?php if ($rightDisplay == 1) { ?>

									<?php $this->checkRights = 0; ?>
									<?php $l = new PhocaDownloadLayout(); ?>

									<?php // Description ?>
									<?php  if ($l->isValueEditor($this->category[0]->description)) : ?>
										<div class="pd-cdesc">
											<?php echo JHTML::_('content.prepare', $this->category[0]->description); ?>
										</div>
									<?php endif; ?>

									<?php // ===================================================================================== ?>
									<?php // BEGIN LAYOUT AREA ?>
									<?php // ===================================================================================== ?>
									<ul class="list-group list-small file-list">
										<?php echo $this->loadTemplate('files'); ?>
									</ul>

									<?php // ===================================================================================== ?>
									<?php // END LAYOUT AREA ?>
									<?php // ===================================================================================== ?>

									<?php if (count($this->category[0])) : ?>
										<?php echo $this->loadTemplate('pagination'); ?>
									<?php endif; ?>

								<?php } else { ?>
									<h3><?php echo JText::_('COM_PHOCADOWNLOAD_CATEGORY') ?></h3>
									<?php echo JLayoutHelper::render('joomla.content.message.message_danger', JText::_('COM_PHOCADOWNLOAD_NO_RIGHTS_ACCESS_CATEGORY')); ?>
								<?php } ?>

							<?php } ?>
					<?php } ?>
					</div>
				</div><!-- col-8 -->
				<?php if (!empty($this->subcategories) AND !empty($this->files)) : ?>
				<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3 pd-subcategory sidebar">
					<?php // Subcategories ?>
					<?php echo JLayoutHelper::render('joomla.content.title.title_aside', JText::_('Sottocategorie')); ?>
					<ul class="list-group list-striped list-hover">
					<?php foreach ($this->subcategories as $valueSubCat) : ?>
						<li class="list-group-item">
							<a href="<?php echo JRoute::_(PhocaDownloadRoute::getCategoryRoute($valueSubCat->id, $valueSubCat->alias)) ?>" title="<?php echo $valueSubCat->title ?>">
								<?php echo $valueSubCat->title ?>
							</a>
						</li>
						<?php $subcategory = 1; ?>
					<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			<?php else: ?>

				<div class="col-12 mt-3">
					<?php if(!empty($this->subcategories)): ?>
						<div class="row">
							<?php foreach ($this->subcategories as $valueSubCat) : ?>
							<div class="grid-item col-12 col-sm-6 col-md-6 col-lg-4">
								<div class="card card-block py-3">
									<h4 class="card-title">
										<a href="<?php echo JRoute::_(PhocaDownloadRoute::getCategoryRoute($valueSubCat->id, $valueSubCat->alias)) ?>" title="<?php echo $valueSubCat->title ?>">
										<?php echo $valueSubCat->title ?>
										</a>
									</h4>
									<a href="<?php echo JRoute::_(PhocaDownloadRoute::getCategoryRoute($valueSubCat->id, $valueSubCat->alias)) ?>" title="<?php echo $valueSubCat->title ?>" class="btn btn-primary btn-block icon-go">
										<?php echo JText::_('TPL_AFFINITY_ACCESS') ?>
									</a>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					<?php else: ?>
						<?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_('Non ci sono elementi in questa categoria.')); ?>
					<?php endif; ?>
				</div>

			<?php endif; ?>
		</div>
	</div>
</section>

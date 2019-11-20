<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php $tmpl = JFactory::getApplication()->getTemplate(); ?>
<?php require_once JPATH_ROOT . '/templates/'.$tmpl.'/libreries/extHelper.inc.php'; ?>

<section class="wrapper pd-categories-view">
	<div class="container <?php echo $this->t['p']->get( 'pageclass_sfx' ) ?>">
		<div class="row">
			<?php if ($this->t['p']->get('show_page_heading')) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->t['p']->get('page_heading'))) ?>
			<?php endif; ?>
			<div class="col mt-3">
				<?php $col = 4; ?>
				<?php if (!empty($this->t['mostvieweddocs']) && $this->t['displaymostdownload'] == 1) : ?>
					<?php $col = 6; ?>
				<?php endif; ?>

				<?php if ( $this->t['description'] != '') : ?>
					<div class="pd-desc"><?php echo $this->t['description'] ?></div>
				<?php endif; ?>

				<?php if (!empty($this->t['categories'])) : ?>
					<div class="row">
					<?php foreach ($this->t['categories'] as $value) : ?>
						<div class="grid-item col-12 col-sm-6 col-md-6 col-lg-<?php echo $col ?>">
							<div class="card card-block py-3">
								<h4 class="card-title">
									<a href="<?php echo JRoute::_(PhocaDownloadRoute::getCategoryRoute($value->id, $value->alias)) ?>" title="<?php echo $value->title ?>">
									<?php echo $value->title ?>
									</a>
								</h4>
								<?php if($this->t['displaymaincatdesc']	 == 1) : ?>
									<div class="card-body px-0 pt-0">
								    <p class="card-text"><?php echo JHtml::_('string.truncate', strip_tags($value->description), 200) ?></p>
								  </div>
								<?php endif; ?>
								<a href="<?php echo JRoute::_(PhocaDownloadRoute::getCategoryRoute($value->id, $value->alias)) ?>" title="<?php echo $value->title ?>" class="btn btn-primary btn-block icon-go">
									<?php echo JText::_('TPL_AFFINITY_ACCESS') ?>
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php if (!empty($this->t['mostvieweddocs']) && $this->t['displaymostdownload'] == 1) : ?>
			<div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-3 sidebar">
				<aside id="phoca-dl-most-viewed-box">
					<?php echo JLayoutHelper::render('joomla.content.title.title_aside', JText::_('COM_PHOCADOWNLOAD_MOST_DOWNLOADED_FILES')); ?>
					<ul class="list-group list-striped list-hover">
					<?php $l = new PhocaDownloadLayout(); ?>
					<?php foreach ($this->t['mostvieweddocs'] as $value) : ?>
						<?php // USER RIGHT - Access of categories (if file is included in some not accessed category) - - - - - ?>
						<?php // ACCESS is handled in SQL query, ACCESS USER ID is handled here (specific users) ?>
						<?php $rightDisplay	= 0; ?>
						<?php if (!empty($value)) : ?>
							<?php $rightDisplay = PhocaDownloadAccess::getUserRight('accessuserid', $value->cataccessuserid, $value->cataccess, $this->t['user']->getAuthorisedViewLevels(), $this->t['user']->get('id', 0), 0); ?>
						<?php endif; ?>
						<?php // - - - - - - - - - - - - - - - - - - - - - - ?>

						<?php if ($rightDisplay == 1) : ?>
							<?php // FILESIZE ?>
							<?php if ($value->filename !='') : ?>
								<?php $absFile = str_replace('/', DIRECTORY_SEPARATOR, JPath::clean($this->t['absfilepath'] . $value->filename)); ?>
								<?php if (JFile::exists($absFile)) : ?>
									<?php $fileSize = PhocaDownloadFile::getFileSizeReadable(filesize($absFile)); ?>
								<?php else : ?>
									<?php $fileSize = ''; ?>
								<?php endif; ?>
							<?php endif; ?>
							<li class="list-group-item">
							  <a href="<?php echo JRoute::_(PhocaDownloadRoute::getCategoryRoute($value->categoryid,$value->categoryalias)) ?>" title="<?php echo $value->title ?>">
									<i class="<?php echo extHelper($value->filename) ?> mr-2"></i><?php echo $value->title ?>
							  </a>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
					</ul>
				</aside>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>

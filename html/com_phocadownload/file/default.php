<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php $doc  = JFactory::getDocument(); ?>
<?php $tmpl = JFactory::getApplication()->getTemplate(); ?>
<?php require_once JPATH_ROOT . '/templates/'.$tmpl.'/libreries/extHelper.inc.php'; ?>

<div class="container pd-file-view <?php echo $this->t['p']->get( 'pageclass_sfx' ) ?>">
	<div class="row justify-content-center">
		<?php if ( $this->t['p']->get( 'show_page_heading' ) ) : ?>
			<?php echo JLayoutHelper::render('joomla.content.title.title_heading', $this->escape($this->t['p']->get('page_heading'))) ?>
		<?php endif; ?>
		<div class="col-12 mt-3 view">
			<div class="row">

			<?php if (!empty($this->file[0])) : ?>
				<?php $v = $this->file[0]; ?>
				<?php // USER RIGHT - Access of categories (if file is included in some not accessed category) - - - - - ?>
				<?php // ACCESS is handled in SQL query, ACCESS USER ID is handled here (specific users) ?>
				<?php $rightDisplay	= 0; ?>
				<?php if (!empty($this->category[0])) : ?>
					<?php $rightDisplay = PhocaDownloadAccess::getUserRight('accessuserid', $v->cataccessuserid, $v->cataccess, $this->t['user']->getAuthorisedViewLevels(), $this->t['user']->get('id', 0), 0); ?>
				<?php endif; ?>

				<?php if ($rightDisplay == 1) : ?>
					<?php $l = new PhocaDownloadLayout(); ?>

					<div class="col-12 col-sm-12 col-md-12 col-lg left">

						<div class="pd-file-icon text-center">
							<span class="fa-stack fa-5x <?= extensionHelper::getClassIcon($v->filename) ?>">
								<i class="fas fa-square fa-stack-2x"></i>
								<i class="<?php echo extensionHelper::getIcon($v->filename) ?> fa-stack-1x"></i>
							</span>
							<h3 class="pd-ctitle mt-3">
								<?php echo $l->getName($v->title, $v->filename, 1) ?>
								<small class="font-italic">[<?php echo $l->getFilesize($v->filename) ?>]</small>
							</h3>
						</div>

						<?php // Is this direct menu link to File View ?>
						<?php $directFv = 0; ?>
						<?php $app		= JFactory::getApplication(); ?>
						<?php $itemId = $app->input->get('Itemid', 0, 'int'); ?>
						<?php $menu		= $app->getMenu(); ?>
						<?php $item		= $menu->getItem($itemId); ?>
						<?php if (isset($item->query['view']) && $item->query['view'] == 'file') : ?>
							<?php $directFv = 1; ?>
						<?php endif; ?>
						<?php // End direct menu link to File View ?>

						<?php if ((int)$this->t['display_file_view'] == 1 || (int)$this->t['display_file_view'] == 2 || (int)$v->confirm_license > 0 || (int)$this->t['display_detail'] == 2 || (int)$directFv == 1) : ?>
							<div class="download-btn text-center my-3">
								<?php // External link ?>
								<?php if ($v->link_external != '') : ?>
									<form action="" name="phocaDownloadForm" id="phocadownloadform" target="<?php echo $this->t['download_external_link'] ?>">
									<input class="btn btn-primary btn-lg pd-button-download pointer" type="button" name="submit" onClick="location.href='<?php echo $v->link_external ?>';" id="pdlicensesubmit" value="<?php echo JText::_('COM_PHOCADOWNLOAD_DOWNLOAD') ?>" />
									<?php if($v->filename_preview) : ?>
										<a href="phocadownloadpap/<?php echo $v->filename_preview ?>" target="_blank" class="btn btn-secondary btn-lg">Anteprima</a>
									<?php endif; ?>
								<?php else : ?>
									<form action="<?php echo htmlspecialchars($this->t['action']) ?>" method="post" name="phocaDownloadForm" id="phocadownloadform">
									<input class="btn btn-primary btn-lg pd-button-download pointer" type="submit" name="submit" id="pdlicensesubmit" value="<?php echo JText::_('COM_PHOCADOWNLOAD_DOWNLOAD') ?>" />
									<?php if($v->filename_preview) : ?>
										<a href="phocadownloadpap/<?php echo $v->filename_preview ?>" target="_blank" class="btn btn-secondary btn-lg">Anteprima</a>
									<?php endif; ?>
									<input type="hidden" name="license_agree" value="1" />
									<input type="hidden" name="download" value="<?php echo $v->id ?>" />
									<input type="hidden" name="<?php echo JSession::getFormToken() ?>" value="1" />
								<?php endif; ?>
								</form>
							</div>
						<?php else : ?>
							<?php echo JLayoutHelper::render('joomla.content.message.message_danger', JText::_('COM_PHOCADOWNLOAD_NO_RIGHTS_ACCESS_CATEGORY')); ?>
						<?php endif; ?>

					</div>

					<div class="col-12 col-sm-12 col-md-12 col-lg-6 mt-5 mt-lg-0 right details">

						<?php if ($v->filename != '') : ?>
							<div class="details-field sep-line mb-2">
								<h5 class="font-weight-bold"><?php echo JText::_('Filename') ?></h5>
								<p><?php echo $v->filename ?></p>
							</div>
						<?php endif; ?>

						<?php $fileSize = $l->getFilesize($v->filename) ?>
						<?php if ($fileSize != '') : ?>
							<div class="details-field sep-line mb-2">
								<h5 class="font-weight-bold"><?php echo JText::_('COM_PHOCADOWNLOAD_FILESIZE') ?></h5>
								<p>[<?php echo $fileSize ?>]</p>
							</div>
						<?php endif; ?>

						<?php if ($v->version != '') : ?>
							<div class="details-field sep-line mb-2">
								<h5 class="font-weight-bold"><?php echo JText::_('COM_PHOCADOWNLOAD_VERSION') ?></h5>
								<p><?php echo $v->version ?></p>
							</div>
						<?php endif; ?>

						<?php if ($v->license != '') : ?>
							<div class="details-field sep-line mb-2">
								<h5 class="font-weight-bold"><?php echo JText::_('COM_PHOCADOWNLOAD_LICENSE') ?></h5>
								<?php if ($v->license_url != '') : ?>
									<p><a href="<?php echo $v->license_url ?>" target="_blank" title="<?php echo $v->license ?>"><?php echo $v->license ?></a></p>
								<?php else: ?>
									<p><?php echo $v->license ?></p>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<?php if ($v->author != '') : ?>
							<div class="details-field sep-line mb-2">
								<h5 class="font-weight-bold"><?php echo JText::_('COM_PHOCADOWNLOAD_AUTHOR') ?></h5>
								<?php if ($v->author_url != '') : ?>
									<p><a href="<?php echo $v->author_url ?>" target="_blank" title="<?php echo $v->author ?>"><?php echo $v->author ?></a></p>
								<?php else: ?>
									<p><?php echo $v->author ?></p>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<?php if ($v->author_email != '') : ?>
							<div class="details-field sep-line mb-2">
								<h5 class="font-weight-bold"><?php echo JText::_('COM_PHOCADOWNLOAD_EMAIL') ?></h5>
								<p><?php echo $l->getProtectEmail($v->author_email) ?></p>
							</div>
						<?php endif; ?>

						<?php $fileDate = $l->getFileDate($v->filename, $v->date) ?>
						<?php if ($fileDate != '') : ?>
							<div class="details-field sep-line mb-2">
								<h5 class="font-weight-bold"><?php echo JText::_('COM_PHOCADOWNLOAD_DATE') ?></h5>
								<p><?php echo $fileDate ?></p>
							</div>
						<?php endif; ?>

						<?php if ($this->t['display_downloads'] == 1) : ?>
							<div class="details-field sep-line mb-2">
								<h5 class="font-weight-bold"><?php echo JText::_('COM_PHOCADOWNLOAD_DOWNLOADS') ?></h5>
								<p><?php echo $v->hits ?></p>
							</div>
						<?php endif; ?>

						<?php if ($l->isValueEditor($v->description)) : ?>
							<div class="details-field sep-line mb-2">
								<h5 class="font-weight-bold"><?php echo JText::_('Descrizione') ?></h5>
								<p><?php echo $v->description ?></p>
							</div>
						<?php endif; ?>

						<?php if ($l->isValueEditor($v->features)) : ?>
							<div class="details-field sep-line mb-2">
								<h5 class="font-weight-bold"><?php echo JText::_('COM_PHOCADOWNLOAD_FEATURES') ?></h5>
								<p><?php echo $v->features ?></p>
							</div>
						<?php endif; ?>

						<?php if ($l->isValueEditor($v->changelog)) : ?>
							<div class="details-field sep-line mb-2">
								<h5 class="font-weight-bold"><?php echo JText::_('COM_PHOCADOWNLOAD_CHANGELOG') ?></h5>
								<p><?php echo $v->changelog ?></p>
							</div>
						<?php endif; ?>

						<?php if ($l->isValueEditor($v->notes)) : ?>
							<div class="details-field sep-line mb-2">
								<h5 class="font-weight-bold"><?php echo JText::_('COM_PHOCADOWNLOAD_NOTES') ?></h5>
								<p><?php echo $v->notes ?></p>
							</div>
						<?php endif; ?>

						<?php if ($v->image_download != '') : ?>
							<div class="details-field sep-line mb-2">
								<h5 class="font-weight-bold"><?php echo JText::_('Immagine') ?></h5>
								<img src="<?php echo JURI::base().'/images/phocadownload/'.$v->image_download ?>" class="img-fluid mb-2" alt="">
							</div>
						<?php endif; ?>

						<?php if ($v->video_filename != '') : ?>
							<?php JHtml::_('jquery.framework'); ?>
							<?php $doc->addStyleSheet(JUri::base(true).'/templates/'.$tmpl.'/dist/lity/lity.min.css'); ?>
							<?php $doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/lity/lity.min.js'); ?>
							<div class="details-field sep-line mb-2">
								<h5 class="font-weight-bold"><?php echo JText::_('Video') ?></h5>
								<p><a href="<?php echo $v->video_filename ?>" data-lity>Clicca qui per vedere il video</a></p>
							</div>
						<?php endif; ?>

					</div>


				<?php endif; ?>
			<?php endif; ?>
			</div><!-- row -->
		</div>
	</div>
</div>

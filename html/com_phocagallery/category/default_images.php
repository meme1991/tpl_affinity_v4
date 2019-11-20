<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php $app	= JFactory::getApplication(); ?>
<?php // - - - - - - - - - - ?>
<?php // Images ?>
<?php // - - - - - - - - - - ?>
<?php if (!empty($this->items)) : ?>

	<?php // cerco se ce almeno una sottocategoria ?>
	<?php foreach($this->items as $ck => $cv) : ?>
		<?php if ($this->checkRights == 1) : ?>
			<?php // USER RIGHT - Access of categories (if file is included in some not accessed category) - - - - - ?>
			<?php // ACCESS is handled in SQL query, ACCESS USER ID is handled here (specific users) ?>
			<?php $rightDisplay	= 0; ?>
			<?php if (!isset($cv->cataccessuserid)) : ?>
				<?php $cv->cataccessuserid = 0; ?>
			<?php endif; ?>

			<?php if (isset($cv->catid) && isset($cv->cataccessuserid) && isset($cv->cataccess)) : ?>
				<?php $rightDisplay = PhocaGalleryAccess::getUserRight('accessuserid', $cv->cataccessuserid, $cv->cataccess, $this->tmpl['user']->getAuthorisedViewLevels(), $this->tmpl['user']->get('id', 0), 0); ?>
			<?php endif; ?>
			<?php // - - - - - - - - - - - - - - - - - - - - - - ?>
		<?php else : ?>
			<?php $rightDisplay = 1; ?>
		<?php endif; ?>

		<?php // Display back button to categories list ?>
		<!-- <?php //if ($cv->item_type == 'categorieslist') : ?>
			<?php //$rightDisplay = 1; ?>
		<?php //endif; ?> -->

		<?php if ($rightDisplay == 1) : ?>
			<?php if($cv->type == 0) : ?>
				<?php $back_button[] = $cv ?>
			<?php endif; ?>
			<?php if($cv->type == 1) : ?>
				<?php $sub_cat[] = $cv ?>
			<?php endif; ?>
			<?php if($cv->type == 2) : ?>
				<?php $images[] = $cv ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>

	<?php if(isset($sub_cat) AND count($sub_cat)) : ?>
		<?php $col_aside = 4; ?>
		<?php $col 			 = 6; ?>
	<?php else: ?>
		<?php $col_aside = ''; ?>
		<?php $col 			 = 4; ?>
	<?php endif; ?>


<div class="row mt-3">
	<!-- immagini -->
	<div class="col-12 col-sm-12 col-md-12 col-lg">
		<div class="row grid pg-msnr-container">
			<?php if(isset($images) AND count($images)) : ?>
				<div class="grid-sizer col-12 col-sm-6 col-md-6 col-lg-<?php echo $col ?>"></div>
				<?php foreach($images as $cv) : ?>
					<div class="grid-item col-12 col-sm-6 col-md-6 col-lg-<?php echo $col ?> mb-3">
						<div class="card">
							<figure class="default mb-0">
						    <img src="<?php echo $cv->linkorig ?>" class="img-fluid" alt="<?php echo htmlentities ($cv->odesctitletag, ENT_QUOTES, 'UTF-8') ?>" />
						    <figcaption class="d-flex justify-content-center align-items-center">
						      <i class="fas fa-image fa-3x"></i>
						    </figcaption>
						    <a href="<?php echo $cv->linkorig ?>" title="<?php echo htmlentities ($cv->odesctitletag, ENT_QUOTES, 'UTF-8') ?>" class="magnific"></a>
						  </figure>
							<p class="card-text p-2">
								<i class="fas fa-image pr-1" aria-hidden="true"></i>
								<?php echo htmlentities ($cv->odesctitletag, ENT_QUOTES, 'UTF-8') ?>
							</p>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_('Non ci sono immagini in questa categoria. Ma potrebbero esserci delle immagini organizzate nelle sottocategorie. Dai un occhiata qui a fianco.')); ?>
			<?php endif; ?>
		</div>
	</div>
	<!-- end immagini -->

	<!-- sottocategorie -->
	<?php if(isset($sub_cat) AND count($sub_cat)) : ?>
	<div class="col-12 col-sm-12 col-md-12 col-lg-<?php echo $col_aside ?> sidebar">
		<aside>
			<?php echo JLayoutHelper::render('joomla.content.title.title_aside', JText::_('Altri album')); ?>
			<ul class="list-unstyled list-striped list-hover mt-3">
			<?php foreach($sub_cat as $cv) : ?>
			  <li class="media border border-top-0 border-right-0 border-left-0 py-1">
					<a href="<?php echo $cv->link ?>" title="<?php echo $cv->title ?>">
						<img src="<?php echo $cv->linkthumbnailpath ?>" class="d-flex mr-3 rounded-circle" alt="<?php echo $cv->title ?>">
					</a>
					<div class="media-body">
						<h5 class="mt-0 mb-1">
							<a href="<?php echo $cv->link ?>" title="<?php echo $cv->title ?>">
								<?php echo $cv->title ?>
							</a>
						</h5>
						<small>Foto (<?php echo $cv->numlinks ?>)</small>
					</div>
				</li>
			<?php endforeach; ?>
			</ul>
		</aside>
	</div>
	<?php endif; ?>
	<!-- end sottocategorie -->
</div>
<?php else : ?>
	<?php // Will be not displayed ?>
	<?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_('COM_PHOCAGALLERY_THERE_IS_NO_IMAGE')); ?>
<?php endif; ?>

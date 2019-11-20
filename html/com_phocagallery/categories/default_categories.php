<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php $this->cv = new stdClass(); ?>
<div class="row mt-3">
	<?php foreach ($this->categories as $ck => $cv) : ?>
		<?php $cv->linkthumbnailpath = str_replace('phoca_thumb_m', 'phoca_thumb_l', $cv->linkthumbnailpath) ?>
		<div class="col-12 col-sm-12 col-md-6 col-lg-4">
			<div class="card card-block py-3">
				<h4 class="card-title">
		      <a href="<?php echo $cv->link ?>" title="<?php echo $cv->title_self ?>">
		        <?php echo $cv->title_self ?>
		      </a>
			  </h4>
			  <figure class="default">
			    <img src="<?php echo $cv->linkthumbnailpath ?>" class="img-fluid" alt="<?php echo $cv->title_self ?>" />
			    <figcaption class="d-flex justify-content-center align-items-center">
			      <i class="fas fa-images fa-3x"></i>
			    </figcaption>
			    <a href="<?php echo $cv->link ?>" title="<?php echo $cv->title_self ?>"></a>
			  </figure>
				<?php if($cv->description OR $cv->numlinks) : ?>
					<div class="card-body px-0 pt-0">
						<?php if($cv->description) : ?>
					    <p class="card-text"><?php echo JHtml::_('string.truncate', strip_tags($cv->description), 200) ?></p>
						<?php endif; ?>
						<?php if ($cv->numlinks) : ?>
							<p class="card-text"><?php echo JText::_('Contiene ').$cv->numlinks.JText::_(' foto') ?></p>
						<?php endif; ?>
				  </div>
				<?php endif; ?>
				<a href="<?php echo $cv->link ?>" class="btn btn-primary btn-block icon-go" title="<?php echo $cv->title_self  ?>">
			    <?php echo JText::_('TPL_AFFINITY_ACCESS') ?>
			  </a>
			</div>
		</div>
	<?php endforeach; ?>
</div>

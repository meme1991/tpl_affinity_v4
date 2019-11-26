<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$cparams = JComponentHelper::getParams('com_media');
$tparams = $this->params;
?>
<div class="container wrapper contact <?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Person">
	<div class="row">
		<div class="col-12">
			<?php if ($tparams->get('show_page_heading')) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_heading', $this->escape($tparams->get('page_heading'))) ?>
			<?php endif; ?>
			<?php echo $this->item->event->afterDisplayTitle; ?>
			<?php if ($this->contact->name && $tparams->get('show_name')) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->contact->name); ?>
			<?php endif; ?>
			
			<div class="row mt-3">
				<!-- MAPPA -->
				<?php // se indirizzo e città sono settati ?>
				<?php if($this->contact->address != '' && $this->contact->suburb != ''): ?>
					<?php $col = ($tparams->get('show_email_form')) ? 'col-12' : 'col-12 col-sm-12 col-md-6'; ?>
					<div class="<?= $col ?>">
						<?php $addressMap  = str_replace(' ', '+', $this->contact->address); ?>
						<?php $addressMap .= '+'.str_replace(' ', '+', $this->contact->suburb); ?>
						<iframe
						  frameborder="0"
							style="border:0"
							class="googleMaps"
						  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD_VIM-UpU5tWPOfngBCBqrTaTSq6qCbiM&q=<?php echo $addressMap ?>"
							allowfullscreen>
						</iframe>
					</div>
				<?php endif; ?>
				<!-- MAPPA -->

				<!-- IMMAGINE -->
				<?php if(($tparams->get('show_image') AND $this->contact->image)) : ?>
				<div class="col-12 col-sm-12 col-md-6 col-lg-3 mt-3 mt-lg-0 figure">
					<?php if($this->contact->image && $tparams->get('show_image')) : ?>
					<figure>
						<img src="<?php echo $this->contact->image ?>" alt="<?php echo $this->contact->name; ?>" class="figure-img img-fluid rounded" itemprop="image">
					</figure>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<!-- IMMAGINE -->

				<!-- DATI, EMAIL, RUOLO, TELEFONO, ...  -->
				<div class="col-12 col-sm-12 col-md-6 col-lg">
					<?php if ($this->contact->con_position && $tparams->get('show_position')) : ?>
					<div class="field">
						<h4 class="fw-600"><i class="fas fa-user-circle mr-2"></i><?php echo JText::_('TPL_AFFINITY_CONTACTPAGE_POSITION'); ?></h4>
						<?php echo $this->contact->con_position; ?>
					</div>
					<?php endif; ?>

					<?php echo $this->loadTemplate('address'); ?>

					<?php if ($tparams->get('show_links')) : ?>
						<?php echo $this->loadTemplate('links'); ?>
					<?php endif; ?>

					<?php if ($tparams->get('show_user_custom_fields') && $this->contactUser) : ?>
						<?php echo $this->loadTemplate('user_custom_fields'); ?>
					<?php endif; ?>

					<?php if ($this->contact->misc && $tparams->get('show_misc')) : ?>
						<div class="field">
							<h4 class="fw-600"><?php echo JText::_('TPL_AFFINITY_CONTACTPAGE_INFO'); ?></h4>
							<div class="article-view">
								<article>
									<?php echo $this->contact->misc; ?>
								</article>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<!-- DATI, EMAIL, RUOLO, TELEFONO, ...  -->

				<!-- CONTACT FORM -->
				<?php if($tparams->get('show_email_form')) : ?>
					<?php echo $this->loadTemplate('form'); ?>
				<?php endif; ?>
				<!-- CONTACT FORM -->

			</div>
		</div>
	</div>
</div>

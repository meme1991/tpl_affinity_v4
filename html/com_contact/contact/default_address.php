<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Marker_class: Class based on the selection of text, none, or icons
 * jicon-text, jicon-none, jicon-icon
 */
?>

<?php if ($this->contact->address && $this->params->get('show_street_address')) : ?>
	<div class="field" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
		<h4 class="fw-600"><i class="fas fa-map-marker-alt mr-2"></i><?php echo JText::_('TPL_AFFINITY_CONTACTPAGE_ADDRESS'); ?></h4>
		<?php $address = $this->contact->address; ?>
		<meta itemprop="streetAddress" content="<?php echo $this->contact->address ?>">

		<?php if ($this->contact->suburb && $this->params->get('show_suburb')) : ?>
			<?php $address .= ", ".$this->contact->suburb ?>
			<meta itemprop="addressLocality" content="<?php echo $this->contact->suburb ?>">
		<?php endif; ?>

		<?php if ($this->contact->postcode && $this->params->get('show_postcode')) : ?>
			<?php $address .= " ".$this->contact->postcode ?>
			<meta itemprop="postalCode" content="<?php echo $this->contact->postcode ?>">
		<?php endif; ?>

		<?php if ($this->contact->state && $this->params->get('show_state')) : ?>
			<?php $address .= " - ".$this->contact->state ?>
			<meta itemprop="addressRegion" content="<?php echo $this->contact->state ?>">
		<?php endif; ?>

		<?php if ($this->contact->country && $this->params->get('show_country')) : ?>
			<?php $address .=  " - ".$this->contact->country ?>
		<?php endif; ?>

		<?php echo $address ?>
	</div>
<?php endif; ?>

<?php if ($this->contact->email_to && $this->params->get('show_email')) : ?>
	<div class="field">
		<h4 class="fw-600" itemprop="email" content="<?php //echo $this->contact->email_to; ?>"><i class="fas fa-envelope mr-2"></i><?php echo JText::_('TPL_AFFINITY_CONTACTPAGE_EMAIL'); ?></h4>
		<?php echo $this->contact->email_to; ?>
	</div>
<?php endif; ?>

<?php if ($this->contact->telephone && $this->params->get('show_telephone')) : ?>
	<div class="field">
		<h4 class="fw-600" itemprop="telephone" content="<?php echo $this->contact->telephone; ?>"><i class="fas fa-phone-square mr-2"></i><?php echo JText::_('TPL_AFFINITY_CONTACTPAGE_TELEFONO'); ?></h4>
		<?php echo $this->contact->telephone; ?>
	</div>
<?php endif; ?>

<?php if ($this->contact->mobile && $this->params->get('show_mobile')) : ?>
	<div class="field">
		<h4 class="fw-600"><i class="fas fa-mobile mr-2"></i><?php echo JText::_('TPL_AFFINITY_CONTACTPAGE_MOBILE'); ?></h4>
		<?php echo $this->contact->mobile; ?>
	</div>
<?php endif; ?>

<?php if ($this->contact->fax && $this->params->get('show_fax')) : ?>
	<div class="field">
		<h4 class="fw-600"><i class="fas fa-fax mr-2"></i><?php echo JText::_('TPL_AFFINITY_CONTACTPAGE_FAX'); ?></h4>
		<?php echo $this->contact->fax; ?>
	</div>
<?php endif; ?>

<?php if ($this->contact->webpage && $this->params->get('show_webpage')) : ?>
	<div class="field">
		<h4 class="fw-600" itemprop="url" content="<?php echo JStringPunycode::urlToUTF8($this->contact->webpage) ?>"><i class="fas fa-globe mr-2"></i><?php echo JText::_('TPL_AFFINITY_CONTACTPAGE_WEBSITE'); ?></h4>
		<?php echo JStringPunycode::urlToUTF8($this->contact->webpage) ?>
	</div>
<?php endif; ?>

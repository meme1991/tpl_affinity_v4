<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\String\StringHelper;

// Get the mime type class.
$mime = !empty($this->result->mime) ? 'mime-' . $this->result->mime : null;

$show_description = $this->params->get('show_description', 1);

if ($show_description)
{
	// Calculate number of characters to display around the result
	$term_length = StringHelper::strlen($this->query->input);
	$desc_length = $this->params->get('description_length', 255);
	$pad_length = $term_length < $desc_length ? (int) floor(($desc_length - $term_length) / 2) : 0;

	// Find the position of the search term
	$pos = $term_length ? StringHelper::strpos(StringHelper::strtolower($this->result->description), StringHelper::strtolower($this->query->input)) : false;

	// Find a potential start point
	$start = ($pos && $pos > $pad_length) ? $pos - $pad_length : 0;

	// Find a space between $start and $pos, start right after it.
	$space = StringHelper::strpos($this->result->description, ' ', $start > 0 ? $start - 1 : 0);
	$start = ($space && $space < $pos) ? $space + 1 : $start;

	$description = JHtml::_('string.truncate', StringHelper::substr($this->result->description, $start), $desc_length, true);
}

$route = $this->result->route;

// Get the route with highlighting information.
if (!empty($this->query->highlight)
	&& empty($this->result->mime)
	&& $this->params->get('highlight_terms', 1)
	&& JPluginHelper::isEnabled('system', 'highlight'))
{
	$route .= '&highlight=' . base64_encode(json_encode($this->query->highlight));
}

?>
<li class="list-group-item">
	<div class="d-flex justify-content-between">
		<?php if($this->result->publish_start_date) : ?>
			<small class="icon-clock" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_PUBLISH_DATE') ?>">
				<?php echo JHtml::_('date', $this->result->publish_start_date, JText::_('DATE_FORMAT_LC1')) ?>
			</small>
		<?php endif; ?>
		<?php if ($this->result->category) : ?>
			<small data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_RESULT_TYPE') ?>">
				<?php echo $this->result->category; ?>
			</small>
		<?php endif; ?>
	</div>
	<!-- titolo -->
	<h4 class="<?php echo $mime; ?>">
		<a href="<?php echo JRoute::_($route); ?>">
			<?php echo $this->result->title; ?>
		</a>
	</h4>
	<!-- titolo -->
	<?php if ($show_description && $description !== '') : ?>
		<p class="card-text"><?php echo $description; ?></p>
	<?php endif; ?>
	<?php if ($this->params->get('show_url', 1)) : ?>
		<div class="small result-url<?php echo $this->pageclass_sfx; ?>">
			<?php echo $this->baseUrl, JRoute::_($this->result->route); ?>
		</div>
	<?php endif; ?>
</li>

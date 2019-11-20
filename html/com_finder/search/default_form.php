<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

if ($this->params->get('show_advanced', 1) || $this->params->get('show_autosuggest', 1))
{
	JHtml::_('jquery.framework');

	$script = "
jQuery(function() {";

	if ($this->params->get('show_advanced', 1))
	{
		/*
		* This segment of code disables select boxes that have no value when the
		* form is submitted so that the URL doesn't get blown up with null values.
		*/
		$script .= "
	jQuery('#finder-search').on('submit', function(e){
		e.stopPropagation();
		// Disable select boxes with no value selected.
		jQuery('#advancedSearch').find('select').each(function(index, el) {
			var el = jQuery(el);
			if(!el.val()){
				el.attr('disabled', 'disabled');
			}
		});
	});";
	}

	/*
	* This segment of code sets up the autocompleter.
	*/
	if ($this->params->get('show_autosuggest', 1))
	{
		JHtml::_('script', 'jui/jquery.autocomplete.min.js', array('version' => 'auto', 'relative' => true));

		$script .= "
	var suggest = jQuery('#q').autocomplete({
		serviceUrl: '" . JRoute::_('index.php?option=com_finder&task=suggestions.suggest&format=json&tmpl=component') . "',
		paramName: 'q',
		minChars: 1,
		maxHeight: 400,
		width: 300,
		zIndex: 9999,
		deferRequestBy: 500
	});";
	}

	$script .= "
});";

	JFactory::getDocument()->addScriptDeclaration($script);
}
?>
<div class="col-12">
	<form id="finder-search" action="<?php echo JRoute::_($this->query->toUri()); ?>" method="get">
		<?php echo $this->getFields(); ?>

		<?php
		/*
		 * DISABLED UNTIL WEIRD VALUES CAN BE TRACKED DOWN.
		 */
		if (false && $this->state->get('list.ordering') !== 'relevance_dsc') : ?>
			<input type="hidden" name="o" value="<?php echo $this->escape($this->state->get('list.ordering')); ?>" />
		<?php endif; ?>

			<div class="form-group row">
				<div class="col-12 col-sm-12 col-md-8 col-lg-10">
					<input type="text" name="q" id="q" value="<?php echo $this->escape($this->query->input); ?>" class="inputbox form-control" />
				</div>
				<div class="col-12 col-sm-12 col-md-4 col-lg-2 mt-2 mt-md-0">
					<?php if ($this->escape($this->query->input) != '' || $this->params->get('allow_empty_query')) : ?>
						<button name="Search" type="submit" class="btn btn-primary btn-block"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
					<?php else : ?>
						<button name="Search" type="submit" class="btn btn-primary btn-block disabled"> <?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
					<?php endif; ?>
				</div>
			</div>
			<?php if ($this->params->get('show_advanced', 1)) : ?>
				<a class="btn btn-link link-default" data-toggle="collapse" href="#advancedSearch" aria-expanded="false" aria-controls="advancedSearch">
			    <i class="far fa-caret-square-down pr-1" aria-hidden="true"></i> <?php echo JText::_('COM_FINDER_ADVANCED_SEARCH_TOGGLE'); ?>
			  </a>
			<?php endif; ?>

		<?php if ($this->params->get('show_advanced', 1)) : ?>
			<div id="advancedSearch" class="collapse<?php if ($this->params->get('expand_advanced', 0)) echo ' in'; ?>">
				<?php if ($this->params->get('show_advanced_tips', 1)) : ?>
				<fieldset class="phrases">
					<legend>Cerca solo: </legend>
					<div id="search-query-explained">
						<div class="advanced-search-tip">
							<?php echo JText::_('COM_FINDER_ADVANCED_TIPS'); ?>
						</div>
					</div>
				</fieldset>
				<?php endif; ?>
				<fieldset class="phrases">
					<legend>Cerca solo: </legend>
					<div id="finder-filter-window">
						<?php echo JHtml::_('filter.select', $this->query, $this->params); ?>
					</div>
				</fieldset>
			</div>
		<?php endif; ?>
	</form>
</div>

<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_finder
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_SITE . '/components/com_finder/helpers/html');

JHtml::_('jquery.framework');
// JHtml::_('formbehavior.chosen');
// JHtml::_('bootstrap.tooltip');

// Load the smart search component language file.
$lang = JFactory::getLanguage();
$lang->load('com_finder', JPATH_SITE);
$suffix = $params->get('moduleclass_sfx');
$show_advanced = $params->get('show_advanced');

$script = "
jQuery(document).ready(function() {
	var value, searchword = jQuery('#mod-finder-searchword" . $module->id . "');

		// Get the current value.
		value = searchword.val();

		// If the current value equals the default value, clear it.
		searchword.on('focus', function ()
		{
			var el = jQuery(this);

			if (el.val() === '" . JText::_('MOD_FINDER_SEARCH_VALUE', true) . "')
			{
				el.val('');
			}
		});

		// If the current value is empty, set the previous value.
		searchword.on('blur', function ()
		{
			var el = jQuery(this);

			if (!el.val())
			{
				el.val(value);
			}
		});

		jQuery('#mod-finder-searchform" . $module->id . "').on('submit', function (e)
		{
			e.stopPropagation();
			var advanced = jQuery('#mod-finder-advanced" . $module->id . "');

			// Disable select boxes with no value selected.
			if (advanced.length)
			{
				advanced.find('select').each(function (index, el)
				{
					var el = jQuery(el);

					if (!el.val())
					{
						el.attr('disabled', 'disabled');
					}
				});
			}
		});";
/*
 * This segment of code sets up the autocompleter.
 */
if ($params->get('show_autosuggest', 1))
{
	JHtml::_('script', 'jui/jquery.autocomplete.min.js', array('version' => 'auto', 'relative' => true));

	$script .= "
	var suggest = jQuery('#mod-finder-searchword" . $module->id . "').autocomplete({
		serviceUrl: '" . JRoute::_('index.php?option=com_finder&task=suggestions.suggest&format=json&tmpl=component') . "',
		paramName: 'q',
		minChars: 1,
		maxHeight: 400,
		width: 300,
		zIndex: 9999,
		deferRequestBy: 500
	});";
}

$script .= '});';

JFactory::getDocument()->addScriptDeclaration($script);
?>
<div class="search mod_finder d-flex justify-content-end my-2 my-lg-0">
	<form id="mod-finder-searchform<?php echo $module->id; ?>" action="<?php echo JRoute::_($route); ?>" method="get" class="form-search form-inline">
		<label class="sr-only" for="mod-finder-searchword<?php echo $module->id ?>">Ricerca</label>
		<div class="input-group">
	    <input type="search" name="q" id="mod-finder-searchword<?php echo $module->id ?>" class="form-control" placeholder="<?php echo JText::_('MOD_FINDER_SEARCH_VALUE') ?>" value="<?php echo htmlspecialchars(JFactory::getApplication()->input->get('q', '', 'string'), ENT_COMPAT, 'UTF-8') ?>">
			<button type="submit" title="<?php echo JText::_('MOD_FINDER_SEARCH_BUTTON') ?>" class="input-group-addon <?php echo $suffix ?> <?php echo $suffix ?>" id="btnGroupAddon" onclick="this.form.searchword.focus();"><i class="far fa-search"></i></button>
	  </div>
		<?php if ($show_advanced == 2) : ?>
		<a href="<?php echo JRoute::_($route); ?>"><i class="fa fa-caret-right pr-2" aria-hidden="true"></i><?php echo JText::_('COM_FINDER_ADVANCED_SEARCH'); ?></a>
		<?php endif; ?>
		<?php echo modFinderHelper::getGetFields($route, (int) $params->get('set_itemid')); ?>
	</form>
</div>

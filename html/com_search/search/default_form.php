<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

//JHtml::_('bootstrap.tooltip');

$lang = JFactory::getLanguage();
$upper_limit = $lang->getUpperLimitSearchWord();
?>

<div class="row mt-3">
	<div class="col-12">
		<form id="searchForm" action="<?php echo JRoute::_('index.php?option=com_search'); ?>" method="post" class="custom-form">
			<div class="toolbar">
				<div class="form-group row">
					<div class="col-12 col-sm-12 col-md-8 col-lg-10">
						<input class="form-control" type="search" name="searchword" placeholder="<?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>" />
				  </div>
					<div class="col-12 col-sm-12 col-md-4 col-lg-2 mt-2 mt-md-0">
						<button name="Search" onclick="this.form.submit()" class="btn btn-primary btn-block" title="<?php echo JHtml::_('tooltipText', 'COM_SEARCH_SEARCH');?>"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
				  </div>
				</div>
				<input type="hidden" name="task" value="search" />
			</div><!-- end. toolbar -->

			<div class="row searchintro<?php echo $this->params->get('pageclass_sfx'); ?>">
				<div class="col-12 col-sm-6">
					<?php if (!empty($this->searchword)) : ?>
					<p><?php echo JText::plural('COM_SEARCH_SEARCH_KEYWORD_N_RESULTS', '<span class="badge badge-default">' . $this->total . '</span>'); ?></p>
					<?php endif; ?>
				</div>
				<div class="col-12 col-sm-6 text-right">
				  <a class="btn btn-link link-default" data-toggle="collapse" href="#advanceSearchCollapse" aria-expanded="false" aria-controls="advanceSearchCollapse">
				    <i class="fas fa-caret-square-down pr-1" aria-hidden="true"></i> Ricerca avanzata
				  </a>
				</div>
			</div>

			<div class="collapse" id="advanceSearchCollapse">
				<div class="row">
					<div class="col-12">
						<?php if ($this->params->get('search_phrases', 1)) : ?>
							<fieldset class="phrases">
								<legend><?php echo JText::_('COM_SEARCH_FOR'); ?></legend>
								<div class="phrases-box">
									<?php echo $this->lists['searchphrase']; ?>
								</div>
								<div class="ordering-box mt-3">
									<label for="ordering" class="ordering">
										<?php echo JText::_('COM_SEARCH_ORDERING'); ?>
									</label>
									<?php echo $this->lists['ordering']; ?>
								</div>
							</fieldset>
						<?php endif; ?>

						<?php if ($this->params->get('search_areas', 1)) : ?>
							<fieldset class="only mt-3">
								<legend><?php echo JText::_('COM_SEARCH_SEARCH_ONLY'); ?></legend>
								<?php foreach ($this->searchareas['search'] as $val => $txt) :
									$checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="checked"' : '';
								?>
								<label for="area-<?php echo $val; ?>" class="checkbox">
									<input type="checkbox" name="areas[]" value="<?php echo $val; ?>" id="area-<?php echo $val; ?>" <?php echo $checked; ?> >
									<?php if($txt == 'PLG_SEARCH_PHOCADOWNLOAD_PHOCADOWNLOAD') : ?>
										<?php echo JText::_('Modulistica e documenti'); ?>
									<?php else: ?>
										<?php echo JText::_($txt); ?>
									<?php endif; ?>
								</label>
								<?php endforeach; ?>
							</fieldset>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<?php if ($this->total > 0) : ?>
				<div class="form-limit mt-3">
					<label for="limit"><?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?></label>
					<?php echo $this->pagination->getLimitBox(); ?>
				</div>
				<p class="counter"><?php echo $this->pagination->getPagesCounter(); ?></p>
			<?php endif; ?>
		</form>
	</div>
</div>

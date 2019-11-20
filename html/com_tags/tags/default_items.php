<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// JHtml::_('behavior.core');
// JHtml::_('formbehavior.chosen', 'select');

// Get the user object.
$user = JFactory::getUser();

// Check if user is allowed to add/edit based on tags permissions.
$canEdit = $user->authorise('core.edit', 'com_tags');
$canCreate = $user->authorise('core.create', 'com_tags');
$canEditState = $user->authorise('core.edit.state', 'com_tags');
//
// $columns = $this->params->get('tag_columns', 1);

// // Avoid division by 0 and negative columns.
// if ($columns < 1)
// {
// 	$columns = 1;
// }
//
// $bsspans = floor(12 / $columns);
//
// if ($bsspans < 1)
// {
// 	$bsspans = 1;
// }

// $bscolumns = min($columns, floor(12 / $bsspans));
 $n = count($this->items);
JFactory::getDocument()->addScriptDeclaration("
		var resetFilter = function() {
		document.getElementById('filter-search').value = '';
	}
");
?>

<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm" class="w-100">
	<?php if ($this->params->get('filter_field') || $this->params->get('show_pagination_limit')) : ?>
		<fieldset class="filters btn-toolbar">
			<?php if ($this->params->get('filter_field')) : ?>
				<div class="form-group row">
					<label class="filter-search-lbl element-invisible col-12 col-sm-4 sr-only" for="filter-search">
						<?php echo JText::_('COM_TAGS_TITLE_FILTER_LABEL') . '&#160;'; ?>
					</label>
					<div class="col-12 col-sm-12 col-md-8 col-lg-10">
						<input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->state->get('list.filter')); ?>" class="form-control" onchange="document.adminForm.submit();" title="<?php echo JText::_('COM_TAGS_FILTER_SEARCH_DESC'); ?>" placeholder="<?php echo JText::_('COM_TAGS_TITLE_FILTER_LABEL'); ?>" />
					</div>
					<div class="col-12 col-sm-12 col-md-4 col-lg-2 mt-2 mt-md-0">
						<button type="button" name="filter-search-button" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>" onclick="document.adminForm.submit();" class="btn btn-primary btn-block icon-search">Cerca</button>
					</div>
				</div>
			<?php endif; ?>
			<?php if ($this->params->get('show_pagination_limit')) : ?>
				<div class="form-group row">
					<label for="limit" class="col-4 col-sm-4 col-md-3 col-lg-2 col-form-label">
						<?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
					</label>
					<div class="col-8 col-sm-8 col-md-9 col-lg-10">
						<?php echo $this->pagination->getLimitBox(); ?>
					</div>
				</div>
			<?php endif; ?>

			<input type="hidden" name="filter_order" value="" />
			<input type="hidden" name="filter_order_Dir" value="" />
			<input type="hidden" name="limitstart" value="" />
			<input type="hidden" name="task" value="" />
			<div class="clearfix"></div>
		</fieldset>
	<?php endif; ?>

	<?php if ($this->items == false || $n == 0) : ?>
    <?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_('COM_TAGS_NO_TAGS')); ?>
	<?php else : ?>
	<div class="row">
		<div class="col-12 text-center">
			<?php foreach ($this->items as $i => $item) : ?>
        <a href="<?php echo JRoute::_(TagsHelperRoute::getTagRoute($item->id . '-' . $item->alias)); ?>" class="btn btn-outline-primary m-1" title="<?php echo $this->escape($item->title); ?>">
					<?php echo $this->escape($item->title); ?>
          <?php if ($this->params->get('all_tags_show_tag_hits')) : ?>
            <span class="badge badge-primary"><?php echo $item->hits ?></span>
          <?php endif; ?>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endif; ?>

	<?php // Add pagination links ?>
	<?php if (!empty($this->items)) : ?>
	<?php if (($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
		<div class="pagination row">
			<div class="col-12 mt-3">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<div class="text-center"><?php echo $this->pagination->getPagesCounter(); ?></div>
			<?php endif; ?>
			<div class="d-flex justify-content-center mt-2"><?php echo $this->pagination->getPagesLinks(); ?></div>
			</div>
		</div>
	<?php endif; ?>
</form>
<?php endif; ?>

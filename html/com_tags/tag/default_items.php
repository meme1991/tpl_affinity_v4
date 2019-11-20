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
// Do we really have to make it so people can see unpublished tags???
$canEdit = $user->authorise('core.edit', 'com_tags');
$canCreate = $user->authorise('core.create', 'com_tags');
$canEditState = $user->authorise('core.edit.state', 'com_tags');
$items = $this->items;
$n = count($this->items);
JFactory::getDocument()->addScriptDeclaration("
		var resetFilter = function() {
		document.getElementById('filter-search').value = '';
	}
");
?>
<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm" class="w-100">
	<?php if ($this->params->get('show_headings') || $this->params->get('filter_field') || $this->params->get('show_pagination_limit')) : ?>
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
		<?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_('COM_TAGS_NO_ITEMS')); ?>
	<?php else : ?>
		<div class="row grid">
			<div class="grid-sizer col-12 col-sm-12 col-md-6 col-lg-4"></div>
			<?php foreach($items as $i => $item) : ?>
				<div class="grid-item ccol-12 col-sm-12 col-md-6 col-lg-4 mb-3">
					<div class="card card-default">
						<?php $images = json_decode($item->core_images); ?>
						<?php if ($this->params->get('tag_list_show_item_image', 1) == 1 && !empty($images->image_intro)) : ?>
						  <figure class="mb-0 default">
						    <img src="<?php echo htmlspecialchars($images->image_intro); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($images->image_intro_alt, ENT_COMPAT, 'UTF-8'); ?>" />
						    <figcaption class="d-flex justify-content-center align-items-center">
						      <i class="far fa-external-link fa-3x" aria-hidden="true"></i>
						    </figcaption>
						    <a href="<?php echo JRoute::_(TagsHelperRoute::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>" title="<?php echo $item->core_title ?>"></a>
						  </figure>
						<?php endif; ?>

						<div class="card-block">
							<div class="card-h">
							  <!-- categoria e utente -->
							  <div class="d-flex justify-content-between">
							    <?php if($this->params->get('tag_list_show_date')) : ?>
							      <small data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_PUBLISH_DATE') ?>">
											<?php echo JHtml::_('date', $item->displayDate, JText::_('DATE_FORMAT_LC1')) ?>
							      </small>
							    <?php endif; ?>

									<?php
										switch ($item->content_type_title) {
											case 'Article': $tagType = 'Articolo'; break;
											case 'Contact': $tagType = 'Contatto'; break;
											case 'Article Category': $tagType = 'Categoria'; break;
											default: $tagType = 'Articolo'; break;
										}
									 ?>
						      <small data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('Tipo') ?>">
										<?php echo $tagType ?>
						      </small>
							  </div>
							  <!-- categoria e utente -->

							  <!-- titolo -->
								<?php if (($item->type_alias == 'com_users.category') || ($item->type_alias == 'com_banners.category')) : ?>
									<h3 class="card-title mb-1">
										<?php echo $this->escape($item->core_title); ?>
									</h3>
								<?php else : ?>
									<h3 class="card-title mb-1">
										<a href="<?php echo JRoute::_(TagsHelperRoute::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>" title="<?php echo $this->escape($item->core_title); ?>">
											<?php echo $this->escape($item->core_title); ?>
										</a>
									</h3>
								<?php endif; ?>
							  <!-- titolo -->
							</div>

							<?php if ($this->params->get('tag_list_show_item_description', 1)) : ?>
								<p class="card-text"><?php echo JHtml::_('string.truncate', strip_tags($item->core_body, '<strong><a>'), $this->params->get('tag_list_item_maximum_characters')) ?></p>
				  		<?php endif; ?>
						</div>

				  </div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</form>

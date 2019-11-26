<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
$dispatcher = JEventDispatcher::getInstance();

$this->category->text = $this->category->description;
$dispatcher->trigger('onContentPrepare', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$this->category->description = $this->category->text;

$results = $dispatcher->trigger('onContentAfterTitle', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayTitle = trim(implode("\n", $results));

$results = $dispatcher->trigger('onContentBeforeDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$beforeDisplayContent = trim(implode("\n", $results));

$results = $dispatcher->trigger('onContentAfterDisplay', array($this->category->extension . '.categories', &$this->category, &$this->params, 0));
$afterDisplayContent = trim(implode("\n", $results));

?>
<section class="wrapper block-view">
	<div class="container blog <?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Blog">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg">
				<?php if ($this->params->def('show_description_image', 1) && $this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
					<?php echo JLayoutHelper::render('joomla.content.cover_image', array('image' => $this->category->getParams()->get('image'), 'alt' => htmlspecialchars($this->category->getParams()->get('image_alt'), ENT_COMPAT, 'UTF-8'))); ?>
				<?php endif; ?>
				<?php if ($this->params->get('show_page_heading')) : ?>
					<?php echo JLayoutHelper::render('joomla.content.title.title_heading', $this->escape($this->params->get('page_heading'))) ?>
				<?php endif; ?>
				<?php if ($this->params->get('show_category_title', 1)) : ?>
					<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->category->title) ?>
				<?php endif; ?>
				<?php if ($this->params->get('page_subheading')) : ?>
					<?php echo JLayoutHelper::render('joomla.content.title.subtitle', $this->escape($this->params->get('page_subheading'))) ?>
				<?php endif; ?>
				<?php echo $afterDisplayTitle; ?>

				<?php if ($beforeDisplayContent || $afterDisplayContent || $this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
					<div class="category-desc clearfix">
						<?php echo $beforeDisplayContent; ?>
						<?php if ($this->params->get('show_description') && $this->category->description) : ?>
							<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
						<?php endif; ?>
						<?php echo $afterDisplayContent; ?>
					</div>
				<?php endif; ?>

				<?php $list = array_merge($this->lead_items, $this->intro_items) ?>
				<?php if (empty($list)) : ?>
					<?php if ($this->params->get('show_no_articles', 1)) : ?>
						<?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_('COM_CONTENT_NO_ARTICLES')); ?>
					<?php endif; ?>
				<?php endif; ?>
      </div>
    </div>
    <div class="row mt-3">
			<?php $col = 12/$this->columns; ?>
			<?php if (!empty($list)) : ?>
				<?php foreach ($list as &$item) : ?>
					<div class="grid-item col-12 col-sm-12 col-md-6 col-lg-<?php echo $col ?>">
						<?php $this->item = &$item; ?>
						<?php echo $this->loadTemplate('item'); ?>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>

      <?php if ($this->maxLevel != 0 && !empty($this->children[$this->category->id])) : ?>
				<?php echo $this->loadTemplate('children'); ?>
			<?php endif; ?>
    </div><!-- end items-leading -->

		<?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
      <div class="row">
        <div class="col-12 mt-3">
				<?php if ($this->params->def('show_pagination_results', 1)) : ?>
					<div class="text-center"><?php echo $this->pagination->getPagesCounter(); ?></div>
				<?php endif; ?>
					<div class="d-flex justify-content-center mt-2"><?php echo $this->pagination->getPagesLinks(); ?></div>
				</div>
      </div>
		<?php endif; ?>
	</div>
</section>

<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
?>

<?php if (empty($this->items)) : ?>
	<?php if ($this->params->get('show_no_articles', 1)) : ?>
		<?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_('COM_CONTENT_NO_ARTICLES')); ?>
	<?php endif; ?>
<?php else : ?>
<div class="row mt-3">
<?php foreach ($this->items as $i => $article) : ?>
	<?php echo JLayoutHelper::render('joomla.content.card.list-default', $article); ?>
<?php endforeach; ?>
</div>
<?php endif; ?>

<?php // Add pagination links ?>
<?php if (($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
	<div class="col-12 mt-3">
	<?php if ($this->params->def('show_pagination_results', 1)) : ?>
		<div class="text-center"><?php echo $this->pagination->getPagesCounter(); ?></div>
	<?php endif; ?>
		<div class="d-flex justify-content-center mt-2"><?php echo $this->pagination->getPagesLinks(); ?></div>
	</div>
<?php endif; ?>

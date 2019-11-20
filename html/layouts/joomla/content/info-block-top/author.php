<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
?>
<?php $author = ($displayData['item']->created_by_alias ?: $displayData['item']->author); ?>
<small class="d-none d-md-block" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_AUTHOR') ?>" itemprop="author" itemscope="" itemtype="https://schema.org/Person" content="<?php echo $author ?>">
	<span class="sr-only"><?php echo JText::_('TPL_AFFINITY_AUTHOR') ?></span>
	<?php if (!empty($displayData['item']->contact_link ) && $displayData['params']->get('link_author') == true) : ?>
		<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', $displayData['item']->contact_link, $author, array('itemprop' => 'name'))); ?>
	<?php else : ?>
		<span itemprop="name">
			<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
		</span>
	<?php endif; ?>
</small>

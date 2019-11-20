<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

use Joomla\Registry\Registry;
JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php');
$authorised = JFactory::getUser()->getAuthorisedViewLevels();
?>
<?php if (!empty($displayData)) : ?>
	<!-- <div class="tags-list">
		<h4><?php echo JText::_('TPL_AFFINITY_TAG_LABEL') ?></h4>
	</div> -->
	<ul class="tags list-inline mt-4">
		<?php foreach ($displayData as $i => $tag) : ?>
			<?php if (in_array($tag->access, $authorised)) : ?>
				<?php $tagParams = new Registry($tag->params); ?>
				<?php $link_class = $tagParams->get('tag_link_class', 'label label-info'); ?>
				<li class="list-inline-item tag-<?php echo $tag->tag_id; ?> tag-list<?php echo $i; ?> mr-1 mt-1" itemprop="keywords">
					<a href="<?php echo JRoute::_(TagsHelperRoute::getTagRoute($tag->tag_id . '-' . $tag->alias)); ?>" title="<?php echo $this->escape($tag->title); ?>" class="btn btn-outline-primary btn-sm">
						<?php echo $this->escape($tag->title); ?>
					</a>
				</li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

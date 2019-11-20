<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_tags_similar
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<?php JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php'); ?>

<?php if ($list) : ?>
	<?php foreach ($list as $i => $item) : ?>
		<?php $item->route = new JHelperRoute; ?>
	<div class="tagssimilar d-flex article-list mb-2">
		<span class="d-flex justify-content-center align-items-center py-2 px-3">
			<i class="fa fa-chevron-right" aria-hidden="true"></i>
		</span>
		<a href="<?php echo JRoute::_(TagsHelperRoute::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>" title="<?php echo $item->core_title; ?>" class="p-2">
			<?php if (!empty($item->core_title)) :
				echo htmlspecialchars($item->core_title, ENT_COMPAT, 'UTF-8');
			endif; ?>
		</a>
	</div>
	<?php endforeach; ?>
<?php endif; ?>

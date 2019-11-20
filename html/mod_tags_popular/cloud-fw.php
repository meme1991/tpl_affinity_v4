<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_tags_popular
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$minsize = $params->get('minsize', 1);
$maxsize = $params->get('maxsize', 2);

JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php');
?>
<?php if (count($list)) : ?>
<section class="wrapper tagspopular container-layout <?php echo $moduleclass_sfx; ?>">
	<div class="container">
		<div class="row tagscloud <?php echo $moduleclass_sfx; ?>">
			<?php echo JLayoutHelper::render('joomla.content.module.title_section', $module); ?>
			<div class="col-12 text-center">
				<?php
				// Find maximum and minimum count
				$mincount = null;
				$maxcount = null;
				foreach ($list as $item)
				{
					if ($mincount === null || $mincount > $item->count)
					{
						$mincount = $item->count;
					}
					if ($maxcount === null || $maxcount < $item->count)
					{
						$maxcount = $item->count;
					}
				}
				$countdiff = $maxcount - $mincount;

				foreach ($list as $item) :
					if ($countdiff === 0) :
						$fontsize = $minsize;
					else :
						$fontsize = $minsize + (($maxsize - $minsize) / $countdiff) * ($item->count - $mincount);
					endif;
				?>
				<a href="<?php echo JRoute::_(TagsHelperRoute::getTagRoute($item->tag_id . '-' . $item->alias)); ?>" style="font-size: <?php echo $fontsize . 'em'; ?>" class="btn btn-outline-primary tags mx-1">
					<?php echo htmlspecialchars($item->title, ENT_COMPAT, 'UTF-8'); ?>
					<?php if ($display_count) : ?>
						<span class="badge badge-primary"><?php echo $item->count; ?></span>
					<?php endif; ?>
				</a>
				<?php endforeach; ?>

			</div>
		</div>

	</div>
</section>
<?php endif; ?>

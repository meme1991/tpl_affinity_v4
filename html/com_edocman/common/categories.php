<?php
/**
 * @version        1.11.1
 * @package        Joomla
 * @subpackage     EDocman
 * @author         Tuan Pham Ngoc
 * @copyright      Copyright (C) 2011 - 2018 Ossolution Team
 * @license        GNU/GPL, see LICENSE.php
 */

// no direct access
defined('_JEXEC') or die;

if (count($categories))
{
	if ($categoryId)
	{
	?>
		<!-- <h3 class="edocman-heading">
			<?php echo JText::_('EDOCMAN_SUB_CATEGORIES'); ?>
		</h3> -->
	<?php
	}
	if((int) $number_categories > 0)
    {
        $numberColumns = $number_categories;
    }
	elseif (isset($config->number_subcategories))
	{
		$numberColumns = $config->number_subcategories ;
	}
	else
	{
		$numberColumns = 1 ;
	}
	$span = intval(12 / $numberColumns);
	if ($span != 12)
	{
		$spanClass = ' '.$bootstrapHelper->getClassMapping('span'.$span);
	}
	else
	{
		$spanClass = '';
	}
	$rowFluidClass = $bootstrapHelper->getClassMapping('row-fluid');
	?>
	<div id="edocman-categories">
		<div class="<?php echo $rowFluidClass; ?> clearfix mt-4">
		<?php
		$j = 0;
		for ($i = 0 , $n = count($categories) ; $i < $n ; $i++)
		{
			$category = $categories[$i];
			if (!$config->show_empty_cat && !$category->total_documents)
			{
				continue ;
			}
			if ($category->image && JFile::exists(JPATH_ROOT.'/media/com_edocman/category/thumbs/'.$category->image))
			{
				$imgUrl = JUri::base().'media/com_edocman/category/thumbs/'.$category->image;
			}
			else
			{
				if (!isset($config->show_default_category_thumbnail) || $config->show_default_category_thumbnail)
				{
					$imgUrl = JUri::base().'components/com_edocman/assets/images/icons/32x32/folder.png' ;
				}
				else
				{
					$imgUrl = '';
				}
			}
			//if ($numberColumns != 1 && ($i % $numberColumns == 0))
			//{
			?>
			<!--<div class="clearfix">-->
			<?php
			//}
			$j++;
			?>
			<div class="col-12 edocman-category<?php echo $spanClass; ?>">
				<div class="card card-block py-3">
					<h4 class="card-title">
			      <a href="<?php echo JRoute::_(EDocmanHelperRoute::getCategoryRoute($category->id, $Itemid)); ?>" title="<?php echo $category->title ?>">
			        <?php echo $category->title ?>
							<?php if ($config->show_number_documents) : ?>
								<small>( <?php echo $category->total_documents ;?> <?php echo $category->total_documents != 1 ? JText::_('EDOCMAN_DOCUMENTS') :  JText::_('EDOCMAN_DOCUMENT') ; ?> )</small>
							<?php endif; ?>
			      </a>
				  </h4>
					<?php if($category->description): ?>
						<div class="card-body px-0 pt-0">
					    <p class="card-text"><?php echo JHtml::_('string.truncate', strip_tags($category->description), 200) ?></p>
					  </div>
					<?php endif; ?>
					<a href="<?php echo JRoute::_(EDocmanHelperRoute::getCategoryRoute($category->id, $Itemid)); ?>" class="btn btn-primary btn-block icon-go" title="<?php echo $category->title ?>">
				    <?php echo JText::_('TPL_AFFINITY_ACCESS') ?>
				  </a>
				</div>
			</div>
		<?php
			if($j == $numberColumns)
			{
				?>
				</div><div class="<?php echo $rowFluidClass; ?> clearfix">
				<?php
				$j = 0;
			}
		}
		?>
		</div>
	</div>
<?php
}

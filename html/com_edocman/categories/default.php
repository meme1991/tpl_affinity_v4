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
?>
<section class="wrapper" id="edocman-categories-page">
	<div class="container">
		<div class="row">
			<div class="col-12">

				<div class="edocman-container">
					<?php
						if (!$this->categoryId)
						{
							$heading = JText::_('EDOCMAN_CATEGORIES');
							if (is_object($this->menu))
							{
								if ($this->params->get('page_heading'))
								{
									$heading = $this->params->get('page_heading');
								}
							}
						?>
							<?php echo JLayoutHelper::render('joomla.content.title.title_page', $heading) ?>
						<?php
						}
						else
						{
							if ($this->category->image && JFile::exists(JPATH_ROOT.'/media/com_edocman/category/thumbs/'.$this->category->image))
							{
								$imgUrl = JUri::base().'media/com_edocman/category/thumbs/'.$this->category->image;
							}
							else
							{
								if (!isset($this->config->show_default_category_thumbnail) || $this->config->show_default_category_thumbnail)
								{
									$imgUrl = JUri::base().'components/com_edocman/assets/images/icons/32x32/folder.png' ;
								}
								else
								{
									$imgUrl = '';
								}
							}
							?>
							<div id="edocman-category">
								<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->category->title) ?>
								<?php
									if ($imgUrl)
									{
									    ?>
										<img class="edocman-thumb-left" src="<?php echo $imgUrl; ?>" alt="<?php echo $this->category->title; ?>" />
									    <?php
									}
									if($this->category->description != '')
									{
									    ?>
										<div class="edocman-description">
											<?php echo $this->category->description; ?>
										</div>
									    <?php
									}
								?>
							</div>
						<?php
						}
						$categories_layout = $this->params->get('categories_layout','default');
						if($categories_layout == 'default')
				        {
				            $categories_layout = 'categories.php';
				        }
				        else
				        {
				            $categories_layout = 'categories_table.php';
				        }
						echo EDocmanHelperHtml::loadCommonLayout('common/'.$categories_layout, array('categories' => $this->items, 'categoryId' => $this->categoryId, 'config' => $this->config, 'bootstrapHelper' => $this->bootstrapHelper, 'Itemid' => $this->Itemid, 'subscat' => 1 , 'number_categories' => $this->config->number_categories_per_row));
						if ($this->pagination->total > $this->pagination->limit)
						{
						?>
							<div class="pagination">
								<?php echo $this->pagination->getPagesLinks(); ?>
							</div>
						<?php
						}
					?>
				</div>

			</div>
		</div>
	</div>
</section>

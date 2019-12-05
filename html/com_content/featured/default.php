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

$doc  = JFactory::getDocument();
$tmpl = JFactory::getApplication()->getTemplate();
JHtml::_('jquery.framework');
$doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/masonry/masonry.min.js', 'text/javascript', true, false);
$doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/masonry/lazyload.min.js', 'text/javascript', true, false);
$doc->addStyleSheet(JUri::base(true).'/templates/'.$tmpl.'/dist/swiper/swiper.min.css');
$doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/swiper/swiper.min.js');
$doc->addScriptDeclaration("
	jQuery(document).ready(function($){
		if($('.featured-view .grid').length){
			var grid = $('.featured-view .grid').masonry({
				itemSelector: '.grid-item',
				columnWidth: '.grid-sizer',
				percentPosition: true
			});

			grid.imagesLoaded().progress( function() {
				grid.masonry('layout');
			});
		}

		var swiperPartner = new Swiper('.swiper-container.leaditem', {
	    slidesPerView: 1,
			autoplay: {
        delay: 10000,
        disableOnInteraction: false,
      },
	    // breakpoints: {
	    //     1024: {
	    //         slidesPerView: 4,
	    //         spaceBetween: 40
	    //     },
	    //     768: {
	    //         slidesPerView: 3,
	    //         spaceBetween: 30
	    //     },
	    //     576: {
	    //         slidesPerView: 1,
	    //         spaceBetween: 10
	    //     }
	    // }
	  });

	})
");
?>
<section class="wrapper featured-view" itemscope itemtype="https://schema.org/Blog">
	<div class="container">
		<?php if(count($this->lead_items) > 0): ?>
			<div class="row mb-3">
				<div class="col-12">
					<div class="swiper-container leaditem">
						<div class="swiper-wrapper">
							<?php foreach ($this->lead_items as &$item) : ?>
								<div class="swiper-slide">
									<?php $this->item = &$item; ?>
									<?php echo $this->loadTemplate('lead'); ?>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if ($this->params->get('show_page_heading') != 0) : ?>
			<div class="row">
				<div class="col-12">
					<?php echo JLayoutHelper::render('joomla.content.title.title_section', $this->escape($this->params->get('page_heading'))); ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="row grid mt-3">
			<?php $col = 12/$this->columns; ?>
			<div class="grid-sizer col-12 col-sm-12 col-md-6 col-lg-<?php echo $col ?>"></div>
			<?php $list = array_merge($this->intro_items, $this->link_items); ?>
			<?php if (!empty($list)) : ?>
				<?php foreach ($list as $k => &$item) : ?>
					<div class="grid-item col-12 col-sm-12 col-md-6 col-lg-<?php echo $col ?> mb-3">
						<?php $this->item = &$item; ?>
						<?php echo $this->loadTemplate('item'); ?>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<?php if ($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2 && $this->pagination->pagesTotal > 1)) : ?>
		<div class="row">
			<div class="col-12 mt-3">
				<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<div class="text-center"><?php echo $this->pagination->getPagesCounter(); ?></div>
			<?php endif; ?>
				<div class="d-flex justify-content-center mt-2"><?php echo $this->pagination->getPagesLinks(); ?></div>
			</div>
		</div>
		<?php else:  ?>
		<div class="row">
			<div class="col-12 mt-4 text-center">
				<p><a href="<?php echo JURI::base(true) ?>/tutte-le-notizie" class="btn btn-primary icon-go"><?php echo JText::_('TPL_AFFINITY_MORE_ARTICLE') ?></a></p>
			</div>
		</div>
		<?php endif; ?>

	</div>
</section>

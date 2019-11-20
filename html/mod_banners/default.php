<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_banners
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::register('BannerHelper', JPATH_ROOT . '/components/com_banners/helpers/banner.php');
$baseurl = JUri::base();
$doc     = JFactory::getDocument();
$tmpl    = JFactory::getApplication()->getTemplate();
$doc->addStyleSheet(JUri::base(true).'/templates/'.$tmpl.'/dist/swiper/swiper.min.css');
JHtml::_('jquery.framework');
$doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/swiper/swiper.min.js');
$doc->addScriptDeclaration("
	jQuery(document).ready(function($){

		var swiperPartner = new Swiper('.swiper-container.banneritem".$module->id."', {
	    slidesPerView: 4,
			pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
			autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
	    breakpoints: {
	        1024: {
	            slidesPerView: 4,
	            spaceBetween: 40
	        },
	        768: {
	            slidesPerView: 3,
	            spaceBetween: 30
	        },
	        576: {
	            slidesPerView: 1,
	            spaceBetween: 10
	        }
	    }
	  });

	});
");
?>
<section class="wrapper bg-light swiper-default bannergroup <?php echo $moduleclass_sfx; ?>">
	<div class="container">
		<div class="row">
			<?php if($module->showtitle) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_section', $module->title); ?>
			<?php endif; ?>
			<div class="col-12">

				<!-- Swiper -->
				<div class="swiper-container banneritem<?php echo $module->id ?>">
					<div class="swiper-wrapper">
						<?php foreach ($list as $item) : ?>
							<?php $link = JRoute::_('index.php?option=com_banners&task=click&id=' . $item->id); ?>
							<?php $imageurl = $item->params->get('imageurl'); ?>
							<?php $alt = $item->params->get('alt'); ?>
							<?php $alt = $alt ?: $item->name; ?>
							<?php $alt = $alt ?: JText::_('MOD_BANNERS_BANNER'); ?>
							<div class="swiper-slide bg-light">
								<a href="<?php echo $link ?>" target="_blank" title="<?php echo htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8'); ?>">
									<img src="<?php echo $imageurl ?>" class="img-fluid" alt="<?php echo $alt ?>">
								</a>
							</div>
						<?php endforeach; ?>
					</div>
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="button-next"><i class="fal fa-angle-right fa-5x" aria-hidden="true"></i></div>
					<div class="button-prev"><i class="fal fa-angle-left fa-5x" aria-hidden="true"></i></div>
				</div>

			</div>
		</div>
	</div>
</section>

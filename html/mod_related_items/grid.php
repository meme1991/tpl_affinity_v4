<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_related_items
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$doc  = JFactory::getDocument();
$tmpl = JFactory::getApplication()->getTemplate();
JHtml::_('jquery.framework');
$doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/masonry/masonry.min.js');
$doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/dist/masonry/lazyload.min.js');
$doc->addScriptDeclaration("
	jQuery(document).ready(function($){
		if($('.relateditems-".$module->id." .grid').length){
			var grid = $('.relateditems-".$module->id." .grid').masonry({
				itemSelector: '.grid-item',
				columnWidth: '.grid-sizer',
				percentPosition: true
			});

			grid.imagesLoaded().progress( function() {
				grid.masonry('layout');
			});
		}
	})
");
?>

<?php $col = ($params->get('bootstrap_size')) ? $params->get('bootstrap_size') : 4; ?>
<?php if($list) : ?>
<section class="wrapper bg-light relateditems-<?php echo $module->id ?> <?php echo $moduleclass_sfx; ?>" style="background: #eee;">
	<div class="container">
		<?php if($module->showtitle) : ?>
			<div class="row">
				<?php echo JLayoutHelper::render('joomla.content.title.title_section', $module->title); ?>
			</div>
		<?php endif; ?>

		<div class="row grid mt-3">
			<div class="grid-sizer col-12 col-sm-12 col-md-6 col-lg-<?php echo $col ?>"></div>
			<?php foreach ($list as $item) : ?>
				<div class="grid-item col-12 col-sm-12 col-md-6 col-lg-<?php echo $col ?>">
					<?php echo JLayoutHelper::render('joomla.content.card.card-default', $item); ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

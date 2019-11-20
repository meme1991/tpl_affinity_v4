<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 *
 * Mostra le categorie con un layout a blocchi. Tutte allo stesso livello (livello da scegliere.)
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
// JHtml::_('behavior.caption');

// $doc  = JFactory::getDocument();
// $tmpl = JFactory::getApplication()->getTemplate();
// JHtml::_('jquery.framework');
// $doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/js/masonry/masonry.min.js');
// $doc->addScript(JUri::base(true).'/templates/'.$tmpl.'/js/masonry/lazyload.min.js');
// $doc->addScriptDeclaration("
// 	jQuery(document).ready(function($){
// 		if($('.categories-list.block-view .grid').length){
// 			var grid = $('.categories-list.block-view .grid').masonry({
// 				itemSelector: '.grid-item',
// 				columnWidth: '.grid-sizer',
// 				percentPosition: true
// 			});
//
// 			grid.imagesLoaded().progress( function() {
// 				grid.masonry('layout');
// 			});
// 		}
// 	})
// ");

?>
<section class="wrapper categories-list block-view <?php echo $this->pageclass_sfx; ?>">
	<div class="container">
		<?php echo JLayoutHelper::render('joomla.content.categories_default', $this); ?>
		<div class="row grid mt-3">
			<?php if($this->params->get('layout') == 2) : ?>
				<?php echo $this->loadTemplate('list'); ?>
			<?php else: ?>
				<?php echo $this->loadTemplate('items'); ?>
			<?php endif; ?>
		</div>
	</div>
</section>

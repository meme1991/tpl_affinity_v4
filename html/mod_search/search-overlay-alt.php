<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Including fallback code for the placeholder attribute in the search field.
JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', array('version' => 'auto', 'relative' => true));

$doc  = JFactory::getDocument();
JHtml::_('jquery.framework');
$doc->addScriptDeclaration("
	jQuery(document).ready(function($){
		$('.open-search-overlay').click(function(){
			$('.search-overlay-alt').addClass('active');
		})
		$('.search-overlay-alt .close-icon').click(function(){
			$('.search-overlay-alt').removeClass('active');
		})
	})
");

?>
<div class="search-overlay-alt <?php echo $moduleclass_sfx; ?>">
	<div class="container-fluid">
		<div class="row">
			<div class="col-10 col-sm-11 d-flex align-items-center justify-content-center bg-primary">
				<form class="form-inline w-100" action="<?php echo JRoute::_('index.php'); ?>" method="post">
					<label class="sr-only" for="mod-search-searchword<?php echo $module->id ?>">Search</label>
					<div class="input-group w-100">
				    <input type="search" name="searchword" class="form-control" id="mod-search-searchword<?php echo $module->id ?>" placeholder="<?php echo $text ?>" aria-describedby="btnGroupAddon">
						<button type="submit" class="input-group-addon" id="btnGroupAddon" onclick="this.form.searchword.focus();"><i class="fal fa-search" aria-hidden="true"></i></button>
				  </div>
					<input type="hidden" name="task" value="search" />
					<input type="hidden" name="option" value="com_search" />
					<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
				</form>
			</div>
			<div class="col-2 col-sm-1 d-flex align-items-center justify-content-center bg-light">
				<a href="#" class="close-icon" title="close">
					<i class="fal fa-times" aria-hidden="true"></i>
				</a>
			</div>
		</div>
	</div>
</div>

<?php defined('_JEXEC') or die;

function modChrome_article($module, &$params, &$attribs) {
	if ($module->content) {
		echo "<div class=\"well well-sm" . htmlspecialchars($params->get('moduleclass_sfx')) . "\">";
		if ($module->showtitle) {
			echo "<h4>" . $module->title . "</h4>";
		}
		echo $module->content;
		echo "</div>";
	}
}

// footer wrapper module
function modChrome_sidebar($module, &$params, &$attribs) {
	if ($module->content){
		echo '<div class="col-12 mb-3">';
			if ($module->showtitle){
				echo '<div class="aside-title"><h4>'.$module->title.'</h4></div>';
			}
			echo $module->content;
		echo '</div>';
	}
}

// footer wrapper module
function modChrome_footer($module, &$params, &$attribs) {
	if ($module->content){
		echo '<div class="col-12 col-sm-12 col-md-6 col-lg-'.$params->get('bootstrap_size').' mt-5">';
			if ($module->showtitle){
				echo '<div class="footer-title"><h5>'.$module->title.'</h5></div>';
			}
			echo '<div class="footer-block">';
			echo $module->content;
			echo '</div>';
		echo '</div>';
	}
}

// service featured
function modChrome_servicefeatured($module, &$params, &$attribs) {
	if ($module->content){
		echo '<div class="col-12 col-sm-12 col-md-6 col-lg-'.$params->get('bootstrap_size').'">';
			if ($module->showtitle){
				echo '<h3>'.$module->title.'</h3>';
			}
			echo $module->content;
		echo '</div>';
	}
}

function modChrome_utility($module, &$params, &$attribs) {
	if ($module->content){
		echo '<div class="col-12 col-sm-12 col-md-6 col-lg-'.$params->get('bootstrap_size').' mt-2">';
		echo $module->content;
		echo '</div>';
	}
}



?>

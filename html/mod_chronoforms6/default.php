<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_chronoforms6
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="container wrapper cr6">
	<div class="row justify-content-center">
		<div class="col-12 col-sm-12 col-md-12 col-lg<?php echo $bootstrap_size ?>">
			<?php if($module->showtitle) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_section', $module->title); ?>
			<?php endif; ?>
			<?php $output = new JoomlaGCLoader2('front', 'chronoforms6', 'chronoforms', $chronoforms6_setup, array('controller' => '', 'action' => '')); ?>
		</div>
	</div>
</div>

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

// Create shortcuts to some parameters.
$params  = $this->item->params;
?>
<section class="wrapper support">
	<div class="container">
		<div class="row">
			<?php if ($params->get('show_title')) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_page', $this->escape($this->item->title)); ?>
			<?php endif; ?>
			<div class="col-12 support-content d-flex justify-content-center align-items-center flex-column">
				<div class="articleBody mt-5">
					<?php echo $this->item->text; ?>
					<p class="mt-5 text-center">
						<a href="<?php echo JURI::base() ?>" class="btn btn-primary" title="<?php echo JText::_('TPL_AFFINITY_BACKTOHOME') ?>"><?php echo JText::_('TPL_AFFINITY_BACKTOHOME') ?></a>
					</p>
				</div>
			</div>
		</div><!-- end .row -->
	</div>
</section>

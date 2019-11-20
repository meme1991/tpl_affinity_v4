<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

?>
<div class="sep-line-top icons-share d-flex justify-content-between mt-3">
	<?php if ($displayData['params']->get('show_print_icon') OR $displayData['params']->get('show_email_icon')) : ?>
		<ul class="list-inline d-none d-md-block mb-0">
			<?php if ($displayData['params']->get('show_print_icon')) : ?>
			<li class="list-inline-item" data-toggle="tooltip" data-placement="bottom" title="<?php echo JText::_('TPL_AFFINITY_PRINT') ?>">
				<?php echo JHtml::_('icon.print_popup', $displayData['item'], $displayData['params']); ?>
			</li>
			<?php endif; ?>
			<?php if ($displayData['params']->get('show_email_icon')) : ?>
			<li class="list-inline-item" data-toggle="tooltip" data-placement="bottom" title="<?php echo JText::_('TPL_AFFINITY_SEND') ?>">
				<?php echo JHtml::_('icon.email', $displayData['item'], $displayData['params']); ?>
			</li>
			<?php endif; ?>
		</ul>
	<?php endif; ?>

	<ul class="list-inline mb-0 social-share">
		<?php echo JLayoutHelper::render('joomla.content.social', $displayData); ?>
	</ul>
</div>

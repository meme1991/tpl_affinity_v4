<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.pagenavigation
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$lang = JFactory::getLanguage(); ?>

<div class="pager pagenav clearfix">
	<ul class="list-inline">
	<?php if ($row->prev) :
		$direction = $lang->isRtl() ? 'right' : 'left'; ?>
		<li class="previous list-inline-item float-left">
			<a href="<?php echo $row->prev; ?>" rel="prev" class="btn btn-primary previous">
				<?php echo '<i class="fas fa-chevron-circle-left mr-2"></i>' . $row->prev_label; ?>
			</a>
		</li>
	<?php endif; ?>
	<?php if ($row->next) :
		$direction = $lang->isRtl() ? 'left' : 'right'; ?>
		<li class="next list-inline-item float-right">
			<a href="<?php echo $row->next; ?>" rel="next" class="btn btn-primary next">
				<?php echo $row->next_label . ' <i class="fas fa-chevron-circle-right ml-2"></i>'; ?>
			</a>
		</li>
	<?php endif; ?>
	</ul>
</div>

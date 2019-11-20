<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_finder
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.core');
// JHtml::_('formbehavior.chosen');
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('stylesheet', 'com_finder/finder.css', array('version' => 'auto', 'relative' => true));
?>

<section class="wrapper com_finder">
	<div class="container finder <?php echo $this->pageclass_sfx; ?>">
		<div class="row">
			<?php if ($this->params->get('show_page_heading')) : ?>
			<div class="col-12">
				<h1>
					<?php if ($this->escape($this->params->get('page_heading'))) : ?>
						<?php echo $this->escape($this->params->get('page_heading')); ?>
					<?php else : ?>
						<?php echo $this->escape($this->params->get('page_title')); ?>
					<?php endif; ?>
				</h1>
			</div>
			<?php endif; ?>

			<?php if ($this->params->get('show_search_form', 1)) : ?>
				<?php echo $this->loadTemplate('form'); ?>
			<?php endif; ?>
			</div>
			<div class="row">
			<?php // Load the search results layout if we are performing a search. ?>
			<?php if ($this->query->search === true) : ?>
				<div class="col-12" id="search-results">
					<?php echo $this->loadTemplate('results'); ?>
				</div>
			<?php endif; ?>
			</div>
		</div>
	</div>
</section>

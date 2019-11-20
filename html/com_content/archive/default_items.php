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
$params = $this->params;
?>
<?php foreach ($this->items as $i => $item) : ?>
	<li class="list-group-item">
	  <?php echo JLayoutHelper::render('joomla.content.card.list-small.list_header', $item); ?>
		<?php echo JLayoutHelper::render('joomla.content.card.list-small.list_intro', $item); ?>
	</li>
<?php endforeach; ?>

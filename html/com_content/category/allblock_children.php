<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$col   = 12/$this->columns;
$lang  = JFactory::getLanguage();
?>
<?php if ($this->maxLevel != 0 && count($this->children[$this->category->id]) > 0) : ?>
	<?php foreach ($this->children[$this->category->id] as $id => $child) : ?>
		<?php if ($this->params->get('show_empty_categories') || $child->numitems || count($child->getChildren())) : ?>
			<div class="grid-item col-12 col-sm-12 col-md-6 col-lg-<?php echo $col ?>">
				<?php echo JLayoutHelper::render('joomla.content.categories.card-block', array('item' => $child, 'params' => $this->params)); ?>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>

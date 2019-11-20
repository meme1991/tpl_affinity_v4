<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create a shortcut for params.
//$params  = &$this->item->params;
// $images  = json_decode($this->item->images);
// $link    = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));

// $canEdit = $this->item->params->get('access-edit');
// $info    = $this->item->params->get('info_block_position', 0);

// Check if associations are implemented. If they are, define the parameter.
//$assocParam = (JLanguageAssociations::isEnabled() && $params->get('show_associations'));
echo JLayoutHelper::render('joomla.content.card.card-default', $this->item);
?>

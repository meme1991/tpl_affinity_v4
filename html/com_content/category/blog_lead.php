<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$params  = $this->item->params;

// layout 1 -> block
// layout 0 -> card-default

if($params->get('layout')):
  echo $this->loadTemplate('block');
else:
  echo JLayoutHelper::render('joomla.content.card.card-default', $this->item);
endif;
?>

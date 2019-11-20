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

// layout 0 -> block
// layout 1 -> card-default

if($params->get('layout')):
  echo JLayoutHelper::render('joomla.content.card.card-default', $this->item);
else:
  echo $this->loadTemplate('block');
endif;
?>

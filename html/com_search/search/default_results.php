<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="row search-results mt-3 <?php echo $this->pageclass_sfx ?>">
  <div class="col-12">
    <ul class="list-group list-small">
    <?php foreach ($this->results as $result) : ?>
      <li class="list-group-item">
        <div class="d-flex justify-content-between">
          <?php if($result->created) : ?>
            <small class="icon-clock" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_PUBLISH_DATE') ?>">
              <?php echo $result->created ?>
            </small>
          <?php endif; ?>
          <?php if ($result->section) : ?>
            <small data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_RESULT_TYPE') ?>">
              <?php echo $this->escape($result->section); ?>
            </small>
          <?php endif; ?>
        </div>
        <!-- titolo -->
        <h4>
          <?php if ($result->href) : ?>
            <a href="<?php echo JRoute::_($result->href); ?>"<?php if ($result->browsernav == 1) : ?> target="_blank"<?php endif; ?>>
              <?php echo $result->title; ?>
            </a>
          <?php else : ?>
            <?php echo $result->title; ?>
          <?php endif; ?>
        </h4>
        <!-- titolo -->
        <p class="card-text"><?php echo $result->text; ?></p>
      </li>
    <?php endforeach; ?>
    </ul>
  </div>
  <div class="col-12 pagination d-flex justify-content-center mt-2">
  	<?php echo $this->pagination->getPagesLinks(); ?>
  </div>
</div>

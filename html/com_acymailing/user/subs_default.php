<?php
/**
 * @package	AcyMailing for Joomla!
 * @version	5.6.1
 * @author	acyba.com
 * @copyright	(C) 2009-2017 ACYBA S.A.R.L. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
?>
<div id="acyusersubscription">
  <?php $k = 0; ?>
  <?php foreach($this->subscription as $row) : ?>
    <?php if(empty($row->published) OR !$row->visible) continue; ?>
    <?php $listClass = 'acy_list_status_' . str_replace('-','m',(int) @$row->status); ?>
    <div class="row">
      <div class="col-12 col-sm-6 text-left text-sm-right">
        <span><?php echo $this->status->display("data[listsub][".$row->listid."][status]",@$row->status); ?></span>
      </div>
      <div class="col-12 col-sm-6 text-left text-sm-left">
        <?php echo $row->name ?>
      </div>
    </div>
    <?php $k = 1 - $k; ?>
  <?php endforeach; ?>
</div>

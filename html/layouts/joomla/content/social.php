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
<?php $link = JURI::base().JRoute::_(ContentHelperRoute::getArticleRoute($displayData['item']->slug, $displayData['item']->catid, $displayData['item']->language)); ?>

  <li class="list-inline-item facebook" data-toggle="tooltip" data-placement="bottom" title="<?php echo JText::_('TPL_AFFINITY_SHARE_FACEBOOK') ?>">
    <a href="https://www.facebook.com/sharer.php?u=<?php echo $link ?>" rel="nofollow" title="<?php echo JText::_('TPL_AFFINITY_SHARE_FACEBOOK') ?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;">
      <span class="fa-stack fa-sm">
  		  <i class="fal fa-circle fa-stack-2x"></i>
  		  <i class="fab fa-facebook-f fa-stack-1x"></i>
  		</span>
    </a>
  </li>

  <li class="list-inline-item twitter" data-toggle="tooltip" data-placement="bottom" title="<?php echo JText::_('TPL_AFFINITY_SHARE_TWITTER') ?>">
    <a href="http://twitter.com/share?url=<?php echo $link ?>" rel="nofollow" title="<?php echo JText::_('TPL_AFFINITY_SHARE_TWITTER') ?>" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;">
      <span class="fa-stack fa-sm">
  		  <i class="fal fa-circle fa-stack-2x"></i>
  		  <i class="fab fa-twitter fa-stack-1x"></i>
  		</span>
    </a>
  </li>

  <li class="list-inline-item whatsapp" data-toggle="tooltip" data-placement="bottom" title="<?php echo JText::_('TPL_AFFINITY_SHARE_WHATSAPP') ?>">
    <a href="https://api.whatsapp.com/send?text=<?php echo $link ?>" title="<?php echo JText::_('TPL_AFFINITY_SHARE_WHATSAPP') ?>" data-action="share/whatsapp/share">
      <span class="fa-stack fa-sm">
  		  <i class="fal fa-circle fa-stack-2x"></i>
  		  <i class="fab fa-whatsapp fa-stack-1x"></i>
  		</span>
    </a>
  </li>

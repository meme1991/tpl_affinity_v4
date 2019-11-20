<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$params = $displayData->params;
$images = json_decode($displayData->images);
$link   = JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language));
$alt    = (isset($images->image_intro_alt) AND $images->image_intro_alt != '') ? $images->image_intro_alt : $displayData->title;
?>
<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>
  <figure class="mb-0 default" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
    <img src="<?php echo htmlspecialchars($images->image_intro, ENT_COMPAT, 'UTF-8'); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($alt, ENT_COMPAT, 'UTF-8'); ?>" itemprop="url" />
    <figcaption class="d-flex justify-content-center align-items-center">
      <i class="far fa-external-link fa-3x" aria-hidden="true"></i>
    </figcaption>
    <a href="<?php echo $link ?>" title="<?php echo $displayData->title ?>"></a>
  </figure>
<?php else: ?>
  <?php $app            = JFactory::getApplication(); ?>
  <?php $templateparams	= $app->getTemplate(true)->params; ?>
  <?php $logo_s         = $templateparams->get('logo-s'); ?>
  <meta itemprop="image" content="<?php echo JURI::base().$logo_s ?>">
<?php endif; ?>

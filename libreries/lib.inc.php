<?php

// stampa la data in un dato formato
echo JHtml::_('date', $displayData['item']->created, JText::_('DATE_FORMAT_LC3'));
// stampa una qualsiasi stringa
echo JText::_('COM_CONTENT_NO_ARTICLES');
// link ad un articolo
echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language));
// link categoria
echo JRoute::_(ContentHelperRoute::getCategoryRoute($child->id));
// tronca un stringa dopo 200 caratteri, toglie i tag, e mette i ...
echo JHtml::_('string.truncate', strip_tags($article->introtext), 200);
// layout messaggio info
echo JLayoutHelper::render('joomla.content.message.message_info', JText::_('COM_CONTENT_NO_ARTICLES'));

<?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_('COM_TAGS_NO_ITEMS')); ?>



<div class="col-12 mt-3 py-2 bg-light">
  <?php if ($this->params->def('show_pagination_results', 1)) : ?>
    <div class="text-center"><?php echo $this->pagination->getPagesCounter(); ?></div>
  <?php endif; ?>
  <div class="d-flex justify-content-center mt-2"><?php echo $this->pagination->getPagesLinks(); ?></div>
</div>

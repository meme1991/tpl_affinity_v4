<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_languages
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="mod-languages <?php echo $moduleclass_sfx; ?>">
<?php if ($params->get('dropdown', 1)) : ?>
	<div class="btn-group" role="group" aria-label="Lingue del sito web">
		<?php foreach ($list as $language) : ?>
			<?php if ($language->active) : ?>
		  <button type="button" class="btn btn-secondary no-shadow btn-sm">
				<?php if ($params->get('dropdownimage', 1) AND $language->image) : ?>
					<?php echo JHtml::_('image', 'mod_languages/' . $language->image . '.gif', $language->title_native, array('title' => $language->title_native), true); ?>
				<?php endif; ?>
				<?php //echo $language->title_native; ?>
				<?php echo strtoupper($language->sef) ?>
			</button>
			<?php endif; ?>
		<?php endforeach; ?>

    <button id="languageDropdown" type="button" class="btn btn-secondary no-shadow btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    	<span class="sr-only">Toggle Dropdown</span>
    </button>
		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
		<?php foreach ($list as $language) : ?>
			<?php if (!$language->active) : ?>
				<a class="dropdown-item <?php echo $language->active ? 'lang-active' : ''; ?>" href="<?php echo $language->link; ?>">
					<?php if ($params->get('dropdownimage', 1) AND $language->image) : ?>
						<?php echo JHtml::_('image', 'mod_languages/' . $language->image . '.gif', $language->title_native, array('title' => $language->title_native), true); ?>
					<?php endif; ?>
					<?php //echo $language->title_native; ?>
					<?php echo strtoupper($language->sef) ?>
				</a>
			<?php endif; ?>
		<?php endforeach; ?>
		</div>
	</div>
<?php else : ?>
	<ul class="list-inline mb-0">
		<?php foreach ($list as $language) : ?>
			<li class="list-inline-item <?php echo $language->active ? 'lang-active' : ''; ?>">
				<a href="<?php echo $language->link; ?>">
				<?php if ($params->get('image', 1)) : ?>
					<?php if ($language->image) : ?>
						<?php echo JHtml::_('image', 'mod_languages/' . $language->image . '.gif', $language->title_native, array('title' => $language->title_native), true); ?>
					<?php else : ?>
						<span class="label"><?php echo strtoupper($language->sef); ?></span>
					<?php endif; ?>
				<?php else : ?>
					<?php echo $params->get('full_name', 1) ? $language->title_native : strtoupper($language->sef); ?>
				<?php endif; ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
</div>

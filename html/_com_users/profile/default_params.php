<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');

?>
<div class="wrapper com_users profile <?php echo $this->pageclass_sfx; ?>">
	<div class="container">
		<div class="row">
			<?php echo $this->loadTemplate('nav'); ?>
			<div class="col-12 col-sm-12 col-md col-lg params">
				<?php $fields = $this->form->getFieldset('params'); ?>
				<?php if (count($fields)) : ?>
					<fieldset id="users-profile-custom">
						<h3><?php echo JText::_('COM_USERS_SETTINGS_FIELDSET_LABEL'); ?></h3>
						<dl class="dl-horizontal">
						<?php foreach ($fields as $field) :
							if (!$field->hidden) : ?>
							<dt><?php echo $field->title; ?></dt>
							<dd>
								<?php if (JHtml::isRegistered('users.' . $field->id)) : ?>
									<?php echo JHtml::_('users.' . $field->id, $field->value); ?>
								<?php elseif (JHtml::isRegistered('users.' . $field->fieldname)) : ?>
									<?php echo JHtml::_('users.' . $field->fieldname, $field->value); ?>
								<?php elseif (JHtml::isRegistered('users.' . $field->type)) : ?>
									<?php echo JHtml::_('users.' . $field->type, $field->value); ?>
								<?php else : ?>
									<?php echo JHtml::_('users.value', $field->value); ?>
								<?php endif; ?>
							</dd>
							<?php endif; ?>
						<?php endforeach; ?>
						</dl>
					</fieldset>
				<?php else: ?>
					<?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_("Non puoi visualizzare questa area. E' possibile che non esistano impostazioni da visualizzare o che non sei abilitato a visualizzarle.")); ?>
				<?php endif; ?>

			</div>

		</div>
	</div>
</div>

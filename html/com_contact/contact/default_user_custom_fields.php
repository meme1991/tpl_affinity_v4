<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$params             = $this->params;
$presentation_style = $params->get('presentation_style');

$displayGroups      = $params->get('show_user_custom_fields');
$userFieldGroups    = array();
?>
<?php //var_dump($this->contact->jcfields) ?>
<?php //if (!$displayGroups || !$this->contactUser) : ?>
	<?php //return; ?>
<?php //endif; ?>

<?php foreach ($this->contact->jcfields as $field) : ?>
	<?php if (!in_array('-1', $displayGroups) && (!$field->group_id || !in_array($field->group_id, $displayGroups))) : ?>
		<?php continue; ?>
	<?php endif; ?>
	<?php if (!key_exists($field->group_title, $userFieldGroups)) : ?>
		<?php $userFieldGroups[$field->group_title] = array(); ?>
	<?php endif; ?>
	<?php $userFieldGroups[$field->group_title][] = $field; ?>
<?php endforeach; ?>

<?php foreach ($userFieldGroups as $groupTitle => $fields) : ?>
	<?php $id = JApplicationHelper::stringURLSafe($groupTitle); ?>

		<?php foreach ($fields as $field) : ?>
			<?php if (!$field->value) : ?>
				<?php continue; ?>
			<?php endif; ?>
			<div class="field">
				<h4 class="fw-600"><?php echo $field->label ?></h4>
				<?php echo $field->value ?>
			</div>
		<?php endforeach; ?>

<?php endforeach; ?>

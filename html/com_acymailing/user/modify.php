<?php
/**
 * @package	AcyMailing for Joomla!
 * @version	5.6.1
 * @author	acyba.com
 * @copyright	(C) 2009-2017 ACYBA S.A.R.L. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
// $doc = JFactory::getDocument();
// unset($doc->_styleSheets[JURI::root(true).'/media/com_acymailing/css/component_default.css?v=1504776601']);
?>
<section class="wrapper">
	<div class="container newsletterWrapper">
		<div class="row justify-content-center">
			<?php if($this->values->show_page_heading) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_section', $this->values->page_heading); ?>
			<?php endif; ?>
			<div id="acymodifyform" class="col-12 col-sm-10 col-md-8 col-lg-6">
				<?php if(!empty($this->introtext)){ echo '<span class="acymailing_introtext">'.$this->introtext.'</span>'; } ?>
				<form action="<?php echo JRoute::_( 'index.php' );?>" method="post" class="custom-form" name="adminForm" id="adminForm" <?php if(!empty($this->fieldsClass->formoption)) echo $this->fieldsClass->formoption; ?> >
					<fieldset class="adminform acy_user_info custom-form">
						<legend class="bg-light px-3"><span><?php echo JText::_( 'USER_INFORMATIONS' ); ?></span></legend>
						<div id="acyuserinfo">
						<?php if(acymailing_level(3)){
							if(!empty($this->subscriber->email)) $this->fieldsClass->currentUser = $this->subscriber;
							$tmpCatId = array();
							$tmpCatTag = array();
							foreach($this->extraFields as $fieldName => $oneExtraField) {
								if($oneExtraField->type == 'category'){
									if(empty($oneExtraField->fieldcat) && !empty($tmpCatId)){
										while(!empty($tmpCatId)){
											echo '</'.str_replace('fldset', 'fieldset', end($tmpCatTag)).'>';
											array_pop($tmpCatId);
											array_pop($tmpCatTag);
										}
									}
									$tmpCatId[] = $oneExtraField->fieldid;
									$tmpCatTag[] = $oneExtraField->options['fieldcattag'];
									echo '<'.str_replace('fldset', 'fieldset', end($tmpCatTag)).' class="fieldCategory '.$oneExtraField->options['fieldcatclass'].'" id="tr'.$oneExtraField->namekey.'">';
									if(in_array(end($tmpCatTag), array('fieldset', 'fldset'))) echo '<legend>'.$oneExtraField->fieldname.'</legend>';
								}else{
									if(in_array($oneExtraField->fieldcat, $tmpCatId) || empty($oneExtraField->fieldcat)){
										while(!empty($tmpCatId) && $oneExtraField->fieldcat != end($tmpCatId)){
											echo '</'.str_replace('fldset', 'fieldset', end($tmpCatTag)).'>';
											array_pop($tmpCatId);
											array_pop($tmpCatTag);
										}
									}
									echo '<div id="tr'.$fieldName.'" class="acy_onefield"><div class="acykey">'.$this->fieldsClass->getFieldName($oneExtraField).'</div>';
									echo '<div class="inputVal">';
									if(in_array($fieldName,array('name','email')) AND !empty($this->subscriber->userid)){echo $this->subscriber->$fieldName; }
									else{echo $this->fieldsClass->display($oneExtraField,@$this->subscriber->$fieldName,'data[subscriber]['.$fieldName.']'); }
									echo '</div></div>';
								}
							}
							$lastVal = end($tmpCatId);
							while(!empty($lastVal)){
								echo '</'.str_replace('fldset', 'fieldset', end($tmpCatTag)).'>';
								array_pop($tmpCatId);
								array_pop($tmpCatTag);
								$lastVal = end($tmpCatId);
							}
						}else{
							if(!empty($this->fieldsToDisplay) && (strpos($this->fieldsToDisplay, 'name') !== false || strpos($this->fieldsToDisplay, 'default') !== false || strpos($this->fieldsToDisplay, 'all') !== false)){ ?>
								<div id="trname" class="form-row mt-3">
								  <label for="field_name" class="col-12"><?php echo JText::_( 'JOOMEXT_NAME' ); ?></label>
								  <div class="col-12">
										<?php if(empty($this->subscriber->userid)) : ?>
									    <input class="form-control" placeholder="Inserisci il tuo nome" name="data[subscriber][name]" type="text" value="<?php echo $this->escape(@$this->subscriber->name) ?>" id="field_name">
										<?php else: ?>
											<?php echo $this->subscriber->name; ?>
										<?php endif; ?>
									</div>
								</div>
							<?php }
							if(!empty($this->fieldsToDisplay) && (strpos($this->fieldsToDisplay, 'email') !== false || strpos($this->fieldsToDisplay, 'default') !== false || strpos($this->fieldsToDisplay, 'all') !== false)){ ?>
								<div id="tremail" class="form-row mt-3">
								  <label for="field_email" class="col-12"><?php echo JText::_( 'JOOMEXT_EMAIL' ); ?></label>
								  <div class="col-12">
										<?php if(empty($this->subscriber->userid)) : ?>
								    <input class="form-control" placeholder="Inserisci la tua email" name="data[subscriber][email]" type="text" value="<?php echo $this->escape(@$this->subscriber->email) ?>" id="field_email">
										<?php else : ?>
											<?php echo $this->subscriber->email; ?>
										<?php endif; ?>
									</div>
								</div>
							<?php }
							if(!empty($this->fieldsToDisplay) && (strpos($this->fieldsToDisplay, 'html') !== false || strpos($this->fieldsToDisplay, 'default') !== false || strpos($this->fieldsToDisplay, 'all') !== false)){ ?>
								<div id="trhtml" class="acy_onefield mt-3">
									<div class="acykey">
										<label for="field_email"><?php echo JText::_( 'RECEIVE' ); ?></label>
									</div>
									<div class="inputVal">
										<?php echo JHTML::_('acyselect.booleanlist', "data[subscriber][html]" , '',$this->subscriber->html,JText::_('HTML'),JText::_('JOOMEXT_TEXT'),'user_html'); ?>
									</div>
								</div>
							<?php }
						}
				?>
						</div>
					</fieldset>
					<?php if($this->displayLists) : ?>
					<fieldset class="adminform acy_subscription_list custom-form mt-5">
						<legend class="bg-light px-3 mb-4"><span><?php echo JText::_( 'SUBSCRIPTION' ); ?></span></legend>
						<p><?php echo JText::_( 'TPL_AFFINITY_MESSAGE_DEFAULT' ); ?></p>
						<?php if(empty($this->dropdown)) include('subs_default.php'); else include('subs_dropdown.php'); ?>
					</fieldset>
					<?php endif; ?>
					<div class="form-row mt-2 showterms">
						<div class="col-12">
							<div class="terms bg-light">
								<div class="title"><?= JText::_("TPL_AFFINITY_TERMS") ?></div>
								<p class="desc"><?= JText::_("TPL_AFFINITY_INFORMATIVA_DEFAULT") ?></p>
								<input class="" type="checkbox" name="terms" id="terms" required="required" />
								<label for="terms">Acconsento alla vostra <a href="<?= JURI::base() ?>privacy-policy"><?= JText::_("TPL_AFFINITY_INFO_TEXT") ?></a></label>
							</div>
						</div>
					</div>
					<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT; ?>" />
					<input type="hidden" name="task" value="savechanges" />
					<input type="hidden" name="ctrl" value="user" />
					<input type="hidden" name="hiddenlists" value="<?php echo $this->hiddenlists; ?>"/>
					<?php
					$app = JFactory::getApplication();
					$config = acymailing_config();
					$menus = $app->getMenu();
					if(!empty($menus)) $current = $menus->getActive();
					if(!empty($current)) echo '<input type="hidden" name="acy_source" value="menu_'.$current->id.'" />';

					echo JHTML::_( 'form.token' ); ?>
					<input type="hidden" name="subid" value="<?php echo $this->subscriber->subid; ?>" />
					<?php if(JRequest::getCmd('tmpl') == 'component'){ ?><input type="hidden" name="tmpl" value="component" /><?php } ?>
					<input type="hidden" name="key" value="<?php echo $this->subscriber->key; ?>" />
					<p class="acymodifybutton mt-3">
						<input class="button btn btn-primary btn-block" type="submit" onclick="return checkChangeForm(<?php echo $config->get('special_chars', 0); ?>);" value="<?php echo empty($this->subscriber->subid) ? $this->escape(JText::_('SUBSCRIBE')) :  $this->escape(JText::_('SAVE_CHANGES'))?>"/>
					</p>
				</form>
				<?php if(!empty($this->finaltext)){ echo '<span class="acymailing_finaltext">'.$this->finaltext.'</span>'; } ?>
			</div>
		</div>
	</div>
</section>

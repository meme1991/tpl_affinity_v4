<?php
/**
 * @package	AcyMailing for Joomla!
 * @version	5.8.0
 * @author	acyba.com
 * @copyright	(C) 2009-2017 ACYBA S.A.R.L. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
// default layout

$doc = JFactory::getDocument();
unset($doc->_styleSheets[JURI::root().'/media/com_acymailing/css/module_default.css?v=1520845897']);
unset($doc->_styleSheets[JURI::root().'/media/com_acymailing/css/acypopup.css?v=1520845897']);
?>
<section class="wrapper newsletter_default <?php echo $params->get('moduleclass_sfx')?>" id="acymailing_module_<?php echo $formName; ?>">
	<div class="container">
		<div class="row">
			<?php if($module->showtitle) : ?>
				<?php echo JLayoutHelper::render('joomla.content.title.title_section', $module->title); ?>
			<?php endif; ?>
		</div>
		<div class="row mt-3">

			<div class="col-12 newsletter_subscription <?php echo $params->get('moduleclass_sfx')?>" id="acymailing_module_<?php echo $formName; ?>">
				<?php if(!empty($introText)) : ?>
					<div class="newsletter_introtext mb-2"><?= $introText ?></div>
				<?php endif; ?>
				<form id="<?php echo $formName; ?>" class="custom-form" novalidate action="<?php echo acymailing_route('index.php'); ?>" onsubmit="return submitacymailingform('optin','<?php echo $formName;?>')" method="post" name="<?php echo $formName ?>" <?php if(!empty($fieldsClass->formoption)) echo $fieldsClass->formoption; ?> >

					<div class="form-row">
						<?php foreach($fieldsToDisplay as $oneField) : ?>
							<?php if($oneField == 'name' AND empty($extraFields[$oneField])) : ?>
								<div class="col-12 col-sm-12 col-md-5">
									<input
										class="form-control"
										type="text"
										id="user_name_<?php echo $formName ?>"
										<?php if(!empty($identifiedUser->userid)) echo 'readonly="readonly"';
										if(!$displayOutside){ ?> onfocus="if(this.value == '<?php echo $nameCaption;?>') this.value = '';"
										onblur="if(this.value=='') this.value='<?php echo $nameCaption?>';"<?php } ?>
										name="user[name]"
										value="<?php if(!empty($identifiedUser->userid)) echo $identifiedUser->name; elseif(!$displayOutside) echo $nameCaption; ?>"
										title="<?php echo $nameCaption?>">
								</div>
							<?php endif; ?>
							<?php if($oneField == 'email' AND empty($extraFields[$oneField])) : ?>
								<div class="col-12 col-sm-12 col-md-5">
									<input id="user_email_<?php echo $formName; ?>"
										<?php if(!empty($identifiedUser->userid)) echo 'readonly="readonly" ';
										if(!$displayOutside){ ?> onfocus="if(this.value == '<?php echo $emailCaption;?>') this.value = '';"
										onblur="if(this.value=='') this.value='<?php echo $emailCaption?>';"<?php } ?>
										class="form-control"
										type="text"
										name="user[email]"
										required
										value="<?php if(!empty($identifiedUser->userid)) echo $identifiedUser->email; elseif(!$displayOutside) echo $emailCaption; ?>"
										title="<?php echo $emailCaption;?>"/>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
						<div class="col-12 col-sm-2">
							<button
								class="button subbutton btn btn-primary btn-block"
								type="submit"
								name="Submit"
								onclick="try{ return submitacymailingform('optin','<?php echo $formName;?>'); }catch(err){alert('The form could not be submitted '+err);return false;}"/>
								ISCRIVITI
								</button>
							<!-- <input
								class="button subbutton btn btn-primary btn-block"
								type="submit"
								value="<?php $subtext = $params->get('subscribetextreg'); if(empty($identifiedUser->userid) OR empty($subtext)){ $subtext = $params->get('subscribetext',acymailing_translation('SUBSCRIBECAPTION')); } echo $subtext;  ?>"
								name="Submit"
								onclick="try{ return submitacymailingform('optin','<?php echo $formName;?>'); }catch(err){alert('The form could not be submitted '+err);return false;}"/> -->
						</div>
					</div>

					<?php if(!empty($visibleListsArray) && $listPosition == 'before') : ?>
						<div class="form-row mt-2 showlist">
							<div class="col-12">
								<div class="newsletter-list">
									<div class="title"><?= JText::_("TPL_AFFINITY_SUBSCRIBE_TITLE") ?></div>
									<p class="desc"><?= JText::_("TPL_AFFINITY_MESSAGE_DEFAULT") ?></p>
									<?php foreach($visibleListsArray as $myListId) : ?>
										<label for="acylist_<?= $myListId ?>" class="checkbox">
											<input type="checkbox" class="acymailing_checkbox" name="subscription[]" id="acylist_<?= $myListId ?>" value="<?= $myListId ?>" />
											<?= $allLists[$myListId]->name ?>
										</label>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<?php if($params->get('showterms',false)) : ?>
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
					<?php endif; ?>

					<?php if(empty($identifiedUser->userid) AND $config->get('captcha_enabled') AND acymailing_level(1)) : ?>
					<div class="form-row mt-2">
						<div class="col-12">
							<?php $captchaClass = acymailing_get('class.acycaptcha'); ?>
							<?php $captchaClass->display($formName, true) ?>
						</div>
					</div>
					<?php endif; ?>

					<?php
					if(!empty($fieldsClass->excludeValue)){
						$js = "\n"."acymailingModule['excludeValues".$formName."'] = Array();";
						foreach($fieldsClass->excludeValue as $namekey => $value){
							$js .= "\n"."acymailingModule['excludeValues".$formName."']['".$namekey."'] = '".$value."';";
						}
						$js .= "\n";
						if($params->get('includejs','header') == 'header'){
							acymailing_addScript(true, $js);
						}else{
							echo "<script type=\"text/javascript\">
									<!--
									$js
									//-->
									</script>";
						}
					}
					?>

					<?php $ajax = ($params->get('redirectmode') == '3') ? 1 : 0; ?>
					<input type="hidden" name="ajax" value="<?php echo $ajax; ?>" />
					<input type="hidden" name="acy_source" value="<?php echo 'module_'.$module->id ?>" />
					<input type="hidden" name="ctrl" value="sub"/>
					<input type="hidden" name="task" value="notask"/>
					<input type="hidden" name="redirect" value="<?php echo urlencode($redirectUrl); ?>"/>
					<input type="hidden" name="redirectunsub" value="<?php echo urlencode($redirectUrlUnsub); ?>"/>
					<input type="hidden" name="option" value="<?php echo ACYMAILING_COMPONENT ?>"/>
					<?php if(!empty($identifiedUser->userid)){ ?><input type="hidden" name="visiblelists" value="<?php echo $visibleLists;?>"/><?php } ?>
					<input type="hidden" name="hiddenlists" value="<?php echo $hiddenLists;?>"/>
					<input type="hidden" name="acyformname" value="<?php echo $formName; ?>" />
					<?php if(acymailing_getVar('cmd', 'tmpl') == 'component'){ ?>
						<input type="hidden" name="tmpl" value="component" />
						<?php if($params->get('effect','normal') == 'mootools-box' AND !empty($redirectUrl)){ ?>
							<input type="hidden" name="closepop" value="1" />
						<?php } } ?>
					<?php $myItemId = $config->get('itemid',0); if(empty($myItemId)){ global $Itemid; $myItemId = $Itemid;} if(!empty($myItemId)){ ?><input type="hidden" name="Itemid" value="<?php echo $myItemId;?>"/><?php } ?>


				</form>
				<?php if(!empty($postText)) : ?>
					<div class="newsletter_finaltext mt-2"><?= $postText ?></div>
				<?php endif; ?>
			</div>




		</div>
	</div>
</section>

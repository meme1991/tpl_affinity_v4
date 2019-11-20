<?php
	defined('_JEXEC') or die('Restricted access');

	$l = new PhocaDownloadLayout();

	if (!empty($this->files)) :
		foreach ($this->files as $v) :

			if ($this->checkRights == 1) {
			 // USER RIGHT - Access of categories (if file is included in some not accessed category) - - - - -
			 // ACCESS is handled in SQL query, ACCESS USER ID is handled here (specific users)
			 $rightDisplay	= 0;

			 if (!isset($v->cataccessuserid)) {
				 $v->cataccessuserid = 0;
			 }
			 if (isset($v->catid) && isset($v->cataccessuserid) && isset($v->cataccess)) {
				 $rightDisplay = PhocaDownloadAccess::getUserRight('accessuserid', $v->cataccessuserid, $v->cataccess, $this->t['user']->getAuthorisedViewLevels(), $this->t['user']->get('id', 0), 0);
			 }
			 // - - - - - - - - - - - - - - - - - - - - - -
			} else {
			 $rightDisplay = 1;
			}

			if ($rightDisplay == 1) :
				// Test if we have information about category - if we are displaying items by e.g. search outcomes - tags
				// we don't have any ID of category so we need to load it for each file.
				$this->catitem[$v->id]			= new StdClass();
				$this->catitem[$v->id]->id 		= 0;
				$this->catitem[$v->id]->alias 	= '';

				if (isset($this->category[0]->id) && isset($this->category[0]->alias)) {
					$this->catitem[$v->id]->id 		= (int)$this->category[0]->id;
					$this->catitem[$v->id]->alias 	= $this->category[0]->alias;
				} else {
					$catDb = PhocaDownloadCategory::getCategoryByFile($v->id);
					if (isset($catDb->id) && isset($catDb->alias)) {
						$this->catitem[$v->id]->id 		= (int)$catDb->id;
						$this->catitem[$v->id]->alias 	= $catDb->alias;
					}
					$categorySetTemp = 1;
				}

				$cBtnDanger  = 'btn btn-danger';
				$cBtnWarning = 'btn btn-warning';
				$cBtnSuccess = 'btn btn-primary';
				$cBtnInfo		 = 'btn btn-secondary';

				// General
				$linkDownloadB = '';
				$linkDownloadE = '';
				if ((int)$v->confirm_license > 0 || $this->t['display_file_view'] == 1) {
					$linkDownloadB = '<a class="" href="'. JRoute::_(PhocaDownloadRoute::getFileRoute($v->id, $v->catid,$v->alias, $v->categoryalias, $v->sectionid). $this->t['limitstarturl']).'" >';	// we need pagination to go back
					$linkDownloadE ='</a>';
				} else {
					if ($v->link_external != '' && $v->directlink == 1) {
						$linkDownloadB = '<a class="" href="'.$v->link_external.'" target="'.$this->t['download_external_link'].'" >';
						$linkDownloadE ='</a>';
					} else {
						$linkDownloadB = '<a class="" href="'. JRoute::_(PhocaDownloadRoute::getFileRoute($v->id, $this->catitem[$v->id]->id,$v->alias, $this->catitem[$v->id]->alias, $v->sectionid, 'download').$this->t['limitstarturl']).'" >';
						$linkDownloadE ='</a>';
					}
				}

				// pdtextonly
				$pdTextOnly = '<div class="pd-textonly">'.$v->description.'</div>' . "\n";

				// pdfile
				if ($v->filename != '') : ?>
				  <li class="list-group-item flex-column align-items-start">
						<div class="d-flex justify-content-between">
				      <h5 class="mb-1">
								<span class="fa-stack fa-lg <?= extensionHelper::getClassIcon($v->filename) ?>">
								  <i class="fas fa-square fa-stack-2x"></i>
									<i class="<?php echo extensionHelper::getIcon($v->filename) ?> fa-stack-1x"></i>
								</span>
								<?php echo $v->title ?>
								<small class="font-italic size-xs">[<?php echo $l->getFilesize($v->filename) ?>]</small>
							</h5>
							<div class="button-box d-none d-sm-block">
								<?php echo str_replace('class=""', 'class="'.$cBtnSuccess.'"', $linkDownloadB) .$linkDownloadE; ?>
							</div>
						</div>
						<div class="button-box d-block d-sm-none my-2">
							<?php echo str_replace('class=""', 'class="btn-block '.$cBtnSuccess.'"', $linkDownloadB) .$linkDownloadE; ?>
						</div>
						<small class="icon-clock" data-toggle="tooltip" data-placement="top" title="<?php echo JText::_('TPL_AFFINITY_PUBLISH_DATE') ?>">
							<?php echo JHtml::_('date', $v->publish_up, JText::_('DATE_FORMAT_LC3')) ?>
						</small>
					</li>
				<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>
<?php else : ?>
	<?php echo JLayoutHelper::render('joomla.content.message.message_info', JText::_('Non ci sono file in questa categoria. Ma potrebbero esserci dei file organizzati nelle sottocategorie. Dai un occhiata qui a fianco.')); ?>
<?php endif; ?>

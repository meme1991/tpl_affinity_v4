<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

$msgList = $displayData['msgList'];
?>
<?php if (is_array($msgList) && !empty($msgList)) : ?>
<div id="system-message-container" class="wrapper pb-0">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-md-10 col-lg-8">

					<div id="system-message">
						<?php foreach ($msgList as $type => $msgs) : ?>
							<?php if($type == 'message') : ?>
								<?php $type = 'success'; ?>
							<?php endif; ?>
							<?php if($type == 'error') : ?>
								<?php $type = 'danger'; ?>
							<?php endif; ?>
							<?php if($type == 'notice') : ?>
								<?php $type = 'info'; ?>
							<?php endif; ?>

							<div class="alert alert-<?php echo $type; ?>" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>

								<?php
									switch ($type) {
										case 'info'   : $icon = 'fa-info-circle'; $title = 'Info'; break;
										case 'message': $icon = 'fa-info-circle'; $title = 'Messaggio'; break;
										case 'warning': $icon = 'fa-exclamation-circle'; $title = 'Attenzione'; break;
										case 'danger' : $icon = 'fa-exclamation-triangle'; $title = 'Errore'; break;
										case 'success': $icon = 'fa-check-circle'; $title = 'Messaggio'; break;
										default: $icon = 'fa-info-circle'; $title = 'Info'; break;
									}
								?>

								<i class="icon far <?= $icon ?>"></i>

								<?php if (!empty($msgs)) : ?>
									<h6><?php echo JText::_($title); ?></h6>
									<div>
										<?php foreach ($msgs as $msg) : ?>
											<p class="mb-3"><?php echo $msg; ?></p>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>

			</div>
		</div>
	</div>
</div>
<?php endif; ?>

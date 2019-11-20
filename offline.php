<?php defined( '_JEXEC' ) or die; ?>
<?php
	// variables
	$app            = JFactory::getApplication();
	$tpath          = $this->baseurl.'/templates/'.$this->template;
	// template params
	$siteName      = $app->get('sitename');
 ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
	<title><?php echo $siteName ?> - <?php echo JText::_("TPL_AFFINITY_OFFLINE_HEADER") ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo $tpath; ?>/css/offline.min.css?ver=2.0.0" rel="stylesheet" type="text/css" />
	<meta name="robots" content="noindex, nofollow">
</head>
<body>
	<div class="main">
		<div class="display-error">
			<span class="display-4 d-block"><?php echo JText::_("TPL_AFFINITY_OFFLINE_HEADER") ?></span>
			<?php if ($app->getCfg('display_offline_message', 1) == 1 && str_replace(' ', '', $app->getCfg('offline_message')) != ''): ?>
				<span class="message d-block"><?php echo $app->getCfg('offline_message') ?></span>
			<?php else: ?>
				<span class="message d-block"><?php echo JText::_("TPL_AFFINITY_OFFLINE_DEFAULT_MESSAGE") ?></span>
			<?php endif; ?>
		</div>
	</div>
</body>
</html>

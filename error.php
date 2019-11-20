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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo $tpath; ?>/css/error_light.min.css?ver=1.0.0" rel="stylesheet" type="text/css" />
	<title><?php echo $this->error->getMessage(); ?> - <?= $siteName ?></title>
	<meta name="robots" content="noindex, nofollow">
</head>
<body>
	<div class="main">
		<div class="display-error">
			<span class="display-1 d-block"><?php echo $this->error->getCode() ?>!</span>
			<span class="message d-block"><?php echo $this->error->getMessage(); ?></span>
			<span class="message d-block"><?php echo JText::_("TPL_AFFINITY_ERROR_1") ?></span>
			<span class="message d-block">
				<a href="<?php echo JURI::base() ?>" class="btn btn-outline-dark"><?php echo JText::_("TPL_AFFINITY_ERROR_BACKHOME") ?></a>
			</span>
		</div>
	</div>
</body>
</html>

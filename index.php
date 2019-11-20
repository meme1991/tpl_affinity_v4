<?php defined( '_JEXEC' ) or die; ?>
<?php include_once JPATH_THEMES.'/'.$this->template.'/logic.php'; ?>
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
	<?php if(isset($_COOKIE['cb-enabled']) AND $_COOKIE['cb-enabled'] == 'accepted') : ?>
		<?php if(isset($ga) AND $ga) : ?>
			<?= $tag_head ?>
		<?php endif; ?>
	<?php endif; ?>
	<!-- Google Site Verification -->
	<?php if(isset($tag_verify) AND $tag_verify) : ?>
		<?= $tag_verify ?>
	<?php endif; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<jdoc:include type="head" />
</head>
<body>

	<?php if(isset($_COOKIE['cb-enabled']) AND $_COOKIE['cb-enabled'] == 'accepted') : ?>
		<?php if(isset($ga) AND $ga) : ?>
			<?= $tag_body ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ($this->countModules('overlay')) : ?>
		<jdoc:include type="modules" name="overlay" />
	<?php endif; ?>

	<?php if ($this->countModules('nav-side')) : ?>
		<div class="offcanvas-menu">
			<jdoc:include type="modules" name="nav-side" />
		</div>
		<a href="#" class="menu-button" id="open-button" data-toggle="offcanvas">
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</a>
	<?php endif; ?>

	<div class="site-wrap">
	  <ul class="list-unstyled mb-0 skip-link">
	    <li class="text-center goto-burger"><a href="#open-button" accesskey="1" title="<?php echo JText::_('TPL_AFFINITY_SKIPLINK_GOTO_MENU') ?>" class="page-scroll"><?php echo JText::_('TPL_AFFINITY_SKIPLINK_GOTO_MENU') ?></a></li>
	    <li class="text-center goto-content"><a href="#main-content" accesskey="2" title="<?php echo JText::_('TPL_AFFINITY_SKIPLINK_GOTO_CONTENT') ?>" class="page-scroll"><?php echo JText::_('TPL_AFFINITY_SKIPLINK_GOTO_CONTENT') ?></a></li>
	  </ul>

	  <header>
			<?php if ($this->countModules('htop-left') OR $this->countModules('htop-right')) : ?>
	    <div class="header-top">
	      <div class="container">
	        <div class="row">
						<?php if ($this->countModules('htop-left')) : ?>
						<nav class="col-2 col-lg-7 htop-left d-flex justify-content-start top-nav navbar-expand-lg">
							<button class="navbar-toggler" type="button" data-toggle="offcanvas-collapse">
								<i class="fal fa-bars"></i>
						  </button>
							<div class="navbar-collapse offcanvas-collapse" id="top-nav">
	              <jdoc:include type="modules" name="htop-left" />
							</div>
						</nav>
						<?php endif; ?>
						<?php if ($this->countModules('htop-right')) : ?>
						<div class="col-10 col-lg-5 htop-right d-flex justify-content-end">
							<jdoc:include type="modules" name="htop-right" />
						</div>
						<?php endif; ?>
	        </div>
	      </div>
	    </div><!-- end .header-top -->
			<?php endif; ?>

	    <div class="header-banner">
	      <div class="container">
	        <div class="row">
						<!-- site name -->
						<div class="col-10 col-sm-10 col-md-6 col-lg-6 site-name">
							<a href="<?php echo JURI::base() ?>" class="d-flex align-items-center" title="<?php echo $siteName ?>">
	              <?php if(isset($logo_s) AND $logo_s != '') : ?>
	                <img src="<?php echo $logo_s ?>" class="rounded img-fluid float-left mr-4" alt="<?php echo $siteName ?>">
	              <?php else : ?>
									<img src="http://logo.pizza/img/tri-arc/tri-arc-connected.svg" width="80" height="80" class="rounded img-fluid float-left mr-4" alt="<?php echo $siteName ?>">
	              <?php endif; ?>
								<div>
									<h1 class="mb-0"><?php echo $siteName ?></h1>
									<?php if($subtitle) : ?>
										<p class="mb-0"><?php echo $subtitle ?></p>
									<?php endif; ?>
								</div>
	            </a>
						</div>
						<!-- search icon -->
						<?php if ($this->countModules('search')) : ?>
						<div class="col-2 search-bar-icon">
							<a data-toggle="collapse" href="#searchBarCollapse" aria-expanded="false" aria-controls="searchBarCollapse">
								<i class="far fa-search"></i>
							</a>
						</div>
						<?php endif; ?>
						<!-- social e search bar -->
						<?php if ($this->countModules('social') OR $this->countModules('search')) : ?>
						<div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex align-self-center align-items-end flex-column">
							<?php if ($this->countModules('social')) : ?>
								<div class="social-bar-wrapper">
									<jdoc:include type="modules" name="social" />
								</div>
	            <?php endif; ?>
							<?php if ($this->countModules('search')) : ?>
								<div class="search-wrapper collapse" id="searchBarCollapse">
									<jdoc:include type="modules" name="search" />
								</div>
	            <?php endif; ?>
						</div>
						<?php endif; ?>
					</div>
	      </div>
	    </div>

			<?php if ($this->countModules('navbar')) : ?>
	    <div class="header-nav">
	      <div class="container p-0">
					<nav class="navbar navbar-expand-md navbar-light bg-faded">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#meganav" aria-controls="meganav" aria-expanded="false" aria-label="Toggle navigation">
							<i class="fal fa-bars"></i>
							<span class="navbar-toggler-text"><?= JText::_('TPL_AFFINITY_NAVIGATION') ?></span>
					  </button>
	          <div class="collapse navbar-collapse" id="meganav">
	            <jdoc:include type="modules" name="navbar" />
	          </div>
	        </nav>
	      </div>
	    </div>
			<?php endif; ?>
	  </header>

	  <?php if ($this->countModules('hero')) : ?>
	    <jdoc:include type="modules" name="hero" />
	  <?php endif; ?>

	  <?php if($this->countModules('breadcrumbs')) : ?>
	    <jdoc:include type="modules" name="breadcrumbs" />
	  <?php endif; ?>

		<?php if($this->countModules('nav-component')) : ?>
			<div class="nav-component bg-light">
				<div class="container">
					<jdoc:include type="modules" name="nav-component" />
				</div>
			</div>
	  <?php endif; ?>

	  <!-- posizione di supporto - before component -->
	  <?php if($this->countModules('position-1')) : ?>
	    <jdoc:include type="modules" name="position-1" />
	  <?php endif; ?>
	  <!-- posizione di supporto - before component -->

		<jdoc:include type="message" />

	  <main id="main-content">
	    <jdoc:include type="component" />
	  </main>

	  <!-- posizione di supporto - after component -->
	  <?php if($this->countModules('position-2')) : ?>
	    <jdoc:include type="modules" name="position-2" />
	  <?php endif; ?>
	  <!-- posizione di supporto - after component -->

	  <?php if ($this->countModules('servizi')) : ?>
	    <div class="wrapper servizi bg-white">
	      <div class="container">
	        <div class="row servizi-featured">
	          <jdoc:include type="modules" name="servizi" style="servicefeatured" />
	        </div>
	      </div>
	    </div>
	  <?php endif; ?>

	  <?php if ( $this->countModules('entrypoint')) : ?>
	    <jdoc:include type="modules" name="entrypoint" />
	  <?php endif; ?>

	  <?php if($this->countModules('pos_photogallery')) : ?>
	    <jdoc:include type="modules" name="pos_photogallery" />
	  <?php endif; ?>

	  <?php if($this->countModules('banners')) : ?>
	    <jdoc:include type="modules" name="banners" />
	  <?php endif; ?>

	  <?php if ($this->countModules('utilita')) : ?>
	    <div class="wrapper utility bg-primary">
	      <div class="container">
	        <div class="row">
						<?php echo JLayoutHelper::render('joomla.content.title.title_section', JText::_('TPL_AFFINITY_PLACEHOLDER_UTILITY')); ?>
	          <jdoc:include type="modules" name="utilita" style="utility" />
	        </div>
	      </div>
	    </div>
	  <?php endif; ?>

		<?php if($this->countModules('ratingsite')) : ?>
	    <jdoc:include type="modules" name="ratingsite" />
	  <?php endif; ?>

	  <footer class="wrapper footer">
	    <div class="container pt-3 pb-5">
	      <div class="row footer-sitename">
	        <div class="col-12 d-flex align-items-center">
	          <?php if(isset($logo_s) AND $logo_s != '') : ?>
	            <img src="<?php echo $logo_s ?>" class="rounded img-fluid float-left mr-3" alt="<?php echo $siteName ?>">
	          <?php else : ?>
	            <img src="http://logo.pizza/img/tri-arc/tri-arc-connected.svg" width="80" height="80" class="rounded img-fluid float-left mr-3" alt="<?php echo $siteName ?>">
	          <?php endif; ?>
	          <p class="mb-0"><?php echo $siteName ?></p>
	        </div>
	      </div>

	      <?php if ($this->countModules('footer-bottom')) : ?>
	      <div class="row footer-bottom">
	        <jdoc:include type="modules" name="footer-bottom" style="footer" />
	      </div>
	      <?php endif; ?>
	    </div>
			<div class="footer-links">
				<div class="container">
					<div class="row">
						<?php if ($this->countModules('footer-links')) : ?>
							<div class="col-12 col-sm-12 col-md-12 col-lg-6">
								<jdoc:include type="modules" name="footer-links" />
							</div>
						<?php endif; ?>
						<div class="col-12 col-sm-12 col-md-12 col-lg">
							<?php echo JLayoutHelper::render('joomla.content.spedisrl'); ?>
						</div>
					</div>
				</div>
			</div>
	  </footer>
	</div>

	<?php if($aos) : ?>
		<script src="<?php echo TPATH ?>/dist/aos/aos.js"></script>
		<script> AOS.init(); </script>
	<?php endif; ?>
</body>
</html>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="Content-Language" content="en">
  <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="<?= get_template_directory_uri(); ?>/assets/js/jquery-1.11.1.min.js"></script>
  <script src="<?= get_template_directory_uri(); ?>/assets/js/jquery-migrate-1.2.1.min.js"></script>

  <?php wp_head(); ?>
  
</head>

<body>

  <header class="header--masthead">
  	<div class="outer-container">

<!--    <button type="button" class="js-menu-trigger sliding-menu-button">-->
<!--        <span></span>-->
<!--        <span></span>-->
<!--        <span></span>-->
<!--        <span></span>-->
<!--    </button>-->

    <nav class="js-menu sliding-menu-content">
      <?php wp_nav_menu( array('theme_location' => 'header_primary_nav') ); ?>
    </nav>

    <div class="js-menu-screen menu-screen"></div>

  		<div class="social--connect">
            <button type="button" class="js-menu-trigger sliding-menu-button">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
  			<ul class="social-icons">
  				<li><a href="<?= cmb_get_option('application_options', 'facebookurl'); ?>"><i class="sprite sprite--facebook"></i></a></li>
  				<li><a href="<?= cmb_get_option('application_options', 'youtubeurl'); ?>"><i class="sprite sprite--youtube"></i></a></li>
  				<li><a href="<?= cmb_get_option('application_options', 'twitterurl'); ?>"><i class="sprite sprite--twitter"></i></a></li>
  			</ul>
  			<a class="join various fancybox.ajax" href="<?= get_template_directory_uri(); ?>/includes/join.php">
  				<span class="join-yellow">Join the Variety Club</span>
  				<span class="join-white">Get exclusive offers and more</span>
  			</a>
  		</div>
  	</div>
  	<div class="outer-container">
  		<div class="logo">
  			<a href="<?= bloginfo('url'); ?>"><img alt="Variety Pet Foods" src="<?= get_template_directory_uri(); ?>/assets/images/logo.gif" width="122" height="71" /></a>
  		</div>
	  	<nav class="nav--primary">
	      <?php wp_nav_menu( array('theme_location' => 'header_primary_nav') ); ?>
	    </nav>
  	</div>
  </header>
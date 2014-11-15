<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

  <?php wp_head(); ?>
  
</head>

<body>

  <header class="header--masthead">
  	<div class="outer-container">
  		<div class="social--connect">
  			<ul class="social-icons">
  				<li><a href=""><i class="sprite sprite--facebook"></i></a></li>
  				<li><a href=""><i class="sprite sprite--youtube"></i></a></li>
  				<li><a href=""><i class="sprite sprite--twitter"></i></a></li>
  			</ul>
  			<a href="#" class="join">
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
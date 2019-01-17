<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kemosite-wordpress-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title><?php wp_title(); ?><?php // bloginfo( 'name' ); ?></title>

	<!-- favicon.ico in the root directory -->
	
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head(); ?>

	<!-- Turn off the layout until the page has loaded -->
	<style>
	.off-canvas-wrapper { display: none; }
	</style>

</head>

<body <?php body_class(); ?>>

<div class="off-canvas-wrapper">

<!--
[Define Tablet Top-Bar Menu]
[Define Desktop Top-Bar Mega-Menu]
-->

<!-- [Mobile Off-Canvas Menu] -->
<div class="off-canvas position-left" id="off_canvas_mobile_menu" data-off-canvas>

	<!-- Close button -->
    <button class="close-button" aria-label="Close menu" type="button" data-close>
		<span aria-hidden="true">&times;</span>
    </button>

    <!--
    <ul class="vertical menu">
      <li><a href="#">Foundation</a></li>
      <li><a href="#">Dot</a></li>
      <li><a href="#">ZURB</a></li>
      <li><a href="#">Com</a></li>
      <li><a href="#">Slash</a></li>
      <li><a href="#">Sites</a></li>
    </ul>
	-->

    <?php if ( has_nav_menu( 'off-canvas-menu' ) ) : ?>
    	<?php wp_nav_menu( array(
			'theme_location' => 'off-canvas-menu',
			'menu_id' => 'off-canvas-menu',
			'menu_class' => 'vertical menu off-canvas-menu clear-off-canvas-close-button',
			'container' => 'nav',
			'walker' => new off_canvas_menu_walker()
		) ); ?>
	<?php endif; ?>

</div>

<!-- [Mobile Off-Canvas Menu] -->
<div class="off-canvas position-right" id="off_canvas_mobile_search" data-off-canvas>

	<!-- Close button -->
    <button class="close-button" aria-label="Close menu" type="button" data-close>
		<span aria-hidden="true">&times;</span>
    </button>

    <div class="grid-x clear-off-canvas-close-button">
    	<div class="cell"><?php get_search_form(); ?></div>
    </div>

</div>

<div class="off-canvas-content" data-off-canvas-content>
	
<!-- Your page content lives here -->

<div class="grid-layout-container">

	<div class="main_mobile_menu hide-for-large">

		<button type="button" class="button large" data-toggle="off_canvas_mobile_menu"><i class="fi-list"></i></button>
		<div class="mobile logo position"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo wp_get_attachment_image_src(get_theme_mod('custom_logo'))[0]; ?>"></A></div>
		<button type="button" class="button large float-right" data-toggle="off_canvas_mobile_search"><i class="fi-magnifying-glass"></i></button>

	</div>

	<!-- Start Top Bar -->
	<div class="top-bar main_screen_menu show-for-large stacked-for-large" id="responsive-menu">
		<div class="top-bar-left">
			
			<nav class="menu-test-menu-container">

				<ul id="top-bar-menu" class="dropdown menu" data-dropdown-menu>

					<li class="menu-text display logo position"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo wp_get_attachment_image_src(get_theme_mod('custom_logo'))[0]; ?>"></a></li>
			
					<?php
					if ( has_nav_menu( 'top-bar-menu' ) ) :

						/*
						wp_nav_menu( array(
							'theme_location' => 'top-bar-menu',
							'menu_id' => 'top-bar-menu',
							'menu_class' => 'dropdown menu',
							'container' => 'nav',
							'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
							'walker' => new mega_menu_walker()
						) );
						*/

						wp_nav_menu( array(
							'theme_location' => 'top-bar-menu',
							'container' => '',
							'menu_class' => 'dropdown menu',
							'items_wrap' => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
							'walker' => new mega_menu_walker()
						) );

					endif;
					?>

				</ul>

			</nav><!-- #site-navigation -->
		</div>
		<div class="top-bar-right">
			<?php get_search_form(); ?>
		</div>
	</div>
	<!-- End Top Bar -->
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
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- favicon.ico in the root directory -->
	
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php get_bloginfo('pingback_url'); ?>" />

	<?php 
	/* Always have wp_head() just before the closing </head>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to add elements to <head> such
     * as styles, scripts, and meta tags.
     */
    wp_head();	
	?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
/**
 * Displays the class names for the body element.
 * (string|string[]) (Optional) Space-separated string or array of class names to add to the class list.
 * Default value: ''
 */
?>

<a class="screen-reader-text skip-link" href="#content">Skip to content</a>

<!-- Foundation wrapper around off-canvas and the content. -->
<div class="off-canvas-wrapper">

	<!--
	[Define Tablet Top-Bar Menu]
	[Define Desktop Top-Bar Mega-Menu]
	-->

	<!-- [Left Mobile Off-Canvas Menu] -->
	<div class="off-canvas position-left" id="off_canvas_mobile_menu" data-off-canvas>

		<!-- Close button -->
	    <button class="close-button" aria-label="Close menu" type="button" data-close>
			<span aria-hidden="true">&times;</span>
	    </button>

	    <div class="grid-x clear-off-canvas-close-button">
	    	<div class="cell"><?php get_search_form(); ?></div>
	    </div>

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
	<!-- [End Left Mobile Off-Canvas Menu] -->

	<!-- [Right Mobile Off-Canvas Menu] -->
	<?php
	/*
	<div class="off-canvas position-right" id="off_canvas_cart" data-off-canvas>

		<!-- Close button -->
	    <button class="close-button" aria-label="Close menu" type="button" data-close>
			<span aria-hidden="true">&times;</span>
	    </button>

	    <div class="grid-x clear-off-canvas-close-button">
	    	<div class="cell">
				<?php
				if (in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ):
					
					global $woocommerce;
					// echo "Cart Count: ".$woocommerce->cart->cart_contents_count;
					?>

					<?php if ($woocommerce->cart->get_cart_contents_count() > 0): ?>
						<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item in cart', '%d items in cart', $woocommerce->cart->get_cart_contents_count() ), $woocommerce->cart->get_cart_contents_count() ); ?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
					<?php endif; ?>

				<?php endif; ?>
	    	</div>
	    </div>

	</div>
	<!-- [End Right Mobile Off-Canvas Menu] -->

	*/
	?>

	<!-- [Main Off-Canvas Content] -->
	<div class="off-canvas-content" data-off-canvas-content>
			
		<!-- Your page content lives here -->

		<!-- Layout Container Model -->
		<div class="grid-layout-header" style="text-align: center;">

			<!-- Layout Grid: Menu -->
			<div class="grid_area_menu">

				<div class="main_mobile_menu hide-for-large">

					<button type="button" class="button large" data-toggle="off_canvas_mobile_menu"><i class="fi-list"></i></button>
					<div class="mobile logo position"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo wp_get_attachment_image_src(get_theme_mod('custom_logo'))[0]; ?>" alt=""></a></div>
					<?php if ( is_plugin_active('woocommerce/woocommerce.php') ): ?><a href="<?php echo wc_get_cart_url(); ?>" class="button large float-right"><i class="fi-shopping-cart"></i></a><?php endif; ?>

				</div>

				<!-- Start Top Bar -->
				<div class="top-bar main_screen_menu show-for-large" id="responsive-menu">
					
					<div class="top-bar-left">

						<nav class="menu-container">

							<ul id="top-bar-menu" class="dropdown menu" data-dropdown-menu>

								<li class="menu-text display logo position" aria-label="Image of website logo"><a tabindex="0" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="Return to home page"><img src="<?php echo wp_get_attachment_image_src(get_theme_mod('custom_logo'))[0]; ?>" alt=""></a></li>
						
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

								<li class="menu-item">
								<?php
								if (in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ):
									global $woocommerce;
									// echo "Cart Count: ".$woocommerce->cart->cart_contents_count;
									?>

									<?php if ($woocommerce->cart->get_cart_contents_count() > 0): ?>
										<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item in cart', '%d items in cart', $woocommerce->cart->get_cart_contents_count() ), $woocommerce->cart->get_cart_contents_count() ); ?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
									<?php endif; ?>

								<?php endif; ?>
								</li>

							</ul>

						</nav><!-- #site-navigation -->
					</div>

					<div class="top-bar-right">
						<?php get_search_form(); ?>
					</div>

				</div>
				<!-- End Top Bar -->

			</div>
			<!-- End Layout Grid: Menu -->

			<div class="grid_area_section">
				
				<div class="section header">

					<section class="grid-x grid-padding-x align-middle align-center">
						
						<!--
						  --  This "grand header" treatment should only be applied once, at the top of the page.
						  --  Can display post, page, category or taxonomy name.
						  -->

						<!--
						  -- [EXAMPLES]
						  --
							is_404 — Is the query a 404 (returns no results)?
							is_archive — Is the query for an existing archive page?
							is_attachment — Is the query for an existing attachment page?
							is_author — Is the query for an existing author archive page?
							is_category — Is the query for an existing category archive page?
							is_comment_feed — Is the query for a comments feed?
							is_comments_popup — Whether the current URL is within the comments popup window. — deprecated	
							is_date — Is the query for an existing date archive?
							is_day — Is the query for an existing day archive?
							is_embed — Is the query for an embedded post?
							is_feed — Is the query for a feed?
							is_front_page — Is the query for the front page of the site?
							is_home — Is the query for the blog homepage?
							is_main_query — Is the query the main query?
							is_month — Is the query for an existing month archive?
							is_page — Is the query for an existing single page?
							is_paged — Is the query for paged result and not for the first page?
							is_post_type_archive — Is the query for an existing post type archive page?
							is_preview — Is the query for a post or page preview?
							is_privacy_policy — Is the query for the Privacy Policy page?
							is_robots — Is the query for the robots file?
							is_search — Is the query for a search?
							is_single — Is the query for an existing single post?
							is_singular — Is the query for an existing single post of any post type (post, attachment, page, custom post types)?
							is_tag — Is the query for an existing tag archive page?
							is_tax — Is the query for an existing custom taxonomy archive page? 
						  -->

						<header>
							
							<?php
							if ( is_plugin_active('woocommerce/woocommerce.php') && is_cart() ):
								?><h1 class="page-title"></h1><?php
							elseif ( is_plugin_active('woocommerce/woocommerce.php') && ( is_shop() || is_product_category() ) ):
								?><h1 class="entry-title"><?php woocommerce_page_title(); ?></h1><?php
							elseif ( is_front_page() || is_home() ):
								?><h1 class="entry-title"><?php bloginfo('name'); ?></h1><?php
							elseif ( is_single() ):
								the_title( '<h1 class="entry-title">', '</h1>' );
							elseif ( is_search() ):
								?>
								<h1 class="page-title">
									<?php
									/* translators: %s: search query. */
									// printf( esc_html__( 'Search Results for: %s', 'kemosite-wordpress-theme' ), '<span>' . get_search_query() . '</span>' );
									?>
									Search Results
								</h1>
								<?php
							elseif ( is_404() ):
								?>
								<h1 class="page-title">
									4...OH...4
								</h1>
								<?php
							else:
								the_title( '<h1 class="entry-title">', '</h1>' );
							endif;
							?>

						</header>

					</section>

				</div>				

			</div>

		</div><!-- .grid-layout-header -->

		<!-- Skip to content -->
		<div id="content"></div>

			
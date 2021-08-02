<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<style>
.woocommerce span.onsale {
	top: 1em;
	right: -1em;
	left: unset;
}
</style>

<div class="grid-layout-content">

	<?php while ( have_posts() ) : the_post(); ?>

		<!-- <main role="main"> probably this one-->

		<div class="grid_area_exerpt the exerpt" style="position: relative;">

			<?php

			/**
			 * Hook: woocommerce_before_single_product.
			 *
			 * @hooked wc_print_notices - 10
			 */
			do_action( 'woocommerce_before_single_product' );

			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );

			?>

			<div class="small_ad">
				<?php if( function_exists('the_ad_placement') ) { the_ad_placement('small-ad'); } ?>
			</div>

		</div>

		<div class="grid_area_content the content">

			<main role="main">

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

			</main>

		</div>

		<div class="grid_area_sidebar">
			<div class="sidebar_ad"><?php if( function_exists('the_ad_placement') ) { the_ad_placement('sidebar-ad'); } ?></div>
		</div>

		<?php do_action( 'woocommerce_after_single_product' ); ?>

		<!-- </main> -->

	<?php endwhile; // end of the loop. ?>

	<?php
	
	/**
	 * woocommerce_sidebar hook.
	 *
	 * @hooked woocommerce_get_sidebar - 10
	 */
	// do_action( 'woocommerce_sidebar' );
	
	?>

</div>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

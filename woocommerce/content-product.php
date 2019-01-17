<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class(); ?>>

	<?php
    $thumbnail_id   = get_woocommerce_term_meta( $product->id, 'thumbnail_id', true );
    $image = wp_get_attachment_url( $thumbnail_id );
	?>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	<div class="card" style="width: 100%;">
	 	<!-- <div class="card-divider">This is a header</div> -->
	  	<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
	  	<div class="card-section">
	    	<h4><?php echo $product->name; ?></h4>
	    	<p><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></p>
	  	</div>
	</div>
	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

	<!--
	<pre>
	<?php print_r($product); ?>
	</pre>
	-->

</li>

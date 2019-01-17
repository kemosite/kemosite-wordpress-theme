<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<li <?php wc_product_cat_class( '', $category ); ?>>

	<?php
    $thumbnail_id   = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
    $image = wp_get_attachment_url( $thumbnail_id );
	?>

	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>
	<div class="card" style="width: 100%;">
	 	<!-- <div class="card-divider">This is a header</div> -->
	  	<?php do_action( 'woocommerce_before_subcategory_title', $category ); ?>
	  	<div class="card-section">
	    	<h4><?php echo $category->name; ?></h4>
	    	<p><?php echo $category->description; ?></p>
	  	</div>
	</div>
	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
	
	<!--
	<pre>
	<?php print_r($category); ?>
	</pre>
	-->

</li>

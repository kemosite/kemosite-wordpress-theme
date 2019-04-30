<?php

/* [Overwrite WooCommerce Functions, As Necessary] */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
// add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10 );

/*
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
	echo '<section id="main">';
}

function my_theme_wrapper_end() {
	echo '</section>';
}
*/

if ( ! function_exists( 'kemosite_wordpress_woocommerce_template_loop_add_to_cart' ) ) {

    /**
     * Get the add to cart template for the loop.
     *
     * @param array $args Arguments.
     */
    function kemosite_wordpress_woocommerce_template_loop_add_to_cart( $args = array() ) {

        global $product;

        if ( $product ) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode( ' ', array_filter( array(
                    'button',
                    'product_type_' . $product->get_type(),
                    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                    $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
                ) ) ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );

            $args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

            if ( isset( $args['attributes']['aria-label'] ) ) {
                $args['attributes']['aria-label'] = strip_tags( $args['attributes']['aria-label'] );
            }

            wc_get_template( 'loop/add-to-cart.php', $args );
            
        }
    }
}
add_action( 'woocommerce_before_shop_loop_item_title', 'kemosite_wordpress_woocommerce_template_loop_add_to_cart', 10 );

/* [CUSTOM WOOCOMMERCE ADJUSTMENTS] */
remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10);
add_action( 'woocommerce_before_subcategory_title', 'my_subcategory_thumbnail', 10 );

function my_subcategory_thumbnail( $category ) {
    $small_thumbnail_size   = apply_filters( 'subcategory_archive_thumbnail_size', 'shop_catalog' );
    $dimensions             = wc_get_image_size( $small_thumbnail_size );
    $thumbnail_id           = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );

    if ( $thumbnail_id ) {
        $image = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size  );
        $image = $image[0];
    } else {
        $image = wc_placeholder_img_src();
    }

    if ( $image ) {
        // Prevent esc_url from breaking spaces in urls for image embeds
        // Ref: https://core.trac.wordpress.org/ticket/23605
        $image = str_replace( ' ', '%20', $image );

        // echo '<div class="cropped image" style="max-width:' . esc_attr( $dimensions['width'] ) . 'px; width: 100%; height:' . esc_attr( $dimensions['width'] ) . 'px; background-image: url(\'' . esc_url( $image ) . '\');"><img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '"></div>';

        echo '<div class="cropped image" style="width: ' . esc_attr( $dimensions['width'] ) . 'px; height:' . esc_attr( $dimensions['width'] ) . 'px; background-image: url(\'' . esc_url( $image ) . '\');"><img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '"></div>';

    }
}

if (  ! function_exists( 'woocommerce_template_loop_category_title' ) ) {

    /**
     * Show the subcategory title in the product loop.
     */
    function woocommerce_template_loop_category_title( $category ) {
        ?>
        <h3>
            <?php
                echo $category->name;

                if ( $category->count > 0 )
                    // echo apply_filters( 'woocommerce_subcategory_count_html', ' <span class="count">(' . $category->count . ')</span>', $category );
                    echo apply_filters( 'woocommerce_subcategory_count_html', '', $category );
            ?>
        </h3>
        <?php
    }
}


if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {

    /**
     * Get the product thumbnail, or the placeholder if not set.
     *
     * @subpackage  Loop
     * @param string $size (default: 'shop_catalog')
     * @param int $deprecated1 Deprecated since WooCommerce 2.0 (default: 0)
     * @param int $deprecated2 Deprecated since WooCommerce 2.0 (default: 0)
     * @return string
     */
    function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0 ) {
        
        global $post;

        if ( has_post_thumbnail($post->ID) ) {

            $props                  = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
            $image_size             = apply_filters( 'single_product_archive_thumbnail_size', $size );
            $small_thumbnail_size   = apply_filters( 'subcategory_archive_thumbnail_size', $image_size );
            $dimensions             = wc_get_image_size( $small_thumbnail_size );
            $thumbnail_id           = get_post_thumbnail_id();
        }

        if ( isset($thumbnail_id) ) {
            $image = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size  );
            $image = $image[0];
        } else {
            $image = wc_placeholder_img_src();
        }

        if ( $image ) {
            // Prevent esc_url from breaking spaces in urls for image embeds
            // Ref: https://core.trac.wordpress.org/ticket/23605
            $image = str_replace( ' ', '%20', $image );

            // return '<div class="cropped image" style="max-width:' . esc_attr( $dimensions['width'] ) . 'px; width: 100%; height:' . esc_attr( $dimensions['width'] ) . 'px; background-image: url(\'' . esc_url( $image ) . '\');"><img src="' . esc_url( $image ) . '" alt="' . esc_attr( $props['alt'] ) . '"></div>';

            return '<div class="cropped image" style="width: ' . esc_attr( $dimensions['width'] ) . 'px; height:' . esc_attr( $dimensions['width'] ) . 'px; background-image: url(\'' . esc_url( $image ) . '\');"><img src="' . esc_url( $image ) . '" alt="' . esc_attr( $props['alt'] ) . '"></div>';

        }
    }
}

if ( ! function_exists( 'woocommerce_template_loop_add_to_cart' ) ) {

    /**
     * Get the add to cart template for the loop.
     *
     * @subpackage  Loop
     */
    function woocommerce_template_loop_add_to_cart( $args = array() ) {

        global $product;

        if ( $product ) {

            if (!$product->button_text || $product->button_text == ""):
                $product->set_button_text( "Buy Product" );
            endif;

            /*
            echo "<pre><small>";
            print_r($product->button_text);
            echo "</small></pre>";
            */

            $defaults = array(
                'quantity' => 1,
                'class'    => implode( ' ', array_filter( array(
                        'button',
                        'product_type_' . $product->get_type(),
                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                        $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
                ) ) ),
            );

            $args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

            wc_get_template( 'loop/add-to-cart.php', $args );
        }
    }
}

/**
 * Get HTML for a gallery image.
 *
 * Woocommerce_gallery_thumbnail_size, woocommerce_gallery_image_size and woocommerce_gallery_full_size accept name based image sizes, or an array of width/height values.
 *
 * @since 3.3.2
 * @param int  $attachment_id Attachment ID.
 * @param bool $main_image Is this the main image or a thumbnail?.
 * @return string
 */
if ( ! function_exists( 'kemosite_wc_get_gallery_image_html' ) ) {
    function kemosite_wc_get_gallery_image_html( $attachment_id, $main_image = false ) {        
        $flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
        $gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
        $thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
        $image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
        $full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
        $thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
        $full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
        $alt_text          = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
        $srcset            = wp_get_attachment_image_srcset( $attachment_id );
        $image             = wp_get_attachment_image(
            $attachment_id,
            $image_size,
            false,
            apply_filters(
                'woocommerce_gallery_image_html_attachment_image_params',
                array(
                    'title'                   => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
                    'data-caption'            => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
                    'data-src'                => esc_url( $full_src[0] ),
                    'data-large_image'        => esc_url( $full_src[0] ),
                    'data-large_image_width'  => esc_attr( $full_src[1] ),
                    'data-large_image_height' => esc_attr( $full_src[2] ),
                    'class'                   => esc_attr( $main_image ? 'wp-post-image' : '' ),
                    'srcset'                  => esc_attr( $srcset )
                ),
                $attachment_id,
                $image_size,
                $main_image
            )
        );
        return '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" data-thumb-alt="' . esc_attr( $alt_text ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_src[0] ) . '">' . $image . '</a></div>';
    }
}

/* [END WOOCOMMERCE ADJUSTMENTS] */

/* [Declare WooCommerce Support] */
/*
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
*/

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 256,
		'single_image_width'    => 512,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 6,
        ),
	) );
    /*
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    */
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

?>
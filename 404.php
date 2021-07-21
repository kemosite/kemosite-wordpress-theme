<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

?>

<div class="grid-layout-content">

  <div class="grid_area_exerpt the exerpt">

    <div class="small_ad"><?php if( function_exists('the_ad_placement') ) { the_ad_placement('small-ad'); } ?></div>
    
  </div>

    <div class="grid_area_content the content">

        <main role="main">

            <?php 

            /*
             * Include the Post-Type-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
             */
            get_template_part( 'template-parts/content', 'fourohfour' );

            // If comments are open or we have at least one comment, load up the comment template.
            /*
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            */

            ?>

            <?php the_posts_navigation(); ?>

        </main>

    </div>

    <div class="grid_area_sidebar">
        <div class="sidebar_ad"><?php if( function_exists('the_ad_placement') ) { the_ad_placement('sidebar-ad'); } ?></div>
    </div>

</div>

<?php get_footer(); ?>

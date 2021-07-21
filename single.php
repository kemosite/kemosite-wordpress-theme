<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

    <?php

    // kemosite_wordpress_theme_post_thumbnail();

    // $post is likely to be set on a single post page.
    if (isset($post)):

      $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
      $image_srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id($post->ID), 'single-post-thumbnail', wp_get_attachment_metadata($post->ID) );
      $image_sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id($post->ID), 'single-post-thumbnail', wp_get_attachment_metadata($post->ID) );
      ?>
      <?php if ($image && $image_srcset && $image_sizes): ?>
        <div class="featured image"><img style="width: 100%;" src="<?php echo $image[0]; ?>" srcset="<?php echo esc_attr( $image_srcset ); ?>" sizes="<?php echo esc_attr( $image_sizes ); ?>"></div>
      <?php endif; ?>

      <?php
      /*
      if ( is_front_page() && is_home() ) :
        echo '<h2 class="entry-title"><a href="' . esc_url( $post->guid ) . '" rel="bookmark">' . $post->post_title . '</a></h2>';
      else:
        echo '<h1 class="entry-title"><a href="' . esc_url( $post->guid ) . '" rel="bookmark">' . $post->post_title . '</a></h1>';
      endif;
      */
      ?>

    <?php endif; ?>

    <?php
    the_excerpt();
    //get_the_excerpt($post->ID);
    
    the_post_navigation(
      array(
              'prev_text'          => 'Previous article: %title',
              'next_text'          => 'Next article: %title',
              'in_same_term'       => false,
              'excluded_terms'     => '',
              'taxonomy'           => 'category',
              'screen_reader_text' => __( 'Article navigation' ),
          )
    );
    ?>

    <div class="small_ad"><?php if( function_exists('the_ad_placement') ) { the_ad_placement('small-ad'); } ?></div>

    
  </div>

  <div class="grid_area_content the content">

    <main role="main">

    	<!-- Display all categories, then display posts by popularity or date published -->

    	<?php while ( have_posts() ) : the_post();

    		get_template_part( 'template-parts/content', get_post_type() );

        // echo "<pre>" . get_post_type() . "</pre>";

    		// If comments are open or we have at least one comment, load up the comment template.
    		/*
    		if ( comments_open() || get_comments_number() ) :
    			comments_template();
    		endif;
    		*/

    	endwhile; ?>

    	<?php the_posts_navigation(); ?>

    </main>
    
  </div>

  <div class="grid_area_sidebar">
    <div class="sidebar_ad"><?php if( function_exists('the_ad_placement') ) { the_ad_placement('sidebar-ad'); } ?></div>
  </div>

</div>

<?php


// get_sidebar();

get_footer();

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 * @since 5.9
 * @version 5.9.4.1
 *
 * REST API Documentation
 * https://developer.wordpress.org/rest-api/
 * 
 * REST API can be extended if necessary
 */

get_header();

/*
Load header template.
For the parameter, if the file is called "header-special.php" then specify "special".

<?php
if ( is_home() ) :
  get_header( 'home' );
elseif ( is_404() ) :
  get_header( '404' );
else :
  get_header();
endif;
*/

?>

<div class="grid-layout-content">

  <div class="grid_area_exerpt the exerpt">

    <?php if ( is_home() ) : ?>
    
    <?php wp_list_categories( array(
      'title_li' => '<h3>' . __( 'Categories', 'textdomain' ) . '</h3>'
    ) ); ?>

    <?php endif; ?>

    <div class="small_ad"><?php if( function_exists('the_ad_placement') ) { the_ad_placement('small-ad'); } ?></div>

    
  </div>

  <div class="grid_area_content the content">

    <main role="main">

      <?php if (have_posts()) : ?>

      	<!-- Display all categories, then display posts by popularity or date published -->

        <!-- index.php -->
      	<?php while ( have_posts() ) : the_post();

          the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

      		get_template_part( 'template-parts/content', get_post_type() );

          // echo "<pre>" . get_post_type() . "</pre>";

      		// If comments are open or we have at least one comment, load up the comment template.
      		/*
      		if ( comments_open() || get_comments_number() ) :
      			comments_template();
      		endif;
      		*/

      	endwhile;

      else: ?>

        <section><h2>
          <?php
          esc_html_e( 'Nothing Found', 'kemosite-wordpress-theme' );
          ?>
        </h2></section>

        <?php get_template_part( 'template-parts/content', 'none' );

      endif; ?>

      	<?php the_posts_navigation(); ?>

    </main>
    
  </div>

  <div class="grid_area_sidebar">
    <div class="sidebar_ad"><?php if( function_exists('the_ad_placement') ) { the_ad_placement('sidebar-ad'); } ?></div>
  </div>

</div>

<?php get_footer(); ?>

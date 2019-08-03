<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 */

?>

<main role="main">

	<section>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	    	<?php
			the_content( sprintf( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kemosite-wordpress-theme' ), get_the_title() );
			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kemosite-wordpress-theme' ),
				'after'  => '</div>',
			) );
			
			the_post_navigation(
				array(
		            'prev_text'          => 'Previous page: %title',
		            'next_text'          => 'Next page: %title',
		            'in_same_term'       => false,
		            'excluded_terms'     => '',
		            'taxonomy'           => 'category',
		            'screen_reader_text' => __( 'Page navigation' ),
		        )
			);
			?>

		</article><!-- #post-<?php the_ID(); ?> -->

	</section>

</main>
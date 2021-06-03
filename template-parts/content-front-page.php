<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 */

/*
<div class="grid_area_exerpt">grid_area_exerpt</div>
<div class="grid_area_content">grid_area_content</div>
<div class="grid_area_sidebar">grid_area_sidebar</div>

<div class="grid_area_big_ad">grid_area_big_ad</div>

<!--
<div class="grid_area_tag_cloud">grid_area_tag_cloud</div>
<div class="grid_area_footer">grid_area_footer</div>
-->

<!-- </div> -->
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--
The HTML <article> element represents a self-contained composition in a document, page, application, or site, which is intended to be independently distributable or reusable (e.g., in syndication). Examples include: a forum post, a magazine or newspaper article, or a blog entry.
-->

	<section>
	<!--
	The HTML <section> element represents a standalone section — which doesn't have a more specific semantic element to represent it — contained within an HTML document. Typically, but not always, sections have a heading.
	-->

    	<?php

		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

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

		<hr>

	</section>

</article><!-- #post-<?php the_ID(); ?> -->
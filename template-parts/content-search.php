<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
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

		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

    	<?php
		// the_excerpt();
		kemosite_custom_excerpt($post->ID);
		
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kemosite-wordpress-theme' ),
			'after'  => '</div>',
		) );
		?>

	</section>

</article><!-- #post-<?php the_ID(); ?> -->
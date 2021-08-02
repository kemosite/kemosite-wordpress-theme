<!-- content-front-page.php -->
<?php
/**
 * Template part for displaying page content in page.php
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

    	<?php

    	/*
    	if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		*/

		if ( is_front_page() && is_home() ):
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				kemosite_wordpress_theme_posted_on();
				kemosite_wordpress_theme_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif;

		the_content( sprintf( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kemosite-wordpress-theme' ), get_the_title() );
		wp_link_pages();
		?>

	</section>

</article><!-- #post-<?php the_ID(); ?> -->

<hr>

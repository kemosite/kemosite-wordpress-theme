<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 */

?>

<!-- content.php -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h2>Content.php</h2>

	<p>You're probably seeing this because there wasn't an assigned content-type.php page associated with this post type.</p>

	<p><?php echo get_post_type(); ?></p>

	<?php
	the_content( sprintf(
		wp_kses(
			/* translators: %s: Name of current post. Only visible to screen readers */
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kemosite-wordpress-theme' ),
			array(
				'span' => array(
					'class' => array(),
				),
			)
		),
		get_the_title()
	) );

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kemosite-wordpress-theme' ),
		'after'  => '</div>',
	) );
	?>

</article><!-- #post-<?php the_ID(); ?> -->
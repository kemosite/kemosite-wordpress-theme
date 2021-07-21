<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package kemosite-wordpress-theme
 */

get_header();

?>

<div class="grid-layout-content">

	<div class="grid_area_exerpt the exerpt">

		<!-- Get a thumbnail later -->

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<p>POSTED: <?php the_time('jS F Y') ?></p>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php

    	// kemosite_wordpress_theme_post_thumbnail();

		if (isset($latest_post)):

			$image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
			$image_srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id($post->ID), 'single-post-thumbnail', wp_get_attachment_metadata($post->ID) );
			$image_sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id($post->ID), 'single-post-thumbnail', wp_get_attachment_metadata($post->ID) );
			?>
			<?php if ($image && $image_srcset && $image_sizes): ?>
				<div class="featured image"><img style="width: 100%;" src="<?php echo $image[0]; ?>" srcset="<?php echo esc_attr( $image_srcset ); ?>" sizes="<?php echo esc_attr( $image_sizes ); ?>"></div>
			<?php endif; ?>

		<?php endif; ?>

		<div class="small_ad">
			<?php if( function_exists('the_ad_placement') ) { the_ad_placement('small-ad'); } ?>
		</div>

	</div>

	<div class="grid_area_content the content">

		<main role="main">

			<!-- Display all categories, then display posts by popularity or date published -->

			<?php  if ( have_posts() ):

				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

					// If comments are open or we have at least one comment, load up the comment template.
					/*
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					*/

				endwhile;

			else:

				get_template_part( 'template-parts/content', 'none' );

			endif;

			?>

		</main>

	</div>

	<div class="grid_area_sidebar">
		<div class="sidebar_ad"><?php if( function_exists('the_ad_placement') ) { the_ad_placement('sidebar-ad'); } ?></div>
	</div>

</div>

<?php /*
if ( get_edit_post_link() ) : ?>
	<footer class="entry-footer">
		<?php
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers *
					__( 'Edit <span class="screen-reader-text">%s</span>', 'kemosite-wordpress-theme' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
		?>
	</footer><!-- .entry-footer -->
<?php endif; */ ?>

<?php get_footer(); ?>

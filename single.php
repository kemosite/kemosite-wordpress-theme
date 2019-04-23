<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kemosite-wordpress-theme
 */

get_header();
?>

<div class="section">

	<section class="grid-x grid-padding-x align-middle align-center">
		<header>
			
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			
			<?php
			/*
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} elseif ( is_front_page() && is_home() ) {
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			*/
			?>

		</header>
	</section>

</div>

<div class="content">

<!-- Display all categories, then display posts by popularity or date published -->

<?php while ( have_posts() ) : the_post(); ?>

	<main role="main">

		<section>

			<!--
			<header>
				<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} elseif ( is_front_page() && is_home() ) {
					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
				?>
			</header>
			-->

			<article>

				<?php

				if (isset($post)):

					$image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
					$image_srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id($post->ID), 'single-post-thumbnail', wp_get_attachment_metadata($post->ID) );
					$image_sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id($post->ID), 'single-post-thumbnail', wp_get_attachment_metadata($post->ID) );
					?>
					<?php if ($image && $image_srcset && $image_sizes): ?>
						<div class="featured image"><img style="width: 100%;" src="<?php echo $image[0]; ?>" srcset="<?php echo esc_attr( $image_srcset ); ?>" sizes="<?php echo esc_attr( $image_sizes ); ?>"></div>
					<?php endif; ?>

					<!--
					<header>

						<?php
						if ( is_front_page() && is_home() ) {
							echo '<h2 class="entry-title"><a href="' . esc_url($post->guid) . '" rel="bookmark">'.$post->post_title.'</a></h2>';
						} else {
							echo '<h1 class="entry-title"><a href="' . esc_url($post->guid) . '" rel="bookmark">'.$post->post_title.'</a></h1>';
						}
						?>

					</header>
					-->

				<?php endif; ?>

				<div class="the content">
					<?php
					the_content( sprintf( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kemosite-wordpress-theme' ), get_the_title() );
					wp_link_pages();
					?>
				</div>

			</article>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			/*
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			*/
			
			/*
			echo "<pre>";
			if (function_exists('stats_get_csv')) { print_r(stats_get_csv('postviews')); }
			echo "</pre>";
			*/

			?>

		</section>

	</main>

	<!-- <hr> -->

<?php endwhile; ?>

<?php get_footer(); ?>
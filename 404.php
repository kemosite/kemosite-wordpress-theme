<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kemosite-wordpress-theme
 */

get_header();
?>

<div class="section">

	<section class="grid-x grid-padding-x align-middle align-center">
		<header>
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'kemosite-wordpress-theme' ); ?></h1>
		</header>
	</section>

</div>

<div class="content">

<!-- Display all categories, then display posts by popularity or date published -->

<?php while ( have_posts() ) : the_post(); ?>

	<main role="main">

		<section>

			<article>

				<?php
				$image = wp_get_attachment_image_src( get_post_thumbnail_id($latest_post->object_id), 'single-post-thumbnail');
				$image_srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id($latest_post->object_id), 'single-post-thumbnail', wp_get_attachment_metadata($latest_post->object_id) );
				$image_sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id($latest_post->object_id), 'single-post-thumbnail', wp_get_attachment_metadata($latest_post->object_id) );
				?>
				<?php if ($image && $image_srcset && $image_sizes): ?>
					<div><img style="width: 100%;" src="<?php echo $image[0]; ?>" srcset="<?php echo esc_attr( $image_srcset ); ?>" sizes="<?php echo esc_attr( $image_sizes ); ?>"></div>
				<?php endif; ?>

				<header>

					<?php
					if ( is_front_page() && is_home() ) {
						echo '<h2 class="entry-title"><a href="' . esc_url($latest_post->guid) . '" rel="bookmark">'.$latest_post->post_title.'</a></h2>';
					} else {
						echo '<h1 class="entry-title"><a href="' . esc_url($latest_post->guid) . '" rel="bookmark">'.$latest_post->post_title.'</a></h1>';
					}
					?>

				</header>

				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'kemosite-wordpress-theme' ); ?></p>

				<?php
				get_search_form();

				the_widget( 'WP_Widget_Recent_Posts' );
				?>

				<div class="widget widget_categories">
					<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'kemosite-wordpress-theme' ); ?></h2>
					<ul>
						<?php
						wp_list_categories( array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						) );
						?>
					</ul>
				</div><!-- .widget -->

				<?php
				/* translators: %1$s: smiley */
				$kemosite_wordpress_theme_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'kemosite-wordpress-theme' ), convert_smilies( ':)' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$kemosite_wordpress_theme_archive_content" );

				the_widget( 'WP_Widget_Tag_Cloud' );
				?>

			</article>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			
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
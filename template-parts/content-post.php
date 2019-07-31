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

			<div class="grid-x grid-margin-x">
			    
			    <div class="cell large-3 the exerpt">
			    	<?php

			    	// kemosite_wordpress_theme_post_thumbnail();

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

					<?php
					the_excerpt();

					wp_tag_cloud();

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

					<div class="small_ad"></div>

			    	
			    </div>

			    <div class="cell large-6 the content">
			    	<?php
					the_content( sprintf( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kemosite-wordpress-theme' ), get_the_title() );
					wp_link_pages();
					?>
			    </div>

			    <div class="cell large-3">
					<div class="sidebar_ad"></div>
				</div>

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

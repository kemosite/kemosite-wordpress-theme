<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 */

?>

<div class="grid_area_exerpt the exerpt">

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
	//get_the_excerpt($post->ID);
	
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

	<div class="small_ad"><?php if( function_exists('the_ad_placement') ) { the_ad_placement('small-ad'); } ?></div>

	
</div>

<div class="grid_area_content the content">

	<main role="main">

    	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<!--
		The HTML <article> element represents a self-contained composition in a document, page, application, or site, which is intended to be independently distributable or reusable (e.g., in syndication). Examples include: a forum post, a magazine or newspaper article, or a blog entry.
		-->
    	
    		<section>
			<!--
			The HTML <section> element represents a standalone section — which doesn't have a more specific semantic element to represent it — contained within an HTML document. Typically, but not always, sections have a heading.
			-->

		    	<?php
				the_content( sprintf( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kemosite-wordpress-theme' ), get_the_title() );
				wp_link_pages();
				?>

			</section>

		</article><!-- #post-<?php the_ID(); ?> -->

	</main>
	
</div>

<div class="grid_area_sidebar">
	<div class="sidebar_ad"><?php if( function_exists('the_ad_placement') ) { the_ad_placement('sidebar-ad'); } ?></div>
</div>

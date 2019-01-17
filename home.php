<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kemosite-wordpress-theme
 */

get_header();
?>

<div class="section">

	<section class="grid-x grid-padding-x align-middle align-center">
		<header>
			<h1><?php bloginfo( 'name' ); ?></h1>
		</header>
	</section>

</div>

<div class="content">

<!-- Display all categories, then display posts by popularity or date published -->

<?php 

if ( have_posts() ) :

	while ( have_posts() ) : the_post(); ?>

		<main role="main">

			<section>

				<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1><?php single_post_title(); ?></h1>
				</header>
				<?php endif; ?>

				<article>
						
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

					<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
						<div>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
							</a>
						</div>
					<?php endif; ?>

					<?php
					// Show the selected front page content.
					the_content();
					?>

				</article>

				<!-- <hr> -->

				<?php				

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				
				echo "<pre>";
				if (function_exists('stats_get_csv')) { print_r(stats_get_csv('postviews')); }
				echo "</pre>";

				?>

			</section>

		</main>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
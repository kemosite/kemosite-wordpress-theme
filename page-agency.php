
<?php
/**
 * Template Name: Agency Page Template
 *
 * @package kemosite-wordpress-theme
 */
?>

<?php get_header(); ?>

<div class="callout large">
  <div class="row column text-center">
    <h1>Changing the World Through Design</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris.</p>
    <a href="#" class="button large">Learn More</a>
    <a href="#" class="button large hollow">Learn Less</a>
  </div>
</div>

<div class="row">
  <div class="medium-6 columns medium-push-6">
    <img class="thumbnail" src="http://placehold.it/750x350">
  </div>
  <div class="medium-6 columns medium-pull-6">
    <h2>Our Agency, our selves.</h2>
    <p>Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna diam porttitor mauris, quis sollicitudin sapien justo in libero. Vestibulum mollis mauris enim. Morbi euismod magna ac lorem rutrum elementum. Donec viverra auctor.</p>
  </div>
</div>

<div class="row">
  <div class="medium-4 columns">
    <h3>Photoshop</h3>
    <p>Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna.</p>
  </div>
  <div class="medium-4 columns">
    <h3>Javascript</h3>
    <p>Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna.</p>
  </div>
  <div class="medium-4 columns">
    <h3>Marketing</h3>
    <p>Vivamus luctus urna sed urna ultricies ac tempor dui sagittis. In condimentum facilisis porta. Sed nec diam eu diam mattis viverra. Nulla fringilla, orci ac euismod semper, magna.</p>
  </div>
</div>

<hr>

<div class="row column">
  <ul class="vertical medium-horizontal menu expanded text-center">
    <li><a href="#"><div class="stat">28</div><span>Websites</span></a></li>
    <li><a href="#"><div class="stat">43</div><span>Apps</span></a></li>
    <li><a href="#"><div class="stat">95</div><span>Ads</span></a></li>
    <li><a href="#"><div class="stat">59</div><span>Cakes</span></a></li>
    <li><a href="#"><div class="stat">18</div><span>Logos</span></a></li>
  </ul>
</div>

<hr>

<div class="row column">
  <h3>Our Recent Work</h3>
</div>

<div class="row medium-up-3 large-up-4">
  <div class="column">
    <img class="thumbnail" src="http://placehold.it/550x550">
  </div>
  <div class="column">
    <img class="thumbnail" src="http://placehold.it/550x550">
  </div>
  <div class="column">
    <img class="thumbnail" src="http://placehold.it/550x550">
  </div>
  <div class="column">
    <img class="thumbnail" src="http://placehold.it/550x550">
  </div>
  <div class="column">
    <img class="thumbnail" src="http://placehold.it/550x550">
  </div>
  <div class="column">
    <img class="thumbnail" src="http://placehold.it/550x550">
  </div>
  <div class="column">
    <img class="thumbnail" src="http://placehold.it/550x550">
  </div>
  <div class="column">
    <img class="thumbnail" src="http://placehold.it/550x550">
  </div>
  <div class="column">
    <img class="thumbnail" src="http://placehold.it/550x550">
  </div>
  <div class="column">
    <img class="thumbnail" src="http://placehold.it/550x550">
  </div>
  <div class="column">
    <img class="thumbnail" src="http://placehold.it/550x550">
  </div>
  <div class="column">
    <img class="thumbnail" src="http://placehold.it/550x550">
  </div>
</div>

<div class="grid-x grid-margin-x grid-padding-x">
	
	<div class="medium-8 cell">

		<main role="main">

			<?php while ( have_posts() ) : the_post(); ?>

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

					<div>
						<?php
						the_content();

						wp_link_pages();
						?>
					</div>

				</article>

				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main>

	</div>

	<div class="medium-4 cell">

		<?php get_sidebar(); ?>
		
	</div>

</div>

<?php get_footer(); ?>
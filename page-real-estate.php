<?php
/**
 * Template Name: Real Estate Page Template
 *
 * @package kemosite-wordpress-theme
 */
?>

<?php get_header(); ?>

<div class="row">

  <div class="medium-7 large-6 columns">
    <h1>Close Your Eyes and Open Your Mind</h1>
    <p class="subheader">There is beauty in space, and it is orderly. There is no weather, and there is regularity. It is predictable. Everything in space obeys the laws of physics. If you know these laws, and obey them, space will treat you kindly.</p>
    <button class="button">Take a Tour</button>
    <button class="button">Start a free trial</button>
  </div>

  <div class="show-for-large large-3 columns">
    <img src="http://placehold.it/400x370&text=PSR1257 + 12 C" alt="picture of space">
  </div>

  <div class="medium-5 large-3 columns">
    <div class="callout secondary">
      <form>
        <div class="row">
          <div class="small-12 columns">
            <label>Find Your Dream Planet
              <input type="text" placeholder="Search destinations">
            </label>
          </div>
          <div class="small-12 columns">
            <label>Number of Moons
              <input type="number" placeholder="Moons required">
            </label>
            <button type="submit" class="button">Search Now!</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</div>

<div class="row column">
  <hr>
</div>

<div class="row column">
  <p class="lead">Trending Planetary Destinations</p>
</div>

<div class="row small-up-1 medium-up-2 large-up-3">
  <div class="column">
    <div class="callout">
      <p>Pegasi B</p>
      <p><img src="http://placehold.it/400x370&text=Pegasi B" alt="image of a planet called Pegasi B"></p>
      <p class="lead">Copernican Revolution caused an uproar</p>
      <p class="subheader">Find Earth-like planets life outside the Solar System</p>
    </div>
  </div>
  <div class="column">
    <div class="callout">
      <p>Pegasi B</p>
      <p><img src="http://placehold.it/400x370&text=Pegasi B" alt="image of a planet called Pegasi B"></p>
      <p class="lead">Copernican Revolution caused an uproar</p>
      <p class="subheader">Find Earth-like planets life outside the Solar System</p>
    </div>
  </div>
  <div class="column">
    <div class="callout">
      <p>Pegasi B</p>
      <p><img src="http://placehold.it/400x370&text=Pegasi B" alt="image of a planet called Pegasi B"></p>
      <p class="lead">Copernican Revolution caused an uproar</p>
      <p class="subheader">Find Earth-like planets life outside the Solar System</p>
    </div>
  </div>
  <div class="column">
    <div class="callout">
      <p>Pegasi B</p>
      <p><img src="http://placehold.it/400x370&text=Pegasi B" alt="image of a planet called Pegasi B"></p>
      <p class="lead">Copernican Revolution caused an uproar</p>
      <p class="subheader">Find Earth-like planets life outside the Solar System</p>
    </div>
  </div>
  <div class="column">
    <div class="callout">
      <p>Pegasi B</p>
      <p><img src="http://placehold.it/400x370&text=Pegasi B" alt="image of a planet called Pegasi B"></p>
      <p class="lead">Copernican Revolution caused an uproar</p>
      <p class="subheader">Find Earth-like planets life outside the Solar System</p>
    </div>
  </div>
  <div class="column">
    <div class="callout">
      <p>Pegasi B</p>
      <p><img src="http://placehold.it/400x370&text=Pegasi B" alt="image of a planet called Pegasi B"></p>
      <p class="lead">Copernican Revolution caused an uproar</p>
      <p class="subheader">Find Earth-like planets life outside the Solar System</p>
    </div>
  </div>

</div>

<div class="row column">
  <a class="button hollow expanded">Load More</a>
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
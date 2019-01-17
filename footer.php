<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kemosite-wordpress-theme
 */

?>

<?php /*
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'kemosite-wordpress-theme' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. 
				printf( esc_html__( 'Proudly powered by %s', 'kemosite-wordpress-theme' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author.
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'kemosite-wordpress-theme' ), 'kemosite-wordpress-theme', '<a href="https://github.com/kemosite/">Kevin Montgomery</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
*/ ?>

<hr>

<footer>

	<?php if (has_nav_menu( 'footer-menu' ) || is_active_sidebar( 'copyright_widget' )): ?>

	<div class="grid-x expanded footer">

		<?php if ( is_active_sidebar( 'copyright_widget' ) ) : ?>
		<div class="cell">
			<?php dynamic_sidebar( 'copyright_widget' ); ?>
    	</div>
    	<?php endif; ?>

    	<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
		<div class="cell">
	    	<?php wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'menu_id' => 'footer-menu',
				'menu_class' => 'footer-menu',
				'container' => '',
				'walker' => new footer_menu_walker()
			) ); ?>
		</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'social_widget' ) ) : ?>
		<div class="cell">
			<?php dynamic_sidebar( 'social_widget' ); ?>
    	</div>
    	<?php endif; ?>

	</div>

	<?php endif; ?>

</footer>

</div> <!-- .content placement -->

</div><!-- .grid-layout-container -->

</div><!-- .off-canvas-content -->

</div><!-- .off-canvas-wrapper -->

<?php wp_footer(); ?>

<noscript>
<style>
.off-canvas-wrapper { display: block; }
</style>
</noscript>

</body>
</html>

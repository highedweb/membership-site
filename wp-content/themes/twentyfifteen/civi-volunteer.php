<?php
/*
 Template Name: Civi-Volunteer
 */
add_action( 'get_header', 'force_civi_scripts_to_load' );
function force_civi_scripts_to_load() {
  if ( is_page_template( 'civi-volunteer.php' ) ) {
    add_action( 'wp_enqueue_scripts', array( civi_wp(), 'front_end_page_load' ), 100 );
  }
}
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		// End the loop.
		endwhile;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>

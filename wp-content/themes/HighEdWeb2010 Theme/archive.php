<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header();
?>                <section id="content" class="<?php echo is_active_sidebar( 'secondary-widget-area' ) ? "grid_6" : "grid_8 suffix_1" ?>">
                	<div class="grid_inner"><?php
					/* Queue the first post, that way we know
					 * what date we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop
					 * properly with a call to rewind_posts().
					 */
					if ( have_posts() )
						the_post(); ?>
	                    <h1 class="page-title"><?php
						if ( is_day() )
							printf('Daily Archives: <span>%s</span>', get_the_date() );
						else if ( is_month() )
							printf('Monthly Archives: <span>%s</span>', get_the_date('F Y') );
						else if ( is_year() )
							printf('Yearly Archives: <span>%s</span>', get_the_date('Y') );
						else
							echo ('Blog Archives'); ?>
						</h1><?php

					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();

					/* Run the loop for the archives page to output the posts.
					 * If you want to overload this in a child theme then include a file
					 * called loop-archives.php and that will be used instead.
					 */
					 get_template_part( 'loop', 'archive' ); ?>
                 	</div>
                </section><?php
get_sidebar();
get_footer(); ?>
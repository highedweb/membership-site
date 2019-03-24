<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

get_header(); ?>

			<section id="content" role="main" class="<?php echo is_active_sidebar( 'secondary-widget-area' ) ? "grid_6" : "grid_8 suffix_1" ?>">
				<div class="grid_inner">
				<?php
				/* Run the loop to output the page.
				 * If you want to overload this in a child theme then include a file
				 * called loop-page.php and that will be used instead.
				 */
				get_template_part( 'loop', 'page' );
				echo get_the_tag_list('<p>Tags: ',', ','</p>');
				?>

				</div><!-- #content -->
			</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

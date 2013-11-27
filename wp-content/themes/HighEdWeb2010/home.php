<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
get_header();
?>

				<section id="content" class="grid_6">
				<div class="grid_inner">
					<article class="Shaded Photos">
						<h2>Photos</h2>
						<object type="application/x-shockwave-flash" data="http://www.flickr.com/apps/slideshow/show.swf?v=71649"  width="440" height="300">
						  <param name="wmode" value="transparent">
						  <param name="movie" value="http://www.flickr.com/apps/slideshow/show.swf?v=71649" />
						  <param name="allowFullScreen" value="true" />
						  <param name="flashvars" value="offsite=true&amp;lang=en-us&amp;page_show_url=%2Fphotos%2F30617584@N02%2Fshow%2F&amp;page_show_back_url=%2Fphotos%2F30617584@N02%2F&amp;user_id=30617584@N02" />
						</object>
						<a href="http://www.flickr.com/highedweb" class="Button">Visit HighEdWeb on Flickr</a>
					</article>

					<div class="grid_2 alpha">
						<?php
							//$page_id = 30;
							//$page_data = get_page( $page_id );
							//$content = apply_filters('the_content', $page_data->post_content);
							//$title = $page_data->post_title;
							//echo $content;
							?>

						<?php
						$page_id = 17;
						$page_data = get_page( $page_id );
						$content = apply_filters('the_content', $page_data->post_content);
						$title = $page_data->post_title;
						echo $content;?>


					</div>
					<!--
					<div class="grid_4 omega">
						<article class="Twitter">
							<h2><img src="<?php echo bloginfo( 'template_directory') ?>/images/twitter-bird.png" alt="" />#heweb</h2>
													<div class="tweet"></div>
							<a class="Button" href="http://twitter.com/#!/search/?q=highedweb+OR+heweb+-heweb.net+-heweb.exblog.jp+-@highedweb_ru">See all tweets</a>
						</article>
					</div>
					-->
				</div>
                </section>
                <section class="grid_6 Shaded News">
	                <div class="grid_inner">
						<h2>News <a href="/feed/" class="RSS"><img src="<?php echo bloginfo( 'template_directory') ?>/images/RSSFeed.png" height="16" width="16" alt="RSS Feed"></a></h2>

						<?php
							/* Run the loop to output the posts.
							 * If you want to overload this in a child theme then include a file
							 * called loop-index.php and that will be used instead.
							 */
							 get_template_part( 'loop', 'home' );
							?>
					</div>
				</section>

                <!-- #content -->
<?php get_footer(); ?>
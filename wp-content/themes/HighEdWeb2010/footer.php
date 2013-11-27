<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main section (and it's associated grid_inner) and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 */

/* A sidebar in the footer? Yep. You can can customize
 * your footer with four columns of widgets.
 */
get_sidebar( 'footer' );
?>            </div><?php /* div class=container_12 */ ?>
		</div><?php /* div id=PageInnerWrapper */ ?>
        <footer class="PageFooter" id="PageFooter">
            <div class="container_12">
                <div class="grid_2"><a href="http://www.highedweb.org/"><img src="<?php echo bloginfo( 'template_directory') ?>/images/SmallHighEdWebLogo.png" alt="HighEdWeb Association" width="76" height="59" /></a></div>
                <div class="grid_10">
                    <ul>
                        <li><a href="http://www.highedweb.org/sitecredits/">Site Credits</a></li>
                        <li><a href="mailto:webmaster@highedweb.org">Contact Webmaster</a></li>
                        <li><a href="http://www.highedweb.org/adapolicy/">ADA Policy</a></li>
                    </ul>
                    &copy; 2013 HighEdWeb Professionals Association
                </div>
            </div>
		</footer>
	</div><?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
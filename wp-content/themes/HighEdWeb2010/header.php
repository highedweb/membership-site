<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( ' - ', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf('Page %s', max( $paged, $page ) );

	?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
    <script type="text/javascript" src="<?php echo bloginfo( 'template_directory') ?>/scripts/common_highedweb.js"></script>
	<?php if (is_home()): ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo bloginfo( 'template_directory') ?>/styles/anythingslider.css" />
	<script type="text/javascript">
        window.ReloadTweets = function() {
            $(".tweet").html("");
            $(".tweet").tweet({
                query: "highedweb+OR+heweb+-heweb.net+-heweb.exblog.jp+-@highedweb_ru",  //highedweb+OR++OR+from%3Ahighedweb //highedweb+OR+heweb10+OR+heweb
                join_text: "auto",
                avatar_size: 40,
                count: 7,
                auto_join_text_default: " ",
                auto_join_text_ed: "",
                auto_join_text_ing: "",
                auto_join_text_reply: "replied to ",
                auto_join_text_url: "",
                loading_text: "loading tweets...",
                template_directory: "<?php echo bloginfo( 'template_directory') ?>"
            });
        }
        highedweb.addLoadEvent(function() {
          highedweb.requireScript("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js", true, true, function() {
            highedweb.requireScript("<?php echo bloginfo( 'template_directory') ?>/scripts/jquery.tweet.js", true, true, function() {
            	ReloadTweets();
            	highedweb.requireScript("<?php echo bloginfo( 'template_directory') ?>/scripts/jquery.anythingslider.min.js", true, true, function() {
            		$('#HomepageSlider').anythingSlider({
								   //Appearance
								   width               : 940,      // Override the default CSS width
								   height              : 335,      // Override the default CSS height

								   // Navigation
								   toggleArrows        : true,     // if true, slide in controls (navigation + play/stop button) on hover and slide change, hide @ other times

								   // Slideshow options
								   enablePlay          : true,      // if false, the play/stop button will still be visible, but not clickable.
								   autoPlay            : true,      // This turns off the entire slideshow FUNCTIONALY, not just if it starts running or not
								   delay               : 12000,      // How long between slideshow transitions in AutoPlay mode (in milliseconds)
								   resumeDelay         : 10000,     // Resume slideshow after user interaction, only if autoplayLocked is true (in milliseconds).
								   animationTime       : 600,       // How long the slideshow transition takes (in milliseconds)
								   easing              : "swing"   // Anything other than "linear" or "swing" requires the easing plugin

					 });
                });
            });
          });


        });
        function Twitter(tweet) {
            var twitterwin = window.open("http://2011.highedweb.org/twitter.aspx?tweet=" + encodeURIComponent(tweet), "twitter", "height=450,width=800,location=0,menubar=0,toolbar=0,left=200,top=200");
            twitterwin.focus();
        }
    </script>
	<?php endif ?>

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" /><?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>
<body <?php body_class(); ?>>
	<div id="PageOuterWrapper">
    	<div id="MastheadWrapper">
            <div id="Masthead">
                <header>
                <?php echo (is_home() ? "<h1>" : '');?>
					<a href="http://www.highedweb.org/"><img src="<?php echo bloginfo( 'template_directory') ?>/images/HighEdWeblogo.png" alt="HighEdWeb" height="119" width="153" /></a>
				<?php echo (is_home() ? "</h1>" : '');?>
					<div class="tagline"><strong>Higher Education Web Professionals</strong><br/>is just too much for one breath&hellip;<br/>Call us HighEdWeb for short.</div>
                </header>
            </div>
        </div>
        <div id="PageInnerWrapper">
            <div class="container_12 MainContent"><?php
				if (is_home()): ?>
				   <section id="HeaderImage" class="grid_12"><div class="grid_inner">
						<ul id="HomepageSlider">
						  <li><img src="http://www.highedweb.org/wp-content/uploads/2011/03/2_o.jpeg" alt="HighEdWeb is an organization of Web professionals working at institutions of higher education. We design, develop, manage and map the futures of higher education websites." /></li>
						  <li><img src="http://www.highedweb.org/wp-content/uploads/2011/03/8_o.png" alt="Our mission: to advance Web professionals, technologies and standards in higher education." /></li>
						</ul>
				   </div></section>

				<?php // Check if this is a post or page, if it has a thumbnail, and if it's a big one

				elseif ( is_singular() &&
						has_post_thumbnail( $post->ID ) &&
						( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) && $image[1] >= HEADER_IMAGE_WIDTH ) :
					// Houston, we have a new header image!
					echo "<section id=\"HeaderImage\" class=\"grid_12\"><div class=\"grid_inner\">" . get_the_post_thumbnail( $post->ID, 'post-thumbnail' ) . "</div></section>";
				else : ?>
					<section id="HeaderImage" class="grid_12"><div class="grid_inner"><img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" /></div></section><?php
				endif; ?>
                <nav id="access" class="grid_12">
                	<a href="#content" class="SkipNav"><img src="<?php echo bloginfo( 'template_directory') ?>/images/transparent.png" alt="Skip page navigation" width="1" height="1" /></a>
                    <div class="grid_inner">
                    	<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
                    	<div id="search" class="widget_search"><?php get_search_form(); ?></div>
                    </div>
                </nav>
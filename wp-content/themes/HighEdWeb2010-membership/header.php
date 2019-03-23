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

	?> - HighEdWeb Association</title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <script type="text/javascript" src="<?php echo bloginfo( 'template_directory') ?>/scripts/common_highedweb.js"></script>
	<?php
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
                <a href="http://www.highedweb.org/"><img src="<?php echo bloginfo( 'template_directory') ?>/images/HighEdWeblogo.png" alt="HighEdWeb" height="119" width="153" /></a>
                <?php echo (is_home() ? "<h1>" : '<a href="/">');?>
					<span class="Title">Membership Community</span>
				<?php echo (is_home() ? "</h1>" : '</a>');?>
                </header>
            </div>
        </div>
        <div id="PageInnerWrapper">
            <div class="container_12 MainContent">

				<?php // Check if this is a post or page, if it has a thumbnail, and if it's a big one

				if ( is_singular() &&
						has_post_thumbnail( $post->ID ) &&
						( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) && $image[1] >= HEADER_IMAGE_WIDTH ) :
					// Houston, we have a new header image!
					echo "<section id=\"HeaderImage\" class=\"grid_12\"><div class=\"grid_inner\">" . get_the_post_thumbnail( $post->ID, 'post-thumbnail' ) . "</div></section>";
				else : ?>
					<section id="HeaderImage" class="grid_12"><div class="grid_inner"><img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="Our Community" /></div></section><?php
				endif; ?>
                <nav id="access" class="grid_12">
                	<a href="#content" class="SkipNav"><img src="<?php echo bloginfo( 'template_directory') ?>/images/transparent.png" alt="Skip page navigation" width="1" height="1" /></a>
                    <div class="grid_inner">
                    	<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
                    	<div id="search" class="widget_search"><?php get_search_form(); ?></div>
                    </div>
                </nav>
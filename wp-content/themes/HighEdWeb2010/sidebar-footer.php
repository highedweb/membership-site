<?php
/**
 * The Footer widget areas.
 */

/* The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
 
$ActiveFooterSidebarCount = 0;
if(is_active_sidebar( 'first-footer-widget-area'  ))
	$ActiveFooterSidebarCount++;
if(is_active_sidebar( 'second-footer-widget-area'  ))
	$ActiveFooterSidebarCount++;
if(is_active_sidebar( 'third-footer-widget-area'  ))
	$ActiveFooterSidebarCount++;
if(is_active_sidebar( 'fourth-footer-widget-area'  ))
	$ActiveFooterSidebarCount++;
if ($ActiveFooterSidebarCount == 0)
	return;



// If we get this far, we have widgets. Let do this.
?>            </div><?php /* div class=container_12 */ ?>
			<div id="footer-widget-area" role="complementary" class="container_12"><?php
            	if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
				<section id="first" class="grid_<?php echo (12 / $ActiveFooterSidebarCount) ?> widget-area">
                	<div class="grid_inner">
                        <ul class="xoxo">
                            <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                        </ul>
					</div>
                </section><?php
	            endif;
				if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
				<section id="second" class="grid_<?php echo (12 / $ActiveFooterSidebarCount) ?> widget-area">
                	<div class="grid_inner">
                        <ul class="xoxo">
                            <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                        </ul>
					</div>
                </section><?php
        	    endif;
				if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
				<section id="third" class="grid_<?php echo (12 / $ActiveFooterSidebarCount) ?> widget-area">
                	<div class="grid_inner">
                        <ul class="xoxo">
                            <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
                        </ul>
					</div>
                </section><?php
				endif;
                if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
                <section id="fourth" class="grid_<?php echo (12 / $ActiveFooterSidebarCount) ?> widget-area">
                	<div class="grid_inner">
                        <ul class="xoxo">
                            <?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
                        </ul>
					</div>
                </section><?php
                endif; ?>
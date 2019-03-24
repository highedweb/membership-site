<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 */
?>                <section id="primary" class="grid_3 widget-area" role="complementary">
					<div class="grid_inner">
                    	<ul class="xoxo"><?php
						/* When we call the dynamic_sidebar() function, it'll spit out
						 * the widgets for that widget area. If it instead returns false,
						 * then the sidebar simply doesn't exist, so we'll hard-code in
						 * some default sidebar stuff just in case.
						 */
						if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
                            <li id="archives" class="widget-container">
                                <h3 class="widget-title"><?php _e( 'Archives', 'HighEdWeb2010' ); ?></h3>
                                <ul>
                                    <?php wp_get_archives( 'type=monthly' ); ?>
                                </ul>
                            </li>
                            <li id="meta" class="widget-container">
                                <h3 class="widget-title"><?php _e( 'Meta', 'HighEdWeb2010' ); ?></h3>
                                <ul>
                                    <?php wp_register(); ?>
                                    <li><?php wp_loginout(); ?></li>
                                    <?php wp_meta(); ?>
                                </ul>
                            </li><?php
                        endif; // end primary widget area ?>
						</ul>
					</div>
                </section><?php
// A second sidebar for widgets, just because.
if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
                <section id="secondary" class="grid_3 widget-area" role="complementary">
                	<div class="grid_inner">
                    	<ul class="xoxo"><?php
                        	dynamic_sidebar( 'secondary-widget-area' ); ?>
                        </ul>
                    </div>
                </section><?php
endif; ?>
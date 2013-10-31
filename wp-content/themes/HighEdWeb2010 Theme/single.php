<?php
/**
 * The Template for displaying all single posts.
 */
get_header();
?>                <section id="content" class="<?php echo is_active_sidebar( 'secondary-widget-area' ) ? "grid_6" : "grid_8 suffix_1" ?>">
                	<div class="grid_inner"><?php
                    if ( have_posts() )
						while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        	<h1 class="entry-title"><?php the_title(); ?></h1>
                            <div class="entry-meta"><?php highedweb_posted_on(); ?></div>
                            <div class="entry-content">
                            	<?php the_content(); ?>
                            	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'missouristate2010' ), 'after' => '</div>' ) ); ?>
                            </div><?php

							if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
                            <div id="entry-author-info">
                            	<div id="author-avatar">
                                	<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'highedweb_author_bio_avatar_size', 60 ) ); ?>
                                </div>
                                <div id="author-description">
                                	<h2><?php printf( esc_attr__( 'About %s', 'missouristate2010' ), get_the_author() ); ?></h2>
                                    <?php the_author_meta( 'description' ); ?>
                                    <div id="author-link"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                                    	<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'missouristate2010' ), get_the_author() ); ?>
                                    </a></div>
                                </div>
                            </div><?php
                            endif; ?>
                            <div class="entry-utility"><?php
                            	highedweb_posted_in();
                                edit_post_link( __( 'Edit', 'missouristate2010' ), '<span class="edit-link">', '</span>' ); ?>
                            </div>
                        </article>
                        <nav id="nav-below" class="navigation">
                        	<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'missouristate2010' ) . '</span> %title' ); ?></div>
                            <div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'missouristate2010' ) . '</span>' ); ?></div>
                        </nav><?php
                       		comments_template( '', true );

						endwhile; // end of the loop. ?>
                    </div>
                </section><?php

get_sidebar();
get_footer(); ?>
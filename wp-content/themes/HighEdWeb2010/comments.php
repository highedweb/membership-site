<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to twentyten_comment which is
 * located in the functions.php file.
 */
?>                        <div id="comments"><?php
						if ( post_password_required() ) : ?>
                        	<p class="nopassword"><?php echo ('This post is password protected. Enter the password to view any comments.' ); ?></p>
                        </div><?php
						/* Stop the rest of comments.php from being processed,
						 * but don't kill the script entirely -- we still have
						 * to fully load the template.
						 */
							return;
						endif;

						if ( have_comments() ) : ?>
                        	<h2 id="comments-title"><?php
                      			printf(get_comments_number() == 1 ? 'One Response to %2$s' : '%1$s Responses to %2$s', get_comments_number(), ' <em>' . get_the_title() . '</em>'); ?></h2><?php
                        	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                            <nav class="navigation">
                                <div class="nav-previous"><?php previous_comments_link('<span class="meta-nav">&larr;</span> Older Comments'); ?></div>
                                <div class="nav-next"><?php next_comments_link('Newer Comments <span class="meta-nav">&rarr;</span>'); ?></div>
                            </nav><?php
                            endif; // check for comment navigation ?>
                            <ol class="commentlist"><?php
                                    /* Loop through and list the comments. Tell wp_list_comments()
                                     * to use twentyten_comment() to format the comments.
                                     * If you want to overload this in a child theme then you can
                                     * define twentyten_comment() and that will be used instead.
                                     * See twentyten_comment() in twentyten/functions.php for more.
                                     */
                                    wp_list_comments( array( 'callback' => 'highedweb_comment' ) );?>
                            </ol><?php
							if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                            <nav class="navigation">
                                <div class="nav-previous"><?php previous_comments_link('<span class="meta-nav">&larr;</span> Older Comments'); ?></div>
                                <div class="nav-next"><?php next_comments_link('Newer Comments <span class="meta-nav">&rarr;</span>'); ?></div>
                            </nav><?php
                            endif; // check for comment navigation

						else : // or, if we don't have comments:
							/* If there are no comments and comments are closed,
							 * let's leave a little note, shall we?
							 */
							if ( ! comments_open() ) : ?>
                            <p class="nocomments"><?php echo('Comments are closed.'); ?></p><?php
                            endif; // end ! comments_open()
						endif; // end have_comments()
						comment_form(); ?>
                        </div>
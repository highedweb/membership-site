<?php
/**
 * The template for displaying 404 pages (Not Found).
 */
get_header();
?>                <section id="content" class="grid_8 suffix_4">
                	<div class="grid_inner">
                    	<article id="post-0" class="post error404 not-found">
                        	<h1 class="entry-title">Not Found</h1>
                            <div class="entry-content">
                            	<p>Apologies, but the page you requested could not be found. Perhaps searching will help.</p>
                                <?php get_search_form(); ?>
                            </div>
                        </article>
                    </div>
                </section><?php
get_footer(); ?>
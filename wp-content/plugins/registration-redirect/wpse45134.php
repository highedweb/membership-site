<?php
/*
Plugin Name: Registration Redirect
Description: Don't allow people to view the default registration page
Author: Christopher Davis (modified by Sara Clark)
Author URI: http://christopherdavis.me
License: GPL2
*/

add_action( 'login_form_register', 'wpse45134_catch_register' );
/**
 * Redirects visitors to `wp-login.php?action=register` to 
 * `site.com/register`
 */
function wpse45134_catch_register()
{
    wp_redirect( home_url( '/join' ) );
    exit(); // always call `exit()` after `wp_redirect`
}

add_action( 'login_form_lostpassword', 'wpse45134_filter_option' );
add_action( 'login_form_retrievepassword', 'wpse45134_filter_option' );
/**
 * Simple wrapper around a call to add_filter to make sure we only
 * filter an option on the login reset password page.
 */
function wpse45134_filter_option()
{
    // use __return_zero because pre_option_{$opt} checks
    // against `false`
    add_filter( 'pre_option_users_can_register', '__return_zero' );
}
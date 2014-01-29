<?php
/*
Plugin Name: HighEdWeb Membership OAuth Provider
Plugin URI: https://github.com/highedweb/membership-site
Version: 1.0
Description: A plugin to allow WordPress to used as an OAuth authenticator.
Author: wokamoto (modified by Chad Killingsworth)
Author URI: http://dogmap.jp/
Text Domain: heweb-oauth-provider
Domain Path: /languages/

License:
 Released under the GPL license
  http://www.gnu.org/copyleft/gpl.html
  Copyright 2011 - 2013 wokamoto (email : wokamoto1973@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
if (!class_exists('WP_OAuthProvider'))
	require_once(dirname(__FILE__).'/includes/class-oauth-provider.php');

//**************************************************************************************
// Go! Go! Go!
//**************************************************************************************
global $oauth_provider;

if (!isset($oauth_provider))
	$oauth_provider = new WP_OAuthProvider(__FILE__);

if (isset($_GET['oauth']) || isset($_POST['oauth'])) {
	ob_start();
	add_filter('deprecated_argument_trigger_error', create_function('', 'return FALSE;'));
}

// Add Method Sample
//add_oauth_method('sayHello', create_function('$request, $userid, $username', 'return array("message" => "Hello {$username}!");'));

function hewebmembershipinfo_oauth($request, $userid, $username) {
	$member_email = $request->get_parameter('member_email');
	
	if ( ! is_email( $member_email ) ) {
		return array( 
			'message' => __( 'Email address was not valid' ), 
		);
	}
	
	$user = get_user_by( 'email', $member_email );
	if ( is_wp_error( $user ) || ! is_object( $user ) ) {
		return array(
			'message' => __( 'WordPress user could not be retrieved' ), 
		);
	}
	$is_admin = user_can( $user->id, 'delete_users' ); // Put the appropriate capability or role in the "administrator" spot
	if ( ! $is_admin ) {
		return array(
			'message' => __( 'User is not authorized' ), 
		);
	}
	
	// Globalize the WPDB class object so we can use it for queries against the WordPress database
	global $wpdb;
	// Run the prepare() method to sanitize our query; this works like sprintf()
	$query = $wpdb->prepare( "SELECT mem.id as member_id, display_name, first_name, last_name, job_title, organization_name, max(email.email) as email, memstatus.name as status, end_date 
	FROM civicrm_contact as c
	INNER JOIN civicrm_membership as mem on c.id = mem.contact_id
	INNER JOIN civicrm_membership_status as memstatus on mem.status_id = memstatus.id
	INNER JOIN civicrm_email as email on c.id = email.contact_id
	WHERE c.is_deleted = %2$d and email.email = %1$s
	GROUP BY mem.id LIMIT 1", $member_email, 0 );
	// Run the query itself; our results will be returned as an object, by default. You can change the output if desired. Since we're only trying to pull a single result, we're using get_row(). If we need multiple rows, we can use get_results() instead
	$result = $wpdb->get_row( $query );
	if ( is_wp_error( $result ) || ! is_object( $result ) ) {
		return array(
			'message' => __( 'CiviCRM member could not be retrieved' ), 
			'email' => $member_email
		);
	}
	
	return array( 
		'message' => 'ok',
		'membership_id' => sprintf( __( '%s' ), $result->member_id ),
		'display_name' => sprintf( __( '%s' ), $result->display_name ),
		'first_name' => sprintf( __( '%s' ), $result->first_name ),
		'last_name' => sprintf( __( '%s' ), $result->last_name ),
		'job_title' => sprintf( __( '%s' ), $result->job_title ),
		'organization_name' => sprintf( __( '%s' ), $result->organization_name ),
		'email' => sprintf( __( '%s' ), $result->email ),
		'membership_status' => sprintf( __( '%s' ), $result->status ),
		'membership_expiration' => sprintf( __( '%s' ), $result->end_date )
	);
} 
add_oauth_method('member_info', hewebmembershipinfo_oauth);

if (function_exists('register_activation_hook'))
	register_activation_hook(__FILE__, 'flush_rewrite_rules');
if (function_exists('register_deactivation_hook'))
	register_deactivation_hook(__FILE__, 'flush_rewrite_rules');

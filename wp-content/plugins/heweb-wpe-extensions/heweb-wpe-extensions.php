<?php
/**
 * Plugin Name: HighEdWeb WPEngine Compatibility Extensions
 * Plugin URI: http://highedweb.org
 * Description: CiviCRM template caching fixes
 * Version: 0.1
 * Author: Jason Woodward <jason@jwoodward.com>
 * Author URI: http://woodwardjd.com
 * License: None
 */

function heweb_set_fswrite_cookie_if_necessary() {
  /**
   * Instead of making PHP go through all of this code when we don't need
   * to do anything, let's just bail immediately if no action is needed
   */
  if ( ! heweb_needs_fswrite_cookie_set() ) {
    return false;
  }
  
  //error_log("heweb: scin start");
  //if (heweb_needs_fswrite_cookie_set()) {
    //error_log("heweb: scin needs cookie set");
    $wpe_cookie = 'wpe-auth';
    $cookie_value = md5('wpe_auth_salty_dog|'.WPE_APIKEY);
    if ( ! heweb_fswrite_cookie_set() ) {
      //error_log("heweb: scin cookie not yet set");
      if ( isset( $_GET['heweb-fswrite'] ) ) {
        //error_log("heweb: scin inside wp-admin, so setting and redirecting back to " . urldecode($_GET['backto']));
        setcookie( $wpe_cookie, $cookie_value, 0, heweb_translate_request_uri_into_cookie_path() );
        wp_redirect( urldecode( $_GET['backto'] ), 302 );
        exit();
      } else {
        $whereto = get_site_url( null, 'wp-login.php') . '?heweb-fswrite=true&backto=' . urlencode(heweb_selfURL());
        //error_log("heweb: scin redirecting to where we know we can set a cookie: " . $whereto);
        wp_redirect( $whereto, 302 );
        exit();
      }
    } else {
      //error_log("heweb: scin fswrite cookie already set");
      // refresh if necessary.  the following case came from code WPE support sent me.  I'm being slightly conservative here and only resetting it when we think they've cleared it
      if ( ! wp_get_current_user() || ! current_user_can('edit_pages') ) {
        //error_log("heweb: scin refreshing fswrite cookie");
        setcookie( $wpe_cookie, $cookie_value, 0, heweb_translate_request_uri_into_cookie_path() );
      }
    }
  //}
}

function heweb_translate_request_uri_into_cookie_path() {
  if ( stristr( $_SERVER['REQUEST_URI'], '/join/' ) ) {
    return '/join';
  } elseif ( stristr( $_SERVER['REQUEST_URI'], '/register/' ) ) {
    return '/register';
  }
  // No need for the else here
  return null;
  
  /**
   * If I'm understanding what you're doing here, I think stristr is much more
   * efficient to use instead of a preg_match()
   */
  // TODO: memoize
  if (preg_match('/^\/join/',parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH))) {
    return '/join';
  } elseif (preg_match('/^\/register/',parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH))) {
    return '/register';
  } else {
    return null;
  }
}

function heweb_needs_fswrite_cookie_set() {
  return ( ( isset( $_GET['heweb-fswrite'] ) && $_GET['heweb-fswrite'] ) || heweb_translate_request_uri_into_cookie_path() );
  /**
   * The line above is a short way of writing what's below
   */
  if ($_GET['heweb-fswrite'] || heweb_translate_request_uri_into_cookie_path()) {
    return true;
  } else {
    return false;
  }
}

function heweb_fswrite_cookie_set() {
  $wpe_cookie = 'wpe-auth';
  return $_COOKIE[$wpe_cookie] ? true : false;
  /**
   * The line above is a shorter way of writing what's below
   */
  if ($_COOKIE[$wpe_cookie]) {
    return true;
  } else {
    return false;
  }
}


## http://stackoverflow.com/questions/2236873/getting-the-full-url-of-the-current-page-php
function heweb_selfURL() { 
    /**
     * WordPress has a helper function to determine whether SSL is being used
     */
    $s = is_ssl() ? 's' : '';
    //$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
    $protocol = heweb_strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; 
    /**
     * This might get really screwy if we are using ports other than 80; even for SSL 
     *    requests, since they'll be using 443 by default. Probably better to ignore the
     *    port, unless we come across an issue because of it
     */
    //$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
    return $protocol."://".$_SERVER['SERVER_NAME']./*$port.*/$_SERVER['REQUEST_URI']; 
} 

function heweb_strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }

add_action( 'wp_loaded', 'heweb_set_fswrite_cookie_if_necessary' );

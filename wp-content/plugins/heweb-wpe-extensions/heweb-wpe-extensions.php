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
  //error_log("heweb: scin start");
  if (heweb_needs_fswrite_cookie_set()) {
    //error_log("heweb: scin needs cookie set");
    $wpe_cookie = 'wpe-auth';
    $cookie_value = md5('wpe_auth_salty_dog|'.WPE_APIKEY);
    if (!heweb_fswrite_cookie_set()) {
      //error_log("heweb: scin cookie not yet set");
      if (isset($_GET['heweb-fswrite'])) {
        //error_log("heweb: scin inside wp-admin, so setting and redirecting back to " . urldecode($_GET['backto']));
        setcookie($wpe_cookie,$cookie_value,0,heweb_translate_request_uri_into_cookie_path());
        wp_redirect( urldecode($_GET['backto']), 302 );
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
        setcookie($wpe_cookie,$cookie_value,0,heweb_translate_request_uri_into_cookie_path());
      }
    }
  }
}

function heweb_translate_request_uri_into_cookie_path() {
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
  if ($_GET['heweb-fswrite'] || heweb_translate_request_uri_into_cookie_path()) {
    return true;
  } else {
    return false;
  }
}

function heweb_fswrite_cookie_set() {
  $wpe_cookie = 'wpe-auth';
  if ($_COOKIE[$wpe_cookie]) {
    return true;
  } else {
    return false;
  }
}


## http://stackoverflow.com/questions/2236873/getting-the-full-url-of-the-current-page-php
function heweb_selfURL() { 
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : ""; 
    $protocol = heweb_strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; 
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
    return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI']; 
} 

function heweb_strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }

add_action('wp_loaded','heweb_set_fswrite_cookie_if_necessary');

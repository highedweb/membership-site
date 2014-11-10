<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You do not have permission to do this' );
}

if ( ! class_exists( 'HEWMembership_Videos' ) ) {
	class HEWMembership_Videos {
		private $_pattern   = null;
		private $_host      = null;
		private $_expires   = 0;
		private $_keyfile   = null;
		private $_keypairid = null;
		
		/**
		 * Construct our class; register our embed handler
		 * @see http://codex.wordpress.org/Function_Reference/wp_embed_register_handler
		 */
		function __construct() {
			$this->_get_options();
			add_action( 'admin_init', array( $this, 'admin_init' ) );
			
			if ( empty( $this->_pattern ) )
				return;
			
			if ( empty( $this->_host ) ) {
				$this->_host = esc_url( $this->_pattern );
			}
			
			$pattern = str_replace( array( '.', 'https:', 'http:' ), array( '\.', 'http(s*?):', 'http(s*?):' ), $this->_pattern );
			wp_embed_register_handler(
				/* $id        = */'heweb-aws-videos-pattern', 
				/* $regex     = */'#' . $pattern . '(.+?)\.mp4#i', 
				/* $callback  = */array( $this, 'do_video_embed' ), 
				/* $priority  = */9
			);
			if ( $this->_host != $this->_pattern ) {
				wp_embed_register_handler(
					'hewev-aws-videos-host', 
					'#' . str_replace( array( '.', 'https:', 'http:' ), array( '\.', 'http(s*?):', 'http(s*?):' ), $this->_host ) . '(.+?)\.mp4#i', 
					array( $this, 'do_video_embed' ), 
					9
				);
			}
		}
		
		/**
		 * Retrieve the options from the database
		 */
		function _get_options() {
			$vals = get_option( 'hew-video-settings', array(
				'pattern'         => null, 
				'cloudfront_host' => null, 
				'expires'         => 0, 
				'keyfile'         => null, 
				'keypairid'       => null, 
			) );
			
			$this->_pattern = esc_url( $vals['pattern'] );
			$this->_host = esc_url( $vals['cloudfront_host'] );
			$this->_expires = intval( $vals['expires'] );
			$this->_keyfile = $vals['keyfile'];
			$this->_keypairid = $vals['keypairid'];
		}
		
		/**
		 * Register the settings for this plugin
		 */
		function admin_init() {
			register_setting( 'media', 'hew-video-settings', array( $this, 'sanitize_options' ) );
			add_settings_section( 'hewv-settings', __( 'HEWeb Video Settings' ), array( $this, 'settings_section' ), 'media' );
			$fields = array(
				'pattern'         => __( 'Video Location' ), 
				'cloudfront_host' => __( 'Cloudfront URL' ), 
				'expires'         => __( 'How long, in minutes, should the URL be valid?' ), 
				'keyfile'         => __( 'Absolute path to keyfile' ), 
				'keypairid'       => __( 'Key/Pair ID' ), 
			);
			foreach ( $fields as $id=>$label ) {
				add_settings_field( sprintf( 'hewv_%s', $id ), $label, array( $this, 'settings_field' ), 'media', 'hewv-settings', array( 'label_for' => sprintf( 'hewv_%s', $id ) ) );
			}
		}
		
		/**
		 * Output a settings field
		 */
		function settings_field( $args=array() ) {
			if ( ! array_key_exists( 'label_for', $args ) )
				return false;
			
			$vals = get_option( 'hew-video-settings', array( 
				'pattern'         => null, 
				'cloudfront_host' => null, 
				'expires'         => 0, 
				'keyfile'         => null, 
				'keypairid'       => null, 
			) );
			
			switch ( $args['label_for'] ) {
				case 'hewv_pattern' : 
					printf( '<input type="url" name="hew-video-settings[%1$s]" id="%2$s" value="%3$s"/>', 'pattern', $args['label_for'], esc_url( $vals['pattern'] ) );
				break;
				case 'hewv_cloudfront_host' : 
					printf( '<input type="url" name="hew-video-settings[%1$s]" id="%2$s" value="%3$s"/>', 'cloudfront_host', $args['label_for'], esc_url( $vals['cloudfront_host'] ) );
				break;
				case 'hewv_expires' : 
					printf( '<input type="number" name="hew-video-settings[%1$s]" id="%2$s" value="%3$d"/>', 'expires', $args['label_for'], intval( $vals['expires'] ) );
				break;
				case 'hewv_keyfile' : 
					printf( '<input type="text" name="hew-video-settings[%1$s]" id="%2$s" value="%3$s"/>', 'keyfile', $args['label_for'], $vals['keyfile'] );
				break;
				case 'hewv_keypairid' : 
					printf( '<input type="password" name="hew-video-settings[%1$s]" id="%2$s" value="%3$s"/>', 'keypairid', $args['label_for'], $vals['keypairid'] );
				break;
			}
		}
		
		/**
		 * Output the settings section
		 */
		function settings_section() {
			/*settings_fields( 'hew-video-settings' );*/
			return;
		}
		
		/**
		 * Sanitize the settings for this plugin
		 */
		function sanitize_options( $input=array() ) {
			/*print( '<pre><code>' );
			var_dump( $input );
			print( '</code></pre>' );
			wp_die( 'Stop' );*/
			
			if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'media-options' ) ) {
				return false;
			}
			
			$rt = array( 'pattern' => null, 'cloudfront_host' => null, 'expires' => 0, 'keyfile' => null, 'keypairid' => null );
			$rt['pattern'] = esc_url( $input['pattern'] );
			$rt['cloudfront_host'] = esc_url( $input['cloudfront_host'] );
			$rt['expires'] = intval( $input['expires'] );
			$rt['keyfile'] = esc_attr( $input['keyfile'] );
			$rt['keypairid'] = esc_attr( $input['keypairid'] );
			
			return $rt;
		}
		
		/**
		 * Handle the embed request
		 */
		function do_video_embed( $matches, $attr, $url, $rawattr ) {
			/*ob_start();
			print( '<pre><code>' );
			var_dump( func_get_args() );
			print( '</code></pre>' );
			return ob_get_clean();*/
			
			$video = $url;
			if ( count( $matches ) < 3 || empty( $matches[2] ) ) {
				return '<p>The requested video could not be found. Please try another video.</p>';
			}
			
			$file = $matches[2] . '.mp4';
			$width = array_key_exists( 'width', $attr ) && is_numeric( $attr['width'] ) ? $attr['width'] : false;
			
			$timestamp = strtotime( "+" . intval( $this->_expires ) . " minutes" );
			
			$url = $this->getUrl( trailingslashit( esc_url( $this->_host ) ) . $file, $timestamp, $this->_keypairid );
			if ( false === $url ) {
				return '<p>The requested video could not be found. Please try another video.</p>';
			}
			
			$w = $width ? ' style="width: ' . intval( $width ) . 'px;"' : '';
			return sprintf( '<video src="%1$s"%2$s controls>Your browser does not support the <code>video</code> element. Please try a different browser.</video>', $url, $w );
		}
		
		/**
		 * Retrieve the private key
		 */
		private function _get_priv_key() {
		  // JDW NOTE: not sure exactly what the paths will be, so converted this to be relative to this plugin's placement.  Maybe we should move it elsewhere?
		  // JDW NOTE: we should definitely prevent requesting of this file.
		  $this->_keyfile = dirname(dirname(dirname(__FILE__))).'/heweb-cf.pem';
			if ( ! file_exists( $this->_keyfile ) )
				return false;
			
			return file_get_contents( $this->_keyfile );
		}
		
		/**
		 * Get a signed URL for the resource
		 * @param string $resource the unsigned URL for the video
		 * @param int $expires the time at which the signed URL should expire
		 * @param string $key the Key Pair ID
		 * @return string the signed URL
		 */
		function getUrl( $resource, $expires, $key ) { 
			$priv_key = $this->_get_priv_key();
			if ( false === $priv_key ) {
				return false;
			}
			
			/*$priv_key = file_get_contents( '/var/www/uark-wpdev.woodwardjd.com/heweb-cf.pem' ); */
			$pkeyid = openssl_get_privatekey( $priv_key ); 
			$policy_arr = array( 
				'Statement' => array( 
					array( 
						'Resource' => $resource, 
						'Condition' => array( 
							'DateLessThan' => array( 
								'AWS:EpochTime' => $expires 
							) 
						) 
					) 
				) 
			);
			// $policy_str = json_encode( $policy_arr ); // JDW NOTE: json_encode escaped the /'s in the url in $resource 
			$policy_str = '{"Statement":[{"Resource":"'.$resource.'","Condition":{"DateLessThan":{"AWS:EpochTime":'.$expires.'}}}]}';
			$policy_str = trim( preg_replace( '/\s+/', '', $policy_str ) ); 
			$res = openssl_sign( $policy_str, $signature, $pkeyid, OPENSSL_ALGO_SHA1 ); 
			$signature_base64 = ( base64_encode( $signature ) ); 
			$repl = array( '+' => '-', '=' => '_', '/' => '~' ); 
			$signature_base64 = strtr( $signature_base64, $repl ); 
			$url = sprintf( '%1$s?Expires=%2$s&Signature=%3$s&Key-Pair-Id=%4$s', $resource, $expires, $signature_base64, $key );
			/*$url = $resource . '?Expires='.$expires. '&Signature=' . $signature_base64 . '&Key-Pair-Id='. $key; */
			openssl_free_key( $pkeyid );
			return $url; 
		} 
	}
	
	global $hew_videos_obj;
	$hew_videos_obj = new HEWMembership_Videos;
}
<?php 
/* 
  Plugin Name: HighEdWeb S3 Utilities
  URI: http://woodwardjd.com
  Description: A collection of WordPress helpers (like shortcodes) for dealing with S3
  Version: 0.3
  Author: Jason Woodward
  Author URI: http://woodwardjd.com 
  License: GPL2
*/

if(!class_exists('HighEdWeb_S3_Plugin')) { 
  class HighEdWeb_S3_Plugin {
		private $_pattern   = null;
		private $_host      = null;
		private $_expires   = 0;
		private $_keyfile   = null;
		private $_keypairid = null;

    public function __construct() { 
			add_action( 'admin_init', array(&$this, 'admin_init' ) );
      add_shortcode( 's3-sign', array(&$this, 's3_sign'));
	  add_shortcode( 'heweb-link', array(&$this, 'heweb_link'));
      add_shortcode( 'heweb-video-embed', array(&$this, 'heweb_video_embed'));
      add_shortcode( 'heweb-audio-embed', array(&$this, 'heweb_audio_embed'));
    }
    
    public static function activate() { }
    public static function deactivate() { }

		function admin_init() {
			register_setting( 'media', 'highedweb-s3-settings', array( $this, 'sanitize_options' ) );
			add_settings_section( 'highedweb-s3-settings', __( 'HighEdWeb S3 Global Defaults' ), array( $this, 'settings_section' ), 'media' );
			$fields = array(
				'expires'         => __( 'How long, in minutes, should the URL be valid?' ), 
				'keypairid'       => __( 'Keypair ID' ), 
			);
			foreach ( $fields as $id=>$label ) {
				add_settings_field( sprintf( 'heweb_s3_%s', $id ), $label, array( $this, 'settings_field' ), 'media', 'highedweb-s3-settings', array( 'label_for' => sprintf( 'heweb_s3_%s', $id ) ) );
			}
		}

		function _get_options() {
			$vals = get_option( 'highedweb-s3-settings', array(
				'expires'         => 0, 
				'keypairid'       => null, 
			) );
			return array( 'expires' => intval( $vals['expires']),
			              'keypairid' => $vals['keypairid']);
		}
		
		function settings_field( $args=array() ) {
			if ( ! array_key_exists( 'label_for', $args ) )
				return false;
			
			$vals = get_option( 'highedweb-s3-settings', array( 
				'expires'         => 0, 
				'keypairid'       => null, 
			) );
			
			switch ( $args['label_for'] ) {
				case 'heweb_s3_expires' : 
					printf( '<input type="number" name="highedweb-s3-settings[%1$s]" id="%2$s" value="%3$d" autocomplete="off"/>', 'expires', $args['label_for'], intval( $vals['expires'] ) );
				break;
				case 'heweb_s3_keypairid' : 
					printf( '<input type="text" name="highedweb-s3-settings[%1$s]" id="%2$s" value="%3$s" autocomplete="off"/>', 'keypairid', $args['label_for'], $vals['keypairid'] );
				break;
			}
		}
		
		/**
		 * Output the settings section
		 */
		function settings_section() {
			/*settings_fields( 'highedweb-s3-settings' );*/
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
			
			$rt = array( 'expires' => 0, 'keypairid' => null );
			$rt['expires'] = intval( $input['expires'] );
			$rt['keypairid'] = esc_attr( $input['keypairid'] );
			
			return $rt;
		}

		/**
		 * Retrieve the private key
		 */
		private function _get_priv_key() {
		  // not sure exactly what the paths will be, so converted this to be relative to this plugin's placement.  Maybe we should move it elsewhere?
		  // we should definitely prevent requesting of this file.
		  $this->_keyfile = dirname(dirname(dirname(__FILE__))).'/uploads/private/heweb-cf.pem';
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
		
    public function s3_sign($attrs, $content = '') {
      // src: resource source url
      // expires: number of minutes URL expires in
      // keypair id: from cloudfront / s3 signing.
      $options = $this->_get_options();
      $minutes = isset($attrs['expires']) ? $attrs['expires'] : $options['expires'];
      $keypairid = isset($attrs['keypairid']) ? $attrs['keypairid'] : $options['keypairid'];
      return $this->getUrl( $attrs['src'], strtotime( "+" . intval( $minutes ) . " minutes" ), $keypairid );
    }
	
    public function heweb_link($attrs, $content = '') {
      // src: resource source url
	  // link_text: text within the a tag
      // expires: number of minutes URL expires in
      // keypair id: from cloudfront / s3 signing.
      $options = $this->_get_options();
      $minutes = isset($attrs['expires']) ? $attrs['expires'] : $options['expires'];
      $keypairid = isset($attrs['keypairid']) ? $attrs['keypairid'] : $options['keypairid'];
	  $src = $this->getUrl( $attrs['src'], strtotime( "+" . intval( $minutes ) . " minutes" ), $keypairid );
	  $link_text = isset($attrs['link_text']) ? $attrs['link_text'] : "link";
	  ob_start(); ?>
	  <a href="<?php echo $src ?>"><?php echo $link_text ?></a>
	  <?php return ob_get_clean();
    }
    
    public function heweb_video_embed($attrs, $content = "") {
      // expires: number of minutes URL expires in
      // keypair id: from cloudfront / s3 signing.
      // style: text to embed in the style attribute of the video element
      // webm-url: link to WebM version of video
      // mp4-url: link to mp4 version of video
      // transcript-url: link to transcript of video
      // poster-url: link to the video poster image
      $options = $this->_get_options();
      $minutes = isset($attrs['expires']) ? $attrs['expires'] : $options['expires'];
      $keypairid = isset($attrs['keypairid']) ? $attrs['keypairid'] : $options['keypairid'];
      $webm_url = isset($attrs['webm_url']) ? $this->getUrl( $attrs['webm_url'], strtotime( "+" . intval( $minutes ) . " minutes" ), $keypairid ) : null;
      $mp4_url = isset($attrs['mp4_url']) ? $this->getUrl( $attrs['mp4_url'], strtotime( "+" . intval( $minutes ) . " minutes" ), $keypairid ) : null;
      $transcript_url = isset($attrs['transcript_url']) ? $this->getUrl( $attrs['transcript_url'], strtotime( "+" . intval( $minutes ) . " minutes" ), $keypairid ) : null;
      $poster_url = isset($attrs['poster_url']) ? $this->getUrl( $attrs['poster_url'], strtotime( "+" . intval( $minutes ) . " minutes" ), $keypairid ) : null;
      ob_start(); ?>
<video controls style="<?php echo $attrs['style'] ?>" <?php if (!is_null($poster_url)) { ?>poster="<?php echo $poster_url ?>"<?php } ?> >
  <?php if (!is_null($webm_url)) { ?><source src="<?php echo $webm_url ?>" type="video/webm" /><?php } ?>
  <?php if (!is_null($mp4_url)) { ?><source src="<?php echo $mp4_url ?>" type="video/mp4" /><?php } ?>
  <?php if (!is_null($transcript_url)) { ?><track src="<?php echo $transcript_url ?>" label="English Captions" kind="subtitles" srclang="en-us" default /><?php } ?>
  Your browser does not support the <code>video</code> element. Please try a different browser.
</video>      
      <?php return ob_get_clean();
    }
    public function heweb_audio_embed($attrs, $content = "") {
      // expires: number of minutes URL expires in
      // keypair id: from cloudfront / s3 signing.
      // style: text to embed in the style attribute of the video element
      // audio_url: link to audio file
      // transcript_vtt_url: link to transcript of audio in vtt format
      // transcript_txt_url: link to transcript of audio in text format
      $options = $this->_get_options();
      $minutes = isset($attrs['expires']) ? $attrs['expires'] : $options['expires'];
      $keypairid = isset($attrs['keypairid']) ? $attrs['keypairid'] : $options['keypairid'];
      $audio_url = isset($attrs['audio_url']) ? $this->getUrl( $attrs['audio_url'], strtotime( "+" . intval( $minutes ) . " minutes" ), $keypairid ) : null;
      $transcript_vtt_url = isset($attrs['transcript_vtt_url']) ? $this->getUrl( $attrs['transcript_vtt_url'], strtotime( "+" . intval( $minutes ) . " minutes" ), $keypairid ) : null;
      $transcript_txt_url = isset($attrs['transcript_txt_url']) ? $this->getUrl( $attrs['transcript_txt_url'], strtotime( "+" . intval( $minutes ) . " minutes" ), $keypairid ) : null;
      ob_start(); ?>
<audio controls style="<?php echo $attrs['style'] ?>" <?php if (!is_null($audio_url)) { ?>src="<?php echo $audio_url ?>"<?php } ?> >
  <?php if (!is_null($transcript_vtt_url)) { ?><track src="<?php echo $transcript_vtt_url ?>" label="English Captions" kind="captions" srclang="en-us" default /><?php } ?>
  Your browser does not support the <code>audio</code> element. Please try a different browser.
</audio>
<?php if (!is_null($transcript_txt_url)) { ?>
<a href="<?php echo $transcript_txt_url ?>">Text Transcript</a>
<?php } ?>
      <?php return ob_get_clean();
    }
  }
}

if(class_exists('HighEdWeb_S3_Plugin')) {
  register_activation_hook(__FILE__, array('HighEdWeb_S3_Plugin', 'activate')); 
  register_deactivation_hook(__FILE__, array('HighEdWeb_S3_Plugin', 'deactivate')); 
  
  $heweb_s3_plugin = new HighEdWeb_S3_Plugin(); 
  if(isset($heweb_s3_plugin)) { 

  }
}

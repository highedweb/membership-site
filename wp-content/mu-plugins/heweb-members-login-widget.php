<?php
add_action( 'widgets_init', 'register_heweb_login_widget', 11 );
function register_heweb_login_widget() {
	if ( ! class_exists( 'Members_Widget_Login' ) )
		return;
	
	require_once( plugin_dir_path( __FILE__ ) . 'heweb-members-login-widget/class-heweb-members-login-widget.php' );
	register_widget( 'HEWeb_Members_Login_Widget' );
}

add_action( 'wp_enqueue_scripts', 'heweb_login_enqueue_jquery' );
function heweb_login_enqueue_jquery() {
	wp_enqueue_script( 'jquery' );
}

add_action( 'wp_print_footer_scripts', 'heweb_login_link_scripts' );
function heweb_login_link_scripts() {
	$url = $_SERVER['REQUEST_URI'];
?>
<script type="text/javascript">
jQuery( function() {
	jQuery( 'a[href*="wp-login.php"]' ).each( function() {
		if ( jQuery( this ).attr( 'href' ).indexOf( 'redirect_to' ) < 0 ) {
			var currenthref = jQuery( this ).attr( 'href' );
			if ( currenthref.indexOf( '?' ) >= 0 ) {
				currenthref = currenthref + '&redirect_to=<?php echo urlencode( $url ) ?>';
			} else {
				currenthref = currenthref + '?redirect_to=<?php echo urlencode( $url ) ?>';
			}
			jQuery( this ).attr( 'href', currenthref );
		}
	} );
} );
</script>
<?php
}
<?php
add_action( 'widgets_init', 'register_heweb_login_widget', 11 );
function register_heweb_login_widget() {
	if ( ! class_exists( 'Members_Widget_Login' ) )
		return;
	
	require_once( plugin_dir_path( __FILE__ ) . 'heweb-members-login-widget/class-heweb-members-login-widget.php' );
	register_widget( 'HEWeb_Members_Login_Widget' );
}
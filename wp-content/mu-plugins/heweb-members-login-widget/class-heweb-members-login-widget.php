<?php
class HEWeb_Members_Login_Widget extends Members_Widget_Login {
	function __construct() {
		unregister_widget( 'Members_Widget_Login' );
		parent::Members_Widget_Login();
	}
	
	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 *
	 * @since 0.1.0
	 */
	function widget( $args, $instance ) {
		if ( $instance['redirect_to_page'] )
			$instance['redirect'] = esc_url( $_SERVER['REQUEST_URI'] );
		parent::widget( $args, $instance );
	}

	/**
	 * Updates the widget control options for the particular instance of the widget.
	 *
	 * @since 0.1.0
	 */
	function update( $new_instance, $old_instance ) {
		$instance = parent::update( $new_instance, $old_instance );

		$instance['redirect_to_page'] = ( isset( $new_instance['redirect_to_page'] ) ? 1 : 0 );

		return $instance;
	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 *
	 * @since 0.1.0
	 */
	function form( $instance ) {
		parent::form( $instance );
?>
		<p>
			<input type="checkbox" name="<?php echo $this->get_field_name( 'redirect_to_page' ) ?>" id="<?php echo $this->get_field_id( 'redirect_to_page' ) ?>" value="1"<?php checked( $instance['redirect_to_page'] ) ?>/> 
			<label for="<?php echo $this->get_field_id( 'redirect_to_page' ) ?>"><?php _e( 'Redirect users back to the page from which they logged in?' ) ?></label>
		</p>
<?php
	}
}

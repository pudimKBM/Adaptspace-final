<?php
/**
 * Metabox for toggling the header area on a per page basis
 *
 * @package West
 */


function west_header_toggle_init() {
    new West_Header_Toggle();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'west_header_toggle_init' );
    add_action( 'load-post-new.php', 'west_header_toggle_init' );
}

class West_Header_Toggle {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
        $post_types = array('post', 'page');
        if ( in_array( $post_type, $post_types )) {
			add_meta_box(
				'west_header_metabox'
				,__( 'Page header', 'west' )
				,array( $this, 'render_meta_box_content' )
				,$post_type
				,'side'
				,'low'
			);
        }
	}

	public function save( $post_id ) {
	
		// Check if our nonce is set.
		if ( ! isset( $_POST['west_header_box_nonce'] ) )
			return $post_id;

		$nonce = $_POST['west_header_box_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'west_header_box' ) )
			return $post_id;

		// If this is an autosave, our form has not been submitted,
                //     so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		// Sanitize the user input.
		$mydata = isset( $_POST['west_header_field'] ) ? (bool) $_POST['west_header_field'] : false;

		// Update the meta field.
		update_post_meta( $post_id, '_west_header_key', $mydata );
	}

	public function render_meta_box_content( $post ) {
	
		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'west_header_box', 'west_header_box_nonce' );

		// Use get_post_meta to retrieve an existing value from the database.
		$value = get_post_meta( $post->ID, '_west_header_key', true );

	?>

		<p><input type="checkbox" class="checkbox" id="west_header_field" name="west_header_field" <?php checked( $value ); ?> />
		<label for="west_header_field"><?php _e( 'Disable the header for this page?', 'west' ); ?></label><br />

	<?php
	}
}
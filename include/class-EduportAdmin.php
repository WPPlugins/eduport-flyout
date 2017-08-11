<?php
/**
 * Eduport flyout Backend
 *
 * @package eduport-flyout
 * @since 1.0.0
 */

// Don't call directly
if ( ! defined( 'ABSPATH' ) ) die();

if ( ! class_exists( 'EduportAdmin' ) ):
class EduportAdmin {
	private static $_instance = null;
	
	/**
	 * Getting a singleton.
	 *
	 * @return object single instance of EduportAdmin
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) )
			self::$_instance = new self();
		return self::$_instance;
	}

	/**
	 * Private constructor
	 */
	private function __construct() {
		if ( ! get_option('eduport_global') ) {
			add_action( 'add_meta_boxes', array( $this,'add_meta_boxes') );
			add_action( 'save_post', array( $this,'save_eduport_post_meta')  );
		}
	}

	/**
	 *	Enqueue options Assets
	 *
	 *	@action	add_meta_boxes
	 */
	function add_meta_boxes() {
		foreach ( get_post_types( array( 'public' => true ) ) as $post_type ) {
			add_meta_box( 'eduport', __( 'eduPort', 'eduport-flyout' ), array( $this, 'show_eduport_meta_box' ), $post_type, 'side' );
		}
	}
	
	/**
	 *	Enqueue options Assets
	 *
	 *	@metabox	eduport
	 */
	function show_eduport_meta_box( $post ) {
		$setting_name = '_eduport_enabled';
		$setting = get_post_meta( $post->ID, $setting_name, true );
		?>
			<input type="checkbox" id="<?php echo $setting_name ?>" name="<?php echo $setting_name ?>" <?php checked( $setting, true ); ?>  value="1" />
			<label for="<?php echo $setting_name ?>">
				<?php _e( 'Show eduPort flyout', 'eduport-flyout' ); ?>
			</label>
		<?php 
	}

	/**
	 *	Enqueue options Assets
	 *
	 *	@action	save_post
	 */
	function save_eduport_post_meta( $post_id ){
		$setting_name = '_eduport_enabled';
		if ( isset( $_POST[ $setting_name ] ) ) {
			update_post_meta( $post_id, $setting_name, true );
		} else {
			delete_post_meta( $post_id, $setting_name );
		}
	}
}

EduportAdmin::instance();
endif;
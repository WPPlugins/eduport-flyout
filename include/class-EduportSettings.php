<?php
/**
 * Eduport flyout Options screen
 *
 * @package eduport-flyout
 * @since 1.0.0
 */

// Don't call directly
if ( ! defined( 'ABSPATH' ) ) die();

if ( ! class_exists( 'EduportSettings' ) ):
class EduportSettings {

	private static $_instance = null;
	
	private $optionset = 'eduport_options';

	/**
	 * Getting a singleton.
	 *
	 * @return object single instance of EduportSettings
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

		add_action( 'admin_init' , array( &$this , 'register_settings' ) );
		add_action( 'admin_menu', array( &$this, 'admin_menu' ) );
		
		add_option( 'eduport_username' , '' , '' , false );
		add_option( 'eduport_global' , false , '' , false );

	}

	/**
	 *	Admin Menu
	 *
	 *	@action	admin_menu
	 */
	function admin_menu() {
		add_options_page( __('eduPort Settings' , 'eduport-flyout' ), __('eduPort' , 'eduport-flyout'), 'manage_options', $this->optionset, array( $this, 'settings_page' ) );
	}

	/**
	 *	Admin Menu
	 *
	 *	@action	options_page
	 */
	function settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( __( 'You do not have sufficient permissions to access this page.', 'eduport-flyout' ) );
		}
		?>
		<div class="wrap">
			<h2><?php _e('eduPort Settings', 'eduport-flyout') ?></h2>

			<form action="options.php" method="post">
				<?php
				settings_fields(  $this->optionset );
				do_settings_sections( $this->optionset );
				submit_button( __('Save Settings' , 'eduport-flyout' ) );
				?>
			</form>
		</div><?php
	}



	/**
	 *	Setup options page.
	 *
	 *	@action admin_init
	 */
	function register_settings() {
		$settings_section = 'eduport_settings';
		// more settings go here ...
		register_setting( $this->optionset , 'eduport_username' );
		register_setting( $this->optionset , 'eduport_global' , 'intval' );

		add_settings_section( $settings_section, __( 'eduPort Flyout',  'eduport-flyout' ), '__return_empty_string', $this->optionset );
		// ... and here
		add_settings_field(
			'eduport_username',
			__( 'eduPort Username',  'eduport-flyout' ),
			array( $this, 'setting_username_ui' ),
			$this->optionset,
			$settings_section
		);

		add_settings_field(
			'eduport_global',
			__( 'Show Everywhere',  'eduport-flyout' ),
			array( $this, 'setting_global_ui' ),
			$this->optionset,
			$settings_section
		);
	}

	
	/**
	 * enter name
	 */
	public function setting_username_ui() {
		$setting_name = 'eduport_username';
		$setting = get_option( $setting_name );
		?><input type="text" class="regular-text" name="<?php echo $setting_name ?>" value="<?php esc_attr_e( $setting ) ?>" /><?php
	}

	/**
	 * Output Theme selectbox
	 */
	public function setting_global_ui() {
		$setting_name = 'eduport_global';
		$setting = get_option( $setting_name );
		?>
			<input type="hidden" name="<?php echo $setting_name ?>" value="0" />
			<input type="checkbox" id="<?php echo $setting_name ?>" name="<?php echo $setting_name ?>" <?php checked( $setting, true ); ?>  value="1" />
			<label for="<?php echo $setting_name ?>">
				<?php _e( 'Show eduPort flyout everywhere', 'eduport-flyout' ); ?>
			</label>
			<p class="description"><?php
				_e( 'Uncheck this if you want to show the eduPort flyout only on specific posts or pages.', 'eduport-flyout' );
			?></p>
		<?php
	}
	

	/**
	 * Sanitize value of setting_1
	 *
	 * @return string sanitized value
	 */
	function sanitize_username( $value ) {	
		// do sanitation here!
		return $value;
	}
}

EduportSettings::instance();
endif;
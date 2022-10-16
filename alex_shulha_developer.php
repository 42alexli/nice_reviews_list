<?php
/**
 * Plugin Name:       Alex Shulha Developer
 * Plugin URI:        https://github.com/42alexli/nice_reviews_list/blob/main/alex_shulha_developer.php
 * Description:       Plugin
 * Version:           1.0
 * Requires at least: 6.0.2
 * Requires PHP:      7.4
 * Author:            Alex Shulha
 * Author URI:        https://github.com/42alexli/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       alexshdev
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * AlexShulhaDeveloper Class
 */
class AlexShulhaDeveloper {
	public function __construct() {

		/** Cling to the hook admin_menu with function alexshdev_show_nav_item to add admin bar menu item */
		add_action( 'admin_menu', [ $this, 'alexshdev_show_nav_item' ] );

		/** Cling to the hook wp_enqueue_scripts with function alexshdev_register_scripts to add custom style files */
		add_action( 'wp_enqueue_scripts', [ $this, 'alexshdev_register_scripts' ] );

		/** Adding a shortcode nicelist to use reviews list anywhere in wordpress */
		add_shortcode( 'nicelist', [ $this, 'alexshdev_shortcode_creator' ] );

		/** Adding reviews list after tag body on home page */
		add_action( 'wp_body_open', [ $this, 'alexshdev_show_after_body' ] );
	}
	/**
	 * Adding admin bar menu item ASD Info for plugin options or information.
	 **/
	public function alexshdev_show_nav_item():void
	{
		add_menu_page(
			esc_html__( 'Alex Shulha Developer', 'alexshdev' ),
			esc_html__( 'ASD Info', 'alexshdev' ),
			'manage_options',
			'alexshdev-options',
			[ $this, 'alexshdev_show_content' ],
			'dashicons-admin-generic',
			3,
		);
	}
	/**
	 * Function add content to admin bar menu item ASD Info
	 **/
	public function alexshdev_show_content():void
	{
		echo '<p>For example I have inserted review list right after the body tag on home page, this is not an elegant solution, this is done for quick access for you</p>
		 <p>Use shortcode to show reviews on the page</p><p><b>[nicelist]</b></p>';
	}
	/**
	 * Adding styles and bootstrap.
	 **/
	public function alexshdev_register_scripts():void
	{
		wp_enqueue_style( 'alexshdev-styles', plugins_url( '/assets/css/style.css', __FILE__ ) );
		wp_enqueue_style( 'bootstrap', plugins_url( '/assets/css/bootstrap.min.css', __FILE__ ) );
	}

	/**
	 * Adding method to get data from JSON file or from URL which return JSON.
	 * I wasn't sure how I was supposed to mock the API request.
	 * So I decided to use file_get_contents which allows you to get the file by URL
	 * @return array
	 */
	public function get_data():array {

		$ourData = json_decode( file_get_contents( __DIR__ . '/data.json' ) );
		$data = $ourData->toplists->{575};
		//Sorting by key position
		usort( $data, function ( $item1, $item2 ) {
			return $item1->position <=> $item2->position;
		} );

		return $data;
	}
	/**
	 * Function rendered html with data from JSON.
	 * I used require_once function to made code readability
	 **/
	public function alexshdev_shortcode_creator():void
	{
		require_once( 'html.php' );
	}
	/**
	 * Function rendered html with data from JSON.
	 * I used require_once function to made code readability
	 **/
	public function alexshdev_show_after_body():void
	{
		if ( is_home() ) {
			require_once( 'html.php' );
		}
	}

	/**
	 * Function activation is standard function of plugin there I used flush_rewrite_rules for recreate rewrite rule
	 * This is more commonly used when using custom post type
	 **/
	static function activation():void
	{
		flush_rewrite_rules();
	}

	/**
	 * Function deactivation is standard function of plugin there I used flush_rewrite_rules for recreate rewrite rule
	 * This is more commonly used when using custom post type
	 **/
	static function deactivation():void
	{
		flush_rewrite_rules();
	}

}

/**
 * Checking if class exists to create a new instance of class
 * And set the activation and deactivation hooks for a plugin
 **/
if ( class_exists( 'AlexShulhaDeveloper' ) ) {
	$alexshdev = new AlexShulhaDeveloper();
	register_activation_hook( __FILE__, array( $alexshdev, 'activation' ) );
	register_deactivation_hook( __FILE__, array( $alexshdev, 'deactivation' ) );
}

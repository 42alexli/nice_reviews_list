<?php
/**
 * Plugin Name:       Alex Shulha Developer
 * Plugin URI:        https://github.com/42alexli/nice_reviews_list/blob/main/alex_shulha_developer.php
 * Description:       Plugin
 * Version:           1.0
 * Requires at least: 6.0.2
 * Requires PHP:      7.2
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
}
if ( class_exists( 'AlexShulhaDeveloper' ) ) {
$alexshdev = new AlexShulhaDeveloper();
}

<?php
/**
 * Plugin Name:       Alex Shulha Developer
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Plugin
 * Version:           1.0
 * Requires at least: 6.0.2
 * Requires PHP:      7.2
 * Author:            Alex Shulha
 * Author URI:        https://author.example.com/
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
}
if ( class_exists( 'AlexShulhaDeveloper' ) ) {
	$alexshdev = new AlexShulhaDeveloper();
}

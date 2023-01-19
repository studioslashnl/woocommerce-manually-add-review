<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://studioslash.nl
 * @since             1.0.0
 * @package           Woocommerce_Manually_Add_Review
 *
 * @wordpress-plugin
 * Plugin Name:       WooCommerce Manually Add Review
 * Plugin URI:        https://studioslash.nl/plugins/woocommerce-manually-add-review
 * Description:       Adds ad admin page to manually add reviews to WooCommerce products.
 * Version:           1.0.0
 * Author:            Studio Slash
 * Author URI:        https://studioslash.nl
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woocommerce-manually-add-review
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WOOCOMMERCE_MANUALLY_ADD_REVIEW_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woocommerce-manually-add-review-activator.php
 */
function activate_woocommerce_manually_add_review() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-manually-add-review-activator.php';
	Woocommerce_Manually_Add_Review_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woocommerce-manually-add-review-deactivator.php
 */
function deactivate_woocommerce_manually_add_review() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-manually-add-review-deactivator.php';
	Woocommerce_Manually_Add_Review_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woocommerce_manually_add_review' );
register_deactivation_hook( __FILE__, 'deactivate_woocommerce_manually_add_review' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-manually-add-review.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woocommerce_manually_add_review() {

	$plugin = new Woocommerce_Manually_Add_Review();
	$plugin->run();

}
run_woocommerce_manually_add_review();

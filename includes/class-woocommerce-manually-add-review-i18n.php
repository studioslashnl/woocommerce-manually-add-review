<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://studioslash.nl
 * @since      1.0.0
 *
 * @package    Woocommerce_Manually_Add_Review
 * @subpackage Woocommerce_Manually_Add_Review/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Woocommerce_Manually_Add_Review
 * @subpackage Woocommerce_Manually_Add_Review/includes
 * @author     Studio Slash <joris@studioslash.nl>
 */
class Woocommerce_Manually_Add_Review_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'woocommerce-manually-add-review',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

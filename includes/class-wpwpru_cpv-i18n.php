<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://windowspros.ru
 * @since      1.0.0
 *
 * @package    Wpwpru_cpv
 * @subpackage Wpwpru_cpv/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wpwpru_cpv
 * @subpackage Wpwpru_cpv/includes
 * @author     Sam Tyurenkov <sam.tyurenkov@gmail.com>
 */
class Wpwpru_cpv_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wpwpru_cpv',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

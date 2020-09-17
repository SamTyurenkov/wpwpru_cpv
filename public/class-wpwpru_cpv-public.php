<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://windowspros.ru
 * @since      1.0.0
 *
 * @package    Wpwpru_cpv
 * @subpackage Wpwpru_cpv/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wpwpru_cpv
 * @subpackage Wpwpru_cpv/public
 * @author     Sam Tyurenkov <sam.tyurenkov@gmail.com>
 */
class Wpwpru_cpv_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpwpru_cpv_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpwpru_cpv_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_register_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpwpru_cpv-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpwpru_cpv_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpwpru_cpv_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	 wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpwpru_cpv-public.js', array( 'jquery' ), $this->version, false );

	 if(is_single() == false) return;
 
	 $nonce = wp_create_nonce( "_wpwpru-cpv" );
	 $ajax_url = admin_url( 'admin-ajax.php' );
	 $postid = get_the_ID();

	
		wp_enqueue_script( $this->plugin_name );
		wp_localize_script( $this->plugin_name, 'wpwpru_cpv_ajax_object', 
		  	array( 
				'ajax_url' => $ajax_url,
				'nonce'=> $nonce,
				'postid' => $postid
			) 
		  );
	}

	public function wpwpru_cpv_shortcode( $attributes ) {

        wp_enqueue_style( $this->plugin_name );

		ob_start();
		wpwpru_cpv_get_template_part('/public/partials/wpwpru_cpv-public-display');
		return ob_get_clean();  

    }

	public function register_shortcodes() {
		add_shortcode( 'wpwpru_cpv', array( $this, 'wpwpru_cpv_shortcode') );

	}

}

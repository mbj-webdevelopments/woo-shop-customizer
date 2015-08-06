<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://localleadminer.com/
 * @since      1.0.0
 *
 * @package    Woocommerce_Shop_Customizer
 * @subpackage Woocommerce_Shop_Customizer/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Woocommerce_Shop_Customizer
 * @subpackage Woocommerce_Shop_Customizer/includes
 * @author     mbj-webdevelopment <mbjwebdevelopment@gmail.com>
 */
class Woocommerce_Shop_Customizer {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Woocommerce_Shop_Customizer_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'woocommerce-shop-customizer';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Woocommerce_Shop_Customizer_Loader. Orchestrates the hooks of the plugin.
	 * - Woocommerce_Shop_Customizer_i18n. Defines internationalization functionality.
	 * - Woocommerce_Shop_Customizer_Admin. Defines all hooks for the admin area.
	 * - Woocommerce_Shop_Customizer_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-woocommerce-shop-customizer-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-woocommerce-shop-customizer-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-woocommerce-shop-customizer-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-woocommerce-shop-customizer-public.php';

		$this->loader = new Woocommerce_Shop_Customizer_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Woocommerce_Shop_Customizer_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Woocommerce_Shop_Customizer_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_name() );

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Woocommerce_Shop_Customizer_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
                $this->loader->add_action( 'admin_init', $plugin_admin, 'register_myoptions' );
                $this->loader->add_action( 'admin_menu', $plugin_admin, 'clivern_plugin_render_options_page' );
                $this->loader->add_filter( 'loop_shop_columns', $plugin_admin, 'loop_shop_columns_own', 10, 1 );              
                $this->loader->add_action( 'template_redirect', $plugin_admin, 'add_product_to_cart' );
                $this->loader->add_filter( 'woocommerce_product_tabs', $plugin_admin, 'woo_remove_product_tabs', 98 );
                $this->loader->add_filter( 'woocommerce_product_tabs', $plugin_admin, 'woo_reorder_tabs', 98 );
                $this->loader->add_filter( 'woocommerce_product_tabs', $plugin_admin, 'woo_rename_tab', 98);
                $this->loader->add_filter( 'woocommerce_product_tabs', $plugin_admin, 'woo_custom_description_tab', 98 );
                $this->loader->add_action( 'woocommerce_after_shop_loop_item', $plugin_admin, 'prima_custom_shop_item', 5);
                $this->loader->add_action( 'wp', $plugin_admin, 'remove_product_content' );
                $this->loader->add_action( 'pre_get_posts', $plugin_admin, 'custom_pre_get_posts_query' );
                $this->loader->add_action( 'woocommerce_after_order_notes', $plugin_admin, 'my_custom_checkout_field' );
                $this->loader->add_action( 'woocommerce_checkout_process', $plugin_admin, 'my_custom_checkout_field_process');
                $this->loader->add_action( 'woocommerce_checkout_update_order_meta', $plugin_admin, 'my_custom_checkout_field_update_order_meta' );
                $this->loader->add_filter( 'default_checkout_country', $plugin_admin, 'change_default_checkout_country', 10, 2 );
                $this->loader->add_filter( 'default_checkout_state', $plugin_admin, 'change_default_checkout_state',10 ,2 );         
                $this->loader->add_filter( 'woocommerce_product_single_add_to_cart_text', $plugin_admin, 'woo_custom_cart_button_text' );
                $this->loader->add_filter( 'woocommerce_product_add_to_cart_text', $plugin_admin, 'woo_custom_cart_button_text_archive' );
                $this->loader->add_filter( 'woocommerce_coupons_enabled', $plugin_admin, 'hide_coupon_field' );
                
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Woocommerce_Shop_Customizer_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Woocommerce_Shop_Customizer_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}

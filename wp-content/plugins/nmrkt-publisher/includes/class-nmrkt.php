<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 *
 * @link       https://nmrkt.com/
 * @since      1.0.0
 *
 * @package    nmrkt
 * @subpackage nmrkt/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    nmrkt
 * @subpackage nmrkt/includes
 * @author     Kettle <drew@kettle.io>
 */
class NMRKT {

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      NMRKT_Loader    $loader    Maintains and registers all hooks for the plugin.
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
     * Load the dependencies, define the locale, and set the hooks for the Dashboard and
     * the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function __construct() {

        $this->plugin_name = 'nmrkt';
        $this->version = '1.0.0';
        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->nmrkt_custom_post_type();
        $this->nmrkt_media_uploader_tab();
        $this->nmrkt_media_uploader_tab_removal();
        $this->nmrkt_settings_link();
        $this->nmrkt_settings_page();
        $this->nmrkt_plugin_notices();
        $this->nmrkt_ajax();
        $this->nmrkt_image_upload_ajax();
        $this->nmrkt_product_activation_api();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Plugin_Name_Loader. Orchestrates the hooks of the plugin.
     * - Plugin_Name_i18n. Defines internationalization functionality.
     * - Plugin_Name_Admin. Defines all hooks for the dashboard.
     * - Plugin_Name_Public. Defines all hooks for the public side of the site.
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
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-nmrkt-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-nmrkt-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the Dashboard.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-nmrkt-admin.php';


        $this->loader = new NMRKT_Loader();

    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Plugin_Name_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function set_locale() {

        $plugin_i18n = new NMRKT_i18n();
        $plugin_i18n->set_domain( $this->get_plugin_name() );

        $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

    }

    /**
     * Register all of the hooks related to the dashboard functionality
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function define_admin_hooks() {

        $plugin_admin = new NMRKT_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

    }

    /**
     * Register all of the hooks related to the tab in the Media Uploader 
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function nmrkt_media_uploader_tab() {

        if ( get_option('nmrkt_user_status')==='active' ){
            $plugin_admin = new NMRKT_Admin( $this->get_plugin_name(), $this->get_version() );

            $this->loader->add_filter( 'media_upload_tabs', $plugin_admin, 'nmrkt_images_media_tabs' );
            $this->loader->add_action( 'media_upload_nmrkt_images', $plugin_admin, 'nmrkt_images_media_tab_content' );
        }       

    }

    /**
     * Remove NMRKT Media Uploader tab if the custom post type was not selected.
     *
     * @since    1.0.0
     * @access   private
     */
    private function nmrkt_media_uploader_tab_removal(){
        
        //$plugin_admin = new NMRKT_Admin( $this->get_plugin_name(), $this->get_version() );

        //$this->loader->add_filter('media_view_strings', $plugin_admin, 'nmrkt_remove_media_tab');
        //$this->loader->add_filter( 'media_upload_tabs', $plugin_admin, 'nmrkt_remove_media_tab', 2 );

    }

    /**
     * Add the settings link on the plugins page.
     *
     * @since    1.0.0
     * @access   private
     */
    private function nmrkt_settings_link() {

        $plugin_admin = new NMRKT_Admin( $this->get_plugin_name(), $this->get_version() );
        $hook = 'plugin_action_links_nmrkt-wordpress-publisher/nmrkt.php';
        $this->loader->add_filter( $hook, $plugin_admin , 'nmrkt_settings_link_setup' );

    }

    /**
     * Register the hook related to the set up of the Plugin Settings Page
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function nmrkt_settings_page() {

        $plugin_admin = new NMRKT_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'admin_menu', $plugin_admin, 'nmrkt_settings_page_setup' );

    }

    /**
     * Plugin Activation Notice
     *
     * @since    1.0.0
     * @access   private
     */
    private function nmrkt_plugin_notices() {

        $plugin_admin = new NMRKT_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'admin_notices', $plugin_admin, 'nmrkt_notice_user_activation' );        

    }

    /**
     * Function to set up the Custom Post Type of the Plugin
     *
     * @since    1.0.0
     * @access   private
     */
    private function nmrkt_custom_post_type(){
        
        $plugin_admin = new NMRKT_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'init', $plugin_admin, 'nmrkt_custom_post_type_setup' );

    }

    /**
     * Ajax function of the NMRKT Search Inventory
     *
     * @since    1.0.0
     * @access   private
     */
    private function nmrkt_ajax(){
        
        $plugin_admin = new NMRKT_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'wp_ajax_nmrkt_search_inventory', $plugin_admin, 'nmrkt_search_ajax' );
        $this->loader->add_action( 'wp_ajax_nopriv_nmrkt_search_inventory', $plugin_admin, 'nmrkt_search_ajax_nopriv' );

    }

    /**
     * Ajax function of the NMRKT Image Uploader
     *
     * @since    1.0.0
     * @access   private
     */
    private function nmrkt_image_upload_ajax(){

        $plugin_admin = new NMRKT_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'wp_ajax_nmrkt_upload_image', $plugin_admin, 'nmrkt_upload_image_ajax' );
        $this->loader->add_action( 'wp_ajax_nopriv_nmrkt_upload_image', $plugin_admin, 'nmrkt_upload_image_ajax_nopriv' );

    }

    /**
     * Ajax function for activating NMRKT Product
     *
     * @since    1.0.0
     * @access   private
     */
    private function nmrkt_product_activation_api(){

        $plugin_admin = new NMRKT_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'wp_ajax_nmrkt_activate_product', $plugin_admin, 'nmrkt_product_activation' );
        $this->loader->add_action( 'wp_ajax_nopriv_nmrkt_activate_product', $plugin_admin, 'nmrkt_product_activation_nopriv' );
        
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
     * @return    Plugin_Name_Loader    Orchestrates the hooks of the plugin.
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

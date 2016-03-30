<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link       https://nmrkt.com/
 * @since      1.0.0
 *
 * @package    nmrkt
 * @subpackage nmrkt/includes
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    nmrkt
 * @subpackage nmrkt/admin
 * @author     Kettle <drew@kettle.io>
 */
class NMRKT_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $name    The ID of this plugin.
     */
    private $name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * The API of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $api;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @var      string    $name       The name of this plugin.
     * @var      string    $version    The version of this plugin.
     */
    public function __construct( $name, $version ) {

        $this->name = $name;
        $this->version = $version;
        $this->api = 'https://market.nmrkt.com/api';
    }

    /**
     * Register the stylesheets for the Dashboard.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Admin_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Admin_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style( $this->name, plugin_dir_url( __FILE__ ) . 'css/nmrkt-admin.css', array(), $this->version, 'all' );

    }

    /**
     * Register the JavaScript for the dashboard.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Admin_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Admin_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script( $this->name, plugin_dir_url( __FILE__ ) . 'js/nmrkt-admin.js', array( 'jquery' ), $this->version, false );

    }

    /**
     * Register the settings link for the Plugin
     *
     * @since    1.0.0
     */

    public function nmrkt_settings_link_setup($links) {

        $settings_link = '<a href="options-general.php?page=nmrkt-settings">Settings</a>';
        array_unshift($links, $settings_link);
        return $links;

    }

    /**
     * Register the settings page for the Plugin
     *
     * @since    1.0.0
     */

    public function nmrkt_settings_page_setup() {

        $settings_page = add_options_page( // add_menu_page
          __('NMRKT Settings', $this->name ),
          'NMRKT',
          'manage_options',
          'nmrkt-settings',
          array( $this, 'nmrkt_settings_page_content' )
        );

        add_action( "load-{$settings_page}", array( $this, 'nmrkt_load_settings_page') );

    }

    /**
     * Register the custom post type for the Plugin
     *
     * @since    1.0.0
     */

    public function nmrkt_custom_post_type_setup(){
        $settings = get_option( "nmrkt-settings" );

        if(isset($settings['nmrkt_create_post']))
            if($settings['nmrkt_create_post']=='yes'){
                register_post_type( 'nmrkt', 
                    array( 'labels' => array(
                            'name' => __( 'NMRKT Post', 'nmrkt' ), 
                            'singular_name' => __( 'NMRKT Post', 'nmrkt' ), 
                            'all_items' => __( 'All NMRKT Posts', 'nmrkt' ), 
                            'add_new' => __( 'Add New', 'nmrkt' ), 
                            'add_new_item' => __( 'Add New NMRKT Post', 'nmrkt' ), 
                            'edit' => __( 'Edit', 'bonestheme' ), 
                            'edit_item' => __( 'Edit NMRKT Posts', 'nmrkt' ), 
                            'new_item' => __( 'New NMRKT Post', 'nmrkt' ),
                            'view_item' => __( 'View NMRKT Post', 'nmrkt' ), 
                            'search_items' => __( 'Search NMRKT Post', 'nmrkt' ), 
                            'not_found' =>  __( 'Nothing found in the Database.', 'nmrkt' ), 
                            'not_found_in_trash' => __( 'Nothing found in Trash', 'nmrkt' ),
                            'parent_item_colon' => ''
                        ), 
                        'description' => __( 'NMRKT Custom Post Type', 'nmrkt' ), 
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => false,
                        'show_ui' => true,
                        'query_var' => true,
                        'menu_position' => 8, 
                        'rewrite'   => array( 'slug' => 'nmrkt', 'with_front' => false ), 
                        'capability_type' => 'post',
                        'hierarchical' => false,
                        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'comments', 'revisions', 'sticky')
                    ) 
                ); 
            }                       
    }

    /**
     * Route save function settings from Plugin Options Page
     *
     * @since    1.0.0
     */

    public function nmrkt_load_settings_page(){
        
        if(isset($_POST["nmrkt-user-setup-submit"])){
            if ( $_POST["nmrkt-user-setup-submit"] == 'Y' ) {
                check_admin_referer( "nmrkt-user-setup-nonce" );
                
                $user_id    = $_POST['nmrkt_id'];
                $timestamp  = time();
                $secret     = $_POST['nmrkt_secret'];
                $requestKey = sha1($timestamp . $secret);

                $url = $this->api.'/search-all';

                $fields = array(
                    'format' => 'json',
                    'q' => 'shirt',
                    'publisherid' => urlencode($user_id),
                    'time' => urlencode($timestamp),
                    'key' => urlencode($requestKey)
                );

                $fields_string = '';
                foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
                rtrim($fields_string, '&');

                $ch = curl_init();

                curl_setopt($ch,CURLOPT_URL, $url);
                curl_setopt($ch,CURLOPT_POST, count($fields));
                curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

                $result = curl_exec($ch);
                curl_close($ch);

                $json = json_decode($result);

                if(isset($json->error)){
                    $url_parameters = 'api=fail';
                    wp_redirect(admin_url('options-general.php?page=nmrkt-settings&'.$url_parameters));
                    exit;
                } else {
                    $url_parameters = 'api=success';
                    $this->nmrkt_user_form_save_settings();
                    wp_redirect(admin_url('options-general.php?page=nmrkt-settings&'.$url_parameters));
                    exit;
                }
                                
            }
        }

        if(isset($_POST["nmrkt-user-deactivate-submit"])){
            if ( $_POST["nmrkt-user-deactivate-submit"] == 'Y' ) {
                check_admin_referer( "nmrkt-settings-deactivate-nonce" );

                $url_parameters = 'api=deactivate';
                $this->nmrkt_user_form_save_settings();
                wp_redirect(admin_url('options-general.php?page=nmrkt-settings&'.$url_parameters));
                exit;
            }
        }

        if(isset($_POST["nmrkt-settings-submit"])){
            if ( $_POST["nmrkt-settings-submit"] == 'Y' ) {
                check_admin_referer( "nmrkt-settings-nonce" );

                $url_parameters = 'updated=true';
                $this->nmrkt_user_form_save_settings();
                wp_redirect(admin_url('options-general.php?page=nmrkt-settings&'.$url_parameters));
                exit;
            }
        }

    }

    /**
     * Save settings from user activation form
     *
     * @since    1.0.0
     */
    public function nmrkt_user_form_save_settings(){
        global $pagenow;
        $settings = get_option( "nmrkt-settings" );

        // API User Activate
        if(isset($_POST['nmrkt-user-setup-submit']))
        if ( $pagenow == 'options-general.php' && $_GET['page'] == 'nmrkt-settings' && $_POST['nmrkt-user-setup-submit']=='Y' ){ 

            $settings['nmrkt_id']       = $_POST['nmrkt_id'];
            $settings['nmrkt_secret']   = $_POST['nmrkt_secret'];
            
            $updated = update_option( "nmrkt-settings", $settings );
            update_option('nmrkt_user_status', 'active');
        }

        // API User Deactivate
        if(isset($_POST['nmrkt-user-deactivate-submit']))
        if ( $pagenow == 'options-general.php' && $_GET['page'] == 'nmrkt-settings' && $_POST['nmrkt-user-deactivate-submit']=='Y' ){ 

            $settings['nmrkt_id']       = '';
            $settings['nmrkt_secret']   = '';
            
            $updated = update_option( "nmrkt-settings", $settings );
            update_option('nmrkt_user_status', 'deactivated');
        }

        // NMRKT Settings
        if(isset($_POST['nmrkt-settings-submit']))
        if ( $pagenow == 'options-general.php' && $_GET['page'] == 'nmrkt-settings' && $_POST['nmrkt-settings-submit']=='Y' ){ 
            
            $settings['nmrkt_create_post']  = $_POST['nmrkt_create_post'];

            if(isset($_POST['nmrkt_post_types'])){

                $saved_post_types = $_POST['nmrkt_post_types'];

                $args = array(
                   'public'   => true
                );

                $post_types = get_post_types( $args, 'objects' );

                foreach ( $post_types  as $post_type ) {
                    if($post_type->name!='attachment' ){
                        if(!isset($saved_post_types[$post_type->name])){
                            $saved_post_types[$post_type->name] = '0';
                        }
                    }
                }

                $settings['nmrkt_post_types']   = $saved_post_types;

            } else {
                
                $args = array(
                   'public'   => true
                );

                $post_types = get_post_types( $args, 'objects' );
                $saved_post_types = array();

                foreach ( $post_types  as $post_type ) {
                    if($post_type->name!='attachment' ){
                        $saved_post_types[$post_type->name] = '0';
                    }
                }

                $settings['nmrkt_post_types']   = $saved_post_types;

            }
                
            $updated = update_option( "nmrkt-settings", $settings );

        }
    }

    /**
     * Set the content for the settings page for the Plugin
     *
     * @since    1.0.0
     */
    public function nmrkt_settings_page_content(){

        global $pagenow;
        $settings = get_option( "nmrkt-settings" );

        if ( get_option('nmrkt_user_status')!='active' ) {
            include('views/form-activate-user.php');
        } else {
            include('views/form-nmrkt-settings.php');
        }

    }

    /**
     * Register the name of the Media Uploader Tab
     *
     * @since    1.0.0
     */
    public function nmrkt_images_media_tabs($tabs) {

        return array_merge($tabs, array('nmrkt_images' => __('NMRKT Images', $this->name ) ));      

    }

    /**
     * Removing NMRKT Media Uploader tab if post type was not selected.
     *
     * @since    1.0.0
     */
    public function nmrkt_remove_media_tab($tabs){
        /*
        $settings = get_option( "nmrkt-settings" );
        global $pagenow;

        if(isset($settings['nmrkt_post_types'])){
            if (isset($_GET['post'])) {
                $post_type = get_post_type($_GET['post']);
                if ( array_key_exists($post_type, $settings['nmrkt_post_types']) && $settings['nmrkt_post_types'][$post_type]=='1' ){

                    return $tabs;
                    
                }   
            } else if(isset($_GET['post_type'])){
                if ( array_key_exists($_GET['post_type'], $settings['nmrkt_post_types']) && $settings['nmrkt_post_types'][$_GET['post_type']]=='1' ){

                    return $tabs;

                }
            } else if(in_array( $pagenow, array( 'post-new.php' ) )){
                if ( array_key_exists('post', $settings['nmrkt_post_types']) && $settings['nmrkt_post_types']['post']=='1' ){

                    return $tabs;

                }
            }
        }

        unset($tabs['nmrkt_images']);
        return $tabs;
        */

    }

    /**
     * Content of the tab for the Media Uploader
     *
     * @since    1.0.0
     */
    public function nmrkt_images_media_tab_content() {
        include_once('views/nmrkt-search-inventory.php');
    }

    /**
     * Show message if the user has not been set up
     *
     * @since    1.0.0
     */
    public function nmrkt_notice_user_activation(){

        if ( get_option('nmrkt_user_status')!='active' ) {
            echo "<div class='updated'><p>";
            echo __( 'You need to setup your account in the NMRKT Plugin. <a href="options-general.php?page=nmrkt-settings">Click here</a> please.', 'nmrkt' );
            echo "</p></div>";
        }

        if ( !function_exists("curl_init")){
            echo "<div class='error'><p>";
            echo __( "You need to enable CURL in order to use this plugin. Please contact your server admin.", 'nmrkt' );
            echo "</p></div>";
        }

    }

    /**
     * Ajax response for the NMRKT Inventory
     *
     * @since    1.0.0
     */
    public function nmrkt_search_ajax(){
        if ( !isset( $_POST['_wpnonce'] ) || !wp_verify_nonce( $_POST['_wpnonce'], 'nmrkt-search-response' ) )
            wp_send_json_error(__('Your request is not valid.','nmrkt'));

            $settings = get_option( "nmrkt-settings" );

            $user_id    = $settings['nmrkt_id'];
            $timestamp  = time();
            $secret     = $settings['nmrkt_secret'];
            $requestKey = sha1($timestamp . $secret);

            $url = $this->api.'/search-all';

            $search = strip_tags($_POST['nmrkt-search']);

            $fields = array(
                'format' => 'json',
                'q' => urlencode($search),
                'publisherid' => urlencode($user_id),
                'time' => urlencode($timestamp),
                'key' => urlencode($requestKey)
            );

            $fields_string = '';
            foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
            rtrim($fields_string, '&');

            $ch = curl_init();

            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, count($fields));
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

            $result = curl_exec($ch);
            curl_close($ch);

            $json = json_decode($result);

            if(isset($json->error)){
                wp_send_json_error(__('The API response failed, please try again.','nmrkt'));
            }

            $response['success'] = 'true';
            $response['data']    = __('The response was succesful, thanks!','nmrkt');
            $response['count']   = $json->indexTotal;
            $response['results'] = $json->results;

            wp_send_json( $response );
    }

    /**
     * Ajax response for the NMRKT Inventory if user is not registered
     *
     * @since    1.0.0
     */
    public function nmrkt_search_ajax_nopriv(){
        wp_send_json_error( );
    }   

    /**
     * Ajax response for the NMRKT Upload Image
     *
     * @since    1.0.0
     */
    public function nmrkt_upload_image_ajax(){      

        $uploadedfile = $_FILES['file'];
        $upload_overrides = array( 'test_form' => false );
        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
        if ( $movefile ) {
            $wp_filetype = $movefile['type'];
            $filename = $movefile['file'];
            $wp_upload_dir = wp_upload_dir();
            $attachment = array(
                'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
                'post_mime_type' => $wp_filetype,
                'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
                'post_content' => '',
                'post_status' => 'inherit'
            );
            $attach_id = wp_insert_attachment( $attachment, $filename);

            $response['success'] = 'true';
            $response['url']     = $movefile['url'];

            wp_send_json( $response );

        } else {
            wp_send_json_error( );
        }
        
    }

    /**
     * Ajax response for the NMRKT Upload Image if user is not registered
     *
     * @since    1.0.0
     */
    public function nmrkt_upload_image_ajax_nopriv(){
        wp_send_json_error( );
    }   

    /**
     * Ajax response for  NMRKT Product Activation
     *
     * @since    1.0.0
     */
    public function nmrkt_product_activation(){     

        if ( !isset( $_POST['_wpnonce'] ) || !wp_verify_nonce( $_POST['_wpnonce'], 'nmrkt-search-response' ) )
            wp_send_json_error(__('Your request is not valid.','nmrkt'));

            $settings   = get_option( "nmrkt-settings" );

            $user_id    = $settings['nmrkt_id'];
            $timestamp  = time();
            $secret     = $settings['nmrkt_secret'];
            $requestKey = sha1($timestamp . $secret);
            $productid  = $_POST['productid'];

            $url = $this->api.'/publisher/item-toggle';

            $productid = strip_tags($productid);

            $fields = array(
                'format' => 'json',
                'itemid' => urlencode($productid),
                'publisherid' => urlencode($user_id),
                'time' => urlencode($timestamp),
                'key' => urlencode($requestKey)
            );

            $fields_string = '';
            foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
            rtrim($fields_string, '&');

            $ch = curl_init();

            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, count($fields));
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

            $result = curl_exec($ch);
            curl_close($ch);

            $json = json_decode($result);

            if(isset($json->error)){
                wp_send_json_error(__('The API response failed, please try again.','nmrkt'));
            }

            $response['success'] = 'true';
            $response['active']  = $json->active;

            wp_send_json( $response );
        
    }

    /**
     * Ajax response for the NMRKT Upload Image if user is not registered
     *
     * @since    1.0.0
     */
    public function nmrkt_product_activation_nopriv(){
        wp_send_json_error( );
    }   

}

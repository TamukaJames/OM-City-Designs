<?php
/*
Plugin Name: Premium Addons for Elementor
Description: Premium Addons Plugin Includes 22+ premium widgets for Elementor Page Builder.
Plugin URI: https://premiumaddons.com
Version: 3.3.7
Author: Leap13
Author URI: https://leap13.com/
Text Domain: premium-addons-for-elementor
Domain Path: /languages
License: GNU General Public License v3.0
*/

if ( ! defined('ABSPATH') ) exit; // No access of directly access

// Define Constants
define('PREMIUM_ADDONS_VERSION', '3.3.7');
define('PREMIUM_ADDONS_URL', plugins_url('/', __FILE__));
define('PREMIUM_ADDONS_PATH', plugin_dir_path(__FILE__));
define('PREMIUM_ADDONS_FILE', __FILE__);
define('PREMIUM_ADDONS_BASENAME', plugin_basename(PREMIUM_ADDONS_FILE));
define('PREMIUM_ADDONS_STABLE_VERSION', '3.3.6');

if( ! class_exists('Premium_Addons_Elementor') ) {
    
    /*
    * Intialize and Sets up the plugin
    */
    class Premium_Addons_Elementor {
        
        private static $instance = null;
        
        /**
         * Sets up needed actions/filters for the plug-in to initialize.
         * 
         * @since 1.0.0
         * @access public
         * 
         * @return void
         */
        public function __construct() {
            
            add_action( 'plugins_loaded', array( $this, 'premium_addons_elementor_setup' ) );
            
            add_action( 'elementor/init', array( $this, 'elementor_init' ) );
            
            add_action( 'init', array( $this, 'init_addons' ), -999 );
 
            add_action( 'admin_post_premium_addons_rollback', 'post_premium_addons_rollback' );
            
            register_activation_hook( PREMIUM_ADDONS_FILE, array( $this, 'set_transient' ) );
            
        }
        
        /**
         * Installs translation text domain and checks if Elementor is installed
         * 
         * @since 1.0.0
         * @access public
         * 
         * @return void
         */
        public function premium_addons_elementor_setup() {
            
            $this->load_domain();
            
            $this->init_files(); 
        }
        
        /**
         * Set transient for admin review notice
         * 
         * @since 3.1.7
         * @access public
         * 
         * @return void
         */
        public function set_transient() {
            
            $cache_key = 'premium_notice_' . PREMIUM_ADDONS_VERSION;
            
            $expiration = 3600 * 72;
            
            set_transient( $cache_key, true, $expiration );
        }
        
        
        /**
         * Require initial necessary files
         * 
         * @since 2.6.8
         * @access public
         * 
         * @return void
         */
        public function init_files() {
            
            if ( is_admin() ) {
                
                require_once ( PREMIUM_ADDONS_PATH . 'includes/system-info.php');
                require_once ( PREMIUM_ADDONS_PATH . 'includes/maintenance.php');
                require_once ( PREMIUM_ADDONS_PATH . 'includes/rollback.php');
                require_once ( PREMIUM_ADDONS_PATH . 'includes/class-beta-testers.php');
                require_once ( PREMIUM_ADDONS_PATH . 'plugin.php');
                require_once ( PREMIUM_ADDONS_PATH . 'admin/includes/notices.php' );
                require_once ( PREMIUM_ADDONS_PATH . 'admin/settings/about.php');
                require_once ( PREMIUM_ADDONS_PATH . 'admin/settings/version-control.php');
                require_once ( PREMIUM_ADDONS_PATH . 'admin/settings/sys-info.php');
                require_once ( PREMIUM_ADDONS_PATH . 'admin/settings/gopro.php');
                $beta_testers = new Premium_Beta_Testers();
                
            }
    
            require_once ( PREMIUM_ADDONS_PATH . 'includes/class-helper-functions.php' );
            require_once ( PREMIUM_ADDONS_PATH . 'admin/settings/maps.php' );
            require_once ( PREMIUM_ADDONS_PATH . 'admin/settings/elements.php' );
            require_once ( PREMIUM_ADDONS_PATH . 'includes/elementor-helper.php' );
            
        }
        
        /**
         * Load plugin translated strings using text domain
         * 
         * @since 2.6.8
         * @access public
         * 
         * @return void
         */
        public function load_domain() {
            
            load_plugin_textdomain( 'premium-addons-for-elementor' );
            
        }
        
        /**
         * Elementor Init
         * 
         * @since 2.6.8
         * @access public
         * 
         * @return void
         */
        public function elementor_init() {
            
            require_once ( PREMIUM_ADDONS_PATH . 'includes/compatibility/class-premium-addons-wpml.php' );
            
            require_once ( PREMIUM_ADDONS_PATH . 'includes/class-addons-category.php' );
            
            
        }
        
        /**
         * Load required file for addons integration
         * 
         * @since 2.6.8
         * @access public
         * 
         * @return void
         */
        public function init_addons() {
            require_once ( PREMIUM_ADDONS_PATH . 'includes/class-addons-integration.php' );
        }
        
        /**
         * Creates and returns an instance of the class
         * 
         * @since 2.6.8
         * @access public
         * 
         * @return object
         */
        public static function get_instance() {
            if( self::$instance == null ) {
                self::$instance = new self;
            }
            return self::$instance;
        }
    
    }
}

if ( ! function_exists( 'premium_addons' ) ) {
    
	/**
	 * Returns an instance of the plugin class.
	 * @since  1.0.0
	 * @return object
	 */
	function premium_addons() {
		return Premium_Addons_Elementor::get_instance();
	}
}

premium_addons();
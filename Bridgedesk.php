<?php
/**
 * @package: Bridgedesk
 */
/**
Plugin name:  BridgeDesk
Plugin URI:
Description: BridgeDesk is your comprehensive support hub tailored specifically for WordPress plugin users. With BridgeDesk, users can seamlessly access expert assistance, troubleshooting guidance, and solutions for any plugin-related issues they encounter.
Version: 0.0.1
Author: Jeffrey Morales
Author URI: https://github.com/jeffmorales29
License : GPLv2 or Later
 */


 if (! defined('ABSPATH') ){
    die;
 }

 if(!class_exists ('BridgeDesk')){

    class BridgeDesk {
		
        public $plugin;

		  function __construct() {
		  $this->plugin = plugin_basename( __FILE__ );
		  }

        function register() {
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));
            add_action('admin_menu', array($this, 'add_admin_pages'));
            add_filter("plugin_action_links_$this->plugin", array($this,'settings_link'));
        }

        public function settings_link($links){
         //add custom setting
			$settings_link = '<a href="admin.php?page=bridgedesk_plugin">Settings</a>';
			array_push( $links, $settings_link );
			return $links;
        }

        public function add_admin_pages() {
            add_menu_page('Bridgedesk Plugin', 'Bridgedesk', 'manage_options', 'bridgedesk_plugin', array($this, 'admin_index'), 'dashicons-id', 110);
        }

        public function admin_index() {
            // Your admin page content here
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

        function uninstall() {
            // Uninstallation logic here
        }

        function custom_post_type() {
            register_post_type('ticket', ['public' => true, 'label' => 'BridgeDesk']);
        }

        function enqueue() {
            // Enqueue scripts and styles
            wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css',__FILE__));
            wp_enqueue_script('mypluginscript', plugins_url('/assets/scripts.js',__FILE__));
        }

        static function activate() {
            require_once plugin_dir_path(__FILE__) . 'inc/bdesk-activate.php';
            bdPluginActivate::activate();
        }

        static function deactivate() {
            require_once plugin_dir_path(__FILE__) . 'inc/bdesk-deactivate.php';
            bdPluginDeactivate::deactivate();
        }
    }

    $bridgedesk = new BridgeDesk();
    $bridgedesk->register();

    // Activation
    register_activation_hook(__FILE__, array('BridgeDesk', 'activate'));

    // Deactivation
    register_deactivation_hook(__FILE__, array('BridgeDesk', 'deactivate'));
}
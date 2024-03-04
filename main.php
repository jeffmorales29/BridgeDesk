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

 class bridgedesk

 {

   function __construct(){
      add_action('init', array( $this, 'custom_post_type') );
   }

   function register(){
      add_action('admin_enqueue_scripts', array($this,'enqueue'));
   }

    function activate(){
      $this->custom_post_type();
      flush_rewrite_rules();
    }

    function deactivate(){

    }

    function uninstall(){

    }

    function custom_post_type(){
      register_post_type( 'ticket', ['public' => true, 'label' => 'BridgeDesk']);
    }

    function enqueue() {
      //enqueue all scripts
      wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css',__FILE__));
      wp_enqueue_script('mypluginscript', plugins_url('/assets/scripts.js',__FILE__));
    }


 }

 if(class_exists ('bridgedesk')){
    $bridgedesk = new bridgedesk();
    $bridgedesk->register();
 }


 //Activation
register_activation_hook( __FILE__, array( $bridgedesk, 'activate' ));

//Deactivation
register_deactivation_hook( __FILE__, array( $bridgedesk, 'deactivate' ));
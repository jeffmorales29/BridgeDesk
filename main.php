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

 class wphelpdesk

 {

   function __construct(){
      add_action('init', array( $this, 'custom_post_type') );
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
      register_post_type( 'ticket', ['public' => true, 'label' => 'Tickets']);
    }


 }

 if(class_exists ('wphelpdesk')){
    $wphelpdesk = new wphelpdesk();
 }


 //Activation
register_activation_hook( __FILE__, array( $wphelpdesk, 'activate' ));

//Deactivation
register_deactivation_hook( __FILE__, array( $wphelpdesk, 'deactivate' ));
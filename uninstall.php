<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @package: wp-helpdesk
 */

 if(!defined('WP_UNINSTAL_PLUGIN')){
    die;
 }

 //Clear Database
//  $tickets = get_posts(array('post_type' => 'ticket','numberposts' => -1 ));
//  foreach( $tickets as $ticket){
//     wp_delete_post($ticket->ID, true);
//  }

//access the database via SQL;
// global $wpdb;
// $wpdb->query("DELETE FROM wp_posts WHERE post_type = 'ticket'");
// $wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN(SELECT id FROM wp_posts)");
// $wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN(SELECT id FROM wp_posts)");
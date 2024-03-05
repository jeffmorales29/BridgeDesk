<?php
/**
 * @package: Bridgedesk
 */

 class bdPluginActivate{
    
    public static function activate(){
        flush_rewrite_rules();
    }
 }
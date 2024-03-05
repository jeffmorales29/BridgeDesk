<?php
/**
 * @package: Bridgedesk
 */

 class bdPluginDeactivate{
    
    public static function deactivate(){
        flush_rewrite_rules();
    }
 }
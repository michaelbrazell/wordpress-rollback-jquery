<?php
/*
Plugin Name: Rollback jQuery
Plugin URI:  https://github.com/michaelbrazell/wordpress-rollback-jquery
Description: This plugin rolls jQuery 1.12.3 (or any other version) back to 1.11.3 from Google CDN.  It should only be used if you have a compatibility error with the latest version of jQuery bundled in Core.
Version:     1.0
Author:      Mike Murray
Author URI:  http://www.worcesterwebgroup.com
License:     MIT
License URI: https://opensource.org/licenses/MIT
*/

if (!is_admin()) add_action("wp_enqueue_scripts", "jquery_rollback", 11);
function jquery_rollback() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") .
        "://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

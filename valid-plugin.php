<?php


/*
Plugin Name: Valid plugin
Plugin URI: https://wordpress.org/plugins/valid-plugin/
Description: Valid plugin allows used to enter the details and that can be checked by the form validation on server side.
Version: 0.1.0
Author: Venkatesh Kadali
Text Domain: Valid-plugin
*/

require(plugin_dir_path(__FILE__).'valid-custom-post-type.php');
require(plugin_dir_path(__FILE__). 'valid-custom-metabox.php');

?>
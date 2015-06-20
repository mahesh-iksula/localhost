<?php
/**
 * Plugin Name: my_second_app
 * Plugin URI: http://my_second_app_Plugin_and_Updates
 * Description: A brief description of the plugin.
 * Version: The plugin's version number. Example: 1.0.0
 * Author: Name of the plugin author
 * Author URI: http://URI_Of_The_Plugin_Author
 * Text Domain: Optional. Plugin's text domain for localization. Example: mytextdomain
 * Domain Path: Optional. Plugin's relative directory path to .mo files. Example: /locale/
 * Network: Optional. Whether the plugin can only be activated network wide. Example: true
 * License: A short license name. Example: GPL2
 */
function url_base_function() {
	return get_bloginfo( "url" );
}
add_shortcode('home_url', 'url_base_function');// use shorcode as [home_url]

function _remove_script_version( $src ){
$parts = explode( '?', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );//remove version no. from script url
//add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );//remove version no. from style url

function add_defer_js_files( $url )
{
    if ( (FALSE === strpos( $url, 'contact-form-7' ) and FALSE === strpos( $url, 'twentyfifteen' ) and FALSE === strpos( $url, 'wp-includes' ) and FALSE === strpos( $url, 'plugins' ) ) or FALSE === strpos( $url, '.js' )
    )
    { // not our file
        return $url;
        
    }
    // Must be a ', not "!
    return "$url' defer='defer";
}
add_filter( 'clean_url', 'add_defer_js_files', 11, 1 );
?>
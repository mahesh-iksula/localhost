<?php
/**
 * Plugin Name: WP Shortcodes
 * Description: To create a custom shortcodes.
 * Version: The plugin's version number. Example: 1.0.0
 * Author: Mahesh V
 * Author URI: http://URI_Of_The_Plugin_Author
 * Text Domain: Optional. Plugin's text domain for localization. Example: mytextdomain
 * Domain Path: Optional. Plugin's relative directory path to .mo files. Example: /locale/
 * Network: Optional. Whether the plugin can only be activated network wide. Example: true
 * License: A short license name. Example: GPL2
 */
 ?>
<?php 
add_action('admin_menu', 'add_settings_menu'); 
function add_settings_menu(){ 

	$page_title = "WP Shortcodes";
	$menu_title = "WP Shortcodes";
	$capability = "manage_options";
	$menu_slug = "wp-shortcodes/wp-shortcodes.php";

	


	add_submenu_page( 'options-general.php', $page_title, $menu_title, $capability, $menu_slug, 'my_test');

	 }


	 function my_test(){

	 	url_base_function();
	 } 
	 
	function url_base_function() {
 		return get_bloginfo( "url" );
	}
	add_shortcode('home_url', 'url_base_function');
?>
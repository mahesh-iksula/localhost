<?php
/**
* Plugin Name: Save Form Data.
* Plugin URI: http://save_form_data
* Description: Simple Admin form to save data
* Version: 1.0.0
* Author: Mahesh Patil
* Author URI: http://mahesh_kp.com
*/
?>
<?php
add_shortcode('home_product_logo_info', 'home_product_logo');

function home_product_logo($atts,$content=null) {

	extract( shortcode_atts( array(
        'category_name' => '',
    ), $atts ) );
    $con = '';
    echo $category_name;
	$ticker = 0;
	$ticker1 = 1;
	$all_cats = get_terms("$category_name",'hide_empty=0');
	$total_cats = count($all_cats);
	
?>
<div class="container">
	<div class="nav" style="display:none;">
    	<?php foreach ($all_cats as $cat) : ?>
		    <?php if ($ticker == 0): ?>
		      <div class="tab <?php if ($ticker1 == 1){echo 'active';}?>"><a class="tab_link" id="tab_<?php echo $ticker1; ?>" href="#content<?php echo $ticker1; ?>" rel="<?php echo $ticker1; ?>">Content <?php echo $ticker1; ?></a></div>
		    <?php else: ?>
		    <div class="tab"><a class="tab_link" id="tab_<?php echo $ticker1; ?>" href="#content<?php echo $ticker1; ?>" rel="<?php echo $ticker1; ?>">Content <?php echo $ticker1; ?></a></div>
		    <?php endif; ?>
		    <?php $ticker++;$ticker1++; ?>
		<?php endforeach; ?>
  	</div>
	<div class="previous"><a href="#">Prev</a></div>
	<div class="next"><a href="#">Next</a></div>
	<div class="main">
		<div class="main_inner">
			<?php $ticker1 = 0; ?>
			<?php foreach ($all_cats as $cat) : ?>
			   <div class="content" id="content<?php echo $ticker1;?>">
				   	<a href="<?php echo get_term_link($cat->slug, 'product_category'); ?>">
					<img width="150" src="<?php echo z_taxonomy_image_url($cat->term_id,'full'); ?>" title="View All Products in <?php echo $cat->name; ?>" />
					</a>
			   </div>
			<?php $ticker1++;
			endforeach; ?>
	    </div>
	</div>
</div>
<?php }
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles_js' );

/**
 * Register style sheet.
 */
function register_plugin_styles_js() {
	wp_register_style( 'save-form', plugins_url( 'save-form/css/style.css' ) );
	wp_enqueue_style( 'save-form' );
	wp_register_script( 'save-form', plugins_url( 'js/script.js', __FILE__ ) );
	 wp_enqueue_script( 'save-form' );
}
add_action( 'admin_menu', 'save_form_menu' );
function save_form_menu() {
    add_options_page( 'Save Form Data Plugin Options', 'Save Data', 'manage_options', 'save-form', 'save_form_plugin_options' );
}
 
function save_form_plugin_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    include __DIR__."/options.php";
    ?>
	<div class="wrap">
	<?php screen_icon(); ?>
	<h2>Welcome To Like FB Plugin Administration Page</h2>

	<fieldset>
	<legend>General Settings</legend>
	<form method="post" action=""> 
	<label>Enter user Name</label>
	<input type="text" name="user_name" value='<?php if($usernm_show != ""){echo "$usernm_show";} ?>'/> &nbsp; 
	<p><input type="submit" value="Save" class="button button-primary" name="submit" /></p>
	</form>
	</fieldset>
	
	</div>

	
	
    <?php


}

?>
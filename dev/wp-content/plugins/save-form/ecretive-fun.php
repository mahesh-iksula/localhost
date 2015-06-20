<?php
require_once dirname( __FILE__ ) . '/framework/Custom-Metaboxes/metabox-functions.php';
require_once dirname( __FILE__ ) . '/framework/post_type.php';
require_once dirname( __FILE__ ) . '/framework/wp_bootstrap_navwalker.php';
require_once dirname( __FILE__ ) . '/framework/sample-config.php';
require_once dirname( __FILE__ ) . '/framework/BFI_Thumb.php';
require_once dirname( __FILE__ ) . '/page-builder/page-builder.php';

$textdomain = 'umbrella';
function umbrella_setup() {
	global $textdomain;
	load_theme_textdomain( $textdomain, get_template_directory() . '/languages' );
	 add_theme_support( 'custom-header' );
	 add_theme_support( 'custom-background');
	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', $textdomain ),
        'one_page'   => __( 'One Page Menu', $textdomain ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );


	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'umbrella_setup' );


if ( ! isset( $content_width ) ) {
	$content_width = 875;
}

function umbrella_widgets_init() {
	global $textdomain;
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', $textdomain ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the left.', $textdomain ),
		'before_widget' => '<aside id="%1$s" class="widget-box %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Pagebuilder area', $textdomain ),
		'id'            => 'pagebuilder-1',
		'description'   => __( 'Use as Page buider element.', $textdomain ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="none">',
		'after_title'   => '</h2>',
	) );

    register_sidebar( array(
        'name'          => __( 'Product Sidebar', $textdomain ),
        'id'            => 'product-sidebar',
        'description'   => __( 'Sidebar that appears on the Product Page.', $textdomain ),
        'before_widget' => '<aside id="%1$s" class="widget-box %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
	
}
add_action( 'widgets_init', 'umbrella_widgets_init' );

function umbrella_scripts() {

	// Load our main stylesheet.
	global $theme_option;
	//Fonts
    if($theme_option!=null && $theme_option['body-font2']['font-family'] != ''){ 
		$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style( 'google-font', "$protocol://fonts.googleapis.com/css?family=".urlencode($theme_option['body-font2']['font-family']).":400,100,100italic,300,300italic,400italic,500,500italic,700,700italic" );
	}
	
	wp_enqueue_style( 'base', get_template_directory_uri().'/css/base.css');
	if($theme_option!=null and $theme_option['opt-select-stylesheet']!=''){

		$layout = $theme_option['opt-select-stylesheet'];
	}else{
		$layout = 'theme-default.css';
	}
	wp_enqueue_style( 'theme-default', get_template_directory_uri().'/css/'.$layout);
	wp_enqueue_style( 'theme-responsive', get_template_directory_uri().'/css/responsive.css');
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), '2014-05-30' );
	wp_enqueue_style( 'color', get_template_directory_uri().'/css/color.php');
	
	
	
	wp_enqueue_script("jquery");
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	
	wp_enqueue_script("base", get_template_directory_uri()."/js/base.js",array(),false,true);
	wp_enqueue_script("map_api", "http://maps.google.com/maps/api/js?sensor=false",array(),false,true);
	wp_enqueue_script("gmap", get_template_directory_uri()."/js/gmap3.min.js",array(),false,true);
	wp_enqueue_script("custom", get_template_directory_uri()."/js/script.js",array(),false,true);
}
add_action( 'wp_enqueue_scripts', 'umbrella_scripts' );

//For IE
function umbrella_script_ie() {
        echo '
			<!--[if lt IE 9]>
			  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
		';
        
    }
add_action( 'wp_head', 'umbrella_script_ie' );

//Get thumbnail url
    
function umbrella_thumbnail_url($size){
    global $post;
    //$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()),$size );
    if($size==''){
        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
         return $url;
    }else{
        $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size);
         return $url[0];
    }
   
}
//pagination
function umbrella_pagination($prev = 'Prev', $next = 'Next', $pages='') {
    global $wp_query, $wp_rewrite, $textdomain;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
		'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
		'format' 		=> '',
		'current' 		=> max( 1, get_query_var('paged') ),
		'total' 		=> $pages,
		'prev_text' => __($prev,$textdomain),
        'next_text' => __($next,$textdomain),
		'type'			=> 'list',
		'end_size'		=> 3,
		'mid_size'		=> 3
);
    $return =  paginate_links( $pagination );
	echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $return );
}

//Custom Excerpt Function
function umbrella_excerpt($limit = 30) {
 
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

//Custom comment List:
function umbrella_theme_comment($comment, $args, $depth) {
	global $textdomain; 
     $GLOBALS['comment'] = $comment; ?>
	 <li <?php comment_class('clearfix'); ?> id="comment-<?php comment_ID() ?>">
		<div class="comment-box">
			<?php echo get_avatar($comment,$size='90',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=90' ); ?>
			<div class="comment-content">
				<h6><?php printf(__('%s','white'), get_comment_author_link()) ?> <span><?php printf(__('%1$s at %2$s',$textdomain), get_comment_date(), get_comment_time()) ?>  |  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span> </h6>
				<?php comment_text() ?>
				<?php if ($comment->comment_approved == '0') : ?>
					 <em><?php _e('Your comment is awaiting moderation.','ipressa') ?></em>
					 <br />
				  <?php endif; ?>
			</div>
		</div>
	
<?php

}

function umbrella_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

//Active Plugin: 
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package       TGM-Plugin-Activation
 * @subpackage Example
 * @version       2.3.6
 * @author       Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author       Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license       http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/framework/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        
      
        array(
            'name'                     => 'Contact Form 7', // The plugin name
            'slug'                     => 'contact-form-7', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),array(
            'name'                     => 'Redux Framework', // The plugin name
            'slug'                     => 'redux-framework', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
        ),array(
            'name'                     => 'Page Builder', // The plugin name
            'slug'                     => 'Page-Builder', // The plugin slug (typically the folder name)
            'required'                 => true, // If false, the plugin is only 'recommended' instead of required
            'source'                   => get_template_directory_uri() . '/framework/plugins/Page-Builder.zip', // The plugin source
        ),array(
            'name'                     => 'Twitter Widget', // The plugin name
            'slug'                     => 'tweets', // The plugin slug (typically the folder name)
            'required'                 => false, // If false, the plugin is only 'recommended' instead of required
            'source'                   => get_template_directory_uri() . '/framework/plugins/tweets.zip', // The plugin source
        )
        
    );

    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'icommerce';

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'               => $theme_text_domain,             // Text domain - likely want to be the same as your theme.
        'default_path'         => '',                             // Default absolute path to pre-packaged plugins
        'parent_menu_slug'     => 'themes.php',                 // Default parent menu slug
        'parent_url_slug'     => 'themes.php',                 // Default parent URL slug
        'menu'                 => 'install-required-plugins',     // Menu slug
        'has_notices'          => true,                           // Show admin notices or not
        'is_automatic'        => false,                           // Automatically activate plugins after installation or not
        'message'             => '',                            // Message to output right before the plugins table
        'strings'              => array(
            'page_title'                                   => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                   => __( 'Install Plugins', $theme_text_domain ),
            'installing'                                   => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                                         => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'                 => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                      => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'                => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'            => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                     => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                         => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                         => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                                   => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                               => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                       => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                             => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                     => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
            'nag_type'                                    => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa( $plugins, $config );

}

function url_base_function() {
	return get_bloginfo( "url" );
}
add_shortcode('home_url', 'url_base_function');

function tmpl_url_function() {
  return get_bloginfo( "template_directory" );
}
add_shortcode('temp_url', 'tmpl_url_function');

function breadcrumbs(){
	echo '<div class="breadcrumbs"><span class="head">You are here : </span>';
	if(function_exists('bcn_display')) { bcn_display(); }
	echo '</div>';
}
add_filter('wp_nav_menu_items','add_search_box', 10, 2);
function add_search_box($items, $args) {

        ob_start();
        get_search_form();
        $searchform = ob_get_contents();
        ob_end_clean();

        $items .= '<li>' . $searchform . '</li>';

    return $items;
    }
function home_product_logo() {

  $cat_img = get_terms('brand');
  // echo "<pre>";
  // print_r($cat_img);
  $cat_count = count($cat_img);

  $flag = 0;
  $flag1 = 1;

  $ticker = 0;
  $ticker1 = 1;
  ?>
  <div class="nav" style="display:none;">

    <?php foreach (get_terms('brand') as $cat) : ?>
    <?php if ($ticker == 0): ?>
      <div class="tab <?php if ($ticker1 == 1){echo 'active';}?>"><a class="tab_link" id="tab_<?php echo $ticker1; ?>" href="#content<?php echo $ticker1; ?>" rel="<?php echo $ticker1; ?>">Content <?php echo $ticker1; ?></a></div>
    <?php endif; ?>
    <?php $ticker++; ?>
    <?php if($ticker == 6){ $ticker = 0; $ticker1++; } ?>
    <?php endforeach; ?>
  </div>


<div class="previous"><a href="#">Prev</a></div>
<div class="next"><a href="#">Next</a></div>
<div class="main_inner">
  <?php foreach (get_terms('brand') as $cat) : ?>
    <?php if($flag == 0): ?>
    <div class="brand-logo" id="content<?php echo $flag1; ?>" >
    <?php endif; ?>

    <a href="<?php echo get_term_link($cat->slug, 'brand'); ?>">
      <img width="150" src="<?php echo z_taxonomy_image_url($cat->term_id,'full'); ?>" title="View All Products in <?php echo $cat->name; ?>" />
    </a>                 
    <?php if($flag == 5): ?>
    </div>
    <?php endif; ?>
    <?php $flag++; ?>
    <?php if($flag == 6){ $flag = 0; $flag1++; } ?>
    <?php endforeach; ?>
  </div>
<?php }
add_shortcode('home_product_logo_info', 'home_product_logo'); 
?>

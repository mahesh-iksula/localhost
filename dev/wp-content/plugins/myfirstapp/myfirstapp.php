<?php  
/**
* Plugin Name: myfirstapp
* Plugin URI: http://myfirstapp.com
* Description: A plugin which create new custop post type called Product
* Version: 1.0.0
* Author: Mahesh Patil
* Author URI: http://maheshkp.com
*/

// hook into the init action and call create_book_taxonomies when it fires
function create_posttype() {
 	register_post_type( 'product',
			// CPT Options
			array(
				'labels' => array(
					'name' => _x( 'Products', 'Post Type General Name', 'twentyfifteen' ),
					'singular_name' => _x( 'Product', 'Post Type Singular Name', 'twentyfifteen' ),
					'menu_name' => __( 'Products', 'twentyfifteen' ),
					'parent_item_colon'   => __( 'Parent Product', 'twentyfifteen' ),
					'all_items'           => __( 'All Products', 'twentyfifteen' ),
					'view_item'           => __( 'View Product', 'twentyfifteen' ),
					'add_new_item'        => __( 'Add New Product', 'twentyfifteen' ),
					'add_new'             => __( 'Add New Product', 'twentythirteen' ),
					'edit_item'           => __( 'Edit Product', 'twentythirteen' ),
					'update_item'         => __( 'Update Product', 'twentythirteen' ),
					'search_items'        => __( 'Search Product', 'twentythirteen' ),
					'not_found'           => __( 'Not Found', 'twentythirteen' ),
					'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),

				),
			'public' => true,
			'has_archive' => true,
			'show_in_menu' => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'supports' => array('title','editor','thumbnail'),
			)
		);
 }
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

add_action( 'init', 'create_book_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_book_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Product Category', 'taxonomy general name' ),
		'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Product Category' ),
		'all_items'         => __( 'All Product Category' ),
		'parent_item'       => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item'         => __( 'Edit Product Category' ),
		'update_item'       => __( 'Update Product Category' ),
		'add_new_item'      => __( 'Add New Product Category' ),
		'new_item_name'     => __( 'New Product Category Name' ),
		'menu_name'         => __( 'Product Category' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'product_category' ),
	);

	register_taxonomy( 'product_category', array( 'product' ), $args );

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'types', 'taxonomy general name' ),
		'singular_name'              => _x( 'types', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Product Types' ),
		'popular_items'              => __( 'Popular Product Types' ),
		'all_items'                  => __( 'All Product Types' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Product Type' ),
		'update_item'                => __( 'Update Product Type' ),
		'add_new_item'               => __( 'Add New Product Type' ),
		'new_item_name'              => __( 'New Product Type Name' ),
		'separate_items_with_commas' => __( 'Separate Product Type with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Product Type' ),
		'choose_from_most_used'      => __( 'Choose from the most used Product Type' ),
		'not_found'                  => __( 'No Product Type found.' ),
		'menu_name'                  => __( 'Product Type' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'product_type' ),
	);

	register_taxonomy( 'product_type', 'product', $args );
}
?>
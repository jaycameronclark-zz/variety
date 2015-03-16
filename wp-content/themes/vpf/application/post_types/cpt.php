<?php

/**
 * Application: Custom Post Types
 * 
 * 
 * 
 * @package WordPress
 */


/* WTB Pages */
function cpt_products() {
  $labels = array(
    'name' => _x( 'Products', 'Post Type General Name', 'varietypetfoods' ),
    'singular_name' => _x( 'Product', 'Post Type Singular Name', 'varietypetfoods' ),
    'menu_name' => __( 'Products', 'varietypetfoods' ),
    'parent_item_colon'   => __( 'Parent Item:', 'varietypetfoods' ),
    'all_items' => __( 'All Products', 'varietypetfoods' ),
    'view_item' => __( 'View Product', 'varietypetfoods' ),
    'add_new_item'        => __( 'Add New Product', 'varietypetfoods' ),
    'add_new'  => __( 'Add New', 'varietypetfoods' ),
    'edit_item' => __( 'Edit Item', 'varietypetfoods' ),
    'update_item' => __( 'Update Item', 'varietypetfoods' ),
    'search_items'=> __( 'Search Item', 'varietypetfoods' ),
    'not_found' => __( 'Not found', 'varietypetfoods' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'varietypetfoods' ),
  );

  $rewrite = array(
    'slug' => 'pet-food-products', 'with_front' => 'false'
  );

  $args = array(
    'label' => __( 'cpt_products', 'varietypetfoods' ),
    'menu_icon' => 'dashicons-products',
    'description' => __( 'Products', 'varietypetfoods' ),
    'labels' => $labels,
    'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes'),
    'hierarchical' => true,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => false,
    'menu_position' => 25,
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'rewrite' => $rewrite,
    'capability_type' => 'post',
  );
  register_post_type( 'cpt_products', $args );
}

function cpt_products_detail() {
  $labels = array(
    'name' => _x( 'Product Details', 'Product Detail', 'varietypetfoods' ),
    'singular_name' => _x( 'Product', 'Post Type Singular Name', 'varietypetfoods' ),
    'menu_name' => __( 'Product Details', 'varietypetfoods' ),
    'parent_item_colon'   => __( 'Parent Item:', 'varietypetfoods' ),
    'all_items' => __( 'All Product Details', 'varietypetfoods' ),
    'view_item' => __( 'View Product Details', 'varietypetfoods' ),
    'add_new_item'        => __( 'Add New Product Details', 'varietypetfoods' ),
    'add_new'  => __( 'Add New', 'varietypetfoods' ),
    'edit_item' => __( 'Edit Item', 'varietypetfoods' ),
    'update_item' => __( 'Update Item', 'varietypetfoods' ),
    'search_items'=> __( 'Search Item', 'varietypetfoods' ),
    'not_found' => __( 'Not found', 'varietypetfoods' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'varietypetfoods' ),
  );

  $rewrite = array(
    'slug' => 'pet-food-product-details', 'with_front' => 'false'
  );

  $args = array(
    'label' => __( 'cpt_products_detail', 'varietypetfoods' ),
    'menu_icon' => 'dashicons-products',
    'description' => __( 'Variety Pet Foods Product Detail', 'varietypetfoods' ),
    'labels' => $labels,
    'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes'),
    'taxonomies' => array('products_tax'),
    'hierarchical' => true,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => false,
    'menu_position' => 25,
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'rewrite' => $rewrite,
    'capability_type' => 'post',
    'query_var' => true
  );
  register_post_type( 'cpt_products_detail', $args );
}


/* WTB Pages */
function cpt_where_to_buy() {
  $labels = array(
    'name' => _x( 'WTB Pages', 'Post Type General Name', 'varietypetfoods' ),
    'singular_name' => _x( 'WTB Page', 'Post Type Singular Name', 'varietypetfoods' ),
    'menu_name' => __( 'WTB Pages', 'varietypetfoods' ),
    'parent_item_colon'   => __( 'Parent Item:', 'varietypetfoods' ),
    'all_items' => __( 'All WTB Pages', 'varietypetfoods' ),
    'view_item' => __( 'View WTB Page', 'varietypetfoods' ),
    'add_new_item'        => __( 'Add New WTB Page', 'varietypetfoods' ),
    'add_new'  => __( 'Add New', 'varietypetfoods' ),
    'edit_item' => __( 'Edit Item', 'varietypetfoods' ),
    'update_item' => __( 'Update Item', 'varietypetfoods' ),
    'search_items'=> __( 'Search Item', 'varietypetfoods' ),
    'not_found' => __( 'Not found', 'varietypetfoods' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'varietypetfoods' ),
  );
  $rewrite = array(
    'slug' => 'where-to-buy', 'with_front' => 'false'
  );
  $args = array(
    'label' => __( 'cpt_where_to_buy', 'varietypetfoods' ),
    'menu_icon' => 'dashicons-cart',
    'description' => __( 'Variety Pet Foods WTB Pages', 'varietypetfoods' ),
    'labels' => $labels,
    'supports' => array( 'title', 'editor', 'thumbnail', 'revisions'),
    'hierarchical' => true,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_admin_bar' => false,
    'menu_position' => 25,
    'can_export' => true,
    'has_archive' => true,
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'rewrite' => $rewrite,
    'capability_type' => 'post',
  );
  register_post_type( 'cpt_where_to_buy', $args );
}

/* Register Custom Post Types */
add_action( 'init', 'cpt_products', 0);
add_action( 'init', 'cpt_products_detail', 0);
add_action( 'init', 'cpt_where_to_buy', 0);
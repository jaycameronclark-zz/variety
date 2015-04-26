<?php
/**
 * Application: Custom Taxonomies
 * 
 * 
 * 
 * @package WordPress
 */


/* Products */
function custom_products_taxonomy() {
  $labels = array(
    'name' => _x('Categories', ''),
    'singular_name' => _x('Category', ''),
    'search_items' => __('Categories'),
    'all_items' => __('All Categories'),
    'parent_item' => __('Parent Category'),
    'parent_item_colon' => __('Parent Category:'),
    'edit_item' => __('Edit Category'),
    'update_item' => __('Update Category'),
    'add_new_item' => __('Add New Category'),
    'new_item_name' => __('New Category Name'),
    'menu_name' => __('Categories')
  );
  $rewrite = array(
    'slug' => 'products-category',
    'with_front' => true,
    'hierarchical' => false,
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
  );
  register_taxonomy( 'products_tax', array( 'cpt_products_detail' ), $args );
}

add_action( 'init', 'custom_products_taxonomy', 0 );
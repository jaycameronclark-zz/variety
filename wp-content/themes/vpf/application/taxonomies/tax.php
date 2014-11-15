<?php
/**
 * Application: Custom Taxonomies
 * 
 * 
 * 
 * @package WordPress
 */

// /* Accommodations */
// function custom_accommodations_taxonomy() {
//   $labels = array(
//     'name' => _x('Accommodations Categories', 'taxonomy general name'),
//     'singular_name' => _x('Accommodation Category', 'taxonomy singular name'),
//     'search_items' => __('Accommodations Slide Categories'),
//     'all_items' => __('All Categories'),
//     'parent_item' => __('Parent Accommodation Category'),
//     'parent_item_colon' => __('Parent Accommodation Category:'),
//     'edit_item' => __('Edit Accommodation Category'),
//     'update_item' => __('Update Accommodation Category'),
//     'add_new_item' => __('Add New Accommodation Category'),
//     'new_item_name' => __('New Accommodation Category Name'),
//     'menu_name' => __('Accommodations Categories')
//   );
//   $rewrite = array(
//     'slug' => 'accommodations-category',
//     'with_front' => true,
//     'hierarchical' => false,
//   );
//   $args = array(
//     'labels' => $labels,
//     'hierarchical' => true,
//     'show_ui' => true,
//     'show_admin_column' => true,
//     'query_var' => true,
//   );
//   register_taxonomy( 'accommodation_tax', array( 'cpt_accommodations' ), $args );
// }
// /* Register Taxonomies */
// add_action( 'init', 'custom_slider_taxonomy', 0 );
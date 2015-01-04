<?php

/**
 * Application: Custom Metaboxes
 * Requires: https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
 *
 * @package WordPress
 */

function application_metaboxes( array $meta_boxes ) {

  $prefix = '_cmb_';

  $meta_boxes['vpf_slider_images'] = array(
    'id'         => 'slider_images_metabox',
    'title'      => __( 'Slider Image Settings', 'cmb' ),
    'pages'      => array( 'page' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,

    'fields' => array(
      array(
        'name' => 'Background Image',
        'id'   => 'slideshow_background_image',
        'type' => 'file',
      ),
      array(
        'id'          => $prefix . 'slide_images_static_settings',
        'type'        => 'group',
        'description' => __( 'Settings for Static Images', 'cmb' ),
        'options'     => array(
          'group_title'   => __( 'Static Slide Image {#}', 'cmb' ),
          'add_button'    => __( 'Add Another Slide Static Image', 'cmb' ),
          'remove_button' => __( 'Remove Static Slide Image', 'cmb' ),
          'sortable'      => true
        ),
        'fields' => array(
          array(
            'name' => 'Z-Index',
            'id'   => 'static_z_index',
            'type' => 'text_small',
            'description' => 'Stack order (1-10000)'
          ),
          array(
            'name' => 'Position Top',
            'id'   => 'static_pos_top',
            'type' => 'text_small'
          ),
          array(
            'name' => 'Position Left',
            'id'   => 'static_pos_left',
            'type' => 'text_small'
          ),
          array(
            'name' => 'Position Bottom',
            'id'   => 'static_pos_bottom',
            'type' => 'text_small'
          ),
          array(
            'name' => 'Position Right',
            'id'   => 'static_pos_right',
            'type' => 'text_small'
          ),
          array(
            'name' => 'Static Image',
            'id'   => 'slideshow_static_image',
            'type' => 'file',
          ),
        )
      ),

      array(
        'id'          => $prefix . 'slide_images_group_settings',
        'type'        => 'group',
        'description' => __( 'Settings for Slide Image Groups', 'cmb' ),
        'options'     => array(
          'group_title'   => __( 'Slide Image Group {#}', 'cmb' ),
          'add_button'    => __( 'Add Another Slide Group', 'cmb' ),
          'remove_button' => __( 'Remove Slide Group', 'cmb' ),
          'sortable'      => true
        ),
        'fields' => array(
          array(
            'name' => 'Z-Index',
            'id'   => 'group_z_index',
            'type' => 'text_small',
            'description' => 'Stack order (1-10000)'
          ),
          array(
            'name' => 'Position Top',
            'id'   => 'group_pos_top',
            'type' => 'text_small'
          ),
          array(
            'name' => 'Position Left',
            'id'   => 'group_pos_left',
            'type' => 'text_small'
          ),
          array(
            'name' => 'Position Bottom',
            'id'   => 'group_pos_bottom',
            'type' => 'text_small'
          ),
          array(
            'name' => 'Position Right',
            'id'   => 'group_pos_right',
            'type' => 'text_small'
          ),
          array(
            'name' => 'Images Group',
            'id'   => 'slideshow_group_images',
            'type' => 'file_list',
          ),
        )
      )
    )
  );

  $meta_boxes['vpf_product_details'] = array(
    'id'         => 'vpf_product_details',
    'title'      => __( 'Product Details', 'cmb' ),
    'pages'      => array( 'cpt_products' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,
    'fields'   => array(
      array(
        'name' => __( 'Color Scheme', 'cmb' ),
        'desc' => __( 'Orange or Blue Color Scheme', 'cmb' ),
        'id'   => $prefix . 'product_color_scheme',
        'type' => 'select',
        'options' => array(
          'orange' => __( 'Orange', 'cmb2' ),
          'blue'   => __( 'blue', 'cmb2' )
        )
      ),
      array(
        'name' => __( 'Layout Type', 'cmb' ),
        'desc' => __( 'Single Column w/Sidebar or Two Columns', 'cmb' ),
        'id'   => $prefix . 'product_layout',
        'type' => 'select',
          'options' => array(
            'single_column_sidebar' => __( 'Single Column w/Sidebar', 'cmb2' ),
            'two_column_grid'   => __( 'Two Column', 'cmb2' )
          )
      ),
      array(
        'name' => 'Product Detail Category',
        'desc' => 'Select product detail category',
        'id' => $prefix . 'text_taxonomy_select',
        'taxonomy' => 'category', //Enter Taxonomy Slug
        'type' => 'taxonomy_select',    
      ),
      array(
        'name' => __( 'Sidebar Image', 'cmb' ),
        'desc' => __( 'Background for sidebar content', 'cmb' ),
        'id'   => $prefix . 'sidebar_background',
        'type' => 'file'
      ),
      array(
        'name' => __( 'Product Title Text', 'cmb' ),
        'desc' => __( 'Heading (colored text)', 'cmb' ),
        'id'   => $prefix . 'product_title_text',
        'type' => 'text_medium'
      ),
      array(
        'name' => __( 'Product Title Tagline Text', 'cmb' ),
        'desc' => __( 'Italisized text next to heading', 'cmb' ),
        'id'   => $prefix . 'title_tagline_text',
        'type' => 'text_medium'
      ),
      array(
        'name' => __( 'Product available size text', 'cmb' ),
        'desc' => __( 'Text below main paragraph', 'cmb' ),
        'id'   => $prefix . 'product_available_size_text',
        'type' => 'text_medium'
      ),
      array(
        'name' => __( 'Stick Note Image', 'cmb' ),
        'desc' => __( 'Custom sticky note image', 'cmb' ),
        'id'   => $prefix . 'sticky_note',
        'type' => 'file'
      ),
      array(
        'name' => __( 'USA Flag Text', 'cmb' ),
        'desc' => __( 'Text next to USA flag', 'cmb' ),
        'id'   => $prefix . 'usa_flag_text',
        'type' => 'text_medium'
      ),
      array(
        'name' => __( 'Product Description', 'cmb' ),
        'desc' => __( '', 'cmb' ),
        'id'   => $prefix . 'product_description',
        'type' => 'textarea'
      )
    )
  );

  return $meta_boxes;
}
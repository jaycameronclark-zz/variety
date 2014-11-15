<?php

/**
 * Application: Custom Metaboxes
 * Requires: https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
 *
 * @package WordPress
 */

function application_metaboxes( array $meta_boxes ) {

  $prefix = '_cmb_';

  $meta_boxes['slider_images'] = array(
    'id'         => 'slider_image_metabox',
    'title'      => __( 'Slider Images', 'cmb' ),
    'pages'      => array( 'cpt_slides' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,
    'fields'   => array(
      array(
        'name' => __( 'Add Image', 'cmb' ),
        'desc' => __( 'Upload an image or enter a URL.', 'cmb' ),
        'id'   => $prefix . 'slide_image',
        'type' => 'file'
      ),
      array(
        'name' => __( 'Slide Text Over Image', 'cmb' ),
        'desc' => __( 'HTML allowed', 'cmb' ),
        'id'   => $prefix . 'slide_textarea',
        'type' => 'textarea',
      ),
    )
  );
  $meta_boxes['slider_category'] = array(
    'id'         => 'slider_category_metabox',
    'title'      => __( 'Select Slider', 'cmb' ),
    'pages'      => array( 'page' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,
    'fields'   => array(
      array(
        'name'    => __( 'Slider', 'cmb' ),
        'show_option_none' => false,
        'desc'    => __( 'choose the associate slide category', 'cmb' ),
        'id'      => $prefix . 'slide_cat_select',
        'type'    => 'taxonomy_select',
        'taxonomy' => 'slider_images_tax'
      ),
    )
  );
  $meta_boxes['accommodation_gallery'] = array(
    'id'         => 'accomodations_gallery_upload',
    'title'      => __( 'Accommodation Gallery', 'cmb' ),
    'pages'      => array( 'cpt_accommodations' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,
    'fields'   => array(
      array(
        'name'    => __( 'Gallery Images', 'cmb' ),
        'desc'    => __( '', 'cmb' ),
        'id'      => $prefix . 'accom_gallery',
        'type'    => 'file_list',
        'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
      ),
    )
  );
  $meta_boxes['media_gallery'] = array(
    'id'         => 'media_gallery_metabox',
    'title'      => __( 'Add Media', 'cmb' ),
    'pages'      => array( 'cpt_media_gallery' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,
    'fields'   => array(
      array(
        'name' => __( 'Gallery Image', 'cmb' ),
        'desc' => __( 'Used as a single image or for video thumbnail', 'cmb' ),
        'id'   => $prefix . 'media_gallery_image',
        'type' => 'file',
        'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
      ),
      array(
        'name' => __( 'Video Embed', 'cmb' ),
        'desc' => __( 'Enter a youtube, Vimeo, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'cmb' ),
        'id'   => $prefix . 'media_gallery_video',
        'type' => 'oembed',
      )
    )
  );
  $meta_boxes['front_page_content'] = array(
    'id'         => 'front_page_about_metabox',
    'title'      => __( 'Front Page Content', 'cmb' ),
    'pages'      => array( 'page', ), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'show_on'    => array( 'key' => 'id', 'value' => array( 322, ), ), // Specific post IDs to display this metabox
    'fields'     => array(
      array(
        'name'    => __( 'Front Page Accommodations', 'cmb' ),
        'show_option_none' => true,
        'desc'    => __( 'Choose an accommodations category to feature on front page. This will show one accommodation from the selected category.', 'cmb' ),
        'id'      => $prefix . 'featured_accommodation_cat_select',
        'type'    => 'taxonomy_select',
        'taxonomy' => 'accommodation_tax'
      ),
      array(
        'name' => __( 'Title', 'cmb' ),
        'desc' => __( 'Title for Accommodations', 'cmb' ),
        'id'   => $prefix . 'front_page_accommodations_title',
        'type' => 'text_medium',
      ),
      array(
        'name' => __( 'Accommodations Text', 'cmb' ),
        'desc' => __( 'Appears on home page', 'cmb' ),
        'id'   => $prefix . 'front_page_accommodations_text',
        'type' => 'textarea',
      ),
      array(
        'name' => __( 'Title', 'cmb' ),
        'desc' => __( 'Title for excerpt', 'cmb' ),
        'id'   => $prefix . 'front_page_about_title',
        'type' => 'text_medium',
      ),
      array(
        'name' => __( 'Text', 'cmb' ),
        'desc' => __( 'Appears on home page', 'cmb' ),
        'id'   => $prefix . 'front_page_about_text',
        'type' => 'textarea',
      ),
      array(
        'name' => __( 'Learn More Button URL', 'cmb' ),
        'desc' => __( 'field description (optional)', 'cmb' ),
        'id'   => $prefix . 'front_page_about_url',
        'type' => 'text_url'
      ),
      array(
        'name'    => __( 'Featured Accommodations Gallery', 'cmb' ),
        'desc'    => __( '', 'cmb' ),
        'id'      => $prefix . 'front_page_accom_gallery',
        'type'    => 'file_list',
        'preview_size' => array( 100, 100 )
      )
    )
  );

  $meta_boxes['cart_media_gallery'] = array(
    'id'         => 'media_gallery_metabox',
    'title'      => __( 'Product Details', 'cmb' ),
    'pages'      => array( 'cpt_spa_products' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,
    'fields'   => array(
      array(
        'name' => __( 'Cart URL', 'cmb' ),
        'desc' => __( 'URL to shopping cart', 'cmb' ),
        'id'   => $prefix . 'product_shopping_cart_url',
        'type' => 'text_url'
      ),
      array(
        'name' => __( 'Featured Title', 'cmb' ),
        'desc' => __( 'Overrides default title', 'cmb' ),
        'id'   => $prefix . 'product_featured_title',
        'type' => 'text_medium'
      ),
      array(
        'name' => __( 'Product Price', 'cmb' ),
        'desc' => __( '', 'cmb' ),
        'id'   => $prefix . 'product_price',
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

$meta_boxes['featured_thumb_upload'] = array(
  'id'         => 'featured_thumb_url',
  'title'      => __( 'Featured Thumbnail', 'cmb' ),
  'pages'      => array( 'cpt_accommodations','cpt_spa_features','cpt_activities','cpt_amenities' ),
  'context'    => 'normal',
  'priority'   => 'high',
  'show_names' => true,
  'cmb_styles' => true,
  'fields'   => array(
    array(
      'name' => __( 'Upload Image', 'cmb' ),
      'desc' => __( 'Replaces featured image (232 x 142)', 'cmb' ),
      'id'   => $prefix . 'featured_thumb',
      'type' => 'file'
    )
  )
);

  return $meta_boxes;
}
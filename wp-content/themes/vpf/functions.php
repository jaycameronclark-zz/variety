<?php

/*-------------------------------------------------------------------------------------------*/
/* SCRIPTS */
/*-------------------------------------------------------------------------------------------*/
  function application_header_scripts(){
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
      wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.8.3.min.js', array(), '2.8.3');
      wp_enqueue_script('modernizr');
    }
  }

/*-------------------------------------------------------------------------------------------*/
/* STYLES */
/*-------------------------------------------------------------------------------------------*/
  function application_styles(){
    wp_register_style('application', get_template_directory_uri() . '/assets/build/styles/application.min.css', array(), '1.0', 'all');
    wp_enqueue_style('application');

    wp_register_style('vendor', get_template_directory_uri() . '/assets/build/styles/vendor.min.css', array(), '1.0', 'all');
    wp_enqueue_style('vendor');

    wp_register_style('varietypetfoods', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('varietypetfoods');
  }

/*-------------------------------------------------------------------------------------------*/
/* IMAGES */
/*-------------------------------------------------------------------------------------------*/
  add_theme_support( 'post-thumbnails' );

  // naming conventions of sorts...IDK, Greek Alphabet?
  add_image_size('alpha', 1500, 9999, true);
  add_image_size('beta', 1125, 447, true);
  add_image_size('gamma', 750, 298, true);
  add_image_size('delta', 375, 149, true);
  add_image_size('epsilon', 250, 152, true);

  add_image_size('home_slide', 260, 186, true);

/* Remove hard coded sizes */
  // add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
  // function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
  //   $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  //   return $html;
  // }

/*-------------------------------------------------------------------------------------------*/
/* MENUS */
/*-------------------------------------------------------------------------------------------*/
  register_nav_menus( array(
    'header_primary_nav'   => __( 'Header Primary', 'varietypetfoods' ),
    'footer_primary_nav'   => __( 'Footer Primary', 'varietypetfoods' )
  ) );

/*-------------------------------------------------------------------------------------------*/
/* WIDGETS */
/*-------------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------------------*/
/* MISC HOOKS */
/*-------------------------------------------------------------------------------------------*/

function wp_login_image() {
  echo "
  <style>
  body.login #login h1 a {
    background: url('".get_template_directory_uri() . "/assets/images/logo.gif') top center no-repeat transparent;
  }
  </style>
  ";
}
add_action("login_head", "wp_login_image");

function removeHeadLinks() {
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');

/* Remove Admin Bar */
add_filter('show_admin_bar', '__return_false');

//add shortcodes
add_filter('the_excerpt', 'do_shortcode');
add_filter('widget_text', 'do_shortcode');

add_filter( 'no_texturize_shortcodes', 'shortcodes_to_exempt_from_wptexturize' );
function shortcodes_to_exempt_from_wptexturize($shortcodes){
    $shortcodes[] = 'gallery_sidebar';
    return $shortcodes;
}
//custom excerpt
function new_excerpt_more( $more ) {
  return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('... Learn More &rsaquo;', 'varietypetfoods') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

//Remove hard coded w/h
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

/*-------------------------------------------------------------------------------------------*/
/* SHORTCODES */
/*-------------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------------------*/
/* TAXONOMIES */
/*-------------------------------------------------------------------------------------------*/
require get_template_directory() . '/application/taxonomies/tax.php';

/*-------------------------------------------------------------------------------------------*/
/* CUSTOM POST TYPES */
/*-------------------------------------------------------------------------------------------*/
require get_template_directory() . '/application/post_types/cpt.php';

/*-------------------------------------------------------------------------------------------*/
/* META BOXES */
/*-------------------------------------------------------------------------------------------*/
require get_template_directory() . '/application/meta_boxes/mb.php';

/*-------------------------------------------------------------------------------------------*/
/* ADD ACTIONS / INITIALIZE */
/*-------------------------------------------------------------------------------------------*/

/* Initialize the metabox class */
function cmb_initialize_cmb_meta_boxes() {
  if ( ! class_exists( 'cmb_Meta_Box' ) )
    require_once 'application/cmb/init.php';
}

/* Scripts and Styles */
add_action('init', 'application_header_scripts');
add_action('wp_enqueue_scripts', 'application_styles');

/* Meta Boxes */
add_filter( 'cmb_meta_boxes', 'application_metaboxes' );
add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );


/* Theme Options */
require get_template_directory() . '/application/options.php';

/*-------------------------------------------------------------------------------------------*/
/* CUSTOM FUNCTIONS
/*-------------------------------------------------------------------------------------------*/

function get_vpf_slideshow() {
  global $post;
  $view = $post;
  
  $static = get_post_meta( $view->ID, '_cmb_slide_images_static_settings', true );
  $group = get_post_meta( $view->ID, '_cmb_slide_images_group_settings', true );
  $slideshows = [];
  $slideshows['background'] = get_post_meta( $view->ID, 'slideshow_background_image', true );

  foreach ($static as $item) {
    $temp_static = [
      'z-index' => isset($item['static_z_index']) ? $item['static_z_index'] : '',
      'top'     => isset($item['static_pos_top']) ? $item['static_pos_top'] : '',
      'left'    => isset($item['static_pos_left']) ? $item['static_pos_left'] : '',
      'bottom'  => isset($item['static_pos_bottom']) ? $item['static_pos_bottom'] : '',
      'right'   => isset($item['static_pos_right']) ? $item['static_pos_right'] : '',
      'image'   => isset($item['slideshow_static_image']) ? $item['slideshow_static_image'] : ''
    ];
    $static_images[] = $temp_static;
  }

  foreach ($group as $item){
    $temp_group = [
      'z-index' => isset($item['group_z_index']) ? $item['group_z_index'] : '',
      'speed'   => !empty($item['group_animation_speed']) ? $item['group_animation_speed'] : '2000',
      'delay'   => !empty($item['group_animation_delay']) ? $item['group_animation_delay'] : '200',
      'top'     => isset($item['group_pos_top']) ? $item['group_pos_top'] : '',
      'left'    => isset($item['group_pos_left']) ? $item['group_pos_left'] : '',
      'bottom'  => isset($item['group_pos_bottom']) ? $item['group_pos_bottom'] : '',
      'right'   => isset($item['group_pos_right']) ? $item['group_pos_right'] : '',
      'images'  => isset($item['slideshow_group_images']) ? $item['slideshow_group_images'] : []
    ];
    $group_images[] = $temp_group;
  }

  $slideshows['static_images'] = !empty($static_images) ? $static_images : [];
  $slideshows['group_images'] = !empty($group_images) ? $group_images : [];

  return $slideshows;
}

function get_vpf_wheretobuy_links() {
  global $post;
  $view = $post;
  
  $group = get_post_meta( $view->ID, '_cmb_where_to_buy_links', true );
  $link_groups = [];

  foreach ($group as $item){
    $temp_group = [
      'group_title' => isset($item['wtb_link_group_name']) ? $item['wtb_link_group_name'] : 'No Title',
      'group_links' => !empty($item['_cmb_where_to_buy_links_list']) ? $item['_cmb_where_to_buy_links_list'] : ''
    ];
    $link_groups[] = $temp_group;
  }

  return $link_groups;
}

function vpf_meta ($post_id) {
  $meta = get_post_meta($post_id);
  if (!empty($meta)) {
      foreach ($meta as $key => $value) {
          $meta[ $key ] = ( isset( $value[0] ) && count( $value ) == 1 ) ? $value[0] : $value;
      }
  } else {
      $meta = [];
  }
  return $meta;
}

function get_product_details() {
  global $post;

  $finalized = [];

  $post_meta = vpf_meta($post->ID);

  $cat_id = @unserialize($post_meta['_cmb_product_detail_category']);

  $args = [
    'posts_per_page' => -1,
    'post_type' => 'cpt_products_detail',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'category' => [$cat_id]
  ];

  $products = query_posts($args);

  foreach($products as $product) {
    $product_meta = vpf_meta($product->ID);
    $image = wp_get_attachment_image( get_post_meta( $product->ID, '_cmb_product_featured_image', 1 ), '' );
    $small_image = wp_get_attachment_image( get_post_meta( $product->ID, '_cmb_product_small_description_image', 1 ), '' );
    
    $temp = [
      'title' => !empty($product_meta['_cmb_product_detail_title']) ? $product_meta['_cmb_product_detail_title'] : $product->post_title,
      'sub_title' => !empty($product_meta['_cmb_product_subtitle']) ? $product_meta['_cmb_product_subtitle'] : '',
      'color_scheme' => !empty($product_meta['_cmb_product_detail_color_scheme']) ? $product_meta['_cmb_product_detail_color_scheme'] : '',
      'small_description' => !empty($product_meta['_cmb_product_small_description']) ? $product_meta['_cmb_product_small_description'] : '',
      'small_description_image' => !empty($product_meta['_cmb_product_small_description_image']) ? $product_meta['_cmb_product_small_description_image'] : '',
      'main_description' => !empty($product_meta['_cmb_product_main_description']) ? $product_meta['_cmb_product_main_description'] : '',
      'natural_text' => !empty($product_meta['_cmb_product_natural_text']) ? $product_meta['_cmb_product_natural_text'] : '',
      'featured_image' => !empty($product_meta['_cmb_product_featured_image']) ? $product_meta['_cmb_product_featured_image'] : '',
      'ingredients' => !empty($product_meta['_cmb_product_ingredients']) ? $product_meta['_cmb_product_ingredients'] : '',
      'link' => get_permalink($product->ID),
      'id' => $product->ID
    ];

    $finalized[] = $temp;
  
  }

  return $finalized;

}

function get_single_product_details($requested) {

  $finalized = [];
  $product_meta = vpf_meta($requested);
  $product = get_post($requested);

  $image = wp_get_attachment_image( get_post_meta( $product->ID, '_cmb_product_featured_image', 1 ), '' );
  
  $temp = [
    'title' => !empty($product_meta['_cmb_product_detail_title']) ? $product_meta['_cmb_product_detail_title'] : $product->post_title,
    'sub_title' => !empty($product_meta['_cmb_product_subtitle']) ? $product_meta['_cmb_product_subtitle'] : '',
    'color_scheme' => !empty($product_meta['_cmb_product_detail_color_scheme']) ? $product_meta['_cmb_product_detail_color_scheme'] : '',
    'small_description' => !empty($product_meta['_cmb_product_small_description']) ? $product_meta['_cmb_product_small_description'] : '',
    'main_description' => !empty($product_meta['_cmb_product_main_description']) ? $product_meta['_cmb_product_main_description'] : '',
    'natural_text' => !empty($product_meta['_cmb_product_natural_text']) ? $product_meta['_cmb_product_natural_text'] : '',
    'featured_image' => !empty($product_meta['_cmb_product_featured_image']) ? $product_meta['_cmb_product_featured_image'] : '',
    'ingredients' => !empty($product_meta['_cmb_product_ingredients']) ? $product_meta['_cmb_product_ingredients'] : '',
    'feeding_guide' => !empty($product_meta['_cmb_product_feeding_guide']) ? $product_meta['_cmb_product_feeding_guide'] : '',
    'product_guaranteed_analysis' => !empty($product_meta['_cmb_product_guaranteed_analysis']) ? $product_meta['_cmb_product_guaranteed_analysis'] : '',
    'product_calorie_content_one' => !empty($product_meta['_cmb_product_calorie_content_one']) ? $product_meta['_cmb_product_calorie_content_one'] : '',
    'product_calorie_content_two' => !empty($product_meta['_cmb_product_calorie_content_two']) ? $product_meta['_cmb_product_calorie_content_two'] : '',
    'link' => get_permalink($product->ID)
  ];

  $finalized[] = $temp;
 
  return $finalized;

}

function get_ingredients() {
    global $post;

    $finalized = [];

    $post_meta = vpf_meta($post->ID);

    $cat_id = @unserialize($post_meta['_cmb_product_detail_category']);

    $args = [
        'posts_per_page' => -1,
        'post_type' => 'cpt_ingredients',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'category' => [$cat_id]
    ];

    $ingredients = query_posts($args);

    foreach($ingredients as $ingredient) {
        $product_meta = vpf_meta($ingredient->ID);
        $image = wp_get_attachment_image( get_post_meta( $ingredient->ID, '_cmb_product_featured_image', 1 ), '' );
        $small_image = wp_get_attachment_image( get_post_meta( $ingredient->ID, '_cmb_product_small_description_image', 1 ), '' );

        $temp = [
            'link' => get_permalink($ingredient->ID),
            'id' => $ingredient->ID
        ];

        $finalized[] = $temp;

    }

    return $finalized;

}

/*function be_metabox_show_on_child_of( $display, $meta_box ) {
    if ( 'child_of' !== $meta_box['show_on']['key'] )
        return $display;

    // If we're showing it based on ID, get the current ID
    if( isset( $_GET['post'] ) ) $post_id = $_GET['post'];
    elseif( isset( $_POST['post_ID'] ) ) $post_id = $_POST['post_ID'];
    if( !isset( $post_id ) )
        return $display;

    // If current page id is in the included array, do not display the metabox
    $meta_box['show_on']['value'] = !is_array( $meta_box['show_on']['value'] ) ? array( $meta_box['show_on']['value'] ) : $meta_box['show_on']['value'];
    $pageids = array();
    foreach ($meta_box['show_on']['value'] as $parent_id) {
        $pages = get_pages(array(
            'child_of' => $parent_id,
            'post_status' => 'publish,draft,pending'
        ));
        foreach($pages as $page){
            $pageids[] = $page->ID;
        }
    }
    $pageids_unique = array_unique($pageids);
    if ( in_array( $post_id, $pageids_unique ) )
        return true;
    else
        return false;
}
add_filter( 'vpf_product_page_details', 'be_metabox_show_on_child_of', 10, 2 );*/


/* begin widget areas */
function ap_widgets_area_init() {
	register_sidebar(
		array(
			'id' => 'sidebar-1',
			'name' => 'Blog Sidebar',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => ''
		)
	);
}

add_action( 'widgets_init', 'ap_widgets_area_init' );
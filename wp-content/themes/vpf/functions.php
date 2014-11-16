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

/*-------------------------------------------------------------------------------------------*/
/* SHORTCODES */
/*-------------------------------------------------------------------------------------------*/


/*-------------------------------------------------------------------------------------------*/
/* CUSTOM POST TYPES */
/*-------------------------------------------------------------------------------------------*/
require get_template_directory() . '/application/post_types/cpt.php';

/*-------------------------------------------------------------------------------------------*/
/* TAXONOMIES */
/*-------------------------------------------------------------------------------------------*/
require get_template_directory() . '/application/taxonomies/tax.php';

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

/* Widgets */
//add_action( 'widgets_init', 'varietypetfoods_widgets_init' );

/* Theme Options */
require get_template_directory() . '/application/options.php';
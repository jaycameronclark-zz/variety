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
    'pages'      => array( 'page', 'cpt_products' ),
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
            'type' => 'text_small',
            'description' => '(px)'
          ),
          array(
            'name' => 'Position Left',
            'id'   => 'static_pos_left',
            'type' => 'text_small',
            'description' => '(px)'
          ),
          array(
            'name' => 'Position Bottom',
            'id'   => 'static_pos_bottom',
            'type' => 'text_small',
            'description' => '(px)'
          ),
          array(
            'name' => 'Position Right',
            'id'   => 'static_pos_right',
            'type' => 'text_small',
            'description' => '(px)'
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
            'name' => 'Animation Speed',
            'id'   => 'group_animation_speed',
            'type' => 'text_small',
            'description' => 'In milliseconds'
          ),
          array(
            'name' => 'Animation Delay',
            'id'   => 'group_animation_delay',
            'type' => 'text_small',
            'description' => 'In milliseconds'
          ),
          array(
            'name' => 'Position Top',
            'id'   => 'group_pos_top',
            'type' => 'text_small',
            'description' => '(px)'
          ),
          array(
            'name' => 'Position Left',
            'id'   => 'group_pos_left',
            'type' => 'text_small',
            'description' => '(px)'
          ),
          array(
            'name' => 'Position Bottom',
            'id'   => 'group_pos_bottom',
            'type' => 'text_small',
            'description' => '(px)'
          ),
          array(
            'name' => 'Position Right',
            'id'   => 'group_pos_right',
            'type' => 'text_small',
            'description' => '(px)'
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

  $meta_boxes['vpf_product_page_details'] = array(
    'id'         => 'vpf_product_page_details',
    'title'      => __( 'Product Page Details', 'cmb' ),
    'pages'      => array( 'cpt_products' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'cmb_styles' => true,
    'fields'   => array(
      array(
        'name' => __( 'Page Title', 'cmb' ),
        'desc' => __( 'Overrides default title', 'cmb' ),
        'id'   => $prefix . 'product_page_title',
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
        'name' => __( 'Color Scheme', 'cmb' ),
        'desc' => __( 'Orange or Blue Color Scheme', 'cmb' ),
        'id'   => $prefix . 'product_color_scheme',
        'type' => 'select',
        'options' => array(
          'orange' => __( 'Orange', 'cmb' ),
          'blue'   => __( 'Blue', 'cmb' )
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
        'name' => 'Sidebar Background',
        'desc' => 'Background for sidebar content',
        'id'   => $prefix . 'page_sidebar_background',
        'type' => 'file'
      ),
      array(
        'name' => 'Page Footer Image',
        'desc' => 'Image below products. i.e. Mixables',
        'id'   => $prefix . 'page_footer_image',
        'type' => 'file'
      ),
      array(
        'name' => 'Product Detail Category',
        'desc' => 'Associated Product Detail Category',
        'id' => $prefix . 'product_detail_category',
        'taxonomy' => 'products_tax', //Enter Taxonomy Slug
        'type' => 'taxonomy_select',
      )
    )
  );

  $meta_boxes['vpf_product_details'] = array(
    'id'         => 'vpf_product_details',
    'title'      => __( 'Product Details', 'cmb' ),
    'pages'      => array( 'cpt_products_detail' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,
    'fields'   => array(
      array(
        'name' => __( 'Product Title', 'cmb' ),
        'desc' => __( 'Large, Main Title', 'cmb' ),
        'id'   => $prefix . 'product_detail_title',
        'type' => 'text_medium'
      ),
      array(
        'name' => __( 'Product Sub-Title', 'cmb' ),
        'desc' => __( 'Italisized title under main title', 'cmb' ),
        'id'   => $prefix . 'product_subtitle',
        'type' => 'text_medium'
      ),
      array(
        'name' => __( 'Color Scheme', 'cmb' ),
        'desc' => __( 'Orange or Blue Color Scheme', 'cmb' ),
        'id'   => $prefix . 'product_detail_color_scheme',
        'type' => 'select',
        'options' => array(
          'orange' => __( 'Orange', 'cmb' ),
          'blue'   => __( 'Blue', 'cmb' )
        )
      ),
      array(
        'name' => __( 'Lightbox Heading?', 'cmb' ),
        'desc' => __( 'Open in lightbox or not', 'cmb' ),
        'id'   => $prefix . 'product_detail_lightbox',
        'type' => 'select',
        'options' => array(
          'true' => __( 'True', 'cmb' ),
          'false' => __( 'False', 'cmb' )
        )
      ),
      array(
        'name' => __( 'Product Small Description', 'cmb' ),
        'desc' => __( 'Text below heading', 'cmb' ),
        'id'   => $prefix . 'product_small_description',
        'type' => 'textarea'
      ),
      array(
        'name' => __( 'Product Small Description Image', 'cmb' ),
        'desc' => __( 'Image below small heading', 'cmb' ),
        'id'   => $prefix . 'product_small_description_image',
        'type' => 'file'
      ),
      array(
        'name' => __( 'Align Small Description Image', 'cmb' ),
        'desc' => __( 'Alignment of small image', 'cmb' ),
        'id'   => $prefix . 'product_small_image_align',
        'type' => 'select',
        'options' => array(
          'right' => __( 'Right', 'cmb' ),
          'bottom' => __( 'Bottom', 'cmb' )
        )
      ),
      array(
        'name' => __( 'Product Main Description', 'cmb' ),
        'desc' => __( 'Main, Italisized description', 'cmb' ),
        'id'   => $prefix . 'product_main_description',
        'type' => 'textarea'
      ),
      array(
        'name' => __( 'Natural Text', 'cmb' ),
        'desc' => __( 'Green Text', 'cmb' ),
        'id'   => $prefix . 'product_natural_text',
        'type' => 'text_medium'
      ),
      array(
        'name' => __( 'Featured Image', 'cmb' ),
        'desc' => __( 'Primary Product Image', 'cmb' ),
        'id'   => $prefix . 'product_featured_image',
        'type' => 'file'
      ),
      array(
        'name' => __( 'Product Ingredients', 'cmb' ),
        'desc' => __( '', 'cmb' ),
        'id'   => $prefix . 'product_ingredients',
        'type' => 'textarea'
      ),
		array(
			'name' => __( 'Vitamins', 'cmb' ),
			'desc' => __( '', 'cmb' ),
			'id'   => $prefix . 'product_vitamins',
			'type' => 'textarea'
		),
		array(
			'name' => __( 'Minerals', 'cmb' ),
			'desc' => __( '', 'cmb' ),
			'id'   => $prefix . 'product_minerals',
			'type' => 'textarea'
		),
      array(
        'name' => __( 'Feeding Guide', 'cmb' ),
        'desc' => __( '', 'cmb' ),
        'id'   => $prefix . 'product_feeding_guide',
        'type' => 'textarea'
      ),
      array(
        'name' => __( 'Guaranteed Analysis:', 'cmb' ),
        'desc' => __( '', 'cmb' ),
        'id'   => $prefix . 'product_guaranteed_analysis',
        'type' => 'textarea'
      ),
      array(
        'name' => __( 'Calorie Content:', 'cmb' ),
        'desc' => __( 'Medium to Large', 'cmb' ),
        'id'   => $prefix . 'product_calorie_content_one',
        'type' => 'textarea'
      ),
      array(
        'name' => __( 'Calorie Content:', 'cmb' ),
        'desc' => __( 'Small to medium', 'cmb' ),
        'id'   => $prefix . 'product_calorie_content_two',
        'type' => 'textarea'
      )
    )
  );

  // $meta_boxes['vpf_page_sidebars'] = array(
  //   'id'         => 'vpf_page_sidebar_details',
  //   'title'      => __( 'Sidebar Content', 'cmb' ),
  //   'pages'      => array( 'page' ),
  //   'show_names' => true,
  //   'show_on'    => array( 'key' => 'id', 'value' => array( 786, ), ), // Specific post IDs to display this metabox
  //   'context'    => 'normal',
  //   'priority'   => 'high',
  //   'cmb_styles' => true,

  //   'fields' => array(
  //     array(
  //       'name' => 'Sidebar Background',
  //       'desc' => 'Background for sidebar content',
  //       'id'   => $prefix . 'page_sidebar_background',
  //       'type' => 'file'
  //     ),
  //     array(
  //       'name' => __( 'Sidebar Content', 'cmb' ),
  //       'desc' => __( 'Content for sidebar', 'cmb' ),
  //       'id'   => $prefix . 'page_sidebar_content',
  //       'type' => 'wysiwyg',
  //       'options' => array(
  //         'wpautop' => true, // use wpautop?
  //         'media_buttons' => true, // show insert/upload button(s)
  //         'textarea_name' => ['page_sidebar_content_editor'], // set the textarea name to something different, square brackets [] can be used here
  //         'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
  //         'tabindex' => '',
  //         'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
  //         'editor_class' => '', // add extra class(es) to the editor textarea
  //         'teeny' => true, // output the minimal editor config used in Press This
  //         'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
  //         'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
  //         'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
  //       ),
  //     )
  //   )
  // );

  $meta_boxes['vpf_where_to_buy'] = array(
    'id'         => 'vpf_where_to_buy_details',
    'title'      => __('Where To Buy Details', 'cmb'),
    'pages'      => array('cpt_where_to_buy'),
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true,
    'cmb_styles' => true,

    'fields' => array(
      array(
        'name' => __( 'Color Scheme', 'cmb' ),
        'desc' => __( 'Orange or Blue Color Scheme', 'cmb' ),
        'id'   => $prefix . 'wtb_color_scheme',
        'type' => 'select',
        'options' => array(
          'orange' => __( 'Orange', 'cmb' ),
          'blue'   => __( 'Blue', 'cmb' )
        )
      ),
      array(
        'name' => __( 'Sub Text', 'cmb' ),
        'desc' => __( 'Text below main paragraph', 'cmb' ),
        'id'   => $prefix . 'wtb_sub_text',
        'type' => 'text'
      ),
      array(
        'id'          => $prefix . 'where_to_buy_links',
        'type'        => 'group',
        'description' => __( 'Where To Buy Links', 'cmb' ),
        'options'     => array(
          'group_title'   => __( 'Link Group: {#}', 'cmb' ),
          'add_button'    => __( 'Add Another Link Group', 'cmb' ),
          'remove_button' => __( 'Remove Link Group', 'cmb' ),
          'sortable'      => true
        ),
        'fields' => array(
          array(
            'name' => 'Group Name',
            'id'   => 'wtb_link_group_name',
            'type' => 'text_medium',
            'description' => 'Examples: retail, online, distributors'
          ),
          array(
              'name' => 'List of Links (HTML)',
              'desc' => 'Example: &lt;li&gt;&lt;a href="http://google.com"&gt;Some Link Text&lt;/a&gt;&lt;/li&gt;',
              'id' => $prefix . 'where_to_buy_links_list',
              'type' => 'textarea'
          ),
        )
      )
    )
  );

	// $meta_boxes['vpf_sidebar_details'] = array(
	// 	'id'         => 'vpf_sidebar_details',
	// 	'title'      => __( 'Sidebar Details', 'cmb' ),
	// 	'pages'      => array( 'cpt_ingredients' ),
	// 	'context'    => 'normal',
	// 	'priority'   => 'high',
	// 	'show_names' => true,
	// 	'cmb_styles' => true,
	// 	'fields'   => array(
	// 		array(
	// 			'name' => __( 'Content Title', 'cmb' ),
	// 			'desc' => __( 'Main Title', 'cmb' ),
	// 			'id'   => $prefix . 'sidebar_content_title',
	// 			'type' => 'text_medium'
	// 		)
	// 	)
	// );

  return $meta_boxes;
}
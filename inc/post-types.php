<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
  // Register the Homepage Slides

  $labels = array(
    'name' => _x('Portfolio', 'post type general name'),
    'singular_name' => _x('Portfolio', 'post type singular name'),
    'add_new' => _x('Add New', 'Portfolio'),
    'add_new_item' => __('Add New Portfolio'),
    'edit_item' => __('Edit Portfolio'),
    'new_item' => __('New Portfolio'),
    'view_item' => __('View Portfolio'),
    'search_items' => __('Search Portfolio'),
    'not_found' =>  __('No Portfolio found'),
    'not_found_in_trash' => __('No Portfolio found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Portfolio'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),

  ); 
  register_post_type('portfolio',$args); // name used in query

  $labels = array(
    'name' => _x('Markets', 'post type general name'),
    'singular_name' => _x('Market', 'post type singular name'),
    'add_new' => _x('Add New', 'Market'),
    'add_new_item' => __('Add New Market'),
    'edit_item' => __('Edit Market'),
    'new_item' => __('New Market'),
    'view_item' => __('View Market'),
    'search_items' => __('Search Market'),
    'not_found' =>  __('No Market found'),
    'not_found_in_trash' => __('No Market found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Markets'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),

  ); 
  register_post_type('market',$args); // name used in query


  $labels = array(
    'name' => _x('Services', 'post type general name'),
    'singular_name' => _x('Service', 'post type singular name'),
    'add_new' => _x('Add New', 'Service'),
    'add_new_item' => __('Add New Service'),
    'edit_item' => __('Edit Service'),
    'new_item' => __('New Service'),
    'view_item' => __('View Service'),
    'search_items' => __('Search Service'),
    'not_found' =>  __('No Service found'),
    'not_found_in_trash' => __('No Service found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Services'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),

  ); 
  register_post_type('service',$args); // name used in query

    // Register the Homepage Slides

  $labels = array(
    'name' => _x('Staff', 'post type general name'),
    'singular_name' => _x('Staff', 'post type singular name'),
    'add_new' => _x('Add New', 'Staff'),
    'add_new_item' => __('Add New Staff'),
    'edit_item' => __('Edit Staff'),
    'new_item' => __('New Staff'),
    'view_item' => __('View Staff'),
    'search_items' => __('Search Staff'),
    'not_found' =>  __('No Staff found'),
    'not_found_in_trash' => __('No Staff found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Staff'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),

  ); 
  register_post_type('staff',$args); // name used in query

  
  } // close custom post type


/*
##############################################
  Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {
// cusotm tax
    
    // register_taxonomy( 'project_type', 'portfolio',
    //  array( 
    //   'hierarchical' => true, // true = acts like categories false = acts like tags
    //   'label' => 'Project Type', 
    //   'query_var' => true, 
    //   'rewrite' => true ,
    //   'show_admin_column' => true,
    //   'public' => true,
    //   'rewrite' => array( 'slug' => 'project-type' ),
    //   '_builtin' => true
    // ) );

    register_taxonomy( 'featured_portfolio', 'portfolio',
     array( 
      'hierarchical' => true, // true = acts like categories false = acts like tags
      'label' => 'Featured', 
      'query_var' => true, 
      'rewrite' => true ,
      'show_admin_column' => true,
      'public' => true,
      'rewrite' => array( 'slug' => 'featured' ),
      '_builtin' => true
    ) );

    register_taxonomy( 'service_category', array('service', 'staff'),
     array( 
      'hierarchical' => true, // true = acts like categories false = acts like tags
      'label' => 'Service Category', 
      'query_var' => true, 
      'rewrite' => true ,
      'show_admin_column' => true,
      'public' => true,
      'rewrite' => array( 'slug' => 'service-category' ),
      '_builtin' => true
    ) );
  
} // End build taxonomies
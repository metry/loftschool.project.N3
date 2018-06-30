<?php
add_theme_support('post-thumbnails');
add_theme_support('menus');

function add_custom_taxonomies() {
    // Add new "Locations" taxonomy to Posts
    register_taxonomy('actiontypes', 'post', array(
        // Hierarchical taxonomy (like categories)
        'hierarchical' => true,
        // This array of options controls the labels displayed in the WordPress Admin UI
        'labels' => array(
            'name' => _x( 'Типы акций', 'taxonomy general name' ),
            'singular_name' => _x( 'Тип акции', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search Actions' ),
            'all_items' => __( 'All Actions' ),
            'parent_item' => __( 'Parent Action' ),
            'parent_item_colon' => __( 'Parent Action:' ),
            'edit_item' => __( 'Edit Action' ),
            'update_item' => __( 'Update Action' ),
            'add_new_item' => __( 'Add New Action' ),
            'new_item_name' => __( 'New Action Name' ),
            'menu_name' => __( 'Типы акций' ),
        ),
        // Control the slugs used for this taxonomy
        'rewrite' => array(
            'slug' => 'action', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        )
    ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );


// Register Custom Post Type
function action_post_type() {
    $labels = array(
        'name'                  => _x( 'Акции', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Акция', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Акции', 'text_domain' ),
        'name_admin_bar'        => __( 'Акции', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Акция', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail' ),
        'taxonomies'            => array( 'actiontypes', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'actions', $args );
}
add_action( 'init', 'action_post_type', 0 );

function exclude_single_posts_tag($query) {
    if ($query->is_tag()) {
        $query->set( 'post_type', array('post', 'actions') );
    }
}
add_action('pre_get_posts', 'exclude_single_posts_tag');

function exclude_single_posts_home($query) {
    if ($query->is_home() && $query->is_main_query()) {
        $query->set( 'post_type', array('post', 'actions') );
    }
}
add_action('pre_get_posts', 'exclude_single_posts_home');

function exclude_single_posts_date($query) {
    if ($query->is_day || $query->is_month || $query->is_year) {
        $query->set( 'post_type', array('post', 'actions') );
    }
}
add_action('pre_get_posts', 'exclude_single_posts_date');
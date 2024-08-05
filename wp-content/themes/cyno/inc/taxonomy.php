<?php
// Register Custom Brand
function register_branch() {
 
    $labels = array(
        'name'                       => _x( 'Brand', 'Brand General Name', 'cyno' ),
        'singular_name'              => _x( 'Brands', 'Brand Singular Name', 'cyno' ),
        'menu_name'                  => __( 'Brand', 'cyno' ),
        'all_items'                  => __( 'All Items', 'cyno' ),
        'parent_item'                => __( 'Parent Brand', 'cyno' ),
        'parent_item_colon'          => __( 'Parent Brand:', 'cyno' ),
        'new_item_name'              => __( 'New Brand Name', 'cyno' ),
        'add_new_item'               => __( 'Add New Brand', 'cyno' ),
        'edit_item'                  => __( 'Edit Brand', 'cyno' ),
        'update_item'                => __( 'Update Brand', 'cyno' ),
        'view_item'                  => __( 'View Brand', 'cyno' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'cyno' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'cyno' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'cyno' ),
        'popular_items'              => __( 'Popular Items', 'cyno' ),
        'search_items'               => __( 'Search Items', 'cyno' ),
        'not_found'                  => __( 'Not Found', 'cyno' ),
        'no_terms'                   => __( 'No items', 'cyno' ),
        'items_list'                 => __( 'Items list', 'cyno' ),
        'items_list_navigation'      => __( 'Items list navigation', 'cyno' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'brand', array( 'product' ), $args );
 
}
add_action( 'init', 'register_branch', 0 );

$terms = get_terms( array(
    'taxonomy'   => 'brand',
    'hide_empty' => false,
) );




<?php

// Shortcode to display product categories

$repeater_columns = '4';
$repeater_type = 'slider';

$default_text_align = 'center';

$options = array(
'style_options' => array(
    'type' => 'group',
    'heading' => __( 'Style' ),
    'options' => array(
         'style' => array(
            'type' => 'select',
            'heading' => __( 'Style' ),
            'default' => 'badge',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/box-layouts.php' )
        )
    ),
),
'layout_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/repeater-options.php' ),
'layout_options_slider' => require( get_template_directory() . '/inc/builder/shortcodes/commons/repeater-slider.php' ),
'cat_meta' => array(
    'type' => 'group',
    'heading' => __( 'Meta' ),
    'options' => array(

     'ids' => array(
        'type' => 'select',
        'heading' => 'Categories',
        'param_name' => 'ids',
        'config' => array(
            'multiple' => true,
            'placeholder' => 'Select..',
            'termSelect' => array(
                'post_type' => 'product_cat',
                'taxonomies' => 'product_cat'
            ),
        )
    ),

    'number' => array(
        'type' => 'textfield',
        'heading' => 'Total',
        'conditions' => 'ids == ""',
        'default' => '',
    ),

    'offset' => array(
        'type' => 'textfield',
        'heading' => 'Offset',
        'conditions' => 'ids == ""',
        'default' => '',
    ),

    'orderby' => array(
        'type' => 'select',
        'heading' => __( 'Order By' ),
        'default' => 'menu_order',
        'options' => array(
            'name' => 'Name',
            'date' => 'Date',
            'menu_order' => 'Menu Order',
        )
    ),
    'order' => array(
        'type' => 'select',
        'heading' => __( 'Order' ),
        'default' => 'asc',
        'options' => array(
            'asc' => 'ASC',
            'desc' => 'DESC',
        )
    ),
   'show_count' => array(
        'type' => 'checkbox',
        'heading' => 'Show Count',
        'default' => 'true'
    ),
    'hide_empty'      => array(
      'type'    => 'checkbox',
      'heading' => 'Hide Empty',
    ),
  ),
)
);

$box_styles = require( CYNO_PATH . '/inc/builder/shortcodes/commons/box-styles.php' );
$options = array_merge($options, $box_styles);

$advanced = array('advanced_options' => require( CYNO_PATH . '/inc/builder/shortcodes/commons/advanced.php'));
$options = array_merge($options, $advanced);


add_ux_builder_shortcode( 'cyno_product_categories', array(
    'name' => 'Product Categories',
    'category' => __( 'CYNO Software' ),
    'priority' => 3,
    'thumbnail' =>  cyno_ux_builder_thumbnail( 'cyno' ),

   'presets' => array(
        array(
            'name' => __( 'Default' ),
            'content' => '[cyno_product_categories]'
        ),
        array(
            'name' => __( 'Simple' ),
            'content' => '[cyno_product_categories style="normal"]'
        ),array(
            'name' => __( 'Overlay' ),
            'content' => '[cyno_product_categories style="overlay" slider_nav_style="simple" slider_nav_position="outside" image_overlay="rgba(0, 0, 0, 0.19)" image_hover="overlay-remove-50" image_hover_alt="zoom"]'
        ),array(
            'name' => __( 'Grid' ),
            'content' => '[cyno_product_categories style="overlay" type="grid" grid="3" columns="3" animate="fadeInLeft" number="4" orderby="name" image_size="large" image_overlay="rgba(38, 38, 38, 0.16)" text_pos="middle" text_size="large"]'
        ),array(
            'name' => __( 'Circle Style' ),
            'content' => '[cyno_product_categories style="overlay" slider_nav_style="simple" slider_nav_position="outside" image_height="100%" image_radius="100" image_overlay="rgba(0, 0, 0, 0.19)" image_hover="overlay-remove-50" image_hover_alt="zoom" text_pos="middle" text_size="large" text_hover="bounce"]'
        ),array(
            'name' => __( 'Grid Dark' ),
            'content' => '[cyno_product_categories style="overlay" type="grid" grid="13" col_spacing="small" columns="3" depth_hover="5" animate="fadeInLeft" number="5" orderby="name" image_size="large" image_overlay="rgba(38, 38, 38, 0.16)" image_hover="color" image_hover_alt="zoom-long" text_pos="middle" text_size="large"]'
        ),
    ),
    'options' => $options
) );

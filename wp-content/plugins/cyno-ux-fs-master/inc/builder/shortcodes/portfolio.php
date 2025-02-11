<?php

// Shortcode to display product categories

$repeater_columns = '4';
$repeater_type = 'slider';
$default_text_align = 'center';
$repeater_col_spacing = 'small';

$options = array(
'portfolio_meta' => array(
    'type' => 'group',
    'heading' => __( 'Options' ),
    'options' => array(

    'style' => array(
        'type' => 'select',
        'heading' => __( 'Style' ),
        'default' => 'bounce',
        'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/box-layouts.php' )
    ),

     'filter' => array(
            'type' => 'radio-buttons',
            'heading' => __('Filter'),
            'default' => '',
            'options' => array(
                ''  => array( 'title' => 'Off'),
                'true'  => array( 'title' => 'On'),
            ),
        ),

    'filter_nav' => array(
        'type' => 'select',
        'heading' => __( 'Filter Style' ),
        'conditions' => 'filter',
        'default' => 'line-grow',
        'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/nav-styles.php' ),
    ),

    'filter_align' => array(
        'type' => 'radio-buttons',
        'conditions' => 'filter',
        'heading' => 'Filter Align',
        'default' => 'center',
        'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/align-radios.php' ),
    ),

    'lightbox' => array(
        'type' => 'radio-buttons',
        'heading' => __('Lightbox'),
        'default' => '',
        'options' => array(
            ''  => array( 'title' => 'Off'),
            'true'  => array( 'title' => 'On'),
        ),
    ),

    'lightbox_image_size' => array(
	    'type'       => 'select',
	    'heading'    => __( 'Lightbox Image Size' ),
	    'conditions' => 'lightbox == "true"',
	    'default'    => 'original',
	    'options'    => cyno_ux_builder_image_sizes(),
    ),

    'ids' => array(
        'type' => 'select',
        'heading' => 'Ids',
        'full_width' => true,
        'config' => array(
            'multiple' => true,
            'placeholder' => 'Select...',
            'postSelect' => array(
                'post_type' => array( 'featured_item' )
            ),
        )
    ),

    'cat' => array(
        'type' => 'select',
        'heading' => 'Category',
        'conditions' => 'ids == ""',
        'full_width' => true,
        'config' => array(
            'placeholder' => 'Select...',
            'termSelect' => array(
                'post_type' => 'featured_item',
                'taxonomies' => 'featured_item_category'
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
        'conditions' => 'ids == ""',
        'options' => array(
			'title' => 'Title',
            'name' => 'Name',
            'date' => 'Date',
            'menu_order' => 'Menu Order',
        )
    ),
    'order' => array(
        'type' => 'select',
        'heading' => __( 'Order' ),
        'conditions' => 'ids == ""',
        'default' => 'desc',
        'options' => array(
          'desc' => 'DESC',
          'asc' => 'ASC',
        )
    ),
    'title_tag' => array(
      'type'    => 'select',
      'heading' => 'Title Tag',
      'default' => 'h3',
      'options' => array(
        'div' => 'div',
        'p' => 'p',
        'h2' => 'H2',
        'h3' => 'H3',
        'h4' => 'H4',
        'h5' => 'H5',
        'h6' => 'H6',
      ),
    ),
    'hidden_cat' => array(
      'type'    => 'checkbox',
      'heading' => 'Hidden Cat',
      'default' => 1,
    )
  ),
),
'layout_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/repeater-options.php' ),
'layout_options_slider' => require( CYNO_PATH . '/inc/builder/shortcodes/commons/repeater-slider.php' ),
);
$box_styles = require( CYNO_PATH . '/inc/builder/shortcodes/commons/box-styles.php' );

$options = array_merge($options, $box_styles);

$advanced = array('advanced_options' => require( CYNO_PATH . '/inc/builder/shortcodes/commons/advanced.php'));
$options = array_merge($options, $advanced);

add_ux_builder_shortcode( 'cyno_portfolio', array(
   'name' => __( 'Portfolio' ),
   'wrap' => true,
   'category' => __( 'CYNO Software' ),
   'thumbnail' =>  cyno_ux_builder_thumbnail( 'cyno' ),
    'scripts' => array(
        'flatsome-masonry-js' => get_template_directory_uri() .'/assets/libs/packery.pkgd.min.js',
        'flatsome-isotope-js' => get_template_directory_uri() .'/assets/libs/isotope.pkgd.min.js',
    ),
   'presets' => array(
        array(
            'name' => __( 'Normal' ),
            'content' => '[cyno_portfolio]'
        ),
        array(
            'name' => __( 'Normal Lightbox' ),
            'content' => '[cyno_portfolio lightbox="true"]'
        ),
        array(
            'name' => __( 'Simple Filtering' ),
            'content' => '[cyno_portfolio style="overlay" filter="true" orderby="name" type="masonry" grid="3" image_hover="overlay-add-50" image_hover_alt="zoom" text_pos="middle" text_size="large" text_hover="slide"]'
        ),array(
            'name' => __( 'Outline Nav Filter' ),
            'content' => '[cyno_portfolio style="overlay" filter="true" filter_nav="outline" orderby="name" type="masonry" grid="3" image_hover="overlay-add-50" image_hover_alt="blur" text_pos="middle"]'
        ),array(
            'name' => __( 'Simple Slider' ),
            'content' => '[cyno_portfolio style="shade" filter_nav="outline" orderby="name" grid="3" columns="5" image_hover="zoom" image_hover_alt="grayscale"]'
        ),
        array(
            'name' => __( 'Grid Style' ),
            'content' => '[cyno_portfolio style="overlay" filter="true" filter_nav="outline" number="4" orderby="name" type="grid" grid="3" image_hover="overlay-add-50" image_hover_alt="zoom" text_align="left" text_size="large" text_hover="bounce"]'
        ),
        array(
            'name' => __( 'Grid Style 2' ),
            'content' => '[cyno_portfolio style="overlay" filter="true" filter_nav="outline" number="4" orderby="name" type="grid" grid="3" width="full-width" col_spacing="collapse" image_hover="overlay-add-50" image_hover_alt="zoom" text_align="left" text_size="large" text_hover="bounce"]'
        )
    ),
    'options' => $options
) );

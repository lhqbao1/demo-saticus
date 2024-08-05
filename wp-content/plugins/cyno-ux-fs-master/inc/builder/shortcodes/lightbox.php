<?php

add_ux_builder_shortcode( 'cyno_lightbox', array(
    'type' => 'container',
    'name' => __( 'Lightbox' ),
    'category' => __( 'CYNO Software' ),
	  'template'  => cyno_ux_builder_template( 'lightbox.html'),
    'thumbnail' =>  cyno_ux_builder_thumbnail( 'cyno' ),
	  'wrap'  => false,
    'info' => '{{ label }}',
    'nested' => true,
    'options' => array(
		'id' => array(
			'type'       => 'textfield',
			'heading'    => 'ID',
		),
        'auto_open' => array(
            'type'    => 'checkbox',
            'heading' => __( 'Auto Open' ),
            'default' => 'false',
        ),
		'width' => array(
			'type'    => 'scrubfield',
			'heading' => __( 'Width' ),
			'default' => '650px',
			'min'     => 0,
			'max'     => 1200,
			'step'    => 5,
		),
        'padding' => array(
            'type' => 'margins',
            'heading' => 'Padding',
            'full_width' => true,
            'responsive' => true,
            'min' => 0,
            'max' => 100,
            'step' => 1,
        ),
		'auto_timer' => array(
			'type'    => 'slider',
			'heading' => __( 'Auto Timer' ),
			'default' => '2500',
			'min'     => 0,
			'step'    => 5,
		),
		'auto_show' => array(
            'type'    => 'radio-buttons',
            'heading' => 'Auto Show',
            'default' => '',
            'options' => array(
                '' => array( 'title' => 'None' ),
                'always'     => array( 'title' => 'Always' ),
            ),
		),
		'version' => array(
            'type' => 'slider',
            'heading' => __('Version'),
            'default' => '1',
            'max' => '10',
            'min' => '0',
		),
 ),
) );

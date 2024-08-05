<?php 
add_ux_builder_shortcode('cyno_count_up', array(
  'name'      => __('Count Up'),
  'category' => __( 'CYNO Software' ),
  'thumbnail' =>  cyno_ux_builder_thumbnail( 'cyno' ),
  'options' => array(
    'number'    =>  array(
        'type' => 'slider',
        'heading' => 'Numbers',
        'default' => '100',
        'step' => '1',
        'unit' => '',
        'min'   =>  1, 
        'max'  => 99999
    ),
    'number_color' => array(
      'type' => 'colorpicker',
      'heading' => __('Number Color'),
      'alpha' => true,
      'format' => 'rgb',
      'position' => 'bottom right',
    ),
    'number_size'   => array(
      'type'       => 'slider',
			'heading'    => __( 'Font size', 'flatsome' ),
			'responsive' => true,
			'unit'       => 'rem',
			'max'        => 4,
			'min'        => 0.75,
			'step'       => 0.05,
    ),
    'title'    =>  array(
      'type' => 'textfield',
      'heading' => 'Title',
      'default' => 'CYNO Software',
    ),
    'title_color' => array(
      'type' => 'colorpicker',
      'heading' => __('Title Color'),
      'alpha' => true,
      'format' => 'rgb',
      'position' => 'bottom right',
    ),
    'title_size'   => array(
      'type'      => 'radio-buttons',
      'heading'   => __( 'Title size' ),
      'default'   => 'medium',
      'options'   => require( get_template_directory() . '/inc/builder/shortcodes/values/text-sizes.php' ),
    ),
  ),
));
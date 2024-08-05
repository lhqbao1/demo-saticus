<?php

add_ux_builder_shortcode( 'cyno_video_button', array(
  'name' => __( 'Video Button' ),
  'category' => __( 'CYNO Software' ),
  'thumbnail' =>  cyno_ux_builder_thumbnail( 'cyno' ),
  'options' => array(
      'video' => array(
        'type' => 'textfield',
        'heading' => 'Video',
        'description' => 'Enter a Youtube or Vimeo video here. Video will open in a lightbox. Example: https://www.youtube.com/watch?v=AoPiLg8DZ3A',
      ),
      'aria_label' => array(
        'type' => 'textfield',
        'heading' => 'Aria Label',
      ),
      'size' => array(
        'type' => 'slider',
        'heading' => __('Size'),
        'unit' => '%',
        'default' => '100',
        'max' => '500',
        'min' => '0',
        'on_change' => array(
	        'selector' => '.video-button-wrapper',
            'style' => 'font-size: {{ value }}%'
        )
      ),

  )
) );

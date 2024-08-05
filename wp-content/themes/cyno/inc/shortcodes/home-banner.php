<?php

function cyno_ux_builder_element_home_banner(){
    add_ux_builder_shortcode( 'cyno_home_banner', array(
      'type' => 'container',
      'name' => __( 'Cyno Home Banner' ),
      'category' => __( 'CYNO Software' ),
      'wrap'  => false,
      'options' => array(
        'img1'         => array(
          'type'    => 'image',
          'heading' => 'image 1',
          'value'   => '',
        ),
  
        'title1'       => array(
          'type'      => 'textfield',
          'heading'   => 'Title 1',
          'value'     => '',
        ),
  
        'sub1'       => array(
          'type'      => 'textfield',
          'heading'   => 'Sub 1',
          'value'     => '',
        ),
  
  
        'img2'         => array(
          'type'    => 'image',
          'heading' => 'image 2',
          'value'   => '',
        ),
        'title2'       => array(
          'type'      => 'textfield',
          'heading'   => 'Title 2',
          'value'     => '',
  
        ),
        'sub2'       => array(
          'type'      => 'textfield',
          'heading'   => 'Sub 2',
          'value'     => '',
  
        ),
  
        'img3'         => array(
          'type'    => 'image',
          'heading' => 'image 3',
          'value'   => '',
        ),
  
        'title3'       => array(
          'type'      => 'textfield',
          'heading'   => 'Title 3',
          'value'     => '',
  
        ),
  
        'sub3'       => array(
          'type'      => 'textfield',
          'heading'   => 'Sub 3',
          'value'     => '',
  
        ),
  
    ),
    ) );
  
  }
  add_action('ux_builder_setup', 'cyno_ux_builder_element_home_banner');
  
  
  function cyno_ux_home_banner_callback( $atts ) {
      extract( shortcode_atts( array(
      'img1'    => '',
      'img2'     => '',
      'img3' => '',
      'sub1' => '',
      'sub2' => '',
      'sub3' => '',
      'title1' => '',
      'title2' => '',
      'title3' => '',
      ), $atts ) );
  
      ob_start();
    if(!empty($img1) && !empty($img2) && !empty($img3)  && !empty($sub1) && !empty($sub2) && !empty($sub3) && !empty($title1) && !empty($title2) && !empty($title3)) : ?>
  
     <div class="banner-home">
          <div class="banner-home__column">
              <div class="banner-home__box-text">
                  <h3><?php echo $title1; ?></h3>
                  <div><?php echo $sub1; ?></div>
              </div>
              <?php echo  wp_get_attachment_image( $img1, 'fulll', '', array( "class" => "banner-home__image" ) ); ?>
          </div>
  
          <div class="banner-home__column">
              <div class="banner-home__box-text">
                  <h3><?php echo $title2; ?></h3>
                  <div><?php echo $sub2; ?></div>
              </div>
              <?php echo wp_get_attachment_image( $img2, 'fulll', '', array( "class" => "banner-home__image" ) ); ?>
          </div>

          <div class="banner-home__column">
              <div class="banner-home__box-text">
                  <h3><?php echo $title3; ?></h3>
                  <div><?php echo $sub3; ?></div>
              </div>
              <?php echo wp_get_attachment_image( $img3, 'fulll', '', array( "class" => "banner-home__image" ) ); ?>
          </div>
      </div>
      <?php
    endif;
    return ob_get_clean();
  }
  
  add_shortcode( 'cyno_home_banner', 'cyno_ux_home_banner_callback' );
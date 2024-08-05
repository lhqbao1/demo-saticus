<?php

/**
 * [Count Up]
 */
function cyno_ux_count_up_callback($atts)
{
  extract(shortcode_atts(array(
    'number'    => '100',
    'title'     => 'CYNO Software',
    'number_color' => '',
    'number_size' => 'medium',
    'title_color' => '',
    'title_size' => 'medium',
  ), $atts));

  ob_start();
?>
  <div class="count-up">
    <div class="count-up__number" <?php
                                  if (!empty($number_color) || !empty($number_size)) {
                                    echo ' style="';
                                    if (!empty($number_color)) {
                                      echo 'color:' . $number_color . ';';
                                    }
                                    if (!empty($number_size)) {
                                      echo 'font-size:' . $number_size . 'rem;';
                                    }
                                    echo '"';
                                  }
                                  ?>>
      <span class="count-up"><?php echo $number; ?></span>
      <span>+</span>
    </div>
    <div class="count-up__title<?php if (!empty($title_size)) {
                                  echo ' is-' . $title_size;
                                } ?>" <?php if (!empty($title_color)) {
                                        echo ' style="color:' . $title_color . '"';
                                      } ?>><?php echo $title; ?></div>
  </div>
<?php
  return ob_get_clean();
}

add_shortcode('cyno_count_up', 'cyno_ux_count_up_callback');

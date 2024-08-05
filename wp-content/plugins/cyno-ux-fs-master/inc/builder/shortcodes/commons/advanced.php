<?php

return array(
  'type' => 'group',
  'heading' => 'Advanced',
  'options' => array(
    'class' => array(
        'type' => 'textfield',
        'heading' => 'Class',
        'param_name' => 'class',
        'default' => '',
    ),
    'visibility'  => require( CYNO_PATH . '/inc/builder/shortcodes/commons/visibility.php' ),
  ),
);
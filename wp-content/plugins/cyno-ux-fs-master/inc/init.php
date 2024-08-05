<?php 

add_action( 'init', 'cyno_init_shortcode' ); //after_setup_theme
function cyno_init_shortcode() {
  require CYNO_PATH . '/inc/shortcodes/featured_box.php';
  require CYNO_PATH . '/inc/shortcodes/blog_posts.php';
  require CYNO_PATH . '/inc/shortcodes/video_button.php';
  require CYNO_PATH . '/inc/shortcodes/portfolio.php';
  require CYNO_PATH . '/inc/shortcodes/count_up.php';
  if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
    require CYNO_PATH . '/inc/shortcodes/product_categories.php';
  } 
}

add_action( 'ux_builder_setup', function () {
  require_once CYNO_PATH . '/inc/builder/helpers.php';
  include CYNO_PATH . '/inc/builder/shortcodes/lightbox.php';
  include CYNO_PATH . '/inc/builder/shortcodes/count_up.php';
  include CYNO_PATH . '/inc/builder/shortcodes/featured_box.php';
  include CYNO_PATH . '/inc/builder/shortcodes/blog_posts.php';
  include CYNO_PATH . '/inc/builder/shortcodes/video_button.php';
  include CYNO_PATH . '/inc/builder/shortcodes/portfolio.php';
  if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
    include CYNO_PATH . '/inc/builder/shortcodes/product_categories.php';
  } 
});

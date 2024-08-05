<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

// Add Custom Shop Content if set
if(is_shop() && flatsome_option('html_shop_page_content') && ! $wp_query->is_search() && $wp_query->query_vars['paged'] < 1 ){
   	echo do_shortcode('<div class="shop-page-content">'.flatsome_option('html_shop_page_content').'</div>');
} else {
	wc_get_template_part( 'layouts/category', flatsome_option( 'category_sidebar' ) );
}
// Use shortcode in a PHP file (outside the post editor).

echo do_shortcode( '[block id="news"]' );

get_footer( 'shop' );


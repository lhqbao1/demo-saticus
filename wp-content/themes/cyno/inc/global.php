<?php
// Prevent direct access.
if (!defined('ABSPATH')) exit;

add_filter('use_block_editor_for_post', '__return_false');

add_action('after_setup_theme', 'custom_role_load_ux_builder');
function custom_role_load_ux_builder()
{
    // remove_action( 'edit_form_top', 'ux_builder_edit_form_top' );
    remove_action('add_meta_boxes', 'ux_builder_meta_boxes');

    if (current_user_can('manage_options')) {
        add_action('add_meta_boxes', 'ux_builder_meta_boxes');
    }
}

function cyno_ux_builder_element_count_up()
{
    add_ux_builder_shortcode('cyno_count_up', array(
        'name'      => __('Cyno Count Up'),
        'priority'  => 1,
        'options' => array(
            'number'    =>  array(
                'type' => 'slider',
                'heading' => 'Numbers',
                'default' => '1',
                'step' => '1',
                'unit' => '',
                'min'   =>  1,
                'max'  => 10000000
            ),
            'number_color' => array(
                'type' => 'colorpicker',
                'heading' => __('Number Color'),
                'alpha' => true,
                'format' => 'rgb',
                'position' => 'bottom right',
            ),
            'title'    =>  array(
                'type' => 'textfield',
                'heading' => 'Title',
                'default' => '1',
                'step' => '1',
                'unit' => '',
                'min'   =>  1,
            ),
            'title_color' => array(
                'type' => 'colorpicker',
                'heading' => __('Title Color'),
                'alpha' => true,
                'format' => 'rgb',
                'position' => 'bottom right',
            ),
        ),
    ));
}
add_action('ux_builder_setup', 'cyno_ux_builder_element_count_up');
function cyno_count_up_callback($atts)
{
    extract(shortcode_atts(array(
        'number'    => '1',
        'title'    => 'Cyno',
        'number_color' => '',
        'title_color' => '',
    ), $atts));
    ob_start();
?>
    <div class="count-up" data-custom-block="count-up">
        <p class="count-up__number" <?php if (!empty($number_color)) {
                                        echo ' style="color:' . $number_color . '"';
                                    } ?>><span class="js-count-up" data-value="<?php echo $number; ?>">0</span> <span>+</span></p>
        <div class="count-up__title" <?php if (!empty($title_color)) {
                                            echo ' style="color:' . $title_color . '"';
                                        } ?>><?php echo $title; ?></div>
    </div>
<?php

    return ob_get_clean();
}
add_shortcode('cyno_count_up', 'cyno_count_up_callback');

if (!function_exists('cyno_posted_on')) :
    function cyno_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );

        echo sprintf(
            /* translators: %1$s: post date, %2$s: post author */
            wp_kses_post(_x('<span class="posted-on">Posted on %1$s</span> <span class="byline">by %2$s</span>', 'post date by post author', 'cyno')),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>', // phpcs:ignore WordPress.Security.EscapeOutput
            '<span class="meta-author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );
    }
endif;




function isures_set_user_visited_product_cookie()
{
    if (!is_singular('product')) {
        return;
    }

    global $post;

    if (empty($_COOKIE['woocommerce_recently_viewed'])) {
        $viewed_products = array();
    } else {
        $viewed_products = wp_parse_id_list((array) explode('|', wp_unslash($_COOKIE['woocommerce_recently_viewed'])));
    }

    $keys = array_flip($viewed_products);

    if (isset($keys[$post->ID])) {
        unset($viewed_products[$keys[$post->ID]]);
    }

    $viewed_products[] = $post->ID;

    if (count($viewed_products) > 22) {
        array_shift($viewed_products);
    }

    wc_setcookie('woocommerce_recently_viewed', implode('|', $viewed_products));
}
add_action('wp', 'isures_set_user_visited_product_cookie');

add_shortcode('isures_recently_viewed_products', 'isures_2718_prod_viewed_atts');


function isures_2718_prod_viewed_atts()
{
    ob_start();
    $viewed_products = !empty($_COOKIE['woocommerce_recently_viewed']) ? (array) explode('|', wp_unslash($_COOKIE['woocommerce_recently_viewed'])) : array();
    $viewed_products = array_reverse(array_filter(array_map('absint', $viewed_products)));



?>
    <div id="isures-recently--wrap">

        <div class="isures-container">
            <?php
            if (!empty($viewed_products)) {
                //  echo do_shortcode('[products type="row" limit="8" columns="5" ids="' . implode(',', $viewed_products) . '"]');
                echo do_shortcode('[ux_products style="normal" slider_nav_style="circle" slider_nav_color="light" slider_nav_position="outside" show_cat="0" equalize_box="0" products="10" text_align="left" text_padding="15px 0px 25px 15px" ids="' . implode(',', $viewed_products) . '"] ');
            } else {
                echo 'Không có sản phẩm xem gần đây';
            }

            ?>
        </div>
    </div>

<?php
    return ob_get_clean();
}
?>

<?php
function block_top_news_in_product_category()
{
    if (is_product_category()) {
        echo do_shortcode('[block id="product-page-header"]');
    };
}
add_action('flatsome_after_header', 'block_top_news_in_product_category');

function block_bottom_news_in_category()
{
    if (is_category() || is_tag()) {
        echo do_shortcode('[block id="blog-layout-header"]');
    };
}
add_action('flatsome_after_header', 'block_bottom_news_in_category');


function remove_flatsome_blog_elements()
{
    // Remove the excerpt if added via a hook
    remove_action('flatsome_after_blog_post', 'from_the_blog_excerpt');

    // Remove the "Read More" button if added via a hook
    remove_action('flatsome_after_blog_post', 'the_content_more_link');
}
add_action('wp', 'remove_flatsome_blog_elements');

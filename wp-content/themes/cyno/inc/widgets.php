<?php
/*
 * Khởi tạo widget item
 */
add_action('widgets_init', 'create_thachpham_widget');
function create_thachpham_widget()
{
    register_widget('Thachpham_Widget');
}

/**
 * Tạo class Thachpham_Widget
 */
class Thachpham_Widget extends WP_Widget
{
    /**
     * Thiết lập widget: đặt tên, base ID
     */
    function __construct()
    {
        parent::__construct(
            'product-brands_widget', // id của widget
            'Product Brand Widget', // tên của widget
            array(
                'description' => 'Mô tả của widget' // mô tả
            )
        );
    }


    function form($instance)
    {


        $default = array(
            'title' => 'Tiêu đề widget',
        );
        $instance = wp_parse_args((array) $instance, $default);
        $title = esc_attr($instance['title']);


        echo '<p>Nhập tiêu đề <input type="text" class="widefat" name="' . $this->get_field_name('title') . '" value="' . $title . '"/></p>';
    }


    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }



    /**
     * Show widget
     */


    function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $terms = get_terms(array(
            'taxonomy'   => 'brand',
            'hide_empty' => false,
        ));


        if (!empty($terms)) :
            echo $before_widget;
            echo $before_title . $title . $after_title;
            echo '<ul class ="list-brand">';
            foreach ($terms as $term) {
                // $image = get_field('logo_brand',$term->taxonomy.'_'.$term->term_id);
                if (!empty($image)) {
                    echo '<li class="list-brand__item">';
                    echo  '<a href="' . esc_url(get_term_link($term)) . '" alt="' . esc_attr(sprintf(__('View all post filed under %s', 'cyno'), $term->name)) . '">' .  wp_get_attachment_image($image, 'full', false, '') . '</a>';
                    echo '</li>';
                } else {
                    echo '<li class="list-brand__item list-brand__item--no-image">';
                    echo  '<a href="' . esc_url(get_term_link($term)) . '" alt="' . esc_attr(sprintf(__('View all post filed under %s', 'cyno'), $term->name)) . '">' .  $term->name . '</a>';
                    echo '</li>';
                }
            }
            echo '</ul>';
            echo $after_widget;
        endif;
    }
}

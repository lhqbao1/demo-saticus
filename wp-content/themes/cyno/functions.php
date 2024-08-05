<?php
if (!defined('ABSPATH')) exit;

define('THEME_INCLUDES_DIR', get_stylesheet_directory() . '/inc');
define('THEME_BLOCKS_DIR', get_stylesheet_directory() . '/blocks');
define('THEME_CLASSES_DIR', THEME_INCLUDES_DIR . '/classes');
define('THEME_ASSETS_URI', get_stylesheet_directory_uri() . '/assets');
define('THEME_VENDOR_ASSETS_URI', get_stylesheet_directory_uri() . '/vendor-assets');
define('THEME_VERSION', wp_get_theme()->get('Version'));


require_once THEME_INCLUDES_DIR . '/child-theme-init.php';

//add action show custom taxonomy
add_action('woocommerce_product_meta_end', 'action_product_meta_end');
function action_product_meta_end()
{
    global $product;

    $taxonomy = 'brand'; // <== Here set your custom taxonomy

    if (!taxonomy_exists($taxonomy))
        return; // exit

    $term_ids = wp_get_post_terms($product->get_id(), $taxonomy, array('fields' => 'ids'));

    if (!empty($term_ids)) {
        echo get_the_term_list($product->get_id(), $taxonomy, '<span class="posted_in">' . _n('Thương hiệu:', 'Thương hiệu:', count($term_ids), 'woocommerce') . ' ', ', ', '</span>');
    }
}

function tao_custom_post_type()
{


    /*
     * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
     */
    $label = array(
        "name" => "Khách hàng", //Tên post type dạng số nhiều
        "singular_name" => "Khách hàng" //Tên post type dạng số ít
    );


    /*
     * Biến $args là những tham số quan trọng trong Post Type
     */
    $args = array(
        "labels" => $label, //Gọi các label trong biến $label ở trên
        "description" => "Post type đăng khách hàng", //Mô tả của post type
        "supports" => array(
            "title",
            "editor",
            "excerpt",
            "author",
            "thumbnail",
            "comments",
            "trackbacks",
            "revisions",
            "custom-fields"
        ), //Các tính năng được hỗ trợ trong post type
        "taxonomies" => array("category", "post_tag"), //Các taxonomy được phép sử dụng để phân loại nội dung
        "hierarchical" => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        "public" => true, //Kích hoạt post type
        "show_ui" => true, //Hiển thị khung quản trị như Post/Page
        "show_in_menu" => true, //Hiển thị trên Admin Menu (tay trái)
        "show_in_nav_menus" => true, //Hiển thị trong Appearance -> Menus
        "show_in_admin_bar" => true, //Hiển thị trên thanh Admin bar màu đen.
        "menu_position" => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        "menu_icon" => "", //Đường dẫn tới icon sẽ hiển thị
        "can_export" => true, //Có thể export nội dung bằng Tools -> Export
        "has_archive" => true, //Cho phép lưu trữ (month, date, year)
        "exclude_from_search" => false, //Loại bỏ khỏi kết quả tìm kiếm
        "publicly_queryable" => true, //Hiển thị các tham số trong query, phải đặt true
        "capability_type" => "post" //
    );


    register_post_type("khachhang", $args); //Tạo post type với slug tên là khach hang và các tham số trong biến $args ở trên

}
/* Kích hoạt hàm tạo custom post type */
add_action("init", "tao_custom_post_type");

add_filter("pre_get_posts", "lay_custom_post_type");
function lay_custom_post_type($query)
{
    if (is_home() && $query->is_main_query())
        $query->set("post_type", array("post", "khachhang"));
    return $query;
}

$new_query = new WP_Query("post_type = khachhang");

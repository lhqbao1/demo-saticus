<?php
/*
 * Tạo page template hiển thị danh sách các coupon mới
 Template Name: Coupon
 */
//Đoạn này để lấy các thông số trong file header.php ra, bao gồm các đoạn nhúng file CSS và JS. Bắt buộc phải nhập
get_header();
//End header
?>
<!—Lấy cấu trúc của theme đang dùng, đoạn này áp dụng cho theme TwentyTwelve—>
    <div id="content" role="main">
        <div class="row align-center">
            <div class="large-12 col">
                <div id="customer-list" class="row">
                    <?php
                    //Khai báo tên post type sẽ được hiển thị và số bài hiển thị mỗi trang
                    $args = array("post_type" => "khachhang", "posts_per_page" => 10);
                    $loop = new WP_Query($args);
                    while ($loop->have_posts()) : $loop->the_post();
                        echo "<div class='customer-item col large-3'>"
                    ?>
                        <header class="entry-header">
                            <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" class="entry-title"><?php the_title(); ?></a></h1>
                        </header>
                    <?php
                        if (has_post_thumbnail()) {
                            echo '<div class="entry-thumbnail">';
                            echo '<img src="' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '" style="height: 200px; width: full;" />';
                            echo '</div>';
                        };
                        echo "</div>";
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!– #content –>
        <!– #primary –>
            <?php get_footer(); ?>
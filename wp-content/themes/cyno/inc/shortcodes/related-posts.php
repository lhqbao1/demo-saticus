<?php
/**
 * Related posts
 * 
  */

function related_post_by_category() {
    $output = '';
    if (is_single()) {
      global $post;
      $categories = get_the_category($post->ID);

      if ($categories) {
        $category_ids = array();
        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
        $args=array(
          'category__in'        => $category_ids,
          'post__not_in'        => array($post->ID),
          'posts_per_page'      => 6,
          'ignore_sticky_posts' => 1
        );
         
        $my_query = new wp_query( $args );
        if( $my_query->have_posts() ):
            $output .= '<div class="related-post">';
                $output .= '<h3 class="related-title-box">';
               	$output .=  __("Bài viết liên quan","cyno");
                $output .= ' </h3><ul class="related-post__items">';
                    while ($my_query->have_posts()):$my_query->the_post();
                    $output .= 
                        '<li class="related-post__post">
                          '.get_the_post_thumbnail().'
                          <a href="'.get_the_permalink().'" title="'.get_the_title().'" class="post-title">'.get_the_title().'</a>
                        </li>';
                    endwhile;
                $output .= '</ul>';
            $output .= '</div>';
        endif;   //End if.
      wp_reset_query();
    }
    return $output;
  }
}
add_shortcode('related-post','related_post_by_category');

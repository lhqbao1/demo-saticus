<?php 
function cyno_ux_video_button( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'video' => 'https://www.youtube.com/watch?v=f3Hh_qSkpaA',
    'aria_label' => "View Video",
		'size'  => '',
	), $atts ) );
	if ( $size ) {
		$size = 'style="font-size:' . $size . '%"';
	}

	return '<div class="video-button-wrapper" ' . $size . '><a href="' . $video . '" class="button open-video icon circle is-outline is-xlarge" aria-label="'. $aria_label .'">' . get_flatsome_icon( 'icon-play', '1.5em' ) . '</a></div>';
}

add_shortcode( 'cyno_video_button', 'cyno_ux_video_button' );
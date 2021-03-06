<?php
$output = $title = $type = $onclick = $custom_links = $img_size = $custom_links_target = $images = $el_class = $interval = $column_number =  '';
extract(shortcode_atts(array(
    'title'                 => '',
    'type'                  => 'flexslider',
    'img_size'              => 'full',
    'images'                => '',
    'el_class'              => '',
    'interval'              => '5',
	'column_number'         => '3',
    'grayscale'             => 'no',
    'choose_frame'             => 'no'
), $atts));
$gal_images = '';
$link_start = '';
$link_end = '';
$el_start = '';
$el_end = '';
$slides_wrap_start = '';
$slides_wrap_end = '';

$el_class = $this->getExtraClass($el_class);

if ( $type == 'nivo' ) {
    $type = ' wpb_slider_nivo theme-default';
    wp_enqueue_script( 'nivo-slider' );
    wp_enqueue_style( 'nivo-slider-css' );
    wp_enqueue_style( 'nivo-slider-theme' );

    $slides_wrap_start = '<div class="nivoSlider">';
    $slides_wrap_end = '</div>';
} else if ( $type == 'flexslider' || $type == 'flexslider_fade' || $type == 'flexslider_slide' || $type == 'fading' ) {
    $el_start = '<li>';
    $el_end = '</li>';
    $slides_wrap_start = '<ul class="slides">';
    $slides_wrap_end = '</ul>';
} else if ( $type == 'image_grid' ) {
    wp_enqueue_script( 'isotope' );
    $li_classes = '';
    if($grayscale == 'yes') {
        $li_classes .= 'grayscale';
    } else {
        $li_classes .= 'no_grayscale';
    }

    $el_start = '<li class="'.$li_classes.'">';
    $el_end = '</li>';
    $slides_wrap_start = '<div class="gallery_holder"><ul class="gallery_inner v'. $column_number .'">';
    $slides_wrap_end = '</ul></div>';
}

$flex_fx = '';
$frame_class='';
if ( $type == 'flexslider' || $type == 'flexslider_fade' || $type == 'fading' ) {
    $type = ' wpb_flexslider flexslider_fade flexslider';
    $flex_fx = ' data-flex_fx="fade"';
} else if ( $type == 'flexslider_slide' ) {
    $type = ' wpb_flexslider flexslider_slide flexslider';
    $flex_fx = ' data-flex_fx="slide"';
    if($frame == "use_frame"){
        $frame_class = " have_frame";
    }
} else if ( $type == 'image_grid' ) {
    $type = ' wpb_image_grid';
}

if ( $images == '' ) $images = '-1,-2,-3';
$images = explode( ',', $images);
$i = -1;

foreach ( $images as $attach_id ) {
    $i++;
    if ($attach_id > 0) {
        $post_thumbnail = wpb_getImageBySize(array( 'attach_id' => $attach_id, 'thumb_size' => $img_size ));
    }
    else {
        $different_kitten = 400 + $i;
        $post_thumbnail = array();
        $post_thumbnail['thumbnail'] = '<img src="http://placekitten.com/g/'.$different_kitten.'/300" />';
        $post_thumbnail['p_img_large'][0] = 'http://placekitten.com/g/1024/768';
    }

    $thumbnail = $post_thumbnail['thumbnail'];
    $p_img_large = $post_thumbnail['p_img_large'];
    $link_start = $link_end = '';
	$hover_image = '';

	if($type == ' wpb_image_grid' && $grayscale == 'no') {
		$hover_image = '<span class="gallery_hover"><i class="fa fa-search"></i></span>';
	}

    if ( $onclick == 'link_image' ) {
        $link_start = '<a  href="'.$p_img_large[0].'">' . $hover_image;
        $link_end = '</a>';
    }

    $gal_images .= $el_start . $link_start . $thumbnail . $link_end . $el_end;
}
$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_gallery wpb_content_element'.$el_class.' clearfix', $this->settings['base']);

$output .= "\n\t".'<div class="'.$css_class.'">';
$output .= "\n\t\t".'<div class="wpb_wrapper">';
$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_gallery_heading'));
$output .= '<div class="wpb_gallery_slides' . $type . $frame_class .'" data-interval="'.$interval.'"'.$flex_fx.'>'.$slides_wrap_start.$gal_images.$slides_wrap_end;
$output.='</div>';
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment('.wpb_gallery');

echo $output;
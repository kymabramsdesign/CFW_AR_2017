<?php
$shopid = get_option('woocommerce_shop_page_id'); 

$slider  = '';
$mSlider = get_post_meta($shopid, "slider", true);

//Layerslider
if( 'no-slider' != $mSlider )
{
    $slider = $mSlider;
}

//Slider
if('' != $slider && function_exists('layerslider'))
{
    layerslider($slider);
}
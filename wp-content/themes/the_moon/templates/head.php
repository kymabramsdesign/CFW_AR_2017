<?php
$slider  = '';
$mSlider = px_get_meta('slider');

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
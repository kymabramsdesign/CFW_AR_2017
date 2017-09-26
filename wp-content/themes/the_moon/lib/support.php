<?php

function px_add_image_size_retina($name, $width = 0, $height = 0, $crop = false)
{
    add_image_size($name, $width, $height, $crop);
    add_image_size("$name@2x", $width*2, $height*2, $crop);
}

/*-----------------------------------------------------------------------------------*/
/*  Configure WP2.9+ Thumbnails
/*-----------------------------------------------------------------------------------*/

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );

    //featured image thumbnail show in  admin columns
    add_image_size( 'admin-list-thumb', 50, 50, true );
    
    //set_post_thumbnail_size( 480, 300, true );
    px_add_image_size_retina( 'post-thumbnail', 800, 340, true );
    px_add_image_size_retina( 'post-single', 870, 440, true );
    
    //Portfolio thumbnails
    px_add_image_size_retina('thumbnail-square', 317, 250, true);
    px_add_image_size_retina('thumbnail-big', 650, 500, true);
    px_add_image_size_retina('thumbnail-slim', 325, 500, true);
    px_add_image_size_retina('thumbnail-hslim', 650, 250, true);
    
    //pix flow Image Slider Shortcode 
    px_add_image_size_retina('pixflow-image-slider', 1000, 505, true);
    
    //Portfolio single
    px_add_image_size_retina('portfolio-single', 1170, 490, true);//More suited for wide images

}
/*-----------------------------------------------------------------------------------*/
/*  RSS Feeds
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/*  Post Formats
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'post-formats', array('gallery' , 'video', 'audio' , 'link' ) );
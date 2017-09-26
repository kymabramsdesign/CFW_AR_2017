<?php

require_once('post-type.php');

class PxCarousel extends PxPostType
{

    function __construct()
    {
        parent::__construct('carousel');
    }

    function Px_CreatePostType()
    {
        $labels = array(
            'name' => __( 'Carousel', TEXTDOMAIN),
            'singular_name' => __( 'carousel', TEXTDOMAIN ),
            'add_new' => __('Add New', TEXTDOMAIN),
            'add_new_item' => __('Add New Carousel', TEXTDOMAIN),
            'edit_item' => __('Edit Carousel', TEXTDOMAIN),
            'new_item' => __('New Carousel', TEXTDOMAIN),
            'view_item' => __('View Carousel', TEXTDOMAIN),
            'search_items' => __('Search Carousel', TEXTDOMAIN),
            'not_found' =>  __('No Carousel found', TEXTDOMAIN),
            'not_found_in_trash' => __('No Carousel found in Trash', TEXTDOMAIN),
            'parent_item_colon' => ''
        );

        $args = array(
            'labels' =>  $labels,
            'public' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_icon' => THEME_IMAGES_URI . '/post-format-icon/crousel-icon.png',
            'rewrite' => array('slug' => __( 'carousel', TEXTDOMAIN ), 'with_front' => true),
            'supports' => array('title',
                'title',
                'tags',
                'editor',
            )
        );

        register_post_type( $this->postType, $args );

        /* Register the corresponding taxonomy */
        register_taxonomy('carousel_category', $this->postType,
            array(
                "hierarchical" => true,
                "label" => __( "Carousel Category", TEXTDOMAIN ),
                "singular_label" => __( "Carousels Category",  TEXTDOMAIN ),
                "rewrite" => false
            ));
    }

    function Px_RegisterScripts()
    {
        wp_register_script('carousel', THEME_LIB_URI . '/post-types/js/carousel.js', array('jquery'), THEME_VERSION);
        parent::Px_RegisterScripts();
    }

    function Px_EnqueueScripts()
    {
        wp_enqueue_script('hoverIntent');
        wp_enqueue_script('jquery-easing');

        wp_enqueue_script('colorpicker0');
        wp_enqueue_style('colorpicker0');

        wp_enqueue_style('theme-admin');
        wp_enqueue_script('theme-admin');
        
        wp_enqueue_script('carousel');
        
    }

    function Px_OnProcessFieldForStore($post_id, $key, $settings)
    {
        //Process media field
        if($key != 'media')
            return false;

        $selectedOpt = $_POST[$key];
        
        return false;
    }

    protected function Px_GetOptions()
    {
        $fields = array(
            'carousel-image' => array(
                'type'  => 'upload',
                'title' => __('Carousel Image', TEXTDOMAIN),
                //'referer' => 'px-carousel-image',
                'referer' => 'px-post-gallery-image',
                'meta'  => array('array'=>true),
            ),
			'carousel-alts' => array(
                'type' => 'text',
                'placeholder' => __('Optional string for alt attribute on image', TEXTDOMAIN),
            ),
			'carousel-link' => array(
                'type' => 'text',
                'placeholder' => __('Optional url to another web page', TEXTDOMAIN),
            ),
            'carousel-traget-link' => array(
                'type' => 'select',
                'options' => array('_self'=>__('Open in same window', TEXTDOMAIN), '_blank'=>__('Open in new window', TEXTDOMAIN)),
            ),
        );

        //Option sections
        $options = array (
            'carousel-image' => array(
                'title'   => __('carousel Image', TEXTDOMAIN),
                'tooltip' => __('Upload your carousel Image here.', TEXTDOMAIN),
                'fields'  => array(
                    'carousel-image' => $fields['carousel-image']
                )
            ),//images alt
            'carousel-alts' => array(
                'title'   => __('carousel Alt attribute', TEXTDOMAIN),
                'tooltip' => __('Optional url to another web page', TEXTDOMAIN),
                'fields'  => array(
                    'carousel-alts' => $fields['carousel-alts'],
                )
            ),//images sec
            'carousel-link' => array(
                'title'   => __('carousel Link', TEXTDOMAIN),
                'tooltip' => __('Enter Optional url to another web page', TEXTDOMAIN),
                'fields'  => array(
                    'carousel-link' => $fields['carousel-link'],
                )
            ),//carousel link
            'carousel-traget-link' => array(
                'title'   => __('Link\'s target', TEXTDOMAIN),
                'tooltip' => __('Open the link in the same tab or a blank browser tab', TEXTDOMAIN),
                'fields'  => array(
                    'carousel-traget-link' => $fields['carousel-traget-link'],
                )
            ),//carousel target
        );

        return array(
            array(
                'id' => 'PxCarousel_meta_box',
                'title' => __('Carousel Options', TEXTDOMAIN),
                'context' => 'normal',
                'priority' => 'default',
                'options' => $options,
            )//Meta box
        );
    }
}

new PxCarousel();
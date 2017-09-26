<?php

require_once('post-type.php');

class PxTestimonial extends PxPostType
{

    function __construct()
    {
        parent::__construct('testimonial');
    }

    function Px_CreatePostType()
    {
        $labels = array(
            'name' => __( 'Testimonial', TEXTDOMAIN),
            'singular_name' => __( 'testimonial', TEXTDOMAIN ),
            'add_new' => __('Add New', TEXTDOMAIN),
            'add_new_item' => __('Add New Testimonial', TEXTDOMAIN),
            'edit_item' => __('Edit Testimonial', TEXTDOMAIN),
            'new_item' => __('New Testimonial', TEXTDOMAIN),
            'view_item' => __('View Testimonial', TEXTDOMAIN),
            'search_items' => __('Search Testimonial', TEXTDOMAIN),
            'not_found' =>  __('No Testimonial found', TEXTDOMAIN),
            'not_found_in_trash' => __('No Testimonial found in Trash', TEXTDOMAIN),
            'parent_item_colon' => ''
        );

        $args = array(
            'labels' =>  $labels,
            'public' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_icon' => THEME_IMAGES_URI . '/post-format-icon/testimonials-icon.png',
            'rewrite' => array('slug' => __( 'testimonial', TEXTDOMAIN ), 'with_front' => true),
            'supports' => array(
                'title',
                'tags',
                'editor',
            )
        );

        register_post_type( $this->postType, $args );

        /* Register the corresponding taxonomy */
        register_taxonomy('testimonials_category', $this->postType,
            array(
                "hierarchical" => true,
                "label" => __( "Testimonials Category", TEXTDOMAIN ),
                "singular_label" => __( "Testimonials Category",  TEXTDOMAIN ),
                "rewrite" => false
            ));
    }

    function Px_RegisterScripts()
    {
        wp_register_script('testimonial', THEME_LIB_URI . '/post-types/js/testimonial.js', array('jquery'), THEME_VERSION);
        
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

        wp_enqueue_script('testimonial');
    }

    function Px_OnProcessFieldForStore($post_id, $key, $settings)
    {
        //Process media field
        if($key != 'media')
            return false;

        $selectedOpt = $_POST[$key];


        switch($selectedOpt)
        {
            case "image":
            {
                //delete video meta
                delete_post_meta($post_id, "video-type");
                delete_post_meta($post_id, "video-id");

                $images = $_POST["image"];

                //Filter results
                $images = array_filter( array_map( 'trim', $images ), 'strlen' );
                //ReIndex
                $images = array_values($images);

                update_post_meta( $post_id, "image", $images );

                break;
            }
            case "video":
            {
                //Delete images
                delete_post_meta($post_id, "image");

                $videoType = $_POST["video-type"];
                $videoId   = $_POST["video-id"];

                update_post_meta( $post_id, "video-type", $videoType );
                update_post_meta( $post_id, "video-id", $videoId );

                break;
            }
            default:
            {
                //Delete all
                delete_post_meta($post_id, "video-type");
                delete_post_meta($post_id, "video-id");
                delete_post_meta($post_id, "image");

                break;
            }
        }

        return false;
    }

    protected function Px_GetOptions()
    {
        $fields = array(
            'testimonial-image' => array(
                'type'  => 'upload',
                'title' => __('testimonial Image', TEXTDOMAIN),
                'referer' => 'px-settings-testimonial-image',
            ),
            'testimonial-text' => array(
                'type' => 'textarea',
                'label' => __('testimonial text', TEXTDOMAIN),
                'placeholder' => __('testimonial text', TEXTDOMAIN),
            ),
            'testimonial-authorname' => array(
                'type' => 'text',
                'placeholder' => __('Name of person who said the opinion', TEXTDOMAIN),
            ),
        );

        //Option sections
        $options = array (
            'testimonial-image' => array(
                'title'   => __('testimonial Image', TEXTDOMAIN),
                'tooltip' => __('Upload your testimonial Image here.', TEXTDOMAIN),
                'fields'  => array(
                    'testimonial-image' => $fields['testimonial-image']
                )
            ),//images sec
            'testimonial-text' => array(
                'title'   => __('testimonial text', TEXTDOMAIN),
                'tooltip' => __('Enter the opinion here', TEXTDOMAIN),
                'fields'  => array(
                    'testimonial-text' => $fields['testimonial-text'],
                )
            ),//testimonial text
            'testimonial-authorname' => array(
                'title'   => __('Name', TEXTDOMAIN),
                'tooltip' => __('Name of person who said the opinion', TEXTDOMAIN),
                'fields'  => array(
                    'testimonial-authorname' => $fields['testimonial-authorname'],
                )
            ),//testimonial authorname
        );

        return array(
            array(
                'id' => 'PxTestimonial_meta_box',
                'title' => __('testimonial Options', TEXTDOMAIN),
                'context' => 'normal',
                'priority' => 'default',
                'options' => $options,
            )//Meta box
        );
    }
}

new PxTestimonial();
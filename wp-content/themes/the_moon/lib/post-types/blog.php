<?php

require_once('post-type.php');

class PxBlog extends PxPostType
{
    function __construct()
    {
        parent::__construct('post');
    }

    function Px_RegisterScripts()
    {
        wp_register_script('blog', THEME_LIB_URI . '/post-types/js/blog.js', array('jquery'), THEME_VERSION);
        parent::Px_RegisterScripts();
    }

    function Px_EnqueueScripts()
    {
        wp_enqueue_script('hoverIntent');
        wp_enqueue_script('jquery-easing');
        
        wp_enqueue_script('nouislider');
        wp_enqueue_style('nouislider');

        wp_enqueue_script('colorpicker0');
        wp_enqueue_style('colorpicker0');

        wp_enqueue_style('theme-admin');
        wp_enqueue_script('theme-admin');

        wp_enqueue_script('blog');
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

                $images = $_POST["gallery"];

                update_post_meta( $post_id, "gallery", $images );

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
            'toggle-mode' => array(
                'type' => 'select',
                'options' => array('1'=>__('Open', TEXTDOMAIN), '0'=>__('Close', TEXTDOMAIN)),
            ),
          'post-social-share' => array(
                'type'   => 'switch',
                'label'  => __('Display post social share icon', TEXTDOMAIN),
                'state0' => __('Don\'t Show', TEXTDOMAIN),
                'state1' => __('Show', TEXTDOMAIN),
                'default'   => 0
            ),
            'media' => array(
                'type' => 'select',
                'options' => array(
                    'none'  => __( "None",   TEXTDOMAIN ),
                    'gallery' => __( "Slideshow",  TEXTDOMAIN ),
                    'video' => __( "Video",  TEXTDOMAIN ),
                    'video_gallery' => __( "Video & Slideshow",  TEXTDOMAIN ),
                    'audio' => __( "Audio",  TEXTDOMAIN ),
                    'audio_gallery' => __( "Audio & Slideshow",  TEXTDOMAIN )
                ),
            ),
            'video-type' => array(
                'type' => 'select',
                'options' => array(
                    'vimeo' => __( "Vimeo",  TEXTDOMAIN ),
                    'youtube' => __( "YouTube",  TEXTDOMAIN ),
                ),
            ),
            'video-id' => array(
                'type' => 'text',
                'placeholder' => __('Video URL', TEXTDOMAIN),
            ),//video id
            'audio-url' => array(
                'type' => 'text',
                'placeholder' => __('Audio URL', TEXTDOMAIN),
            ),//Audio url
            'gallery' => array(
                'type'  => 'upload',
                'title' => __('Gallery Image', TEXTDOMAIN),
                'referer' => 'px-post-gallery-image',
                'meta'  => array('array'=>true),
            ),
			'seo_description' => array(
				'type' => 'text',
				'label'=> __('Post SEO Description :', TEXTDOMAIN),
				'placeholder' => __('SEO Description', TEXTDOMAIN),
			),//SEO Description
			'seo_keywords' => array(
				'type' => 'text',
				'label'=> __('Post SEO Key Words :', TEXTDOMAIN),
				'placeholder' => __('SEO Key Words', TEXTDOMAIN),
			),//SEO Key Words   
        );

        //Option sections
        $options = array(
            'toggle-mode' => array(
                'title'   => __('Post Toggle Mode : ', TEXTDOMAIN),
                'tooltip' => __('Choose to set the blog toggle be open or closed.', TEXTDOMAIN),
                'fields'  => array(
                    'toggle-mode' => $fields['toggle-mode']
                )
            ),// Post Toggle Mode
           'post-social-share' => array(
                'title'   => __('Display social share icons', TEXTDOMAIN),
                'tooltip' => __('Choose to Show or Not to show social share icons in blog detail', TEXTDOMAIN),
                'fields'  => array(
                    'post-social-share' => $fields['post-social-share'],
                )
            ),//Enable And Disable social share icon in blog detail
            'media' => array(
                'title'   => __('Display Media Type', TEXTDOMAIN),
                'tooltip' => __('Specify what kind of media (Image(s), Video , Audio , Video and Image(s) or Audio and Image(s)) you would like to be displayed in  blog detail page. You can always use shortcodes to add other media types in content', TEXTDOMAIN),
                'fields'  => array(
                    'media' => $fields['media']
                )
            ),//media sec
             'video' => array(
                'title'   => __('Post Video', TEXTDOMAIN),
                'tooltip' => __('Set Video ID here. Please refer to documentation for learning how to obtain your video ID.', TEXTDOMAIN),
                'fields'  => array(
                    'video-type' => $fields['video-type'],
                    'video-id' => $fields['video-id'],
                )
            ),//Video sec
            'audio' => array(
                'title'   => __('Post Audio', TEXTDOMAIN),
                'tooltip' => __('You can enter audio url hosted in SoundCloud', TEXTDOMAIN),
                'fields'  => array(
                    'audio-url' => $fields['audio-url'],
                )
            ),//Audio sec
            'gallery' => array(
                'title'   => __('Post Gallery', TEXTDOMAIN),
                'tooltip' => __('Upload images to be shown in blog detail page slider', TEXTDOMAIN),
                'fields'  => array(
                    'gallery' => $fields['gallery'],
                )
            ),
			'seo_description' => array(
				'title'   => __('Seo Description', TEXTDOMAIN),
				'tooltip' => __('Enter a description for using as seo description in search engine results', TEXTDOMAIN),
				'fields'  => array(
				    'seo_description' => $fields['seo_description'],
				)
			),//SEO Description
			'seo_keywords' => array(
				'title'   => __('Seo Key Words', TEXTDOMAIN),
				'tooltip' => __('Enter Keywords for using in search engines results ( comma separated)', TEXTDOMAIN),
				'fields'  => array(
				    'seo_keywords' => $fields['seo_keywords'],
			    )
			),//SEO Key Words
        );

        return array(
            array(
                'id' => 'blog_meta_box',
                'title' => __('Settings', TEXTDOMAIN),
                'context' => 'normal',
                'priority' => 'default',
                'options' => $options,
            )//Meta box
        );
    }
}

new PxBlog();
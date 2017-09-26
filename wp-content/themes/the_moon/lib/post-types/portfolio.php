<?php

require_once('post-type.php');

class PxPortfolio extends PxPostType
{

    function __construct()
    {
        parent::__construct('portfolio');
    }

    function Px_CreatePostType()
    {
        $labels = array(
            'name' => __( 'Portfolio', TEXTDOMAIN),
            'singular_name' => __( 'Portfolio', TEXTDOMAIN ),
            'add_new' => __('Add New', TEXTDOMAIN),
            'add_new_item' => __('Add New Portfolio', TEXTDOMAIN),
            'edit_item' => __('Edit Portfolio', TEXTDOMAIN),
            'new_item' => __('New Portfolio', TEXTDOMAIN),
            'view_item' => __('View Portfolio', TEXTDOMAIN),
            'search_items' => __('Search Portfolio', TEXTDOMAIN),
            'not_found' =>  __('No portfolios found', TEXTDOMAIN),
            'not_found_in_trash' => __('No portfolios found in Trash', TEXTDOMAIN),
            'parent_item_colon' => ''
        );

        $args = array(
            'labels' =>  $labels,
            'public' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_icon' => THEME_IMAGES_URI . '/post-format-icon/portfolio-icon.png',
            'rewrite' => array('slug' => __( 'portfolios', TEXTDOMAIN ), 'with_front' => true),
            'supports' => array('title',
                'editor',
                'thumbnail', 
                'tags',
                'post-formats'
            )
        );

        register_post_type( $this->postType, $args );

        /* Register the corresponding taxonomy */

        register_taxonomy('skills', $this->postType,
            array("hierarchical" => true,
                "label" => __( "Skills", TEXTDOMAIN ),
                "singular_label" => __( "Skill",  TEXTDOMAIN ),
                "rewrite" => array( 'slug' => 'skills','hierarchical' => true),
            ));
    }

    function Px_RegisterScripts()
    {
        wp_register_script('portfolio', THEME_LIB_URI . '/post-types/js/portfolio.js', array('jquery'), THEME_VERSION);

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

        wp_enqueue_script('portfolio');
    }

    function Px_OnProcessFieldForStore($post_id, $key, $settings)
    {

        $selectedOpt = $_POST[$key];
        
        //Save Portfolio Attributes Titles
        $attributesTitles = $_POST["attribute-title"];
        $attributes = array_filter( array_map( 'trim', $attributesTitles ), 'strlen' );
        $attributes = array_values($attributesTitles);
        update_post_meta( $post_id, "attribute-title", $attributes );
        //Save Portfolio Attributes Values
        $attributesValue = $_POST["attribute-value"];
        $attributes = array_filter( array_map( 'trim', $attributesValue ), 'strlen' );
        $attributes = array_values($attributesValue);
        update_post_meta( $post_id, "attribute-value", $attributes );


        return false;
    }

    protected function Px_GetOptions()
    {
        $fields = array(
            'image' => array(
                'type'  => 'upload',
                'title' => __('Portfolio Image', TEXTDOMAIN),
                'referer' => 'px-portfolio-image',
                'meta'  => array('array'=>true),
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
            'link-url' => array(
                'type' => 'text',
                'placeholder' => __('URL', TEXTDOMAIN),
            ),//link
            'portfolio-featured-size' => array(
                'type' => 'visual-select',
                'title' => 'choose your portfolio post size',
                'label'=> __('Portfolio Thumbnail Size', TEXTDOMAIN),
                'options' => array('square' =>'square', 'big'=> 'big', 'slim'=>'slim','hslim'=>'hslim'),
            ),
            'portfolio-hover-subtitle' => array(
                'type' => 'text',
                'placeholder' => __('Portfolio hover subtitle', TEXTDOMAIN),
            ),//portfolio hover Subtitle\
            'portfolio-social-share' => array(
                'type'   => 'switch',
                'label'  => __('Display post social share icon', TEXTDOMAIN),
                'state0' => __('Don\'t Show', TEXTDOMAIN),
                'state1' => __('Show', TEXTDOMAIN),
                'default'   => 0
            ),
            'project-title' => array(
                'type'  => 'text',
                'class' => 'project-title',
                'placeholder' => __('Project Details Title', TEXTDOMAIN),
            ),//Attribute Title
            'attribute-title' => array(
                'type'  => 'text',
                'class' => 'attribute-title',
                'placeholder' => __('Attribute Title', TEXTDOMAIN),
                'meta'  => array('array'=>true, 'dontsave'=>true),//This will indirectly get saved
            ),//Attribute Title
            'attribute-value' => array(
                'type'  => 'text',
                'class' => 'attribute-value',
                'placeholder' => __('Attribute Value', TEXTDOMAIN),
                'meta'  => array('array'=>true, 'dontsave'=>true),//This will indirectly get saved
            ),//SEO Description
			'seo_description' => array(
				'type' => 'text',
				'label'=> __('Post SEO Description :', TEXTDOMAIN),
				'placeholder' => __('SEO Description', TEXTDOMAIN),
			),//SEO Key Words
			'seo_keywords' => array(
				'type' => 'text',
				'label'=> __('Post SEO Key Words :', TEXTDOMAIN),
				'placeholder' => __('SEO Key Words', TEXTDOMAIN),
			),
        );
	
	
	
	
        //Option sections
        $options = array(
            'featured-size' => array(
                'title'   => __('Portfolio Tumbnail Size', TEXTDOMAIN),
                'tooltip' => __('Choose a size for the post in the grid.', TEXTDOMAIN),
                'fields'  => array(
                    'portfolio-featured-size' => $fields['portfolio-featured-size'],
                )
            ),//Portfolio Tumbnail Size
            'gallery' => array(
                'title'   => __('Portfolio Images', TEXTDOMAIN),
                'tooltip' => __('Upload your portfolio Image(s) here. If you upload more than one image it will be shown as slider', TEXTDOMAIN),
                'fields'  => array(
                    'image' => $fields['image']
                )
            ),//images sec
            'video' => array(
                'title'   => __('Portfolio Video', TEXTDOMAIN),
                'tooltip' => __('Set Video ID of your portfolio here. Please refer to documentation for learning how to obtain your video ID. You could upload more info in the content area', TEXTDOMAIN),
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
            'link' => array(
                'title'   => __('Post Link', TEXTDOMAIN),
                'tooltip' => __('You can enter url that link to another website.', TEXTDOMAIN),
                'fields'  => array(
                    'link-url' => $fields['link-url'],
                )
            ),//Audio sec
            'portfolio-hover-subtitle' => array(
                'title'   => __('Portfolio Hover Subtitle', TEXTDOMAIN),
                'tooltip' => __('Enter Your portfolio Subtitle here.', TEXTDOMAIN),
                'fields'  => array(
                    'portfolio-hover-subtitle' => $fields['portfolio-hover-subtitle'],
                )
            ),//portfolio hover Subtitle sec
            'portfolio-social-share' => array(
                'title'   => __('Portfolio Social Share', TEXTDOMAIN),
                'tooltip' => __('Enter Your portfolio Subtitle here.', TEXTDOMAIN),
                'fields'  => array(
                    'portfolio-social-share' => $fields['portfolio-social-share'],
                )
            ),//portfolio social share icon sec
            'project-title' => array(
                'title'   => __('Project Details Title', TEXTDOMAIN),
                'tooltip' => __('Enter project Details Title here.', TEXTDOMAIN),
                'fields'  => array(
                    'project-title' => $fields['project-title'],
                )
            ),//Project Title
            'attribute' => array(
                'title'   => __('Portfolio Attributes', TEXTDOMAIN),
                'tooltip' => __('You can add many attributes to your portfolio item here, for example you can add the project client, date of that project and etc.', TEXTDOMAIN),
                'fields'  => array(
                    'attribute-title' => $fields['attribute-title'],
                    'attribute-value' => $fields['attribute-value']
                )
            ),//SEO Description
			'seo_description' => array(
				'title'   => __('Seo Description', TEXTDOMAIN),
				'tooltip' => __('Enter a description for using as seo description in search engine results', TEXTDOMAIN),
				'fields'  => array(
				'seo_description' => $fields['seo_description'],
				)
			),//SEO Key Words
			'seo_keywords' => array(
				'title'   => __('Seo Key Words', TEXTDOMAIN),
				'tooltip' => __('Enter Keywords for using in search engines results', TEXTDOMAIN),
				'fields'  => array(
				'seo_keywords' => $fields['seo_keywords'],
				)
			),
        );

        return array(
            array(
                'id' => 'portfolio_meta_box',
                'title' => __('Portfolio Options', TEXTDOMAIN),
                'context' => 'normal',
                'priority' => 'default',
                'options' => $options,
            )//Meta box
        );
    }
}

new PxPortfolio();
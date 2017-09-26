<?php

require_once('post-type.php');

class PxPage extends PxPostType
{
    function __construct()
    {
        parent::__construct('page');
    }

    function Px_RegisterScripts()
    {
        wp_register_script('page', THEME_LIB_URI . '/post-types/js/page.js', array('jquery'), THEME_VERSION);
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

        wp_enqueue_script('page');
    }

    private function Px_GetSidebars()
    {
        $sidebars = array('no-sidebar' => '' , 'main-sidebar' => __('Default Sidebar', TEXTDOMAIN), 'page-sidebar' => __('Default Page Sidebar', TEXTDOMAIN));

        if(px_opt('custom_sidebars') != '')
        {
            $arr = explode(',', px_opt('custom_sidebars'));

            foreach($arr as $bar)
                $sidebars[$bar] = str_replace('%666', ',', $bar);
        }

        return $sidebars;
    }

    protected function Px_GetOptions()
    {
        $fields = array(
            'title-bar-switch' => array(
                'type' => 'select',
                'label'=> __('Section Title', TEXTDOMAIN),
                'options' => array('2'=>__('Show post title', TEXTDOMAIN),'1'=>__('Show custom title', TEXTDOMAIN), '0'=>__('Don\'t show title', TEXTDOMAIN)),
            ),
            'title-text' => array(
                'type' => 'text',
                'label'=> __('Title Text', TEXTDOMAIN),
                'placeholder' => __('Override title text', TEXTDOMAIN),

            ),
            'subtitle-text' => array(
                'type' => 'text',
                'label'=> __('Subtitle Text', TEXTDOMAIN),
                'placeholder' => __('Subtitle text', TEXTDOMAIN),
            ),
            'page-type-switch' => array(
                'type' => 'select',
                'label'=> __('Section Type', TEXTDOMAIN),
                'options' => array('custom-section'=>__('Custom section', TEXTDOMAIN),'blog-section'=>__('Blog section', TEXTDOMAIN),'portfolio-section'=>__('Portfolio section', TEXTDOMAIN)),
            ),
             'page-position-switch' => array(
                'type' => 'select',
                'label'=> __('Choose your section to be shown in:', TEXTDOMAIN),
                'options' => array('1'=>__('External page', TEXTDOMAIN), '0'=>__('Main page', TEXTDOMAIN)),
            ),
            'show-in-menu-switch' => array(
                'type' => 'select',
                'label'=> __('Section display in menu:', TEXTDOMAIN),
                'options' => array('1'=>__('Don\'t shown this section in menu', TEXTDOMAIN), '0'=>__('Shown this section in menu', TEXTDOMAIN)),
            ),
            'blog-type-switch' => array(
                'type' => 'select',
                'label'=> __('Blog Type:', TEXTDOMAIN),
                'options' => array('1'=>__('Classic Blog', TEXTDOMAIN), '0'=>__('Toggle Blog', TEXTDOMAIN)),
            ),
            'portfolio-filter' => array(
                'type' => 'select',
                'label'=> __('Choose Portfolio categories:', TEXTDOMAIN),
                'options' => array('1'=>__('Selected categories', TEXTDOMAIN), '0'=>__('All categories', TEXTDOMAIN)),
            ),
			'order' => array(
				'type' => 'select',
				'label'=> __('Choose Order:', TEXTDOMAIN),
				'options' => array('date'=>__('Default', TEXTDOMAIN), 'author'=>__('By post author', TEXTDOMAIN), 'name'=>__('By post name', TEXTDOMAIN), 'comment-count'=>__('By post comment count', TEXTDOMAIN), 'modified' =>__('By post last modified date', TEXTDOMAIN), 'rand' =>__('Random Order', TEXTDOMAIN)),
			),
			'ordering' => array(
				'type' => 'select',
				'label'=> __('Choose Ordering Type:', TEXTDOMAIN),
				'options' => array('asc'=>__('Ascending order', TEXTDOMAIN), 'desc'=>__('Descending order', TEXTDOMAIN)),
			),
            'portfolio-fiter-skill-switch' => array(
                'type' => 'multiselect',
                'label'=> __('Add Your Desc here', TEXTDOMAIN),
                'options' => px_get_Portfolio_skills(),
            ),
            'portfolio-filter-nav' => array(
                'type'   => 'switch',
                'label'  => __('Display Portfolio Filter Navigation', TEXTDOMAIN),
                'state0' => __('Don\'t Show', TEXTDOMAIN),
                'state1' => __('Show', TEXTDOMAIN),
                'default'   => 1
            ),
            'portfolio-detail-ajax' => array(
                'type'   => 'switch',
                'label'=> __('Add Your Desc here', TEXTDOMAIN),
                'state0' => __('In external page', TEXTDOMAIN),
                'state1' => __('As an additional section in main page', TEXTDOMAIN),
                'default'   => 0
            ),
            'portfolio-posts-page' => array(
                'default'   => '12',
                'type'   => 'range',
                'min'   => '1',
                'max'   => '30',
                'step'   => '1',
            ),
            'sidebar' => array(
                'type' => 'select',
                'label'=> __('Choose the sidebar', TEXTDOMAIN),
                'options' => $this->Px_GetSidebars(),
            ),
            'blog-sidebar' => array(
                'type' => 'select',
                'label'=> __('Blog Sidebar Display', TEXTDOMAIN),
                'options' => array('main-sidebar'=> __('Show', TEXTDOMAIN), 'no-sidebar'=> __('Don\'t Show')),
            ),
            'slider' => array(
                'type' => 'select',
                'label'=> __('Choose a layer slider', TEXTDOMAIN),
                'options' => px_get_layerSlider_slides(),
            ),
            'footer-map' => array(
                'type' => 'select',
                'label'=> __('Footer Map Display', TEXTDOMAIN),
                'options' => array('1'=> __('Show', TEXTDOMAIN), '2'=> __('Don\'t Show')),
            ),
            'footer-widget-area' => array(
                'type' => 'select',
                'label'=> __('Widget Area Display', TEXTDOMAIN),
                'options' => array('1'=> __('Show', TEXTDOMAIN), '2'=> __('Don\'t Show')),
            ),
            'resume-exp-section'=> array(
                'type' => 'checkbox',
                'checked' => true,
                'value' => 'visible',
                'label' => __('Experience',TEXTDOMAIN),
            ),
			'seo_description' => array(
				'type' => 'text',
				'label'=> __('Page SEO Description :', TEXTDOMAIN),
				'placeholder' => __('SEO Description', TEXTDOMAIN),
			),
			'seo_keywords' => array(
				'type' => 'text',
				'label'=> __('Page SEO Key Words :', TEXTDOMAIN),
				'placeholder' => __('SEO Key Words', TEXTDOMAIN),
			),
        );

        // merge fiels array With portfolio Skill Arrays
        $fields = array_merge ( $fields , px_generate_portfolio_skill() );

        //Option sections
        $options = array(
            'page-type-switch' => array(
                'title'   => __('Section Type', TEXTDOMAIN),
                'tooltip' => __('Choose a section which will be shown in main page.', TEXTDOMAIN),
                'fields'  => array(
                    'page-type-switch' => $fields['page-type-switch'],
                )
            ),//Section Type
            'title-bar' => array(
                'title'   => __('Title', TEXTDOMAIN),
                'tooltip' => __('Choose a title to be shown at the beginning of each section', TEXTDOMAIN),
                'fields'  => array(
                    'title-bar'    => $fields['title-bar-switch'],
                    'title-text'   => $fields['title-text'],
                    'subtitle-text'   => $fields['subtitle-text'],
               )
            ),//Title bar sec
            'portfolio-skill' => array(
                'title'   => __('Portfolio Category', TEXTDOMAIN),
                'tooltip' => __('Choose all or selected categories to be shown in portfolio section', TEXTDOMAIN),
                'fields'  => array(
                    'portfolio-filter'	=> $fields['portfolio-filter'],
                )
            ),
			'order' => array(
				'title'   => __('Order', TEXTDOMAIN),
				'tooltip' => __('Choose order of items', TEXTDOMAIN),
				'fields'  => array(
				'order'	=> $fields['order'],
				)
			),
			'ordering' => array(
				'title'   => __('Ordering', TEXTDOMAIN),
				'tooltip' => __('Choose ordering type', TEXTDOMAIN),
				'fields'  => array(
				'ordering'	=> $fields['ordering'],
				)
			),
            'portfolio-posts-page' => array(
                'title'   => __('Portfolios Post Per Section', TEXTDOMAIN),
                'tooltip' => __('Choose the initial number of portfolio items to be shown before clicking load more button.', TEXTDOMAIN),
                'fields'  => array(
                    'portfolio-posts-page'   => $fields['portfolio-posts-page'],
                )
            ),//portfolio post per pages
            'page-position-switch' => array(
                'title'   => __('Section Display', TEXTDOMAIN),
                'tooltip' => __('Choose where you want to show your section. It can be shown in main page or be shown as an external page.', TEXTDOMAIN),
                'fields'  => array(
                    'page-position-switch' => $fields['page-position-switch'],
                )
            ),//Open Page As Seperate Page Or Front Page
            'portfolio-filter-nav' => array(
                'title'   => __('Display Portfolio Filters', TEXTDOMAIN),
                'tooltip' => __('Choose to Show or Not to show Portfolio Filters in portfolio section', TEXTDOMAIN),
                'fields'  => array(
                    'portfolio-filter-nav' => $fields['portfolio-filter-nav'],
                )
            ),//Enable And Disable portfolio Detail Ajax In Front Page

            'portfolio-detail-ajax' => array(
                'title'   => __('Portfolio Detail Display', TEXTDOMAIN),
                'tooltip' => __('Choose to display the portfolio detail of each portfolio item in an external page or as an additional section which will be loaded above portfolio section. Please note that you can\'t have more than 1 additional section in main page and you can\'t have additional section if you choose to show your portfolio in an external page.', TEXTDOMAIN),
                'fields'  => array(
                    'portfolio-detail-ajax' => $fields['portfolio-detail-ajax'],
                )
            ),//Enable And Disable portfolio Detail Ajax In Front Page
            'show-in-menu-switch' => array(
                'title'   => __('Display In Menu', TEXTDOMAIN),
                'tooltip' => __('Enable or Disable the section in menu.', TEXTDOMAIN),
                'fields'  => array(
                    'show-in-menu-switch' => $fields['show-in-menu-switch'],
                )
            ),// Enable Or Disable Page Sidebar
            'blog-type-switch' => array(
                'title'   => __('Blog Type:', TEXTDOMAIN),
                'tooltip' => __('Choose blog style between toggle Blog Or Classic blog', TEXTDOMAIN),
                'fields'  => array(
                    'blog-type-switch' => $fields['blog-type-switch'],
                )
            ),// Add Page Sidebar
            'page-sidebar' => array(
                'title'   => __('Page Sidebar', TEXTDOMAIN),
                'tooltip' => __('You can choose a sidebar to be shown in this section which is created in theme settings ', TEXTDOMAIN),
                'fields'  => array(
                    'sidebar' => $fields['sidebar'],
                )
            ),// Add Page Sidebar
            'blog-sidebar' => array(
                'title'   => __('Blog Sidebar', TEXTDOMAIN),
                'tooltip' => __('You can enable or disable log sidebar ', TEXTDOMAIN),
                'fields'  => array(
                    'blog-sidebar' => $fields['blog-sidebar'],
                )
            ),// Enable blog Sidebar
            'layerslider' => array(
                'title'   => __('LayerSlider ', TEXTDOMAIN),
                'tooltip' => __('Choose a layer slider which is created in LayerSlider WP panel here', TEXTDOMAIN),
                'fields'  => array(
                    'slider' => $fields['slider'],
                )
            ),//slider sec
            'footer-map' => array(
                'title'   => __('Footer Map', TEXTDOMAIN),
                'tooltip' => __('Choose to show or not to show the map in footer', TEXTDOMAIN),
                'fields'  => array(
                    'footer-map' => $fields['footer-map'],
                )
            ),//Footer Map
            'footer-widget-area' => array(
                'title'   => __('Footer Widget Area', TEXTDOMAIN),
                'tooltip' => __('Choose to show or not to show the widget area in footer', TEXTDOMAIN),
                'fields'  => array(
                    'footer-widget-area' => $fields['footer-widget-area'],
                )
            ),//Footer Widget Area
			//Seo Description
			'seo_description' => array(
				'title'   => __('Seo Description', TEXTDOMAIN),
				'tooltip' => __('Enter a description for using as seo description in search engine results', TEXTDOMAIN),
				'fields'  => array(
				'seo_description' => $fields['seo_description'],
				)
			),
		'seo_keywords' => array(
				'title'   => __('Seo Key Words', TEXTDOMAIN),
				'tooltip' => __('Enter a Key words for sarch enging optimization (comma separated)', TEXTDOMAIN),
				'fields'  => array(
				'seo_keywords' => $fields['seo_keywords'],
				)
			),
        );

        // merge Skill Arrays
        $options['portfolio-skill']['fields'] = array_merge ( $options['portfolio-skill']['fields'] , px_generate_portfolio_skill($fields));

        return array(
            array(
                'id' => 'blog_meta_box',
                'title' => __('Page Settings', TEXTDOMAIN),
                'context' => 'normal',
                'priority' => 'high',
                'options' => $options,
            )//Meta box 0
        );
    }
}

new PxPage();
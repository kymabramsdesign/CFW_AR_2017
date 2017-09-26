<?php
function px_theme_scripts() {

    //Register google fonts
    px_theme_fonts();

    //Register Styles
    wp_enqueue_style('style', get_bloginfo('stylesheet_url'), false, THEME_VERSION);

    //responcive style
    wp_enqueue_style('responsive-style', THEME_CSS_URI . '/responsive.css', false, THEME_VERSION);

    //Add style overrides
    ob_start();
    include(px_path_combine(THEME_CSS, 'styles-inline.php'));
    wp_add_inline_style('style', ob_get_clean());

    if (!is_admin()) {
        wp_enqueue_script('jquery');
    }

    // All Scripts
    wp_register_script('allscripts', THEME_JS_URI . '/allscripts.js', false, '1.0', true );

    wp_register_style('flexslider', THEME_CSS_URI. '/flexslider.css', false, '2.1', 'screen');

    //smothScroll
    wp_register_script( 'smoothscroll', THEME_JS_URI . '/jquery.smoothscroll.js', false, '1.2.1', true );
   
    //select2
    wp_register_script( 'select2', THEME_JS_URI . '/select2.min.js', false, '3.5.2', true );
    
    //Media Element
    wp_register_style('mediaelementCSS', THEME_CSS_URI. '/mediaelementplayer.css', false, '2.13.1', 'screen');
    wp_register_script('mediaelementJSS', THEME_JS_URI . '/mediaelement-and-player.min.js', false, '2.13.1', true );

    //isotope
    wp_register_style('portfolio-isotope', THEME_CSS_URI. '/isotope.css', false, '1.5.26', 'screen');

    //Custom Scrollbar
    wp_register_style('mCustomScrollbar', THEME_CSS_URI. '/mCustomScrollbar.css', false, '1.0.0', 'screen');
    
    //magnific
    wp_register_script( 'magnific', THEME_JS_URI . '/jquery.magnific-popup.min.js', false,'2.1.5',true );
    wp_register_style('magnific', THEME_CSS_URI. '/magnific-popup.css', false, '2.1.5', 'screen');
    
    wp_register_script( 'gmap3', THEME_JS_URI . '/gmap3.js', false,'5.1.1',true );
    
    // Svg Script For Wave menu 
    wp_register_script( 'snapsvg', THEME_JS_URI . '/snap.svg-min.js', false,'0.3.0',true );
    
    //Main JS handler
    wp_enqueue_script('googleMap',"http://maps.google.com/maps/api/js?v=3.15?sensor=false&amp;language=en",array(),THEME_VERSION,true);
        
    //Flex Slider
    wp_enqueue_style('flexslider');
    
    //Isotope Plugin
    wp_enqueue_style('portfolio-isotope');
    
    // Custom Scroll Bar 
   	wp_enqueue_style('mCustomScrollbar');
       
    //wait for images load
    wp_enqueue_script('allscripts');

    // Media Element
    wp_enqueue_style('mediaelementCSS');
    wp_enqueue_script('mediaelementJSS');
    
    if(isset($_SERVER['HTTP_USER_AGENT']) ) {
        if (!(strstr($_SERVER['HTTP_USER_AGENT'], 'iPad'))) {
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false) {
            // User agent is Google Chrome
                wp_enqueue_script('smoothscroll');//SmoothScroll
            }
        }         
    }
    
    // fancy box For Product pop up replace pretty photo 
    if ( is_singular( 'product' ) ) {
		wp_enqueue_script( 'magnific'); 
        wp_enqueue_style('magnific');
	}
    
    if ( function_exists( 'is_woocommerce' )) {
        wp_enqueue_script( 'select2'); 
     }    
    
    if(is_page_template('main-page.php')) {
    
         if (px_opt('footer-enable-map') == 1 || px_opt('home-type-switch') == 'home-map') {
            //google Map - gmap3
            wp_enqueue_script('gmap3');
        }
        
    } else {
         //google Map - gmap3
        wp_enqueue_script('gmap3');
    }
    
    
    $headerstyle = px_opt('header-style');
    
    if ($headerstyle == 'wave-menu' ) { // SVG For Wave  Menu 
        // SVG For Wave  Menu 
        wp_enqueue_script('snapsvg');
    }
    
    //Custom Script
    wp_enqueue_script(
        'custom',
        THEME_JS_URI . '/custom.js',
        false,
        THEME_VERSION,
        true
    );

    // home And Footer Google Map Variables
    $mapJs = array(
        'zoomLevel' => px_opt('footerMapZoom'),
        'iconMap' => (px_opt('map_marker') ? px_opt('map_marker') : get_template_directory_uri() ."/assets/img/marker.png") ,
        'customMap' => px_opt('footerStyleMap'),
        'cityMapCenterLat' => px_opt('footerMapLatitude'),
        'cityMapCenterLng' => px_opt('footerMapLongitude'),
        'homeZoomLevel' => px_opt('homeMapZoom'),
        'homeIconMap' =>  get_template_directory_uri() ."/assets/img/homeMarker.png",
        'homeCustomMap' => px_opt('homeStyleMap'),
        'homeCityMapCenterLat' => px_opt('homeMapLatitude'),
        'homeCityMapCenterLng' => px_opt('homeMapLongitude'),
		'footermapzoomcontrol'=>px_opt('footer_map_zoom_control')
    );
    wp_localize_script('custom', 'pixflowJsMap', $mapJs );

    // scrooling options
    $speedJs = array(
        'scrolling_speed' => px_opt ('scrolling-speed'),
        'scrolling_easing' => px_opt('scrolling-easing'),
    );
    wp_localize_script('custom', 'pixflowJsSpeed', $speedJs );

    // Full Screen Animation Style options
     $sliderJs = array(
        'SliderMode' => px_opt('animation-mode'),
    );
    wp_localize_script('custom', 'pixflowJsSlider', $sliderJs );
    
    
    // additional scripts
	$custom=px_opt('additional-js');
	$custom=str_replace("<script>","",$custom);
	$custom=str_replace("</script>","",$custom);
	
    $additionaljs = array(
        'additionaljs' => $custom,
    );
    wp_localize_script('custom', 'pixflowAdditionalJs', $additionaljs );

    wp_localize_script(
        'custom',
        'theme_uri',
        array(
            'img' => THEME_IMAGES_URI
        )
    );

    wp_localize_script( 'custom', 'theme_strings', array('contact_submit'=>__('Send', TEXTDOMAIN) ) );

    px_Load_Posts_Init();

}
add_action('wp_enqueue_scripts', 'px_theme_scripts' , 1);

function remove_prettyphoto () {

    if ( function_exists( 'is_woocommerce' )  ) {
      
        wp_dequeue_style('woocommerce_prettyPhoto_css');
        wp_dequeue_script('prettyPhoto'); 
        wp_dequeue_script('prettyPhoto-init'); 
    }
}
add_action('wp_enqueue_scripts', 'remove_prettyphoto' , 99 );

//load more function
function px_Load_Posts_Init() {

    // Add some parameters for the JS - blog load more .
    $queryArgsPost = array (
        'post_type'      => 'post',
    );
    $query = new WP_Query($queryArgsPost);
    $max = $query-> max_num_pages;
    $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;

    wp_localize_script(
        'custom',
        'paged_data',
        array(
            'startPage' => $paged,
            'maxPages' => $max,
            'nextLink' => next_posts($max, false),
            'loadingText' => __('Loading...', TEXTDOMAIN),
            'loadMoreText' => __('more posts +', TEXTDOMAIN),
            'noMorePostsText' => __('No More Posts', TEXTDOMAIN)
        )
    );

}

//Custom stylesheet file to the TinyMCE visual editor
function px_add_editor_styles()
{
    add_editor_style();
}

add_action( 'init', 'px_add_editor_styles' );

function px_theme_fonts()
{
    $fontBody     = px_opt('font-body');
    $fontHeading  = px_opt('font-headings');
    $fontNav      = px_opt('font-navigation');
    $ShortcodeFont  = px_opt('font-shortcode');
    $fontNumber   = 'Oswald';

    
    if ( px_opt('home-text-style') == 5) {
    
        $fontTextRotator = 'Playfair Display';
    
    } else if ( px_opt('home-text-style') == 6) {
    
        $fontTextRotator = 'Lobster';
        $fontTextRotator2 = 'Playfair Display';
       
    } else if ( px_opt('home-text-style') == 7) {
    
        $fontTextRotator = 'Bree Serif';
        $fontTextRotator2 = 'Playfair Display';
       
    } else if ( px_opt('home-text-style') == 8) {
    
        $fontTextRotator = 'Great Vibes';
       
    }
    
    
    //Fix for setup problem (shouldn't happen after the update, just for old setups)
    if('' == $fontBody && '' == $fontHeading && '' == $fontNav && '' == $ShortcodeFont && '' == $fontNumber )
        $fontBody = $fontHeading  = $fontNav = $ShortcodeFont =  $fontNumber = '';
        

    if (px_opt('home-text-style') == 5 || px_opt('home-text-style') == 8 ){
    
        $fonts  = array($fontBody, $fontHeading , $fontNav , $ShortcodeFont , $fontNumber , $fontTextRotator);
        $fontVariants = array(array(300,400,700,900), array(400), array(400,700) , array(300,400,700) , array(400), array(400));//Suggested variants if available 
       
    } else if ( px_opt('home-text-style') == 6 || px_opt('home-text-style') == 7 ) {
    
        $fonts  = array($fontBody, $fontHeading , $fontNav , $ShortcodeFont , $fontNumber , $fontTextRotator , $fontTextRotator2);
        $fontVariants = array(array(300,400,700,900), array(400), array(400,700) , array(300,400,700) , array(400), array(400), array(400));//Suggested variants if available

    } else {
        
        $fonts  = array($fontBody, $fontHeading , $fontNav , $ShortcodeFont , $fontNumber);
        $fontVariants = array(array(300,400,700,900), array(400), array(400,700) , array(300,400,700) , array(400));//Suggested variants if available
    } 

    $fonts        = array_filter($fonts);//remove empty elements
    $fontList     = array();
    $fontReq      = 'http://fonts.googleapis.com/css?family=';
    $gf           = new PxGoogleFonts(px_path_combine(THEME_LIB, 'googlefonts.json'));

    //Build font list
    foreach($fonts as $key => $font)
    {
        $duplicate = false;
        //Search for duplicate
        foreach($fontList as $item)
        {
            if($font == $item['font'])
            {
                $duplicate = true;
                $item['variants'] = array_unique(array_merge($item['variants'], $fontVariants[$key]));
                break;
            }
        }

        //Add
        if(!$duplicate)
            $fontList[] = array('font'=>$font, 'variants'=>$fontVariants[$key]);
    }

    $temp=array();
    foreach($fontList as $item)
    {
        $font = $gf->GetFontByName($item['font']);

        if(null==$font)
            continue;

        $variants = array();
        foreach($item['variants'] as $variant)
        {
            //Check if font object has the variant
            if(in_array($variant, $font->variants))
            {
                $variants[] = $variant;
            }
            else if(400 == $variant && in_array('regular', $font->variants))
            {
                $variants[] = $variant;
            }
        }

        $query = preg_replace('/ /', '+', $item['font']);

        if(count($variants))
            $query .= ':' . implode(',', $variants);

        $temp[] = $query;
    }

    if(count($temp))
    {
        $fontReq .= implode('|', $temp);
        wp_enqueue_style('fonts', $fontReq);
    }
}

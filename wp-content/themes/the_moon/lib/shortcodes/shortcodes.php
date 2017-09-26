<?php
/*-----------------------------------------------------------------------------------

	Theme Shortcodes
    
-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Shortcode forms ajax handler
/*-----------------------------------------------------------------------------------*/

function px_sc_popup()
{
    include('forms.php');
    die();
}

add_action('wp_ajax_px_sc_popup', 'px_sc_popup');

/*-----------------------------------------------------------------------------------*/
/*	Shortcode helpers
/*-----------------------------------------------------------------------------------*/

//Generate ID for shortcodes
function px_sc_id($key)
{
    $globalKey = "px_sc_$key";

    if(array_key_exists($globalKey, $GLOBALS))
        $GLOBALS[$globalKey]++;
    else
        $GLOBALS[$globalKey] = 1;

    $id    = $GLOBALS[$globalKey];
    return "$key-$id";
}

/*-----------------------------------------------------------------------------------*/
/*	Section, Container, Row, Column and Offset Shortcodes
/*-----------------------------------------------------------------------------------*/

/* Alternate BG Section */

function px_sc_alt_section($atts, $content = null)
{
    extract(shortcode_atts(array(
        'background_color'   => '',
    ), $atts));

    $class = 'fullWidth';
    $style = '';

    if( '' == $background_color ) {
        $class .= ' color-alt-main-background';
    } else {
        $style = "style=\"background-color:$background_color;\"";
    }

    return '<div class="container"><div class="'.$class.'" '.$style.'>' . do_shortcode($content) . '</div></div>';
}

add_shortcode('section_alt', 'px_sc_alt_section');

/* Container */

function px_sc_container( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'vertical_padding'   => ''
    ), $atts));

    $vertical_padding = '' != $vertical_padding ? 'container-vspace' : '';

    return '<div class="container '.$vertical_padding.'">' . do_shortcode($content) . '</div>';
}

add_shortcode('container', 'px_sc_container');

/* Row */
function px_sc_row( $atts, $content = null ) {
    $GLOBALS['px_sc_spans'] = array();//Set/Reset
    do_shortcode($content);
    $spans = $GLOBALS['px_sc_spans'];

    extract(shortcode_atts(array(
        'topspace'   => '',
        'bottomspace'   => ''
    ), $atts));

    $id	= px_sc_id('row');
    $class  = array();
    $hasStyle = '' != $topspace || '' != $bottomspace  ;

    if( strlen($topspace)) {
        $class[] = ' topspace';
     }

     if( strlen($bottomspace)) {
        $class[] = ' bottomspace';
     }

    ob_start();
    if($hasStyle)
    {
    ?>
    <style type="text/css" media="all" scoped>
        <?php if(strlen($topspace))
        {
            echo "#$id.topspace"; ?>
            {
                margin-top: <?php echo esc_attr($topspace); ?>px;
            }

        <?php
        }
        if(strlen($bottomspace))
        {
            echo "#$id.bottomspace"; ?>
            {
                margin-bottom: <?php echo esc_attr($bottomspace); ?>px;
            }
        <?php
        }
        ?>
    </style>
    <?php
    }//if($hasStyle)
    ?>
        <div id="<?php echo esc_attr($id); ?>" class="row <?php echo implode(' ', $class); ?>"><?php echo  implode("\n", $spans) ?></div>

    <?php
    return ob_get_clean();
}

add_shortcode('row', 'px_sc_row');

/* One Twelve Column */

    function px_sc_span1( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span1 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span1', 'px_sc_span1');

/* Two Twelve Column */

function px_sc_span2( $atts, $content = null ) {
   	extract(shortcode_atts(array(
    'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span2 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span2', 'px_sc_span2');

/* Three Twelve Column */

function px_sc_span3( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span3 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span3', 'px_sc_span3');

/* Four Twelve Column */

function px_sc_span4( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span4 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span4', 'px_sc_span4');

/* Five Twelve Column */

function px_sc_span5( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span5 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span5', 'px_sc_span5');

/* Six Twelve Column */

function px_sc_span6( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span6 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span6', 'px_sc_span6');

/* Seven Twelve Column */

function px_sc_span7( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span7 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span7', 'px_sc_span7');

/* Eight Twelve Column */

function px_sc_span8( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span8 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span8', 'px_sc_span8');

/* Nine Twelve Column */

function px_sc_span9( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span9 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span9', 'px_sc_span9');

/* Ten Twelve Column */

function px_sc_span10( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span10 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span10', 'px_sc_span10');

/* Eleven Twelve Column */

function px_sc_span11( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span11 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span11', 'px_sc_span11');

/* Twelve Twelve Column */

function px_sc_span12( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'offset'   => ''
    ), $atts));

    $GLOBALS['px_sc_spans'][] = "<div class=\"span12 offset$offset\">" . do_shortcode($content) . "</div>";
}

add_shortcode('span12', 'px_sc_span12');

/*-----------------------------------------------------------------------------------*/
/*  Separators
/*-----------------------------------------------------------------------------------*/

function px_sc_separator( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'size'   => '',  // small, small-center, medium, medium-center
        'margin' => '',//small, medium
        'thickness' => '',
        'pxthickness' => '',
        'color' => '#888',
    ), $atts));

    $id = px_sc_id('vc_separator');
    $class = '';

    switch($size)
    {
        case 'small':
            $class[] = 'hr-small';
            break;
        case 'small-center':
            $class[] = 'hr-small hr-center';
            break;
        case 'extra-small':
            $class[] = 'hr-extra-small';
            break;
        case 'extra-small-center':
            $class[] = 'hr-extra-small hr-center   ';
            break;
        case 'medium':
            $class[] = 'hr-medium';
            break;
        case 'medium-center':
            $class[] = 'hr-medium hr-center';
            break;
        case 'full':
            $class[] = ' full';
            break;   
    }
 
    switch($margin)
    {
        case 'small':
            $class[] = 'hr-margin-small';
            break;
        case 'medium':
            $class[] = 'hr-margin-medium';
            break;
    }

    if('thick' == $thickness)
    {
        $class[] = 'hr-thick';
    }

    $hasStyle = '' != $color || '' != $pxthickness;
    
    if($hasStyle)
    {
    ?>
    <style type="text/css" media="all" scoped>
        <?php if(strlen($color))
        {
            echo "hr#$id"; ?>
            {
                background-color: <?php echo esc_attr($color); ?>;
            }

        <?php
        }
         if(strlen($pxthickness))
        {
            echo "hr#$id"; ?>
            {
                height: <?php echo esc_attr($pxthickness); ?>px;
            }

        <?php
        }
        ?>
    </style>
    <?php
    }//if($hasStyle)

    ob_start();
    ?>

        <hr id="<?php echo esc_attr($id); ?>"  class="<?php echo implode(' ',$class)?>" />

    <?php
    return ob_get_clean();
}

add_shortcode('vc_separator', 'px_sc_separator');

/*-----------------------------------------------------------------------------------*/
/*	Title with horizontal line
/*-----------------------------------------------------------------------------------*/

function px_sc_title( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'style'   => '',//center
        'title'   => '',
        'title_align'   => '',
        'title_font_size'   => '',
        'title_border_enable'   => '',
        'pxthickness' => '',
        'title_color' => '',
        'color' => '#888',
    ), $atts));
    
    $id = px_sc_id('vc_text_separator');
    $class = $style == 'center' ? 'hr-title-center' : 'hr-title';
       
    $hasStyle = '' != $color || '' != $pxthickness;
    
    if($hasStyle)
    {
    ?>
    <style type="text/css" media="all" scoped>
        <?php if(strlen(esc_attr($color)))
        {
            echo "#$id.vc_separator .vc_sep_holder .vc_sep_line"; ?>
            {
               border-top-color: <?php echo esc_attr($color); ?>;
            }
            
          <?php echo "#$id.vc_separator.separator_align_left .title , #$id.vc_separator.separator_align_right .title"; ?>
            {
               border-left-color: <?php echo esc_attr($color); ?>;
               border-right-color: <?php echo esc_attr($color); ?>;
            }

        <?php
        }
         if(strlen(esc_attr($pxthickness)))
        {
            echo "#$id.vc_separator .vc_sep_holder .vc_sep_line"; ?>
            {
                border-top-width: <?php echo esc_attr($pxthickness); ?>px;
                height:<?php echo esc_attr($pxthickness); ?>px;
            }

        <?php
        }
        if(strlen(esc_attr($title_font_size)))
        {
            echo "#$id.vc_separator .title"; ?>
            {
                font-size: <?php echo esc_attr($title_font_size); ?>px;
            }
        <?php
        }
        if(strlen(esc_attr($title_color)))
        {
            echo "#$id.vc_separator .title "; ?>
            {
                color:<?php echo esc_attr($title_color); ?>;
            }

        <?php
        }
        ?>
    </style>
    <?php
    }//if($hasStyle)
    
    ob_start();
    ?>
    <div id=<?php echo esc_attr($id); ?> class="vc_separator <?php echo esc_attr($class); ?> <?php echo esc_attr($title_align); ?> <?php echo esc_attr($title_border_enable); ?>">
        <span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span>
        <div class="title"><?php echo esc_attr($title); ?></div>
        <span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
    </div>
    

    <?php
    return ob_get_clean();
}

add_shortcode('vc_text_separator', 'px_sc_title');

/*-----------------------------------------------------------------------------------*/
/*	Team Member
/*-----------------------------------------------------------------------------------*/

function px_sc_team_member( $atts, $content = null ) {
    $descDefaultText = 'Lorem ipsum dolor sit amet, conse tu ert adipiscing elit. Donec odio quis qi que volutpat mattis eros. Sed adipisin ert adipiscing elit.';

    extract(shortcode_atts(array(
        'name'   => 'sharon stone',
        'title'  => 'Designer',
        'style'  => 'dark',
        'team_animation'  => '',
        'team_animation_delay'  => '',
        'url'    => '',
        'target' => '',
        'description'  => $descDefaultText,
        'image'  => '',
        'team_icon1'  => '',
        'team_icon2'  => '',
        'team_icon3'  => '',
        'team_icon4'  => '',
        'team_icon5'  => '',
        'team_icon_url1'  => '',
        'team_icon_url2'  => '',
        'team_icon_url3'  => '',
        'team_icon_url4'  => '',
        'team_icon_url5'  => '',
        'team_icon_target1'  => '',
        'team_icon_target2'  => '',
        'team_icon_target3'  => '',
        'team_icon_target4'  => '',
        'team_icon_target5'  => '',
    ), $atts));

    $class = '';



    if (is_numeric($image)) {
        $image = wp_get_attachment_url($image);
        if(!$image){
            $image=THEME_IMAGES_URI."/placeholders/team-member-holder.jpg";
        }
    }
    
    if(strlen($target))
        $target = "target=\"$target\"";

    if( strlen($team_animation)) {

        $class[] = ' teamWithAnimation';

     }
     
    $hasTeamIcon = '' != $team_icon1 || '' != $team_icon2  || '' != $team_icon3 || '' != $team_icon4 || '' != $team_icon5;
     
    ob_start();
    ?>
        <div class="team-member <?php echo implode(' ', $class); ?> <?php echo esc_attr($style) ?>"  <?php if(strlen(esc_attr($team_animation))) { ?> data-delay="<?php echo esc_attr($team_animation_delay); ?>" data-animation="<?php echo esc_attr($team_animation); ?>" <?php } ?>>
            <?php if('' != $image){ ?>

            <div class="image visible-desktop">

                <div class="bgImage" style="background-image:url(<?php echo esc_url($image); ?>); ">

                    <div class="imageOverlayWrap"></div>

                    <?php if('' != esc_url($url)){ ?>
                    <div class="image-overlay">
                        <div class="image-overlay-wrap">
                            <div class="overlay">
                                <span class="icon-users overlay-icon"></span>
                                <a class="overlay-link" href="<?php echo esc_url($url); ?>" <?php echo esc_attr($target); ?>></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="nameJob visible-desktop">
                         <div class="name">
                            <?php if('' != esc_url($url)){ ?>
                            <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_attr($name); ?></a>
                            <?php
                            } else {
                                echo esc_attr($name);
                            } ?>
                        </div>
                        <span class="job-title"><?php echo esc_attr($title); ?></span>
                    </div>

                    <div class="description visible-desktop ">
                        <p class="descriptionContent">
                            <?php echo esc_attr($description); ?>
                        </p>
                        <div class="descriptionIcon">
                            <?php
                            $GLOBALS['px_sc_team_icon'] = array();
                            do_shortcode($content);
                            $icons = $GLOBALS['px_sc_team_icon'];

                            if(count($icons))
                            {?>
                                <ul class="icons">
                                    <?php echo implode("\n", $icons); ?>
                                </ul>
                            <?php
                            }
                            ?>
                            
                            <?php if ($hasTeamIcon) { ?>
                                    <ul class="icons">
                                       
                                        <?php if ($team_icon1) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($team_icon_url1); ?>" title="<?php echo esc_attr($title); ?>" target="<?php echo esc_attr($team_icon_target1); ?>">
                                                    <span class="icon-<?php echo esc_attr($team_icon1); ?>" ></span>
                                                </a>
                                            </li>
                                         <?php } ?>
                                         
                                        <?php if ($team_icon2) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($team_icon_url2); ?>" title="<?php echo esc_attr($title); ?>" target="<?php echo esc_attr($team_icon_target2); ?>">
                                                    <span class="icon-<?php echo esc_attr($team_icon2); ?>" ></span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                        
                                        <?php if ($team_icon3) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($team_icon_url3); ?>" title="<?php echo esc_attr($title); ?>" target="<?php echo esc_attr($team_icon_target3); ?>">
                                                    <span class="icon-<?php echo esc_attr($team_icon3); ?>" ></span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                        
                                        <?php if ($team_icon4) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($team_icon_url4); ?>" title="<?php echo esc_attr($title); ?>" target="<?php echo esc_attr($team_icon_target4); ?>">
                                                    <span class="icon-<?php echo esc_attr($team_icon4); ?>" ></span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                        
                                        <?php if ($team_icon5) { ?>
                                            <li>
                                                <a href="<?php echo esc_url($team_icon_url5); ?>" title="<?php echo esc_attr($title); ?>" target="<?php echo esc_attr($team_icon_target5); ?>">
                                                    <span class="icon-<?php echo esc_attr($team_icon5); ?>" ></span>
                                                </a>
                                            </li> 
                                        <?php } ?>
                                        
                                    </ul>
                            <?php } ?>
                            
                        </div>
                    </div>

                </div>

            </div>

            <div class="image hidden-desktop">
                 <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($name); ?>" class="js-blur"/>
                <?php if('' != esc_url($url)){ ?>
                <div class="image-overlay">
                    <div class="image-overlay-wrap">
                        <div class="overlay">
                            <span class="icon-users overlay-icon"></span>
                            <a class="overlay-link" href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>:></a>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="description hidden-desktop">

                        <div class="nameJob">
                             <div class="name">
                                <?php if('' != esc_url($url)){ ?>
                                <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_attr($name); ?></a>
                                <?php
                                } else {
                                    echo esc_attr($name);
                                } ?>
                            </div>
                            <span class="job-title"><?php echo esc_attr($title); ?></span>
                        </div>

                    <div class="descHover">
                        <div class="table">
                            <div class="tableCell">
                                <div class="nameJob">
                                     <div class="name">
                                        <?php if('' != esc_url($url)){ ?>
                                        <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_attr($name); ?></a>
                                        <?php
                                        } else {
                                            echo esc_attr($name);
                                        } ?>
                                    </div>
                                    <span class="job-title"><?php echo esc_attr($title); ?></span>
                                </div>

                                <p class="descriptionContent">
                                    <?php  echo esc_attr($description); ?>
                                </p>

                                <div class="descriptionIcon">
                                    <?php


                                    $GLOBALS['px_sc_team_icon'] = array();
                                    do_shortcode($content);
                                    $icons = $GLOBALS['px_sc_team_icon'];

                                    if(count($icons))
                                    {?>
                                        <ul class="icons">
                                            <?php echo implode("\n", $icons); ?>
                                        </ul>
                                    <?php
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <?php } ?>

        </div>
    <?php
    return ob_get_clean();
}

add_shortcode('team_member', 'px_sc_team_member');

function px_sc_team_icon($atts, $content = null)
{
    extract(shortcode_atts(array(
        'title'   => '',
        'url'     => '#',
        'icon'    => 'evil-2',
        'target'  => '',
    ), $atts));

    if(strlen($target))
        $target = "target=\"$target\"";

    ob_start();
    ?>
    <li>
        <a href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>" <?php echo esc_attr($target); ?>>
            <span class="icon-<?php echo esc_attr($icon); ?>" ></span>
        </a>
    </li>
    <?php
    $GLOBALS['px_sc_team_icon'][] = ob_get_clean();
}

add_shortcode('team_icon', 'px_sc_team_icon');

/*-----------------------------------------------------------------------------------*/
/*	Accordion & Toggle
/*-----------------------------------------------------------------------------------*/

function px_sc_accordion($atts, $content=null)
{
    return px_sc_accordion_content('accordion', $atts, $content);
}

add_shortcode('accordion', 'px_sc_accordion');

function px_sc_toggle($atts, $content=null)
{
    return px_sc_accordion_content('toggle', $atts, $content);
}

add_shortcode('toggle', 'px_sc_toggle');

function px_sc_accordion_content($type='accordion',$atts, $content=null)
{
    $GLOBALS['px_sc_accordion_tab'] = array();
    do_shortcode($content);
    $items = $GLOBALS['px_sc_accordion_tab'];

    ob_start();
    ?>
    <div class="<?php echo esc_attr($type); ?>">
        <?php echo implode("\n", $items); ?>
    </div>
    <?php
    return ob_get_clean();
}

function px_sc_accordion_tab($atts, $content=null)
{
    px_sc_accordion_tab_content('accordion', $atts, $content);
}

add_shortcode('accordion_tab', 'px_sc_accordion_tab');

function px_sc_toggle_tab($atts, $content=null)
{
    px_sc_accordion_tab_content('toggle', $atts, $content);
}

add_shortcode('toggle_tab', 'px_sc_toggle_tab');

function px_sc_accordion_tab_content($type='accordion', $atts, $content=null)
{
    extract(shortcode_atts(array(
        'title'   => 'Accordion Tab',
        'keepopen' => ''
    ), $atts));

    if($type != 'accordion' && !array_key_exists('title', $atts))
        $title = 'Toggle Tab';

    $tabClass = $keepopen != '' ? 'keep-open' : '';

    ob_start();
    ?>
    <div class="tab <?php echo esc_attr($tabClass); ?>">
        <div class="header clearfix">
            <div class="tab-button"><span class="icon-minus"></span></div>
            <h4 class="title"><?php echo esc_attr($title); ?></h4>
        </div>
        <div class="body">
            <?php echo do_shortcode($content); ?>
        </div>
    </div>
    <?php
    $GLOBALS['px_sc_accordion_tab'][] = ob_get_clean();
}

/*-----------------------------------------------------------------------------------*/
/* Testimonials shortcode 
/*-----------------------------------------------------------------------------------*/

function px_sc_testimonial ($atts, $content = null) {

    extract(shortcode_atts(array(
        "number"					=> "-1",
		"order_by"					=> "date",
		"order"						=> "DESC",
        "category"					=> "",
        "text_color"				=> "",
        "author_text_color"			=> "",
        "testimonial_animation"	    => "",
        "testimonial_animation_delay" => "",
    ), $atts));
    
    $html = "";
    $testimonialWithAnimation = '';
    
    if( strlen($testimonial_animation)) {
        $testimonialWithAnimation = ' testimonialWithAnimation';
     }
    
    $args = array(
        'post_type' => 'testimonial',
        'orderby' => $order_by,
        'order' => $order,
        'posts_per_page' => $number
    );

    if ($category != "") {
        $args['testimonials_category'] = $category;
    }

    // desktop 
    $html .= "<div class='visible-desktop flexslider testimonials testimonialsFade clearfix $testimonialWithAnimation'";
    
    if(strlen($testimonial_animation)) {
        $html .= " data-delay='$testimonial_animation_delay' data-animation='$testimonial_animation'";
    };
    $html .='>';
    
    $html .= '<ul class="item-list">';
    
    query_posts($args);
    if (have_posts()) :
        while (have_posts()) : the_post();
            $author = get_post_meta(get_the_ID(), "testimonial-authorname", true);
            $text = get_post_meta(get_the_ID(), "testimonial-text", true);
            $authorimg = get_post_meta(get_the_ID(), "testimonial-image", true); 
            
            // desktop Size
            $html .= '<li id="desktop-testimonials' . get_the_ID() . '" class="testimonial">';
            $html .= '<div class="quote">';
                $html .= '<div class="head">';
             
                    $html.='<div class="clipPath" style="background-image:url('.$authorimg.')"></div>';
                    
                    $html .= '<h4 class="bigsize name">'.$author.'</h4>';
                $html .= '</div>'; 
                $html .= '<h4 class="smallsize name"';
                
                if(strlen($text_color)) {
                    $html .= ' style="color:'.$text_color.'"';
                }
                
                $html .='>'.$author.'</h4>';
                $html .= '<blockquote';
                
                if(strlen($author_text_color)){
                    $html .= ' style="color:'.$author_text_color.'"';
                }
                
                 $html .='>'.$text.'</blockquote>';
            $html .= '</div>';
            
            $html .= '<div class="clearfix"></div>'; 
            $html .= '</li>'; //close testimonials

        endwhile;
    else:
        $html .= __('Sorry, no posts matched your criteria.', 'qode');
    endif;

    wp_reset_query();
    $html .= '</ul>';//close slides
    $html .= '</div>';
    
    
    //tablet size 
    $html .= "<div class='hidden-desktop flexslider testimonials testimonialsFade clearfix'>";
    $html .= '<ul class="item-list">';
    
    query_posts($args);
    if (have_posts()) :
        while (have_posts()) : the_post();
            $author = get_post_meta(get_the_ID(), "testimonial-authorname", true);
            $text = get_post_meta(get_the_ID(), "testimonial-text", true);
            $authorimg = get_post_meta(get_the_ID(), "testimonial-image", true); 
            
            // tablet Size
            $html .= '<li id="testimonials' . get_the_ID() . '" class="testimonial">';
            $html .= '<div class="quote">';
                $html .= '<div class="head">';

                    $html.='<div class="clipPath" style="background-image:url('.$authorimg.')"></div>';
                    
                $html .= '</div>'; 
                $html .= '<h4 class="name"';
                
                if(strlen($text_color)) {
                    $html .= ' style="color:'.$text_color.'"';
                }
                
                $html .='>'.$author.'</h4>';
                
                $html .= '<blockquote';

                if(strlen($author_text_color)){
                    $html .= ' style="color:'.$author_text_color.'"';
                }
                
                $html .='>'.$text.'</blockquote>';
                 
                 
            $html .= '</div>';
            
            $html .= '<div class="clearfix"></div>'; 
            $html .= '</li>'; //close testimonials
        endwhile;
    else:
        $html .= __('Sorry, no posts matched your criteria.', 'qode');
    endif;

    wp_reset_query();
    $html .= '</ul>';//close slides
    $html .= '</div>';
    
    return $html;
}

add_shortcode('testimonial', 'px_sc_testimonial');

/*-----------------------------------------------------------------------------------*/
/*  Pie Chart
/*-----------------------------------------------------------------------------------*/

function px_sc_piechart($atts ,$content=null)
{
    extract(shortcode_atts(array(
        'title'    => '',
        'title_color'    => '',
        'subtitle' => '',
        'subtitle_color' => '',
        'piechart_percent' => '',
        'piechart_percent_display' => 'enable',
        'piechart_color'=> '#1f3642',
        'piechart_icon' => '',
        'piechart_animation' => '',
        'piechart_animation_delay' => '',
    ), $atts));

    $hasTitle   = '' != $title;
    $hasStyle = '' != $title_color || '' != $subtitle_color || '' != $piechart_color ;
    $class = "pieChart easyPieChart";
    $pieChartWithAnimation = '';
    $id	= px_sc_id('piechart');

    if( strlen($piechart_animation)) {

        $pieChartWithAnimation = ' pieChartWithAnimation';

     }

    ob_start();
    if($hasStyle)
    {
    ?>
    <style type="text/css" media="all" scoped>
        <?php if(strlen(esc_attr($title_color)))
        {
            echo "#$id.pieChartBox .title"; ?>
            {
                color: <?php echo esc_attr($title_color); ?>;
            }

        <?php
        }
        if(strlen(esc_attr($subtitle_color)))
        {
            echo "#$id.pieChartBox .subtitle"; ?>
            {
                color: <?php echo esc_attr($subtitle_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($piechart_color)))
        {
            echo "#$id.pieChartBox .perecent ,#$id.pieChartBox .icon"; ?>
            {
                color: <?php echo esc_attr($piechart_color); ?>;
            }
        <?php
        }
        ?>
    </style>
    <?php
    }//if($hasStyle)
    ?>

    <div id="<?php echo esc_attr($id); ?>" class="pieChartBox  <?php echo esc_attr($pieChartWithAnimation); ?> <?php if($piechart_percent_display == 'disable'){?> disablepercent <?php } ?>" <?php if(strlen(esc_attr($piechart_animation))) { ?> data-delay="<?php echo esc_attr($piechart_animation_delay); ?>" data-animation="<?php echo esc_attr($piechart_animation); ?>" <?php } ?> <?php if(esc_attr($piechart_color)){ ?> data-barColor=<?php echo esc_attr($piechart_color); }?>>
        <div class="<?php if($piechart_icon){?>iconPchart <?php } ?><?php echo esc_attr($class); ?>" data-percent="<?php echo esc_attr($piechart_percent); ?>">
            <?php if($piechart_icon){?><span class="icon icon-<?php echo esc_attr($piechart_icon); ?>"></span><?php } ?>
            <?php if($piechart_percent_display == 'enable'){?><span class="perecent"><?php echo esc_attr($piechart_percent); ?>%</span><?php } ?>
        </div>
        <p class="title"><?php echo esc_attr($title); ?></p>
        <p class="subtitle"><?php echo esc_attr($subtitle); ?></p>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'piechart', 'px_sc_piechart' );

/*-----------------------------------------------------------------------------------*/
/*  Horizontal progress bar
/*-----------------------------------------------------------------------------------*/

function px_sc_progressbar($atts ,$content=null)
{
    extract(shortcode_atts(array(
        'title'    => '',
        'title_color'    => '',
        'percent' => '50',
        'active_bg_color' => '',
        'inactive_bg_color' => '',
        'progressbar_animation' => '',
        'progressbar_animation_delay' => '',
    ), $atts));

    $hasStyle = '' != $title_color || '' != $active_bg_color || '' != $inactive_bg_color ;
    $id	= px_sc_id('progressbar');
    $progressbarWithAnimation = '';

    if($progressbar_animation !== 'none') {

        $progressbarWithAnimation = ' progressbarWithAnimation';

     }
     
    ob_start();
    ?>

    <div id="<?php echo esc_attr($id); ?>"  class="progress_bar <?php echo esc_attr($progressbarWithAnimation); ?>"  <?php if(strlen(esc_attr($inactive_bg_color))) { ?> style="background-color: <?php echo esc_attr($inactive_bg_color); ?>;" <?php } ?> data-delay="<?php echo esc_attr($progressbar_animation_delay); ?>" data-animation="<?php echo esc_attr($progressbar_animation); ?>">
        <div class="progressbar_holder">
            <?php if($title){?><span class="progress_title" <?php if(strlen(esc_attr($title_color))) { ?> style="color:<?php echo esc_attr($title_color); ?>" <?php } ?> ><?php if(esc_attr($title)){ echo esc_attr($title); } ?></span><?php } ?>
            <div class="progressbar_percent" data-percentage="<?php if(esc_attr($percent)){ echo esc_attr($percent); } ?>" <?php if(strlen(esc_attr($active_bg_color))) { ?> style="background-color:<?php echo esc_attr($active_bg_color); ?>" <?php } ?> ></div>
        </div>
    </div>
    
    <?php
    return ob_get_clean();
}

add_shortcode( 'progressbar', 'px_sc_progressbar' );

/*-----------------------------------------------------------------------------------*/
/*	Social Link 
/*-----------------------------------------------------------------------------------*/

function px_sc_socialLink ($atts, $content=null)
{
    extract(shortcode_atts(array(
        'sociallink_url' => '',
        'sociallink_type'=> 'facebook3',
        'sociallink_style' => 'dark',
    ), $atts));
    
    $id	= px_sc_id('socialLink');
    ob_start();

    ?>
    
    <div class="socialLinkShortcode <?php echo esc_attr($sociallink_style); ?>">
        <a id="<?php echo esc_attr($id); ?>" href="<?php echo esc_url($sociallink_url); ?>" target="_blank">
            <span class="visible-desktop hover-bg <?php echo esc_attr($sociallink_type); ?> reset">
		        <span class="visible-desktop icon-<?php echo esc_attr($sociallink_type); ?> hover-text reset"></span>
	        </span>
            <span class="icon icon-<?php echo esc_attr($sociallink_type); ?>"></span>
        </a>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'socialLink', 'px_sc_socialLink' );


/*-----------------------------------------------------------------------------------*/
/*  Text-Box
/*-----------------------------------------------------------------------------------*/

function px_sc_textbox($atts)
{
    extract(shortcode_atts(array(

        'title'  => '',
        'title_color'  => '',
        'title_fontsize'  => '20',
        'text_align'  => 'left',
        'text_title_style'  => 'none',
        'text_border_underline_color' => '',
        'text_under_align'  => 'left',
        'text_content'  => '',
        'text_content_color'  => '',
        'content_fontsize'  => '12',
        'text_animation'  => '',
        'text_animation_delay'  => '',
        'content'  => '',
        'url'  => '',
        'target' => '',

    ), $atts));

    $hasTitle  = '' != $title;
    $titleIsLink = '' != $url;
    $hasContent  = '' != $text_content;
    $hasStyle = '' != $title_color || '' != $text_border_underline_color || '' != $text_content_color || '' ;

    $id     = px_sc_id('textbox');
    $class  = array();
    $class[] = 'fontSize'.$title_fontsize;
    $contentFSClass = 'contentfs'.$content_fontsize;

    switch($text_align)
    {
        case 'right':
            $class[] = 'textBoxRight';
            break;
        case 'center':
            $class[] = 'textBoxCenter';
            break;
        case 'left':
        default:
            $class[] = 'textBoxleft';

    }

    switch($text_under_align)
    {
        case 'right':
            $class[] = 'textBoxUnderRight';
            break;
        case 'center':
            $class[] = 'textBoxUnderCenter';
            break;
        case 'left':
        default:
            $class[] = 'textBoxUnderleft';

    }

    switch($text_title_style)
    {
        case 'underline':
            $class[] = 'textBoxUnderline';
            break;
        case 'border':
            $class[] = 'textBoxBorder';
            break;
        case 'left_border':
            $class[] = 'textLeftBorder';
            break;
        case 'none':
        default:
            $class[] = 'textBoxNoStyle';
    }

     if( strlen($text_animation)) {

        $class[] = ' textWithAnimation';

     }

    ob_start();

    if($hasStyle)
    {
    ?>
    <style type="text/css" media="all" scoped>
        <?php if(strlen(esc_attr($text_border_underline_color)))
        {
            echo "#$id.textBoxBorder .title "; ?>
            {
                border:4px solid <?php echo esc_attr($text_border_underline_color); ?>;
            }

            <?php
            echo "#$id.textBoxUnderline .title  hr "; ?>
            {
                background-color: <?php echo esc_attr($text_border_underline_color); ?>;
            }
            
            <?php 
            echo "#$id.textLeftBorder .title"; ?>
            {
                border-left: 6px solid <?php echo esc_attr($text_border_underline_color); ?>;
            }
            
        <?php
        }
        ?>
    </style>
    <?php
    }//if($hasStyle)
    ?>

    <div id="<?php echo esc_attr($id); ?>" class="textBox <?php echo implode(' ', $class); ?>"  <?php if(strlen(esc_attr($text_animation))) { ?> data-delay="<?php echo esc_attr($text_animation_delay); ?>" data-animation="<?php echo esc_attr($text_animation); ?>" <?php } ?> >
        <?php if($hasTitle){ ?>

            <?php if($titleIsLink){ ?>

                <a class="title" <?php if(strlen(esc_attr($title_color))){ ?> style="color:<?php echo esc_attr($title_color); ?>;" <?php } ?> href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_attr($title); ?>
                    <hr>
                </a>
                <?php } else { ?>

                    <div class="title" <?php if(strlen(esc_attr($title_color))){ ?> style="color:<?php echo esc_attr($title_color); ?>;" <?php } ?>><?php echo esc_attr($title); ?>
                        <hr>
                    </div>

                <?php }?>

        <?php } ?>
        <?php if($hasContent){ 
		$text_content=apply_filters('the_content',$text_content);
		
			
			
			
			
			?>
            <div class="<?php echo esc_attr($contentFSClass); ?> text" <?php if(strlen(esc_attr($text_content_color))) { ?> style="color: <?php echo esc_attr($text_content_color); ?>;" <?php } ?>><?php echo ($text_content) ; ?></div>
        <?php } ?>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'textbox', 'px_sc_textbox' );


/*-----------------------------------------------------------------------------------*/
/*  Text-Box-icon
/*-----------------------------------------------------------------------------------*/

function px_sc_textbox_icon($atts)
{
    extract(shortcode_atts(array(

        'title'  => '',
        'title_color'  => '',
        'seperator_color' => '',
        'icon'=> '',
        'title_fontsize'  => '20',
        'text_align'  => 'left',
        'text_title_style'  => 'left_border',
        'text_content'  => '',
        'text_content_color'  => '',
        'content_fontsize'  => '12',
        'text_animation'  => '',
        'text_animation_delay'  => '',
        'content'  => '',
        'url'  => '',
        'target' => '',

    ), $atts));

    $hasTitle  = '' != $title;
    $titleIsLink = '' != $url;
    $hasContent  = '' != $text_content;

    $id     = px_sc_id('textbox_icon');
    $class  = array();
    $class[] = 'fontSize'.$title_fontsize;
    $contentFSClass = 'contentfs'.$content_fontsize;

    switch($text_align)
    {
        case 'right':
            $class[] = 'textBoxRight';
            break;
        case 'center':
            $class[] = 'textBoxCenter';
            break;
        case 'left':
        default:
            $class[] = 'textBoxleft';

    }
    
    switch($text_title_style)
    {
        case 'underline':
            $class[] = 'textBoxUnderline';
            break;
        case 'border':
            $class[] = 'textBoxBorder';
            break;
        case 'left_border':
            $class[] = 'textLeftBorder';
            break;
        case 'none':
        default:
            $class[] = 'textBoxNoStyle';
    }

     if( strlen($text_animation)) {

        $class[] = ' textWithAnimation';

     }

    ob_start();
    
    ?>

    <div id="<?php echo esc_attr($id); ?>" class="textBox textBoxIcon <?php echo implode(' ', $class); ?>"  <?php if(strlen(esc_attr($text_animation))) { ?> data-delay="<?php echo esc_attr($text_animation_delay); ?>" data-animation="<?php echo esc_attr($text_animation); ?>" <?php } ?> >
        
        <?php if (strlen($icon) || strlen(esc_attr($title))) { ?>
        
            <div class="textBoxIconTitle clearfix">
            
                <?php if (strlen($icon)) { ?>
                    <span class="icon icon-<?php echo esc_attr($icon) ?>" <?php if(strlen(esc_attr($title_color))) { ?> style="color:<?php echo esc_attr($title_color); ?>;" <?php } ?>></span>
                <?php } ?>
        
                <?php if($hasTitle){ ?>

                    <?php if(esc_attr($titleIsLink)){ ?>
                        <a class="title"  href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>" style="<?php if(strlen(esc_attr($seperator_color))) { ?> border-left: solid <?php echo esc_attr($seperator_color); ?> 8px; <?php } ?> <?php if(strlen(esc_attr($title_color))) { ?> color:<?php echo esc_attr($title_color); ?>; <?php } ?>"><?php echo esc_attr($title); ?></a>
                        <?php } else { ?>
                            <div class="title" style="<?php if(strlen(esc_attr($seperator_color))) { ?> border-left: solid <?php echo esc_attr($seperator_color); ?> 8px; <?php } ?> <?php if(strlen(esc_attr($title_color))) { ?> color:<?php echo esc_attr($title_color); ?>; <?php } ?>"><?php echo esc_attr($title); ?></div>
                        <?php } ?>
                    
                <?php } ?>
            
            </div>
        <?php } ?>

        <?php if($hasContent){ ?>
            <div class="<?php echo esc_attr($contentFSClass); ?> text"  <?php if(strlen(esc_attr($text_content_color))) { ?> style="color:<?php echo esc_attr($text_content_color); ?>;" <?php } ?>><?php echo esc_attr($text_content) ; ?></div>
        <?php } ?>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'textbox_icon', 'px_sc_textbox_icon' );


/*-----------------------------------------------------------------------------------*/
/*  Pixflow Header 
/*-----------------------------------------------------------------------------------*/

function px_sc_pixflowheader($atts)
{
    extract(shortcode_atts(array(

        'title'  => '',
        'bottom_text' => '',
        'title_color'  => '',
        'title_underline' => '',
        'pixflowheader_animation'  => '',
        'pixflowheader_animation_delay'  => '',
        'title_undeline_color'  => '',
    ), $atts));

    $hasTitle  = '' != $title || '' != $subtitle_color ;
    $hasStyle = '' != $title_color || '' != $title_undeline_color;
        
    $id     = px_sc_id('pixflowHeader');

    ob_start();
    
    ?>
    
    <div id="<?php echo esc_attr($id); ?>" class="pixflowHeader <?php if (strlen(esc_attr($pixflowheader_animation))) { ?> pixflowHeaderWithAnimation <?php } ?>" data-animation="<?php echo esc_attr($pixflowheader_animation); ?>">
        <?php if(strlen(esc_attr($bottom_text))) { ?>

            <div class="bottomtext"  <?php if(strlen(esc_attr($title_color))) { ?> style="color:<?php echo esc_attr($title_color); ?>;" <?php } ?> >
                 <?php echo esc_attr($bottom_text); ?>   
            </div>
            
            <?php if(strlen(esc_attr($title))){ ?>
                <div class="title" <?php if(strlen(esc_attr($title_color))) { ?> style="color:<?php echo esc_attr($title_color); ?>;" <?php } ?>>
                    <?php echo esc_attr($title); ?>

                    <?php if($title_underline == 1) {?>
                        <hr <?php if(strlen(esc_attr($title_undeline_color))) { ?> style="background-color: <?php echo esc_attr($title_undeline_color); ?>;" <?php } ?>/>
                    <?php } ?>
                
                </div>
            <?php } ?> 
            
        <?php } ?>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'pixflowHeader', 'px_sc_pixflowheader' );


/*-----------------------------------------------------------------------------------*/
/*  Image-Box
/*-----------------------------------------------------------------------------------*/

function px_sc_imagebox($atts)
{
    extract(shortcode_atts(array(

        'image_url'  => '',
        'image_hover'  => 'disable',
        'image_hover_style'  => 'creative',
        'image_hover_color'  => '',
        'image_animation'  => '',
        'image_animation_delay'  => '',
        'title'  => '',
        'title_color'  => '',
        'subtitle'  => '',
        'subtitle_color'  => '',
        'image_text_color'  => '',
        'image_text_align'  => 'left',
        'image_text_background_color'  => '',
        'image_text_border'  => 'disable',
        'image_text_border_color'  => '',
        'content'  => '',
        'vccontent'  => '',
        'url'  => '',
        'target' => '',

    ), $atts));

    if (is_numeric($image_url)) {
        $image_url = wp_get_attachment_url($image_url);
        if(!$image_url){
            $image_url=THEME_IMAGES_URI."/placeholders/image-box-holder.jpg";
        }
    }
        
    $hasTitle  = '' != $title;
    $hasUrl = '' != $url;
    $hasSubTitle  = '' != $subtitle;
    $hasStyle = '' != $title_color || '' != $subtitle_color || '' != $image_text_color || '' != $image_text_background_color || '' != $image_text_border_color || '' != $image_hover_color;
    $hasTSContent = '' != $title || '' != $subtitle || '' != $content ;
    $hasContent = '' != $content ;
    $hasVCContent = '' != $vccontent;

    $id     = px_sc_id('imagebox');
    $class  = array();

    switch($image_text_align)
    {
        case 'right':
            $class[] = 'imageBoxRight';
            break;
        case 'center':
            $class[] = 'imageBoxCenter';
            break;
        case 'left':
        default:
            $class[] = 'imageBoxleft';
    }


    switch($image_text_border)
    {
        case 'enable':
            $class[] = 'ImageBoxEnable';
            break;
        case 'disable':
            $class[] = 'ImageBoxDisable';
            break;
    }


     if( strlen($image_animation)) {

        $class[] = 'imgWithAnimation';

     }

    switch($image_hover)
    {
        case 'enable':
            $class[] = 'imgBoxHover';
            break;
    }



    ob_start();

    if($hasStyle)
    {
    ?>
    <style type="text/css" media="all" scoped>
        <?php if(strlen(esc_attr($image_text_border_color)))
        {
            echo "#$id.imageBox "; ?>
            {
                border:solid 1px <?php echo esc_attr($image_text_border_color); ?>;
            }

        <?php
        }
        if(strlen(esc_attr($title_color)))
        {
            echo "#$id .content .title"; ?>
            {
                color: <?php echo esc_attr($title_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($subtitle_color)))
        {
            echo "#$id  .content .subtitle "; ?>
            {
                color: <?php echo esc_attr($subtitle_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($image_text_color)))
        {
            echo "#$id  .content .text "; ?>
            {
                color: <?php echo esc_attr($image_text_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($image_text_background_color)))
        {
            echo "#$id  .content "; ?>
            {
                background-color: <?php echo esc_attr($image_text_background_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($image_hover_color)))
        {
            echo "#$id .hover-bg "; ?>
            {
                background-color: <?php echo esc_attr($image_hover_color); ?>;
            }
        <?php
        }
        ?>  
    </style>
    <?php
    }//if($hasStyle)
    ?>

    <div id="<?php echo esc_attr($id); ?>" class="imageBox <?php echo implode(' ', $class); ?>"  <?php if(strlen(esc_attr($image_animation))) { ?> data-delay="<?php echo esc_attr($image_animation_delay); ?>" data-animation="<?php echo esc_attr($image_animation); ?>" <?php } ?> >

        <?php if(strlen(esc_url($image_url)) && $image_hover_style == "classic" && $image_hover == "enable" ){ ?>
        
            <!-- Classic Hover  -->
            <div class="image">
                <div class="imageHOpacity"></div>
                <img src="<?php echo esc_url($image_url); ?>" <?php if ( esc_attr($title) ) { ?> alt="<?php echo esc_attr($title) ?>" <?php } else { ?> alt="" <?php } ?>>
            </div>
            
         <?php }  else if(strlen(esc_url($image_url)) && $image_hover_style == "creative" && $image_hover == "enable"){ ?>
         
            <!-- Creative hover -->
            <div class="image">
                <img src="<?php echo esc_url($image_url); ?>" <?php if ( esc_attr($title) ) { ?> alt="<?php echo esc_attr($title) ?>" <?php } else { ?> alt="" <?php } ?>>
                <?php if ($hasUrl) { ?>
                    <div class="hover-bg reset"></div>
                    <a class="imagebox_link" href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"></a>
                    <span class="iconhover"></span>
                <?php } else { ?>
                    <div class="hover-bg reset"></div>
                <?php } ?>
            </div>
            
        <?php }  else { ?>
         
            <!-- Disable Hover  -->
            <div class="image">
                <img src="<?php echo esc_url($image_url); ?>" <?php if ( esc_attr($title) ) { ?> alt="<?php echo esc_attr($title) ?>" <?php } else { ?> alt="" <?php } ?>>
            </div>
        
        <?php } ?>
        
         
         <?php if ($hasTSContent) { ?>
            <div class="content">
                <?php if($hasTitle){ ?>
                    <?php if ($hasUrl) { ?>
                     <a class="title" href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_attr($title); ?></a>
                    <?php }  else { ?>
                     <div class="title"><?php echo esc_attr($title); ?></div>
                    <?php } ?>
                <?php } ?>
                <?php if($hasSubTitle){ ?>
                    <div class="subtitle"><?php echo esc_attr($subtitle); ?></div>
                <?php } ?>
                <?php if($hasContent){ ?>
                    <div class="text"><?php echo esc_attr($content); ?></div>
                <?php } ?>
                <?php if($hasVCContent){ ?>
                    <div class="text"><?php echo esc_attr($vccontent); ?></div>
                <?php } ?>
            </div>
        <?php } ?>

    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'imagebox', 'px_sc_imagebox' );

/*-----------------------------------------------------------------------------------*/
/*  Icon-Box-top No border 
/*-----------------------------------------------------------------------------------*/

function px_sc_iconbox_noborder($atts, $content=null)
{
    extract(shortcode_atts(array(
        'title'         => '',
        'title_color'   => '',
        'icon_animation' => '',
        'icon_animation_delay' => '',
        'icon'          => 'wand',
        'icon_color'         => '',
        'icon_border'         => '',
        'icon_border_color'         => '',
        'icon_background_fill'         => 'fillbackground',
        'icon_position' => 'top',
        'url'           => '',
        'url_text'      => __('Learn More', TEXTDOMAIN),
        'target'        => '',
        'content_text' => '',
        'content_color' => '',
        'animate'       => 'no'
    ), $atts));

    $hasTitle  = '' != $title;
    $hasStyle = '' != $title_color || '' != $icon_color || '' != $content_color ;

    $id     = px_sc_id('iconbox');
    $class  = array("iconbox");

    if( strlen($icon_position)) {

        $class[] = 'iconbox-top';
        
    }
    
    if( strlen($icon_animation)) {

        $class[] = ' iconWithAnimation';

    }

    if( strlen($icon_animation)) {

        $class[] = ' iconWithAnimation';

    }
    
    if( strlen($icon_border)) {

        $class[] = " $icon_border";

    }
    
    if( strlen($icon_background_fill)) {

        $class[] = " $icon_background_fill";

    }

    ob_start();

    if($hasStyle)
    {
    ?>
    <style type="text/css" media="all" scoped>
        <?php if(strlen(esc_attr($title_color)))
        {
            echo "#$id  .title "; ?>
            {
                color: <?php echo esc_attr($title_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($icon_color)))
        {
            echo "#$id .glyph"; ?>
            {
                color: <?php echo esc_attr($icon_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($icon_border_color)))
        {
            echo "#$id .icon span.glyph"; ?>
            {
                border-color: <?php echo esc_attr($icon_border_color); ?>;
                background-color: <?php echo esc_attr($icon_border_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($content_color)))
        {
            echo "#$id  .content , #$id .more-link a "; ?>
            {
                color: <?php echo esc_attr($content_color); ?>;
            }
        <?php
        }?>
    </style>
    <?php
    }//if($hasStyle)
    ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo implode(' ', $class); ?>"  <?php if(strlen($icon_animation)) { ?> data-delay="<?php echo esc_attr($icon_animation_delay); ?>" data-animation="<?php echo esc_attr($icon_animation); ?>" <?php } ?>>
        <div class="icon">
            <span class="glyph icon-<?php echo esc_attr($icon); ?>"></span>
        </div>
        <div class="content-wrap">
            <?php if($hasTitle){ ?>
                <h3 class="title"><?php echo esc_attr($title); ?></h3>
            <?php } ?>
            
            <!-- iconbox content -->
            <?php if(strlen(esc_attr($content_text))) { ?>
                <div class="content"><?php echo esc_attr($content_text); ?></div>
            <?php } ?>
           
            <?php if(strlen(esc_url($url))){ ?>
                <div class="more-link">
                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_attr($url_text); ?><span class="icon-play"></span></a>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'iconbox_top_noborder', 'px_sc_iconbox_noborder' );

/*-----------------------------------------------------------------------------------*/
/*  Icon-Box-Rectangle
/*-----------------------------------------------------------------------------------*/

function px_sc_iconbox_rectangle($atts, $content=null)
{
    extract(shortcode_atts(array(
        'title'         => '',
        'title_color'   => '',
        'icon_animation' => '',
        'icon_animation_delay' => '',
        'icon'          => 'wand',
        'icon_color'         => '',
        'icon_border'         => 'rectangle',
        'icon_border_color'         => '',
        'icon_background_fill'         => 'fillbackground',
        'icon_position' => 'top',
        'url'           => '',
        'url_text'      => __('Learn More', TEXTDOMAIN),
        'target'        => '',
        'content_text' => '',
        'content_color' => '',
        'animate'       => 'no'
    ), $atts));

    $hasTitle  = '' != $title;
    $hasStyle = '' != $title_color || '' != $icon_color || '' != $content_color ;

    $id     = px_sc_id('iconbox');
    $class  = array("iconbox");

    if( strlen($icon_position)) {

        $class[] = 'iconbox-top';
        
    }
    
    if( strlen($icon_animation)) {

        $class[] = ' iconWithAnimation';

    }

    if( strlen($icon_animation)) {

        $class[] = ' iconWithAnimation';

    }
    
    if( strlen($icon_border)) {

        $class[] = " $icon_border";

    }
    
    if( strlen($icon_background_fill)) {

        $class[] = " $icon_background_fill";

    }

    ob_start();

    if($hasStyle)
    {
    ?>
    <style type="text/css" media="all" scoped>
        <?php if(strlen(esc_attr($title_color)))
        {
            echo "#$id  .title "; ?>
            {
                color: <?php echo esc_attr($title_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($icon_color)))
        {
            echo "#$id .glyph"; ?>
            {
                color: <?php echo esc_attr($icon_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($icon_border_color)))
        {
            echo "#$id .icon span.glyph"; ?>
            {
                border-color: <?php echo esc_attr($icon_border_color); ?>;
                background-color: <?php echo esc_attr($icon_border_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($content_color)))
        {
            echo "#$id  .content , #$id .more-link a "; ?>
            {
                color: <?php echo esc_attr($content_color); ?>;
            }
        <?php
        }?>
    </style>
    <?php
    }//if($hasStyle)
    ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo implode(' ', $class); ?>"  <?php if(strlen($icon_animation)) { ?> data-delay="<?php echo esc_attr($icon_animation_delay); ?>" data-animation="<?php echo esc_attr($icon_animation); ?>" <?php } ?>>
        <div class="icon">
            <span class="glyph icon-<?php echo esc_attr($icon); ?>"></span>
        </div>
        <div class="content-wrap">
            <?php if($hasTitle){ ?>
                <h3 class="title"><?php echo esc_attr($title); ?></h3>
            <?php } ?>
            
            <!-- iconbox content -->
            <?php if(strlen(esc_attr($content_text))) { ?>
                <div class="content"><?php echo esc_attr($content_text); ?></div>
            <?php } ?>
            
            <?php if(strlen(esc_url($url))){ ?>
                <div class="more-link">
                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_attr($url_text); ?><span class="icon-play"></span></a>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'iconbox_rectangle', 'px_sc_iconbox_rectangle' );


/*-----------------------------------------------------------------------------------*/
/*  Icon-Box-Rectangle
/*-----------------------------------------------------------------------------------*/

function px_sc_iconbox_circle($atts, $content=null)
{
    extract(shortcode_atts(array(
        'title'         => '',
        'title_color'   => '',
        'icon_animation' => '',
        'icon_animation_delay' => '',
        'icon'          => 'wand',
        'icon_color'         => '',
        'icon_border'         => 'circle',
        'icon_border_color'         => '',
        'icon_background_fill'         => 'fillbackground',
        'icon_position' => 'top',
        'url'           => '',
        'url_text'      => __('Learn More', TEXTDOMAIN),
        'target'        => '',
        'content_text' => '',
        'content_color' => '',
        'animate'       => 'no'
    ), $atts));

    $hasTitle  = '' != $title;
    $hasStyle = '' != $title_color || '' != $icon_color || '' != $content_color ;

    $id     = px_sc_id('iconbox');
    $class  = array("iconbox");
    
    if( strlen($icon_position)) {

        $class[] = 'iconbox-top';

    }
    
    if( strlen($icon_animation)) {

        $class[] = ' iconWithAnimation';

    }

    if( strlen($icon_animation)) {

        $class[] = ' iconWithAnimation';

    }
    
    if( strlen($icon_border)) {

        $class[] = " $icon_border";

    }
    
    if( strlen($icon_background_fill)) {

        $class[] = " $icon_background_fill";

    }

    ob_start();

    if($hasStyle)
    {
    ?>
    <style type="text/css" media="all" scoped>
        <?php if(strlen(esc_attr($title_color)))
        {
            echo "#$id  .title "; ?>
            {
                color: <?php echo esc_attr($title_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($icon_color)))
        {
            echo "#$id .glyph"; ?>
            {
                color: <?php echo esc_attr($icon_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($icon_border_color)))
        {
            echo "#$id .icon span.glyph"; ?>
            {
                border-color: <?php echo esc_attr($icon_border_color); ?>;
                background-color: <?php echo esc_attr($icon_border_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($content_color)))
        {
            echo "#$id  .content , #$id .more-link a "; ?>
            {
                color: <?php echo esc_attr($content_color); ?>;
            }
        <?php
        }?>
    </style>
    <?php
    }//if($hasStyle)
    ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo implode(' ', $class); ?>"  <?php if(strlen($icon_animation)) { ?> data-delay="<?php echo esc_attr($icon_animation_delay); ?>" data-animation="<?php echo esc_attr($icon_animation); ?>" <?php } ?>>
        <div class="icon">
            <span class="glyph icon-<?php echo esc_attr($icon); ?>"></span>
        </div>
        <div class="content-wrap">
            <?php if($hasTitle){ ?>
                <h3 class="title"><?php echo esc_attr($title); ?></h3>
            <?php } ?>
           
            <!-- iconbox content -->
            <?php if(strlen(esc_attr($content_text))) { ?>
                <div class="content"><?php echo esc_attr($content_text); ?></div>
            <?php } ?>
            
            <?php if(strlen(esc_url($url))){ ?>
                <div class="more-link">
                    <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_attr($url_text); ?><span class="icon-play"></span></a>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'iconbox_circle', 'px_sc_iconbox_circle' );

/*-----------------------------------------------------------------------------------*/
/*  Icon-Box-left
/*-----------------------------------------------------------------------------------*/

function px_sc_iconbox_left($atts, $content=null)
{
    extract(shortcode_atts(array(
        'title'         => '',
        'title_color'   => '',
        'icon_animation' => '',
        'icon_animation_delay' => '',
        'icon'          => 'wand',
        'icon_color'         => '',
        'icon_border'         => '',
        'icon_border_color'         => '',
        'icon_background_fill'    => 'fillbackground',
        'icon_position' => 'left',
        'url'           => '',
        'url_text'      => __('Learn More', TEXTDOMAIN),
        'target'        => '',
        'content_text' => '',
        'content_color' => '',
        'animate'       => 'no'
    ), $atts));

    $hasTitle  = '' != $title;
    $hasStyle = '' != $title_color || '' != $icon_color || '' != $content_color ;

    $id     = px_sc_id('iconbox');
    $class  = array("iconbox");
    
    if( strlen($icon_position)) {

        $class[] = 'iconbox-left';

    }
    
    if( strlen($icon_animation)) {

        $class[] = ' iconWithAnimation';

    }

    if( strlen($icon_animation)) {

        $class[] = ' iconWithAnimation';

    }
    
    if( strlen($icon_border)) {

        $class[] = " $icon_border";

    }
    
    if( strlen($icon_background_fill)) {

        $class[] = " $icon_background_fill";

    }

    ob_start();

    if($hasStyle)
    {
    ?>
    <style type="text/css" media="all" scoped>
        <?php if(strlen(esc_attr($title_color)))
        {
            echo "#$id  .title "; ?>
            {
                color: <?php echo esc_attr($title_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($icon_color)))
        {
            echo "#$id .glyph"; ?>
            {
                color: <?php echo esc_attr($icon_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($icon_border_color)))
        {
            echo "#$id .icon span.glyph"; ?>
            {
                border-color: <?php echo esc_attr($icon_border_color); ?>;
                background-color: <?php echo esc_attr($icon_border_color); ?>;
            }
        <?php
        }
        if(strlen($content_color))
        {
            echo "#$id  .content , #$id .more-link a "; ?>
            {
                color: <?php echo esc_attr($content_color); ?>;
            }
        <?php
        }?>
    </style>
    <?php
    }//if($hasStyle)
    ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo implode(' ', $class); ?>"  <?php if(strlen(esc_attr($icon_animation))) { ?> data-delay="<?php echo esc_attr($icon_animation_delay); ?>" data-animation="<?php echo esc_attr($icon_animation); ?>" <?php } ?>>
        <div class="icon">
            <span class="glyph icon-<?php echo esc_attr($icon); ?>"></span>
        </div>
        <div class="content-wrap">
            <?php if(esc_attr($hasTitle)){ ?>
                <h3 class="title"><?php echo esc_attr($title); ?></h3>
            <?php } ?>
            <!-- iconbox content -->
            <?php if(strlen(esc_attr($content_text))) { ?>
                <div class="content"><?php echo esc_attr($content_text); ?></div>
            <?php } ?>      
            <?php if(strlen(esc_url($url))){ ?>
                <div class="more-link">
                    <a href="<?php esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_attr($url_text); ?><span class="icon-play"></span></a>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'iconbox_left', 'px_sc_iconbox_left' );

/*-----------------------------------------------------------------------------------*/
/*	Counter Box
/*-----------------------------------------------------------------------------------*/

function px_sc_conterbox($atts, $content=null)
{
    extract(shortcode_atts(array(
        'counter_number'  => '500',
		'counter_from'=>'0',
        'counter_number_color' => '',
        'counter_text_color' => '' ,
        'counter_animation' => '' ,
        'counter_animation_delay' => '' ,
        'counter_text'   =>  __('Description', TEXTDOMAIN),
    ), $atts));

    $hasStyle = '' != $counter_number_color || '' != $counter_text_color ;
   if(strpos($counter_number,"."))
   {
	    $counter_number = floatval($counter_number);
		$dec=strlen(substr(strrchr($counter_number, "."), 1));
   }
   else
   {
	   $counter_number = intval($counter_number);
	   $dec=0;
   }
  
    $id     = px_sc_id('conterbox');

    $class  = array("counterBox");

    if( strlen($counter_animation)) {

        $class[] = 'counterWithAnimation';

     }

    ob_start();

    if($hasStyle)
    {
    ?>
    <style type="text/css" media="all" scoped>
        <?php if(strlen(esc_attr($counter_number_color)))
        {
            echo "#$id > .counterBoxNumber"; ?>
            {
                color: <?php echo esc_attr($counter_number_color); ?>;
            }
        <?php
        }
        if(strlen(esc_attr($counter_text_color)))
        {
            echo "#$id > .counterBoxDetails"; ?>
            {
                color: <?php echo esc_attr($counter_text_color); ?>;
            }
        <?php
        }?>
    </style>
    <?php
    }//if($hasStyle)
    ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo implode(' ', $class); ?>" <?php if(strlen(esc_attr($counter_animation))) { ?> data-delay="<?php echo esc_attr($counter_animation_delay); ?>" data-animation="<?php echo esc_attr($counter_animation); ?>" <?php } ?> data-dec="<?php echo esc_attr($dec); ?>" data-to="<?php echo esc_attr($counter_number); ?>" data-from="<?php echo esc_attr($counter_from); ?>">
        <span class="counterBoxNumber highlight"><?php echo esc_attr($counter_number); ?></span>
        <h4 class="counterBoxDetails"><?php echo esc_attr($counter_text); ?></h4>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'conterbox', 'px_sc_conterbox' );

/*-----------------------------------------------------------------------------------*/
/*  Video Vimeo
/*-----------------------------------------------------------------------------------*/

function px_sc_video_vimeo($atts, $content=null)
{
    extract(shortcode_atts(array(
        'vimeo_id'  => '',
    ), $atts));


    $vimeo_height = 315;
    $vimeo_width = 560;

    $id     = px_sc_id('video_vimeo');
    $class  = array("video_vimeo");

    ob_start();
    ?>

        <div id="<?php echo esc_attr($id); ?>">
            <iframe src="http://player.vimeo.com/video/<?php echo esc_attr($vimeo_id) ?>" width="<?php echo esc_attr($vimeo_width); ?>" height="<?php echo esc_attr($vimeo_height); ?>" frameborder="0"></iframe>
        </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'video_vimeo', 'px_sc_video_vimeo' );

/*-----------------------------------------------------------------------------------*/
/*  Video YouTube
/*-----------------------------------------------------------------------------------*/

function px_sc_video_youtube($atts, $content=null)
{
    extract(shortcode_atts(array(
        'youtube_id'  => '',
    ), $atts));


    $youtube_height = 315;
    $youtube_width = 560;

    $id     = px_sc_id('video_youtube');
    $class  = array("video_youtube");

    ob_start();
    ?>

    <div id="<?php echo esc_attr($id); ?>">
        <iframe title="YouTube video player" width="<?php echo esc_attr($youtube_width); ?>" height="<?php echo esc_attr($youtube_height); ?>" src="http://www.youtube.com/embed/<?php echo esc_attr($youtube_id) ?>" frameborder="0" allowfullscreen></iframe>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'video_youtube', 'px_sc_video_youtube' );

/*-----------------------------------------------------------------------------------*/
/*  Audio SoundCloud
/*-----------------------------------------------------------------------------------*/

function px_sc_audio_soundcloud($atts, $content=null)
{
    extract(shortcode_atts(array(
        'soundcloud_id'  => '',
        'soundcloud_height'   =>  '315',
        'soundcloud_width'   => '560',
    ), $atts));

    $soundcloud_height = intval($soundcloud_height);
    $soundcloud_width = intval($soundcloud_width);

    $id     = px_sc_id('video_youtube');
    $class  = array("audio_soundcloud");

    ob_start();
    ?>

    <div <?php echo esc_attr($id); ?>>
        <iframe width="<?php echo esc_attr($soundcloud_width); ?>" height="<?php echo esc_attr($soundcloud_height); ?>" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?visual=true&url=<?php echo esc_attr($soundcloud_id); ?>"></iframe>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'audio_soundcloud', 'px_sc_audio_soundcloud' );

/*-----------------------------------------------------------------------------------*/
/*  Tabs
/*-----------------------------------------------------------------------------------*/

function px_sc_tab_group($atts, $content=null)
{
    $GLOBALS['px_sc_tab'] = array();
    do_shortcode($content);
    $tabs = $GLOBALS['px_sc_tab'];

    ob_start();
    ?>
    <div class="tabs">
    <?php if(count($tabs)){ ?>
        <ul class="head clearfix">
            <?php foreach($tabs as $tab){ ?>
            <li><?php echo esc_attr($tab[0]); ?></li>
            <?php } ?>
        </ul>
        <div class="content">
            <?php foreach($tabs as $tab){ ?>
                <div class="tab-content"><?php echo esc_attr($tab[1]); ?></div>
            <?php } ?>
        </div>
    <?php } ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode( 'tab_group', 'px_sc_tab_group' );

function px_sc_tab($atts, $content=null)
{
    $tabCnt = count($GLOBALS['px_sc_tab']) + 1;

    extract(shortcode_atts(array(
        'title' => "Tab $tabCnt",
    ), $atts));

    $GLOBALS['px_sc_tab'][] = array($title, do_shortcode($content));
}

add_shortcode( 'tab', 'px_sc_tab' );

/*-----------------------------------------------------------------------------------*/
/*  Button
/*-----------------------------------------------------------------------------------*/

function px_sc_button($atts, $content = null)
{
    extract(shortcode_atts(array(
        'title'            => '',
        'text'             => __('View Page', TEXTDOMAIN),
        'url'              => '#',
        'size'           => 'standard',
        'target'           => '',
        'text_color'             => '',
        'text_hover_color'   => '',
        'button_color'             => '',
        'button_style_background'  => 'transparent',
        'alignment'  => 'left',
    ), $atts));

    if('' != $target)
        $target = "target=$target";

    $class = "button button1";
    
    switch($size)
    {
        case 'small':
            $class .=' button-small';
            break;
        case 'large':
            $class .=' button-large';
            break;
    }
    
    switch($alignment)
    {
        case 'right':
            $class .=' right';
            break;
        case 'center':
            $class .=' center';
            break;
        case 'left':
            $class .=' left';
            break;
    }

    switch($button_style_background)
    {
        case 'transparent':
            $class .=' transparent';
            break;
        case 'fill':
            $class .=' fill';
            break;
    }

    $id = px_sc_id('button');
       
    $hasStyle = '' != $button_color || '' != $text_color;
    
    if ($button_style_background == 'transparent') {
        $button_background = 'transparent' ;
    } else {
        $button_background = $button_color ;
    } 

    ob_start(); 
    
    ?>
    
    <?php if ($alignment == "center") { ?>
        <div class="centeralignment">
    <?php } ?>
    
        <a id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class); ?>" href="<?php echo esc_url($url); ?>" title="<?php echo esc_attr($title); ?>" <?php echo esc_attr($target); ?> style="<?php if(strlen(esc_attr($text_color))) { ?> color:<?php echo esc_attr($text_color); ?>; <?php } ?> <?php if(strlen(esc_attr($button_color))) { ?> background-color: <?php echo esc_attr($button_background); ?>; border:2px solid <?php echo esc_attr($button_color); ?>; <?php } ?>">
            <span class="hover-bg reset" <?php if(strlen(esc_attr($button_color))) { ?> style="background-color:<?php echo esc_attr($button_color); ?>;" <?php } ?>>
		        <span class="hover-text reset" <?php if(strlen(esc_attr($text_hover_color))) { ?> style="color: <?php echo esc_attr($text_hover_color); ?>;" <?php } ?> >
                    <?php echo esc_attr($text); ?>
                </span>
	        </span>
            <?php echo esc_attr($text); ?>
        </a>
    
    <?php if ($alignment == "center") { ?>
        </div>
    <?php } ?>
    
    <?php
    return ob_get_clean();
}

add_shortcode('button', 'px_sc_button');

/*-----------------------------------------------------------------------------------*/
/*	VC Toggle Counter Box
/*-----------------------------------------------------------------------------------*/

function px_sc_vctoggle($atts, $content=null)
{
    extract(shortcode_atts(array(
        'title' => '',
        'open'  => 'true',
    ), $atts));

    $id     = px_sc_id('vc_toggle');
     
    ob_start();
    ?> 
 
 
    <h4 class="wpb_toggle <?php if ($open == 'true') { ?> wpb_toggle_title_active  <?php } ?>">
        <div class="border-bottom">
            <div class="icon icon-plus"></div>
            <div class="icon icon-minus"></div>
            <div class="title"><?php echo esc_attr($title); ?></div>
        </div>
    </h4>
    <div class="wpb_toggle_content" <?php if ($open == 'true') { ?> style="display: block;"  <?php } ?>>
        <?php echo wpb_js_remove_wpautop($content); ?>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'vc_toggle', 'px_sc_vctoggle' );

/*-----------------------------------------------------------------------------------*/
/*	VC carousel
/*-----------------------------------------------------------------------------------*/

function px_sc_imagecarousel($atts, $content=null)
{
    extract(shortcode_atts(array(
        "number"					=> "-1",
		"order_by"					=> "date",
		"order"						=> "DESC",
        "carousel_category" => '',
        "visible_items" => "2" 
    ), $atts));

    $id = px_sc_id('image_carousel');
     
    ob_start();
    ?> 

        <div class='image_carousel_wrap clearfix'>
            <div class='image_carousel' data-visibleitems="<?php if (strlen($visible_items)) { echo esc_attr($visible_items); }?>">
                <ul class='slides'>
                 
                <?php 
                   
                $args = array (
                    'post_type' => 'carousel',
                    'orderby' => $order_by,
                    'order' => $order,
                    'posts_per_page' => $number
                );

                if ( $carousel_category != "") {
                  $args['carousel_category'] = $carousel_category;  
                }
                
                query_posts($args);
                
                if ( have_posts() ) {
                    $postCount = 0;
                    while ( have_posts() ) {
                        the_post();
                
                            $title = get_the_title();
                            $options=get_post_meta(get_the_ID());
							if(isset($options['carousel-alts'][0])){
							    $alt=$options['carousel-alts'][0];
							}else{
							$alt='';
							}

                            if($options['carousel-image'][0] != ""){
                                $image = get_post_meta(get_the_ID(),'carousel-image',true);
								
                            } else {
                                $image = "";
                            }
                            
                            if((isset($options['carousel-link'][0]))&&($options['carousel-link'][0] != "")){
                                $link = $options['carousel-link'][0];
                            } else {
                                $link = "";
                            }

                            if($options['carousel-traget-link'][0] != ""){
                                $target = $options['carousel-traget-link'][0];
                            } else {
                                $target = "_self";
                            }
                            
                            ?>
                            
                            <li class='item'>
								
                                <?php if(esc_url($link) != "") { ?>
                                        <a href="<?php echo esc_url($link) ?>" target=<?php echo($target); ?>>
                                <?php } ?>
                                
                                <?php if($image != "") { ?>
                                        <span><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo $alt; ?>"></span>
                                <?php } ?>
                                
                                <?php if(esc_url($link) != "") { ?>
                                        </a>
                                <?php } ?>
                                
                            </li>
                            
                     <?php  $postCount++;
                     
                };
            }; ?>
           
            </ul>
                
            <?php  if ( have_posts() ) { ?>
                <a id="pre<?php echo esc_attr($id); ?>" class="prev" href="#">&lt;</a>
                <a id="next<?php echo esc_attr($id); ?>" class="next" href="#">&gt;</a>
            <?php } ?>

        </div>
     </div>
     
    
    <?php
    return ob_get_clean();
}
add_shortcode( 'image_carousel', 'px_sc_imagecarousel' );

/*-----------------------------------------------------------------------------------*/
/*	VC pixflow image slider
/*-----------------------------------------------------------------------------------*/

function px_image_slider($atts, $content=null)
{
    extract(shortcode_atts(array(
        'title' => '',
        'text' => '',
        'images' => '', 
        'style' => 'dark',
        'slider_positions' => 'left',
        'img_size'=> '2550' , 
        'animation_mode' => 'fade',
        'text_border_color' => '',
		'title_link'=>'',
		'title_target'=>'',
        'slider_number' => ''
    ), $atts));

    $gal_images = '';
    $tablet_images ='';
    $el_start ='<li class="image_slide" style="background-image:url(';
    $el_end = ');"></li>';
    $slides_wrap_start = '<ul class="slides">';
    $slides_wrap_end = '</ul>';
    $image_size = "pixflow-image-slider";

    $sliderMoreLink = '';

    if(get_field('slider_link_' .$slider_number)){
        $sliderMoreLink = get_field('slider_link_' .$slider_number);
    }
    
    $hasStyle = '' != $text_border_color ;
	$hasLink = '' != $title_link ;
	if(""==$title_target){
		$target="_self";
	}
	else {
		$target="$title_target";
	}
    
    if ( $images == '' ) $images = '-1,-2,-3';
    $images = explode( ',', $images);
    $i = -1;


    
    $id = px_sc_id('px_image_slider');
    
    foreach ( $images as $attach_id ) {
        $i++;
        if ($attach_id > 0) {
            $image_src = wp_get_attachment_image_src ($attach_id ,  "pixflow-image-slider" , false );
            $image_src = esc_url($image_src[0]);
             if(!$image_src){
              $image_src=THEME_IMAGES_URI."/placeholders/slider-holder.jpg";
             }
        }

        $gal_images .= $el_start . $image_src . $el_end;
        
        if($i == 0){
            $tablet_images .= $el_start . $image_src . $el_end;
        }
    }
    
    ob_start();
    
     ?>
    
    <div id="<?php echo esc_attr($id); ?>" class="pixflow_image_slider <?php echo esc_attr($style); ?> <?php echo esc_attr($slider_positions); ?>">
        
        <div class="slider_block">

            <!-- image Slider -->
            <div class="wpb_wrapper">
            
                <div class="wpb_gallery_slides flexslider hidden-h-tablet" data-animation="<?php echo esc_attr($animation_mode); ?>">
                    <?php 
                        echo $slides_wrap_start ; 
                        echo $gal_images;
                        echo $slides_wrap_end;
                    ?>
                </div>
                
                <div class="wpb_gallery_slides visible-h-tablet">
                    <?php 
                        echo $slides_wrap_start ; 
                        echo $tablet_images;
                        echo $slides_wrap_end;
                    ?>
                </div>
                
            </div> 
              
        </div>
        
        <div class="content_block">
           <div class="pixflow_image_slider_content_wrap">
                <?php if( $title != "") { ?>
                    <div class="pixflow_image_slider_title" <?php if(strlen(esc_attr($text_border_color)))  { ?> style="border-left-color: <?php echo esc_attr($text_border_color); ?>;" <?php } ?>>
                        <?php if (!$hasLink) {
                            echo apply_filters('px-slider-title', esc_attr($title));
						}
						else{
						?>
						<a href="<?php echo esc_attr($title_link); ?>" target="<?php echo esc_attr($target);?>">
                            <?php echo apply_filters('px-slider-title', esc_attr($title)); ?>        
                        </a>   	
						<?php
						}
						 ?>
                    </div>
                <?php } ?>

                 <?php if( esc_attr($text) != "") { ?>
                    <div class="pixflow_image_slider_text">
                        <?php echo ($text); ?>
                    </div>
                    <a class="pixflow-slider-link button-link button button1" href="<?php echo $sliderMoreLink; ?>">
                        <span class="hover-bg">
                            <span class="hover-text">More</span>
                        </span>
                        More
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>


    <?php
    return ob_get_clean();
}

add_shortcode( 'vc_pixflow_image_slider', 'px_image_slider' );
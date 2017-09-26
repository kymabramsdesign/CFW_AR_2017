<?php 

    //overlay Options
    $homeOverlayTexture = px_opt('home-overlay-texture');
    $homeOverlayColor =  px_opt('home-overlay-color');
    $homeOverlayOpacity = (intval(px_opt('home-overlay-opacity')))/100;

?>
<section id="home" <?php if ( px_opt('home-type-switch') ==  'home-particle' ) { ?> class="home-particle" <?php } ?>>

    <!-- inline Style For parallax background Color and color Opacity  -->
    <?php if ( isset($homeOverlayColor) || isset($homeOverlayOpacity)) { ?>

        <style type="text/css" media="all" scoped>
            #home .<?php echo esc_attr($homeOverlayTexture);?>:after {

                <?php if ( isset($homeOverlayColor) ) { ?> background-color:<?php echo esc_attr($homeOverlayColor);?>; <?php } ?>
                <?php if ( isset($homeOverlayOpacity) ) { ?> opacity:<?php echo esc_attr($homeOverlayOpacity);?>; <?php } ?>
            }
			<?php if ( isset($homeOverlayColor) ) { ?>
				#home .videoColorMask  {
					 background-color:<?php echo esc_attr($homeOverlayColor);?> !important;
				}
			 <?php } ?>
        </style>

    <?php } ?>

    <div class="homeWrap">
        <?php
            $slideCount = "";
            $slideNumber= "";
            if ( px_opt('home-type-switch') == 'home-slider' ) {
              for ($j = 1; $j <= 10; $j++) { if ( px_opt('home-gallery-'.$j) ) { $slideCount+=1;  $slideNumber=$j;} }
                if ( $slideCount > 1 ) { ?>
                    <!-- FullScreen Slider -->
                    <span id='hideMenuFirst'></span>
                    <div class="wrap sectionOverlay <?php echo esc_attr($homeOverlayTexture); ?>" id="fullScreenSlider">
                    
                        <?php 
                            if ( px_opt('animation-mode') == '0') {
                                 $animation_mode = 'fade'; //set Fade mode For Full Screen Slider
                            } else {
                                 $animation_mode = 'slide'; //set Slide mode For Full Screen Slider
                            }
                        ?>
                        
                        <div id="slides" class="flexslider <?php echo $animation_mode; ?>">
                            <div class="slides-container">
                                <?php for ($i = 1; $i <= 10; $i++) {
                                    if ( px_opt('home-gallery-'.$i) ) { ?>
                                    
                                        <div class="header-slide" style="background-image: url(<?php px_eopt('home-gallery-'.$i); ?>);"></div>
                                        
                                <?php } } ?>
                            </div>
                            
                            <!-- slides navigation -->
                            <div class="home-slides-navigation"></div>
                            
                        </div>
                    </div>
                <?php }  else if ($slideCount == 1) { ?>
                    <!-- FullScreen Image -->
                    <span id='hideMenuFirst'></span>
                    <div id="fullScreenImage" class="fullScreenImage homeParallax sectionOverlay <?php echo esc_attr($homeOverlayTexture); ?>" style="background:url(<?php px_eopt('home-gallery-'.$slideNumber); ?>);" ></div>

                <?php } ?>
        <?php } else if ( px_opt('home-type-switch') == 'home-map' ){ ?>
            <!-- FullScreen Map -->
            <span id='hideMenuFirst'></span>
            <div class="wrapGoogleMap sectionOverlay <?php echo esc_attr($homeOverlayTexture); ?>">
                <div id="homeGoogleMap">
                </div>
            </div>
        <?php } else if ( px_opt('home-type-switch') == 'home-video' ){ ?>
            <!-- FullScreen Video -->
            <span id='hideMenuFirst'></span>
            <div id="homeVideoHeight">
                <div class="videoMask <?php echo esc_attr($homeOverlayTexture); ?>"></div>
                <div class="videoColorMask"></div>

                <?php px_header_banner_video(); ?>
            </div>
        <?php } else if ( px_opt('home-type-switch') == 'home-layerSlider' ){ ?>
            <!-- Layer Slider -->
            <span id='hideMenuFirst'></span>
            <div id="homeHeight" class="layerSlider">
                <?php
                    $homeLayerslider = '[layerslider id='. px_opt('home-video-type').']';
                    echo do_shortcode($homeLayerslider);
                ?>
            </div>

        <?php }  else if ( px_opt('home-type-switch') ==  'home-MasterSlider' ) { ?>
        
            <!-- Master Slider  -->
            <span id='hideMenuFirst'></span>
            <div id="homeHeight" class="layerSlider">
                <?php
                $homeMasterSlider = px_opt('home-master-type');
                masterslider($homeMasterSlider);
                ?>
            </div>

        <?php }  else if ( px_opt('home-type-switch') ==  'home-particle' ) { ?>
        
            <!-- Master Slider  -->
            <span id='hideMenuFirst'></span>
            <div id="particle" class="particle" style="background-image:url('<?php px_eopt('home-particle'); ?>');">
                <canvas id="particle-canvas"></canvas>
            </div>

        <?php }
        

         get_template_part('templates/text', 'rotator');

    ?>

    </div>
</section>
<div id="startHere"></div>
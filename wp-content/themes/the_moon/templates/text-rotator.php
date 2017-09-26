<?php 

    $trstyle = px_opt('home-text-style');
   
   switch ($trstyle) {
    case 1:
        $textRotatorClass = "standard1" ; 
        break;
    case 2:
        $textRotatorClass = "standard2" ; 
        break;
    case 3:
        $textRotatorClass = "standard3" ; 
        break;
    case 4:
        $textRotatorClass = "standard4" ; 
        break;
    case 5:
        $textRotatorClass = "titlevintage1"; 
        $subTitleClass = "subtitlevintage1";
        break;
    case 6:
        $textRotatorClass = "titlevintage2";
        $subTitleClass = "subtitlevintage2";
        break;
    case 7:
        $textRotatorClass = "titlevintage3";
        $subTitleClass = "subtitlevintage3";
        break;
    case 8:
        $textRotatorClass = "titlevintage4";
        $subTitleClass = "subtitlevintage4";
        break;
   }

?>

<?php  if ( px_opt('home-type-switch') !== 'home-layerSlider' ) {  ?>

    <!-- Text Rotator 1 -->
    <div class="textSliderHome <?php if ( px_opt('text-head-type') == "image" ) { ?>  textSliderHomeImg <?php } ?> <?php if ( $trstyle == 3 )  { ?> defualtphone3 <?php } ?> <?php if ( $trstyle == 5 || $trstyle == 6 ||  $trstyle == 7  ||  $trstyle == 8  )  { ?> phonevintage <?php } ?>">
        
        <div class="quotes">
                        
        <?php for ($j = 1; $j <= 10; $j++) { ?>
        
            <?php if ( $j == 1 || px_opt('text-rotator-removebtn'.$j) == 2 ) { ?>
            
            <div class="textSlide">
                    
                <?php if ( $trstyle == 7 )  { ?>  <div class="topImage"></div>  <?php } ?> 
                   
                
            
                <?php if ( px_opt('text-head-type') == "image" ) { ?>
                 
                        <?php if ( px_opt('header-image'.$j) ) { ?>
                            <!-- text Rotator image  -->
                            <div class="trimage <?php	if ( px_opt('header-icon-animation') ) { ?>  animated <?php } ?> ">
                                <img src="<?php px_eopt('header-image'.$j); ?>" alt="text rotator image" />
                            </div>
                        <?php } ?>
                        
                <?php } else if ( px_opt('text-head-type') == "icon" ) { ?>
                      
                    <?php if ( px_opt('header-icon'.$j) ) { ?>
                        <!-- text Rotator subtitle  -->
                        <div class="icon glyph <?php if ( px_opt('header-icon-animation') ) { ?>  animated <?php } ?>  icon-<?php px_eopt('header-icon'.$j); ?>"></div>
                    <?php } ?>
                
                <?php } ?>
                
                
                <?php if ( px_opt('home-text'.$j) ) { ?>
                    
                    <h1 class="quote">
                        <div  class="quoteBackground <?php echo esc_attr($textRotatorClass); ?> ">
                                 
                            <?php if ( $trstyle == 5 || $trstyle == 8 ) { ?> 
                                <div class="rightline"></div>
                                <div class="leftline"></div>
                            <?php }  ?>
                                
                            <?php px_eopt('home-text'.$j); ?>
                                
                        </div>
                    </h1>
                    
                    
                <?php } ?>
                
                    
                    <?php if ( $trstyle == 1 || $trstyle == 2 ||  $trstyle == 3  ||  $trstyle == 4  )  { ?>  
                     
                     
                        <?php if ( px_opt('header-textarea'.$j) ) { ?>
                            <!-- text Rotator description  -->
                            <div class="desc  <?php if ( $trstyle == 3 )  { ?> desc3 <?php } ?>">
                                <?php px_eopt('header-textarea'.$j); ?>
                            </div>
                        <?php } ?>
                     
                     
                    <?php } else if ( $trstyle == 5 || $trstyle == 6 ||  $trstyle == 7  ||  $trstyle == 8  ) {  ?> 
                     
                        <?php if ( px_opt('home-subtitle'.$j) ) { ?>
                            <!-- text Rotator subtitle  -->
                            <div class="<?php echo esc_attr($subTitleClass); ?>">
                            
                                    <?php if ( $trstyle == 6 ) { ?> 
                                        <div class="rightline"></div>
                                        <div class="leftline"></div>
                                    <?php } ?>
                                    
                                <?php px_eopt('home-subtitle'.$j); ?>
                            </div>
                        <?php } ?>
                     
                    <?php }  ?> 

                    <?php if ( $trstyle == 7 )  { ?>  <div class="bottomImage"></div>  <?php } ?> 
                     
                </div>
                    
            <?php }  ?>
                
        <?php } ?>
            
        
        </div>  
        
    </div>
        
    <?php if ( px_opt('home-start-text') ) {  ?>
        <!-- start button  -->
        <?php if ( px_opt('home-start-btn') == 'style-1' ) {  ?>

            <!-- start Text - style 1 -->
                <div class="scrollDownWrap">
                    <div class="scrollDown">
                        <a href="#startHere"><?php px_eopt('home-start-text') ?>
                            <span class="icon"></span>
                        </a>
                    </div>
                </div>
        <?php } else if ( px_opt('home-start-btn') == 'style-2') {  ?>

            <!-- start Text - style 2 -->
            <div class="scrollDownWrap">
                <div class="scrollDown style2">
                    <a href="#startHere"><?php px_eopt('home-start-text') ?></a>
                </div>
            </div>
        <?php }  ?>

    <?php } ?>
    
<?php } ?>  
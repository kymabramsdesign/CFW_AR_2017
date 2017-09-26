<?php 

    $attachment_id = 6;
    $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
    
    //check social share is Enable or not
    $socialshare = get_post_meta( get_the_ID(), "post-social-share", true );
    
?>

<div class="blog_loop_item">
    <div  <?php post_class('togglePost'); ?> id="post_<?php the_ID(); ?>">

        <!-- item  -->
        <?php $toggleMode = get_post_meta(get_the_ID(), 'toggle-mode', true);
        
            if ( !isset( $toggleMode )) {
                /* Close the toggle When not Set Toggle Mode */
                $toggleMode = 0;
                $toggleClass = "accordionClosed";
            }
            
            // set accordionClosed class to blogaccordian for set styles ;)
            if ($toggleMode == 0 ) {
                $toggleClass = "accordionClosed";
            } else if ( $toggleMode == 1 ) {
                $toggleClass = "";      
            }
            
        ?>

        <!-- Desktop Blog -->
        <div class="desktopBlog">
            <div class="container">
            
                <div class="blogAccordion <?php echo $toggleClass; ?>" data-value="<?php echo $toggleMode; ?>" style="background-image: url('<?php  echo $image[0]; ?> ')">
                
                    <div class="accordion_box2">
                        <div class="accordion_title" >
                            <!-- blog Post date - day -->
                            <span class="day"><?php echo ( get_the_time('d') ); ?></span>
                        </div>
                    </div>
                    
                    <div class="accordion_box10">
                        <!-- blog Post date -->
                        <div class="leftBorder">
                               
                            <div class="monthYear">
                                <span class="month"><?php echo ( get_the_time('M') ); ?></span>
                                <span class="year"><?php echo( get_the_time('Y') ); ?></span>
                            </div>
                                
                            <!-- Post title  -->
                            <div class="blogTitle">
                                <?php the_title(); ?>
                            </div>
                                
                        </div>
                    </div>

                    <div class="accordion_content">
                        <!-- blog Post text -->
                        <?php the_excerpt();  ?>

                        <!-- More Details Button  -->
                        <a href="<?php the_permalink(); ?>" class="moreButton" rel="bookmark"><?php _e('More Details', TEXTDOMAIN); ?></a>
                        <div class="readmoreLine"></div>
    
                        <div class="social_links">
                            <ul class="social_links_list">
                           
                                <?php if ($socialshare == 1 ) { ?>
                                    
                                    <!-- facebook Social share button -->
                                    <li>
                                        <a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink(get_the_ID()))?>" onclick="return popitup(this.href, this.title)" title="<?php _e('Share on Facebook!',TEXTDOMAIN) ?>">
                                            <i class="icon-facebook3"></i>
                                        </a>
                                    </li>
                                    
                                    <!-- google plus social share button -->
                                    <li>
                                        <a href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink(get_the_ID()))?>" onclick="return popitup(this.href, this.title)" title="<?php _e('Share on Google+!',TEXTDOMAIN) ?>">
                                            <i class="icon-googleplus2"></i>
                                        </a>
                                    </li>
                                    
                                     <!-- twitter icon  --> 
                                     <li>
                                        <a href="https://twitter.com/intent/tweet?original_referer=<?php echo urlencode(get_permalink(get_the_ID()))?>&amp;source=tweetbutton&amp;text=<?php echo urlencode(get_the_title())?>&amp;url=<?php echo urlencode(get_permalink(get_the_ID()))?> ?>" onclick="return popitup(this.href, this.title)"
                                            title="<?php _e('Share on Twitter!', TEXTDOMAIN) ?>">
                                            <i class="icon-twitter2"></i>
                                        </a>
                                     </li>
                                                                         
                                <?php };  ?>                
              
                            </ul>
                        </div>
                    </div>
                    
                    <!-- gray Overlay -->
                    <div class="grayOverlay"></div>
                    
                    <div class="clearfix"></div>

                    <!-- Toggle Opening Handel  -->
                    <div class="plus span12"></div>
                    <div class="minus span12"></div>

                </div>
                
            </div>
        </div>
    </div>
</div>
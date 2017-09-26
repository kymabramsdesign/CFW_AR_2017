<?php 
     //check social share is Enable or not
    $socialshare = get_post_meta( get_the_ID(), "post-social-share", true );
?>
<div <?php post_class(); ?>>

    <?php //Post thumbnail
        if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { ?>
        <div class="post-media">
            <div class="post-media">
                <?php the_post_thumbnail('full'); ?>
            </div>
        </div>
    <?php }?>
   
    <div class="nav_box">
        <?php echo next_post_link('%link', '<div class="next_prv_container nxt"><div class="text_btn previous_btn" ></div><span>Next</span></div>'); ?>
        <?php echo previous_post_link('%link', '<div class="next_prv_container prv"><div class="text_btn next_btn" ></div><span>Previous</span></div>'); ?>
    </div>
    
    <?php
        get_template_part( 'templates/single', "post-meta" );
        the_content();
        wp_link_pages();
    ?>
    
    <!-- nav box And Social share -->
    <div class="nav_box">
        
        <?php if ($socialshare== 1 )  { ?>
            <div class="socailshare post_social_share">

                <div class="blog_social_share_title">
                    <?php  _e('Share :', TEXTDOMAIN) ?> 
                </div>
                
                <?php
                    // socail share icon 
                    get_template_part( 'templates/social-share');
                ?>
            </div>
        <?php } ?>
    

    </div>

</div>
<div class="commentWrap">
    <?php
        $num_comments = get_comments_number();
        if ( $num_comments == 0 ) { } else { ?>
            <div class="commentTitle">
                <h3>
                    <?php _e("Comments", TEXTDOMAIN); ?>&nbsp; /
                    <span class="comment_count">
                        <?php comments_popup_link( __('0', TEXTDOMAIN ) , __('1', TEXTDOMAIN ) , __('%', TEXTDOMAIN ) ); ?>
                    </span>
                </h3>
            </div>
    <?php }  comments_template('', true); ?>
</div>
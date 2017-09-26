<?php 
     //check social share is Enable or not
    $socialshare = get_post_meta( get_the_ID(), "post-social-share", true );
?>
<div <?php post_class(); ?>>
    <div class="post-media">

        <?php

        //Parse the content for the first occurrence of video url
        $video = px_extract_video_info(px_get_meta('video-id'));

        if($video != null)
        {
            $w = 500; $h = 280;
            px_get_video_meta($video);

            if(array_key_exists('width', $video))
            {
                $w = $video['width'];
                $h = $video['height'];
            }

            //Extract video ID
            ?>
            <div class="post-media video-frame">
                <?php
                if($video['type'] == 'youtube')
                    $src = "http://www.youtube.com/embed/" . $video['id'];
                else
                    $src = "http://player.vimeo.com/video/" . $video['id'] . "?color=ff4c2f";
                ?>
                <iframe src="<?php echo esc_url($src); ?>" width="<?php echo esc_attr($w); ?>" height="<?php echo esc_attr($h); ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
            </div>
        <?php } ?>
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
    
        <?php echo previous_post_link('%link', '<div class="text_btn next_btn" ></div>'); ?>
        <?php echo next_post_link('%link', '<div class="text_btn previous_btn" ></div>'); ?>
        
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
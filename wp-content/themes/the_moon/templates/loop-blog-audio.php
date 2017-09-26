<?php get_template_part( 'templates/loop', "blog-meta" ); ?>
<div class="post-content">
    <?php
    //Parse the content for the first occurrence of video url
    $audio = px_extract_audio_info(get_post_meta(get_the_ID(), 'audio-url', true ));
    
    if($audio != null)
    {
        //Extract video ID
        ?>
        <div class="post-media audio-frame">
        <?php
            echo px_soundcloud_get_embed($audio['url']);
        ?>
        </div>
    <?php
    }
   
    // blog Post text excerpt
    the_excerpt();
?>
    <div class="redmore_line"></div>
</div>
<?php
     //check social share is Enable or not
    $socialshare = get_post_meta( get_the_ID(), "post-social-share", true );
?>
<div <?php post_class(); ?>>
    <div class="post-media">
        <?php

        $images = px_get_meta('gallery');
        if(count($images))
        {?>
            <div class="flexslider">

                <ul class="slides">
                    <?php
                    $imageSize = 'post-single';
                    foreach($images as $img)
                    {
                        //For getting image size use
                        //http://php.net/manual/en/function.getimagesize.php
                        $imgId = px_get_image_id($img);
                        if($imgId == -1)//Fallback
                        $imgTag = "<img src=\"$img\" />";
                        else
                            $imgTag = wp_get_attachment_image($imgId, $imageSize);
                        ?>
                        <li ><?php echo $imgTag; ?></li>
                    <?php
                    }?>
                </ul>
            </div>
        <?php
        }?>
    </div>

    <div class="nav_box">
            <?php echo next_post_link('%link', '<div class="next_prv_container nxt"><div class="text_btn previous_btn" ></div><span>Next</span></div>'); ?>
            <?php echo previous_post_link('%link', '<div class="next_prv_container prv"><div class="text_btn next_btn" ></div><span>Previous</span></div>'); ?>
    </div>

    <?php
        get_template_part( 'templates/single', "post-meta" );
        the_content();
        wp_link_pages();
    ?>

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
<div class="related-stories">
<h2>Related Stories</h2>
    <ul class="blog-related-stories">
    <?php
        for($i=1;$i<5;$i++){
            if(get_field('related_story_title_' .$i)){

                $link = (get_field('related_story_link_' .$i))? get_field('related_story_link_' .$i) : '';

                echo '<li><a href="' .$link. '">' .get_field('related_story_title_' .$i). '</a></li>';
            }
        }
    ?>
    </ul>
</div>

            <?php

                if(get_field('blog_bottom_link_title')){
                    ?>
                    <a class="blog-bottom-link button-link button button1 black" href="<?php echo get_field('blog_bottom_link_link'); ?>" target="_blank">
                        <span class="hover-bg">
                            <span class="hover-text"><?php echo get_field('blog_bottom_link_title'); ?></span>
                        </span>
                        <?php echo get_field('blog_bottom_link_title'); ?>
                    </a>
                    <?php
                }

            ?>

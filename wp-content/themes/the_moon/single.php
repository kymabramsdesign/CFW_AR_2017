<?php
/**
 * Template for displaying all single posts.
 */

    get_header();

    // menu
    get_template_part('templates/section', 'nav');

    $postType = get_post_meta(get_the_ID(), 'media', true);

    $blogSidebar = 'span9';

    if(px_opt('blog-sidebar-position') == 0) {
        $blogSidebar = 'span12';
    }
?>
<div id="blogSingle" class="wrap singlePost">
    <div class="container">
        <div class="row">

            <!--Content-->
            <div class="<?php echo esc_attr($blogSidebar); ?>">

                <?php if ( have_posts()) {
                    while ( have_posts() ) { the_post(); ?>
                        <?php if ($postType == 'gallery' ) {
                            get_template_part('templates/single', 'post-gallery');
                        } else if ($postType == 'video' ) {
                            get_template_part('templates/single', 'post-video');
                        } else if ($postType == 'video_gallery' ) {
                            get_template_part('templates/single', 'post-video-gallery');
                        } else if ($postType == 'audio' ){
                            get_template_part('templates/single', 'post-audio');
                        } else if ($postType == 'audio_gallery' ) {
                            get_template_part('templates/single', 'post-audio-gallery');
                        } else {
                            get_template_part( 'templates/single');
                        }
                    } // end of the loop.
                } // end if ?>
            </div>

            <?php
             if( px_opt('blog-sidebar-position') == 1 ) { ?>
                <!-- Right Sidebar  -->
                <div class="span3">
                    <?php  px_get_sidebar('main-sidebar'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php get_footer();
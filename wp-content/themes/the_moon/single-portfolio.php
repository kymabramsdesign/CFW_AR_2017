<?php
/**
 * Template for displaying portfolio single posts.
 */

    get_header();

    // menu
    get_template_part('templates/section', 'nav');

    $pPostType = get_post_format();
?>
<div id="portfoliSingle" class="wrap singlePost">

    <div class="container">
        <div class="row">
            <div class="span12">
                <div id="ajaxPDetail">
                    <!--portfolio detail Content-->
                        <?php if ( have_posts()) {
                            while ( have_posts() ) { the_post(); ?>
                                <?php
                                if (empty($pPostType)) {

                                    get_template_part( 'templates/pSingle');

                                } else {

                                if ($pPostType == 'gallery' ) {
                                        get_template_part('templates/pSingle', 'post-gallery');
                                    } else if ($pPostType == 'video' ) {
                                        get_template_part('templates/pSingle', 'post-video');
                                    } else if ($pPostType == 'audio' ){
                                        get_template_part('templates/pSingle', 'post-audio');
                                    } else if ($pPostType == 'link' ) {
                                        get_template_part('templates/pSingle', 'post-audio-gallery');
                                    }
                                }
                            } // end of the loop.
                        } // end if ?>
                    <!--portfolio detail Content End -->

                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();
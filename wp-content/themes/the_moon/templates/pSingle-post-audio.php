<div <?php post_class(); ?>>
    <!-- Portfolio Detail Title  -->
    <div class="row">
        <div class="span12 pDHeader">

            <!-- Title -->
            <div class="hidden-phone title">
                <?php the_title(); ?>
            </div>

        </div>
    </div>

    <!--  Portfolio Detail Slider  -->

    <div class="row">
        <div class="span12 postMedia">
            <?php

            //Parse the content for the first occurrence of video url
            $audio = px_extract_audio_info(px_get_meta('audio-url'));

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
            }?>

        </div>
    </div>

    <!-- Portfolio Detail phone title  -->
    <div class="row visible-phone">
        <div class="span12 pDHeader">
            <div class="title">

                <?php the_title(); ?>

            </div>
        </div>
    </div>

    <!-- Portfolio Detail content  -->
    <div class="row">
        <div class="span12 post-media">
            <?php the_content();?>
        </div>
    </div>
    
    <?php 
        // get portfolio social share 
        $portfolio_social_share = px_get_meta('portfolio-social-share');
        
        // get project title attribute
        $project_title = px_get_meta('project-title');
    ?>
    
    <ul class="socailshare project-detail">
       
        <?php if( isset($portfolio_social_share) ) { ?>
            
            <!--portfolio Socail share -->
            <li class="project project_title">
                <?php echo esc_attr($project_title); ?>
            </li>
       
        <?php } ?>
        
        <?php get_template_part('templates/project', 'detail'); ?>

        
        <?php if( $portfolio_social_share == 1 ) { ?>
        
            <!-- portfolio Socail share -->
            <li class="project portfolio_social_share">
            
                <span class="project-title social_share_title">
                    <?php  _e('Share :', TEXTDOMAIN) ?> 
                </span>
                 
                <?php get_template_part('templates/social-share'); ?>
                
            </li>
            
        <?php } ?>
    
    </ul>
    
</div>
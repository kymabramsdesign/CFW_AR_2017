<?php 
	$portfolio = get_page_by_title('portfolio');

	$uniqueId = $portfolio->ID;
	$options=get_post_meta($uniqueId);

    $pDAjaxCheck  =$options["portfolio-detail-ajax"][0]; 
    $pPostPerPage  = $options["portfolio-posts-page"][0];
    $pfilterNav  = $options["portfolio-filter-nav"][0];
    $pfilter  = $options["portfolio-filter"][0];
	$porder  = isset($options["order"][0])?$options["order"][0]:"date";
	$pordering  = isset($options["ordering"][0])?$options["ordering"][0]:"DESC";

   
    $portfolioId = 'portfolio_'.$uniqueId;
    $portfolioLoop =  'pLoop_'.$uniqueId;
    $pLoadMore = 'pLoadMore_'.$uniqueId;
    $pagedNum = 'paged_'.$uniqueId;
	
	

    /* get Portfolio Skills */
    $portfolioTerms = get_terms('skills');
    $selectSkill  = '';

    foreach($portfolioTerms as $term ) {
        $skill = $term-> term_id;
        $skillTerm = 'term-'.$skill;

        $checkSkill = get_post_meta( get_the_ID(), $skillTerm , true);

        if ( $checkSkill == 'visible' ) {
            $selectSkill .= $skill . ',';
        }
    }

    $catArr  = explode(',', $selectSkill) ;

    if(count($catArr) == 0 || count($catArr) > 1)
    {

        if ( $pfilter == 1 ) {
            // Generate  Selected Taxonomy
            $listCatsArgs = array('title_li' => '', 'taxonomy' => 'skills', 'walker' => new px_portfolio_walker(), 'echo' => 0, 'include' => $selectSkill );
        } else {
            // Generate All Filter Taxonomy
            $listCatsArgs = array('title_li' => '', 'taxonomy' => 'skills', 'walker' => new px_portfolio_walker(), 'echo' => 0, 'include' => '' );
        }

        $catList = '<li class="current"><a class="active" data-filter="*" href="#">'.__('All', TEXTDOMAIN)."<span class='filterlinetop'></span><span class='filterlinebottom'></span></a></li>";
        $catList .= wp_list_categories($listCatsArgs);
    }

    if ( $pfilter == 1 ) {

        // Add some parameters for the JS - portfolio load more .
        $queryArgs = array (
            'post_type'      => 'portfolio',//post type, I used 'product'
            'post_status'   => 'publish', // just tried to find all published post
            'posts_per_page' =>   -1,
            'pageVar' => 'list1',
			'orderby'=>$porder,
			'order'=>$pordering,
            'tax_query' => array(
                array(
                    'taxonomy' => 'skills',
                    'field'    => 'id',
                    'terms'    => $catArr
                )
            )
        );

    } else {

        // Add some parameters for the JS - portfolio load more .
        $queryArgs = array (
            'post_type'      => 'portfolio',//post type, I used 'product'
            'post_status'   => 'publish', // just tried to find all published post
            'posts_per_page' =>   -1,
            'pageVar' => 'list1',
			'orderby'=>$porder,
			'order'=>$pordering
        );
    }

    $query = new WP_Query($queryArgs);
    $ppaged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
    $pMax = $query-> max_num_pages;
    $countPosts = $query -> post_count;
    $maxPages =  ceil ($countPosts / $pPostPerPage)  ;

    wp_localize_script (
        'custom',
        $portfolioId ,
        array (
            'startPage' => $ppaged,
            'maxPages' => $maxPages,
            'nextLink' => next_posts($pMax, false),
            'loadingText' => __('Loading...', TEXTDOMAIN),
            'loadMoreText' => __('Load More', TEXTDOMAIN),
            'noMorePostsText' => __('No More Posts', TEXTDOMAIN)
        )
    );
    
    // headr title And Subtitle
    $checkTitle = get_post_meta( $portfolio->ID, "title-bar", true );
    $title = get_post_meta( $portfolio->ID, "title-text", true );
    $subTitle = get_post_meta( $portfolio->ID , "subtitle-text", true );

?>

<!-- Portfolio Section  -->
<section id="<?php echo $portfolioId; ?>" data-value="<?php echo $portfolioId; ?>"  data-id="<?php echo $uniqueId; ?>" class="scooterSection portfolioSection">

    <div id="<?php echo esc_attr($post->post_name);?>" class="portfoliowrap wrap <?php if ( !empty( $subTitle ) ) { ?> hassubtitle <?php } ?>">

        <div class="container pDWrap clearfix">

            <!-- portfolio Detail loader-->
            <div id="loader"></div>

            <div id="pDError"><?php _e('Sorry, we ran into a technical problem (unknown error). Please try again...', TEXTDOMAIN) ?> </div>

             <div class="navCloseWrap">
             
                <!-- Navigation -->
                <ul class="pDNavigation navigation nextppost">
                    <li class="next">
                        <a href="#"></a>
                    </li>
                </ul>
             
                 <!-- Close button -->
                <div id="pDClose" class="close"><a href="#" class="icon-close"></a></div>

                <!-- Navigation -->
                <ul class="pDNavigation navigation leftppost">
                    <li class="previous">
                        <a href="#"></a>
                    </li>
                </ul>
                
                
                
            </div>

            <!-- portfolio Detail Content -->
            <div id="portfolioDetailAjax"></div>

        </div>

        <div class="container clearfix">

            <?php  if ( (!empty( $subTitle ) || !empty( $title ) ) || $checkTitle == 2 ) { ?>
            
                <?php if ( $checkTitle == 1 ) { ?>
                    <div class="titleSpace">
                    
                        <?php if ( ( $checkTitle == 1 ) && ! empty( $title )) { ?>
                                
                            <div class="title"><h3><?php echo esc_attr($title); ?></h3></div>
                    
                        <?php } if (  ( $checkTitle == 1 ) && ! empty( $subTitle ) ) { ?>
                         
                            <div class="subtitle"><?php echo esc_attr($subTitle); ?></div>
                         
                        <?php } ?>
                        
                    </div>
                <?php }  if ( $checkTitle == 2  ) { ?>
                    
                    <div class="titleSpace">
                        <div class="title"><h3><?php $portfolio->post_title; ?></h3></div>
                    </div>
                
                 <?php } ?>
                 
            <?php } ?>

        </div>

        <?php  if ( $pfilterNav == 1 ){
                    if ( count($catArr)!== 1 ){ ?>

                <!-- portfolio filter - desktop -->
                <div class="container visible-desktop clearfix">
                    <div class="span12 portfolio-header">
                        <ul id="filters" class="option-set subnavigation clearfix" data-option-key="filter">

                            <?php echo $catList; ?>

                        </ul>
                    </div>
                </div>

                <!-- portfolio filter - tablet & phone -->
                <div class="hidden-desktop clearfix">
                    <ul id="filterstablet" class="portfolio-filter" data-option-key="filter">
                        <li class="">
                            <div>
                                <span class="text"><?php _e('All', TEXTDOMAIN) ?></span>
                                <span class="icon icon-angle-down"></span>
                            </div>
                            <ul class="portfolio-filter-items">
                                <?php echo $catList; ?>
                            </ul>
                        </li>
                    </ul>
                </div>

        <?php }
            } ?>

        <!-- portfolio items  -->
        <div id="isotopePortfolio">
            <div class="isotope ajaxPDetail">
                <div id="<?php echo $portfolioLoop; ?>">

                    <?php

                        $paged1 = isset( $_GET[$pagedNum] ) ? (int) $_GET[$pagedNum] : 1;

                         $queryArgs = array(

                        'post_type'      => 'portfolio',
                        'posts_per_page' => $pPostPerPage,
                        'paged'          => $paged1,
						'orderby'=>$porder,
						'order'=>$pordering
                    );

                        if ( $pfilter == 1 ) {

                            //Taxonomy filter
                            if(count($catArr))
                            {
                                $queryArgs['tax_query'] =  array(
                                    // Note: tax_query expects an array of arrays!
                                    array(
                                        'taxonomy' => 'skills',
                                        'field'    => 'id',
                                        'terms'    => $catArr
                                    ));
                            }
                        }

                        $count = 1;
                        $query = new WP_Query($queryArgs);

                        while ($query->have_posts()) {

                            $query->the_post();

                            include(locate_template('templates/portfolio-thumbnail.php'));

                            $count++;
                        }

                    ?>
                </div>
            </div>
        </div>

        <?php

            $query = new WP_Query($queryArgs);
            if ( $query-> have_posts()) { ?>

                <!-- portfolio load more button -->
                <div class="pLoadMore <?php echo esc_attr($pLoadMore); ?>  clearfix"></div>

        <?php } ?>

        <?php wp_reset_query(); ?>

    </div>
</section>
<!-- End Portfolio Section  -->
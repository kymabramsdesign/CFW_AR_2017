<?php 

/* This template file displays the thumbnail of a post on the homepage. */

// Get post 
global $post;

/* Get options for thumbnail */
$pFeaturedSize  = (get_post_meta(get_the_ID(), 'portfolio-featured-size', true)) ? strtolower(preg_replace('/\s+/', '-', get_post_meta(get_the_ID(), 'portfolio-featured-size', true))) : 'square'; // Featured Size of image 
$terms    = get_the_terms( get_the_ID(), 'skills' ); // Filter terms
$background = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
$hasimages      = (has_post_thumbnail()) ? 'hasimages' : 'noimages'; // Image class for sizing
$postFormat =  get_post_format();
$pLink  = (get_post_meta(get_the_ID(), 'link-url', true)) ; 
$pSubTitle = (get_post_meta(get_the_ID(), 'portfolio-hover-subtitle', true)) ; 

// This Code Use For Show Iamge Place Hlder For Portfolio  When Import DummyData! :)
$thumbchk = get_post_meta($post->ID,'_thumbnail_id',false);
$thumbchk = wp_get_attachment_image_src($thumbchk[0], $pFeaturedSize, false);  // URL of Featured first slide

if(empty($thumbchk)){
    $hasimages = 'noimages'; 
} 


if ( $postFormat == "link")
{
    $isLink  =  true;
} else {
    $isLink  =  false;
}

// Add additional post classes 
$postclasses = array(
    $pFeaturedSize,
    'isotope-item',
    $hasimages
);

// Add terms to post classes for filtering 
if ($terms) : 
    foreach ($terms as $term) : 
        array_push($postclasses,'term-'.$term->term_id.' ');
    endforeach; 
endif;  

$post = get_post(get_the_id());

?>

<!-- The Post -->
<div <?php post_class($postclasses); ?> id="<?php echo $post->post_name; ?>" >
  <div class="postphoto" >
 
    <?php echo px_thumbnail_post_slideshow($pFeaturedSize, $post->ID ,$post->post_name,$pDAjaxCheck,$terms, $isLink , $pLink , $pSubTitle); ?>
  </div>
</div>
<!-- End The Post -->
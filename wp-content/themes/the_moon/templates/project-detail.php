<?php 
        
    $termNames = get_the_term_list( $id , 'skills', '<span>', '</span> , <span> ', ' </span>' ); // get the item skills
    $title_attributes = px_get_meta('attribute-title');
    $value_attributes = px_get_meta('attribute-value');

?>

<?php if ( is_array($title_attributes) && count($title_attributes) > 0 ) { ?>
            
    <!-- Project Detail -->
    <?php foreach( $title_attributes as $key => $title ) { ?>
    
        <?php if (!(empty($title))) { ?>
        
            <li class="project">
                <span class="project-title">
                    <?php echo esc_attr($title) ?>
                </span>
                <span class="project-subtitle">
                    <?php echo esc_attr($value_attributes[$key]) ?>
                </span>
            </li>
        
       <?php } ?>
                    
    <?php } ?>
        
<?php  }//end if is_array ?>

    <!-- portfolio tags -->
    <li class="project">
        <span class="project-title">
            <?php  _e('tags :', TEXTDOMAIN) ?> 
        </span>
        <span class="project-subtitle project-skill">
            <?php echo $termNames ?>
        </span>
    </li>

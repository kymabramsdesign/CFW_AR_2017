<?php
$settings = $vars['settings'];
$desc     = px_array_value('desc', $settings);//Optional value
$title    = px_array_value('title', $settings);//Optional value
$class    = px_array_value('label-class', $settings);//Optional value
?>
<div class="px-input-label <?php echo esc_attr($class); ?>">
    <strong><?php echo esc_attr($title); ?></strong>
    <?php if(strlen($desc)){ ?>
    <span><?php echo esc_attr($desc); ?></span>
    <?php } ?>
</div>
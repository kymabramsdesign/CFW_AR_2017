<?php
$name        = $vars['key'];
$settings    = $vars['settings'];
$value       = $vars['val'];
$class       = px_array_value('class', $settings);
$title       = px_array_value('title', $settings, __('Upload Image', TEXTDOMAIN));
$referer     = px_array_value('referer', $settings);
$placeholder = px_array_value('placeholder', $settings);
$label       = px_array_value('label', $settings);//Optional value
?>
<div class="field upload-field clear-after <?php echo esc_attr($class); ?>" data-title="<?php echo esc_attr($title); ?>" data-referer="<?php echo esc_attr($referer); ?>" >
    <?php if($label != ''){ ?>
        <label for="field-<?php echo esc_attr($name); ?>"><?php echo esc_attr($label); ?></label>
    <?php } ?>
    <input type="text" id="field-<?php echo esc_attr($name); ?>" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo esc_attr($placeholder); ?>" />
    <a href="#" data-ref="field-<?php echo esc_attr($name); ?>" class="upload-button"><?php _e('Browse', TEXTDOMAIN); ?></a>
</div>
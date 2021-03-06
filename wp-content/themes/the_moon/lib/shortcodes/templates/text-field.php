<?php
$name     = $vars['key'];
$settings = $vars['settings'];
$class    = px_array_value('class', $settings);//Optional value
$placeholder = px_array_value('placeholder', $settings);//Optional value
$flags    = px_array_value('flags', $settings);//Optional value
?>

<div class="px-input">
    <div class="px-input-text <?php echo esc_attr($class); ?>">
        <input type="text" name="<?php echo esc_attr($name); ?>" placeholder="<?php echo esc_attr($placeholder); ?>" data-flags="<?php echo esc_attr($flags); ?>" />
    </div>
</div>
<?php echo $this->PX_GetTemplate('field-label', $vars); ?>
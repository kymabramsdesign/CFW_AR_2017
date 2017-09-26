<?php
$name     = $vars['key'];
$settings = $vars['settings'];
$class    = px_array_value('class', $settings);//Optional value
$placeholder = px_array_value('placeholder', $settings);//Optional value
?>

<div class="field textarea-input <?php echo esc_attr($class); ?>">
    <textarea name="<?php echo esc_attr($name); ?>" cols="30" rows="10" placeholder="<?php echo esc_attr($placeholder); ?>" ><?php echo esc_textarea($this->Px_GetValue($name)); ?></textarea>
</div>
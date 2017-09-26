<?php
$name        = $vars['key'];
$settings    = $vars['settings'];
$class       = px_array_value('class', $settings);
$title       = px_array_value('title', $settings, __('Upload Image', TEXTDOMAIN));
$placeholder = px_array_value('placeholder', $settings);
$label       = px_array_value('label', $settings);//Optional value
$flags    = px_array_value('flags', $settings);//Opt

?>

<div class="px-input">
    <div class="px-input-upload <?php echo esc_attr($class); ?>">
        <input type="text" id="field-<?php echo esc_attr($name); ?>" name="<?php echo esc_attr($name); ?>"  placeholder="<?php echo esc_attr($placeholder); ?>"  data-flags="<?php echo esc_attr($flags); ?>"  />
        <a href="#" class="upload-button"><?php _e('Browse', TEXTDOMAIN); ?></a>
   </div>
</div>
<?php echo $this->PX_GetTemplate('field-label', $vars); ?>


   
       

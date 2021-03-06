<?php
$name     = $vars['key'];
$settings = $vars['settings'];
$class    = px_array_value('class', $settings);//Optional value
$state0   = $settings['state0'];
$state1   = $settings['state1'];
$default  = px_array_value('default', $settings);//Optional value
$val      = $this->Px_GetValue($name);
$val      = strlen($val) ? $val : $default;
?>
<div class="field clear-after <?php echo esc_attr($class); ?>">
    <div class="label"></div>
    <input name="<?php echo esc_attr($name); ?>" type="range" class="switch" value="<?php echo esc_attr( $val ); ?>" min="0" max="1" step="1"  data-state0="<?php echo esc_attr($state0); ?>" data-state1="<?php echo esc_attr($state1); ?>" />
</div>
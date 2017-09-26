<?php
$name     = $vars['key'];
$settings = $vars['settings'];
$title     = px_array_value('title', $settings);//Optional value
$class    = px_array_value('class', $settings);//Optional value
$label    = px_array_value('label', $settings);//Optional value
$min      = px_array_value('min', $settings, 1);//Optional value
$max      = px_array_value('max', $settings, 100);//Optional value
$step     = px_array_value('step', $settings, 1);//Optional value
$default  = px_array_value('default', $settings);//Optional value
$val      = $this->Px_GetValue($name);
$val      = strlen($val) ? $val : $default;
?>

<div class="field clear-after <?php echo esc_attr($class); ?>">
	<?php if (! empty($title)) { ?>
		<div class="label"><?php echo esc_attr($title); ?> : &nbsp;</div>
	<?php } ?>
    <div class="label"><?php echo esc_attr($label); ?></div>
    <input name="<?php echo esc_attr($name); ?>" type="range" min="<?php echo esc_attr($min); ?>" max="<?php echo esc_attr($max); ?>" step="<?php echo esc_attr($step); ?>"  value="<?php echo esc_attr( $val ); ?>" />
</div>
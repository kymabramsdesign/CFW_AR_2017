<?php
$name     = $vars['key'];
$settings = $vars['settings'];
$class    = px_array_value('class', $settings);//Optional value
$checked = px_array_value('checked', $settings);//Optional value
$label    = px_array_value('label', $settings);//Optional value
$value       = ( ( esc_attr( $this->Px_GetValue($name) ) == "") && (px_array_value('value', $settings) != "") ) ? px_array_value('value', $settings) : esc_attr( $this->Px_GetValue($name) );

$current_value = get_post_meta(get_the_ID(), $name, true);
?>

<div class="field checkbox-input <?php echo esc_attr($class); ?>">
    <input type="checkbox" id="field-<?php echo esc_attr($name); ?>" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>" <?php echo ($current_value != '')?'checked="checked"':''; ?> />

	<?php if($label != ''){ ?>
        <label for="field-<?php echo esc_attr($name); ?>"><?php echo esc_attr($label); ?></label>
    <?php } ?>
	
</div>
<?php if (strpos ($class,'related')!== false){ ?>
    <div class="clearfix"></div>
<?php }
<?php

/**
 * Switch component
 *
 * @package joli-table-of-contents
 * @var array $data
 * @var array $args
 */

if (! defined('ABSPATH')) {
	exit;
}

$checked         = ! empty($data['value']) && (int) $data['value'] === 1;
$active_post_type = isset($data['active_post_type']) ? $data['active_post_type'] : '';
$is_global        = ! empty($data['is_global']);
$disabled         = (($args['pro'] ?? null) === true || ($active_post_type && $is_global)) ? ' disabled' : '';
$pro_class        = ($args['pro'] ?? null) === true ? ' joli-pro' : '';

$deactivates       = ($args['deactivates'] ?? null) ? implode(',', $args['deactivates']) : '';
$children          = ($args['children'] ?? null) ? implode(',', $args['children']) : '';
$children_sections = ($args['children_sections'] ?? null) ? implode(',', $args['children_sections']) : '';
?>

<div class="<?php echo esc_attr($data['classes'] ?? '') . esc_attr($pro_class); ?>">
	<label class="joli-switch" for="<?php echo esc_attr($data['name']); ?>">
		<input
			type="checkbox"
			id="<?php echo esc_attr($data['name']); ?>"
			class="joli-checkbox"
			<?php checked($checked); ?>
			data-linkedfield="<?php echo esc_attr($data['option'] ?? ''); ?>"
			data-deactivates="<?php echo esc_attr($deactivates); ?>"
			data-children="<?php echo esc_attr($children); ?>"
			data-children-sections="<?php echo esc_attr($children_sections); ?>"
			<?php ($data['data_attrs'] ?? null) && call_user_func($data['data_attrs_fn'], $data['data_attrs']); ?>
			<?php echo esc_html($disabled); ?> />
		<span class="slider round"></span>
	</label>
	<?php if ($args['annotation'] ?? null) : ?>
		<span class="joli-switch-label joli-annotation"><?php echo esc_html($args['annotation'] ?? ''); ?></span>
	<?php endif; ?>
	<input
		type="hidden"
		id="check_<?php echo esc_attr($data['option'] ?? ''); ?>"
		name="<?php echo esc_attr($data['name']); ?>"
		value="<?php echo $checked ? 1 : 0; ?>"
		<?php echo esc_html($disabled); ?> />
</div>
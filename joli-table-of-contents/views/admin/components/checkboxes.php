<?php

/**
 * Checkboxes component
 *
 * @package joli-table-of-contents
 * @var array $data
 * @var array $args
 */

if (! defined('ABSPATH')) {
    exit;
}

$items       = isset($args['values']) ? $args['values'] : [];
$items_pro   = isset($args['values_pro']) ? $args['values_pro'] : [];

$field_id    = 'joli-checkboxes_' . $data['option'];
$raw_value   = isset($data['value']) ? (string) $data['value'] : '';
$active_vals = $raw_value === '' ? [] : array_filter(explode(',', $raw_value), 'strlen');
$global_cls  = ! empty($data['is_global']) ? ' joli-is-global' : '';

?>
<div class="joli-checkboxes-wrap <?php echo esc_attr($data['classes']); ?>">
    <input
        type="hidden"
        id="<?php echo esc_attr($field_id); ?>"
        name="<?php echo esc_attr($data['name']); ?>"
        value="<?php echo esc_attr($raw_value); ?>" />

    <?php foreach ($items as $id => $label) :
        $is_pro     = in_array($id, $items_pro, true);
        $pro_cls    = $is_pro ? ' joli-pro' : '';
        $input_id   = 'check_' . $data['name'] . $id;
        $is_checked = in_array($id, $active_vals, true);
    ?>
        <label class="joli-checkboxes-item<?php echo esc_attr($pro_cls . $global_cls); ?>" for="<?php echo esc_attr($input_id); ?>">
            <input
                type="checkbox"
                id="<?php echo esc_attr($input_id); ?>"
                class="joli-check<?php echo esc_attr($pro_cls); ?>"
                value="<?php echo esc_attr($id); ?>"
                data-linked-id="<?php echo esc_attr($field_id); ?>"
                <?php checked($is_checked); ?>
                <?php echo $is_pro ? ' disabled' : ''; ?> />
            <div class="joli-html-label"><?php echo esc_html($label); ?></div>
        </label>
    <?php endforeach; ?>
</div>
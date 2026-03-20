<?php

/**
 * CSS unit input component (value + unit)
 *
 * @package joli-table-of-contents
 * @var array $data
 * @var array $args
 */

if (! defined('ABSPATH')) {
    exit;
}

$items     = isset($args['values']) ? $args['values'] : [];
$items_pro = isset($args['values_pro']) ? $args['values_pro'] : [];

$raw       = isset($data['value']) ? (string) $data['value'] : '';
$text_val  = '';
$unit_val  = '';

if ($raw !== '') {
    $parts     = explode('|', $raw);
    $text_val  = isset($parts[0]) ? $parts[0] : '';
    $unit_val  = isset($parts[1]) ? $parts[1] : '';
    if ($unit_val === '' && ! empty($items)) {
        // Default to the first item’s key if available
        $first_key = array_key_first($items);
        $unit_val  = (string) $first_key;
    }
}

$disabled = ! empty($args['pro']) ? ' disabled' : '';
?>

<fieldset class="joli-css-unit-field" <?php echo esc_html($disabled); ?>>
    <label class="<?php echo esc_attr($data['classes']); ?>" for="<?php echo esc_attr($data['name']); ?>">
        <input
            type="hidden"
            class="<?php echo esc_attr($data['classes']); ?>"
            id="joli-css-unit_<?php echo esc_attr($data['option']); ?>"
            name="<?php echo esc_attr($data['name']); ?>"
            value="<?php echo esc_attr($raw); ?>" 
            <?php ($data['data_attrs'] ?? null) && call_user_func($data['data_attrs_fn'], $data['data_attrs']); ?>
            />

        <input
            type="text"
            class="joli-css-unit-input"
            name="joli-css-unit-value_<?php echo esc_attr($data['option']); ?>"
            placeholder="<?php echo esc_attr($data['placeholder']); ?>"
            data-linkedfield="<?php echo esc_attr($data['option']); ?>"
            value="<?php echo esc_attr($text_val); ?>" />

        <select
            class="joli-css-unit-values"
            name="joli-css-unit-unit_<?php echo esc_attr($data['option']); ?>"
            data-linkedfield="<?php echo esc_attr($data['option']); ?>">
            <?php foreach ($items as $id => $label) :
                $is_pro = in_array($id, $items_pro, true);
            ?>
                <option
                    value="<?php echo esc_attr($id); ?>"
                    <?php selected((string) $id, (string) $unit_val); ?>
                    <?php echo $is_pro ? ' disabled' : ''; ?>>
                    <?php
                    if ($is_pro) {
                        /* translators: %s = option label */
                        echo esc_html(sprintf(__('%s [PRO]', 'joli-table-of-contents'), $label));
                    } else {
                        echo esc_html($label);
                    }
                    ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
</fieldset>
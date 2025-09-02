<?php

/**
 * Checkbox component
 *
 * @package joli-table-of-contents
 * @var array $data
 * @var array $args
 */

if (! defined('ABSPATH')) {
    exit;
}

$checked  = ! empty($data['value']) && (int) $data['value'] === 1;
$disabled = $args['pro'] ? ' disabled' : '';
?>

<div class="<?php echo esc_attr($data['classes']) ?>">
    <input
        type="checkbox"
        id="<?php echo esc_attr($data['name']) ?>"
        class="joli-checkbox"
        <?php checked($checked) ?>
        data-linkedfield="<?php echo esc_attr($data['option']) ?>"
        <?php echo esc_html($disabled) ?> />
    <label for="<?php echo esc_attr($data['name']) ?>"></label>

    <input
        type="hidden"
        id="check_<?php echo esc_attr($data['option']) ?>"
        name="<?php echo esc_attr($data['name']) ?>"
        value="<?php echo $checked ? 1 : 0 ?>"
        <?php echo esc_html($disabled) ?> />
</div>
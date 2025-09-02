<?php

/**
 * Text input component
 *
 * @package joli-table-of-contents
 * @var array $data
 * @var array $args
 * @var array $data_attrs
 */

if (! defined('ABSPATH')) {
    exit;
}

$active_post_type = isset($data['active_post_type']) ? $data['active_post_type'] : '';
$is_global        = ! empty($data['is_global']);
$disabled         = ($args['pro'] || ($active_post_type && $is_global)) ? ' disabled' : '';

$data_attrs_clean = '';
if (jtoc_isset_or_null($data_attrs) && is_array($data_attrs)) {
    foreach ($data_attrs as $key => $value) {
        $data_attrs_clean .= sprintf(' data-%s="%s"', esc_html($key), esc_attr($value));
    }
}
?>

<input
    type="text"
    class="<?php echo esc_attr($data['classes']); ?>"
    id="<?php echo esc_attr($data['name']); ?>"
    name="<?php echo esc_attr($data['name']); ?>"
    value="<?php echo esc_attr($data['value']); ?>"
    placeholder="<?php echo esc_attr($data['placeholder']); ?>"
    <?php echo wp_strip_all_tags($data_attrs_clean); ?>
    <?php echo esc_html($disabled); ?> />
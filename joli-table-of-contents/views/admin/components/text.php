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
$disabled         = (($args['pro'] ?? null ) === true || ($active_post_type && $is_global)) ? ' disabled' : '';

$data_attrs_clean = '';
$data_attrs = jtoc_isset_or_null($data['data_attrs']);
if (jtoc_isset_or_null($data_attrs) && is_array($data_attrs)) {
    foreach ($data_attrs as $key => $value) {
        $data_attrs_clean .= sprintf(' data-%s="%s"', esc_html($key), esc_attr($value));
    }
}

$suggestions = isset($args['suggestions']) ? $args['suggestions'] : []; // class .--show-suggestions added to joli-input-wrap to show suggestions
?>

<div class="joli-input-wrap">
    <input
        type="text"
        class="<?php echo esc_attr($data['classes'] ?? ''); ?>"
        id="<?php echo esc_attr($data['name']); ?>"
        name="<?php echo esc_attr($data['name']); ?>"
        value="<?php echo esc_attr($data['value']); ?>"
        placeholder="<?php echo esc_attr($data['placeholder'] ?? ''); ?>"
        <?php echo wp_strip_all_tags($data_attrs_clean); ?>
        <?php echo esc_html($disabled); ?> />
    <?php if ($suggestions) : ?>
        <ul class="joli-suggestions-list">
            <?php foreach ($suggestions as $suggestion) : ?>
                <li><?php echo esc_html($suggestion); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
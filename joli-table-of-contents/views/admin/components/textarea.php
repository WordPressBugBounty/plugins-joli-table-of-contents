<?php

/**
 * Textarea component
 *
 * @package joli-table-of-contents
 * @var array $data
 * @var array $args
 */

if (! defined('ABSPATH')) {
    exit;
}

// $ta_size = 'cols="100" rows="12"';
$cols = isset($args['textarea-size'])  && 'small' === $args['textarea-size'] ? '60' : '100';
$rows = isset($args['textarea-size'])  && 'small' === $args['textarea-size'] ? '6' : '12';
// if (isset($args['textarea-size']) && 'small' === $args['textarea-size']) {
//     $ta_size = 'cols="60" rows="6"';
// }

$active_post_type = isset($data['active_post_type']) ? $data['active_post_type'] : '';
$is_global        = ! empty($data['is_global']);
$disabled         = ($args['pro'] || ($active_post_type && $is_global)) ? ' disabled' : '';

$style_attr = '';
if (function_exists('jtoc_isset_or_null') && jtoc_isset_or_null($args['style'])) {
    $style_attr = ' style="' . esc_attr(jtoc_cssify($args['style'])) . '"';
}
?>

<textarea
    class="<?php echo esc_attr($data['classes']); ?>"
    id="<?php echo esc_attr($data['name']); ?>"
    name="<?php echo esc_attr($data['name']); ?>"
    cols="<?php echo esc_attr($cols); ?>"
    rows="<?php echo esc_attr($rows); ?>"
    placeholder="<?php echo esc_attr($data['placeholder']); ?>"
    <?php echo esc_html($disabled); ?>
    <?php echo $style_attr; ?>><?php echo esc_textarea(jtoc_isset_or_null($data['value'], true)); ?></textarea>
<br>
<?php

/**
 * Image picker component
 *
 * @package joli-table-of-contents
 * @var array $data
 * @var array $args
 */

if (! defined('ABSPATH')) {
    exit;
}

$styles = isset($args['styles']) ? $args['styles'] : '';
// Original code always set $is_pro = false; keep behavior:
$pro_cls = '';
?>

<div class="<?php echo esc_attr($data['classes']); ?>">
    <?php if ($styles) : ?>
        <style><?php echo wp_strip_all_tags($styles) ?></style>
    <?php endif; ?>
    <button class="joli-image-picker<?php echo esc_attr($pro_cls); ?>" type="button">
        <div class="joli-html-label"><?php echo esc_html__('Select an image', 'joli-table-of-contents'); ?></div>
    </button>
</div>
<?php

/**
 * Color input component
 *
 * @package joli-table-of-contents
 * @var array $data
 * @var array $args
 * @var array $palette
 */

if (! defined('ABSPATH')) {
    exit;
}

$active_post_type = isset($data['active_post_type']) ? $data['active_post_type'] : '';
$is_global        = ! empty($data['is_global']);
$disabled         = (($args['pro'] ?? null) === true || ($active_post_type && $is_global)) ? ' disabled' : '';

// $data_attrs_clean = '';
// $data_attrs = jtoc_isset_or_null($data['data_attrs']);
// if (jtoc_isset_or_null($data_attrs) && is_array($data_attrs)) {
//     foreach ($data_attrs as $key => $value) {
//         $data_attrs_clean .= sprintf(' data-%s="%s"', esc_html($key), esc_attr($value));
//     }
// }
// JTOC()->log($data['swatches']);
if (isset($data['swatches']) && $data['swatches'] === false) {
    $palette = false; // removes the swatches
}
// if (isset($data_attrs['theme-palette'])) {
//      JTOC()->log($palette); 
// }
?>

<div class="jli-color-input jli-flex jli-flex-col jli-gap-2">
    <div class="jli-flex jli-gap-1 jli-items-center">
        <input
            readonly
            type="text"
            class="<?php echo esc_attr($data['classes']); ?>"
            id="<?php echo esc_attr($data['name']); ?>"
            name="<?php echo esc_attr($data['name']); ?>"
            value="<?php echo esc_attr($data['value']); ?>"
            placeholder="<?php echo esc_attr($data['placeholder']); ?>"
            <?php (($data['data_attrs'] ?? null) && ($data['data_attrs_fn'] ?? null)) && call_user_func($data['data_attrs_fn'], $data['data_attrs']); ?>
            <?php echo esc_html($disabled); ?> />
        <!-- Trash button -->
        <button class="jli-color-remove jli-button jli-button-ghost jli-button-xs" type="button" data-color-id="<?php echo esc_attr($data['name']); ?>">
            <span class="dashicons dashicons-trash" title="Remove color"></span>
        </button>

    </div>
    <div class="jli-color-palette-wrap jli-flex jli-gap-4">
        <div class="jli-color-palette jli-flex jli-gap-2">
            <?php if ($palette && jtoc_isset_or_null($data['theme_palette']) === true) : ?>
                <?php foreach ($palette as $color) : ?>
                    <div class="jli-color-palette-item" data-theme-palette data-color="<?php echo esc_attr($color); ?>" title="<?php echo esc_attr($color); ?>" style="--palette-color: <?php echo esc_attr($color); ?>"></div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php if (!($palette && jtoc_isset_or_null($data['theme_palette']) === true)) : ?>
            <a class="jli-edit-palette button-link" href="#theme">Edit palette</a>
        <?php endif; ?>
    </div>
</div>
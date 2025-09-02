<?php

/**
 * Select component
 *
 * @package joli-table-of-contents
 * @var array $data
 * @var array $args
 */

if (! defined('ABSPATH')) {
    exit;
}

$items              = isset($args['values']) ? $args['values'] : [];
$items_pro          = isset($args['values_pro']) ? $args['values_pro'] : [];
$items_disabled     = isset($args['values_disabled']) ? $args['values_disabled'] : [];
$items_custom_js_var = isset($args['values_custom']) ? $args['values_custom'] : [];

$disabled = $args['pro'] ? ' disabled' : '';

// check if $data['value'] is one of $items. use the $args['default'] if not
if (! in_array($data['value'], array_keys($items))) {
    $data['value'] = null;
}
?>

<div class="<?php echo esc_attr($data['classes']); ?>">
    <select
        name="<?php echo esc_attr($data['name']); ?>"
        id="<?php echo esc_attr($data['name']); ?>"
        data-selector="<?php echo esc_attr($data['option']); ?>"
        <?php echo esc_html($disabled); ?>
        <?php if ($items_custom_js_var) : ?>
        data-has-custom-values="1"
        data-custom-values-src="<?php echo esc_attr($items_custom_js_var); ?>"
        <?php endif; ?>
        <?php if (! empty($data['value'])) : ?>
        data-selected-value="<?php echo esc_attr($data['value']); ?>"
        <?php endif; ?>>
        <?php foreach ($items as $id => $label) :
            $is_pro      = in_array($id, $items_pro, true);
            $is_disabled = in_array($id, $items_disabled, true);
            $value       = ($is_pro && jtoc_xy()->is_not_paying()) ? 'none' : $id;
        ?>
            <option
                value="<?php echo esc_attr($value); ?>"
                <?php selected($value, $data['value']); ?>
                <?php disabled($is_disabled); ?>
                <?php echo isset($args['media'][$id]) ? ' data-media="' . esc_attr($id) . '"' : ''; ?>>
                <?php echo esc_html($is_pro && jtoc_xy()->is_not_paying() ? $label . ' [PRO]' : $label); ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<?php if (isset($args['media']) && is_array($args['media'])) : ?>
    <p>
        <?php foreach ($args['media'] as $media_id => $media_name) : ?>
            <img
                id="<?php echo esc_attr($data['option'] . '-' . $media_id); ?>"
                class="joli-admin-image joli-admin-image-<?php echo esc_attr($data['option']); ?><?php echo $media_id !== $data['value'] ? ' hidden' : ''; ?>"
                src="<?php echo esc_url(JTOC()->url('assets/admin/img/' . $media_name)); ?>"
                alt="" />
        <?php endforeach; ?>
    </p>
<?php endif; ?>
<?php

/**
 * Radio button component
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
$styles    = isset($args['styles']) ? $args['styles'] : '';
$disabled = ($args['pro'] ?? null) ? ' disabled' : '';

// Define allowed HTML tags for labels
// $allowed_html = [
//     'div'      => [
//         'class' => true,
//     ],
//     'i'      => [
//         'class' => true,
//     ],
//     'strong' => [],
//     'em'     => [],
//     'span'   => [
//         'class' => true,
//         'style' => true,
//     ],
//     'br'     => [],
//     'b'      => [],
//     'u'      => [],
//     'a'      => [
//         'href'   => true,
//         'title'  => true,
//         'target' => true,
//         'rel'    => true,
//     ],
// ];

?>

<div class="<?php echo esc_attr($data['classes'] ?? ''); ?>">
    <?php if ($styles) : ?>
        <style>
            <?php echo wp_strip_all_tags($styles) ?>
        </style>
    <?php endif; ?>

    <fieldset id="joli-radio-button_<?php echo esc_attr($data['name']); ?>" class="joli-fieldset joli-radio-button"<?php echo esc_attr($disabled); ?>>
        <?php foreach ($items as $id => $label) :
            $is_pro     = in_array($id, $items_pro, true);
            $pro_cls    = $is_pro ? ' joli-pro' : '';
            $pro_suffix = $is_pro ? '-disabled' : '';
            $name_attr  = $data['name'] . $pro_suffix;
            $input_id   = 'radio_' . $data['name'] . $id;
            $is_checked = (string) $id === (string) $data['value'];
        ?>
            <label class="joli-radio-button<?php echo esc_attr($pro_cls); ?>" for="<?php echo esc_attr($input_id); ?>">
                <input
                    type="radio"
                    id="<?php echo esc_attr($input_id); ?>"
                    name="<?php echo esc_attr($name_attr); ?>"
                    class="joli-radio<?php echo esc_attr($pro_cls); ?>"
                    value="<?php echo esc_attr($id); ?>"
                    <?php checked($is_checked); ?>
                    <?php echo $is_pro ? ' disabled' : ''; ?>
                    <?php ($data['data_attrs'] ?? null) && call_user_func($data['data_attrs_fn'], $data['data_attrs']); ?> />
                <div class="joli-html-label"><?php echo esc_html($label); ?></div>
            </label>
        <?php endforeach; ?>
    </fieldset>
</div>
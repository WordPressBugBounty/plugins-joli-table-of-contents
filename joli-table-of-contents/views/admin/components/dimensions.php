<?php

/**
 * Dimensions component (top/right/bottom/left + unit)
 *
 * @package joli-table-of-contents
 * @var array $data
 * @var array $args
 */

if (! defined('ABSPATH')) {
    exit;
}

$units      = isset($args['units']) ? $args['units'] : [];
$items_pro  = isset($args['values_pro']) ? $args['values_pro'] : [];
$sub_dims   = isset($args['sub_dimensions']) ? (array) $args['sub_dimensions'] : [];

$val        = isset($data['value']) && is_array($data['value']) ? $data['value'] : [];
$val_dim    = isset($val['dim']) && is_array($val['dim']) ? $val['dim'] : [];
$val_unit   = isset($val['unit']) ? (string) $val['unit'] : '';

$disabled   = ! empty($args['pro']) ? ' disabled' : '';

$lock_class = ($args['lock'] ?? false) ? ' --joli-is-locked' : '';
// jtocpre($args);
?>

<fieldset class="joli-dimensions-field" <?php echo esc_html($disabled); ?>>
    <label class="<?php echo esc_attr($data['classes']); ?>" for="<?php echo esc_attr($data['name']); ?>">
        <div class="joli-dimensions-control">
            <ul>
                <?php foreach ($sub_dims as $dimension) :
                    $input_id = 'joli_dimension_' . $data['option'] . '_' . $dimension;
                    $val_here = isset($val_dim[$dimension]) ? $val_dim[$dimension] : '';
                ?>
                    <li>
                        <input
                            type="number"
                            id="<?php echo esc_attr($input_id); ?>"
                            name="<?php echo esc_attr($data['name']); ?>[dim][<?php echo esc_attr($dimension); ?>]"
                            class="joli-dimension-input"
                            data-dimension="<?php echo esc_attr($dimension); ?>"
                            value="<?php echo esc_attr($val_here); ?>"
                            <?php if (! empty($args['step'])) : ?>step="<?php echo esc_attr($args['step']); ?>"<?php endif; ?>
                            <?php if (isset($args['min'])) : ?>min="<?php echo esc_attr($args['min']); ?>"<?php endif; ?>
                            <?php if (isset($args['max'])) : ?>max="<?php echo esc_attr($args['max']); ?>"<?php endif; ?>
                            <?php ($data['data_attrs'] ?? null) && call_user_func($data['data_attrs_fn'], $data['data_attrs']); ?> />
                        <label class="joli-dimension-label" for="<?php echo esc_attr($input_id); ?>">
                            <?php echo esc_html($dimension); ?>
                        </label>
                    </li>
                <?php endforeach; ?>
            </ul>

            <span
                class="joli-dimensions-lock dashicons<?php echo esc_attr($lock_class); ?>"
                title="<?php echo esc_attr(__('Link values together', 'joli-table-of-contents')); ?>"></span>

            <select
                name="<?php echo esc_attr($data['name']); ?>[unit]"
                class="joli-dimensions-units"
                data-linkedfield="<?php echo esc_attr($data['option']); ?>">
                <?php foreach ($units as $id => $label) :
                    $is_pro = in_array($id, $items_pro, true);
                ?>
                    <option
                        value="<?php echo esc_attr($id); ?>"
                        <?php selected((string) $id, (string) $val_unit); ?>
                        <?php echo $is_pro ? ' disabled' : ''; ?>>
                        <?php
                        if ($is_pro) {
                            /* translators: %s = unit label */
                            echo esc_html(sprintf(__('%s [PRO]', 'joli-table-of-contents'), $label));
                        } else {
                            echo esc_html($label);
                        }
                        ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <div>
                <a href="#" class="joli-dimensions-clear button button-link">
                    <?php echo esc_html__('clear', 'joli-table-of-contents'); ?>
                </a>
            </div>
        </div>
    </label>
</fieldset>
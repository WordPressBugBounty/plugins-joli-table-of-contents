<?php

/**
 * Lucide icon picker component
 *
 * @package joli-table-of-contents
 * @var array $data
 * @var array $args
 * @var array $options
 * @var string $selected_icon
 */

if (! defined('ABSPATH')) {
    exit;
}

$color        = ! empty($data['value']['color']) ? $data['value']['color'] : 'currentColor';
$pro_partial  = jtoc_isset_or_null($args['pro_partial']);
$control_class = $pro_partial ? 'joli-control joli-pro' : 'joli-control';
?>
<div id="<?php echo esc_attr($data['option']); ?>" class="<?php echo esc_attr($data['classes']); ?> joli-lucide-picker">

    <style>
        #<?php echo esc_attr($data['option']) . ' .joli-lucide-icon .lucide' ?> {
            will-change: width, height, stroke-width, stroke;
            color: var(--<?php echo esc_attr($data['option']); ?>_color, <?php echo esc_attr($color); ?>);
            stroke-width: var(--<?php echo esc_attr($data['option']); ?>_stroke_width, <?php echo esc_attr($data['value']['stroke_width']); ?>);
            width: calc(var(--<?php echo esc_attr($data['option']); ?>_size, <?php echo esc_attr($data['value']['size']); ?>) * 1px);
            height: calc(var(--<?php echo esc_attr($data['option']); ?>_size, <?php echo esc_attr($data['value']['size']); ?>) * 1px);
        }
    </style>

    <fieldset class="joli-fieldset" <?php echo $pro_partial ? 'disabled' : ''; ?>>
        <div class="joli-lucide-picker--header">

            <div class="<?php echo esc_attr($control_class); ?>">
                <label><?php esc_html_e('Size', 'joli-table-of-contents'); ?></label>
                <input
                    type="number"
                    min="16"
                    max="48"
                    step="4"
                    id="<?php echo esc_attr($data['option']); ?>_size"
                    name="<?php echo esc_attr($data['name']); ?>[size]"
                    class="joli-lucide-picker-input --prop-size"
                    value="<?php echo esc_attr($data['value']['size']); ?>"
                    <?php echo $pro_partial ? 'disabled' : ''; ?> />
            </div>

            <div class="<?php echo esc_attr($control_class); ?>">
                <label><?php esc_html_e('Stroke width', 'joli-table-of-contents'); ?></label>
                <input
                    type="number"
                    min="0.5"
                    max="3"
                    step="0.25"
                    id="<?php echo esc_attr($data['option']); ?>_stroke_width"
                    name="<?php echo esc_attr($data['name']); ?>[stroke_width]"
                    class="joli-lucide-picker-input --prop-stroke-width"
                    value="<?php echo esc_attr($data['value']['stroke_width']); ?>"
                    <?php echo $pro_partial ? 'disabled' : ''; ?> />
            </div>

            <div class="<?php echo esc_attr($control_class); ?>">
                <label><?php esc_html_e('Color', 'joli-table-of-contents'); ?></label>
                <input
                    type="text"
                    name="<?php echo esc_attr($data['name']); ?>[color]"
                    id="<?php echo esc_attr($data['option']); ?>_color"
                    class="joli-lucide-color-picker joli-lucide-picker-input --prop-color"
                    value="<?php echo esc_attr($data['value']['color']); ?>"
                    <?php echo $pro_partial ? 'disabled' : ''; ?> />
            </div>

            <?php if ($pro_partial): ?>
                <div style="display:flex;align-items:center;font-weight:bold;">
                    <?php esc_html_e('Customize icons with Pro', 'joli-table-of-contents'); ?>
                </div>
            <?php endif; ?>
        </div>
    </fieldset>

    <?php if ($pro_partial): ?>
        <input type="hidden" name="<?php echo esc_attr($data['name']); ?>[size]" value="20" />
        <input type="hidden" name="<?php echo esc_attr($data['name']); ?>[stroke_width]" value="2" />
        <input type="hidden" name="<?php echo esc_attr($data['name']); ?>[color]" value="" />
    <?php endif; ?>

    <div style="margin-bottom:1em;">
        <div class="joli-control">
            <label><?php esc_html_e('Icon', 'joli-table-of-contents'); ?></label>
            <div>
                <button
                    id="<?php echo esc_attr($data['option']); ?>--toggle"
                    type="button"
                    class="joli-btn joli-lucide-picker--toggle">
                    <div class="joli-lucide-icon">
                        <?php echo wp_kses( $selected_icon, jtoc_kses_lucide_svg() ); ?>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <div class="joli-lucide-picker--body">
        <?php foreach ($options as $opt): ?>
            <label class="joli-radio-icon<?php echo esc_attr($opt['pro_class']); ?>" for="radio_<?php echo esc_attr($opt['id']); ?>" data-icon-src="<?php echo esc_url($opt['icon_url']); ?>">
                <input
                    type="radio"
                    id="radio_<?php echo esc_attr($opt['id']); ?>"
                    name="<?php echo esc_attr($opt['name']); ?>[icon]"
                    class="joli-radio<?php echo esc_attr($opt['pro_class']); ?>"
                    value="<?php echo esc_attr($opt['value']); ?>"
                    <?php checked($opt['checked']); ?>
                    <?php echo $opt['disabled'] ? 'disabled' : ''; ?> />
                <div class="joli-lucide-icon">
                    <?php echo wp_kses($opt['icon_svg'], jtoc_kses_lucide_svg()); ?>
                </div>
            </label>
        <?php endforeach; ?>
    </div>
</div>
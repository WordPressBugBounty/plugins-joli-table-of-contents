<div class="joli-lucide-picker">
    <?php
    if ($data['value']['color']) {
        $color = $data['value']['color'];
    } else {
        $color = 'currentColor';
    }

    $pro_partial = jtoc_isset_or_null($args['pro_partial']);

    $control_class = $pro_partial ? 'joli-control joli-pro' : 'joli-control';
    ?>
    <style>
        #<?php echo $data['option'] . ' .joli-lucide-icon .lucide' ?> {
            will-change: width, height, stroke-width, stroke;
            color: var(--<?php echo $data['option'] ?>_color, <?php echo $color ?>);
            stroke-width: var(--<?php echo $data['option'] ?>_stroke_width, <?php echo $data['value']['stroke_width']; ?>);
            width: calc(var(--<?php echo $data['option'] ?>_size, <?php echo $data['value']['size']; ?>)* 1px);
            height: calc(var(--<?php echo $data['option'] ?>_size, <?php echo $data['value']['size']; ?>)* 1px);
        }
    </style>

    <fieldset
        class="joli-fieldset"
        <?php echo $pro_partial ? 'disabled' : ''; ?>>
        <div class="joli-lucide-picker--header">
            <div class="<?php echo $control_class; ?>">
                <label for="">Size</label>
                <input type="number"
                    type="number"
                    min="16"
                    max="48"
                    step="4"
                    id="<?php echo $data['option']; ?>_size"
                    name="<?php echo $data['name']; ?>[size]"
                    class="joli-lucide-picker-input --prop-size "
                    value="<?php echo $data['value']['size']; ?>"
                    <?php echo $pro_partial ? 'disabled' : ''; ?> />
            </div>
            <div class="<?php echo $control_class; ?>">
                <label for="">Stroke width</label>
                <input type="number"
                    type="number"
                    min="0.5"
                    max="3"
                    step="0.25"
                    id="<?php echo $data['option']; ?>_stroke_width"
                    name="<?php echo $data['name']; ?>[stroke_width]"
                    class="joli-lucide-picker-input --prop-stroke-width"
                    value="<?php echo $data['value']['stroke_width']; ?>"
                    <?php echo $pro_partial ? 'disabled' : ''; ?> />
            </div>
            <div class="<?php echo $control_class; ?>">
                <label for="">Color</label>
                <input
                    type="text"
                    name="<?php echo $data['name']; ?>[color]"
                    id="<?php echo $data['option']; ?>_color"
                    class="joli-lucide-color-picker joli-lucide-picker-input --prop-color"
                    value="<?php echo $data['value']['color']; ?>"
                    <?php echo $pro_partial ? 'disabled' : ''; ?> />
            </div>

            <?php if ($pro_partial): ?>
                <div style="display: flex;align-items: center;font-weight: bold;">
                    <?php esc_html_e('Customize icons with Pro', 'joli-table-of-contents') ?>
                </div>
            <?php endif; ?>
        </div>
    </fieldset>
    <?php if ($pro_partial): ?>
        <input
            type="hidden"
            name="<?php echo $data['name']; ?>[size]"
            value="20" />
        <input
            type="hidden"
            name="<?php echo $data['name']; ?>[stroke_width]"
            value="2" />
        <input
            type="hidden"
            name="<?php echo $data['name']; ?>[color]"
            value="" />
    <?php endif; ?>

    <div style="margin-bottom: 1em;">
        <div class="joli-control">
            <label for="">Icon</label>
            <div>
                <button
                id="<?php echo $data['option']; ?>--toggle"
                type="button"
                class="joli-btn joli-lucide-picker--toggle">
                <div class="joli-lucide-icon">
                    <?php echo $selected_icon; ?>
                </div>
            </button>
        </div>
        </div>
    </div>

    <div class="joli-lucide-picker--body">
        <?php echo $options; ?>
    </div>
</div>
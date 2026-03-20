<?php
if (empty($options) || empty($name)) {
    return;
}

$current = $value ?? '';
?>

<div class="jli-card-options">
    <input
        type="hidden"
        class="jli-card-option-input"
        name="<?php echo esc_attr($name); ?>"
        value="<?php echo esc_attr($current); ?>">

    <?php foreach ($options as $option_value => $option) : ?>
        <?php
        $is_selected = $option_value === $current;
        ?>
        <div
            class="jli-card-option <?php echo $is_selected ? 'is-selected' : ''; ?><?php echo $option['class'] ?? ''; ?>"
            data-value="<?php echo esc_attr($option_value); ?>">
            <?php if (! empty($option['image']) || !empty($option['icon'])) : ?>
                <?php if (! empty($option['icon'])) : ?>
                    <div class="jli-card-option-icon">
                        <?php echo wp_kses($option['icon'], jtoc_kses_lucide_svg()); ?>
                    </div>
                <?php endif; ?>
                <?php if (! empty($option['image'])) : ?>
                    <div class="jli-card-option-image">
                        <img src="<?php echo esc_url($option['image']); ?>" alt="" loading="lazy">
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="jli-card-option-body">
                <div class="jli-card-option-name">
                    <?php echo esc_html($option['title']); ?>
                </div>
                <div class="jli-card-option-description">
                    <?php echo esc_html($option['description']); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="jli-card-options-contextual">
    <?php foreach ($options as $option_value => $option) : ?>
        <div
            class="jli-contextual-info <?php echo $option_value === $current ? '--active' : ''; ?>"
            data-linked-value="<?php echo esc_attr($option_value); ?>">
            <?php
            if (isset($option['contextual']) && is_callable($option['contextual'])) {
                $option['contextual']();
            }
            ?>
        </div>
    <?php endforeach; ?>
</div>
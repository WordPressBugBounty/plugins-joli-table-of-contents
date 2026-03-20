<?php defined('ABSPATH') || exit; ?>
<?php $href = $args['url'] ? $args['url'] : '#' . $args['id'] ?>
<li class="wpj-jtoc--item --jtoc-h<?php echo esc_attr($args['depth']) ?><?php if ($args['is_collapsible']) : ?> --collapsible<?php endif; ?><?php if ($args['is_collapsible'] && $args['is_collapsed']) : ?> --collapsed<?php endif; ?>">
    <?php do_action('joli_toc_before_begin_item_content', $args) ?>
    <div class="wpj-jtoc--item-content<?php if ($href && strpos($href, 'xxxcommodo-accumsan') !== false) : ?> hover<?php endif; ?> --jtoc-h<?php echo esc_attr($args['depth']) ?>" data-depth="<?php echo esc_attr($args['depth']) ?>">
        <?php do_action('joli_toc_after_begin_item_content', $args) ?>
        <?php if ($args['collapsible_headings']) : ?> <?php if ($args['is_collapsible']) : ?><div class="jtoc--collapse-btn"><?php echo ($args['collapse_headings_icon']['icon']) ?></div><?php else: ?><span class="jtoc--collapse-spacing" style="min-width: <?php echo esc_attr($args['collapse_headings_icon']['width']) ?>px;"></span><?php endif; ?><?php endif; ?>
        <?php if ($args['bullet']) : ?><div class="jtoc--bullet"><div class="--bullet-inner"></div></div><?php endif; ?>
        <?php if ($args['bullet_filler']) : ?><div class="jtoc--bullet"><div class="--bullet-filler"></div></div><?php endif; ?>
        <?php if (!$args['is_num_legacy'] && $args['has_numeration']) : ?><span class="jtoc--num"><!--<?php echo esc_html($args['counter']) ?>--></span><?php endif; ?>
        <a href="<?php echo esc_attr($href) ?>" <?php echo jtoc_process_attrs(apply_filters('joli_toc_item_link_attributes', $args['attrs'], $args)) ?> data-numeration="<?php echo esc_attr($args['counter']) ?>"><?php do_action('joli_toc_after_begin_item_link', $args) ?><?php echo wp_kses_post($args['title']) ?><?php do_action('joli_toc_before_end_item_link', $args) ?></a>
        <?php if ($args['smart']) : ?><span class="wpj-jtoc--item-indicator"><?php echo esc_html($args['smart']) ?></span><?php endif; ?>
        <?php do_action('joli_toc_before_end_item_content', $args) ?>
    </div><?php do_action('joli_toc_after_end_item_content', $args) ?>
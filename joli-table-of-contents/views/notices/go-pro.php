<div class="notice notice-info joli-toc-notice">
<p>
    <?php echo wp_kses_post(
        sprintf(__('Take your table of contents further with %sJoli Table Of Contents Pro%s.', 'joli-table-of-contents'), '<strong>', '</strong>')
    );
    ?>
    <?php echo wp_kses_post(__('Unlock features like a <span style="color:#5890ff;font-weight:600;">Sticky TOC</span>, <span style="color:#5890ff;font-weight:600;">Floating or Slide-out TOC</span>, and <span style="color:#5890ff;font-weight:600;">Collapsible headings</span> for a cleaner reading experience.', 'joli-table-of-contents')); ?>
</p>
    <p>
        <a href="<?php echo esc_attr($pro_url); ?>" target="_blank" class="button button-primary" style="margin-right: 5px;">
            <?php esc_html_e('✨ Unlock Pro features', 'joli-table-of-contents'); ?>
        </a>
        <a href="" class="button button-link" data-method="dismiss" data-action="gopro" style="margin-right: 5px;">
            <?php esc_html_e('Not interested', 'joli-table-of-contents'); ?>
        </a>
    </p>
</div>
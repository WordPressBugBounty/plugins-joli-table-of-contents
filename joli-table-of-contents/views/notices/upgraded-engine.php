<div class="notice notice-warning joli-toc-notice-v2" style="background-color: #ffecc9;">
    <h3>⚠️ <?php esc_html_e('HEADS UP', 'joli-table-of-contents') ?> ! — Joli Table Of Contents ⚠️</h3>
    <p>
        <?php esc_html_e('A new, more efficient TOC engine (PHP 8.2-ready) is available since v2.8 — no visual changes expected.', 'joli-table-of-contents') ?>
    </p>
    <p>
        <?php esc_html_e('We recommend switching now, as the previous engine is being deprecated.', 'joli-table-of-contents') ?>
    </p>
    <p>
        <?php echo sprintf(esc_html__('Please check your pages on the front-end for any issues. You can revert anytime from the %s under GENERAL > TOC ENGINE if anything goes wrong.', 'joli-table-of-contents'), '<a href="' . esc_url(admin_url('admin.php?page=' . JTOC()::SETTINGS_V2_SLUG)) . '">' . esc_html__('settings', 'joli-table-of-contents') . '</a>') ?>
    </p>
    <p style="<?php echo esc_attr( jtoc_cssify(['display' => 'flex', 'gap' => '10px'])) ?>">
        <!-- activate -->
        <a href="#" target="_blank" class="button button-primary" data-method="activate" data-action="toc-engine"><?php esc_html_e('I understand, switch now', 'joli-table-of-contents') ?></a>
        <!-- remind -->
        <a href="#" class="button button-secondary" data-method="remind" data-action="toc-engine"><?php esc_html_e('I am not sure, remind me later', 'joli-table-of-contents') ?></a>
        <!-- dismiss -->
        <a href="#" class="button button-link" data-method="dismiss" data-action="toc-engine"><?php esc_html_e('Dismiss', 'joli-table-of-contents') ?></a>
    </p>
</div>
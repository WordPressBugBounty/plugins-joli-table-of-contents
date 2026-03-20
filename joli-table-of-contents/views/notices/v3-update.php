<div class="notice notice-warning joli-toc-notice-v3" style="background-color: #fffaec;">
    <h3>⚠️ <?php esc_html_e('Heads up!', 'joli-table-of-contents') ?> — Joli Table Of Contents v3 ⚠️</h3>
    <p>
        <?php esc_html_e('Version 3 is here, bringing many improvements — including updates to numbering and theming — which may introduce minor visual changes when enabled.', 'joli-table-of-contents') ?>
    </p>
    <p>
        <?php /* translators: %s: settings */ echo sprintf(
            esc_html__('To preserve your current design, legacy numbering and v2 themes remain enabled on your site. A new, more flexible numbering system and modern color palette-based themes are now available, and you can switch to them anytime from the %s page. We recommend exporting your current settings ("Import/Export Settings" in the menu next to the Save button) before making changes, so you can easily revert if needed.', 'joli-table-of-contents'),
            '<a href="' . esc_url(admin_url('admin.php?page=' . JTOC()::SETTINGS_V2_SLUG)) . '">' . esc_html__('settings', 'joli-table-of-contents') . '</a>'
        ); ?>
    </p>
    <p style="<?php echo esc_attr(jtoc_cssify(['display' => 'flex', 'gap' => '10px'])) ?>">
        <!-- activate -->
        <a href="#" target="_blank" class="button button-primary" data-method="go" data-action="v3"><?php esc_html_e('Go to settings', 'joli-table-of-contents') ?></a>
        <!-- remind -->
        <a href="#" class="button button-secondary" data-method="remind" data-action="v3"><?php esc_html_e('Remind me later', 'joli-table-of-contents') ?></a>
        <!-- dismiss -->
        <a href="#" class="button button-link" data-method="dismiss" data-action="v3"><?php esc_html_e('Dismiss', 'joli-table-of-contents') ?></a>
    </p>
</div>
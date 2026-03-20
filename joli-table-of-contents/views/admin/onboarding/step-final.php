<?php

/**
 * Plugin settings
 *
 * @package joli-table-of-contents
 * 
 * @var WPJoli\JoliTOC\Controllers\Callbacks\SettingsCallbacks $controller
 */
defined('ABSPATH') || exit; ?>
<div class="jli-stepper-panel --final" data-step-id="8">
    <div class="jli-stepper-panel-inner">

        <h2><?php echo esc_html($data['title'] ?? 'Congratulations!') ?></h2>

        <p><?php esc_html_e('Your table of contents is now ready! You will be able to fine-tune more options after you close this panel.', 'joli-table-of-contents'); ?></p>

        <?php if(jtoc_xy()->is_free_plan()) : ?>
        <div class="joli-pro-card">

            <h3 style="margin-top: 0;">
                <?php wp_kses(include JTOC()->path('assets/public/icons/sparkles.svg'), jtoc_kses_lucide_svg()); ?>
                <?php esc_html_e('Unlock more features with Pro', 'joli-table-of-contents'); ?>
            </h3>

            <ul class="joli-pro-features">
                <li><?php esc_html_e('Extra Premium Themes', 'joli-table-of-contents'); ?></li>
                <li><?php esc_html_e('Sticky Table of Contents', 'joli-table-of-contents'); ?></li>
                <li><?php esc_html_e('Collapsible headings', 'joli-table-of-contents'); ?></li>
                <li><?php esc_html_e('Floating / Slide-out / Timeline TOC', 'joli-table-of-contents'); ?></li>
                <li><?php esc_html_e('Top level headings styles', 'joli-table-of-contents'); ?></li>
            </ul>

            <div class="jli-flex jli-justify-center">

                <a class="jli-button jli-button-fuzzy jli-button-md"
                    href="https://wpjoli.com/joli-table-of-contents"
                    target="_blank">

                    <?php esc_html_e('Upgrade to Pro', 'joli-table-of-contents'); ?>
                </a>
            </div>

        </div>
        <?php endif; ?>

        <p><?php esc_html_e('Close this panel to save your settings now.', 'joli-table-of-contents'); ?></p>
        <div>
            <button type="button" id="jli-onboarding-close" class="jli-button jli-button-md" style="min-width:120px;">
                <?php esc_html_e('Close', 'joli-table-of-contents'); ?>
            </button>
        </div>

    </div>
</div>
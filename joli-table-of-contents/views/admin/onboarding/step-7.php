<?php

/**
 * Plugin settings
 *
 * @package joli-table-of-contents
 * 
 * @var WPJoli\JoliTOC\Controllers\Callbacks\SettingsCallbacks $controller
 */
defined('ABSPATH') || exit; ?>
<div class="jli-stepper-panel step-7" data-step-id="7">
    <div class="jli-stepper-panel-inner">
        <h2><?php echo esc_html($data['title']) ?></h2>
        <p>
            <?php esc_html_e('Adjust the table of contents depth and numeration.', 'joli-table-of-contents') ?>
        </p>

        <!-- <hr style="width: 280px;" /> -->

        <div style="width: 600px;background-color: #f7f7f7;border-radius: 8px;border: 1px solid #80808020;margin-bottom: 12px;display: flex;justify-content: center;">
            <div style="display: grid;grid-template-columns: 1fr auto;gap: 0.5rem 2rem;align-items: baseline;padding-inline: 20px;">
                <!-- Use recommended settings -->
                <div>
                    <p><span class="jli-text-base jli-font-semibold"><?php esc_html_e('Use recommended UX settings', 'joli-table-of-contents') ?>:</span></p>
                </div>
                <?php $controller->displayInput($data['fields']['recommended_settings']['args'], $data['fields']['recommended_settings']['data']); ?>
            </div>
        </div>

        <div style=" max-width: 520px; margin-bottom: 24px;"> <!-- Recommended settings description -->
            <p>
                <?php esc_html_e('The recommended UX settings include the following options:', 'joli-table-of-contents') ?>
            </p>
            <!-- 	
        • Heading full row clickable: Make the blank space on the same row of the heading clickable
        • Animate on fold: The TOC will fold with a nice animation
        • Header as toggle: A click anywhere on the TOC header will fold/expand the TOC
        -->
            <ul style="list-style-type: disc; padding-left: 20px;">
                <li>
                    <span class="jli-text-sm jli-font-semibold"><?php esc_html_e('Header as toggle', 'joli-table-of-contents') ?></span>
                    <span class="joli-field-info dashicons dashicons-info-outline"></span>
                    <div class="joli-info-bubble"><?php esc_html_e('A click anywhere on the TOC header will fold/expand the TOC', 'joli-table-of-contents') ?></div>
                </li>
                <li>
                    <span class="jli-text-sm jli-font-semibold"><?php esc_html_e('TOC animation', 'joli-table-of-contents') ?></span>
                    <span class="joli-field-info dashicons dashicons-info-outline"></span>
                    <div class="joli-info-bubble"><?php esc_html_e('The TOC will fold with a nice animation', 'joli-table-of-contents') ?></div>
                </li>
                <li>
                    <span class="jli-text-sm jli-font-semibold"><?php esc_html_e('Headings full row clickable', 'joli-table-of-contents') ?></span>
                    <span class="joli-field-info dashicons dashicons-info-outline"></span>
                    <div class="joli-info-bubble"><?php esc_html_e('Make the blank space on the same row of the heading link clickable', 'joli-table-of-contents') ?></div>
                </li>
            </ul>
        </div>

        <!-- <hr style="width: 280px;" /> -->

        <div style="width: 600px;background-color: #f7f7f7;border-radius: 8px;border: 1px solid #80808020;margin-bottom: 12px;display: flex;justify-content: center;">
            <div style="display: grid;grid-template-columns: 1fr auto;gap: 0.5rem 2rem;align-items: baseline;padding-inline: 20px;">
                <!-- Headings scope -->
                <div>
                    <p><span class="jli-text-base jli-font-semibold"><?php esc_html_e('Headings lookup scope', 'joli-table-of-contents') ?>:</span></p>
                </div>
                <?php $controller->displayInput($data['fields']['headings_scope']['args'], $data['fields']['headings_scope']['data']); ?>
            </div>
        </div>

        <div style=" max-width: 520px; margin-bottom: 24px;">
            <!-- Content mode -->
            <p>
                <span class="jli-text-base jli-font-semibold"><?php esc_html_e('Content', 'joli-table-of-contents') ?>:</span>
                <?php esc_html_e('Include headings present in the editor only (the content you write in the editor).', 'joli-table-of-contents') ?>
            </p>

            <!-- Extended mode -->
            <p>
                <span class="jli-text-base jli-font-semibold"><?php esc_html_e('Extended', 'joli-table-of-contents') ?>:</span>
                <?php esc_html_e('Include all headings available in the rendered article (including headings rendered by 3rd party shortcodes).', 'joli-table-of-contents') ?>
            </p>
        </div>
    </div>

</div>
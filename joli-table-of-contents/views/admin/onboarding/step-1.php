<?php

/**
 * Plugin settings
 *
 * @package joli-table-of-contents
 * 
 * @var WPJoli\JoliTOC\Controllers\Callbacks\SettingsCallbacks $controller
 */
defined('ABSPATH') || exit; ?>
<div class="jli-stepper-panel" data-step-id="1">
    <div class="jli-stepper-panel-inner">
    <h2><?php echo esc_html($data['title']) ?></h2>
    <p>
        <?php esc_html_e( 'Choose how you want to insert the table of contents.', 'joli-table-of-contents' ); ?>
    </p>

    <div>
        <?php
        JTOC()->render(
            ['admin/components' => 'card-options'],
            [
                'name'    => 'jtoc_onboarding[insertion]',
                'value'   => 'auto',

                'options' => [
                    'auto' => [
                        'title'       => __('Automatically', 'joli-table-of-contents'),
                        'description' => __('Insert the table of contents automatically in your posts', 'joli-table-of-contents'),
                        'icon'       => '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wand-sparkles-icon lucide-wand-sparkles"><path d="m21.64 3.64-1.28-1.28a1.21 1.21 0 0 0-1.72 0L2.36 18.64a1.21 1.21 0 0 0 0 1.72l1.28 1.28a1.2 1.2 0 0 0 1.72 0L21.64 5.36a1.2 1.2 0 0 0 0-1.72"/><path d="m14 7 3 3"/><path d="M5 6v4"/><path d="M19 14v4"/><path d="M10 2v2"/><path d="M7 8H3"/><path d="M21 16h-4"/><path d="M11 3H9"/></svg>',
                        'contextual'  => function () {
                        ?>
                            <p>
                                <?php printf(
                                    esc_html__(
                                        __('The auto-insert feature %sdoes not alter your posts%s and can be switched off at any time.', 'joli-table-of-contents')
                                    ),
                                    '<span class="jli-text-accent">',
                                    '</span>'
                                ); ?>
                            </p>

                            <p>
                                <?php esc_html_e('The auto-insert position can be changed later in the settings.', 'joli-table-of-contents'); ?>
                            </p>
                        <?php
                        },
                    ],

                    'manual' => [
                        'title'       => __('Manually', 'joli-table-of-contents'),
                        'description' => __('Use the shortcode or the Block to insert the table of contents manually', 'joli-table-of-contents'),
                        'icon'       => '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-between-horizontal-start-icon lucide-between-horizontal-start"><rect width="13" height="7" x="8" y="3" rx="1"/><path d="m2 9 3 3-3 3"/><rect width="13" height="7" x="8" y="14" rx="1"/></svg>',
                        'contextual'  => function () {
                        ?>
                            <p>
                                <?php
                                            /* translators: 1: opening span, 2: closing span, 3: opening code, 4: closing code */
                                            printf(
                                                wp_kses_post(
                                                    __('You %1$sneed%2$s to use the %3$s[joli-toc]%4$s shortcode or the Joli Table of Contents Block %1$sin order to see the table of contents in your posts%2$s.', 'joli-table-of-contents')
                                                ),
                                                '<span class="jli-text-accent">',
                                                '</span>',
                                                '<code>',
                                                '</code>'
                                            );
                                ?>
                            </p>
                            <p><?php esc_html_e('The manual insertion feature allows you to insert the table of contents at any location in your posts.', 'joli-table-of-contents'); ?></p>
                            <p><?php esc_html_e('When using the Block, you can edit or hide specific headings.', 'joli-table-of-contents'); ?></p>
                        <?php
                        },
                    ],
                ],
            ]
        );

        ?>

    </div>
    </div>

</div>
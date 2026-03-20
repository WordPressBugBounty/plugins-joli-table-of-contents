<?php

/**
 * Plugin settings
 *
 * @package joli-table-of-contents
 * 
 * @var WPJoli\JoliTOC\Controllers\Callbacks\SettingsCallbacks $controller
 */
defined('ABSPATH') || exit; ?>
<div class="jli-stepper-panel" data-step-id="2">
    <div class="jli-stepper-panel-inner">
        <h2><?php echo esc_html($data['title']) ?></h2>
        <!-- <p>
        This is a step-by-step guide to help you get started with Joli Table of Contents.
    </p> -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem 2rem; max-width: 400px; margin-bottom: 24px;align-items: baseline;">
            <!-- Headings numeration -->
            <div>
                <p><span class="jli-text-base jli-font-semibold"><?php esc_html_e('Dark mode', 'joli-table-of-contents') ?>:</span></p>
            </div>
            <?php $controller->displayInput($data['fields']['theme_dark_mode']['args'], $data['fields']['theme_dark_mode']['data']); ?>
        </div>
        <div>
            <div class="jli-card-options--themes">
                <?php
                function jtoc_get_pro_theme_image($name)
                {
                    if (jtoc_xy()->is_free_plan()) {
                        return 'https://wpjoli.com/resources/joli-table-of-contents/' . $name . '.webp';
                    }
                    return JTOC()->url('assets/admin/img/themes/' . $name . '.webp');
                }

                $pro_item = jtoc_xy()->is_free_plan() ? 'joli-pro' : '';
                JTOC()->render(
                    ['admin/components' => 'card-options'],
                    [
                        'name'    => 'jtoc_onboarding[theme]',
                        'value'   => 'default-v3',

                        'options' => [
                            'default-v3' => [
                                'title'       => __('Default (v3)', 'joli-table-of-contents'),
                                'description' => __('A simple yet highly customizable theme', 'joli-table-of-contents'),
                                'image'       => JTOC()->url('assets/admin/img/themes/default-v3.webp'),
                                'contextual'  => function () {
                ?>
                    <p>
                        <?php esc_html_e('This is the new default theme since the last major update.', 'joli-table-of-contents'); ?>
                    </p>
                <?php
                                },
                            ],
                            'original-v3' => [
                                'title'       => __('Original', 'joli-table-of-contents'),
                                'description' => __('The original theme', 'joli-table-of-contents'),
                                'image'       => JTOC()->url('assets/admin/img/themes/original-v3.webp'),
                                'contextual'  => function () {
                ?>
                    <p>
                        <?php esc_html_e('This is the original theme, now updated to v3 standards and with variations.', 'joli-table-of-contents'); ?>
                    </p>
                <?php
                                },
                            ],
                            // hero
                            'hero' => [
                                'title'       => __('Hero', 'joli-table-of-contents'),
                                'description' => __('A new modern looking theme', 'joli-table-of-contents'),
                                'image'       => JTOC()->url('assets/admin/img/themes/hero.webp'),
                                'contextual'  => function () {
                ?>
                    <p>
                        <?php esc_html_e('This new theme provides modern aesthetics.', 'joli-table-of-contents'); ?>
                    </p>
                <?php
                                },
                            ],
                            // Flowline
                            'flowline' => [
                                'title'       => __('Flowline', 'joli-table-of-contents'),
                                'class'       => $pro_item,
                                'description' => __('A new modern looking theme', 'joli-table-of-contents'),
                                'image'       => jtoc_get_pro_theme_image('flowline'),
                                'contextual'  => function () {
                ?>
                    <p>
                        <?php esc_html_e('This theme provides a choice of various indicators for the active heading. It is ideal for a fixed sidebar placement.', 'joli-table-of-contents'); ?>
                    </p>
                <?php
                                },
                            ],

                            // Vertik
                            'vertik-v3' => [
                                'title'       => __('Vertik', 'joli-table-of-contents'),
                                'class'       => $pro_item,
                                'description' => __('A theme with a vertical header', 'joli-table-of-contents'),
                                'image'       => jtoc_get_pro_theme_image('vertik-v3'),
                                'contextual'  => function () {
                ?>
                    <p>
                        <?php esc_html_e('A sharp looking theme with a vertical header.', 'joli-table-of-contents'); ?>
                    </p>
                <?php
                                },
                            ],

                            // Aurora
                            'aurora' => [
                                'title'       => __('Aurora', 'joli-table-of-contents'),
                                'class'       => $pro_item,
                                'description' => __('A colorful theme', 'joli-table-of-contents'),
                                'image'       => jtoc_get_pro_theme_image('aurora'),
                                'contextual'  => function () {
                ?>
                    <p>
                        <?php esc_html_e('A colorful theme that catches the eye. It comes with multiple color schemes.', 'joli-table-of-contents'); ?>
                    </p>
                <?php
                                },
                            ],

                            // Modern v3
                            'modern-v3' => [
                                'title'       => __('Modern', 'joli-table-of-contents'),
                                'class'       => $pro_item,
                                'description' => __('A new modern looking theme', 'joli-table-of-contents'),
                                'image'       => jtoc_get_pro_theme_image('modern-v3'),
                                'contextual'  => function () {
                ?>
                    <p>
                        <?php esc_html_e('This theme is ideal for a fixed sidebar placement.', 'joli-table-of-contents'); ?>
                    </p>
                <?php
                                },
                            ],

                            // Mantis
                            'mantis' => [
                                'title'       => __('Mantis', 'joli-table-of-contents'),
                                'class'       => $pro_item,
                                'description' => __('A new modern looking theme', 'joli-table-of-contents'),
                                'image'       => jtoc_get_pro_theme_image('mantis'),
                                'contextual'  => function () {
                ?>
                    <p>
                        <?php esc_html_e('This theme is ideal for a fixed sidebar placement.', 'joli-table-of-contents'); ?>
                    </p>
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

</div>
<?php
return [
    'groups' => [
        [
            'step' => 1,
            'fields' => ['insertion'],
        ],
        [
            'step' => 2,
            'fields' => ['theme', 'theme_dark_mode'],
        ],
        [
            'step' => 3,
            'fields' => ['color_background', 'color_text', 'color_accent'],
        ],
        [
            'step' => 4,
            'fields' => ['toc_icon', 'toc_title'],
        ],
        [
            'step' => 5,
            'fields' => ['text_size', 'text_spacing'],
        ],
        [
            'step' => 6,
            'fields' => ['depth', 'numeration'],
        ],
        [
            'step' => 7,
            'fields' => ['recommended_settings', 'headings_scope'],
        ],
    ],
    'fields' => [

        // STEP 1 --------------------------------------------------------------
        'insertion' => [
            'default' => 'auto',
            'value'   => 'auto', // auto or manual
            'mapping' => [ // if "result" equals "value", we apply the "settings"

                // auto
                [
                    'result'   => 'auto',
                    'settings' => [
                        [
                            'field' => 'auto_insert_post_types',
                            'subfield' => '[]',
                            'type'  => 'checkboxes',
                            'value' => ['post', 'page'],
                        ],
                    ],
                ],

                // manual
                [
                    'result'   => 'manual',
                    'settings' => [
                        [
                            'field' => 'auto_insert_post_types',
                            'subfield' => '[]',
                            'type'  => 'checkboxes',
                            'value' => [], // make sure this is empty to deactivate auto insert
                        ],
                    ],
                ],
            ],
        ],

        // STEP 2 --------------------------------------------------------------
        'theme' => [
            'default' => 'basic-light',
            'value'   => 'basic-light',
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => '{value}',
                    'settings' => [
                        [
                            'field' => 'theme',
                            'type' => 'select',
                            'value' => '{value}',
                        ],
                    ],
                ],
            ],
        ],

        'theme_dark_mode' => [
            'default' => '0',
            'value'   => '0',
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => '0',
                    'settings' => [
                        [
                            'field' => 'theme_dark_mode',
                            'type' => 'switch',
                            'value' => '0',
                        ],
                    ],
                ],
                [
                    'result'   => '1',
                    'settings' => [
                        [
                            'field' => 'theme_dark_mode',
                            'type' => 'switch',
                            'value' => '1',
                        ],
                    ],
                ],
            ],
        ],

        'color_background' => [
            'default' => null, // Keep theme colors
            'value'   => null,
            'mapping' => [
                [
                    'result'   => '{value}',
                    'settings' => [
                        [
                            'field' => 'color_palette_1',
                            'type' => 'color',
                            'value' => '{value}',
                        ],
                    ],
                ],
            ],
        ],

        'color_text' => [
            'default' => null, // Keep theme colors
            'value'   => null,
            'mapping' => [
                [
                    'result'   => '{value}',
                    'settings' => [
                        [
                            'field' => 'color_palette_2',
                            'type' => 'color',
                            'value' => '{value}',
                        ],
                    ],
                ],
            ],
        ],

        'color_accent' => [
            'default' => null, // Keep theme colors
            'value'   => null,
            'mapping' => [
                [
                    'result'   => '{value}',
                    'settings' => [
                        [
                            'field' => 'color_palette_3',
                            'type' => 'color',
                            'value' => '{value}',
                        ],
                    ],
                ],
            ],
        ],

        // document.querySelector( 'input[name="jtoc_onboarding[toc_icon][icon]"]:checked' )
        'toc_icon' => [
            'default'     => 'book-text',
            'value'       => 'book-text',
            'valueOffset' => 'icon',
            // 'type'        => 'radio',
            'mapping'     => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => 'none',
                    'settings' => [
                        [
                            'field' => 'use_toc_title_icon',
                            'type' => 'switch',
                            'value' => '0',
                        ],
                    ],
                ],

                [
                    'result'   => '{value}',
                    'settings' => [
                        [
                            'field' => 'use_toc_title_icon',
                            'type' => 'switch',
                            'value' => '1',
                        ],
                        [
                            'field' => 'toc_title_icon',
                            'subfield' => '[icon]',
                            'type' => 'radio',
                            'value' => '{value}',
                            // value: {
                            //     "icon": "{value}",
                            //     "stroke_width": 2,
                            //     "size": 16,
                            //     "color": null,
                            // }
                        ],
                    ],
                ],
            ],
        ],

        'toc_title' => [
            'default' => 'Table of Contents',
            'value'   => 'Table of Contents',
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => '{value}',
                    'settings' => [
                        [
                            'field' => 'toc_title',
                            'value' => '{value}',
                        ],
                    ],
                ],
            ],
        ],

        'text_size' => [
            'default' => 's',
            'value'   => 's',
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => 'xs',
                    'settings' => [
                        [
                            'field' => 'headings_link_font_size',
                            'value' => '0.75|em',
                        ],
                    ],
                ],
                [
                    'result'   => 's',
                    'settings' => [
                        [
                            // 'field' => 'headings_link_font_size',
                            'field' => 'headings_link_font_size',
                            'type' => 'unit',
                            'value' => '0.875|em',
                        ],
                    ],
                ],
                [
                    'result'   => 'm',
                    'settings' => [
                        [
                            'field' => 'headings_link_font_size',
                            'type' => 'unit',
                            'value' => '1|em',
                        ],
                    ],
                ],
                [
                    'result'   => 'l',
                    'settings' => [
                        [
                            'field' => 'headings_link_font_size',
                            'type' => 'unit',
                            'value' => '1.125|em',
                        ],
                    ],
                ],
                [
                    'result'   => 'xl',
                    'settings' => [
                        [
                            'field' => 'headings_link_font_size',
                            'type' => 'unit',
                            'value' => '1.25|em',
                        ],
                    ],
                ],
            ],
        ],

        'text_spacing' => [
            'default' => 16,
            'value'   => 16,
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => 'xxs',
                    'settings' => [
                        [
                            'field' => 'headings_margin',
                            'subfield' => '[dim][bottom]',
                            'value' => '0',
                        ],
                        [
                            'field' => 'headings_margin',
                            'subfield' => '[unit]',
                            'type' => 'select',
                            'value' => 'em',
                        ],
                    ],
                ],
                [
                    'result'   => 'xs',
                    'settings' => [
                        [
                            'field' => 'headings_margin',
                            'subfield' => '[dim][bottom]',
                            'value' => '0.25',
                        ],
                        [
                            'field' => 'headings_margin',
                            'subfield' => '[unit]',
                            'type' => 'select',
                            'value' => 'em',
                        ],
                    ],
                ],
                [
                    'result'   => 's',
                    'settings' => [
                        [
                            'field' => 'headings_margin',
                            'subfield' => '[dim][bottom]',
                            'value' => '0.5',
                        ],
                        [
                            'field' => 'headings_margin',
                            'subfield' => '[unit]',
                            'type' => 'select',
                            'value' => 'em',
                        ],
                    ],
                ],
                [
                    'result'   => 'm',
                    'settings' => [
                        [
                            'field' => 'headings_margin',
                            'subfield' => '[dim][bottom]',
                            'value' => '0.75',
                        ],
                        [
                            'field' => 'headings_margin',
                            'subfield' => '[unit]',
                            'type' => 'select',
                            'value' => 'em',
                        ],
                    ],
                ],
                [
                    'result'   => 'l',
                    'settings' => [
                        [
                            'field' => 'headings_margin',
                            'subfield' => '[dim][bottom]',
                            'value' => '1',
                        ],
                        [
                            'field' => 'headings_margin',
                            'subfield' => '[unit]',
                            'type' => 'select',
                            'value' => 'em',
                        ],
                    ],
                ],
                [
                    'result'   => 'xl',
                    'settings' => [
                        [
                            'field' => 'headings_margin',
                            'subfield' => '[dim][bottom]',
                            'value' => '1.25',
                        ],
                        [
                            'field' => 'headings_margin',
                            'subfield' => '[unit]',
                            'type' => 'select',
                            'value' => 'em',
                        ],
                    ],
                ],
            ],
        ],
        'depth' => [
            'default' => '3',
            'value'   => '3',
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => '2',
                    'settings' => [
                        [
                            'type' => 'checkboxes',
                            'field' => 'headings_depth',
                            'selector' => '[name="jli-checkboxes-headings_depth[]"]',
                            'subfield' => '[]',
                            'value' => ['h2'],
                        ],
                    ],
                ],
                [
                    'result'   => '3',
                    'settings' => [
                        [
                            'type' => 'checkboxes',
                            'field' => 'headings_depth',
                            'selector' => '[name="jli-checkboxes-headings_depth[]"]',
                            'subfield' => '[]',
                            'value' => ['h2', 'h3'],
                        ],
                    ],
                ],
                [
                    'result'   => '4',
                    'settings' => [
                        [
                            'type' => 'checkboxes',
                            'field' => 'headings_depth',
                            'selector' => '[name="jli-checkboxes-headings_depth[]"]',
                            'subfield' => '[]',
                            'value' => ['h2', 'h3', 'h4'],
                        ],
                    ],
                ],
                [
                    'result'   => '5',
                    'settings' => [
                        [
                            'type' => 'checkboxes',
                            'field' => 'headings_depth',
                            'selector' => '[name="jli-checkboxes-headings_depth[]"]',
                            'subfield' => '[]',
                            'value' => ['h2', 'h3', 'h4', 'h5'],
                        ],
                    ],
                ],
                [
                    'result'   => '6',
                    'settings' => [
                        [
                            'type' => 'checkboxes',
                            'field' => 'headings_depth',
                            'selector' => '[name="jli-checkboxes-headings_depth[]"]',
                            'subfield' => '[]',
                            'value' => ['h2', 'h3', 'h4', 'h5', 'h6'],
                        ],
                    ],
                ],
            ],
        ],
        // 'numeration' => [
        //     'default' => '1',
        //     'value'   => '1',
        //     'mapping' => [ // if "result" equals "value", we apply the "settings"
        //         [
        //             'result'   => '0',
        //             'settings' => [
        //                 [
        //                     'field' => 'numeration_type',
        //                     'type' => 'select',
        //                     'value' => 'none',
        //                 ],
        //             ],
        //         ],
        //         [
        //             'result'   => '1',
        //             'settings' => [
        //                 [
        //                     'field' => 'numeration_type',
        //                     'type' => 'select',
        //                     'value' => 'numbers',
        //                 ],
        //                 [
        //                     'field' => 'numeration_display',
        //                     'type' => 'select',
        //                     'value' => 'full',
        //                 ],
        //             ],
        //         ],
        //     ],
        // ],
        'numeration' => [
            'type'    => 'slider',
            'default' => 'decimal',
            'value'   => 'decimal',
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                // none
                [
                    'result'   => 'none',
                    'settings' => [
                        [
                            'field' => 'numeration_type',
                            'type' => 'select',
                            'value' => 'none',
                        ],
                    ],
                ],
                // decimal
                [
                    'result'   => 'decimal',
                    'settings' => [
                        [
                            'field' => 'numeration_type',
                            'type' => 'select',
                            'value' => 'decimal',
                        ],
                        [
                            'field' => 'numeration_display',
                            'type' => 'select',
                            'value' => 'full',
                        ],
                        [
                            'field' => 'numeration_style',
                            'type' => 'radio',
                            'value' => 'plain',
                        ],
                    ],
                ],
                // badge (decimal with badge)
                [
                    'result'   => 'badge',
                    'settings' => [
                        [
                            'field' => 'numeration_type',
                            'type' => 'select',
                            'value' => 'decimal',
                        ],
                        [
                            'field' => 'numeration_display',
                            'type' => 'select',
                            'value' => 'full',
                        ],
                        [
                            'field' => 'numeration_style',
                            'type' => 'radio',
                            'value' => 'badge',
                        ],
                    ],
                ],
            ],
        ],
        'recommended_settings' => [
            'default' => '1',
            'value'   => '1',
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => '0',
                    'settings' => [
                        [
                            'field' => 'header_as_toggle',
                            'type' => 'switch',
                            'value' => '0',
                        ],
                        [
                            'field' => 'animate_on_fold',
                            'type' => 'switch',
                            'value' => '0',
                        ],
                        [
                            'field' => 'headings_full_row_clickable',
                            'type' => 'switch',
                            'value' => '0',
                        ],
                    ],
                ],
                [
                    'result'   => '1',
                    'settings' => [
                        [
                            'field' => 'header_as_toggle',
                            'type' => 'switch',
                            'value' => '1',
                        ],
                        [
                            'field' => 'animate_on_fold',
                            'type' => 'switch',
                            'value' => '1',
                        ],
                        [
                            'field' => 'headings_full_row_clickable',
                            'type' => 'switch',
                            'value' => '1',
                        ],
                    ],
                ],
            ],
        ],
        'headings_scope' => [
            'default' => 'content',
            'value'   => 'content',
            // 'type' => 'radio', // This needs to be here as well
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => 'content',
                    'settings' => [
                        [
                            'field' => 'headings_scope',
                            'type' => 'radio',
                            'value' => 'content',
                        ],
                    ],
                ],
                [
                    'result'   => 'extended',
                    'settings' => [
                        [
                            'field' => 'headings_scope',
                            'type' => 'radio',
                            'value' => 'extended',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

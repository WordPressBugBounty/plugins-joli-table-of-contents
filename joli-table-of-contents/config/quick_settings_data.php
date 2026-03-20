<?php
return [
    'fields' => [

        // 'color_background' => [
        //     'default' => null, // Keep theme colors
        //     'value'   => null,
        //     'mapping' => [
        //         [
        //             'result'   => '{value}',
        //             'settings' => [
        //                 [
        //                     'field' => 'color_palette_1',
        //                     'type' => 'color',
        //                     'value' => '{value}',
        //                 ],
        //             ],
        //         ],
        //     ],
        // ],

        // 'color_text' => [
        //     'default' => null, // Keep theme colors
        //     'value'   => null,
        //     'mapping' => [
        //         [
        //             'result'   => '{value}',
        //             'settings' => [
        //                 [
        //                     'field' => 'color_palette_2',
        //                     'type' => 'color',
        //                     'value' => '{value}',
        //                 ],
        //             ],
        //         ],
        //     ],
        // ],

        // 'color_accent' => [
        //     'default' => null, // Keep theme colors
        //     'value'   => null,
        //     'mapping' => [
        //         [
        //             'result'   => '{value}',
        //             'settings' => [
        //                 [
        //                     'field' => 'color_palette_3',
        //                     'type' => 'color',
        //                     'value' => '{value}',
        //                 ],
        //             ],
        //         ],
        //     ],
        // ],

        // document.querySelector( 'input[name="jtoc_onboarding[toc_icon][icon]"]:checked' )
        'toc_icon' => [
            'default'     => 'book-text',
            'value'       => 'book-text',
            'valueOffset' => 'icon',
            'type'        => 'radio',
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
                            // 'selector' => '#joli_table_of_contents_settings\\[use_toc_title_icon\\]',
                            'value' => '1',
                        ],
                        [
                            'field' => 'toc_title_icon',
                            'subfield' => '[icon]',
                            'type' => 'radio',
                            'value' => '{value}',
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
            'type'    => 'slider',
            'default' => 's',
            'value'   => 's',
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => '', //auto
                    'settings' => [
                        [
                            'field' => 'headings_link_font_size',
                            'value' => '|em',
                        ],
                    ],
                ],
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

        'title_size' => [
            'type'    => 'slider',
            'default' => 'm',
            'value'   => 'm',
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => '',
                    'settings' => [
                        [
                            'field' => 'toc_title_font_size',
                            'type' => 'unit',
                            'value' => '|em',
                        ],
                    ],
                ],
                [
                    'result'   => 'xs',
                    'settings' => [
                        [
                            'field' => 'toc_title_font_size',
                            'type' => 'unit',
                            'value' => '0.75|em',
                        ],
                    ],
                ],
                [
                    'result'   => 's',
                    'settings' => [
                        [
                            // 'field' => 'toc_title_font_size',
                            'field' => 'toc_title_font_size',
                            'type' => 'unit',
                            'value' => '0.875|em',
                        ],
                    ],
                ],
                [
                    'result'   => 'm',
                    'settings' => [
                        [
                            'field' => 'toc_title_font_size',
                            'type' => 'unit',
                            'value' => '1|em',
                        ],
                    ],
                ],
                [
                    'result'   => 'l',
                    'settings' => [
                        [
                            'field' => 'toc_title_font_size',
                            'type' => 'unit',
                            'value' => '1.125|em',
                        ],
                    ],
                ],
                [
                    'result'   => 'xl',
                    'settings' => [
                        [
                            'field' => 'toc_title_font_size',
                            'type' => 'unit',
                            'value' => '1.25|em',
                        ],
                    ],
                ],
            ],
        ],

        'text_spacing' => [
            'type'    => 'slider',
            'default' => 16,
            'value'   => 16,
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => '',
                    'settings' => [
                        [
                            'field' => 'headings_margin',
                            'subfield' => '[dim][bottom]',
                            'value' => '',
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
            'type'    => 'slider',
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
                        // [
                        //     'field' => 'numeration_suffix',
                        //     'value' => '.',
                        // ],
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
                        // [
                        //     'field' => 'numeration_suffix',
                        //     'value' => '',
                        // ],
                    ],
                ],
            ],
        ],
        'toc_alignment' => [
            'type'    => 'slider',
            'default' => 'left',
            'value'   => 'left',
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => 'left',
                    'settings' => [
                        [
                            'field' => 'toc_alignment',
                            'type' => 'radio',
                            'value' => 'left',
                        ],
                        [
                            'field' => 'toc_width_incontent',
                            'type' => 'select',
                            'value' => 'width-auto',
                        ],
                    ],
                ],
                [
                    'result'   => 'center',
                    'settings' => [
                        [
                            'field' => 'toc_alignment',
                            'type' => 'radio',
                            'value' => 'center',
                        ],
                        [
                            'field' => 'toc_width_incontent',
                            'type' => 'select',
                            'value' => 'width-auto',
                        ],
                    ],
                ],
                [
                    'result'   => 'right',
                    'settings' => [
                        [
                            'field' => 'toc_alignment',
                            'type' => 'radio',
                            'value' => 'right',
                        ],
                        [
                            'field' => 'toc_width_incontent',
                            'type' => 'select',
                            'value' => 'width-auto',
                        ],
                    ],
                ],
                [
                    'result'   => 'full',
                    'settings' => [
                        [
                            'field' => 'toc_alignment',
                            'type' => 'radio',
                            'value' => 'left',
                        ],
                        [
                            'field' => 'toc_width_incontent',
                            'type' => 'select',
                            'value' => 'width-100',
                        ],
                    ],
                ]
            ],
        ],
        'rounded_corners' => [
            'type'    => 'slider',
            'default' => 'none',
            'value'   => 'none',
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => '',
                    'settings' => [
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][top-left]',
                            'value' => '',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][top-right]',
                            'value' => '',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][bottom-right]',
                            'value' => '',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][bottom-left]',
                            'value' => '',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[unit]',
                            'type' => 'select',
                            'value' => 'em',
                        ],
                    ],
                ],
                [
                    'result'   => 'none',
                    'settings' => [
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][top-left]',
                            'value' => '0',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][top-right]',
                            'value' => '0',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][bottom-right]',
                            'value' => '0',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][bottom-left]',
                            'value' => '0',
                        ],
                        [
                            'field' => 'toc_border_radius',
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
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][top-left]',
                            'value' => '0.25',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][top-right]',
                            'value' => '0.25',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][bottom-right]',
                            'value' => '0.25',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][bottom-left]',
                            'value' => '0.25',
                        ],
                        [
                            'field' => 'toc_border_radius',
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
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][top-left]',
                            'value' => '0.5',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][top-right]',
                            'value' => '0.5',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][bottom-right]',
                            'value' => '0.5',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][bottom-left]',
                            'value' => '0.5',
                        ],
                        [
                            'field' => 'toc_border_radius',
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
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][top-left]',
                            'value' => '0.75',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][top-right]',
                            'value' => '0.75',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][bottom-right]',
                            'value' => '0.75',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[dim][bottom-left]',
                            'value' => '0.75',
                        ],
                        [
                            'field' => 'toc_border_radius',
                            'subfield' => '[unit]',
                            'type' => 'select',
                            'value' => 'em',
                        ],
                    ],
                ],
            ],
        ],
        'border' => [
            'type'    => 'slider',
            'default' => 'none',
            'value'   => 'none',
            'mapping' => [ // if "result" equals "value", we apply the "settings"
                [
                    'result'   => '',
                    'settings' => [
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][top]',
                            'value' => '',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][right]',
                            'value' => '',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][bottom]',
                            'value' => '',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][left]',
                            'value' => '',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[unit]',
                            'type' => 'select',
                            'value' => 'em',
                        ],
                    ],
                ],
                [
                    'result'   => 'none',
                    'settings' => [
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][top]',
                            'value' => '',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][right]',
                            'value' => '',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][bottom]',
                            'value' => '',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][left]',
                            'value' => '',
                        ],
                        [
                            'field' => 'toc_border',
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
                            'field' => 'toc_border',
                            'subfield' => '[dim][top]',
                            'value' => '1',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][right]',
                            'value' => '1',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][bottom]',
                            'value' => '1',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][left]',
                            'value' => '1',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[unit]',
                            'type' => 'select',
                            'value' => 'px',
                        ],
                    ],
                ],
                [
                    'result'   => 'm',
                    'settings' => [
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][top]',
                            'value' => '2',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][right]',
                            'value' => '2',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][bottom]',
                            'value' => '2',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][left]',
                            'value' => '2',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[unit]',
                            'type' => 'select',
                            'value' => 'px',
                        ],
                    ],
                ],
                [
                    'result'   => 'l',
                    'settings' => [
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][top]',
                            'value' => '3',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][right]',
                            'value' => '3',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][bottom]',
                            'value' => '3',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[dim][left]',
                            'value' => '3',
                        ],
                        [
                            'field' => 'toc_border',
                            'subfield' => '[unit]',
                            'type' => 'select',
                            'value' => 'px',
                        ],
                    ],
                ],
            ],
        ],
        'toc_toggle' => [
            'type'    => 'select',
            'default' => 'default',
            'value'   => 'default',
            'mapping' => [
                // 'none'
                [
                    'result'   => 'none',
                    'settings' => [
                        [
                            'field' => 'show_toggle',
                            'type' => 'switch',
                            'value' => '0',
                        ],
                    ],
                ],
                // 'text'
                [
                    'result'   => 'text',
                    'settings' => [
                        [
                            'field' => 'show_toggle',
                            'type' => 'switch',
                            'value' => '1',
                        ],
                        [
                            'field' => 'toggle_type',
                            'type' => 'select',
                            'value' => 'text',
                        ],
                    ],
                ],
                // 'default' 
                [
                    'result'   => 'default',
                    'settings' => [
                        [
                            'field' => 'show_toggle',
                            'type' => 'switch',
                            'value' => '1',
                        ],
                        [
                            'field' => 'toggle_type',
                            'type' => 'select',
                            'value' => 'icon',
                        ],
                        [
                            'field' => 'toggle_style',
                            'type' => 'select',
                            'value' => 'default',
                        ],
                    ],
                ],
                // 'chiclet'
                [
                    'result'   => 'chiclet',
                    'settings' => [
                        [
                            'field' => 'show_toggle',
                            'type' => 'switch',
                            'value' => '1',
                        ],
                        [
                            'field' => 'toggle_type',
                            'type' => 'select',
                            'value' => 'icon',
                        ],
                        [
                            'field' => 'toggle_style',
                            'type' => 'select',
                            'value' => 'chiclet',
                        ],
                    ],
                ],
                // 'embossed' 
                [
                    'result'   => 'embossed',
                    'settings' => [
                        [
                            'field' => 'show_toggle',
                            'type' => 'switch',
                            'value' => '1',
                        ],
                        [
                            'field' => 'toggle_type',
                            'type' => 'select',
                            'value' => 'icon',
                        ],
                        [
                            'field' => 'toggle_style',
                            'type' => 'select',
                            'value' => 'embossed',
                        ],
                    ],
                ],
                // 'chicemb' 
                [
                    'result'   => 'chicemb',
                    'settings' => [
                        [
                            'field' => 'show_toggle',
                            'type' => 'switch',
                            'value' => '1',
                        ],
                        [
                            'field' => 'toggle_type',
                            'type' => 'select',
                            'value' => 'icon',
                        ],
                        [
                            'field' => 'toggle_style',
                            'type' => 'select',
                            'value' => 'chicemb',
                        ],
                    ],
                ],
                // 'cutout' 
                [
                    'result'   => 'cutout',
                    'settings' => [
                        [
                            'field' => 'show_toggle',
                            'type' => 'switch',
                            'value' => '1',
                        ],
                        [
                            'field' => 'toggle_type',
                            'type' => 'select',
                            'value' => 'icon',
                        ],
                        [
                            'field' => 'toggle_style',
                            'type' => 'select',
                            'value' => 'cutout',
                        ],
                    ],
                ],
            ],
        ],
    ],
];

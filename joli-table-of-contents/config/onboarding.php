<?php defined('ABSPATH') or die('Wrong path bro!');

function jtoc_onboarding_name($option)
{
    return 'jtoc_onboarding' . '[' . $option . ']';
}

return [
    // BEFORE GIT COMMENT
    'steps' => [
        // Welcome
        [
            'step' => 0,
            'name' => 'Welcome',
            'template' => 'step-0',
            'data' => [
                'title' => 'Welcome to Joli Table of Contents!',
            ]
        ],

        // $args = Array
        // (
        //     [desc] => Size of the bullet points.
        //     [values] => Array
        //         (
        //             [s] => Small
        //             [m] => Medium
        //             [l] => Large
        //             [xl] => XL
        //             [2xl] => 2XL
        //             [3xl] => 3XL
        //         )

        //     [is_global] => 
        //     [name] => joli_table_of_contents_settings[bullet_points_size_h2]
        //     [id] => bullet_points_size_h2
        //     [pro] => 
        //     [new] => 
        //     [class] => tab-bullet-points joli-field--bullet-points-size-h2
        //     [type] => slider
        //     [classes] => 
        //     [data] => 
        //     [placeholder] => 
        // )
        // $data = Array
        // (
        //     [classes] => 
        //     [data_attrs] => 
        //     [name] => joli_table_of_contents_settings[bullet_points_size_h2]
        //     [placeholder] => 
        //     [option] => bullet_points_size_h2
        //     [value] => l
        //     [is_global] => 
        //     [active_post_type] => 
        // )


        // TOC Insertion
        [
            'step' => 1,
            'name' => 'TOC Insertion',
            'template' => 'step-1', // view name from /views/admin/onboarding
            'data' => [ // data to pass to the view
                'title' => 'How should Joli TOC be inserted?',
                'fields' => [
                    // 'toc_size' => [
                    //     'args' => [
                    //         'type' => 'slider',
                    //         'name' => jtoc_onboarding_name('toc_size'),
                    //         'values' => [
                    //             's' => 'Small',
                    //             'm' => 'Medium',
                    //             'l' => 'Large',
                    //         ]
                    //     ],
                    //     'data' => [
                    //         'name' => jtoc_onboarding_name('toc_size'),
                    //         'value' => 'm', // default
                    //     ],
                    // ],
                ],
            ],
        ],

        // Visual styles
        [
            'step' => 2,
            'name' => 'Style',
            'template' => 'step-2', // view name from /views/admin/onboarding
            'data' => [ // data to pass to the view
                'title' => 'Choose a theme',
                'fields' => [
                    'theme_dark_mode' => [
                        'args' => [
                            'type' => 'switch',
                            'name' => jtoc_onboarding_name('theme_dark_mode'),
                        ],
                        'data' => [
                            'name' => jtoc_onboarding_name('theme_dark_mode'),
                            'option' => jtoc_onboarding_name('theme_dark_mode'),
                            'value' => '0', // default
                        ]
                    ]
                ],
            ],
        ],

        // Colors
        [
            'step' => 3,
            'name' => 'Colors',
            'template' => 'step-3',
            'data' => [
                'title' => 'Match your site colors',
                'fields' => [
                    'color_background' => [
                        'args' => [
                            'type' => 'color',
                            'name' => jtoc_onboarding_name('color_background'),
                        ],
                        'data' => [
                            'classes' => 'joli-color-picker',
                            'placeholder' => 'Leave empty for default',
                            'name' => jtoc_onboarding_name('color_background'),
                            'value' => '', // default
                            'data_attrs' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                'theme-palette' => 'true',
                            ],
                            'data_attrs_fn' => [WPJoli\JoliTOC\Controllers\Callbacks\SettingsCallbacks::class, 'printDataAttrs'], // printDataAttrs function from SettingsCallbacks.php
                            'theme_palette' => true, // uses theme palette for the swatches instead of the settings palette
                            // 'swatches' => false, // prevent color picker from showing palette swatches
                        ],
                    ],
                    'color_text' => [
                        'args' => [
                            'type' => 'color',
                            'name' => jtoc_onboarding_name('color_text'),
                        ],
                        'data' => [
                            'classes' => 'joli-color-picker',
                            'placeholder' => 'Leave empty for default',
                            'name' => jtoc_onboarding_name('color_text'),
                            'value' => '', // default
                            'data_attrs' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                'theme-palette' => 'true',
                            ],
                            'theme_palette' => true, // uses theme palette for the swatches instead of the settings palette
                        ],
                    ],
                    'color_accent' => [
                        'args' => [
                            'type' => 'color',
                            'name' => jtoc_onboarding_name('color_accent'),
                        ],
                        'data' => [
                            'classes' => 'joli-color-picker',
                            'placeholder' => 'Leave empty for default',
                            'name' => jtoc_onboarding_name('color_accent'),
                            'value' => '', // default
                            'data_attrs' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                'theme-palette' => 'true',
                            ],
                            'theme_palette' => true, // uses theme palette for the swatches instead of the settings palette
                        ],
                    ],
                ],
            ],
        ],

        // Title & icon
        [
            'step' => 4,
            'name' => 'Title & icon',
            'template' => 'step-4',
            'data' => [
                'title' => 'Customize the TOC header',
                'fields' => [
                    'toc_icon' => [
                        'args' => [
                            'type' => 'lucideicon',
                            'name' => jtoc_onboarding_name('toc_icon'),
                            'styles' => ':root{--toc_title_icon-stroke-width: 1px;}',
                            'path' => 'assets/public/icons',
                            // 'icons' => [
                            //     'book',
                            //     'book-text',
                            //     'book-open',
                            //     'book-open-text',
                            //     'align-left',
                            //     'grip',
                            //     'star',
                            //     'home',
                            //     'info',
                            //     'lightbulb',
                            //     'bookmark',
                            //     'megaphone',
                            //     'flame',
                            //     'newspaper',
                            //     'spotlight',
                            // ], // filters the available icons to these
                            'compact' => true, // only shows the icon picker, not the size and color etc
                            'no_icon' => true, // adds an additional "ban" icon for no icon
                        ],
                        'data' => [
                            'name' => jtoc_onboarding_name('toc_icon'),
                            'option' => jtoc_onboarding_name('toc_icon'),
                            'value' => [
                                'icon' => '', // empty value for no icon (the ban icon)
                                'size' => '20',
                                'stroke_width' => '2',
                                'color' => '',
                            ],

                        ],
                    ],
                    'toc_title' => [
                        'args' => [
                            'type' => 'text',
                            'name' => jtoc_onboarding_name('toc_title'),
                            'suggestions' => [
                                __('Table of contents', 'joli-table-of-contents'),
                                __('On this page', 'joli-table-of-contents'),
                                __('In this article', 'joli-table-of-contents'),
                                __('Quick navigation', 'joli-table-of-contents'),
                                __('Jump to', 'joli-table-of-contents'),
                                __('Contents', 'joli-table-of-contents'),
                                __('Overview', 'joli-table-of-contents'),
                                __('Sections', 'joli-table-of-contents'),
                                __('Outline', 'joli-table-of-contents'),
                            ]
                        ],
                        'data' => [
                            'name' => jtoc_onboarding_name('toc_title'),
                            'value' => 'Table of contents',
                        ]
                    ]
                ],
            ],
        ],

        // Readability
        [
            'step' => 5,
            'name' => 'Readability',
            'template' => 'step-5',
            'data' => [
                'title' => 'Adjust readability',
                'fields' => [
                    'text_size' => [
                        'args' => [
                            'type' => 'slider',
                            'name' => jtoc_onboarding_name('text_size'),
                            'values' => [
                                'xs' => __('XS', 'joli-table-of-contents'),
                                's' => __('S (default)', 'joli-table-of-contents'),
                                'm' => __('M', 'joli-table-of-contents'),
                                'l' => __('L', 'joli-table-of-contents'),
                                'xl' => __('XL', 'joli-table-of-contents'),
                            ],
                        ],
                        'data' => [
                            'name' => jtoc_onboarding_name('text_size'),
                            'value' => 's',
                        ],
                    ],
                    'text_spacing' => [
                        'args' => [
                            'type' => 'slider',
                            'name' => jtoc_onboarding_name('text_spacing'),
                            'nullable' => true,
                            'values' => [
                                'xxs' => __('None', 'joli-table-of-contents'),
                                'xs' => __('Compact', 'joli-table-of-contents'),
                                's' => __('Tight', 'joli-table-of-contents'),
                                'm' => __('Normal', 'joli-table-of-contents'),
                                'l' => __('Loose', 'joli-table-of-contents'),
                                'xl' => __('Comfortable', 'joli-table-of-contents'),
                            ],
                        ],
                        'data' => [
                            'name' => jtoc_onboarding_name('text_spacing'),
                            // 'value' => 'm',
                        ],
                    ],
                ],
            ],
        ],

        // Structure
        [
            'step' => 6,
            'name' => 'Structure',
            'template' => 'step-6',
            'data' => [
                'title' => 'How should headings be displayed?',
                'fields' => [
                    'depth' => [
                        'args' => [
                            'type' => 'slider',
                            'name' => jtoc_onboarding_name('depth'),
                            'values' => [
                                '2' => 'H2',
                                '3' => 'H3',
                                '4' => 'H4',
                                '5' => 'H5',
                                '6' => 'H6',
                            ],
                        ],
                        'data' => [
                            'name' => jtoc_onboarding_name('depth'),
                            'value' => '3',
                        ],
                    ],
                    // 'numeration' => [
                    //     'args' => [
                    //         'type' => 'select',
                    //         'name' => jtoc_onboarding_name('numeration'),
                    //         'values' => [
                    //             'none' => 'None',
                    //             'single' => 'Single number (current level only)',
                    //             'full' => 'Full (include parent numbers, ex: 1.2.1)',
                    //         ],
                    //     ],
                    //     'data' => [
                    //         'name' => jtoc_onboarding_name('numeration'),
                    //         'value' => 'full',
                    //     ],
                    // ],
                    // 'numeration' => [
                    //     'args' => [
                    //         'type' => 'switch',
                    //         'name' => jtoc_onboarding_name('numeration'),
                    //     ],
                    //     'data' => [
                    //         'name' => jtoc_onboarding_name('numeration'),
                    //         'option' => jtoc_onboarding_name('numeration'),
                    //         'value' => '1',
                    //     ],
                    // ],
                    'numeration' => [
                        'args' => [
                            'type' => 'slider',
                            'name' => jtoc_onboarding_name('numeration'),
                            'values' => [
                                'none' => __('None', 'joli-table-of-contents'),
                                'decimal' => __('Decimal', 'joli-table-of-contents'),
                                'badge' => __('Decimal (badge)', 'joli-table-of-contents'),
                            ],
                        ],
                        'data' => [
                            'name' => jtoc_onboarding_name('numeration'),
                            'value' => 'decimal',
                        ],
                    ],
                ],
            ],
        ],

        // Recommended settings
        [
            'step' => 7,
            'name' => 'UX & Scope',
            'template' => 'step-7',
            'data' => [
                'title' => 'UX & Scope',
                'fields' => [
                    'headings_scope' => [
                        'args' => [
                            'type' => 'radio',
                            'name' => jtoc_onboarding_name('headings_scope'),
                            'values' => [
                                'content' => __('Content', 'joli-table-of-contents'),
                                'extended' => __('Extended', 'joli-table-of-contents'),
                            ],
                        ],
                        'data' => [
                            'name' => jtoc_onboarding_name('headings_scope'),
                            'option' => jtoc_onboarding_name('headings_scope'),
                            'value' => 'content',
                        ],
                    ],
                    'recommended_settings' => [
                        'args' => [
                            'type' => 'switch',
                            'name' => jtoc_onboarding_name('recommended_settings'),
                        ],
                        'data' => [
                            'name' => jtoc_onboarding_name('recommended_settings'),
                            'option' => jtoc_onboarding_name('recommended_settings'),
                            'value' => '1',
                        ],
                    ],
                ],
            ],
        ],

        // Done
        [
            'step' => 8,
            'final' => true,
            'name' => 'Done',
            'template' => 'step-final',
        ]
    ],
];

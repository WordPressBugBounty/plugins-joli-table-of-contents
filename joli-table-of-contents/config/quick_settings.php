<?php defined('ABSPATH') or die('Wrong path bro!');

function jtoc_quick_settings_name($option)
{
    return 'jtoc_quick_settings' . '[' . $option . ']';
}

return [
    'fields' => [
        'color_background' => [
            'args' => [
                'type' => 'color',
                'name' => jtoc_quick_settings_name('color_background'),
            ],
            'data' => [
                'classes' => 'joli-color-picker',
                'placeholder' => 'Leave empty for default',
                'name' => jtoc_quick_settings_name('color_background'),
                'value' => '', // default
                'data_attrs' => [
                    'alpha-enabled' => 'true',
                    'alpha-color-type' => 'hex',
                    'theme-palette' => 'true',
                ],
                'theme_palette' => true, // uses theme palette for the swatches instead of the settings palette
                // 'swatches' => false, // prevent color picker from showing palette swatches
            ],
        ],
        'color_text' => [
            'args' => [
                'type' => 'color',
                'name' => jtoc_quick_settings_name('color_text'),
            ],
            'data' => [
                'classes' => 'joli-color-picker',
                'placeholder' => 'Leave empty for default',
                'name' => jtoc_quick_settings_name('color_text'),
                'value' => '', // default
                'data_attrs' => [
                    'alpha-enabled' => 'true',
                    'alpha-color-type' => 'hex',
                    'theme-palette' => 'true',
                ],
                'theme_palette' => true, // uses theme palette for the swatches instead of the settings palette
            ]
        ],
        'color_accent' => [
            'args' => [
                'type' => 'color',
                'name' => jtoc_quick_settings_name('color_accent'),
            ],
            'data' => [
                'classes' => 'joli-color-picker',
                'placeholder' => 'Leave empty for default',
                'name' => jtoc_quick_settings_name('color_accent'),
                'value' => '', // default
                'data_attrs' => [
                    'alpha-enabled' => 'true',
                    'alpha-color-type' => 'hex',
                    'theme-palette' => 'true',
                ],
                'theme_palette' => true, // uses theme palette for the swatches instead of the settings palette
            ]
        ],
        'toc_icon' => [
            'args' => [
                'type' => 'lucideicon',
                'name' => jtoc_quick_settings_name('toc_icon'),
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
                'name' => jtoc_quick_settings_name('toc_icon'),
                'option' => jtoc_quick_settings_name('toc_icon'),
                'value' => [
                    'icon' => 'book-open',
                    'size' => '20',
                    'stroke_width' => '2',
                    'color' => '',
                ],

            ],
        ],
        // 'toc_toggle' => [
        //     'args' => [
        //         'type' => 'lucideicon',
        //         'name' => jtoc_quick_settings_name('toc_toggle'),
        //         'styles' => ':root{--toc_title_icon-stroke-width: 1px;}',
        //         'path' => 'assets/public/icons',
        //         'label' => __('Toggle', 'joli-table-of-contents'),
        //         'icons' => [
        //             'chevron-right',
        //             'book',
        //             'book-text',
        //             'book-open',
        //             'book-open-text',
        //             'align-left',
        //             'grip',
        //             'star',
        //             'home',
        //             'info',
        //             'lightbulb',
        //             'bookmark',
        //             'megaphone',
        //             'flame',
        //             'newspaper',
        //             'spotlight',
        //         ], // filters the available icons to these
        //         'compact' => true, // only shows the icon picker, not the size and color etc
        //         'no_icon' => true, // adds an additional "ban" icon for no icon
        //     ],
        //     'data' => [
        //         'name' => jtoc_quick_settings_name('toc_icon'),
        //         'option' => jtoc_quick_settings_name('toc_icon'),
        //         'value' => [
        //             'icon' => 'chevron-right',
        //             'size' => '20',
        //             'stroke_width' => '2',
        //             'color' => '',
        //         ],

        //     ],
        // ],
        
        'toc_toggle' => [
            'args' => [
                'type' => 'select',
                'name' => jtoc_quick_settings_name('toc_toggle'),
                'values' => [
                    'none' => __('None', 'joli-table-of-contents'),
                    'text' => __('Text', 'joli-table-of-contents'),
                    'default' => __('Default', 'joli-table-of-contents'),
                    'chiclet' => __('Chiclet', 'joli-table-of-contents'),
                    'embossed' => __('Embossed', 'joli-table-of-contents'),
                    'chicemb' => __('Chiclet & embossed', 'joli-table-of-contents'),
                    'cutout' => __('Cutout', 'joli-table-of-contents'),
                ],
            ],
            'data' => [
                'name' => jtoc_quick_settings_name('toc_toggle'),
                'value' => 'default',
            ],
        ],

        'toc_title' => [
            'args' => [
                'type' => 'text',
                'name' => jtoc_quick_settings_name('toc_title'),
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
                'name' => jtoc_quick_settings_name('toc_title'),
                'value' => 'Table of contents',
            ]
        ],
        'title_size' => [
            'args' => [
                'type' => 'slider',
                'nullable' => true,
                'name' => jtoc_quick_settings_name('title_size'),
                'values' => [
                    // 'custom' => __('Custom', 'joli-table-of-contents'),
                    'xs' => __('XS', 'joli-table-of-contents'),
                    's' => __('S', 'joli-table-of-contents'),
                    'm' => __('M', 'joli-table-of-contents'),
                    'l' => __('L', 'joli-table-of-contents'),
                    'xl' => __('XL', 'joli-table-of-contents'),
                ],
            ],
            'data' => [
                'name' => jtoc_quick_settings_name('title_size'),
                'value' => 's',
            ],
        ],
        'text_size' => [
            'args' => [
                'type' => 'slider',
                'nullable' => true,
                'name' => jtoc_quick_settings_name('text_size'),
                'values' => [
                    'xs' => __('XS', 'joli-table-of-contents'),
                    's' => __('S (default)', 'joli-table-of-contents'),
                    'm' => __('M', 'joli-table-of-contents'),
                    'l' => __('L', 'joli-table-of-contents'),
                    'xl' => __('XL', 'joli-table-of-contents'),
                ],
            ],
            'data' => [
                'name' => jtoc_quick_settings_name('text_size'),
                'value' => 's',
            ],
        ],
        'toc_alignment' => [
            'args' => [
                'type' => 'slider',
                // 'nullable' => true,
                'name' => jtoc_quick_settings_name('toc_alignment'),
                'values' => [
                    'left' => __('Left', 'joli-table-of-contents'),
                    'center' => __('Center', 'joli-table-of-contents'),
                    'right' => __('Right', 'joli-table-of-contents'),
                    'full' => __('Full width', 'joli-table-of-contents'),
                ],
            ],
            'data' => [
                'name' => jtoc_quick_settings_name('toc_alignment'),
                'value' => 'left',
            ],
        ],
        'text_spacing' => [
            'args' => [
                'type' => 'slider',
                'nullable' => true,
                'name' => jtoc_quick_settings_name('text_spacing'),
                'values' => [
                    'xs' => __('Compact', 'joli-table-of-contents'),
                    's' => __('Tight', 'joli-table-of-contents'),
                    'm' => __('Normal', 'joli-table-of-contents'),
                    'l' => __('Loose', 'joli-table-of-contents'),
                    'xl' => __('Comfortable', 'joli-table-of-contents'),
                ],
            ],
            'data' => [
                'name' => jtoc_quick_settings_name('text_spacing'),
                'value' => 'm',
            ],
        ],
        'depth' => [
            'args' => [
                'type' => 'slider',
                // 'nullable' => true,
                'name' => jtoc_quick_settings_name('depth'),
                'values' => [
                    '2' => 'H2',
                    '3' => 'H3',
                    '4' => 'H4',
                    '5' => 'H5',
                    '6' => 'H6',
                ],
            ],
            'data' => [
                'name' => jtoc_quick_settings_name('depth'),
                'value' => '3',
            ],
        ],
        // 'numeration' => [
        //     'args' => [
        //         'type' => 'switch',
        //         'name' => jtoc_quick_settings_name('numeration'),
        //     ],
        //     'data' => [
        //         'name' => jtoc_quick_settings_name('numeration'),
        //         'value' => '1',
        //     ],
        // ],
        'numeration' => [
            'args' => [
                'type' => 'slider',
                // 'nullable' => true,
                'name' => jtoc_quick_settings_name('numeration'),
                'values' => [
                    'none' => __('None', 'joli-table-of-contents'),
                    'decimal' => __('Decimal', 'joli-table-of-contents'),
                    'badge' => __('Decimal (badge)', 'joli-table-of-contents'),
                ],
            ],
            'data' => [
                'name' => jtoc_quick_settings_name('numeration'),
                'value' => 'none',
            ],
        ],
        'rounded_corners' => [
            'args' => [
                'type' => 'slider',
                'nullable' => true,
                'name' => jtoc_quick_settings_name('rounded_corners'),
                'values' => [
                    'none' => __('None', 'joli-table-of-contents'),
                    's' => __('Small', 'joli-table-of-contents'),
                    'm' => __('Medium', 'joli-table-of-contents'),
                    'l' => __('Large', 'joli-table-of-contents'),
                ],
            ],
            'data' => [
                'name' => jtoc_quick_settings_name('rounded_corners'),
                'value' => 'none',
            ],
        ],
        'border' => [
            'args' => [
                'type' => 'slider',
                'nullable' => true,
                'name' => jtoc_quick_settings_name('border'),
                'values' => [
                    'none' => __('None', 'joli-table-of-contents'),
                    's' => __('Small', 'joli-table-of-contents'),
                    'm' => __('Medium', 'joli-table-of-contents'),
                    'l' => __('Large', 'joli-table-of-contents'),
                ],
            ],
            'data' => [
                'name' => jtoc_quick_settings_name('border'),
                'value' => 'none',
            ]
        ],
    ],
];

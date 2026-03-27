<?php
$vars = [
    'dontaddpx' => '<span style="color:orange;">' . __('Do not add "px".', 'joli-table-of-contents') . '</span>',
    'dontaddem' => '<span style="color:orange;">' . __('Do not add "em".', 'joli-table-of-contents') . '</span>',
];

$font_weight_list = [
    'none' => __('[Inherit from theme]', 'joli-table-of-contents'),
    '100' => '100 (lightest)',
    '200' => '200',
    '300' => '300',
    '400' => '400 (normal)',
    '500' => '500',
    '600' => '600',
    '700' => '700 (bold)',
    '800' => '800',
    '900' => '900 (boldest)',
    'lighter' => __('Lighter (relative to parent)', 'joli-table-of-contents'),
    'bolder' => __('Bolder (relative to parent)', 'joli-table-of-contents'),
];

$font_style_list = [
    'none' => __('[Inherit from theme]', 'joli-table-of-contents'),
    'italic' => __('Italic', 'joli-table-of-contents'),
    'normal' => __('Normal', 'joli-table-of-contents'),
    'oblique' => __('Oblique', 'joli-table-of-contents'),
];

$separator_style_list = [
    'none' => __('Blank space', 'joli-table-of-contents'),
    'solid' => __('Solid', 'joli-table-of-contents'),
    'dashed' => __('Dashed', 'joli-table-of-contents'),
    'dotted' => __('Dotted', 'joli-table-of-contents'),
    'double' => __('Double', 'joli-table-of-contents'),
];

$slider_style = [
    'width' => '320px',
];

$default_lucide_icon = 'book-text';

$recommended = __('Recommended', 'joli-table-of-contents');

return [
    // GROUP: General ********************************************************
    [
        'group' => 'general',
        'label' => __('General', 'joli-table-of-contents'),
        'icon' => 'gear',
        'sections' => [
            // Themes ----------
            [
                'name' => 'appearance',
                'title' => __('Appearance & visibility', 'joli-table-of-contents'),
                'fields' => [
                    // TOC in content visibility
                    [
                        'id' => 'toc-in-content-visibility',
                        'title' => __('In-content TOC visibility', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Choose on which devices the in-content table of contents should appear.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify(
                                'p',
                                __('This setting controls the table of contents inserted directly within the post or page content.', 'joli-table-of-contents'),
                                ['class' => 'description']
                            ),
                            'values' => [
                                'all' => __('Desktop & mobile', 'joli-table-of-contents'),
                                'desktop' => __('Desktop only', 'joli-table-of-contents'),
                                'mobile' => __('Mobile only', 'joli-table-of-contents'),
                            ]
                        ],
                        'default' => 'all',
                        'sanitize' => 'values',
                    ],

                    // TOC sidebar visibility
                    [
                        'id' => 'toc-sidebar-visibility',
                        'title' => __('Sidebar TOC visibility', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Choose on which devices the sidebar table of contents should appear.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify(
                                'p',
                                sprintf(__('This setting applies to the table of contents displayed inside a %ssidebar widget%s.', 'joli-table-of-contents'), sprintf('<a href="%s">', admin_url('widgets.php')), '</a>'),
                                ['class' => 'description']
                            ),
                            'values' => [
                                'all' => __('Desktop & mobile', 'joli-table-of-contents'),
                                'desktop' => __('Desktop only', 'joli-table-of-contents'),
                                'mobile' => __('Mobile only', 'joli-table-of-contents'),
                            ]
                        ],
                        'default' => 'all',
                        'sanitize' => 'values',
                    ],

                    [
                        'id' => 'toc-width-incontent',
                        'title' => __('Width (in-content)', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'desc' => __('Auto will adapt to the content, "100%" will result in a full width table of contents', 'joli-table-of-contents'),
                            'values' => [
                                'width-auto' => __('Auto', 'joli-table-of-contents'),
                                'width-100' => '100%',
                            ],

                        ],
                        'default' => 'width-auto',
                    ],

                    [
                        'id' => 'toc-min-width',
                        'title' => __('Minimum width', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'desc' => __('Define a minimum width value to prevent the TOC from shrinking too much.', 'joli-table-of-contents'),
                            // 'class' => 'tab-appearance'
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        'sanitize' => 'unit',
                    ],
                    [
                        'id' => 'toc-max-width',
                        'title' => __('Maximum width', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'desc' => __('Maximum width of the table of contents.', 'joli-table-of-contents'),
                            // 'class' => 'tab-appearance'
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        'sanitize' => 'unit',
                    ],
                ],
            ],

            // Table of contents ----------
            [
                'name' => 'table-of-contents',
                'title' => __('Table of contents', 'joli-table-of-contents'),
                'fields' => [
                    // TOC alignment
                    [
                        'id' => 'toc-alignment',
                        'title' => __('Alignment', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'args' => [
                            'new' => true, /* v3 */
                            'desc' => __('Alignment of the Table of contents on the horizontal axis.', 'joli-table-of-contents'),
                            'values' => [ //value =>display
                                'left' => __('Left', 'joli-table-of-contents'),
                                'center' => __('Center', 'joli-table-of-contents'),
                                'right' => __('Right', 'joli-table-of-contents'),
                            ]
                        ],
                        'default' => 'left',
                        'sanitize' => 'text'
                    ],
                    [
                        'id' => 'hierarchy-offset',
                        'type' => 'unitinput',
                        'title' => __('Hierarchy offset', 'joli-table-of-contents'),
                        'args' => [
                            'placeholder' => '20',
                            'desc' => __('Empty space per level of title depth. Set to "0" to have all the titles vertically inline.', 'joli-table-of-contents'),
                            // 'classes' => 'joli-color-picker',//adds color picker
                            'custom' => jtoc_tagify('p', __('Set to "0" to prevent hierarchical view', 'joli-table-of-contents'), ['class' => 'description']),
                            'values' => [
                                'px' => 'px',
                            ],
                        ],
                        'default' => '16|px',
                        'sanitize' => 'unit',
                    ],

                    [
                        'id' => 'min-headings',
                        'title' => __('Minimal headings count', 'joli-table-of-contents'),
                        'type' => 'number',
                        'args' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                            'desc' => __('Table of contents will not be displayed if the number of headings of the current post is below this number', 'joli-table-of-contents'),
                            'placeholder' => '3',
                        ],
                        'default' => 3,
                        'sanitize' => 'number',
                    ],

                    [
                        'id' => 'max-headings',
                        'title' => __('Maximal headings count', 'joli-table-of-contents'),
                        'type' => 'number',
                        'args' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                            // 'new' => true, /* legacy */
                            'desc' => __('Table of contents will not be displayed if the number of headings of the current post is over this number', 'joli-table-of-contents'),
                            'placeholder' => '3',
                        ],
                        // 'default' => 3,
                        'sanitize' => 'number',
                    ],

                    [
                        'id' => 'animate-on-fold',
                        'title' => __('Animate on fold', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'annotation' => $recommended,
                            'desc' => __('Shows an animation when expanding or collapsing the table of contents.', 'joli-table-of-contents'),
                            // 'class' => 'tab-general'
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'smooth-scroll',
                        'title' => __('Smooth scroll', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'desc' => __('Enables smooth scrolling when clicking an entry in the table of contents.', 'joli-table-of-contents'),
                            // 'class' => 'tab-general'
                            'custom' => jtoc_tagify(
                                'p',
                                __('Some themes have built-in smooth scrolling for links. This may interfere with Joli TOC\'s smooth scrolling if both are activated.', 'joli-table-of-contents'),
                                ['class' => ['description', 'danger']]
                            ),
                        ],
                        'default' => 1,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'headings-full-row-clickable',
                        'title' => __('Heading full row clickable', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'annotation' => $recommended,
                            'desc' => __('Make the entire heading row clickable, including empty space and padding — not just the text link.', 'joli-table-of-contents'),
                            // 'class' => 'tab-general'
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'headings-overflow',
                        'title' => __('Headings overflow', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'desc' => __('How to handle headings that are longer than the table of contents (especially on mobile).', 'joli-table-of-contents'),
                            'values' => [
                                'wrap' => __('Wrap (overflowing content will show on a new line)', 'joli-table-of-contents'),
                                'hidden-ellipsis' => __('Hidden, with ellipsis (\'...\')', 'joli-table-of-contents'),
                                // 'hidden-gradient' => __('Hidden, with fading gradient', 'joli-table-of-contents'),
                                'hidden' => __('Hidden', 'joli-table-of-contents'),
                            ],
                            // 'media' => [
                            //     'unfolded-incontent' => 'unfolded-incontent.gif',
                            //     'folded-incontent' => 'folded-incontent.gif',
                            // ],
                        ],
                        'default' => 'wrap',
                    ],

                    [
                        'id' => 'jump-to-offset',
                        'title' => __('Jump-to offset', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'placeholder' => '50',
                            'desc' => __('Offset between the top of the viewport and the clicked heading.', 'joli-table-of-contents'),
                            // 'classes' => 'joli-color-picker',//adds color picker
                            'values' => [
                                'px' => 'px',
                            ],
                        ],
                        'default' => '50|px',
                        'sanitize' => 'unit',
                    ],

                    [

                        'id' => 'jump-to-offset-mobile',
                        'title' => __('Jump-to offset (mobile)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'placeholder' => '50',
                            'desc' => __('Offset between the top of the viewport and the clicked heading.', 'joli-table-of-contents'),
                            // 'classes' => 'joli-color-picker',//adds color picker
                            'values' => [
                                'px' => 'px',
                            ],
                        ],
                        'default' => '50|px',
                        'sanitize' => 'unit',
                    ],

                    [
                        'id' => 'fold-on-load',
                        'title' => __('Fold on load', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'desc' => __('Keeps the table of contents collapsed on page load. Use "Partial" for a "View more" truncated preview.', 'joli-table-of-contents'),
                            // 'class' => 'tab-general'
                            'values' => [
                                'no' => __('No', 'joli-table-of-contents'),
                                'yes' => __('Yes', 'joli-table-of-contents'),
                                'responsive' => __('Yes on mobile, No on desktop', 'joli-table-of-contents'),
                                'partial' => __('Partial (view more button)', 'joli-table-of-contents'),
                            ],
                            'values_pro' => [
                                'partial',
                            ],
                            'values_disabled' => [
                                'partial',
                            ],
                            // 'custom' => jtoc_tagify(
                            //     'p',
                            //     __('The below "Fold if headings count exceeds" option must be set to a number greater than 0 when using "Partial"', 'joli-table-of-contents'),
                            //     ['class' => ['description', 'danger']]
                            // ),
                        ],
                        'default' => 'no',
                        'sanitize' => 'text',
                    ],

                    [
                        'id' => 'fold-if-headings-count',
                        'title' => __('Fold if headings count exceeds', 'joli-table-of-contents'),
                        'type' => 'number',
                        'args' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                            'desc' => __('The table of contents will be collapsed on load only if the heading count exceeds this value. Set to 0 to always collapse.', 'joli-table-of-contents'),
                            'placeholder' => '3',
                        ],
                        // 'default' => 0,
                        'sanitize' => 'number',
                    ],
                    [

                        'id' => 'partial-fold-max-height',
                        'title' => __('Partial fold max height', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'placeholder' => '250',
                            'desc' => __('Maximum height of the table of contents when in partial collapse mode.', 'joli-table-of-contents'),
                            // 'classes' => 'joli-color-picker',//adds color picker
                            'values' => [
                                'px' => 'px',
                            ],
                        ],
                        'default' => '250|px',
                        'sanitize' => 'unit',
                    ],

                    [
                        'id' => 'hide-main-toc',
                        'title' => __('Hide main table of contents', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('Hides the in-content table of contents while keeping the floating widget visible (replicates the deprecated "Invisible, floating" mode).', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify(
                                'p',
                                __('Activate to replicate the deprecated "Invisible, floating" mode.', 'joli-table-of-contents'),
                                ['class' => 'description']
                            ),
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],
                ],
            ],

            // Table of contents header ----------
            [
                'name' => 'table-of-contents-header',
                'title' => __('Table of contents header', 'joli-table-of-contents'),
                'fields' => [

                    [
                        'id' => 'show-header',
                        'title' => __('Show header', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'desc' => __('Show the table of contents header (title and toggle button).', 'joli-table-of-contents'),
                            // 'class' => 'tab-general'
                            'children_sections' => [
                                'table-of-contents-toggle',
                            ],
                            'children' => [
                                'toc-title',
                                'toc-title-alignment',
                                'header-as-toggle',
                            ],
                        ],
                        'default' => 1,
                        'sanitize' => 'checkbox',
                    ],
                    // [
                    //     'id' => 'toc-title-image',
                    //     'title' => __('Title image', 'joli-table-of-contents'),
                    //     'type' => 'imagepicker',
                    //     'default' => 'gg-math-plus',
                    //     'args' => [
                    //         // 'desc' => sprintf( '<span style="color:red;">%s</span>', __('Any changes in any styling below (title, headings, colors etc) will override theme defaults', 'joli-table-of-contents') ),
                    //         'desc' => __('This setting only applies to the Toggle type "Icon" setting.', 'joli-table-of-contents'),
                    //         'values' => [
                    //             'none' => '-',
                    //         ],
                    //     ],
                    // ],

                    [
                        'id' => 'toc-title',
                        'title' => __('Table of contents title', 'joli-table-of-contents'),
                        'type' => 'text',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'classes' => 'jli-w-full', // wider text input
                            'desc' => __('Title of the Table of contents.', 'joli-table-of-contents'),
                            'placeholder' => __('Table of contents', 'joli-table-of-contents'),
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
                        'default' => __('Table of contents', 'joli-table-of-contents'),
                        'sanitize' => 'text',
                    ],

                    [
                        'id' => 'toc-title-alignment',
                        'title' => __('Title alignment', 'joli-table-of-contents'),
                        'type' => 'select',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'desc' => __('Alignment of the "Table of contents" title.', 'joli-table-of-contents'),
                            'values' => [ //value =>display
                                'left' => __('Left', 'joli-table-of-contents'),
                                'center' => __('Center', 'joli-table-of-contents'),
                                'right' => __('Right', 'joli-table-of-contents'),
                            ]
                        ],
                        'default' => 'left',
                        'sanitize' => 'text'
                    ],

                    [
                        'id' => 'header-as-toggle',
                        'title' => __('Header as toggle', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            // // 'new' => true, /* legacy */
                            'annotation' => $recommended,
                            'desc' => __('Clicking anywhere on the header will expand or collapse the table of contents.', 'joli-table-of-contents'),
                            // 'class' => 'tab-general'
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],


                    [
                        'id' => 'use-toc-title-icon',
                        'title' => __('Use title icon', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'desc' => __('Show an icon before the table of contents title', 'joli-table-of-contents'),
                            // 'class' => 'tab-general'
                            'custom' => JTOC()->render(['admin' => 'toc-title-icon'], [], true),
                            'children' => [
                                'toc-title-icon',
                            ],
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'toc-title-icon',
                        'title' => __('Title icon', 'joli-table-of-contents'),
                        'type' => 'lucideicon',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'default' => [
                            'icon' => $default_lucide_icon,
                            'stroke_width' => 2,
                            'size' => 20,
                            'color' => null,
                        ],
                        'args' => [
                            'pro_partial' => true,
                            // 'new' => true, /* legacy */
                            'styles' => ':root{--toc_title_icon-stroke-width: 1px;}',
                            'desc' => __('Select an icon that will be shown next to the TOC Title. Adjust the size, stroke width and color.', 'joli-table-of-contents'),
                            'path' => 'assets/public/icons',
                        ],
                        'sanitize' => 'lucideicon',
                        'sanitize_args' => [
                            'icon' => 'string',
                            'stroke_width' => 'float',
                            'size' => 'integer',
                            'color' => 'color',
                        ],
                    ],
                ],
            ],

            // Table of contents header ----------
            [
                'name' => 'table-of-contents-toggle',
                'title' => __('Table of contents toggle button', 'joli-table-of-contents'),
                'fields' => [

                    [
                        'id' => 'show-toggle',
                        'title' => __('Show toggle', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'desc' => __('Show the table of contents toggle button.', 'joli-table-of-contents'),
                            // 'class' => 'tab-general'
                            'children' => [
                                'toggle-position',
                                'toggle-type',
                                'toggle-button-icon',
                                'toggle-button-text-opened',
                                'toggle-button-text-closed',
                                'toggle-button-icon-opened',
                                'toggle-button-icon-closed',
                                'toggle-style',
                            ],
                        ],
                        'default' => 1,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'toggle-position',
                        'title' => __('Toggle position', 'joli-table-of-contents'),
                        'type' => 'select',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'desc' => __('Position of the toggle button within the header.', 'joli-table-of-contents'),
                            'values' => [
                                'left' => __('Left', 'joli-table-of-contents'),
                                'right' => __('Right', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'right',
                    ],

                    [
                        'id' => 'toggle-type',
                        'title' => __('Toggle type', 'joli-table-of-contents'),
                        'type' => 'select',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            // 'new' => true, /* legacy */
                            // 'class' => 'tab-general',
                            // 'pro' => false,
                            'desc' => __('Type of toggle button.', 'joli-table-of-contents'),
                            'values' => [ //value =>display
                                'icon' => __('Animated icon', 'joli-table-of-contents'),
                                'icon-std' => __('Icon', 'joli-table-of-contents'),
                                'text' => __('Text', 'joli-table-of-contents'),
                            ],
                            'values_pro' => [],
                        ],
                        'default' => 'icon',
                    ],

                    [
                        'id' => 'toggle-button-icon',
                        'title' => __('Toggle button animated icon', 'joli-table-of-contents'),
                        'type' => 'radioicon',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'default' => 'toggle-1',
                        'args' => [
                            // 'new' => true, /* legacy */
                            // 'desc' => sprintf( '<span style="color:red;">%s</span>', __('Any changes in any styling below (title, headings, colors etc) will override theme defaults', 'joli_faq_seo') ),

                            'desc' => __('Animated icons are icons made from CSS.', 'joli-table-of-contents'),
                            'styles' => ':root{--jtoc-toggle-color: currentColor;}',
                            'values' => [
                                'toggle-1' => '<div class="wpj-jtoc --jtoc-toggle-admin --jtoc-toggle-1"><div class="wpj-jtoc--toggle"></div></div>',
                                'toggle-2' => '<div class="wpj-jtoc --jtoc-toggle-admin --jtoc-toggle-2"><div class="wpj-jtoc--toggle"></div></div>',
                                'toggle-3' => '<div class="wpj-jtoc --jtoc-toggle-admin --jtoc-toggle-3"><div class="wpj-jtoc--toggle"></div></div>',
                            ],
                            // 'values_pro' => [
                            //     'toggle-1',
                            //     'toggle-2',
                            //     // 'toggle-3',
                            // ],

                            'data' => [
                                'dependency-field' => 'toggle-type',
                                'dependency-value' => 'icon',
                            ],
                        ],
                    ],

                    // Toggle style
                    [
                        'id' => 'toggle-style',
                        'title' => __('Toggle icon style', 'joli-table-of-contents'),
                        'type' => 'select',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'custom' => jtoc_tagify(
                                'p',
                                __('Toggle styles only work for animated icons.', 'joli-table-of-contents'),
                                ['class' => ['description']]
                            ),
                            // 'new' => true, /* legacy */
                            // 'class' => 'tab-general',
                            // 'pro' => false,
                            'desc' => __('Visual style of the toggle button.', 'joli-table-of-contents'),
                            'values' => [ //value =>display
                                'default' => __('Default (no style)', 'joli-table-of-contents'),
                                'chiclet' => __('Chiclet', 'joli-table-of-contents'),
                                'embossed' => __('Embossed', 'joli-table-of-contents'),
                                'chicemb' => __('Chiclet & Embossed', 'joli-table-of-contents'),
                                'cutout' => __('Cutout', 'joli-table-of-contents'),
                            ],
                            'values_pro' => [],
                            'data' => [
                                'dependency-field' => 'toggle-type',
                                'dependency-value' => 'icon',
                            ],
                        ],
                        'default' => 'default',
                    ],

                    [
                        'id' => 'toggle-button-text-closed',
                        'title' => __('Toggle button text (closed state)', 'joli-table-of-contents'),
                        'type' => 'text',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            // 'new' => true, /* legacy */
                            'desc' => __('This setting only applies to the Toggle type "Text" setting.', 'joli-table-of-contents'),
                            'placeholder' => __('Table of contents', 'joli-table-of-contents'),
                            'data' => [
                                'dependency-field' => 'toggle-type',
                                'dependency-value' => 'text',
                            ],
                        ],
                        'default' => __('show', 'joli-table-of-contents'),
                    ],

                    [
                        'id' => 'toggle-button-text-opened',
                        'title' => __('Toggle button text (opened state)', 'joli-table-of-contents'),
                        'type' => 'text',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            // 'new' => true, /* legacy */
                            'desc' => __('This setting only applies to the Toggle type "Text" setting.', 'joli-table-of-contents'),
                            'placeholder' => __('Table of contents', 'joli-table-of-contents'),
                            'data' => [
                                'dependency-field' => 'toggle-type',
                                'dependency-value' => 'text',
                            ],
                        ],
                        'default' => __('hide', 'joli-table-of-contents'),
                    ],
                    [
                        'id' => 'toggle-button-icon-closed',
                        'title' => __('Expand button icon (closed state)', 'joli-table-of-contents'),
                        'type' => 'radioicon',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'default' => 'gg-math-plus',
                        'args' => [
                            // 'desc' => sprintf( '<span style="color:red;">%s</span>', __('Any changes in any styling below (title, headings, colors etc) will override theme defaults', 'joli-table-of-contents') ),
                            'desc' => __('This setting only applies to the Toggle type "Icon" setting.', 'joli-table-of-contents'),
                            'values' => [
                                'gg-math-plus' => '<i class="gg-math-plus"></i>',
                                'gg-math-minus' => '<i class="gg-math-minus"></i>',
                                'gg-chevron-down' => '<i class="gg-chevron-down"></i>',
                                'gg-chevron-up' => '<i class="gg-chevron-up"></i>',
                                'gg-menu' => '<i class="gg-menu"></i>',
                                'gg-menu-left-alt' => '<i class="gg-menu-left-alt"></i>',
                                'gg-edit-highlight' => '<i class="gg-edit-highlight"></i>',
                                'gg-layout-grid-small' => '<i class="gg-layout-grid-small"></i>',
                                'gg-layout-list' => '<i class="gg-layout-list"></i>',
                                'gg-pentagon-down' => '<i class="gg-pentagon-down"></i>',
                                'gg-pentagon-up' => '<i class="gg-pentagon-up"></i>',
                                'gg-add-r' => '<i class="gg-add-r"></i>',
                                'gg-remove-r' => '<i class="gg-remove-r"></i>',
                                'gg-add' => '<i class="gg-add"></i>',
                                'gg-remove' => '<i class="gg-remove"></i>',
                                'gg-close' => '<i class="gg-close"></i>',
                                'gg-chevron-double-down' => '<i class="gg-chevron-double-down"></i>',
                                'gg-chevron-double-up' => '<i class="gg-chevron-double-up"></i>',
                                'gg-chevron-down-o' => '<i class="gg-chevron-down-o"></i>',
                                'gg-chevron-up-o' => '<i class="gg-chevron-up-o"></i>',
                            ],
                            'values_pro' => [
                                'gg-menu',
                                'gg-menu-left-alt',
                                'gg-edit-highlight',
                                'gg-layout-grid-small',
                                'gg-layout-list',
                                'gg-pentagon-down',
                                'gg-pentagon-up',
                                'gg-add-r',
                                'gg-remove-r',
                                'gg-add',
                                'gg-remove',
                                'gg-close',
                                'gg-chevron-double-down',
                                'gg-chevron-double-up',
                                'gg-chevron-down-o',
                                'gg-chevron-up-o',
                            ],

                            'data' => [
                                'dependency-field' => 'toggle-type',
                                'dependency-value' => 'icon-std',
                            ],
                        ],
                    ],
                    [
                        'id' => 'toggle-button-icon-opened',
                        'title' => __('Collapse button icon (opened state)', 'joli-table-of-contents'),
                        'type' => 'radioicon',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'default' => 'gg-math-minus',
                        'args' => [
                            // 'desc' => sprintf( '<span style="color:red;">%s</span>', __('Any changes in any styling below (title, headings, colors etc) will override theme defaults', 'joli-table-of-contents') ),
                            'desc' => __('This setting only applies to the Toggle type "Icon" setting.', 'joli-table-of-contents'),
                            'values' => [
                                'gg-math-plus' => '<i class="gg-math-plus"></i>',
                                'gg-math-minus' => '<i class="gg-math-minus"></i>',
                                'gg-chevron-down' => '<i class="gg-chevron-down"></i>',
                                'gg-chevron-up' => '<i class="gg-chevron-up"></i>',
                                'gg-menu' => '<i class="gg-menu"></i>',
                                'gg-menu-left-alt' => '<i class="gg-menu-left-alt"></i>',
                                'gg-edit-highlight' => '<i class="gg-edit-highlight"></i>',
                                'gg-layout-grid-small' => '<i class="gg-layout-grid-small"></i>',
                                'gg-layout-list' => '<i class="gg-layout-list"></i>',
                                'gg-pentagon-down' => '<i class="gg-pentagon-down"></i>',
                                'gg-pentagon-up' => '<i class="gg-pentagon-up"></i>',
                                'gg-add-r' => '<i class="gg-add-r"></i>',
                                'gg-remove-r' => '<i class="gg-remove-r"></i>',
                                'gg-add' => '<i class="gg-add"></i>',
                                'gg-remove' => '<i class="gg-remove"></i>',
                                'gg-close' => '<i class="gg-close"></i>',
                                'gg-chevron-double-down' => '<i class="gg-chevron-double-down"></i>',
                                'gg-chevron-double-up' => '<i class="gg-chevron-double-up"></i>',
                                'gg-chevron-down-o' => '<i class="gg-chevron-down-o"></i>',
                                'gg-chevron-up-o' => '<i class="gg-chevron-up-o"></i>',
                            ],
                            'values_pro' => [
                                'gg-menu',
                                'gg-menu-left-alt',
                                'gg-edit-highlight',
                                'gg-layout-grid-small',
                                'gg-layout-list',
                                'gg-pentagon-down',
                                'gg-pentagon-up',
                                'gg-add-r',
                                'gg-remove-r',
                                'gg-add',
                                'gg-remove',
                                'gg-close',
                                'gg-chevron-double-down',
                                'gg-chevron-double-up',
                                'gg-chevron-down-o',
                                'gg-chevron-up-o',
                            ],
                            'data' => [
                                'dependency-field' => 'toggle-type',
                                'dependency-value' => 'icon-std',
                            ],
                            // 'custom' => sprintf('<a href="%sadmin.php?page=joli_toc_user_guide#hooks">', get_admin_url()) . __('How to customize buttons with custom HTML ?', 'joli-table-of-contents') . '</a>',
                        ],
                    ],
                ],
            ],

            // Table of contents footer ----------
            // [
            //     'name' => 'table-of-contents-footer',
            //     'title' => __('Table of contents footer', 'joli-table-of-contents'),
            //     'fields' => [],
            // ],

            // Numbering ----------
            [
                'name' => 'numeration',
                'title' => __('Numbering', 'joli-table-of-contents'),
                'fields' => [

                    // Use legacy numeration (before v3)
                    [
                        'id' => 'numeration-legacy',
                        'title' => __('Use legacy numbering', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'new' => true, /* v3 */
                            // 'class' => 'tab-general',
                            'desc' => __('Use the legacy numbering system (pre-v3).', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('Only activate this setting if you wish to use the legacy numbering system (pre-v3).', 'joli-table-of-contents'), ['class' => ['description', 'danger']]) .
                                jtoc_tagify('p', __('It is recommended to use the new numbering system and keep this switched off.', 'joli-table-of-contents'), ['class' => 'description']) .
                                jtoc_tagify('p', __('Since v3, the new numbering system supports regional languages, uses "tabular-nums" as font-variant, and is decoupled from its heading for better readability.', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],
                    [
                        'id' => 'numeration-type',
                        'title' => __('Numbering type', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            // 'class' => 'tab-general',
                            'desc' => __('Numbering will be displayed before each heading.', 'joli-table-of-contents'),
                            'values' => [ // value => display
                                'none' => __('None', 'joli-table-of-contents'),

                                //Common
                                '-common-' => '- Common -',
                                'decimal' => __('Decimal (1, 2, 3…)', 'joli-table-of-contents'),
                                'lower-alpha' => __('Lower alpha (a, b, c…)', 'joli-table-of-contents'),
                                'upper-alpha' => __('Upper alpha (A, B, C…)', 'joli-table-of-contents'),
                                'lower-roman' => __('Lower roman (i, ii, iii…)', 'joli-table-of-contents'),
                                'upper-roman' => __('Upper roman (I, II, III…)', 'joli-table-of-contents'),

                                // Numeric
                                '-numeric-' => '- Numeric -',
                                'decimal-leading-zero' => __('Decimal leading zero (01, 02, 03…)', 'joli-table-of-contents'),
                                'arabic-indic' => __('Arabic-Indic (١, ٢, ٣…)', 'joli-table-of-contents'),
                                'bengali' => __('Bengali (১, ২, ৩…)', 'joli-table-of-contents'),
                                'cambodian' => __('Cambodian (១, ២, ៣…)', 'joli-table-of-contents'),
                                'khmer' => __('Khmer (១, ២, ៣…)', 'joli-table-of-contents'),
                                'devanagari' => __('Devanagari (१, २, ३…)', 'joli-table-of-contents'),
                                'gujarati' => __('Gujarati (૧, ૨, ૩…)', 'joli-table-of-contents'),
                                'gurmukhi' => __('Gurmukhi (੧, ੨, ੩…)', 'joli-table-of-contents'),
                                'kannada' => __('Kannada (೧, ೨, ೩…)', 'joli-table-of-contents'),
                                'malayalam' => __('Malayalam (൧, ൨, ൩…)', 'joli-table-of-contents'),
                                'oriya' => __('Oriya (୧, ୨, ୩…)', 'joli-table-of-contents'),
                                'persian' => __('Persian (۱, ۲, ۳…)', 'joli-table-of-contents'),
                                'tamil' => __('Tamil (௧, ௨, ௩…)', 'joli-table-of-contents'),
                                'telugu' => __('Telugu (౧, ౨, ౩…)', 'joli-table-of-contents'),
                                'thai' => __('Thai (๑, ๒, ๓…)', 'joli-table-of-contents'),
                                'urdu' => __('Urdu (۱, ۲, ۳…)', 'joli-table-of-contents'),
                                'lao' => __('Lao (໑, ໒, ໓…)', 'joli-table-of-contents'),
                                'myanmar' => __('Myanmar (၁, ၂, ၃…)', 'joli-table-of-contents'),

                                // Alphabetic
                                '-alpha-' => '- Alphabetic -',
                                'lower-latin' => __('Lower latin (a, b, c…)', 'joli-table-of-contents'),
                                'upper-latin' => __('Upper latin (A, B, C…)', 'joli-table-of-contents'),
                                'lower-greek' => __('Lower greek (α, β, γ…)', 'joli-table-of-contents'),
                                'hiragana' => __('Hiragana (あ, い, う…)', 'joli-table-of-contents'),
                                'hiragana-iroha' => __('Hiragana iroha (い, ろ, は…)', 'joli-table-of-contents'),
                                'katakana' => __('Katakana (ア, イ, ウ…)', 'joli-table-of-contents'),
                                'katakana-iroha' => __('Katakana iroha (イ, ロ, ハ…)', 'joli-table-of-contents'),

                                // Roman

                                // Symbolic
                                '-symbolic-' => '- Symbolic -',
                                'disc' => __('Disc (●, ●, ●…)', 'joli-table-of-contents'),
                                'circle' => __('Circle (○, ○, ○…)', 'joli-table-of-contents'),
                                'square' => __('Square (■, ■, ■…)', 'joli-table-of-contents'),
                                'disclosure-open' => __('Disclosure open (▼, ▼, ▼…)', 'joli-table-of-contents'),
                                'disclosure-closed' => __('Disclosure closed (▶, ▶, ▶…)', 'joli-table-of-contents'),

                                // CJK / East Asian
                                '-cjk-' => '- CJK / East Asian -',
                                'cjk-decimal' => __('CJK decimal (一, 二, 三…)', 'joli-table-of-contents'),
                                'japanese-informal' => __('Japanese informal (一, 二, 三…)', 'joli-table-of-contents'),
                                'japanese-formal' => __('Japanese formal (壱, 弐, 参…)', 'joli-table-of-contents'),
                                'korean-hangul-formal' => __('Korean Hangul formal (일, 이, 삼…)', 'joli-table-of-contents'),
                                'korean-hanja-formal' => __('Korean Hanja formal (壹, 貳, 參…)', 'joli-table-of-contents'),
                                'korean-hanja-informal' => __('Korean Hanja informal (一, 二, 三…)', 'joli-table-of-contents'),

                                // Hebrew
                                '-hebrew-' => '- Hebrew -',
                                'hebrew' => __('Hebrew (א, ב, ג…)', 'joli-table-of-contents'),

                                // Armenian / Georgian
                                '-armenian-' => '- Armenian / Georgian -',
                                'armenian' => __('Armenian (Ա, Բ, Գ…)', 'joli-table-of-contents'),
                                'georgian' => __('Georgian (ა, ბ, გ…)', 'joli-table-of-contents'),

                                // Chinese
                                '-chinese-' => '- Chinese -',
                                'trad-chinese-informal' => __('Traditional Chinese informal (一, 二, 三…)', 'joli-table-of-contents'),
                                'trad-chinese-formal' => __('Traditional Chinese formal (壹, 貳, 參…)', 'joli-table-of-contents'),
                                'simp-chinese-informal' => __('Simplified Chinese informal (一, 二, 三…)', 'joli-table-of-contents'),
                                'simp-chinese-formal' => __('Simplified Chinese formal (壹, 贰, 叁…)', 'joli-table-of-contents'),

                                '-deprecated-' => __('Deprecated', 'joli-table-of-contents'),
                                'numbers' => __('Numbers (1, 2, 3…)', 'joli-table-of-contents'),
                                'roman' => __('Roman numbers (I, V, X…)', 'joli-table-of-contents'),
                                'hexadecimal' => __('Hexadecimal', 'joli-table-of-contents'),
                                'binary' => __('Binary (1, 10, 11…)', 'joli-table-of-contents'),
                            ],
                            'values_disabled' => [
                                '-common-',
                                '-numeric-',
                                '-alpha-',
                                '-symbolic-',
                                '-cjk-',
                                '-hebrew-',
                                '-armenian-',
                                '-chinese-',
                                '-deprecated-',
                            ],

                        ],
                        'default' => 'decimal',
                    ],
                    [
                        'id' => 'numeration-style', // since v3.0
                        'title' => __('Numbering style', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'args' => [
                            'new' => true, /* v3 */
                            // 'class' => 'tab-general',
                            'desc' => __('Style of the numbering.', 'joli-table-of-contents'),
                            'styles' => ':root{--num-badge-color: blue;}',
                            'values' => [ //value =>display
                                'plain' => __('Plain', 'joli-table-of-contents'),
                                'badge' => __('Badge', 'joli-table-of-contents'),
                            ],
                            'custom' => jtoc_tagify('p', __('Plain: ', 'joli-table-of-contents') .
                                jtoc_tagify('span', '1.2.', ['style' => [
                                    'font-style: normal;',
                                    'color: black;'
                                ]]) .
                                ' ' . __('Badge: ', 'joli-table-of-contents') .
                                jtoc_tagify('span', '1.2', ['style' => [
                                    'font-style: normal;',
                                    'background-color: var(--num-badge-color);',
                                    'color: white;',
                                    'border-radius: 4px;',
                                    'padding: 2px 4px;',
                                    'font-size: 0.875em;',
                                ]]), ['class' => 'description']),
                        ],
                        'default' => 'plain',
                        'sanitize' => 'values',
                    ],

                    // badge style : solid / soft / outline
                    [
                        'id' => 'numeration-badge-style', // since v3.0
                        'title' => __('Badge style', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'class' => '--field-child',
                        'args' => [
                            'new' => true, /* v3 */
                            // 'class' => 'tab-general',
                            'desc' => __('Style of the badge.', 'joli-table-of-contents'),
                            // 'styles' => ':root{--num-badge-color: blue;}', // already set in numeration-style

                            'values' => [ //value =>display
                                'soft' => __('Soft', 'joli-table-of-contents'),
                                'solid' => __('Solid', 'joli-table-of-contents'),
                                'outline' => __('Outline', 'joli-table-of-contents'),
                            ],
                            'data' => [
                                'dependency-field' => 'numeration-style',
                                'dependency-value' => 'badge',
                            ],
                            'custom' => jtoc_tagify(
                                'p',
                                __('Soft: ', 'joli-table-of-contents') .
                                    jtoc_tagify('span', '1.2', ['style' => [
                                        'font-style: normal;',
                                        'background-color: #d9d9ff;',
                                        'color: #0000bf;',
                                        'border-radius: 4px;',
                                        'padding: 2px 4px;',
                                        'font-size: 0.875em;',
                                    ]]) .
                                    ' ' . __('Solid: ', 'joli-table-of-contents') .
                                    jtoc_tagify('span', '1.2', ['style' => [
                                        'font-style: normal;',
                                        'background-color: var(--num-badge-color);',
                                        'color: white;',
                                        'border-radius: 4px;',
                                        'padding: 2px 4px;',
                                        'font-size: 0.875em;',
                                    ]]) .
                                    ' ' . __('Outline: ', 'joli-table-of-contents') .
                                    jtoc_tagify('span', '1.2', ['style' => [
                                        'font-style: normal;',
                                        'background-color: transparent;',
                                        'color: var(--num-badge-color);',
                                        'border-radius: 4px;',
                                        'padding: 2px 4px;',
                                        'font-size: 0.875em;',
                                        'box-shadow: inset 0 0 0px 1px var(--num-badge-color);',
                                    ]]),
                                ['class' => 'description']
                            ),
                        ],
                        'default' => 'soft',
                        'sanitize' => 'values',
                    ],

                    [
                        'id' => 'numeration-display',
                        'title' => __('Numbering format', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            // 'new' => true, /* legacy */
                            // 'class' => 'tab-general',
                            'desc' => __('Whether to include parent numbers in nested numbering.', 'joli-table-of-contents'),
                            'values' => [ //value =>display
                                'single' => __('Single number (current level only)', 'joli-table-of-contents'),
                                'full' => __('Full (include parent numbers, ex: 1.2.1)', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'full',
                    ],
                    [
                        'id' => 'numeration-separator',
                        'title' => __('Numbering separator', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            'desc' => __('Character used to separate numbers. Ex: "." => "1.1.2"; "-" => "1-1-2"', 'joli-table-of-contents'),
                            'placeholder' => '.',
                        ],
                        'default' => '.',
                        'sanitize' => 'text',
                    ],
                    [
                        'id' => 'numeration-suffix',
                        'title' => __('Numbering suffix', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            'desc' => __('Character shown after the numbers. Ex: ")" => "1.1.2)"; "/" => "1.1.2/"', 'joli-table-of-contents'),
                            'placeholder' => '.',
                            'custom' => jtoc_tagify('p', __('Suffix is disabled when using the Badge style', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        'default' => '.',
                        'sanitize' => 'text',
                    ],
                ],
            ],

            // Reading time
            [
                'name' => 'reading-time',
                'title' => __('Estimated reading time', 'joli-table-of-contents'),
                'fields' => [
                    [
                        'id' => 'show-reading-time',
                        'title' => __('Show reading time', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'new' => true, /* v3 */
                            // 'pro' => true,
                            'desc' => __('Activates reading time. Does not apply to floating widget.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('Default reading time speed is set to 200 words per minute. You can change it using the <code>joli_toc_reading_time_wpm</code> filter hook', 'joli-table-of-contents'), ['class' => 'description']),
                            // 'class' => 'tab-general'
                            'children' => [
                                'reading-time-position',
                                'reading-time-alignment',
                                'reading-time-color',
                                'reading-time-label',
                            ]
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],
                    // Position
                    [
                        'id' => 'reading-time-position',
                        'title' => __('Position', 'joli-table-of-contents'),
                        'type' => 'select',

                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            // 'pro' => true,
                            'desc' => __('Position of the reading time.', 'joli-table-of-contents'),
                            'values' => [ //value =>display
                                'before-title' => __('Left of TOC title', 'joli-table-of-contents'),
                                'after-title' => __('Right of TOC title', 'joli-table-of-contents'),
                                'before-headings' => __('Before headings', 'joli-table-of-contents'),
                                'after-headings' => __('After headings', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'after-title',
                    ],

                    // Alignment
                    [
                        'id' => 'reading-time-alignment',
                        'title' => __('Alignment', 'joli-table-of-contents'),
                        'type' => 'radio',

                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            // 'pro' => true,
                            'desc' => __('Alignment of the reading time.', 'joli-table-of-contents'),
                            // 'custom' => jtoc_tagify('p', __('Does not apply to position "After title"', 'joli-table-of-contents'), ['class' => 'description']),
                            'values' => [ //value =>display
                                'left' => __('Left', 'joli-table-of-contents'),
                                'center' => __('Center', 'joli-table-of-contents'),
                                'right' => __('Right', 'joli-table-of-contents'),
                            ],
                            'data' => [
                                'dependency-field' => 'reading-time-position',
                                'dependency-value' => 'before-headings,after-headings',
                            ],
                        ],
                        'default' => 'left',
                    ],

                    // Label
                    [
                        'id' => 'reading-time-label',
                        'title' => __('Label', 'joli-table-of-contents'),
                        'type' => 'text',
                        'class' => '--field-child',
                        'args' => [
                            'new' => true,
                            // 'pro' => true,
                            'placeholder' => '{clock_icon}{time}mn read',
                            'desc' => __('Label of the reading time.', 'joli-table-of-contents'),
                            'classes' => 'jli-w-full', // wider text input
                            'custom' =>
                            jtoc_tagify(
                                'p',
                                __(
                                    'You MUST include only one <code>{time}</code> placeholder to display the reading time. The value is in minutes.',
                                    'joli-table-of-contents'
                                ),
                                ['class' => 'description']
                            )
                                .
                                jtoc_tagify(
                                    'p',
                                    __(
                                        'Use the <code>{clock_icon}</code> placeholder to display a clock icon. No space is required before or after the placeholder.',
                                        'joli-table-of-contents'
                                    ),
                                    ['class' => 'description']
                                ),
                        ],
                        'sanitize' => 'text',
                        'default' => __('{clock_icon}{time}mn read', 'joli-table-of-contents'),
                    ],

                    // Color
                    [
                        'id' => 'reading-time-color',
                        'title' => __('Color', 'joli-table-of-contents'),
                        'type' => 'color',

                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            // 'pro' => true,
                            'desc' => __('Set the color of the reading time.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify(
                                'p',
                                __('If left empty, the Accent color (in the Theme & Colors tab) will be used by default, or the color defined by the active theme.', 'joli-table-of-contents'),
                                ['class' => 'description']
                            ),
                            'classes' => 'joli-color-picker', //adds color picker
                        ],

                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                ],
            ],


            // Columns ----------
            [
                'name' => 'columns',
                'title' => __('Columns', 'joli-table-of-contents'),
                'fields' => [
                    [
                        'id' => 'columns-mode',
                        'title' => __('Activate multi-columns mode', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Enables multi-columns mode. Does not apply to floating widget.', 'joli-table-of-contents'),
                            // 'class' => 'tab-general'

                            'children' => [
                                'columns-min-headings',
                                'columns-breakpoint',
                            ],
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'columns-min-headings',
                        'title' => __('Minimal headings count', 'joli-table-of-contents'),
                        // 'type' => 'text',
                        'type' => 'number',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'pro' => true,
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                            'desc' => __('Will not switch to multi-columns mode until the minimum number of headings has been reached.', 'joli-table-of-contents'),
                        ],
                        'sanitize' => 'number',
                        'default' => 8,
                    ],

                    [
                        'id' => 'columns-breakpoint',
                        'title' => __('Responsive breakpoint', 'joli-table-of-contents'),
                        'type' => 'text',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'pro' => true,
                            'desc' => __('Breakpoint (in px) after which the multi-columns mode gets activated.', 'joli-table-of-contents') . ' ' . $vars['dontaddpx'],
                        ],
                        'sanitize' => 'number',
                        'default' => 768,
                    ],
                ],
            ],

            // SEO ----------
            // [
            //     'name' => 'seo',
            //     'title' => __('SEO', 'joli-table-of-contents'),
            //     'fields' => [
            //         [
            //             'id' => 'seo-rel-nofollow',
            //             'title' => __('Add rel="nofollow"', 'joli-table-of-contents'),
            //             'type' => 'switch',
            //             'args' => [
            //                 // 'new' => true, /* legacy */
            //                 'pro' => true,
            //                 'desc' => __('Add a rel="nofollow" attribute to the links.', 'joli-table-of-contents'),
            //                 'custom' => jtoc_tagify('p', __('To add more custom attributes, check this documentation: ', 'joli-table-of-contents') . jtoc_tagify(
            //                     'a',
            //                     __('joli_toc_item_link_attributes', 'joli-table-of-contents'),
            //                     [
            //                         'href' => 'https://wpjoli.com/docs/joli-table-of-contents/developer-hooks/filters/joli_toc_item_link_attributes/',
            //                         'target' => '_blank'
            //                     ]
            //                 ), ['class' => 'description']),

            //             ],
            //             'default' => 0,
            //             'sanitize' => 'checkbox',
            //         ],

            //     ],
            // ],

            // Sticky Table of Contents ----------
            [
                'name' => 'sticky-table-of-contents',
                'title' => __('Sticky Table of Contents', 'joli-table-of-contents'),
                'desc' => jtoc_tagify('p', __('The Sticky Table of Contents mode only works in Desktop mode and when the actual table of contents is placed inside a ', 'joli-table-of-contents') . sprintf('<a href="%s">', admin_url('widgets.php')) . __('sidebar widget.', 'joli-table-of-contents') . '</a>'),
                'fields' => [

                    [
                        'id' => 'toc-is-sticky',
                        'title' => __('Activate Sticky TOC', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('Keeps the table of contents in a fixed position as the page is being scrolled. It is recommended to have the table of contents as the last item in the sidebar.', 'joli-table-of-contents'),
                            // 'class' => 'tab-general'
                            // 'custom' => jtoc_tagify(
                            //     'p',
                            //     __('This option only works in Desktop mode and when the table of contents is placed inside a ', 'joli-table-of-contents') . sprintf('<a href="%s">', admin_url('widgets.php')) . __('sidebar widget.', 'joli-table-of-contents') . '</a>',
                            //     ['class' => ['description']]
                            // ),
                            'children' => [
                                'sticky-toc-offset-top'
                            ],
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'sticky-toc-offset-top',
                        'type' => 'unitinput',
                        'title' => __('Sticky TOC offset top', 'joli-table-of-contents'),
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'placeholder' => '20',
                            'desc' => __('Adjust this setting to prevent the TOC from being partially hidden behind a fixed header.', 'joli-table-of-contents'),
                            // 'classes' => 'joli-color-picker',//adds color picker
                            // 'custom' => jtoc_tagify('p', __('Set to "0" to prevent hierarchical view', 'joli-table-of-contents'), ['class' => 'description']),
                            'values' => [
                                'px' => 'px',
                            ],
                        ],
                        'default' => '0|px',
                        'sanitize' => 'unit',
                    ],

                    [
                        'id' => 'sticky-toc-auto-scroll',
                        'title' => __('Auto-scroll to active heading', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('When the TOC overflows the viewport, it will autoscroll to the active heading as the user scrolls the page.', 'joli-table-of-contents'),
                            // 'class' => 'tab-general'
                            // 'custom' => jtoc_tagify(
                            //     'p',
                            //     __('This option only works in Desktop mode and when the table of contents is placed inside a ', 'joli-table-of-contents') . sprintf('<a href="%s">', admin_url('widgets.php')) . __('sidebar widget.', 'joli-table-of-contents') . '</a>',
                            //     ['class' => ['description']]
                            // ),
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],
                ],
            ],

            // Content selector (css selector) ----------
            [
                'name'  => 'content-container',
                'title' => __('Content container', 'joli-table-of-contents'),
                'desc'  => jtoc_tagify('p', __('The content container is the element that holds the main content of your post or page. In most themes, this is something like <code>.entry-content</code>. The plugin will try to detect it automatically, but if it fails, you can specify it manually here.', 'joli-table-of-contents')),
                'fields' => [

                    [
                        'id' => 'content-selector',
                        'title' => __('Content selector', 'joli-table-of-contents'),
                        'type'  => 'text',
                        'args'  => [
                            'custom' => jtoc_tagify('p', __('Usually not needed. The plugin automatically detects your content container. Only set this if the table of contents (especially the floating TOC) is missing or behaving incorrectly.', 'joli-table-of-contents'), ['class' => 'description']),
                            'desc' => __('CSS selector of the element that contains your main content.', 'joli-table-of-contents'),
                            'placeholder' => '.entry-content',
                        ],
                        'default' => '',
                        'sanitize' => 'selector',
                    ],
                ],
            ],


            // TOC Engine ----------
            [
                'name' => 'toc-engine',
                'title' => __('TOC engine', 'joli-table-of-contents'),
                'desc' => jtoc_tagify(
                    'p',
                    jtoc_tagify('strong', __('[since v2.8.0] ', 'joli-table-of-contents')) .
                        __('The new TOC processing engine enhances efficiency and is PHP 8.2+ compatible. It should be enabled at all times, unless some issues are encountered.', 'joli-table-of-contents')
                ),
                'fields' => [

                    [
                        'id' => 'toc-engine-v2',
                        'title' => __('Use v2 engine', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'is_global' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('The new processing engine increases efficiency and is PHP 8.2+ compatible.', 'joli-table-of-contents'),
                            // 'class' => 'tab-general'
                            'custom' => jtoc_tagify(
                                'p',
                                __('This should be activated by default, unless issues are encountered.', 'joli-table-of-contents'),
                                ['class' => ['description', 'danger']]
                            ),
                        ],
                        'initial_value' => 1, // initial value for new installs
                        'default' => 0, // default value for exisiting installs
                        'sanitize' => 'checkbox',
                        'has_block_attr' => false,
                    ],
                ],
            ],
        ],
    ],
    // END GROUP: General ********************************************************


    // GROUP: HEADINGS ********************************************************
    [
        'group' => 'headings',
        'label' => __('Headings', 'joli-table-of-contents'),
        'icon' => 'headings',
        'sections' => [
            // Scope
            [
                'name' => 'headings-scope',
                'title' => __('Headings scope', 'joli-table-of-contents'),
                'desc' => jtoc_tagify(
                    'p',
                    __('Choose how Joli TOC detects headings in your article.', 'joli-table-of-contents')
                ) .
                    jtoc_tagify(
                        'p',
                        __('Some headings may be added dynamically by shortcodes, blocks, or third-party plugins and might not be visible in the editor. The "Extended" scope ensures these headings are included in the table of contents.', 'joli-table-of-contents')
                    ) .

                    jtoc_tagify(
                        'ul',
                        jtoc_tagify(
                            'li',
                            __('Content — Includes only the headings present in the editor.', 'joli-table-of-contents')
                        ) .
                            jtoc_tagify(
                                'li',
                                __('Extended — Runs after ', 'joli-table-of-contents') .
                                    jtoc_tagify('a', __('the_content', 'joli-table-of-contents'), [
                                        'href' => 'https://developer.wordpress.org/reference/hooks/the_content/',
                                        'target' => '_blank'
                                    ]) .
                                    __(' and includes all headings in the fully rendered article.', 'joli-table-of-contents')
                            ),
                        [
                            'style' => [
                                'list-style-type: disc;',
                                'margin-left: 20px;'
                            ]
                        ]
                    ),
                'fields' => [
                    [
                        'id' => 'headings-scope',
                        'title' => __('Headings scope', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'args' => [
                            'new' => true, /* v3 */
                            'values' => [
                                'content' => __('Content', 'joli-table-of-contents'),
                                'extended' => __('Extended', 'joli-table-of-contents'),
                            ],
                            'values_pro' => [],
                            'custom' => jtoc_tagify('p', __('Select "Content" if you are not sure what scope to use.', 'joli-table-of-contents'), ['class' => ['description']]),
                        ],
                        'default' => 'extended',
                        'sanitize' => 'radio',
                    ],
                ],
            ],
            // Headings processing ----------
            [
                'name' => 'headings-processing',
                'title' => __('Headings processing', 'joli-table-of-contents'),
                'fields' => [
                    [
                        'id' => 'headings-depth',
                        'title' => __('Headings depth', 'joli-table-of-contents'),
                        'type' => 'checkboxes',
                        'args' => [
                            'desc' => __('Select one or more heading levels to include in the table of contents.', 'joli-table-of-contents'),
                            'values' => [
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                            ],
                            'values_pro' => [],
                        ],
                        'default' => 'h2,h3,h4,h5,h6',
                        'sanitize' => 'checkboxes',
                    ],

                    [
                        'id' => 'skip-h-by-text',
                        'title' => __('Skip by text', 'joli-table-of-contents'),
                        'type' => 'textarea',
                        'args' => [
                            'placeholder' => "m*rch\nskip me",
                            'desc' => __('Exclude headings by text (one per line). Use * as a wildcard to match any text. Ex: "m*rch" will match "march" and "merch"', 'joli-table-of-contents'),
                            // 'classes' => 'large-text',
                            // 'custom' => ,
                            'textarea-size' => 'small'
                        ],
                        'sanitize' => 'Textarea'
                    ],

                    [
                        'id' => 'skip-h-by-class',
                        'title' => __('Skip by class', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            'placeholder' => 'my-class',
                            'desc' => __('Ignores headings with the specified CSS classes. For multiple classes, separate by a space. Ex: my-class1 my-class2', 'joli-table-of-contents'),
                        ],
                        'sanitize' => 'text'
                    ],

                    [
                        'id' => 'skip-h-by-ascending-class',
                        'title' => __('Skip by ascending class', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'placeholder' => 'my-class',
                            'desc' => __('Ignores headings whose ancestor has the specified CSS class. For multiple classes, separate by a space. Ex: my-class1 my-class2', 'joli-table-of-contents'),
                        ],
                        'sanitize' => 'text'
                    ],
                ],
            ],

            // Headings hash ----------
            [
                'name' => 'headings-hash',
                'title' => __('Headings hash', 'joli-table-of-contents'),
                'fields' => [
                    [
                        'id' => 'hash-in-url',
                        'title' => __('Show hash in URL', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'desc' => __('Add the hash of the clicked heading to the current URL. Ex: https://mysite.com/my-article/#clicked-heading', 'joli-table-of-contents'),
                        ],
                        'default' => true,
                        'sanitize' => 'checkbox'
                    ],

                    [
                        'id' => 'hash-format',
                        'title' => __('Hash format', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'values' => [
                                'latin' => __('Latin unaccented characters only (#my-heading)', 'joli-table-of-contents'),
                                'all' => __('Latin & non-latin characters (#我的头衔)', 'joli-table-of-contents'),
                                'all-translit' => __('Latin & non-latin transliterated characters (#История => #istoriya)', 'joli-table-of-contents'),
                                'counter' => __('Counter (#section_1, #section_2, etc)', 'joli-table-of-contents'),
                            ],
                            'desc' => __('How anchor IDs are generated. Existing IDs will not be changed. If a heading cannot be processed, a counter will be used as a fallback.', 'joli-table-of-contents'),
                        ],
                        'default' => 'latin',
                    ],

                    // Hash separator (select)
                    [
                        'id' => 'hash-separator',
                        'title' => __('Hash separator', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'new' => true, /* v3 */
                            'values' => [
                                '-' => __('Hyphen (-)', 'joli-table-of-contents'),
                                '_' => __('Underscore (_)', 'joli-table-of-contents'),
                            ],
                            'desc' => __('Character that will replace spaces in the generated hashes. Ex: "My heading" will become #my-heading with the hyphen separator, and #my_heading with the underscore separator.', 'joli-table-of-contents'),
                        ],
                        'default' => '-',
                    ],

                    [
                        'id' => 'hash-counter-prefix',
                        'title' => __('Counter prefix', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            'desc' => __('This setting only applies to the Hash format "Counter" setting.', 'joli-table-of-contents'),
                            'placeholder' => 'section_',
                        ],
                        'default' => 'section_',
                        'sanitize' => 'text',
                    ],
                ],
            ],

            // Headings hover effects
            // [
            //     'name' => 'headings-hover-effects',
            //     'title' => __('Headings hover effects', 'joli-table-of-contents'),
            //     'fields' => [
            // [
            //     'id' => 'activate-headings-hover-effects',
            //     'title' => __('Activate hover effects', 'joli-table-of-contents'),
            //     'type' => 'switch',
            //     'args' => [
            //         // 'new' => true, /* legacy */
            //         'pro' => true,
            //         'desc' => __('Activate hover effects on headings', 'joli-table-of-contents'),
            //         'children' => [
            //             'headings-hover-effect',
            //             'headings-hover-underline-width',
            //             'headings-hover-underline-color',
            //             'headings-hover-underline-style',

            //         ],
            //     ],
            //     'default' => false,
            //     'sanitize' => 'checkbox'
            // ],

            // [
            //     'id' => 'headings-hover-effect',
            //     'title' => __('Hover effect', 'joli-table-of-contents'),
            //     'type' => 'select',
            //     'args' => [
            //         'values' => [
            //             // 'none' => __('None', 'joli-table-of-contents'),
            //             'underline' => __('Underline', 'joli-table-of-contents'),
            //             'highlight' => __('Highlight', 'joli-table-of-contents'),
            //             'slide' => __('Slide', 'joli-table-of-contents'),
            //             'zoom' => __('Zoom', 'joli-table-of-contents'),
            //             // 'stripe' => __('Background stripe', 'joli-table-of-contents'),
            //             // 'glow' => __('Glow', 'joli-table-of-contents'),
            //             // 'sparkles' => __('Sparkles', 'joli-table-of-contents'),
            //             // 'neon' => __('Neon', 'joli-table-of-contents'),
            //             //     text-shadow: -1px -1px 3px var(--jtoc-link-color), 1px 1px 3px var(--jtoc-link-color), 0 0 6px #cc00ff;
            //         ],
            //         'desc' => __('Hover effect on headings', 'joli-table-of-contents'),
            //     ],
            //     'default' => 'none',
            // ],

            // // Hover effect color
            // [
            //     'id' => 'headings-hover-underline-color',
            //     'title' => __('Underline color', 'joli-table-of-contents'),
            //     'type' => 'color',
            //     'class' => '--field-child', // class for the field row (the wrapper), not the input
            //     'args' => [
            //         // 'new' => true, /* legacy */
            //         // 'desc' => __('Headings color', 'joli-table-of-contents'),
            //         'placeholder' => '#ffffff',
            //         'classes' => 'joli-color-picker', //adds color picker
            //         'data' => [
            //             'dependency-field' => 'headings-hover-effect',
            //             'dependency-value' => 'underline',
            //         ],
            //     ],
            //     // 'default' => '#000000',
            //     'sanitize' => 'color',
            //     'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
            // ],

            // // Hover underline width
            // [
            //     'id' => 'headings-hover-underline-width',
            //     'title' => __('Underline width', 'joli-table-of-contents'),
            //     'type' => 'slider',
            //     'class' => '--field-child', // class for the field row (the wrapper), not the input
            //     'args' => [
            //         'values' => [
            //             'xs'  => '0.5px',
            //             's'   => '1px',
            //             'm'   => '1.5px',
            //             'l'   => '2px',
            //             'xl'  => '3px',
            //             'xxl' => '4px',
            //         ],
            //         'labels' => [
            //             'xs'  => '0.5px',
            //             's'   => '1px',
            //             'm'   => '1.5px',
            //             'l'   => '2px',
            //             'xl'  => '3px',
            //             'xxl' => '4px',
            //         ],
            //         'data' => [
            //             'dependency-field' => 'headings-hover-effect',
            //             'dependency-value' => 'underline',
            //         ],
            //     ],
            //     'style' => $slider_style,
            //     'default' => '1px',
            //     'sanitize' => 'values',
            // ],

            // // Hover underline style
            // [
            //     'id' => 'headings-hover-underline-style',
            //     'title' => __('Underline style', 'joli-table-of-contents'),
            //     'type' => 'radio',
            //     'class' => '--field-child', // class for the field row (the wrapper), not the input
            //     'args' => [
            //         'values' => [
            //             'solid' => __('Solid', 'joli-table-of-contents'),
            //             'dotted' => __('Dotted', 'joli-table-of-contents'),
            //             'dashed' => __('Dashed', 'joli-table-of-contents'),
            //             'double' => __('Double', 'joli-table-of-contents'),
            //         ],
            //         'data' => [
            //             'dependency-field' => 'headings-hover-effect',
            //             'dependency-value' => 'underline',
            //         ]
            //     ],
            //     'default' => 'solid',
            //     'sanitize' => 'values',
            // ],

            // [
            //     'id' => 'headings-hover-highlight-color',
            //     'title' => __('Highlight color', 'joli-table-of-contents'),
            //     'type' => 'color',
            //     'class' => '--field-child', // class for the field row (the wrapper), not the input
            //     'args' => [
            //         // 'new' => true, /* legacy */
            //         // 'desc' => __('Headings color', 'joli-table-of-contents'),
            //         'placeholder' => '#ffffff',
            //         'classes' => 'joli-color-picker', //adds color picker
            //         'data' => [
            //             'dependency-field' => 'headings-hover-effect',
            //             'dependency-value' => 'highlight',
            //         ],
            //     ],
            //     // 'default' => '#000000',
            //     'sanitize' => 'color',
            //     'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
            // ],


            //  Effect size
            // [
            //     'id' => 'hover-effect-size',
            //     'title' => __('Hover effect size', 'joli-table-of-contents'),
            //     'type' => 'slider',
            //     'args' => [
            //         's' => __('Small', 'joli-table-of-contents'),
            //         'm' => __('Medium', 'joli-table-of-contents'),
            //         'l' => __('Large', 'joli-table-of-contents'),
            //     ],
            //     'style' => $slider_style,
            // ],
            //     ],
            // ],

            // SEO ----------
            [
                'name' => 'headings-attributes-seo',
                'title' => __('Headings attributes & SEO', 'joli-table-of-contents'),
                'desc' => jtoc_tagify('p', __('To add custom attributes to the headings links, check this documentation: ', 'joli-table-of-contents') . jtoc_tagify(
                    'a',
                    __('joli_toc_item_link_attributes', 'joli-table-of-contents'),
                    [
                        'href' => 'https://wpjoli.com/docs/joli-table-of-contents/developer-hooks/filters/joli_toc_item_link_attributes/',
                        'target' => '_blank'
                    ]
                )),
                'fields' => [
                    [
                        'id' => 'seo-rel-nofollow',
                        'title' => __('Add rel="nofollow"', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            // 'new' => true, /* legacy */
                            // 'pro' => true,
                            'desc' => __('Add a rel="nofollow" attribute to the links.', 'joli-table-of-contents'),
                            // 'custom' => jtoc_tagify('p', __('To add more custom attributes, check this documentation: ', 'joli-table-of-contents') . jtoc_tagify(
                            //     'a',
                            //     __('joli_toc_item_link_attributes', 'joli-table-of-contents'),
                            //     [
                            //         'href' => 'https://wpjoli.com/docs/joli-table-of-contents/developer-hooks/filters/joli_toc_item_link_attributes/',
                            //         'target' => '_blank'
                            //     ]
                            // ), ['class' => 'description']),

                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'disable-title-attr',
                        'title' => __('Disable title attribute', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'new' => true, /* v3 */
                            // 'pro' => true,
                            'desc' => __('Disable the title attribute on table of contents headings.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('Removing the title attribute will prevent the native browser tooltip from appearing on hover. ', 'joli-table-of-contents'), ['class' => 'description']),

                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                ],
            ],

            //Past Headings ----------
            [
                'name' => 'past-headings',
                'title' => __('Past headings', 'joli-table-of-contents'),
                'desc' => jtoc_tagify('p', __('Past headings are the headings before the current active heading.', 'joli-table-of-contents')),
                'fields' => [
                    [
                        'id' => 'fade-past-headings',
                        'title' => __('Fade past headings', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Visually fade the headings that the user has already scrolled past.', 'joli-table-of-contents'),
                            'children' => ['past-headings-opacity'],
                        ],
                        'default' => false,
                        'sanitize' => 'checkbox'
                    ],

                    // Fade opacity
                    [
                        'id' => 'past-headings-opacity',
                        'title' => __('Fade opacity', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'class' => '--field-child',
                        'args' => [
                            'pro' => true,
                            'new' => true, /* v3 */
                            'desc' => __('Opacity of past headings', 'joli-table-of-contents'),
                            'values' => [
                                // '0' => '0%',
                                '0.1' => '10%',
                                '0.2' => '20%',
                                '0.3' => '30%',
                                '0.4' => '40%',
                                '0.5' => '50%',
                                '0.6' => '60%',
                                '0.7' => '70%',
                                '0.8' => '80%',
                                '0.9' => '90%',
                            ],
                            'style' => $slider_style,

                        ],
                        'default' => '0.6',
                        'sanitize' => 'values',
                        // 'value_callback' => 'processSliderValue',
                    ],
                ],
            ],

            // Headings dynamic unfold ----------
            [
                'name' => 'headings-dynamic-unfold',
                'title' => __('Headings dynamic unfold', 'joli-table-of-contents'),
                'fields' => [
                    [
                        'id' => 'activate-dynamic-unfold',
                        'title' => __('Activate dynamic unfold', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('Collapses the table of contents to the first level and automatically expands the active heading.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify(
                                'p',
                                __('This mode works best for a fixed sidebar table of contents or when using the slide-out TOC widget.', 'joli-table-of-contents'),
                                ['class' => 'description']
                            ),
                            // 'classes' => 'joli-color-picker',//adds color picker
                        ],
                        'default' => false,
                        'sanitize' => 'checkbox'
                    ],
                ],
            ],

            //Collapsible Headings ----------
            [
                'name' => 'collapsible-headings',
                'title' => __('Collapsible headings', 'joli-table-of-contents'),
                'fields' => [
                    [
                        'id' => 'activate-collapsible-headings',
                        'title' => __('Activate collapsible headings', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Activates collapsible headings.', 'joli-table-of-contents'),
                        ],
                        'default' => false,
                        'sanitize' => 'checkbox'
                    ],

                    // Collapse on load
                    [
                        'id' => 'collapse-headings-on-load',
                        'title' => __('Collapse on load', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Collapse all headings on load.', 'joli-table-of-contents'),
                        ],
                        'default' => false,
                        'sanitize' => 'checkbox'
                    ],

                    // Collapse mode: only H2 OR All sub headings
                    [
                        'id' => 'collapse-headings-mode',
                        'title' => __('Expand/collapse mode', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'custom' => jtoc_tagify('p', __('Choose which heading levels display expand/collapse controls. Top-level headings expand all their children at once, or allow each nested heading to toggle independently.', 'joli-table-of-contents'), ['class' => 'description']),
                            'values' => [
                                'h2'  => __('Top-level headings only', 'joli-table-of-contents'),
                                'all' => __('All nested headings', 'joli-table-of-contents'),
                            ],
                            'desc' => __('Control which heading levels display expand/collapse toggles.', 'joli-table-of-contents'),
                        ],
                        'default' => 'h2',
                    ],


                    [
                        'id' => 'collapse-headings-icon',
                        'title' => __('Expand/collapse button icon', 'joli-table-of-contents'),
                        'type' => 'lucideicon',
                        'default' => [
                            'icon' => 'chevron-right',
                            'stroke_width' => 2,
                            'size' => 16,
                            'color' => null,
                        ],
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'styles' => ':root{--collapse_headings_icon-stroke-width: 1px;}',
                            'desc' => __('Select an icon that will be shown before headings that have child entries. Adjust the size, stroke width and color.', 'joli-table-of-contents'),
                            'path' => 'assets/public/icons',
                        ],
                        'sanitize' => 'lucideicon',
                        'sanitize_args' => [
                            'icon' => 'string',
                            'stroke_width' => 'float',
                            'size' => 'integer',
                            'color' => 'color',
                        ],
                    ],

                    // Collapse button margin right
                    [
                        'id' => 'collapse-button-spacing',
                        'title' => __('Expand/collapse button spacing', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('This setting only applies to the Toggle type "Icon" setting.', 'joli-table-of-contents'),
                            'placeholder' => '20',
                            // 'classes' => 'joli-color-picker',//adds color picker
                            'custom' => jtoc_tagify('p', __('Space between the toggle button and the heading', 'joli-table-of-contents'), ['class' => 'description']),
                            'values' => [
                                'px' => 'px',
                            ],
                        ],
                        'default' => '6|px',
                        'sanitize' => 'unit',
                    ]
                ],
            ],

            // Top-level headings styling (H2) ----------
            [
                'name' => 'top-level-headings',
                'title' => __('Top-level headings customization (H2)', 'joli-table-of-contents'),
                'desc' => jtoc_tagify('p', __('Make top-level headings (H2) stand out to improve readability.', 'joli-table-of-contents')),
                'fields' => [
                    // Hide top-level headings numeration
                    [
                        'id' => 'tlh-hide-numeration',
                        'title' => __('Hide numbering for top-level headings', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Hide top-level numbering for stylistic purposes.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('Hide numbering for top-level headings only (H2). (Only works when "Headings depth" is set to multiple levels of headings).', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        'default' => false,
                        'sanitize' => 'checkbox',
                    ],

                    // Override default styles switch
                    [
                        'id' => 'tlh-override-styles',
                        'title' => __('Override default styles', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Customize the appearance of top-level headings.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify(
                                'p',
                                __('Enable this option to apply custom styles to top-level headings (H2).', 'joli-table-of-contents'),
                                ['class' => 'description']
                            ),
                            'children' => [
                                'tlh-font-size',
                                'tlh-font-weight',
                                // 'tlh-font-style',
                                'tlh-color',
                                'tlh-text-transform',
                            ],
                        ],
                        'default' => false,
                        'sanitize' => 'checkbox',
                    ],
                    // Font size
                    [
                        'id' => 'tlh-font-size',
                        'title' => __('Font size', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Font size (H2)', 'joli-table-of-contents'),
                            'placeholder' => '16',
                            'values' => [
                                'em' => 'em',
                                'rem' => 'rem',
                                'px' => 'px',
                            ],
                        ],
                        'default' => '1.1|em',
                        'sanitize' => 'unit',
                    ],
                    // Font weight
                    [
                        'id' => 'tlh-font-weight',
                        'title' => __('Font weight', 'joli-table-of-contents'),
                        'type' => 'select',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'values' => $font_weight_list,
                            'desc' => __('Font weight (H2)', 'joli-table-of-contents'),
                        ],
                        'default' => '600',
                    ],
                    // Text color
                    [
                        'id' => 'tlh-color',
                        'title' => __('Headings color (H2)', 'joli-table-of-contents'),
                        'type' => 'color',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Headings color', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                // 'coloris' => 'true',
                            ],
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    // Text transform
                    [
                        'id' => 'tlh-text-transform',
                        'title' => __('Text transform (H2)', 'joli-table-of-contents'),
                        'type' => 'select',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'values' => [
                                'normal' => __('Normal', 'joli-table-of-contents'),
                                'uppercase' => __('Uppercase', 'joli-table-of-contents'),
                                'lowercase' => __('Lowercase', 'joli-table-of-contents'),
                                'capitalize' => __('Capitalize', 'joli-table-of-contents'),
                            ],
                            'desc' => __('Font style (H2)', 'joli-table-of-contents'),
                        ],
                        'default' => 'normal',
                    ],
                    // Add separator (switch)
                    [
                        'id' => 'tlh-add-separator',
                        'title' => __('Add separator', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Add separator', 'joli-table-of-contents'),
                            'children' => [
                                'tlh-separator-style',
                                'tlh-separator-color',
                                'tlh-separator-spacing',
                                // 'tlh-separator-thickness',
                                'tlh-separator-size',
                                // 'tlh-separator-width',
                                'tlh-separator-margin',
                            ],
                            'custom' => jtoc_tagify('p', __('Add a visual separator between top-level headings.', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        'default' => false,
                        'sanitize' => 'checkbox'
                    ],

                    // Separator style
                    [
                        'id' => 'tlh-separator-style',
                        'title' => __('Separator style', 'joli-table-of-contents'),
                        'type' => 'select',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'values' => $separator_style_list,
                            'desc' => __('Separator style', 'joli-table-of-contents'),
                        ],
                        'default' => 'solid',
                    ],

                    // Separator thickness (px)
                    [
                        'id' => 'tlh-separator-size',
                        'title' => __('Separator size (thickness)', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'custom' => jtoc_tagify('p', __('Does not apply to "Blank space" style', 'joli-table-of-contents'), ['class' => 'description']),
                            'values' => [
                                'xs' => '0.67px',
                                's' =>  '1px',
                                'm' =>  '1.5px',
                                'l' =>  '2px',
                                'xl' => '3px',
                                'xxl' => '4px',

                            ],
                            'labels' => [
                                'xs' => __('XS', 'joli-table-of-contents'),
                                's' => __('S', 'joli-table-of-contents'),
                                'm' => __('M', 'joli-table-of-contents'),
                                'l' => __('L', 'joli-table-of-contents'),
                                'xl' => __('XL', 'joli-table-of-contents'),
                                'xxl' => __('XXL', 'joli-table-of-contents'),
                            ],
                            'style' => $slider_style,
                        ],
                        'default' => '1px',
                        'sanitize' => 'values', // values passed in args
                        // 'sanitize_args' => ['0.67px', '1px', '1.5px', '2px', '3px', '4px'], // must be the same as values
                        // 'value_callback' => 'processSliderValue', // Function must be in SettingsCallbacks
                    ],


                    // Separator color
                    [
                        'id' => 'tlh-separator-color',
                        'title' => __('Separator color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Separator color', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                // 'coloris' => 'true',
                            ],
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    // Separator spacing (px)
                    [
                        'id' => 'tlh-separator-spacing',
                        'title' => __('Separator spacing', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Separator spacing', 'joli-table-of-contents'),
                            'values' => [
                                'xxs' => '0.25em',
                                'xs' => '0.5em',
                                's'  => '1em',
                                'm'  => '1.5em',
                                'l'  => '2em',
                                'xl' => '3em',
                            ],
                            'labels' => [
                                'xxs' => __('XXS', 'joli-table-of-contents'),
                                'xs' => __('XS', 'joli-table-of-contents'),
                                's'  => __('S', 'joli-table-of-contents'),
                                'm'  => __('M', 'joli-table-of-contents'),
                                'l'  => __('L', 'joli-table-of-contents'),
                                'xl' => __('XL', 'joli-table-of-contents'),
                            ],
                            'style' => $slider_style,
                        ],
                        'default' => '1em',
                        'sanitize' => 'values', // values passed in args
                        // 'sanitize_args' => ['0.5em', '1em', '1.5em', '2em', '3em'], // must be the same as values
                        // 'value_callback' => 'processSliderValue', // Function must be in SettingsCallbacks
                    ],



                    // Separator actual width (between 10-100%)
                    [
                        'id' => 'tlh-separator-margin',
                        'title' => __('Separator margin (left & right)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'placeholder' => '100',
                            'desc' => __('Separator width', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('Adding a margin will make the separator look smaller', 'joli-table-of-contents'), ['class' => 'description']),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                '%' => '%',
                            ],
                        ],
                        // 'default' => '100%',
                        'sanitize' => 'unit',
                    ],
                ],
            ],
        ],
    ],
    // END GROUP: HEADINGS ********************************************************

    // GROUP: BULLET POINTS ********************************************************
    [
        'group' => 'bullet-points',
        'label' => __('Bullet points', 'joli-table-of-contents'),
        'icon' => 'bullet-points',
        'sections' => [
            // Bullet points
            [
                'name' => 'bullet-points',
                'title' => __('Bullet points', 'joli-table-of-contents'),
                // 'desc' => JTOC()->render(['admin' => 'toc-view'], ['highlight' => 'main'], true),
                'fields' => [
                    [
                        'id' => 'activate-bullet-points',
                        'title' => __('Activate bullet points', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            // 'pro' => false,
                            // 'new' => true, /* legacy */
                            'desc' => __('Activates bullet points on the table of contents.', 'joli-table-of-contents'),
                            'children_sections' => [
                                'bullet-points-settings',
                                'bullet-points-settings-h2',
                                'bullet-points-settings-h3',
                                'bullet-points-settings-h4',
                                'bullet-points-settings-h5',
                                'bullet-points-settings-h6',
                            ],
                            // 'children' => [
                            //     'floating-compatibility-mode',
                            // ],
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                ],
            ],
            // Bullet points settings
            [
                'name' => 'bullet-points-settings',
                'title' => __('Bullet points settings', 'joli-table-of-contents'),
                // 'desc' => jtoc_tagify(
                //     'p',
                //     __('The color palette is a new experimental feature that aims to simplify color customization for themes. At the moment, it only works with the "Vertik" theme.', 'joli-table-of-contents'),
                //     ['class' => ['description', 'danger']]
                // ),
                'fields' => [
                    [
                        'id' => 'bullet-points-headings-depth',
                        'title' => __('Activate for', 'joli-table-of-contents'),
                        'type' => 'checkboxes',
                        'args' => [
                            'desc' => __('Select one or more heading depths to activate bullet points on.', 'joli-table-of-contents'),
                            'values' => [
                                '2' => 'H2',
                                '3' => 'H3',
                                '4' => 'H4',
                                '5' => 'H5',
                                '6' => 'H6',
                            ],
                            'values_pro' => [],
                        ],
                        'default' => '2,3,4,5,6',
                        'sanitize' => 'checkboxes',
                    ],

                    [
                        'id' => 'bullet-points-type',
                        'title' => __('Bullet type', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            // 'pro' => false,
                            // // 'new' => true, /* legacy */
                            'desc' => __('Bullet points type for all headings.', 'joli-table-of-contents'),
                            'values' => [
                                'disc' => __('Disc', 'joli-table-of-contents'),
                                'square' => __('Square', 'joli-table-of-contents'),
                                'pill' => __('Pill', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'disc',
                    ],

                    [
                        'id' => 'bullet-points-color',
                        'title' => __('Bullet color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            // // 'new' => true, /* legacy */
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                // 'coloris' => 'true',
                            ],
                        ],
                        // 'default' => '#adadad',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    [
                        'id' => 'bullet-points-size',
                        'title' => __('Bullet size', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            // 'pro' => false,
                            // // 'new' => true, /* legacy */
                            'desc' => __('Size of the bullet points.', 'joli-table-of-contents'),
                            'values' => [
                                's' => __('Small', 'joli-table-of-contents'),
                                'm' => __('Medium', 'joli-table-of-contents'),
                                'l' => __('Large', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 's',
                    ],

                    // [
                    //     'id' => 'bullet-points-size-h2',
                    //     'title' => __('Bullet size (H2)', 'joli-table-of-contents'),
                    //     'type' => 'slider',
                    //     'args' => [
                    //         // 'pro' => false,
                    //         // // 'new' => true, /* legacy */
                    //         'desc' => __('Size of the bullet points.', 'joli-table-of-contents'),
                    //         'values' => [
                    //             's' => __('Small', 'joli-table-of-contents'),
                    //             'm' => __('Medium', 'joli-table-of-contents'),
                    //             'l' => __('Large', 'joli-table-of-contents'),
                    //             'xl' => __('XL', 'joli-table-of-contents'),
                    //             '2xl' => __('2XL', 'joli-table-of-contents'),
                    //             '3xl' => __('3XL', 'joli-table-of-contents'),
                    //         ],
                    //         'style' => $slider_style,
                    //         // 'nullable' => true,
                    //     ],
                    //     'default' => 's',
                    // ],
                ],
            ],
            // Bullet points settings override H2
            // [
            //     'name' => 'bullet-points-settings-h2',
            //     'title' => __('H2 Bullet points settings', 'joli-table-of-contents'),
            //     // 'desc' => jtoc_tagify(
            //     //     'p',
            //     //     __('The color palette is a new experimental feature that aims to simplify color customization for themes. At the moment, it only works with the "Vertik" theme.', 'joli-table-of-contents'),
            //     //     ['class' => ['description', 'danger']]
            //     // ),
            //     'fields' => [
            //         [
            //             'id' => 'bullet-points-type-h2',
            //             'title' => __('Bullet type', 'joli-table-of-contents'),
            //             'type' => 'select',
            //             'args' => [
            //                 'pro' => true,
            //                 // 'new' => true, /* legacy */
            //                 'desc' => __('Bullet points type for all headings.', 'joli-table-of-contents'),
            //                 'values' => [
            //                     'inherit' => __('[inherit]', 'joli-table-of-contents'),
            //                     'disc' => __('Disc', 'joli-table-of-contents'),
            //                     'square' => __('Square', 'joli-table-of-contents'),
            //                     'pill' => __('Pill', 'joli-table-of-contents'),
            //                 ],
            //             ],
            //             'default' => 'inherit',
            //         ],

            //         [
            //             'id' => 'bullet-points-color-h2',
            //             'title' => __('Bullet color', 'joli-table-of-contents'),
            //             'type' => 'text',
            //             'args' => [
            //                 'placeholder' => '#ffffff',
            //                 'classes' => 'joli-color-picker', //adds color picker
            //                 'data' => [
            //                     'alpha-enabled' => 'true',
            //                     'alpha-color-type' => 'hex',
            //                 ],
            //             ],
            //             // 'default' => '#adadad',
            //             'sanitize' => 'color',
            //         ],

            //         [
            //             'id' => 'bullet-points-size-h2',
            //             'title' => __('Bullet size', 'joli-table-of-contents'),
            //             'type' => 'select',
            //             'args' => [
            //                 'pro' => true,
            //                 // 'new' => true, /* legacy */
            //                 'desc' => __('Size of the bullet points.', 'joli-table-of-contents'),
            //                 'values' => [
            //                     'inherit' => __('[inherit]', 'joli-table-of-contents'),
            //                     's' => __('Small', 'joli-table-of-contents'),
            //                     'm' => __('Medium', 'joli-table-of-contents'),
            //                     'l' => __('Large', 'joli-table-of-contents'),
            //                 ],
            //             ],
            //             'default' => 's',
            //         ],
            //     ],
            // ],
        ],
    ],

    // GROUP: AUTO-INSERT ********************************************************
    [
        'group' => 'auto-insert',
        'label' => __('Auto-insert', 'joli-table-of-contents'),
        'icon' => 'external-browser',
        // 'args' => [
        //     'post_type_settings' => false,
        // ],
        'sections' => [
            // Auto-insert behaviour ----------
            // [
            //     'name' => 'auto-insert',
            //     'title' => __('Auto-insert', 'joli-table-of-contents'),
            //     'fields' => [

            //         [
            //             'id' => 'activate-auto-insert',
            //             'title' => __('Activate auto-insert table of contents', 'joli-table-of-contents'),
            //             'type' => 'switch',
            //             'args' => [
            //                 'pro' => true,
            //                 'desc' => __('Activates the auto-insert mode', 'joli-table-of-contents'),
            //                 'children_sections' => [
            //                     'auto-insert-settings',
            //                     'post-inclusion',
            //                     'post-exclusion',
            //                 ],
            //                 // 'children' => [
            //                 //     'position-auto',
            //                 //     'auto-insert-post-types',
            //                 //     'inclusion-post-title',
            //                 //     'inclusion-post-id',
            //                 //     'exclusion-post-title',
            //                 //     'exclusion-post-id',
            //                 // ],
            //             ],
            //             'default' => 0,
            //             'sanitize' => 'checkbox',
            //         ],

            //     ],
            // ],
            // Auto-insert behaviour ----------
            [
                'name' => 'auto-insert-settings',
                'title' => __('Auto-insert settings', 'joli-table-of-contents'),
                'fields' => [
                    [
                        'id' => 'position-auto',
                        'title' => __('TOC Position', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'desc' => __('Where in the content the table of contents should be automatically inserted.', 'joli-table-of-contents'),
                            'values' => [ //value =>display
                                'before-content' => __('Before the content', 'joli-table-of-contents'),
                                'after-content' => __('After the content', 'joli-table-of-contents'),
                                'before-h1' => __('Before H1', 'joli-table-of-contents'),
                                'after-h1' => __('After H1', 'joli-table-of-contents'),
                                'before-h2-1' => __('Before first H2 tag', 'joli-table-of-contents'),
                                'after-h2-1' => __('After first H2 tag', 'joli-table-of-contents'),
                                'after-p-1' => __('After first paragraph', 'joli-table-of-contents'),
                                'before-img-1' => __('Before first image', 'joli-table-of-contents'),
                                'after-img-1' => __('After first image', 'joli-table-of-contents'),
                            ],
                            'default' => 'before-content',
                        ],
                        'has_block_attr' => false,
                        // 'is_global' => true,
                    ],
                ],
            ],

            // Post selection ----------
            [
                'name' => 'post-inclusion',
                'title' => __('Auto-insert inclusion rules', 'joli-table-of-contents'),
                'desc' => jtoc_tagify('p', __('This section only applies to the global settings', 'joli-table-of-contents')),
                'fields' => [
                    [
                        'id' => 'auto-insert-post-types',
                        'title' => __('Post type', 'joli-table-of-contents'),
                        'type' => 'posttype',
                        'args' => [
                            'desc' => __('Auto-insert the table of contents on specific post types.', 'joli-table-of-contents'),
                            // 'placeholder' => 'Table of contents',
                            'is_global' => true,
                        ],
                        'default' => [],
                        'has_block_attr' => false,
                    ],

                    [
                        'id' => 'inclusion-post-title',
                        'title' => __('Post title', 'joli-table-of-contents'),
                        'type' => 'textarea',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'placeholder' => "m*rch\nskip me",
                            'desc' => __('Include posts that contain a specific phrase (one per line). Use * as a wildcard to match any text. Ex: "m*rch" will match "march" and "merch"', 'joli-table-of-contents'),
                            // 'classes' => 'large-text',
                            // 'custom' => ,
                            'textarea-size' => 'small',
                            'is_global' => true,
                        ],
                        'has_block_attr' => false,
                        'sanitize' => 'Textarea',
                    ],

                    [
                        'id' => 'inclusion-post-id',
                        'title' => __('Post ID', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'placeholder' => '123,234',
                            'desc' => __('Include specific posts by their ID. For multiple IDs, separate by a comma. Ex: 123,234,345', 'joli-table-of-contents'),
                            'is_global' => true,
                        ],
                        'has_block_attr' => false,
                        'sanitize' => 'text'
                    ],
                ],
            ],

            // Post exclusion ----------
            [
                'name' => 'post-exclusion',
                'title' => __('Auto-insert exclusion rules', 'joli-table-of-contents'),
                'desc' => jtoc_tagify('p', __('This section only applies to the global settings', 'joli-table-of-contents')),
                'fields' => [
                    [
                        'id' => 'exclusion-post-title',
                        'title' => __('Post title', 'joli-table-of-contents'),
                        'type' => 'textarea',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'placeholder' => "m*rch\nskip me",
                            'desc' => __('Exclude posts that contain a specific phrase (one per line). Use * as a wildcard to match any text. Ex: "m*rch" will match "march" and "merch"', 'joli-table-of-contents'),
                            // 'classes' => 'large-text',
                            // 'custom' => ,
                            'textarea-size' => 'small',
                            'is_global' => true,
                        ],
                        'has_block_attr' => false,
                        'sanitize' => 'Textarea'
                    ],

                    [
                        'id' => 'exclusion-post-id',
                        'title' => __('Post ID', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'placeholder' => '123,234',
                            'desc' => __('Ignore specific posts by their ID. For multiple IDs, separate by a comma. Ex: 123,234,345', 'joli-table-of-contents'),
                            'is_global' => true,
                        ],
                        'has_block_attr' => false,
                        'sanitize' => 'text'
                    ],
                ],
            ],
        ],
    ],
    // END GROUP: AUTO-INSERT ********************************************************

    // GROUP: WIDGET SUPPORT ********************************************************
    [
        'group' => 'widget-support',
        'label' => __('Widget support', 'joli-table-of-contents'),
        'icon' => 'widget-support',
        'args' => [
            'post_type_settings' => false,
        ],
        'sections' => [

            // Post selection ----------
            [
                'name' => 'widget-support-post-inclusion',
                'title' => __('Enable widget support', 'joli-table-of-contents'),
                'desc' => jtoc_tagify('p', __('You need to enable widget support if you plan to use the Table of contents inside a sidebar widget (Appearance > Widgets)', 'joli-table-of-contents')),
                'fields' => [
                    [
                        'id' => 'widget-support-post-types',
                        'title' => __('Post type', 'joli-table-of-contents'),
                        'type' => 'posttype',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'desc' => __('Enables support for selected post type. Use this setting if you are using a Joli Table of contents block or shortcode inside a sidebar widget (Appearance > Widgets)', 'joli-table-of-contents'),
                            // 'placeholder' => 'Table of contents',
                            'is_global' => true,
                        ],
                        'has_block_attr' => false,
                    ],
                ],
            ],
        ],
    ],
    // END GROUP: WIDGET SUPPORT ********************************************************

    // GROUP: THEME ********************************************************
    [
        'group' => 'theme',
        'label' => __('Theme & Colors', 'joli-table-of-contents'),
        'icon' => 'canvas',
        'sections' => [
            // Base theme ----------
            [
                'name' => 'base-theme',
                'title' => __('Base theme', 'joli-table-of-contents'),
                // 'desc' => JTOC()->render(['admin' => 'toc-view'], ['highlight' => 'main'], true),
                'fields' => [
                    // Dark mode
                    [
                        'id' => 'theme-dark-mode',
                        'title' => __('Dark mode', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'new' => true, /* v3 */
                            'desc' => __('Enables automatic dark mode for the selected theme.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('The dark mode only works for v3 themes. For legacy themes, the dark mode is not available.', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],
                    [
                        'id' => 'theme',
                        'title' => __('Theme', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'desc' => sprintf('<span>%s</span>', __('The theme will define the look and feel of the table of contents. Override any theme preset in the STYLES tab. For advanced users, you can create your own theme.', 'joli-table-of-contents')),
                            'custom' => jtoc_tagify(
                                'p',
                                jtoc_tagify(
                                    'a',
                                    __('How to create your own theme ?', 'joli-table-of-contents'),
                                    [
                                        'href' => 'https://wpjoli.com/docs/joli-table-of-contents/customizing/create-my-own-theme/',
                                        'target' => '_blank'
                                    ]
                                )
                            ) . jtoc_tagify(
                                'p',
                                __('Go to the STYLES tab to add a border, round the corners, change the colors, or any other setting available !', 'joli-table-of-contents'),
                                ['class' => 'description']
                            ),
                            'data' => [ // data attributes to pass to the field
                                'theme-colors-info' => '1',
                                'theme-details' => json_encode(include JTOC()->path('config/theme_details.php'))
                            ],
                            'values' => [
                                'none' => __('[no theme]', 'joli-table-of-contents'),
                                '-v3-' => __('- v3 themes -', 'joli-table-of-contents'),
                                'default-v3' => __('Default (v3)', 'joli-table-of-contents'),
                                'original-v3' => __('Original (v3)', 'joli-table-of-contents'),
                                'hero' => __('Hero (v3)', 'joli-table-of-contents'),
                                '-v3-pro-' => __('- v3 pro themes -', 'joli-table-of-contents'),
                                'modern-v3' => __('Modern (v3)', 'joli-table-of-contents'),
                                'mantis' => __('Mantis (v3)', 'joli-table-of-contents'),
                                'flowline' => __('Flowline (v3)', 'joli-table-of-contents'),
                                'vertik-v3' => __('Vertik (v3)', 'joli-table-of-contents'),
                                // 'glass' => __('Glass (v3)', 'joli-table-of-contents'),
                                'aurora' => __('Aurora', 'joli-table-of-contents'),
                                // 'sequoia' => __('Sequoia', 'joli-table-of-contents'),
                                '-legacy-' => __('- legacy themes -', 'joli-table-of-contents'),
                                'basic-light' => __('Basic light', 'joli-table-of-contents'),
                                'basic-dark' => __('Basic dark', 'joli-table-of-contents'),
                                'original' => __('Original', 'joli-table-of-contents'),
                                'original-dark' => __('Original dark', 'joli-table-of-contents'),
                                'wikipedia' => __('Wikipedia', 'joli-table-of-contents'),
                                '-legacy-pro-' => __('- legacy pro themes -', 'joli-table-of-contents'),
                                'metro' => __('Metro', 'joli-table-of-contents'),
                                'modern' => __('Modern', 'joli-table-of-contents'),
                                // 'dark' => __('Dark', 'joli-table-of-contents'),
                                // 'classic' => __('Classic', 'joli-table-of-contents'),
                                // 'classic-dark' => __('Classic dark', 'joli-table-of-contents'),
                                'smooth' => __('Smooth', 'joli-table-of-contents'),
                                'smooth-flat-gray' => __('Smooth flat gray', 'joli-table-of-contents'),
                                'silky-light' => __('Silky light', 'joli-table-of-contents'),
                                'clean-rounded' => __('Clean rounded', 'joli-table-of-contents'),
                                'vertik' => __('Vertik', 'joli-table-of-contents'),
                            ],
                            'values_disabled' => [
                                '-v3-',
                                '-v3-pro-',
                                '-legacy-',
                                '-legacy-pro-',
                            ],
                            'values_pro' => [
                                'metro',
                                'modern',
                                'modern-v3',
                                'mantis',
                                'flowline',
                                'smooth',
                                'smooth-flat-gray',
                                'silky-light',
                                'clean-rounded',
                                'vertik',
                                'vertik-v3',
                                'sequoia',
                                'glass',
                                // 'hero',
                                'aurora',
                            ],
                            'values_custom' => 'jtoc_custom_themes', //JS var to pickup data from
                            // 'media' => [
                            //     // 'default' => 'default.png',
                            //     'default-v3' => 'themes/default-v3.webp',
                            //     'original-v3' => 'themes/original-v3.webp',
                            //     'hero' => 'themes/hero.webp',
                            //     'modern-v3' => 'themes/modern-v3.webp',
                            //     'mantis' => 'themes/mantis.webp',
                            //     'flowline' => 'themes/flowline.webp',
                            //     'vertik-v3' => 'themes/vertik.png',
                            //     'glass' => 'themes/vertik.png',
                            //     'sequoia' => 'themes/vertik.png',
                            //     'aurora' => 'themes/original.png',
                            //     'basic-light' => 'themes/basic-light.png',
                            //     'basic-dark' => 'themes/basic-dark.png',
                            //     'original' => 'themes/original.png',
                            //     'original-dark' => 'themes/original-dark.png',
                            //     'metro' => 'themes/metro.png',
                            //     'modern' => 'themes/modern.png',
                            //     'wikipedia' => 'themes/wikipedia.png',
                            //     'smooth' => 'themes/smooth.png',
                            //     'smooth-flat-gray' => 'themes/smooth-flat-gray.png',
                            //     'silky-light' => 'themes/silky-light.png',
                            //     'clean-rounded' => 'themes/clean-rounded.png',
                            //     'vertik' => 'themes/vertik.png',
                            // ],
                            'media' => [
                                'default-v3' => ['path' => 'themes/default-v3.webp', 'scale' => 2],
                                'original-v3' => ['path' => 'themes/original-v3.webp', 'scale' => 2],
                                'hero' => ['path' => 'themes/hero.webp', 'scale' => 2],

                                // 'modern-v3' => ['path' => 'themes/modern-v3.webp', 'scale' => 2],
                                // 'mantis' => ['path' => 'themes/mantis.webp', 'scale' => 2],
                                // 'flowline' => ['path' => 'themes/flowline.webp', 'scale' => 1.5], 
                                // 'vertik-v3' => ['path' => 'themes/vertik-v3.webp', 'scale' => 2],
                                // 'glass' => ['path' => 'themes/vertik.png', 'scale' => 2],
                                // 'sequoia' => ['path' => 'themes/vertik.png', 'scale' => 2],
                                // 'aurora' => ['path' => 'themes/aurora.webp', 'scale' => 2],

                                'modern-v3' => ['url' => 'https://wpjoli.com/resources/joli-table-of-contents/modern-v3.webp', 'scale' => 2],
                                'mantis'    => ['url' => 'https://wpjoli.com/resources/joli-table-of-contents/mantis.webp', 'scale' => 2],
                                'flowline'  => ['url' => 'https://wpjoli.com/resources/joli-table-of-contents/flowline.webp', 'scale' => 1.5],
                                'vertik-v3' => ['url' => 'https://wpjoli.com/resources/joli-table-of-contents/vertik-v3.webp', 'scale' => 2],
                                // 'glass'     => ['url' => 'https://wpjoli.com/resources/joli-table-of-contents/vertik.png', 'scale' => 2],
                                // 'sequoia'   => ['url' => 'https://wpjoli.com/resources/joli-table-of-contents/vertik.png', 'scale' => 2],
                                'aurora'    => ['url' => 'https://wpjoli.com/resources/joli-table-of-contents/aurora.webp', 'scale' => 2],

                                'basic-light' => ['path' => 'themes/basic-light.png', 'scale' => 1],
                                'basic-dark' => ['path' => 'themes/basic-dark.png', 'scale' => 1],
                                'original' => ['path' => 'themes/original.png', 'scale' => 1],
                                'original-dark' => ['path' => 'themes/original-dark.png', 'scale' => 1],
                                'metro' => ['path' => 'themes/metro.png', 'scale' => 1],
                                'modern' => ['path' => 'themes/modern.png', 'scale' => 1],
                                'wikipedia' => ['path' => 'themes/wikipedia.png', 'scale' => 1],
                                'smooth' => ['path' => 'themes/smooth.png', 'scale' => 1],
                                'smooth-flat-gray' => ['path' => 'themes/smooth-flat-gray.png', 'scale' => 1],
                                'silky-light' => ['path' => 'themes/silky-light.png', 'scale' => 1],
                                'clean-rounded' => ['path' => 'themes/clean-rounded.png', 'scale' => 1],
                                'vertik' => ['path' => 'themes/vertik.png', 'scale' => 1],
                            ],
                            // 'media_2x' => [
                            //     'default-v3',
                            //     'original-v3',
                            //     'vertik',
                            //     'vertik-v3',
                            //     'sequoia',
                            //     'glass',
                            //     'hero',
                            //     'aurora',
                            //     'modern-v3',
                            //     'mantis',
                            //     'flowline',
                            //     // 'basic-light' => 'themes/basic-light@2x.png',
                            //     // 'basic-dark' => 'themes/basic-dark@2x.png',
                            //     // 'original' => 'themes/original@2x.png',
                            //     // 'original-dark' => 'themes/original-dark@2x.png',
                            //     // 'metro' => 'themes/metro@2x.png',
                            //     // 'modern' => 'themes/modern@2x.png',
                            //     // 'wikipedia' => 'themes/wikipedia@2x.png',
                            //     // 'smooth' => 'themes/smooth@2x.png',
                            //     // 'smooth-flat-gray' => 'themes/smooth-flat-gray@2x.png',
                            //     // 'silky-light' => 'themes/silky-light@2x.png',
                            //     // 'clean-rounded' => 'themes/clean-rounded@2x.png',
                            // ],
                        ],
                        'default' => 'default-v3',
                    ],

                    [
                        'id' => 'preserve-theme-styles',
                        'title' => __('Preserve theme styles', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'desc' => __("Check this option to disable all custom styles from the STYLES tab and preserve the selected theme's default styles", 'joli-table-of-contents'),
                            // 'classes' => 'joli-color-picker',//adds color picker
                        ],
                        'default' => false,
                        'sanitize' => 'checkbox'
                    ],
                ],
            ],
            // Theme options
            [
                'name' => 'theme-options',
                'title' => __('Theme-specific options', 'joli-table-of-contents'),
                'desc' => jtoc_tagify(
                    'p',
                    __('The options below are specific to the selected theme', 'joli-table-of-contents'),
                    ['class' => ['description']]
                ),
                'fields' => [
                    // Show background image
                    [
                        'id' => 'theme-soft-background-gradient',
                        'title' => __('Soft background gradient', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'class' => '--theme-option', // marks the table row as a theme option so we can hide/show it later
                        'args' => [
                            'new' => true, /* v3 */
                            'desc' => __("Check this option to add a soft background gradient to the table of contents body", 'joli-table-of-contents'),
                            'classes' => 'joli-theme-options', //adds color picker
                            'data' => [
                                'is-theme-option' => '1',
                                'theme-option-for' => ['default-v3', 'original-v3', 'hero'],
                            ],
                        ],
                        'default' => false,
                        'sanitize' => 'checkbox',
                    ],

                    // Flowline type (select)
                    [
                        'id' => 'theme-indicator-type',
                        'title' => __('Indicator type', 'joli-table-of-contents'),
                        'type' => 'select',
                        'class' => '--theme-option',
                        'args' => [
                            'new' => true, /* v3 */
                            'desc' => __("Select the indicator type", 'joli-table-of-contents'),
                            'values' => [
                                '' => __('Default', 'joli-table-of-contents'),
                                'circle' => __('Circle', 'joli-table-of-contents'),
                                'disc' => __('Disc', 'joli-table-of-contents'),
                                'square' => __('Square', 'joli-table-of-contents'),
                                'triangle' => __('Triangle', 'joli-table-of-contents'),
                                'line' => __('Line', 'joli-table-of-contents'),
                                'line-gradient' => __('Line (gradient)', 'joli-table-of-contents'),
                                'frame' => __('Frame', 'joli-table-of-contents'),
                            ],
                            'data' => [
                                'is-theme-option' => '1',
                                'theme-option-for' => ['flowline'],
                            ],
                            // 'classes' => '--vertik-v3',
                        ],
                        'default' => '',
                        'sanitize' => 'values',
                    ],

                    // Indicator size
                    [
                        'id' => 'theme-indicator-size',
                        'title' => __('Indicator size', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'class' => '--theme-option',
                        'args' => [
                            'new' => true, /* v3 */
                            'desc' => __("Adjust the size of the indicator", 'joli-table-of-contents'),
                            'style' => $slider_style,
                            'nullable' => true,
                            'data' => [
                                'is-theme-option' => '1',
                                // 'theme-option-for' => ['flowline', 'mantis', 'modern-v3', 'sequoia'],
                                'theme-option-for' => ['flowline'],
                            ],
                            'values' => [
                                'xs'  => '4px',
                                's'   => '6px',
                                'm'   => '8px',
                                'l'   => '10px',
                                'xl'  => '12px',
                                'xxl' => '14px',
                            ],
                            'labels' => [
                                'xs'  => __('XS', 'joli-table-of-contents'),
                                's'   => __('S', 'joli-table-of-contents'),
                                'm'   => __('M', 'joli-table-of-contents'),
                                'l'   => __('L', 'joli-table-of-contents'),
                                'xl'  => __('XL', 'joli-table-of-contents'),
                                'xxl' => __('XXL', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => '8px',
                        'sanitize' => 'values',
                    ],

                    // Thread width
                    [
                        'id' => 'theme-indicator-thread-width',
                        'title' => __('Indicator thread width', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'class' => '--theme-option',
                        'args' => [
                            'new' => true, /* v3 */
                            'desc' => __("Adjust the width of the indicator thread", 'joli-table-of-contents'),
                            'style' => $slider_style,
                            'nullable' => true,
                            'data' => [
                                'is-theme-option' => '1',
                                'theme-option-for' => ['flowline', 'mantis', 'modern-v3', 'sequoia'],
                            ],
                            'values' => [
                                'xxs' => '0.67px',
                                'xs'  => '1px',
                                's'   => '2px',
                                'm'   => '3px',
                                'l'   => '4px',
                                'xl'  => '6px',
                                'xxl' => '8px',
                            ],
                            'labels' => [
                                'xxs' => __('XXS', 'joli-table-of-contents'),
                                'xs'  => __('XS', 'joli-table-of-contents'),
                                's'   => __('S', 'joli-table-of-contents'),
                                'm'   => __('M', 'joli-table-of-contents'),
                                'l'   => __('L', 'joli-table-of-contents'),
                                'xl'  => __('XL', 'joli-table-of-contents'),
                                'xxl' => __('XXL', 'joli-table-of-contents'),
                            ],
                            // 'classes' => '--vertik-v3',
                        ],
                        'default' => 'default',
                        'sanitize' => 'values',
                        // 'value_callback' => 'processSliderValue', // Function must be in SettingsCallbacks
                    ],

                    // Headings hover style
                    [
                        'id' => 'headings-hover-style',
                        'title' => __('Headings hover style', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'class' => '--theme-option',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Select the style of the heading hover', 'joli-table-of-contents'),
                            'values' => [
                                'soft' => __('Soft', 'joli-table-of-contents'),
                                'solid' => __('Solid', 'joli-table-of-contents'),
                                // 'outline' => __('Outline', 'joli-table-of-contents'),
                            ],
                            'data' => [
                                'is-theme-option' => '1',
                                'theme-option-for' => ['original-v3'],
                            ],
                        ],
                        'default' => 'soft',
                        'sanitize' => 'values',
                    ],

                    [
                        'id' => 'activate-headings-hover-effects',
                        'title' => __('Headings hover effects', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'class' => '--theme-option',
                        'args' => [
                            'new' => true, /* v3 */
                            // 'pro' => false,
                            'desc' => __('Activate hover effects on headings', 'joli-table-of-contents'),
                            'children' => [
                                'headings-hover-effect',
                                'headings-hover-underline-width',
                                'headings-hover-underline-color',
                                'headings-hover-underline-style',
                                'headings-hover-underline-offset',
                            ],
                            'data' => [
                                'is-theme-option' => '1',
                                'theme-option-for' => ['default-v3'],
                            ],
                        ],
                        'default' => false,
                        'sanitize' => 'checkbox'
                    ],

                    [
                        'id' => 'headings-hover-effect',
                        'title' => __('Hover effect', 'joli-table-of-contents'),
                        'type' => 'select',
                        'class' => '--field-child --theme-option',
                        'args' => [
                            'new' => true, /* v3 */
                            'values' => [
                                // 'none' => __('None', 'joli-table-of-contents'),
                                'underline' => __('Underline', 'joli-table-of-contents'),
                                'highlight' => __('Highlight', 'joli-table-of-contents'),
                                'slide' => __('Slide', 'joli-table-of-contents'),
                                'zoom' => __('Zoom', 'joli-table-of-contents'),
                                // 'stripe' => __('Background stripe', 'joli-table-of-contents'),
                                // 'glow' => __('Glow', 'joli-table-of-contents'),
                                // 'sparkles' => __('Sparkles', 'joli-table-of-contents'),
                                // 'neon' => __('Neon', 'joli-table-of-contents'),
                                //     text-shadow: -1px -1px 3px var(--jtoc-link-color), 1px 1px 3px var(--jtoc-link-color), 0 0 6px #cc00ff;
                            ],
                            'values_pro' => [
                                'highlight',
                                'slide',
                                'zoom',
                            ],
                            'desc' => __('Hover effect on headings', 'joli-table-of-contents'),
                            'data' => [
                                'is-theme-option' => '1',
                                'theme-option-for' => ['default-v3'],
                            ],
                        ],
                        'default' => 'underline',
                    ],

                    // Hover underline style
                    [
                        'id' => 'headings-hover-underline-style',
                        'title' => __('Underline style', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'class' => '--field-child --theme-option', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'values' => [
                                'solid' => __('Solid', 'joli-table-of-contents'),
                                'dotted' => __('Dotted', 'joli-table-of-contents'),
                                'dashed' => __('Dashed', 'joli-table-of-contents'),
                                'double' => __('Double', 'joli-table-of-contents'),
                            ],
                            'data' => [
                                'dependency-field' => 'headings-hover-effect',
                                'dependency-value' => 'underline',
                                'is-theme-option' => '1',
                                'theme-option-for' => ['default-v3'],
                            ],
                        ],
                        'default' => 'solid',
                        'sanitize' => 'values',
                    ],

                    // Hover effect color
                    [
                        'id' => 'headings-hover-underline-color',
                        'title' => __('Underline color', 'joli-table-of-contents'),
                        'type' => 'color',
                        // 'class' => '--theme-option',
                        'class' => '--field-child --theme-option', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            // 'pro' => false,
                            // 'desc' => __('Headings color', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('Default color is the same as the link color', 'joli-table-of-contents'), ['class' => 'description']),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'dependency-field' => 'headings-hover-effect',
                                'dependency-value' => 'underline',
                                'is-theme-option' => '1',
                                'theme-option-for' => ['default-v3'],
                            ],
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    // Hover underline width
                    [
                        'id' => 'headings-hover-underline-width',
                        'title' => __('Underline width', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'class' => '--field-child --theme-option', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'nullable' => true,
                            'values' => [
                                'xs'  => '0.5px',
                                's'   => '1px',
                                'm'   => '1.5px',
                                'l'   => '2px',
                                'xl'  => '3px',
                                'xxl' => '4px',
                            ],
                            'labels' => [
                                'xs'  => __('XS', 'joli-table-of-contents'),
                                's'   => __('S', 'joli-table-of-contents'),
                                'm'   => __('M', 'joli-table-of-contents'),
                                'l'   => __('L', 'joli-table-of-contents'),
                                'xl'  => __('XL', 'joli-table-of-contents'),
                                'xxl' => __('XXL', 'joli-table-of-contents'),
                            ],
                            'data' => [
                                'dependency-field' => 'headings-hover-effect',
                                'dependency-value' => 'underline',
                                'is-theme-option' => '1',
                                'theme-option-for' => ['default-v3'],
                            ],
                        ],
                        'style' => $slider_style,
                        'default' => '1px',
                        'sanitize' => 'values',
                    ],

                    // Theme border width
                    [
                        'id' => 'theme-border-width',
                        'title' => __('Theme border width', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'class' => '--theme-option', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'nullable' => true,
                            'values' => [
                                'none'  => '0px',
                                's'   => '1px',
                                'm'   => '2px',
                                'l'   => '3px',
                                'xl'  => '4px',
                                'xxl' => '5px',
                            ],
                            'labels' => [
                                'none'  => __('None', 'joli-table-of-contents'),
                                's' => __('S', 'joli-table-of-contents'),
                                'm' => __('M', 'joli-table-of-contents'),
                                'l' => __('L', 'joli-table-of-contents'),
                                'xl' => __('XL', 'joli-table-of-contents'),
                                'xxl'   => __('XXL', 'joli-table-of-contents'),
                            ],
                            'data' => [
                                'is-theme-option' => '1',
                                'theme-option-for' => ['aurora'],
                            ],
                        ],
                        'style' => $slider_style,
                        // 'default' => '3px',
                        'sanitize' => 'values',
                    ],

                    // Hover underline offset (slider)
                    [
                        'id' => 'headings-hover-underline-offset',
                        'title' => __('Underline offset', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'class' => '--field-child --theme-option', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'nullable' => true,
                            'values' => [
                                'xxs' => '0.05em',
                                'xs'  => '0.1em',
                                's'   => '0.15em',
                                'm'   => '0.2em',
                                'l'  => '0.3em',
                                'xl' => '0.4em',
                            ],
                            'labels' => [
                                'xxs' => __('XXS', 'joli-table-of-contents'),
                                'xs'  => __('XS', 'joli-table-of-contents'),
                                's' => __('S', 'joli-table-of-contents'),
                                'm' => __('M', 'joli-table-of-contents'),
                                'l' => __('L', 'joli-table-of-contents'),
                                'xl' => __('XL', 'joli-table-of-contents'),
                            ],
                            'data' => [
                                'dependency-field' => 'headings-hover-effect',
                                'dependency-value' => 'underline',
                                'is-theme-option' => '1',
                                'theme-option-for' => ['default-v3'],
                            ],
                        ],
                        'style' => $slider_style,
                        'default' => '0.15em',
                        'sanitize' => 'values',
                    ],

                    [
                        'id' => 'headings-hover-highlight-color',
                        'title' => __('Highlight color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'class' => '--field-child --theme-option', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            // 'desc' => __('Headings color', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'dependency-field' => 'headings-hover-effect',
                                'dependency-value' => 'highlight',
                                'is-theme-option' => '1',
                                'theme-option-for' => ['default-v3'],
                            ],
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    // Aurora color scheme
                    [
                        'id' => 'theme-aurora-color-scheme',
                        'title' => __('Aurora color scheme', 'joli-table-of-contents'),
                        'type' => 'select',
                        'class' => '--theme-option', // class for the field row (the wrapper), not the input
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'data' => [
                                'is-theme-option' => '1',
                                'theme-option-for' => ['aurora'],
                            ],
                            'values' => [
                                'default' => __('Default', 'joli-table-of-contents'),

                                /* ----- METALLIC ----- */
                                'gold' => __('Gold', 'joli-table-of-contents'),
                                'platinum' => __('Platinum', 'joli-table-of-contents'),
                                'bronze' => __('Bronze', 'joli-table-of-contents'),
                                'titanium' => __('Titanium', 'joli-table-of-contents'),
                                'rose-gold' => __('Rose Gold', 'joli-table-of-contents'),

                                /* ----- COOL / BLUE ----- */
                                'sapphire' => __('Sapphire', 'joli-table-of-contents'),
                                'ocean' => __('Ocean', 'joli-table-of-contents'),
                                'arctic' => __('Arctic', 'joli-table-of-contents'),
                                'mint' => __('Mint', 'joli-table-of-contents'),

                                /* ----- PURPLE / COSMIC ----- */
                                'violet-dream' => __('Violet Dream', 'joli-table-of-contents'),
                                'ultraviolet' => __('Ultraviolet', 'joli-table-of-contents'),
                                'galaxy' => __('Galaxy', 'joli-table-of-contents'),
                                'aurora' => __('Aurora', 'joli-table-of-contents'),
                                'cosmic' => __('Cosmic', 'joli-table-of-contents'),

                                /* ----- GREEN ----- */
                                'emerald' => __('Emerald', 'joli-table-of-contents'),
                                'forest' => __('Forest', 'joli-table-of-contents'),

                                /* ----- WARM ----- */
                                'sunset' => __('Sunset', 'joli-table-of-contents'),
                                'sunrise' => __('Sunrise', 'joli-table-of-contents'),
                                'lava' => __('Lava', 'joli-table-of-contents'),

                                /* ----- FUN ----- */
                                'tropical' => __('Tropical', 'joli-table-of-contents'),
                                'candy' => __('Candy', 'joli-table-of-contents'),
                            ],
                            'schemes' => [

                                /* ----- METALLIC ----- */

                                'gold' => [
                                    'light' => ['#d4a017', '#e6b422', '#f2c94c', '#fff1b3'],
                                    'dark'  => ['#f2c94c', '#ffd86b', '#ffe89c', '#fff4c9'],
                                ],

                                'platinum' => [
                                    'light' => ['#9fa8b2', '#b8c2cc', '#d6dde5', '#f0f3f6'],
                                    'dark'  => ['#c3ccd6', '#d6dde5', '#e6edf3', '#f8fafc'],
                                ],

                                'bronze' => [
                                    'light' => ['#8c6239', '#b07d52', '#cd9a6a', '#e6c29a'],
                                    'dark'  => ['#b07d52', '#cd9a6a', '#e2b98f', '#f2d7b5'],
                                ],

                                'titanium' => [
                                    'light' => ['#5f6c7b', '#7a8795', '#9aa6b2', '#c7d0d8'],
                                    'dark'  => ['#7a8795', '#9aa6b2', '#b6c1cb', '#dfe6ed'],
                                ],

                                'rose-gold' => [
                                    'light' => ['#b76e79', '#d48a94', '#e6aab3', '#f5ccd2'],
                                    'dark'  => ['#d48a94', '#e6aab3', '#f0bdc5', '#f8d9de'],
                                ],

                                /* ----- COOL ----- */

                                'sapphire' => [
                                    'light' => ['#2563eb', '#3b82f6', '#60a5fa', '#93c5fd'],
                                    'dark'  => ['#3b82f6', '#60a5fa', '#93c5fd', '#bfdbfe'],
                                ],

                                'ocean' => [
                                    'light' => ['#2ac7a1', '#00a8cc', '#0077b6', '#90e0ef'],
                                    'dark'  => ['#45e0bd', '#38c0dd', '#5390d9', '#a9def9'],
                                ],

                                'arctic' => [
                                    'light' => ['#48cae4', '#90e0ef', '#ade8f4', '#caf0f8'],
                                    'dark'  => ['#72efdd', '#90e0ef', '#ade8f4', '#e0fbfc'],
                                ],

                                'mint' => [
                                    'light' => ['#2af598', '#22d3ee', '#4facfe', '#a1c4fd'],
                                    'dark'  => ['#5fffd2', '#67e8f9', '#7fb3ff', '#c3dafe'],
                                ],

                                /* ----- PURPLE / COSMIC ----- */

                                'violet-dream' => [
                                    'light' => ['#7c3aed', '#6366f1', '#3b82f6', '#22d3ee'],
                                    'dark'  => ['#9f67ff', '#8a8cff', '#60a5fa', '#67e8f9'],
                                ],

                                'ultraviolet' => [
                                    'light' => ['#6a00f4', '#8900f2', '#a100f2', '#c77dff'],
                                    'dark'  => ['#8f3dff', '#b04cff', '#d07cff', '#e9b8ff'],
                                ],

                                'galaxy' => [
                                    'light' => ['#6a00f4', '#7b2cbf', '#9d4edd', '#c77dff'],
                                    'dark'  => ['#9d4edd', '#b5179e', '#e0aaff', '#f1c0ff'],
                                ],

                                'aurora' => [
                                    'light' => ['#9b6dff', '#2ac7a1', '#5a7cff', '#ff6fa5'],
                                    'dark'  => ['#b493ff', '#45e0bd', '#7f98ff', '#ff8db7'],
                                ],

                                'cosmic' => [
                                    'light' => ['#4c1d95', '#6d28d9', '#9333ea', '#c084fc'],
                                    'dark'  => ['#6d28d9', '#9333ea', '#c084fc', '#e9d5ff'],
                                ],

                                /* ----- GREEN ----- */

                                'emerald' => [
                                    'light' => ['#10b981', '#34d399', '#6ee7b7', '#a7f3d0'],
                                    'dark'  => ['#34d399', '#6ee7b7', '#a7f3d0', '#d1fae5'],
                                ],

                                'forest' => [
                                    'light' => ['#2ac7a1', '#4caf50', '#7cb342', '#aed581'],
                                    'dark'  => ['#45e0bd', '#66bb6a', '#9ccc65', '#dcedc8'],
                                ],

                                /* ----- WARM ----- */

                                'sunset' => [
                                    'light' => ['#ff6fa5', '#ff8c6b', '#ffb86b', '#ffd36f'],
                                    'dark'  => ['#ff8db7', '#ffa082', '#ffc98f', '#ffe48f'],
                                ],

                                'sunrise' => [
                                    'light' => ['#ff7a18', '#ff9f43', '#ffc75f', '#ffe29a'],
                                    'dark'  => ['#ff9f43', '#ffb66b', '#ffd97d', '#fff0b3'],
                                ],

                                'lava' => [
                                    'light' => ['#ff3d00', '#ff6d00', '#ff9100', '#ffd180'],
                                    'dark'  => ['#ff6e40', '#ff8a65', '#ffab91', '#ffd180'],
                                ],

                                /* ----- FUN ----- */

                                'tropical' => [
                                    'light' => ['#00d9c0', '#00b4f1', '#f9c74f', '#f15bb5'],
                                    'dark'  => ['#5efce8', '#57c7ff', '#ffe066', '#ff8ec7'],
                                ],

                                'candy' => [
                                    'light' => ['#ff8db7', '#ffb3c6', '#cdb4db', '#b8c0ff'],
                                    'dark'  => ['#ffb3c6', '#ffc8dd', '#e0b1cb', '#cdb4db'],
                                ],

                            ],
                            // 'schemes' => [
                            //     'sunset' => [
                            //         'light' => ['#ff6fa5', '#ff9671', '#ffc75f', '#f9f871'],
                            //         'dark'  => ['#ff8db7', '#ffb089', '#ffd97d', '#ffff9f'],
                            //     ],

                            //     'ocean' => [
                            //         'light' => ['#2ac7a1', '#00b4d8', '#0077b6', '#90e0ef'],
                            //         'dark'  => ['#45e0bd', '#48cae4', '#5390d9', '#a9def9'],
                            //     ],

                            //     'nebula' => [
                            //         'light' => ['#9b6dff', '#5a7cff', '#ff6fa5', '#c77dff'],
                            //         'dark'  => ['#b493ff', '#7f98ff', '#ff8db7', '#e0aaff'],
                            //     ],

                            //     'forest' => [
                            //         'light' => ['#2ac7a1', '#4caf50', '#8bc34a', '#c5e1a5'],
                            //         'dark'  => ['#45e0bd', '#66bb6a', '#aed581', '#dcedc8'],
                            //     ],

                            //     'firefly' => [
                            //         'light' => ['#f9f871', '#ffd166', '#ffb703', '#fb8500'],
                            //         'dark'  => ['#ffff9f', '#ffe082', '#ffd54f', '#ffb74d'],
                            //     ],

                            //     'arctic' => [
                            //         'light' => ['#48cae4', '#ade8f4', '#caf0f8', '#90e0ef'],
                            //         'dark'  => ['#caf0f8', '#ade8f4', '#90e0ef', '#72efdd'],
                            //     ],

                            //     'candy' => [
                            //         'light' => ['#ff8db7', '#ffb3c6', '#b493ff', '#cdb4db'],
                            //         'dark'  => ['#ffb3c6', '#ffc8dd', '#cdb4db', '#b8c0ff'],
                            //     ],

                            //     'lava' => [
                            //         'light' => ['#ff3d00', '#ff6d00', '#ff9100', '#ffd180'],
                            //         'dark'  => ['#ff6e40', '#ff8a65', '#ffab91', '#ffd180'],
                            //     ],

                            //     'galaxy' => [
                            //         'light' => ['#6a00f4', '#8900f2', '#c77dff', '#e0aaff'],
                            //         'dark'  => ['#9d4edd', '#b5179e', '#e0aaff', '#f1c0ff'],
                            //     ],

                            //     'tropical' => [
                            //         'light' => ['#00f5d4', '#00bbf9', '#fee440', '#f15bb5'],
                            //         'dark'  => ['#5efce8', '#57c7ff', '#fff275', '#ff8ec7'],
                            //     ],

                            //     'royal' => [
                            //         'light' => ['#5a189a', '#7b2cbf', '#9d4edd', '#c77dff'],
                            //         'dark'  => ['#7b2cbf', '#9d4edd', '#c77dff', '#e0aaff'],
                            //     ],

                            //     'mint' => [
                            //         'light' => ['#2af598', '#22d3ee', '#4facfe', '#a1c4fd'],
                            //         'dark'  => ['#5fffd2', '#67e8f9', '#7fb3ff', '#c3dafe'],
                            //     ],

                            // ],
                        ],
                    ],
                ],
            ],
            // Color palette
            [
                'name' => 'color-palette-base',
                'title' => __('Base colors', 'joli-table-of-contents'),
                'data' => [
                    'palette-title' => __('Color Palette', 'joli-table-of-contents'), // This will be shown above the 3 sub section that compose the color palette
                ],
                'desc' => jtoc_tagify(
                    'p',
                    // __('The color palette aims to simplify customization for themes. Define your colors here and reuse them dynamically across the settings. v3 themes are now compatible with the palette.', 'joli-table-of-contents'),
                    __('Define custom base colors to override theme\'s default colors.', 'joli-table-of-contents'),
                    // __('The color palette is a new experimental feature that aims to simplify color customization for themes. At the moment, it only works with the "Vertik" theme.', 'joli-table-of-contents'),
                    ['class' => ['description']]
                )
                    . jtoc_tagify(
                        'p',
                        __('If you have custom colors defined in the Styles tab, they will override the palette colors.', 'joli-table-of-contents'),
                        ['class' => ['description', 'danger']]
                    ),
                'fields' => [
                    [
                        'id' => 'color-palette-1',
                        'title' => __('Background', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            'desc' => __('Palette color #1', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                'palette' => 'true',
                                'palette-id' => 'color-1',
                            ],
                            // 'custom' => jtoc_tagify(
                            //     'p',
                            //     __('Background color', 'joli-table-of-contents'),
                            //     ['class' => 'description']
                            // ),
                            // 'custom' => jtoc_tagify(
                            //     'p',
                            //     __('Background', 'joli-table-of-contents'),
                            //     ['id' => 'color-palette-1_description', 'class' => 'description']
                            // ) . jtoc_tagify(
                            //     'p',
                            //     jtoc_tagify('span', '', ['id' => 'color-palette-1_default-color']) . ' ' .
                            //         jtoc_tagify('span', '', ['id' => 'color-palette-1_default-color-swatch', 'class' => 'color-theme-preview']) . ' ' .
                            //         __('Theme Default', 'joli-table-of-contents'),
                            //     ['id' => 'color-palette-1_default', 'class' => 'description']
                            // ),
                            'custom' => JTOC()->render(['admin' => 'color-description'], ['num' => 1], true),
                        ],
                        // 'default' => '#adadad',
                        'sanitize' => 'color',
                    ],
                    [
                        'id' => 'color-palette-2',
                        'title' => __('Text', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            'desc' => __('Palette color #2', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                'palette' => 'true',
                                'palette-id' => 'color-2',
                            ],
                            // 'custom' => jtoc_tagify(
                            //     'p',
                            //     __('Base text color', 'joli-table-of-contents'),
                            //     ['class' => 'description']
                            // ),
                            'custom' => JTOC()->render(['admin' => 'color-description'], ['num' => 2], true),
                        ],
                        // 'default' => '#adadad',
                        'sanitize' => 'color',
                    ],
                    [
                        'id' => 'color-palette-3',
                        'title' => __('Accent', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            'desc' => __('Palette color #3', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                'palette' => 'true',
                                'palette-id' => 'color-3',
                            ],
                            // 'custom' => jtoc_tagify(
                            //     'p',
                            //     __('This is the accent color, generally a vibrant color', 'joli-table-of-contents'),
                            //     ['class' => 'description']
                            // ),
                            'custom' => JTOC()->render(['admin' => 'color-description'], ['num' => 3], true),
                            // 'custom' => jtoc_tagify(
                            //     'p',
                            //     __('Text', 'joli-table-of-contents'),
                            //     ['id' => 'color-palette-3_description', 'class' => 'description']
                            // ),
                        ],
                        // 'default' => '#adadad',
                        'sanitize' => 'color',
                    ],
                ],
            ],

            // Color palette: extended
            [
                'name' => 'color-palette-extended',
                'title' => __('Extended colors', 'joli-table-of-contents'),
                'desc' => jtoc_tagify(
                    'p',
                    __('Some themes may use these colors.', 'joli-table-of-contents'),
                    // __('The color palette is a new experimental feature that aims to simplify color customization for themes. At the moment, it only works with the "Vertik" theme.', 'joli-table-of-contents'),
                    ['class' => ['description']]
                ),
                'fields' => [
                    [
                        'id' => 'color-palette-4',
                        'title' => __('Accent 2', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            'desc' => __('Palette color #4', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                'palette' => 'true',
                                'palette-id' => 'color-4',
                            ],
                            // 'custom' => jtoc_tagify(
                            //     'p',
                            //     __('Accent 2', 'joli-table-of-contents'),
                            //     ['class' => 'description']
                            // ),
                            'custom' => JTOC()->render(['admin' => 'color-description'], ['num' => 4], true),
                            // 'custom' => jtoc_tagify(
                            //     'p',
                            //     __('Headings active', 'joli-table-of-contents'),
                            //     ['id' => 'color-palette-4_description', 'class' => 'description']
                            // ),
                        ],
                        // 'default' => '#adadad',
                        'sanitize' => 'color',
                    ],
                    [
                        'id' => 'color-palette-5',
                        'title' => __('Surface', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            'desc' => __('Palette color #5', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                'palette' => 'true',
                                'palette-id' => 'color-5',
                            ],
                            // 'custom' => jtoc_tagify(
                            //     'p',
                            //     __('Surface', 'joli-table-of-contents'),
                            //     ['class' => 'description']
                            // ),
                            'custom' => JTOC()->render(['admin' => 'color-description'], ['num' => 5], true),
                            // 'custom' => jtoc_tagify(
                            //     'p',
                            //     __('Header, TOC Title, Toggle', 'joli-table-of-contents'),
                            //     ['id' => 'color-palette-5_description', 'class' => 'description']
                            // ),
                        ],
                        // 'default' => '#adadad',
                        'sanitize' => 'color',
                    ],
                ],
            ],

            // Color palette: extra colors
            [
                'name' => 'color-palette-extra',
                'title' => __('Extra colors', 'joli-table-of-contents'),
                'desc' => jtoc_tagify(
                    'p',
                    __('Define additional custom colors here to reuse them dynamically in any color setting.', 'joli-table-of-contents'),
                    // __('The color palette is a new experimental feature that aims to simplify color customization for themes. At the moment, it only works with the "Vertik" theme.', 'joli-table-of-contents'),
                    ['class' => ['description']]
                ),
                'fields' => [
                    [
                        'id' => 'color-palette-6',
                        'title' => __('Color 6', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            'desc' => __('Palette color #6', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                'palette' => 'true',
                                'palette-id' => 'color-6',
                            ],

                            'custom' => JTOC()->render(['admin' => 'color-description'], ['num' => 6], true),
                            // 'custom' => jtoc_tagify(
                            //     'p',
                            //     __('Numeration', 'joli-table-of-contents'),
                            //     ['id' => 'color-palette-6_description', 'class' => 'description']
                            // ),
                        ],
                        // 'default' => '#adadad',
                        'sanitize' => 'color',
                    ],
                    [
                        'id' => 'color-palette-7',
                        'title' => __('Color 7', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            'desc' => __('Palette color #7', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                'palette' => 'true',
                                'palette-id' => 'color-7',
                            ],

                            'custom' => JTOC()->render(['admin' => 'color-description'], ['num' => 7], true),
                        ],
                        // 'default' => '#adadad',
                        'sanitize' => 'color',
                    ],
                    [
                        'id' => 'color-palette-8',
                        'title' => __('Color 8', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            'desc' => __('Palette color #8', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                'palette' => 'true',
                                'palette-id' => 'color-8',
                            ],

                            'custom' => JTOC()->render(['admin' => 'color-description'], ['num' => 8], true),
                        ],
                        // 'default' => '#adadad',
                        'sanitize' => 'color',
                    ],
                    [
                        'id' => 'color-palette-9',
                        'title' => __('Color 9', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            'desc' => __('Palette color #9', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                                'palette' => 'true',
                                'palette-id' => 'color-9',
                            ],

                            'custom' => JTOC()->render(['admin' => 'color-description'], ['num' => 9], true),
                        ],
                        // 'default' => '#adadad',
                        'sanitize' => 'color',
                    ],
                ],
            ],
        ],
    ],

    // GROUP: STYLES ********************************************************
    [
        'group' => 'styles',
        'label' => __('Styles', 'joli-table-of-contents'),
        'icon' => 'paintbrush',
        'sections' => [
            // Table of contents
            [
                'name' => 'table-of-contents-styles',
                'title' => __('Table of contents', 'joli-table-of-contents'),
                'desc' => JTOC()->render(['admin' => 'toc-view'], ['highlight' => 'main'], true),
                'fields' => [
                    // Base font size
                    [
                        'id' => 'base-font-size',
                        'title' => __('Base font size', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'new' => true, /* v3 */
                            'placeholder' => '1',
                            'desc' => __('Base font size of the whole table of contents. Leave empty for default size.', 'joli-table-of-contents'),
                            'values' => [
                                'em' => 'em',
                                'rem' => 'rem',
                                'px' => 'px',
                                'percent' => '%',
                            ],
                            'custom' => jtoc_tagify(
                                'p',
                                __('Base font size of the whole table of contents. 1em = your content font size', 'joli-table-of-contents'),
                                ['class' => 'description']
                            ) . jtoc_tagify(
                                'p',
                                __('Changing this value may affect the size of other elements.', 'joli-table-of-contents'),
                                ['class' => ['description', 'danger']]
                            ),
                        ],
                        // 'default' => '16|px',
                        'sanitize' => 'unit',
                    ],
                    [
                        'id' => 'toc-margin',
                        'title' => __('Margin', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'desc' => __('Margin of the whole table of contents.', 'joli-table-of-contents'),
                            // 'placeholder' => '10',
                            'dimensions_type' => 'margin',
                            'sub_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top' => 'integer',
                                'right' => 'integer',
                                'bottom' => 'integer',
                                'left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],

                    [
                        'id' => 'toc-padding',
                        'title' => __('Padding', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'desc' => __('Padding of the whole table of contents.', 'joli-table-of-contents'),
                            // 'placeholder' => '10',
                            'dimensions_type' => 'padding',
                            'sub_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top' => 'integer',
                                'right' => 'integer',
                                'bottom' => 'integer',
                                'left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],

                    [
                        'id' => 'toc-border-radius',
                        'title' => __('Border radius', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'desc' => __('Border radius of the whole table of contents.', 'joli-table-of-contents'),
                            // 'placeholder' => '10',
                            'dimensions_type' => 'border',
                            'sub_dimensions' => ['top-left', 'top-right', 'bottom-right', 'bottom-left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                            'lock' => true,
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top-left' => 'integer',
                                'top-right' => 'integer',
                                'bottom-right' => 'integer',
                                'bottom-left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],

                    [
                        'id' => 'toc-border',
                        'title' => __('Border', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'desc' => __('Border of the whole table of contents.', 'joli-table-of-contents'),
                            // 'placeholder' => '10',
                            'dimensions_type' => 'border',
                            'sub_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                            'lock' => true,
                            'step' => '0.5',
                            'min' => '0',
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top' => 'integer',
                                'right' => 'integer',
                                'bottom' => 'integer',
                                'left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],

                    [
                        'id' => 'toc-border-color',
                        'title' => __('Border color', 'joli-table-of-contents'),
                        // 'type' => 'text',
                        'type' => 'color',
                        'args' => [
                            'desc' => __('Border color of the whole table of contents.', 'joli-table-of-contents'),
                            // 'class' => 'tab-appearance',
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#ffffff',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    [
                        'id' => 'toc-background-color',
                        'title' => __('Background color', 'joli-table-of-contents'),
                        // 'type' => 'text',
                        'type' => 'color',
                        'args' => [
                            // 'class' => 'tab-appearance',
                            'desc' => __('Background color of the whole table of contents.', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#ffffff',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    [
                        'id' => 'toc-shadow',
                        'title' => __('Shadow', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'desc' => __('Displays a shadow around the table of contents.', 'joli-table-of-contents'),
                            // 'classes' => 'joli-color-picker',//adds color picker
                        ],
                        'default' => false,
                        'sanitize' => 'checkbox'
                    ],

                    [
                        'id' => 'toc-shadow-color',
                        'title' => __('Custom shadow color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'placeholder' => '#c2c2c2',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#c2c2c2',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                ],
            ],

            // Table of contents header
            [
                'name' => 'table-of-contents-header-styles',
                'title' => __('Table of contents header', 'joli-table-of-contents'),
                'desc' => JTOC()->render(['admin' => 'toc-view'], ['highlight' => 'header'], true),
                'fields' => [
                    [
                        'id' => 'toc-header-height',
                        'title' => __('Height', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'desc' => __('Specify a number for a fixed header height', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        'sanitize' => 'unit',
                        // 'default' => '50|px',
                    ],

                    [
                        'id' => 'toc-header-background-color',
                        'title' => __('Background color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'desc' => __('Background color of the header.', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    // Border style
                    [
                        'id' => 'toc-header-border-style',
                        'title' => __('Border style', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Border style of the header.', 'joli-table-of-contents'),
                            'values' => [
                                'none' => __('None', 'joli-table-of-contents'),
                                'solid' => __('Solid', 'joli-table-of-contents'),
                                'dashed' => __('Dashed', 'joli-table-of-contents'),
                                'dotted' => __('Dotted', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'none',
                        'sanitize' => 'values',
                    ],

                    // Border width
                    [
                        'id' => 'toc-header-border-width',
                        'title' => __('Border width', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Border width of the header.', 'joli-table-of-contents'),
                            // 'placeholder' => '10',
                            'lock' => true,
                            'dimensions_type' => 'border',
                            'sub_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                            'step' => '0.5',
                            'min' => '0',
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top' => 'integer',
                                'right' => 'integer',
                                'bottom' => 'integer',
                                'left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],

                    // Border radius
                    [
                        'id' => 'toc-header-border-radius',
                        'title' => __('Border radius', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Border radius of the header.', 'joli-table-of-contents'),
                            // 'placeholder' => '10',
                            'lock' => true,
                            'dimensions_type' => 'border',
                            'sub_dimensions' => ['top-left', 'top-right', 'bottom-right', 'bottom-left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top-left' => 'integer',
                                'top-right' => 'integer',
                                'bottom-right' => 'integer',
                                'bottom-left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],

                    // Border color
                    [
                        'id' => 'toc-header-border-color',
                        'title' => __('Border color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Border color of the header.', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // 'data' => [
                            //     'alpha-enabled' => 'true',
                            //     'alpha-color-type' => 'hex',
                            // ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    [
                        'id' => 'toc-header-margin',
                        'title' => __('Margin', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'desc' => __('Margin of the header.', 'joli-table-of-contents'),
                            // 'placeholder' => '10',margin
                            'dimensions_type' => 'padding',
                            'sub_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top' => 'integer',
                                'right' => 'integer',
                                'bottom' => 'integer',
                                'left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],
                    [
                        'id' => 'toc-header-padding',
                        'title' => __('Padding', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'desc' => __('Padding of the header.', 'joli-table-of-contents'),
                            // 'placeholder' => '10',
                            'dimensions_type' => 'padding',
                            'sub_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top' => 'integer',
                                'right' => 'integer',
                                'bottom' => 'integer',
                                'left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],

                ],
            ],

            // Table of contents title
            [
                'name' => 'table-of-contents-title-styles',
                'title' => __('Table of contents title', 'joli-table-of-contents'),
                'desc' => JTOC()->render(['admin' => 'toc-view'], ['highlight' => 'title'], true),
                'fields' => [
                    [
                        'id' => 'toc-title-color',
                        'title' => __('Title color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'desc' => __('Color of the "Table of contents" title.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('This also applies to the Toggle button. ', 'joli-table-of-contents'), ['class' => 'description']),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    [
                        'id' => 'toc-title-font-size',
                        'title' => __('Font size', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'placeholder' => '1.25',
                            'desc' => __('Font size of the "Table of contents" title.', 'joli-table-of-contents'),
                            'values' => [
                                'percent' => '%',
                                'em' => 'em',
                                'px' => 'px',
                                'rem' => 'rem',
                            ],
                        ],
                        'sanitize' => 'unit',
                        // 'default' => '50|px',
                    ],

                    [
                        'id' => 'toc-title-font-weight',
                        'title' => __('Font weight', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            // 'class' => 'tab-general',
                            'desc' => __('Font weight of the "Table of contents" title.', 'joli-table-of-contents'),
                            'values' => $font_weight_list,
                        ],
                        'default' => 'none',
                    ],

                    [
                        'id' => 'toc-title-font-style',
                        'title' => __('Font style', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            // 'class' => 'tab-general',
                            // 'new' => true, /* legacy */
                            'desc' => __('Font style of the "Table of contents" title.', 'joli-table-of-contents'),
                            'values' => $font_style_list,
                        ],
                        'default' => 'none',
                    ],
                ],
            ],

            // Toggle
            [
                'name' => 'toggle-styles',
                'title' => __('Toggle button', 'joli-table-of-contents'),
                'desc' => JTOC()->render(['admin' => 'toc-view'], ['highlight' => 'toggle'], true),
                'fields' => [
                    [
                        'id' => 'toc-toggle-color',
                        'title' => __('Color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'desc' => __('Color of the Toggle button or the toggle button text.', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                ],
            ],

            // Table of contents body
            [
                'name' => 'table-of-contents-body-styles',
                'title' => __('Table of contents body', 'joli-table-of-contents'),
                // 'desc' => jtoc_tagify('p', __('The Table of contents body contains all the headings', 'joli-table-of-contents')),
                'desc' => JTOC()->render(['admin' => 'toc-view'], ['highlight' => 'body'], true),
                'fields' => [

                    [
                        'id' => 'toc-body-margin',
                        'title' => __('Margin', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'desc' => __('Margin of the table of contents body.', 'joli-table-of-contents'),
                            // 'placeholder' => '10',margin
                            'dimensions_type' => 'padding',
                            'sub_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top' => 'integer',
                                'right' => 'integer',
                                'bottom' => 'integer',
                                'left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],
                    [
                        'id' => 'toc-body-padding',
                        'title' => __('Padding', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'desc' => __('Padding of the table of contents body.', 'joli-table-of-contents'),
                            // 'placeholder' => '10',
                            'dimensions_type' => 'padding',
                            'sub_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top' => 'integer',
                                'right' => 'integer',
                                'bottom' => 'integer',
                                'left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],

                    [
                        'id' => 'toc-body-background-color',
                        'title' => __('Background color', 'joli-table-of-contents'),
                        'type' => 'text',
                        'args' => [
                            // 'pro' => true,
                            'desc' => __('Background color of the table of contents body.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('This setting only applies to the "TOC body". For the whole TOC background color, refer to the "Table of contents background color" setting above.', 'joli-table-of-contents'), ['class' => ['description', 'danger']]),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color'
                    ],
                ],
            ],

            // Headings group
            // [
            //     'name' => 'headings-group-styles',
            //     'title' => __('Headings group', 'joli-table-of-contents'),
            //     // 'desc' => JTOC()->render(['admin' => 'toc-view'], ['highlight' => 'body'], true),
            //     'fields' => [
            //         [
            //             'id' => 'headings-group-background-color',
            //             'title' => __('Background color', 'joli-table-of-contents'),
            //             'type' => 'text',
            //             'args' => [
            //                 'placeholder' => '#ffffff',
            //                 'classes' => 'joli-color-picker', //adds color picker
            //                 'data' => [
            //                     'alpha-enabled' => 'true',
            //                     'alpha-color-type' => 'hex',
            //                 ],
            //                 // 'desc' => __('Headings background color on mouse hover', 'joli-table-of-contents'),
            //             ],
            //             // 'default' => '#c9c9c9',
            //             'sanitize' => 'color',
            //         ],

            //     ],
            // ],

            // Headings
            [
                'name' => 'headings-styles',
                'title' => __('Headings', 'joli-table-of-contents'),
                // 'desc' => __('<p>Headings contain the whole row</p>', 'joli-table-of-contents'),
                'desc' => JTOC()->render(['admin' => 'toc-view'], ['highlight' => 'headings'], true),
                'fields' => [

                    [
                        'id' => 'headings-link-font-size',
                        'title' => __('Font size', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'placeholder' => '90',
                            'desc' => __('Font size of each individual heading text link.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('This setting used to be in the "Headings text link" section but has been moved here since v3.', 'joli-table-of-contents'), ['class' => 'description']),
                            'values' => [
                                'percent' => '%',
                                'em' => 'em',
                                'px' => 'px',
                                'rem' => 'rem',
                            ],
                        ],
                        'sanitize' => 'unit',
                        // 'default' => '50|px',
                    ],

                    [
                        'id' => 'headings-line-height',
                        'title' => __('Line height', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'desc' => __('Adjust this setting to change the line height.', 'joli-table-of-contents'),
                            // 'class' => 'tab-appearance'
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        'sanitize' => 'unit',
                    ],

                    [
                        'id' => 'headings-link-font-weight',
                        'title' => __('Font weight', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            // 'class' => 'tab-general',
                            'custom' => jtoc_tagify('p', __('This setting used to be in the "Headings text link" section but has been moved here since v3.', 'joli-table-of-contents'), ['class' => 'description']),
                            'values' => $font_weight_list,
                        ],
                        'default' => 'none',
                    ],

                    [
                        'id' => 'headings-border-radius',
                        'title' => __('Border radius', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'desc' => __('Border radius of each individual heading (full row).', 'joli-table-of-contents'),
                            // 'placeholder' => '10',
                            'dimensions_type' => 'border',
                            'sub_dimensions' => ['top-left', 'top-right', 'bottom-right', 'bottom-left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                            'lock' => true,
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top-left' => 'integer',
                                'top-right' => 'integer',
                                'bottom-right' => 'integer',
                                'bottom-left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],
                    // [
                    //     'id' => 'headings-link-height',
                    //     'title' => __('Height', 'joli-table-of-contents'),
                    //     'type' => 'text',
                    //     'args' => [
                    //         'desc' => __('Determines the height of each individual heading', 'joli-table-of-contents') . __('Leave blank to automatically adjust to the font.', 'joli-table-of-contents'),
                    //         'placeholder' => '30',
                    //     ],
                    //     // 'default' => '#39383a',
                    //     'sanitize' => 'Number'
                    // ],
                    [
                        'id' => 'headings-link-color',
                        'title' => __('Color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'custom' => jtoc_tagify('p', __('This setting used to be in the "Headings text link" section but has been moved here since v3.', 'joli-table-of-contents'), ['class' => 'description']),
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    [
                        'id' => 'headings-link-color-hover',
                        'title' => __('Color (hover)', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'custom' => jtoc_tagify('p', __('This setting used to be in the "Headings text link" section but has been moved here since v3.', 'joli-table-of-contents'), ['class' => 'description']),
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        //// 'default' => '#ffffff',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    [
                        'id' => 'headings-link-color-active',
                        'title' => __('Color (active)', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'custom' => jtoc_tagify('p', __('This setting used to be in the "Headings text link" section but has been moved here since v3.', 'joli-table-of-contents'), ['class' => 'description']),
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#ffffff',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    // [
                    //     'id' => 'headings-font-size',
                    //     'title' => __('Font size', 'joli-table-of-contents'),
                    //     'type' => 'unitinput',
                    //     'args' => [
                    //         'placeholder' => '1.25',
                    //         'desc' => __('Font size of each individual heading. "1" is the default size from your theme. "0.5" for 50% of the default size; "1.2" for 120% of the default size.', 'joli-table-of-contents') . ' ' . $vars['dontaddem'],
                    //         'values' => [
                    //             'em' => 'em',
                    //             'px' => 'px',
                    //             'rem' => 'rem',
                    //         ],
                    //     ],
                    //     'sanitize' => 'unit',
                    //     // 'default' => '50|px',
                    // ],

                    // [
                    //     'id' => 'headings-height',
                    //     'title' => __('Height', 'joli-table-of-contents'),
                    //     'type' => 'text',
                    //     'args' => [
                    //         'desc' => __('Determines the height of each individual heading', 'joli-table-of-contents') . __('Leave blank to automatically adjust to the font.', 'joli-table-of-contents'),
                    //         'placeholder' => '30',
                    //     ],
                    //     // 'default' => '#39383a',
                    //     'sanitize' => 'Number'
                    // ],
                    // [
                    //     'id' => 'headings-color',
                    //     'title' => __('Color', 'joli-table-of-contents'),
                    //     'type' => 'text',
                    //     'args' => [
                    //         'placeholder' => '#ffffff',
                    //         'classes' => 'joli-color-picker', //adds color picker
                    //         'data' => [
                    //             'alpha-enabled' => 'true',
                    //             'alpha-color-type' => 'hex',
                    //         ],
                    //     ],
                    //     // 'default' => '#39383a',
                    //     'sanitize' => 'color',
                    // ],
                    // [
                    //     'id' => 'headings-color-hover',
                    //     'title' => __('Color (hover)', 'joli-table-of-contents'),
                    //     'type' => 'text',
                    //     'args' => [
                    //         'placeholder' => '#ffffff',
                    //         'classes' => 'joli-color-picker', //adds color picker
                    //         'data' => [
                    //             'alpha-enabled' => 'true',
                    //             'alpha-color-type' => 'hex',
                    //         ],
                    //     ],
                    //     //// 'default' => '#ffffff',
                    //     'sanitize' => 'color',
                    // ],
                    // [
                    //     'id' => 'headings-color-active',
                    //     'title' => __('Color (active)', 'joli-table-of-contents'),
                    //     'type' => 'text',
                    //     'args' => [
                    //         'placeholder' => '#ffffff',
                    //         'classes' => 'joli-color-picker', //adds color picker
                    //         'data' => [
                    //             'alpha-enabled' => 'true',
                    //             'alpha-color-type' => 'hex',
                    //         ],
                    //     ],
                    //     // 'default' => '#ffffff',
                    //     'sanitize' => 'color',
                    // ],
                    [
                        'id' => 'headings-background-color',
                        'title' => __('Background color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'desc' => __('Background color of each individual heading (full row).', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                            // 'desc' => __('Headings background color on mouse hover', 'joli-table-of-contents'),
                        ],
                        // 'default' => '#c9c9c9',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    [
                        'id' => 'headings-background-color-hover',
                        'title' => __('Background color (hover)', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'desc' => __('Background color (hover) of each individual heading (full row).', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                            // 'desc' => __('Headings background color on mouse hover', 'joli-table-of-contents'),
                        ],
                        // 'default' => '#c9c9c9',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    [
                        'id' => 'headings-background-color-active',
                        'title' => __('Background color (active)', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'desc' => __('Background color (active) of each individual heading (full row).', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    [
                        'id' => 'headings-margin',
                        'title' => __('Margin', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'desc' => __('Margin of each individual heading (full row).', 'joli-table-of-contents'),
                            // 'placeholder' => '10',margin
                            'dimensions_type' => 'padding',
                            'sub_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top' => 'integer',
                                'right' => 'integer',
                                'bottom' => 'integer',
                                'left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],
                    [
                        'id' => 'headings-padding',
                        'title' => __('Padding', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'desc' => __('Padding of each individual heading (full row). Adjust top/bottom padding to increase heading height.', 'joli-table-of-contents'),
                            // 'placeholder' => '10',
                            'dimensions_type' => 'padding',
                            'sub_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top' => 'integer',
                                'right' => 'integer',
                                'bottom' => 'integer',
                                'left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],

                ],
            ],

            // Headings
            [
                'name' => 'headings-link-styles',
                'title' => __('Headings text link', 'joli-table-of-contents'),
                // 'desc' => JTOC()->render(['admin' => 'toc-view'], ['highlight' => 'links'], true),
                'desc' => jtoc_tagify('p', __('This section has been deprecated as of v3. Use the "Headings" section instead.', 'joli-table-of-contents')) .
                    jtoc_tagify('p', __('You can still adjust the styles inside(for backwards compatibility) but it is not recommended for a fresh install.', 'joli-table-of-contents')),

                'fields' => [
                    [
                        'id' => 'headings-link-background-color',
                        'title' => __('Background color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // Deprecated custom notice
                            'custom' => jtoc_tagify('p', __('This setting is deprecated. Use the "Headings Background color" setting instead.', 'joli-table-of-contents'), ['class' => ['description', 'danger']]),
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                            // 'desc' => __('Headings background color on mouse hover', 'joli-table-of-contents'),
                        ],
                        // 'default' => '#c9c9c9',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    [
                        'id' => 'headings-link-background-color-hover',
                        'title' => __('Background color (hover)', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // Deprecated custom notice
                            'custom' => jtoc_tagify('p', __('This setting is deprecated. Use the "Headings Background color (hover)" setting instead.', 'joli-table-of-contents'), ['class' => ['description', 'danger']]),
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                            // 'desc' => __('Headings background color on mouse hover', 'joli-table-of-contents'),
                        ],
                        // 'default' => '#c9c9c9',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    [
                        'id' => 'headings-link-background-color-active',
                        'title' => __('Background color (active)', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // Deprecated custom notice
                            'custom' => jtoc_tagify('p', __('This setting is deprecated. Use the "Headings Background color (active)" setting instead.', 'joli-table-of-contents'), ['class' => ['description', 'danger']]),
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    [
                        'id' => 'headings-link-margin',
                        'title' => __('Margin', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'desc' => __('Margin of each individual heading text link.', 'joli-table-of-contents'),
                            // Deprecated custom notice
                            'custom' => jtoc_tagify('p', __('This setting is deprecated. Use the "Headings margin" setting instead.', 'joli-table-of-contents'), ['class' => ['description', 'danger']]),
                            // 'placeholder' => '10',margin
                            'dimensions_type' => 'padding',
                            'sub_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top' => 'integer',
                                'right' => 'integer',
                                'bottom' => 'integer',
                                'left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],
                    [
                        'id' => 'headings-link-padding',
                        'title' => __('Padding', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'desc' => __('Padding of each individual heading text link.', 'joli-table-of-contents'),
                            // Deprecated custom notice
                            'custom' => jtoc_tagify('p', __('This setting is deprecated. Use the "Headings padding" setting instead.', 'joli-table-of-contents'), ['class' => ['description', 'danger']]),
                            // 'placeholder' => '10',
                            'dimensions_type' => 'padding',
                            'sub_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        // 'default' => [],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top' => 'integer',
                                'right' => 'integer',
                                'bottom' => 'integer',
                                'left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],
                ],
            ],

            // Numeration
            [
                'name' => 'numeration-styles',
                'title' => __('Numbering', 'joli-table-of-contents'),
                'fields' => [
                    [
                        'id' => 'numeration-color',
                        'title' => __('Numbering color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#adadad',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    [
                        'id' => 'numeration-color-hover',
                        'title' => __('Numbering color (hover)', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        //// 'default' => '#ffffff',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    [
                        'id' => 'numeration-color-active',
                        'title' => __('Numbering color (active)', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        //// 'default' => '#ffffff',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    // Badge color
                    [
                        'id' => 'numeration-badge-color',
                        'title' => __('Badge color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'new' => true, /* v3 */
                            'desc' => __('Badge text color (when numbering style is set to "Badge").', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        //// 'default' => '#ffffff',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    // Badge background color
                    [
                        'id' => 'numeration-badge-background-color',
                        'title' => __('Badge background color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'new' => true, /* v3 */
                            'desc' => __('Badge background color (when numbering style is set to "Badge").', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        //// 'default' => '#ffffff',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                ],
            ],
            [
                'name' => 'columns-style',
                'title' => __('Columns', 'joli-table-of-contents'),
                // 'desc' => __('<p class="joli-section-desc">Set custom colors to overrides defaults</p>', 'joli-table-of-contents'),
                'fields' => [
                    [
                        'id' => 'columns-separator-style',
                        'title' => __('Separator style', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Style of the separator between columns.', 'joli-table-of-contents'),
                            'values' => [
                                'solid' => __('Solid [Default]', 'joli-table-of-contents'),
                                'dashed' => __('Dashed', 'joli-table-of-contents'),
                                'dotted' => __('Dotted', 'joli-table-of-contents'),
                                'double' => __('Double', 'joli-table-of-contents'),
                                'ridge' => __('Ridge', 'joli-table-of-contents'),
                                'none' => __('None', 'joli-table-of-contents'),
                            ],
                        ],
                    ],

                    [

                        'id' => 'columns-separator-width',
                        'title' => __('Separator width', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '1',
                            'desc' => __('Width of the separator', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                            ],
                        ],
                        'default' => '1|px',
                        'sanitize' => 'unit',
                    ],
                    [
                        'id' => 'columns-separator-color',
                        'title' => __('Separator color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                ],
            ],
            // Columns
            // [
            //     'name' => 'columns-styles',
            //     'title' => __('Columns', 'joli-table-of-contents'),
            //     'fields' => [],
            // ],

            [
                'name' => 'custom-css',
                'title' => __('Custom CSS', 'joli-table-of-contents'),
                'fields' => [
                    [
                        'id' => 'css-code',
                        'title' => __('CSS code', 'joli-table-of-contents'),
                        'type' => 'textarea',
                        'args' => [
                            'placeholder' => '.wpj-jtoc--toc{ background: #ffffff; }',
                            'desc' => __('Write your own CSS to override settings or customize to your liking.', 'joli-table-of-contents'),
                            'classes' => 'large-text',
                            // 'custom' => sprintf('<a href="%sadmin.php?page=joli_toc_user_guide#custom-css">', get_admin_url()) . __('What can I customize ?', 'joli-table-of-contents') . '</a>',
                            'style' => [
                                'font-family' => 'monospace',
                                'color' => '#39383a',
                                'font-size' => '12px',
                                'padding-block' => '12px',
                                'min-width' => '420px',
                            ],
                        ],
                        'sanitize' => 'Textarea',
                        'has_block_attr' => false,
                    ],
                ],
            ],
        ],
    ],
    // END GROUP: STYLES ********************************************************

    // GROUP: FLOATING TABLE OF CONTENTS ********************************************************
    [
        'group' => 'floating-table-of-contents',
        'label' => __('Floating TOC', 'joli-table-of-contents'),
        'icon' => 'floating-toc',
        'sections' => [
            // Floating table of contents settings ----------
            [
                'name' => 'floating-table-of-contents',
                'title' => __('Floating table of contents', 'joli-table-of-contents'),
                'desc' => jtoc_tagify('p', __('The floating table of contents shows the table of contents in a floating widget hovering over or beside the content as the user scrolls.', 'joli-table-of-contents')),
                'fields' => [

                    [
                        'id' => 'activate-floating-table-of-contents',
                        'title' => __('Activate floating table of contents', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Activates the floating TOC widget', 'joli-table-of-contents'),
                            'children_sections' => [
                                'floating-widget-settings',
                                'floating-table-of-contents-settings',
                                'floating-table-of-contents-position',
                                'floating-widget-styles',
                            ],
                            'children' => [
                                'floating-compatibility-mode',
                                'floating-widget-mode',
                                'floating-widget-position',
                                'floating-widget-custom-text',
                                'floating-widget-icon',
                            ],
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],
                    [
                        'id' => 'floating-compatibility-mode',
                        'title' => __('Compatibility mode', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('Use this mode if you plan to use the table of contents in a page builder such as Divi, or if you notice any visual issues with the widget. Some page builders nest content in several divs, which can prevent the floating widget from displaying properly. When active, the widget will be moved up to the root div of the article if possible. Keep this off unless needed.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify(
                                'p',
                                __('Enable this if the floating table of contents is not visible, or is hidden behind an element...', 'joli-table-of-contents'),
                                ['class' => 'description']
                            ) . jtoc_tagify(
                                'p',
                                __('If the floating table of contents is still not visible with this option switched, you may need to manually set the "Content selector" option under General > Content container.', 'joli-table-of-contents'),
                                ['class' => 'description']
                            ),
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                    // Floating widget mode
                    [
                        'id' => 'floating-widget-mode',
                        'title' => __('Floating mode', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'pro' => true,
                            'new' => true, /* v3 */
                            'desc' => __('Floating widget mode. Shows either the active heading or a custom icon in the floating widget.', 'joli-table-of-contents'),
                            'values' => [
                                'heading' => __('Active heading', 'joli-table-of-contents'),
                                'title' => __('TOC title [+ icon (if set)]', 'joli-table-of-contents'),
                                'icon' => __('Custom icon', 'joli-table-of-contents'),
                                'custom' => __('Custom text', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'heading',
                    ],

                    // Custom text
                    [
                        'id' => 'floating-widget-custom-text',
                        'title' => __('Custom text', 'joli-table-of-contents'),
                        'type' => 'text',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            'pro' => true,
                            'new' => true, /* v3 */
                            'desc' => __('Custom text to display in the floating widget when the "Custom text" mode is selected.', 'joli-table-of-contents'),
                            'placeholder' => __('Table of contents', 'joli-table-of-contents'),
                            'data' => [
                                'dependency-field' => 'floating-widget-mode',
                                'dependency-value' => 'custom',
                            ],
                        ],
                        'default' => '',
                        'sanitize' => 'text',
                    ],

                    // Custom icon
                    [
                        'id' => 'floating-widget-icon',
                        'title' => __('Icon', 'joli-table-of-contents'),
                        'type' => 'lucideicon',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'default' => [
                            'icon' => $default_lucide_icon,
                            'stroke_width' => 2,
                            'size' => 20,
                            'color' => null,
                        ],
                        'args' => [
                            'pro' => true,
                            'new' => true, /* v3 */
                            'styles' => ':root{--floating_widget_custom_icon-stroke-width: 1px;}',
                            'desc' => __('Custom icon to display in the floating widget when the "Custom icon" mode is selected.', 'joli-table-of-contents'),
                            'path' => 'assets/public/icons',
                            'data' => [
                                'dependency-field' => 'floating-widget-mode',
                                'dependency-value' => 'icon',
                            ],
                        ],
                        'sanitize' => 'lucideicon',
                        'sanitize_args' => [
                            'icon' => 'string',
                            'stroke_width' => 'float',
                            'size' => 'integer',
                            'color' => 'color',
                        ],
                    ],
                ],
            ],


            // Floating table of contents behaviour ----------
            [
                'name' => 'floating-table-of-contents-position',
                // 'title' => __('Floating table of contents position', 'joli-table-of-contents'),
                'title' => __('Floating widget position & size', 'joli-table-of-contents'),
                'fields' => [

                    [
                        'id' => 'floating-position',
                        'title' => __('Floating position', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Position of the fixed floating menu relative to the screen.', 'joli-table-of-contents'),
                            'values' => [
                                'top' => __('Top', 'joli-table-of-contents'),
                                'bottom' => __('Bottom', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'top',
                        'sanitize' => 'values',
                    ],

                    // floating alignment
                    [
                        'id' => 'floating-alignment',
                        'title' => __('Floating alignment', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Alignment of the floating menu relative to the screen.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('Override the default alignment from General > Table of contents > Alignment.', 'joli-table-of-contents'), ['class' => 'description']),
                            'values' => [
                                'auto' => __('Auto', 'joli-table-of-contents'),
                                'left' => __('Left', 'joli-table-of-contents'),
                                'center' => __('Center', 'joli-table-of-contents'),
                                'right' => __('Right', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'auto',
                        'sanitize' => 'values',
                    ],

                    [
                        'id' => 'floating-offset-y',
                        'title' => __('Floating vertical offset (in pixels)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Offset on the Y axis from the edge of the viewport (from top or bottom depending on the Floating position).', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        'sanitize' => 'unit',
                        'default' => '10|px',
                    ],

                    [
                        'id' => 'floating-offset-y-mobile',
                        'title' => __('Floating vertical offset for mobile (in pixels)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'desc' => __('If not set, the value will be the same as for Desktop', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        'sanitize' => 'unit',
                        // 'default' => '10|px',
                    ],

                    [
                        'id' => 'floating-offset-x',
                        'title' => __('Floating horizontal offset (in pixels)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Offset on the X axis from the edge of the container.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('Use negative values to move the floating widget to the left. Use positive values to move the floating widget to the right.', 'joli-table-of-contents'), ['class' => 'description']),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        'sanitize' => 'unit',
                        // 'default' => '0',
                    ],

                    // Floating offset x (mobile)
                    [
                        'id' => 'floating-offset-x-mobile',
                        'title' => __('Floating horizontal offset for mobile (in pixels)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'desc' => __('If not set, the value will be the same as for Desktop', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        'sanitize' => 'unit',
                        // 'default' => '0',
                    ],

                    // Floating widget style: fixed and full width or fixed and auto width
                    [
                        'id' => 'floating-widget-width',
                        'title' => __('Width', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'args' => [
                            'pro' => true,
                            'new' => true, /* v3 */
                            'desc' => __('Floating widget style. The "Full width" style will make the widget take the full width of the screen and be aligned with the table of contents. The "Auto width" style will make the widget take only the necessary width to fit its content and be aligned with the active heading.', 'joli-table-of-contents'),
                            'values' => [
                                'auto' => __('Auto', 'joli-table-of-contents'),
                                'content' => __('Content width', 'joli-table-of-contents'),
                                'full' => __('Full width', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'auto',
                        'sanitize' => 'values',
                    ],

                    [
                        'id' => 'floating-widget-height',
                        'title' => __('Height', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            // // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('Floating widget height.', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        'sanitize' => 'unit',
                        'default' => '32|px',
                    ],
                ],
            ],

            [
                'name' => 'floating-widget-settings',
                'title' => __('Floating widget settings & behavior', 'joli-table-of-contents'),
                'desc' => jtoc_tagify('p', __('The floating widget is showing only the active heading and remains on top of the content in a fixed position.', 'joli-table-of-contents')),
                'fields' => [
                    // Visibility
                    [
                        'id' => 'floating-widget-show-from',
                        'title' => __('Show widget from', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('When the floating widget should start being visible (when scrolling).', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('If set to "Top of article", the widget will be visible from the top of the article (but not the top of the page).', 'joli-table-of-contents'), ['class' => 'description']),
                            'values' => [
                                'default' => __('First heading', 'joli-table-of-contents'),
                                'top' => __('Top of article ', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'default',
                        'sanitize' => 'values',
                    ],

                    [
                        'id' => 'expands-on',
                        'title' => __('Expands on (when folded)', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Event that expands the table of contents. (Hover does not apply on mobile.)', 'joli-table-of-contents'),
                            'values' => [
                                'hover' => __('Hover (only for desktop)', 'joli-table-of-contents'),
                                'click' => __('Click', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'hover',
                    ],

                    [
                        'id' => 'collapses-on',
                        'title' => __('Collapses on (when unfolded)', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Event that collapses the table of contents. (Hover does not apply on mobile.)', 'joli-table-of-contents'),
                            'values' => [
                                'hover-off' => __('Leave hover (only for desktop)', 'joli-table-of-contents'),
                                'click-away' => __('Click away', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'hover-off',
                    ],


                    [
                        'id' => 'floating-widget-display',
                        'title' => __('Display on', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('Display mode. Shows the floating widget on either Desktop or Mobile or Both.', 'joli-table-of-contents'),
                            'values' => [
                                'all' => __('Desktop & mobile', 'joli-table-of-contents'),
                                'desktop' => __('Desktop only', 'joli-table-of-contents'),
                                'mobile' => __('Mobile only', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'all',
                    ],
                    [
                        'id' => 'floating-hide-numeration',
                        'title' => __('Hide numbering in widget', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            // // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('Hides the numbering from the active heading text in the floating widget.', 'joli-table-of-contents'),
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'floating-nav-buttons',
                        'title' => __('Navigation buttons', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            // // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('Shows navigation buttons next to the active heading', 'joli-table-of-contents'),
                            'values' => [
                                'none' => __('None', 'joli-table-of-contents'),
                                'next' => __('Next', 'joli-table-of-contents'),
                                'prev_next' => __('Prev/Next', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'none',
                    ],

                    [
                        'id' => 'floating-nav-buttons-position',
                        'title' => __('Navigation buttons position', 'joli-table-of-contents'),
                        'type' => 'select',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            // // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('Navigation buttons position relative to the active heading', 'joli-table-of-contents'),
                            'values' => [
                                'left' => __('Left', 'joli-table-of-contents'),
                                'right' => __('Right', 'joli-table-of-contents'),
                                'around' => __('Around', 'joli-table-of-contents'),
                            ],
                            'data' => [
                                'dependency-field' => 'floating-nav-buttons',
                                'dependency-value' => 'none',
                                'dependency-operator' => '!=',
                            ],
                        ],
                        'default' => 'none',
                    ],

                    [
                        'id' => 'floating-nav-buttons-width',
                        'title' => __('Navigation buttons width', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            // // 'new' => true, /* legacy */
                            'pro' => true,
                            // 'desc' => __('Offset on the X axis from the edge of the container.', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                            'data' => [
                                'dependency-field' => 'floating-nav-buttons',
                                'dependency-value' => 'none',
                                'dependency-operator' => '!=',
                            ],
                        ],
                        'sanitize' => 'unit',
                        'default' => '32|px',
                    ],
                ],
            ],
            [
                'name' => 'floating-table-of-contents-settings',
                'title' => __('Floating table of contents settings', 'joli-table-of-contents'),
                'desc' => jtoc_tagify('p', __('The floating table of contents is showing after the user hovered/clicked the floating widget. It will show the whole table of contents over the content.', 'joli-table-of-contents')),
                'fields' => [

                    [
                        'id' => 'floating-show-header',
                        'title' => __('Show header', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Shows the header and title in the floating table of contents.', 'joli-table-of-contents'),
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                    // Top level headings only
                    [
                        'id' => 'floating-show-top-level-only',
                        'title' => __('Top level headings only (H2)', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Shows only top-level headings in the floating table of contents.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify(
                                'p',
                                __('Shows only the top level headings (H2) in the floating TOC regardless of the "Headings depth" option. This option is useful to reduce the size of the floating TOC and keep it visually clean.', 'joli-table-of-contents'),
                                ['class' => 'description']
                            ),
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],
                ],
            ],

            // Floating table of contents behaviour ----------
            [
                'name' => 'floating-widget-styles',
                'title' => __('Floating widget styles', 'joli-table-of-contents'),
                'fields' => [

                    [
                        'id' => 'floating-widget-background-color',
                        'title' => __('Background color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    [
                        'id' => 'floating-widget-current-heading-padding',
                        'title' => __('Widget text padding', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'pro' => true,
                            // 'desc' => __('Leave blank for default.', 'joli-table-of-contents'),
                            // 'placeholder' => '10',
                            'dimensions_type' => 'padding',
                            'sub_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        'default' => [
                            'dim' => [
                                'top' => '0',
                                'right' => '10',
                                'bottom' => '0',
                                'left' => '10',
                            ],
                            'unit' => 'px',
                        ],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top' => 'integer',
                                'right' => 'integer',
                                'bottom' => 'integer',
                                'left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],

                    [
                        'id' => 'floating-widget-color',
                        'title' => __('Widget text color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    [
                        'id' => 'floating-widget-font-size',
                        'title' => __('Widget text font size', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '1.25',
                            // 'desc' => __('Font size of the "Table of contents" title.', 'joli-table-of-contents') . ' ' . $vars['dontaddem'],
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        'sanitize' => 'unit',
                        // 'default' => '50|px',
                    ],

                    [
                        'id' => 'floating-widget-font-weight',
                        'title' => __('Widget text font weight', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'pro' => true,
                            // 'class' => 'tab-general',
                            'values' => $font_weight_list,
                        ],
                        'default' => 'none',
                    ],
                    [
                        'id' => 'floating-widget-nav-color',
                        'title' => __('Navigation buttons color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    [
                        'id' => 'floating-toc-shadow',
                        'title' => __('Shadow', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Displays a shadow around the floating widget and table of contents.', 'joli-table-of-contents'),
                            // 'classes' => 'joli-color-picker',//adds color picker
                        ],
                        'default' => true,
                        'sanitize' => 'checkbox'
                    ],
                    [
                        'id' => 'floating-toc-shadow-color',
                        'title' => __('Custom shadow color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#c2c2c2',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#c2c2c2',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    [
                        'id' => 'floating-widget-border-radius',
                        'title' => __('Border radius', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'pro' => true,
                            // 'desc' => __('Leave blank for default.', 'joli-table-of-contents'),
                            // 'placeholder' => '10',
                            'dimensions_type' => 'border',
                            'sub_dimensions' => ['top-left', 'top-right', 'bottom-right', 'bottom-left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        'default' => [
                            'dim' => [
                                'top-left' => '8',
                                'top-right' => '8',
                                'bottom-right' => '8',
                                'bottom-left' => '8',
                            ],
                            'unit' => 'px',
                        ],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top-left' => 'integer',
                                'top-right' => 'integer',
                                'bottom-right' => 'integer',
                                'bottom-left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],
                ],
            ],

        ],
    ],
    // END GROUP: SLIDE-OUT TABLE OF CONTENTS ********************************************************

    // GROUP: SLIDE-OUT TABLE OF CONTENTS ********************************************************
    [
        'group' => 'slide-out-table-of-contents',
        'label' => __('Slide-out TOC', 'joli-table-of-contents'),
        'icon' => 'slideout',
        'sections' => [
            // SLIDE-out table of contents behaviour ----------
            [
                'name' => 'slide-out-table-of-contents',
                'title' => __('Slide-out table of contents', 'joli-table-of-contents'),
                'desc' => jtoc_tagify('p', __('The slide-out table of contents shows a table of contents in a slide-out panel that slides from the edge of the screen.', 'joli-table-of-contents')),
                'fields' => [

                    [
                        'id' => 'activate-slide-out-table-of-contents',
                        'title' => __('Activate slide-out table of contents', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('Activates the slide-out table of contents', 'joli-table-of-contents'),
                            'children_sections' => [
                                'slide-out-table-of-contents-settings',
                                'slide-out-toggle-button',
                                'slide-out-table-of-contents-styles',
                                'slide-out-toggle-button-styles',
                                'slide-out-custom-content-boxes',
                            ],
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],
                ],
            ],
            // SLIDE-out table of contents behaviour ----------
            [
                'name' => 'slide-out-table-of-contents-settings',
                'title' => __('Slide-out table of contents settings', 'joli-table-of-contents'),
                'fields' => [

                    [
                        'id' => 'slide-out-blend-into-panel',
                        'title' => __('Blend into panel', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'annotation' => $recommended,
                            'desc' => __('Removes the table of contents border and background so it blends seamlessly into the slide-out panel.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('This will make the TOC styles blend perfectly with the slide-out panel. It will remove visual clutter (borders, shadows, non uniform backgrounds, etc) for a cleaner visual look.', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'slide-out-auto-scroll',
                        'title' => __('Auto-scroll to active heading', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('When the TOC overflows the viewport, it will autoscroll to the active heading as the user scrolls the page.', 'joli-table-of-contents'),
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'slide-out-display',
                        'title' => __('Display on', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('Display mode. Shows the slide out on either Desktop or Mobile or Both.', 'joli-table-of-contents'),
                            'values' => [
                                'all' => __('Desktop & mobile', 'joli-table-of-contents'),
                                'desktop' => __('Desktop only', 'joli-table-of-contents'),
                                'mobile' => __('Mobile only', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'all',
                    ],

                    [
                        'id' => 'slide-out-auto-close-desktop',
                        'title' => __('Auto-close (desktop)', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('Automatically close the slide-out panel when a heading is clicked.', 'joli-table-of-contents'),
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'slide-out-auto-close',
                        'title' => __('Auto-close (mobile)', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('Automatically close the slide-out panel when a heading is clicked (mobile).', 'joli-table-of-contents'),
                        ],
                        'default' => 1,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'slide-out-close-click-away',
                        'title' => __('Close on click away', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('Automatically close the slide-out panel when clicking anywhere outside of it.', 'joli-table-of-contents'),
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],
                    [
                        'id' => 'slide-out-open-on-load',
                        'title' => __('Open on load', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Open the slide-out panel on page load.', 'joli-table-of-contents'),
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'slide-out-hide-header',
                        'title' => __('Hide header', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Hides the header and title from the slide-out table of contents.', 'joli-table-of-contents'),
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],

                    [
                        'id' => 'slide-out-width',
                        'title' => __('Width', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Width of the slide-out table of contents.', 'joli-table-of-contents'),
                            // 'class' => 'tab-appearance'
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        'default' => '300|px',
                        'sanitize' => 'unit',
                    ],

                    // Width mobile
                    [
                        'id' => 'slide-out-width-mobile',
                        'title' => __('Width (mobile)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Width of the slide-out table of contents.', 'joli-table-of-contents'),
                            // 'class' => 'tab-appearance'
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        // 'default' => '300|px',
                        'sanitize' => 'unit',
                    ],

                    [
                        'id' => 'slide-out-mode',
                        'title' => __('Mode', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Push the page content to the right or left to make room for the slide-out panel.', 'joli-table-of-contents'),
                            'values' => [
                                'push' => __('Push content', 'joli-table-of-contents'),
                                'over' => __('Over content', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'push',
                    ],

                    [
                        'id' => 'slide-out-position',
                        'title' => __('Position', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Position of the slide-out widget relative to the viewport', 'joli-table-of-contents'),
                            'values' => [
                                'left' => __('Left', 'joli-table-of-contents'),
                                'right' => __('Right', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'left',
                    ],
                ],
            ],
            // SLIDE-out table of contents styles ----------
            [
                'name' => 'slide-out-table-of-contents-styles',
                'title' => __('Slide-out table of contents styles', 'joli-table-of-contents'),
                'fields' => [

                    [
                        'id' => 'slide-out-padding',
                        'title' => __('Padding', 'joli-table-of-contents'),
                        'type' => 'dimensions',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Padding of the slide-out area that contains the table of contents.', 'joli-table-of-contents'),
                            // 'placeholder' => '10',
                            'dimensions_type' => 'padding',
                            'sub_dimensions' => ['top', 'right', 'bottom', 'left'],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        'default' => [
                            'dim' => [
                                'top' => '20',
                                'right' => '20',
                                'bottom' => '20',
                                'left' => '20',
                            ],
                            'unit' => 'px',
                        ],
                        'sanitize' => 'dimensions',
                        'sanitize_args' => [
                            'dimensions' => [
                                'top' => 'integer',
                                'right' => 'integer',
                                'bottom' => 'integer',
                                'left' => 'integer',
                            ],
                            'units' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                    ],

                    [
                        'id' => 'slide-out-background-color',
                        'title' => __('Background color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                ],
            ],

            // SLIDE-out toggle button ----------
            [
                'name' => 'slide-out-toggle-button',
                'title' => __('Slide-out toggle button', 'joli-table-of-contents'),
                'fields' => [

                    [
                        'id' => 'slide-out-toggle-position',
                        'title' => __('Position', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Position of the slide-out toggle button.', 'joli-table-of-contents'),
                            'values' => [
                                'top' => __('Top', 'joli-table-of-contents'),
                                'center' => __('Center', 'joli-table-of-contents'),
                                'bottom' => __('Bottom', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'bottom',
                    ],

                    [
                        'id' => 'slide-out-toggle-width',
                        'title' => __('Width', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('Width of the slide-out toggle button.', 'joli-table-of-contents'),
                            // 'class' => 'tab-appearance'
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        'default' => '40|px',
                        'sanitize' => 'unit',
                    ],

                    [
                        'id' => 'slide-out-toggle-offset-y',
                        'title' => __('Vertical offset', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '50',
                            'desc' => __('Offset from the top/bottom of the viewport.', 'joli-table-of-contents'),
                            // 'classes' => 'joli-color-picker',//adds color picker
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        'default' => '50|px',
                        'sanitize' => 'unit',
                    ],
                    // Slide out toggle button type 
                    [
                        'id' => 'slide-out-toggle-button-type',
                        'title' => __('Button type', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'pro' => true,
                            'new' => true, /* v3 */
                            'desc' => __('Type of the slide-out toggle button.', 'joli-table-of-contents'),
                            'values' => [
                                'auto' => __('[Same as "TOC title icon"]', 'joli-table-of-contents'),
                                'icon-lucide' => __('Icon', 'joli-table-of-contents'),
                                'icon' => __('Icon (legacy)', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'icon',
                    ],

                    [
                        'id' => 'slide-out-toggle-button-icon-lucide',
                        'title' => __('Icon', 'joli-table-of-contents'),
                        'type' => 'lucideicon',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'default' => [
                            'icon' => $default_lucide_icon,
                            'stroke_width' => 2,
                            'size' => 20,
                            'color' => null,
                        ],
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'styles' => ':root{--slide_out_toggle_button_icon_lucide-stroke-width: 1px;}',
                            'desc' => __('Select an icon that will be shown next to the TOC Title. Adjust the size, stroke width and color.', 'joli-table-of-contents'),
                            'path' => 'assets/public/icons',
                            'data' => [
                                'dependency-field' => 'slide-out-toggle-button-type',
                                'dependency-value' => 'icon-lucide',
                            ],
                        ],
                        'sanitize' => 'lucideicon',
                        'sanitize_args' => [
                            'icon' => 'string',
                            'stroke_width' => 'float',
                            'size' => 'integer',
                            'color' => 'color',
                        ],
                    ],

                    [
                        'id' => 'slide-out-toggle-button-icon',
                        'title' => __('Icon', 'joli-table-of-contents'),
                        'type' => 'radioicon',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'default' => 'gg-layout-list',
                        'args' => [
                            'pro' => true,
                            // 'desc' => sprintf( '<span style="color:red;">%s</span>', __('Any changes in any styling below (title, headings, colors etc) will override theme defaults', 'joli-table-of-contents') ),
                            'values' => [
                                'gg-layout-list' => '<i class="gg-layout-list"></i>',
                                'gg-layout-grid-small' => '<i class="gg-layout-grid-small"></i>',
                                // 'gg-math-minus' => '<i class="gg-math-minus"></i>',
                                // 'gg-chevron-down' => '<i class="gg-chevron-down"></i>',
                                // 'gg-chevron-up' => '<i class="gg-chevron-up"></i>',
                                'gg-menu' => '<i class="gg-menu"></i>',
                                'gg-menu-left-alt' => '<i class="gg-menu-left-alt"></i>',
                                'gg-edit-highlight' => '<i class="gg-edit-highlight"></i>',
                                'gg-math-plus' => '<i class="gg-math-plus"></i>',
                                // 'gg-pentagon-down' => '<i class="gg-pentagon-down"></i>',
                                // 'gg-pentagon-up' => '<i class="gg-pentagon-up"></i>',
                                // 'gg-add-r' => '<i class="gg-add-r"></i>',
                                // 'gg-remove-r' => '<i class="gg-remove-r"></i>',
                                // 'gg-add' => '<i class="gg-add"></i>',
                                // 'gg-remove' => '<i class="gg-remove"></i>',
                                // 'gg-close' => '<i class="gg-close"></i>',
                                // 'gg-chevron-double-down' => '<i class="gg-chevron-double-down"></i>',
                                // 'gg-chevron-double-up' => '<i class="gg-chevron-double-up"></i>',
                                // 'gg-chevron-down-o' => '<i class="gg-chevron-down-o"></i>',
                                // 'gg-chevron-up-o' => '<i class="gg-chevron-up-o"></i>',
                            ],
                            'custom' => jtoc_tagify(
                                'p',
                                __('Check <a href="https://wpjoli.com/docs/joli-table-of-contents/developer-hooks/filters/jtoc_slide_out_toggle_html-pro/" target="_blank">this documentation</a> to find out how to use custom HTML for the toggle button', 'joli-table-of-contents'),
                                ['class' => 'description']
                            ),
                            'data' => [
                                'dependency-field' => 'slide-out-toggle-button-type',
                                'dependency-value' => 'icon',
                            ],
                        ],
                    ],
                ],
            ],

            // SLIDE-out table of contents styles ----------
            [
                'name' => 'slide-out-toggle-button-styles',
                'title' => __('Slide-out toggle button styles', 'joli-table-of-contents'),
                'fields' => [
                    // Shadow (switch)
                    [
                        'id' => 'slide-out-toggle-button-shadow',
                        'title' => __('Toggle button shadow', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Add a shadow to the toggle button.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify(
                                'p',
                                'The shadow has a "lift" effect on mouse hover.',
                                ['class' => 'description']
                            ),
                        ],
                        'default' => true,
                        'sanitize' => 'checkbox'
                    ],

                    [
                        'id' => 'slide-out-toggle-color',
                        'title' => __('Toggle color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Default is set to links color.', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    [
                        'id' => 'slide-out-toggle-background-color',
                        'title' => __('Toggle background color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Default is set to the table of contents background color.', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    // [
                    //     'id' => 'slide-out-toggle-border-radius',
                    //     'title' => __('Border radius', 'joli-table-of-contents'),
                    //     'type' => 'dimensions',
                    //     'args' => [
                    //         'desc' => __('Border radius of the slide-out toggle button.', 'joli-table-of-contents'),
                    //         // 'placeholder' => '10',
                    //         'dimensions_type' => 'border',
                    //         'sub_dimensions' => ['top-left', 'top-right', 'bottom-right', 'bottom-left'],
                    //         'units' => [
                    //             'px' => 'px',
                    //             'em' => 'em',
                    //             'rem' => 'rem',
                    //             'percent' => '%',
                    //         ],
                    //     ],
                    //     // 'default' => [],
                    //     'sanitize' => 'dimensions',
                    //     'sanitize_args' => [
                    //         'dimensions' => [
                    //             'top-left' => 'integer',
                    //             'top-right' => 'integer',
                    //             'bottom-right' => 'integer',
                    //             'bottom-left' => 'integer',
                    //         ],
                    //         'units' => [
                    //             'px' => 'px',
                    //             'em' => 'em',
                    //             'rem' => 'rem',
                    //             'percent' => '%',
                    //         ],
                    //     ],
                    // ],

                    [
                        'id' => 'slide-out-toggle-rounding',
                        'title' => __('Toggle rounding', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'args' => [
                            // 'custom' => jtoc_tagify('p', __('Only applies to tooltip style', 'joli-table-of-contents'), ['class' => 'description']), // applies to tooltip only,
                            'pro' => true,
                            'new' => true, /* v3 */
                            'desc' => __('Border radius of the slide-out toggle button', 'joli-table-of-contents'),
                            'values' => [
                                'none' => '0px', // keep the px 
                                's' => '4px',
                                'm' =>  '8px',
                                'l' =>  '12px',
                                'xl' => '16px',
                                'arch' => '50%',
                                'full' => '5em',
                            ],
                            'labels' => [
                                'none' => __('None', 'joli-table-of-contents'),
                                's' => __('S', 'joli-table-of-contents'),
                                'm' => __('M', 'joli-table-of-contents'),
                                'l' => __('L', 'joli-table-of-contents'),
                                'xl' => __('XL', 'joli-table-of-contents'),
                                'arch' => __('Segmental Arch', 'joli-table-of-contents'),
                                'full' => __('Semi-circular', 'joli-table-of-contents'),
                            ],
                            'style' => $slider_style,
                        ],
                        'default' => '8px',
                        'sanitize' => 'values',
                        // 'value_callback' => 'processSliderValue', // Function must be in SettingsCallbacks
                    ],

                    [
                        'id' => 'slide-out-toggle-border-width',
                        'title' => __('Border width', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'args' => [
                            'new' => true, /* v3 */
                            // 'nullable' => true,
                            'values' => [
                                'none' => '0px', // keep the px 
                                'xxs' => '1px',
                                'xs' => '1.5px',
                                's' =>  '2px',
                                'm' =>  '3px',
                                'l' =>  '4px',
                                'xl' => '5px',
                            ],
                            'labels' => [
                                'none' => __('None', 'joli-table-of-contents'),
                                'xxs' => __('XXS', 'joli-table-of-contents'),
                                'xs' => __('XS', 'joli-table-of-contents'),
                                's' => __('S', 'joli-table-of-contents'),
                                'm' => __('M', 'joli-table-of-contents'),
                                'l' => __('L', 'joli-table-of-contents'),
                                'xl' => __('XL', 'joli-table-of-contents'),
                            ],
                            'style' => $slider_style,
                        ],
                        'sanitize' => 'values',
                        // 'value_callback' => 'processSliderValue', // Function must be in SettingsCallbacks
                    ],

                    [
                        'id' => 'slide-out-toggle-border-color',
                        'title' => __('Border color', 'joli-table-of-contents'),
                        // 'type' => 'text',
                        'type' => 'color',
                        'args' => [
                            'new' => true, /* v3 */
                            'desc' => __('Border color of the slide-out toggle button.', 'joli-table-of-contents'),
                            // 'class' => 'tab-appearance',
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#ffffff',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                ],
            ],

            // SLIDE-out table of contents custom content ----------
            [
                'name' => 'slide-out-custom-content-boxes',
                'title' => __('Slide-out custom content boxes', 'joli-table-of-contents'),
                'fields' => [

                    [
                        'id' => 'slide-out-custom-box-top',
                        'title' => __('Top box', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'desc' => __("Enables the top box to allow for custom content.", 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('Refer to this documentation to add custom content within the box: ', 'joli-table-of-contents') . jtoc_tagify(
                                'a',
                                __('joli_toc_slide_out_box_top', 'joli-table-of-contents'),
                                [
                                    'href' => 'https://wpjoli.com/docs/joli-table-of-contents/developer-hooks/actions/joli_toc_slide_out_box_top/',
                                    'target' => '_blank'
                                ]
                            ), ['class' => 'description']),
                            'children' => [
                                'slide-out-custom-box-top-height'
                            ],
                        ],
                        'default' => false,
                        'sanitize' => 'checkbox'
                    ],
                    [
                        'id' => 'slide-out-custom-box-top-height',
                        'title' => __('Top box height', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('Height of the custom box within the slide-out.', 'joli-table-of-contents'),
                            // 'class' => 'tab-appearance'
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        'default' => '200|px',
                        'sanitize' => 'unit',
                    ],
                    [
                        'id' => 'slide-out-custom-box-bottom',
                        'title' => __('Bottom box', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'desc' => __("Enables the bottom box to allow for custom content.", 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('Refer to this documentation to add custom content within the box: ', 'joli-table-of-contents') . jtoc_tagify(
                                'a',
                                __('joli_toc_slide_out_box_bottom', 'joli-table-of-contents'),
                                [
                                    'href' => 'https://wpjoli.com/docs/joli-table-of-contents/developer-hooks/actions/joli_toc_slide_out_box_bottom/',
                                    'target' => '_blank'
                                ]
                            ), ['class' => 'description']),
                            'children' => [
                                'slide-out-custom-box-bottom-height'
                            ],
                        ],
                        'default' => false,
                        'sanitize' => 'checkbox'
                    ],
                    [
                        'id' => 'slide-out-custom-box-bottom-height',
                        'title' => __('Bottom box height', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'class' => '--field-child', // class for the field row (the wrapper), not the input
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('Height of the custom box within the slide-out.', 'joli-table-of-contents'),
                            // 'class' => 'tab-appearance'
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        'default' => '200|px',
                        'sanitize' => 'unit',
                    ],
                ],
            ],
        ],
    ],
    // END GROUP: SLIDE-OUT TABLE OF CONTENTS ********************************************************

    // GROUP: TIMELINE TABLE OF CONTENTS ********************************************************
    [
        'group' => 'timeline-table-of-contents',
        'label' => __('Timeline TOC', 'joli-table-of-contents'),
        'icon' => 'timeline',
        'sections' => [
            [
                'name' => 'timeline-table-of-contents',
                'title' => __('Timeline table of contents', 'joli-table-of-contents'),
                'desc' => jtoc_tagify('p', __('The timeline table of contents shows in a fixed timeline on the side of the screen. It is a great way to quickly navigate to any section of the page. The markers are spaced proportionally to where they are on the page.', 'joli-table-of-contents')),
                'fields' => [
                    // Activate timeline
                    [
                        'id' => 'activate-timeline-table-of-contents',
                        'title' => __('Activate timeline table of contents', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'new' => true, /* v3 */
                            'pro' => true,
                            'desc' => __('Activates the timeline table of contents', 'joli-table-of-contents'),
                            'children_sections' => [
                                'general',
                                'behavior-and-ux',
                                'position-and-size',
                                'timeline-colors-styles',
                                'timeline-markers',
                                'timeline-marker-labels',
                                'timeline-scroll-spy',
                                'timeline-animations',
                            ],
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],
                ],
            ],
            /*** GENERAL ***/
            [
                'name' => 'general',
                'title' => __('General', 'joli-table-of-contents'),
                'fields' => [
                    // Show on device
                    [
                        'id' => 'timeline-display',
                        'title' => __('Display on', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('Show timeline on selected device types.', 'joli-table-of-contents'),
                            'values' => [
                                'all' => __('Desktop & mobile', 'joli-table-of-contents'),
                                'desktop' => __('Desktop only', 'joli-table-of-contents'),
                                'mobile' => __('Mobile only', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'all',
                    ],

                    // Auto-expand behavior
                    // Depth H2/H2-H3 (radio)
                    [
                        'id' => 'timeline-headings-depth',
                        'title' => __('Headings depth', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('Type of headings to show in the timeline.', 'joli-table-of-contents'),
                            'values' => [
                                '2' => 'H2',
                                '3' => 'H2 & H3',
                            ],
                            'custom' => jtoc_tagify('p', __('H3 markers will be smaller than H2 markers.', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        'default' => '3',
                    ],

                    // Depth mobile H2/H2-H3 (radio)
                    [
                        'id' => 'timeline-headings-depth-mobile',
                        'title' => __('Mobile headings depth', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('Type of headings to show in the timeline on mobile.', 'joli-table-of-contents'),
                            'values' => [
                                '2' => 'H2',
                                '3' => 'H2 & H3',
                            ],
                            'custom' => jtoc_tagify('p', __('H3 markers will be smaller than H2 markers.', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        'default' => '2',
                    ],

                    // Timeline Z-index
                    [
                        'id' => 'timeline-z-index',
                        'title' => __('Z-index', 'joli-table-of-contents'),
                        'type' => 'number',
                        'args' => [
                            'pro' => true,
                            'min' => 0,
                            'max' => 100000,
                            'step' => 1,
                            // 'new' => true, /* legacy */
                            'desc' => __('The z-index of the timeline.', 'joli-table-of-contents'),
                            'placeholder' => '1500',
                            'custom' => jtoc_tagify('p', __('Increase this value if other elements overlap the timeline and is not fully visible.', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        // 'default' => '1',
                    ],

                    // Expand on hover delay (delay before trigger)
                    [
                        'id' => 'timeline-expand-delay',
                        'title' => __('Expand delay', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'args' => [
                            'pro' => true,
                            'custom' => jtoc_tagify('p', __('Delay between the moment the mouse enters the trigger area and the moment the timeline expands.', 'joli-table-of-contents'), ['class' => 'description']),
                            // 'nullable' => true,
                            'values' => [
                                // 'none' => '0',
                                'instant' => '0ms',
                                'shorter' => '100ms',
                                'short' => '150ms',
                                'normal' => '200ms',
                                'slow' => '300ms',
                                'slower' => '400ms',
                            ],
                            'labels' => [
                                // 'none' => __('None', 'joli-table-of-contents'),
                                // range from fast to slow (5 degrees of speed)
                                // 'fastest' => __('Fastest', 'joli-table-of-contents'),
                                'instant' => __('Instant', 'joli-table-of-contents'),
                                'shorter' => __('Shorter', 'joli-table-of-contents'),
                                'short' => __('Short', 'joli-table-of-contents'),
                                'normal' => __('Normal', 'joli-table-of-contents'),
                                'long' => __('Long', 'joli-table-of-contents'),
                                'longer' => __('Longer', 'joli-table-of-contents'),
                                // 'slowest' => __('Slowest', 'joli-table-of-contents'),

                            ],
                            'style' => $slider_style,
                        ],
                        'default' => '200ms',
                        'sanitize' => 'values',
                        // 'value_callback' => 'processSliderValue', // Function must be in SettingsCallbacks
                    ],

                    // Show animations
                    // [
                    //     'id' => 'timeline-animations',
                    //     'title' => __('Show animations', 'joli-table-of-contents'),
                    //     'type' => 'switch',
                    //     'args' => [
                    //         'pro' => true,
                    //         // 'new' => true, /* legacy */
                    //         'desc' => __('Show animations.', 'joli-table-of-contents'),
                    //         'children' => [
                    //              'timeline-animation-duration',
                    //         ],
                    //     ],
                    //     'default' => 1,
                    //     'sanitize' => 'checkbox',
                    // ],

                    // Transition duration
                    [
                        'id' => 'timeline-animation-duration',
                        'title' => __('Animation duration', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'args' => [
                            'pro' => true,
                            'custom' => jtoc_tagify('p', __('Duration of the timeline expansion animation.', 'joli-table-of-contents'), ['class' => 'description']),
                            'values' => [
                                'instant' => '0ms',
                                'faster' => '125ms',
                                'fast' => '250ms',
                                'normal' => '375ms',
                                'slow' => '500ms',
                                'slower' => '750ms',
                            ],
                            'labels' => [
                                'instant' => __('Instant', 'joli-table-of-contents'),
                                'faster' => __('Faster', 'joli-table-of-contents'),
                                'fast' => __('Fast', 'joli-table-of-contents'),
                                'normal' => __('Normal', 'joli-table-of-contents'),
                                'slow' => __('Slow', 'joli-table-of-contents'),
                                'slower' => __('Slower', 'joli-table-of-contents'),
                            ],
                            'style' => $slider_style,
                        ],
                        'default' => '250ms',
                        'sanitize' => 'values',
                        // 'sanitize_args' => ['faster', 'fast', 'normal', 'slow', 'slower'], // If not sanitize_args is passed, sanitizeValues will use its values defined in args to match against.
                        // 'value_callback' => 'processSliderValue', // Function must be in SettingsCallbacks
                    ],
                ],
            ],


            /*** BEHAVIOR & UX ***/
            [
                'name' => 'behavior-and-ux',
                'title' => __('Behavior and UX', 'joli-table-of-contents'),
                'fields' => [
                    // Hover trigger area width
                    [
                        'id' => 'timeline-hover-trigger-width',
                        'title' => __('Hover trigger area width', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('The width of the hover trigger area.', 'joli-table-of-contents'),
                            'placeholder' => '10',
                            'custom' => jtoc_tagify('p', __('The trigger area expands the timeline when the mouse enters it. A lower value will require the mouse to be closer to the edge of the screen to fully expand the timeline.', 'joli-table-of-contents'), ['class' => 'description']),
                            'values' => [
                                'percent' => '%',
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        'sanitize' => 'unit',
                        // 'default' => '50|px',
                    ],

                    // Hover trigger area width (mobile)
                    [
                        'id' => 'timeline-hover-trigger-width-mobile',
                        'title' => __('Hover trigger area width (mobile)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('The width of the hover trigger area on mobile.', 'joli-table-of-contents'),
                            'placeholder' => '10',
                            'values' => [
                                'percent' => '%',
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        'sanitize' => 'unit',
                        // 'default' => '50|px',
                    ],

                    // Timeline width (expanded state)
                    [
                        'id' => 'timeline-expanded-width',
                        'title' => __('Timeline container width (expanded state)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('The width of the timeline (including marker labels) when expanded.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('The width of the timeline when expanded. When the mouse leaves this area, the timeline will retract.', 'joli-table-of-contents'), ['class' => 'description']),
                            'placeholder' => '300',
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        'sanitize' => 'unit',
                        // 'default' => '300|px',
                    ],

                    // Expand on click
                ],
            ],

            // /*** POSITION & SIZE ***/
            [
                'name' => 'position-and-size',
                'title' => __('Position and size', 'joli-table-of-contents'),
                'fields' => [

                    // Horizontal offset
                    [
                        'id' => 'timeline-offset-x',
                        'title' => __('Horizontal offset', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Offset on the X axis from the edge of the container.', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                            'custom' => jtoc_tagify('p', __('This value is used when the timeline is not expanded. Use negative values to partially or fully hide the timeline. Use the same value as the "expanded" setting below to keep the timeline fully visible and static.', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        // 'default' => '0|px',
                        'sanitize' => 'unit',
                    ],

                    // Horizontal offset (expanded)
                    [
                        'id' => 'timeline-offset-x-expanded',
                        'title' => __('Horizontal offset (expanded)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Offset on the X axis from the edge of the container.', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                            'custom' => jtoc_tagify('p', __('Using a different value from the "Horizontal offset" will create a sliding animation when expanding the timeline.', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        // 'default' => '0|px',
                        'sanitize' => 'unit',
                    ],

                    // Horizontal offset mobile
                    [
                        'id' => 'timeline-offset-x-mobile',
                        'title' => __('Horizontal offset (mobile)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Offset on the X axis from the edge of the container.', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        // 'default' => '0|px',
                        'sanitize' => 'unit',
                    ],

                    // Horizontal offset mobile (expanded)
                    [
                        'id' => 'timeline-offset-x-expanded-mobile',
                        'title' => __('Horizontal offset (expanded) (mobile)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Offset on the X axis from the edge of the container.', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        // 'default' => '0|px',
                        'sanitize' => 'unit',
                    ],

                    // Timeline width
                    [
                        'id' => 'timeline-width',
                        'title' => __('Timeline width', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'args' => [
                            'pro' => true,
                            'desc' => __('The width of the timeline.', 'joli-table-of-contents'),
                            'values' => [
                                'xxs' => '0.67px',
                                'xs'  => '1px',
                                's'   => '2px',
                                'm'   => '3px',
                                'l'   => '4px',
                                'xl'  => '6px',
                                'xxl' => '8px',
                            ],
                            'labels' => [
                                'xxs' => __('XXS', 'joli-table-of-contents'),
                                'xs'  => __('XS', 'joli-table-of-contents'),
                                's'   => __('S', 'joli-table-of-contents'),
                                'm'   => __('M', 'joli-table-of-contents'),
                                'l'   => __('L', 'joli-table-of-contents'),
                                'xl'  => __('XL', 'joli-table-of-contents'),
                                'xxl' => __('XXL', 'joli-table-of-contents'),
                            ],
                            'style' => $slider_style,
                            // 'nullable' => true,
                        ],
                        'default' => '3px',
                        'sanitize' => 'values', // values passed in args
                        // 'sanitize_args' => ['0.67px', '1px', '2px', '3px', '4px', '6px', '8px'], // must be the same as values
                        // 'value_callback' => 'processSliderValue', // Function must be in SettingsCallbacks
                    ],


                    // Offset top
                    [
                        'id' => 'timeline-offset-top',
                        'title' => __('Offset top', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Offset between the top of the viewport and the timeline.', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                                'vh' => 'vh',
                            ],
                            'custom' => jtoc_tagify('p', __('Adjust this setting if your theme has a fixed header.', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        // 'default' => '0|px',
                        'sanitize' => 'unit',
                    ],

                    // Offset top (mobile)
                    [
                        'id' => 'timeline-offset-top-mobile',
                        'title' => __('Offset top (mobile)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Offset between the top of the viewport and the timeline.', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                                'vh' => 'vh',
                            ],
                            'custom' => jtoc_tagify('p', __('Adjust this setting only if you need a different value from the desktop setting.', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        // 'default' => '0|px',
                        'sanitize' => 'unit',
                    ],

                    // Offset bottom
                    [
                        'id' => 'timeline-offset-bottom',
                        'title' => __('Offset bottom', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Offset between the bottom of the viewport and the timeline.', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                                'vh' => 'vh',
                            ],
                            'custom' => jtoc_tagify('p', __('Adjust this setting if your theme has a fixed footer.', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        // 'default' => '0|px',
                        'sanitize' => 'unit',
                    ],

                    // Offset bottom (mobile)
                    [
                        'id' => 'timeline-offset-bottom-mobile',
                        'title' => __('Offset bottom (mobile)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Offset between the bottom of the viewport and the timeline.', 'joli-table-of-contents'),
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                                'vh' => 'vh',
                            ],
                            'custom' => jtoc_tagify('p', __('Adjust this setting only if you need a different value from the desktop setting.', 'joli-table-of-contents'), ['class' => 'description']),
                        ],
                        // 'default' => '0|px',
                        'sanitize' => 'unit',
                    ],

                    // Marker size
                    // [],

                    // Tiny marker size
                    // [],

                    // Z-index
                    // [],

                ],
            ],

            /*** COLORS & STYLES ***/
            [
                'name' => 'timeline-colors-styles',
                'title' => __('Colors & Styles', 'joli-table-of-contents'),
                'fields' => [
                    // Timeline color
                    [
                        'id' => 'timeline-color',
                        'title' => __('Timeline color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Change the timeline color', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // css var: --jtoc-tl-color
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    // Progress bar color
                    [
                        'id' => 'timeline-progress-bar-color',
                        'title' => __('Progress bar color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Change the progress bar color', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // css var: --jtoc-tl-progress-bar-color
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    // H2 heading color


                    // H2 heading color (hover)


                    // H2 heading color (active)

                ],
            ],

            /*** MARKERS ***/
            [
                'name' => 'timeline-markers',
                'title' => __('Markers', 'joli-table-of-contents'),
                'fields' => [


                    // H2 Marker text color
                    [
                        'id' => 'timeline-marker-text-color',
                        'title' => __('Marker numbering color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Change the marker numbering color.', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // css var: --jtoc-tl-marker-text-color
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                    // H2 Marker background color
                    [
                        'id' => 'timeline-marker-background-color',
                        'title' => __('Marker background color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Change the marker background color', 'joli-table-of-contents'),
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // css var: --jtoc-tl-marker-background-color
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    // H2 Marker size
                    [
                        'id' => 'timeline-marker-size',
                        'title' => __('Marker size', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'args' => [
                            'pro' => true,
                            'nullable' => true,
                            'values' => [
                                'xxs' => '8px',
                                'xs' => '12px',
                                's' =>  '16px',
                                'm' =>  '20px',
                                'l' =>  '24px',
                                'xl' => '28px',
                                'xxl' => '32px',
                            ],
                            'labels' => [
                                'xxs' => __('XXS', 'joli-table-of-contents'),
                                'xs' => __('XS', 'joli-table-of-contents'),
                                's' => __('S', 'joli-table-of-contents'),
                                'm' => __('M', 'joli-table-of-contents'),
                                'l' => __('L', 'joli-table-of-contents'),
                                'xl' => __('XL', 'joli-table-of-contents'),
                                'xxl' => __('XXL', 'joli-table-of-contents'),
                            ],
                            'style' => $slider_style,
                        ],
                        'sanitize' => 'values',
                        // 'value_callback' => 'processSliderValue', // Function must be in SettingsCallbacks
                    ],
                    // H2 Marker size (expanded state)
                    [
                        'id' => 'timeline-marker-size-expanded',
                        'title' => __('Marker size (expanded state)', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'args' => [
                            'pro' => true,
                            'custom' => jtoc_tagify('p', __('The numbering is shown within the marker when the timeline is expanded.', 'joli-table-of-contents'), ['class' => 'description']),
                            'nullable' => true,
                            'values' => [
                                'xxs' => '8px',
                                'xs' => '12px',
                                's' =>  '16px',
                                'm' =>  '20px',
                                'l' =>  '24px',
                                'xl' => '28px',
                                'xxl' => '32px',
                            ],
                            'labels' => [
                                'xxs' => __('XXS', 'joli-table-of-contents'),
                                'xs' => __('XS', 'joli-table-of-contents'),
                                's' => __('S', 'joli-table-of-contents'),
                                'm' => __('M', 'joli-table-of-contents'),
                                'l' => __('L', 'joli-table-of-contents'),
                                'xl' => __('XL', 'joli-table-of-contents'),
                                'xxl' => __('XXL', 'joli-table-of-contents'),
                            ],
                            'style' => $slider_style,
                        ],
                        'sanitize' => 'values',
                        // 'value_callback' => 'processSliderValue', // Function must be in SettingsCallbacks
                    ],
                    // H2 Marker border width
                    [
                        'id' => 'timeline-marker-border-width',
                        'title' => __('Marker border width', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'args' => [
                            'pro' => true,
                            'nullable' => true,
                            'values' => [
                                'none' => '0px',
                                'xxs' => '1px',
                                'xs' => '1.5px',
                                's' =>  '2px',
                                'm' =>  '3px',
                                'l' =>  '4px',
                                'xl' => '5px',
                            ],
                            'labels' => [
                                'none' => __('None', 'joli-table-of-contents'),
                                'xxs' => __('XXS', 'joli-table-of-contents'),
                                'xs' => __('XS', 'joli-table-of-contents'),
                                's' => __('S', 'joli-table-of-contents'),
                                'm' => __('M', 'joli-table-of-contents'),
                                'l' => __('L', 'joli-table-of-contents'),
                                'xl' => __('XL', 'joli-table-of-contents'),
                            ],
                            'style' => $slider_style,
                        ],
                        'sanitize' => 'values',
                        // 'value_callback' => 'processSliderValue', // Function must be in SettingsCallbacks
                    ],

                    // H2 Marker border color
                    [
                        'id' => 'timeline-marker-border-color',
                        'title' => __('Marker border color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // css var: --jtoc-tl-marker-border-color
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    // H3 Marker background color
                    [
                        'id' => 'timeline-marker-h3-background-color',
                        'title' => __('Marker background color (H3)', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // css var: --jtoc-tl-marker-background-color
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    // H3 Marker size
                    [
                        'id' => 'timeline-marker-h3-size',
                        'title' => __('Marker size (H3)', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'args' => [
                            'pro' => true,
                            'nullable' => true,
                            'values' => [
                                'xs' => '4px',
                                's' =>  '6px',
                                'm' =>  '8px',
                                'l' =>  '10px',
                                'xl' => '12px',
                            ],
                            'labels' => [
                                'xs' => __('XS', 'joli-table-of-contents'),
                                's' => __('S', 'joli-table-of-contents'),
                                'm' => __('M', 'joli-table-of-contents'),
                                'l' => __('L', 'joli-table-of-contents'),
                                'xl' => __('XL', 'joli-table-of-contents'),
                            ],
                            'style' => $slider_style,
                        ],
                        'sanitize' => 'values',
                        // 'value_callback' => 'processSliderValue', // Function must be in SettingsCallbacks
                    ],

                    // H3 Marker border width
                    [
                        'id' => 'timeline-marker-h3-border-width',
                        'title' => __('Marker border width (H3)', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'args' => [
                            'pro' => true,
                            'nullable' => true,
                            'values' => [
                                'none' => '0px', // keep the px 
                                'xxs' => '1px',
                                'xs' => '1.5px',
                                's' =>  '2px',
                                'm' =>  '3px',
                                'l' =>  '4px',
                                'xl' => '5px',
                            ],
                            'labels' => [
                                'none' => __('None', 'joli-table-of-contents'),
                                'xxs' => __('XXS', 'joli-table-of-contents'),
                                'xs' => __('XS', 'joli-table-of-contents'),
                                's' => __('S', 'joli-table-of-contents'),
                                'm' => __('M', 'joli-table-of-contents'),
                                'l' => __('L', 'joli-table-of-contents'),
                                'xl' => __('XL', 'joli-table-of-contents'),
                            ],
                            'style' => $slider_style,
                        ],
                        'sanitize' => 'values',
                        // 'value_callback' => 'processSliderValue', // Function must be in SettingsCallbacks
                    ],
                    // H3 Marker border color
                    [
                        'id' => 'timeline-marker-h3-border-color',
                        'title' => __('Marker border color (H3)', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // css var: --jtoc-tl-marker-border-color
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                ],
            ],

            /*** MARKER LABELS ***/
            [
                'name' => 'timeline-marker-labels',
                'title' => __('Marker labels', 'joli-table-of-contents'),
                'fields' => [
                    // Marker labels max width
                    [
                        'id' => 'marker-label-max-width',
                        'title' => __('Marker label max width', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('The width of the timeline (including marker labels) when expanded.', 'joli-table-of-contents'),
                            'placeholder' => '300',
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                                'percent' => '%',
                            ],
                        ],
                        'sanitize' => 'unit',
                        // 'default' => '300|px',
                    ],
                    // Label styles (default or tooltip)
                    [
                        'id' => 'timeline-marker-label-style',
                        'title' => __('Marker label style', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('Choose the marker label style', 'joli-table-of-contents'),
                            'values' => [
                                'plain' => __('Plain', 'joli-table-of-contents'),
                                'tooltip' => __('Tooltip', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'tooltip',
                    ],

                    // Label tooltip rounding
                    [
                        'id' => 'timeline-marker-label-rounding',
                        'title' => __('Marker label rounding', 'joli-table-of-contents'),
                        'type' => 'slider',
                        'args' => [
                            'custom' => jtoc_tagify('p', __('Only applies to tooltip style', 'joli-table-of-contents'), ['class' => 'description']), // applies to tooltip only,
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('Change the marker label tooltip rounding', 'joli-table-of-contents'),
                            'values' => [
                                'none' => '0px', // keep the px 
                                'xxs' => '1px',
                                'xs' => '2px',
                                's' =>  '3px',
                                'm' =>  '4px',
                                'l' =>  '6px',
                                'xl' => '8px',
                                'full' => '2em',
                            ],
                            'labels' => [
                                'none' => __('None', 'joli-table-of-contents'),
                                'xxs' => __('XXS', 'joli-table-of-contents'),
                                'xs' => __('XS', 'joli-table-of-contents'),
                                's' => __('S', 'joli-table-of-contents'),
                                'm' => __('M', 'joli-table-of-contents'),
                                'l' => __('L', 'joli-table-of-contents'),
                                'xl' => __('XL', 'joli-table-of-contents'),
                                'full' => __('Full', 'joli-table-of-contents'),
                            ],
                            'style' => $slider_style,
                        ],
                        'default' => '6px',
                        'sanitize' => 'values',
                        // 'value_callback' => 'processSliderValue', // Function must be in SettingsCallbacks
                    ],

                    // Marker label color
                    [
                        'id' => 'timeline-marker-label-color',
                        'title' => __('Marker label color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // css var: --jtoc-tl-marker-label-color
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    // Marker label color hover
                    [
                        'id' => 'timeline-marker-label-color-hover',
                        'title' => __('Marker label color (hover)', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // css var: --jtoc-tl-marker-label-color-hover
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    // Marker label color active
                    [
                        'id' => 'timeline-marker-label-color-active',
                        'title' => __('Marker label color (active)', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // css var: --jtoc-tl-marker-label-color-active
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    // Marker label background color
                    [
                        'id' => 'timeline-marker-label-background-color',
                        'title' => __('Marker label background color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            // css var: --jtoc-tl-marker-label-background-color
                            'custom' => jtoc_tagify('p', __('Only applies to tooltip style', 'joli-table-of-contents'), ['class' => 'description']), // applies to tooltip only,
                        ],
                        // 'default' => '#000000',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    // H2 Marker: Show(always/active/hover) default always
                    [
                        'id' => 'timeline-marker-h2-visibility',
                        'title' => __('H2 marker label visibility', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            // 'desc' => __('H2 .', 'joli-table-of-contents'),
                            'values' => [
                                'always' => __('Always', 'joli-table-of-contents'),
                                // 'active' => __('Active', 'joli-table-of-contents'),
                                'hover' => __('Hover', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'always',
                        'sanitize' => 'values',
                    ],

                    // H3 Marker: Show(always/active/hover) default hover
                    [
                        'id' => 'timeline-marker-h3-visibility',
                        'title' => __('H3 marker label visibility', 'joli-table-of-contents'),
                        'type' => 'radio',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            // 'desc' => __('Show H3 marker.', 'joli-table-of-contents'),
                            'values' => [
                                'always' => __('Always', 'joli-table-of-contents'),
                                // 'active' => __('Active', 'joli-table-of-contents'),
                                'hover' => __('Hover', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'hover',
                        'sanitize' => 'values',
                    ],
                ],
            ],
            /*** SCROLL SPY ***/
            [
                'name' => 'timeline-scroll-spy',
                'title' => __('Scroll spy', 'joli-table-of-contents'),
                'fields' => [
                    // Show scroll spy
                    [
                        'id' => 'timeline-scroll-spy',
                        'title' => __('Show scroll spy', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            'pro' => true,
                            // 'new' => true, /* legacy */
                            'desc' => __('Show the scroll spy.', 'joli-table-of-contents'),
                            'custom' => jtoc_tagify('p', __('The scroll spy shows users which section of the page they are currently viewing.', 'joli-table-of-contents'), ['class' => ['description']]),
                        ],
                        'default' => 1,
                        'sanitize' => 'checkbox',
                    ],
                ],
            ],

            /*** ANIMATIONS & TIMING ***/
            // [
            //     'name' => 'timeline-animations',
            //     'title' => __('Animations', 'joli-table-of-contents'),
            //     'fields' => [
            //     ],
            // ],

            /*** PROGRESS ***/
            // Show progress bar
            // Show scroll spy
        ],
    ],

    // GROUP: PROGRESS BAR ********************************************************
    [
        'group' => 'progress-bar',
        'label' => __('Progress bar', 'joli-table-of-contents'),
        'icon' => 'progress-bar',
        'sections' => [
            // Progress bar behaviour ----------
            [
                'name' => 'progress-bar',
                'title' => __('Progress bar', 'joli-table-of-contents'),
                'desc' => jtoc_tagify('p', __('The progress bar is a full-width thin line that shows the reading progress through the current article.', 'joli-table-of-contents')),
                'fields' => [

                    [
                        'id' => 'activate-progress-bar',
                        'title' => __('Activate progress bar', 'joli-table-of-contents'),
                        'type' => 'switch',
                        'args' => [
                            // 'new' => true, /* legacy */
                            'pro' => true,
                            'desc' => __('Shows a fixed progress bar indicating reading progress through the article.', 'joli-table-of-contents'),
                            'children_sections' => [
                                'progress-bar-settings',
                                'progress-bar-styles',
                            ],
                        ],
                        'default' => 0,
                        'sanitize' => 'checkbox',
                    ],
                ],
            ],
            // Progress bar behaviour ----------
            [
                'name' => 'progress-bar-settings',
                'title' => __('Progress bar settings', 'joli-table-of-contents'),
                'fields' => [

                    [
                        'id' => 'progress-bar-position',
                        'title' => __('Position', 'joli-table-of-contents'),
                        'type' => 'select',
                        'args' => [
                            'pro' => true,
                            'desc' => __('Position of the progress bar', 'joli-table-of-contents'),
                            'values' => [
                                'top' => __('Top', 'joli-table-of-contents'),
                                'bottom' => __('Bottom', 'joli-table-of-contents'),
                            ],
                        ],
                        'default' => 'none',
                    ],

                    [
                        'id' => 'progress-bar-offset-y',
                        'title' => __('Vertical offset', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '20',
                            'desc' => __('Offset from the top/bottom of the viewport.', 'joli-table-of-contents'),
                            // 'classes' => 'joli-color-picker',//adds color picker
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        'default' => '0|px',
                        'sanitize' => 'unit',
                    ],

                    [
                        'id' => 'progress-bar-offset-y-mobile',
                        'title' => __('Vertical offset (mobile)', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '20',
                            'desc' => __('Offset from the top/bottom of the viewport.', 'joli-table-of-contents'),
                            // 'classes' => 'joli-color-picker',//adds color picker
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        'default' => '0|px',
                        'sanitize' => 'unit',
                    ],
                ],
            ],
            // Progress bar styles ----------
            [
                'name' => 'progress-bar-styles',
                'title' => __('Progress bar styles', 'joli-table-of-contents'),
                'fields' => [

                    [
                        'id' => 'progress-bar-thickness',
                        'title' => __('Thickness', 'joli-table-of-contents'),
                        'type' => 'unitinput',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '3',
                            'desc' => __('Thickness of the progress bar.', 'joli-table-of-contents'),
                            // 'classes' => 'joli-color-picker',//adds color picker
                            'values' => [
                                'px' => 'px',
                                'em' => 'em',
                                'rem' => 'rem',
                            ],
                        ],
                        'default' => '4|px',
                        'sanitize' => 'unit',
                    ],

                    [
                        'id' => 'progress-bar-color',
                        'title' => __('Progress bar color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#39383a',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],

                    [
                        'id' => 'progress-bar-background-color',
                        'title' => __('Progress bar background color', 'joli-table-of-contents'),
                        'type' => 'color',
                        'args' => [
                            'pro' => true,
                            'placeholder' => '#ffffff',
                            'classes' => 'joli-color-picker', //adds color picker
                            'data' => [
                                'alpha-enabled' => 'true',
                                'alpha-color-type' => 'hex',
                            ],
                        ],
                        // 'default' => '#ffffff00',
                        'sanitize' => 'color',
                        'value_callback' => 'processColorValue', // Function must be in SettingsCallbacks
                    ],
                ],
            ],
        ],
    ],
    // END GROUP: PROGRESS BAR ********************************************************


];

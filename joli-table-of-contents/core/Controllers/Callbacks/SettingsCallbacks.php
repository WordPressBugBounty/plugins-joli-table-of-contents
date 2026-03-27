<?php

/**
 * @package jolitoc
 */

namespace WPJoli\JoliTOC\Controllers\Callbacks;

class SettingsCallbacks
{

    protected $theme_palette = [];

    // Constructor
    public function __construct()
    {
        // Add grid-area to allowed styles for wp_kses processing
        add_filter('safe_style_css', function ($styles) {
            $styles[] = 'display';
            return $styles;
        });


        $settings = wp_get_global_settings();
        if (!empty($settings['color']['palette']['theme'])) {
            $this->theme_palette = array_map(
                fn($c) => $c['color'],
                $settings['color']['palette']['theme']
            );
        }
    }


    public function sanitizeColor($input)
    {

        $value = strtolower((string) $input);
        // return preg_match('/^#[0-9a-f]{6}$/', $value) ? $value : null;
        if (preg_match('/^#[0-9a-f]{6,8}$/', $value)) {
            return $value;
        } else if (preg_match('/^rgb\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3})\)$/', $value)) {
            return $value;
        } else if (preg_match('/^rgba\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3}),\s*(\d*(?:\.\d+)?)\)$/', $value)) {
            return $value;
        } else if (preg_match('/^hsl\((\d{1,3}),\s*(\d{1,3})%,\s*(\d{1,3})%(\s*(\d*(?:\.\d+)?)?\))$/', $value)) {
            return $value;
        } else if (preg_match('/^hsla\((\d{1,3}),\s*(\d{1,3})%,\s*(\d{1,3})%(\s*(\d*(?:\.\d+)?)?(?:\s*,\s*(\d*(?:\.\d+)?))?\))$/', $value)) {
            return $value;
        }
        // validate a custom color format like this: "palette:color-1" (basically "palette:" + a lowercase alphanumeric ID that can include dashes)
        else if (preg_match('/^palette:([a-z0-9-]{1,32})$/', $value)) {
            return $value;
        }

        return null;
    }

    public function sanitizeCheckbox($input)
    {
        // JTOC()->log($input);
        return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
    }

    public function sanitizeNumber($input)
    {
        return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
    }

    public function sanitizeFloat($input)
    {
        // JTOC()->log($input);
        return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }

    public function sanitizeTextarea($input)
    {
        return sanitize_textarea_field($input);
    }

    public function sanitizeText($input)
    {
        return sanitize_text_field($input);
    }
    // Sanitize a CSS selector
    public function sanitizeSelector($input)
    {
        if ( preg_match('/^[a-zA-Z0-9\-\_\.\#\s>\+\~\:\[\]\=\"]+$/', $input) ) {
            return $input;
        }

        return null;
    }

    public function sanitizeSelect($input)
    {
        return sanitize_text_field($input);
    }

    public function sanitizeCheckboxes($input)
    {
        return sanitize_text_field($input);
    }

    public function sanitizeUnit($input)
    {
        $value = (string) $input;

        // Check if the value starts with a pipe
        if (strpos($value, '|') === 0) {
            return null;
        }

        if (substr_count($value, '|') > 1) {
            return null;
        }

        $value = str_replace(',', '.', $value);

        return $value;
    }

    public function sanitizeDimensions($input, $args)
    {
        if (!$args) {
            return null;
        }

        $dim = jtoc_isset_or_null($input['dim']);

        if (!$dim) {
            return null;
        }

        //check individual values
        // JTOC()->log($dim);
        foreach ($dim as $key => $value) {
            $type_compare = jtoc_isset_or_null($args['dimensions'][$key]);

            if ((settype($value, $type_compare)) === false) {
                return null;
            }
        }

        $unit = jtoc_isset_or_null($input['unit']);

        if (!$unit) {
            return null;
        }

        //check individual values

        if (
            !is_array($args['units']) ||
            (is_array($args['units']) && !in_array($unit, $args['units']))
        ) {
            return null;
        }

        return $input;
    }

    public function sanitizeLucideicon($input, $args)
    {

        if (!$args) {
            return null;
        }

        $icon = jtoc_isset_or_null($input['icon']);

        if (!$icon) {
            return null;
        }

        foreach ($input as $key => $value) {
            $type_compare = jtoc_isset_or_null($args[$key]);

            if ($type_compare == 'color') {
                //Allow empty string for color
                if ($value === '') {
                    continue;
                } else {
                    $pass = $this->sanitizeColor($value);
                }
                // JTOC()->log($pass);
                if (!$pass) {
                    return null;
                }
            } else if ((settype($value, $type_compare)) === false) {
                return null;
            }
        }



        return $input;
    }


    /**
     * Sanitizes the given input against a set of values.
     *
     * @param mixed $input
     * @param array $values
     * @param array $item Option item including args
     *
     * @return bool|null
     */
    public function sanitizeValues($input, $values, $item)
    {
        if (!$values) {
            if (!empty($item['args']['labels'])) {

                // Check for its own values
                $allowed_values_array = $item['args']['values'] ?? false;
            } else {
                $allowed_values_array = array_keys($item['args']['values']);
            }

            if ($allowed_values_array === false) {
                return;
            }

            return in_array($input, $allowed_values_array) ? $input : null;
            // return in_array($input, $allowed_values) ? $input : null;
        }

        return in_array($input, $values) ? $input : null;
    }


    private function doTemplate($template, $data = [])
    {
        return str_replace(
            array_map('jtoc_mustache_key', array_keys($data)),
            array_values($data),
            $template
        );
    }

    private function generateClassData($classes = null, $data = null)
    {
        $output = '';

        if (!is_array($data)) {
            return $classes;
        }

        if ($data) {
            foreach ($data as $key => $value) {
                $output .= sprintf(' data-%s="%s"', $key, $value);
            }

            $output = rtrim($output, '"');
        }

        return $classes . '"' . $output;
    }


    /**
     * Prints out the data attributes for a given array of data.
     * 
     * @param array $data The array of data to print out as data attributes.
     * 
     * @return void
     */

    public function printDataAttrs($data = null)
    {
        if (!is_array($data)) {
            return;
        }

        if ($data) {
            foreach ($data as $key => $value) {
                // echo sprintf(' data-%s="%s"', esc_html($key), esc_attr($value));
                echo jtoc_attrify(['data-' . esc_html($key) => is_array($value) ? esc_attr(json_encode($value)) : esc_attr($value)]);
            }
        }
    }

    /**
     * Echoes out the actual input field in the settings page
     */
    public function inputField($args)
    {
        // $option = explode('.', $args['id']);
        $option = $args['id'];
        $is_global = jtoc_isset_or_null($args['is_global']) === true;
        // var_dump($is_global);

        $classes_data = jtoc_isset_or_null($args['classes'], true);
        // $classes_data = $this->generateClassData(
        //     jtoc_isset_or_null($args['classes'], true),
        //     jtoc_isset_or_null($args['data'])
        // );

        // $data_attrs_clean = $this->printDataAttrs(jtoc_isset_or_null($args['data']));
        // $data_attrs_fn = [$this, 'printDataAttrs'];
        $data_attrs = $args['data'] ?? [];

        $data = [
            'classes'       => $classes_data,
            'data_attrs'    => $data_attrs,
            // 'data_attrs_fn' => $data_attrs_fn,
            'name'          => $args['name'],
            'placeholder'   => jtoc_isset_or_null($args['placeholder'], true),
            // 'option'        => $option, // id = 'general.show-title'
            // 'value'         => jtoc_get_option($option[1], $option[0]),
            'option'        => $option, // id = 'general.show-title'
            'value'         => jtoc_get_option($option),
            'is_global'         => $is_global,
            'active_post_type'   =>  sanitize_key(jtoc_isset_or_null($_GET['jtoc_post_type'], true)),
        ];
        // JTOC()->log($data['name']);

        if (strpos($data['option'], 'jtoc_onboarding[color_background]') >= 0) {
            // JTOC()->log(print_r($data, true));
        }

        //echoes the corresponding field type
        $this->displayInput($args, $data);

        //Adds a description if any [DEPRECATED 2.0.0]
        // if (isset($args['desc']) && $args['desc']) {
        //     if (is_array($args['desc'])) {
        //         foreach ($args['desc'] as $line) {
        //             echo sprintf('<p class="description">%s</p>', $line);
        //         }
        //     } else {
        //         echo sprintf('<p class="description">%s</p>', $args['desc']);
        //     }
        // }

        //Adds an image if any
        if (isset($args['img']) && $args['img']) {
            $img_path = JTOC()->path('assets/admin/img/' . $args['img']);
            $img_url = JTOC()->url('assets/admin/img/' . $args['img']);
            if (file_exists($img_path)) {
                echo sprintf('<p><img class="joli-admin-image" src="%s"></p>', esc_url($img_url));
            }
        }

        $allowed_html = array_merge(
            wp_kses_allowed_html('post'),
            jtoc_kses_lucide_svg()
        );

        //Adds a custom section if any
        if (isset($args['custom']) && $args['custom']) {
            echo sprintf('<div class="joli-custom">%s</div>', wp_kses($args['custom'], $allowed_html));
        }
    }

    /**
     * Returns the html tag corresponding to the $args['type']
     * Ex: 'text', 'select','checkbox', etc
     */
    public function displayInput($args, $data)
    {
        if ($data['data_attrs'] ?? null) {
            // Place this here so that if displayInput is called alone, the data_attr_fn is present
            $data['data_attrs_fn'] = [$this, 'printDataAttrs'];
        }

        $method = 'process' . ucfirst($args['type']);

        if (method_exists($this, $method)) {
            //calls a matching function
            //ex: Call 'processText' for $args['type'] == 'text
            call_user_func([$this, $method], $args, $data);
            return true;
        }

        return;
    }

    private function processPosttype($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
        ];

        JTOC()->render(
            ['admin/components' => 'posttype'],
            $component_data
        );
    }

    private function processTextarea($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
        ];

        JTOC()->render(
            ['admin/components' => 'textarea'],
            $component_data
        );
    }

    private function processText($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
        ];

        JTOC()->render(
            ['admin/components' => 'text'],
            $component_data
        );
    }

    private function processNumber($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
        ];

        JTOC()->render(
            ['admin/components' => 'number'],
            $component_data
        );
    }

    // Process Color
    private function processColor($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
            'palette' => $this->theme_palette
        ];

        JTOC()->render(
            ['admin/components' => 'color'],
            $component_data
        );
    }

    private function processCheckbox($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
        ];

        JTOC()->render(
            ['admin/components' => 'checkbox'],
            $component_data
        );
    }

    private function processSwitch($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
        ];
        // jtocpre($component_data);

        JTOC()->render(
            ['admin/components' => 'switch'],
            $component_data
        );
    }

    private function processSelect($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
        ];
        // pre($component_data);

        JTOC()->render(
            ['admin/components' => 'select'],
            $component_data
        );
    }
    private function processCheckboxes($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
        ];

        JTOC()->render(
            ['admin/components' => 'checkboxes'],
            $component_data
        );
    }


    private function processRadio($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
        ];

        JTOC()->render(
            ['admin/components' => 'radio'],
            $component_data
        );
    }


    private function processRadioicon($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
        ];

        JTOC()->render(
            ['admin/components' => 'radioicon'],
            $component_data
        );
    }

    private function processImagepicker($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
        ];

        JTOC()->render(
            ['admin/components' => 'imagepicker'],
            $component_data
        );
    }

    private function processUnitinput($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
        ];

        JTOC()->render(
            ['admin/components' => 'unitinput'],
            $component_data
        );
    }

    private function processDimensions($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
        ];

        JTOC()->render(
            ['admin/components' => 'dimensions'],
            $component_data
        );
    }


    private function processLucideicon($args, $data)
    {
        // jtocpre($args);
        // jtocpre($data);
        if (! isset($args['path'])) {
            return false;
        }

        $icons_path = JTOC()->path($args['path']);

        if (! is_dir($icons_path)) {
            return false;
        }

        $files = scandir($icons_path);

        if (! $files || count($files) === 0) {
            return false;
        }

        $icons = [];

        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            $filename = pathinfo($file);

            if (! isset($filename['extension']) || $filename['extension'] !== 'svg') {
                continue;
            }

            $id = $filename['filename'];

            $icons[] = $id;
        }

        // Since v3.0.0
        if (jtoc_isset_or_null($args['icons']) && count($args['icons']) > 0) {
            $icons = array_filter($icons, function ($icon) use ($args) {
                return in_array($icon, $args['icons']);
            });

            // sort icons in the order of $args['icons']
            $sorted = [];
            foreach ($args['icons'] as $icon) {
                if (in_array($icon, $icons)) {
                    $sorted[] = $icon;
                }
            }

            $icons = $sorted;
        }

        $items_pro     = isset($args['values_pro']) ? $args['values_pro'] : [];
        $selected_icon = '';

        // Preprocess options
        $options = [];

        // check for no_icon option
        if (isset($args['no_icon']) && $args['no_icon']) {
            $no_icon_checked = isset($data['value']['icon']) && $data['value']['icon'] === '';
            $no_icon_svg ='<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ban-icon lucide-ban"><path d="M4.929 4.929 19.07 19.071"/><circle cx="12" cy="12" r="10"/></svg>';
           
            $options[] = [
                'id'        => $data['name'] . '-no-icon',
                'name'      => $data['name'],
                'value'     => 'none',
                'checked'   => $no_icon_checked,
                'label'     => '',
                'disabled'  => false,
                'pro_class' => '',
                'icon_url'  => '',
                'icon_svg'  => $no_icon_svg,
                ];

            $no_icon_checked && ($selected_icon = $no_icon_svg);
        }

        foreach ($icons as $id) {
            $is_pro = in_array($id, $items_pro);

            $tpl_data = [
                'id'        => $data['name'] . $id,
                'name'      => $data['name'] . ($is_pro ? '-disabled' : ''),
                'value'     => $id,
                'checked'   => (isset($data['value']['icon']) && $id == $data['value']['icon']),
                'label'     => $id,
                'disabled'  => $is_pro,
                'pro_class' => $is_pro ? ' joli-pro' : '',
                'icon_url'  => JTOC()->url($args['path'] . '/' . $id . '.svg'),
                'icon_svg'  => file_get_contents(JTOC()->path($args['path'] . '/' . $id . '.svg')),
            ];

            if ($tpl_data['checked']) {
                $selected_icon = $tpl_data['icon_svg'];
            }

            $options[] = $tpl_data;
        }

        $component_data = [
            'data'          => $data,
            'args'          => $args,
            'options'       => $options,
            'selected_icon' => $selected_icon,
        ];

        JTOC()->render(['admin/components' => 'lucideicon'], $component_data);
    }

    // Process Slider
    private function processSlider($args, $data)
    {
        $component_data = [
            'data' => $data,
            'args' => $args,
        ];

        JTOC()->render(
            ['admin/components' => 'slider'],
            $component_data
        );
    }

    /**
     * Render a color from the palette or a simple hex color.
     *
     * If the input is a color from the palette, it will be rendered as a CSS variable.
     * If the input is a simple hex color, it will be rendered as is.
     *
     * @param string $input The color to render.
     *
     * @return string The rendered color.
     */
    public function processColorValue($input)
    {
        // Check if we have a color from the palette first and save the string after "palette:" in a variable
        if (preg_match('/^palette:([a-z0-9-]{1,32})$/', $input)) {
            $color_id = str_replace('palette:', '', $input);
            $color = 'var(--jtoc-palette-' . $color_id . ')';
        } else {
            $color = $input;
        }

        return $color;
    }


    public function processSliderValue($input, $item)
    {
        return $input;
        if ($input == 'slower') {
            // JTOC()->log($input);
            // JTOC()->log($item);
        }
        $values = $item['args']['values'];
        // 'values' => [
        //     'xs' => '0.5em',
        //     's'  => '1em',
        //     'm'  => '1.5em',
        //     'l'  => '2em',
        //     'xl' => '3em',
        // ],

        // if ($input == 'slower') {
        //     JTOC()->log($values[$input]);
        // }
        return $values[$input];
    }


    // private function processPosttype($args, $data)
    // {

    //     if (jtoc_xy()->can_use_premium_code__premium_only()) {
    //         $pt_args = [
    //             'public' => true
    //         ];
    //     } else {
    //         $pt_args = [
    //             'public' => true,
    //             '_builtin' => true
    //         ];
    //     }

    //     $post_types = get_post_types(
    //         $pt_args,
    //         'objects'
    //     );
    //     // if (is_array($data['value'])) {
    //     // 'global_class' => ($data['is_global'] ? ' joli-is-global' : ''),
    //     $active_post_type = $data['active_post_type'];
    //     $is_global = $data['is_global'];

    //     $enabled =  $args['pro'] ? ' disabled' : '';
    //     $enabled =  $active_post_type && $is_global ? ' disabled' : '';

    //     $output = "<fieldset{$enabled}>";
    //     foreach ($post_types as $post_type => $args) {
    //         // pre($post_type);
    //         $checked = false;
    //         if (is_array($data['value'])) {
    //             $checked = in_array($post_type, $data['value']) ? true : false;
    //         }

    //         $output .= sprintf(
    //             '<div class="%s"><input type="checkbox" id="%s[%s]" name="%s[]" value="%s" class="joli-checkbox" %s><label for="%s[%s]">%s</label></div>',
    //             $data['classes'],
    //             $data['name'],
    //             $post_type,
    //             $data['name'],
    //             $post_type,
    //             ($checked ? 'checked' : ''),
    //             $data['name'],
    //             $post_type,
    //             $args->label . ' [ ' . $post_type . ' ]'
    //         );
    //     }
    //     $output .= '</fieldset>';
    //     return $output;
    //     // }
    //     return;
    // }

    // private function processTextarea($args, $data)
    // {
    //     $ta_size = 'cols="100" rows="12"';
    //     if (isset($args['textarea-size'])) {
    //         switch ($args['textarea-size']) {
    //             case 'small':
    //                 $ta_size = 'cols="60" rows="6"';
    //                 break;
    //         }
    //     }

    //     $active_post_type = $data['active_post_type'];
    //     $is_global = $data['is_global'];

    //     $disabled =  $active_post_type && $is_global;

    //     return sprintf(
    //         '<textarea class="%s" id="%s" name="%s" %s placeholder="%s"%s%s>%s</textarea><br>',
    //         $data['classes'],
    //         $data['name'],
    //         $data['name'],
    //         $ta_size,
    //         $data['placeholder'],
    //         $args['pro'] || $disabled ? ' disabled' : '',
    //         jtoc_isset_or_null($args['style']) ? ' style="' . jtoc_cssify($args['style']) . '"' : '',
    //         esc_textarea(jtoc_isset_or_null($data['value'], true))
    //     );
    // }

    // private function processText($args, $data)
    // {
    //     // pre($args);
    //     // pre($data);
    //     $active_post_type = $data['active_post_type'];
    //     $is_global = $data['is_global'];
    //     $disabled =  $active_post_type && $is_global;

    //     return sprintf(
    //         '<input type="text" class="%s" id="%s" name="%s" value="%s" placeholder="%s"%s>',
    //         $data['classes'],
    //         $data['name'],
    //         $data['name'],
    //         esc_attr($data['value']),
    //         $data['placeholder'],
    //         $args['pro'] || $disabled ? ' disabled' : ''
    //     );
    // }

    // private function processCheckbox($args, $data)
    // {
    //     // pre($args);
    //     // pre($data);
    //     // var_dump($data['value']);
    //     $checked = isset($data['value']) ? ($data['value'] == 1 ? true : false) : false;
    //     // var_dump($checked);
    //     return sprintf(
    //         '<div class="%s">
    //         <input type="checkbox" id="%s" class="joli-checkbox" %s data-linkedfield="%s"%s><label for="%s"></label>
    //         <input type="hidden" id="check_%s" name="%s" value="%d" %s/>
    //         </div>',
    //         $data['classes'],
    //         $data['name'],
    //         // $data['name'],
    //         ($checked ? 'checked' : ''),
    //         $data['option'],
    //         $args['pro'] ? ' disabled' : '',
    //         $data['name'],
    //         $data['option'],
    //         $data['name'],
    //         $checked ? 1 : 0,
    //         $args['pro'] ? ' disabled' : ''
    //     );
    // }

    // private function processSwitch($args, $data)
    // {
    //     $checked = isset($data['value']) ? ($data['value'] == 1 ? true : false) : false;
    //     $active_post_type = $data['active_post_type'];
    //     $is_global = $data['is_global'];
    //     $disabled =  $active_post_type && $is_global;

    //     // pre($args);
    //     $tpl_data = [
    //         'classes' => $data['classes'],
    //         // 'id' => $data['name'] . $id,
    //         'name' => $data['name'],
    //         // 'value' => $id,
    //         'checked' => $checked ? ' checked' : '',
    //         'checked_value' => $checked ? 1 : 0,
    //         'linkedfield' => $data['option'],
    //         // 'label' => $name,
    //         'disabled' => $args['pro'] || $disabled ? ' disabled' : '',
    //         'pro_class' => $args['pro'] ? ' joli-pro' : '',
    //         'deactivates' => jtoc_isset_or_null($args['deactivates']) ? implode(',', $args['deactivates']) : '',
    //         'children' => jtoc_isset_or_null($args['children']) ? implode(',', $args['children']) : '',
    //         'children_sections' => jtoc_isset_or_null($args['children_sections']) ? implode(',', $args['children_sections']) : '',
    //     ];

    //     $template =
    //         '<div class="{{classes}}">
    //         <label class="joli-switch" for="{{name}}">
    //             <input type="checkbox" id="{{name}}" class="joli-checkbox"{{checked}} data-linkedfield="{{linkedfield}}" data-deactivates="{{deactivates}}" data-children="{{children}}" data-children-sections="{{children_sections}}"{{disabled}}>
    //             <span class="slider round"></span>
    //         </label>
    //         <input type="hidden" id="check_{{linkedfield}}" name="{{name}}" value="{{checked_value}}"{{disabled}}/>
    //     </div>';

    //     return $this->doTemplate($template, $tpl_data);

    //     // return sprintf(
    //     //     '<div class="%s">
    //     //         <label class="joli-switch" for="%s">
    //     //             <input type="checkbox" id="%s" class="joli-checkbox" %s data-linkedfield="%s"%s>
    //     //             <span class="slider round"></span>
    //     //         </label>
    //     //         <input type="hidden" id="check_%s" name="%s" value="%d" %s/>
    //     //     </div>',
    //     //     $data['classes'],
    //     //     $data['name'],
    //     //     $data['name'],
    //     //     // $data['name'],
    //     //     ($checked ? 'checked' : ''),
    //     //     $data['option'][0] . '-' . $data['option'][1],
    //     //     $args['pro'] ? ' disabled' : '',
    //     //     $data['option'][0] . '-' . $data['option'][1],
    //     //     $data['name'],
    //     //     $checked ? 1 : 0,
    //     //     $args['pro'] ? ' disabled' : ''
    //     // );
    // }

    // private function processSelect($args, $data)
    // {
    //     // <select name="" id="">
    //     //     <option selected="selected" value="">Example option</option>
    //     //     <option value="">Example option</option>
    //     // </select>
    //     // pre($args);
    //     // pre($data);
    //     $items = $args['values'];
    //     $items_pro = isset($args['values_pro']) ? $args['values_pro'] : [];
    //     $items_disabled = isset($args['values_disabled']) ? $args['values_disabled'] : [];
    //     $items_custom_js_var = isset($args['values_custom']) ? $args['values_custom'] : [];

    //     $output = sprintf(
    //         '<div class="%s">
    //             <select name="%s" id="%s" data-selector="%s"%s%s%s>',
    //         $data['classes'],
    //         $data['name'],
    //         $data['name'],
    //         $data['option'],
    //         $args['pro'] ? ' disabled' : '',
    //         $items_custom_js_var ? ' data-has-custom-values="1" data-custom-values-src="' . $items_custom_js_var . '"' : '',
    //         $data['value'] ? ' data-selected-value="' . $data['value'] . '"' : ''
    //     );

    //     foreach ($items as $id => $name) {
    //         $is_pro = in_array($id, $items_pro) ? true : false;
    //         $is_disabled = in_array($id, $items_disabled) ? true : false;
    //         $output .= sprintf(
    //             '<option%s value="%s"%s%s>%s</option>',
    //             $id == $data['value'] ? ' selected' : '',
    //             $is_pro && jtoc_xy()->is_not_paying() ? 'none' : $id,
    //             $is_disabled ? ' disabled' : '',
    //             isset($args['media'][$id]) ? 'data-media="' . $id . '"' : '',
    //             $is_pro && jtoc_xy()->is_not_paying() ? $name . ' [PRO]' : $name
    //         );
    //     }

    //     $output .= '</select></div>';

    //     if (isset($args['media'])) {
    //         $output .= '<p>';
    //         foreach ($args['media'] as $media_id => $media_name) {
    //             $output .= sprintf(
    //                 '<img id="%s" class="joli-admin-image joli-admin-image-%s%s" src="%s">',
    //                 $data['option'] . '-' . $media_id,
    //                 $data['option'],
    //                 $media_id !== $data['value'] ? ' hidden' : '',
    //                 JTOC()->url('assets/admin/img/' . $media_name)
    //             );
    //         }
    //         $output .= '</p>';
    //     }
    //     return $output;
    // }

    // private function processCheckboxes($args, $data)
    // {
    //     // pre($args);
    //     // pre($data);
    //     // pre($data);
    //     // var_dump($data['value']);
    //     $checked = isset($data['value']) ? ($data['value'] == 1 ? true : false) : false;
    //     // var_dump($checked);

    //     $items = $args['values'];
    //     $items_pro = isset($args['values_pro']) ? $args['values_pro'] : [];

    //     $output = sprintf('<div class="joli-checkboxes-wrap %s">', $data['classes']);
    //     $field_id = 'joli-checkboxes_' . $data['option'];

    //     $pre_template = '<input type="hidden" id="{{id}}" name="{{name}}" value="{{raw_value}}">';
    //     $output .= $this->doTemplate($pre_template, [
    //         'id' => $field_id,
    //         'name' => $data['name'],
    //         'raw_value' => $data['value'],
    //     ]);

    //     $active_values = explode(',', $data['value']);

    //     if ($active_values === false) {
    //         $active_values = [];
    //     }

    //     foreach ($items as $id => $name) {
    //         $is_pro = in_array($id, $items_pro) ? true : false;

    //         $pro_suffix = $is_pro ? '-disabled' : '';

    //         $tpl_data = [
    //             'id' => $data['name'] . $id,
    //             'name' => $data['name'] . $pro_suffix,
    //             'value' => $id,
    //             'checked' => in_array($id, $active_values) ? ' checked' : '',
    //             'label' => $name,
    //             'linked_id' => $field_id,
    //             'disabled' => $is_pro ? ' disabled' : '',
    //             'pro_class' => $is_pro ? ' joli-pro' : '',
    //             'global_class' => ($data['is_global'] ? ' joli-is-global' : ''),
    //         ];


    //         $template =
    //             '<label class="joli-checkboxes-item{{pro_class}}{{global_class}}" for="check_{{id}}">
    //                 <input type="checkbox" id="check_{{id}}" class="joli-check{{pro_class}}" value="{{value}}" data-linked-id="{{linked_id}}"{{checked}}{{disabled}}>
    //                 <div class="joli-html-label">{{label}}</div>
    //             </label>';
    //         $output .= $this->doTemplate($template, $tpl_data);
    //     }
    //     $output .= '</div>';

    //     return $output;


    //     return $this->doTemplate($template, $data);
    // }

    // private function processRadioicon($args, $data)
    // {
    //     // pre($args);
    //     // pre('$data');
    //     // pre($data);
    //     // var_dump($data['value']);
    //     $checked = isset($data['value']) ? ($data['value'] == 1 ? true : false) : false;
    //     // var_dump($checked);

    //     $items = $args['values'];
    //     $items_pro = isset($args['values_pro']) ? $args['values_pro'] : [];

    //     $output = sprintf('<div class="%s">', $data['classes']);

    //     //
    //     $styles = jtoc_isset_or_null($args['styles']);

    //     if ($styles) {
    //         $output .= '<style>' . $styles . '</style>';
    //     }

    //     foreach ($items as $id => $name) {
    //         $is_pro = in_array($id, $items_pro) ? true : false;

    //         $pro_suffix = $is_pro ? '-disabled' : '';

    //         $tpl_data = [
    //             'id' => $data['name'] . $id,
    //             'name' => $data['name'] . $pro_suffix,
    //             'value' => $id,
    //             'checked' => $id == $data['value'] ? ' checked' : '',
    //             'label' => $name,
    //             'disabled' => $is_pro ? ' disabled' : '',
    //             'pro_class' => $is_pro ? ' joli-pro' : '',
    //         ];


    //         $template =
    //             '<label class="joli-radio-icon{{pro_class}}" for="radio_{{id}}">
    //                 <input type="radio" id="radio_{{id}}" name="{{name}}" class="joli-radio{{pro_class}}" value="{{value}}"{{checked}}{{disabled}}>
    //                 <div class="joli-html-label">{{label}}</div>
    //             </label>';
    //         $output .= $this->doTemplate($template, $tpl_data);
    //     }
    //     $output .= '</div>';

    //     return $output;


    //     return $this->doTemplate($template, $data);
    // }

    // private function processLucideicon($args, $data)
    // {
    //     if (!isset($args['path'])) {
    //         return false;
    //     }

    //     $icons_path = JTOC()->path($args['path']);

    //     if (!is_dir($icons_path)) {
    //         return false;
    //     }

    //     $files = scandir($icons_path);

    //     if (!count($files) > 0) {
    //         return false;
    //     }

    //     $icons = [];

    //     foreach ($files as $file) {
    //         if ($file == '.' || $file == '..') {
    //             continue;
    //         }

    //         $filename = pathinfo($file);

    //         if ($filename['extension'] != 'svg') {
    //             continue;
    //         }

    //         $id = $filename['filename'];
    //         // $icon_path = $icons_path . '/' . $file;
    //         // $icon_url = JTOC()->url($args['path'] . '/' . $file);

    //         // $icon = [
    //         //     'id' => $id,
    //         //     'path' => $icon_path,
    //         //     'url' => $icon_url
    //         // ];

    //         //Adds the current theme to the csutom themes array
    //         // $icons[] = $icon;
    //         $icons[] = $id;
    //     }

    //     $checked = isset($data['value']) ? ($data['value'] == 1 ? true : false) : false;
    //     // var_dump($checked);

    //     // $items = $args['values'];
    //     $items_pro = isset($args['values_pro']) ? $args['values_pro'] : [];

    //     $output = sprintf('<div id="%s" class="%s">', $data['option'], $data['classes']);

    //     $options_html = '';
    //     $selected_icon = '';
    //     foreach ($icons as $id) {
    //         $is_pro = in_array($id, $items_pro) ? true : false;

    //         $pro_suffix = $is_pro ? '-disabled' : '';

    //         $tpl_data = [
    //             'id' => $data['name'] . $id,
    //             'name' => $data['name'] . $pro_suffix,
    //             'value' => $id,
    //             'checked' => $id == $data['value']['icon'] ? ' checked' : '',
    //             'label' => $id,
    //             'disabled' => $is_pro ? ' disabled' : '',
    //             'pro_class' => $is_pro ? ' joli-pro' : '',
    //             'icon_url' => JTOC()->url($args['path'] . '/' . $id . '.svg'),
    //             'icon_svg' => file_get_contents(JTOC()->path($args['path'] . '/' . $id . '.svg')),
    //         ];

    //         if ($id == $data['value']['icon']) {
    //             $selected_icon = $tpl_data['icon_svg'];
    //         }

    //         $template = <<<HTML
    //             <label class="joli-radio-icon{{pro_class}}" for="radio_{{id}}" data-icon-src="{{icon_url}}">
    //                 <input type="radio" id="radio_{{id}}" name="{{name}}[icon]" class="joli-radio{{pro_class}}" value="{{value}}"{{checked}}{{disabled}}>
    //                 <div class="joli-lucide-icon">
    //                     {{icon_svg}}
    //                 </div>
    //             </label>
    //             HTML;
    //         $options_html .= $this->doTemplate($template, $tpl_data);
    //     }

    //     $component_data = [
    //         'data' => $data,
    //         'args' => $args,
    //         'options' => $options_html,
    //         'selected_icon' => $selected_icon
    //     ];

    //     $output .= JTOC()->render(['admin/components' => 'lucide-picker'], $component_data, true);

    //     $output .= '</div>';

    //     return $output;


    //     return $this->doTemplate($template, $data);
    // }


    // private function processImagepicker($args, $data)
    // {
    //     // pre($args);
    //     // pre('$data');
    //     // pre($data);
    //     // var_dump($data['value']);
    //     $checked = isset($data['value']) ? ($data['value'] == 1 ? true : false) : false;
    //     // var_dump($checked);

    //     // $items = $args['values'];
    //     $items_pro = isset($args['values_pro']) ? $args['values_pro'] : [];

    //     $output = sprintf('<div class="%s">', $data['classes']);

    //     //
    //     $styles = jtoc_isset_or_null($args['styles']);

    //     if ($styles) {
    //         $output .= '<style>' . $styles . '</style>';
    //     }

    //     // foreach ($items as $id => $name) {
    //     $is_pro =  false;

    //     // $pro_suffix = $is_pro ? '-disabled' : '';

    //     $tpl_data = [
    //         // 'id' => $data['name'] . $id,
    //         // 'name' => $data['name'] . $pro_suffix,
    //         // 'value' => $id,
    //         // 'checked' => $id == $data['value'] ? ' checked' : '',
    //         // 'label' => $name,
    //         // 'disabled' => $is_pro ? ' disabled' : '',
    //         'pro_class' => $is_pro ? ' joli-pro' : '',
    //     ];


    //     $template =
    //         '<button class="joli-image-picker{{pro_class}}" type="button">
    //                 <div class="joli-html-label">Select an image</div>
    //             </button>';
    //     $output .= $this->doTemplate($template, $tpl_data);
    //     // }
    //     $output .= '</div>';

    //     return $output;


    //     return $this->doTemplate($template, $data);
    // }

    // private function processRadioicon($args, $data)
    // {
    //     // pre($args);
    //     // pre($data);
    //     // var_dump($data['value']);
    //     $checked = isset($data['value']) ? ($data['value'] == 1 ? true : false) : false;
    //     // var_dump($checked);

    //     $items = $args['values'];

    //     $output = sprintf('<div class="%s">', $data['classes']);

    //     foreach ($items as $id => $name) {
    //         $output .= sprintf(
    //             '<label class="joli-radio-icon" for="radio_%s">
    //                 <input type="radio" id="radio_%s" name="%s" class="joli-radio" value="%s" %s>
    //                 <div>%s</div>
    //             </label>',
    //             //label
    //             $data['name'] . $id,
    //             //id
    //             $data['name'] . $id,
    //             //name
    //             $data['name'],
    //             //value
    //             $id,
    //             //selected
    //             $id == $data['value'] ? ' checked' : '',
    //             //name
    //             $name
    //         );
    //     }
    //     $output .= '</div>';

    //     return $output;

    //     return sprintf(
    //         '<div class="%s">
    //         <input type="radio" id="%s" class="joli-radio" %s data-linkedfield="%s"><label for="%s"></label>
    //         <input type="hidden" id="check_%s" name="%s" value="%d" />
    //         </div>',
    //         $data['classes'],
    //         $data['name'],
    //         // $data['name'],
    //         ($checked ? 'checked' : ''),
    //         $data['option'][0] . '-' . $data['option'][1],
    //         $data['name'],
    //         $data['option'][0] . '-' . $data['option'][1],
    //         $data['name'],
    //         $checked ? 1 : 0
    //     );
    // }

    // private function processSelect($args, $data)
    // {
    //     // <select name="" id="">
    //     //     <option selected="selected" value="">Example option</option>
    //     //     <option value="">Example option</option>
    //     // </select>
    //     // pre($args);
    //     // pre($data);
    //     $items = $args['values'];
    //     $output = sprintf(
    //         '<select name="%s" id="%s" data-selector="%s">',
    //         $data['name'],
    //         $data['name'],
    //         $data['option'][0] . '-' . $data['option'][1]
    //     );

    //     foreach ($items as $id => $name) {
    //         $output .= sprintf(
    //             '<option%s value="%s">%s</option>',
    //             $id == $data['value'] ? ' selected' : '',
    //             $id,
    //             $name
    //         );
    //     }

    //     $output .= '</select>';

    //     if (isset($args['media'])) {
    //         $output .= '<p>';
    //         foreach ($args['media'] as $media_id => $media_name) {
    //             $output .= sprintf(
    //                 '<img id="%s" class="joli-admin-image joli-admin-image-%s%s" src="%s">',
    //                 $data['option'][0] . '-' . $data['option'][1] . '-' . $media_id,
    //                 $data['option'][0] . '-' . $data['option'][1],
    //                 $media_id !== $data['value'] ? ' hidden' : '',
    //                 JTOC()->url('assets/admin/img/' . $media_name)
    //             );
    //         }
    //         $output .= '</p>';
    //     }
    //     return $output;
    // }
    // private function processUnitinput($args, $data)
    // {
    //     // pre($data);
    //     // pre($args);
    //     $items = $args['values'];
    //     $items_pro = isset($args['values_pro']) ? $args['values_pro'] : [];

    //     $value_text = null;
    //     $value_option = null;
    //     if ($data['value'] != '') {

    //         $split_values = explode('|', $data['value']);
    //         // JTOC()->log($data['option']);
    //         // JTOC()->log($split_values);
    //         if ($split_values) {
    //             $value_text = jtoc_isset_or_null($split_values[0]) === null ? '' : $split_values[0];
    //             $value_option = jtoc_isset_or_null($split_values[1]) === null ? reset($args['values']) : $split_values[1];
    //         }
    //     }
    //     // var_dump($value_text);
    //     // var_dump($value_option);
    //     //options
    //     $options = '';
    //     foreach ($items as $id => $name) {
    //         $is_pro = in_array($id, $items_pro) ? true : false;
    //         $options .= sprintf(
    //             '<option%s value="%s"%s>%s</option>',
    //             $id == $value_option ? ' selected' : '',
    //             $id,
    //             $is_pro ? ' disabled' : '',
    //             $is_pro ? $name . ' [PRO]' : $name
    //         );
    //     }

    //     $tpl_data = [
    //         'classes' => $data['classes'],
    //         'option' => $data['option'],
    //         'name' => $data['name'],
    //         'placeholder' => $data['placeholder'],
    //         'raw_value' => esc_attr($data['value']),
    //         'value' => esc_attr($value_text),
    //         'disabled' => $args['pro'] ? ' disabled' : '',
    //         'options' => $options
    //     ];

    //     // pre($data);

    //     $template =
    //         '<fieldset class="joli-css-unit-field"{{disabled}}>
    //             <label class="{{classes}}" for="{{name}}">
    //                 <input type="hidden" class="{{classes}}" id="joli-css-unit_{{option}}" name="{{name}}" value="{{raw_value}}">
    //                 <input type="text" class="joli-css-unit-input" placeholder="{{placeholder}}" data-linkedfield="{{option}}" value="{{value}}">
    //                 <select class="joli-css-unit-values" data-linkedfield="{{option}}">
    //                     {{options}}
    //                 </select>
    //             </label>
    //         </fieldset>';

    //     return $this->doTemplate($template, $tpl_data);
    // }

    // private function processDimensions($args, $data)
    // {
    //     // pre($data);
    //     // pre('---------');
    //     // pre($args);
    //     $items = $args['units'];
    //     $items_pro = isset($args['values_pro']) ? $args['values_pro'] : [];

    //     $value_text = null;
    //     $value_unit = jtoc_isset_or_null($data['value']['unit']);
    //     // if ($data['value'] != '') {

    //     //     $split_values = explode('|', $data['value']);
    //     //     if ($split_values) {
    //     //         $value_text = $split_values[0];
    //     //         $value_option = $split_values[1];
    //     //     }
    //     // }
    //     // var_dump($value_text);
    //     // var_dump($value_option);
    //     //options
    //     $options = '';
    //     foreach ($items as $id => $name) {
    //         $is_pro = in_array($id, $items_pro) ? true : false;
    //         $options .= sprintf(
    //             '<option%s value="%s"%s>%s</option>',
    //             $id == $value_unit ? ' selected' : '',
    //             $id,
    //             $is_pro ? ' disabled' : '',
    //             $is_pro ? $name . ' [PRO]' : $name
    //         );
    //     }

    //     $tpl_data = [
    //         'classes' => $data['classes'],
    //         'option' => $data['option'],
    //         'name' => $data['name'],
    //         'placeholder' => $data['placeholder'],
    //         // 'raw_value' => esc_attr($data['value']),
    //         // 'value' => esc_attr($value_text),
    //         'disabled' => $args['pro'] ? ' disabled' : '',
    //         'options' => $options
    //     ];

    //     // pre($data);

    //     $sub_template =
    //         '<li>
    //         <input type="number" id="{{id}}" name="{{name}}[dim][{{dimension}}]" class="joli-dimension-input" data-dimension="{{dimension}}" value="{{value}}">
    //         <label class="joli-dimension-label" for="{{id}}">{{dimension}}</label>
    //     </li>';

    //     $sub_dimensions = $args['sub_dimensions'];
    //     $sub_fields = '<ul>';
    //     foreach ($sub_dimensions as $dimension) {
    //         $sub_fields .= $this->doTemplate($sub_template, [
    //             'id' => 'joli_dimension_' . $data['option'] . '_' . $dimension,
    //             'name' => $data['name'],
    //             'dimension' => $dimension,
    //             'value' => jtoc_isset_or_null($data['value']['dim'][$dimension]),
    //         ]);
    //     }
    //     $sub_fields .= '</ul>';


    //     $tpl_data = [
    //         'classes' => $data['classes'],
    //         'option' => $data['option'],
    //         'name' => $data['name'],
    //         'placeholder' => $data['placeholder'],
    //         // 'raw_value' =    > esc_attr($data['value']),
    //         // 'value' => esc_attr($value_text),
    //         'disabled' => $args['pro'] ? ' disabled' : '',
    //         'options' => $options,
    //         'sub_fields' => $sub_fields,
    //         'lock_title' => __('Link values together', 'joli-table-of-contents'),
    //         'clear_str' => __('clear', 'joli-table-of-contents'),
    //     ];

    //     $template =
    //         '<fieldset class="joli-dimensions-field"{{disabled}}>
    //             <label class="{{classes}}" for="{{name}}">
    //                 <div class="joli-dimensions-control">
    //                     {{sub_fields}}
    //                     <span class="joli-dimensions-lock dashicons" title="{{lock_title}}"></span>
    //                     <select name="{{name}}[unit]" class="joli-dimensions-units" data-linkedfield="{{option}}">
    //                     {{options}}
    //                     </select>
    //                     <div>
    //                         <a href="#" class="joli-dimensions-clear button button-link">{{clear_str}}</a>
    //                     </div>
    //                 </div>
    //             </label>
    //         </fieldset>';

    //     return $this->doTemplate($template, $tpl_data);
    // }
}

<?php

/**
 * @package jolitoc
 */
namespace WPJoli\JoliTOC\Engine;

use WPJoli\JoliTOC\Application;
use WPJoli\JoliTOC\Engine\ContentProcessing;
use WPJoli\JoliTOC\Controllers\SettingsController;
use WPJoli\JoliTOC\Controllers\PostTypeSettingController;
class TOCBuilder {
    protected $sc;

    //SettingsController
    protected $headings;

    protected $content;

    protected $reading_time;

    protected $options;

    protected $is_in_the_content;

    protected $theme_options_available;

    //Array of theme option ids available for the current theme
    public function __construct( $headings = null, $content = null, $options = null ) {
        $this->headings = $headings;
        $this->content = $content;
        $this->setOptions( $options );
        $this->is_in_the_content = current_filter() === 'the_content';
    }

    public function setReadingTime( $reading_time ) {
        $this->reading_time = $reading_time;
    }

    // getReadingTime
    public function getReadingTime() {
        return $this->reading_time;
    }

    public function setHeadings( $headings ) {
        $this->headings = $headings;
    }

    public function setContent( $content ) {
        $this->content = $content;
    }

    public function getOptions() {
        return $this->options;
    }

    /**
     * Undocumented function
     *
     * @param [array] $options Options that will override default settings
     * @return void
     */
    public function setOptions( $options = null, $additional_options = null ) {
        $pt = get_post_type();
        /** @var PostTypeSettingController $ptsc */
        $ptsc = JTOC()->requestService( PostTypeSettingController::class );
        $is_post_type_activated = $ptsc->isPostTypeSettingActivated( $pt );
        // pre($is_post_type_activated);
        /** @var SettingsController $sc */
        $this->sc = JTOC()->requestService( SettingsController::class );
        // $this->sc->init();
        $global_options = $this->sc->getOptions( false );
        //Get global user settings
        $option_fields = null;
        if ( $additional_options ) {
            $all_options = $this->sc->getOptions();
        }
        if ( $additional_options && $all_options ) {
            $all_options = array_merge( $additional_options, $all_options );
            $global_options = array_merge( $additional_options, $global_options );
            $option_fields = $this->sc->getFieldsIDs( $additional_options );
        } else {
            $option_fields = $this->sc->getFieldsIDs();
            // pre($option_fields);
        }
        if ( jtoc_is_preview() ) {
            $preview_settings = get_transient( 'jtoc_preview_' . $_GET['joli_toc_token'] );
            // JTOC()->log($preview_settings);
            if ( is_array( $preview_settings ) ) {
                // JTOC()->log($global_options);
                $global_options = array_merge( $global_options, $preview_settings );
                // JTOC()->log($global_options);
            }
            // $option_fields = array_merge($option_fields, 1);
        }
        if ( $options !== null ) {
            // pre($option_fields);
        }
        foreach ( $option_fields as $option_id ) {
            if ( jtoc_is_preview() ) {
                // Forces to pick the option from the global_options array
                $this->options[$option_id] = $this->sc->getOption( $option_id, false, $global_options );
            } else {
                $this->options[$option_id] = jtoc_get_option( $option_id, $options, $global_options );
            }
            // if ($option_id === 'bullet_points_color') {
            // JTOC()->log($this->options[$option_id]);
            // JTOC()->log($options[$option_id]);
            // JTOC()->log($global_options[$option_id]);
            // }
        }
        // JTOC()->log($this->options['headings_depth']);
    }

    public function getOption( $option ) {
        return $this->options[$option] ?? null;
    }

    public function getScope() {
        // JTOC()->log($this->getOption('headings_scope'));
        return $this->getOption( 'headings_scope' ) ?? 'content';
        // 'content' or 'extended'
    }

    /**
     * Merge an array of classes with a prefix
     *
     * @param array $classes
     * @param string $prefix
     * @return string
     */
    private function mergeClasses( $classes, $prefix = ' ' ) {
        $classes = implode( ' ', $classes );
        return $prefix . $classes;
    }

    public function makeTOC( $headings_processed = null ) {
        $args = null;
        $content = $this->content;
        $headings = $this->headings;
        // $reading_time = $this->reading_time;
        $options = $this->options;
        // JTOC()->log($options);
        $data = [];
        // content processing: get the headings and returns content with idfied headings
        if ( $headings_processed ) {
            $headings = $headings_processed;
        } else {
            if ( $content ) {
                $processed_content = ContentProcessing::Process(
                    $content,
                    $args,
                    $this,
                    jtoc_get_multipaged_content()
                );
                $headings = $processed_content['headings'];
                $reading_time = $processed_content['reading_time'];
                $this->setReadingTime( $reading_time );
            }
        }
        // JTOC()->log($reading_time);
        //Hide certain headings from the TOC block
        $hidden_headings = $options['hidden_headings'] ?? null;
        if ( $hidden_headings && is_array( $hidden_headings ) && count( $hidden_headings ) > 0 ) {
            $headings = array_filter( $headings, function ( $item ) use($hidden_headings) {
                //skips headings in the list of hidden_headings
                return !in_array( $item['id'], $hidden_headings );
            } );
            //reset the array indexes
            $headings = array_values( $headings );
        }
        //Edit certain headings from the TOC block
        $edited_headings = $options['edited_headings'] ?? null;
        if ( $edited_headings && is_array( $edited_headings ) && count( $edited_headings ) > 0 ) {
            $headings = array_map( function ( $item ) use($edited_headings) {
                $edited_heading_title = $edited_headings[$item['id']] ?? null;
                //updates title if changed
                if ( $edited_heading_title ) {
                    $item['title'] = $edited_heading_title;
                }
                return $item;
            }, $headings );
        }
        // $toc_is_sticky = null;
        // if (jtoc_xy()->can_use_premium_code__premium_only()) {
        //     $toc_is_sticky = ($options['toc_is_sticky'] ?? null);
        //     // JTOC()->log($toc_is_sticky);
        // }
        $headings = apply_filters( 'joli_toc_headings', $headings );
        global $post;
        $post_settings = get_post_meta( $post->ID, 'joli_toc_post_settings', true );
        $force = is_array( $post_settings ) && key_exists( 'enable_toc', $post_settings ) && $post_settings['enable_toc'] == 'on';
        // do not check the headings counts if force is on
        if ( !$force ) {
            //min-number of headings
            $min_headings = (int) $options['min_headings'];
            if ( $min_headings !== null && is_int( $min_headings ) && $min_headings > 0 ) {
                if ( is_array( $headings ) && count( $headings ) < $min_headings ) {
                    return;
                }
            }
            //max-number of headings
            $max_headings = (int) $options['max_headings'];
            if ( $max_headings !== null && is_int( $max_headings ) && $max_headings > 0 ) {
                if ( is_array( $headings ) && count( $headings ) > $max_headings ) {
                    return;
                }
            }
        }
        //headings parsing
        $headings_count = count( $headings );
        // pre($headings);
        $_headings = $this->prepareHeadings( $headings );
        // pre($_headings);
        $_headings = $this->parseHeadings( $_headings );
        $theme = $options['theme'];
        $has_custom_theme = ( $theme ? strpos( $theme, 'custom-' ) === 0 : false );
        if ( $has_custom_theme ) {
            $theme_id = substr( $theme, strlen( 'custom-' ) );
            /** @var CustomThemes $custom_themes */
            $themes_controller = JTOC()->requestService( CustomThemes::class );
            $custom_theme = $themes_controller->getTheme( $theme_id );
            $stylesheet_path = $custom_theme['styles'];
            $function_path = $custom_theme['functions'];
            $theme_version = $custom_theme['info']['version'] ?? null;
            if ( $stylesheet_path ) {
                wp_enqueue_style(
                    'wpjoli-joli-tocv2-theme-' . $theme_id,
                    $stylesheet_path,
                    [],
                    ( $theme_version ? $theme_version : JTOC()::VERSION )
                );
            }
            if ( $function_path ) {
                include_once $function_path;
            }
        } else {
            if ( $theme && $theme !== 'none' ) {
                $stylesheet_path = JTOC()->url( 'assets/public/css/themes/' . $theme . '.css', JTOC()::USE_MINIFIED_ASSETS );
                wp_enqueue_style(
                    'wpjoli-joli-tocv2-theme-' . $theme,
                    $stylesheet_path,
                    [],
                    JTOC()::VERSION
                );
                //Includes additional php theme specific file
                $theme_functions = JTOC()->path( 'assets/public/themes/' . $theme . '.php' );
                if ( is_file( $theme_functions ) ) {
                    include_once $theme_functions;
                }
                // Fetch theme specific options
                $theme_options = (include JTOC()->path( 'config/theme_options.php' ));
                // $theme_options =  [
                //     [
                //         'id' => 'theme-soft-background-gradient',
                //         'theme-option-for' => ['default-v3', 'hero'],
                //     ],
                //     // Flowline type (select)
                //     [
                //         'id' => 'theme-indicator-type',
                //         'theme-option-for' => ['flowline'],
                //     ],
                //     // Thread width
                //     [
                //         'id' => 'theme-indicator-thread-width',
                //         'theme-option-for' => ['flowline', 'mantis', 'modern-v3', 'sequoia'],
                //     ],
                // ];
                // Find the options that apply to the current theme
                $current_theme_options = array_filter( $theme_options, function ( $option ) use($theme) {
                    return in_array( $theme, $option['theme-option-for'] );
                } );
                // Get an array on options ids
                $current_theme_option_ids = array_values( array_map( function ( $option ) {
                    return str_replace( '-', '_', $option['id'] );
                }, $current_theme_options ) );
                $this->theme_options_available = $current_theme_option_ids;
                // JTOC()->log($this->theme_options_available);
            }
        }
        //since 1.3.8
        if ( !apply_filters( 'joli_toc_disable_styles', false ) ) {
            wp_enqueue_style(
                'wpjoli-joli-tocv2-styles',
                JTOC()->url( 'assets/public/css/' . 'wpjoli-joli-table-of-contents' . '.css', JTOC()::USE_MINIFIED_ASSETS ),
                [],
                JTOC()::VERSION
            );
        }
        if ( !apply_filters( 'joli_toc_disable_js', false ) ) {
            wp_enqueue_script(
                'wpjoli-joli-tocv2-scripts',
                JTOC()->url( 'assets/public/js/' . 'wpjoli-joli-table-of-contents' . '.js', JTOC()::USE_MINIFIED_ASSETS ),
                [],
                JTOC()::VERSION,
                true
            );
            // $logo_url = JTOC()->url('assets/public/img/' . 'wpjoli-logo-linear-small-bw-24px.png');
            // $has_credits = $options['show_credits'];
            // $data['logo'] = $has_credits ? $logo_url : null;
            $widget_support_post_types = $options['widget_support_post_types'];
            $widget_support = false;
            if ( is_array( $widget_support_post_types ) && in_array( $post->post_type, $widget_support_post_types ) ) {
                $widget_support = true;
            }
            $front_data = [
                'scroll_update_interval'      => (int) apply_filters( 'jtoc_floating_widget_scroll_update_interval', 200 ),
                'header_as_toggle'            => (bool) ($options['header_as_toggle'] ?? false),
                'headings_full_row_clickable' => (bool) ($options['headings_full_row_clickable'] ?? false),
                'jump_to_offset'              => (int) jtoc_get_unit_value( $options['jump_to_offset'] ?? null, true ),
                'jump_to_offset_mobile'       => (int) jtoc_get_unit_value( $options['jump_to_offset_mobile'] ?? null, true ),
                'smooth_scroll'               => (bool) ($options['smooth_scroll'] ?? false),
                'hash_in_url'                 => (bool) ($options['hash_in_url'] ?? false),
                'is_admin'                    => is_super_admin(),
                'wp_widget_support'           => $widget_support,
                'in_the_loop'                 => in_the_loop(),
                'post_class'                  => get_post_class(),
            ];
            $front_strings = [
                'wp_widget_support_message' => __( 'Widget support for this post type', 'joli-table-of-contents' ) . ' (<strong>' . $post->post_type . '</strong>) ' . __( 'is currently not enabled, to make the TOC links work, please enable support in the settings under WIDGET SUPPORT > Enable widget support > Post type. This message is only visible by admins.', 'joli-table-of-contents' ),
            ];
            wp_localize_script( 'wpjoli-joli-tocv2-scripts', 'JTOC', [
                'options' => $front_data,
                'strings' => $front_strings,
            ] );
        }
        // Processes the TOC inner after the theme is loaded to make sure the custom hooks will work
        $output = $this->renderTOC( $_headings, true );
        $return_args = [];
        //WPML
        if ( class_exists( 'Sitepress' ) ) {
            $jtoc_options = get_option( Application::SETTINGS_V2_SLUG );
            $tr_title = apply_filters( 'joli_toc_toc_title', $jtoc_options['toc_title'] );
        } else {
            $tr_title = apply_filters( 'joli_toc_toc_title', $options['toc_title'] );
        }
        $wrapper_main_classes = $this->getTOCMainClasses( $headings_count, $return_args );
        $wrapper_shared_classes = $this->getTOCWrapperClasses( $headings_count, $return_args );
        // array_push($wrapper_shared_classes, '--jtoc-notebook-style');
        // array_push($wrapper_shared_classes, '--dev');
        $reading_time = $this->getReadingTime();
        $data = [
            'title'                      => $tr_title,
            'show_header'                => $options['show_header'],
            'title_icon'                 => apply_filters( 'joli_toc_title_icon', $this->getTitleIcon() ),
            'show_toggle'                => (bool) $options['show_toggle'],
            'preserve_theme_styles'      => (bool) $options['preserve_theme_styles'],
            'toggle_type'                => $options['toggle_type'],
            'toggle_button_text_opened'  => $options['toggle_button_text_opened'],
            'toggle_button_text_closed'  => $options['toggle_button_text_closed'],
            'in_the_loop'                => in_the_loop(),
            'is_in_the_content'          => $this->is_in_the_content,
            'css'                        => '',
            'custom_css'                 => $options['css_code'],
            'toc_styles_root'            => $this->getTOCStylesRoot(),
            'toc_styles_general'         => $this->getTOCStylesGeneral(),
            'toc_styles'                 => $this->getTOCStyles(),
            'toc_wrapper_main_classes'   => $this->mergeClasses( $wrapper_main_classes ),
            'toc_wrapper_shared_classes' => $this->mergeClasses( $wrapper_shared_classes ),
            'theme_class'                => $return_args['theme_class'] ?? '',
            'toc_classes'                => $this->getTOCClasses(),
            'toc'                        => $output,
            'toc_style'                  => '',
            'reading_time'               => $reading_time,
        ];
        if ( $reading_time > 0 ) {
            $reading_time_position = $options['reading_time_position'] ?? 'after-title';
            $hook_mapping = [
                'before-title'    => 'joli_toc_before_title',
                'after-title'     => 'joli_toc_after_title',
                'before-headings' => 'joli_toc_before_headings',
                'after-headings'  => 'joli_toc_after_headings',
            ];
            // Allow to change the hook by a custom hook or anothoer hook from the toc
            $reading_time_hook = apply_filters( 'joli_toc_reading_time_hook', $hook_mapping[$reading_time_position] );
            add_action( $reading_time_hook, [$this, 'addReadingTime'] );
        }
        if ( $options['toggle_type'] === 'icon-std' ) {
            $opened_icon_id = $options['toggle_button_icon_opened'] ?? '';
            $closed_icon_id = $options['toggle_button_icon_closed'] ?? '';
            $data['toggle_button_icon_opened'] = apply_filters( 'joli_toc_toggle_button_icon_opened', sprintf( '<i class="%s"></i>', $opened_icon_id ) );
            $data['toggle_button_icon_closed'] = apply_filters( 'joli_toc_toggle_button_icon_closed', sprintf( '<i class="%s"></i>', $closed_icon_id ) );
            // Load the toggle button icon css from the file - Since 3.0
            $opened_icon_css = $this->getGGIconCss( $opened_icon_id );
            //file_get_contents(JTOC()->path('assets/public/css/icons/' . $opened_icon_id . '.css'));
            $closed_icon_css = $this->getGGIconCss( $closed_icon_id );
            $data['css'] .= $opened_icon_css . $closed_icon_css;
        }
        $style_parts = [];
        // combine required styles and enqueue the generated asset
        $option_classes = array_merge( $wrapper_main_classes, $wrapper_shared_classes );
        $css_file = $this->combineRequiredStyles( $style_parts, $option_classes );
        if ( $css_file !== false ) {
            $combined_filename_url = $css_file['url'];
            $combined_filename_hash = $css_file['hash'];
            wp_enqueue_style( 'wpjoli-joli-toc-' . $combined_filename_hash, $combined_filename_url, [] );
        }
        // Enqueue the created file
        $toc = JTOC()->render( [
            'public' => 'joli-toc-template',
        ], $data, true );
        if ( $reading_time > 0 ) {
            remove_action( $reading_time_hook, [$this, 'addReadingTime'] );
        }
        return $toc;
    }

    public function addReadingTime( $data ) {
        // JTOC()->log('addReadingTime');
        // JTOC()->log(print_r($data, true));
        $reading_time = $this->getReadingTime();
        if ( !$reading_time > 0 ) {
            return;
        }
        // translators: %s is the estimated reading time (e.g. "3 minutes")
        $reading_time_pattern = '{clock_icon}{time}' . __( 'mn read', 'joli-table-of-contents' );
        $reading_time_label = $this->options['reading_time_label'] ?? $reading_time_pattern;
        if ( strpos( $reading_time_label, '{time}' ) === false ) {
            $reading_time_label = $reading_time_pattern;
        }
        // Remove extras {time} to avoid a multiple {time} in the label
        $pos = strpos( $reading_time_label, '{time}' );
        if ( $pos !== false ) {
            $label = substr( $reading_time_label, 0, $pos + 2 ) . str_replace( '{time}', '', substr( $reading_time_label, $pos + 2 ) );
        } else {
            $label = $reading_time_label;
        }
        // Remove extras {clock} to avoid a multiple %s in the label
        $pos = strpos( $label, '{clock_icon}' );
        if ( $pos !== false ) {
            $label = substr( $label, 0, $pos + 7 ) . str_replace( '{clock_icon}', '', substr( $label, $pos + 7 ) );
        }
        $clock_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock-icon lucide-clock"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>';
        $label = str_replace( '{clock_icon}', wp_kses( $clock_icon, jtoc_kses_lucide_svg() ), $label );
        // echo '<div class="wpj-jtoc--reading-time"><span>' . sprintf($reading_time_label, $reading_time) . '</span></div>';
        echo jtoc_tagify( 
            'div',
            // jtoc_tagify('span', sprintf($label, $reading_time)),
            jtoc_tagify( 'span', str_replace( '{time}', $reading_time, $label ) ),
            [
                'class' => 'wpj-jtoc--reading-time',
            ]
         );
    }

    private function getGGIconCss( $icon ) {
        $file_min = JTOC()->path( 'assets/public/css/icons/' . $icon . '.min.css' );
        $file = JTOC()->path( 'assets/public/css/icons/' . $icon . '.css' );
        if ( file_exists( $file_min ) ) {
            return file_get_contents( $file_min );
        } else {
            if ( file_exists( $file ) ) {
                return file_get_contents( $file );
            }
        }
        return '';
    }

    /**
     * Combines the required CSS parts into a single file.
     *
     * @param array $parts The active CSS parts as returned by joli_toc_get_active_css_parts().
     *
     * @return array|false The URL and hash of the combined CSS file, or false if any of the required files are missing.
     */
    private function combineRequiredStyles( $parts, $option_classes = [] ) {
        // $parts = joli_toc_get_active_css_parts();
        $hash = $this->getCssSignature( $parts, $option_classes );
        // JTOC()->log($option_classes);
        // JTOC()->log($hash);
        $filename = "joli-table-of-contents-{$hash}_" . Application::VERSION . ".css";
        $path = JOLI_TOC_UPLOADS_PATH . $filename;
        $url = JOLI_TOC_UPLOADS_URL . $filename;
        // JTOC()->log($path);
        $old_versions_only = true;
        $this->clearCSSCache( $old_versions_only );
        if ( !file_exists( $path ) ) {
            $css = '';
            $missing = [];
            $failed = [];
            foreach ( $parts as $name ) {
                $file = $this->getCssPartialFilePath( $name );
                if ( $file !== false ) {
                    $css .= file_get_contents( $file );
                    if ( $css === false ) {
                        // file read failed
                        $failed[] = $file;
                    }
                } else {
                    // JTOC()->log('File not found: ' . $file);
                    $missing[] = $file;
                }
            }
            if ( $option_classes ) {
                foreach ( $option_classes as $class ) {
                    $file = $this->getCssPartialFilePath( $class, 'options' );
                    // false if file does not exist
                    if ( $file !== false ) {
                        $css .= file_get_contents( $file );
                        if ( $css === false ) {
                            // file read failed
                            $failed[] = $file;
                        }
                    } else {
                        //some option classe are not associated with a file so let's just ignore it
                    }
                }
            }
            if ( !empty( $failed ) ) {
                error_log( 'JTOC Failed to read files: ' . implode( ', ', $failed ) );
            }
            if ( !empty( $missing ) ) {
                // JTOC()->log('Missing files: ' . implode(', ', $missing));
                error_log( 'JTOC Missing CSS files: ' . implode( ', ', $missing ) );
                // return false;
            }
            wp_mkdir_p( JOLI_TOC_UPLOADS_PATH );
            file_put_contents( $path, $css );
        }
        return [
            'url'  => $url,
            'hash' => $hash,
        ];
    }

    /**
     * Clears the CSS cache folder of all files.
     *
     * If $old_versions is true, only files from previous versions of the plugin will be deleted.
     *
     * @param bool $old_versions Whether to only delete files from previous versions of the plugin.
     * @since 3.0.0
     */
    private function clearCSSCache( $old_versions = false ) {
        $files = glob( JOLI_TOC_UPLOADS_PATH . '*.css' );
        foreach ( $files as $file ) {
            if ( $old_versions ) {
                // $filename = "joli-table-of-contents-{$hash}_" . Application::VERSION . ".css";
                // check for the substring "Application::VERSION . '.css'"
                if ( strpos( $file, Application::VERSION . '.css' ) !== false ) {
                    // if the substring corresponds to the current version, do not delete
                    continue;
                }
            }
            JTOC()->log( $file );
            unlink( $file );
        }
    }

    /**
     * Returns the file path of a CSS part file if it exists.
     *
     * Looks for a minified version of the file first, and if that doesn't exist, looks for a non-minified version.
     *
     * @since 3.0.0
     * @param string $name
     * @return string|false The file path of the CSS part file, or false if it doesn't exist.
     */
    private function getCssPartialFilePath( $name, $folder = 'parts' ) {
        $file_min = JTOC()->path( 'assets/public/css/' . $folder . '/' . $name . '.min.css' );
        $file = JTOC()->path( 'assets/public/css/' . $folder . '/' . $name . '.css' );
        if ( file_exists( $file_min ) ) {
            return $file_min;
        } else {
            if ( file_exists( $file ) ) {
                return $file;
            }
        }
        return false;
    }

    /**
     * Generate a unique signature for the combined CSS file based on the list of active CSS parts.
     * The signature is a MD5 hash of the concatenated strings of CSS part names and their last modified timestamps,
     * followed by the version number of the JOLI Table of Contents plugin.
     * The resulting signature is a 10-character string.
     *
     * @since 3.0.0
     * @param array $parts List of active CSS parts.
     * @param array $option_classes List of option classes such as --jtoc-option-class
     * @return string Unique signature for the combined CSS file.
     */
    private function getCssSignature( array $parts, array $option_classes = [] ) {
        $elements = [];
        foreach ( $parts as $part ) {
            $last_modified = filemtime( $this->getCssPartialFilePath( $part ) );
            $item = $part . '_' . (int) $last_modified;
            $elements[] = $item;
        }
        if ( $option_classes ) {
            foreach ( $option_classes as $class ) {
                $last_modified = filemtime( $this->getCssPartialFilePath( $class, 'options' ) );
                // skip non existing file
                if ( $last_modified === false ) {
                    continue;
                }
                $item = $class . '_' . (int) $last_modified;
                $elements[] = $item;
            }
        }
        $data = implode( '-', $elements ) . '_' . JTOC()::VERSION;
        // JTOC()->log($data);
        return substr( md5( $data ), 0, 10 );
    }

    private function deprecatedNumerationCompatibility( $type ) {
        if ( $type === 'numbers' ) {
            return 'decimal';
        } else {
            if ( $type === 'roman' ) {
                return 'upper-roman';
            } else {
                if ( $type === 'hexadecimal' ) {
                    return 'decimal-leading-zero';
                } else {
                    if ( $type === 'binary' ) {
                        return 'decimal-leading-zero';
                    }
                }
            }
        }
        return $type;
    }

    /**
     * Gets the general styles for the TOC, applied to the .wpj-jtoc.{theme} selector
     * These rules are placed right before the "getTocStyles" rules so they can be overriden
     *
     * The function gets the options for the TOC and processes them to
     * generate the CSS styles. The styles are stored in the $styles array
     * and the final CSS string is built using a foreach loop.
     *
     * @return string The final CSS string for the general TOC styles.
     */
    private function getTOCStylesGeneral() {
        $options = $this->options;
        // $sc = $this->sc;
        $styles = [];
        //Adds numeration option only if numeration is set
        $option_master = $options['numeration_type'] ?? null;
        if ( $option_master !== null && $option_master !== 'none' ) {
            $processed_value = $this->deprecatedNumerationCompatibility( trim( $option_master ) );
            $styles['--jtoc-numeration-type'] = $processed_value;
            $num_legacy = (bool) ($options['numeration_legacy'] ?? false);
            // Numeration style
            $num_style = ( $num_legacy ? 'plain' : $options['numeration_style'] ?? null );
            // Numeration suffix
            $option = $options['numeration_suffix'] ?? null;
            if ( $option && $num_style !== 'badge' ) {
                // No suffix for the badge style
                $processed_value = trim( $option );
                //Add the style only if different from the default value
                // if ($processed_value !== '.') {
                $styles['--jtoc-numeration-suffix'] = '"' . $processed_value . ' "';
                // }
            }
        }
        //Builds the final css string
        $output = '';
        foreach ( $styles as $prop => $value ) {
            $output .= sprintf( '%s: %s;', $prop, $value ) . "\n";
            // $output .= sprintf('%s: %s !important;', $prop, $value) . "\n";
        }
        return $output;
    }

    private function getTitleIcon() {
        $options = $this->options;
        //Adds numeration option only if numeration is set
        $option_master = (bool) ($options['use_toc_title_icon'] ?? false);
        if ( $option_master === true ) {
            return $this->getLucideIcon( $options['toc_title_icon'] );
        }
        return false;
    }

    private function getLucideIcon( $icon_options, &$return_width = null ) {
        $icon = $icon_options['icon'];
        $size = $icon_options['size'];
        $stroke_width = $icon_options['stroke_width'];
        $color = $icon_options['color'];
        $return_width = $size;
        $file = JTOC()->path( 'assets/public/icons/' . $icon . '.svg' );
        if ( file_exists( $file ) ) {
            $svg = file_get_contents( $file );
            $style = 'width: ' . $size . 'px; height: ' . $size . 'px; stroke-width: ' . $stroke_width . 'px;';
            if ( $color ) {
                $style .= 'stroke: ' . $color . ';';
            }
            // Sanitize SVG
            $svg = wp_kses( $svg, jtoc_kses_lucide_svg() );
            $svg = str_replace( '<svg', '<svg style="' . $style . '"', $svg );
            // return wp_kses($svg, jtoc_kses_lucide_svg());
            return $svg;
        }
        return false;
    }

    private function getCollapseHeadingsIcon() {
        $options = $this->options;
        $option_master = (bool) $options['activate_collapsible_headings'] ?? false;
        if ( $option_master === true ) {
            $icon = $this->getLucideIcon( $options['collapse_headings_icon'], $return_width );
            return [
                'icon'  => $icon,
                'width' => $return_width,
            ];
        }
        return false;
    }

    private function getCollapsibleHeadingsIcon() {
        $defaults = [
            'icon'         => 'chevron-right',
            'stroke_width' => 2,
            'size'         => 20,
            'color'        => null,
        ];
        // $options = $this->options;
        // $icon_options = wp_parse_args($options['collapsible_headings_icon'], $defaults);
        $icon_options = $defaults;
        return $this->getLucideIcon( $icon_options );
    }

    private function getTOCStyles() {
        $options = $this->options;
        $sc = $this->sc;
        $styles = [];
        $option = $options['hierarchy_offset'] ?? null;
        $default_option = $sc->getOption( 'hierarchy_offset', true );
        if ( $option !== null && $option !== $default_option ) {
            $processed_value = jtoc_get_unit_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-hierarchy-offset'] = $processed_value;
            }
        }
        // if (jtoc_xy()->can_use_premium_code__premium_only()) {
        //     //Color palette
        //     for ($i = 1; $i <= 6; $i++) {
        //         $option = jtoc_isset_or_null($options['color_palette_' . $i]);
        //         if ($option !== null) {
        //             $styles['--jtoc-palette-color-' . $i] = $option;
        //         }
        //     }
        // }
        // STYLES --------------------------
        //TOC Width
        $option = $options['toc_width_incontent'] ?? null;
        if ( $option !== null && $option === 'width-100' ) {
            // JTOC()->log('toc_width_incontent: ' . $option);
            $styles['--jtoc-width'] = '100%';
        }
        //TOC Margin
        $option = $options['toc_margin'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_dimensions_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-toc-margin'] = $processed_value;
            }
        }
        //TOC Padding
        $option = $options['toc_padding'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_dimensions_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-toc-padding'] = $processed_value;
            }
        }
        //TOC Border radius
        $option = $options['toc_border_radius'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_dimensions_value( $option, 'corner' );
            if ( $processed_value !== false ) {
                $styles['--jtoc-toc-border-radius'] = $processed_value;
            }
        }
        //TOC Border
        $option = $options['toc_border'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_dimensions_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-toc-border'] = $processed_value . ' solid';
            }
        }
        //TOC Border color
        $option = $options['toc_border_color'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-toc-border-color'] = $option;
        }
        //TOC background color
        $option = $options['toc_background_color'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-background-color'] = $option;
        }
        $option = (bool) ($options['toc_shadow'] ?? false);
        if ( $option === true ) {
            $shadow_color = $options['toc_shadow_color'] ?? null;
            $shadow_color = ( $shadow_color ? $shadow_color : '#00000024' );
            $shadow_color_2 = ( $shadow_color ? $shadow_color : '#00000012' );
            $styles['--jtoc-toc-box-shadow'] = '0 4px 8px ' . $shadow_color . ', 0 10px 20px ' . $shadow_color_2;
        }
        //TOC min-width
        $option = $options['toc_min_width'] ?? null;
        $default_option = $sc->getOption( 'toc_min_width', true );
        if ( $option ) {
            $processed_value = jtoc_get_unit_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-min-width'] = $processed_value;
            }
        }
        //TOC max-width
        $option = $options['toc_max_width'] ?? null;
        $default_option = $sc->getOption( 'toc_max_width', true );
        if ( $option ) {
            $processed_value = jtoc_get_unit_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-max-width'] = $processed_value;
            }
        }
        //TOC Header Height
        $option = $options['toc_header_height'] ?? null;
        $default_option = $sc->getOption( 'toc_header_height', true );
        if ( $option !== null && $option !== $default_option ) {
            $processed_value = jtoc_get_unit_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-header-height'] = $processed_value;
            }
        }
        //TOC Header Margin
        $option = $options['toc_header_margin'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_dimensions_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-header-margin'] = $processed_value;
            }
        }
        //TOC Header Padding
        $option = $options['toc_header_padding'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_dimensions_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-header-padding'] = $processed_value;
            }
        }
        //TOC Header background color
        $option = $options['toc_header_background_color'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-header-background-color'] = $option;
        }
        //TOC Header Border
        $option = $options['toc_header_border_width'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_dimensions_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-header-border-width'] = $processed_value;
            }
        }
        //TOC Header Border radius
        $option = $options['toc_header_border_radius'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_dimensions_value( $option, 'corner' );
            if ( $processed_value !== false ) {
                $styles['--jtoc-header-border-radius'] = $processed_value;
            }
        }
        //TOC Header Border color
        $option = $options['toc_header_border_color'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-header-border-color'] = $option;
        }
        //TOC Header Border style
        $option = $options['toc_header_border_style'] ?? null;
        if ( $option && $option !== 'none' ) {
            $styles['--jtoc-header-border-style'] = $option;
        }
        //TOC Header background color
        $option = $options['toc_title_color'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-title-color'] = $option;
        }
        //TOC Title font size
        $option = $options['toc_title_font_size'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_unit_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-title-font-size'] = $processed_value;
            }
        }
        //TOC Title font weight
        $option = $options['toc_title_font_weight'] ?? null;
        if ( $option && $option !== 'none' ) {
            $styles['--jtoc-title-label-font-weight'] = $option;
        }
        //TOC Title font style
        $option = $options['toc_title_font_style'] ?? null;
        if ( $option && $option !== 'none' ) {
            $styles['--jtoc-title-label-font-style'] = $option;
        }
        //Toggle color
        $option = $options['toc_toggle_color'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-toggle-color'] = $option;
        }
        //TOC Body Margin
        $option = $options['toc_body_margin'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_dimensions_value( $option );
            // JTOC()->log($processed_value);
            if ( $processed_value !== false ) {
                $styles['--jtoc-body-margin'] = $processed_value;
            }
        }
        //TOC Body Padding
        $option = $options['toc_body_padding'] ?? null;
        if ( $option ) {
            // JTOC()->log($option);
            $processed_value = jtoc_get_dimensions_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-body-padding'] = $processed_value;
            }
        }
        //TOC Body background color
        $option = $options['toc_body_background_color'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-body-background-color'] = $option;
        }
        //TOC Body background color
        // $option = $options['headings_group_background_color'];
        // if ($option !== null) {
        //     $styles['--jtoc-headings-group-background-color'] = $option;
        // }
        //Headings Margin
        $option = $options['headings_margin'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_dimensions_value( $option );
            // JTOC()->log($processed_value);
            if ( $processed_value !== false ) {
                $styles['--jtoc-headings-margin'] = $processed_value;
            }
        }
        //Headings Padding
        $option = $options['headings_padding'] ?? null;
        if ( $option ) {
            // JTOC()->log($option);
            $processed_value = jtoc_get_dimensions_value(
                $option,
                null,
                $x_value,
                $y_value
            );
            if ( $processed_value !== false ) {
                $styles['--jtoc-headings-padding'] = $processed_value;
                if ( $x_value !== null ) {
                    $styles['--jtoc-headings-padding-x'] = $x_value;
                }
                if ( $y_value !== null ) {
                    $styles['--jtoc-headings-padding-y'] = $y_value;
                }
            }
        }
        //Headings border radius
        $option = $options['headings_border_radius'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_dimensions_value( $option, 'corner' );
            // JTOC()->log($processed_value);
            if ( $processed_value !== false ) {
                $styles['--jtoc-headings-border-radius'] = $processed_value;
            }
        }
        //Headings font size
        // $option = $options['headings_font_size'] ?? null;
        // if ($option) {
        //     $processed_value = jtoc_get_unit_value($option);
        //     if ($processed_value !== false) {
        //         $styles['--jtoc-headings-font-size'] = $processed_value;
        //     }
        // }
        //Headings line height
        $option = $options['headings_line_height'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_unit_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-headings-line-height'] = $processed_value;
            }
        }
        //TOC headings color
        // $option = $options['headings_color'] ?? null;
        // if ($option !== null) {
        //     $styles['--jtoc-headings-color'] = $option;
        // }
        //TOC headings background color
        $option = $options['headings_background_color'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-headings-background-color'] = $option;
        }
        //TOC headings color
        // $option = $options['headings_color_hover'] ?? null;
        // if ($option !== null) {
        //     $styles['--jtoc-headings-color-hover'] = $option;
        // }
        //TOC headings background color
        $option = $options['headings_background_color_hover'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-headings-background-color-hover'] = $option;
        }
        //TOC headings color
        // $option = $options['headings_color_active'] ?? null;
        // if ($option !== null) {
        //     $styles['--jtoc-headings-color-active'] = $option;
        // }
        //TOC headings background color
        $option = $options['headings_background_color_active'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-headings-background-color-active'] = $option;
        }
        //Adds numeration option only if numeration is set
        $option_master = $options['numeration_type'] ?? null;
        if ( $option_master !== null && $option_master !== 'none' ) {
            // //Toggle color
            // $option = $options['numeration_suffix'] ?? null;
            // if ($option) {
            //     $processed_value = trim($option);
            //     if ($processed_value !== '.') {
            //         $styles['--jtoc-numeration-suffix'] = '"' . $processed_value . ' "';
            //     }
            // }
            //TOC numeration color
            $option = $options['numeration_color'] ?? null;
            if ( $option !== null ) {
                $styles['--jtoc-numeration-color'] = $option;
            }
            $option = $options['numeration_color_hover'] ?? null;
            if ( $option !== null ) {
                $styles['--jtoc-numeration-color-hover'] = $option;
            }
            $option = $options['numeration_color_active'] ?? null;
            if ( $option !== null ) {
                $styles['--jtoc-numeration-color-active'] = $option;
            }
            $num_style = $options['numeration_style'] ?? null;
            if ( $num_style == 'badge' ) {
                $option = $options['numeration_badge_color'] ?? null;
                if ( $option !== null ) {
                    $styles['--jtoc-numeration-badge-color'] = $option;
                }
                // background color
                $option = $options['numeration_badge_background_color'] ?? null;
                if ( $option !== null ) {
                    $styles['--jtoc-numeration-badge-background-color'] = $option;
                }
            }
        }
        //Headings Link Margin
        $option = $options['headings_link_margin'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_dimensions_value( $option );
            // JTOC()->log($processed_value);
            if ( $processed_value !== false ) {
                $styles['--jtoc-link-margin'] = $processed_value;
            }
        }
        //Headings Link Padding
        $option = $options['headings_link_padding'] ?? null;
        if ( $option ) {
            // JTOC()->log($option);
            $processed_value = jtoc_get_dimensions_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-link-padding'] = $processed_value;
            }
        }
        //TOC link font size
        $option = $options['headings_link_font_size'] ?? null;
        if ( $option ) {
            $processed_value = jtoc_get_unit_value( $option );
            if ( $processed_value !== false ) {
                $styles['--jtoc-link-font-size'] = $processed_value;
            }
        }
        //TOC link font weight
        $option = $options['headings_link_font_weight'] ?? null;
        if ( $option && $option !== 'none' ) {
            $styles['--jtoc-link-font-weight'] = $option;
        }
        //TOC link color
        $option = $options['headings_link_color'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-link-color'] = $option;
        }
        //TOC link background color
        $option = $options['headings_link_background_color'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-link-background-color'] = $option;
        }
        //TOC link color hover
        $option = $options['headings_link_color_hover'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-link-color-hover'] = $option;
        }
        //TOC link background color hover
        $option = $options['headings_link_background_color_hover'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-link-background-color-hover'] = $option;
        }
        //TOC link color active
        $option = $options['headings_link_color_active'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-link-color-active'] = $option;
        }
        //TOC link background color active
        $option = $options['headings_link_background_color_active'] ?? null;
        if ( $option !== null ) {
            $styles['--jtoc-link-background-color-active'] = $option;
        }
        if ( in_array( 'activate_headings_hover_effects', $this->theme_options_available ?? [] ) ) {
            $option = (bool) ($options['activate_headings_hover_effects'] ?? false);
            if ( $option === true ) {
                // headings-hover-underline-color
                if ( in_array( 'headings_hover_underline_color', $this->theme_options_available ?? [] ) ) {
                    $color = $options['headings_hover_underline_color'] ?? null;
                    $color && ($styles['--jtoc-text-decoration-color'] = $color);
                }
                // headings-hover-underline-width
                if ( in_array( 'headings_hover_underline_width', $this->theme_options_available ?? [] ) ) {
                    $width = $options['headings_hover_underline_width'] ?? null;
                    $width && ($styles['--jtoc-text-decoration-width'] = $width);
                }
                // headings-hover-underline-style
                if ( in_array( 'headings_hover_underline_style', $this->theme_options_available ?? [] ) ) {
                    $style = $options['headings_hover_underline_style'] ?? null;
                    $style && ($styles['--jtoc-text-decoration-style'] = $style);
                }
                // headings-hover-underline-offset
                if ( in_array( 'headings_hover_underline_offset', $this->theme_options_available ?? [] ) ) {
                    $offset = $options['headings_hover_underline_offset'] ?? null;
                    $offset && ($styles['--jtoc-text-decoration-offset'] = $offset);
                }
            }
        }
        // theme-border-width
        if ( in_array( 'theme_border_width', $this->theme_options_available ?? [] ) ) {
            $width = $options['theme_border_width'] ?? null;
            if ( $width !== null ) {
                $styles['--jtoc-theme-border-width'] = $width;
            }
        }
        // theme-aurora-color-scheme
        if ( in_array( 'theme_aurora_color_scheme', $this->theme_options_available ?? [] ) ) {
            $color_scheme = $options['theme_aurora_color_scheme'] ?? null;
            if ( $color_scheme && $color_scheme !== 'default' ) {
                $option_args = $this->sc->getOptionArgs( 'theme_aurora_color_scheme' );
                $schemes = $option_args['schemes'];
                $is_dark = (bool) ($options['theme_dark_mode'] ?? false);
                $color_mode = ( $is_dark ? 'dark' : 'light' );
                if ( isset( $schemes[$color_scheme][$color_mode] ) ) {
                    $colors = $schemes[$color_scheme][$color_mode];
                    $styles['--jtoc-theme-color-1'] = $colors[0];
                    $styles['--jtoc-theme-color-2'] = $colors[1];
                    $styles['--jtoc-theme-color-3'] = $colors[2];
                    $styles['--jtoc-theme-color-4'] = $colors[3];
                }
            }
        }
        // Reading time
        $master_option = (bool) ($options['show_reading_time'] ?? false);
        if ( $master_option === true ) {
            // reading-time-position
            $option = $options['reading_time_alignment'] ?? null;
            if ( $option ) {
                $mapping = [
                    'left'   => 'flex-start',
                    'center' => 'center',
                    'right'  => 'flex-end',
                ];
                $styles['--jtoc-reading-time-align'] = $mapping[$option];
            }
            // reading-time-color
            $option = $options['reading_time_color'] ?? null;
            if ( $option !== null ) {
                $styles['--jtoc-reading-time-color'] = $option;
            }
        }
        //Builds the final css string
        $output = '';
        foreach ( $styles as $prop => $value ) {
            $output .= sprintf( '%s: %s;', $prop, $value ) . "\n";
            // $output .= sprintf('%s: %s !important;', $prop, $value) . "\n";
        }
        return $output;
    }

    /**
     * Gets the root styles for the TOC wrapped in the :root{} selector
     *
     * This function retrieves all the possible options that can be used in the TOC
     * and returns a string containing all the CSS rules to be applied to the TOC.
     *
     * @return string CSS rules to be applied to the TOC
     */
    private function getTOCStylesRoot() {
        $options = $this->options;
        $sc = $this->sc;
        $styles = [];
        // Background color
        $option = $options['base_font_size'] ?? null;
        if ( $option !== null ) {
            $processed_value = jtoc_get_unit_value( $option );
            $processed_value && ($styles['--jtoc-font-size'] = $processed_value);
        }
        // if (jtoc_xy()->can_use_premium_code__premium_only()) {
        //Color palette
        for ($i = 1; $i <= 9; $i++) {
            $option = $options['color_palette_' . $i] ?? null;
            if ( $option !== null ) {
                $styles['--jtoc-palette-color-' . $i] = $option;
            }
        }
        if ( (bool) ($options['activate_bullet_points'] ?? false) === true ) {
            //s, m, l
            $bullet_size = $options['bullet_points_size'] ?? null;
            if ( !$bullet_size ) {
                $bullet_size = $sc->getOption( 'bullet_points_size', true );
            }
            if ( $bullet_size == 's' ) {
                $bullet_size_px = 6;
            } else {
                if ( $bullet_size == 'm' ) {
                    $bullet_size_px = 8;
                } else {
                    if ( $bullet_size == 'l' ) {
                        $bullet_size_px = 10;
                    }
                }
            }
            $option = $options['bullet_points_type'] ?? null;
            if ( $option == 'disc' ) {
                $styles['--jtoc-bullet-border-radius'] = $bullet_size_px . 'px';
                $styles['--jtoc-bullet-width'] = $bullet_size_px . 'px';
                $styles['--jtoc-bullet-height'] = $bullet_size_px . 'px';
            } else {
                if ( $option == 'square' ) {
                    $styles['--jtoc-bullet-width'] = $bullet_size_px . 'px';
                    $styles['--jtoc-bullet-height'] = $bullet_size_px . 'px';
                } else {
                    if ( $option == 'pill' ) {
                        $styles['--jtoc-bullet-border-radius'] = $bullet_size_px / 2 . 'px';
                        $styles['--jtoc-bullet-width'] = $bullet_size_px * 2.25 . 'px';
                        $styles['--jtoc-bullet-height'] = $bullet_size_px . 'px';
                    }
                }
            }
            $option = $options['bullet_points_color'] ?? null;
            if ( $option !== null ) {
                $styles['--jtoc-bullet-background-color'] = $option;
            }
        }
        //Builds the final css string
        $output = '';
        foreach ( $styles as $prop => $value ) {
            // $output .= sprintf('%s: %s !important;', $prop, $value) . "\n";
            $output .= sprintf( '%s: %s;', $prop, $value ) . "\n";
        }
        return $output;
    }

    private function getTOCMainClasses( $headings_count, &$return_args ) {
        $options = $this->options;
        $sc = $this->sc;
        $classes = [];
        // $is_folded = false;
        $fold_if_headings_count = (int) ($options['fold_if_headings_count'] ?? 0);
        // $option = $fold_if_headings_count;
        // if ($option !== null && $option > 0 && jtoc_isset_or_zero($headings_count) > $option) {
        //     $classes[] = '--jtoc-is-folded';
        //     // $is_folded = true;
        // }
        // if (!$is_folded) {
        $option = $options['fold_on_load'] ?? null;
        if ( $option !== null && $option === 'yes' ) {
            $classes[] = '--jtoc-is-folded';
            // $classes[] = '--jtoc-is-unfolded';
        } elseif ( $option !== null && $option === 'no' ) {
            if ( $fold_if_headings_count > 0 && ($headings_count ?? 0) > $fold_if_headings_count ) {
                $classes[] = '--jtoc-is-folded';
            } else {
                $classes[] = '--jtoc-is-unfolded';
            }
        } elseif ( $option !== null && $option === 'partial' ) {
            if ( $fold_if_headings_count > 0 && ($headings_count ?? 0) > $fold_if_headings_count ) {
                $classes[] = '--jtoc-partial-fold';
            } else {
                $classes[] = '--jtoc-is-unfolded';
            }
        } elseif ( $option !== null && $option === 'responsive' ) {
            if ( wp_is_mobile() ) {
                $classes[] = '--jtoc-is-folded';
            } else {
                $classes[] = '--jtoc-is-unfolded';
            }
        }
        // }
        $option = (bool) ($options['animate_on_fold'] ?? false);
        if ( $option == true && ($headings_count ?? 0) > $fold_if_headings_count ) {
            $classes[] = '--jtoc-animate';
        }
        // Since 3.0
        $option = $options['toc_alignment'] ?? null;
        if ( $option !== null ) {
            $classes[] = '--jtoc-align-' . $option;
        }
        return $classes;
        //Builds the final css string
        // $output = implode(' ', $classes);
        // return ' ' . $output;
    }

    private function getTOCWrapperClasses( $headings_count, &$return_args ) {
        //  --jtoc-theme-basic-light
        //  --has-custom-css
        //  --jtoc-toggle-1
        //  --jtoc-expand-active-only
        //  --jtoc-unfolded-incontent
        //  --jtoc-is-unfolded
        //  --jtoc-overflow-text-hidden
        //  --jtoc-widget-floating
        $options = $this->options;
        $sc = $this->sc;
        $classes = [];
        $option = $options['theme'] ?? null;
        if ( $option ) {
            $return_args['theme_class'] = '--jtoc-theme-' . $option;
            $classes[] = $return_args['theme_class'];
        }
        // theme-dark-mode
        $option = (bool) ($options['theme_dark_mode'] ?? false);
        if ( $option === true ) {
            $classes[] = '--dark';
        }
        // toc-in-content-visibility (all, desktop, mobile)
        $option = $options['toc_in_content_visibility'] ?? null;
        if ( $option === 'mobile' ) {
            $classes[] = '--jtoc-toc-incontent-mobile';
        } else {
            if ( $option === 'desktop' ) {
                $classes[] = '--jtoc-toc-incontent-desktop';
            }
        }
        // toc-sidebar-visibility (all, desktop, mobile)
        $option = $options['toc_sidebar_visibility'] ?? null;
        if ( $option === 'mobile' ) {
            $classes[] = '--jtoc-toc-sidebar-mobile';
        } else {
            if ( $option === 'desktop' ) {
                $classes[] = '--jtoc-toc-sidebar-desktop';
            }
        }
        $option = $options['headings_overflow'] ?? null;
        if ( $option === 'hidden-ellipsis' ) {
            $classes[] = '--jtoc-headings-overflow-hidden-ellipsis';
        } elseif ( $option === 'hidden' ) {
            $classes[] = '--jtoc-headings-overflow-hidden';
        }
        // $is_folded = false;
        // $option = (int) ($options['fold_if_headings_count'] ?? 0);
        // if ($option !== null && $option > 0 && jtoc_isset_or_zero($headings_count) > $option) {
        //     $classes[] = '--jtoc-is-folded';
        //     $is_folded = true;
        // }
        // if (!$is_folded) {
        //     $option = $options['fold_on_load'] ?? null;
        //     if ($option !== null && $option === 'yes') {
        //         $classes[] = '--jtoc-is-folded';
        //     } elseif ($option !== null && $option === 'no') {
        //         $classes[] = '--jtoc-is-unfolded';
        //     } elseif ($option !== null && $option === 'responsive') {
        //         if (wp_is_mobile()) {
        //             $classes[] = '--jtoc-is-folded';
        //         } else {
        //             $classes[] = '--jtoc-is-unfolded';
        //         }
        //     }
        // }
        $option = $options['toc_title_alignment'] ?? null;
        if ( $option !== null ) {
            $classes[] = '--jtoc-title-align-' . $option;
        }
        $option = $options['toggle_type'] ?? null;
        $toggle_type = $option;
        if ( $option === 'text' ) {
            $classes[] = '--jtoc-toggle-text';
        } else {
            if ( $option === 'icon' ) {
                $classes[] = '--jtoc-toggle-icon';
            } else {
                if ( $option === 'icon-std' ) {
                    $classes[] = '--jtoc-toggle-icon-std';
                }
            }
        }
        // Toggle style: since 3.0
        $option = $options['toggle_style'] ?? null;
        if ( $option !== null && $option !== 'default' ) {
            // special case for chiclet + embossed
            if ( $option === 'chicemb' ) {
                $classes[] = '--jtoc-toggle-chiclet';
                $classes[] = '--jtoc-toggle-embossed';
            } else {
                $classes[] = '--jtoc-toggle-' . $option;
            }
        }
        $option = $options['toggle_position'] ?? null;
        if ( $option !== null ) {
            $classes[] = '--jtoc-toggle-position-' . $option;
        }
        if ( $toggle_type === 'icon' ) {
            $option = $options['toggle_button_icon'] ?? null;
            if ( $option !== null ) {
                $classes[] = '--jtoc-' . $option;
            }
        }
        $option = $options['numeration_type'] ?? null;
        if ( $option !== null && $option !== 'none' ) {
            $option = $this->deprecatedNumerationCompatibility( trim( $option ) );
        }
        // JTOC()->log($option);
        if ( $option !== null && $option !== 'none' ) {
            $classes[] = '--jtoc-has-numeration';
            $option = (bool) ($options['numeration_legacy'] ?? false);
            if ( $option === true ) {
                $classes[] = '--jtoc-numeration-legacy';
            }
        }
        // Numeration display since 3.0
        $option = $options['numeration_display'] ?? null;
        if ( $option === 'single' ) {
            $classes[] = '--jtoc-num-single';
        }
        // Numeration style since 3.0
        $option = $options['numeration_style'] ?? null;
        if ( $option === 'badge' ) {
            $classes[] = '--jtoc-num-badge';
            // badge style
            $badge_styles = ['solid', 'soft', 'outline'];
            $badge_style = $options['numeration_badge_style'] ?? null;
            $badge_style && in_array( $badge_style, $badge_styles ) && ($classes[] = '--jtoc-num-badge-' . $badge_style);
        }
        $option = (bool) ($options['header_as_toggle'] ?? false);
        // JTOC()->log($option);
        if ( $option === true ) {
            $classes[] = '--jtoc-header-as-toggle';
        }
        $option = (bool) ($options['headings_full_row_clickable'] ?? false);
        // JTOC()->log($option);
        if ( $option === true ) {
            $classes[] = '--jtoc-headings-full-row-clickable';
        }
        $option = (bool) ($options['activate_bullet_points'] ?? false);
        // JTOC()->log($option);
        if ( $option === true ) {
            $classes[] = '--jtoc-bullet-points';
        }
        // headings-hover-style
        if ( in_array( 'headings_hover_style', $this->theme_options_available ?? [] ) ) {
            $style = $options['headings_hover_style'] ?? null;
            $style && ($classes[] = '--jtoc-text-hover-' . $style);
        }
        if ( in_array( 'activate_headings_hover_effects', $this->theme_options_available ?? [] ) ) {
            $option = (bool) ($options['activate_headings_hover_effects'] ?? false);
            if ( $option === true ) {
                $effect = $options['headings_hover_effect'] ?? null;
                if ( $effect !== null ) {
                    $classes[] = '--jtoc-headings-hover-' . $effect;
                }
            }
        }
        // Reading time
        $option = (bool) ($options['show_reading_time'] ?? false);
        if ( $option === true ) {
            $classes[] = '--jtoc-reading-time';
        }
        // theme-soft-background-gradient
        if ( in_array( 'theme_soft_background_gradient', $this->theme_options_available ?? [] ) ) {
            $option = (bool) ($options['theme_soft_background_gradient'] ?? false);
            if ( $option == true ) {
                $classes[] = '--jtoc-soft-gradient-bg';
            }
        }
        // JTOC()->log(count($classes));
        if ( count( $classes ) > 0 ) {
            $classes[] = '--jtoc-has-custom-styles';
        }
        return $classes;
        //Builds the final css string
        // $output = implode(' ', $classes);
        // return ' ' . $output;
    }

    private function getTOCClasses() {
        $options = $this->options;
        $sc = $this->sc;
        $classes = [];
        //Builds the final css string
        $output = implode( ' ', $classes );
        return ' ' . $output;
    }

    /**
     * Sanitizes the tree indexes if it does not start with H2 depth
     */
    private function prepareHeadings( $headings ) {
        //if it starts with h2, we don't need to process
        if ( $headings[0]['depth'] == 2 ) {
            return $headings;
        }
        $items = [];
        $i = 0;
        $h2_found = false;
        $delta_from_h2 = $headings[0]['depth'] - 2;
        $previous_depth = null;
        $closest_parent = $headings[0];
        //Brings all items upper in the headings rank if they don't start from h2
        // if ($delta_from_h2 > 0) {
        //     for ($i = 0; $i < count($headings); $i++) {
        //         $headings[$i]['depth'] -= $delta_from_h2;
        //         if ($headings[$i]['depth'] < 2) {
        //             $headings[$i]['depth'] = 2;
        //         }
        //     }
        // }
        for ($i = 0; $i < count( $headings ); $i++) {
            $item = $headings[$i];
            $current_depth = $item['depth'];
            // $h2_found = false;
            if ( $item['depth'] == 2 ) {
                $h2_found = true;
            }
            // pre($headings[$i]);
            if ( !$h2_found === true ) {
                // pre($item['depth']);
                // pre($previous_depth);
                if ( $item['depth'] < $previous_depth ) {
                    // $delta_from_h2 = $delta_from_h2 + ($previous_depth - $item['depth'] - 1);
                    $delta_from_h2 = $closest_parent - 2 + ($item['depth'] - $closest_parent);
                }
                if ( $item['depth'] > $previous_depth ) {
                    // $item['depth'] = $previous_depth + 1;
                    $closest_parent = $previous_depth;
                    $delta_from_previous = $item['depth'] - $closest_parent;
                    if ( $delta_from_previous > 1 ) {
                        $item['depth'] -= $delta_from_previous - 1;
                        //1
                    }
                }
                $previous_depth = $current_depth;
                //3
                $item['depth'] -= $delta_from_h2;
                //1
                if ( $item['depth'] < 2 ) {
                    $item['depth'] = 2;
                }
            }
            // $previous_item = $item;
            $items[] = $item;
        }
        return $items;
    }

    /**
     * Transforms a linear list of headings into a hierarchical array
     */
    private function parseHeadings( &$headings, $first_run = true ) {
        $items = [];
        if ( !$headings ) {
            return;
        }
        $i = 0;
        // $firstH2 = false;
        if ( $headings[0]['depth'] !== 2 && $first_run === true ) {
            $first_heading = $headings[0]['depth'];
            // pre($headings);
            // pre($headings[0]['depth']);
            $headings[0]['depth'] = 2;
            for ($h = 1; $h < count( $headings ); $h++) {
                if ( $headings[$h]['depth'] === $first_heading ) {
                    $headings[$h]['depth'] = 2;
                } else {
                    break;
                }
            }
        }
        do {
            $children = null;
            $depth = $headings[0]['depth'];
            $item = [
                'id'    => $headings[0]['id'],
                'title' => $headings[0]['title'],
                'icon'  => $headings[0]['icon'],
                'depth' => $depth,
                'smart' => $headings[0]['smart'],
                'url'   => $headings[0]['url'] ?? null,
            ];
            //removes the first element
            array_shift( $headings );
            // pre ($headings[0]);
            // pre ($depth);
            if ( isset( $headings[0] ) && $headings[0]['depth'] > $depth ) {
                // Corrects any hierarchy anomaly, makes the depth delta to 1 in any case.
                $h_delta = $headings[0]['depth'] - $depth;
                // pre($h_delta);
                if ( $h_delta > 1 ) {
                    $reference_depth = $headings[0]['depth'];
                    // $headings[0]['depth'] = $headings[0]['depth'] - ($h_delta - 1);
                    $z = 0;
                    //realigns all direct following items of the same depth
                    do {
                        $headings[$z]['depth'] = $headings[$z]['depth'] - ($h_delta - 1);
                        $z++;
                    } while ( isset( $headings[$z] ) && $headings[$z]['depth'] === $reference_depth );
                }
                $children = $this->parseHeadings( $headings, false );
            }
            $items[] = [
                'data'     => $item,
                'children' => $children,
            ];
            $i++;
        } while ( isset( $headings[0] ) && $headings[0]['depth'] >= $depth );
        // } while (isset($headings[0]) && $headings[0]['depth'] >= $depth);
        return $items;
    }

    /**
     * Turns a recursive array into HTML
     */
    private function renderTOC(
        &$headings,
        $root = false,
        $options = null,
        $level = ''
    ) {
        if ( !$headings ) {
            return;
        }
        // if ($root) {
        //     JTOC()->log(print_r($headings, true));
        // }
        // JTOC()->log($level);
        $headings_depth = $this->options['headings_depth'] ?? '';
        $is_multi_level = stripos( $headings_depth, ',' ) !== false;
        $collapsible = '';
        $dynamic_mode = (bool) ($this->options['activate_dynamic_unfold'] ?? false);
        $collapsible_headings = (bool) ($this->options['activate_collapsible_headings'] ?? false) && $is_multi_level === true;
        // forces collipsible mode to false if headings depth is not multi-level
        if ( $dynamic_mode && jtoc_xy()->can_use_premium_code__premium_only() ) {
            $collapsible = ( !$root ? ' is-expandable' : '' );
        } else {
            $collapsible = '';
        }
        // if ($collapsible_mode && jtoc_xy()->can_use_premium_code__premium_only()) {
        //     $collapsible_headings_mode = jtoc_isset_or_null($this->options['collapse_headings_mode']);
        //     if ($collapsible_headings_mode === 'h2' && $level === 2) {
        //         $collapsible = !$root ? ' is-collapsible' : '';
        //     }else{
        //         $collapsible = !$root ? ' is-collapsible' : '';
        //     }
        // } else {
        //     $collapsible = '';
        // }
        $list_tag = apply_filters( 'joli_toc_list_tag', 'ol' );
        $output = '<' . $list_tag . ' class="wpj-jtoc--items' . $collapsible . '">';
        // $output = sprintf(
        //     '<ul%s>',
        //     $root == true ? ' class="joli-nav"' . $init_style : ''
        // );
        $has_bullets = (bool) ($this->options['activate_bullet_points'] ?? false);
        $bullets = [];
        if ( $has_bullets ) {
            $bullets_depth = $this->options['bullet_points_headings_depth'] ?? null;
            if ( !$bullets_depth || !is_string( $bullets_depth ) ) {
                $bullets_depth = '2,3,4,5,6';
            }
            //Array of depth where bullets are active
            $bullets = explode( ',', $bullets_depth );
        }
        // Collapsible headings icon
        $collapse_headings_icon = null;
        if ( $collapsible_headings && jtoc_xy()->can_use_premium_code__premium_only() ) {
            $collapse_headings_icon = $this->getCollapseHeadingsIcon();
        }
        $cpt = 0;
        $numeration_type = $this->deprecatedNumerationCompatibility( $this->options['numeration_type'] ?? 'none' );
        // $numeration_style = jtoc_isset_or_null($this->options['numeration_style']);
        $numeration_legacy = (bool) ($this->options['numeration_legacy'] ?? false);
        do {
            $cpt++;
            $id = $headings[0]['data']['id'];
            $title = $headings[0]['data']['title'];
            $icon = $headings[0]['data']['icon'];
            $depth = $headings[0]['data']['depth'];
            $children = $headings[0]['children'];
            //since 2.0.0
            $smart = $headings[0]['data']['smart'];
            $url = $headings[0]['data']['url'];
            // //Renders a single item
            // $output .= sprintf(
            //     '<li class="%sitem"><a href="#%s" title="%s" class="joli-h%s">%s</a>',
            //     $depth > 2 ? 'sub' : '',
            //     $id,
            //     $title,
            //     $depth,
            //     $title
            // );
            // $cpt_processed = $cpt;
            // if ($numeration_type === 'roman') {
            //     $cpt_processed = jtoc_decimal_to_roman($cpt);
            // } else if ($numeration_type === 'hexadecimal') {
            //     $cpt_processed = base_convert($cpt, 10, 16);
            // } else if ($numeration_type === 'binary') {
            //     $cpt_processed = base_convert($cpt, 10, 2);
            // }
            // $suffix = $numeration_type !== 'numbers' ? $cpt_processed : $cpt;
            $suffix = $cpt;
            $display_type = $this->options['numeration_display'] ?? null;
            $num_suffix = $this->options['numeration_suffix'] ?? null;
            // since 3.0
            $attrs = [];
            if ( (bool) ($this->options['seo_rel_nofollow'] ?? false) === true ) {
                $attrs['rel'] = 'nofollow';
            }
            // By default add title attribute unless disabled
            if ( (bool) ($this->options['disable_title_attr'] ?? false) !== true ) {
                $attrs['title'] = $title;
            }
            $is_collapsible = false;
            $collapse_headings_on_load = false;
            if ( $collapsible_headings && jtoc_xy()->can_use_premium_code__premium_only() ) {
                $collapse_headings_mode = $this->options['collapse_headings_mode'] ?? null;
                // JTOC()->log($collapse_headings_mode);
                // JTOC()->log($depth);
                if ( $collapse_headings_mode === 'h2' && $depth == 2 && $children ) {
                    $is_collapsible = true;
                } else {
                    if ( $collapse_headings_mode === 'all' && $children ) {
                        $is_collapsible = true;
                    }
                }
                // Collapse on load
                $collapse_headings_on_load = (bool) ($this->options['collapse_headings_on_load'] ?? false);
            }
            // JTOC()->log($is_collapsible);
            // JTOC()->log($collapse_headings_icon);
            $output .= JTOC()->render( [
                'public' => 'joli-toc-template-item',
            ], [
                'args' => [
                    'id'                     => $id,
                    'title'                  => $title,
                    'icon'                   => $icon,
                    'depth'                  => $depth,
                    'has_numeration'         => $numeration_type !== 'none',
                    'is_num_legacy'          => $numeration_legacy,
                    'num_suffix'             => $num_suffix,
                    'counter'                => ( $display_type === 'full' || $display_type == null ? $level . $suffix : $suffix ),
                    'smart'                  => $smart,
                    'url'                    => $url,
                    'attrs'                  => $attrs,
                    'options'                => $this->options,
                    'bullet'                 => $has_bullets && in_array( $depth, $bullets ),
                    'bullet_filler'          => $has_bullets && !in_array( $depth, $bullets ),
                    'collapsible_headings'   => $collapsible_headings,
                    'is_collapsed'           => $collapse_headings_on_load,
                    'is_collapsible'         => $is_collapsible,
                    'collapse_headings_icon' => $collapse_headings_icon,
                ],
            ], true );
            //Renders the children if any
            if ( $children !== null ) {
                // $output .= sprintf(
                //     '<li class="%sitem">',
                //     $depth > 2 ? 'sub' : ''
                // );
                $numeration_separator = $this->options['numeration_separator'] ?? null;
                $separator = ( $numeration_separator ? $numeration_separator : '.' );
                //fallback to default value if unset
                $output .= $this->renderTOC(
                    $children,
                    false,
                    null,
                    $level . $suffix . $separator
                );
                // $output .= '</li>';
            }
            $output .= '</li>';
            //removes the first element and go on
            array_shift( $headings );
        } while ( count( $headings ) > 0 );
        $output .= '</' . $list_tag . '>';
        return $output;
    }

}

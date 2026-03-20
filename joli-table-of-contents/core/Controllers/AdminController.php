<?php

/**
 * @package jolitoc
 */
namespace WPJoli\JoliTOC\Controllers;

use WPJoli\JoliTOC\Application;
class AdminController {
    public function enqueueAssets( $hook_suffix ) {
        // JTOC()->log($hook_suffix);
        //enqueues scripts/styles only for admin page than contain "joli_toc" in the hook suffix or in posts
        // if ( $hook_suffix == 'post.php' || stripos( $hook_suffix, JTOC()::SLUG ) !== false ) {
        // $jtoc = JTOC();
        $app = Application::instance();
        if ( stripos( $hook_suffix, $app::SLUG ) !== false || stripos( $hook_suffix, $app::SETTINGS_V2_SLUG ) !== false ) {
            wp_enqueue_style( 'global-styles' );
            wp_enqueue_style(
                'wpjoli-joli-toc-admin-styles-v3',
                // 'http://localhost:8080//css/wpjoli-jtoc-admin-settings.css',
                $app->url( 
                    // 'assets/css/admin/wpjoli-jtoc-admin-settings.css',
                    'assets/admin/css/wpjoli-jtoc-admin-settings.css',
                    $app::USE_MINIFIED_ASSETS
                 ),
                [],
                $app::VERSION . time()
            );
            wp_enqueue_script(
                'wpjoli-joli-toc-admin-scripts',
                // 'http://localhost:8080/admin/wpjoli-jtoc-admin-scripts.js',
                $app->url( 'assets/admin/js/wpjoli-jtoc-admin-scripts.js', $app::USE_MINIFIED_ASSETS ),
                ['jquery', 'wp-color-picker'],
                $app::VERSION,
                true
            );
            // wp_enqueue_style('wpjoli-joli-toc-admin-styles', $app->url('assets/admin/css/joli-toc-admin.css', $app::USE_MINIFIED_ASSETS), [], $app::VERSION);
            wp_enqueue_style(
                'wpjoli-joli-toc-public-styles',
                $app->url( 'assets/public/css/wpjoli-joli-table-of-contents.css', $app::USE_MINIFIED_ASSETS ),
                [],
                $app::VERSION
            );
            // wp_enqueue_style('wpjoli-joli-toc-admin-gg-icons', $app->url('assets/public/css/' . jtoc_fs_file('gg-icons') . '.css', $app::USE_MINIFIED_ASSETS), [], $app::VERSION);
            wp_enqueue_style(
                'wpjoli-joli-toc-admin-gg-icons',
                $app->url( 'assets/public/css/icons/' . 'gg-icons' . '.css', $app::USE_MINIFIED_ASSETS ),
                [],
                $app::VERSION
            );
            // wp_enqueue_script('wpjoli-joli-toc-admin-scripts', $app->url('assets/admin/js/joli-toc-admin.js', $app::USE_MINIFIED_ASSETS), ['jquery', 'wp-color-picker'/*, 'media'*/], $app::VERSION, true);
            $theme_palette = [];
            if ( function_exists( 'wp_enqueue_global_styles' ) ) {
                wp_enqueue_global_styles();
                // JTOC()->log(print_r(wp_get_global_stylesheet(), true));
            }
            wp_enqueue_style( 'wp-block-library' );
            wp_enqueue_style( 'wp-block-library-theme' );
            $settings = wp_get_global_settings();
            // JTOC()->log(print_r($settings, true));
            if ( !empty( $settings['color']['palette']['theme'] ) ) {
                $theme_palette = array_map( fn( $c ) => $c['color'], $settings['color']['palette']['theme'] );
            }
            // default palette
            $default_palette = [];
            if ( !empty( $settings['color']['palette']['default'] ) ) {
                $default_palette = array_map( fn( $c ) => $c['color'], $settings['color']['palette']['default'] );
            }
            // wp_localize_script(
            //     'wpjoli-joli-toc-admin-scripts',
            //     // $app::ID . 'Admin',
            //     'jtocAdmin',
            //     [
            //         'appId' => $app::ID,
            //         'ajaxUrl' => admin_url('admin-ajax.php'),
            //         'nonce' => wp_create_nonce($app::SLUG),
            //         'settings' => $settings,
            //         'themePalette' => $theme_palette,
            //         'defaultPalette' => $default_palette,
            //         // 'showOnboarding' => $this->willShowOnboarding(),
            //         'showOnboarding' => true, // will show as '0' / '1' in the js
            //         'onboardingData' => include $app->path('config/onboarding_data.php'),
            //         'quickSettingsData' => include $app->path('config/quick_settings_data.php'),
            //         'optionName' => $app::SETTINGS_V2_SLUG,
            //         // 'stylesheet' => wp_get_global_stylesheet()
            //     ]
            // );
            $data = [
                'appId'             => $app::ID,
                'ajaxUrl'           => admin_url( 'admin-ajax.php' ),
                'nonce'             => wp_create_nonce( $app::SLUG ),
                'settings'          => $settings,
                'themePalette'      => $theme_palette,
                'defaultPalette'    => $default_palette,
                'showOnboarding'    => $this->willShowOnboarding(),
                'onboardingData'    => include $app->path( 'config/onboarding_data.php' ),
                'quickSettingsData' => include $app->path( 'config/quick_settings_data.php' ),
                'optionName'        => $app::SETTINGS_V2_SLUG,
            ];
            wp_add_inline_script( 'wpjoli-joli-toc-admin-scripts', 'window.jtocAdmin = ' . wp_json_encode( $data ) . ';', 'before' );
            wp_enqueue_media();
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script(
                'wpjoli-joli-toc-admin-wp-color-picker-alpha',
                $app->url( 'vendor/wp-color-picker-alpha/wp-color-picker-alpha.min.js' ),
                ['wp-color-picker'],
                '3.0.4',
                true
            );
            wp_enqueue_style(
                'wpjoli-joli-toc-coloris-styles',
                $app->url( 'vendor/coloris/coloris.min.css' ),
                [],
                '0.25.0'
            );
            wp_enqueue_script(
                'wpjoli-joli-toc-coloris',
                $app->url( 'vendor/coloris/coloris.min.js' ),
                [],
                '0.25.0',
                true
            );
        }
        wp_enqueue_script(
            'wpjoli-joli-toc-admin-notice-scripts',
            $app->url( 'assets/admin/js/wpjoli-jtoc-admin-notices.js', $app::USE_MINIFIED_ASSETS ),
            ['jquery'],
            $app::VERSION,
            true
        );
        wp_localize_script( 'wpjoli-joli-toc-admin-notice-scripts', 'jtocAdminNotice', [
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'nonce'   => wp_create_nonce( 'jtoc_admin_notices' ),
        ] );
    }

    /**
     * Returns true if the onboarding screen should be shown, false otherwise.
     *
     * The onboarding screen is shown when the plugin is first installed, and when the user has not yet completed the onboarding wizard.
     *
     * @return bool
     * @since 3.0.0
     */
    private function willShowOnboarding() {
        return (bool) get_option( 'joli_toc_show_onboarding', 0 );
    }

    /**
     * Handles the wizard completion
     *
     * This function is called through the ajax hook wp_ajax_joli_toc_wizard_completed
     *
     * @return void
     * @since 3.0.0s
     */
    public function handleWizardCompleted() {
        if ( !current_user_can( 'manage_options' ) ) {
            wp_send_json_error( __( 'You do not have sufficient permissions to access this page.', 'joli-table-of-contents' ) );
        }
        check_ajax_referer( JTOC()::SLUG, 'nonce' );
        // Make sure the wizard will not show up again automatically
        update_option( 'joli_toc_show_onboarding', 0 );
        wp_send_json_success( [
            'message' => __( 'Wizard completed successfully.', 'joli-table-of-contents' ),
        ] );
    }

    /**
     * Adds a settings link under the plugin's item in the plugins.php page (from the WordPress dashboard).
     *
     * @param array $links An array of links.
     *
     * @return array The modified array of links.
     *
     */
    public function addSettingsLink( $links ) {
        $app = Application::instance();
        $joli_link = '<a href="' . admin_url( 'admin.php?page=' . $app::SETTINGS_V2_SLUG ) . '">' . __( 'Settings', 'joli-table-of-contents' ) . '</a>';
        array_unshift( $links, $joli_link );
        return $links;
    }

}

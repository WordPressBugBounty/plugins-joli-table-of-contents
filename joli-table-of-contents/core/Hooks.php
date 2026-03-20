<?php

/**
 * @package jolitoc
 */
namespace WPJoli\JoliTOC;

use WPJoli\JoliTOC\Controllers\Blocks;
use WPJoli\JoliTOC\Application;
use WPJoli\JoliTOC\Controllers\AdminActions;
use WPJoli\JoliTOC\Controllers\AdminController;
use WPJoli\JoliTOC\Controllers\AdminNotices;
use WPJoli\JoliTOC\Controllers\MenuController;
use WPJoli\JoliTOC\Controllers\Migrations;
use WPJoli\JoliTOC\Controllers\PublicAppController;
use WPJoli\JoliTOC\Controllers\SettingsController;
use WPJoli\JoliTOC\Controllers\ShortcodesController;
use WPJoli\JoliTOC\Controllers\NoticesFreeController;
use WPJoli\JoliTOC\Controllers\PostTypeSettingController;
use WPJoli\JoliTOC\Controllers\RestApi;
class Hooks {
    protected Application $app;

    public function __construct( Application $app ) {
        $this->app = $app;
    }

    public function run() : void {
        $this->registerMigrations();
        $this->registerAdminHooks();
        $this->registerPublicHooks();
        $this->registerIntegrations();
    }

    private function registerAdminHooks() : void {
        $app = $this->app;
        // === EARLY HOOKS ===
        // init: fires early, before most admin things are loaded
        add_action(
            'upgrader_process_complete',
            function ( $upgrader, $hook_extra ) use($app) {
                $app->requestService( AdminActions::class )->runUpgraderTasks( $upgrader, $hook_extra );
            },
            10,
            2
        );
        add_action( 'init', function () use($app) {
            // === WELCOME SCREEN HOOKS ===
            // $app->requestService(AdminController::class)->onboardingScreenActions();
            $settings = $app->requestService( SettingsController::class );
            // if (is_admin() || wp_doing_ajax()) {
            $settings->initialize();
            // }
            $settings->handleResetSettings();
        }, 10 );
        if ( jtoc_xy()->is_free_plan() ) {
            add_action( 'init', function () use($app) {
                $app->requestService( NoticesFreeController::class )->initNotices();
            } );
        }
        if ( version_compare( $GLOBALS['wp_version'], '5.0', '>=' ) ) {
            add_action( 'init', function () use($app) {
                $app->requestService( Blocks::class )->registerBlocks();
            } );
        }
        add_action( 'init', function () use($app) {
            $app->requestService( AdminNotices::class )->initNotices();
        }, 20 );
        // === PLUGIN ADMIN HOOKS ===
        add_filter( 'plugin_action_links_' . plugin_basename( JTOC()->path( 'joli-table-of-contents.php' ) ), function ( $links ) use($app) {
            return $app->requestService( AdminController::class )->addSettingsLink( $links );
        } );
        add_action( 'admin_init', function () use($app) {
            $app->requestService( SettingsController::class )->registerSettings();
        } );
        add_action( 'admin_menu', function () use($app) {
            $app->requestService( MenuController::class )->addAdminMenu();
        } );
        add_action(
            'admin_enqueue_scripts',
            function ( $hook_suffix ) use($app) {
                $admin = $app->requestService( AdminController::class );
                $admin->enqueueAssets( $hook_suffix );
            },
            10,
            1
        );
        add_action( 'in_admin_header', function () use($app) {
            if ( jtoc_xy()->is_activation_mode() ) {
                return;
            }
            $app->requestService( MenuController::class )->doAdminSettingsHeader();
        } );
        // === AJAX HOOKS ===
        add_action( 'wp_ajax_joli_toc_handle_admin_notice', function () use($app) {
            $app->requestService( AdminNotices::class )->jtocHandleNotice();
        } );
        if ( jtoc_xy()->is_free_plan() ) {
            add_action( 'wp_ajax_joli_toc_handle_notice', function () use($app) {
                $app->requestService( NoticesFreeController::class )->jtocHandleNotice();
            } );
        }
        add_action( 'wp_ajax_joli_toc_update_active_post_type_setting', function () use($app) {
            $app->requestService( PostTypeSettingController::class )->updatePostTypeSetting();
        } );
        add_action( 'wp_ajax_joli_toc_export_user_settings', function () use($app) {
            $app->requestService( SettingsController::class )->exportUserSetting();
        } );
        add_action( 'wp_ajax_joli_toc_import_user_settings', function () use($app) {
            $app->requestService( SettingsController::class )->importUserSetting();
        } );
        add_action( 'wp_ajax_joli_toc_settings_preview', function () use($app) {
            $app->requestService( SettingsController::class )->handlePreviewRequest();
        } );
        add_action( 'wp_ajax_joli_toc_wizard_completed', function () use($app) {
            $app->requestService( AdminController::class )->handleWizardCompleted();
        } );
        add_action( 'wp_ajax_jli_check_nonce', function () use($app) {
            $nonce = $_POST['_wpnonce'] ?? '';
            if ( !wp_verify_nonce( $nonce, $app::SLUG ) ) {
                wp_send_json_error( [
                    'expired' => true,
                ] );
            }
            wp_send_json_success();
        } );
        if ( jtoc_is_preview() ) {
            add_filter( 'body_class', function ( $classes ) {
                $classes[] = 'jtoc-preview';
                return $classes;
            } );
            add_action( 'wp_enqueue_scripts', function () {
                wp_register_style( 'jtoc-preview-styles', false );
                wp_enqueue_style( 'jtoc-preview-styles' );
                // Required styles for the preview
                // check if the minified version of JTOC()->path('assets/public/css/wpjoli-live-preview.css') exists and if it does, use it
                // if not, use the unminified version
                $minified_file = JTOC()->path( 'assets/public/css/wpjoli-live-preview.min.css' );
                $target_file = JTOC()->path( 'assets/public/css/wpjoli-live-preview.css' );
                if ( file_exists( $minified_file ) ) {
                    $target_file = $minified_file;
                }
                wp_add_inline_style( 'jtoc-preview-styles', file_get_contents( $target_file ) );
            } );
        }
        // === REST API HOOKS ===
        add_action( 'rest_api_init', function () use($app) {
            $app->requestService( RestApi::class )->registerRestRoutes();
        } );
    }

    private function registerPublicHooks() : void {
        // only for front end, avoid interferences with the editor
        if ( !jtoc_is_front() ) {
            return;
        }
        $app = $this->app;
        // actions
        add_action( 'init', function () use($app) {
            $app->requestService( ShortcodesController::class )->registerShortcodes();
        } );
        // since v2.0.6
        add_action( 'wp_enqueue_scripts', function () use($app) {
            $app->requestService( PublicAppController::class )->enqueueResources();
        } );
        // since 3.0
        add_action( 'wp', function () use($app) {
            if ( is_singular() ) {
                // Save the main post ID so we're sure we won't be working on the wrong post (such as related posts)
                $app->main_post_id = get_queried_object_id();
            }
        } );
        // filters
        add_action( 'init', function () use($app) {
            $priority = apply_filters( 'joli_toc_the_content_filter_priority', 10001 );
            add_filter( 'the_content', function ( $content ) use($app) {
                // $settings = $app->requestService(SettingsController::class);
                // $settings->initialize();
                return $app->requestService( ShortcodesController::class )->beforeTheContent( $content );
            }, -100000 );
            add_filter( 'the_content', function ( $content ) use($app, $priority) {
                // $settings = $app->requestService(SettingsController::class);
                // $settings->initialize();
                return $app->requestService( PublicAppController::class )->joliTocFilterTheContent( $content );
            }, $priority );
            add_filter( 'the_content', function ( $content ) use($app, $priority) {
                return $app->requestService( ShortcodesController::class )->filterTheContentShortcode( $content );
            }, $priority + 1 );
        } );
    }

    // Integrations - since 1.3.8
    private function registerIntegrations() : void {
        add_action( 'plugins_loaded', function () {
            if ( class_exists( '\\RankMath' ) ) {
                $rm = \WPJoli\JoliTOC\Integrations\RankMath::class;
                new $rm();
            }
        } );
    }

    /**
     * Registers the migrations action.
     *
     * This action is triggered when all plugins have been loaded.
     * It runs the migrations stored in the Migrations class.
     */
    private function registerMigrations() : void {
        $app = $this->app;
        add_action( 'plugins_loaded', function () use($app) {
            // Migrations
            $app->requestService( Migrations::class )->runMigrations();
        } );
    }

}

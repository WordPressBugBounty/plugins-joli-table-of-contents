<?php

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since   1.0.0
 * @package jolitoc
 * @author  WPJoli <hello@wopjoli.com>
 */

namespace WPJoli\JoliTOC;

use WPJoli\JoliTOC\Application;
use WPJoli\JoliTOC\Controllers\AdminActions;
use WPJoli\JoliTOC\Controllers\SettingsController;

class Activator
{


    public function activate()
    {
        $has_settings = get_option(Application::SETTINGS_V2_SLUG);
        
        // No settings, show onboarding (should run before first settings activation)
        if (!$has_settings) {
            update_option('joli_toc_show_onboarding', 1);
            update_option('joli_toc_v3_info', -1); // prevent the v3 upgrade notice from showing for first time users
        }

        /** @var SettingsController $sc */
        $sc = JTOC()->requestService(SettingsController::class);
        $sc->initialize();
        $sc->setupSettings();


        // No setting, this is a first time install. We will force the use of v2 toc engine by default
        if (!$has_settings) {
            $sc->setOption('toc_engine_v2', '1'); // should run after settings activation
            // $settings = get_option(Application::SETTINGS_V2_SLUG);
            // $settings['toc_engine_v2'] = '1';
            // update_option(Application::SETTINGS_V2_SLUG, $settings);
        }

        JTOC()->requestService(AdminActions::class)->clearCssCache();
    }
}

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

use WPJoli\JoliTOC\Controllers\SettingsController;
use WPJoli\JoliTOC\Application;

class Activator
{


    public function activate()
    {
        $has_settings = get_option(Application::SETTINGS_V2_SLUG);

        /** @var SettingsController $sc */
        $sc = JTOC()->requestService(SettingsController::class);
        $sc->initialize();
        $sc->setupSettings();


        // No setting, this is a first time install. We will force the use of v2 toc engine by default
        if (!$has_settings) {
            $sc->setOption('toc_engine_v2', '1');
            // $settings = get_option(Application::SETTINGS_V2_SLUG);
            // $settings['toc_engine_v2'] = '1';
            // update_option(Application::SETTINGS_V2_SLUG, $settings);
        }
    }
}

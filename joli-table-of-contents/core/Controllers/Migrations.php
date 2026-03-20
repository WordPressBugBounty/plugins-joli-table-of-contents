<?php

/**
 * @package jolitoc
 */

namespace WPJoli\JoliTOC\Controllers;

use WPJoli\JoliTOC\Application;

class Migrations
{
    public function runMigrations()
    {
        $current_version = Application::VERSION;
        $stored_version  = get_option('joli_toc_version', '0');

        // Early exit if already migrated
        if ($stored_version === $current_version) {
            return;
        }

        // Shared context
        $is_show_onboarding = (bool) get_option('joli_toc_show_onboarding');
        $v3_info            = get_option('joli_toc_v3_info'); // -1 = fresh install (v3 upgrade notive is not shown)
        $options_v2         = get_option(Application::SETTINGS_V2_SLUG);

        $is_fresh_install   = $v3_info === '-1';
        $is_existing_install = $options_v2 !== false;

        // Fresh install → just set version and bail
        if ($stored_version === '0' && $is_fresh_install) {
            update_option('joli_toc_version', $current_version);
            return;
        }

        // V3 migration
        if (version_compare($stored_version, '3.0.0', '<')) {
            $this->migrateToV3([
                'stored_version'     => $stored_version,
                'is_fresh_install'   => $is_fresh_install,
                'is_existing_install' => $is_existing_install,
                'is_show_onboarding' => $is_show_onboarding,
            ]);
        }

        // Mark as migrated
        update_option('joli_toc_version', $current_version);
    }

    private function migrateToV3(array $context)
    {
        $stored_version      = $context['stored_version'];
        $is_fresh_install    = $context['is_fresh_install'];
        $is_existing_install = $context['is_existing_install'];
        $is_show_onboarding  = $context['is_show_onboarding'];

        // Do NOT trigger onboarding for existing users
        if (!$is_show_onboarding && $is_existing_install) {
            update_option('joli_toc_show_onboarding', 0);
        }

        // Coming from v2 (no version stored yet)
        if (!$is_fresh_install && $stored_version === '0' && $is_existing_install) {
            $this->setOptionToDB('numeration_legacy', '1');
        }
    }

    public function setOptionToDB($option_id, $value)
    {
        $options = get_option(Application::SETTINGS_V2_SLUG);

        if (!is_array($options)) {
            $options = [];
        }

        $options[$option_id] = $value;

        return update_option(Application::SETTINGS_V2_SLUG, $options);
    }
}

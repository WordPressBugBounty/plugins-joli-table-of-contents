<?php

/**
 * @package jolitoc
 */

namespace WPJoli\JoliTOC\Controllers;

use WPJoli\JoliTOC\Application;

class AdminActions
{

    public function runUpgraderTasks($upgrader, $hook_extra)
    {
        if (
            isset($hook_extra['action'], $hook_extra['type'])
            && $hook_extra['action'] === 'update'
            && $hook_extra['type'] === 'plugin'
            && !empty($hook_extra['plugins'])
            && in_array(WPJOLI_JOLI_TOC_BASENAME, $hook_extra['plugins'], true)
        ) {
            $this->clearCssCache();
        }
    }

    public function clearCssCache()
    {
        // plugin has just been updated
        // error_log('joli toc updated here');
        // Clear CSS cache
        if (!is_dir(JOLI_TOC_UPLOADS_PATH)) {
            return;
        }

        $files = glob(JOLI_TOC_UPLOADS_PATH . '*.css');

        if (!$files) {
            return;
        }

        foreach ($files as $file) {
            // $filename = "joli-table-of-contents-{$hash}_" . Application::VERSION . ".css";

            // check for the substring "Application::VERSION . '.css'"
            // if (strpos($file, Application::VERSION . '.css') !== false) {
            //     // if the substring corresponds to the current version, do not delete
            //     continue;
            // }

            // Only delete .css files
            if (substr_compare($file, '.css', -strlen('.css')) !== 0) {
                continue;
            }
            
            unlink($file);
        }
    }
}

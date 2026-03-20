<?php

/**
 * Plugin settings
 *
 * @package joli-table-of-contents
 * 
 * @var WPJoli\JoliTOC\Controllers\Callbacks\SettingsCallbacks $controller
 */
defined('ABSPATH') || exit; ?>
<div class="jli-stepper-panel --current" data-step-id="0">
    <div class="jli-stepper-panel-inner">
        <img src="<?php echo JTOC()->url('/assets/icon-512x512.png') ?>" alt="" class="jli-onboarding-logo" style="
    width: 160px;
    border-radius: 8px;
" />
        <h2><?php echo esc_html($data['title']) ?></h2>
        <p><?php echo esc_html(__('This is a step-by-step guide to help you get started with Joli Table of Contents.', 'joli-table-of-contents')); ?></p>
        <p class="jli-text-accent"><?php printf(esc_html__('Open the %sLive Preview%s on the right side of the screen to see the changes as they will look on the frontend.', 'joli-table-of-contents'), '<strong>', '</strong>'); ?></p>
        <p><?php echo esc_html(__('Click next to get started.', 'joli-table-of-contents')); ?></p>
    </div>
</div>
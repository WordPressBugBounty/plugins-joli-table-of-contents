<?php

/**
 * Plugin settings
 *
 * @package joli-table-of-contents
 * 
 * @var WPJoli\JoliTOC\Controllers\Callbacks\SettingsCallbacks $controller
 */
defined('ABSPATH') || exit; ?>
<div class="jli-stepper-panel" data-step-id="3">
    <div class="jli-stepper-panel-inner">
        <h2><?php echo esc_html($data['title']) ?></h2>
        <p>
            Adjust the table of contents colors to match your theme<br>
            Select colors from your site palette or adjust them manually.
        </p>

        <hr style="width: 280px;" />

        <div style=" display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; max-width: 400px;">
            <div>
                <p class="jli-text-base jli-font-semibold">Background:</p>
            </div>
            <?php $controller->displayInput($data['fields']['color_background']['args'], $data['fields']['color_background']['data']); ?>
            <div>
                <p class="jli-text-base jli-font-semibold">Text:</p>
            </div>
            <?php $controller->displayInput($data['fields']['color_text']['args'], $data['fields']['color_text']['data']); ?>
            <div>
                <p class="jli-text-base jli-font-semibold">Accent:</p>
            </div>
            <?php $controller->displayInput($data['fields']['color_accent']['args'], $data['fields']['color_accent']['data']); ?>
        </div>

        <p>You can change these colors later in the settings under <span class="jli-text-accent">Theme & Colors > Base colors</span>.</p>
    </div>
</div>
<?php

/**
 * Plugin settings
 *
 * @package joli-table-of-contents
 * 
 * @var WPJoli\JoliTOC\Controllers\Callbacks\SettingsCallbacks $controller
 */
defined('ABSPATH') || exit; ?>
<div class="jli-stepper-panel" data-step-id="4">
    <div class="jli-stepper-panel-inner">
        <h2><?php echo esc_html($data['title']) ?></h2>
        <p>
            Pick an <span class="jli-text-warning">optional icon</span> for your table of contents & adjust the title to your preference.
        </p>

        <hr style="width: 280px;" />

        <div class="jtoc-placeholder-toc">
            <div class="jtoc-placeholder-toc-header">
                <!-- icon -->
                <div>
                    <?php $controller->displayInput($data['fields']['toc_icon']['args'], $data['fields']['toc_icon']['data']); ?>
                </div>

                <!-- title -->
                <div>
                    <div class="joli-control" style="margin-bottom:1em;">
                        <label for="">TOC Title</label>
                        <div>
                            <?php $controller->displayInput($data['fields']['toc_title']['args'], $data['fields']['toc_title']['data']); ?>
                        </div>
                    </div>
                </div>

                <!-- toggle -->
                <div>
                </div>
            </div>
            <div class="jtoc-placeholder-toc-body" style="gap:8px;">
                <div class="jtoc-placeholder-toc-item" style="width: 80%; opacity: 1;"></div><!-- random width as to illustrate headings -->
                <div class="jtoc-placeholder-toc-item" style="width: 62%; opacity: 0.9;"></div><!-- random width as to illustrate headings -->
                <div class="jtoc-placeholder-toc-item" style="width: 55%; opacity: 0.8;"></div><!-- random width as to illustrate headings -->
                <div class="jtoc-placeholder-toc-item" style="width: 76%; opacity: 0.7;"></div><!-- random width as to illustrate headings -->
                <div class="jtoc-placeholder-toc-item" style="width: 34%; opacity: 0.6;"></div><!-- random width as to illustrate headings -->
                <div class="jtoc-placeholder-toc-item" style="width: 81%; opacity: 0.5;"></div><!-- random width as to illustrate headings -->
                <div class="jtoc-placeholder-toc-item" style="width: 48%; opacity: 0.4;"></div><!-- random width as to illustrate headings -->
            </div>
        </div>
    </div>

    <!-- <p>You can change these colors later in the settings under <span class="jli-text-accent">Theme > Color palette</span>.</p> -->
</div>
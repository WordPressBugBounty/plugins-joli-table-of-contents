<?php

/**
 * Plugin settings
 *
 * @package joli-table-of-contents
 * 
 * @var WPJoli\JoliTOC\Controllers\Callbacks\SettingsCallbacks $controller
 */
defined('ABSPATH') || exit; ?>
<div class="jli-stepper-panel step-5" data-step-id="5">
    <div class="jli-stepper-panel-inner">
        <h2><?php echo esc_html($data['title']) ?></h2>
        <p>
            Adjust the table of contents text size and spacing. The size M corresponds to your article font size.
        </p>

        <hr style="width: 280px;" />

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem 2rem; max-width: 400px; margin-bottom: 24px;align-items: baseline;">
            <!-- Text size -->
            <div>
                <p><span class="jli-text-base jli-font-semibold">Text size:</span></p>
            </div>
            <?php $controller->displayInput($data['fields']['text_size']['args'], $data['fields']['text_size']['data']); ?>

            <!-- Text spacing -->
            <div>
                <p><span class="jli-text-base jli-font-semibold">Text spacing:</span></p>
            </div>
            <?php $controller->displayInput($data['fields']['text_spacing']['args'], $data['fields']['text_spacing']['data']); ?>
        </div>

        <section class="lorem-ipsum-post" style="max-width: 500px;padding-inline: 30px;">
            <div id="jtoc-toc-step-5" class="jtoc-placeholder-toc jtoc-placeholder-toc-text" style="--text-size: 1rem; --text-spacing: 0.5rem;">
                <div class="jtoc-placeholder-toc-header" style="margin: -16px -16px 16px -16px;min-height: 54px;background: #00000008;justify-content: center;">
                    <h2 class="jtoc-placeholder-toc-title" style="margin: 0;text-align: center;background: #c7c7c7;color: #c7c7c7;height: 22px;border-radius: 4px;letter-spacing: 2px;">Table of Contents</h2>
                </div>
                <div class="jtoc-placeholder-toc-body">
                    <ol class="jtoc-placeholder-toc-list" style="gap: var(--text-spacing);list-style-type: decimal;padding: 0;margin: 0 0 0 1em;display: flex;flex-direction: column;">
                        <li class="jtoc-placeholder-toc-item" style="font-size: var(--text-size); opacity: 1;">Lorem ipsum dolor sit amet voluptate</li>
                        <li class="jtoc-placeholder-toc-item" style="font-size: var(--text-size); opacity: 1;">Consectetur adipisicing elit</li>
                        <li class="jtoc-placeholder-toc-item" style="font-size: var(--text-size); opacity: 1;">Tenetur, explicabo aperiam</li>
                        <li class="jtoc-placeholder-toc-item" style="font-size: var(--text-size); opacity: 1;">Dolores impedit ad nostrum doloremque</li>
                        <li class="jtoc-placeholder-toc-item" style="font-size: var(--text-size); opacity: 1;">Quibusdam quasi </li>
                        <li class="jtoc-placeholder-toc-item" style="font-size: var(--text-size); opacity: 1;">Lusto natus voluptatibus laboriosam quia</li>
                    </ol>
                    <!-- <div class="jtoc-placeholder-toc-item" style="font-size: var(--text-size); opacity: 0.4;">At nam modi perspiciatis id ipsa </div>random width as to illustrate headings -->
                </div>
            </div>
            <p style="font-size: 1em;">This text below the table of contents represents your article content.</p>
            <p style="font-size: 1em;">Adjust the sliders to change the text size and spacing and see how it looks relative to this text size.</p>
            <!-- <p style="font-size: 1em;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.</p> -->
        </section>

        <!-- <p>You can change these colors later in the settings under <span class="jli-text-accent">Theme > Color palette</span>.</p> -->
    </div>
</div>
<?php

/**
 * Plugin settings
 *
 * @package joli-table-of-contents
 * 
 * @var WPJoli\JoliTOC\Controllers\Callbacks\SettingsCallbacks $controller
 */
defined('ABSPATH') || exit; ?>
<div class="jli-stepper-panel step-6" data-step-id="6">
    <div class="jli-stepper-panel-inner">
        <h2><?php echo esc_html($data['title']) ?></h2>
        <p>
            <?php esc_html_e('Adjust the table of contents depth and numbering.', 'joli-table-of-contents'); ?>
        </p>

        <hr style="width: 280px;" />

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem 2rem; max-width: 400px; margin-bottom: 24px;align-items: baseline;">
            <!-- Headings depth -->
            <div>
                <p><span class="jli-text-base jli-font-semibold"><?php esc_html_e('Headings depth', 'joli-table-of-contents') ?>:</span></p>
            </div>
            <?php $controller->displayInput($data['fields']['depth']['args'], $data['fields']['depth']['data']); ?>

            <!-- Headings numbering -->
            <div>
                <p><span class="jli-text-base jli-font-semibold"><?php esc_html_e('Numbering', 'joli-table-of-contents') ?>:</span></p>
            </div>
            <?php $controller->displayInput($data['fields']['numeration']['args'], $data['fields']['numeration']['data']); ?>
        </div>

        <section class="lorem-ipsum-post" style="max-width: 500px;padding-inline: 30px;">
            <div id="jtoc-toc-step-6" class="jtoc-placeholder-toc jtoc-placeholder-toc-text" style="height: auto;--text-size: 1rem; --text-spacing: 0.5rem;">
                <div class="jtoc-placeholder-toc-header" style="margin: -16px -16px 16px -16px;min-height: 54px;background: #00000008;justify-content: center;">
                    <h2 class="jtoc-placeholder-toc-title" style="margin: 0;text-align: center;background: #c7c7c7;color: #c7c7c7;height: 22px;border-radius: 4px;letter-spacing: 2px;">Table of Contents</h2>
                </div>
                <div class="jtoc-placeholder-toc-body" style="padding-left: 0;">
                    <ol class="jtoc-placeholder-toc-list" style="gap: var(--text-spacing);padding: 0;margin: 0 0 0 1em;display: flex;flex-direction: column;list-style-type: none;">
                        <li class="jtoc-placeholder-toc-item" style="--depth: 2; font-size: var(--text-size); margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="2" data-depth-4="2" data-depth-5="2" data-depth-6="2"><span class="num num-2">1</span><span class="num num-3">1</span><span class="num num-4">1</span><span class="num num-5">1</span><span class="num num-6">1</span>Lorem ipsum dolor sit amet voluptate</li>
                        <li class="jtoc-placeholder-toc-item" style="--depth: 2; font-size: var(--text-size); margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="2" data-depth-4="3" data-depth-5="3" data-depth-6="3"><span class="num num-2">2</span><span class="num num-3">2</span><span class="num num-4">1.1</span><span class="num num-5">1.1</span><span class="num num-6">1.1</span>Consectetur adipisicing elit</li>
                        <li class="jtoc-placeholder-toc-item" style="--depth: 2; font-size: var(--text-size); margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="3" data-depth-4="4" data-depth-5="2" data-depth-6="4"><span class="num num-2">3</span><span class="num num-3">2.1</span><span class="num num-4">1.1.1</span><span class="num num-5">2</span><span class="num num-6">1.1.1</span>Tenetur, explicabo aperiam</li>
                        <li class="jtoc-placeholder-toc-item" style="--depth: 2; font-size: var(--text-size); margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="3" data-depth-4="4" data-depth-5="3" data-depth-6="5"><span class="num num-2">4</span><span class="num num-3">2.2</span><span class="num num-4">1.1.2</span><span class="num num-5">2.1</span><span class="num num-6">1.1.1.1</span>Dolores impedit ad nostrum doloremque</li>
                        <li class="jtoc-placeholder-toc-item" style="--depth: 2; font-size: var(--text-size); margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="2" data-depth-4="2" data-depth-5="4" data-depth-6="6"><span class="num num-2">5</span><span class="num num-3">3</span><span class="num num-4">2</span><span class="num num-5">2.1.1</span><span class="num num-6">1.1.1.1.1</span>Quibusdam quasi </li>
                        <li class="jtoc-placeholder-toc-item" style="--depth: 2; font-size: var(--text-size); margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="3" data-depth-4="3" data-depth-5="5" data-depth-6="6"><span class="num num-2">6</span><span class="num num-3">3.1</span><span class="num num-4">2.1</span><span class="num num-5">2.1.1.1</span><span class="num num-6">1.1.1.1.2</span>Lusto natus voluptatibus laboriosam quia</li>
                        <li class="jtoc-placeholder-toc-item" style="--depth: 2; font-size: var(--text-size); margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="3" data-depth-4="2" data-depth-5="4" data-depth-6="3"><span class="num num-2">7</span><span class="num num-3">3.2</span><span class="num num-4">3</span><span class="num num-5">2.1.2</span><span class="num num-6">1.2</span>At nam modi perspiciatis id ipsa </li>
                        <li class="jtoc-placeholder-toc-item" style="--depth: 2; font-size: var(--text-size); margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="3" data-depth-4="3" data-depth-5="5" data-depth-6="4"><span class="num num-2">8</span><span class="num num-3">3.3</span><span class="num num-4">3.1</span><span class="num num-5">2.1.2.1</span><span class="num num-6">1.2.1</span>Quibusdam quasi </li>
                        <li class="jtoc-placeholder-toc-item" style="--depth: 2; font-size: var(--text-size); margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="2" data-depth-4="4" data-depth-5="2" data-depth-6="5"><span class="num num-2">9</span><span class="num num-3">4</span><span class="num num-4">3.1.1</span><span class="num num-5">3</span><span class="num num-6">1.2.1.1</span>Lusto natus voluptatibus laboriosam quia</li>
                        <li class="jtoc-placeholder-toc-item" style="--depth: 2; font-size: var(--text-size); margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="3" data-depth-4="4" data-depth-5="3" data-depth-6="6"><span class="num num-2">10</span><span class="num num-3">4.1</span><span class="num num-4">3.1.2</span><span class="num num-5">3.1</span><span class="num num-6">1.2.1.1.1</span>At nam modi perspiciatis id ipsa </li>
                    </ol>
                </div>

                <!-- </div>
        <p style="font-size: 1em;">This text below the table of contents represents your article content.</p>
        <p style="font-size: 1em;">Adjust the sliders to change the text size and spacing and see how it looks relative to this text size.</p> -->
        </section>
        <p>More numbering options are available in the settings.</p>

    </div>
</div>
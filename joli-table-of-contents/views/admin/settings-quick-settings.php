<?php

/**
 * Plugin settings
 *
 * @package joli-table-of-contents
 * 
 * @var string  $app_id
 */

defined('ABSPATH') or die('Wrong path bro!'); ?>
<div id="quick-settings" class="joli-settings-tab-pane" style="max-width: 960px;">
    <h2><?php esc_html_e('Quick settings', 'joli-table-of-contents') ?></h2>

    <div>
        <div>
            <p class="description">
                <?php esc_html_e('Use the quick settings to adjust the most common table of contents options.', 'joli-table-of-contents') ?>
                <?php esc_html_e('For more advanced customization, use the regular settings by browsing the categories on the left.', 'joli-table-of-contents') ?>
            </p>
            <p class="description jli-text-accent">
                <?php esc_html_e('Open the Live Preview on the right to see how the table of contents will appear on your site.', 'joli-table-of-contents') ?>
            </p>
        </div>
        <!-- Quick settings controls -->
        <div class="jli-flex jli-flex-col jli-gap-2" style=" background: #f3f4f6; margin-block: 1rem; padding: 0.5rem 1.5rem; border-radius: 12px;background: linear-gradient(0deg, #f3f4f6, #f3f4f617);">
            <h3><?php esc_html_e('Table of contents', 'joli-table-of-contents') ?></h3>
            <div class=" jli-flex jli-items-center jli-justify-center jli-gap-2">
                <!-- Title size -->
                <div class="jli-flex-1 jli-flex jli-items-baseline jli-gap-4">
                    <span class="jli-text-sm" style="flex-basis: 33%;"><?php esc_html_e('Title size', 'joli-table-of-contents') ?>:</span>
                    <?php $controller->displayInput($data['fields']['title_size']['args'], $data['fields']['title_size']['data']); ?>
                </div>
                <!-- Toggle type -->
                <div class="jli-flex-1 jli-flex jli-items-baseline jli-gap-4">
                    <span class="jli-text-sm" style="flex-basis: 33%;"><?php esc_html_e('Toggle button', 'joli-table-of-contents') ?>:</span>
                    <?php $controller->displayInput($data['fields']['toc_toggle']['args'], $data['fields']['toc_toggle']['data']); ?>

                </div>
            </div>

            <div class="jli-flex jli-items-center jli-gap-2">
                <!-- Rounded corners -->
                <div class="jli-flex-1 jli-flex jli-items-baseline jli-gap-4">
                    <span class="jli-text-sm" style="flex-basis: 33%;"><?php esc_html_e('Rounded corners', 'joli-table-of-contents') ?>:</span>
                    <?php $controller->displayInput($data['fields']['rounded_corners']['args'], $data['fields']['rounded_corners']['data']); ?>
                </div>
                <!-- Border -->
                <div class="jli-flex-1 jli-flex jli-items-baseline jli-gap-4">
                    <span class="jli-text-sm" style="flex-basis: 33%;"><?php esc_html_e('Border', 'joli-table-of-contents') ?>:</span>
                    <?php $controller->displayInput($data['fields']['border']['args'], $data['fields']['border']['data']); ?>
                </div>
            </div>

            <h3><?php esc_html_e('Headings', 'joli-table-of-contents') ?></h3>
            <div class=" jli-flex jli-items-center jli-justify-center jli-gap-2">
                <!-- Headings size -->
                <div class="jli-flex-1 jli-flex jli-items-baseline jli-gap-4">
                    <span class="jli-text-sm" style="flex-basis: 33%;"><?php esc_html_e('Headings size', 'joli-table-of-contents') ?>:</span>
                    <?php $controller->displayInput($data['fields']['text_size']['args'], $data['fields']['text_size']['data']); ?>
                </div>
                <!-- Heading spacing -->
                <div class="jli-flex-1 jli-flex jli-items-baseline jli-gap-4">
                    <span class="jli-text-sm" style="flex-basis: 33%;"><?php esc_html_e('Headings spacing', 'joli-table-of-contents') ?>:</span>
                    <?php $controller->displayInput($data['fields']['text_spacing']['args'], $data['fields']['text_spacing']['data']); ?>
                </div>
            </div>

            <div class="jli-flex jli-items-center jli-gap-2">
                <!-- Headings depth -->
                <div class="jli-flex-1 jli-flex jli-items-baseline jli-gap-4">
                    <span class="jli-text-sm" style="flex-basis: 33%;"><?php esc_html_e('Headings depth', 'joli-table-of-contents') ?>:</span>
                    <?php $controller->displayInput($data['fields']['depth']['args'], $data['fields']['depth']['data']); ?>
                </div>
                <!-- Numbering -->
                <div class="jli-flex-1 jli-flex jli-items-baseline jli-gap-4">
                    <span class="jli-text-sm" style="flex-basis: 33%;"><?php esc_html_e('Numbering', 'joli-table-of-contents') ?>:</span>
                    <?php $controller->displayInput($data['fields']['numeration']['args'], $data['fields']['numeration']['data']); ?>
                </div>
            </div>


            <!-- Title size -->
            <!-- Rounded corners -->
            <!-- Border -->
            <!-- RTL -->
        </div>

        <!-- Article placeholder -->
        <div class="jli-article-placeholder">
            <div class="jli-flex jli-flex-col jli-justify-center jli-items-center" style="opacity: 0.25;">
                <!-- <h2 class="jli-txt-ph" style="margin-top: 0px; margin-bottom: 8px;">The best title of the lorem ilsum article</h2> -->
                <!-- Fake author and publihed on -->
                <div style="width: 380px; background-color: #aaa; height: 20px; margin-bottom: 6px; border-radius: 4px;"></div>
                <div style="width: 200px; background-color: #ffd0d0; height: 16px; margin-bottom: 16px; border-radius: 4px;"></div>
            </div>
            <div class="jli-flex jli-items-center jli-gap-2" style=" margin-top: -1.75rem; width: 100%;">
                <div class="jli-flex-1 jli-flex jli-flex-col jli-items-center jli-justify-center jli-gap-4">
                    <!-- Headings depth -->
                    <!-- <span class="jli-text-sm"><?php esc_html_e('TOC alignment', 'joli-table-of-contents') ?>:</span> -->
                    <?php $controller->displayInput($data['fields']['toc_alignment']['args'], $data['fields']['toc_alignment']['data']); ?>
                </div>
            </div>

            <!-- TOC Wrapper -->
            <div id="jli-ap-toc-wrapper" class="jli-ap-toc-wrapper jli-flex jli-flex-col jli-items-center" style="--toc-alignment: flex-start; align-items: var(--toc-alignment);">

                <div id="jtoc-placeholder-toc" class="jtoc-placeholder-toc jtoc-placeholder-toc-text jtoc-qs-toc"
                    style="height: auto;
            --title-size: 1em;
            --text-size: 0.875em;
            --text-spacing: 0.5em;
            --rounded-corners: 0px;
            --border: none;
            border-radius: var(--rounded-corners);
            border: var(--border);
            ">
                    <div class="jtoc-placeholder-toc-header">
                        <!-- icon -->
                        <div>
                            <?php $controller->displayInput($data['fields']['toc_icon']['args'], $data['fields']['toc_icon']['data']); ?>
                        </div>

                        <!-- title -->
                        <div style="flex-grow: 1;">
                            <div class="joli-control" style="margin-bottom:1em;">
                                <label for="">TOC Title</label>
                                <div>
                                    <?php $controller->displayInput($data['fields']['toc_title']['args'], $data['fields']['toc_title']['data']); ?>
                                </div>
                            </div>
                        </div>

                        <!-- toggle -->
                        <!-- <div>
                        <?php $controller->displayInput($data['fields']['toc_toggle']['args'], $data['fields']['toc_toggle']['data']); ?>
                    </div> -->

                        <div class="joli-control" style="margin-bottom:1em;">
                            <label for=""><?php esc_html_e('Toggle', 'joli-table-of-contents') ?></label>
                            <div>
                                <div class="joli-html-label">
                                    <div class="wpj-jtoc --jtoc-toggle-1" style="margin: 0;">
                                        <div id="jtoc-placeholder--toggle" class="wpj-jtoc--toggle-box">
                                            <div class="wpj-jtoc--toggle"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jtoc-placeholder-toc-body" style="padding-left: 0;">
                        <ol class="jtoc-placeholder-toc-list" style="gap: var(--text-spacing); font-size: var(--text-size);padding: 0;margin: 0 0 0 1em;display: flex;flex-direction: column;list-style-type: none;">
                            <li class="jtoc-placeholder-toc-item depth-3" style="--depth: 2; margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="2" data-depth-4="2" data-depth-5="2" data-depth-6="2"><span class="num num-2">1</span><span class="num num-3">1</span><span class="num num-4">1</span><span class="num num-5">1</span><span class="num num-6">1</span>Lorem ipsum dolor sit amet voluptate</li>
                            <li class="jtoc-placeholder-toc-item depth-3" style="--depth: 2; margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="2" data-depth-4="3" data-depth-5="3" data-depth-6="3"><span class="num num-2">2</span><span class="num num-3">2</span><span class="num num-4">1.1</span><span class="num num-5">1.1</span><span class="num num-6">1.1</span>Consectetur adipisicing elit</li>
                            <li class="jtoc-placeholder-toc-item depth-3" style="--depth: 2; margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="3" data-depth-4="4" data-depth-5="2" data-depth-6="4"><span class="num num-2">3</span><span class="num num-3">2.1</span><span class="num num-4">1.1.1</span><span class="num num-5">2</span><span class="num num-6">1.1.1</span>Tenetur, explicabo aperiam</li>
                            <li class="jtoc-placeholder-toc-item depth-3" style="--depth: 2; margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="3" data-depth-4="4" data-depth-5="3" data-depth-6="5"><span class="num num-2">4</span><span class="num num-3">2.2</span><span class="num num-4">1.1.2</span><span class="num num-5">2.1</span><span class="num num-6">1.1.1.1</span>Dolores impedit ad nostrum doloremque</li>
                            <li class="jtoc-placeholder-toc-item depth-3" style="--depth: 2; margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="2" data-depth-4="2" data-depth-5="4" data-depth-6="6"><span class="num num-2">5</span><span class="num num-3">3</span><span class="num num-4">2</span><span class="num num-5">2.1.1</span><span class="num num-6">1.1.1.1.1</span>Quibusdam quasi </li>
                            <li class="jtoc-placeholder-toc-item depth-3" style="--depth: 2; margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="3" data-depth-4="3" data-depth-5="5" data-depth-6="6"><span class="num num-2">6</span><span class="num num-3">3.1</span><span class="num num-4">2.1</span><span class="num num-5">2.1.1.1</span><span class="num num-6">1.1.1.1.2</span>Lusto natus voluptatibus laboriosam quia</li>
                            <li class="jtoc-placeholder-toc-item depth-3" style="--depth: 2; margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="3" data-depth-4="2" data-depth-5="4" data-depth-6="3"><span class="num num-2">7</span><span class="num num-3">3.2</span><span class="num num-4">3</span><span class="num num-5">2.1.2</span><span class="num num-6">1.2</span>At nam modi perspiciatis id ipsa </li>
                            <li class="jtoc-placeholder-toc-item depth-3" style="--depth: 2; margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="3" data-depth-4="3" data-depth-5="5" data-depth-6="4"><span class="num num-2">8</span><span class="num num-3">3.3</span><span class="num num-4">3.1</span><span class="num num-5">2.1.2.1</span><span class="num num-6">1.2.1</span>Quibusdam quasi </li>
                            <li class="jtoc-placeholder-toc-item depth-3" style="--depth: 2; margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="2" data-depth-4="4" data-depth-5="2" data-depth-6="5"><span class="num num-2">9</span><span class="num num-3">4</span><span class="num num-4">3.1.1</span><span class="num num-5">3</span><span class="num num-6">1.2.1.1</span>Lusto natus voluptatibus laboriosam quia</li>
                            <li class="jtoc-placeholder-toc-item depth-3" style="--depth: 2; margin-left: calc((var(--depth) - 2) * 16px)" data-depth-2="2" data-depth-3="3" data-depth-4="4" data-depth-5="3" data-depth-6="6"><span class="num num-2">1</span><span class="num num-3">4.1</span><span class="num num-4">3.1.2</span><span class="num num-5">3.1</span><span class="num num-6">1.2.1.1.1</span>At nam modi perspiciatis id ipsa </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /TOC Wrapper -->

            <!-- Lipsum Content -->
            <div class="jli-ap-content">
                <p style="font-size: 1em;">Ac dignissim metus tincidunt ultricies nullam commodo vivamus. Accumsan egestas nulla sodales enim cras, lobortis mollis, dictum leo vitae nam, mattis primis. Massa non, dolor montes molestie, quam, tincidunt ridiculus posuere sodales lectus tincidunt rhoncus duis laoreet.</p>
                <p style="font-size: 1em;">Quisque nascetur, erat massa dis orci metus cum elit ipsum mauris. Ut lectus ut pulvinar sociis arcu dis. Sagittis venenatis taciti massa mus eget aliquam amet id habitant consequat vulputate sapien. Orci iaculis sapien at urna gravida orci vel blandit. Duis tincidunt condimentum nec, torquent, ante porta urna potenti parturient mus inceptos. Mauris enim pretium taciti parturient nisl magnis vulputate vehicula quam, convallis. Morbi duis, augue pede netus arcu habitant augue nascetur neque morbi.</p>

            </div>
            <!-- /Lipsum Content -->

        </div>
        <!-- /Article placeholder -->

    </div>
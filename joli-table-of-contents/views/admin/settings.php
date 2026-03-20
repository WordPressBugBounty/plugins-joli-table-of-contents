<?php

/**
 * Plugin settings
 *
 * @package joli-table-of-contents
 * 
 * @var string  $app_id
 * @var string  $option_group
 * @var array   $tabs
 * @var string  $logo_url
 * @var string  $version
 * @var string  $pro_url
 * @var string  $pro_url_v
 * @var array   $pro_features
 * @var array   $plugins
 * @var string  $joli_toc_review_url
 * @var string  $joli_toc_doc_url
 * @var string  $joli_toc_doc_post_type_settings_url
 * @var array   $post_types
 * @var string  $admin_url
 * @var string  $jtoc_settings_url
 * @var string  $active_post_type
 * @var array   $activated_post_type
 * @var array   $js_vars
 * @var array   $posts
 * @var array   $onboarding
 */

use WPJoli\JoliTOC\Controllers\Callbacks\SettingsCallbacks;

defined('ABSPATH') or die('Wrong path bro!'); ?>


<!-- <h1></h1> -->
<?php settings_errors(); ?>
<?php $controller = JTOC()->requestService(SettingsCallbacks::class); ?>

<div id="jli-<?php echo esc_attr($app_id) ?>" class="jli-wrap jli-content-element jli-<?php echo esc_attr($app_id) ?>">
    <?php if ($js_vars) : ?>
        <script>
            <?php foreach ($js_vars as $var => $data) : ?>
                var <?php echo esc_html($var) ?> = <?php echo json_encode($data) ?>;
            <?php endforeach; ?>
        </script>
    <?php endif; ?>
    <?php if ($active_post_type) : ?>
        <script>
            var jtoc_active_post_type = "<?php echo esc_html($active_post_type) ?>";
        </script>
    <?php endif; ?>
    <?php if (jtoc_isset_or_null($block_json)) {
        // var_dump($block_json);
    } ?>
    <?php if (jtoc_isset_or_null($block_template)) {
        // pre(esc_html(($block_template)));
    } ?>


    <!-- Presets modal -->
    <section class="joli-content">
        <div id="joli-import-preset-wrap" class="joli-modal-overlay" style="display: none;">
            <div class="joli-modal">
                <div class="joli-modal-header">
                    <!-- Modal title -->
                    <div class="joli-modal-title"><?php esc_html_e('Import preset', 'joli-table-of-contents') ?></div>
                    <div class="joli-modal-close"> <span class="dashicons dashicons-no-alt" style="padding: 15px; margin: -15px;"></span></div>
                </div>
                <div class="joli-modal-body">
                    <!-- <div>
                        <h3><?php esc_html_e('Export', 'joli-table-of-contents') ?></h3>
                        <p>
                            <button id="joli-export-settings" class="jli-button jli-button-sm"><?php esc_html_e('Download', 'joli-table-of-contents') ?></button>
                        </p>
                    </div> -->
                    <div>
                        <h3><?php esc_html_e('Import', 'joli-table-of-contents') ?></h3>
                        <p>
                            <input type="file" name="joli-import-preset-file" id="joli-import-preset-file" accept=".json">
                            <button id="joli-import-preset" class="jli-button jli-button-sm"><?php esc_html_e('Upload', 'joli-table-of-contents') ?></button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Presets modal -->

    <section class="joli-content">
        <div id="joli-export-import-wrap" class="joli-modal-overlay" style="display: none;">
            <div class="joli-modal">
                <div class="joli-modal-header">
                    <!-- Modal title -->
                    <div class="joli-modal-title"><?php esc_html_e('Import / export settings', 'joli-table-of-contents') ?></div>
                    <div class="joli-modal-close"> <span class="dashicons dashicons-no-alt" style="padding: 15px; margin: -15px;"></span></div>
                </div>
                <div class="joli-modal-body">
                    <div>
                        <h3><?php esc_html_e('Export', 'joli-table-of-contents') ?></h3>
                        <p>
                            <button id="joli-export-settings" class="jli-button jli-button-sm"><?php esc_html_e('Download', 'joli-table-of-contents') ?></button>
                        </p>
                    </div>
                    <div>
                        <h3><?php esc_html_e('Import', 'joli-table-of-contents') ?></h3>
                        <p>
                            <input type="file" name="joli-import-settings-file" id="joli-import-settings-file" accept=".json">
                            <button id="joli-import-settings" class="jli-button jli-button-sm"><?php esc_html_e('Upload', 'joli-table-of-contents') ?></button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- </div> -->
    <!-- <div class="jtoc-wrap"> -->
    <?php if ($active_post_type) : ?>
        <div style="padding: 8px 16px;background-color: #fafde0;border: 1px solid #d7c100;border-radius: 6px;margin-bottom: 24px;width: calc(100% - 16px);box-sizing: border-box; color: #333;">You are currently editing the settings for the <strong>"<?php echo esc_html($active_post_type) ?>"</strong> post type. When switched on, the settings will apply only to this post type.</div>
    <?php endif; ?>
    <div class="jli-main">
        <div class="jli-main-content">
            <aside class="joli-nav-menu">
                <div class="joli-nav">
                    <!-- Quick settings tab -->
                    <a id="tab-quick-settings" class="joli-nav-item item-highlight" href="#quick-settings" data-group="quick-settings">
                        <img class="joli-nav-icon" src="<?php echo esc_attr(JTOC()->url('assets/admin/icons/art.svg')) ?>" alt="" width="24" height="24">
                        <div class="joli-nav-title"><?php esc_html_e('Quick settings', 'joli-table-of-contents') ?></div>
                    </a>
                    <!-- /Quick settings tab -->

                    <?php foreach ($tabs as $id => $data) : ?>
                        <?php if ($active_post_type && jtoc_isset_or_null($data['args']['post_type_settings']) === false) {
                            continue;
                        } ?>
                        <?php if ($id === 'theme' || $id === 'floating-table-of-contents'): ?>
                            <hr class="joli-nav-divider">
                        <?php endif; ?>
                        <a id="tab-<?php echo esc_attr($id) ?>" class="joli-nav-item" href="#<?php echo esc_attr($id); ?>" data-group="<?php echo esc_attr($id) ?>">
                            <img class="joli-nav-icon" src="<?php echo esc_attr($data['icon']) ?>" alt="" width="24" height="24">
                            <div class="joli-nav-title">
                                <?php echo esc_html($data['label']) ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
                    <!-- Search results label -->
                    <div id="jli-search-label" class="joli-is-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="jli-input-icon">
                            <path d="m21 21-4.34-4.34"></path>
                            <circle cx="11" cy="11" r="8"></circle>
                        </svg>
                        <?php echo esc_html__('Search results', 'joli-table-of-contents'); ?>
                    </div>
                    <!-- /Search results label -->
                </div>
            </aside>
            <div class="joli-content-wrap">
                <section id="jli-quick-settings" class="joli-content joli-is-hidden">
                    <form id="jli-plugin-quick-settings" method="post" action="<?php echo esc_url(admin_url('options.php')); ?>">
                        <div class="tab-content joli-tab-content">
                            <?php JTOC()->render(
                                ['admin' => 'settings-quick-settings'],
                                [
                                    'controller' => $controller,
                                    'data' => include JTOC()->path('config/quick_settings.php'),
                                    'active_post_type' => $active_post_type
                                ]
                            ); ?>
                        </div>
                    </form>
                </section>

                <section id="jli-settings-panel" class="joli-content">
                    <form id="jli-plugin-settings" method="post" action="<?php echo esc_url(admin_url('options.php')); ?>">
                        <div class="tab-content joli-tab-content">
                            <div id="tab-settings" class="joli-settings-tab-pane">
                                <?php
                                $option_group = JTOC()::SETTINGS_V2_SLUG . ($active_post_type ? '_' . $active_post_type : '');
                                settings_fields($option_group);
                                do_settings_sections($option_group);
                                ?>
                            </div>
                        </div>
                        <!-- <div class="joli-submit">
                        <div class="joli-save-info">
                            <div class="joli-info-text"><?php esc_html_e('Changes unsaved', 'joli-table-of-contents'); ?></div>
                            <?php submit_button(__('Save settings', 'joli-table-of-contents'), 'primary joli-settings-submit', 'submit-float', false); ?>
                        </div>
                    </div> -->
                    </form>
                    <!-- <form action="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>" method="post">
                    <?php wp_nonce_field('jtoc_reset'); ?>
                    <p>
                        <input type="submit" id="jtoc_reset_settings" name="jtoc_reset_settings" class="button button-link button-small" value="<?php esc_html_e("Reset settings", "joli-table-of-contents"); ?>" data-prompt="<?php esc_html_e("Are you sure you want to reset settings ? This will apply only to the current post type settings. All current settings will be lost.", "joli-table-of-contents"); ?>">
                    </p>
                </form> -->
                </section>
                <aside class="joli-sidebar">
                    <div class="joli-sidebar-content">
                        <?php if (jtoc_xy()->is_free_plan()) : ?>
                            <div class="joli-sidebar-item" style="border-color: var(--jtoc-color-pink); border-width: 2px; border-style: solid;">
                                <div class="joli-gopro-notice">
                                    <!-- <?php esc_html_e('Want more cool features such as the', 'joli-table-of-contents'); ?> <strong><a target="_blank" href="<?php echo esc_url_raw($pro_url_v); ?>"><?php esc_html_e('Floating Table Of Contents Widget', 'joli-table-of-contents'); ?></strong></a> ? -->
                                    <h3><span style="font-size: small;">Get more with</span><br>Joli Table of Contents Pro</h3>
                                    <ul>
                                        <?php echo implode("\n", array_map(function ($feature) {
                                            return jtoc_tagify('li', esc_html($feature));
                                        }, $pro_features)) ?>
                                    </ul>
                                    <p>
                                        <a
                                            href="<?php echo esc_url_raw(sprintf('%sadmin.php?page=' . JTOC()::SETTINGS_V2_SLUG .  '-pricing', get_admin_url())); ?>"
                                            class="jli-button jli-button-fuzzy jli-button-md">
                                            <?php wp_kses(include JTOC()->path('assets/public/icons/sparkles.svg'), jtoc_kses_lucide_svg()); ?>
                                            <?php esc_html_e('Get Pro', 'joli-table-of-contents'); ?>
                                        </a>
                                        <!-- <a
                                            class="jli-button jli-button-fuzzy jli-button-md"
                                            href="https://wpjoli.com/joli-table-of-contents"
                                            target="_blank">

                                            <?php esc_html_e('Upgrade to Pro', 'joli-table-of-contents'); ?>
                                        </a> -->
                                    </p>

                                </div>
                            </div>
                        <?php endif; ?>

                        <h2>Our Products</h2>

                        <?php foreach ($plugins as $plugin) : ?>
                            <div class="joli-sidebar-item<?php echo isset($plugin['highlight']) ? ' --highlight' : '' ?>">
                                <a class="joli-sidebar-header"
                                    href="<?php echo esc_url_raw($plugin['url']) ?>"
                                    target="_blank"
                                    style="text-decoration: none;">
                                    <img src="<?php echo esc_url($plugin['thumb']) ?>" alt="" />
                                    <h3<?php echo isset($plugin['name_style']) ? jtoc_attrify([' style' => jtoc_cssify($plugin['name_style'])]) : '' ?>>
                                        <?php echo nl2br(esc_html($plugin['name'])) ?>
                                        <?php if (isset($plugin['highlight'])) : ?>
                                            <span class="--highlight"><?php echo esc_html($plugin['highlight']) ?></span>
                                        <?php endif; ?>
                                        </h3>
                                </a>
                                <div class="joli-sidebar-body">
                                    <p class="joli-plugin-description"><?php echo nl2br(esc_html($plugin['desc'])) ?></p>
                                    <p>
                                        <a href="<?php echo esc_url_raw($plugin['url']) ?>" class="button button-secondary" target="_blank"><?php esc_html_e('Find out more', 'joli-table-of-contents'); ?></a>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <!-- Onboarding (must be before the live preview for css rules) -->
    <section id="jli-onboarding" class="jli-full-fixed">
        <div class="jli-stepper-body">
            <div class="jli-stepper jli-editor">
                <div class="jli-stepper-header">
                    <ul class="jli-stepper-nav" style="flex-grow: 1;">
                        <?php foreach ($onboarding['steps'] as $step) : ?>
                            <?php if ($step['step'] == 0) continue; ?>
                            <li class="jli-stepper-item" data-step-id="<?php echo esc_attr($step['step']) ?>">
                                <span class="jli-stepper-circle"><?php echo esc_html($step['step']) ?></span><span class="jli-stepper-label"><?php echo esc_html($step['name']) ?></span>
                                <?php if (!(isset($step['final']) && $step['final'] == true)) : ?>
                                    <div class="jli-stepper-line"></div>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <button id="jli-onboarding-cancel" class="jli-button jli-button-ghost jli-button-md "><?php esc_html_e('Cancel', 'joli-table-of-contents') ?> ✖</button>
                </div>
                <!-- Stepper title -->
                <!-- <div class="jli-stepper-title">
                    <h2>Get started with Joli Table of Contents</h2>
                </div> -->
                <!-- /Stepper title -->

                <div class="jli-stepper-content">
                    <form id="jli-onboarding-form" method="post">
                        <?php foreach ($onboarding['steps'] as $step) : ?>
                            <?php JTOC()->render(['admin/onboarding' => $step['template'] ?? ''], array_merge($step['data'] ?? [], ['controller' => $controller])) ?>
                        <?php endforeach; ?>
                    </form>

                    <div class="jli-stepper-controls">
                        <button id="jli-onboarding-back" class="jli-step-prev jli-button jli-button-md " disabled="true">← <?php esc_html_e('Back', 'joli-table-of-contents') ?></button>
                        <!-- <span class="jli-stepper-info">You can change the styles and adjust the fields later.</span> -->
                        <button id="jli-onboarding-next" class="jli-step-next jli-button jli-button-md "><?php esc_html_e('Next', 'joli-table-of-contents') ?> →</button>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- /Onboarding -->

    <!-- Live preview -->
    <section id="jtoc-live-preview">
        <div class="jtoc-live-preview-wrap">
            <div id="jli-live-preview-spinner" class="joli-loader joli-loader-dark"></div>
            <header class="jtoc-live-preview-header jli-flex jli-items-center jli-gap-1 jli-justify-between">
                <h3 style="margin-left: 16px;"><?php esc_html_e('Live preview', 'joli-table-of-contents') ?></h3>
                <div id="jtoc-live-preview-close"><span class="dashicons dashicons-no-alt"></span></div>
            </header>
            <div id="live-preview-toggle"><?php esc_html_e('Live preview', 'joli-table-of-contents') ?></div>
            <div class="jtoc-live-preview-inner jli-flex jli-flex-col">
                <!-- Post selection -->
                <div class="jli-box-border jli-w-full jli-px-4">
                    <select id="jtoc-live-preview-select-post" class="jli-w-full jli-my-3">
                        <option value="" disabled>- <?php esc_html_e('Select a post to preview', 'joli-table-of-contents') ?> -</option>
                        <?php $first = true;
                        foreach ($posts as $post) : ?>
                            <option value="<?php echo esc_attr($post->ID) ?>" <?php echo $first ? 'selected' : '' ?>><?php echo esc_html($post->post_title) ?></option>
                        <?php $first = false;
                        endforeach; ?>
                    </select>
                </div>
                <!-- /Post selection -->

                <div class="jli-flex-1" style="min-height: 0;overflow-y: auto;">
                    <iframe
                        src="<?php echo esc_url_raw(get_permalink($posts[0]->ID)); ?>/?joli_toc_preview=1&joli_toc_token=<?php echo esc_attr(wp_generate_uuid4()); ?>"
                        id="jtoc-preview-iframe">
                    </iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- /Live preview -->

    <!--  -->
    <!-- <section id="jli-theme-settings" class="joli-content joli-is-hidden"> -->
    <!-- <section id="jli-theme-settings" class="joli-content">
        <form id="jli-plugin-theme-settings" method="post" action="<?php echo esc_url(admin_url('options.php')); ?>">
            <div class="tab-content joli-tab-content">
                <?php /* JTOC()->render(
                    ['admin' => 'settings-themes'],
                    [
                        'controller' => $controller,
                        'data' => include JTOC()->path('config/theme_settings.php'),
                        'active_post_type' => $active_post_type
                    ]
                ); */ ?>
            </div>
        </form>
    </section> -->

    <div id="jli-saving-overlay" class="jli-overlay jli-flex jli-items-center jli-justify-center joli-is-hidden">
        <div id="jli-save-spinner" class="joli-loader"></div>
        <!-- <div id="jli-save-spinner" class="spinner"></div> -->
    </div>
    <div id="jli-save-alert" class="joli-is-hidden"><?php esc_html_e('Settings saved !', 'joli-table-of-contents') ?></div>
</div>
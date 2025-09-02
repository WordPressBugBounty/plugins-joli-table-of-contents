<div class="wrap wpjoli-wrap">
    <div id="joli-title">
        <span class="h1-title">Joli Table Of Contents</span>
        <?php 
if ( isset( $active_post_type ) && isset( $post_types[$active_post_type] ) ) {
    ?>
            <span class="h1-subtitle"><?php 
    echo esc_html( $post_types[$active_post_type]->label );
    ?> settings</span>
        <?php 
} else {
    ?>
            <span class="h1-subtitle">Global settings</span>
        <?php 
}
?>
    </div>
    <h1></h1>
    <?php 
if ( $js_vars ) {
    ?>
        <script>
            <?php 
    foreach ( $js_vars as $var => $data ) {
        ?>
                var <?php 
        echo esc_html( $var );
        ?> = <?php 
        echo json_encode( $data );
        ?>;
            <?php 
    }
    ?>
        </script>
    <?php 
}
?>
    <?php 
if ( $active_post_type ) {
    ?>
        <script>
            var jtoc_active_post_type = "<?php 
    echo esc_html( $active_post_type );
    ?>";
        </script>
    <?php 
}
?>
    <?php 
if ( jtoc_isset_or_null( $block_json ) ) {
    // var_dump($block_json);
}
?>
    <?php 
if ( jtoc_isset_or_null( $block_template ) ) {
    // pre(esc_html(($block_template)));
}
?>
    <?php 
settings_errors();
?>

    <div class="jtoc-wrap">

        <header class="joli-header-top">
            <div style="margin-top: 16px;display: flex;justify-content: center;align-items: center;">
                <button id="jtoc-import-export" class="button button-secondary button-small"><?php 
esc_html_e( 'Import / export', 'joli-table-of-contents' );
?></button>
                <span class="joli-field-info dashicons dashicons-info-outline"></span>
                <div class="joli-info-bubble" style="z-index:2;text-align:left; min-width: 460px;left: calc(100% + 10px);transform: translateY(-10px);top: 0;">
                    <p><?php 
esc_html_e( 'Export current settings to a file.', 'joli-table-of-contents' );
?></p>
                    <p><?php 
esc_html_e( 'If you have mutlitple post type settings, you need to export them one by one.', 'joli-table-of-contents' );
?></p>
                    <p><?php 
esc_html_e( 'Use the export/import module to duplicate a set of settings between post type settings.', 'joli-table-of-contents' );
?></p>
                </div>
            </div>
        </header>

        <section class="joli-content">
            <div id="joli-export-import-wrap" style="display: none;">
                <div>
                    <h3><?php 
esc_html_e( 'Export', 'joli-table-of-contents' );
?></h3>
                    <p>
                        <button id="jtoc-export-settings" class="button button-secondary"><?php 
esc_html_e( 'Download', 'joli-table-of-contents' );
?></button>
                    </p>
                </div>
                <div>
                    <h3><?php 
esc_html_e( 'Import', 'joli-table-of-contents' );
?></h3>
                    <p>
                        <input type="file" name="jtoc-import-settings-file" id="jtoc-import-settings-file" accept=".json">
                        <button id="jtoc-import-settings" class="button button-secondary"><?php 
esc_html_e( 'Upload', 'joli-table-of-contents' );
?></button>
                    </p>
                </div>
                <div id="joli-export-import-close"><span class="dashicons dashicons-no-alt"></span></div>
            </div>
            <!-- Post type settings -->
            <div class="joli-post-type-tabs">
                <div class="joli-post-type-tab tab-global<?php 
echo ( !$active_post_type ? ' --joli-tab-active' : '' );
?>">
                    <a id="tab-jtoc-global" class="joli-post-type-tab-item" href="<?php 
echo esc_url_raw( $jtoc_settings_url );
?>"><?php 
esc_html_e( "Global settings", "joli-table-of-contents" );
?></a>
                    <span class="joli-field-info dashicons dashicons-info-outline"></span>
                    <div class="joli-info-bubble" style="z-index:2;text-align:left; min-width: 460px;left: calc(100% + 10px);transform: translateY(-10px);top: 0;">
                        <p><?php 
esc_html_e( 'Edit the global settings or create a custom setting set per post type.', 'joli-table-of-contents' );
?></p>
                        <p><?php 
esc_html_e( 'To create specific post type settings, click any post type next to the global settings, edit and save your custom settings.', 'joli-table-of-contents' );
?></p>
                        <p><?php 
esc_html_e( 'Finally, activate the custom post type settings by switching them on with the switch button below each post type.', 'joli-table-of-contents' );
?></p>
                        <p><?php 
esc_html_e( 'Deactivating any custom post type settings will result in using the global settings as a fallback but will not delete the custom settings.', 'joli-table-of-contents' );
?></p>
                    </div>
                </div>
                <div class="joli-post-type-tab-wrap">
                    <?php 
foreach ( $post_types as $pt ) {
    ?>
                        <?php 
    $tab_is_active = $active_post_type == $pt->name;
    ?>
                        <?php 
    $is_activated = in_array( $pt->name, $activated_post_type );
    ?>
                        <?php 
    $pro = jtoc_xy()->can_use_premium_code__premium_only();
    ?>
                        <?php 
    ?>
                        <div class="joli-post-type-tab<?php 
    echo ( $tab_is_active ? ' --joli-tab-active' : '' );
    echo ( !$pro ? ' joli-pro' : '' );
    ?>">
                            <?php 
    ?>
                                <span id="tab-<?php 
    echo esc_attr( $pt->name );
    ?>" class="joli-post-type-tab-item" title="<?php 
    echo esc_attr( $pt->name );
    ?>"><?php 
    echo esc_html( $pt->label );
    ?></span>
                            <?php 
    ?>

                            <label class="joli-switch" for="joli-post-type-activate_<?php 
    echo esc_attr( $pt->name );
    ?>">
                                <input type="checkbox" id="joli-post-type-activate_<?php 
    echo esc_attr( $pt->name );
    ?>" <?php 
    echo ( $is_activated ? ' checked' : '' );
    echo ( !$pro ? ' disabled' : '' );
    ?> name="joli-post-type-activate" data-post-type="<?php 
    echo esc_attr( $pt->name );
    ?>" class="joli-checkbox joli-post-type-check">
                                <span class="slider round" title="<?php 
    esc_html_e( 'Activate settings for this post type', 'joli-table-of-contents' );
    ?>"></span>
                            </label>
                        </div>
                    <?php 
}
?>
                    <?php 
if ( (jtoc_xy()->is_free_plan() || count( jtoc_isset_or_zero( $activated_post_type ) ) === 0) && !$active_post_type ) {
    ?>
                        <div id="joli-post-type-tabs-overlay">
                            <div>
                                <span>Post type settings</span>
                                <span class="joli-field-info dashicons dashicons-info-outline"></span>
                                <div class="joli-info-bubble" style="z-index:2;text-align:left;min-width: 460px;left: 0;transform: translateY(-10px);top: 80px;">
                                    <p><?php 
    esc_html_e( 'To create specific post type settings, click any post type next to the global settings, edit and save your custom settings.', 'joli-table-of-contents' );
    ?></p>
                                    <p><?php 
    esc_html_e( 'Finally, activate the custom post type settings by switching them on with the switch button below each post type.', 'joli-table-of-contents' );
    ?></p>
                                    <p><?php 
    esc_html_e( 'Deactivating any custom post type settings will result in using the global settings as a fallback but will not delete the custom settings.', 'joli-table-of-contents' );
    ?></p>
                                </div>
                            </div>
                            <button id="joli-post-type-settings-unlock" class="button button-secondary button-small<?php 
    echo ( !$pro ? ' joli-pro' : '' );
    ?>" <?php 
    echo ( !$pro ? ' disabled' : '' );
    ?>><?php 
    esc_html_e( 'Unlock', 'joli-table-of-contents' );
    ?></button>
                            <a href="<?php 
    echo esc_url_raw( $joli_toc_doc_post_type_settings_url );
    ?>" id="joli-post-type-settings-what-is-it" target="_blank"><?php 
    esc_html_e( 'What is it ?', 'joli-table-of-contents' );
    ?></a>
                        </div>
                    <?php 
}
?>
                </div>
            </div>
            <!-- /Post type settings -->
        </section>
    </div>
    <div class="jtoc-wrap">

        <header class="joli-header">
            <div class="joli-logo">
                <a href="https://wpjoli.com" title="WPJoli" target="_blank">
                    <img src="<?php 
echo esc_url( $logo_url );
?>" alt="">
                </a>
            </div>
            <div class="joli-nav">
                <?php 
foreach ( $tabs as $id => $data ) {
    ?>
                    <?php 
    if ( $active_post_type && jtoc_isset_or_null( $data['args']['post_type_settings'] ) === false ) {
        continue;
    }
    ?>
                    <a id="tab-<?php 
    echo esc_attr( $id );
    ?>" class="joli-nav-item" href="#<?php 
    echo esc_attr( $id );
    ?>">
                        <div class="joli-nav-title">
                            <?php 
    echo esc_html( $data['label'] );
    ?>
                        </div>
                    </a>
                <?php 
}
?>
            </div>
            <div class="joli-version">
                <div class="joli-submit joli-submit-inline">
                    <div class="joli-save-info">
                        <?php 
submit_button(
    __( 'Save settings', 'joli-table-of-contents' ),
    'primary joli-settings-submit joli-do-submit',
    'submit-menu',
    false
);
?>
                    </div>
                </div>
                <p>v<?php 
echo esc_html( $version );
?></p>
                <?php 
if ( JTOC_HAS_V1 ) {
    ?>
                    <div class="joli-toc-notice-v2" style="text-align:center;">
                        <button class="button button-link" data-method="go" data-action="v1"><?php 
    esc_html_e( 'Go back to v1', 'joli-table-of-contents' );
    ?></button>
                    </div>
                <?php 
}
?>
            </div>
        </header>
        <section class="joli-content">
            <form id="jtoc-settings" method="post" action="<?php 
echo esc_url( admin_url( 'options.php' ) );
?>">
                <div class="tab-content joli-tab-content">
                    <div id="tab-settings" class="joli-settings-tab-pane">
                        <?php 
$option_group = JTOC()::SETTINGS_V2_SLUG . (( $active_post_type ? '_' . $active_post_type : '' ));
settings_fields( $option_group );
do_settings_sections( $option_group );
?>
                    </div>
                </div>
                <div class="joli-submit">
                    <div class="joli-save-info">
                        <div class="joli-info-text"><?php 
esc_html_e( 'Changes unsaved', 'joli-table-of-contents' );
?></div>
                        <?php 
submit_button(
    __( 'Save settings', 'joli-table-of-contents' ),
    'primary joli-settings-submit',
    'submit-float',
    false
);
?>
                    </div>
                </div>
            </form>
            <form action="<?php 
echo esc_attr( $_SERVER['REQUEST_URI'] );
?>" method="post">
                <?php 
wp_nonce_field( 'jtoc_reset' );
?>
                <p>
                    <input type="submit" id="jtoc_reset_settings" name="jtoc_reset_settings" class="button button-link button-small" value="<?php 
esc_html_e( "Reset settings", "joli-table-of-contents" );
?>" data-prompt="<?php 
esc_html_e( "Are you sure you want to reset settings ? This will apply only to the current post type settings. All current settings will be lost.", "joli-table-of-contents" );
?>">
                </p>
            </form>
        </section>
        <aside class="joli-sidebar">
            <div class="joli-sidebar-content">
                <?php 
if ( jtoc_xy()->is_free_plan() ) {
    ?>
                    <div class="joli-sidebar-item" style="background: #cafff7;">
                        <div class="joli-gopro-notice">
                            <!-- <?php 
    esc_html_e( 'Want more cool features such as the', 'joli-table-of-contents' );
    ?> <strong><a target="_blank" href="<?php 
    echo esc_url_raw( $pro_url_v );
    ?>"><?php 
    esc_html_e( 'Floating Table Of Contents Widget', 'joli-table-of-contents' );
    ?></strong></a> ? -->
                            <h3><span style="font-size: small;">Get more with</span><br>Joli Table of Contents Pro</h3>
                            <ul>
                                <?php 
    echo implode( "\n", array_map( function ( $feature ) {
        return jtoc_tagify( 'li', esc_html( $feature ) );
    }, $pro_features ) );
    ?>
                            </ul>
                            <p>
                                <a href="<?php 
    echo esc_url_raw( sprintf( '%sadmin.php?page=' . JTOC()::SETTINGS_V2_SLUG . '-pricing', get_admin_url() ) );
    ?>" class="button button-primary"><?php 
    esc_html_e( 'Get Pro now', 'joli-table-of-contents' );
    ?></a>
                            </p>
                        </div>
                    </div>
                <?php 
}
?>
                <div class="joli-sidebar-item">
                    <h3><?php 
esc_html_e( 'Links', 'joli-table-of-contents' );
?></h3>
                    <ul>
                        <?php 
if ( jtoc_xy()->is_free_plan() ) {
    ?>
                            <li>
                                <a href="<?php 
    echo esc_url_raw( $joli_toc_review_url );
    ?>" target="_blank"><?php 
    esc_html_e( 'You like the plugin ?', 'joli-table-of-contents' );
    ?><br><?php 
    esc_html_e( 'Please rate us ★★★★★ !', 'joli-table-of-contents' );
    ?></a>
                            </li>
                        <?php 
}
?>
                        <?php 
if ( jtoc_xy()->is_premium() ) {
    ?>
                            <li>
                                <a href="<?php 
    echo esc_url( jtoc_xy()->get_account_url() );
    ?>" target="_blank"><?php 
    esc_html_e( 'Account', 'joli-table-of-contents' );
    ?></a>
                            </li>
                            <li>
                                <a href="<?php 
    echo esc_url( jtoc_xy()->contact_url() );
    ?>" target="_blank"><?php 
    esc_html_e( 'Contact us', 'joli-table-of-contents' );
    ?></a>
                            </li>
                        <?php 
}
?>
                        <li>
                            <a href="<?php 
echo esc_url_raw( $joli_toc_doc_url );
?>" target="_blank"><?php 
esc_html_e( 'Documentation', 'joli-table-of-contents' );
?></a>
                        </li>
                    </ul>
                </div>

                <h2>Our Products</h2>

                <?php 
foreach ( $plugins as $plugin ) {
    ?>
                    <div class="joli-sidebar-item<?php 
    echo ( isset( $plugin['highlight'] ) ? ' --highlight' : '' );
    ?>">
                        <a class="joli-sidebar-header"
                            href="<?php 
    echo esc_url_raw( $plugin['url'] );
    ?>"
                            target="_blank"
                            style="text-decoration: none;">
                            <img src="<?php 
    echo esc_url( $plugin['thumb'] );
    ?>" alt="" />
                            <h3<?php 
    echo ( isset( $plugin['name_style'] ) ? jtoc_attrify( [
        ' style' => jtoc_cssify( $plugin['name_style'] ),
    ] ) : '' );
    ?>>
                                <?php 
    echo nl2br( esc_html( $plugin['name'] ) );
    ?>
                                <?php 
    if ( isset( $plugin['highlight'] ) ) {
        ?>
                                    <span class="--highlight"><?php 
        echo esc_html( $plugin['highlight'] );
        ?></span>
                                <?php 
    }
    ?>
                            </h3>
                        </a>
                        <div class="joli-sidebar-body">
                            <p class="joli-plugin-description"><?php 
    echo nl2br( esc_html( $plugin['desc'] ) );
    ?></p>
                            <p>
                                <a href="<?php 
    echo esc_url_raw( $plugin['url'] );
    ?>" class="button button-secondary" target="_blank"><?php 
    esc_html_e( 'Find out more', 'joli-table-of-contents' );
    ?></a>
                            </p>
                        </div>
                    </div>
                <?php 
}
?>
            </div>
        </aside>
    </div>
    <div id="jtoc-save-spinner" class="spinner"></div>
    <div id="jtoc-save-alert" class="joli-is-hidden"><?php 
esc_html_e( 'Settings saved !', 'joli-table-of-contents' );
?></div>
</div>
<?php

defined( 'ABSPATH' ) or die( 'Wrong path bro!' );
?>
<div class="jli-<?php 
echo esc_attr( $app_id );
?> jli-headerbar jli-content-element jli-gap-4">
    <!-- Title -->
    <div class="jli-admin-toolbar-title jli-flex jli-items-center jli-gap-2">
        <a href="<?php 
echo esc_url( $jtoc_settings_url );
?>" style="text-decoration: none;color:inherit;">
            <?php 
echo esc_html( JTOC()::NAME );
?>
        </a>
        <span class="badge"><?php 
echo esc_html( $version );
?></span>
    </div>

    <!-- Search -->
    <div class="jli-headerbar-left jli-justify-end">
        <div class="jli-relative">
            <input type="search" id="jli-search-input" class="jli-search-input jli-sm" placeholder="Search settings..." aria-label="Search settings">
            <div class="input-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="jli-input-icon">
                    <path d="m21 21-4.34-4.34" />
                    <circle cx="11" cy="11" r="8" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Post Type Settings menu -->
    <div class="jli-dropdown" style="float:right;">
        <button class="jli-dropdown-button jli-button jli-button-sm jli-button-ghost ">
            <div class="jli-flex jli-gap-1 jli-items-center">
                <?php 
( $active_post_type ? esc_html_e( $post_types[$active_post_type]->label . ' settings' ) : esc_html_e( 'Global settings', 'joli-table-of-contents' ) );
?>
                <?php 
if ( count( $activated_post_type ) > 0 ) {
    ?><span id="jli-post-type-badge" class="badge badge-xs badge-blue"><?php 
    echo count( $activated_post_type );
    ?></span><?php 
}
?>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down-icon lucide-chevron-down">
                <path d="m6 9 6 6 6-6" />
            </svg>
        </button>
        <div class="jli-dropdown-content">
            <a id="tab-jtoc-global" class="joli-post-type-menu-item" href="<?php 
echo esc_url_raw( $jtoc_settings_url );
?>"><?php 
esc_html_e( "Global settings", "joli-table-of-contents" );
?></a>

            <div class="joli-post-type-menu-wrap">
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
                    <div class="joli-post-type-menu<?php 
    echo ( $tab_is_active ? ' --joli-tab-active' : '' );
    echo ( !$pro ? ' joli-pro' : '' );
    ?>">
                        <?php 
    ?>
                            <span id="tab-<?php 
    echo esc_attr( $pt->name );
    ?>" class="joli-post-type-menu-item" title="<?php 
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
                    <div id="joli-post-type-menus-overlay">
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
                        <button id="joli-post-type-settings-unlock" class="jli-button jli-button-sm<?php 
    echo ( !$pro ? ' joli-pro' : '' );
    ?>" <?php 
    echo ( !$pro ? ' disabled' : '' );
    ?>><?php 
    esc_html_e( 'Unlock', 'joli-table-of-contents' );
    ?></button>
                        <a href="<?php 
    echo esc_url_raw( $joli_toc_doc_post_type_settings_url );
    ?>" id="joli-post-type-settings-what-is-it" target="_blank"><?php 
    esc_html_e( 'What is this ?', 'joli-table-of-contents' );
    ?></a>
                    </div>
                <?php 
}
?>
            </div>
        </div>
    </div>

    <!-- Save & Menu -->
    <div class="jli-flex jli-items-center jli-gap-1">
        <button id="jli-save-button" class="jli-button jli-button-sm">
            <?php 
esc_html_e( 'Save', 'joli-table-of-contents' );
?>
        </button>
        <div class="jli-dropdown" style="float:right;">
            <button class="jli-dropdown-button jli-button jli-button-sm jli-button-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu-icon lucide-menu">
                    <path d="M4 5h16" />
                    <path d="M4 12h16" />
                    <path d="M4 19h16" />
                </svg>
            </button>
            <div class="jli-dropdown-content">
                <a href="#" id="joli-import-preset-button"><?php 
esc_html_e( 'Import preset', 'joli-table-of-contents' );
?></a>
                <a href="#" id="joli-import-export"><?php 
esc_html_e( 'Import/export settings', 'joli-table-of-contents' );
?></a>

                <!-- Separator -->
                <hr>

                <a href="#" id="jli-reset-settings"><?php 
esc_html_e( 'Reset settings', 'joli-table-of-contents' );
?></a>
                <form id="jtoc_reset_settings" action="<?php 
echo esc_url( sanitize_url( wp_unslash( jtoc_isset_or_null( $_SERVER['REQUEST_URI'] ) ) ) );
?>" method="post">
                    <?php 
wp_nonce_field( 'jtoc_reset' );
?>
                    <input type="hidden" name="jtoc_reset_settings" value="1">
                </form>

                <!-- Separator -->
                <hr>

                <!-- Restart onboarding -->
                <a href="#" id="jli-onboarding-start"><?php 
esc_html_e( 'Launch Setup Wizard', 'joli-table-of-contents' );
?></a>
            </div>
        </div>
    </div>
</div>
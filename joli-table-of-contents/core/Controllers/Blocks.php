<?php

/**
 * @package jolitoc
 */
namespace WPJoli\JoliTOC\Controllers;

class Blocks {
    public function registerBlocks() {
        if ( !function_exists( 'register_block_type' ) ) {
            return;
        }
        // $app = JTOC();
        $asset_file = (include JTOC()->path( 'gutenberg/blocks/joli-table-of-contents/index.asset.php' ));
        // wp_enqueue_style('wpjoli-table-of-contents-styles', JTOC()->url('assets/public/css/wpjoli-joli-table-of-contents.css', $app::USE_MINIFIED_ASSETS), [], '1.2.1');
        wp_register_script(
            'joli-table-of-contents-block-script',
            JTOC()->url( 'gutenberg/blocks/joli-table-of-contents/index.js' ),
            $asset_file['dependencies'],
            $asset_file['version']
        );
        if ( method_exists( $this, 'jtocDataPrintScript' ) ) {
            add_action( 'wp_print_scripts', [$this, 'jtocDataPrintScript'] );
        }
        $ret = register_block_type( JTOC()->path( 'gutenberg/blocks/joli-table-of-contents' ), [
            'editor_script'   => 'joli-table-of-contents-block-script',
            'render_callback' => [$this, 'joliTableOfContentsRenderCallback'],
        ] );
    }

    public function joliTableOfContentsRenderCallback( $atts ) {
        /** @var ShortcodesController $scc */
        $scc = JTOC()->requestService( ShortcodesController::class );
        return $scc->joliTOCShortcodeFromBlock( $atts, true );
    }

    public function jtocDataPrintScript() {
        if ( !jtoc_is_gutenberg_editor() ) {
            return;
        }
        echo '<script>' . 'const jtoc_data_all = ' . json_encode( [
            'settings_url' => admin_url( 'admin.php?page=' . JTOC()::SETTINGS_V2_SLUG ),
        ] ) . '</script>';
    }

}

<?php

/**
 * @package jolitoc
 */
namespace WPJoli\JoliTOC\Controllers;

use WPJoli\JoliTOC\Application;
use WPJoli\JoliTOC\Engine\ContentProcessing;
// use DOMDocument;
use DOMXPath;
use WPJoli\JoliTOC\Engine\TOCBuilder;
use WPJoli\JoliTOC\Controllers\SettingsController;
use WPJoli\JoliTOC\Engine\HTMLParser;
class PublicAppController {
    // protected $isProcessing = false;
    protected $tocBuilder;

    public function enqueueResources() {
        global $post;
        //Shortcode / block check
        $has_shortcode = false;
        if ( $post !== null && is_object( $post ) ) {
            $has_shortcode = has_shortcode( $post->post_content, apply_filters( 'jolitoc_shortcode_tag', Application::DOMAIN ) );
        }
        $has_block = false;
        if ( version_compare( $GLOBALS['wp_version'], '5.0', '>=' ) ) {
            $has_block = has_block( 'wpjoli/joli-table-of-contents' );
        }
        $has_shortcode_or_block = $has_shortcode || $has_block;
        // Auto insert check & widget cehck
        /** @var SettingsController $settings */
        $this->tocBuilder = new TOCBuilder(null, null, null);
        $widget_support_post_types = $this->tocBuilder->getOption( 'widget_support_post_types' );
        $widget_support = null;
        if ( $post !== null && (is_array( $widget_support_post_types ) && in_array( $post->post_type, $widget_support_post_types )) ) {
            $widget_support = true;
        }
        $auto_insert_check = $this->isPostValid( null );
        if ( jtoc_is_preview() ) {
            // forces the auto-insert for previews
            $auto_insert_check = true;
        }
        if ( is_a( $post, 'WP_Post' ) && ($has_shortcode_or_block || ($auto_insert_check || $widget_support)) ) {
            // JTOC()->log('Enqueuing resources');
            // since 3.0: load settings when resources are loaded
            JTOC()->resourcesLoaded = true;
            $settings = JTOC()->requestService( SettingsController::class );
            $settings->initialize();
            if ( !apply_filters( 'joli_toc_disable_styles', false ) ) {
                wp_enqueue_style(
                    'wpjoli-joli-tocv2-styles',
                    JTOC()->url( 'assets/public/css/' . 'wpjoli-joli-table-of-contents' . '.css', Application::USE_MINIFIED_ASSETS ),
                    [],
                    Application::VERSION
                );
            }
            $theme = $this->tocBuilder->getOption( 'theme' );
            $has_custom_theme = ( $theme ? strpos( $theme, 'custom-' ) === 0 : false );
            if ( $theme !== 'none' && !$has_custom_theme ) {
                $stylesheet_path = JTOC()->url( 'assets/public/css/themes/' . $theme . '.css', JTOC()::USE_MINIFIED_ASSETS );
                wp_enqueue_style(
                    'wpjoli-joli-tocv2-theme-' . $theme,
                    $stylesheet_path,
                    [],
                    JTOC()::VERSION
                );
            }
        }
    }

    public function joliTocFilterTheContent( $content ) {
        // if ($this->isProcessing) {
        //     return $content;
        // }
        // JTOC()->log('joliTocFilterTheContent: ' . substr($content, 0, 256));
        // Since 3.0
        if ( JTOC()->isMainPost() !== true ) {
            return $content;
        }
        if ( JTOC()->isBuildingShortcode || JTOC()->isProcessingMultipage ) {
            return $content;
        }
        if ( !jtoc_is_front() ) {
            return $content;
        }
        global $post;
        //post check
        if ( !is_single( $post ) && !is_page( $post ) ) {
            return $content;
        }
        if ( apply_filters(
            'joli_toc_disable_toc_custom',
            false,
            $content,
            $post
        ) === true ) {
            return $content;
        }
        //manual interruption
        if ( apply_filters( 'joli_toc_disable_autoinsert', false ) ) {
            return $content;
        }
        $post_settings = false;
        // $has_shortcode = mb_strpos($content, Application::SHORTCODE_TEMP_TAG) !== false;
        // $shortcode_match = preg_match_all(JTOC()::SHORTCODE_TEMP_TAG_REGEX_PATTERN, $content, $matches);
        // $has_shortcode = ($shortcode_match > 0);
        // JTOC()->log($has_shortcode);
        if ( JTOC()->isProcessingShortcode ) {
            return $content;
        }
        $options = null;
        //post_meta
        if ( !$this->tocBuilder ) {
            $this->tocBuilder = new TOCBuilder(null, null, $options);
        }
        //Widget support overrides everyting
        $widget_support_post_types = $this->tocBuilder->getOption( 'widget_support_post_types' );
        $widget_support = null;
        if ( $post !== null && (is_array( $widget_support_post_types ) && in_array( $post->post_type, $widget_support_post_types )) ) {
            $widget_support = true;
        }
        $auto_insert_check = $this->isPostValid( $post_settings );
        // Since 3.0
        $is_preview = jtoc_is_preview();
        if ( $is_preview ) {
            // forces the auto-insert for previews
            $auto_insert_check = true;
        }
        if ( !$auto_insert_check && $widget_support !== true ) {
            return $content;
        }
        // //Processes all shortcodes within the content
        // $this->isProcessing = true;
        // $this->isProcessing = false;
        $scope = $this->tocBuilder->getScope();
        $processed = ContentProcessing::Process(
            $content,
            false,
            $this->tocBuilder,
            jtoc_get_multipaged_content()
        );
        $processed_headings = [];
        $final_headings = [];
        if ( $scope === 'content' ) {
            global $post;
            $processed_headings = ContentProcessing::Process(
                $post->post_content,
                true,
                $this->tocBuilder,
                jtoc_get_multipaged_content()
            );
        }
        if ( $widget_support && !$auto_insert_check ) {
            return $processed['content'];
        }
        if ( $is_preview && count( $processed['headings'] ) <= 3 ) {
            // Forces the injection of some random headings if the article could not generate any
            $processed['headings'] = (include JTOC()->path( 'views/admin/headings-lipsum.php' ));
            $final_headings = $processed['headings'];
        } else {
            if ( $scope === 'extended' ) {
                $final_headings = $processed['headings'];
            } else {
                // 'content
                $final_headings = $processed_headings['headings'];
            }
        }
        // if ($post->ID == 140) {
        // JTOC()->log($final_headings);
        // }
        //$post_toc_options = get_post_meta....
        $this->tocBuilder->setHeadings( $final_headings );
        $this->tocBuilder->setContent( $processed['content'] );
        $this->tocBuilder->setReadingTime( $processed['reading_time'] );
        // JTOC()->log(print_r($this->tocBuilder, true));
        // if shortcode used or post not eligible, return content with anchored headings
        // if ($has_shortcode) {
        //     return $processed['content'];
        // }
        //builds the actual toc
        if ( $final_headings && $is_preview ) {
            $rendered_toc = $this->tocBuilder->makeTOC( $final_headings );
        } else {
            if ( $final_headings ) {
                if ( $scope === 'content' ) {
                    $rendered_toc = $this->tocBuilder->makeTOC( $final_headings );
                } else {
                    $rendered_toc = $this->tocBuilder->makeTOC();
                }
                // $rendered_toc = TableOfContents::makeTOC( $processed['headings'] );
            }
        }
        // JTOC()->log(substr($rendered_toc, 0, 300));
        // $placement = jtoc_get_option('position-auto', 'auto-insert');
        $placement = $this->tocBuilder->getOption( 'position_auto' );
        if ( isset( $rendered_toc ) ) {
            switch ( $placement ) {
                case 'after-content':
                    return $processed['content'] . $rendered_toc;
                case 'before-h1':
                    return $this->insertIntoHTML( $processed['content'], $rendered_toc, 'h1' );
                case 'after-h1':
                    return $this->insertIntoHTML(
                        $processed['content'],
                        $rendered_toc,
                        'h1',
                        true
                    );
                case 'before-h2-1':
                    return $this->insertIntoHTML( $processed['content'], $rendered_toc, 'h2' );
                case 'after-h2-1':
                    return $this->insertIntoHTML(
                        $processed['content'],
                        $rendered_toc,
                        'h2',
                        true
                    );
                case 'after-p-1':
                    return $this->insertIntoHTML(
                        $processed['content'],
                        $rendered_toc,
                        'p',
                        true
                    );
                case 'before-img-1':
                    return $this->insertIntoHTML(
                        $processed['content'],
                        $rendered_toc,
                        'img',
                        false,
                        'before-content'
                    );
                case 'after-img-1':
                    return $this->insertIntoHTML(
                        $processed['content'],
                        $rendered_toc,
                        'img',
                        true,
                        'before-content'
                    );
                case 'before-content':
                default:
                    return $rendered_toc . $processed['content'];
            }
        }
        //fallback
        return $processed['content'];
    }

    private function isPostValid( $post_settings ) {
        global $post;
        //auto insert post type check
        // $allowed_post_types = jtoc_get_option('post-types', 'post-inclusion');
        $allowed_post_types = $this->tocBuilder->getOption( 'auto_insert_post_types' );
        $current_post_type = null;
        if ( $post !== null && is_object( $post ) ) {
            $current_post_type = $post->post_type;
        }
        if ( !is_array( $allowed_post_types ) || is_array( $allowed_post_types ) && !in_array( $current_post_type, $allowed_post_types ) ) {
            // return $processed['content'];
            return false;
        }
        return true;
    }

    /**
     * Alters HTML to insert some content into an HTML string
     * $html = source to modify
     * $content = content to add to the HTML
     * $tag = markup to find
     * $before = insert before the tag. inserts after if false
     */
    public function insertIntoHTML(
        $html,
        $content,
        $tag,
        $after = false,
        $fallback = null
    ) {
        // $parsed_html = new DOMDocument('1.0', "UTF-8");
        // libxml_use_internal_errors(true);
        // @$parsed_html->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        // libxml_use_internal_errors(false);
        /** @var HTMLParser $parser */
        $parser = Application::instance()->requestService( HTMLParser::class );
        // $parser->setMode(2);
        $parsed_html = $parser->parse( $html );
        if ( $parsed_html === false ) {
            return $html;
        }
        $xhtml = new DOMXPath($parsed_html);
        // $tag_search = $parsed_html->getElementsByTagName($tag);
        $tag_search = $xhtml->query( sprintf( '(//%s)[1]', $tag ) );
        if ( !$tag_search ) {
            $parsed_html = null;
            return $html;
        }
        $tag_to_find = $tag_search[0];
        if ( $tag_to_find ) {
            // Creates a chunk of HTML portion
            // $toc = new DOMDocument();
            // @$toc->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
            libxml_use_internal_errors( true );
            $toc = $parser->parse( $content );
            // @$toc->loadHTML('<html><body>' . ($content) . '</body></html>', LIBXML_HTML_NODEFDTD);
            // @$toc->loadHTML('<html><body>' . mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8') . '</body></html>', LIBXML_HTML_NODEFDTD);
            libxml_use_internal_errors( false );
            // $tag_text = new DOMText( $tag_to_find->textContent );
            // At this stage, the structure should be <div id="wpjoli-jtoc--cp-content-wrapper">
            //                                           <div class="child1">...</div>
            //                                           <div class="child2">...</div>
            //                                           <div class="child3">...</div>
            //                                       </div>
            $toc_no_html_wrap = $parser->unwrapTOCNode( $toc );
            // If it failed to unwrap (because using v1 mode), it returns the original node
            // Check if the root element has the ID 'wpjoli-jtoc--cp-content-wrapper'
            // $has_jtoc_content_wrap_id = $toc_no_html_wrap->hasAttribute('id') && $toc_no_html_wrap->getAttribute('id') === HTMLParser::CONTENT_WRAP_HTML_ID;
            $has_jtoc_content_wrap_id = $toc_no_html_wrap instanceof \DOMElement && $toc_no_html_wrap->hasAttribute( 'id' ) && $toc_no_html_wrap->getAttribute( 'id' ) === HTMLParser::CONTENT_WRAP_HTML_ID;
            // JTOC()->log($has_jtoc_content_wrap_id);
            // v1 way of inserting
            if ( !$has_jtoc_content_wrap_id ) {
                if ( $after === false ) {
                    //inserts content before the tag
                    $tag_to_find->parentNode->insertBefore( $parsed_html->importNode( $toc->documentElement, true ), $tag_to_find );
                } else {
                    //inserts content after the tag
                    $tag_to_find->parentNode->insertBefore( $parsed_html->importNode( $toc->documentElement, true ), $tag_to_find->nextSibling );
                    // $inserted = $tag_to_find->outertext . $content;
                }
            } else {
                if ( $after === false ) {
                    foreach ( $toc_no_html_wrap->childNodes as $child ) {
                        $imported = $parsed_html->importNode( $child, true );
                        $tag_to_find->parentNode->insertBefore( $imported, $tag_to_find );
                    }
                } else {
                    foreach ( $toc_no_html_wrap->childNodes as $child ) {
                        $imported = $parsed_html->importNode( $child, true );
                        $tag_to_find->parentNode->insertBefore( $imported, $tag_to_find->nextSibling );
                    }
                }
            }
            // if ($after === false) {
            //     //inserts content before the tag
            //     $tag_to_find->parentNode->insertBefore($parsed_html->importNode($toc_no_html_wrap, true), $tag_to_find);
            // } else {
            //     //inserts content after the tag
            //     $tag_to_find->parentNode->insertBefore($parsed_html->importNode($toc_no_html_wrap, true), $tag_to_find->nextSibling);
            //     // $inserted = $tag_to_find->outertext . $content;
            // }
            // $output = $parsed_html->saveHTML();
            $output = $parser->getHTML( $parsed_html );
            // $output = jtoc_save_html_no_wrapping($parsed_html);
            return $output;
        }
        //optional fallback if the required tag was not found
        if ( $fallback !== null ) {
            switch ( $fallback ) {
                case 'before-content':
                default:
                    return $content . $html;
            }
        }
        //fallback
        return $html;
        // return jtoc_save_html_no_wrapping($html);
    }

}

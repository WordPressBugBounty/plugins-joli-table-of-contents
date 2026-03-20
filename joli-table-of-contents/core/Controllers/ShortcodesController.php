<?php

/**
 * @package jolitoc
 */

namespace WPJoli\JoliTOC\Controllers;

use WPJoli\JoliTOC\Engine\ContentProcessing;
use WPJoli\JoliTOC\Application;
use WPJoli\JoliTOC\Engine\TOCBuilder;

class ShortcodesController
{

    public $shortcode_contents;
    public $page_contents;
    public $page_headings;

    protected $additional_options = [];
    protected $isProcessing = false;
    protected $tocBuilder = [];
    protected $toc;


    protected $the_content;
    protected $the_content_processed = [];
    protected $headings_processed = [];

    public function registerShortcodes()
    {
        add_shortcode(
            apply_filters('jolitoc_shortcode_tag', Application::DOMAIN),
            [$this, 'joliTOCShortcode']
        );
    }

    public function theContent($content)
    {
        if ($this->the_content_processed) {
            return $this->the_content_processed;
        }

        return $content;
    }

    public function joliTOCShortcodeFromBlock($atts = [])
    {
        $shortcode_index = count($this->tocBuilder);

        $this->additional_options[$shortcode_index] = [
            'hidden_headings' => null,
            'edited_headings' => null,
            'toc_is_sticky' => null,
        ];

        $html = $this->joliTOCShortcode($atts);

        $this->additional_options[$shortcode_index] = null;

        return $html;
    }

    /**
     * Processes 'joli_toc' shortcode
     * @param type $atts
     * @return type
     */
    public function joliTOCShortcode($atts = [])
    {
        if (!jtoc_is_front() || JTOC()->isBuildingShortcode === true) {
            return;
        }

        $shortcode_index = count($this->tocBuilder);
        $this->toc = null;
        $this->the_content_processed = null;
        $this->headings_processed[$shortcode_index] = null;

        $options = null;
        $this->tocBuilder[$shortcode_index] = new TOCBuilder(null, null, $options);
        $tocBuilder = $this->tocBuilder[$shortcode_index];
        $shortcode_defaults = $tocBuilder->getOptions();

        $additional_options = jtoc_isset_or_null($this->additional_options[$shortcode_index]);

        //if additionnal block options
        if ($additional_options) {
            $shortcode_defaults = array_merge($additional_options, $shortcode_defaults);
        }

        // if override attr is set, let's use another shortcode's options instead from the same page
        if (isset($atts['override'])) {
            $shortcode_defaults = array_merge(['override' => $atts['override']], $shortcode_defaults);
        }

        $atts = shortcode_atts(
            $shortcode_defaults, //default values
            $atts, //user custom attr ex :[joli-toc attr='1' attr1='asc']
            apply_filters('jolitoc_shortcode_tag', Application::DOMAIN)
        );

        // extract the index attr from the shortcode
        $custom_index = jtoc_isset_or_null($atts['override']);

        // if custom index is set, let's use it
        if ($custom_index !== null && (int) $custom_index < count($this->tocBuilder) && (int) $custom_index >= 0) {
            $shortcode_index = $custom_index;
        }

        $tocBuilder->setOptions($atts, $additional_options);

        // JTOC()->scope = $tocBuilder->getScope();


        if ($this->isProcessing || JTOC()->isProcessingShortcode) {
            // return str_replace('[#]', '[' . $shortcode_index . ']', JTOC()::SHORTCODE_TEMP_TAG);
            return str_replace('#',  $shortcode_index, JTOC()::SHORTCODE_TEMP_TAG);
        }

        $the_post = get_post();

        if (!$the_post) {
            return;
        }

        $shortcode = $this->buildShortcodeContents($the_post, $shortcode_index, false);
        return $shortcode;
    }

    public function buildShortcodeContents($post, $shortcode_index = 0, $in_the_content = true)
    {
        $tocBuilder = $this->tocBuilder[$shortcode_index];
        $scope = $tocBuilder->getScope();

        //shortcode or block inside the_content
        if (JTOC()->getTheContent()) {
            // if ($scope === 'extended') {
            $content = JTOC()->getTheContent();
            // } else {
            //     $content = is_object($post) ? $post->post_content : JTOC()->getTheContent();
            // }
            // JTOC()->log($content);
        }
        //shortcode or block inside a widget
        else {
            JTOC()->isBuildingShortcode = true;
            $the_content = is_object($post) ? $post->post_content : '';
            if ($in_the_content === false && jtoc_is_front()) {

                // JTOC()->log($scope);
                $scannable_content = $scope === 'extended' ? apply_filters('the_content', $the_content) : $the_content;
                $content = apply_filters('joli_toc_post_content_preprocessing', $scannable_content);
                // $content = apply_filters('joli_toc_post_content_preprocessing', apply_filters('the_content', $the_content));
            } else {
                $content = apply_filters('joli_toc_post_content_preprocessing', $the_content);
            }
            JTOC()->isBuildingShortcode = false;
        }


        // set the initial microtime
        // $start_time = microtime(true);

        $processed_content = ContentProcessing::Process($content, false, $tocBuilder, jtoc_get_multipaged_content());

        $processed_headings = [];
        if ($scope === 'content') {
            // Process headings only based on raw, unprocessed content (as in the editor)
            $processed_headings = ContentProcessing::Process($post->post_content, true, $tocBuilder, jtoc_get_multipaged_content());
        }
        // //end time
        // $end_time = microtime(true);
        // $total_time = round($end_time - $start_time, 3);
        // $time_display = jtoc_tagify(
        //     'p',
        //     'Processed in ' . $total_time . 's',
        //     ['style' => jtoc_cssify([
        //         'color' => 'red',
        //         'font-weight' => 'bold',
        //     ])]
        // );

        if ($processed_content) {
            $this->headings_processed[$shortcode_index] = $processed_headings ? $processed_headings['headings'] : $processed_content['headings'];
            $this->the_content_processed =  $processed_content['content'];
            // $this->the_content_processed = $time_display . $processed_content['content'];
        }

        if ($this->headings_processed[$shortcode_index]) {
            $tocBuilder->setHeadings($this->headings_processed[$shortcode_index]);
            $tocBuilder->setContent($this->the_content_processed);
            $tocBuilder->setReadingTime($processed_content['reading_time']);

            $this->toc = $tocBuilder->makeTOC($this->headings_processed[$shortcode_index]);
            return $this->toc;
        }
        return;
    }

    public function beforeTheContent($content)
    {
        // JTOC()->log('beforeTheContent');
        // Since 3.0
        if (JTOC()->isMainPost() !== true) {
            return $content;
        }

        // set the current post ID
        if (JTOC()->the_ID === null) {
            JTOC()->the_ID = get_the_ID();
        }

        $has_shortcode = has_shortcode($content, apply_filters('jolitoc_shortcode_tag', Application::DOMAIN));

        $has_block = false;
        if (version_compare($GLOBALS['wp_version'], '5.0', '>=')) {
            $has_block = has_block('wpjoli/joli-table-of-contents');
        }

        $has_shortcode_or_block = $has_shortcode || $has_block;
        if (JTOC()->the_ID === get_the_ID() && $has_shortcode_or_block) {


            JTOC()->isProcessingShortcode = true;

            // Set the content (unfiltered). Since 3.0
            // JTOC()->setTheContent($content);

            return $content;
        }

        return $content;
    }

    public function filterTheContentShortcode($content)
    {
        // Since 3.0
        if (JTOC()->isMainPost() !== true) {
            return $content;
        }

        if (is_feed() || is_search() || is_archive()) {
            return $content;
        }

        if (JTOC()->isBuildingShortcode) {
            return $content;
        }

        //JTOC()->the_ID === get_the_ID() checks the initial post ID, because it could cause confusion if w WPQuery was executed in between
        if (JTOC()->the_ID === get_the_ID() && JTOC()->isProcessingShortcode) {
            // JTOC()->log($content);

            // $scope = JTOC()->scope; // Get the previously stored scope from the joliTOCShortcode() function
            // JTOC()->log($scope);

            // if ($scope === 'extended') {
            // At this point the content is completely filtered and all 3rd-party shortcodes should have been processed
            JTOC()->setTheContent($content);
            // }
            // else {
            // No else:
            // Since we already setTheContent at the beginning of the process, it will be considered "raw" (not passed through the_content filter) so ne need to reset it here
            // }

            $shortcode_match = preg_match_all(JTOC()::SHORTCODE_TEMP_TAG_REGEX_PATTERN, $content, $matches);

            // JTOC()->log($shortcode_match);
            if ($shortcode_match === false || !$matches) {
                // if ($shortcode_match === false || !$matches ||  $shortcode_match === 0) {
                return $content;
            }

            // //auto insert but shortcode in sidebar
            // if ( $shortcode_match === 0) {
            //     return $this->the_content_processed;
            // }

            $content_after_shortcodes = "";

            $the_post = get_post();
            if (!is_object($the_post)) {
                return $content;
            }

            if ($shortcode_match === 0) {
                return $content;
            }

            $i = 0;
            foreach ($matches[1] as $shortcode_index) {
                $toc = $this->buildShortcodeContents($the_post, $shortcode_index);
                // JTOC()->log($toc);
                // if ($shortcode_index == 0) {
                if ($i == 0) { //first of shortcode or block
                    $content_after_shortcodes = $this->the_content_processed;
                }
                // $current_tag = str_replace('[#]', '[' . $shortcode_index . ']', JTOC()::SHORTCODE_TEMP_TAG);
                $current_tag = str_replace('#', $shortcode_index, JTOC()::SHORTCODE_TEMP_TAG);
                $content_after_shortcodes =  str_replace($current_tag, (string) $toc, $content_after_shortcodes);

                $i++;
            }

            // resets everything
            JTOC()->isProcessingShortcode = false;
            JTOC()->the_ID = null;

            return $content_after_shortcodes;
        }

        return $content;
    }
}

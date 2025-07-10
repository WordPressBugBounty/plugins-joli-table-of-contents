<?php

/**
 * @package jolitoc
 */

namespace WPJoli\JoliTOC\Engine;

use DOMDocument;
// use tidy;

class HTMLParser
{
    const CONTENT_WRAP_HTML_ID = 'wpjoli-jtoc--cp-content-wrapper';
    protected $mode; // 1: v1 or 2: v2

    public function __construct($mode = 1)
    {
        
        $use_engine_v2 = (bool) jtoc_get_option('toc_engine_v2');
        // JTOC()->log($use_engine_v2);
        $this->setMode($use_engine_v2 ? 2 : $mode);

        // $this->mode = $mode;
    }

    /**
     * Set the mode for the HTML parser.
     *
     * The mode determines the version of parsing to use (1 or 2).
     * If an invalid mode is provided, it defaults to mode 1.
     *
     * @param int $mode The mode to set, either 1 or 2.
     */

    public function setMode($mode)
    {
        // Reject invalid mode
        if (!in_array($mode, [1, 2])) {
            $mode = 1;
        }

        $this->mode = $mode;
    }

    /**
     * Parse HTML content into a DOMDocument object and perform operations based on the selected mode (1 or 2)
     *
     * @param string $content
     * @return DOMDocument
     */
    public function parse($content)
    {
        if ($this->mode == 1) {
            return $this->parseV1($content);
        } else if ($this->mode == 2) {
            return $this->parseV2($content);
        }
    }

    /**
     * Return the HTML content of a DOMDocument object
     *
     * @param DOMDocument $doc
     * @return string
     */
    public function getHTML(DOMDocument $doc)
    {
        if ($this->mode == 1) {
            return $this->getHTMLv1($doc);
        } else if ($this->mode == 2) {
            return $this->getHTMLv2($doc);
        }
    }

    /**
     * Parse HTML content into a DOMDocument object using the v1 mode.
     *
     * This method uses mb_convert_encoding before calling the loadHTML method of the DOMDocument class to parse the content. It also sets the libxml_use_internal_errors flag to true, which will prevent the parser from throwing errors when it encounters malformed HTML.
     *
     * @param string $content The HTML content to parse.
     * @return DOMDocument The parsed DOMDocument object.
     */
    public function parseV1($content)
    {
        $html = new DOMDocument('1.0', "UTF-8");
        // @$html->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
        libxml_use_internal_errors(true);
        $success = @$html->loadHTML('<html><body>' . mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8') . '</body></html>', LIBXML_HTML_NODEFDTD);
        libxml_use_internal_errors(false);

        if (!$success) {
            return false;
        }

        return $html;
    }

    /**
     * Parse HTML content into a DOMDocument object using the v2 mode.
     *
     * @param string $content The HTML content to parse.
     * @return DOMDocument The parsed DOMDocument object.
     */
    public function parseV2($content)
    {

        mb_internal_encoding('UTF-8');

        // Suppress warnings and errors
        libxml_use_internal_errors(true);

        // $content = html_sample() . $content;

        $tidy_content = $this->encodeContent($content);
        // unset($content);

        // Create DOMDocument and set encoding manually
        $html = new DOMDocument();
        
        // Ensure it has a full HTML structure for DOMDocument
        $wrappedHtml = $this->wrapContent($tidy_content);
        // unset($tidy_content);

        // Try loading with UTF-8
        $success = $html->loadHTML('<?xml encoding="utf-8" ?>' . $wrappedHtml, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // $errors = libxml_get_errors();

        //     foreach ($errors as $error)
        //     {
        //        jtocpre($error);
        //     }   
        // Clear errors
        libxml_clear_errors();
        libxml_use_internal_errors(false);

        if (!$success) {
            return false;
        }

        return $html;
    }

    protected function encodeContent($html)
    {
        $pattern = '#(?P<block><\s*(script|style)[^>]*>.*?</\2\s*>|<!\[CDATA\[.*?\]\]>)#isum';

        return preg_replace_callback($pattern, function ($matches) {
            $base64 = base64_encode($matches['block']);

            return "<!--__JTOC_X_DATA__:$base64-->";
        }, $html);
    }

    /**
     * Decode previously encoded blocks back into their original HTML form
     */
    protected function decodeContent($html)
    {
        $pattern = '#<!--__JTOC_X_DATA__:(.*?)-->#s';

        return preg_replace_callback($pattern, function ($matches) {
            return base64_decode($matches[1]);
        }, $html);
    }
    protected function wrapContent($content)
    {
        $id = HTMLParser::CONTENT_WRAP_HTML_ID;
        return <<<HTML
        <!DOCTYPE html>
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            </head>
            <body>
                <div id="$id">$content</div>
            </body>
        </html>
        HTML;
    }

    protected function getHTMLv1(DOMDocument $doc): string
    {
        // $htmlh = '<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\" \"http://www.w3.org/TR/REC-html40/loose.dtd\">';
        $html_fragment = preg_replace('/<!DOCTYPE.+?>/', '',  trim($doc->saveHTML()));

        // if (strpos($html_fragment, '<html><body>') === 0) {
        // $html_fragment = substr($html_fragment, 12, -14);
        // }
        $html_fragment = preg_replace('/<html><body>|<\/body><\/html>/', '', $html_fragment);

        return $html_fragment;
    }

    protected function getHTMLv2(DOMDocument $doc): string
    {
        $wrapper = $doc->getElementById(HTMLParser::CONTENT_WRAP_HTML_ID);

        if (!$wrapper) {
            //get body as fallback
            $wrapper = $doc->getElementsByTagName('body')->item(0);
        }

        $cleanHtml = '';
        if ($wrapper) {
            foreach ($wrapper->childNodes as $child) {
                $cleanHtml .= $doc->saveHTML($child);
            }
        }

        // JTOC()->log($cleanHtml);
        // JTOC()->log(decode_sensitive_blocks($cleanHtml));
        return $this->decodeContent($cleanHtml);
    }
    /**
     * Returns a cleaned up version of the given HTML string.
     * When the `tidy` PHP extension is not available, the original HTML is returned.
     *
     * https://api.html-tidy.org/tidy/tidylib_api_5.0.0/quick_ref.html
     * 
     * The `tidy` extension is used to clean up the HTML.
     * The following options are used:
     * - `clean` is disabled, as it removes empty elements and we want to keep them.
     * - `output-html` is enabled, so the output is in HTML format.
     * - `show-body-only` is enabled, so the output will not include an empty `<title>` tag.
     * - `wrap` is disabled, so the output will not be wrapped in a `<body>` tag.
     * - `char-encoding`, `input-encoding`, and `output-encoding` are set to `'utf8'`.
     * - `drop-empty-elements` is disabled, so empty elements will be kept.
     *
     * @param string $html The HTML string to be cleaned up.
     * @return string The cleaned up HTML string.
     */
    // private function tidyHtml($html)
    // {
    //     if (!extension_loaded('tidy')) {
    //         return $html; // fallback
    //     }

    //     $config = [
    //         'clean' => false,
    //         'output-html' => true,
    //         'show-body-only' => false, // if set to false, tiody will add an empty <title> tag, But the intput must be wrapped in a <body> tag
    //         'wrap' => 0,
    //         // 'indent' => 0,
    //         // 'vertical-space' => 'auto',
    //         'char-encoding' => 'utf8',
    //         'input-encoding' => 'utf8',
    //         'output-encoding' => 'utf8',
    //         'drop-empty-elements' => false
    //     ];

    //     $tidy = new tidy();
    //     $tidy->parseString($html, $config, 'utf8');
    //     // $tidy->parseString('<body>' . $html . '</body>', $config, 'utf8');
    //     $tidy->cleanRepair();

    //     return (string)$tidy;
    // }
}

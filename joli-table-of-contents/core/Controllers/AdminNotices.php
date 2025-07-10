<?php

/**
 * @package jolitoc
 */

namespace WPJoli\JoliTOC\Controllers;


class AdminNotices
{

    private $can_display_v2;
    private $options;


    public function __construct()
    {
        $this->options = JTOC()->requestService(OptionsController::class);
    }

    public function initNotices()
    {
        // if ($this->canDisplayV2Notice()) {
        //     $this->showV2Notice();
        // }

        if ($this->canDisplayUpgradedEngine()) {
            $this->showUpgradedEngineNotice();
        }
    }


    public function showUpgradedEngineNotice()
    {

        add_action('admin_notices', [$this, 'makeUpgradedEngineNotice']);
    }

    public function showV2Notice()
    {

        add_action('admin_notices', [$this, 'makeRatingNotice']);
    }


    public function makeUpgradedEngineNotice()
    {
        return JTOC()->render(['notices' => 'upgraded-engine']);
    }

    public function makeRatingNotice()
    {
        return JTOC()->render(['notices' => 'v2-warning']);
    }

    public function makeGoProNotice()
    {
        $base_url = 'https://wpjoli.com/joli-table-of-contents/';
        $params = '?utm_source=' . jtoc_get_host_url() . '&utm_medium=admin-notice';

        $data = [
            'pro_url' => $base_url . $params,
            'pro_url_v' => $base_url . '#visibilities' . $params,
        ];
        return JTOC()->render(['notices' => 'go-pro'], $data);
    }

    public function canDisplayV2Notice()
    {

        if ($this->can_display_v2 === null) {

            //first time
            if (JTOC_USE_V1 === '1') {
                $this->can_display_v2 = true;
            } else {
                $time = $this->options->get('use_v1');
                if ($time > 1) {
                    $this->can_display_v2 = time() > $time;
                } else {
                    $this->can_display_v2 = false;
                }
                // $this->options->set('joli_toc_use_v1', time() + WEEK_IN_SECONDS * 4);
            }

            // $this->can_display_v2 = JTOC_USE_V1 === '' ? true : false;
        }
        return $this->can_display_v2;
    }

    public function canDisplayUpgradedEngine()
    {
        $hide_alert = false;
        $time = $this->options->get('engine_v2');
        if ($time > 1) {
            $hide_alert = time() < $time;
        } else {
            $hide_alert = false;
        }

        $v2_engine = (bool) jtoc_get_option('toc_engine_v2'); // 0 or 1
        // JTOC()->log($v2_engine);

        return !$v2_engine && !$hide_alert ? true : false;
    }



    public function jtocHandleNotice()
    {
        check_ajax_referer('jtoc_admin_notices', 'nonce');

        $handler = sanitize_text_field(jtoc_isset_or_null($_POST['handler']));
        $method = sanitize_text_field(jtoc_isset_or_null($_POST['method']));

        if (!$handler || !$method) {
            die;
        }

        if ($handler == 'v2') {
            if ($method == 'go') {
                $this->goV2();
                wp_send_json_success([
                    'gov2' => admin_url('admin.php?page=' . 'joli_table_of_contents_settings'),
                ]);
            } else if ($method == 'remind') {
                $this->remindLater();
                wp_send_json_success([
                    'gov2' => false,
                ]);
            }
        } else if ($handler == 'v1') {
            if ($method == 'go') {
                $this->goV1();
                wp_send_json_success([
                    'gov2' => admin_url('admin.php?page=' . 'joli_toc_settings'),
                ]);
            } else if ($method == 'remind') {
                $this->remindLater();
                wp_send_json_success([
                    'gov2' => false,
                ]);
            }
        } else if ($handler == 'toc-engine') {
            if ($method == 'activate') {
                $result = $this->activateV2TocEngine();
                wp_send_json_success([
                    'result' => $result
                ]);
            } else if ($method == 'remind') {
                $result = $this->remindLaterV2TocEngine();
                wp_send_json_success([
                    'result' => $result
                ]);
            } else if ($method == 'dismiss') {
                $result = $this->remindLaterV2TocEngine(time() + YEAR_IN_SECONDS);
                wp_send_json_success([
                    'result' => $result
                ]);
            }
        }
        die;
    }

    public function goV1()
    {
        // $this->options->set('use_v1', 1);
        $this->options->set('use_v1', time() + WEEK_IN_SECONDS);
    }

    public function goV2()
    {
        $this->options->set('use_v1', -1);
    }

    public function remindLater()
    {
        $this->options->set('use_v1', time() + WEEK_IN_SECONDS * 4);
    }

    public function activateV2TocEngine()
    {
        return jtoc_set_option('toc_engine_v2', "1");
    }


    public function remindLaterV2TocEngine($value = 0)
    {
        $value = $value > 0 ? $value : time() + WEEK_IN_SECONDS * 4;
        
        $this->options->set('engine_v2', $value);
    }
}

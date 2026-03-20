<?php defined('ABSPATH') || exit; ?>
<?php
$has_custom_styles = ($toc_styles_general || $toc_styles || $toc_styles_root || $custom_css);
$preserve_styles = $preserve_theme_styles ? '' : '.--jtoc-has-custom-styles';
$is_in_the_content = current_filter() === 'the_content';
$in_the_content = $is_in_the_content ? ' --jtoc-the-content' : '';
$toc_inline_styles = null;
$toc_style = '';
$hidden_main_toc = '';
$is_hidden_class = '';
$all_styles = null;
$toc_inline_styles_str = $toc_inline_styles ? jtoc_attrify(['style' => $toc_inline_styles]) : '';
?>
<?php if ($has_custom_styles) : ?>
  <?php ob_start(); ?>
    <?php if ($css) : ?><?php echo wp_strip_all_tags($css) ?><?php endif; ?>
  <?php if ($toc_styles_root) : ?>
    :root {
      <?php echo wp_strip_all_tags($toc_styles_root) ?>
    }
  <?php endif; ?>
  <?php if ($toc_styles_general) : ?>
      .wpj-jtoc.<?php echo wp_strip_all_tags($theme_class) ?><?php echo wp_strip_all_tags($preserve_styles) ?> {
      <?php echo wp_strip_all_tags($toc_styles_general) ?>
    }
  <?php endif; ?>
  <?php if ($toc_styles && !$preserve_theme_styles) : ?>
      .wpj-jtoc.<?php echo wp_strip_all_tags($theme_class) ?><?php echo wp_strip_all_tags($preserve_styles) ?> {
      <?php echo wp_strip_all_tags($toc_styles) ?>
    }
  <?php endif; ?>
  <?php if ($custom_css) : ?><?php echo wp_strip_all_tags($custom_css) ?><?php endif; ?>
  <?php $all_styles = trim(ob_get_contents());
  ob_end_clean(); ?>
<?php endif; ?>

<?php if ($all_styles) : ?>
    <?php
    // wp_register_style('wpjoli-joli-tocv2-inline-styles', false);
    // wp_enqueue_style('wpjoli-joli-tocv2-inline-styles');
    // wp_add_inline_style('wpjoli-joli-tocv2-inline-styles', wp_strip_all_tags($all_styles));

    if (! wp_style_is('wpjoli-joli-tocv2-inline-styles', 'enqueued')) {
        wp_register_style('wpjoli-joli-tocv2-inline-styles', false);
        wp_enqueue_style('wpjoli-joli-tocv2-inline-styles');
        wp_add_inline_style('wpjoli-joli-tocv2-inline-styles', wp_strip_all_tags($all_styles));
    }

    ?>
<?php endif; ?>

<?php do_action('joli_toc_before_table_of_contents', $data); ?>
<div id="wpj-jtoc" class="wpj-jtoc wpj-jtoc--main<?php echo $in_the_content ?><?php echo $toc_wrapper_shared_classes ?><?php echo $toc_wrapper_main_classes ?><?php echo $hidden_main_toc ?>" <?php echo $toc_style ?>>
  <!-- TOC -->
    <?php do_action('joli_toc_before_toc', $data); ?>
    <div class="wpj-jtoc--toc wpj-jtoc--toc-inline<?php echo esc_attr($toc_classes) ?><?php echo esc_attr($is_hidden_class) ?>" <?php echo $toc_inline_styles_str ?>>
    <?php do_action('joli_toc_before_header', $data); ?>
    <?php if ($show_header) : ?>
      <div class="wpj-jtoc--header">
        <div class="wpj-jtoc--header-main">
          <?php do_action('joli_toc_before_title', $data); ?>
          <div class="wpj-jtoc--title<?php echo $title_icon !== false ? ' --has-icon' : '' ?>">
            <?php if ($title_icon !== false): ?>
              <div class="title-icon">
                <?php echo $title_icon ?>
              </div>
            <?php endif; ?>
            <span class="wpj-jtoc--title-label"><?php echo wp_kses_post($title); ?></span>
          </div>
          <?php do_action('joli_toc_after_title', $data); ?>
          <?php if ($show_toggle) : ?>
            <div class="wpj-jtoc--toggle-wrap">
              <?php if ($toggle_type === 'text') : ?>
                <!-- toggle icon instead of the toggle box if any custom icon -->
                <div class="wpj-jtoc--toggle-text">
                  <div class="wpj-jtoc--toggle-opened">
                    <span class="--jtoc-bracket">[</span><?php echo esc_html($toggle_button_text_opened); ?><span class="--jtoc-bracket">]</span>
                  </div>
                  <div class="wpj-jtoc--toggle-closed">
                    <span class="--jtoc-bracket">[</span><?php echo esc_html($toggle_button_text_closed); ?><span class="--jtoc-bracket">]</span>
                  </div>
                </div>
              <?php endif; ?>
              <?php if ($toggle_type === 'icon-std') : ?>
                <div class="wpj-jtoc--toggle-icon">
                  <div class="wpj-jtoc--toggle-opened"><?php echo wp_kses_post($toggle_button_icon_opened); ?></div>
                  <div class="wpj-jtoc--toggle-closed"><?php echo wp_kses_post($toggle_button_icon_closed); ?></div>
                </div>
              <?php endif; ?>
              <?php if ($toggle_type === 'icon') : ?>
                <div class="wpj-jtoc--toggle-box">
                  <div class="wpj-jtoc--toggle"></div>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
    <?php do_action('joli_toc_after_header', $data); ?>
    <div class="wpj-jtoc--body">
      <?php do_action('joli_toc_before_headings', $data); ?>
      <nav class="wpj-jtoc--nav">
        <?php echo $toc ?>
      </nav>
      <?php do_action('joli_toc_after_headings', $data); ?>
    </div>
    <?php do_action('joli_toc_after_body', $data); ?>
  </div>
    <?php do_action('joli_toc_after_toc', $data); ?>
</div>
<?php do_action('joli_toc_after_table_of_contents', $data); ?>
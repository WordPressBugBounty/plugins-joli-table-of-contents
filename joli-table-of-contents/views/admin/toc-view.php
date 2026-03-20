<?php
$class = ' jtoc-v-highlight';
?>
<div class="jtoc-v-wrap">
    <span><?php esc_html_e('Locate visually', 'joli-table-of-contents') ?></span>
    <span class="joli-field-info dashicons dashicons-info-outline"></span>
    <div class="joli-info-bubble">
        <div class="jtoc-v-main<?php echo $highlight === 'main' ? esc_attr($class) : '' ?>">
            <div class="jtoc-v-header<?php echo $highlight === 'header' ? esc_attr($class) : '' ?>">
                <span class="jtoc-v-title<?php echo $highlight === 'title' ? esc_attr($class) : '' ?>">TABLE OF CONTENTS TITLE</span>
                <div class="jtoc-v-toggle<?php echo $highlight === 'toggle' ? esc_attr($class) : '' ?>">[toggle]</div>
            </div>
            <div class="jtoc-v-body<?php echo $highlight === 'body' ? esc_attr($class) : '' ?>">
                <ol class="jtoc-v-headings">
                    <?php for ($i = 1; $i <= 4; $i++) : ?>
                        <li class="<?php echo $highlight === 'headings' ? esc_attr($class) : '' ?>">
                            <span class="jtoc-v-text-link<?php echo $highlight === 'links' ? esc_attr($class) : '' ?>">HEADINGS TEXT LINK</span>
                        </li>
                    <?php endfor; ?>
                </ol>
            </div>
        </div>
    </div>
</div>
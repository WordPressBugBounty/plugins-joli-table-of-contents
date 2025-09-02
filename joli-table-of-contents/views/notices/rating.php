<div class="notice notice-info joli-toc-notice joli-toc-rating">
    <p>
        <?php echo wp_kses(sprintf(
            __('Hi! Thank you for using %s !', 'joli-table-of-contents'),
            '<b>Joli Table Of Contents</b>'
        ), array('b' => array())); ?>
        <br>
        <?php esc_html_e('If you enjoy it, we would be very grateful that you leave a review. It may not seem like much but it actually helps a lot!', 'joli-table-of-contents'); ?>
    </p>

    <p>
        <a href="https://wordpress.org/support/plugin/joli-table-of-contents/reviews/?rate=5#new-post" class="button button-primary" data-method="review" target="_blank"><?php esc_html_e('Leave a review', 'joli-table-of-contents') ?></a>
        <a href="" class="button button-secondary" data-method="remind" data-action="rating"><?php esc_html_e('Remind me later', 'joli-table-of-contents') ?></a>
        <a href="" class="button button-link" data-method="dismiss" data-action="rating"><?php esc_html_e('Dismiss', 'joli-table-of-contents') ?></a>
        <b><?php esc_html_e('Thank you for your support!', 'joli-table-of-contents'); ?></b>
    </p>
</div>
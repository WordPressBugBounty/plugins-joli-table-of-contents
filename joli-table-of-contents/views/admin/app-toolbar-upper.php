<?php defined('ABSPATH') or die('Wrong path bro!'); ?>
<div class="jli-<?php echo esc_attr($app_id) ?> jli-admin-toolbar jli-content-element">
    <div class="jli-logo">
        <a href="https://wpjoli.com" class="jli-flex jli-items-center" title="Joli Table of Contents" target="_blank">
            <img src="<?php echo esc_url($logo_url); ?>" alt="WPJoli logo" width="100" height="auto">
        </a>
    </div>
    <div class="jli-admin-toolbar-content jli-flex jli-flex-1 jli-justify-between jli-gap-2">
        <?php if (jtoc_xy()->is_free_plan()) : ?>
        <a class="jli-button jli-button-fuzzy jli-button-sm" href="https://wpjoli.com/joli-table-of-contents" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles-icon lucide-sparkles"><path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"/><path d="M20 2v4"/><path d="M22 4h-4"/><circle cx="4" cy="20" r="2"/></svg>
            <?php echo __('Unlock Extra Features with Pro', 'joli-table-of-contents'); ?>
        </a>
        <?php else: ?>
        <a class="jli-button jli-button-fuzzy jli-button-sm" href="https://wpjoli.com/account/" target="_blank" title="Log in to your account and manage your subscriptions (on wpjoli.com)">
            <!-- lucide user icon -->
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-icon lucide-user-round"><circle cx="12" cy="8" r="5"/><path d="M20 21a8 8 0 0 0-16 0"/></svg> -->
            <?php echo __('Customer Portal', 'joli-table-of-contents'); ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-arrow-out-up-right-icon lucide-square-arrow-out-up-right"><path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6"/><path d="m21 3-9 9"/><path d="M15 3h6v6"/></svg>
        </a>
        <?php endif; ?>

        <div class="jli-admin-toolbar-menu jli-items-center">
            <?php foreach ($menu as $item) : ?>
                <a href="<?php echo esc_url($item['url']); ?>" target="<?php echo isset($item['target']) ? esc_attr($item['target']) : '_self'; ?>"><?php echo esc_html($item['label']); ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

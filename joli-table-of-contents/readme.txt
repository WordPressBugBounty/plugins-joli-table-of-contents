=== Joli Table Of Contents ===
Contributors: wpjoli
Tags: table of contents, toc, navigation, gutenberg block, page contents
Requires at least: 5.0
Tested up to: 6.9
Stable tag: 3.0.0
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

The best Table of Contents plugin for WordPress. Auto or manual insert, Gutenberg Block, beautiful themes, onboarding wizard, and deep customization.

== Description ==

**Joli Table Of Contents** is the most customizable and performance-focused table of contents plugin for WordPress. It works out of the box for beginners — thanks to a built-in **Onboarding Wizard** — and offers deep control for advanced users and developers.

Easily insert a table of contents into all your posts with either the **Auto-insert**, the Gutenberg **Block**, or the **Shortcode**.

[📖 Documentation](https://wpjoli.com/docs/joli-table-of-contents/ "Joli Table Of Contents Documentation") | [⭐ Get PRO](https://wpjoli.com/joli-table-of-contents/ "Joli Table Of Contents Pro")

---

## 🚀 Why Joli Table Of Contents?

### ✅ Beginner-Friendly Onboarding Wizard
After activation, a **step-by-step setup wizard** walks you through the most important settings — no configuration headaches, no reading documentation. You'll have a working, good-looking TOC in minutes.

### 🎨 Instant Customization with the Color Palette System
The new **Color Palette** makes customization effortless. Set just the **Accent color** and it automatically propagates across your entire TOC — that's 90% of the visual work done in a single click. Fine-tune everything else at your own pace.

### 🧠 Smart Heading Detection
Joli Table Of Contents accurately detects headings from **third-party shortcodes and blocks** that don't appear directly in the editor but are rendered on the front end. Since v3, you can now choose between **Content** scope (default — prevents unwanted headings from appearing) and **Extended** scope for advanced use cases.

### 🆕 Gutenberg Block with Inline Editing
Use the dedicated **Gutenberg Block** to insert a table of contents anywhere in your post. The block lets you **hide or edit specific headings** inline — no settings page needed.

### ⚡ Performance First
No jQuery dependency. Minified CSS and JavaScript. Conditional style loading based on active settings — only the code you need is loaded. Built for fast websites.

### 🔁 Migrate from Another TOC Plugin — Without Touching Your Content
Already using **Easy Table of Contents**, **LuckyWP Table of Contents**, or another plugin? You can switch to Joli TOC **without updating a single shortcode** across your posts.

Use the built-in filter to map Joli TOC to your existing shortcode tag:

`add_filter('jolitoc_shortcode_tag', function(){ return 'toc'; });`

This works with any custom tag, so your existing `[toc]` (or any other) shortcodes continue to work immediately after switching.

---

## ✨ Key Features

**Design & Themes:**
* Professional looking themes (Default, Original, Hero, + all legacy themes)
* Dark mode support for v3 themes
* Color Palette system — set one color, style the whole TOC
* Fully customizable: padding, margin, borders, fonts, colors, icons
* Custom CSS support
* CSS variable architecture for deep theming
* Custom theme engine (create your own theme)

**Insertion methods:**
* Auto-insert (by post type and position)
* Gutenberg Block
* Shortcode `[joli-toc]`

**Auto-insert positions:**
* Before/After the content
* Before/After H1
* Before first H2 / After first H2
* After first paragraph

**Headings & Detection:**
* Detect headings from third-party blocks and shortcodes
* Heading scope: Content (default) or Extended
* Show headings by custom depth (H2 to H6)
* Hide or edit specific headings via the block
* Disable headings by text or CSS class

**Navigation & UX:**
* Reading time estimate *(new in v3)*
* Hierarchical or Flat view
* Multiple numbering styles (with regional number support)
* Customizable numbering separator and suffix
* Smooth scrolling
* Folding/unfolding with animation
* Pretty URL hash (e.g. `mysite.com/article/#section-title`) 
* Latin & non-latin character support
* Multilingual hash transliteration
* Responsive — hover events work as touch on mobile

**Other:**
* Import / Export settings
* Import presets for quick setup
* Custom CSS section
* Fully responsive
* `<!--nextpage-->` multi-page support
* RTL support
* WPML compatible
* No jQuery
* Developer hooks ([see full list](https://wpjoli.com/docs/joli-table-of-contents/developer-hooks/))

---

## ⭐ What's New in v3

### 🧙 Onboarding Wizard
New users are greeted with a **step-by-step onboarding wizard** that configures the most important settings for their site — without needing to touch advanced options.

### 🎨 Color Palette System
A brand-new **reusable color palette** makes customization fast and consistent. Define your Accent color once and watch it style your entire TOC automatically.

### 🖼 New & Updated Themes
v3 ships with new and upgraded themes: **Default** (replaces Basic Light/Dark), **Original**, and **Hero** — all with dark mode support and theme-specific style variants.

### 🎛 Redesigned Settings Page
The admin interface has been fully redesigned with:
* A **search bar** to quickly find any setting
* A **Live Preview** panel — see your changes in real time
* A **Quick Settings Panel** for the most common options
* Better color pickers with palette support
* Session checker to prevent lost changes

### 📐 New Style Options
New styling controls include: header border style/width/radius/color, numbering badge colors, base font size, and toggle button styles.

### 🔢 Improved Numbering System
The numbering engine has been upgraded to behave like a proper list — including support for **regional numbering** formats. Hexadecimal and binary modes have been removed.

### 📍 TOC Alignment
Choose between **left, center, and right** alignment for the entire TOC block.

### 📖 Reading Time Estimate
Automatically display an estimated reading time inside the TOC header.

---

## 🔒 PRO Features

[**Get Joli Table Of Contents Pro →**](https://wpjoli.com/joli-table-of-contents/)

**Premium Themes:**


**Widgets:**
* 🆕 **Timeline TOC** — display the TOC as a visual timeline on the side of the screen, with proportionally spaced markers
* ✅ **Floating TOC Widget** — follows the user as they scroll, shows the active section
* ✅ **Slide-Out TOC Widget** — fixed panel on the side of the screen
* ✅ **Sticky Sidebar TOC** — TOC in a sidebar widget that sticks while scrolling
* ✅ **Progress Bar Widget** — reading progress indicator at the top of the page

**PRO-only customization:**
* ⭐ **Collapsible headings**
* ⭐ **View more button** (Partial fold)
* ⭐ Independent top-level heading styling
* Separator between top-level headings
* Multi-columns mode
* Per-device TOC visibility (in-content vs. sidebar)
* Fade past headings

**Advanced auto-insert rules:**
* Filter by post type, post title, or post ID
* Exclude specific posts by title or ID
* Different settings per post type (theme, layout, everything)

**Custom Post Type support** with per-post-type settings.

---

## 🔧 Shortcode

Insert the TOC anywhere using the shortcode:

`[joli-toc]`

**Migrating from another plugin?** Keep your existing shortcode tag without updating any content:

`add_filter('jolitoc_shortcode_tag', function(){ return 'toc'; });`

This is compatible with shortcode tags used by **Easy Table of Contents**, **LuckyWP Table of Contents**, and others.

---

## 🎣 Developer Hooks

Joli Table Of Contents provides a full set of action and filter hooks for developers.

[View all available hooks →](https://wpjoli.com/docs/joli-table-of-contents/developer-hooks/)

**Common examples** (add to your theme's `functions.php`):

Disable auto-insert globally:
`add_filter('joli_toc_disable_autoinsert', function(){ return true; });`

Disable JS or CSS:
`add_filter('joli_toc_disable_js', function(){ return true; });`
`add_filter('joli_toc_disable_styles', function(){ return true; });`

Customize the TOC title dynamically:
`add_filter('joli_toc_toc_title', function( $title ){ return 'My Custom Title'; });`

---

## 🔌 More Plugins by WPJoli

* [Smart Auto Featured Image](https://wordpress.org/plugins/smart-auto-featured-image/)
* [ZenForm](https://wordpress.org/plugins/zenform/)
* [Joli FAQ SEO](https://wordpress.org/plugins/joli-faq-seo/)
* [Joli CLEAR Lightbox](https://wordpress.org/plugins/joli-clear-lightbox/)

---

== Installation ==

= Installing from the WordPress Admin =
1. Go to **Plugins > Add New**.
2. Search for **"Joli Table Of Contents"**.
3. Click **Install Now**, then **Activate**.
4. Follow the **Onboarding Wizard** to get set up in minutes.

= Installing via ZIP archive =
1. Go to **Plugins > Add New > Upload Plugin**.
2. Upload the plugin ZIP file and click **Install Now**.
3. Click **Activate Plugin**.

= Manual Installation =
1. Upload the `joli-table-of-contents` folder to `/wp-content/plugins/`.
2. Go to **Plugins** in your WordPress admin and activate it.

= After Activation =
The **Onboarding Wizard** will guide you through the setup. You can also go directly to **Joli TOC** in your admin menu.

You have 3 ways to display the TOC:
1. **Auto-insert** — go to Settings > Auto-Insert and select your post types
2. **Gutenberg Block** — insert the Joli TOC block inside any post or page
3. **Shortcode** — add `[joli-toc]` anywhere in your content

📖 [Getting Started Guide](https://wpjoli.com/docs/joli-table-of-contents/getting-started/)

---

== Frequently Asked Questions ==

= What should I do right after installing the plugin? =
The **Onboarding Wizard** will launch automatically and walk you through the key settings step by step. You can also check the [Getting Started guide](https://wpjoli.com/docs/joli-table-of-contents/getting-started/) and [How to Insert a Table of Contents](https://wpjoli.com/docs/joli-table-of-contents/inserting-a-table-of-contents/).

= Can I migrate from Easy Table of Contents or LuckyWP without changing my shortcodes? =
Yes. Use the `jolitoc_shortcode_tag` filter to map Joli TOC to your existing tag. For example, to keep using `[toc]`:

`add_filter('jolitoc_shortcode_tag', function(){ return 'toc'; });`

Add that line to your theme's `functions.php` and your existing shortcodes will keep working with no content edits needed.

= How does the Color Palette work? =
The Color Palette lets you define a set of reusable colors for your TOC. The most impactful one is the **Accent color** — setting it alone styles approximately 90% of the TOC automatically. You can then fine-tune individual elements as needed.

= What's the difference between "Content" and "Extended" heading scope? =
**Content** scope (default in v3) only detects headings inside your main post content, which prevents accidental headings from sidebars or other blocks from appearing in your TOC. **Extended** scope (the behavior in v1 and v2) also picks up headings from third-party shortcodes and blocks rendered outside the content area. You can switch between them in the Headings settings.

= Is Joli Table Of Contents responsive? =
Yes, fully responsive. Touch events on mobile work in place of hover events.

= The title, headings, or toggle button won't show — what's wrong? =
Your theme may apply a text color that matches the TOC background. Go to **Settings > Appearance** and manually set a color for the relevant element.

= Can I use this plugin on custom post types? =
Custom post type support is available in the **PRO** version, including the ability to define different settings per post type.

= How do I display the TOC only on certain posts? =
Use the **Auto-insert** rules (PRO) to filter by post ID, post title, or post type. Alternatively, use the Gutenberg block or shortcode to insert the TOC manually on specific posts only.

= What changed in v3? =
v3 brings a redesigned admin interface with live preview, an onboarding wizard, a color palette system, new themes with dark mode, an upgraded numbering system, TOC alignment controls, reading time estimates, and many new PRO features including the Timeline TOC mode. See the full changelog below.

= What happened to hexadecimal and binary numbering? =
These two numbering types have been removed in v3 as they had very limited practical use. All other numbering types remain available, and regional numbering formats have been added.

---

== Screenshots ==

1. Themes overview
2. Color Palette — Example 1 (custom accent color)
3. Color Palette — Example 2 (custom colors)
4. Gutenberg Block — Example 1
5. Onboarding Wizard — Intro
6. Onboarding Wizard — Colors & Live Preview
7. Settings Page — Quick Settings
8. Settings Page — General
9. Settings Page — Headings
10. Settings Page — Theme & Colors
11. Demo 1
12. Demo 2
13. Demo 3
14. Demo 4
15. Demo 5
16. Demo 6
17. Demo 7
18. Demo 8
19. Demo 9
20. Demo 10
21. Demo 11
22. Demo 12
23. Demo 13
24. Demo 14
25. Demo 15
26. Demo 16
27. Demo 17
28. Demo 18
29. Demo 19
30. Demo 20
31. Demo 21
32. Demo 22
33. Demo 23
34. Demo 24
35. Demo 25
36. Demo 26
37. Demo 27
38. Demo 28
39. Demo 29

---

== Upgrade Notice ==

= 2.0.0 =
With the introduction of the version 2, Joli Table of contents benefits from a complete redesign. This new redesign brings much more flexibility in terms of styling, adds performance, gets rid of jQuery, and is correcting the flaws of the version 1. To achieve these goals, building on top of V1 was not possible, that is why the version 2 comes with some  **breaking changes**. Your custom CSS from v1 will not work anymore andd some hooks are being deprecated.

= 3.0.0 =
v3 is a major update with a redesigned admin, new themes, color palette system, onboarding wizard, and many new features. **v1 legacy support has been fully removed.** If you are still on v1, please migrate to v2 settings before upgrading to v3. See the changelog for full details.
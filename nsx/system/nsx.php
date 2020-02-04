<?php

/**
* Plugin Name: NSX Wordpress Optimizer
* Description: Set of Custom Functions to Debloat & SpeedUp Wordpress
* Author: Nassim Abdellaoui
* Author URI: https://nassim.space
* Plugin URI: https://github.com/nassimspace
* Version: 1.0
*/

/* Your code goes below here. */

// Disable XMLRPC
add_filter('xmlrpc_enabled', '__return_false');

// ----------------------------------------------------------------------------------------------------------------------

// admin-bar

/**
 * Hide the admin bar on the front-end
 *
 * @link https://codex.wordpress.org/Function_Reference/show_admin_bar
 */
add_filter('show_admin_bar', '__return_false');
/**
 * Hide or create new menus and items in the admin bar.
 * Indentation shows sub-items.
 *
 * @link https://codex.wordpress.org/Class_Reference/WP_Admin_Bar/add_menu
 */
add_action(
    'wp_before_admin_bar_render', function () {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('wp-logo');            // Remove the WordPress logo
        $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
        $wp_admin_bar->remove_menu('wporg');            // Remove the about WordPress link
        $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
        $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
        $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
//        $wp_admin_bar->remove_menu('site-name');          // Remove the site name menu
//        $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
//        $wp_admin_bar->remove_menu('dashboard');        // Remove the dashboard link
//        $wp_admin_bar->remove_menu('menus');            // Remove the menus link
//        $wp_admin_bar->remove_menu('customize');          // Remove the site name menu
//        $wp_admin_bar->remove_menu('updates');            // Remove the updates link
//        $wp_admin_bar->remove_menu('comments');           // Remove the comments link
//        $wp_admin_bar->remove_menu('new-content');        // Remove the content link
//        $wp_admin_bar->remove_menu('new-post');         // Remove the new post link
//        $wp_admin_bar->remove_menu('new-media');        // Remove the new media link
//        $wp_admin_bar->remove_menu('new-page');         // Remove the new page link
//        $wp_admin_bar->remove_menu('new-user');         // Remove the new user link
//        $wp_admin_bar->remove_menu('edit');               // Remove the edit link
//        $wp_admin_bar->remove_menu('my-account');         // Remove the user details tab
        $wp_admin_bar->remove_menu('search');             // Remove the search tab
    }, 999
); // Needs to have low priority


// admin-footer

/**
 * Remove left admin footer text
 *
 * @link https://developer.wordpress.org/reference/hooks/admin_footer_text/
 */
add_filter('admin_footer_text', '__return_empty_string');
/**
 * Remove right admin footer text (where the WordPress version nr is)
 *
 * @link https://developer.wordpress.org/reference/hooks/update_footer/
 */
add_filter('update_footer', '__return_empty_string', 11);


// admin-menu

/**
 * Hide admin menu items. Can be both parents and children in dropdowns.
 * Specify link to parent and link to child.
 *
 * @link https://codex.wordpress.org/Function_Reference/remove_menu_page
 */
add_action(
    'admin_menu', function () {
        // Remove Dashboard
//        remove_menu_page('index.php');
        // Remove Dashboard -> Update Core notice
        remove_submenu_page('index.php', 'update-core.php');
        // Remove Posts
//        remove_menu_page('edit.php');
        // Remove Posts -> New post
//        remove_submenu_page('edit.php', 'post-new.php');
        // Remove Posts -> Categories
//        remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
        // Remove Posts -> Tags
//        remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
        // Remove Media
//        remove_menu_page('upload.php');
        // Remove Media -> Library
//        remove_submenu_page('upload.php', 'upload.php');
        // Remove Media -> Add new media
//        remove_submenu_page('upload.php', 'media-new.php');
        // Remove Pages
//        remove_menu_page('edit.php?post_type=page');
        // Remove Pages -> All pages
//        remove_submenu_page('edit.php?post_type=page', 'edit.php?post_type=page');
        // Remove Pages -> Add new page
//        remove_submenu_page('edit.php?post_type=page', 'post-new.php?post_type=page');
        // Remove Comments
        remove_menu_page('edit-comments.php');
        // Remove Appearance
//        remove_menu_page('themes.php');
        // Remove Appearance -> Themes
//        remove_submenu_page('themes.php', 'themes.php');
        // Remove Appearance -> Customize
//        remove_submenu_page('themes.php', 'customize.php?return=' . urlencode($_SERVER['REQUEST_URI']));
        // Remove Appearance -> Widgets
//        remove_submenu_page('themes.php', 'widgets.php');
        // Remove Appearance -> Menus
//        remove_submenu_page('themes.php', 'nav-menus.php.php');
        // Remove Appearance -> Editor
        remove_submenu_page('themes.php', 'theme-editor.php');
        // Remove Plugins
//        remove_menu_page('plugins.php');
        // Remove Plugins -> Installed plugins
//        remove_submenu_page('plugins.php', 'plugins.php');
        // Remove Plugins -> Add new plugins
//        remove_submenu_page('plugins.php', 'plugin-install.php');
        // Remove Plugins -> Plugin editor
        remove_submenu_page('plugins.php', 'plugin-editor.php');
        // Remove Users
//        remove_menu_page('users.php');
        // Remove Users -> Users
//        remove_submenu_page('users.php', 'users.php');
        // Remove Users -> New user
//        remove_submenu_page('users.php', 'user-new.php');
        // Remove Users -> Your profile
//        remove_submenu_page('users.php', 'profile.php');
        // Remove Tools
//        remove_menu_page('tools.php');
        // Remove Tools -> Available Tools
//        remove_submenu_page('tools.php', 'tools.php');
//        Remove Tools -> Site Health
        remove_submenu_page('tools.php', 'site-health.php');
        // Remove Tools -> Import
//        remove_submenu_page('tools.php', 'import.php');
        // Remove Tools -> Export
//        remove_submenu_page('tools.php', 'export.php');
        // Remove Settings
//        remove_menu_page('options-general.php');
        // Remove Settings -> Writing
//        remove_submenu_page('options-general.php', 'options-writing.php');
        // Remove Settings -> Reading
//        remove_submenu_page('options-general.php', 'options-reading.php');
        // Remove Settings -> Discussion
//        remove_submenu_page('options-general.php', 'options-discussion.php');
        // Remove Settings -> Media
//        remove_submenu_page('options-general.php', 'options-media.php');
        // Remove Settings -> Permalinks
//        remove_submenu_page('options-general.php', 'options-permalink.php');
    }, 999
);


// Remove default fields in comment form

/**
 *
 *
 * @link https://codex.wordpress.org/Function_Reference/comment_form
 */
function disable_comment_fields( $fields )
{
    unset($fields['author']);
    unset($fields['email']);
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'disable_comment_fields');


// Remove Help Tabs

/**
 *
 *
 * @link https://codex.wordpress.org/Adding_Contextual_Help_to_Administration_Menus
 *
 * @param $old_help
 * @param $screen_id
 * @param $screen
 */
add_filter(
    'contextual_help', function ( $old_help, $screen_id, $screen ) {
        // Remove all help tabs
        $screen->remove_help_tabs();
        // Remove specific tabs
        $screen->remove_help_tab('overview');
        $screen->remove_help_tab('help-navigation');
        $screen->remove_help_tab('help-layout');
        $screen->remove_help_tab('help-content');
        $screen->remove_help_tab('attachment-details');
        $screen->remove_help_tab('managing-pages');
        $screen->remove_help_tab('managing-pages');
        $screen->remove_help_tab('moderating-comments');
        $screen->remove_help_tab('adding-themes');
        $screen->remove_help_tab('customize-preview-themes');
        $screen->remove_help_tab('compatibility-problems');
        $screen->remove_help_tab('adding-plugins');
        $screen->remove_help_tab('screen-display');
        $screen->remove_help_tab('actions');
        $screen->remove_help_tab('user-roles');
        $screen->remove_help_tab('press-this');
        $screen->remove_help_tab('converter');
        $screen->remove_help_tab('options-postemail');
        $screen->remove_help_tab('options-services');
        $screen->remove_help_tab('site-visibility');
        $screen->remove_help_tab('permalink-settings');
        $screen->remove_help_tab('custom-structures');
    }, 999, 3
);
/**
 * Remove Screen Options tab
 *
 * @link https://developer.wordpress.org/reference/hooks/screen_options_show_screen/
 */
add_filter('screen_options_show_screen', '__return_false');


// Removing dashboard widgets.

/**
 *
 *
 * @link https://codex.wordpress.org/Function_Reference/remove_meta_box
 */
add_action(
    'admin_init', function () {
        // Remove the 'Welcome' panel
        remove_action('welcome_panel', 'wp_welcome_panel');
        // Remove the 'At a Glance' metabox
        remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
        // Remove the 'Activity' metabox
        remove_meta_box('dashboard_activity', 'dashboard', 'normal');
        // Remove the 'WordPress News' metabox
        remove_meta_box('dashboard_primary', 'dashboard', 'side');
        // Remove the 'Quick Draft' metabox
//        remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    }
);
/**
 * Remove access to the dashboard
 *
 *    'admin_init', function () {
 *        global $pagenow; // Get current page
 *        $redirect = get_admin_url(null, 'edit.php'); // Where to redirect
 *        if ($pagenow == 'index.php' ) {
 *            wp_redirect($redirect, 301);
 *            exit;
 *        }
 *    }
 * );
 */


// Remove emoji support

/**
 *
 *
 * @link https://codex.wordpress.org/Emoji
 */
add_action(
    'init', function () {
        // Front-end
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        // Admin
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('admin_print_styles', 'print_emoji_styles');
        // Feeds
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        // Embeds
        remove_filter('embed_head', 'print_emoji_detection_script');
        // Emails
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        // Disable from TinyMCE editor. Disabled in block editor by default
        add_filter(
            'tiny_mce_plugins', function ( $plugins ) {
                if (is_array($plugins) ) {
                    $plugins = array_diff($plugins, array( 'wpemoji' ));
                }
                return $plugins;
            }
        );
        /**
     * Finally, disable it from the database also, to prevent characters from converting
         *  There used to be a setting under Writings to do this
         *  Not ideal to get & update it here - but it works :/
         */
        if ((int) get_option('use_smilies') === 1 ) {
            update_option('use_smilies', 0);
        }
    }
);


// Remove feeds and wordpress-specific content that is generated on the wp_head hook.

/**
 * Remove feeds and wordpress-specific content that is generated on the wp_head hook.
 *
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/wp_head
 */
add_action(
    'init', function () {
        // Remove the Really Simple Discovery service link
//        remove_action('wp_head', 'rsd_link');
        // Remove the link to the Windows Live Writer manifest
        remove_action('wp_head', 'wlwmanifest_link');
        // Remove the general feeds
//        remove_action('wp_head', 'feed_links', 2);
        // Remove the extra feeds, such as category feeds
//        remove_action('wp_head', 'feed_links_extra', 3);
        // Remove the displayed XHTML generator
        remove_action('wp_head', 'wp_generator');
        // Remove the REST API link tag
        remove_action('wp_head', 'rest_output_link_wp_head', 10);
        // Remove oEmbed discovery links.
//        remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
        // Remove rel next/prev links
        remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
    }
);


// Unregister default widgets

/**
 *
 *
 * @link https://codex.wordpress.org/Function_Reference/unregister_widget
 */
add_action(
    'widgets_init', function () {
//        unregister_widget('WP_Widget_Archives');
//        unregister_widget('WP_Widget_Media_Audio');
        unregister_widget('WP_Widget_Calendar');
//        unregister_widget('WP_Widget_Categories');
//        unregister_widget('WP_Widget_Custom_HTML');
//        unregister_widget('WP_Widget_Media_Gallery');
//        unregister_widget('WP_Widget_Media_Image');
        unregister_widget('WP_Widget_Meta');
//        unregister_widget('WP_Nav_Menu_Widget');
//        unregister_widget('WP_Widget_Pages');
        unregister_widget('WP_Widget_Recent_Comments');
//        unregister_widget('WP_Widget_Recent_Posts');
//        unregister_widget('WP_Widget_RSS');
//        unregister_widget('WP_Widget_Search');
//        unregister_widget('WP_Widget_Tag_Cloud');
//        unregister_widget('WP_Widget_Text');
//        unregister_widget('WP_Widget_Media_Video');
    }, 11
);


// Add Featured Images to RSS Feeds

function rss_post_thumbnail($content) {
global $post;
if(has_post_thumbnail($post->ID)) {
$content = '<p>' . get_the_post_thumbnail($post->ID) .
'</p>' . get_the_content();
}
return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');


// ----------------------------------------------------------------------------------------------------------------------
/* Your code goes above here. */

?>

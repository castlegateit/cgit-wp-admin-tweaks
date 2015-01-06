<?php

/*

Plugin Name: Castlegate IT WP Admin Tweaks
Plugin URI: http://github.com/castlegateit/cgit-wp-admin-tweaks
Description: Minor tweaks to the WordPress admin panel.
Version: 1.0
Author: Castlegate IT
Author URI: http://www.castlegateit.co.uk/
License: MIT

*/

/**
 * Includes
 */
require_once dirname( __FILE__ ) . '/settings.php';

/**
 * Hide admin toolbar
 *
 * Hide the admin toolbar for all users. This will override any per-user admin
 * toolbar settings.
 */
if ( get_option('cgit_admin_hide_toolbar') ) {
    show_admin_bar(FALSE);
}

/**
 * Edit welcome message
 *
 * Replace "Howdy" with something a bit more professional or nothing at all.
 */
function cgit_admin_edit_welcome_message ($toolbar) {

    $user    = wp_get_current_user();
    $name    = $user->display_name;
    $account = $toolbar->get_node('my-account');
    $text    = sprintf( get_option('cgit_admin_welcome_message'), $name );
    $title   = preg_replace("/[^<>]*{$name}[^<>]*/i", $text, $account->title);
    $node    = array( 'id' => 'my-account', 'title' => $title );

    $toolbar->add_node($node);

}

if ( get_option('cgit_admin_edit_welcome_message') ) {
    add_filter('admin_bar_menu', 'cgit_admin_edit_welcome_message', 25);
}

/**
 * Hide menu items
 */
function cgit_admin_hide_menu_items () {

    if ( ! current_user_can('manage_options') ) {

        if ( get_option('cgit_admin_hide_menu_posts') )      remove_menu_page('edit.php');                // Posts
        if ( get_option('cgit_admin_hide_menu_media') )      remove_menu_page('upload.php');              // Media
        if ( get_option('cgit_admin_hide_menu_links') )      remove_menu_page('link-manager.php');        // Links
        if ( get_option('cgit_admin_hide_menu_pages') )      remove_menu_page('edit.php?post_type=page'); // Pages
        if ( get_option('cgit_admin_hide_menu_comments') )   remove_menu_page('edit-comments.php');       // Comments
        if ( get_option('cgit_admin_hide_menu_profile') )    remove_menu_page('profile.php');             // Profile
        if ( get_option('cgit_admin_hide_menu_tools') )      remove_menu_page('tools.php');               // Tools

        if ( get_option('cgit_admin_hide_menu_categories') ) remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category'); // Posts | Categories
        if ( get_option('cgit_admin_hide_menu_tags') )       remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag'); // Posts | Tags

    }

}

add_action('admin_menu', 'cgit_admin_hide_menu_items');

/**
 * Hide update notifications
 */
function cgit_admin_hide_update_notifications () {
    if ( ! current_user_can('manage_options') ) {
        remove_action('admin_notices', 'update_nag', 3);
    }
}

if ( get_option('cgit_admin_hide_update_notifications') ) {
    add_action('admin_menu', 'cgit_admin_hide_update_notifications');
}

/**
 * Hide media controls
 *
 * Prevents users from inserting inline media in the content editor by removing
 * the media button.
 */
function cgit_admin_hide_media_buttons () {
    remove_action('media_buttons', 'media_buttons');
}

if ( get_option('cgit_admin_hide_media_buttons') ) {
    add_action('admin_head', 'cgit_admin_hide_media_buttons');
}

/**
 * Hide editor buttons
 *
 * Removes presentational HTML buttons from the TinyMCE content editor. See
 * http://www.tinymce.com/wiki.php/Buttons/controls for a complete list of
 * buttons.
 */
function cgit_admin_hide_editor_buttons ($buttons) {

    $old_buttons = array('forecolor', 'indent', 'justifycenter', 'justifyfull', 'justifyleft', 'justifyright', 'outdent', 'strikethrough', 'underline', 'wp_more');
    $new_buttons = array_diff($buttons, $old_buttons);

    return $new_buttons;

}

if ( get_option('cgit_admin_hide_editor_buttons') ) {
    add_filter('mce_buttons', 'cgit_admin_hide_editor_buttons');
    add_filter('mce_buttons_2', 'cgit_admin_hide_editor_buttons');
}

/**
 * Hide additional block level elements in editor
 *
 * Restricts block level elements to <p>, <h2>, <h3>, and <h4> in the content
 * editor.
 */
function cgit_admin_hide_block_elements ($init) {
    $init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4';
    return $init;
}

if ( get_option('cgit_admin_hide_block_elements') ) {
    add_filter('tiny_mce_before_init', 'cgit_admin_hide_block_elements');
}

/**
 * Force plain text paste
 *
 * Prevent pasting of formatted text in the content editor. Based on code by
 * Till Kruess at http://www.tillkruess.com.
 */
function cgit_admin_force_plain_text ($init) {

    global $tinymce_version;

    if ( $tinymce_version[0] < 4 ) {
        $init['paste_text_sticky'] = TRUE;
        $init['paste_text_sticky_default'] = TRUE;
    } else {
        $init['paste_as_text'] = TRUE;
    }

    return $init;

}

function cgit_admin_load_paste_in_teeny ($plugins) {
    $plugins[] = 'paste';
    return $plugins;
}

function cgit_admin_hide_plain_text_button ($buttons) {

    $old_buttons = array('pastetext');
    $new_buttons = array_diff($buttons, $old_buttons);

    return $new_buttons;

}

if ( get_option('cgit_admin_force_plain_text') ) {
    add_filter('tiny_mce_before_init', 'cgit_admin_force_plain_text');
    add_filter('teeny_mce_before_init', 'cgit_admin_force_plain_text');
    add_filter('teeny_mce_plugins', 'cgit_admin_load_paste_in_teeny');
    add_filter('teeny_mce_plugins', 'cgit_admin_load_paste_in_teeny');
    add_filter('mce_buttons', 'cgit_admin_hide_plain_text_button');
    add_filter('mce_buttons_2', 'cgit_admin_hide_plain_text_button');
}

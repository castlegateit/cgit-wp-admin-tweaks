<?php

if ( ! defined('WP_UNINSTALL_PLUGIN') ) {
    exit();
}

if ( get_option('cgit_admin_uninstall_delete_settings') ) {

    delete_option('cgit_admin_hide_toolbar');
    delete_option('cgit_admin_edit_welcome_message');
    delete_option('cgit_admin_welcome_message');
    delete_option('cgit_admin_hide_menu_posts');
    delete_option('cgit_admin_hide_menu_media');
    delete_option('cgit_admin_hide_menu_links');
    delete_option('cgit_admin_hide_menu_pages');
    delete_option('cgit_admin_hide_menu_comments');
    delete_option('cgit_admin_hide_menu_categories');
    delete_option('cgit_admin_hide_menu_tags');
    delete_option('cgit_admin_hide_menu_profile');
    delete_option('cgit_admin_hide_menu_tools');
    delete_option('cgit_admin_hide_update_notifications');
    delete_option('cgit_admin_hide_media_buttons');
    delete_option('cgit_admin_hide_editor_buttons');
    delete_option('cgit_admin_hide_block_elements');
    delete_option('cgit_admin_force_plain_text');
    delete_option('cgit_admin_uninstall_delete_settings');

}

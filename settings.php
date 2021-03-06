<?php

/**
 * Register settings
 */
function cgit_admin_register_settings () {

    register_setting('cgit_admin', 'cgit_admin_hide_toolbar');
    register_setting('cgit_admin', 'cgit_admin_edit_welcome_message');
    register_setting('cgit_admin', 'cgit_admin_welcome_message');
    register_setting('cgit_admin', 'cgit_admin_hide_menu_posts');
    register_setting('cgit_admin', 'cgit_admin_hide_menu_media');
    register_setting('cgit_admin', 'cgit_admin_hide_menu_links');
    register_setting('cgit_admin', 'cgit_admin_hide_menu_pages');
    register_setting('cgit_admin', 'cgit_admin_hide_menu_comments');
    register_setting('cgit_admin', 'cgit_admin_hide_menu_categories');
    register_setting('cgit_admin', 'cgit_admin_hide_menu_tags');
    register_setting('cgit_admin', 'cgit_admin_hide_menu_themes');
    register_setting('cgit_admin', 'cgit_admin_hide_menu_plugins');
    register_setting('cgit_admin', 'cgit_admin_hide_menu_profile');
    register_setting('cgit_admin', 'cgit_admin_hide_menu_users');
    register_setting('cgit_admin', 'cgit_admin_hide_menu_tools');
    register_setting('cgit_admin', 'cgit_admin_hide_menu_settings');
    register_setting('cgit_admin', 'cgit_admin_hide_update_notifications');
    register_setting('cgit_admin', 'cgit_admin_user_whitelist');
    register_setting('cgit_admin', 'cgit_admin_hide_media_buttons');
    register_setting('cgit_admin', 'cgit_admin_hide_editor_buttons');
    register_setting('cgit_admin', 'cgit_admin_hide_block_elements');
    register_setting('cgit_admin', 'cgit_admin_force_plain_text');
    register_setting('cgit_admin', 'cgit_admin_uninstall_delete_settings');

}

/**
 * Add settings page
 */
function cgit_admin_add_settings_page () {

    add_submenu_page('options-general.php', 'WP Admin Tweaks', 'WP Admin Tweaks', 'manage_options', 'cgit-wp-admin-tweaks', 'cgit_admin_settings_page');
    add_action('admin_init', 'cgit_admin_register_settings');

}

add_action('admin_menu', 'cgit_admin_add_settings_page');

/**
 * Render settings page
 */
function cgit_admin_settings_page () {

    ?><div class="wrap">

        <h2>WP Admin Tweaks</h2>

        <form action="options.php" method="post">

            <?php settings_fields('cgit_admin'); ?>

            <h3>Interface</h3>

            <table class="form-table">

                <tr>
                    <th>
                        Hide toolbar
                    </th>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_toolbar" value="1"<?php echo get_option('cgit_admin_hide_toolbar') ? ' checked="checked"' : ''; ?> />
                            Hide toolbar for all users when viewing the site
                        </label>
                    </td>
                </tr>

                <tr>
                    <th>
                        Edit welcome message
                    </th>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_edit_welcome_message" value="1"<?php echo get_option('cgit_admin_edit_welcome_message') ? ' checked="checked"' : ''; ?> />
                            Edit the welcome message (default "Howdy,")
                        </label>
                    </td>
                </tr>

                <tr>
                    <th>
                        <label for="welcome_message">Welcome message text</label>
                    </th>
                    <td>
                        <input type="text" name="cgit_admin_welcome_message" id="cgit_admin_welcome_message" value="<?php echo htmlspecialchars(get_option('cgit_admin_welcome_message')); ?>" />
                        <p class="description">This will replace the welcome message in the admin toolbar. Use <code>%s</code> as a placeholder for the current user&rsquo;s display name.</p>
                    </td>
                </tr>

                <tr>
                    <th rowspan="5">
                        Hide main menus
                    </th>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_menu_posts" value="1"<?php echo get_option('cgit_admin_hide_menu_posts') ? ' checked="checked"' : ''; ?> />
                            Posts
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_menu_media" value="1"<?php echo get_option('cgit_admin_hide_menu_media') ? ' checked="checked"' : ''; ?> />
                            Media
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_menu_links" value="1"<?php echo get_option('cgit_admin_hide_menu_links') ? ' checked="checked"' : ''; ?> />
                            Links
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_menu_pages" value="1"<?php echo get_option('cgit_admin_hide_menu_pages') ? ' checked="checked"' : ''; ?> />
                            Pages
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_menu_comments" value="1"<?php echo get_option('cgit_admin_hide_menu_comments') ? ' checked="checked"' : ''; ?> />
                            Comments
                        </label>
                    </td>
                </tr>

                <tr>
                    <th rowspan="2">
                        Hide taxonomy menus
                    </th>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_menu_categories" value="1"<?php echo get_option('cgit_admin_hide_menu_categories') ? ' checked="checked"' : ''; ?> />
                            Categories
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_menu_tags" value="1"<?php echo get_option('cgit_admin_hide_menu_tags') ? ' checked="checked"' : ''; ?> />
                            Tags
                        </label>
                    </td>
                </tr>

                <tr>
                    <th rowspan="6">
                        Hide options menus
                    </th>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_menu_themes" value="1"<?php echo get_option('cgit_admin_hide_menu_themes') ? ' checked="checked"' : ''; ?> />
                            Appearance
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_menu_plugins" value="1"<?php echo get_option('cgit_admin_hide_menu_plugins') ? ' checked="checked"' : ''; ?> />
                            Plugins
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_menu_profile" value="1"<?php echo get_option('cgit_admin_hide_menu_profile') ? ' checked="checked"' : ''; ?> />
                            Profile
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_menu_users" value="1"<?php echo get_option('cgit_admin_hide_menu_users') ? ' checked="checked"' : ''; ?> />
                            Users
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_menu_tools" value="1"<?php echo get_option('cgit_admin_hide_menu_tools') ? ' checked="checked"' : ''; ?> />
                            Tools
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_menu_settings" value="1"<?php echo get_option('cgit_admin_hide_menu_settings') ? ' checked="checked"' : ''; ?> />
                            Settings
                        </label>
                    </td>
                </tr>

            </table>

            <h3>Notifications</h3>

            <table class="form-table">

                <tr>
                    <th>
                        Hide notifications
                    </th>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_update_notifications" value="1"<?php echo get_option('cgit_admin_hide_update_notifications') ? ' checked="checked"' : ''; ?> />
                            Hide update notifications for non-admin users
                        </label>
                    </td>
                </tr>

            </table>

            <h3>Users</h3>

            <table class="form-table">

                <tr>
                    <th>
                        Whitelist
                    </th>
                    <td>
                        <label>
                            <input type="text" name="cgit_admin_user_whitelist" id="cgit_admin_user_whitelist" value="<?php echo htmlspecialchars(get_option('cgit_admin_user_whitelist')); ?>" />
                            Approved users
                            <p class="description">By default, items are hidden for non-admin users. Providing a comma-separated list of user IDs here also hides items for other admin users.</p>
                        </label>
                    </td>
                </tr>

            </table>

            <h3>Editor</h3>

            <table class="form-table">

                <tr>
                    <th rowspan="3">
                        Hide editor controls
                    </th>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_media_buttons" value="1"<?php echo get_option('cgit_admin_hide_media_buttons') ? ' checked="checked"' : ''; ?> />
                            Media button
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_editor_buttons" value="1"<?php echo get_option('cgit_admin_hide_editor_buttons') ? ' checked="checked"' : ''; ?> />
                            Presentational markup controls
                        </label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_hide_block_elements" value="1"<?php echo get_option('cgit_admin_hide_block_elements') ? ' checked="checked"' : ''; ?> />
                            Extra block level elements (<code>h1</code>, <code>pre</code>, <code>address</code>, etc.)
                        </label>
                    </td>
                </tr>

                <tr>
                    <th>
                        Paste as text
                    </th>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_force_plain_text" value="1"<?php echo get_option('cgit_admin_force_plain_text') ? ' checked="checked"' : ''; ?> />
                            Force paste as plain text
                        </label>
                    </td>
                </tr>

            </table>

            <h3>Plugin</h3>

            <table class="form-table">

                <tr>
                    <th>
                        Settings
                    </th>
                    <td>
                        <label>
                            <input type="checkbox" name="cgit_admin_uninstall_delete_settings" value="1"<?php echo get_option('cgit_admin_uninstall_delete_settings') ? ' checked="checked"' : ''; ?> />
                            Delete settings on plugin uninstall
                        </label>
                    </td>
                </tr>

            </table>

            <?php submit_button(); ?>

        </form>

    </div><?php

}

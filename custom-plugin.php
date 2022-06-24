<?php

/**
 * Plugin Name: Custom plugin
 * Plugin URI: https://custom-plugin.com
 * description: custom plugin description
 * Version: 1.0.0
 * Author: MD Hemal Akhand
 * Author URI: hemalrika.com
 */
define("PLUGIN_DIR_PATH", plugin_dir_path(__FILE__) );
define("PLUGIN_URL", plugins_url());
function my_custom_plugin_output() {
    require PLUGIN_DIR_PATH.'/view/add-new.php';
}
function my_custom_plugin_output_page() {
    require PLUGIN_DIR_PATH.'/view/add-new-page.php';

}
function cp_admin_menu_func() {
    add_menu_page(
        __( 'Custom Plugin', 'textdomain' ),
        'custom plugin',
        'manage_options',
        'custom-plugin',
        'my_custom_plugin_output',
        'dashicons-controls-skipback',
        6,
    );
    add_submenu_page(
        'custom-plugin',
        __('Add New', 'textdomain'),
        __('Add New', 'textdomain'),
        'manage_options',
        'custom-plugin',
        'my_custom_plugin_output'
    );
    add_submenu_page(
        'custom-plugin',
        __('Add New Page', 'textdomain'),
        __('Add New Page', 'textdomain'),
        'manage_options',
        'add-new-page',
        'my_custom_plugin_output_page'
    );
}
add_action('admin_menu', 'cp_admin_menu_func');

function cp_manage_assets() {
    wp_enqueue_style('custom-css', PLUGIN_URL.'/custom-plugin/assets/css/style.css', array(), time());
    wp_enqueue_script('custom-js', PLUGIN_URL.'/custom-plugin/assets/js/script.js', array(), time(), true);
    // ajax
    wp_localize_script('custom-js', 'ajaxurl', admin_url( 'admin-ajax.php' ));
}
add_action('admin_enqueue_scripts', 'cp_manage_assets');


/**
 * create db table if plugin install
 */
function cp_create_plugin_table() {
    global $wpdb;
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $sql = "CREATE TABLE `wp_custom_table` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `address` text NOT NULL,
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    dbDelta( $sql );
}
register_activation_hook( __FILE__, 'cp_create_plugin_table' );
/**
 * remove db table if plugin uninstall
 */
function cp_drop_plugin_table() {
    global $wpdb;
    $wpdb->query("DROP table IF Exists wp_custom_table");
}
register_uninstall_hook( __FILE__, 'cp_drop_plugin_table' );
register_deactivation_hook( __FILE__, 'cp_drop_plugin_table' );
/**
 * Create plugin default page on install
 */
function cp_create_plugin_page() {
    echo "hello";
    $args = array();
    $args['post_type'] = 'page';
    $args['post_status'] = 'publish';
    $args['post_title'] = 'Custom Plugin Page';
    $args['post_content'] = 'This is post content';
    wp_insert_post( $args );
}

register_activation_hook( __FILE__, 'cp_create_plugin_page' );

if(isset($_REQUEST['action'])) {
    switch($_REQUEST['action']) {
        case 'custom_plugin':
            add_action('admin_init', 'ajax_action_file_add');
            function ajax_action_file_add() {
                global $wpdb;
                include_once PLUGIN_DIR_PATH.'/view/ajax-handler.php';
            }
            break;
    }
}

function wp_send_data_to_db_func() {
    print_r($_REQUEST);
    die();
}
add_action('wp_ajax_wp_send_data_to_db', 'wp_send_data_to_db_func');
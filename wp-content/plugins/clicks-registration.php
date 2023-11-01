<?php

/*

Plugin Name: Clicks Registration

Description: Registra cliques em um botão e armazena no banco de dados WordPress.

*/
function create_click_history_table() {

    global $wpdb;
    $table_name = $wpdb->prefix . 'click_history';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        click_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    dbDelta($sql);

}

function custom_button_shortcode() {
    return '<form method="post"><button type="submit" name="clicked">Clique Aqui</button></form>';
}

function register_click() {

    if (isset($_POST['clicked'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'click_history';

        $wpdb->insert(
            $table_name,
            array('click_time' => current_time('mysql', 1))
        );
    }

}

add_shortcode('custom_button', 'custom_button_shortcode');
add_action('init', 'register_click');

register_activation_hook(__FILE__, 'create_click_history_table');
<?php

/*

Plugin Name: Clicks Report

Description: Disponibiliza dados dos cliks salvos no banco de dados WordPress.

*/
function click_report_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'click_history';
    $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY click_time DESC");

    echo '<div class="wrap">';
    echo '<h1>Relatório de Cliques</h1>';

    if ($results) {
        echo '<table class="wp-list-table widefat fixed striped">';
        echo '
        <thead>
            <tr>
                <th>ID</th>
                <th>Click time</th>
            </tr>
        </thead>
        ';
        echo '<tbody>';

        foreach ($results as $result) {
            $click_time = strtotime($result->click_time);
            $formatted_time = date('d/m/Y H:i:s', $click_time);

            echo '<tr>';
            echo '<td>' . $result->id . '</td>';
            echo '<td>' . $formatted_time . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>Nenhum registro encontrado.</p>';
    }

    echo '</div>';
}


function add_click_report_page() {
    add_menu_page('Relatório de Cliques', 'Relatório de Cliques', 'manage_options', 'click-report', 'click_report_page');
}

function click_report_cli( $args, $assoc_args ) {

    global $wpdb;
    $table_name = $wpdb->prefix . 'click_history';

    $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY click_time DESC LIMIT 10");

    if ($results) {
        foreach ($results as $result) {
            WP_CLI::line("ID: {$result->id} - Click Time: {$result->click_time}");
        }
    } else {
        WP_CLI::line('Nenhum registro encontrado.');
    }
}

if ( defined( 'WP_CLI' ) && WP_CLI ) {
    WP_CLI::add_command( 'click-report', 'click_report_cli' );
}

add_action('admin_menu', 'add_click_report_page');
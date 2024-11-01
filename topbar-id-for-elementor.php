<?php
/*
Plugin Name: Topbar ID for Elementor
Description: Topbar ID navigation with highlighting
Version: 1.0.1
Author: Reyzua
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) {
    exit;
}
define('TOPBAR_ID_PATH', plugin_dir_path(__FILE__));
define('TOPBAR_ID_URL', plugin_dir_url(__FILE__));
define('TOPBAR_ID_VERSION', '1.0.0');
function topbar_id_element_enqueue_scripts()
{
    wp_enqueue_style(
        'topbar-id-elementor-style',
        TOPBAR_ID_URL . 'assets/custom-topbar.css',
        [],
        TOPBAR_ID_VERSION
    );

    wp_enqueue_script(
        'topbar-id-elementor-script',
        TOPBAR_ID_URL . 'assets/custom-topbar.js',
        ['jquery'],
        TOPBAR_ID_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'topbar_id_element_enqueue_scripts');
function register_topbar_id_widget($widgets_manager)
{
    require_once(TOPBAR_ID_PATH . 'widgets/custom-topbar-widget.php');
    $widgets_manager->register(new \topbar_id_widget());
}
add_action('elementor/widgets/register', 'register_topbar_id_widget');

function topbar_id_elementor_dependency_notice()
{
    if (!did_action('elementor/loaded')) {
        add_action('admin_notices', function () {
            $message = sprintf(
                /* translators: 1: This plugin name 2: Elementor plugin name 3: Link to elementor plugin*/
                esc_html__('"%1$s" requires "%2$s" to be installed and activated. "&3$s"', 'topbar-id-elementor'),
                '<strong>Topbar ID - Elementor</strong>',
                '<strong>Elementor</strong>',
                '<a href="https://wordpress.org/plugins/elementor/" target="_blank">
                    <strong>
                        Click this for detail
                    </strong>
                </a>'
            );
            echo '<div class="notice notice-warning is-dismissible"><p>' . wp_kses_post($message) . '</p></div>';
        });
        return;
    }
}
add_action('plugins_loaded', 'topbar_id_elementor_dependency_notice');
<?php
/**
 * Plugin Name:       WooCommerce Manually Add Review
 * Plugin URI:        https://studioslash.nl/plugins/woocommerce-manually-add-review
 * Description:       Adds ad admin page to manually add reviews to WooCommerce products.
 * Version:           1.0.0
 * Author:            Studio Slash
 * Author URI:        https://studioslash.nl
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woocommerce-manually-add-review
 */

/*  Copyright 2023 Joris W. van Rijn – Studio Slash (email: joris@studioslash.nl)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('admin_menu', function () {
    add_submenu_page(
        'edit.php?post_type=product',
        'Nieuwe beoordeling',
        'Nieuwe beoordeling',
        'manage_options',
        'add-review',
        'woocommerce_manually_add_review_display',
        10
    );
});

add_action('admin_enqueue_scripts', function () {
    wp_register_script('custom_wp_admin_js', plugin_dir_url(__FILE__) . 'js/tailwind.js', false, '1.0.0');
    wp_enqueue_script('custom_wp_admin_js');

    wp_register_script('custom_wp_admin_js_config', plugin_dir_url(__FILE__) . 'js/config.js', false, '1.0.0');
    wp_enqueue_script('custom_wp_admin_js_config');
});

function woocommerce_manually_add_review_display()
{
    include plugin_dir_path(__FILE__) . 'woocommerce-manually-add-review-display.php';
}
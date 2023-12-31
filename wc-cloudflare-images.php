<?php
/*
 * Plugin Name:       WooCommerce Cloudflare Images
 * Plugin URI:        https://github.com/thomas-lysens/wc-cloudflare-images
 * Description:       Use Cloudflare Images (CDN) for product images/galleries for better performance!
 * Version:           0.1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Thomas Lysens
 * Author URI:        https://github.com/thomas-lysens
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Update URI:        wc-cloudflare-images
 * Text Domain:       wc-cloudflare-images
 * Domain Path:       /languages
 */
// Plug-in activation
function wcci_activate() {
    require plugin_dir_path(__FILE__) . "includes/wcci-activation.php";
}

register_activation_hook( __FILE__, "wcci_activate" );

// Plug-in deactivate
function wcci_deactivate() {
    
}

register_deactivation_hook( __FILE__, "wcci_deactivate" );
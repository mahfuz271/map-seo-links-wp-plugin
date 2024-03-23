<?php
/*
Plugin Name: Map SEO Links
Description: This plugin fixes the issue with Google Maps Marker SEO links.
Version: 1.0
Author: Mahfuzar Rahman
Author URI: https://fiverr.com/mahfuzar
*/

// Activation Hook: Perform tasks upon plugin activation
register_activation_hook(__FILE__, 'custom_google_maps_plugin_activate');

function custom_google_maps_plugin_activate() {
    // Add activation tasks here
}

// Deactivation Hook: Perform tasks upon plugin deactivation
register_deactivation_hook(__FILE__, 'custom_google_maps_plugin_deactivate');

function custom_google_maps_plugin_deactivate() {
    // Add deactivation tasks here
}

// Include additional files
require_once plugin_dir_path(__FILE__) . 'class/MapOutputModifier.php';
require_once plugin_dir_path(__FILE__) . 'class/MarkerRenderer.php';
require_once plugin_dir_path(__FILE__) . 'settings.php';

use MapOutputModifier;
use MarkerRenderer;

// Define functions
function custom_wpgooglemaps_map_div_output($output, $map_div_id) {
    // Check if the checkbox is checked
    $map_seo_links_enable = get_option('map_seo_links_enable');
    
    // If the checkbox is checked, modify the output
    if ($map_seo_links_enable == '1' || $map_seo_links_enable===false) {
		return MapOutputModifier::custom_wpgooglemaps_map_div_output($output, $map_div_id);
	}
	
	return $output;
}

// Hook your filter function into the wpgooglemaps_filter_map_div_output filter hook
add_filter('wpgooglemaps_filter_map_div_output', 'custom_wpgooglemaps_map_div_output', 10, 2);

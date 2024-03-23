<?php

// Add a setting in the general settings page
function map_seo_links_settings_init() {
    add_settings_section(
        'map_seo_links_general_settings_section',
        'Map SEO Links Settings',
        'map_seo_links_general_settings_section_callback',
        'general'
    );

    add_settings_field(
        'map_seo_links_enable',
        'Map SEO Links',
        'map_seo_links_enable_callback',
        'general',
        'map_seo_links_general_settings_section'
    );

    // Register the setting with a default value of '1' (enabled)
    register_setting('general', 'map_seo_links_enable', array(
        'type' => 'string',
        'default' => '1' // Set the default value to '1' (enabled)
    ));
}
add_action('admin_init', 'map_seo_links_settings_init');

// Settings section callback
function map_seo_links_general_settings_section_callback() {
    echo '';
}

// Enable callback function
function map_seo_links_enable_callback() {
    // Retrieve the current value of the option
    $option = get_option('map_seo_links_enable');
    // Output the radio buttons
    ?>
    <fieldset>
        <label><input type="radio" name="map_seo_links_enable" value="1" <?php checked('1', $option); ?> /> Enable</label><br>
        <label><input type="radio" name="map_seo_links_enable" value="0" <?php checked('0', $option); ?> /> Disable</label>
    </fieldset>
    <?php
}

// Save the setting
function map_seo_links_save_settings() {
    if (isset($_POST['map_seo_links_enable'])) {
        update_option('map_seo_links_enable', $_POST['map_seo_links_enable']);
    }
}
add_action('admin_init', 'map_seo_links_save_settings');
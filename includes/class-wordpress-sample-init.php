<?php

/**
 * @author: Codingmasster
 */
class WordpressSampleInit {
    /*
     * In this you can register all the action which you want to perform when a user activates the plugin
     */

    public function activate() {
        try {
            // check for dependencies if any
            // create tables if you need any
        } catch (Exception $ex) {
            wp_die(__('Something went wrong. Please try again.', 'masterslider-sidebar'));
        }
    }

    public function register_calls() {
        $hooks = new WordpressSampleHooks();
        $hooks->register();
    }

    public function register_wordpress_sample_menus() {
        // you can update the below sample entry as per your needs
        add_menu_page('<menu title>', '<plugin name>', '<user role>', '<url slug>', array('<class object>', '<function>'), '<menu icon>');
    }

    public function register_wordpress_sample_admin_assets() {

        wp_register_script("<unique script name>", plugins_url("<asset path>"), array("<dependencies>"), "<version>");
        wp_register_style("<unique style name>", plugins_url("<asset path>"), "<version>");

        wp_enqueue_script("<above defined unique script name>");
        wp_enqueue_style("<above defined unique style name>");

        /*
         * This is not complusory but if you want to use a lot of dynamic stuff in your JS which 
         * you cannot do there you can pass all those values using wp_localize_script
         */
        wp_localize_script('<above defined unique script name>', '<object name>', array('<object attributes>' => '<attribute value>'));
    }

    public function register_wordpress_sample_public_assets() {
        // same stuff will be done here as we have done for the admin assets
    }

}

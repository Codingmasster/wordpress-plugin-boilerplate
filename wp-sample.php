<?php

/**
 * Wordpress Sample Plugin
 *
 * Plugin Name:       Sample Plugin
 * Description:       This is just a sample to help you with getting started a WP Plugin using OOP
 * Version:           1.0
 * Author:            Codingmasster
 * Tested up to:      4.8
 */
if (!defined('ABSPATH')) {
    exit;
}

// Abort loading if WordPress is upgrading
if (defined('WP_INSTALLING') && WP_INSTALLING) {
    return;
}

/* * *************************** */
include_once( plugin_dir_path(__FILE__) . 'models/class-wordpres-sample-model.php');
include_once( plugin_dir_path(__FILE__) . 'includes/class-wordpres-sample.php');
include_once( plugin_dir_path(__FILE__) . 'includes/class-wordpres-sample-hooks.php');
include_once( plugin_dir_path(__FILE__) . 'includes/class-wordpres-sample-init.php');

// register your activation hook here
register_activation_hook(__FILE__, array('WordpressSampleInit', 'activate'));

// add some stuff which you want to execute when the WP is initialized
add_action('init', array('WordpressSampleInit', 'register_calls'));

// register your ADMIN side menus
add_action('admin_menu', array('WordpressSampleInit', 'register_wordpress_sample_menus'));

// register your admin side view assets
add_action('admin_enqueue_scripts', array('WordpressSampleInit', 'register_wordpress_sample_admin_assets'));

// register your user / front end view assets
add_action('wp_enqueue_scripts', array('WordpressSampleInit', 'register_wordpress_sample_public_assets'));

/******************************/

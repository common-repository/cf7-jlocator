<?php

    /**
     * User: Daniel Schmitzer (daschmi@daschmi.de)
     * Date: 25.08.17
     * Time: 14:08
     *
     * Plugin Name: ContactForm7jLocator
     * Plugin URI: https://daschmi.de/jlocator-positions-und-adressbestimmung-mittels-gps-google-maps-und-jquery/
     * Description: This plugin integrates the jLocator script into a ContactForm7 form.
     * Version: 1.0
     * Author: Daniel Schmitzer
     * Author URI: https://daschmi.de/
     * Text Domain: cf7-jlocator
     */

    define('CFJL_ROOTFILE', __FILE__);
    define('CFJL_ROOT', dirname(__FILE__));

    require_once CFJL_ROOT.'/classes/Renderer.class.php';
    require_once CFJL_ROOT.'/classes/Action.class.php';
    require_once CFJL_ROOT.'/classes/Wpcf7.class.php';

    add_action('admin_menu', array('\cfjl\Action', 'admin_menu'));
    add_action('wp_enqueue_scripts', array('\cfjl\Action', 'wp_enqueue_scripts'));
    add_action('init', array('\cfjl\Action', 'init'));
    add_action('wp_footer', array('\cfjl\Action', 'wp_footer'));
    add_action('plugins_loaded', array('\cfjl\Action', 'plugins_loaded'));

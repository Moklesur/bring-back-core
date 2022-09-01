<?php
/*
Plugin Name: Bring Back Core
Plugin URI: https://themetim.com/
Description: Bring back core contains all the functionality of bring back theme.
Author: themetim
Author URI: https://themetim.com
Version: 1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;
define( 'BRING_BACK_VERSION', '1.0.0' );
define( 'BRING_BACK_PLUG_DIR', dirname(__FILE__).'/' );
define('BRING_BACK_PLUG_URL', plugin_dir_url(__FILE__));

function bringback_framework_init_check() {
    require_once BRING_BACK_PLUG_DIR .'/includes/index.php';
    require_once BRING_BACK_PLUG_DIR .'/vendor/index.php';
}

add_action( 'plugins_loaded', 'bringback_framework_init_check' );

if (class_exists('ELEMENTOR')){
    add_action( 'template_redirect', function() {
        $instance = \Elementor\Plugin::$instance->templates_manager->get_source( 'local' );
        remove_action( 'template_redirect', [ $instance, 'block_template_frontend' ] );
    }, 9 );
}

?>
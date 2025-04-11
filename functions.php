<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if (!function_exists('chld_thm_cfg_locale_css')):
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');

if (!function_exists('child_theme_configurator_css')):
    function child_theme_configurator_css()
    {
        wp_enqueue_style('chld_thm_cfg_child', trailingslashit(get_stylesheet_directory_uri()) . 'style.css', array('buddyboss_legacy', 'bb_theme_block-buddypanel-style-css', 'redux-extendify-styles', 'buddyboss-theme-fonts', 'buddyboss-theme-magnific-popup-css', 'buddyboss-theme-select2-css', 'buddyboss-theme-css', 'buddyboss-theme-template', 'buddyboss-theme-buddypress'));
    }
endif;
add_action('wp_enqueue_scripts', 'child_theme_configurator_css', 10);

// END ENQUEUE PARENT ACTION

function my_theme_enqueue_styles()
{
    wp_enqueue_style('my-theme-extra-style', get_theme_file_uri('app.css'));
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

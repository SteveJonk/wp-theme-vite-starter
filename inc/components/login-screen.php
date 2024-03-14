<?php

function ourHeaderURL()
{
    return esc_url(site_url('/'));
}

add_filter('login_headerurl', 'ourHeaderURL');

function customLoginCss()
{
    wp_enqueue_style('theme_main_css', get_stylesheet_uri());
}

add_action('login_enqueue_scripts', 'customLoginCss');
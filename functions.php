<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
	exit;

// functions.php is empty so you can easily track what code is needed in order to Vite + Tailwind JIT run well


// Main switch to get frontend assets from a Vite dev server OR from production built folder
// it is recommended to move it into wp-config.php
define('IS_VITE_DEVELOPMENT', true);


require_once "inc/inc.vite.php";

// Include needed functions
require_once "inc/components/login-screen.php";
require_once "inc/components/navbar.php";
require_once "inc/components/sidebars.php";
require_once "inc/components/group-block-style.php";
require_once "inc/components/image-block-style.php";
require_once "inc/style-editor.php";

// Include Gutenberg Blocks
require_once "inc/gutenberg-blocks/example-block/example-block.php";

function theme_support()

{
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('responsive-embeds');
	add_theme_support('wp-block-styles');
	add_theme_support('appearance-tools');
	add_theme_support('align-wide');
	add_theme_support('editor-styles');

	register_nav_menu('headerMenuLocation', 'Header Menu Location');
	add_editor_style('editor.css');
}

add_action('after_setup_theme', 'theme_support');

function replace_all_nbsp_with_space($content)
{
	// Replace all forms of non-breaking space with a regular space
	return str_replace(
		["&nbsp;", "\u{00A0}", "\xC2\xA0"],
		' ',
		$content
	);
}

add_filter('the_content', 'replace_all_nbsp_with_space', 20);
add_filter('the_title', 'replace_all_nbsp_with_space', 20);
add_filter('the_excerpt', 'replace_all_nbsp_with_space', 20);

// workaround for host firewall blocking /wp-json/batch/v1. Remove once the host whitelists it.
add_action('rest_api_init', function () {
    $server = rest_get_server();
    $routes = $server->get_routes();
    if (empty($routes['/batch/v1'][0])) return;

    register_rest_route('solar/v1', '/multi', [
        'methods'             => 'POST',
        'callback'            => [$server, 'serve_batch_request_v1'],
        'permission_callback' => '__return_true', // same as core; each sub-request checks its own permissions
        'args'                => $routes['/batch/v1'][0]['args'],
    ]);
}, 99);

add_action('admin_enqueue_scripts', function () {
    wp_add_inline_script('wp-api-fetch', "wp.apiFetch.use(function(o,n){if(o.path&&o.path.indexOf('/batch/v1')===0){o.path=o.path.replace('/batch/v1','/solar/v1/multi');}return n(o);});");
});

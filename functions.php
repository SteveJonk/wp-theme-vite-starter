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

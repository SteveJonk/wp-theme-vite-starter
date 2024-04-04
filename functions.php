<?php

// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

// functions.php is empty so you can easily track what code is needed in order to Vite + Tailwind JIT run well


// Main switch to get frontend assets from a Vite dev server OR from production built folder
// it is recommended to move it into wp-config.php
define('IS_VITE_DEVELOPMENT', true);


include "inc/inc.vite.php";

// Include needed functions
include "inc/components/login-screen.php";
include "inc/components/navbar.php";
include "inc/components/sidebars.php";
include "inc/components/group-block-style.php";
include "inc/components/image-block-style.php";

function theme_support()
    
{
	add_theme_support('woocommerce');
	add_theme_support('wp-block-styles');
	add_theme_support('appearance-tools');
	add_theme_support('align-wide');
}

add_action('after_setup_theme', 'theme_support');

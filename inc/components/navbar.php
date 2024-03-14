<?php

function customizer_add_image($wp_customize)
{

  // Add New Section

  $wp_customize->add_section('navbar', array(
    'title' => 'Navigatiebalk',
    'description' => 'Navbar settings',
    'priority' => '40'
  ));

  // Add Settings 
  $wp_customize->add_setting('navbar_logo', array(
    'default' => '',
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options'
  ));

  // Add Controls
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'navbar_logo', array(
    'label' => 'Navbar logo',
    'section' => 'navbar',
    'settings' => 'navbar_logo'
  )));
}

add_action('customize_register', 'customizer_add_image');
<?php

function theme_customize_register($wp_customize)
{
    $wp_customize->add_section('theme_colors', array(
        'title'    => __('Kleuren', 'van-rooijen'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('theme_primary_color', array(
        'default'   => '#1F3A93',
        'transport' => 'refresh',
    ));

    $wp_customize->add_setting('theme_secondary_color', array(
        'default'   => '#CCE6E6',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_primary_color', array(
        'label'    => __('Primair', 'van-rooijen'),
        'section'  => 'theme_colors',
        'settings' => 'theme_primary_color',
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_secondary_color', array(
        'label'    => __('Secundair', 'van-rooijen'),
        'section'  => 'theme_colors',
        'settings' => 'theme_secondary_color',
    )));
}
add_action('customize_register', 'theme_customize_register');

// Add changes to theme.json file
function filter_theme_json_theme($theme_json)
{
    $data = $theme_json->get_data();
    $existingPalette = $data['settings']['color']['palette']['theme'];

    $newPalette = array(
        array(
            'slug'  => 'primary',
            'color' => get_theme_mod('theme_primary_color', '#1F3A93'),
            'name'  => __('Primary', 'van-rooijen'),
        ),
        array(
            'slug'  => 'secondary',
            'color' => get_theme_mod('theme_secondary_color', '#CCE6E6'),
            'name'  => __('Secondary', 'van-rooijen'),
        ),
    );

    $bySlug = [];

    foreach ($existingPalette as $item) {
        $bySlug[$item['slug']] = $item;
    }

    foreach ($newPalette as $item) {
        $bySlug[$item['slug']] = $item;
    }

    $combinedPalette = array_values($bySlug);

    $new_data = array(
        'version'  => 3,
        'settings' => array(
            'color' => array(
                'palette'    => $combinedPalette,
            ),
        ),
    );

    return $theme_json->update_with($new_data);
}

add_filter('wp_theme_json_data_theme', 'filter_theme_json_theme');

// For dynamic CSS, to show in customizer preview
function mytheme_customize_css()
{
?>
    <style type="text/css">
        :root {
            --wp--preset--color--primary: <?php echo get_theme_mod('theme_primary_color', '#0073aa');
                                            ?>;
            --wp--preset--color--secondary: <?php echo get_theme_mod('theme_secondary_color', '#CCE6E6');
                                            ?>;
        }
    </style>
<?php
}
add_action('wp_head', 'mytheme_customize_css');

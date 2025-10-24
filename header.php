<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset='<?php bloginfo('charset') ?>'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" type="image/png" href="<?php echo get_site_icon_url(); ?>">
        <?php wp_head() ?>

    </head>

    <body <?php body_class() ?>>
        <?php wp_body_open(); ?>

        <header class="header">
            <div class="header__body container">
                <a id="js__open-nav" class="header__body__hamburger">
                    <svg height="25" width="25" fill="none" xmlns="http://www.w3.org/2000/svg"
                        viewBox="4.75 7.75 15.5 9.5">
                        <path
                            d="M5.5 7.75C5.08579 7.75 4.75 8.08579 4.75 8.5C4.75 8.91421 5.08579 9.25 5.5 9.25V7.75ZM19.5 9.25C19.9142 9.25 20.25 8.91421 20.25 8.5C20.25 8.08579 19.9142 7.75 19.5 7.75V9.25ZM5.5 11.75C5.08579 11.75 4.75 12.0858 4.75 12.5C4.75 12.9142 5.08579 13.25 5.5 13.25V11.75ZM17.5 13.25C17.9142 13.25 18.25 12.9142 18.25 12.5C18.25 12.0858 17.9142 11.75 17.5 11.75V13.25ZM5.5 15.75C5.08579 15.75 4.75 16.0858 4.75 16.5C4.75 16.9142 5.08579 17.25 5.5 17.25V15.75ZM12.5 17.25C12.9142 17.25 13.25 16.9142 13.25 16.5C13.25 16.0858 12.9142 15.75 12.5 15.75V17.25ZM5.5 9.25H19.5V7.75H5.5V9.25ZM5.5 13.25H17.5V11.75H5.5V13.25ZM5.5 17.25H12.5V15.75H5.5V17.25Z"
                            fill="currentColor"></path>
                    </svg>
                </a>
                <div class="header__body__logo">
                    <a href="<?php echo home_url() ?>"><img src="<?php echo get_theme_mod('navbar_logo'); ?>"
                            type="image/x-icon" alt="header logo" height="60" loading="eager"></a>
                </div>
                <div id="js__nav" class="header__body__navbar">
                    <a id="js__close-nav" class="header__body__navbar__close" href="#">
                        <svg height="25" width="25" viewBox="-2 -2 25 25">
                            <path d="M -2.5783352e-4,-0.00146808 17.435473,18.212367"
                                style="opacity:1;fill:currentColor;stroke:currentColor;stroke-width:3.23161912;stroke-linecap:round;stroke-miterlimit:4;fill-opacity:1;stroke-opacity:1" />
                            <path d="M -2.5783352e-4,18.212367 17.435473,-0.00146808"
                                style="opacity:1;fill:currentColor;stroke:currentColor;stroke-width:3.23161912;stroke-linecap:round;stroke-miterlimit:4;fill-opacity:1;stroke-opacity:1" />
                        </svg>
                    </a>
                    <?php wp_nav_menu(
                    array(
                        'theme_location' => 'headerMenuLocation',
                        'depth' => 2,
                        'container' => true,
                        'menu_id' => "navbar",
                    )

                ); ?>
                </div>
            </div>
            </div>
        </header>

        <main class="main-content">
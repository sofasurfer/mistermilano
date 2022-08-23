<!DOCTYPE html>
<html <?php language_attributes(); ?> id="open-navigation" class="close-navigation">
    <head>
        <?php
        $og_info = apply_filters('c_get_ogobj','');
        ?>
        <meta charset="utf-8">
        <title><?= $og_info['title']; ?></title>
        <meta name="author" content="cubegrafik GmbH">
        <meta name="description" content="<?= $og_info['description']; ?>">

        <meta property="og:locale" content="<?= $og_info['locale']; ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:title" content="<?= $og_info['title']; ?>"/>
        <meta property="og:description" content="<?= $og_info['description']; ?>"/>
        <meta property="og:image" content="<?= $og_info['image'][0]; ?>"/>
        <meta property="og:image:width" content="<?= $og_info['image'][1]; ?>" />
        <meta property="og:image:height" content="<?= $og_info['image'][2]; ?>" />

        <!-- favicon-->
        <link rel="apple-touch-icon" sizes="180x180" href="<?= apply_filters( 'get_file_from_dist', 'apple-touch-icon.png'); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= apply_filters( 'get_file_from_dist', 'favicon-32x32.png'); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= apply_filters( 'get_file_from_dist', 'favicon-16x16.png'); ?>">
        <link rel="mask-icon" href="<?= apply_filters( 'get_file_from_dist', 'safari-pinned-tab.svg'); ?>" color="#2e1aa9">
        <meta name="msapplication-TileColor" content="#2e1aa9">
        <meta name="theme-color" content="#ffffff">

        <!-- Preventing IE11 to request by default the /browserconfig.xml more than one time -->
        <meta name="msapplication-config" content="none">
        <!-- Disable touch highlighting in IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- Ensure edge compatibility in IE (HTTP header can be set in web server config) -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
        <!-- Force viewport width and pixel density. Plus, disable shrinking. -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Disable Skype browser-plugin -->
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">

        <?php wp_head(); ?>
    </head>
    <body>
        <!-- header-->
        <header class="c-header" role="banner">
            <!-- line vertical-->
            <span class="c-line-vertical"></span>
            <!-- header inner-->
            <div class="c-container-wide c-line-top c-line-bottom">
                <div class="c-container c-container-no-padding c-header-inner">
                    <div class="c-header-logo">
                        <a href="<?php echo get_home_url(); ?>">
                            <!-- TODO: seems to work with dev/dev:3010 -->
                            <span class="c-header-logo-stripes"><img src="<?= apply_filters( 'get_file_from_dist', 'images/logo-lanz-stripes.svg'); ?>" alt="Lanz Architekten" /></span>
                            <span class="c-header-logo-text"><img src="<?= apply_filters( 'get_file_from_dist', 'images/logo-lanz-text.svg'); ?>" alt="Lanz Architekten" /></span>
                        </a>
                    </div>
                    
                    <nav class="c-main-nav">
                        <!-- navigation -->
                        <?php wp_nav_menu( 
                            array( 
                                'theme_location'    => 'header-menu',
                                'container'         => false,
                                'menu_class'        => 'c-main-nav-list',
                            )
                        ); ?>                        
                    </nav>

                    <!-- offcanvas trigger-->
                    <a href="#open-navigation" class="c-offcanvas-trigger c-offcanvas-trigger-open">
                        <span class="c-hide-visually"><?= __('Menü öffnen','lanzarchitekten');?></span>
                    </a>
                </div>
            </div>
            
            <!-- offcanvas nav-->
            <nav class="c-offcanvas-nav">               
                <div class="c-offcanvas-inner">
                    <!-- line vertical-->
                    <span class="c-line-vertical"></span>
                    
                    <div class="c-container-wide c-offcanvas-header c-line-top c-line-bottom">
                        <div class="c-container c-container-no-padding c-header-inner">
                            <!-- offcanvas trigger-->
                            <a href="#" class="c-offcanvas-trigger c-offcanvas-trigger-close">
                                <span class="c-hide-visually"><?= __('Menu schliessen','lanzarchitekten');?></span>
                            </a>
                        </div>
                    </div>
                    
                    <div class="c-container c-offcanvas-content">
                        <div class="c-row">
                            <div class="c-col-12 c-text-padding">
                                <!-- navigation -->
                                <?php wp_nav_menu( 
                                    array( 
                                        'theme_location'    => 'header-menu',
                                        'container'         => false,
                                        'menu_class'        => 'c-main-nav-list',
                                    )
                                ); ?>  
                            </div>
                        </div>                      
                    </div>
                </div>
            </nav>
        </header>

        <!-- content-->
        <main class="c-content" role="main">
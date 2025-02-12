<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="container">
        <header class="site-header">
            <div class="title-search">
                <h1>
                    <a href="<?php echo home_url(); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
                <div class="header-search">
                    <?php get_search_form(); ?>
                </div>
            </div>
            <p><?php bloginfo('description'); ?>
                <?php if (is_page('my-projects')) { ?>
                    - thank you for viewing my projects
                <?php } ?>
            </p>

            <nav class="site-nav">
                <?php
                $args = array(
                    "theme_location" => "primary"
                )
                ?>
                <?php wp_nav_menu($args); ?>
            </nav>
        </header>
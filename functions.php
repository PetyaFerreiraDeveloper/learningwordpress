<?php

function learningWordpress_resources()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'learningWordpress_resources');

// Get top ancestor

function get_top_ancestor_id()
{
    global $post;
    if ($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    return $post->ID;
}

// Does page have children
function has_children()
{
    global $post;
    $pages = get_pages('child_of=' . $post->ID);
    return count($pages);
}

// Customize excerpt word count length
function custom_excerpt_length()
{
    if (is_front_page()) {
        return 8;
    }
    return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');

// Theme Setup
function learningWordPress_setup()
{
    // register nav menus
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
        'footer' => __('Footer Menu')
    ));

    // Add featured image support
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, true);
    add_image_size('banner-image', 920, 210, true);
    // add_image_size('banner-image', 920, 210, array('left', 'top'));

    // Add post format support
    add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}

add_action('after_setup_theme', 'learningWordPress_setup');


// Add Widget Locations

function ourWidgetsInit()
{
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar1',
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
    ));

    register_sidebar(array(
        'name' => 'Footer Area 1',
        'id' => 'footer1',
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
    ));
    register_sidebar(array(
        'name' => 'Footer Area 2',
        'id' => 'footer2',
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
    ));
    register_sidebar(array(
        'name' => 'Footer Area 3',
        'id' => 'footer3',
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
    ));
    register_sidebar(array(
        'name' => 'Footer Area 4',
        'id' => 'footer4',
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
    ));
}

add_action('widgets_init', 'ourWidgetsInit');

// Customize Appearance Options
function learningWordPress_customize_register($wp_customize)
{
    $wp_customize->add_setting('lwp_link_color', array(
        'default' => '#006ec3',
        'transport' => 'refresh',
    ));

    $wp_customize->add_setting('lwp_button_color', array(
        'default' => '#006ec3',
        'transport' => 'refresh',
    ));

    $wp_customize->add_setting('lwp_button_hover_color', array(
        'default' => '#005b9f',
        'transport' => 'refresh',
    ));

    $wp_customize->add_section('lwp_standard_colors', array(
        'title' => __('Standard Colors', 'LearningWordPress'),
        'priority' => 30,
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_link_color_control', array(
        'label' => __('Link Color', 'LearningWordPress'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_link_color',
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_button_color_control', array(
        'label' => __('Button Color', 'LearningWordPress'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_button_color',
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_button_hover_color_control', array(
        'label' => __('Button Hover Color', 'LearningWordPress'),
        'section' => 'lwp_standard_colors',
        'settings' => 'lwp_button_hover_color',
    )));
}

add_action('customize_register', 'learningWordPress_customize_register');

// Output Customize CSS
function learningWordPress_customize_css()
{ ?>
    <style type="text/css">
        a:link,
        a:visited {
            color: <?php echo get_theme_mod('lwp_link_color'); ?>;
        }

        header .site-nav ul li.current-menu-item a,
        header .site-nav ul li.current-page-ancestor a {
            background-color: <?php echo get_theme_mod('lwp_link_color'); ?>;
        }

        .header-search #searchsubmit,
        .wp-block-search__button.wp-element-button {
            background-color: <?php echo get_theme_mod('lwp_button_color'); ?>;
            color: white;
        }

        .header-search #searchsubmit:hover,
        .wp-block-search__button.wp-element-button:hover {
            background-color: <?php echo get_theme_mod('lwp_button_hover_color'); ?>;
            color: white;
        }
    </style>

<?php }

add_action('wp_head', 'learningWordPress_customize_css');

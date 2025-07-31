<?php

/**
 * Organic Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Organic
 */

if (! function_exists('organic_theme_scripts')) :
    /**
     * Enqueue scripts and styles.
     */
    function organic_theme_scripts()
    {
        // Enqueue Google Fonts
        wp_enqueue_style(
            'organic-google-fonts',
            'https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap',
            array(),
            null
        );

        // Enqueue Swiper CSS from CDN
        wp_enqueue_style(
            'swiper-css',
            'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css',
            array(),
            '9.0.0' // Version number for Swiper
        );

        // Enqueue Bootstrap CSS from CDN
        wp_enqueue_style(
            'bootstrap-css',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css',
            array(),
            '5.3.0', // Version number for Bootstrap
            'all',
            array(
                'integrity'  => 'sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ',
                'crossorigin' => 'anonymous',
            )
        );

        // Enqueue local vendor CSS (from assets/css)
        wp_enqueue_style(
            'organic-vendor-css',
            get_template_directory_uri() . '/assets/css/vendor.css',
            array(),
            '1.0.0' // Theme version or asset version
        );

        // Enqueue theme's main stylesheet (assumed to be in theme root, or adjust path if in assets/css)
        wp_enqueue_style(
            'organic-style',
            get_template_directory_uri() . '/assets/css/style.css',
            array(),
            '1.0.0' // Theme version
        );

        // --- JavaScripts ---

        // Deregister WordPress's default jQuery to use our custom version
        wp_deregister_script('jquery');

        // Enqueue custom jQuery (from assets/js)
        wp_enqueue_script(
            'jquery-custom',
            get_template_directory_uri() . '/assets/js/jquery-1.11.0.min.js',
            array(), // No dependencies for jQuery itself
            '1.11.0', // Version number for your custom jQuery
            true // Load in footer
        );

        // Enqueue Swiper JS from CDN
        wp_enqueue_script(
            'swiper-js',
            'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js',
            array(),
            '9.0.0',
            true // Load in footer
        );

        // Enqueue Bootstrap JS from CDN (now depends on 'jquery-custom')
        wp_enqueue_script(
            'bootstrap-js',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js',
            array('jquery-custom'), // Dependency on your custom jQuery
            '5.3.0',
            true // Load in footer
        );

        // Enqueue local plugins JS (from assets/js, depends on 'jquery-custom')
        wp_enqueue_script(
            'organic-plugins-js',
            get_template_directory_uri() . '/assets/js/plugins.js',
            array('jquery-custom'), // Dependency on your custom jQuery
            '1.0.0',
            true // Load in footer
        );

        // Enqueue theme's main script (from assets/js, depends on all previous scripts)
        wp_enqueue_script(
            'organic-script',
            get_template_directory_uri() . '/assets/js/script.js',
            array('jquery-custom', 'bootstrap-js', 'swiper-js', 'organic-plugins-js'), // Dependencies
            '1.0.0',
            true // Load in footer
        );
    }
endif;
add_action('wp_enqueue_scripts', 'organic_theme_scripts');

// Remove default WordPress title tag to add custom one via theme support
remove_action('wp_head', '_wp_render_title_tag', 1);

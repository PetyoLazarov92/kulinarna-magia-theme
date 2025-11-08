<?php
/**
 * Kulinarna Magia Theme Functions
 *
 * @package Kulinarna_Magia
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme setup
 */
function kulinarna_magia_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );

    // Register navigation menus
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'kulinarna-magia' ),
            'footer'  => __( 'Footer Menu', 'kulinarna-magia' ),
        )
    );

    // Switch default core markup to output valid HTML5
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for custom logo
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 100,
            'width'       => 100,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );
}
add_action( 'after_setup_theme', 'kulinarna_magia_setup' );

/**
 * Enqueue scripts and styles
 */
function kulinarna_magia_scripts() {
    // Main stylesheet
    wp_enqueue_style( 'kulinarna-magia-style', get_stylesheet_uri(), array(), '1.0.0' );

    // Main script
    wp_enqueue_script( 'kulinarna-magia-script', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );

    // Comments reply
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'kulinarna_magia_scripts' );

/**
 * Register widget areas
 */
function kulinarna_magia_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Footer Widget Area 1', 'kulinarna-magia' ),
            'id'            => 'footer-1',
            'description'   => __( 'Appears in the footer section', 'kulinarna-magia' ),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer Widget Area 2', 'kulinarna-magia' ),
            'id'            => 'footer-2',
            'description'   => __( 'Appears in the footer section', 'kulinarna-magia' ),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer Widget Area 3', 'kulinarna-magia' ),
            'id'            => 'footer-3',
            'description'   => __( 'Appears in the footer section', 'kulinarna-magia' ),
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'kulinarna_magia_widgets_init' );

/**
 * Custom excerpt length
 */
function kulinarna_magia_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'kulinarna_magia_excerpt_length' );

/**
 * Custom excerpt more
 */
function kulinarna_magia_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'kulinarna_magia_excerpt_more' );

/**
 * Add favicon to head
 */
function kulinarna_magia_favicon() {
    echo '<link rel="icon" type="image/svg+xml" href="' . esc_url( get_template_directory_uri() . '/assets/images/favicon.svg' ) . '">' . "\n";
    echo '<link rel="alternate icon" type="image/svg+xml" href="' . esc_url( get_template_directory_uri() . '/assets/images/favicon.svg' ) . '">' . "\n";
}
add_action( 'wp_head', 'kulinarna_magia_favicon' );

/**
 * Load theme text domain
 */
function kulinarna_magia_load_textdomain() {
    load_theme_textdomain( 'kulinarna-magia', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'kulinarna_magia_load_textdomain' );

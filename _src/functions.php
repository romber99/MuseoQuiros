<?php
/**
 * Theme functions and definitions
 * @package quiros-theme
 * 
 * 1. Enqueue scripts and styles
 * 2. Theme feature support setup
 * 3. Custom post types & ACF
 * 4. Utility
 * 
 */

// ----------------------------------
//  1. Enqueue scripts and styles
// ----------------------------------


add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');
function custom_enqueue_scripts() {
    // Styles
    wp_enqueue_style('swiper', get_stylesheet_directory_uri() . '/assets/swiper/swiper-bundle.min.css', array(), "1.0", 'all');
    wp_enqueue_style('tabler-icons', get_stylesheet_directory_uri() . '/assets/tabler-icons/tabler-icons.min.css', array(), "1.0", 'all');
    wp_enqueue_style('main', get_stylesheet_uri(), array(), "1.0", 'all');

    // Scripts
    wp_enqueue_script('swiper-js', get_stylesheet_directory_uri() . '/assets/swiper/swiper-bundle.min.js', array(), '1.0', true );
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/scripts/main.js', array(), '1.0', true );

}

/* Theme customizer */
// require_once (get_stylesheet_directory() . '/customizer.php');

// ----------------------------------
//  2. Theme feature support setup
// ----------------------------------

add_action('after_setup_theme', 'custom_theme_setup');
function custom_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('html5',array('gallery','caption'));
    register_nav_menus( array(
        'top'   => esc_html__('Barra de navegación superior', 'quiros-theme'),
        'footer-cols'   => esc_html__('Columnas en pie de página', 'quiros-theme'),
    ) );
}

// ----------------------------------
//  3. Custom post types & ACF
// ----------------------------------


// WP
require_once WP_CONTENT_DIR . '/themes/quiros-theme/theme-config/utility.php';
require_once WP_CONTENT_DIR . '/themes/quiros-theme/theme-config/custom-post-types.php';
require_once WP_CONTENT_DIR . '/themes/quiros-theme/theme-config/shortcodes.php';

// ACF
$files = glob(WP_CONTENT_DIR . '/themes/quiros-theme/theme-config/acf/{*.php,*/*.php}', GLOB_BRACE);
foreach ($files as $file) {
    require_once $file;
}

// Set ACF google maps key
function custom_acf_init() {
    acf_update_setting('google_api_key', get_field('google_maps_api_key', 'options'));
}
add_action('acf/init', 'custom_acf_init');

// ----------------------------------
//  4. Utility
// ----------------------------------

add_filter('body_class', 'custom_bodyclass_add_browser_classes');
function custom_bodyclass_add_browser_classes( $classes ){
    global $is_gecko, $is_IE, $is_opera, $is_safari, $is_chrome; // Wordpress global variables with browser information
 
    if( $is_chrome ) { $classes[] = 'chrome'; }
    elseif( $is_gecko ){ $classes[] = 'gecko'; } 
    elseif( $is_opera ) { $classes[] = 'opera'; }
    elseif( $is_safari ) { $classes[] = 'safari'; }
    elseif( $is_IE ) { $classes[] = 'internet-explorer'; }
    return $classes;
}

add_filter('excerpt_more', 'custom_custom_excerpt_more');
function custom_custom_excerpt_more() {
    return '...';
}

add_filter('excerpt_length', 'custom_custom_excerpt_length');
function custom_custom_excerpt_length() {
    return 20;
}

// Removes comments from admin menu
add_action('admin_menu', 'custom_remove_admin_menus', 999);
function custom_remove_admin_menus() {
    remove_menu_page('edit-comments.php');
    remove_menu_page('edit.php?post_type=acf-field-group');
}

function custom_security_headers() {
    /* header( 'Strict-Transport-Security: max-age=31536000; includeSubDomains' );
    header( "Content-Security-Policy: default-src 'self' 'unsafe-inline'; connect-src 'self'; font-src fonts.gstatic.com;"); 
    header( 'X-Frame-Options: SAMEORIGIN' );
    header( 'X-Content-Type-Options: nosniff' );
    header( 'Referrer-Policy: unsafe-url' );
    header( 'Permissions-Policy: geolocation=(self), microphone=()' ); */
}
add_action( 'send_headers', 'custom_security_headers' );

// flush_rewrite_rules(); ?>
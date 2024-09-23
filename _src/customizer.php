<?php
/**
 * Registers options with the Theme Customizer
 *
 * @param      object    $wp_customize    The WordPress Theme Customizer
 * @package    quiros-theme
 */

// add_action( 'customize_register', 'almansa_customize_register', 11);

// function almansa_customize_register( $wp_customize ) {
//     /**
//      * INDEX
//      * 
//      * 1. Front page settings
//      * 
//      */

//     // ----------------------------------
//     //  1. Front page settings
//     // ----------------------------------

//     // Front page header image
//     $wp_customize->add_setting('almansa_front_page_header_image',
//     array(
//         'default' => '',
//         'transport' => 'refresh',
//         'sanitize_callback' => 'esc_url_raw'
//         )
//     );
//     $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'almansa_front_page_header_image',
//     array(
//         'label' => 'Header image',
//         'description' => 'Imagen de cabecera',
//         'section' => 'static_front_page',
//         )
//     ) );
    
//     // Front page header image alt text
//     $wp_customize->add_setting('almansa_front_page_header_alt',
//     array(
//         'default'           => 'Lorem ipsum',
//         'sanitize_callback' => 'sanitize_text_field',
//         'transport'         => 'refresh',
//         )
//     );
//     $wp_customize->add_control('almansa_front_page_header_alt', 
//     array(
//         'label'       => 'Header image alt text',
//         'description' => 'Descripción textual de la imagen de cabecera, para lectores de web',
//         'type'        => 'text',
//         'section'     => 'static_front_page',
//         ) 
//     );

//     // Front page header title, subtitle and description
//     $wp_customize->add_setting('almansa_front_page_header_title',
//     array(
//         'default'           => 'My website',
//         'sanitize_callback' => 'sanitize_text_field',
//         'transport'         => 'refresh',
//         )
//     );
//     $wp_customize->add_control('almansa_front_page_header_title', 
//     array(
//         'label'       => 'Header title',
//         'description' => 'Título de la cabecera',
//         'type'        => 'text',
//         'section'     => 'static_front_page',
//         ) 
//     );
//     $wp_customize->add_setting('almansa_front_page_header_subtitle',
//     array(
//         'default'           => 'Lorem ipsum',
//         'sanitize_callback' => 'sanitize_text_field',
//         'transport'         => 'refresh',
//         )
//     );
//     $wp_customize->add_control('almansa_front_page_header_subtitle', 
//     array(
//         'label'       => 'Header subtitle',
//         'description' => 'Subtítulo de la cabecera',
//         'type'        => 'text',
//         'section'     => 'static_front_page',
//         ) 
//     );
// }
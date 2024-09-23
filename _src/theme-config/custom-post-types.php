<?php

function custom_register_custom_post_types(){
    /* register_post_type( 'robot',
        array(
            'labels'  => array(
                'name'           => 'Robots',
                'singular_name'  => 'Robot',
                'add_new'        => 'Añadir',
                'add_new_item'   => 'Añadir nuevo robot',
                'edit_item'      => 'Editar robot',
                'all_items'      => 'Todos los robots',
                'not_found'      => 'No se ha encontrado ningún robot',
            ),
            'menu_icon'             => 'dashicons-reddit',
            'public'                => true,
            'exclude_from_search'   => false,
            'has_archive'           => true,
            'hierarchical'          => false,
            'show_in_rest'          => true,
            'supports'              => array( 'title', 'custom-fields', 'page-attributes', 'author' ),
        )
    ); */
}
add_action('init', 'custom_register_custom_post_types'); ?>
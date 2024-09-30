<?php

function custom_register_custom_post_types(){
    register_taxonomy( 'video_category', 'video', 
        array(
            'labels'  => array(
                'name'           => 'Categorías de vídeos',
                'singular_name'  => 'Categoría de vídeo',
                'add_new'        => 'Añadir',
                'add_new_item'   => 'Añadir nueva categoría de vídeo',
                'edit_item'      => 'Editar categoría',
                'all_items'      => 'Todas las categorías de vídeos',
                'not_found'      => 'No se ha encontrado ninguna categoría',
            ),
            'public'            => true,
            'hierarchical'      => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'   => array(
                'slug' => 'categoria-video',
            ),
        )
    );
    
    register_post_type( 'video',
        array(
            'labels'  => array(
                'name'           => 'Vídeos',
                'singular_name'  => 'Vídeo',
                'add_new'        => 'Añadir',
                'add_new_item'   => 'Añadir nuevo vídeo',
                'edit_item'      => 'Editar vídeo',
                'all_items'      => 'Todos los vídeos',
                'not_found'      => 'No se ha encontrado ningún vídeo',
            ),
            'menu_icon'             => 'dashicons-video-alt',
            'public'                => true,
            'exclude_from_search'   => false,
            'has_archive'           => true,
            'hierarchical'          => false,
            'show_in_rest'          => true,
            'supports'              => array( 'title', 'custom-fields', 'revisions', 'author', 'editor', 'thumbnail' ),
        )
    );
}
add_action('init', 'custom_register_custom_post_types'); ?>
<?php
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Configurar tema',
        'menu_title'    => 'Configurar tema',
        'menu_slug'     => 'theme-options',
        'capability'    => 'edit_posts',
        'parent_slug'   => 'options-general.php',
        'position'      => false,
        'icon_url'      => 'dashicons-dashboard',
        'redirect'      => false
    ));
    acf_add_options_page(array(
        'page_title'    => 'Menú principal',
        'menu_title'    => 'Menú principal',
        'menu_slug'     => 'menu-options',
        'capability'    => 'edit_posts',
        'parent_slug'   => 'themes.php',
        'position'      => false,
        'icon_url'      => 'dashicons-dashboard',
        'redirect'      => false
    ));
}?>
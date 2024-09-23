<?php if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_card_element',
	'title' => 'Tarjeta',
	'fields' => array(
        array(
            'key' => 'field_card_img',
            'label' => 'Imagen',
            'name' => 'img',
            'type' => 'image',
            'return_format' => 'array',
            'library' => 'all',
            'preview_size' => 'thumbnail',
        ),
        array(
            'key' => 'field_card_title',
            'label' => 'Título',
            'name' => 'title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_card_text',
            'label' => 'Texto',
            'name' => 'text',
            'type' => 'wysiwyg',
        ),
        array(
            'key' => 'field_card_link',
            'label' => 'Enlace de la tarjeta',
            'instructions' => 'El enlace se aplicará tanto a la foto como al botón de Leer más.',
            'name' => 'link',
            'type' => 'link',
            'return_format' => 'array',
        ),
    ),
	'active' => true,
	'label_placement' => 'left',
	'show_in_rest' => 0,
));

endif;
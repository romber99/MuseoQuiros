<?php if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_media_element',
	'title' => 'Elemento multimedia',
	'fields' => array(
        array(
            'key' => 'field_media_element_type',
            'label' => '¿El archivo multimedia está alojado en la página, o es un link externo?',
            'instructions' => 'Un link externo puede ser, por ejemplo, un vídeo de YouTube',
            'name' => 'type',
            'type' => 'select',
            'default_value' => 'upload-file',
            'choices' => array(
                'upload-file' => 'Subir archivo o elegir de la galería de medios',
                'external-embed'  => 'Link externo',
            )
        ),
        array(
            'key' => 'field_media_element_file',
            'label' => 'Archivo de multimedia',
            'instructions' => 'Puede ser un archivo de imagen o vídeo',
            'name' => 'file',
            'type' => 'file',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_media_element_type',
                        'operator' => '==',
                        'value' => 'upload-file',
                    ),
                ),
            ),
            'return_format' => 'array',
            'library' => 'all',
            'mime_types' => '.jpg, .png, .gif, .webp, .mp4, .mov, .mpg, .avi, .ogv',
        ),
        array(
            'key' => 'field_media_element_embed',
            'label' => 'Embed',
            'name' => 'embed',
            'type' => 'oembed',
            'conditional_logic' => array(
                array(
                    array(
                        'field' => 'field_media_element_type',
                        'operator' => '==',
                        'value' => 'external-embed',
                    ),
                ),
            ),
        ),
    ),
	'active' => true,
	'label_placement' => 'left',
	'show_in_rest' => 0,
));

endif;
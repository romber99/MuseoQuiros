<?php if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_button_repeater',
	'title' => 'Grupo de botones',
	'fields' => array(
        array(
            'key' => 'field_button_repeater',
            'label' => 'Botones',
            'name' => 'btn_repeater',
            'instructions' => 'Si se deja vacío no aparecerá ningún botón.',
            'type' => 'repeater',
            'layout' => 'table',
            'sub_fields' => array(
                array(
                    'key' => 'field_button_repeater_button',
                    'label' => 'Botón',
                    'name' => 'link',
                    'type' => 'link',
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_button_repeater_button_class',
                    'label' => 'Estilo de botón',
                    'name' => 'class',
                    'type' => 'select',
                    'default_value' => 'btn-primary',
                    'choices' => array(
                        'btn-default'  => 'Color neutro',
                        'btn-primary' => 'Color sólido principal',
                        'btn-secondary'  => 'Color sólido secundario',
                    )
                ),
            ),
            'button_label' => 'Añadir botón',
        ),
    ),
	'active' => true,
	'label_placement' => 'left',
	'show_in_rest' => 0,
));

endif;
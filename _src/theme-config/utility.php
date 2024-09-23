<?php 

function get_arg($args, $arg_name, $default = false) {
    if (isset($args[$arg_name])) return $args[$arg_name];
    return $default;
}

function lit($string) {
    _e($string, "quiros-theme"); // Theme name hardcoded here to avoid unnecessary DB query
}

function generate_anchor($title) {
    $title = strip_tags($title);
    $title = str_replace(' ', '-', $title); // Replaces all spaces with hyphens.
    $title = preg_replace('/[^A-Za-z0-9\-]/', '', $title); // Removes special chars.
    return strtolower($title);
}

add_action('admin_init', 'custom_hide_editor');
function custom_hide_editor() {
    if (isset($_GET['post'])) $post_id = $_GET['post'];
    else if (isset($_POST['post_ID'])) $post_id = $_POST['post_ID'];

    if(!isset($post_id) || empty($post_id)) return;
 
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
     
    if($template_file == 'page-templates/template-flex-content.php' || $post_id == get_option('page_on_front')){
        remove_post_type_support('page', 'editor');
    }
}?>
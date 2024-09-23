<?php
/**
 * Header file for adding the <head> element and opening the <html> and <body> tags.
 * @package quiros-theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo get_field('head_tags', 'options'); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class('no-js');?>>
    <?php get_template_part('template-parts/navigation/navbar-top/navbar-top');?>
    <?php get_template_part('template-parts/header/pick-header');?>
    <?php //echo do_shortcode('[breadcrumbs]'); ?>
<?php
/**
 * Basic single post template
 * @package quiros-theme
 */

get_header(); ?>

<div class="page-content">
    <div id="main-content" class="container">
        <article class="post">
            <?php get_template_part('template-parts/header/post-header'); ?>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </article>
    </div>

    <?php $post_type = get_post_type(); $post_taxonomy = ($post_type == 'post') ? "category" : null; $post_terms = get_the_terms($post->ID, $post_taxonomy); $post_term = ($post_terms) ? $post_terms[0] : null;
    get_template_part('template-parts/content-block/recent-posts/recent-posts', null,
        array(
            'title'     => "Noticias relacionadas",
            'post_type' => $post_type,
            'post_taxonomy' => $post_taxonomy,
            'post_term' => $post_term->ID,
        )
    ); ?>
</div>

<?php get_footer(); ?>
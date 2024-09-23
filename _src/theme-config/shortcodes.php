<?php

function breadcrumbs() { 
    // Home > Blog/Post type archive > Category/Taxonomy/Parent post > Single post/page title ?>
    <nav class="breadcrumbs container">
        <?php if (!is_front_page()) : ?>
            <span class="crumb"><a href="<?php echo get_home_url(); ?>"><?php echo esc_attr(get_bloginfo('name')); ?></a></span>
        <?php endif; ?>
        
        <?php if (is_home()) : ?>
            <?php $blog_page = get_option('page_for_posts'); $title = get_the_title($blog_page); ?>
            <span class="crumb current"><?php echo $title; ?></span>
        <?php elseif (is_category() || is_singular('post')) : ?>
            <?php $blog_page = get_option('page_for_posts'); $title = get_the_title($blog_page); $url = get_page_link($blog_page); ?>
            <span class="crumb"><a href="<?php echo $url; ?>"><?php echo $title; ?></a></span>
        <?php endif; ?>

        <?php if (get_post_parent()): ?>
            <?php $title = get_the_title(get_post_parent()); $url = get_page_link(get_post_parent()); ?>
            <span class="crumb"><a href="<?php echo $url; ?>"><?php echo $title; ?></a></span>
        <?php endif; ?>

        <?php if (!is_home() && !is_archive()) : // If we aren't on an archive page (already handled before), add the post/page title ?>
            <span class="crumb current"><?php the_title(); ?></span>
        <?php elseif (is_category() || is_tax()) : // If we are on a taxonomy page, add the taxonomy title ?>
            <?php $term = get_queried_object(); $title = $term->name; ?>
            <span class="crumb current"><?php echo $title; ?></span>
        <?php endif; ?>
    </nav>
    <?php
}
add_shortcode('breadcrumbs','breadcrumbs');?>
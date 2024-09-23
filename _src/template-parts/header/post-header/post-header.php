<header id="post-header">
    <div class="container">
        <?php if ( has_post_thumbnail() ) :
            $thumbnail_id  = get_post_thumbnail_id($post->ID);
            $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            if (!$thumbnail_alt) $thumbnail_alt = get_the_title();
            
            if ($thumbnail_id) : ?>
                <img class="class-img" src="<?php the_post_thumbnail_url(); ?>" alt="<?php esc_html_e($thumbnail_alt); ?>">
            <?php endif; ?>
        <?php endif; ?>

        <?php  $title = get_the_title(); ?>
        <?php if ($title) : ?><h1><?php echo esc_html_e($title); ?></h1><?php endif; ?>

        <div class="post-info">
            <span class="date"><?php esc_html_e(get_the_date()); ?></span> | 
            <?php $cats = get_the_category(); ?>
            <?php if (!empty($cats)) : ?>
                <?php foreach ($cats as $cat) : ?>
                    <a href="<?php echo get_category_link($cat); ?>" class="chip"><?php echo $cat->name; ?></a>
                <?php endforeach; ?>
            <?php endif; ?> 
        </div>
    </div>
</header>
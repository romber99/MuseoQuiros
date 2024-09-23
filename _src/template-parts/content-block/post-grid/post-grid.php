<?php /* Component arguments */
$no_container = get_arg($args,'no_container'); ?>


<section id="<?php echo $post_type; ?>-grid">
    <?php if (!$no_container) : ?><div class="container"><?php endif; ?>
        <?php //get_template_part('template-parts/content-block/post-grid/category-nav'); ?>
        <header class="section-header">
            <h2>Actualidad</h2>
        </header>
        <?php if (have_posts()) : ?>
            <div class="post-grid">
                <?php while(have_posts()): ?>
                    <?php the_post(); ?>
                    <article class="post-card">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a class="post-image" href="<?php the_permalink(); ?>" title="<?php esc_html__(the_title_attribute()); ?>">
                                <?php the_post_thumbnail(); ?>
                            </a>
                        <?php endif; ?>
                        <div class="post-text">
                            <p class="date"><?php esc_html_e(get_the_date()); ?></p>
                            <h3><a href="<?php the_permalink(); ?>" title="<?php esc_html__(the_title_attribute()); ?>">
                                <?php esc_html__(the_title()); ?>
                            </a></h3>
                        </div>
                    </article>
                <?php endwhile;?>
            </div>
            <nav class="pagination">
                <?php echo paginate_links( array(
                    'current'      => max( 1, get_query_var( 'paged' ) ),
                    'prev_next'    => true,
                    'prev_text'    => '<i class="fas fa-chevron-left"></i>',
                    'next_text'    => '<i class="fas fa-chevron-right"></i>',
                ) );?>
            </nav>
        <?php else : ?>
            <div class="no-posts">
                <div><i class="fal fa-empty-set"></i> Parece que no hay publicaciones en esta categoría</div>
            </div>
        <?php endif; ?>
        <?php if (!$no_container) : ?></div><?php endif; ?>
</section>
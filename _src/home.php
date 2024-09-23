<?php
/**
 * Archive page template
 * @package quiros-theme
 */

get_header(); ?>

<main id="main-content">
    <div class="container">
        <div class="page-with-sidebar">
            <main id="main-content">
                <?php get_template_part('template-parts/content-block/post-grid/post-grid', null,
                        array(
                            'no_container'  => true
                        )
                    ); ?>
            </main>
            <!-- <aside class="page-sidebar">
                <div class="widget-container">
                    <div class="widget">
                        <h3>Categorías</h3>
                        <?php wp_list_categories(array(
                                'title_li'  => ''
                            )); ?>
                    </div>
                    <div class="widget">
                        <h3>Archivo de noticias</h3>
                        <?php wp_get_archives(); ?>
                    </div>
                </div>
            </aside> -->
        </div>
    </div>
</main>

<?php get_footer(); ?>
<?php
/**
 * Most basic page template for when there is no better template available
 * @package quiros-theme
 */

get_header(); ?>

<?php while( have_posts() ): ?>
    <?php the_post(); ?>
    <main id="main-content">
        <div class="container">
            <?php the_content(); ?>
        </div>
    </main>
<?php endwhile; ?>

<?php get_footer(); ?>
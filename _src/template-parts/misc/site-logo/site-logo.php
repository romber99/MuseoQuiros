<?php
/*
 * Custom site logo that links to the home page
 */
?>

<div class="site-logo">
    <?php if( has_custom_logo() ):  ?>
        <?php 
            $custom_logo_data = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
            $custom_logo_url = $custom_logo_data[0];
            $custom_logo_filetype = wp_check_filetype($custom_logo_url);
        ?>

        <a href="<?php echo esc_url(home_url('/')); ?>" 
           title="<?php echo esc_attr(get_bloginfo('name')); ?>" 
           rel="home">

            <img <?php if ($custom_logo_filetype != "svg") :?>class="style-svg" <?php endif;?>src="<?php echo esc_url($custom_logo_url); ?>" 
                 alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>

        </a>
    <?php else: ?>
        <div class="site-name">
            <a class="h1" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home"><?php bloginfo('name'); ?></a>
        </div>
    <?php endif; ?>
</div>
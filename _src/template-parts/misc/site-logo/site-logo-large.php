<?php
/*
 * Custom site logo that links to the home page
 */
?>

<div class="site-logo site-logo-large">
    <?php 
        $custom_logo_url =  get_stylesheet_directory_uri() . "/assets/logo_quiros.png";
    ?>

    <a href="<?php echo esc_url(home_url('/')); ?>" 
        title="<?php echo esc_attr(get_bloginfo('name')); ?>" 
        rel="home">

        <img src="<?php echo esc_url($custom_logo_url); ?>" 
                alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>

    </a>
</div>
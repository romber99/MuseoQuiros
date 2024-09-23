<?php $header = get_arg($args, "header");
if ($header) : 
    
    $title = $header["title"];
    $subtitle = $header["subtitle"]; ?>

    <header id="page-header">
        <div class="container">
            <?php if ($subtitle) : ?><p class="subtitle"><?php echo $subtitle; ?></p><?php endif; ?>
            <?php if (!is_front_page()) : ?>
                <a href="<?php echo get_home_url(); ?>"><?php echo esc_attr(get_bloginfo('name')); ?></a> »
            <?php endif; ?>
            <?php if ($title) : ?><h1><?php echo $title; ?></h1>
            <?php else : ?><h1><?php echo get_the_title(); ?></h1><?php endif; ?>
        </div>
    </header>
<?php endif; ?>
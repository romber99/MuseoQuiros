<?php /* Component arguments */
$title = get_arg($args,'title');
$subtitle = get_arg($args,'subtitle');
$text = get_arg($args,'text'); 
$features = get_arg($args,'features');
$bg_img = get_arg($args,'bg_img');
$btns = get_arg($args,'btns');
$order = get_arg($args,'order'); ?>

<section class="product-card content-section container <?php echo $order; ?>">
    <article class="product-info">
        <?php if($subtitle): ?>
            <p class="subtitle"><?php echo $subtitle; ?></p>
        <?php endif;?>
        <?php if($title): ?>
            <h2 id="<?php echo generate_anchor($title);?>"><?php echo $title; ?></h2>
        <?php endif;?>
        <?php if($text): ?>
            <div class="product-description"><?php echo $text; ?></div>
        <?php endif;?>
        <?php if($features): ?>
            <ul class="features-grid">
                <?php foreach($features as $f): ?> 
                    <li class="feature">
                        <?php if (array_key_exists("feature_icon", $f)) : ?>
                            <i class="ti ti-<?php echo $f["feature_icon"]; ?>"></i>
                        <?php endif;?>
                        <div class="feature-info">
                            <?php if (array_key_exists("feature_title", $f)) : ?>
                                <div class="feature-title"><?php echo $f["feature_title"]; ?></div>
                            <?php endif;?>
                            <?php if (array_key_exists("feature_subtitle", $f)) : ?>
                                <div class="feature-subtitle"><?php echo $f["feature_subtitle"]; ?></div>
                            <?php endif;?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif;?>
        <?php if ($btns) : ?>
            <?php get_template_part('template-parts/content-block/button-group/button-group', null,
                array(
                    'buttons'  => $btns,
                )
            );?>
        <?php endif; ?>
    </article>
    <?php if($bg_img): ?>
        <aside class="product-image">
            <?php if($bg_img): ?>
                <img class="product-bg" src="<?php echo $bg_img["url"]; ?>" alt="<?php // left empty so that screen readers ignore this element ?>">
            <?php endif;?>
            <!-- <?php if($hero_link): ?>
                <a href="<?php echo $hero_link['url']?>" class="btn btn-primary">
                    <span><?php echo $hero_link['title']?></span>
                </a>
            <?php endif;?> -->
        </aside>
    <?php endif;?>
</section>
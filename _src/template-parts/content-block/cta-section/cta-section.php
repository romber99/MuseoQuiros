<?php
    $title = get_arg($args,'title');
    $btns = get_arg($args,'btns');
    $bg_backdrop = get_arg($args,'bg_backdrop');
    $bg_backdrop_blur = get_arg($args,'bg_backdrop_blur');
    
    // Background media element
    $type = get_arg($args,'type');
    $media = get_arg($args,'media'); ?>

<section class="cta-section content-section">
    <div class="container animate slide-up-big">
        <?php if ($title) : ?><h2 id="<?php echo generate_anchor($title);?>"><?php echo $title; ?></h2><?php endif; ?>
        <?php if ($btns) : ?>
            <?php get_template_part('template-parts/content-block/button-group/button-group', null,
                array(
                    'buttons'  => $btns,
                )
            );?>
        <?php endif; ?>
    </div>
    <?php if($media): ?>
        <?php if ($bg_backdrop_blur) :?><div class="backdrop-blur"></div><?php endif; ?>
        <div class="section-background<?php if ($bg_backdrop) :?> backdrop-gradient-both<?php endif; ?>">
            <?php if (is_array($media) && $media['type'] == 'image') : ?>
            <?php get_template_part('template-parts/content-block/image/image-elm', null,
                array(
                    'img'  => $media,
                    'link' => null,
                    'background' => true
                )
            );?>
        <?php else : ?>
            <?php get_template_part('template-parts/content-block/video/video-elm', null,
                array(
                    'type'  => $type,
                    'video' => $media,
                    'autoplay' => true,
                    'no_controls' => true,
                    'muted' => true,
                    'loop' => true
                )
            );?>
        <?php endif; ?>
        </div>
    <?php endif; ?>
</section>
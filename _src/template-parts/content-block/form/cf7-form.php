<?php /* Component arguments */
$formID = get_arg($args,'formID');
$title = get_arg($args,'title');
$image = get_arg($args,'image');
$bg_backdrop = get_arg($args,'bg_backdrop');
$bg_backdrop_blur = get_arg($args,'bg_backdrop_blur');

// Background media element
$type = get_arg($args,'type');
$media = get_arg($args,'media'); ?>

<?php if ($formID) : ?>
    <section id="contact-form" class="content-section">
        <div class="container">
            <?php if ($image) :?>
                <aside class="form-image">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </aside>
            <?php endif; ?>
            <article class="form-column">
                <?php if ($title) :?>
                    <h2 id="<?php echo generate_anchor($title);?>"><?php echo $title; ?></h2>
                <?php endif; ?>
                <div class="form-container animate slide-left-big">
                    <?php echo do_shortcode('[contact-form-7 id="' . $formID . '"]'); ?>
                </div>
            </article>  
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
<?php endif; ?>
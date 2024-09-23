<?php /* Component arguments */
$type = get_arg($args,'type');
$video = get_arg($args,'video'); ?>

<?php if ($video) : ?>
    <section class="content-section media-video-section">
        <div class="container">
            <?php get_template_part('template-parts/content-block/video/video-elm', null,
                array(
                    'type'  => $type,
                    'video' => $video
                )
            );?>
        </div>
    </section>
<?php endif; ?>
<?php
    $title = get_arg($args,'title');
    $location = get_arg($args,'location');
    $api_key = get_field('google_maps_api_key', 'options');
    
    // Media element
    $type = get_arg($args,'type');
    $media = get_arg($args,'media'); ?>

<?php if ($api_key && $location) : ?>

    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api_key; ?>&callback=Function.prototype"></script>

    <section class="map-section content-section">
        <div class="container">
            <?php if ($title) : ?><h2 id="<?php echo generate_anchor($title);?>"><?php echo $title; ?></h2><?php endif; ?>
        </div>
        <main>
            <div class="acf-map" data-zoom="16">
                <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
            </div>
        </main>
        <?php if($media): ?>
            <aside class="media-elm animate slide-left-big">
                <?php if (is_array($media) && $media['type'] == 'image') : ?>
                    <?php get_template_part('template-parts/content-block/image/image-elm', null,
                        array(
                            'img'  => $media,
                            'link' => null
                        )
                    );?>
                <?php else : ?>
                    <?php get_template_part('template-parts/content-block/video/video-elm', null,
                        array(
                            'type'  => $type,
                            'video' => $media,
                            'autoplay' => false,
                            'no_controls' => false,
                            'muted' => false,
                            'loop' => false
                        )
                    );?>
                <?php endif; ?>
            </aside>
        <?php endif; ?>
    </section>

<?php endif; ?>
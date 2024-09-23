<?php /* Component arguments */
$title = get_arg($args, 'title');
$read_more = get_arg($args,'read_more');
$cards = get_arg($args,'cards');
$card_style = get_arg($args,'card_style'); ?>

<?php if ($cards) : ?>
    <section class="card-swiper-section content-section">
        <div class="container">
            <?php if ($title || $read_more): ?>
                <div class="section-header">
                    <?php if ($title): ?>
                        <h2 id="<?php echo generate_anchor($title);?>" class="animate slide-right"><?php echo $title; ?></h2>
                    <?php endif; ?>
                    <?php if ($read_more): ?>
                        <a href="<?php echo $read_more["url"]; ?>" class="btn btn-default btn-read-more animate fade-in"><span><?php echo $read_more["title"]; ?></span></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if (count($cards) > 3) : ?>
                    <div class="swiper card-swiper overflow-hidden animate slide-up-big">
                        <div class="swiper-wrapper">
                            <?php foreach ($cards as $card) : ?>
                                <div class="swiper-slide">
                                    <div class="slider-content"> 
                                    <?php get_template_part('template-parts/content-block/card-swiper/card', null,
                                        array(
                                            'img'  => $card['img'],
                                            'link' => $card['link'],
                                            'title' => $card['title'],
                                            'text' => $card['text'],
                                            'style' => $card_style
                                        )
                                    );?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
            <?php else : // If there's only one banner, don't use a swiper ?>
                <div class="card-row animate slide-up-big">
                    <?php foreach ($cards as $card) : ?>
                        <?php get_template_part('template-parts/content-block/card-swiper/card', null,
                            array(
                                'img'  => $card['img'],
                                'link' => $card['link'],
                                'title' => $card['title'],
                                'text' => $card['text'],
                                'style' => $card_style
                            )
                        );?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<?php /* Component arguments */
$cta = get_arg($args,'cta');
$swiper_size = get_arg($args,'size');
$banners = get_arg($args,'banners'); ?>

<?php if ($banners) : ?>
    <section class="swiper-section content-section">
        <?php if ($title): ?>
            <div class="container">
                <h2 id="<?php echo generate_anchor($title);?>"><?php echo $title; ?></h2>
            </div>
        <?php endif; ?>
        <?php if (count($banners) > 1) : // If there are multiple banners, use a swiper to show them all ?>
                <div class="swiper <?php echo $swiper_size; ?> overflow-hidden">
                    <div class="swiper-wrapper">
                        <?php foreach ($banners as $banner) : ?>
                            <?php $img = $banner['img']; $link = $banner['link']; ?> 
                            <div class="swiper-slide">
                                <div class="slider-content"> 
                                    <?php if ($link) : ?><a class="slide-img-link" href="<?php echo $link['url'];?>"><?php endif; ?>
                                    <img class="swiper-img" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                    <?php if ($link) : ?></a><?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-navigation">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
        <?php else : // If there's only one banner, don't use a swiper ?>
            <?php $banner = $banners[0];
            $img = $banner['img']; ?>    
            <img class="single-img" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
        <?php endif; ?>

        <?php if ($cta): ?>
            <div class="container">
                <a href="<?php echo $cta['url']?>" class="btn btn-primary">
                    <span><?php echo $cta['title']?></span>
                </a>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>
<?php $img = get_arg($args, 'img');
$link = get_arg($args, 'link');
$title = get_arg($args, 'title');
$text = get_arg($args, 'text');
$style = get_arg($args, 'style'); ?>

<article class="card <?php echo $style ?><?php if ($style == "hover" || $style == "image-full") : ?> backdrop-gradient-bottom<?php endif; ?>">
    <?php if ($link) : ?><a class="card-img-link" href="<?php echo $link['url']; ?>"><?php endif; ?>
        <img class="card-img" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
        <?php if ($link) : ?></a><?php endif; ?>
    <div class="card-text">
        <?php if ($title) : ?>
            <h3><?php echo $title; ?></h3>
        <?php endif; ?>
        <?php if ($text) : ?>
            <?php echo $text; ?>
        <?php endif; ?>
        <div class="card-link">
            <?php if ($link) : ?>
                <a class="btn btn-primary" href="<?php echo $link['url']; ?>">
                    <?php echo $link['title']; ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</article>
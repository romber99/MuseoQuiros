<?php /* Component arguments */
$img = get_arg($args,'img');
$link = get_arg($args,'link');
$background = get_arg($args,'background'); ?>

<?php if ($img) : ?>
    <?php if (!$background) : ?>
        <?php if ($link) : ?><a href="<?php echo $link; ?>"><?php endif; ?>
            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
        <?php if ($link) : ?></a><?php endif; ?>
    <?php else : ?>
        <div class="img-background" style="background-image: url('<?php echo $img['url']; ?>'); background-size: cover; "></div>
    <?php endif; ?>
<?php endif; ?>
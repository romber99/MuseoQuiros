<?php /* Component arguments */
$img = get_arg($args,'img');
$link = get_arg($args,'link');
?>

<?php if ($img) : ?>
    <section class="content-section media-image-section">
        <div class="container">
            <?php get_template_part('template-parts/content-block/image/image-elm', null,
                array(
                    'img'  => $img,
                    'link' => $link
                )
            );?>
        </div>
    </section>
<?php endif; ?>
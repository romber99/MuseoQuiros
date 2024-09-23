<?php /* Component arguments */
$type = get_arg($args,'type');
$video = get_arg($args,'video');
$autoplay = get_arg($args,'autoplay');
$no_controls = get_arg($args,'no_controls');
$muted = get_arg($args,'muted');
$loop = get_arg($args,'loop'); ?>

<?php if ($type == "upload-file" && $video) : ?>
    <?php $pathinfo = pathinfo($video['url']);
    $ext = $pathinfo['extension']; ?>

    <video <?php if ($autoplay) echo ' autoplay'; if (!$no_controls) echo ' controls'; if ($muted) echo ' muted'; if ($loop) echo ' loop'; ?>>
        <source src="<?php echo $video['url']; ?>" type="video/<?php echo $ext; ?>">
        <?php lit("Tu navegador no es capaz de reproducir este vídeo.") ?>
    </video>

<?php elseif ($type == "external-embed" && $video) : ?>
    <?php echo $video; ?>
<?php endif; ?>
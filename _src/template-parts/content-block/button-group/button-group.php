<?php /* Component arguments */
$buttons = get_arg($args,'buttons'); ?>

<div class="button-group">
    <?php foreach($buttons as $button) : if (array_key_exists("link", $button)) : ?>
        <a href="<?php echo $button['link']['url']?>" class="btn <?php echo $button['class']; ?>">
            <span><?php echo $button['link']['title']?></span>
        </a>
    <?php endif; endforeach; ?>
</div>
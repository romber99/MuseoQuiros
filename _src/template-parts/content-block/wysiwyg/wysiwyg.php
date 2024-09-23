<?php /* Component arguments */
$text_content   = get_arg($args,'content');
$bg_class       = get_arg($args,'bg_class'); ?>

<?php if ($text_content) : ?>
    <section class="content-section <?php echo $bg_class; ?>">
        <div class="container">
            <?php echo apply_filters('the_content', $text_content); ?>
        </div>
    </section>
<?php endif; ?>
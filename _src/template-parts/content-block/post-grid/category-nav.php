<?php
$categories = get_categories(array(
'orderby' => 'name',
'order'   => 'ASC',
'hide_empty' => false,
));

$parent_cats = array();
$child_cats = array();

if (is_category()) {
    $current_cat = get_category(get_queried_object_id());
    $current_root = 0;
    if ($current_cat->category_parent != 0) $current_root = $current_cat->category_parent;
    else $current_root = $current_cat->term_id;
}

foreach($categories as $category) {
    if($category->category_parent){
        if(isset($current_root) && $category->category_parent == $current_root) array_push($child_cats, $category);
    }else{
        array_push($parent_cats, $category);
    }
}
?>

<nav class="category-menu">
	<div class="parent-categories">
    <a class="category-link <?php if (get_option('page_for_posts') == get_queried_object_id()) echo "current"; ?>" href="<?php echo get_permalink(get_option('page_for_posts')); ?>" data-category="all">Blog</a>
		<?php foreach($parent_cats as $cat):?>
			<a class="category-link <?php if ($cat->term_id == $current_cat->term_id || $cat->term_id == $current_root) echo "current"; ?>" href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo $cat->name;?></a>
		<?php endforeach;?>
	</div>
	<div class="child-categories show">
		<?php foreach($child_cats as $cat):?>
			<a class="category-link <?php if ($cat->term_id == $current_cat->term_id) echo "current"; ?>" href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"><?php echo $cat->name;?></a>
		<?php endforeach;?>
	</div>
</nav>

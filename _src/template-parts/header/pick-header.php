<?php 
$header_type = "no-header";

if (is_home()) $pageID = get_option('page_for_posts');
else $pageID = get_the_ID();

$header_type = get_field("header_type", $pageID);
if (is_singular("post")) $header_type = "post-header";

$tp = 'template-parts/header/'; // Headers folder

switch ($header_type) {
    case "hero-header":
        get_template_part($tp . 'hero-header/hero-header', null,
            array(
                'header'     => get_field("hero_header", $pageID),
            )
        );
        break;
    case "simple-header":
        get_template_part($tp . 'page-header/page-header', null,
            array(
                'header'     => get_field("simple_header", $pageID),
            )
        );
        break;
    case "swiper-header":
        get_template_part($tp . 'swiper-header/swiper-header', null,
            array(
                'header'     => get_field("swiper_header", $pageID),
            )
        );
        break;
    case "post-header":
        get_template_part($tp . 'post-header/post-header', $pageID);
        break;
}?>
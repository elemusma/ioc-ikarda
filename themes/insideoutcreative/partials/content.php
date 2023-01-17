<?php
if(have_rows('builder')): while(have_rows('builder')): the_row();
$layout = get_sub_field('layout');

if($layout == 'Content'){

    if(have_rows('content_group')): while(have_rows('content_group')): the_row();
    echo '<section class="pt-5 pb-5 position-relative ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';
    
    $bgImage = get_sub_field('background_image');

    echo wp_get_attachment_image($bgImage['id'],'full','',['class'=>'w-100 h-100 position-absolute','style'=>'top:0;left:0;']);
    
    echo '<div class="container">';
    echo '<div class="row justify-content-center">';
    echo '<div class="col-lg-9 col-12 text-center text-white">';

    echo get_sub_field('content');
        
    echo '</div>';
    echo '</div>';
    echo '</div>';


    echo '</section>';

    endwhile; endif;

} elseif($layout == 'Premium Products') {

    if(have_rows('premium_products')): while(have_rows('premium_products')): the_row();

    echo '<section class="pb-5 position-relative ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    echo wp_get_attachment_image(230,'full','',['class'=>'w-100 h-100 position-absolute','style'=>'top:0;left:0;object-fit:cover;']);

    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-12 text-center">';

    echo '<div class="d-inline-block bg-accent text-white" style="
    clip-path: polygon(0 0, 100% 0, 90% 100%, 10% 100%);
    -ms-clip-path: polygon(0 0, 100% 0, 90% 100%, 10% 100%);
    -webkit-clip-path: polygon(0 0, 100% 0, 90% 100%, 10% 100%);
    -moz-clip-path: polygon(0 0, 100% 0, 90% 100%, 10% 100%);
    padding:25px 100px;
    ">';
    echo '<h2>' . get_sub_field('title') . '</h2>';
    echo '</div>';

    if(get_sub_field('content')){
        echo get_sub_field('content');
    }


    echo '</div>';
    echo '</div>';
    echo '</div>';

    
    $premiumProducts = get_sub_field('products');
    
    if( $premiumProducts ):
        echo '<div class="container-fluid">';
        echo '<div class="row pt-5">';
foreach( $premiumProducts as $post ): 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post);
echo '<a href="' . get_the_permalink() . '" class="col-lg-3 col-md-6 text-center col-premium-product" style="color:#66533b;">';
echo '<div class="position-relative">';

echo '<div class="position-absolute" style="width:75%;height:80%;top:8%;left:12.5%;background:#bfbfbf;mix-blend-mode:multiply;opacity:.42;pointer-events:none;"></div>';

echo '<div class="position-absolute" style="width:77%;height:81.25%;top:7.25%;left:11.5%;border:1px solid #737373;pointer-events:none;"></div>';

the_post_thumbnail('full',array('class'=>'w-auto','style'=>'height:650px;object-fit:contain;object-position:bottom;'));
echo '<span href="' . get_the_permalink() . '" class="bold h4 mt-4 d-block" style="">' . get_the_title() . '</span>';
// echo '<hr class="mt-2">';

echo '<div class="position-absolute d-flex align-items-center justify-content-center col-premium-product-overlay" style="
width: 85%;
height: 86%;
top: 5%;
left: 7.5%;
opacity:0;
background: rgba(0,0,0,.5);
transition:all .25s ease-in-out;
">';
echo '<span class="bold text-white h2">SHOP NOW</span>';
echo '</div>';

echo '</div>';
echo '</a>';
endforeach;
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); 
    echo '</div>';
endif;


    echo '</div>';

    echo '</section>';

    endwhile; endif;

} elseif($layout == 'Big Image'){

    if(have_rows('big_image_group')): while(have_rows('big_image_group')): the_row();
    echo '<section class="pt-5 pb-5 position-relative ' . get_sub_field('classes') . '" style="' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    if(get_sub_field('content')){
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-12 text-center">';
            echo get_sub_field('content');
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    $image = get_sub_field('image');

    echo wp_get_attachment_image($image['id'],'full','',['class'=>'w-100 h-auto','style'=>'']);

    echo '</section>';

    endwhile; endif;


} elseif($layout == 'Testimonials'){
if(have_rows('testimonials_group')): while(have_rows('testimonials_group')): the_row();

    echo '<section class="pt-5 pb-5 position-relative ' . get_sub_field('classes') . '" style="background:#f0f0f0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';
    echo '<div class="container">';

    echo '<div class="row">';
    echo '<div class="col-12 text-center pb-5">';

    echo get_sub_field('content');

    echo '</div>';
    echo '</div>';


    if(have_rows('testimonials_repeater')):
    echo '<div class="testimonial-carousel owl-carousel owl-theme arrows-middle">';
    while(have_rows('testimonials_repeater')): the_row();
    echo '<div class="position-relative pl-5" style="color:#666666;">';

    echo '<div class="position-absolute" style="top:0;left:0;">';
    echo '<img src="https://insideoutcreative.io/wp-content/uploads/2022/11/Quotes.png" alt="" width="25px" height="25px">';
    echo '</div>';

    echo get_sub_field('content');
    echo '<div class="pl-5">';
    echo '<span class="bold" style="color:#555555;">' . get_sub_field('name') . '</span><br>';
    echo '<span class="">' . get_sub_field('job_title') . '</span>';
    echo '</div>';
    echo '</div>';

    endwhile;
    echo '</div>';
    endif;


    echo '</div>';
    echo '</section>';
    endwhile; endif;
} elseif($layout == 'Repeated Content'){
    if(have_rows('repeated_content')): while(have_rows('repeated_content')): the_row();

    echo '<div class="repeated-content-main-div position-relative pt-5 pb-5">';

    $bgImg = get_sub_field('background_image');

    echo wp_get_attachment_image($bgImg['id'],'full','',['class'=>'position-absolute w-100 h-100','style'=>'top:0;left:0;']);

    if(have_rows('sections')):
    echo '<section class="content-area position-relative" style="">';


        echo wp_get_attachment_image(69,'full','',['class'=>'w-100 h-100 position-absolute','style'=>'top:0;left:0;object-fit:cover;']);
        echo '<div class="container-fluid">';

        while(have_rows('sections')): the_row();

        $imageSide = get_sub_field('image_side');

        if($imageSide == 'Left'){
            echo '<div class="row">';
        } else {
            echo '<div class="row flex-row-reverse">';
            // echo '</div>';
        }
        echo '<div class="col-md-6 p-0">';
        $image = get_sub_field('main_image');
        echo wp_get_attachment_image($image['id'],'full','',['class'=>'w-100 h-100','style'=>'object-fit:cover;']);
        echo '</div>';

        if($imageSide == 'Left'){
        echo '<div class="col-md-6 p-0 right">';
        } else {
            echo '<div class="col-md-6 p-0 left">';
        }
        echo '<div class="col-md-12 pt-5 pb-5">';
        echo '<div class="top">';


        if($imageSide == 'Left'){
        echo '<div class="bg-top" style=""></div>';
        } else {
        echo '<div class="bg-top" style=""></div>';
        }

        echo '<div class="position-relative z-1">';
        echo '<div class="">';
        echo '<h3 class="text-accent-tertiary bold text-uppercase h5" style="letter-spacing:0.2em;">' . get_sub_field('pretitle') . '</h3>';
        echo '</div>';
        echo '<div class="text-center">';
        echo '<h2 class="text-white" style="font-size:60px;">' . get_sub_field('title') . '</h2>';
        echo '</div>';
        echo '<div class="text-right">';
        echo '<h5 class="text-accent-tertiary text-uppercase bold" style="letter-spacing:0.2em;">' . get_sub_field('subtitle') . '</h5>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="pt-3 pb-5"></div>';

        if($imageSide == 'Left'){
        echo '<div class="col-md-11 ml-auto mt-2 smaller-text">';
        } else {
            echo '<div class="col-md-11 mt-2 smaller-text">';
            // echo '</div>';
        }
        echo '<div class="bg-top"></div>';
        echo '<div class="featured-text">';

        echo get_sub_field('content');
        
        echo '</div>';
        echo '</div>';

        $sideImg = get_sub_field('small_image');

        echo '<div class="container">';
        if($imageSide == 'Left'){
        echo '<div class="row align-items-center pt-4">';
        } elseif($imageSide == 'Right') {
            echo '<div class="row align-items-center pt-4 flex-row-reverse">';
            // echo '</div>';
        }


        echo '<div class="col-lg-4 col-md-6 col-5">';
        if($sideImg){
            echo wp_get_attachment_image($sideImg['id'],'full','',['class'=>'w-100 h-100']);
        }
            echo '</div>';

        if(!$sideImg){
            echo '<div class="col-lg-4 col-md-6 col-7 text-center">';
        } else {
            echo '<div class="col-lg-4 col-md-6 col-7">';
        }
        $link = get_sub_field('link');
        
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            echo '<a class="btn-outline" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '">' . esc_html( $link_title ) . '</a>';
            
        endif;
        echo '</div>';

        echo '</div>';
        echo '</div>'; // end of row
        echo '</div>'; // end of container

        echo '</div>';
        endwhile;

        echo '</div>';
        echo '</section>';
        endif;

        echo '</div>';

        endwhile; endif;
} elseif($layout == 'Bars'){

    if(have_rows('bars_group')): while(have_rows('bars_group')): the_row();

    echo '<div class="pt-5 pb-5"></div>';

    // start of bars

if(have_rows('bars_section')): while(have_rows('bars_section')): the_row();
echo '<section class="pt-5 pb-5 position-relative d-lg-none" style="">';
echo '<div class="container">';
echo '<div class="row justify-content-center">';


echo '<div class="col-md-9 text-center">';
$mainContent = get_sub_field('content');
echo get_sub_field('content');
echo '</div>';


echo '</div>';
echo '</div>';

echo '<div class="d-flex align-items-center w-100">';

echo '<div class="bg-accent-secondary w-100" style="height:4px;"></div>';
echo wp_get_attachment_image(554,'full','',['class'=>'w-auto mr-4 ml-4','style'=>'']);
echo '<div class="bg-accent-secondary w-100" style="height:4px;"></div>';

echo '</div>';

echo '</section>';

if(have_rows('individual_bars')):
$barsCounter = 0;
echo '<section class="position-relative overflow-h section-bars" style="">';

echo '<div class="position-absolute text-center text-white w-100 z-3 d-lg-block d-none" style="top:25%;left:0;opacity:.34;">';
echo $mainContent;
echo '<div class="d-flex align-items-center w-100">';

// echo '<div class="bg-accent-secondary w-100" style="height:4px;"></div>';
// echo wp_get_attachment_image(554,'full','',['class'=>'w-auto mr-4 ml-4','style'=>'']);
// echo '<div class="bg-accent-secondary w-100" style="height:4px;"></div>';

echo '</div>';
echo '</div>';

echo '<div class="row" style="">';

while(have_rows('individual_bars')): the_row();

$barsCounter++;

$title = get_sub_field('title');
$ID = sanitize_title_with_dashes($title);
$image = get_sub_field('image');
$imageMobile = get_sub_field('image_mobile');
$icon = get_sub_field('icon');
$innerContent = get_sub_field('inner_content');
$link = get_sub_field('link');

if($link):
$link_url = $link['url'];
$link_title = $link['title'];
$link_target = $link['target'] ? $link['target'] : '_self';
endif;


echo '<div class="col-lg col-md-6 text-center w-100 overflow-h position-relative z-2 col-full-background d-flex align-items-end justify-content-center" style="padding-top:200px;padding-bottom:0px;min-height:84vh;" id="col-' . $ID . '">';

if($barsCounter == 1){

    // start of image mobile for first column
    if($imageMobile){
        echo wp_get_attachment_image($imageMobile['id'],'full','',['class'=>'position-absolute d-lg-none d-block w-100 h-100','style'=>'top:0;left:0;object-fit:cover;']);
        echo wp_get_attachment_image($image['id'],'full','',['class'=>'position-absolute d-lg-block d-none h-100 img-full-background','style'=>'top:0;object-fit:cover;min-width:100vw;']);
    } else {
        echo wp_get_attachment_image($image['id'],'full','',['class'=>'position-absolute h-100 img-full-background','style'=>'top:0;object-fit:cover;min-width:100vw;']);
    }
    // end of image mobile for first column

} else {

    if($imageMobile){
        echo wp_get_attachment_image($imageMobile['id'],'full','',['class'=>'position-absolute d-lg-none d-block w-100 h-100','style'=>'top:0;left:0;object-fit:cover;']);
        echo wp_get_attachment_image($image['id'],'full','',['class'=>'position-absolute d-lg-block d-none h-100 img-full-background','style'=>'top:0;object-fit:cover;min-width:100vw;']);
    } else {
        echo wp_get_attachment_image($image['id'],'full','',['class'=>'position-absolute h-100 img-full-background','style'=>'top:0;object-fit:cover;min-width:100vw;']);
    }

}
echo '<div class="position-absolute h-100 col-full-background-overlay bg-black d-lg-block d-none" style="opacity:.4;pointer-events:none;top:0;width:110vw;left:-' . ($barsCounter-1) . '00%;mix-blend-mode:multiply;"></div>';

echo '<div class="position-absolute w-100 h-100 bg-accent-secondary d-lg-none d-block" style="opacity:.5;pointer-events:none;top:0;mix-blend-mode:multiply;"></div>';

echo '<div class="position-absolute w-100 h-100 col-full-background-borders" style="top:0;left:0;border-left:1px solid white;pointer-events:none;"></div>';


echo '<div class="position-relative inner-content-outer" style="transition:all .25s ease-in-out;">';

echo '<a class="" href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '" style="text-decoration:none;">';

echo '<div class="image-title">';
echo '<div class="d-inline-block" style="">';
echo wp_get_attachment_image($icon['id'],'full','',['class'=>'','style'=>'width:35px;height:35px;object-fit:contain;']);
echo '</div>';

echo '<div class="mt-3 mb-3"><span class="h6 text-white">' . $title . '</span></div>';
echo '</div>';

echo '<div class="pl-3 pr-3 text-white inner-content">';
echo $innerContent;
echo '</div>';

echo '</a>';

echo '</div>';
echo '</div>';

endwhile;

echo '</div>';
// echo '</div>';
echo '</section>';
endif;
// end of bars repeaters

endwhile; endif;

// end of bars

endwhile; endif;
}

endwhile; endif;
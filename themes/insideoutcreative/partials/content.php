<?php
if(have_rows('builder')): while(have_rows('builder')): the_row();
$layout = get_sub_field('layout');

if($layout == 'Testimonials'){
if(have_rows('testimonials_group')): while(have_rows('testimonials_group')): the_row();

    echo '<section class="pt-5 pb-5 position-relative ' . get_sub_field('classes') . '" style="background:#363636;border-top:8px solid var(--accent-primary);border-bottom:8px solid var(--accent-primary);' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';
    echo '<div class="container">';

    echo '<div class="row">';
    echo '<div class="col-12 text-center text-white pb-5">';

    echo get_sub_field('content');

    echo '</div>';
    echo '</div>';


    if(have_rows('testimonials_repeater')):
    echo '<div class="testimonial-carousel owl-carousel owl-theme arrows-middle">';
    while(have_rows('testimonials_repeater')): the_row();
    echo '<div class="position-relative pl-5" style="color:#acacac;">';

    echo '<div class="position-absolute" style="top:0;left:0;">';
    echo '<img src="https://insideoutcreative.io/wp-content/uploads/2022/11/Quotes.png" alt="" width="25px" height="25px">';
    echo '</div>';

    echo get_sub_field('content');
    echo '<div class="pl-5">';
    echo '<span class="bold" style="color:#cccccc;">' . get_sub_field('name') . '</span><br>';
    echo '<span class="">' . get_sub_field('job_title') . '</span>';
    echo '</div>';
    echo '</div>';

    endwhile;
    echo '</div>';
    endif;


    echo '</div>';
    echo '</section>';
    endwhile; endif;
}

endwhile; endif;
<?php get_header();

echo get_template_part('partials/content');

// start of instagram

echo '<div class="p-5 text-center">';
echo '<h2 class="bold">FOLLOW US ON INSTAGRAM</h2>';
echo '</div>';

echo '<section class="pt-5 pb-5 position-relative">';

echo wp_get_attachment_image(197,'full','',['class'=>'w-100 h-100 position-absolute','style'=>'top:0;left:0;object-fit:cover;']);

// query the user media
$fields = "id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username";
$token = "IGQVJVSFpDWF9PNXctS25NbVktRVNVeldKNTRna3E2ZA3g1N1lDaHNfb090eDhXVWl6VDcybjU0d0tHMlFFdkxrZAXlOVVkxYllOUHVUYnRlN3pxbktGTHhFeHhBaU8tNFZApMUdFYWRRdnZAmYmZAzQjZAhMgZDZD";
$limit = 9;

$json_feed_url="https://graph.instagram.com/me/media?fields={$fields}&access_token={$token}&limit={$limit}";
$json_feed = @file_get_contents($json_feed_url);
$contents = json_decode($json_feed, true, 512, JSON_BIGINT_AS_STRING);

echo '<div class="container-fluid" style="border-top:4px solid black;border-bottom:4px solid black">';
echo '<div class="instagram-carousel owl-carousel owl-theme">';
foreach($contents["data"] as $post){

$username = isset($post["username"]) ? $post["username"] : "";
// $likes = isset($post["likes"]) ? $post["likes"] : "";
// $comments = isset($post["comments"]) ? $post["comments"] : "";
$caption = isset($post["caption"]) ? $post["caption"] : "";
$media_url = isset($post["media_url"]) ? $post["media_url"] : "";
$permalink = isset($post["permalink"]) ? $post["permalink"] : "";
$media_type = isset($post["media_type"]) ? $post["media_type"] : "";

echo '<a href="' . $permalink . '" target="_blank" class="col-lg-4 col-md-6 p-1 col-instagram" style="">';
echo '<div class="position-relative" style="overflow:hidden;">';


if($media_type=="VIDEO"){
echo '<video controls  style="height:350px;object-fit:cover;" class="w-100 d-block">';
echo '<source src=' . $media_url . ' type="video/mp4">';
echo 'Your browser does not support the video tag.';
echo '</video>';
}

else{
echo '<img src=' . $media_url . ' class="w-100" style="height:350px;object-fit:cover;" />';
}
echo '<div class="position-absolute w-100 h-100 col-instagram-overlay" style="opacity:0;top:0;left:0;background:black;"></div>';

echo '<div class="text-white position-absolute col-instagram-text" style="top:50%;left:50%;transform:translate(-50%,0%);opacity:0;">View on Instagram</div>';
echo '</div>';
echo '</a>';
// echo '<div class="ig_post_details">';
// echo '<div>';
// echo '<strong>@' . $username . '</strong> ' . $caption . '';
// echo '</div>';
// echo '<div class="ig_view_link">';
// echo '<a href=' . $permalink . ' target="_blank">View on Instagram</a>';
// echo '</div>';
// echo '</div>';

}

echo '</div>';
echo '</div>';
echo '</section>';
// end of instagram

// start of intro
// echo '<section class="pt-5 pb-5 position-relative">';
// echo '<div class="container">';
// echo '<div class="row">';
// echo '<div class="col-12">';



// echo '</div>';
// echo '</div>';
// echo '</div>';
// echo '</section>';
// end of intro


// // how to use new image hover effect
// echo '<div class="col-6 col-intro-gallery col mb-1 p-1 overflow-h">';
// echo '<div class="position-relative img-hover w-100">';
// echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set">';
// echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100 image-intro-gallery','style'=>'object-fit:cover;']);
// echo '</a>';
// echo '</div>';
// echo '</div>';

// // popup trigger
// echo '<span class="btn bg-white text-accent apply-now open-modal" id="apply-now" style="">Apply Now</span>';

// // popup content
// echo '<div class="modal-content apply-now position-fixed w-100 h-100 z-3">';
// echo '<div class="bg-overlay"></div>';
// echo '<div class="bg-content">';
// echo '<div class="bg-content-inner">';
// echo '<div class="close" id="">X</div>';
// echo '<div>';
// echo get_field('popup_content');
// echo '</div>';
// echo '</div>';

// echo '</div>';
// echo '</div>';

get_footer(); ?>
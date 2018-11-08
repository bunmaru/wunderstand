<?php
function my_length($length){
    return 50;
}
add_filter("expert_mblength", "my_length");

function my_more($more){
    return "…";
}
add_filter("expert_more", "my_more");

add_theme_support('post-thumbnails');
<?php
//Links to parent theme
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

//Remove sidebar
add_action( 'get_header', 'remove_storefront_sidebar' );
function remove_storefront_sidebar()
{
    if (is_product()) {
        remove_action('storefront_sidebar', 'storefront_get_sidebar', 10);
    } else {
    }
}

//Remove search bar
add_action( 'init', 'jk_remove_storefront_header_search' );
function jk_remove_storefront_header_search() {
    remove_action( 'storefront_header', 'storefront_product_search', 	40 );
}

//turn off product pagination
add_filter( 'theme_mod_storefront_product_pagination', '__return_false',9999);

//Remove breadcrumbs
add_action( 'init', 'storefront_remove_storefront_breadcrumbs' );
function storefront_remove_storefront_breadcrumbs() {
    remove_action( 'storefront_before_content', 'woocommerce_breadcrumb', 10 );
}

//remove credit
add_action('init', 'storefront_remove_credit');
function storefront_remove_credit(){
    remove_action('storefront_footer', 'storefront_credit',20);
}
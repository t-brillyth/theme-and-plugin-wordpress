<?php

/*
    Plugin Name: Portfolio
    Description: Add post types for portfolio
    Author: Hostinger Dev
*/


add_action( 'init', 'portfolio' );


function portfolio() {


$labels = array(

    'name'               => __( 'Portfolio' ),
    'singular_name'      => __( 'Portfolio' ),
    'add_new'            => __( 'Add New Portfolio' ),
    'add_new_item'       => __( 'Add New Portfolio' ),
    'edit_item'          => __( 'Edit Portfolio' ),
    'new_item'           => __( 'New Portfolio' ),
    'all_items'          => __( 'All Portfolios' ),
    'view_item'          => __( 'View Portfolio' ),
    'search_items'       => __( 'Search Portfolio' ),
    'featured_image'     => 'Image',
    'set_featured_image' => 'Add Image'

);

// The arguments for our post type, to be entered as parameter 2 of register_post_type()

$args = array(
    'labels'            => $labels,
    'description'       => 'Holds our custom article post specific data',
    'public'            => true,
    'menu_position'     => 5,
    'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
    'taxonomies'        => array( 'category', ' post_tag' ),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'query_var'         => true,
    'menu_icon'             => 'dashicons-screenoptions',

);


register_post_type( 'portfolio', $args);

}
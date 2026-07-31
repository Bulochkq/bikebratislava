<?php
/**
 * Типи записів: Тури та Гіди.
 *
 * Категорія туру — це таксономія tour_category. WordPress сам показує для неї
 * блок у редакторі туру, тому окремого поля ACF для категорії робити не треба.
 */

if (!defined('ABSPATH')) {
    exit;
}

function bb_register_post_types() {

    /* ---------------------------------------------------------------- Тури */
    register_post_type('tour', array(
        'labels' => array(
            'name'          => 'Tours',
            'singular_name' => 'Tour',
            'menu_name'     => 'Tours',
            'add_new'       => 'Add New',
            'add_new_item'  => 'Add New Tour',
            'new_item'      => 'New Tour',
            'edit_item'     => 'Edit Tour',
            'view_item'     => 'View Tour',
            'all_items'     => 'All Tours',
            'search_items'  => 'Search Tours',
            'not_found'     => 'No tours found.',
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'tour'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-location-alt',
        // page-attributes дає поле «Порядок» — ним шеф керує послідовністю
        // турів у категорії (шаблон сортує за menu_order).
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
        'show_in_rest'       => true,
    ));

    register_taxonomy('tour_category', array('tour'), array(
        'labels' => array(
            'name'          => 'Tour Categories',
            'singular_name' => 'Tour Category',
            'search_items'  => 'Search Categories',
            'all_items'     => 'All Categories',
            'edit_item'     => 'Edit Category',
            'update_item'   => 'Update Category',
            'add_new_item'  => 'Add New Category',
            'new_item_name' => 'New Category Name',
            'menu_name'     => 'Categories',
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'tour-category'),
        'show_in_rest'      => true,
    ));

    /* --------------------------------------------------------------- Гіди */
    register_post_type('guide', array(
        'labels' => array(
            'name'          => 'Guides',
            'singular_name' => 'Guide',
            'menu_name'     => 'Guides',
            'add_new'       => 'Add New',
            'add_new_item'  => 'Add New Guide',
            'new_item'      => 'New Guide',
            'edit_item'     => 'Edit Guide',
            'view_item'     => 'View Guide',
            'all_items'     => 'All Guides',
            'search_items'  => 'Search Guides',
            'not_found'     => 'No guides found.',
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'guide'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-businessman',
        'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'show_in_rest'       => true,
    ));
}
add_action('init', 'bb_register_post_types');

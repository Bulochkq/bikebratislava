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
            'name'          => 'Túry',
            'singular_name' => 'Túra',
            'menu_name'     => 'Túry',
            'add_new'       => 'Pridať novú',
            'add_new_item'  => 'Pridať novú túru',
            'new_item'      => 'Nová túra',
            'edit_item'     => 'Upraviť túru',
            'view_item'     => 'Zobraziť túru',
            'all_items'     => 'Všetky túry',
            'search_items'  => 'Hľadať túry',
            'not_found'     => 'Žiadne túry sa nenašli.',
            // Замість незрозумілого «Odporúčaný obrázok» — пряма назва.
            // Саме це фото йде на картку туру й у вікно з деталями.
            'featured_image'        => 'Fotka túry',
            'set_featured_image'    => 'Nastaviť fotku túry',
            'remove_featured_image' => 'Odstrániť fotku',
            'use_featured_image'    => 'Použiť ako fotku túry',
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
            'name'          => 'Kategórie túr',
            'singular_name' => 'Kategória túry',
            'search_items'  => 'Hľadať kategórie',
            'all_items'     => 'Všetky kategórie',
            'edit_item'     => 'Upraviť kategóriu',
            'update_item'   => 'Aktualizovať kategóriu',
            'add_new_item'  => 'Pridať kategóriu',
            'new_item_name' => 'Názov novej kategórie',
            'menu_name'     => 'Kategórie',
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
            'name'          => 'Sprievodcovia',
            'singular_name' => 'Sprievodca',
            'menu_name'     => 'Sprievodcovia',
            'add_new'       => 'Pridať novú',
            'add_new_item'  => 'Pridať sprievodcu',
            'new_item'      => 'Nový sprievodca',
            'edit_item'     => 'Upraviť sprievodcu',
            'view_item'     => 'Zobraziť sprievodcu',
            'all_items'     => 'Všetci sprievodcovia',
            'search_items'  => 'Hľadať sprievodcov',
            'not_found'     => 'Žiadni sprievodcovia sa nenašli.',
            'featured_image'        => 'Fotka sprievodcu',
            'set_featured_image'    => 'Nastaviť fotku sprievodcu',
            'remove_featured_image' => 'Odstrániť fotku',
            'use_featured_image'    => 'Použiť ako fotku sprievodcu',
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

    /* --------------------------------------- Блоки сторінки Discover */
    // Кожен запис — один блок «текст + медіа». Сторона (ліворуч/праворуч)
    // чергується автоматично, тому блоки можна додавати й прибирати
    // без правок у коді.
    register_post_type('discover_block', array(
        'labels' => array(
            'name'          => 'Discover',
            'singular_name' => 'Blok',
            'menu_name'     => 'Discover',
            'add_new'       => 'Pridať nový',
            'add_new_item'  => 'Pridať nový blok',
            'new_item'      => 'Nový blok',
            'edit_item'     => 'Upraviť blok',
            'view_item'     => 'Zobraziť blok',
            'all_items'     => 'Všetky bloky',
            'search_items'  => 'Hľadať bloky',
            'not_found'     => 'Žiadne bloky sa nenašli.',
            'featured_image'        => 'Fotka bloku',
            'set_featured_image'    => 'Nastaviť fotku bloku',
            'remove_featured_image' => 'Odstrániť fotku',
            'use_featured_image'    => 'Použiť ako fotku bloku',
        ),
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'exclude_from_search' => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-images-alt2',
        'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'show_in_rest'       => true,
    ));
}
add_action('init', 'bb_register_post_types');

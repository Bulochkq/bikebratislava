<?php
/**
 * Спільні функції для роботи з категоріями турів.
 *
 * Категорії використовуються в чотирьох місцях: секції на сторінці Tours,
 * картки на головній, випадаюче меню в шапці й список у формі заявки.
 * Раніше кожне з них будувалось по-своєму, тому нова категорія з'являлась
 * лише подекуди. Тепер усі беруть дані звідси.
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Категорії турів у порядку, заданому полем «Poradie sekcie».
 * Порожнє поле = 50, тож нова категорія стає між наявними й «Custom».
 *
 * @return WP_Term[]
 */
function bb_tour_categories() {
    $terms = get_terms(array(
        'taxonomy'   => 'tour_category',
        'hide_empty' => false,
    ));

    if (is_wp_error($terms) || empty($terms)) {
        return array();
    }

    usort($terms, function ($a, $b) {
        $oa = bb_tour_category_order($a);
        $ob = bb_tour_category_order($b);
        if ($oa === $ob) {
            return strcasecmp($a->name, $b->name);
        }
        return $oa < $ob ? -1 : 1;
    });

    return $terms;
}

function bb_tour_category_order($term) {
    $order = function_exists('get_field') ? get_field('cat_order', 'tour_category_' . $term->term_id) : '';
    if ($order !== '' && $order !== null && $order !== false) {
        return (int) $order;
    }
    // Конструктор індивідуального туру за замовчуванням стоїть останнім:
    // це не список турів, а форма, і логічно вона завершує сторінку.
    return bb_is_custom_category($term) ? 90 : 50;
}

/**
 * Якір секції на сторінці Tours. Прив'язаний до слага, а не до номера,
 * тому посилання не ламаються, коли категорій стає більше або
 * змінюється їхній порядок.
 */
function bb_tour_category_anchor($term) {
    return 'cat-' . $term->slug;
}

/**
 * Фото категорії: спершу власне (поле «Fotka sekcie»), потім фото першого
 * туру в категорії, і лише в останню чергу — запасне зображення теми.
 * Саме через відсутність першого кроку нова категорія показувала чуже фото.
 */
function bb_tour_category_image($term, $size = 'large') {
    $id = function_exists('get_field') ? get_field('cat_image', 'tour_category_' . $term->term_id) : 0;
    if ($id) {
        $url = wp_get_attachment_image_url((int) $id, $size);
        if ($url) {
            return $url;
        }
    }

    $first = get_posts(array(
        'post_type'      => 'tour',
        'posts_per_page' => 1,
        'orderby'        => 'menu_order date',
        'order'          => 'ASC',
        'fields'         => 'ids',
        'tax_query'      => array(array(
            'taxonomy' => 'tour_category',
            'field'    => 'term_id',
            'terms'    => $term->term_id,
        )),
    ));
    if (!empty($first) && has_post_thumbnail($first[0])) {
        return get_the_post_thumbnail_url($first[0], $size);
    }

    return get_template_directory_uri() . '/assets/pictures/coffee-break.jpg';
}

/**
 * Короткий опис категорії для картки на головній. Повний опис категорії
 * задовгий для картки, тому для неї є окреме поле; якщо воно порожнє —
 * показуємо повний опис.
 */
function bb_tour_category_short_desc($term) {
    $short = function_exists('get_field') ? get_field('cat_short_desc', 'tour_category_' . $term->term_id) : '';
    return $short ? $short : $term->description;
}

/**
 * Тури однієї категорії, у порядку поля «Poradie» кожного туру.
 *
 * @return WP_Post[]
 */
function bb_tours_in_category($term_id) {
    return get_posts(array(
        'post_type'      => 'tour',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order date',
        'order'          => 'ASC',
        'tax_query'      => array(array(
            'taxonomy' => 'tour_category',
            'field'    => 'term_id',
            'terms'    => $term_id,
        )),
    ));
}

/**
 * Категорія-конструктор індивідуального туру: там замість карток турів
 * стоїть покроковий вибір. Впізнаємо її за слагом.
 */
function bb_is_custom_category($term) {
    return $term->slug === 'custom-experiences';
}

/**
 * Короткий опис туру для картки: власне поле, інакше початок основного тексту.
 */
function bb_tour_short_desc($post_id) {
    $short = get_field('short_desc', $post_id);
    if (!$short) {
        $short = wp_trim_words(get_post_field('post_content', $post_id), 16);
    }
    return $short;
}

/**
 * Фото туру з запасним варіантом теми.
 */
function bb_tour_image($post_id, $size = 'large') {
    if (has_post_thumbnail($post_id)) {
        return get_the_post_thumbnail_url($post_id, $size);
    }
    return get_template_directory_uri() . '/assets/pictures/coffee-break.jpg';
}

/**
 * «Zaujímavosti trasy» — по пункту на рядок у полі, масив на виході.
 */
function bb_tour_keypoints($post_id) {
    $raw = (string) get_field('keypoints', $post_id);
    return array_values(array_filter(array_map('trim', explode("\n", $raw))));
}

/* ====================================================================
 * ФОРМА ЗАЯВКИ
 *
 * Раніше список турів у формі був вписаний руками окремо від сторінки
 * Tours — у чотирьох місцях. Через це у формі лишались тури, давно
 * прибрані з сайту. Тепер джерело одне.
 * ================================================================== */

/**
 * Тури, згруповані за категоріями, для випадаючого списку у формі.
 * Категорія-конструктор пропускається: для неї у формі є окремий
 * варіант «Custom Experience».
 *
 * @return array<int, array{name: string, tours: WP_Post[]}>
 */
function bb_contact_ride_groups() {
    $groups = array();
    foreach (bb_tour_categories() as $term) {
        if (bb_is_custom_category($term)) {
            continue;
        }
        $tours = bb_tours_in_category($term->term_id);
        if (empty($tours)) {
            continue;
        }
        $groups[] = array('name' => $term->name, 'tours' => $tours);
    }
    return $groups;
}

/**
 * Усі тури форми одним списком — основа для двох наборів даних нижче.
 *
 * @return WP_Post[]
 */
function bb_contact_rides() {
    $rides = array();
    foreach (bb_contact_ride_groups() as $group) {
        foreach ($group['tours'] as $tour) {
            $rides[] = $tour;
        }
    }
    return $rides;
}

/**
 * Коротка картка попереднього перегляду під випадаючим списком.
 */
function bb_contact_ride_info() {
    $info = array(
        'Custom Experience' => array(
            'img'  => get_template_directory_uri() . '/assets/pictures/corporate-group.jpg',
            'desc' => 'Fully tailored to you — distance, pace, theme and stops built around your group.',
        ),
    );
    foreach (bb_contact_rides() as $tour) {
        $info[$tour->post_title] = array(
            'img'  => bb_tour_image($tour->ID),
            'desc' => bb_tour_short_desc($tour->ID),
        );
    }
    return $info;
}

/**
 * Повні дані для вікна «View more» — ті самі поля, що й на сторінці Tours.
 */
function bb_contact_ride_details() {
    $details = array(
        'Custom Experience' => array(
            'title'     => 'Custom & Corporate Experiences',
            'desc'      => 'Fully customised cycling experiences for individuals, groups, cycling clubs and corporate teams. We design the route, distance, pace and stops around your specific needs.',
            'dist'      => 'Tailored',
            'elev'      => 'Tailored',
            'dur'       => 'Tailored',
            'diff'      => 'Adapted to group',
            'bike'      => 'Any',
            'keypoints' => array('Fully tailored route', 'Flexible starting time', 'Private dedicated guide', 'Custom food/drink stops'),
            'recom'     => 'Perfect for team building, groups of friends, or cyclists with specific goals.',
            'img'       => get_template_directory_uri() . '/assets/pictures/corporate-group.jpg',
        ),
    );
    foreach (bb_contact_rides() as $tour) {
        $details[$tour->post_title] = array(
            'title'     => $tour->post_title,
            'desc'      => wp_strip_all_tags($tour->post_content),
            'dist'      => (string) get_field('distance', $tour->ID),
            'elev'      => (string) get_field('elevation', $tour->ID),
            'dur'       => (string) get_field('duration', $tour->ID),
            'diff'      => (string) get_field('difficulty', $tour->ID),
            'bike'      => (string) get_field('bike_type', $tour->ID),
            'keypoints' => bb_tour_keypoints($tour->ID),
            'recom'     => (string) get_field('recommendation', $tour->ID),
            'img'       => bb_tour_image($tour->ID),
        );
    }
    return $details;
}

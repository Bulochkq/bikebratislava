<?php
/**
 * Поля для адмінки (ACF).
 *
 * ЄДИНЕ місце, де описані поля. Раніше їх було два файли з однаковими ключами
 * груп — через це в адмінці показувалися одні поля, а шаблони читали інші, і
 * редагування нічого не змінювало на сайті.
 *
 * Правила, яких треба триматись:
 *  1. Назва поля (name) має збігатися з тим, що читає шаблон через get_field().
 *  2. Ніяких полів із платної версії ACF (repeater, flexible content) —
 *     встановлена безкоштовна. Списки робимо через textarea, по рядку на пункт.
 *  3. Категорія туру — це таксономія tour_category, а не поле ACF.
 *     WordPress сам показує для неї блок у редакторі запису.
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('acf/init', 'bb_register_acf_fields');
function bb_register_acf_fields() {

    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    /* ------------------------------------------------------------------
     * ТУРИ
     * ---------------------------------------------------------------- */
    acf_add_local_field_group(array(
        'key'    => 'group_tour_details',
        'title'  => 'Деталі туру',
        'fields' => array(
            array(
                'key'          => 'field_tour_short_desc',
                'label'        => 'Короткий опис (для картки)',
                'name'         => 'short_desc',
                'type'         => 'textarea',
                'rows'         => 2,
                'instructions' => 'Один-два рядки. Якщо порожньо — візьметься початок основного тексту.',
            ),
            array(
                'key'         => 'field_tour_distance',
                'label'       => 'Дистанція',
                'name'        => 'distance',
                'type'        => 'text',
                'placeholder' => 'напр. 15 km',
            ),
            array(
                'key'         => 'field_tour_elevation',
                'label'       => 'Набір висоти',
                'name'        => 'elevation',
                'type'        => 'text',
                'placeholder' => 'напр. 50 m',
            ),
            array(
                'key'         => 'field_tour_duration',
                'label'       => 'Тривалість',
                'name'        => 'duration',
                'type'        => 'text',
                'placeholder' => 'напр. 2.5 hours',
            ),
            array(
                'key'     => 'field_tour_difficulty',
                'label'   => 'Складність',
                'name'    => 'difficulty',
                'type'    => 'select',
                'choices' => array(
                    'Easy'     => 'Easy',
                    'Moderate' => 'Moderate',
                    'Hard'     => 'Hard',
                    'Variable' => 'Variable',
                ),
                'allow_null'    => 1,
                'return_format' => 'value',
            ),
            array(
                'key'         => 'field_tour_bike',
                'label'       => 'Тип велосипеда',
                'name'        => 'bike_type',
                'type'        => 'text',
                'placeholder' => 'напр. City / Hybrid Bike',
            ),
            array(
                'key'          => 'field_tour_keypoints',
                'label'        => 'Хайлайти',
                'name'         => 'keypoints',
                'type'         => 'textarea',
                'rows'         => 5,
                'instructions' => 'По одному пункту на рядок. Показуються списком у вікні туру.',
            ),
            array(
                'key'          => 'field_tour_recommendation',
                'label'        => 'Рекомендація гіда',
                'name'         => 'recommendation',
                'type'         => 'textarea',
                'rows'         => 2,
                'instructions' => 'напр. Perfect for travellers, couples, families and leisure riders.',
            ),
        ),
        'location' => array(
            array(
                array('param' => 'post_type', 'operator' => '==', 'value' => 'tour'),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'active'                => true,
        'description'           => 'Фото туру задається блоком «Зображення запису» справа.',
    ));

    /* ------------------------------------------------------------------
     * ГІДИ
     * ---------------------------------------------------------------- */
    acf_add_local_field_group(array(
        'key'    => 'group_guide_details',
        'title'  => 'Деталі гіда',
        'fields' => array(
            array(
                'key'         => 'field_guide_role',
                'label'       => 'Посада',
                'name'        => 'role',
                'type'        => 'text',
                'placeholder' => 'напр. Co-founder & Chief Ride Leader',
            ),
            array(
                'key'         => 'field_guide_languages',
                'label'       => 'Мови',
                'name'        => 'languages',
                'type'        => 'text',
                'placeholder' => 'напр. English, German, Slovak',
            ),
            array(
                'key'         => 'field_guide_years',
                'label'       => 'Років у сідлі',
                'name'        => 'years_riding',
                'type'        => 'text',
                'placeholder' => 'напр. 15+ Years',
            ),
            array(
                'key'   => 'field_guide_route',
                'label' => 'Улюблений маршрут',
                'name'  => 'favourite_route',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_guide_coffee',
                'label' => 'Кавʼярня та улюблене місце',
                'name'  => 'coffee_stop',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_guide_quote',
                'label' => 'Цитата',
                'name'  => 'quote',
                'type'  => 'textarea',
                'rows'  => 3,
            ),
        ),
        'location' => array(
            array(
                array('param' => 'post_type', 'operator' => '==', 'value' => 'guide'),
            ),
        ),
        'active'      => true,
        'description' => 'Фото гіда задається блоком «Зображення запису» справа.',
    ));

    /* ------------------------------------------------------------------
     * ГОЛОВНА СТОРІНКА — тексти першого екрана
     * ---------------------------------------------------------------- */
    acf_add_local_field_group(array(
        'key'    => 'group_home_hero',
        'title'  => 'Головна сторінка — перший екран',
        'fields' => array(
            array(
                'key'         => 'field_home_hero_title',
                'label'       => 'Заголовок',
                'name'        => 'hero_title',
                'type'        => 'text',
                'placeholder' => 'Discover Bratislava',
            ),
            array(
                'key'         => 'field_home_hero_subtitle',
                'label'       => 'Підзаголовок',
                'name'        => 'hero_subtitle',
                'type'        => 'text',
                'placeholder' => 'Explore The Heart of Central Europe',
            ),
            array(
                'key'   => 'field_home_hero_text',
                'label' => 'Опис під заголовком',
                'name'  => 'hero_text',
                'type'  => 'textarea',
                'rows'  => 4,
            ),
        ),
        'location' => array(
            array(
                array('param' => 'page_type', 'operator' => '==', 'value' => 'front_page'),
            ),
        ),
        'active'      => true,
        'description' => 'Показується на сторінці, призначеній головною в Налаштування → Читання.',
    ));
}

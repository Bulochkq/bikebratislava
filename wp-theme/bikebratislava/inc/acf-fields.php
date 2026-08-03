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
        'title'  => 'Detaily túry',
        'fields' => array(
            array(
                'key'          => 'field_tour_short_desc',
                'label'        => 'Krátky popis (na kartu)',
                'name'         => 'short_desc',
                'type'         => 'textarea',
                'rows'         => 2,
                'instructions' => 'Jeden až dva riadky. Ak zostane prázdne, použije sa začiatok hlavného textu.',
            ),
            array(
                'key'         => 'field_tour_distance',
                'label'       => 'Vzdialenosť',
                'name'        => 'distance',
                'type'        => 'text',
                'placeholder' => 'napr. 15 km',
            ),
            array(
                'key'         => 'field_tour_elevation',
                'label'       => 'Prevýšenie',
                'name'        => 'elevation',
                'type'        => 'text',
                'placeholder' => 'napr. 50 m',
            ),
            array(
                'key'         => 'field_tour_duration',
                'label'       => 'Trvanie',
                'name'        => 'duration',
                'type'        => 'text',
                'placeholder' => 'napr. 2.5 hours',
            ),
            array(
                'key'     => 'field_tour_difficulty',
                'label'   => 'Náročnosť',
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
                'label'       => 'Typ bicykla',
                'name'        => 'bike_type',
                'type'        => 'text',
                'placeholder' => 'napr. City / Hybrid Bike',
            ),
            array(
                'key'          => 'field_tour_keypoints',
                'label'        => 'Zaujímavosti trasy',
                'name'         => 'keypoints',
                'type'         => 'textarea',
                'rows'         => 5,
                'instructions' => 'Jedna položka na riadok. Zobrazia sa ako zoznam v okne túry.',
            ),
            array(
                'key'          => 'field_tour_recommendation',
                'label'        => 'Odporúčanie sprievodcu',
                'name'         => 'recommendation',
                'type'         => 'textarea',
                'rows'         => 2,
                'instructions' => 'napr. Perfect for travellers, couples, families and leisure riders.',
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
        'description'           => 'Fotku túry nastavíte vpravo v bloku «Náhľadový obrázok».',
    ));

    /* ------------------------------------------------------------------
     * КАТЕГОРІЯ ТУРІВ
     *
     * Кожна категорія — це окрема секція на сторінці Tours. Щоб нова
     * категорія не тягла чуже фото й не лізла в кінець списку, у неї є
     * власне зображення та порядок.
     * ---------------------------------------------------------------- */
    acf_add_local_field_group(array(
        'key'    => 'group_tour_category',
        'title'  => 'Sekcia na stránke Tours',
        'fields' => array(
            array(
                'key'           => 'field_cat_image',
                'label'         => 'Fotka sekcie',
                'name'          => 'cat_image',
                'type'          => 'image',
                'return_format' => 'id',
                'preview_size'  => 'medium',
                'library'       => 'all',
                'instructions'  => 'Veľká fotka vedľa popisu sekcie a na karte na domovskej stránke. '
                                 . 'Ak zostane prázdna, použije sa fotka prvej túry v kategórii.',
            ),
            array(
                'key'           => 'field_cat_bg_image',
                'label'         => 'Pozadie sekcie',
                'name'          => 'cat_bg_image',
                'type'          => 'image',
                'return_format' => 'id',
                'preview_size'  => 'medium',
                'library'       => 'all',
                'instructions'  => 'Obrázok za celou sekciou, zobrazuje sa zosvetlený. '
                                 . 'Ak zostane prázdny, použije sa štandardné pozadie témy.',
            ),
            array(
                'key'          => 'field_cat_short_desc',
                'label'        => 'Krátky popis (na domovskú stránku)',
                'name'         => 'cat_short_desc',
                'type'         => 'textarea',
                'rows'         => 2,
                'instructions' => 'Jedna veta na kartu kategórie na domovskej stránke. '
                                . 'Ak zostane prázdne, použije sa popis vyššie.',
            ),
            array(
                'key'          => 'field_cat_order',
                'label'        => 'Poradie sekcie',
                'name'         => 'cat_order',
                'type'         => 'number',
                'instructions' => 'Nižšie číslo = vyššie na stránke. Prázdne pole = 50.',
                'placeholder'  => '50',
                'step'         => 10,
            ),
        ),
        'location' => array(
            array(
                array('param' => 'taxonomy', 'operator' => '==', 'value' => 'tour_category'),
            ),
        ),
        'active'      => true,
        'description' => 'Názov a popis sekcie sa berú z polí «Názov» a «Popis» vyššie.',
    ));

    /* ------------------------------------------------------------------
     * ГІДИ
     * ---------------------------------------------------------------- */
    acf_add_local_field_group(array(
        'key'    => 'group_guide_details',
        'title'  => 'Detaily sprievodcu',
        'fields' => array(
            array(
                'key'         => 'field_guide_role',
                'label'       => 'Pozícia',
                'name'        => 'role',
                'type'        => 'text',
                'placeholder' => 'napr. Co-founder & Chief Ride Leader',
            ),
            array(
                'key'         => 'field_guide_languages',
                'label'       => 'Jazyky',
                'name'        => 'languages',
                'type'        => 'text',
                'placeholder' => 'napr. English, German, Slovak',
            ),
            array(
                'key'         => 'field_guide_years',
                'label'       => 'Roky v sedle',
                'name'        => 'years_riding',
                'type'        => 'text',
                'placeholder' => 'napr. 15+ Years',
            ),
            array(
                'key'   => 'field_guide_route',
                'label' => 'Obľúbená trasa',
                'name'  => 'favourite_route',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_guide_coffee',
                'label' => 'Kaviareň a obľúbené miesto',
                'name'  => 'coffee_stop',
                'type'  => 'text',
            ),
            array(
                'key'   => 'field_guide_quote',
                'label' => 'Citát',
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
        'description' => 'Fotku sprievodcu nastavíte vpravo v bloku «Náhľadový obrázok».',
    ));

    /* ------------------------------------------------------------------
     * СТАТТІ ЖУРНАЛУ
     *
     * Дві картки в журналі — це вбудовані пости з Instagram. Вони теж
     * звичайні записи, тільки замість фото показують вбудову, яка
     * вантажиться після згоди відвідувача (вимога GDPR).
     * ---------------------------------------------------------------- */
    acf_add_local_field_group(array(
        'key'    => 'group_post_instagram',
        'title'  => 'Instagram',
        'fields' => array(
            array(
                'key'          => 'field_post_instagram_url',
                'label'        => 'Odkaz na príspevok na Instagrame',
                'name'         => 'instagram_url',
                'type'         => 'url',
                'instructions' => 'Ak vyplníte, namiesto fotky sa v žurnáli zobrazí vložený príspevok z Instagramu. '
                                . 'Text článku sa zobrazí pod ním. Nechajte prázdne pre bežný článok s fotkou.',
                'placeholder'  => 'https://www.instagram.com/p/XXXXXXXXX/',
            ),
        ),
        'location' => array(
            array(
                array('param' => 'post_type', 'operator' => '==', 'value' => 'post'),
            ),
        ),
        'active' => true,
    ));

    /* ------------------------------------------------------------------
     * ГОЛОВНА СТОРІНКА — тексти першого екрана
     * ---------------------------------------------------------------- */
    acf_add_local_field_group(array(
        'key'    => 'group_home_hero',
        'title'  => 'Domovská stránka — úvodná obrazovka',
        'fields' => array(
            array(
                'key'         => 'field_home_hero_title',
                'label'       => 'Nadpis',
                'name'        => 'hero_title',
                'type'        => 'text',
                'placeholder' => 'Discover Bratislava',
            ),
            array(
                'key'         => 'field_home_hero_subtitle',
                'label'       => 'Podnadpis',
                'name'        => 'hero_subtitle',
                'type'        => 'text',
                'placeholder' => 'Explore The Heart of Central Europe',
            ),
            array(
                'key'   => 'field_home_hero_text',
                'label' => 'Popis pod nadpisom',
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
        'description' => 'Zobrazuje sa na stránke nastavenej ako domovská v Nastavenia → Čítanie.',
    ));
}

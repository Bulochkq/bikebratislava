<?php
/**
 * Bike Bratislava — theme setup.
 *
 * Крок 2: підключення тих самих ресурсів, що використовує статичний сайт,
 * у тому самому порядку. Tailwind поки що вантажиться з CDN — його заміна на
 * зібраний файл це Крок 4.
 */

if (!defined('ABSPATH')) {
    exit;
}

define('BB_THEME_VERSION', '0.1.0');

/**
 * Порядок у <head> має збігатися зі статичним сайтом:
 * шрифти -> Tailwind -> конфіг Tailwind -> Lucide, а вже після цього
 * інлайновий <style> сторінки (він друкується в шаблоні після wp_head).
 */
function bb_enqueue_assets() {
    $uri = get_template_directory_uri();

    // Self-hosted Outfit + Inter (жодних запитів до Google — GDPR).
    wp_enqueue_style('bb-fonts', $uri . '/assets/fonts/fonts.css', array(), BB_THEME_VERSION);

    // Tailwind Play CDN. TODO (Крок 4): замінити на зібраний assets/css/main.css.
    wp_enqueue_script('bb-tailwind', 'https://cdn.tailwindcss.com', array(), null, false);
    wp_add_inline_script('bb-tailwind', bb_tailwind_config(), 'after');

    // Іконки Lucide (у <head>, як на статичному сайті).
    wp_enqueue_script('bb-lucide', 'https://unpkg.com/lucide@latest', array(), null, false);

    // Плавний скрол + логіка сайту — у кінці <body>.
    wp_enqueue_script('bb-lenis', 'https://unpkg.com/lenis@1.1.13/dist/lenis.min.js', array(), '1.1.13', true);
    wp_enqueue_script('bb-app', $uri . '/assets/js/app.js', array('bb-lenis', 'bb-lucide'), BB_THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'bb_enqueue_assets');

/**
 * Фірмові кольори й шрифти для Tailwind — один в один зі статичного сайту.
 */
function bb_tailwind_config() {
    return <<<'JS'
tailwind.config = {
    theme: {
        extend: {
            colors: {
                brand: {
                    luxeDark: '#0A0A0A',
                    luxeLight: '#F8F9FA',
                    luxeGold: '#E31C25',
                    luxeGoldDark: '#B91C1C',
                    luxeTextDark: '#111111',
                    luxeTextLight: '#F8F9FA'
                }
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
                serif: ['Outfit', 'sans-serif']
            }
        }
    }
}
JS;
}

/**
 * Секції на сторінці Tours мають фіксовані якорі (#cat1..#cat3) — на них
 * зав'язаний скрипт, що розгортає потрібну панель. Щоб меню й головна не
 * розходились із шаблоном, посилання будуємо через цю відповідність.
 *
 * Нова категорія, створена в адмінці, тут не з'явиться свідомо: під неї ще
 * немає секції з дизайном, і посилання вело б у порожнечу.
 */
function bb_tour_category_anchor($slug) {
    $map = array(
        'e-bike-leisure-tours'            => 'cat1',
        'road-gravel-cycling-experiences' => 'cat2',
        'custom-experiences'              => 'cat3',
    );
    return isset($map[$slug]) ? $map[$slug] : '';
}

function bb_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('style', 'script'));
    register_nav_menus(array(
        'primary' => 'Hlavné menu',
    ));
}
add_action('after_setup_theme', 'bb_theme_setup');

/**
 * Прибирає з <head> те, чого сайту не треба: емодзі-скрипт, мета генератора,
 * посилання RSD/wlwmanifest і oEmbed. Менше зайвих запитів і менше інформації
 * про версію назовні.
 */
function bb_clean_head() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('init', 'bb_clean_head');

// Типи записів: тури й гіди.
require_once get_template_directory() . '/inc/cpt.php';

// Поля для адмінки. Один файл — щоб назви полів не розходились із шаблонами.
require_once get_template_directory() . '/inc/acf-fields.php';

// Спрощення самої адмінки: меню, підказки, попередження.
require_once get_template_directory() . '/inc/admin.php';

/*
 * Одноразові скрипти імпорту (import-tours, import-guides, create-pages,
 * fix-images, migrate-data) видалені. Вони спрацьовували на кожному заході
 * в адмінку за GET-параметром без перевірки прав і разових ключів, тобто
 * будь-який залогінений користувач міг ними скористатися. Свою роботу вони
 * вже виконали — тури, гіди й сторінки лежать у базі.
 */

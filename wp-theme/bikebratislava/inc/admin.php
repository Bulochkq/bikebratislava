<?php
/**
 * Налаштування самої адмінки: спрощене меню, підказки, попередження.
 *
 * Мета — щоб людина без технічних знань бачила тільки те, чим реально
 * користується, і щоб типова помилка (тур без категорії) не проходила тихо.
 */

if (!defined('ABSPATH')) {
    exit;
}

/* ====================================================================
 * 1. ТУР БЕЗ КАТЕГОРІЇ
 *
 * Сторінка Tours виводить тури двома циклами — по одному на секцію,
 * і кожен цикл шукає тури своєї категорії. Тур без категорії не належить
 * жодній секції, тому просто ніде не виводиться. Мовчазна пастка, тож
 * попереджаємо і в редакторі туру, і в списку турів.
 * ================================================================== */

function bb_tour_has_category($post_id) {
    $terms = wp_get_object_terms($post_id, 'tour_category', array('fields' => 'ids'));
    return !is_wp_error($terms) && !empty($terms);
}

add_action('admin_notices', 'bb_tour_category_notice');
function bb_tour_category_notice() {
    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'tour') {
        return;
    }

    // Редактор конкретного туру.
    if ($screen->base === 'post') {
        $post_id = isset($_GET['post']) ? (int) $_GET['post'] : 0;
        if ($post_id && bb_tour_has_category($post_id)) {
            return;
        }
        echo '<div class="notice notice-warning"><p><strong>Táto túra sa na stránke ešte nezobrazí.</strong> '
           . 'V pravom stĺpci vyberte <em>Kategórie túr</em> — určuje, v ktorej sekcii stránky '
           . '<em>Tours &amp; Rides</em> sa túra objaví. Bez kategórie túra nepatrí do žiadnej sekcie.</p></div>';
        return;
    }

    // Список турів — коротке зведення згори.
    if ($screen->base === 'edit') {
        $orphans = get_posts(array(
            'post_type'      => 'tour',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
            'tax_query'      => array(array(
                'taxonomy' => 'tour_category',
                'operator' => 'NOT EXISTS',
            )),
        ));
        if (!empty($orphans)) {
            printf(
                '<div class="notice notice-warning"><p><strong>%d %s bez kategórie</strong> — na stránke sa nezobrazuje. '
                . 'Otvorte túru a vpravo vyberte <em>Kategórie túr</em>.</p></div>',
                count($orphans),
                count($orphans) === 1 ? 'túra je' : 'túry sú'
            );
        }
    }
}

/**
 * Стовпчик «Na stránke» у списку турів: одразу видно, чи тур реально
 * показується відвідувачу, і якщо ні — чому саме.
 */
add_filter('manage_tour_posts_columns', 'bb_tour_admin_columns');
function bb_tour_admin_columns($columns) {
    $out = array();
    foreach ($columns as $key => $label) {
        $out[$key] = $label;
        if ($key === 'title') {
            $out['bb_visible'] = 'Na stránke';
        }
    }
    return $out;
}

add_action('manage_tour_posts_custom_column', 'bb_tour_admin_column_value', 10, 2);
function bb_tour_admin_column_value($column, $post_id) {
    if ($column !== 'bb_visible') {
        return;
    }
    if (get_post_status($post_id) !== 'publish') {
        echo '<span style="color:#996800;font-weight:600;">Nezobrazuje sa</span>'
           . '<br><span style="color:#777;">nie je publikovaná</span>';
        return;
    }
    if (!bb_tour_has_category($post_id)) {
        echo '<span style="color:#b32d2e;font-weight:600;">Nezobrazuje sa</span>'
           . '<br><span style="color:#777;">chýba kategória</span>';
        return;
    }
    echo '<span style="color:#007017;font-weight:600;">Zobrazuje sa</span>';
}

/* ====================================================================
 * 2. ЗАПИСИ = ЖУРНАЛ
 *
 * Стандартні «Записи» WordPress — це і є статті журналу. Назва
 * «Príspevky» поруч із «Túry» та «Sprievodcovia» збиває з пантелику,
 * тому перейменовуємо на «Žurnál», а рубрики — на «Rubriky žurnálu».
 * ================================================================== */

add_action('init', 'bb_rename_posts_to_journal', 20);
function bb_rename_posts_to_journal() {
    global $wp_post_types, $wp_taxonomies;

    if (isset($wp_post_types['post'])) {
        $l = $wp_post_types['post']->labels;
        $l->name                  = 'Žurnál';
        $l->singular_name         = 'Článok';
        $l->menu_name             = 'Žurnál';
        $l->name_admin_bar        = 'Článok';
        $l->all_items             = 'Všetky články';
        $l->add_new               = 'Pridať nový';
        $l->add_new_item          = 'Pridať nový článok';
        $l->edit_item             = 'Upraviť článok';
        $l->new_item              = 'Nový článok';
        $l->view_item             = 'Zobraziť článok';
        $l->search_items          = 'Hľadať články';
        $l->not_found             = 'Žiadne články sa nenašli.';
        $l->featured_image        = 'Fotka článku';
        $l->set_featured_image    = 'Nastaviť fotku článku';
        $l->remove_featured_image = 'Odstrániť fotku';
        $l->use_featured_image    = 'Použiť ako fotku článku';
    }

    if (isset($wp_taxonomies['category'])) {
        $t = $wp_taxonomies['category']->labels;
        $t->name          = 'Rubriky žurnálu';
        $t->singular_name = 'Rubrika';
        $t->menu_name     = 'Rubriky';
        $t->all_items     = 'Všetky rubriky';
        $t->edit_item     = 'Upraviť rubriku';
        $t->add_new_item  = 'Pridať rubriku';
    }
}

/* ====================================================================
 * 3. СПРОЩЕНЕ МЕНЮ
 *
 * Прибрані пункти лишаються доступними за прямою адресою — це лише
 * приховування з меню, а не обмеження прав. Повні права адміністратора
 * бачать усе, крім справді непотрібного (коментарі на сайті вимкнені).
 * ================================================================== */

add_action('admin_menu', 'bb_simplify_admin_menu', 999);
function bb_simplify_admin_menu() {
    // Коментарів на сайті немає — пункт нікому не потрібен.
    remove_menu_page('edit-comments.php');

    // Усе, що не стосується щоденного наповнення, ховаємо від редакторів.
    if (!current_user_can('manage_options')) {
        remove_menu_page('tools.php');
        remove_menu_page('themes.php');
        remove_menu_page('plugins.php');
        remove_menu_page('users.php');
        remove_menu_page('options-general.php');
        remove_menu_page('edit.php?post_type=acf-field-group');
        remove_menu_page('profile.php');
    }
}

/**
 * Порядок пунктів: спершу те, що редагують щодня.
 */
add_filter('custom_menu_order', '__return_true');
add_filter('menu_order', 'bb_admin_menu_order');
function bb_admin_menu_order($menu) {
    return array(
        'index.php',                  // Nástenka
        'edit.php?post_type=tour',    // Túry
        'edit.php?post_type=guide',   // Sprievodcovia
        'edit.php',                   // Žurnál
        'edit.php?post_type=page',    // Stránky
        'upload.php',                 // Médiá
    );
}

/**
 * Поля ACF описані в коді теми, тому редактор контенту не має причин
 * заходити в конструктор полів — інакше легко зламати звʼязок із шаблоном.
 */
add_filter('acf/settings/show_admin', 'bb_acf_admin_for_admins_only');
function bb_acf_admin_for_admins_only() {
    return current_user_can('manage_options');
}

/* ====================================================================
 * 4. КОМЕНТАРІ ВИМКНЕНІ
 *
 * У дизайні сайту блоку коментарів немає, а відкрита форма коментарів —
 * це постійний потік спаму й зайва поверхня для атак.
 * ================================================================== */

add_action('init', 'bb_disable_comments');
function bb_disable_comments() {
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
    remove_post_type_support('post', 'trackbacks');
    remove_post_type_support('page', 'trackbacks');
}
add_filter('comments_open', '__return_false', 20);
add_filter('pings_open', '__return_false', 20);

add_action('admin_bar_menu', 'bb_remove_admin_bar_comments', 999);
function bb_remove_admin_bar_comments($bar) {
    $bar->remove_node('comments');
}

/* ====================================================================
 * 5. НАСТІННА ПАНЕЛЬ: коротка інструкція замість новин WordPress
 * ================================================================== */

add_action('wp_dashboard_setup', 'bb_dashboard_setup');
function bb_dashboard_setup() {
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');

    wp_add_dashboard_widget('bb_help', 'Ako upravovať obsah stránky', 'bb_dashboard_help');
}

function bb_dashboard_help() {
    $orphans = get_posts(array(
        'post_type'      => 'tour',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'tax_query'      => array(array(
            'taxonomy' => 'tour_category',
            'operator' => 'NOT EXISTS',
        )),
    ));

    if (!empty($orphans)) {
        printf(
            '<div class="notice notice-warning inline" style="margin:0 0 12px;padding:8px 12px;">'
            . '<strong>%d %s bez kategórie</strong> a preto sa na stránke nezobrazuje. '
            . '<a href="%s">Zobraziť túry</a></div>',
            count($orphans),
            count($orphans) === 1 ? 'túra je' : 'túry sú',
            esc_url(admin_url('edit.php?post_type=tour'))
        );
    }
    ?>
    <ul style="line-height:1.7;">
        <li><strong>Nová túra:</strong> <em>Túry → Pridať novú</em>. Vyplňte texty a potom
            <strong>nezabudnite na dve veci vpravo</strong>: <em>Kategórie túr</em> (v ktorej sekcii
            sa túra objaví) a <em>Fotka túry</em>. Bez kategórie sa túra nezobrazí.</li>
        <li><strong>Poradie túr v sekcii:</strong> pole <em>Poradie</em> v bloku
            <em>Atribúty stránky</em>. Nižšie číslo = vyššie v zozname.</li>
        <li><strong>Nový sprievodca:</strong> <em>Sprievodcovia → Pridať novú</em>.</li>
        <li><strong>Nový článok:</strong> <em>Žurnál → Pridať nový</em>. Vyberte rubriku —
            podľa nej sa článok zaradí do filtra na stránke Journal.</li>
        <li><strong>Fotky:</strong> vždy cez blok <em>Fotka …</em> v pravom stĺpci.
            Obrázok vložený priamo do textu sa na kartu nedostane.</li>
    </ul>
    <?php
}

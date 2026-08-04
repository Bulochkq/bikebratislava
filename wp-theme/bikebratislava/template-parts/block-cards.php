<?php
/**
 * Блок «заголовок і картки під ним».
 *
 * Картки — це блоки-діти цього запису. Щоб додати картку, редактор
 * створює блок із виглядом «Kartička» і вибирає цей блок як надрядний.
 * Нумерація (01, 02, …) проставляється автоматично, тож при видаленні
 * картки нічого не треба перенумеровувати руками.
 */

if (!defined('ABSPATH')) {
    exit;
}

$block = get_query_var('bb_block');
if (!$block) {
    return;
}

$dark    = bb_block_is_dark($block->ID);
$eyebrow = get_field('eyebrow', $block->ID);
$cards   = bb_block_children($block->ID);

// Три колонки виглядають правильно для 3 і 6 карток; для 4 і 8 краще
// чотири, інакше останній рядок лишається напівпорожнім.
$count = count($cards);
$cols  = ($count % 4 === 0 && $count > 0) ? 'lg:grid-cols-4' : 'lg:grid-cols-3';
?>
<section class="bb-block py-16 lg:py-20 relative overflow-hidden <?php echo esc_attr(bb_block_bg_class($block->ID)); ?>">
    <div class="max-w-6xl mx-auto px-6 lg:px-12 relative z-10">

        <div class="text-center max-w-2xl mx-auto mb-20 scroll-reveal">
            <?php if ($eyebrow) : ?>
            <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block"><?php echo esc_html($eyebrow); ?></span>
            <?php endif; ?>
            <h2 class="font-serif text-4xl md:text-5xl font-light <?php echo $dark ? 'text-white' : 'text-brand-luxeDark'; ?>"><?php echo esc_html($block->post_title); ?></h2>
            <div class="h-[1px] w-12 bg-brand-luxeGold mx-auto mt-6"></div>
            <?php if ($block->post_content) : ?>
            <div class="<?php echo $dark ? 'text-stone-300' : 'text-stone-600'; ?> font-light text-sm leading-relaxed font-sans mt-6 [&_p]:mb-4 [&_p:last-child]:mb-0">
                <?php echo wp_kses_post(apply_filters('the_content', $block->post_content)); ?>
            </div>
            <?php endif; ?>
        </div>

        <?php if ($cards) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 <?php echo esc_attr($cols); ?> gap-x-12 gap-y-16">
            <?php $n = 0; foreach ($cards as $card) : $n++; ?>
            <div class="bg-transparent border-t <?php echo $dark ? 'border-white/15' : 'border-stone-300/40'; ?> pt-8 scroll-reveal">
                <span class="font-serif text-3xl text-brand-luxeGold font-light block mb-4"><?php echo esc_html(str_pad($n, 2, '0', STR_PAD_LEFT)); ?></span>
                <h3 class="font-serif text-lg font-medium <?php echo $dark ? 'text-white' : 'text-brand-luxeDark'; ?> mb-3"><?php echo esc_html($card->post_title); ?></h3>
                <div class="<?php echo $dark ? 'text-stone-400' : 'text-stone-500'; ?> text-xs font-light leading-relaxed font-sans tracking-wide [&_p]:mb-3 [&_p:last-child]:mb-0">
                    <?php echo wp_kses_post(apply_filters('the_content', $card->post_content)); ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div>
</section>

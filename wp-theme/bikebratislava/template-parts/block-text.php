<?php
/**
 * Блок «широкий текст на стід» — для вступів і маніфестів,
 * де фото тільки заважає.
 */

if (!defined('ABSPATH')) {
    exit;
}

$block = get_query_var('bb_block');
if (!$block) {
    return;
}

$dark      = bb_block_is_dark($block->ID);
$eyebrow   = get_field('eyebrow', $block->ID);
$subtitle  = get_field('subtitle', $block->ID);
$highlight = get_field('highlight', $block->ID);
?>
<section class="bb-block py-16 lg:py-20 relative overflow-hidden <?php echo esc_attr(bb_block_bg_class($block->ID)); ?>">
    <div class="max-w-3xl mx-auto px-6 lg:px-12 relative z-10 text-center scroll-reveal">
        <?php if ($eyebrow) : ?>
        <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block"><?php echo esc_html($eyebrow); ?></span>
        <?php endif; ?>
        <h2 class="font-serif text-3xl md:text-5xl font-light <?php echo $dark ? 'text-white' : 'text-brand-luxeDark'; ?>"><?php echo esc_html($block->post_title); ?></h2>
        <?php if ($subtitle) : ?>
        <span class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-lg md:text-2xl block mt-3"><?php echo esc_html($subtitle); ?></span>
        <?php endif; ?>
        <div class="h-[1px] w-12 bg-brand-luxeGold mx-auto mt-6 mb-8"></div>
        <div class="<?php echo $dark ? 'text-stone-300' : 'text-stone-600'; ?> font-light leading-relaxed text-sm md:text-base tracking-wide font-sans [&_p]:mb-6 [&_p:last-child]:mb-0">
            <?php echo wp_kses_post(apply_filters('the_content', $block->post_content)); ?>
        </div>
        <?php if ($highlight) : ?>
        <p class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-sm leading-relaxed mt-8 max-w-xl mx-auto">
            <?php echo esc_html($highlight); ?></p>
        <?php endif; ?>
    </div>
</section>

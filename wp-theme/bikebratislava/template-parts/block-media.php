<?php
/**
 * Блок «текст і фото/відео поруч».
 *
 * Сторона медіа чергується автоматично — параметр bb_block_flip приходить
 * із bb_render_blocks(), тому редактору не треба про це думати.
 */

if (!defined('ABSPATH')) {
    exit;
}

$block = get_query_var('bb_block');
if (!$block) {
    return;
}

$flip      = (bool) get_query_var('bb_block_flip');
$dark      = bb_block_is_dark($block->ID);
$eyebrow   = get_field('eyebrow', $block->ID);
$subtitle  = get_field('subtitle', $block->ID);
$highlight = get_field('highlight', $block->ID);
$video_id  = get_field('video', $block->ID);
$video     = $video_id ? wp_get_attachment_url((int) $video_id) : '';
$image     = has_post_thumbnail($block->ID) ? get_the_post_thumbnail_url($block->ID, 'large') : '';
$ratio     = $video ? 'aspect-video' : 'aspect-[4/3]';
?>
<section class="bb-block py-16 lg:py-20 relative overflow-hidden <?php echo esc_attr(bb_block_bg_class($block->ID)); ?>">
    <div class="max-w-[1600px] mx-auto px-6 lg:px-12 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">

            <div class="w-full lg:w-5/12 z-20 scroll-reveal <?php echo $flip ? 'lg:order-2' : 'lg:order-1'; ?>">
                <div class="<?php echo $dark
                    ? 'bg-white/5 backdrop-blur-2xl border border-white/10'
                    : 'bg-white/60 backdrop-blur-2xl border border-white/80'; ?> shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-10 lg:p-16 rounded-none relative">
                    <?php if ($eyebrow) : ?>
                    <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block"><?php echo esc_html($eyebrow); ?></span>
                    <?php endif; ?>
                    <h2 class="font-serif text-3xl md:text-5xl font-light <?php echo $dark ? 'text-white' : 'text-brand-luxeDark'; ?> mb-8"><?php echo esc_html($block->post_title); ?></h2>
                    <?php if ($subtitle) : ?>
                    <span class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-xl md:text-2xl block mt-3 mb-6"><?php echo esc_html($subtitle); ?></span>
                    <?php endif; ?>
                    <div class="<?php echo $dark ? 'text-stone-300' : 'text-stone-600'; ?> font-light leading-relaxed text-sm md:text-base tracking-wide font-sans [&_p]:mb-6 [&_p:last-child]:mb-0">
                        <?php echo wp_kses_post(apply_filters('the_content', $block->post_content)); ?>
                    </div>
                    <?php if ($highlight) : ?>
                    <p class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold border-l-2 border-brand-luxeGold/60 pl-6 text-sm py-1 leading-relaxed mt-8">
                        <?php echo esc_html($highlight); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="w-full lg:w-7/12 z-10 scroll-reveal mt-10 lg:mt-0 <?php echo $flip ? 'lg:order-1' : 'lg:order-2'; ?>">
                <div class="<?php echo esc_attr($ratio); ?> overflow-hidden shadow-2xl rounded-none relative bg-stone-200">
                    <?php if ($video) : ?>
                    <video autoplay muted loop playsinline preload="metadata" controls
                        <?php if ($image) : ?>poster="<?php echo esc_url($image); ?>"<?php endif; ?>
                        class="w-full h-full object-cover">
                        <source src="<?php echo esc_url($video); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <?php elseif ($image) : ?>
                    <img loading="lazy" decoding="async" src="<?php echo esc_url($image); ?>"
                        alt="<?php echo esc_attr($block->post_title); ?>"
                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-700 ease-out">
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>

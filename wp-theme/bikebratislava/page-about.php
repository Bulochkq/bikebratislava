<?php get_header(); ?>


    <!-- HERO SECTION -->
    <section class="relative min-h-[75vh] flex items-center justify-center bg-brand-luxeDark overflow-hidden">
        <div class="absolute inset-0 z-0">
            <!-- Curated group cyclists lifestyle background with scale-110 for parallax -->
            <img src="<?php echo esc_url(bb_hero_image('coffee-break.jpg')); ?>" 
                 alt="About us background" 
                 class="w-full h-full object-cover object-center opacity-45 scale-110" id="hero-img" style="will-change: transform;">
            <div class="absolute inset-0 bg-gradient-to-t from-brand-luxeDark via-brand-luxeDark/35 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center text-brand-luxeTextLight flex flex-col items-center">
            <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-6 block opacity-0 fade-in-up editable"><?php echo esc_html(get_field('hero_eyebrow') ?: 'Our Philosophy'); ?></span>
            <h1 class="font-serif text-5xl md:text-7xl font-light mb-6 opacity-0 fade-in-up animation-delay-200 text-white leading-tight"><?php echo esc_html(get_field('hero_title') ?: 'We Ride What'); ?></h1>
            <span class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-2xl md:text-4xl lg:text-5xl block mt-4"><?php echo esc_html(get_field('hero_subtitle') ?: 'We Recommend'); ?></span>
            <p class="text-stone-400 text-sm md:text-base font-light max-w-xl mx-auto leading-relaxed tracking-wider opacity-0 fade-in-up animation-delay-400">
                <?php echo esc_html(get_field('hero_text') ?: 'Every route we offer is a route we ride ourselves. Discover the passion that drives us.'); ?>
            </p>
        </div>
    </section>

    <?php
    // Сторінка збирається з блоків, заведених у розділі «Bloky stránok».
    // Додати, прибрати чи переставити блок можна без правок у коді.
    bb_render_blocks('about');
    ?>

    <!-- SECTION: FINAL CTA (Asphalt background) -->
    <section class="py-16 bg-brand-luxeDark text-white text-center relative overflow-hidden">
        <!-- Asphalt dark background texture with parallax will-change and styling -->
        <div class="parallax-bg asphalt"></div>

        <div class="max-w-3xl mx-auto px-6 relative z-10 scroll-reveal">
            <h2 class="font-serif text-4xl md:text-5xl font-light text-brand-luxeGold mb-6 editable">Ready to see Bratislava from the saddle?</h2>
            <p class="text-stone-400 font-light text-sm max-w-lg mx-auto mb-10 tracking-wide font-sans leading-relaxed editable">
                Explore the unique border-crossings, paved riversides, and hidden castles with us.
            </p>
            <a href="discover" class="inline-flex items-center justify-center px-12 py-5 bg-brand-luxeGold hover:bg-brand-luxeGoldDark text-white font-medium text-[11px] tracking-[0.25em] uppercase transition-all duration-300 rounded-none border border-brand-luxeGold shadow-2xl">
                Discover Bratislava
            </a>
        </div>
    </section>

            <?php get_footer(); ?>

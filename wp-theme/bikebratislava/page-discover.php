<?php get_header(); ?>


    <!-- HERO SECTION -->
    <section class="relative min-h-[75vh] flex items-center justify-center bg-brand-luxeDark text-white overflow-hidden">
        <div class="absolute inset-0 z-0">
            <!-- Bratislava sunset castle viewpoint with scale-110 for parallax -->
            <img src="<?php echo esc_url(bb_hero_image('discover-hero.jpg')); ?>" 
                 alt="Bratislava landscape view leisure cycling" 
                 class="w-full h-full object-cover object-[center_75%] opacity-45 scale-110" id="hero-img" style="will-change: transform;">
            <div class="absolute inset-0 bg-gradient-to-t from-brand-luxeDark via-brand-luxeDark/35 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center flex flex-col items-center">
            <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-6 block opacity-0 fade-in-up editable"><?php echo esc_html(get_field('hero_eyebrow') ?: 'Bratislava Cycling'); ?></span>
            <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl font-light leading-tight opacity-0 fade-in-up animation-delay-200 editable"><?php echo esc_html(get_field('hero_title') ?: 'Vienna Is Famous'); ?></h1>
            <span class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-2xl md:text-4xl block mt-4 editable"><?php echo esc_html(get_field('hero_subtitle') ?: 'Bratislava Is Waiting To Be Discovered'); ?></span>
        </div>
    </section>

    <?php
    // Сторінка збирається з блоків, заведених у розділі «Bloky stránok».
    // Додати, прибрати чи переставити блок можна без правок у коді.
    bb_render_blocks('discover');
    ?>

    <!-- FINAL CTA (Asphalt background) -->
    <section class="py-16 bg-brand-luxeDark text-white text-center relative overflow-hidden">
        <!-- Asphalt dark background texture with parallax will-change and styling -->
        <div class="parallax-bg asphalt"></div>

        <div class="max-w-3xl mx-auto px-6 relative z-10 scroll-reveal">
            <h2 class="font-serif text-4xl md:text-5xl font-light text-brand-luxeGold mb-6 editable">Find Your Perfect Route</h2>
            <p class="text-stone-400 font-light text-sm mb-10 max-w-lg mx-auto tracking-wide font-sans leading-relaxed editable">
                Whether you want a flat riverside spin or a challenging road ride, we have the ideal experience for you.
            </p>
            <a href="tours" class="inline-flex items-center justify-center px-10 py-5 bg-brand-luxeGold hover:bg-brand-luxeGoldDark text-white font-medium text-[11px] tracking-[0.25em] uppercase transition-all duration-300 rounded-none shadow-2xl border border-brand-luxeGold">
                Explore Tours & Rides
            </a>
        </div>
    </section>

            <?php get_footer(); ?>

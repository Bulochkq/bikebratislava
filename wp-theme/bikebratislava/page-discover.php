<?php get_header(); ?>


    <!-- HERO SECTION -->
    <section class="relative min-h-[75vh] flex items-center justify-center bg-brand-luxeDark text-white overflow-hidden">
        <div class="absolute inset-0 z-0">
            <!-- Bratislava sunset castle viewpoint with scale-110 for parallax -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/pictures/discover-hero.jpg" 
                 alt="Bratislava landscape view leisure cycling" 
                 class="w-full h-full object-cover object-[center_75%] opacity-45 scale-110" id="hero-img" style="will-change: transform;">
            <div class="absolute inset-0 bg-gradient-to-t from-brand-luxeDark via-brand-luxeDark/35 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center flex flex-col items-center">
            <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-6 block opacity-0 fade-in-up editable">Bratislava Cycling</span>
            <h1 class="font-serif text-4xl md:text-6xl lg:text-7xl font-light leading-tight opacity-0 fade-in-up animation-delay-200 editable">Vienna Is Famous</h1>
            <span class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-2xl md:text-4xl block mt-4 editable">Bratislava Is Waiting To Be Discovered</span>
        </div>
    </section>

    <?php
    /*
     * Блоки сторінки Discover. Раніше їх було п'ять, вписаних у код, кожен
     * зі своїм градієнтом і кольоровими плямами — додати шостий без
     * програміста було неможливо.
     *
     * Тепер один блок = один запис у розділі «Discover». Сторона, з якої
     * стоїть медіа, чергується сама, а фон під усіма блоками спільний:
     * він намальований градієнтами, тому нічого не вантажиться і при
     * довшій сторінці просто продовжується вниз.
     */
    $bb_blocks = get_posts(array(
        'post_type'      => 'discover_block',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order date',
        'order'          => 'ASC',
    ));
    if ($bb_blocks) :
    ?>
    <div class="bb-soft-bg">
        <?php
        $bb_i = 0;
        foreach ($bb_blocks as $bb_b) :
            $bb_i++;
            $bb_flip     = ($bb_i % 2 === 0);          // парний блок — медіа ліворуч
            $bb_text_ord = $bb_flip ? 'lg:order-2' : 'lg:order-1';
            $bb_media_ord = $bb_flip ? 'lg:order-1' : 'lg:order-2';
            $bb_eyebrow  = get_field('eyebrow', $bb_b->ID);
            $bb_subtitle = get_field('subtitle', $bb_b->ID);
            $bb_video_id = get_field('video', $bb_b->ID);
            $bb_video    = $bb_video_id ? wp_get_attachment_url((int) $bb_video_id) : '';
            $bb_poster   = has_post_thumbnail($bb_b->ID) ? get_the_post_thumbnail_url($bb_b->ID, 'large') : '';
            $bb_ratio    = $bb_video ? 'aspect-video' : 'aspect-[4/3]';
        ?>
        <section class="bb-block py-16 lg:py-20 relative overflow-hidden">
            <div class="max-w-[1600px] mx-auto px-6 lg:px-12 relative z-10">
                <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">

                    <div class="w-full lg:w-5/12 z-20 scroll-reveal <?php echo esc_attr($bb_text_ord); ?>">
                        <div class="bg-white/60 backdrop-blur-2xl border border-white/80 shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-10 lg:p-16 rounded-none relative">
                            <?php if ($bb_eyebrow) : ?>
                            <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block"><?php echo esc_html($bb_eyebrow); ?></span>
                            <?php endif; ?>
                            <h2 class="font-serif text-3xl md:text-5xl font-light text-brand-luxeDark mb-8"><?php echo esc_html($bb_b->post_title); ?></h2>
                            <?php if ($bb_subtitle) : ?>
                            <span class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-xl md:text-2xl block mt-3 mb-6"><?php echo esc_html($bb_subtitle); ?></span>
                            <?php endif; ?>
                            <div class="text-stone-600 font-light leading-relaxed text-sm md:text-base tracking-wide font-sans [&_p]:mb-6 [&_p:last-child]:mb-0">
                                <?php echo wp_kses_post(apply_filters('the_content', $bb_b->post_content)); ?>
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:w-7/12 z-10 scroll-reveal mt-10 lg:mt-0 <?php echo esc_attr($bb_media_ord); ?>">
                        <div class="<?php echo esc_attr($bb_ratio); ?> overflow-hidden shadow-2xl rounded-none relative bg-stone-200">
                            <?php if ($bb_video) : ?>
                            <video autoplay muted loop playsinline preload="metadata" controls
                                <?php if ($bb_poster) : ?>poster="<?php echo esc_url($bb_poster); ?>"<?php endif; ?>
                                class="w-full h-full object-cover">
                                <source src="<?php echo esc_url($bb_video); ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <?php elseif ($bb_poster) : ?>
                            <img loading="lazy" decoding="async" src="<?php echo esc_url($bb_poster); ?>"
                                alt="<?php echo esc_attr($bb_b->post_title); ?>"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-700 ease-out">
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>


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

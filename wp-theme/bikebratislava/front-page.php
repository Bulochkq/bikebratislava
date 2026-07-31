<?php get_header(); ?>

    <!-- SECTION 1: HERO (local looping cyclist video playlist) -->
    <section class="relative min-h-screen flex items-center justify-center bg-brand-luxeDark overflow-hidden">
        <div class="absolute inset-0 z-0">
            <!-- Autoplaying, muted local MP4 video with transform class for parallax -->
            <!-- poster shows if video can't be loaded (e.g. GitHub Pages file size limit) -->
            <video autoplay muted playsinline
                   poster="<?php echo get_template_directory_uri(); ?>/assets/pictures/cyclists-sunset.jpg"
                   class="w-full h-full object-cover object-center opacity-45 scale-110" id="hero-video" style="will-change: transform;">
                <source src="<?php echo get_template_directory_uri(); ?>/assets/pictures/hero-waterfront.mp4" type="video/mp4">
            </video>
            <div class="absolute inset-0 bg-gradient-to-t from-brand-luxeDark via-brand-luxeDark/20 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-6 py-12 md:py-20 lg:py-24 text-center text-brand-luxeTextLight flex flex-col items-center">

            
            <h1 class="font-serif text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold tracking-tight leading-[1.1] md:leading-[1.05] mb-4 md:mb-6 opacity-0 fade-in-up animation-delay-200 text-white uppercase editable">
                <?php echo esc_html(get_field('hero_title') ?: 'Discover Bratislava'); ?></h1>
            <span class="font-sans font-black tracking-widest text-brand-luxeGold text-2xl md:text-4xl lg:text-5xl block mt-4 editable">    <?php echo esc_html(get_field('hero_subtitle') ?: 'Explore The Heart of Central Europe'); ?></span>
            
            <p class="max-w-2xl text-stone-400 text-xs sm:text-sm md:text-base xl:text-lg font-light leading-relaxed mb-8 md:mb-12 opacity-0 fade-in-up animation-delay-400 tracking-wide font-sans editable">
                <?php echo esc_html(get_field('hero_text') ?: 'Experience one of Europe’s most surprising cycling destinations. Ride through historic streets, riverside landscapes, vineyards and scenic countryside with our local ride leaders who know the region best.'); ?>
            </p>
            
            <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 opacity-0 fade-in-up animation-delay-400">
                <a href="<?php echo esc_url(home_url('/tours/')); ?>" class="w-52 text-center px-10 py-5 bg-brand-luxeGold hover:bg-brand-luxeGoldDark text-white font-medium text-[11px] tracking-[0.25em] uppercase transition-all duration-300 rounded-none">
                    Explore Our Tours
                </a>
                <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="w-52 text-center px-10 py-5 border border-white/20 hover:bg-white hover:text-brand-luxeDark text-white font-medium text-[11px] tracking-[0.25em] uppercase transition-all duration-300 rounded-none">
                    Plan Your Ride
                </a>
            </div>
        </div>

        <div class="absolute bottom-10 left-0 right-0 z-10 flex flex-col items-center animate-bounce">
            <span class="text-[8px] uppercase tracking-[0.4em] text-stone-500 mb-2 font-medium editable">Scroll down</span>
            <i data-lucide="chevron-down" class="w-4 h-4 text-stone-500"></i>
        </div>
    </section>

    <!-- SECTION 2: WHY BRATISLAVA (Concrete textured editorial) -->
    <section class="py-16 lg:py-20 parallax-section border-b border-stone-200" id="section-why">
        <div class="parallax-bg concrete" id="parallax-concrete"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-20 items-center">
                
                <div class="lg:col-span-5 flex flex-col scroll-reveal">
                    <div class="relative z-10 aspect-[3/4] overflow-hidden shadow-2xl border border-stone-300/60">
                        <!-- Local cyclists stopping at historic Devin/Bratislava castle -->
                        <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/devin-sunset.png" 
                             alt="Cyclists looking at historic castle landmark in Bratislava" 
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-700 ease-out">
                    </div>
                    <!-- Redesigned symmetrical card under the photo -->
                    <div class="bg-white/60 backdrop-blur-md border border-stone-300/60 p-6 mt-6 shadow-md flex flex-col items-center text-center">
                        <h4 class="font-sans font-bold uppercase tracking-widest text-sm text-brand-luxeGold mb-2 editable">DID YOU KNOW?</h4>
                        <p class="text-xs text-stone-800 leading-relaxed font-light font-sans tracking-wide editable">Bratislava is the only national capital that borders two sovereign countries: Austria and Hungary.</p>
                    </div>
                </div>

                <div class="lg:col-span-7 flex flex-col justify-center scroll-reveal">
                    <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block editable">The Destination</span>
                    <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl font-light text-brand-luxeDark leading-tight mb-8 editable">
                        One City. Four Countries</h2>
            <span class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-xl md:text-3xl block mt-3 editable">Endless Rides</span>
                    
                    <div class="space-y-6 text-stone-600 font-light leading-relaxed text-sm md:text-base mb-12 tracking-wide font-sans">
                        <p class="editable">
                            Bratislava sits at the crossroads of Central Europe, making it one of the most unique cycling destinations on the continent.
                        </p>
                        <p class="editable">
                            Within a single ride, you can explore Slovakia, Austria, Hungary and even the Czech Republic. From riverside paths and historic towns to vineyards, forests and quiet country roads, the possibilities are endless.
                        </p>
                        <p class="editable">
                            Whether you're looking for a relaxed sightseeing ride or a full day in the saddle, Bratislava offers experiences few destinations can match.
                        </p>
                    </div>

                    <!-- 6 Editorial Bullet Points -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-6 border-t border-stone-300 pt-8">
                        <div class="flex items-start space-x-4">
                            <span class="font-serif text-2xl text-brand-luxeGold font-light">01</span>
                            <div>
                                <h4 class="font-bold text-xs uppercase tracking-wider text-brand-luxeDark mb-1 editable">4 countries within reach</h4>
                                <p class="text-xs text-stone-500 font-light leading-relaxed editable">Cross borders seamlessly on two wheels.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <span class="font-serif text-2xl text-brand-luxeGold font-light">02</span>
                            <div>
                                <h4 class="font-bold text-xs uppercase tracking-wider text-brand-luxeDark mb-1 editable">Danube cycling routes</h4>
                                <p class="text-xs text-stone-500 font-light leading-relaxed editable">Flat, traffic-free paved cycle paths.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <span class="font-serif text-2xl text-brand-luxeGold font-light">03</span>
                            <div>
                                <h4 class="font-bold text-xs uppercase tracking-wider text-brand-luxeDark mb-1 editable">Wine regions & gastronomy</h4>
                                <p class="text-xs text-stone-500 font-light leading-relaxed editable">Ride through local vineyards and winemaking towns.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <span class="font-serif text-2xl text-brand-luxeGold font-light">04</span>
                            <div>
                                <h4 class="font-bold text-xs uppercase tracking-wider text-brand-luxeDark mb-1 editable">March–October season</h4>
                                <p class="text-xs text-stone-500 font-light leading-relaxed editable">Mild weather perfect for active exploration.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <span class="font-serif text-2xl text-brand-luxeGold font-light">05</span>
                            <div>
                                <h4 class="font-bold text-xs uppercase tracking-wider text-brand-luxeDark mb-1 editable">Historic towns & castles</h4>
                                <p class="text-xs text-stone-500 font-light leading-relaxed editable">Discover DevĂ­n, Bratislava, and historic ruins.</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <span class="font-serif text-2xl text-brand-luxeGold font-light">06</span>
                            <div>
                                <h4 class="font-bold text-xs uppercase tracking-wider text-brand-luxeDark mb-1 editable">Road, gravel & leisure</h4>
                                <p class="text-xs text-stone-500 font-light leading-relaxed editable">Perfect routes tailored for every bike type.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: FEATURED EXPERIENCES (Luxury cards with dark-minimal background) -->
    <section class="py-16 bg-white text-brand-luxeDark parallax-section border-b border-stone-200" id="section-adventures">
        <!-- Subtle blurred light background texture — inner parallax wrapper prevents edge bleed -->
        <div class="parallax-bg light-minimal" id="parallax-adventures"></div>

        <div class="max-w-[1400px] mx-auto px-6 lg:px-12 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-24 scroll-reveal">
                <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block editable">Curated Rides</span>
                <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl font-light text-brand-luxeDark editable">Choose Your Adventure</h2>
                <div class="h-[1px] w-12 bg-brand-luxeGold mx-auto mt-6"></div>
            </div>

            <?php
            $bb_categories = get_terms(array(
                'taxonomy'   => 'tour_category',
                'hide_empty' => false,
            ));
            if (!is_wp_error($bb_categories) && $bb_categories) :
                // Колонки підлаштовуються під кількість категорій, щоб
                // четверта не з'їжджала в окремий рядок сама.
                $bb_cols = (count($bb_categories) % 4 === 0) ? 'lg:grid-cols-4' : 'lg:grid-cols-3';
            ?>
            <div class="grid grid-cols-1 md:grid-cols-2 <?php echo $bb_cols; ?> gap-10 lg:gap-12">
                <?php
                $bb_n = 0;
                foreach ($bb_categories as $bb_cat) :
                    $bb_n++;
                    // Фото картки — зображення першого туру в категорії.
                    $bb_img = get_template_directory_uri() . '/assets/pictures/coffee-break.jpg';
                    $bb_first = new WP_Query(array(
                        'post_type'      => 'tour',
                        'posts_per_page' => 1,
                        'orderby'        => 'menu_order date',
                        'order'          => 'ASC',
                        'tax_query'      => array(array(
                            'taxonomy' => 'tour_category',
                            'field'    => 'term_id',
                            'terms'    => $bb_cat->term_id,
                        )),
                    ));
                    if ($bb_first->have_posts()) {
                        $bb_first->the_post();
                        if (has_post_thumbnail()) {
                            $bb_img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        }
                    }
                    wp_reset_postdata();
                ?>
                <div class="group bg-white flex flex-col justify-between transition-all duration-500 rounded-none scroll-reveal border border-red-600/30 hover:border-red-600/70 hover:shadow-2xl">
                    <div>
                        <div class="aspect-square overflow-hidden relative">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url($bb_img); ?>" alt="<?php echo esc_attr($bb_cat->name); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                            <div class="absolute top-4 left-4 bg-brand-luxeDark text-white text-[9px] tracking-[0.25em] uppercase font-medium py-1 px-3 border border-brand-luxeGold/25">
                                Category <?php echo $bb_n; ?>
                            </div>
                        </div>
                        <div class="pt-6 pb-2 px-5 lg:px-6">
                            <h3 class="font-serif text-2xl font-light text-brand-luxeDark mb-4"><?php echo esc_html($bb_cat->name); ?></h3>
                            <p class="text-stone-600 font-light text-xs leading-relaxed font-sans tracking-wide">
                                <?php echo esc_html($bb_cat->description); ?>
                            </p>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-5 lg:px-6">
                        <?php // Секції на сторінці турів мають id cat1/cat2/cat3 — до них прив'язана логіка розкриття панелей. ?>
                        <a href="<?php echo esc_url(home_url('/tours/#cat' . $bb_n)); ?>" class="inline-flex items-center justify-center bg-red-600 text-white px-8 py-3.5 text-[10px] font-bold tracking-[0.25em] uppercase hover:bg-stone-900 transition-colors duration-300 rounded-none w-max">Learn More</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- SECTION 4: MEET YOUR GUIDES (Asymmetric layout) -->
    <section class="py-16 lg:py-20 bg-aurora border-b border-stone-200" id="section-guides">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-20 items-center">
                
                <div class="lg:col-span-6 order-2 lg:order-1 scroll-reveal">
                    <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block editable">Local Experts</span>
                    <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl font-light text-brand-luxeDark leading-tight mb-8 editable">
                        Ride With Locals
                    </h2>
                    
                    <div class="space-y-6 text-stone-600 font-light leading-relaxed text-sm md:text-base mb-12 tracking-wide font-sans">
                        <p class="editable">
                            Our guides are passionate cyclists, storytellers and local experts.
                        </p>
                        <p class="editable">
                            They know the best roads, hidden viewpoints, coffee stops and places that rarely appear in guidebooks.
                        </p>
                        <p class="editable">
                            Most importantly, they know how to create rides that people remember long after they return home.
                        </p>
                    </div>

                    <a href="<?php echo esc_url(home_url('/guides/')); ?>" class="inline-flex items-center justify-center px-10 py-4 bg-brand-luxeDark hover:bg-brand-luxeDark/90 text-white font-medium text-[11px] tracking-[0.25em] uppercase transition-all duration-300 rounded-none border border-stone-800">
                        Meet The Team
                    </a>
                </div>

                <div class="lg:col-span-6 order-1 lg:order-2 scroll-reveal">
                    <div class="relative max-w-sm mx-auto lg:max-w-none">
                        <!-- Cyclists coffee stop portrait with hover transition -->
                        <div class="aspect-[3/4] overflow-hidden shadow-2xl border border-stone-300/60">
                            <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/guide-portrait.jpg" 
                                 alt="Professional bike guide in Bratislava region" 
                                 class="w-full h-full object-cover object-top hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <div class="absolute -top-6 -left-6 w-20 h-20 border-t border-l border-brand-luxeGold/40"></div>
                        <div class="absolute -bottom-6 -right-6 w-20 h-20 border-b border-r border-brand-luxeGold/40"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 5: CLIENTS & PARTNERS (Luxe Light theme with custom reviews background) -->
    <section class="py-16 lg:py-20 bg-diagonal text-brand-luxeDark" id="section-clients">

        <div class="max-w-6xl mx-auto px-6 relative z-10 scroll-reveal">
            <div class="text-center mb-20">
                <div class="inline-flex items-center space-x-2 mb-4">
                    <span class="px-4 py-1.5 border border-brand-luxeGold/30 text-brand-luxeGold text-[9px] tracking-[0.25em] uppercase font-medium rounded-none editable">Corporate Experiences</span>
                </div>
                <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl font-semibold text-brand-luxeGold tracking-wide editable">
                    Trusted By Top Companies
                </h2>
                <p class="text-stone-600 font-light text-sm mt-6 max-w-2xl mx-auto tracking-wide font-sans leading-relaxed editable">
                    We deliver premium corporate cycling tours, team-building rides, and VIP experiences for leading organizations.
                </p>
            </div>

            <!-- Logos Row -->
            <div class="flex flex-wrap justify-center items-center gap-10 md:gap-16 lg:gap-20 mt-16 max-w-5xl mx-auto">
                <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/partner-swissre.png" alt="Swiss Re" class="h-10 md:h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-105">
                <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/partner-pixelfederation.png" alt="Pixel Federation" class="h-10 md:h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-105">
                <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/partner-jtre.png" alt="JTRE" class="h-10 md:h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-105">
                <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/partner-alto.png" alt="Alto Real" class="h-10 md:h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-105">
                <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/partner-corwin.png" alt="Corwin" class="h-12 md:h-14 lg:h-16 object-contain transition-transform duration-300 hover:scale-105">
                <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/partner-vodacke-centrum.png" alt="Vodacke centrum" class="h-10 md:h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-105">
            </div>
        </div>
    </section>


    <!-- SECTION 6: FINAL CTA (Luxe Dark theme with asphalt background texture) -->
    <section class="py-16 bg-brand-luxeDark text-white parallax-section text-center border-b border-stone-900" id="section-cta">
        <!-- Asphalt dark background texture — inner parallax wrapper prevents white edge bleed -->
        <div class="parallax-bg" id="parallax-cta-asphalt" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo get_template_directory_uri(); ?>/assets/pictures/explore-bratislava.jpeg'); background-size: cover; background-position: center;"></div>

        <div class="max-w-4xl mx-auto px-6 relative z-10 scroll-reveal">
            <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block editable">Start Planning</span>
            <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl font-light text-white mb-8 editable">Ready To Explore Bratislava?</h2>
            <p class="text-stone-300 font-light text-sm md:text-base max-w-xl mx-auto leading-relaxed mb-12 tracking-wide font-sans editable">
                Tell us when you're visiting Bratislava and we'll help you find the perfect ride.
            </p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="inline-flex items-center justify-center px-12 py-5 bg-white hover:bg-brand-luxeGold hover:text-white text-brand-luxeDark font-medium text-[11px] tracking-[0.25em] uppercase transition-all duration-300 rounded-none shadow-2xl border border-white hover:border-brand-luxeGold">
                Go to Inquiry Form
            </a>
        </div>
    </section>


<?php get_footer(); ?>

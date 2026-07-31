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

    <!-- SECTION 1: FOUR COUNTRIES -->
    <section class="py-12 relative overflow-hidden bg-gradient-to-br from-stone-50 via-rose-50/40 to-stone-100">
        <!-- Abstract blur blobs in background -->
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-rose-200/40 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
        <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-brand-luxeGold/10 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-200"></div>
        
        <div class="max-w-[1600px] mx-auto px-6 lg:px-12 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-16">
                <div class="w-full lg:w-5/12 z-20 lg:pr-0 scroll-reveal">
                    <div class="bg-white/60 backdrop-blur-2xl border border-white/80 shadow-[0_8px_30px_rgb(0,0,0,0.04)] p-10 lg:p-16 rounded-none  relative">
                        <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block editable">Cross-Border Adventures</span>
                        <h2 class="font-serif text-3xl md:text-5xl font-light text-brand-luxeDark mb-8 editable">Four Countries</h2>
            <span class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-xl md:text-2xl block mt-3 editable">One Cycling Destination</span>
                        <p class="text-stone-600 font-light leading-relaxed text-sm md:text-base mb-6 tracking-wide font-sans editable">
                            Few capital cities offer the geographical thrill that Bratislava does. Sitting right at the intersection of Central European borders, our rides allow you to seamlessly cross from Slovakia into Austria and Hungary within a single day. 
                        </p>
                        <p class="text-stone-600 font-light leading-relaxed text-sm md:text-base tracking-wide font-sans mb-8 editable">
                            With flat borders and cycle-friendly crossings, you can pedal through Austrian historic villages, ride along Hungarian dikes, and return for a sunset dinner along the Slovak Danube.
                        </p>

                    </div>
                </div>
                <div class="w-full lg:w-7/12 z-10 scroll-reveal mt-10 lg:mt-0">
                    <div class="aspect-[4/3] overflow-hidden shadow-2xl rounded-none relative">
                        <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/corporate-group.jpg" 
                             alt="Cycling on cross-border roads near Austria slovakia group ride" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700 ease-out">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 2: DANUBE ROUTE (HTML5 Video player) -->
    <section class="py-12 relative overflow-hidden bg-gradient-to-bl from-stone-50 via-blue-50/30 to-stone-100">
        <div class="absolute top-1/2 left-1/4 w-[700px] h-[700px] bg-blue-100/40 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
        <div class="w-full max-w-[1800px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-center gap-12 lg:gap-16">
                <div class="w-full lg:w-3/4 z-10 scroll-reveal order-2 lg:order-1 mt-10 lg:mt-0 relative">
                    <div class="aspect-video overflow-hidden shadow-2xl rounded-none bg-black relative">
                        <video autoplay muted loop playsinline preload="auto" class="w-full h-full object-cover" controls>
                            <source src="<?php echo get_template_directory_uri(); ?>/assets/pictures/danube-cycling.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                <div class="w-full lg:w-1/3 z-20  scroll-reveal order-1 lg:order-2">
                    <div class="bg-white/70 backdrop-blur-3xl border border-white/80 shadow-[0_8px_30px_rgb(0,0,0,0.08)] p-10 lg:p-14 rounded-none relative">
                        <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block editable">Danube River paths</span>
                        <h2 class="font-serif text-3xl md:text-5xl font-light text-brand-luxeDark mb-8 editable">Following Europe's</h2>
            <span class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-xl md:text-2xl block mt-3 editable">Great River</span>
                        <p class="text-stone-600 font-light leading-relaxed text-sm md:text-base mb-6 tracking-wide font-sans editable">
                            The Danube River is the lifeblood of cycling in Central Europe. The EuroVelo 6 cycle route runs directly through Bratislava, offering flat, fully paved, traffic-free paths that run as far as the eye can see.
                        </p>
                        <p class="text-stone-600 font-light leading-relaxed text-sm md:text-base tracking-wide font-sans mb-8 editable">
                            It's perfect for leisure riders, active families, or road cyclists looking to build speed without worrying about car traffic.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: VINEYARDS (HTML5 Video player) -->
    <section class="py-12 relative overflow-hidden bg-gradient-to-br from-stone-50 via-green-50/30 to-stone-100">
        <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-green-200/30 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
        <div class="w-full max-w-[1800px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-center gap-12 lg:gap-16">
                <div class="w-full lg:w-1/3 z-20  scroll-reveal">
                    <div class="bg-white/70 backdrop-blur-3xl border border-white/80 shadow-[0_8px_30px_rgb(0,0,0,0.08)] p-10 lg:p-14 rounded-none relative">
                        <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block editable">Little Carpathians Wine Region</span>
                        <h2 class="font-serif text-3xl md:text-5xl font-light text-brand-luxeDark mb-8 editable">Vineyards</h2>
            <span class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-xl md:text-2xl block mt-3 editable">Beyond The City</span>
                        <p class="text-stone-600 font-light leading-relaxed text-sm md:text-base mb-6 tracking-wide font-sans editable">
                            Just minutes outside the urban center lies the Little Carpathian wine region. Gentle rolling hills, sun-drenched vineyards, and old winemaking villages like Svätý Jur and Pezinok define this beautiful route.
                        </p>
                        <p class="text-stone-600 font-light leading-relaxed text-sm md:text-base tracking-wide font-sans mb-8 editable">
                            Ride along quiet asphalt lanes between rows of grapes, and stop at local family cellars to sample Frankovka Modrá and Veltlínske Zelené, wines with centuries of royal history.
                        </p>

                    </div>
                </div>
                <div class="w-full lg:w-3/4 z-10 scroll-reveal mt-10 lg:mt-0 relative">
                    <div class="aspect-video overflow-hidden shadow-2xl rounded-none bg-black relative">
                        <video autoplay muted loop playsinline preload="auto" class="w-full h-full object-cover" controls>
                            <source src="<?php echo get_template_directory_uri(); ?>/assets/pictures/discover-cycling-1.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: NATURE & GRAVEL (HTML5 Video player) -->
    <section class="py-12 relative overflow-hidden bg-gradient-to-bl from-stone-50 via-emerald-50/30 to-stone-100">
        <div class="absolute top-1/4 right-1/4 w-[500px] h-[500px] bg-emerald-200/30 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
        <div class="w-full max-w-[1800px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-center gap-12 lg:gap-16">
                <div class="w-full lg:w-3/4 z-10 scroll-reveal order-2 lg:order-1 mt-10 lg:mt-0 relative">
                    <div class="aspect-video overflow-hidden shadow-2xl rounded-none bg-black relative">
                        <video autoplay muted loop playsinline preload="auto" class="w-full h-full object-cover" controls>
                            <source src="<?php echo get_template_directory_uri(); ?>/assets/pictures/discover-cycling-2.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                <div class="w-full lg:w-1/3 z-20  scroll-reveal order-1 lg:order-2">
                    <div class="bg-white/70 backdrop-blur-3xl border border-white/80 shadow-[0_8px_30px_rgb(0,0,0,0.08)] p-10 lg:p-14 rounded-none relative">
                        <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block editable">Forest trails & hills</span>
                        <h2 class="font-serif text-3xl md:text-5xl font-light text-brand-luxeDark mb-8 editable">Escape Into</h2>
            <span class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-xl md:text-2xl block mt-3 editable">Nature</span>
                        <p class="text-stone-600 font-light leading-relaxed text-sm md:text-base mb-6 tracking-wide font-sans editable">
                            Bratislava is crowned by the forest parks of the Little Carpathians. For gravel and mountain bikers, this means hundreds of kilometers of well-marked forest trails, fire roads, and scenic climbs.
                        </p>
                        <p class="text-stone-600 font-light leading-relaxed text-sm md:text-base tracking-wide font-sans mb-8 editable">
                            Enjoy the cool shade of oak and beech trees, discover hidden ruins like Pajštún castle, and experience the quiet mountain atmosphere just a short ride from the city center.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 5: CYCLING SEASON -->
    <section class="py-12 relative overflow-hidden bg-gradient-to-br from-stone-50 via-orange-50/30 to-stone-100">
        <div class="absolute bottom-1/4 right-0 w-[600px] h-[600px] bg-orange-200/30 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
        <div class="w-full max-w-[1800px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-center gap-12 lg:gap-16">
                <div class="w-full lg:w-1/3 z-20  scroll-reveal">
                    <div class="bg-white/70 backdrop-blur-3xl border border-white/80 shadow-[0_8px_30px_rgb(0,0,0,0.08)] p-10 lg:p-14 rounded-none relative">
                        <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block editable">March–October riding conditions</span>
                        <h2 class="font-serif text-3xl md:text-5xl font-light text-brand-luxeDark mb-8 editable">A Long</h2>
            <span class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-xl md:text-2xl block mt-3 editable">Cycling Season</span>
                        <p class="text-stone-600 font-light leading-relaxed text-sm md:text-base mb-6 tracking-wide font-sans editable">
                            The Danube basin features a mild, sunny continental climate that ensures an exceptionally long cycling season. 
                        </p>
                        <p class="text-stone-600 font-light leading-relaxed text-sm md:text-base tracking-wide font-sans editable">
                            From early spring in March through the golden foliage of October, riding conditions are ideal. Spring brings fresh blossoms, summer offers cool river breezes and evening vineyard rides, and autumn delivers grape harvests.
                        </p>
                    </div>
                </div>
                <div class="w-full lg:w-3/4 z-10 scroll-reveal mt-10 lg:mt-0 relative">
                    <div class="aspect-video overflow-hidden shadow-2xl rounded-none relative">
                        <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/cyclists-city.jpg" 
                             alt="Cycling in spring autumn weather slovakia bikepacking" 
                             class="w-full h-full object-cover object-[center_75%] hover:scale-105 transition-transform duration-700 ease-out">
                    </div>
                </div>
            </div>
        </div>
    </section>

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

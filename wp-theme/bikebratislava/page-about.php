<?php get_header(); ?>


    <!-- HERO SECTION -->
    <section class="relative min-h-[75vh] flex items-center justify-center bg-brand-luxeDark overflow-hidden">
        <div class="absolute inset-0 z-0">
            <!-- Curated group cyclists lifestyle background with scale-110 for parallax -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/pictures/coffee-break.jpg" 
                 alt="About us background" 
                 class="w-full h-full object-cover object-center opacity-45 scale-110" id="hero-img" style="will-change: transform;">
            <div class="absolute inset-0 bg-gradient-to-t from-brand-luxeDark via-brand-luxeDark/35 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center text-brand-luxeTextLight flex flex-col items-center">
            <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-6 block opacity-0 fade-in-up editable">Our Philosophy</span>
            <h1 class="font-serif text-5xl md:text-7xl font-light mb-6 opacity-0 fade-in-up animation-delay-200 text-white leading-tight editable">We Ride What</h1>
            <span class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-2xl md:text-4xl lg:text-5xl block mt-4 editable">We Recommend</span>
            <p class="text-stone-400 text-sm md:text-base font-light max-w-xl mx-auto leading-relaxed tracking-wider opacity-0 fade-in-up animation-delay-400 editable">
                Every route we offer is a route we ride ourselves. Discover the passion that drives us.
            </p>
        </div>
    </section>

    <!-- SECTION: OUR STORY -->
    <section class="py-16 lg:py-20 relative overflow-hidden border-b border-stone-200/40 bg-gradient-to-br from-rose-50 via-sky-50 to-emerald-50 parallax-section">
        <div class="parallax-bg concrete"></div>
        <div class="max-w-6xl mx-auto px-6 lg:px-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-20 items-center">
                
                <div class="lg:col-span-6 scroll-reveal">
                    <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block editable">Our Story</span>
                    <h2 class="font-serif text-4xl md:text-5xl font-light text-brand-luxeDark leading-tight mb-8 editable">
                        Born From A Passion</h2>
            <span class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold text-xl md:text-3xl block mt-3 editable">For Cycling</span>
                    <div class="space-y-6 text-stone-600 font-light leading-relaxed text-sm md:text-base tracking-wide font-sans mb-8">
                        <p class="editable">
                            Bike Bratislava was created by local cyclists who wanted to share their favourite roads, trails and hidden places with visitors from around the world.
                        </p>
                        <p class="editable">
                            After years of riding across Slovakia and Central Europe, we realised that Bratislava offers something truly unique: a gateway to multiple countries, cultures and landscapes, all accessible by bicycle.
                        </p>
                        <p class="font-sans font-bold uppercase tracking-widest text-brand-luxeGold border-l-2 border-brand-luxeGold/60 pl-6 text-sm py-1 leading-relaxed editable">
                            Our mission is simple: To help people experience Bratislava in a way that goes far beyond traditional tourism.
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-6 scroll-reveal">
                    <div class="relative aspect-[4/3] lg:aspect-[4/5] overflow-hidden shadow-2xl border border-stone-200">
                        <!-- local climber/road rider -->
                        <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/road-cyclist-climb.jpg" 
                             alt="Athletic road cyclist climbing scenic carpathians route" 
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-700 ease-out">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION: WHY RIDE WITH US (Concrete textured layout) -->
    <section class="py-16 lg:py-20 parallax-section border-b border-stone-200/40 bg-gradient-to-tr from-amber-50 via-orange-50 to-rose-50"><div class="parallax-bg concrete"></div>
        <div class="max-w-6xl mx-auto px-6 lg:px-12 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-24 scroll-reveal">
                <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block editable">Our Values</span>
                <h2 class="font-serif text-4xl md:text-5xl font-light text-brand-luxeDark editable">Why Ride With Us</h2>
                <div class="h-[1px] w-12 bg-brand-luxeGold mx-auto mt-6"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-16">
                <!-- Value Card 1 -->
                <div class="bg-transparent border-t border-stone-300/40 pt-8 scroll-reveal">
                    <span class="font-serif text-3xl text-brand-luxeGold font-light block mb-4">01</span>
                    <h3 class="font-serif text-lg font-medium text-brand-luxeDark mb-3 editable">Local Knowledge</h3>
                    <p class="text-stone-500 text-xs font-light leading-relaxed font-sans tracking-wide editable">
                        We know the quietest lanes, best coffee stops, and views that aren't on standard maps.
                    </p>
                </div>

                <!-- Value Card 2 -->
                <div class="bg-transparent border-t border-stone-300/40 pt-8 scroll-reveal">
                    <span class="font-serif text-3xl text-brand-luxeGold font-light block mb-4">02</span>
                    <h3 class="font-serif text-lg font-medium text-brand-luxeDark mb-3 editable">Experienced Guides</h3>
                    <p class="text-stone-500 text-xs font-light leading-relaxed font-sans tracking-wide editable">
                        Our ride leaders are certified, highly experienced, and passionate storytellers.
                    </p>
                </div>

                <!-- Value Card 3 -->
                <div class="bg-transparent border-t border-stone-300/40 pt-8 scroll-reveal">
                    <span class="font-serif text-3xl text-brand-luxeGold font-light block mb-4">03</span>
                    <h3 class="font-serif text-lg font-medium text-brand-luxeDark mb-3 editable">Small Groups</h3>
                    <p class="text-stone-500 text-xs font-light leading-relaxed font-sans tracking-wide editable">
                        We keep our tour sizes small to guarantee personal attention, flexibility, and safety.
                    </p>
                </div>

                <!-- Value Card 4 -->
                <div class="bg-transparent border-t border-stone-300/40 pt-8 scroll-reveal">
                    <span class="font-serif text-3xl text-brand-luxeGold font-light block mb-4">04</span>
                    <h3 class="font-serif text-lg font-medium text-brand-luxeDark mb-3 editable">Safety First</h3>
                    <p class="text-stone-500 text-xs font-light leading-relaxed font-sans tracking-wide editable">
                        Top quality bikes, helmets, support vehicles, and careful route scouting on every single ride.
                    </p>
                </div>

                <!-- Value Card 5 -->
                <div class="bg-transparent border-t border-stone-300/40 pt-8 scroll-reveal">
                    <span class="font-serif text-3xl text-brand-luxeGold font-light block mb-4">05</span>
                    <h3 class="font-serif text-lg font-medium text-brand-luxeDark mb-3 editable">Authentic Experiences</h3>
                    <p class="text-stone-500 text-xs font-light leading-relaxed font-sans tracking-wide editable">
                        Taste real local wines, visit rural communities, and interact with the culture, not tourist traps.
                    </p>
                </div>

                <!-- Value Card 6 -->
                <div class="bg-transparent border-t border-stone-300/40 pt-8 scroll-reveal">
                    <span class="font-serif text-3xl text-brand-luxeGold font-light block mb-4">06</span>
                    <h3 class="font-serif text-lg font-medium text-brand-luxeDark mb-3 editable">Tailor-Made Options</h3>
                    <p class="text-stone-500 text-xs font-light leading-relaxed font-sans tracking-wide editable">
                        Custom distances, difficulty adjustments, corporate events, and specialized itineraries built for you.
                    </p>
                </div>
            </div>
        </div>
    </section>

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

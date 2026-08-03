<?php
/**
 * Template Name: Tours & Rides
 *
 * Картки турів і дані для модальних вікон беруться з типу запису «tour»
 * та таксономії «tour_category». Три секції лишаються задизайненими вручну
 * (у кожної свій фон), а тури всередині підтягуються за слагом категорії.
 */
get_header();
?>
    <style>
        html.lenis,
        html.lenis body {
            height: auto;
        }

        .lenis.lenis-smooth {
            scroll-behavior: auto !important;
        }

        .lenis.lenis-smooth [data-lenis-prevent] {
            overscroll-behavior: contain;
        }

        .lenis.lenis-stopped {
            overflow: hidden;
        }

        .lenis.lenis-scrolling iframe {
            pointer-events: none;
        }

        .fade-in-up {
            animation: fadeInUp 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animation-delay-200 {
            animation-delay: 200ms;
        }

        .animation-delay-400 {
            animation-delay: 400ms;
        }

        /* Smooth transitions for smart hidden header */
        #main-header {
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), background-color 0.4s ease, padding 0.4s ease;
        }

        /* Mobile menu overlay */
        #mobile-menu {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.45s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.45s ease;
        }

        #mobile-menu.is-open {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        #mobile-menu .menu-nav-item {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity 0.4s ease, transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), color 0.2s ease;
        }

        #mobile-menu.is-open .menu-nav-item:nth-child(1) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.08s;
        }

        #mobile-menu.is-open .menu-nav-item:nth-child(2) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.14s;
        }

        #mobile-menu.is-open .menu-nav-item:nth-child(3) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.20s;
        }

        #mobile-menu.is-open .menu-nav-item:nth-child(4) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.26s;
        }

        #mobile-menu.is-open .menu-nav-item:nth-child(5) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.32s;
        }

        #mobile-menu.is-open .menu-nav-item:nth-child(6) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.38s;
        }

        #mobile-menu.is-open .menu-nav-item:nth-child(7) {
            opacity: 1;
            transform: translateY(0);
            transition-delay: 0.44s;
        }

        #mobile-menu .menu-footer {
            opacity: 0;
            transform: translateY(14px);
            transition: opacity 0.4s ease 0.5s, transform 0.4s ease 0.5s;
        }

        #mobile-menu.is-open .menu-footer {
            opacity: 1;
            transform: translateY(0);
        }

        /* Parallax texture backgrounds — uses inner wrapper with translateY */
        .parallax-section {
            position: relative;
            overflow: hidden;
        }

        .parallax-bg {
            position: absolute;
            inset: -20% 0;
            background-size: cover;
            background-position: center;
            will-change: transform;
            z-index: 0;
        }

        .parallax-section>*:not(.parallax-bg) {
            position: relative;
            z-index: 1;
        }

        .parallax-bg.concrete {
            background-color: #fdfbfb;
            background-image:
                radial-gradient(at 40% 20%, hsla(28, 100%, 74%, 0.15) 0px, transparent 50%),
                radial-gradient(at 80% 0%, hsla(189, 100%, 56%, 0.15) 0px, transparent 50%),
                radial-gradient(at 0% 50%, hsla(355, 100%, 93%, 0.15) 0px, transparent 50%),
                radial-gradient(at 80% 50%, hsla(340, 100%, 76%, 0.15) 0px, transparent 50%),
                radial-gradient(at 0% 100%, hsla(22, 100%, 77%, 0.15) 0px, transparent 50%),
                radial-gradient(at 80% 100%, hsla(242, 100%, 70%, 0.15) 0px, transparent 50%),
                radial-gradient(at 0% 0%, hsla(343, 100%, 76%, 0.15) 0px, transparent 50%);
        }

        .parallax-bg.asphalt {
            background-color: #0A0A0A;
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('<?php echo get_template_directory_uri(); ?>/assets/pictures/texture-asphalt.jpg');
            background-size: cover;
            background-position: center;
        }

        .parallax-bg.dark-minimal {
            background-color: #0A0A0A;
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url('<?php echo get_template_directory_uri(); ?>/assets/pictures/bg-minimal-1.jpeg');
            background-size: cover;
            background-position: center;
        }

        /* Legacy: concrete-bg as section bg for guides card row */
        .concrete-bg-inline {
            background-color: #fdfbfb;
            background-image:
                radial-gradient(at 40% 20%, hsla(28, 100%, 74%, 0.15) 0px, transparent 50%),
                radial-gradient(at 80% 0%, hsla(189, 100%, 56%, 0.15) 0px, transparent 50%),
                radial-gradient(at 0% 50%, hsla(355, 100%, 93%, 0.15) 0px, transparent 50%),
                radial-gradient(at 80% 50%, hsla(340, 100%, 76%, 0.15) 0px, transparent 50%),
                radial-gradient(at 0% 100%, hsla(22, 100%, 77%, 0.15) 0px, transparent 50%),
                radial-gradient(at 80% 100%, hsla(242, 100%, 70%, 0.15) 0px, transparent 50%),
                radial-gradient(at 0% 0%, hsla(343, 100%, 76%, 0.15) 0px, transparent 50%);
        }

        /* ===== Tours: expandable category panels + custom-ride constructor ===== */
        .cat-panel {
            display: grid;
            grid-template-rows: 0fr;
            transition: grid-template-rows .55s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .cat-panel.open {
            grid-template-rows: 1fr;
        }

        .cat-panel>.cat-panel-inner {
            overflow: hidden;
            min-height: 0;
        }

        .cat-toggle[aria-expanded="true"] .cat-chevron {
            transform: rotate(180deg);
        }

        /* Chips live on the light Category 3 card, so the base colours are set
           here (not as Tailwind !important utilities on each button) — otherwise
           :hover and .chip-active could never override them. */
        .chip {
            display: inline-flex;
            align-items: center;
            padding: .6rem 1.05rem;
            border: 1px solid #d6d3d1;
            background: #fff;
            color: #57534e;
            font-size: 11px;
            letter-spacing: .06em;
            text-transform: uppercase;
            font-weight: 500;
            line-height: 1;
            cursor: pointer;
            transition: all .25s ease;
        }

        /* Secondary line inside a chip ("City & comfort bikes" etc.) */
        .chip span + span {
            color: #a8a29e;
            transition: color .25s ease;
        }

        .chip:hover {
            border-color: #E31C25;
            color: #E31C25;
        }

        .chip.chip-active {
            background: #E31C25;
            border-color: #E31C25;
            color: #fff;
        }

        .chip.chip-active span {
            color: #fff;
        }

        .chip.chip-active span + span {
            color: rgba(255, 255, 255, .8);
        }

        .bg-diagonal {
            background-color: #fcfbfa;
            background-image: repeating-linear-gradient(45deg, rgba(17, 17, 17, .028) 0 2px, transparent 2px 26px);
        }

        .bg-graphite {
            background-color: #161616;
            background-image:
                radial-gradient(at 20% 22%, rgba(255, 255, 255, .07) 0, transparent 46%),
                radial-gradient(at 85% 72%, rgba(255, 255, 255, .05) 0, transparent 50%),
                radial-gradient(at 55% 8%, rgba(150, 150, 160, .10) 0, transparent 55%),
                linear-gradient(160deg, #1f1f1f 0%, #0d0d0d 100%);
        }
    </style>


    <!-- HERO SECTION -->
    <section
        class="relative min-h-[75vh] flex items-center justify-center bg-brand-luxeDark text-white overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/pictures/cyclists-sunset.jpg"
                alt="Tours and rides hero background" class="w-full h-full object-cover object-center opacity-45"
                id="hero-img">
            <div class="absolute inset-0 bg-gradient-to-t from-brand-luxeDark via-brand-luxeDark/35 to-transparent">
            </div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center flex flex-col items-center">
            <h1
                class="font-serif text-6xl md:text-8xl font-bold uppercase tracking-tight mb-6 opacity-0 fade-in-up animation-delay-200 editable">
                Find Your Perfect Ride</h1>
            <p
                class="text-stone-300 font-light text-sm md:text-lg max-w-2xl mx-auto leading-relaxed mb-10 tracking-wide font-sans opacity-0 fade-in-up animation-delay-400 editable">
                Whether you're discovering Bratislava for the first time or searching for your next cycling challenge,
                we offer guided experiences for every type of rider.
            </p>
        </div>
    </section>

    <?php
    /*
     * Секції категорій. Раніше їх було три, вписані руками — через це нова
     * категорія з адмінки ніде не з'являлась. Тепер секція будується для
     * кожної категорії: назва й опис із самої категорії, фото з її поля,
     * світлий і темний фон чергуються, якір прив'язаний до слага.
     *
     * Категорія «Custom Experiences» — особлива: замість карток турів там
     * покроковий конструктор, тому її розмітка лишається окремо.
     */
    $bb_cats = bb_tour_categories();
    $bb_i = 0;
    foreach ($bb_cats as $bb_cat) :
        $bb_i++;
        $bb_anchor = bb_tour_category_anchor($bb_cat);
        $bb_custom = bb_is_custom_category($bb_cat);
        $bb_dark   = (!$bb_custom && $bb_i % 2 === 0);
        $bb_img    = bb_tour_category_image($bb_cat);
        $bb_tours  = $bb_custom ? array() : bb_tours_in_category($bb_cat->term_id);
        $bb_count  = count($bb_tours);
        $bb_label  = $bb_custom
            ? 'Build Your Custom Ride'
            : ($bb_count ? 'Explore the ' . $bb_count . ' tours' : 'Coming soon');
        // Фон секції: власний із поля категорії, інакше стандартний фон теми.
        // Бік, з якого стоїть фото, чергується — так само, як це було
        // зроблено вручну на статичному сайті.
        $bb_bg = bb_tour_category_bg($bb_cat, $bb_dark);
        $bb_photo_side = ($bb_i % 2 === 0) ? 'lg:order-2' : 'lg:order-1';
        $bb_text_side  = ($bb_i % 2 === 0) ? 'lg:order-1' : 'lg:order-2';
    ?>
    <section id="<?php echo esc_attr($bb_anchor); ?>" data-cat-slug="<?php echo esc_attr($bb_cat->slug); ?>"
        class="py-20 lg:py-28 relative overflow-hidden <?php echo $bb_dark ? 'bg-brand-luxeDark text-white' : 'border-b border-stone-200 bg-stone-100'; ?>">
        <div class="absolute inset-0 z-0 bg-cover bg-center"
            style="background-image: url('<?php echo esc_url($bb_bg); ?>'); opacity: <?php echo $bb_dark ? '0.2' : '0.65'; ?>;">
        </div>
        <div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10">
            <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-stretch">
                <div class="<?php echo esc_attr($bb_photo_side); ?> scroll-reveal h-full flex">
                    <div class="aspect-[4/3] w-full h-full overflow-hidden relative shadow-2xl border <?php echo $bb_dark ? 'border-white/10' : 'border-white/40'; ?>">
                        <img loading="lazy" decoding="async" src="<?php echo esc_url($bb_img); ?>"
                            alt="<?php echo esc_attr($bb_cat->name); ?>" class="absolute inset-0 w-full h-full object-cover">
                    </div>
                </div>
                <div
                    class="<?php echo esc_attr($bb_text_side); ?> scroll-reveal h-full flex flex-col justify-center bg-white/90 backdrop-blur-md border border-white/60 p-8 lg:p-12 shadow-2xl">
                    <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-3 block">Category
                        <?php echo (int) $bb_i; ?></span>
                    <h2 class="font-serif text-3xl md:text-5xl font-bold uppercase text-brand-luxeDark leading-tight">
                        <?php echo esc_html($bb_cat->name); ?></h2>
                    <?php if ($bb_cat->description) : ?>
                    <p
                        class="text-stone-600 font-light text-sm md:text-base mt-5 leading-relaxed tracking-wide font-sans max-w-xl">
                        <?php echo esc_html($bb_cat->description); ?></p>
                    <?php endif; ?>
                    <button data-toggle="<?php echo esc_attr($bb_anchor); ?>" data-label="<?php echo esc_attr($bb_label); ?>"
                        data-open-label="<?php echo $bb_custom ? 'Hide builder' : 'Hide'; ?>"
                        aria-expanded="false" onclick="toggleCat('<?php echo esc_js($bb_anchor); ?>')"
                        class="cat-toggle inline-flex items-center gap-3 mt-8 px-7 py-3.5 bg-brand-luxeGold text-white text-[11px] font-semibold tracking-[0.2em] uppercase hover:bg-brand-luxeGoldDark transition-colors duration-300 shadow-lg">
                        <span class="toggle-label"><?php echo esc_html($bb_label); ?></span>
                        <i data-lucide="chevron-down" class="w-4 h-4 cat-chevron transition-transform duration-300"></i>
                    </button>
                </div>
            </div>
            <div id="<?php echo esc_attr($bb_anchor); ?>-panel" class="cat-panel">
                <div class="cat-panel-inner">
<?php if ($bb_custom) : ?>
                    <div class="mt-14 bg-white/90 backdrop-blur-md border border-white/60 p-8 lg:p-12 shadow-2xl">
                        <div class="grid lg:grid-cols-12 gap-10 lg:gap-12">
                            <div class="lg:col-span-7 xl:col-span-8 space-y-7">
                                <div>
                                    <span
                                        class="block text-[10px] uppercase tracking-[0.25em] text-brand-luxeGold font-semibold mb-3 editable">Ride
                                        type</span>
                                    <div class="grid grid-cols-2 xl:grid-cols-4 gap-2.5">
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="type" data-val="E-Bike &amp; Leisure" onclick="selectChip('type',this)">
                                            <span class="block">E-Bike &amp; Leisure</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">City &amp; comfort bikes</span>
                                        </button>
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="type" data-val="Road &amp; Gravel" onclick="selectChip('type',this)">
                                            <span class="block">Road &amp; Gravel</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">Sport &amp; endurance</span>
                                        </button>
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="type" data-val="Mixed" onclick="selectChip('type',this)">
                                            <span class="block">Mixed</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">Various surfaces</span>
                                        </button>
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="type" data-val="Other" onclick="selectChip('type',this)">
                                            <span class="block">Other</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">Tell us your idea</span>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <span
                                        class="block text-[10px] uppercase tracking-[0.25em] text-brand-luxeGold font-semibold mb-3 editable">Duration</span>
                                    <div class="grid grid-cols-2 xl:grid-cols-4 gap-2.5">
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="duration" data-val="Half day" onclick="selectChip('duration',this)">
                                            <span class="block">Half day</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">1-3 hours</span>
                                        </button>
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="duration" data-val="Full day" onclick="selectChip('duration',this)">
                                            <span class="block">Full day</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">3-6 hours</span>
                                        </button>
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="duration" data-val="Extended" onclick="selectChip('duration',this)">
                                            <span class="block">Extended</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">6-12 hours</span>
                                        </button>
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="duration" data-val="Multi-day" onclick="selectChip('duration',this)">
                                            <span class="block">Multi-day</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">2+ days</span>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <span
                                        class="block text-[10px] uppercase tracking-[0.25em] text-brand-luxeGold font-semibold mb-3 editable">Group</span>
                                    <div class="grid grid-cols-2 xl:grid-cols-4 gap-2.5">
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="group" data-val="Solo" onclick="selectChip('group',this)">
                                            <span class="block">Solo</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">1 person</span>
                                        </button>
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="group" data-val="Couple" onclick="selectChip('group',this)">
                                            <span class="block">Couple</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">2 people</span>
                                        </button>
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="group" data-val="Small group" onclick="selectChip('group',this)">
                                            <span class="block">Small group</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">3-6 people</span>
                                        </button>
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="group" data-val="Corporate" onclick="selectChip('group',this)">
                                            <span class="block">Corporate</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">7+ people</span>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <span
                                        class="block text-[10px] uppercase tracking-[0.25em] text-brand-luxeGold font-semibold mb-3 editable">Level</span>
                                    <div class="grid grid-cols-2 xl:grid-cols-3 gap-2.5">
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="level" data-val="Easy" onclick="selectChip('level',this)">
                                            <span class="block">Easy</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">Casual pace, mostly flat</span>
                                        </button>
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="level" data-val="Moderate" onclick="selectChip('level',this)">
                                            <span class="block">Moderate</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">Some hills, steady pace</span>
                                        </button>
                                        <button class="chip flex flex-col items-start gap-1 text-left !px-4 !py-2.5 w-full" data-group="level" data-val="Challenging" onclick="selectChip('level',this)">
                                            <span class="block">Challenging</span>
                                            <span class="block text-[9px] text-stone-400 font-light normal-case tracking-wide editable">Steep climbs, faster</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:col-span-5 xl:col-span-4 flex flex-col justify-between gap-8">
                                <div>
                                    <span
                                        class="block text-[10px] uppercase tracking-[0.25em] text-brand-luxeGold font-semibold mb-3 editable">Ideal
                                        for</span>
                                    <div class="grid grid-cols-2 gap-x-6 gap-y-2.5">
                                        <span class="text-stone-600 text-xs font-light tracking-wide editable">Private groups</span>
                                        <span class="text-stone-600 text-xs font-light tracking-wide editable">Cycling clubs</span>
                                        <span class="text-stone-600 text-xs font-light tracking-wide editable">Corporate events</span>
                                        <span class="text-stone-600 text-xs font-light tracking-wide editable">Team building</span>
                                        <span class="text-stone-600 text-xs font-light tracking-wide editable">Multi-day holidays</span>
                                        <span class="text-stone-600 text-xs font-light tracking-wide editable">Special occasions</span>
                                    </div>
                                </div>
                                <div class="bg-stone-100 border border-stone-300 p-6">
                                    <p class="text-stone-600 text-xs font-light leading-relaxed mb-5 editable">Pick what fits you
                                        above, then send it to our team &mdash; we'll shape the full itinerary around
                                        your ride.</p>
                                    <a id="build-cta" href="<?php echo esc_url(home_url('/contact/')); ?>?ride=Custom"
                                        class="inline-flex items-center justify-center gap-3 w-full px-9 py-4.5 bg-brand-luxeGold text-white text-[11px] font-semibold tracking-[0.25em] uppercase hover:bg-brand-luxeGoldDark transition-colors duration-300">
                                        <span>Plan This Ride</span><i data-lucide="arrow-right" class="w-4 h-4"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
<?php else : ?>
                    <?php if ($bb_count) : ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8 pt-14">
                        <?php foreach ($bb_tours as $bb_tour) :
                            $bb_tour_img = has_post_thumbnail($bb_tour->ID)
                                ? get_the_post_thumbnail_url($bb_tour->ID, 'large')
                                : get_template_directory_uri() . '/assets/pictures/coffee-break.jpg';
                        ?>
                        <article class="group flex flex-col backdrop-blur-md border p-4 transition-all duration-500 hover:-translate-y-2 <?php echo $bb_dark ? 'bg-black/60 border-white/10' : 'bg-white/90 border-white/60'; ?>">
                            <div class="aspect-[4/5] overflow-hidden relative bg-stone-200">
                                <img loading="lazy" decoding="async" src="<?php echo esc_url($bb_tour_img); ?>"
                                    alt="<?php echo esc_attr($bb_tour->post_title); ?>"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                            </div>
                            <div class="pt-4 flex-1">
                                <h3 class="font-serif text-lg font-medium mb-2 leading-snug <?php echo $bb_dark ? 'text-white' : 'text-brand-luxeDark'; ?>"><?php echo esc_html($bb_tour->post_title); ?></h3>
                                <p class="font-light text-xs leading-relaxed font-sans <?php echo $bb_dark ? 'text-stone-400' : 'text-stone-600'; ?>"><?php echo esc_html(bb_tour_short_desc($bb_tour->ID)); ?></p>
                            </div>
                            <button onclick="openModal('tour-<?php echo (int) $bb_tour->ID; ?>')"
                                class="mt-4 px-5 py-2 bg-brand-luxeGold hover:bg-brand-luxeGoldDark text-white text-[10px] font-bold tracking-[0.2em] uppercase transition-all duration-300 hover:scale-105 shadow-md self-start">View
                                Details</button>
                        </article>
                        <?php endforeach; ?>
                    </div>
                    <?php else : ?>
                    <p class="pt-14 text-center font-light text-sm <?php echo $bb_dark ? 'text-stone-400' : 'text-stone-500'; ?>">
                        New tours in this category are coming soon.</p>
                    <?php endif; ?>
<?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endforeach; ?>

    <!-- TOUR DETAIL MODAL / POPUP -->
    <!-- Mobile Categories Modal -->
    <div id="mobile-cats-modal" class="fixed inset-0 z-[105] flex flex-col justify-end opacity-0 pointer-events-none transition-opacity duration-300">
        <div class="absolute inset-0 bg-brand-luxeDark/80 backdrop-blur-sm" onclick="closeMobileCatsModal()"></div>
        <div id="mobile-cats-content" class="relative bg-stone-50 w-full h-full shadow-2xl flex flex-col transform translate-y-full transition-transform duration-500 ease-out">
            <div class="flex items-center justify-between p-5 border-b border-stone-200 bg-white shrink-0">
                <h3 id="mobile-cats-title" class="font-serif text-2xl font-light text-brand-luxeDark editable">Category</h3>
                <button onclick="closeMobileCatsModal()" class="text-stone-400 hover:text-brand-luxeGold transition-colors">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>
            <div id="mobile-cats-body" class="flex-1 overflow-y-auto p-4 bg-stone-50" data-lenis-prevent>
                <!-- Cards injected here -->
            </div>
        </div>
    </div>

    <div id="tour-modal"
        class="fixed inset-0 bg-stone-950/90 z-[110] flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-300">
        <div
            class="bg-white max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl relative rounded-none text-brand-luxeDark" data-lenis-prevent>
            <button onclick="closeModal()"
                class="absolute top-4 right-4 text-white hover:text-brand-luxeGold transition-all z-10 bg-black/30 hover:bg-black/60 p-2 rounded-full backdrop-blur-md"
                aria-label="Close details">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
            <div id="modal-content"></div>
        </div>
    </div>

    <!-- FOOTER -->
    <script>
        const tourData = <?php
        $bb_all = get_posts(array(
            'post_type'      => 'tour',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order date',
            'order'          => 'ASC',
        ));
        $bb_data = array();
        foreach ($bb_all as $bb_t) {
            $bb_kp = array_values(array_filter(array_map('trim',
                explode("\n", (string) get_field('keypoints', $bb_t->ID))
            )));
            $bb_data['tour-' . $bb_t->ID] = array(
                'title'     => $bb_t->post_title,
                'desc'      => wp_strip_all_tags($bb_t->post_content),
                'dist'      => (string) get_field('distance', $bb_t->ID),
                'elev'      => (string) get_field('elevation', $bb_t->ID),
                'dur'       => (string) get_field('duration', $bb_t->ID),
                'diff'      => (string) get_field('difficulty', $bb_t->ID),
                'bike'      => (string) get_field('bike_type', $bb_t->ID),
                'keypoints' => $bb_kp,
                'recom'     => (string) get_field('recommendation', $bb_t->ID),
                'img'       => has_post_thumbnail($bb_t->ID)
                    ? get_the_post_thumbnail_url($bb_t->ID, 'large')
                    : get_template_directory_uri() . '/assets/pictures/coffee-break.jpg',
            );
        }
        echo wp_json_encode($bb_data);
        ?>;
        const BB_CONTACT_URL = <?php echo wp_json_encode(home_url('/contact/')); ?>;


        const modal = document.getElementById('tour-modal');
        const modalContent = document.getElementById('modal-content');

        // Structured data: expose each tour as a TouristTrip (ItemList) so Google can
        // understand the individual rides — generated from tourData to stay in sync.
        (function injectTourSchema() {
            const baseUrl = 'https://bikebratislava.com/';
            const itemListElement = Object.keys(tourData).map(function (key, i) {
                const t = tourData[key];
                return {
                    "@type": "ListItem",
                    "position": i + 1,
                    "item": {
                        "@type": "TouristTrip",
                        "name": t.title,
                        "description": t.desc,
                        "image": baseUrl + encodeURI(t.img),
                        "touristType": t.recom,
                        "url": baseUrl + "tours"
                    }
                };
            });
            const ld = document.createElement('script');
            ld.type = 'application/ld+json';
            ld.textContent = JSON.stringify({
                "@context": "https://schema.org",
                "@type": "ItemList",
                "name": "Bike Bratislava — Tours & Rides",
                "itemListElement": itemListElement
            });
            document.head.appendChild(ld);
        })();

        function openModal(tourKey) {
            const data = tourData[tourKey];
            if (!data) return;

            let keypointsHTML = '';
            data.keypoints.forEach(kp => {
                keypointsHTML += `
                    <li class="flex items-center space-x-3 text-stone-700 text-xs font-sans">
                        <i data-lucide="check" class="w-4 h-4 text-brand-luxeGold"></i>
                        <span>${kp}</span>
                    </li>
                `;
            });

            let diffClass = "text-brand-luxeGold border-brand-luxeGold/30 bg-brand-luxeGold/10";
            let diffText = data.diff ? data.diff.toLowerCase() : "";
            if (diffText === 'easy') {
                diffClass = "text-emerald-600 border-emerald-600/30 bg-emerald-600/10";
            } else if (diffText === 'moderate') {
                diffClass = "text-orange-500 border-orange-500/30 bg-orange-500/10";
            } else if (diffText === 'hard') {
                diffClass = "text-rose-600 border-rose-600/30 bg-rose-600/10";
            }

            modalContent.innerHTML = `
                <div class="relative w-full h-64 border-b border-stone-200">
                    <img src="${data.img}" alt="${data.title}" class="w-full h-full object-cover">
                </div>

                <div class="p-8 pb-4">
                    <span class="text-[9px] uppercase font-bold tracking-[0.25em] border px-3 py-1 rounded-none mb-4 inline-block ${diffClass} editable">${data.diff}</span>
                    <h3 class="font-serif text-3xl md:text-4xl font-bold leading-tight text-brand-luxeDark editable">${data.title}</h3>
                </div>

                <div class="px-8 space-y-8 pb-8">
                    <p class="text-stone-600 font-light text-xs md:text-sm leading-relaxed font-sans tracking-wide editable">${data.desc}</p>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 py-4 border-y border-stone-200 text-xs font-sans">
                        <div>
                            <span class="text-[9px] uppercase font-bold text-stone-500 block mb-1 tracking-wider editable">Distance</span>
                            <span class="font-semibold text-brand-luxeDark text-sm">${data.dist}</span>
                        </div>
                        <div>
                            <span class="text-[9px] uppercase font-bold text-stone-500 block mb-1 tracking-wider editable">Elevation</span>
                            <span class="font-semibold text-brand-luxeDark text-sm">${data.elev}</span>
                        </div>
                        <div>
                            <span class="text-[9px] uppercase font-bold text-stone-500 block mb-1 tracking-wider editable">Duration</span>
                            <span class="font-semibold text-brand-luxeDark text-sm">${data.dur}</span>
                        </div>
                        <div>
                            <span class="text-[9px] uppercase font-bold text-stone-500 block mb-1 tracking-wider editable">Bike Type</span>
                            <span class="font-semibold text-brand-luxeDark text-[11px] block truncate">${data.bike}</span>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-[10px] uppercase font-bold text-stone-500 tracking-widest mb-4 editable">Highlights</h4>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            ${keypointsHTML}
                        </ul>
                    </div>

                    <div class="bg-stone-50 p-6 border-l-2 border-brand-luxeGold rounded-none">
                        <h4 class="text-[10px] uppercase font-bold text-brand-luxeGold tracking-widest mb-2 editable">Guide Recommendation</h4>
                        <p class="text-xs text-stone-600 font-light leading-relaxed tracking-wide font-sans editable">${data.recom}</p>
                    </div>

                    <div class="pt-2 flex justify-end">
                        <a href="${BB_CONTACT_URL}?ride=${encodeURIComponent(data.title)}" class="px-10 py-4.5 bg-brand-luxeGold hover:bg-brand-luxeGoldDark text-white text-[10px] font-bold uppercase tracking-[0.2em] transition-all duration-300 rounded-none shadow-xl hover:shadow-2xl hover:-translate-y-1">
                            Book / Enquire
                        </a>
                    </div>
                </div>
            `;

            modal.classList.remove('opacity-0', 'pointer-events-none');
            
            document.documentElement.style.overflow = 'hidden';
            document.body.style.overflow = 'hidden';
            if (typeof lenis !== 'undefined') lenis.stop();
            
            var modalScroll = document.querySelector('#tour-modal .overflow-y-auto');
            if (modalScroll) modalScroll.scrollTop = 0;

            lucide.createIcons();
        }

        function closeModal() {
            modal.classList.add('opacity-0', 'pointer-events-none');
            
            document.documentElement.style.overflow = '';
            document.body.style.overflow = '';
            if (typeof lenis !== 'undefined') lenis.start();
        }

        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });

        // ===== Expandable categories =====
        // Ідентифікатори секцій більше не вписані в код: їх стільки, скільки
        // категорій заведено в адмінці. Беремо їх із самої розмітки.
        function catIds() {
            return Array.from(document.querySelectorAll('section[data-cat-slug]')).map(s => s.id);
        }

        function closeAllCats() {
            catIds().forEach(id => setCat(id, false));
            var closeBar = document.getElementById('mobile-cat-close-bar');
            if (closeBar) closeBar.classList.add('-translate-y-full');
            // smooth scroll back to the top of the categories if needed
        }

        function setCat(id, open) {
            var panel = document.getElementById(id + '-panel');
            if (!panel) return;
            panel.classList.toggle('open', open);
            var btn = document.querySelector('[data-toggle="' + id + '"]');
            if (btn) {
                btn.setAttribute('aria-expanded', open ? 'true' : 'false');
                var lbl = btn.querySelector('.toggle-label');
                if (lbl) lbl.textContent = open ? (btn.dataset.openLabel || 'Hide') : btn.dataset.label;
                
                // Show sticky mobile bar
                var closeBar = document.getElementById('mobile-cat-close-bar');
                var closeTitle = document.getElementById('mobile-cat-close-title');
                if (closeBar && closeTitle) {
                    if (open) {
                        // get the title from the section h2
                        var section = document.getElementById(id);
                        if (section) {
                            var h2 = section.querySelector('h2');
                            if (h2) closeTitle.textContent = h2.textContent.replace('&amp;', '&');
                        }
                        closeBar.classList.remove('-translate-y-full');
                    } else {
                        // if no panels are open, hide the bar
                        var anyOpen = document.querySelectorAll('.cat-panel.open').length > 0;
                        if (!anyOpen) {
                            closeBar.classList.add('-translate-y-full');
                        }
                    }
                }
            }
        }
        function toggleCat(id) { 
            if (window.innerWidth < 1024) {
                var section = document.getElementById(id);
                var title = section ? section.querySelector('h2').textContent.replace('&amp;', '&') : 'Tours';
                openMobileCatsModal(id, title);
            } else {
                var p = document.getElementById(id + '-panel'); 
                var willOpen = !p.classList.contains('open');
                setCat(id, willOpen); 
                if (willOpen) {
                    setTimeout(() => {
                        var section = document.getElementById(id);
                        if (section) {
                            const y = section.getBoundingClientRect().top + window.scrollY - 100;
                            window.scrollTo({top: y, behavior: 'smooth'});
                        }
                    }, 100);
                } else {
                    setTimeout(() => {
                        var section = document.getElementById(id);
                        if (section) {
                            const y = section.getBoundingClientRect().top + window.scrollY - 100;
                            window.scrollTo({top: y, behavior: 'smooth'});
                        }
                    }, 100);
                }
            }
        }

        function openMobileCatsModal(id, title) {
            const sourcePanel = document.querySelector('#' + id + '-panel .cat-panel-inner');
            if (!sourcePanel) return;
            
            document.getElementById('mobile-cats-title').textContent = title;
            
            let html = sourcePanel.innerHTML;
            html = html.replace('pt-14', 'pt-2 pb-8');
            html = html.replace('gap-6 lg:gap-8', 'gap-4');
            
            document.getElementById('mobile-cats-body').innerHTML = html;
            document.getElementById('mobile-cats-body').scrollTop = 0;
            
            const modal = document.getElementById('mobile-cats-modal');
            const content = document.getElementById('mobile-cats-content');

            modal.classList.remove('opacity-0', 'pointer-events-none');
            setTimeout(() => {
                content.classList.remove('translate-y-full');
            }, 10);

            // Lock the page behind the full-screen sheet so it can't scroll through
            document.documentElement.style.overflow = 'hidden';
            document.body.style.overflow = 'hidden';
            if (typeof lenis !== 'undefined') lenis.stop();

            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            var closeBar = document.getElementById('mobile-cat-close-bar');
            if (closeBar) closeBar.classList.add('-translate-y-full');
        }

        function closeMobileCatsModal() {
            const modal = document.getElementById('mobile-cats-modal');
            const content = document.getElementById('mobile-cats-content');
            if (!modal) return;

            // Only the cats sheet owns the scroll lock when it's actually open; guard so
            // the resize handler (which calls this on every 1024px crossing) can't release
            // a lock held by something else, e.g. an open mobile menu.
            var wasOpen = !modal.classList.contains('pointer-events-none');

            content.classList.add('translate-y-full');
            setTimeout(() => {
                modal.classList.add('opacity-0', 'pointer-events-none');
            }, 300);

            if (wasOpen) {
                document.documentElement.style.overflow = '';
                document.body.style.overflow = '';
                if (typeof lenis !== 'undefined') lenis.start();
            }
        }

        // Deep-links (tours.html#cat1 …) must respect the breakpoint: open the
        // bottom-sheet modal on mobile, expand the inline panel on desktop —
        // otherwise mobile gets the long inline scroll this design avoids.
        function openCat(id) {
            if (window.innerWidth < 1024) {
                var section = document.getElementById(id);
                var title = section ? section.querySelector('h2').textContent.replace('&amp;', '&') : 'Tours';
                openMobileCatsModal(id, title);
            } else {
                setCat(id, true);
            }
        }
        function openFromHash() { var h = location.hash.replace('#', ''); if (catIds().indexOf(h) > -1) openCat(h); }
        window.addEventListener('hashchange', openFromHash);
        window.addEventListener('load', openFromHash);

        // ===== Custom-ride constructor =====
        function selectChip(group, btn) {
            document.querySelectorAll('[data-group="' + group + '"]').forEach(function (b) { b.classList.remove('chip-active'); });
            btn.classList.add('chip-active');
            updateBuildLink();
        }
        function updateBuildLink() {
            // The custom-ride panel is cloned into the mobile sheet, which duplicates
            // #build-cta. Update every instance so the visible button (mobile clone or
            // desktop original) always carries the current selections.
            var ctas = document.querySelectorAll('#build-cta');
            if (!ctas.length) return;
            var params = new URLSearchParams({ ride: 'Custom' });
            ['type', 'duration', 'group', 'level'].forEach(function (g) {
                var el = document.querySelector('[data-group="' + g + '"].chip-active');
                if (el) params.set(g, el.dataset.val);
            });
            var href = 'contact?' + params.toString();
            ctas.forEach(function (cta) { cta.href = href; });
        }

        // ===== Handle Screen Resize Edge Cases =====
        let lastInnerWidth = window.innerWidth;
        window.addEventListener('resize', () => {
            const currentWidth = window.innerWidth;
            if (lastInnerWidth < 1024 && currentWidth >= 1024) {
                closeMobileCatsModal();
            } else if (lastInnerWidth >= 1024 && currentWidth < 1024) {
                closeAllCats();
            }
            lastInnerWidth = currentWidth;
        });
    </script>

<?php get_footer(); ?>

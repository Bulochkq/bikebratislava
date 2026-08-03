<!DOCTYPE html>
<html lang="en" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Bratislava | Discover Central Europe from the Saddle</title>
    <meta name="description" content="Discover Bratislava and Central Europe from the saddle. Premium guided cycling tours, road rides, gravel adventures, and custom experiences by local riders.">

    <!-- Favicons -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico" sizes="32x32">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/favicon-32.png">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/apple-touch-icon.png">

<?php wp_head(); ?>
<style>
        html.lenis, html.lenis body {
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
        .animation-delay-200 { animation-delay: 200ms; }
        .animation-delay-400 { animation-delay: 400ms; }
        
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
            transition: opacity 0.4s ease, transform 0.4s cubic-bezier(0.16,1,0.3,1), color 0.2s ease;
        }
        #mobile-menu.is-open .menu-nav-item:nth-child(1) { opacity:1; transform:translateY(0); transition-delay:0.08s; }
        #mobile-menu.is-open .menu-nav-item:nth-child(2) { opacity:1; transform:translateY(0); transition-delay:0.14s; }
        #mobile-menu.is-open .menu-nav-item:nth-child(3) { opacity:1; transform:translateY(0); transition-delay:0.20s; }
        #mobile-menu.is-open .menu-nav-item:nth-child(4) { opacity:1; transform:translateY(0); transition-delay:0.26s; }
        #mobile-menu.is-open .menu-nav-item:nth-child(5) { opacity:1; transform:translateY(0); transition-delay:0.32s; }
        #mobile-menu.is-open .menu-nav-item:nth-child(6) { opacity:1; transform:translateY(0); transition-delay:0.38s; }
        #mobile-menu.is-open .menu-nav-item:nth-child(7) { opacity:1; transform:translateY(0); transition-delay:0.44s; }
        #mobile-menu .menu-footer {
            opacity: 0;
            transform: translateY(14px);
            transition: opacity 0.4s ease 0.5s, transform 0.4s ease 0.5s;
        }
        #mobile-menu.is-open .menu-footer {
            opacity: 1;
            transform: translateY(0);
        }
        #mobile-menu-toggle {
            transition: color 0.2s ease;
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
        .parallax-section > *:not(.parallax-bg) {
            position: relative;
            z-index: 1;
        }
                        .parallax-bg.concrete {
            background-color: #fdfbfb;
            background-image: 
                radial-gradient(at 40% 20%, hsla(28,100%,74%,0.15) 0px, transparent 50%),
                radial-gradient(at 80% 0%, hsla(189,100%,56%,0.15) 0px, transparent 50%),
                radial-gradient(at 0% 50%, hsla(355,100%,93%,0.15) 0px, transparent 50%),
                radial-gradient(at 80% 50%, hsla(340,100%,76%,0.15) 0px, transparent 50%),
                radial-gradient(at 0% 100%, hsla(22,100%,77%,0.15) 0px, transparent 50%),
                radial-gradient(at 80% 100%, hsla(242,100%,70%,0.15) 0px, transparent 50%),
                radial-gradient(at 0% 0%, hsla(343,100%,76%,0.15) 0px, transparent 50%);
        }
        .parallax-bg.asphalt {
            background-color: #0A0A0A;
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('<?php echo get_template_directory_uri(); ?>/assets/pictures/texture-asphalt.jpg');
            background-size: cover;
            background-position: center;
        }
        .parallax-bg.dark-minimal {
            background-color: #0A0A0A;
            background-image: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.75)), url('<?php echo get_template_directory_uri(); ?>/assets/pictures/bg-minimal-1.jpeg');
            background-size: cover;
            background-position: center;
        }
        .parallax-bg.light-minimal {
            background-color: #ffffff;
            background-image: linear-gradient(rgba(255, 255, 255, 0.94), rgba(255, 255, 255, 0.94)), url('<?php echo get_template_directory_uri(); ?>/assets/pictures/bg-minimal-1.jpeg');
            background-size: cover;
            background-position: center;
            filter: blur(7px);
        }
        /* ===== Section background styles ===== */
        /* Meet Guides -> animated aurora (option 06) */
        .bg-aurora {
            background-color:#fff7f6;
            background-image:
                radial-gradient(at 27% 37%, rgba(215,25,32,.13) 0, transparent 45%),
                radial-gradient(at 75% 25%, rgba(255,160,90,.18) 0, transparent 45%),
                radial-gradient(at 50% 80%, rgba(215,25,32,.10) 0, transparent 45%),
                radial-gradient(at 85% 70%, rgba(255,210,170,.20) 0, transparent 45%);
            background-size:180% 180%;
            animation:auroraMove 16s ease-in-out infinite alternate;
        }
        @keyframes auroraMove{
            0%{background-position:0% 0%,100% 0%,0% 100%,100% 100%;}
            100%{background-position:50% 30%,55% 55%,45% 60%,50% 40%;}
        }
        @media (prefers-reduced-motion: reduce){ .bg-aurora{ animation:none; } }
        /* Trusted By -> diagonal stripes (option 05) */
        .bg-diagonal {
            background-color:#fcfbfa;
            background-image:repeating-linear-gradient(45deg, rgba(17,17,17,.028) 0 2px, transparent 2px 26px);
        }
        /* Final CTA -> graphite gradient (gray, no red) */
        .parallax-bg.dark-gray {
            background-color:#161616;
            background-image:
                radial-gradient(at 20% 22%, rgba(255,255,255,.08) 0, transparent 46%),
                radial-gradient(at 85% 72%, rgba(255,255,255,.05) 0, transparent 50%),
                radial-gradient(at 55% 8%, rgba(150,150,160,.10) 0, transparent 55%),
                linear-gradient(160deg, #1f1f1f 0%, #0d0d0d 100%);
        }

        /* ------------------------------------------------------------------
           Універсальний фон для сторінок, які ростуть із контентом
           (Discover, Guides). Побудований лише на градієнтах: нічого не
           вантажиться, а коли сторінка стає довшою, малюнок просто
           продовжується вниз.

           Шари мають різну висоту (900/1300/1100/1700 px), тому візерунок
           повторюється не раніше ніж через кілька тисяч пікселів — око
           стику не помічає. .bb-soft-bg-dim — приглушений варіант під
           світлими картками. ------------------------------------------- */
        .bb-soft-bg {
            background-color: #fdfbfa;
            background-image:
                radial-gradient(at 18% 12%, rgba(215, 25, 32, .07) 0, transparent 42%),
                radial-gradient(at 82% 30%, rgba(255, 170, 110, .10) 0, transparent 45%),
                radial-gradient(at 35% 72%, rgba(215, 25, 32, .05) 0, transparent 40%),
                radial-gradient(at 92% 88%, rgba(255, 205, 165, .10) 0, transparent 45%);
            background-size: 100% 900px, 100% 1300px, 100% 1100px, 100% 1700px;
            background-position: 0 0, 0 120px, 0 320px, 0 60px;
            background-repeat: repeat-y;
        }
        .bb-soft-bg-cool {
            background-color: #fbfcfd;
            background-image:
                radial-gradient(at 22% 15%, rgba(56, 130, 160, .07) 0, transparent 42%),
                radial-gradient(at 78% 34%, rgba(120, 190, 190, .09) 0, transparent 45%),
                radial-gradient(at 40% 74%, rgba(90, 140, 200, .05) 0, transparent 40%),
                radial-gradient(at 88% 90%, rgba(170, 215, 205, .10) 0, transparent 45%);
            background-size: 100% 1000px, 100% 1400px, 100% 1200px, 100% 1800px;
            background-position: 0 0, 0 160px, 0 380px, 0 40px;
            background-repeat: repeat-y;
        }
        /* Тонка лінія між блоками — як розділювачі на головній. */
        .bb-block + .bb-block {
            border-top: 1px solid rgba(120, 113, 108, .14);
        }

        /* Плавні плями на фоні сторінки Discover. Правило загубилось при
           перенесенні сторінки в тему — блоки лишались нерухомими. */
        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33%      { transform: translate(30px, -40px) scale(1.08); }
            66%      { transform: translate(-25px, 25px) scale(0.95); }
        }
        .animate-blob { animation: blob 18s ease-in-out infinite; }
        @media (prefers-reduced-motion: reduce) {
            .animate-blob { animation: none; }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-stone-50 via-rose-50/40 to-stone-100 text-brand-luxeTextDark font-sans antialiased selection:bg-brand-luxeGold selection:text-brand-luxeDark overflow-x-hidden">


    <!-- HEADER & NAVIGATION -->
    <!-- HEADER & NAVIGATION (With smart hide/reveal scroll behaviors) -->
    <header id="main-header" class="fixed top-0 left-0 w-full z-50 py-4 border-b border-white/5">
        <div class="max-w-screen-2xl mx-auto px-4 lg:px-6 xl:px-6 2xl:px-10 flex items-center gap-4 xl:gap-4 2xl:gap-8">
            <a href="<?php echo home_url('/'); ?>" class="flex items-center gap-3 group flex-shrink-0 mr-2" id="header-logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/pictures/logo.png" alt="Bike Bratislava Logo"
                    class="h-10 w-10 object-contain"
                    style="filter: brightness(0) saturate(100%) invert(20%) sepia(91%) saturate(3940%) hue-rotate(349deg) brightness(88%) contrast(97%);">
                <div class="flex flex-col">
                    <span
                        class="font-serif text-lg lg:text-lg xl:text-xl 2xl:text-2xl tracking-widest text-brand-luxeTextLight transition-colors duration-300 group-hover:text-brand-luxeGold"
                        id="logo-text">
                        BIKE BRATISLAVA
                    </span>
                    <span
                        class="text-[7px] tracking-[0.3em] text-white font-bold uppercase transition-colors duration-300"
                        id="logo-subtext">
                        by Velocity
                    </span>
                </div>
            </a>

            <!-- Desktop Navigation — compact at 1280px, full at 1440px+ -->
            <nav class="hidden xl:flex items-center gap-1.5 xl:gap-2 2xl:gap-6 flex-1 justify-center">
                <a href="<?php echo home_url('/'); ?>"
                    class="nav-link text-[10px] 2xl:text-xs font-medium tracking-[0.1em] 2xl:tracking-[0.25em] uppercase text-white hover:text-brand-luxeGold transition-colors duration-300 whitespace-nowrap py-1 border-b border-transparent hover:border-brand-luxeGold/40">Home</a>
                <a href="<?php echo home_url('/about'); ?>"
                    class="nav-link text-[10px] 2xl:text-xs font-medium tracking-[0.1em] 2xl:tracking-[0.25em] uppercase text-white hover:text-brand-luxeGold transition-colors duration-300 whitespace-nowrap py-1 border-b border-transparent hover:border-brand-luxeGold/40">About
                    Us</a>
                <a href="<?php echo home_url('/discover'); ?>"
                    class="nav-link text-[10px] 2xl:text-xs font-medium tracking-[0.1em] 2xl:tracking-[0.25em] uppercase text-white hover:text-brand-luxeGold transition-colors duration-300 whitespace-nowrap py-1 border-b border-transparent hover:border-brand-luxeGold/40">Discover
                    Bratislava</a>
                <div class="relative flex items-center group/tours">
                    <a href="<?php echo home_url('/tours'); ?>"
                        class="nav-link text-[10px] 2xl:text-xs font-medium tracking-[0.1em] 2xl:tracking-[0.25em] uppercase text-white hover:text-brand-luxeGold transition-colors duration-300 whitespace-nowrap py-1 border-b border-transparent hover:border-brand-luxeGold/40 inline-flex items-center gap-1">Tours
                        &amp; Rides <i data-lucide="chevron-down" class="w-3 h-3"></i></a>
                    <div
                        class="invisible opacity-0 translate-y-1 group-hover/tours:visible group-hover/tours:opacity-100 group-hover/tours:translate-y-0 transition-all duration-200 absolute top-full left-1/2 -translate-x-1/2 pt-4 z-50">
                        <div
                            class="bg-brand-luxeDark/95 backdrop-blur-md border border-white/10 shadow-2xl min-w-[240px] py-2">
                            
                            <?php foreach (bb_tour_categories() as $category) : ?>
                            <a href="<?php echo home_url('/tours'); ?>#<?php echo esc_attr(bb_tour_category_anchor($category)); ?>"
                                class="block px-5 py-2.5 text-[10px] tracking-[0.18em] uppercase text-stone-300 hover:text-brand-luxeGold hover:bg-white/5 transition-colors duration-200"><?php echo esc_html($category->name); ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <a href="<?php echo home_url('/guides'); ?>"
                    class="nav-link text-[10px] 2xl:text-xs font-medium tracking-[0.1em] 2xl:tracking-[0.25em] uppercase text-white hover:text-brand-luxeGold transition-colors duration-300 whitespace-nowrap py-1 border-b border-transparent hover:border-brand-luxeGold/40">Our
                    Guides</a>
                <a href="<?php echo home_url('/journal'); ?>"
                    class="nav-link text-[10px] 2xl:text-xs font-medium tracking-[0.1em] 2xl:tracking-[0.25em] uppercase text-white hover:text-brand-luxeGold transition-colors duration-300 whitespace-nowrap py-1 border-b border-transparent hover:border-brand-luxeGold/40">Journal</a>
                <a href="<?php echo home_url('/contact'); ?>"
                    class="nav-link text-[10px] 2xl:text-xs font-medium tracking-[0.1em] 2xl:tracking-[0.25em] uppercase text-white hover:text-brand-luxeGold transition-colors duration-300 whitespace-nowrap py-1 border-b border-transparent hover:border-brand-luxeGold/40">Contact</a>
            </nav>

            <!-- CTA Button -->
            <div class="hidden xl:flex items-center gap-4 flex-shrink-0">
                <a href="<?php echo home_url('/contact'); ?>" id="nav-cta"
                    class="inline-flex items-center justify-center px-4 xl:px-6 2xl:px-8 py-2.5 2xl:py-3 text-[10px] 2xl:text-xs font-medium tracking-[0.15em] 2xl:tracking-[0.3em] uppercase bg-brand-luxeGold text-white hover:bg-brand-luxeGoldDark transition-all duration-500 rounded-none">
                    Plan Your Ride
                </a>
            </div>
            <button id="mobile-menu-toggle"
                class="xl:hidden text-white hover:text-brand-luxeGold transition-colors focus:outline-none ml-auto"
                aria-label="Toggle Menu">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>
    </header>

    <!-- MOBILE MENU OVERLAY (full-screen, centered, premium) -->
    <div id="mobile-menu" class="fixed inset-0 z-[60] flex flex-col" style="background: #0F0E0E;">
        <div class="flex items-center justify-between px-6 py-5 border-b border-white/5 flex-shrink-0">
            <a href="<?php echo home_url('/'); ?>" class="flex flex-col">
                <span class="font-serif text-lg tracking-widest text-white">BIKE BRATISLAVA</span>
                <span class="text-[7px] tracking-[0.3em] text-stone-500 font-light uppercase">Central Europe</span>
            </a>
            <button id="mobile-menu-close"
                class="text-white hover:text-brand-luxeGold transition-colors focus:outline-none"
                aria-label="Close Menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </div>
        <nav class="flex-1 overflow-y-auto flex flex-col py-8" data-lenis-prevent>
            <div class="flex flex-col items-center gap-1 w-full max-w-xs m-auto">
                <a href="<?php echo home_url('/'); ?>" class="mobile-nav-link menu-nav-item group flex items-center gap-5 py-3 px-4 w-full">
                    <span
                        class="text-[10px] tracking-[0.2em] text-brand-luxeGold font-medium w-6 text-right flex-shrink-0">01</span>
                    <span
                        class="font-serif text-3xl text-stone-400 group-hover:text-brand-luxeGold transition-colors duration-200">Home</span>
                </a>
                <a href="<?php echo home_url('/about'); ?>" class="mobile-nav-link menu-nav-item group flex items-center gap-5 py-3 px-4 w-full">
                    <span
                        class="text-[10px] tracking-[0.2em] text-brand-luxeGold font-medium w-6 text-right flex-shrink-0">02</span>
                    <span
                        class="font-serif text-3xl text-stone-400 group-hover:text-brand-luxeGold transition-colors duration-200">About
                        Us</span>
                </a>
                <a href="<?php echo home_url('/discover'); ?>" class="mobile-nav-link menu-nav-item group flex items-center gap-5 py-3 px-4 w-full">
                    <span
                        class="text-[10px] tracking-[0.2em] text-brand-luxeGold font-medium w-6 text-right flex-shrink-0">03</span>
                    <span
                        class="font-serif text-3xl text-stone-400 group-hover:text-brand-luxeGold transition-colors duration-200">Discover</span>
                </a>

                <!-- Tours & Rides — expandable so sub-categories are reachable on mobile -->
                <div class="menu-nav-item w-full">
                    <button id="mobile-tours-toggle" type="button" aria-expanded="false"
                        class="mobile-nav-link group flex items-center gap-5 py-3 px-4 w-full text-left focus:outline-none">
                        <span
                            class="text-[10px] tracking-[0.2em] text-brand-luxeGold font-medium w-6 text-right flex-shrink-0">04</span>
                        <span
                            class="font-serif text-3xl text-stone-400 group-hover:text-brand-luxeGold transition-colors duration-200">Tours
                            &amp; Rides</span>
                        <i data-lucide="chevron-down" id="mobile-tours-chevron"
                            class="w-5 h-5 ml-auto text-stone-500 transition-transform duration-300"></i>
                    </button>
                    <div id="mobile-tours-sub" class="overflow-hidden max-h-0 transition-all duration-500 ease-out">
                        <div class="flex flex-col pl-11 pr-4 pt-1 pb-3 gap-0.5">
                            <a href="<?php echo home_url('/tours'); ?>"
                                class="py-2.5 text-xs tracking-[0.18em] uppercase text-stone-300 hover:text-brand-luxeGold transition-colors">All
                                Tours</a>
                            <a href="<?php echo home_url('/tours'); ?>#cat1"
                                class="py-2.5 text-xs tracking-[0.18em] uppercase text-stone-400 hover:text-brand-luxeGold transition-colors">E-Bike
                                &amp; Leisure Tours</a>
                            <a href="<?php echo home_url('/tours'); ?>#cat2"
                                class="py-2.5 text-xs tracking-[0.18em] uppercase text-stone-400 hover:text-brand-luxeGold transition-colors">Road
                                &amp; Gravel Cycling Experiences</a>
                            <a href="<?php echo home_url('/tours'); ?>#cat3"
                                class="py-2.5 text-xs tracking-[0.18em] uppercase text-stone-400 hover:text-brand-luxeGold transition-colors">Built
                                Around Your Ride</a>
                        </div>
                    </div>
                </div>

                <a href="<?php echo home_url('/guides'); ?>" class="mobile-nav-link menu-nav-item group flex items-center gap-5 py-3 px-4 w-full">
                    <span
                        class="text-[10px] tracking-[0.2em] text-brand-luxeGold font-medium w-6 text-right flex-shrink-0">05</span>
                    <span
                        class="font-serif text-3xl text-stone-400 group-hover:text-brand-luxeGold transition-colors duration-200">Our
                        Guides</span>
                </a>
                <a href="<?php echo home_url('/journal'); ?>" class="mobile-nav-link menu-nav-item group flex items-center gap-5 py-3 px-4 w-full">
                    <span
                        class="text-[10px] tracking-[0.2em] text-brand-luxeGold font-medium w-6 text-right flex-shrink-0">06</span>
                    <span
                        class="font-serif text-3xl text-stone-400 group-hover:text-brand-luxeGold transition-colors duration-200">Journal</span>
                </a>
                <a href="<?php echo home_url('/contact'); ?>" class="mobile-nav-link menu-nav-item group flex items-center gap-5 py-3 px-4 w-full">
                    <span
                        class="text-[10px] tracking-[0.2em] text-brand-luxeGold font-medium w-6 text-right flex-shrink-0">07</span>
                    <span
                        class="font-serif text-3xl text-stone-400 group-hover:text-brand-luxeGold transition-colors duration-200">Contact</span>
                </a>
            </div>
        </nav>
        <div class="menu-footer px-6 py-6 border-t border-white/5 flex-shrink-0 flex items-center justify-between">
            <span class="text-[10px] tracking-[0.2em] uppercase text-stone-500 font-light">Bratislava, Slovakia</span>
            <a href="<?php echo home_url('/contact'); ?>"
                class="inline-flex items-center gap-2 px-6 py-3 border border-brand-luxeGold/50 text-brand-luxeGold hover:bg-brand-luxeGold hover:text-white transition-all duration-300 text-[10px] tracking-[0.2em] uppercase font-medium">Plan
                Your Ride</a>
        </div>
    </div>


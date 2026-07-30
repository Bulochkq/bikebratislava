<?php
/**
 * Homepage — Bike Bratislava
 *
 * Step 2 of the WordPress migration: the whole document still lives in this one
 * file (header markup inlined, meta hard-coded) so it can be compared 1:1 with
 * the static index.html. Step 3 splits header/footer into their own templates,
 * step 11 makes the meta tags dynamic.
 */
$bb = get_template_directory_uri();
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth overflow-x-hidden">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Bratislava | Discover Central Europe from the Saddle</title>
    <meta name="description" content="Discover Bratislava and Central Europe from the saddle. Premium guided cycling tours, road rides, gravel adventures, and custom experiences by local riders.">

    <!-- Favicons -->
    <link rel="icon" href="<?php echo $bb; ?>/assets/favicon.ico" sizes="32x32">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $bb; ?>/assets/favicon-32.png">
    <link rel="apple-touch-icon" href="<?php echo $bb; ?>/assets/apple-touch-icon.png">

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
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('<?php echo $bb; ?>/assets/pictures/texture-asphalt.jpg');
            background-size: cover;
            background-position: center;
        }
        .parallax-bg.dark-minimal {
            background-color: #0A0A0A;
            background-image: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.75)), url('<?php echo $bb; ?>/assets/pictures/bg-minimal-1.jpeg');
            background-size: cover;
            background-position: center;
        }
        .parallax-bg.light-minimal {
            background-color: #ffffff;
            background-image: linear-gradient(rgba(255, 255, 255, 0.94), rgba(255, 255, 255, 0.94)), url('<?php echo $bb; ?>/assets/pictures/bg-minimal-1.jpeg');
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
    </style>
</head>
<body class="bg-gradient-to-br from-stone-50 via-rose-50/40 to-stone-100 text-brand-luxeTextDark font-sans antialiased selection:bg-brand-luxeGold selection:text-brand-luxeDark overflow-x-hidden">


    <!-- HEADER & NAVIGATION -->
    <!-- HEADER & NAVIGATION (With smart hide/reveal scroll behaviors) -->
    <header id="main-header" class="fixed top-0 left-0 w-full z-50 py-4 border-b border-white/5">
        <div class="max-w-screen-2xl mx-auto px-4 lg:px-6 xl:px-6 2xl:px-10 flex items-center gap-4 xl:gap-4 2xl:gap-8">
            <a href="./" class="flex items-center gap-3 group flex-shrink-0 mr-2" id="header-logo">
                <img src="<?php echo $bb; ?>/assets/pictures/logo.png" alt="Bike Bratislava Logo"
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
                <a href="./"
                    class="nav-link text-[10px] 2xl:text-xs font-medium tracking-[0.1em] 2xl:tracking-[0.25em] uppercase text-white hover:text-brand-luxeGold transition-colors duration-300 whitespace-nowrap py-1 border-b border-transparent hover:border-brand-luxeGold/40">Home</a>
                <a href="about"
                    class="nav-link text-[10px] 2xl:text-xs font-medium tracking-[0.1em] 2xl:tracking-[0.25em] uppercase text-white hover:text-brand-luxeGold transition-colors duration-300 whitespace-nowrap py-1 border-b border-transparent hover:border-brand-luxeGold/40">About
                    Us</a>
                <a href="discover"
                    class="nav-link text-[10px] 2xl:text-xs font-medium tracking-[0.1em] 2xl:tracking-[0.25em] uppercase text-white hover:text-brand-luxeGold transition-colors duration-300 whitespace-nowrap py-1 border-b border-transparent hover:border-brand-luxeGold/40">Discover
                    Bratislava</a>
                <div class="relative flex items-center group/tours">
                    <a href="tours"
                        class="nav-link text-[10px] 2xl:text-xs font-medium tracking-[0.1em] 2xl:tracking-[0.25em] uppercase text-white hover:text-brand-luxeGold transition-colors duration-300 whitespace-nowrap py-1 border-b border-transparent hover:border-brand-luxeGold/40 inline-flex items-center gap-1">Tours
                        &amp; Rides <i data-lucide="chevron-down" class="w-3 h-3"></i></a>
                    <div
                        class="invisible opacity-0 translate-y-1 group-hover/tours:visible group-hover/tours:opacity-100 group-hover/tours:translate-y-0 transition-all duration-200 absolute top-full left-1/2 -translate-x-1/2 pt-4 z-50">
                        <div
                            class="bg-brand-luxeDark/95 backdrop-blur-md border border-white/10 shadow-2xl min-w-[240px] py-2">
                            <a href="tours#cat1"
                                class="block px-5 py-2.5 text-[10px] tracking-[0.18em] uppercase text-stone-300 hover:text-brand-luxeGold hover:bg-white/5 transition-colors duration-200">E-Bike
                                &amp; Leisure Tours</a>
                            <a href="tours#cat2"
                                class="block px-5 py-2.5 text-[10px] tracking-[0.18em] uppercase text-stone-300 hover:text-brand-luxeGold hover:bg-white/5 transition-colors duration-200">Road
                                &amp; Gravel Cycling Experiences</a>
                            <a href="tours#cat3"
                                class="block px-5 py-2.5 text-[10px] tracking-[0.18em] uppercase text-stone-300 hover:text-brand-luxeGold hover:bg-white/5 transition-colors duration-200">Built
                                Around Your Ride</a>
                        </div>
                    </div>
                </div>
                <a href="guides"
                    class="nav-link text-[10px] 2xl:text-xs font-medium tracking-[0.1em] 2xl:tracking-[0.25em] uppercase text-white hover:text-brand-luxeGold transition-colors duration-300 whitespace-nowrap py-1 border-b border-transparent hover:border-brand-luxeGold/40">Our
                    Guides</a>
                <a href="journal"
                    class="nav-link text-[10px] 2xl:text-xs font-medium tracking-[0.1em] 2xl:tracking-[0.25em] uppercase text-white hover:text-brand-luxeGold transition-colors duration-300 whitespace-nowrap py-1 border-b border-transparent hover:border-brand-luxeGold/40">Journal</a>
                <a href="contact"
                    class="nav-link text-[10px] 2xl:text-xs font-medium tracking-[0.1em] 2xl:tracking-[0.25em] uppercase text-white hover:text-brand-luxeGold transition-colors duration-300 whitespace-nowrap py-1 border-b border-transparent hover:border-brand-luxeGold/40">Contact</a>
            </nav>

            <!-- CTA Button -->
            <div class="hidden xl:flex items-center gap-4 flex-shrink-0">
                <a href="contact" id="nav-cta"
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
            <a href="./" class="flex flex-col">
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
                <a href="./" class="mobile-nav-link menu-nav-item group flex items-center gap-5 py-3 px-4 w-full">
                    <span
                        class="text-[10px] tracking-[0.2em] text-brand-luxeGold font-medium w-6 text-right flex-shrink-0">01</span>
                    <span
                        class="font-serif text-3xl text-stone-400 group-hover:text-brand-luxeGold transition-colors duration-200">Home</span>
                </a>
                <a href="about" class="mobile-nav-link menu-nav-item group flex items-center gap-5 py-3 px-4 w-full">
                    <span
                        class="text-[10px] tracking-[0.2em] text-brand-luxeGold font-medium w-6 text-right flex-shrink-0">02</span>
                    <span
                        class="font-serif text-3xl text-stone-400 group-hover:text-brand-luxeGold transition-colors duration-200">About
                        Us</span>
                </a>
                <a href="discover" class="mobile-nav-link menu-nav-item group flex items-center gap-5 py-3 px-4 w-full">
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
                            <a href="tours"
                                class="py-2.5 text-xs tracking-[0.18em] uppercase text-stone-300 hover:text-brand-luxeGold transition-colors">All
                                Tours</a>
                            <a href="tours#cat1"
                                class="py-2.5 text-xs tracking-[0.18em] uppercase text-stone-400 hover:text-brand-luxeGold transition-colors">E-Bike
                                &amp; Leisure Tours</a>
                            <a href="tours#cat2"
                                class="py-2.5 text-xs tracking-[0.18em] uppercase text-stone-400 hover:text-brand-luxeGold transition-colors">Road
                                &amp; Gravel Cycling Experiences</a>
                            <a href="tours#cat3"
                                class="py-2.5 text-xs tracking-[0.18em] uppercase text-stone-400 hover:text-brand-luxeGold transition-colors">Built
                                Around Your Ride</a>
                        </div>
                    </div>
                </div>

                <a href="guides" class="mobile-nav-link menu-nav-item group flex items-center gap-5 py-3 px-4 w-full">
                    <span
                        class="text-[10px] tracking-[0.2em] text-brand-luxeGold font-medium w-6 text-right flex-shrink-0">05</span>
                    <span
                        class="font-serif text-3xl text-stone-400 group-hover:text-brand-luxeGold transition-colors duration-200">Our
                        Guides</span>
                </a>
                <a href="journal" class="mobile-nav-link menu-nav-item group flex items-center gap-5 py-3 px-4 w-full">
                    <span
                        class="text-[10px] tracking-[0.2em] text-brand-luxeGold font-medium w-6 text-right flex-shrink-0">06</span>
                    <span
                        class="font-serif text-3xl text-stone-400 group-hover:text-brand-luxeGold transition-colors duration-200">Journal</span>
                </a>
                <a href="contact" class="mobile-nav-link menu-nav-item group flex items-center gap-5 py-3 px-4 w-full">
                    <span
                        class="text-[10px] tracking-[0.2em] text-brand-luxeGold font-medium w-6 text-right flex-shrink-0">07</span>
                    <span
                        class="font-serif text-3xl text-stone-400 group-hover:text-brand-luxeGold transition-colors duration-200">Contact</span>
                </a>
            </div>
        </nav>
        <div class="menu-footer px-6 py-6 border-t border-white/5 flex-shrink-0 flex items-center justify-between">
            <span class="text-[10px] tracking-[0.2em] uppercase text-stone-500 font-light">Bratislava, Slovakia</span>
            <a href="contact"
                class="inline-flex items-center gap-2 px-6 py-3 border border-brand-luxeGold/50 text-brand-luxeGold hover:bg-brand-luxeGold hover:text-white transition-all duration-300 text-[10px] tracking-[0.2em] uppercase font-medium">Plan
                Your Ride</a>
        </div>
    </div>

    <!-- SECTION 1: HERO (local looping cyclist video playlist) -->
    <section class="relative min-h-screen flex items-center justify-center bg-brand-luxeDark overflow-hidden">
        <div class="absolute inset-0 z-0">
            <!-- Autoplaying, muted local MP4 video with transform class for parallax -->
            <!-- poster shows if video can't be loaded (e.g. GitHub Pages file size limit) -->
            <video autoplay muted playsinline
                   poster="<?php echo $bb; ?>/assets/pictures/cyclists-sunset.jpg"
                   class="w-full h-full object-cover object-center opacity-45 scale-110" id="hero-video" style="will-change: transform;">
                <source src="<?php echo $bb; ?>/assets/pictures/hero-waterfront.mp4" type="video/mp4">
            </video>
            <div class="absolute inset-0 bg-gradient-to-t from-brand-luxeDark via-brand-luxeDark/20 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-6 py-12 md:py-20 lg:py-24 text-center text-brand-luxeTextLight flex flex-col items-center">

            
            <h1 class="font-serif text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold tracking-tight leading-[1.1] md:leading-[1.05] mb-4 md:mb-6 opacity-0 fade-in-up animation-delay-200 text-white uppercase editable">
                Discover Bratislava</h1>
            <span class="font-sans font-black tracking-widest text-brand-luxeGold text-2xl md:text-4xl lg:text-5xl block mt-4 editable">Explore The Heart of Central Europe</span>
            
            <p class="max-w-2xl text-stone-400 text-xs sm:text-sm md:text-base xl:text-lg font-light leading-relaxed mb-8 md:mb-12 opacity-0 fade-in-up animation-delay-400 tracking-wide font-sans editable">
                Experience one of Europe’s most surprising cycling destinations. Ride through historic streets, riverside landscapes, vineyards and scenic countryside with our local ride leaders who know the region best.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-6 opacity-0 fade-in-up animation-delay-400">
                <a href="tours" class="w-52 text-center px-10 py-5 bg-brand-luxeGold hover:bg-brand-luxeGoldDark text-white font-medium text-[11px] tracking-[0.25em] uppercase transition-all duration-300 rounded-none">
                    Explore Our Tours
                </a>
                <a href="contact" class="w-52 text-center px-10 py-5 border border-white/20 hover:bg-white hover:text-brand-luxeDark text-white font-medium text-[11px] tracking-[0.25em] uppercase transition-all duration-300 rounded-none">
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
                        <img loading="lazy" decoding="async" src="<?php echo $bb; ?>/assets/pictures/devin-sunset.png" 
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
                                <p class="text-xs text-stone-500 font-light leading-relaxed editable">Discover Devín, Bratislava, and historic ruins.</p>
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

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-12">
                
                <!-- Card 1 -->
                <div class="group bg-white flex flex-col justify-between transition-all duration-500 rounded-none scroll-reveal border border-red-600/30 hover:border-red-600/70 hover:shadow-2xl">
                    <div>
                        <div class="aspect-square overflow-hidden relative">
                            <img loading="lazy" decoding="async" src="<?php echo $bb; ?>/assets/pictures/coffee-break.jpg" alt="E-Bike & Leisure Tours" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                            <div class="absolute top-4 left-4 bg-brand-luxeDark text-white text-[9px] tracking-[0.25em] uppercase font-medium py-1 px-3 border border-brand-luxeGold/25">
                                Category 1
                            </div>
                        </div>
                        <div class="pt-6 pb-2 px-5 lg:px-6">
                            <h3 class="font-serif text-2xl font-light text-brand-luxeDark mb-4 editable">E-Bike & Leisure Tours</h3>
                            <p class="text-stone-600 font-light text-xs leading-relaxed font-sans tracking-wide editable">
                                Designed for visitors who want to explore Bratislava and its surroundings in a relaxed and enjoyable way.
                            </p>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-5 lg:px-6">
                        <a href="tours#cat1" class="inline-flex items-center justify-center bg-red-600 text-white px-8 py-3.5 text-[10px] font-bold tracking-[0.25em] uppercase hover:bg-stone-900 transition-colors duration-300 rounded-none w-max">Learn More</a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="group bg-white flex flex-col justify-between transition-all duration-500 rounded-none scroll-reveal border border-red-600/30 hover:border-red-600/70 hover:shadow-2xl">
                    <div>
                        <div class="aspect-square overflow-hidden relative">
                            <img loading="lazy" decoding="async" src="<?php echo $bb; ?>/assets/pictures/peloton.png" alt="Road & Gravel" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                            <div class="absolute top-4 left-4 bg-brand-luxeDark text-white text-[9px] tracking-[0.25em] uppercase font-medium py-1 px-3 border border-brand-luxeGold/25">
                                Category 2
                            </div>
                        </div>
                        <div class="pt-6 pb-2 px-5 lg:px-6">
                            <h3 class="font-serif text-2xl font-light text-brand-luxeDark mb-4 editable">Road & Gravel Cycling Experiences</h3>
                            <p class="text-stone-600 font-light text-xs leading-relaxed font-sans tracking-wide editable">
                                Created for passionate cyclists looking for longer distances, more demanding routes and unforgettable scenery.
                            </p>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-5 lg:px-6">
                        <a href="tours#cat2" class="inline-flex items-center justify-center bg-red-600 text-white px-8 py-3.5 text-[10px] font-bold tracking-[0.25em] uppercase hover:bg-stone-900 transition-colors duration-300 rounded-none w-max">Learn More</a>
                    </div>
                </div>



                <!-- Card 3 -->
                <div class="group bg-white flex flex-col justify-between transition-all duration-500 rounded-none scroll-reveal border border-red-600/30 hover:border-red-600/70 hover:shadow-2xl">
                    <div>
                        <div class="aspect-square overflow-hidden relative">
                            <img loading="lazy" decoding="async" src="<?php echo $bb; ?>/assets/pictures/corporate-group.jpg" alt="Custom Experiences" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                            <div class="absolute top-4 left-4 bg-brand-luxeDark text-white text-[9px] tracking-[0.25em] uppercase font-medium py-1 px-3 border border-brand-luxeGold/25">
                                Category 3
                            </div>
                        </div>
                        <div class="pt-6 pb-2 px-5 lg:px-6">
                            <h3 class="font-serif text-2xl font-light text-brand-luxeDark mb-4 editable">Custom Experiences</h3>
                            <p class="text-stone-600 font-light text-xs leading-relaxed font-sans tracking-wide editable">
                                Fully customised cycling experiences for individuals, groups, cycling clubs and corporate teams.
                            </p>
                        </div>
                    </div>
                    <div class="pb-6 pt-0 px-5 lg:px-6">
                        <a href="tours#cat3" class="inline-flex items-center justify-center bg-red-600 text-white px-8 py-3.5 text-[10px] font-bold tracking-[0.25em] uppercase hover:bg-stone-900 transition-colors duration-300 rounded-none w-max">Enquire Now</a>
                    </div>
                </div>

            </div>
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

                    <a href="guides" class="inline-flex items-center justify-center px-10 py-4 bg-brand-luxeDark hover:bg-brand-luxeDark/90 text-white font-medium text-[11px] tracking-[0.25em] uppercase transition-all duration-300 rounded-none border border-stone-800">
                        Meet The Team
                    </a>
                </div>

                <div class="lg:col-span-6 order-1 lg:order-2 scroll-reveal">
                    <div class="relative max-w-sm mx-auto lg:max-w-none">
                        <!-- Cyclists coffee stop portrait with hover transition -->
                        <div class="aspect-[3/4] overflow-hidden shadow-2xl border border-stone-300/60">
                            <img loading="lazy" decoding="async" src="<?php echo $bb; ?>/assets/pictures/guide-portrait.jpg" 
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
                <img loading="lazy" decoding="async" src="<?php echo $bb; ?>/assets/pictures/partner-swissre.png" alt="Swiss Re" class="h-10 md:h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-105">
                <img loading="lazy" decoding="async" src="<?php echo $bb; ?>/assets/pictures/partner-pixelfederation.png" alt="Pixel Federation" class="h-10 md:h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-105">
                <img loading="lazy" decoding="async" src="<?php echo $bb; ?>/assets/pictures/partner-jtre.png" alt="JTRE" class="h-10 md:h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-105">
                <img loading="lazy" decoding="async" src="<?php echo $bb; ?>/assets/pictures/partner-alto.png" alt="Alto Real" class="h-10 md:h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-105">
                <img loading="lazy" decoding="async" src="<?php echo $bb; ?>/assets/pictures/partner-corwin.png" alt="Corwin" class="h-12 md:h-14 lg:h-16 object-contain transition-transform duration-300 hover:scale-105">
                <img loading="lazy" decoding="async" src="<?php echo $bb; ?>/assets/pictures/partner-vodacke-centrum.png" alt="Vodacke centrum" class="h-10 md:h-12 lg:h-14 object-contain transition-transform duration-300 hover:scale-105">
            </div>
        </div>
    </section>


    <!-- SECTION 6: FINAL CTA (Luxe Dark theme with asphalt background texture) -->
    <section class="py-16 bg-brand-luxeDark text-white parallax-section text-center border-b border-stone-900" id="section-cta">
        <!-- Asphalt dark background texture — inner parallax wrapper prevents white edge bleed -->
        <div class="parallax-bg" id="parallax-cta-asphalt" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $bb; ?>/assets/pictures/explore-bratislava.jpeg'); background-size: cover; background-position: center;"></div>

        <div class="max-w-4xl mx-auto px-6 relative z-10 scroll-reveal">
            <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block editable">Start Planning</span>
            <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl font-light text-white mb-8 editable">Ready To Explore Bratislava?</h2>
            <p class="text-stone-300 font-light text-sm md:text-base max-w-xl mx-auto leading-relaxed mb-12 tracking-wide font-sans editable">
                Tell us when you're visiting Bratislava and we'll help you find the perfect ride.
            </p>
            <a href="contact" class="inline-flex items-center justify-center px-12 py-5 bg-white hover:bg-brand-luxeGold hover:text-white text-brand-luxeDark font-medium text-[11px] tracking-[0.25em] uppercase transition-all duration-300 rounded-none shadow-2xl border border-white hover:border-brand-luxeGold">
                Go to Inquiry Form
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-brand-luxeDark text-stone-500 py-24 border-t border-stone-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 font-sans tracking-wide">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-16 mb-20">
                
                <div class="md:col-span-2">
                    <a href="./" class="flex flex-col mb-6 group">
                        <span class="font-serif text-2xl tracking-widest text-white transition-colors duration-300 editable">
                            BIKE BRATISLAVA
                        </span>
                        <span class="text-[8px] tracking-[0.35em] text-stone-500 font-light uppercase editable">
                            Central Europe
                        </span>
                    </a>
                    <p class="text-xs font-light leading-relaxed mt-6 pr-8 text-stone-400 editable">
                        Discover Bratislava and the heart of Central Europe from the saddle. Guided cycling tours, road rides, gravel adventures and custom cycling experiences designed by local riders.
                    </p>
                </div>

                <div>
                    <h4 class="text-[10px] font-bold uppercase tracking-[0.3em] text-white mb-6 editable">Explore</h4>
                    <ul class="space-y-4 text-xs font-light">
                        <li><a href="./" class="hover:text-brand-luxeGold transition-colors">Home</a></li>
                        <li><a href="about" class="hover:text-brand-luxeGold transition-colors">About Us</a></li>
                        <li><a href="discover" class="hover:text-brand-luxeGold transition-colors">Discover Bratislava</a></li>
                        <li><a href="tours" class="hover:text-brand-luxeGold transition-colors">Tours & Rides</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-[10px] font-bold uppercase tracking-[0.3em] text-white mb-6 editable">Rides</h4>
                    <ul class="space-y-4 text-xs font-light">
                        <li><a href="guides" class="hover:text-brand-luxeGold transition-colors">Our Guides</a></li>
                        <li><a href="journal" class="hover:text-brand-luxeGold transition-colors">Journal</a></li>
                        <li><a href="contact" class="hover:text-brand-luxeGold transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-[10px] font-bold uppercase tracking-[0.3em] text-white mb-6 editable">Contact</h4>
                    <ul class="space-y-4 text-xs font-light">
                        <li class="text-stone-400">Mgr. Silvia Karais</li>
                        <li><a href="mailto:silvia@velocity.sk" class="hover:text-brand-luxeGold transition-colors">silvia@velocity.sk</a></li>
                        <li><a href="tel:+421903214013" class="hover:text-brand-luxeGold transition-colors">+421 903 214 013</a></li>
                    </ul>
                </div>

            </div>

            <div class="border-t border-stone-900/60 pt-8 flex flex-col lg:flex-row items-center justify-between text-[10px] font-light gap-6">
                <p class="editable">&copy; 2026 Bike Bratislava. All rights reserved.<span class="block mt-1.5 text-stone-600">Operated by NEW VELO s. r. o. &middot; Medveďovej 1/A, 851 04 Bratislava &middot; IČO: 48141291 &middot; IČ DPH: SK2120069501</span></p>
                <div class="flex items-center space-x-6 md:space-x-8">
                    <a href="https://www.velocity.sk/" target="_blank" class="flex items-center space-x-3 opacity-70 hover:opacity-100 transition-opacity">
                        <span class="uppercase tracking-widest text-stone-400 hover:text-white transition-colors editable">velocity.sk</span>
                        <div class="h-4 w-[1px] bg-stone-700"></div>
                        <img loading="lazy" decoding="async" src="<?php echo $bb; ?>/assets/pictures/logo-velocity-white.png" alt="Velocity" class="h-5 object-contain">
                    </a>
                    <a href="https://www.instagram.com/velocity_cyklo/" target="_blank" class="flex items-center space-x-2 text-stone-400 hover:text-brand-luxeGold transition-colors" aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        <span class="uppercase tracking-widest font-semibold hidden sm:inline-block editable">Instagram</span>
                    </a>
                    <a href="https://www.facebook.com/VeloCity.sk/" target="_blank" class="flex items-center space-x-2 text-stone-400 hover:text-brand-luxeGold transition-colors" aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        <span class="uppercase tracking-widest font-semibold hidden sm:inline-block editable">Facebook</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <script>

        // 4. Parallax scroll effect for backgrounds (translateY on inner wrapper — no white edge bleed)
        function updateParallax() {
            if (window.innerWidth <= 768) {
                // Reset transforms on mobile so the hero video and backgrounds don't stay
                // stuck offset after a resize down from desktop.
                const heroReset = document.getElementById('hero-video');
                if (heroReset && heroReset.style.transform !== 'none' && heroReset.style.transform !== '') {
                    heroReset.style.transform = 'none';
                }
                document.querySelectorAll('.parallax-bg').forEach(bg => {
                    if (bg.style.transform !== 'none' && bg.style.transform !== '') {
                        bg.style.transform = 'none';
                    }
                });
                return;
            }

            const scroll = window.scrollY;

            // Hero video parallax
            const heroBg = document.getElementById('hero-video');
            if (heroBg) {
                heroBg.style.transform = `translateY(${scroll * 0.25}px) scale(1.1)`;
            }

            // Inner parallax background wrappers (overflow-hidden on parent clips edges)
            document.querySelectorAll('.parallax-bg').forEach(bg => {
                const section = bg.closest('.parallax-section');
                if (!section) return;
                const rect = section.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    const scrollProgress = (window.innerHeight - rect.top) / (window.innerHeight + section.offsetHeight);
                    const percentOffset = (scrollProgress - 0.5) * -15; // range: -7.5% to +7.5% (safely within -20% inset)
                    bg.style.transform = `translateY(${percentOffset}%)`;
                }
            });
        }

        window.addEventListener('scroll', updateParallax, { passive: true });
        updateParallax();

        // Hero Video Playlist Logic
        const heroVideo = document.getElementById('hero-video');
        if (heroVideo) {
            const playlist = [
                "<?php echo $bb; ?>/assets/pictures/hero-waterfront.mp4",
                "<?php echo $bb; ?>/assets/pictures/hero-sunrise.mp4",
                "<?php echo $bb; ?>/assets/pictures/hero-golden-hour.mp4"
            ];
            let currentVideoIndex = 0;
            
            heroVideo.addEventListener('ended', () => {
                currentVideoIndex = (currentVideoIndex + 1) % playlist.length;
                heroVideo.src = playlist[currentVideoIndex];
                heroVideo.play();
            });
        }
    </script>

<?php wp_footer(); ?>
</body>
</html>

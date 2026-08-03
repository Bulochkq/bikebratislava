<?php
/**
 * Template Name: Privacy Policy
 *
 * Текст політики зберігається у вмісті сторінки, а не в шаблоні:
 * це юридичний документ, який редагують без програміста.
 */
get_header();
?>
    <style>
        html.lenis, html.lenis body { height: auto; }
        .lenis.lenis-smooth { scroll-behavior: auto !important; }
        .lenis.lenis-smooth [data-lenis-prevent] { overscroll-behavior: contain; }
        .lenis.lenis-stopped { overflow: hidden; }
        .lenis.lenis-scrolling iframe { pointer-events: none; }

        #main-header {
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), background-color 0.4s ease, padding 0.4s ease;
        }
        #mobile-menu {
            opacity: 0; visibility: hidden; pointer-events: none;
            transition: opacity 0.45s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.45s ease;
        }
        #mobile-menu.is-open { opacity: 1; visibility: visible; pointer-events: auto; }

        .policy h2 {
            font-family: 'Outfit', sans-serif;
            color: #0A0A0A;
        }
        .policy p, .policy li { line-height: 1.8; }
        .policy a { color: #B91C1C; text-decoration: underline; text-underline-offset: 2px; }
        .policy a:hover { color: #E31C25; }
    </style>


    <!-- TITLE BANNER -->
    <section class="relative bg-brand-luxeDark text-white pt-40 pb-20 overflow-hidden">
        <div class="absolute inset-0 z-0 bg-cover bg-center opacity-25"
            style="background-image: url('pictures/devin-sunset.png');"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-brand-luxeDark via-brand-luxeDark/70 to-brand-luxeDark/40"></div>
        <div class="relative z-10 max-w-3xl mx-auto px-6 lg:px-8">
            <span class="text-[11px] font-semibold tracking-[0.3em] text-brand-luxeGold uppercase editable">Legal</span>
            <h1 class="font-serif text-4xl md:text-6xl font-bold uppercase tracking-tight mt-4 editable"><?php the_title(); ?></h1>
            <p class="text-stone-300 font-light text-sm mt-5 tracking-wide editable">Last updated: 28 June 2026</p>
        </div>
    </section>

    <!-- CONTENT -->
    <main class="policy max-w-3xl mx-auto px-6 lg:px-8 py-16 md:py-24 space-y-14 text-stone-700 font-light text-sm md:text-[15px]">
        <?php while (have_posts()) : the_post(); the_content(); endwhile; ?>
    </main>

<?php get_footer(); ?>

<?php
/**
 * Сторінка «Journal» — стрічка записів.
 *
 * WordPress використовує цей шаблон для сторінки, вибраної в
 * Nastavenia → Čítanie як сторінка записів. Статті — звичайні записи,
 * фільтри згори будуються з рубрик, у яких є записи.
 */
get_header();
?>
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
            background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url('<?php echo get_template_directory_uri(); ?>/assets/pictures/bg-minimal-1.jpeg');
            background-size: cover;
            background-position: center;
        }
        /* Legacy: concrete-bg as section bg for guides card row */
                        .concrete-bg-inline {
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
    </style>


    <!-- HERO SECTION -->
    <section class="relative min-h-[75vh] flex items-center justify-center bg-brand-luxeDark text-white overflow-hidden">
        <div class="absolute inset-0 z-0">
            <!-- Scale-110 for parallax -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/pictures/cyclists-city.jpg" 
                 alt="Bikepacking adventure cycling road" 
                 class="w-full h-full object-cover object-center opacity-45 scale-110" id="hero-img" style="will-change: transform;">
            <div class="absolute inset-0 bg-gradient-to-t from-brand-luxeDark via-brand-luxeDark/35 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center flex flex-col items-center">
            <span class="text-xs font-semibold tracking-[0.3em] text-brand-luxeGold uppercase mb-4 block opacity-0 fade-in-up editable">Stories From The Saddle</span>
            <h1 class="font-serif text-5xl md:text-7xl font-light mb-6 opacity-0 fade-in-up animation-delay-200 editable">The Journal</h1>
            <p class="text-stone-400 text-sm md:text-base font-light max-w-2xl mx-auto leading-relaxed tracking-wider opacity-0 fade-in-up animation-delay-400 editable">
                Routes, travel inspiration, local tips and cycling stories from Bratislava and beyond.
            </p>
        </div>
    </section>

    <!-- SECTION: ARTICLES & CATEGORY CHIPS -->
    <section class="py-32 relative overflow-hidden border-b border-stone-200/40 bg-gradient-to-tl from-slate-50 via-purple-50 to-pink-50 parallax-section">
        <div class="parallax-bg concrete"></div>
        <div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10">
            
            <div class="flex flex-wrap items-center justify-center gap-x-8 gap-y-4 mb-20 border-b border-stone-200 pb-8 font-sans scroll-reveal">
                <button class="filter-btn text-[10px] font-bold uppercase tracking-wider text-brand-luxeDark border-b-2 border-brand-luxeGold pb-2 transition-all" data-category="all">All Stories</button>
                <?php
                foreach (get_categories(array('hide_empty' => true)) as $bb_cat) :
                ?>
                <button class="filter-btn text-[10px] font-bold uppercase tracking-wider text-stone-400 hover:text-brand-luxeDark border-b-2 border-transparent pb-2 transition-all"
                    data-category="<?php echo esc_attr($bb_cat->name); ?>"><?php echo esc_html($bb_cat->name); ?></button>
                <?php endforeach; ?>
            </div>

            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 xl:gap-24">
                <?php if (have_posts()) : while (have_posts()) : the_post();
                    $bb_cats = get_the_category();
                    $bb_primary = !empty($bb_cats) ? $bb_cats[0]->name : '';
                    $bb_img = has_post_thumbnail()
                        ? get_the_post_thumbnail_url(get_the_ID(), 'large')
                        : get_template_directory_uri() . '/assets/pictures/cyclists-sunset.jpg';
                    // Запис із посиланням на Instagram показується інакше:
                    // замість фото й кнопки «Read Article» — сама вбудова,
                    // яка вантажиться лише після згоди відвідувача.
                    $bb_ig = get_field('instagram_url');
                    if ($bb_ig) :
                        $bb_ig = untrailingslashit($bb_ig);
                        $bb_id = get_the_ID();
                ?>
                <article class="group flex flex-col justify-start scroll-reveal border border-brand-luxeGold/20 bg-white/50 backdrop-blur-sm p-4 shadow-sm hover:shadow-md hover:border-brand-luxeGold/40 transition-all"
                    data-category="<?php echo esc_attr($bb_primary); ?>">
                    <span class="text-[9px] font-bold tracking-[0.2em] text-brand-luxeGold uppercase font-sans mb-4 block shrink-0"><?php echo esc_html($bb_primary); ?></span>
                    <div class="w-full h-[650px] md:h-[680px] rounded-sm bg-white overflow-hidden relative instagram-embed"
                        data-embed-src="<?php echo esc_url($bb_ig . '/embed'); ?>">
                        <!-- GDPR: iframe Instagram (куки Meta) створюється лише після цього кліку -->
                        <div class="ig-placeholder absolute inset-0 flex flex-col items-center justify-center text-center p-8 bg-gradient-to-br from-stone-50 via-rose-50/40 to-stone-100 border border-stone-200">
                            <div class="w-14 h-14 border border-brand-luxeGold/40 text-brand-luxeGold flex items-center justify-center mb-6">
                                <i data-lucide="instagram" class="w-6 h-6"></i>
                            </div>
                            <h4 class="font-serif text-xl font-light text-brand-luxeDark mb-3">Instagram Post</h4>
                            <p class="text-stone-500 font-light text-xs leading-relaxed max-w-xs mb-8 font-sans">
                                This content is hosted by Instagram. By loading it you accept that Instagram (Meta)
                                may set cookies and process your data.
                            </p>
                            <button type="button" onclick="loadInstagramEmbed(this)"
                                class="px-7 py-3 bg-brand-luxeGold hover:bg-brand-luxeGoldDark text-white text-[10px] font-bold tracking-[0.2em] uppercase transition-colors duration-300 shadow-sm">
                                Load Post
                            </button>
                            <a href="<?php echo esc_url($bb_ig); ?>" target="_blank" rel="noopener"
                                class="mt-5 text-[10px] uppercase tracking-widest text-stone-400 hover:text-brand-luxeGold transition-colors">
                                Open on Instagram instead
                            </a>
                        </div>
                    </div>
                    <div class="mt-6 text-stone-700 text-[11px] leading-relaxed font-sans tracking-wide border-t border-brand-luxeGold/40 pt-4 font-medium flex flex-col">
                        <div id="desc-event-<?php echo $bb_id; ?>" class="relative max-h-[150px] md:max-h-none overflow-hidden transition-all duration-500 ease-in-out">
                            <?php echo wp_kses_post(get_the_content()); ?>
                            <div id="desc-fade-<?php echo $bb_id; ?>" class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-white/90 to-transparent md:hidden pointer-events-none transition-opacity duration-300"></div>
                        </div>
                        <button type="button" onclick="toggleEventDesc(<?php echo $bb_id; ?>, this)"
                            class="md:hidden mt-3 text-brand-luxeGold font-bold uppercase tracking-wider text-[9px] hover:text-brand-luxeGoldDark transition-colors text-left w-max">Read
                            more ↓</button>
                    </div>
                </article>
                <?php else : ?>
                <article class="group flex flex-col justify-between scroll-reveal border border-brand-luxeGold/20 bg-white/50 backdrop-blur-sm p-4 shadow-sm hover:shadow-md hover:border-brand-luxeGold/40 transition-all"
                    data-category="<?php echo esc_attr($bb_primary); ?>">
                    <div>
                        <div class="aspect-[4/3] md:aspect-[3/2] lg:aspect-[4/3] overflow-hidden mb-6">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url($bb_img); ?>" alt="<?php the_title_attribute(); ?>"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <span class="text-[9px] font-bold tracking-[0.2em] text-brand-luxeGold uppercase font-sans"><?php echo esc_html($bb_primary); ?></span>
                        <h3 class="font-serif text-3xl font-light text-brand-luxeDark mt-3 mb-3 group-hover:text-brand-luxeGold transition-colors"><?php the_title(); ?></h3>
                        <p class="text-stone-500 font-light text-xs leading-relaxed mb-6 font-sans tracking-wide"><?php echo esc_html(get_the_excerpt()); ?></p>
                    </div>
                    <div>
                        <button onclick="openArticleModal('post-<?php echo get_the_ID(); ?>')"
                            class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-brand-luxeGold text-white text-[10px] font-bold tracking-[0.2em] uppercase hover:bg-brand-luxeGoldDark transition-all duration-300 shadow-sm">
                            <span>Read Article</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i>
                        </button>
                    </div>
                </article>
                <?php endif; ?>
                <?php endwhile; endif; ?>
            </div>

            <?php
            // Пагінація — щоб сторінка не росла нескінченно, коли статей побільшає.
            $bb_pag = paginate_links(array('type' => 'array', 'prev_text' => '←', 'next_text' => '→'));
            if ($bb_pag) : ?>
            <nav class="flex justify-center gap-3 mt-16">
                <?php foreach ($bb_pag as $bb_link) : ?>
                    <span class="text-xs font-sans tracking-wide [&_a]:text-stone-500 [&_a:hover]:text-brand-luxeGold [&_.current]:text-brand-luxeGold [&_.current]:font-bold"><?php echo wp_kses_post($bb_link); ?></span>
                <?php endforeach; ?>
            </nav>
            <?php endif; ?>

            <!-- No Stories Found -->
            <div id="no-articles-message" class="hidden text-center py-20 font-sans">
                <div class="inline-flex items-center justify-center w-12 h-12 border border-brand-luxeGold/30 text-brand-luxeGold mb-4 rounded-none">
                    <i data-lucide="book-open" class="w-5 h-5"></i>
                </div>
                <h4 class="font-serif text-xl font-light text-brand-luxeDark mb-2 editable">No Stories Yet</h4>
                <p class="text-stone-400 font-light text-xs max-w-xs mx-auto leading-relaxed editable">We are currently writing new stories for this category. Check back soon for routes and insider tips!</p>
            </div>
        </div>
    </section>

    <!-- ARTICLE DETAIL MODAL / POPUP -->
    <!-- Одне вікно на всі статті: вміст підставляється при кліку. У статичній
         версії воно стояло після підвалу, тому при перенесенні в тему
         загубилось — кнопка «Read Article» нічого не робила. -->
    <div id="article-modal"
        class="fixed inset-0 bg-stone-950/90 backdrop-blur-md z-50 flex items-center justify-center p-4 opacity-0 pointer-events-none transition-all duration-500">
        <div class="bg-white/95 backdrop-blur-md max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl relative border border-brand-luxeGold/20 text-brand-luxeDark"
            data-lenis-prevent>
            <button onclick="closeArticleModal()"
                class="absolute top-4 right-4 text-stone-400 hover:text-brand-luxeDark transition-colors z-10 bg-white/50 backdrop-blur-sm rounded-full p-1"
                aria-label="Close article">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
            <div id="article-modal-content"></div>
        </div>
    </div>

    <script>
        const BB_CONTACT_URL = <?php echo wp_json_encode(home_url('/contact/')); ?>;

                const filterButtons = document.querySelectorAll('.filter-btn');
        const articles = document.querySelectorAll('article');
        const noArticlesMsg = document.getElementById('no-articles-message');

        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const selectedCategory = btn.getAttribute('data-category');

                // Update active button styles
                filterButtons.forEach(b => {
                    b.classList.remove('text-brand-luxeDark', 'border-brand-luxeGold');
                    b.classList.add('text-stone-400', 'border-transparent');
                });
                btn.classList.add('text-brand-luxeDark', 'border-brand-luxeGold');
                btn.classList.remove('text-stone-400', 'border-transparent');

                // Filter articles
                let visibleCount = 0;
                articles.forEach(article => {
                    const articleCategory = article.getAttribute('data-category');
                    if (selectedCategory === 'all' || articleCategory === selectedCategory) {
                        article.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        article.classList.add('hidden');
                    }
                });

                // Show/hide no articles message
                if (visibleCount === 0) {
                    noArticlesMsg.classList.remove('hidden');
                } else {
                    noArticlesMsg.classList.add('hidden');
                }
            });
        });

        // 6. Article Details Modal Logic
        const articleModal = document.getElementById('article-modal');
        const articleModalContent = document.getElementById('article-modal-content');

        const articleData = <?php
        $bb_posts = get_posts(array('post_type' => 'post', 'posts_per_page' => -1));
        $bb_ad = array();
        foreach ($bb_posts as $bb_p) {
            $bb_pc = get_the_category($bb_p->ID);
            $bb_ad['post-' . $bb_p->ID] = array(
                'title'    => $bb_p->post_title,
                'category' => !empty($bb_pc) ? $bb_pc[0]->name : '',
                'img'      => has_post_thumbnail($bb_p->ID)
                    ? get_the_post_thumbnail_url($bb_p->ID, 'large')
                    : get_template_directory_uri() . '/assets/pictures/cyclists-sunset.jpg',
                'date'     => 'Published ' . get_the_date('F j, Y', $bb_p),
                'content'  => apply_filters('the_content', $bb_p->post_content),
            );
        }
        echo wp_json_encode($bb_ad);
        ?>

        function openArticleModal(key) {
            const data = articleData[key];
            if (!data) return;

            articleModalContent.innerHTML = `
                <div class="relative w-full h-64 bg-stone-100 border-b border-brand-luxeGold/20">
                    <img src="${data.img}" alt="${data.title}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-6 left-6 text-white pr-6">
                        <span class="text-[9px] uppercase font-bold tracking-[0.25em] text-brand-luxeGold border border-brand-luxeGold/30 px-3 py-1 bg-black/50 rounded-none editable">${data.category}</span>
                        <h3 class="font-serif text-2xl md:text-3xl font-light mt-3 leading-tight text-white editable">${data.title}</h3>
                        <p class="text-[9px] uppercase tracking-wider text-stone-300 mt-2 editable">${data.date}</p>
                    </div>
                </div>

                <div class="p-8 space-y-6 text-stone-600 font-light text-sm leading-relaxed font-sans tracking-wide">
                    ${data.content}
                    
                    <div class="pt-6 flex justify-between items-center border-t border-stone-200">
                        <span class="text-xs text-stone-500">Interested in this region?</span>
                        <a href="${BB_CONTACT_URL}?ride=${encodeURIComponent(data.title)}" class="px-8 py-3.5 bg-brand-luxeGold hover:bg-brand-luxeGoldDark text-white text-[9px] font-semibold uppercase tracking-[0.2em] transition-colors duration-300 rounded-none border border-brand-luxeGold shadow-2xl">
                            Plan A Ride
                        </a>
                    </div>
                </div>
            `;

            articleModal.classList.remove('opacity-0', 'pointer-events-none');
            lucide.createIcons();
        }

        function closeArticleModal() {
            articleModal.classList.add('opacity-0', 'pointer-events-none');
        }

        articleModal.addEventListener('click', (e) => {
            if (e.target === articleModal) closeArticleModal();
        });

        // 7. Consent-gated Instagram embeds: the iframe is created only after the
        // visitor clicks "Load Post" (no Meta cookies / requests before that).
        function loadInstagramEmbed(btn) {
            const wrap = btn.closest('.instagram-embed');
            if (!wrap || wrap.querySelector('iframe')) return;
            const iframe = document.createElement('iframe');
            iframe.src = wrap.getAttribute('data-embed-src');
            iframe.className = 'absolute top-0 left-0 w-full';
            iframe.style.height = '780px';
            iframe.setAttribute('frameborder', '0');
            iframe.setAttribute('scrolling', 'no');
            iframe.setAttribute('allowtransparency', 'true');
            const placeholder = wrap.querySelector('.ig-placeholder');
            if (placeholder) placeholder.remove();
            wrap.appendChild(iframe);
        }

        // 8. «Read more» під вбудовою Instagram на телефоні. Раніше цей код
        // був вписаний в атрибут кожної картки; тепер один на всі.
        function toggleEventDesc(id, btn) {
            const desc = document.getElementById('desc-event-' + id);
            const fade = document.getElementById('desc-fade-' + id);
            if (!desc) return;
            const collapsed = desc.classList.contains('max-h-[150px]');
            desc.classList.toggle('max-h-[150px]', !collapsed);
            desc.classList.toggle('max-h-[1000px]', collapsed);
            if (fade) fade.classList.toggle('opacity-0', collapsed);
            btn.innerText = collapsed ? 'Read less ↑' : 'Read more ↓';
        }
    </script>

<?php get_footer(); ?>

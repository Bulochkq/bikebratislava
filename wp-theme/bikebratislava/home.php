<!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 xl:gap-24">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        $cat_names = array();
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            foreach( $categories as $category ) {
                                $cat_names[] = $category->name;
                            }
                        }
                        $cat_string = implode(', ', $cat_names);
                        $primary_cat = !empty($cat_names) ? $cat_names[0] : '';
                        $img_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_template_directory_uri() . '/assets/pictures/cyclists-sunset.jpg';
                ?>
                <!-- Article -->
                <article class="group flex flex-col justify-between scroll-reveal border border-brand-luxeGold/20 bg-white/50 backdrop-blur-sm p-4 shadow-sm hover:shadow-md hover:border-brand-luxeGold/40 transition-all" data-category="<?php echo esc_attr($primary_cat); ?>">
                    <div>
                        <div class="aspect-[4/3] md:aspect-[3/2] lg:aspect-[4/3] overflow-hidden mb-6">
                            <img loading="lazy" decoding="async" src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <span class="text-[9px] font-bold tracking-[0.2em] text-brand-luxeGold uppercase font-sans"><?php echo esc_html($cat_string); ?></span>
                        <h3 class="font-serif text-3xl font-light text-brand-luxeDark mt-3 mb-3 group-hover:text-brand-luxeGold transition-colors"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="text-stone-500 font-light text-xs leading-relaxed mb-6 font-sans tracking-wide">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                    <div>
                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-brand-luxeGold text-white text-[10px] font-bold tracking-[0.2em] uppercase hover:bg-brand-luxeGoldDark transition-all duration-300 shadow-sm">
                            <span>Read Article</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </article>
                <?php
                    endwhile;
                else:
                    echo '<p>No stories found.</p>';
                endif;
                ?>
            </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 xl:gap-24">
                <!-- Article 1 -->
                <article class="group flex flex-col justify-between scroll-reveal border border-brand-luxeGold/20 bg-white/50 backdrop-blur-sm p-4 shadow-sm hover:shadow-md hover:border-brand-luxeGold/40 transition-all" data-category="Cycling Routes">
                    <div>
                        <div class="aspect-[4/3] md:aspect-[3/2] lg:aspect-[4/3] overflow-hidden mb-6">
                            <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/cyclists-sunset.jpg" alt="Iron Curtain cycle path slovakia road" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <span class="text-[9px] font-bold tracking-[0.2em] text-brand-luxeGold uppercase font-sans editable">Cycling Routes</span>
                        <h3 class="font-serif text-3xl font-light text-brand-luxeDark mt-3 mb-3 group-hover:text-brand-luxeGold transition-colors editable">Riding the Iron Curtain Trail</h3>
                        <p class="text-stone-500 font-light text-xs leading-relaxed mb-6 font-sans tracking-wide editable">A comprehensive guide to tracing history and crossing border checkpoints along the former Austrian-Slovak border on two wheels.</p>
                    </div>
                    <div>
                        <button onclick="openArticleModal('ironcurtain')" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-brand-luxeGold text-white text-[10px] font-bold tracking-[0.2em] uppercase hover:bg-brand-luxeGoldDark transition-all duration-300 shadow-sm">
                            <span>Read Article</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i>
                        </button>
                    </div>
                </article>

                <!-- Article 2 -->
                <article class="group flex flex-col justify-between scroll-reveal border border-brand-luxeGold/20 bg-white/50 backdrop-blur-sm p-4 shadow-sm hover:shadow-md hover:border-brand-luxeGold/40 transition-all" data-category="Wine & Culture">
                    <div>
                        <div class="aspect-[4/3] md:aspect-[3/2] lg:aspect-[4/3] overflow-hidden mb-6">
                            <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/vineyard-ride.png" alt="Autumn harvest in vineyards slovakia" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <span class="text-[9px] font-bold tracking-[0.2em] text-brand-luxeGold uppercase font-sans editable">Wine & Culture</span>
                        <h3 class="font-serif text-3xl font-light text-brand-luxeDark mt-3 mb-3 group-hover:text-brand-luxeGold transition-colors editable">Harvest Season in Svätý Jur</h3>
                        <p class="text-stone-500 font-light text-xs leading-relaxed mb-6 font-sans tracking-wide editable">What it's like to ride through grape-filled hills during autumn harvests and taste wines at historic family-run cellars.</p>
                    </div>
                    <div>
                        <button onclick="openArticleModal('svatyjur')" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-brand-luxeGold text-white text-[10px] font-bold tracking-[0.2em] uppercase hover:bg-brand-luxeGoldDark transition-all duration-300 shadow-sm">
                            <span>Read Article</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i>
                        </button>
                    </div>
                </article>

                <!-- Article 3 -->
                <article class="group flex flex-col justify-between scroll-reveal border border-brand-luxeGold/20 bg-white/50 backdrop-blur-sm p-4 shadow-sm hover:shadow-md hover:border-brand-luxeGold/40 transition-all" data-category="Travel Tips">
                    <div>
                        <div class="aspect-[4/3] md:aspect-[3/2] lg:aspect-[4/3] overflow-hidden mb-6">
                            <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/danube-riders.jpeg" alt="Vienna to Bratislava route path" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <span class="text-[9px] font-bold tracking-[0.2em] text-brand-luxeGold uppercase font-sans editable">Travel Tips</span>
                        <h3 class="font-serif text-3xl font-light text-brand-luxeDark mt-3 mb-3 group-hover:text-brand-luxeGold transition-colors editable">Vienna to Bratislava by Bike</h3>
                        <p class="text-stone-500 font-light text-xs leading-relaxed mb-6 font-sans tracking-wide editable">Everything you need to know about riding paths, wind directions, gears, and best sightseeing stops along EuroVelo 6.</p>
                    </div>
                    <div>
                        <button onclick="openArticleModal('viennatobratislava')" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-brand-luxeGold text-white text-[10px] font-bold tracking-[0.2em] uppercase hover:bg-brand-luxeGoldDark transition-all duration-300 shadow-sm">
                            <span>Read Article</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i>
                        </button>
                    </div>
                </article>

                <!-- Article 4 -->
                <article class="group flex flex-col justify-between scroll-reveal border border-brand-luxeGold/20 bg-white/50 backdrop-blur-sm p-4 shadow-sm hover:shadow-md hover:border-brand-luxeGold/40 transition-all" data-category="Bikepacking">
                    <div>
                        <div class="aspect-[4/3] md:aspect-[3/2] lg:aspect-[4/3] overflow-hidden mb-6">
                            <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/road-cyclist-climb.jpg" alt="Bikepacking mountains gravel path" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        </div>
                        <span class="text-[9px] font-bold tracking-[0.2em] text-brand-luxeGold uppercase font-sans editable">Bikepacking</span>
                        <h3 class="font-serif text-3xl font-light text-brand-luxeDark mt-3 mb-3 group-hover:text-brand-luxeGold transition-colors editable">Peaks of Little Carpathians</h3>
                        <p class="text-stone-500 font-light text-xs leading-relaxed mb-6 font-sans tracking-wide editable">A weekend bikepacking itinerary across forest paths, ancient castle ruins, and pitching camp under regional stars.</p>
                    </div>
                    <div>
                        <button onclick="openArticleModal('littlecarpathians')" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-brand-luxeGold text-white text-[10px] font-bold tracking-[0.2em] uppercase hover:bg-brand-luxeGoldDark transition-all duration-300 shadow-sm">
                            <span>Read Article</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"></i>
                        </button>
                    </div>
                </article>
            
                <!-- Article 3: Instagram Event 1 -->
                <article class="group flex flex-col justify-start scroll-reveal border border-brand-luxeGold/20 bg-white/50 backdrop-blur-sm p-4 shadow-sm hover:shadow-md hover:border-brand-luxeGold/40 transition-all" data-category="Events">
                    <span class="text-[9px] font-bold tracking-[0.2em] text-brand-luxeGold uppercase font-sans mb-4 block shrink-0 editable">Events</span>
                    <div class="w-full h-[650px] md:h-[680px] rounded-sm bg-white overflow-hidden relative instagram-embed" data-embed-src="https://www.instagram.com/p/DWVrT90jdg_/embed">
                        <!-- GDPR: the Instagram iframe (Meta cookies) is only created after this click -->
                        <div class="ig-placeholder absolute inset-0 flex flex-col items-center justify-center text-center p-8 bg-gradient-to-br from-stone-50 via-rose-50/40 to-stone-100 border border-stone-200">
                            <div class="w-14 h-14 border border-brand-luxeGold/40 text-brand-luxeGold flex items-center justify-center mb-6">
                                <i data-lucide="instagram" class="w-6 h-6"></i>
                            </div>
                            <h4 class="font-serif text-xl font-light text-brand-luxeDark mb-3 editable">Instagram Post</h4>
                            <p class="text-stone-500 font-light text-xs leading-relaxed max-w-xs mb-8 font-sans editable">
                                This content is hosted by Instagram. By loading it you accept that Instagram (Meta)
                                may set cookies and process your data.
                            </p>
                            <button type="button" onclick="loadInstagramEmbed(this)"
                                class="px-7 py-3 bg-brand-luxeGold hover:bg-brand-luxeGoldDark text-white text-[10px] font-bold tracking-[0.2em] uppercase transition-colors duration-300 shadow-sm">
                                Load Post
                            </button>
                            <a href="https://www.instagram.com/p/DWVrT90jdg_/" target="_blank" rel="noopener"
                                class="mt-5 text-[10px] uppercase tracking-widest text-stone-400 hover:text-brand-luxeGold transition-colors">
                                Open on Instagram instead
                            </a>
                        </div>
                    </div>
                    <div class="mt-6 text-stone-700 text-[11px] leading-relaxed font-sans tracking-wide border-t border-brand-luxeGold/40 pt-4 font-medium flex flex-col">
                        <div id="desc-event-1" class="relative max-h-[150px] md:max-h-none overflow-hidden transition-all duration-500 ease-in-out">
                            Join us for regular cycling rides 🚴‍♂️<br><br>
                            📍 First ride 1.4.2026<br>
                            📍 Every Wednesday at 17:00<br>
                            📍 Start: VELOCITY, Lamačská cesta 8<br><br>
                            All performance groups are welcome – the pace will be relaxed, no racing 🙂<br><br>
                            👉 We will meet in front of the store<br>
                            👉 Second meetpoint: under Lafranconi bridge (Petržalka side) approx. 17:20h<br><br>
                            Route approx. 50 km, direction Austria 🇦🇹<br>
                            Map will be published soon via Strava event<br><br>
                            Suitable for road and gravel bikes<br><br>
                            ❗️ Helmet is mandatory<br>
                            🍌 Don't forget a small snack for the ride and enough water<br><br>
                            We look forward to seeing you 😎<br><br>
                            🔗 <a href="https://www.instagram.com/p/DWVrT90jdg_/" target="_blank" class="text-brand-luxeGold hover:underline font-bold transition-all">View original post on Instagram</a>
                            
                            <div id="desc-fade-1" class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-white/90 to-transparent md:hidden pointer-events-none transition-opacity duration-300"></div>
                        </div>
                        <button onclick="
                            const desc = document.getElementById('desc-event-1');
                            const fade = document.getElementById('desc-fade-1');
                            if(desc.classList.contains('max-h-[150px]')) {
                                desc.classList.remove('max-h-[150px]');
                                desc.classList.add('max-h-[1000px]');
                                fade.classList.add('opacity-0');
                                this.innerText = 'Read less ↑';
                            } else {
                                desc.classList.add('max-h-[150px]');
                                desc.classList.remove('max-h-[1000px]');
                                fade.classList.remove('opacity-0');
                                this.innerText = 'Read more ↓';
                            }
                        " class="md:hidden mt-3 text-brand-luxeGold font-bold uppercase tracking-wider text-[9px] hover:text-brand-luxeGoldDark transition-colors text-left w-max">Read more ↓</button>
                    </div>
                </article>

                <!-- Article 4: Instagram Event 2 -->
                <article class="group flex flex-col justify-start scroll-reveal border border-brand-luxeGold/20 bg-white/50 backdrop-blur-sm p-4 shadow-sm hover:shadow-md hover:border-brand-luxeGold/40 transition-all" data-category="Events">
                    <span class="text-[9px] font-bold tracking-[0.2em] text-brand-luxeGold uppercase font-sans mb-4 block shrink-0 editable">Events</span>
                    <div class="w-full h-[650px] md:h-[680px] rounded-sm bg-white overflow-hidden relative instagram-embed" data-embed-src="https://www.instagram.com/p/DaFLMc6NhAU/embed">
                        <!-- GDPR: the Instagram iframe (Meta cookies) is only created after this click -->
                        <div class="ig-placeholder absolute inset-0 flex flex-col items-center justify-center text-center p-8 bg-gradient-to-br from-stone-50 via-rose-50/40 to-stone-100 border border-stone-200">
                            <div class="w-14 h-14 border border-brand-luxeGold/40 text-brand-luxeGold flex items-center justify-center mb-6">
                                <i data-lucide="instagram" class="w-6 h-6"></i>
                            </div>
                            <h4 class="font-serif text-xl font-light text-brand-luxeDark mb-3 editable">Instagram Post</h4>
                            <p class="text-stone-500 font-light text-xs leading-relaxed max-w-xs mb-8 font-sans editable">
                                This content is hosted by Instagram. By loading it you accept that Instagram (Meta)
                                may set cookies and process your data.
                            </p>
                            <button type="button" onclick="loadInstagramEmbed(this)"
                                class="px-7 py-3 bg-brand-luxeGold hover:bg-brand-luxeGoldDark text-white text-[10px] font-bold tracking-[0.2em] uppercase transition-colors duration-300 shadow-sm">
                                Load Post
                            </button>
                            <a href="https://www.instagram.com/p/DaFLMc6NhAU/" target="_blank" rel="noopener"
                                class="mt-5 text-[10px] uppercase tracking-widest text-stone-400 hover:text-brand-luxeGold transition-colors">
                                Open on Instagram instead
                            </a>
                        </div>
                    </div>
                    <div class="mt-6 text-stone-700 text-[11px] leading-relaxed font-sans tracking-wide border-t border-brand-luxeGold/40 pt-4 font-medium flex flex-col">
                        <div id="desc-event-2" class="relative max-h-[150px] md:max-h-none overflow-hidden transition-all duration-500 ease-in-out">
                            Regular morning Tuesday social rides to Biely Kríž and back:<br>
                            📍 every Tuesday 7.30<br>
                            📍 start / finish Velocity Westend / Lamačská 3b / Westend plazza<br>
                            🚲 30 km, relaxed pace adapted to the group<br><br>
                            Route on tarmac to Biely Kríž and back. After the ride, there is a possibility for coffee at Café du Pavé in the Velocity Westend store. No drop, pace adapted to the group, we take it easy, we wait for each other. Ride for road / gravel bikes. Mandatory helmet.<br><br>
                            We look forward to seeing you!<br><br>
                            🔗 <a href="https://www.instagram.com/p/DaFLMc6NhAU/" target="_blank" class="text-brand-luxeGold hover:underline font-bold transition-all">View original post on Instagram</a>
                            
                            <div id="desc-fade-2" class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-t from-white/90 to-transparent md:hidden pointer-events-none transition-opacity duration-300"></div>
                        </div>
                        <button onclick="
                            const desc = document.getElementById('desc-event-2');
                            const fade = document.getElementById('desc-fade-2');
                            if(desc.classList.contains('max-h-[150px]')) {
                                desc.classList.remove('max-h-[150px]');
                                desc.classList.add('max-h-[1000px]');
                                fade.classList.add('opacity-0');
                                this.innerText = 'Read less ↑';
                            } else {
                                desc.classList.add('max-h-[150px]');
                                desc.classList.remove('max-h-[1000px]');
                                fade.classList.remove('opacity-0');
                                this.innerText = 'Read more ↓';
                            }
                        " class="md:hidden mt-3 text-brand-luxeGold font-bold uppercase tracking-wider text-[9px] hover:text-brand-luxeGoldDark transition-colors text-left w-max">Read more ↓</button>
                    </div>
                </article>
            </div>

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

            <?php get_footer(); ?>

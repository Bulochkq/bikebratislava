    <!-- FOOTER -->
    <footer class="bg-brand-luxeDark text-stone-500 py-24 border-t border-stone-900">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 font-sans tracking-wide">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-16 mb-20">
                
                <div class="md:col-span-2">
                    <a href="<?php echo home_url('/'); ?>" class="flex flex-col mb-6 group">
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
                        <li><a href="<?php echo home_url('/'); ?>" class="hover:text-brand-luxeGold transition-colors">Home</a></li>
                        <li><a href="<?php echo home_url('/about'); ?>" class="hover:text-brand-luxeGold transition-colors">About Us</a></li>
                        <li><a href="<?php echo home_url('/discover'); ?>" class="hover:text-brand-luxeGold transition-colors">Discover Bratislava</a></li>
                        <li><a href="<?php echo home_url('/tours'); ?>" class="hover:text-brand-luxeGold transition-colors">Tours & Rides</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-[10px] font-bold uppercase tracking-[0.3em] text-white mb-6 editable">Rides</h4>
                    <ul class="space-y-4 text-xs font-light">
                        <li><a href="<?php echo home_url('/guides'); ?>" class="hover:text-brand-luxeGold transition-colors">Our Guides</a></li>
                        <li><a href="<?php echo home_url('/journal'); ?>" class="hover:text-brand-luxeGold transition-colors">Journal</a></li>
                        <li><a href="<?php echo home_url('/contact'); ?>" class="hover:text-brand-luxeGold transition-colors">Contact</a></li>
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
                <p class="editable">&copy; 2026 Bike Bratislava. All rights reserved.<span class="block mt-1.5 text-stone-600">Operated by NEW VELO s. r. o. &middot; MedveÄŹovej 1/A, 851 04 Bratislava &middot; IÄŚO: 48141291 &middot; IÄŚ DPH: SK2120069501</span></p>
                <div class="flex items-center space-x-6 md:space-x-8">
                    <a href="https://www.velocity.sk/" target="_blank" class="flex items-center space-x-3 opacity-70 hover:opacity-100 transition-opacity">
                        <span class="uppercase tracking-widest text-stone-400 hover:text-white transition-colors editable">velocity.sk</span>
                        <div class="h-4 w-[1px] bg-stone-700"></div>
                        <img loading="lazy" decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/pictures/logo-velocity-white.png" alt="Velocity" class="h-5 object-contain">
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

        // 4. Parallax scroll effect for backgrounds (translateY on inner wrapper â€” no white edge bleed)
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
                "<?php echo get_template_directory_uri(); ?>/assets/pictures/hero-waterfront.mp4",
                "<?php echo get_template_directory_uri(); ?>/assets/pictures/hero-sunrise.mp4",
                "<?php echo get_template_directory_uri(); ?>/assets/pictures/hero-golden-hour.mp4"
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

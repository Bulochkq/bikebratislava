// Initialize Lenis smooth scroll
const lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    infinite: false,
    smoothWheel: true
});

function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

// Keep Lenis updated when clicking internal links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            lenis.scrollTo(target);
        }
    });
});

lucide.createIcons();

// Smart scroll header (hides on scroll down ONLY ON MOBILE, reveals on scroll up)
let lastScrollY = window.scrollY;

window.addEventListener('scroll', () => {
    const header = document.getElementById('main-header');
    if (!header) return;
    
    const isMobile = window.innerWidth < 1024;
    
    if (isMobile && window.scrollY > lastScrollY && window.scrollY > 120) {
        // scrolling down on mobile only
        header.classList.add('-translate-y-full');
    } else {
        // scrolling up, or on desktop
        header.classList.remove('-translate-y-full');
    }
    
    // Find hero section to determine when to turn header solid black
    const heroSection = document.querySelector('section'); 
    const heroHeight = heroSection ? heroSection.offsetHeight : window.innerHeight;
    
    if (window.scrollY > heroHeight) {
        // Past the hero video: solid black
        header.classList.add('bg-brand-luxeDark', 'shadow-2xl', 'py-4');
        header.classList.remove('bg-black/40', 'backdrop-blur-md', 'bg-brand-luxeDark/95', 'py-6');
    } else if (window.scrollY > 50) {
        // Over the hero section: blurred glass
        header.classList.add('bg-black/40', 'backdrop-blur-md', 'shadow-2xl', 'py-4');
        header.classList.remove('bg-brand-luxeDark', 'bg-brand-luxeDark/95', 'py-6');
    } else {
        // At the very top: transparent
        header.classList.remove('bg-brand-luxeDark', 'bg-black/40', 'backdrop-blur-md', 'bg-brand-luxeDark/95', 'shadow-2xl', 'py-4');
        header.classList.add('py-6');
    }
    
    lastScrollY = window.scrollY;
});

// IntersectionObserver for reveal on scroll animations
const revealOptions = {
    root: null,
    threshold: 0.05,
    rootMargin: "0px"
};
const revealObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fade-in-up');
            entry.target.classList.remove('opacity-0');
            observer.unobserve(entry.target);
        }
    });
}, revealOptions);

document.querySelectorAll('.scroll-reveal').forEach(el => {
    el.classList.add('opacity-0');
    revealObserver.observe(el);
});

// Mobile Menu Toggle
let isMobileMenuOpen = false;

function openMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    isMobileMenuOpen = true;
    if (mobileMenu) mobileMenu.classList.add('is-open');
    document.documentElement.style.overflow = 'hidden';
    document.body.style.overflow = 'hidden';
    if (typeof lenis !== 'undefined') lenis.stop();
}

function closeMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    isMobileMenuOpen = false;
    if (mobileMenu) mobileMenu.classList.remove('is-open');
    document.documentElement.style.overflow = '';
    document.body.style.overflow = '';
    if (typeof lenis !== 'undefined') lenis.start();
}

// Load Universal Header
async function loadUniversalHeader() {
    const placeholder = document.getElementById('header-placeholder');
    if (!placeholder) return;
    
    try {
        const response = await fetch('header.html');
        if (response.ok) {
            const html = await response.text();
            placeholder.innerHTML = html;
            
            // Re-initialize lucide icons for the newly injected header
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
            
            // Re-bind Mobile Menu buttons
            const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
            const mobileMenuClose = document.getElementById('mobile-menu-close');
            if (mobileMenuToggle) mobileMenuToggle.addEventListener('click', openMobileMenu);
            if (mobileMenuClose) mobileMenuClose.addEventListener('click', closeMobileMenu);

            // Mobile "Tours & Rides" expandable sub-menu
            const toursToggle = document.getElementById('mobile-tours-toggle');
            const toursSub = document.getElementById('mobile-tours-sub');
            const toursChevron = document.getElementById('mobile-tours-chevron');
            if (toursToggle && toursSub) {
                toursToggle.addEventListener('click', () => {
                    const isOpen = toursSub.classList.toggle('max-h-96');
                    toursSub.classList.toggle('max-h-0', !isOpen);
                    toursToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                    if (toursChevron) toursChevron.classList.toggle('rotate-180', isOpen);
                    // While the sub-menu is open, pin the toggle to the top of the
                    // scrollable menu so it stays reachable as a quick close control
                    // (no scrolling back through a long menu).
                    if (isOpen) {
                        toursToggle.classList.add('sticky', 'top-0', 'z-10');
                        toursToggle.style.backgroundColor = '#0F0E0E';
                        setTimeout(() => toursToggle.scrollIntoView({ block: 'start', behavior: 'smooth' }), 80);
                    } else {
                        toursToggle.classList.remove('sticky', 'top-0', 'z-10');
                        toursToggle.style.backgroundColor = '';
                    }
                });
            }

            // Close the mobile menu whenever a link inside it is tapped
            document.querySelectorAll('#mobile-menu a[href]').forEach(link => {
                link.addEventListener('click', closeMobileMenu);
            });

            // Highlight active link
            const currentPage = window.location.pathname.split('/').pop() || 'index.html';
            document.querySelectorAll('.nav-link, .mobile-nav-link').forEach(link => {
                if (link.getAttribute('href') === currentPage) {
                    link.classList.remove('text-white', 'text-stone-400');
                    link.classList.add('text-brand-luxeGold');
                    if (link.classList.contains('nav-link')) {
                        link.classList.remove('border-transparent');
                        link.classList.add('border-brand-luxeGold');
                    }
                }
            });

            // Force scroll event to apply correct header styling immediately after load
            // (prevents transparent header on page refresh when already scrolled down)
            window.dispatchEvent(new Event('scroll'));
        }
    } catch (e) {
        console.error('Failed to load header:', e);
    }
}

document.addEventListener('DOMContentLoaded', loadUniversalHeader);

// Parallax scroll effect for backgrounds
window.addEventListener('scroll', () => {
    const scroll = window.scrollY;
    if (window.innerWidth > 768) {
        // Hero image parallax
        const heroBg = document.getElementById('hero-img');
        if (heroBg) {
            heroBg.style.transform = `translateY(${scroll * 0.3}px) scale(1.1)`;
        }

        // Inner parallax background wrappers
        document.querySelectorAll('.parallax-bg').forEach(bg => {
            const section = bg.closest('.parallax-section');
            if (!section) return;
            const rect = section.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                const scrollProgress = (window.innerHeight - rect.top) / (window.innerHeight + section.offsetHeight);
                const percentOffset = (scrollProgress - 0.5) * -15; // range: -7.5% to +7.5%
                bg.style.transform = `translateY(${percentOffset}%)`;
            }
        });
    } else {
        // Reset transforms on mobile to prevent images from getting stuck if resized
        const heroBg = document.getElementById('hero-img');
        if (heroBg && heroBg.style.transform !== 'none' && heroBg.style.transform !== '') {
            heroBg.style.transform = 'none';
        }
        document.querySelectorAll('.parallax-bg').forEach(bg => {
            if (bg.style.transform !== 'none' && bg.style.transform !== '') {
                bg.style.transform = 'none';
            }
        });
    }
});

/* =====================================================================
   Sitewide SEO injection — favicon + Organization/LocalBusiness JSON-LD.
   Injected once per page so it stays in a single place (DRY), the same
   way the universal header is loaded.
   ===================================================================== */
(function injectSeo() {
    // Favicon (browsers + Google search result icon) + Apple touch icon.
    if (!document.querySelector('link[rel~="icon"]')) {
        const ico = document.createElement('link');
        ico.rel = 'icon';
        ico.href = 'favicon.ico';
        ico.type = 'image/x-icon';
        document.head.appendChild(ico);

        const png = document.createElement('link');
        png.rel = 'icon';
        png.type = 'image/png';
        png.setAttribute('sizes', '32x32');
        png.href = 'favicon-32.png';
        document.head.appendChild(png);

        const apple = document.createElement('link');
        apple.rel = 'apple-touch-icon';
        apple.href = 'apple-touch-icon.png';
        document.head.appendChild(apple);
    }

    // Structured data for the business (Knowledge Panel + local SEO).
    if (!document.getElementById('ld-org')) {
        const ld = document.createElement('script');
        ld.type = 'application/ld+json';
        ld.id = 'ld-org';
        ld.textContent = JSON.stringify({
            "@context": "https://schema.org",
            "@type": ["LocalBusiness", "TravelAgency"],
            "name": "Bike Bratislava",
            "description": "Guided cycling tours, road rides, gravel adventures and custom cycling experiences in Bratislava and Central Europe.",
            "url": "https://bikebratislava.com/",
            "image": "https://bikebratislava.com/pictures/devin-sunset.png",
            "email": "silvia@velocity.sk",
            "telephone": "+421903214013",
            "areaServed": "Bratislava, Slovakia",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Bratislava",
                "addressCountry": "SK"
            },
            "parentOrganization": {
                "@type": "Organization",
                "name": "Velocity",
                "url": "https://www.velocity.sk/"
            },
            "sameAs": [
                "https://www.instagram.com/velocity_cyklo/",
                "https://www.facebook.com/VeloCity.sk/",
                "https://www.velocity.sk/"
            ]
        });
        document.head.appendChild(ld);
    }
})();

/* =====================================================================
   Cookie consent (GDPR / ePrivacy) + Google Consent Mode v2.
   - No analytics cookies OR network requests fire until the visitor
     opts in (strict EU-compliant: GA is only loaded after consent).
   - To enable Google Analytics: set GA_MEASUREMENT_ID to your GA4 id
     (e.g. 'G-XXXXXXX'). Nothing else is required.
   - Google Search Console verification (meta tag / DNS / file) does not
     set cookies, so it needs no consent and can be added directly.
   ===================================================================== */
(function cookieConsent() {
    const GA_MEASUREMENT_ID = ''; // <-- put your GA4 ID here, e.g. 'G-ABC123XYZ'
    const STORAGE_KEY = 'bb-cookie-consent';
    const POLICY_COOKIES = 'privacy.html#cookies';
    const POLICY_PRIVACY = 'privacy.html';

    // --- Google Consent Mode v2 defaults (must run before GA loads) ---
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    window.gtag = window.gtag || gtag;
    gtag('consent', 'default', {
        ad_storage: 'denied',
        ad_user_data: 'denied',
        ad_personalization: 'denied',
        analytics_storage: 'denied',
        functionality_storage: 'granted',
        security_storage: 'granted',
        wait_for_update: 500
    });

    let gaLoaded = false;
    function loadGA() {
        if (gaLoaded || !GA_MEASUREMENT_ID) return;
        gaLoaded = true;
        const s = document.createElement('script');
        s.async = true;
        s.src = 'https://www.googletagmanager.com/gtag/js?id=' + GA_MEASUREMENT_ID;
        document.head.appendChild(s);
        gtag('js', new Date());
        gtag('config', GA_MEASUREMENT_ID, { anonymize_ip: true });
    }

    function readConsent() {
        try { return JSON.parse(localStorage.getItem(STORAGE_KEY)); } catch (e) { return null; }
    }
    function applyConsent(consent) {
        gtag('consent', 'update', { analytics_storage: consent.analytics ? 'granted' : 'denied' });
        if (consent.analytics) loadGA();
    }
    function saveConsent(analytics) {
        const consent = { necessary: true, analytics: !!analytics, ts: Date.now(), v: 1 };
        try { localStorage.setItem(STORAGE_KEY, JSON.stringify(consent)); } catch (e) {}
        applyConsent(consent);
    }

    // --- UI ---------------------------------------------------------
    function buildUI() {
        const wrap = document.createElement('div');
        wrap.id = 'cookie-consent-root';
        wrap.innerHTML = `
        <div id="cc-banner" style="display:none; background:#0A0A0A" class="fixed bottom-0 left-0 right-0 z-[120] border-t border-[#E31C25]/50 shadow-2xl" data-cc-region>
            <div class="max-w-7xl mx-auto px-6 py-5 flex flex-col lg:flex-row lg:items-center gap-5">
                <p class="flex-1 text-stone-300 text-xs leading-relaxed font-light tracking-wide">
                    We use necessary cookies to run this site and, with your consent, analytics cookies (Google Analytics) to understand how it is used.
                    See our <a href="${POLICY_COOKIES}" target="_blank" rel="noopener" class="text-[#E31C25] hover:underline font-medium">Cookie Policy</a>
                    and <a href="${POLICY_PRIVACY}" target="_blank" rel="noopener" class="text-[#E31C25] hover:underline font-medium">Privacy Policy</a>.
                </p>
                <div class="flex flex-wrap items-center gap-3 shrink-0">
                    <button data-cc="reject" class="px-5 py-2.5 text-[10px] font-semibold tracking-[0.2em] uppercase text-stone-300 border border-white/20 hover:border-white/50 hover:text-white transition-colors duration-300">Reject all</button>
                    <button data-cc="settings" class="px-5 py-2.5 text-[10px] font-semibold tracking-[0.2em] uppercase text-stone-300 border border-white/20 hover:border-white/50 hover:text-white transition-colors duration-300">Settings</button>
                    <button data-cc="accept" class="px-6 py-2.5 text-[10px] font-semibold tracking-[0.2em] uppercase text-white bg-[#E31C25] hover:bg-[#B0141A] transition-colors duration-300">Accept all</button>
                </div>
            </div>
        </div>

        <div id="cc-modal" style="display:none" class="fixed inset-0 z-[130] flex items-center justify-center p-4" data-cc-region>
            <div data-cc="backdrop" class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>
            <div style="background:#0A0A0A" class="relative w-full max-w-lg border border-white/10 shadow-2xl max-h-[90vh] overflow-y-auto" data-lenis-prevent>
                <div class="flex items-center justify-between px-7 py-5 border-b border-white/10">
                    <h3 class="font-serif text-xl font-light text-white tracking-wide">Cookie Preferences</h3>
                    <button data-cc="close" aria-label="Close" class="text-stone-400 hover:text-[#E31C25] transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                    </button>
                </div>
                <div class="px-7 py-6 space-y-6">
                    <p class="text-stone-400 text-xs font-light leading-relaxed">Choose which cookies you allow. Necessary cookies are always on because the site cannot work without them.</p>
                    <div class="flex items-start justify-between gap-4 border border-white/10 p-4">
                        <div>
                            <span class="block text-white text-sm font-medium">Strictly necessary</span>
                            <span class="block text-stone-500 text-xs font-light mt-1">Required for core functionality. Always active.</span>
                        </div>
                        <span class="text-[10px] uppercase tracking-[0.2em] text-[#E31C25] font-semibold mt-1">Always on</span>
                    </div>
                    <div class="flex items-start justify-between gap-4 border border-white/10 p-4">
                        <div>
                            <span class="block text-white text-sm font-medium">Analytics</span>
                            <span class="block text-stone-500 text-xs font-light mt-1">Google Analytics — anonymous traffic statistics.</span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer mt-1 shrink-0">
                            <input type="checkbox" id="cc-analytics" class="sr-only peer">
                            <span class="w-11 h-6 bg-stone-700 peer-checked:bg-[#E31C25] transition-colors duration-300 relative after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:h-5 after:w-5 after:transition-all after:duration-300 peer-checked:after:translate-x-5"></span>
                        </label>
                    </div>
                </div>
                <div class="px-7 py-5 border-t border-white/10 flex flex-col sm:flex-row gap-3 sm:justify-end">
                    <button data-cc="save" class="px-6 py-3 text-[10px] font-semibold tracking-[0.2em] uppercase text-stone-300 border border-white/20 hover:border-white/50 hover:text-white transition-colors duration-300">Save preferences</button>
                    <button data-cc="accept" class="px-6 py-3 text-[10px] font-semibold tracking-[0.2em] uppercase text-white bg-[#E31C25] hover:bg-[#B0141A] transition-colors duration-300">Accept all</button>
                </div>
            </div>
        </div>`;
        document.body.appendChild(wrap);
        return wrap;
    }

    function init() {
        const root = buildUI();
        const banner = root.querySelector('#cc-banner');
        const modal = root.querySelector('#cc-modal');
        const analyticsToggle = root.querySelector('#cc-analytics');

        const showBanner = () => { banner.style.display = 'block'; };
        const hideBanner = () => { banner.style.display = 'none'; };
        const openModal = () => {
            const stored = readConsent();
            analyticsToggle.checked = stored ? !!stored.analytics : false;
            modal.style.display = 'flex';
        };
        const closeModal = () => { modal.style.display = 'none'; };

        root.addEventListener('click', (e) => {
            const action = e.target.closest('[data-cc]')?.getAttribute('data-cc');
            if (!action) return;
            if (action === 'accept') { saveConsent(true); hideBanner(); closeModal(); }
            else if (action === 'reject') { saveConsent(false); hideBanner(); closeModal(); }
            else if (action === 'settings') { openModal(); }
            else if (action === 'save') { saveConsent(analyticsToggle.checked); hideBanner(); closeModal(); }
            else if (action === 'close' || action === 'backdrop') { closeModal(); }
        });

        // Expose a global so a footer/menu link can reopen preferences anytime
        // (required so consent can be withdrawn as easily as it was given).
        window.openCookieSettings = openModal;

        // Add discreet "Privacy Policy" + "Cookie Settings" controls to each footer.
        document.querySelectorAll('footer').forEach(footer => {
            const copy = Array.from(footer.querySelectorAll('p')).find(p => /rights reserved/i.test(p.textContent));
            if (!copy || footer.querySelector('[data-cc-footer]')) return;
            const bar = document.createElement('div');
            bar.setAttribute('data-cc-footer', '');
            bar.className = 'flex items-center gap-4 mt-2 text-[10px] tracking-widest uppercase text-stone-500';

            const privacy = document.createElement('a');
            privacy.href = 'privacy.html';
            privacy.textContent = 'Privacy Policy';
            privacy.className = 'hover:text-[#E31C25] transition-colors';

            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = 'Cookie Settings';
            btn.className = 'hover:text-[#E31C25] transition-colors';
            btn.addEventListener('click', openModal);

            bar.appendChild(privacy);
            bar.appendChild(btn);
            copy.insertAdjacentElement('afterend', bar);
        });

        // Apply existing choice, or surface the banner on first visit.
        const stored = readConsent();
        if (stored) applyConsent(stored);
        else showBanner();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();

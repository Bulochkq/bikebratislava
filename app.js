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
    }
});

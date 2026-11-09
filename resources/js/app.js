import './bootstrap';

const header = document.getElementById('siteHeader');
const toggle = document.getElementById('navToggle');
const nav = document.getElementById('primaryNav');

if (header) {
    const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 8);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
}

if (toggle && nav) {
    const closeMenu = () => {
        nav.classList.remove('is-open');
        toggle.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'Buka menu');
    };

    toggle.addEventListener('click', () => {
        const open = nav.classList.toggle('is-open');
        toggle.classList.toggle('is-open', open);
        toggle.setAttribute('aria-expanded', String(open));
        toggle.setAttribute('aria-label', open ? 'Tutup menu' : 'Buka menu');
    });

    nav.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));

    window.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeMenu();
        }
    });
}

const revealItems = document.querySelectorAll('[data-reveal]');

if (revealItems.length) {
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
        );

        revealItems.forEach((item) => observer.observe(item));
    } else {
        revealItems.forEach((item) => item.classList.add('is-visible'));
    }
}

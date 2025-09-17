/**
 * Animation utilities for smooth scrolling, counters, and intersection observers
 */

export class AnimationManager {
    constructor() {
        this.init();
    }

    init() {
        this.initSmoothScrolling();
        this.initCounterAnimations();
        this.initSectionAnimations();
        this.initParallax();
    }

    /**
     * Initialize smooth scrolling for anchor links
     */
    initSmoothScrolling() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    /**
     * Animate counter numbers when they come into view
     */
    initCounterAnimations() {
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.textContent.replace(/[,+]/g, ''));
                    this.animateCounter(counter, target);
                    counterObserver.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.counter').forEach(counter => {
            counterObserver.observe(counter);
        });
    }

    /**
     * Animate a counter from 0 to target value
     */
    animateCounter(element, target) {
        let count = 0;
        const increment = target / 60; // 60 frames for smooth animation
        const timer = setInterval(() => {
            count += increment;
            if (count >= target) {
                element.textContent = target.toLocaleString() + '+';
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(count).toLocaleString() + '+';
            }
        }, 16); // ~60fps
    }

    /**
     * Initialize fade-in animations for sections
     */
    initSectionAnimations() {
        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                    entry.target.classList.remove('opacity-0', 'translate-y-8');
                }
            });
        }, { 
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        });

        document.querySelectorAll('[data-animate]').forEach(section => {
            section.classList.add('opacity-0', 'translate-y-8', 'transition-all', 'duration-700');
            sectionObserver.observe(section);
        });
    }

    /**
     * Initialize parallax effect for hero section (minimal for performance)
     */
    initParallax() {
        const hero = document.querySelector('[data-parallax]');
        if (!hero) return;

        let ticking = false;

        const updateParallax = () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.3; // Reduced for better performance
            hero.style.transform = `translateY(${rate}px)`;
            ticking = false;
        };

        const requestParallax = () => {
            if (!ticking) {
                requestAnimationFrame(updateParallax);
                ticking = true;
            }
        };

        // Use passive listener for better performance
        window.addEventListener('scroll', requestParallax, { passive: true });
    }

    /**
     * Add entrance animation to element
     */
    static addEntranceAnimation(element, animation = 'fade-in-up') {
        element.classList.add(`animate-${animation}`);
    }

    /**
     * Remove all animations from element
     */
    static removeAnimations(element) {
        const animations = [
            'animate-fade-in', 'animate-fade-in-up', 'animate-fade-in-down',
            'animate-slide-in-left', 'animate-slide-in-right', 'animate-scale-in'
        ];
        element.classList.remove(...animations);
    }
}

// Auto-initialization removed - handled by app.js
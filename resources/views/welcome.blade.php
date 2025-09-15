<x-app-layout>
    {{-- Configuration for showing/hiding sections --}}
    @php
        $sections = [
            'hero' => $showHero ?? true,
            'focus' => $showFocus ?? true,
            'events' => $showEvents ?? true,
            'footprint' => $showFootprint ?? true,
            'clubs' => $showClubs ?? true,
            'teams' => $showTeams ?? true,
            'partners' => $showPartners ?? true,
            'testimonials' => $showTestimonials ?? true,
            'contact' => $showContact ?? true,
        ];
    @endphp

    {{-- Hero Section --}}
    @if($sections['hero'])
        @include('sections.hero')
    @endif

    {{-- Our Focus Section --}}
    @if($sections['focus'])
        @include('sections.focus')
    @endif

    {{-- Events Calendar Section --}}
    @if($sections['events'])
        @include('sections.events', ['upcomingEvents' => $upcomingEvents ?? collect()])
    @endif

    {{-- Our Footprint Section --}}
    @if($sections['footprint'])
        @include('sections.footprint', ['stats' => $stats ?? []])
    @endif

    {{-- Our Clubs Section --}}
    @if($sections['clubs'])
        @include('sections.clubs')
    @endif

    {{-- Our Teams Section --}}
    @if($sections['teams'])
        @include('sections.teams')
    @endif

    {{-- Our Partners Section --}}
    @if($sections['partners'])
        @include('sections.partners', ['partners' => $partners ?? collect()])
    @endif

    {{-- Member Testimonials Section --}}
    @if($sections['testimonials'])
        @include('sections.testimonials', ['testimonials' => $testimonials ?? collect()])
    @endif

    {{-- Contact Section --}}
    @if($sections['contact'])
        @include('sections.contact')
    @endif

    {{-- JavaScript for animations and interactions --}}
    @push('scripts')
        <script>
            // Smooth scrolling for anchor links
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

            // Counter animation for statistics
            function animateCounter(element, target) {
                let count = 0;
                const increment = target / 100;
                const timer = setInterval(() => {
                    count += increment;
                    if (count >= target) {
                        element.textContent = target.toLocaleString() + '+';
                        clearInterval(timer);
                    } else {
                        element.textContent = Math.floor(count).toLocaleString() + '+';
                    }
                }, 20);
            }

            // Intersection Observer for counter animation
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.textContent.replace(/[,+]/g, ''));
                        animateCounter(counter, target);
                        counterObserver.unobserve(counter);
                    }
                });
            });

            // Observe all counter elements
            document.querySelectorAll('.counter').forEach(counter => {
                counterObserver.observe(counter);
            });

            // Parallax effect for hero section
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const hero = document.querySelector('#hero');
                if (hero) {
                    hero.style.transform = `translateY(${scrolled * 0.5}px)`;
                }
            });

            // Add fade-in animation for sections
            const sectionObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('section').forEach(section => {
                sectionObserver.observe(section);
            });
        </script>
    @endpush

    {{-- Custom CSS Animations --}}
    @push('styles')
        <style>
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fadeIn 0.8s ease-out forwards;
            }

            /* Custom Tailwind animations */
            .animate-float {
                animation: float 6s ease-in-out infinite;
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-20px); }
            }

            .animate-slide-in-left {
                animation: slideInLeft 1s ease-out;
            }

            @keyframes slideInLeft {
                from { transform: translateX(-100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }

            .animate-slide-in-right {
                animation: slideInRight 1s ease-out;
            }

            @keyframes slideInRight {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }

            /* Gradient text effect */
            .text-gradient {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
        </style>
    @endpush
</x-app-layout>
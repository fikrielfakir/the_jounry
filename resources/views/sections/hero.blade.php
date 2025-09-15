{{-- Hero Section --}}
<section id="hero" class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900 overflow-hidden">
    {{-- Background Image Overlay --}}
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2069&q=80')] bg-cover bg-center bg-no-repeat"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-blue-900/70 via-purple-900/70 to-indigo-900/70"></div>
    
    {{-- Animated Background Elements --}}
    <div class="absolute top-20 left-20 w-32 h-32 bg-white/10 rounded-full animate-float"></div>
    <div class="absolute top-40 right-32 w-20 h-20 bg-blue-400/20 rounded-full animate-bounce delay-1000"></div>
    <div class="absolute bottom-32 left-1/4 w-24 h-24 bg-purple-400/20 rounded-full animate-pulse delay-2000"></div>
    
    {{-- Hero Content --}}
    <div class="relative z-10 text-center text-white max-w-6xl mx-auto px-4">
        <h1 class="font-playfair text-7xl md:text-9xl font-bold mb-6 leading-tight animate-slide-in-left">
            Association
        </h1>
        <h2 class="font-playfair text-5xl md:text-7xl font-bold mb-8 text-blue-200 animate-slide-in-right delay-500">
            THE JOURNEY
        </h2>
        <p class="text-2xl md:text-3xl mb-12 font-light max-w-4xl mx-auto leading-relaxed opacity-0 animate-fade-in delay-1000">
            Awakening Through Adventure
        </p>
        <a href="#discover" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-12 py-4 rounded-full font-semibold text-xl transition-all duration-500 transform hover:scale-110 shadow-2xl hover:shadow-blue-500/50 opacity-0 animate-fade-in delay-1500">
            <i class="fas fa-compass mr-3"></i>
            Our Story
        </a>
    </div>
    
    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce">
        <div class="flex flex-col items-center space-y-2">
            <span class="text-sm font-light">Scroll Down</span>
            <i class="fas fa-chevron-down text-3xl"></i>
        </div>
    </div>
</section>
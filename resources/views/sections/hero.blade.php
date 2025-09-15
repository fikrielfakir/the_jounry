{{-- Hero Section --}}
<section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden">
    {{-- Background Image with Architecture --}}
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1548013146-72479768bada?ixlib=rb-4.0.3&auto=format&fit=crop&w=2076&q=80')] bg-cover bg-center bg-no-repeat"></div>
    
    {{-- Navy Blue Overlay with Gradient --}}
    <div class="absolute inset-0 bg-gradient-to-br from-navy-950/80 via-navy-900/70 to-navy-800/60"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-navy-950/40 via-transparent to-transparent"></div>
    
    {{-- Bottom Gradient --}}
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-navy-950/90 to-transparent"></div>
    
    {{-- Hero Content --}}
    <div class="relative z-10 text-center text-white max-w-4xl mx-auto px-4 pt-20">
        {{-- Association Label --}}
        <div class="mb-4">
            <p class="text-beige-200 text-lg font-light tracking-widest uppercase">
                Association
            </p>
        </div>
        
        {{-- Main Title --}}
        <h1 class="font-playfair text-5xl md:text-7xl lg:text-9xl font-bold mb-6 leading-tight tracking-wide text-white">
            THE JOURNEY
        </h1>
        
        {{-- Subtitle --}}
        <p class="text-xl md:text-2xl mb-12 font-light text-beige-100 max-w-2xl mx-auto leading-relaxed">
            Awakening Through Adventure
        </p>
        
        {{-- Call to Action Button --}}
        <div class="mb-16">
            <a href="#discover" class="inline-block bg-navy-950/80 hover:bg-navy-950 text-white px-8 py-4 rounded-lg font-medium text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl border border-beige-500/20 hover:border-beige-500/40 backdrop-blur-sm">
                Our Story
            </a>
        </div>
    </div>
    
</section>
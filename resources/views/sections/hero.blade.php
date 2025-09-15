{{-- Hero Section --}}
<section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden">
    {{-- Background Image with Architecture --}}
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1548013146-72479768bada?ixlib=rb-4.0.3&auto=format&fit=crop&w=2076&q=80')] bg-cover bg-center bg-no-repeat"></div>
    
    {{-- Navy Blue Overlay with Gradient --}}
    <div class="absolute inset-0 bg-gradient-to-br from-navy-950/80 via-navy-900/70 to-navy-800/60"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-navy-950/40 via-transparent to-transparent"></div>
    
    {{-- Elegant Pattern Overlay (Bottom) --}}
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-navy-950/90 to-transparent"></div>
    <div class="absolute bottom-0 left-0 right-0 h-16 bg-repeat-x opacity-20" style="background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 100 20&quot;><polygon points=&quot;0,20 50,0 100,20&quot; fill=&quot;%23d8c18d&quot;/></svg>')"></div>
    
    {{-- Hero Content --}}
    <div class="relative z-10 text-center text-white max-w-4xl mx-auto px-4 pt-20">
        {{-- Association Label --}}
        <div class="mb-4">
            <p class="text-beige-200 text-lg font-light tracking-widest uppercase">
                Association
            </p>
        </div>
        
        {{-- Main Title --}}
        <h1 class="font-playfair text-6xl md:text-8xl lg:text-9xl font-bold mb-6 leading-tight tracking-wide text-white">
            THE JOURNEY
        </h1>
        
        {{-- Subtitle --}}
        <p class="text-xl md:text-2xl mb-12 font-light text-beige-100 max-w-2xl mx-auto leading-relaxed">
            Where adventure meets enlightenment
        </p>
        
        {{-- Call to Action Button --}}
        <div class="mb-16">
            <a href="#discover" class="inline-block bg-navy-950/80 hover:bg-navy-950 text-white px-8 py-4 rounded-lg font-medium text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl border border-beige-500/20 hover:border-beige-500/40 backdrop-blur-sm">
                Our Story
            </a>
        </div>
    </div>
    
    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-beige-200 animate-bounce">
        <div class="flex flex-col items-center space-y-2">
            <span class="text-sm font-light">Scroll Down</span>
            <i class="fas fa-chevron-down text-xl"></i>
        </div>
    </div>
</section>
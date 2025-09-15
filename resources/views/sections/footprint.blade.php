    <!-- Our Footprint Section -->
    <section id="footprint" class="py-24 bg-gradient-to-br from-gray-900 to-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="font-playfair text-5xl md:text-6xl font-bold mb-6">Our Footprint</h2>
                <p class="text-xl text-blue-200 max-w-4xl mx-auto leading-relaxed">
                    Measuring our impact and celebrating the positive change we've created together in communities worldwide.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <!-- Participants -->
                <div class="text-center group">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-2xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-users text-3xl text-white"></i>
                    </div>
                    <div class="font-playfair text-5xl font-bold text-blue-300 mb-3 counter">{{ number_format($stats['participants'] ?? 1250) }}+</div>
                    <div class="text-blue-200 text-lg font-semibold">Participants</div>
                </div>
                
                <!-- Trees Planted -->
                <div class="text-center group">
                    <div class="w-24 h-24 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-2xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-tree text-3xl text-white"></i>
                    </div>
                    <div class="font-playfair text-5xl font-bold text-green-300 mb-3 counter">{{ number_format($stats['trees_planted'] ?? 5000) }}+</div>
                    <div class="text-blue-200 text-lg font-semibold">Trees Planted</div>
                </div>
                
                <!-- Cultural Collaborations -->
                <div class="text-center group">
                    <div class="w-24 h-24 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-2xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-handshake text-3xl text-white"></i>
                    </div>
                    <div class="font-playfair text-5xl font-bold text-purple-300 mb-3 counter">{{ number_format($stats['cultural_collaborations'] ?? 150) }}+</div>
                    <div class="text-blue-200 text-lg font-semibold">Cultural Collaborations</div>
                </div>
                
                <!-- Community Projects -->
                <div class="text-center group">
                    <div class="w-24 h-24 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-2xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-project-diagram text-3xl text-white"></i>
                    </div>
                    <div class="font-playfair text-5xl font-bold text-orange-300 mb-3 counter">{{ number_format($stats['community_projects'] ?? 75) }}+</div>
                    <div class="text-blue-200 text-lg font-semibold">Community Projects</div>
                </div>
            </div>
        </div>
    </section>
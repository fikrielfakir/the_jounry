  <!-- Our Clubs Section -->
    <section id="clubs" class="py-24 bg-gradient-to-br from-white to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="font-playfair text-5xl md:text-6xl font-bold text-gray-900 mb-6">Our Clubs</h2>
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Join vibrant communities of like-minded adventurers and discover Morocco through our specialized clubs and activities.
                </p>
            </div>
            
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-16 items-center">
                <!-- Map -->
                <div class="relative bg-gradient-to-br from-blue-100 to-indigo-200 rounded-3xl p-12 h-96 shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-purple-500/10 rounded-3xl"></div>
                    <div class="relative z-10 h-full flex items-center justify-center">
                        <!-- Morocco Map Outline -->
                        <svg viewBox="0 0 400 300" class="w-full h-full text-blue-600 opacity-80">
                            <path d="M50 150 Q100 100 150 120 Q200 110 250 130 Q300 140 350 160 Q340 200 300 220 Q250 240 200 230 Q150 225 100 210 Q70 180 50 150 Z" fill="currentColor" stroke="currentColor" stroke-width="2"/>
                            <!-- Cities markers -->
                            <circle cx="120" cy="160" r="4" fill="#ef4444" class="animate-pulse"/>
                            <circle cx="200" cy="180" r="4" fill="#ef4444" class="animate-pulse"/>
                            <circle cx="280" cy="170" r="4" fill="#ef4444" class="animate-pulse"/>
                        </svg>
                    </div>
                    <div class="absolute bottom-4 left-6 text-blue-800">
                        <p class="font-bold text-lg">Morocco</p>
                        <p class="text-sm opacity-80">Our Clubs Network</p>
                    </div>
                </div>
                
                <!-- Club Cards -->
                <div class="space-y-8">
                    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl p-10 text-white shadow-2xl transform hover:scale-105 transition-transform duration-300">
                        <div class="flex items-center mb-8">
                            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mr-6 shadow-xl">
                                <i class="fas fa-graduation-cap text-3xl text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold">Student Club</h3>
                                <p class="text-blue-200">University Network</p>
                            </div>
                        </div>
                        <p class="mb-8 text-blue-100 leading-relaxed text-lg">
                            Empowering students through educational adventures, cultural exchanges, and leadership development programs across Morocco.
                        </p>
                        <button class="bg-white text-blue-600 px-8 py-4 rounded-full font-bold hover:bg-blue-50 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Join a Club
                        </button>
                    </div>

                    <div class="bg-gradient-to-r from-green-500 to-teal-600 rounded-3xl p-10 text-white shadow-2xl transform hover:scale-105 transition-transform duration-300">
                        <div class="flex items-center mb-8">
                            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mr-6 shadow-xl">
                                <i class="fas fa-camera text-3xl text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="text-3xl font-bold">Photography Club</h3>
                                <p class="text-green-200">Visual Storytellers</p>
                            </div>
                        </div>
                        <p class="mb-8 text-green-100 leading-relaxed text-lg">
                            Capturing the beauty of Moroccan landscapes, culture, and people through the lens of passionate photographers.
                        </p>
                        <button class="bg-white text-green-600 px-8 py-4 rounded-full font-bold hover:bg-green-50 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            Start Shooting
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
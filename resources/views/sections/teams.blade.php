 <!-- Our Teams Section -->
    <section class="py-24 bg-gradient-to-br from-gray-100 to-blue-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="font-playfair text-5xl md:text-6xl font-bold text-gray-900 mb-6">Our Teams</h2>
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Meet the passionate individuals who make our mission possible through dedication, creativity, and leadership.
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-12">
                <!-- Team Member 1 - President -->
                <div class="text-center group">
                    <div class="relative mb-6">
                        <div class="w-48 h-48 bg-gradient-to-br from-blue-600 to-blue-800 rounded-full mx-auto flex items-center justify-center text-white shadow-2xl group-hover:scale-110 transition-all duration-300">
                            <div class="text-center">
                                <div class="font-bold text-lg">ABDERRAHIM</div>
                                <div class="font-bold text-lg">AZARKAN</div>
                                <div class="text-sm mt-2 text-blue-200">President</div>
                            </div>
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 bg-white rounded-full p-3 shadow-xl">
                            <div class="flex space-x-2">
                                <a href="#" class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700 transition-colors">
                                    <i class="fab fa-linkedin text-sm"></i>
                                </a>
                                <a href="#" class="w-8 h-8 bg-blue-400 rounded-full flex items-center justify-center text-white hover:bg-blue-500 transition-colors">
                                    <i class="fab fa-twitter text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Team Members 2-8 (Placeholder) -->
                @for($i = 2; $i <= 8; $i++)
                    <div class="text-center group">
                        <div class="w-48 h-48 bg-gradient-to-br from-gray-200 to-gray-300 rounded-full mx-auto mb-6 flex items-center justify-center shadow-xl group-hover:scale-110 transition-all duration-300">
                            <i class="fas fa-user text-4xl text-gray-400"></i>
                        </div>
                        <div class="text-gray-500">
                            <div class="font-bold">Team Member</div>
                            <div class="text-sm">Position</div>
                        </div>
                    </div>
                @endfor
            </div>
            
            <!-- Navigation dots -->
            <div class="flex justify-center mt-16 space-x-3">
                <div class="w-4 h-4 bg-blue-600 rounded-full shadow-lg"></div>
                <div class="w-4 h-4 bg-gray-300 rounded-full hover:bg-gray-400 cursor-pointer transition-colors"></div>
                <div class="w-4 h-4 bg-gray-300 rounded-full hover:bg-gray-400 cursor-pointer transition-colors"></div>
                <div class="w-4 h-4 bg-gray-300 rounded-full hover:bg-gray-400 cursor-pointer transition-colors"></div>
            </div>
        </div>
    </section>

 <!-- Our Partners Section -->
    <section id="partners" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="font-playfair text-5xl md:text-6xl font-bold text-gray-900 mb-6">Our Partners</h2>
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Building strong relationships with organizations that share our vision for sustainable development and cultural exchange.
                </p>
            </div>
            
            @if($partners->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-4 gap-12 items-center">
                    @foreach($partners as $partner)
                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 h-40 flex items-center justify-center hover:shadow-xl transition-all duration-300 transform hover:scale-105 group">
                            <div class="text-center text-gray-600 group-hover:text-blue-600 transition-colors">
                                @if($partner->logo)
                                    <img src="{{ $partner->logo }}" alt="{{ $partner->name }}" class="max-h-20 max-w-full object-contain">
                                @else
                                    <div class="font-bold text-lg mb-2">{{ $partner->name }}</div>
                                    @if($partner->description)
                                        <div class="text-sm opacity-80">{{ Str::limit($partner->description, 40) }}</div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl py-16 px-8">
                    <i class="fas fa-handshake text-6xl text-gray-300 mb-6"></i>
                    <h4 class="text-2xl font-bold text-gray-500 mb-2">Partnership Opportunities</h4>
                    <p class="text-gray-400">We're always looking for new collaborations!</p>
                </div>
            @endif
            
            <!-- Navigation dots -->
            <div class="flex justify-center mt-16 space-x-3">
                <div class="w-4 h-4 bg-blue-600 rounded-full shadow-lg"></div>
                <div class="w-4 h-4 bg-gray-300 rounded-full hover:bg-gray-400 cursor-pointer transition-colors"></div>
                <div class="w-4 h-4 bg-gray-300 rounded-full hover:bg-gray-400 cursor-pointer transition-colors"></div>
                <div class="w-4 h-4 bg-gray-300 rounded-full hover:bg-gray-400 cursor-pointer transition-colors"></div>
            </div>
        </div>
    </section>
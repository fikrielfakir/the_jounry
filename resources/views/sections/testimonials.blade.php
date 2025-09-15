 <!-- Member Testimonials Section -->
    <section class="py-24 bg-gradient-to-br from-blue-50 to-indigo-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="font-playfair text-5xl md:text-6xl font-bold text-gray-900 mb-6">Member Testimonials</h2>
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Hear from our community members about their transformative experiences and adventures with The Journey Association.
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                @forelse($testimonials as $testimonial)
                    <div class="bg-white rounded-3xl p-10 shadow-2xl hover:shadow-3xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="flex items-start space-x-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-purple-600 rounded-full flex-shrink-0 flex items-center justify-center shadow-lg">
                                @if($testimonial->user && $testimonial->user->avatar)
                                    <img src="{{ $testimonial->user->avatar }}" alt="{{ $testimonial->user->name }}" class="w-16 h-16 rounded-full object-cover">
                                @else
                                    <i class="fas fa-user text-white text-xl"></i>
                                @endif
                            </div>
                            <div class="flex-1">
                                <div class="mb-6">
                                    <h4 class="font-bold text-xl text-gray-900">{{ $testimonial->user ? $testimonial->user->name : 'Anonymous' }}</h4>
                                    <p class="text-blue-600 font-semibold">{{ $testimonial->user_title ?? 'Member' }}</p>
                                </div>
                                <blockquote class="text-gray-700 italic text-lg leading-relaxed">
                                    "{{ $testimonial->content }}"
                                </blockquote>
                                <div class="flex text-yellow-400 mt-4">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star text-sm"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center bg-white rounded-3xl py-16 px-8 shadow-2xl">
                        <i class="fas fa-quote-right text-6xl text-gray-300 mb-6"></i>
                        <h4 class="text-2xl font-bold text-gray-500 mb-2">Share Your Story</h4>
                        <p class="text-gray-400">Be the first to share your experience with our community!</p>
                    </div>
                @endforelse
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
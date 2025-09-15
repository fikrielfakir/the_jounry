{{-- Events Calendar Section --}}
<section id="events" class="py-24 bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="font-playfair text-5xl md:text-6xl font-bold text-gray-900 mb-6">Events Calendar</h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Discover upcoming adventures, cultural experiences, and community gatherings that will inspire and transform your journey.
            </p>
        </div>
        
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-16 items-start">
            {{-- Calendar --}}
            <div class="bg-white rounded-3xl shadow-2xl p-8 transform hover:scale-105 transition-transform duration-300">
                <h3 class="font-playfair text-3xl font-bold text-gray-900 mb-8 text-center">Available Events</h3>
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8">
                    <div class="text-center mb-6">
                        <h4 class="text-2xl font-bold text-gray-900">May 2025</h4>
                        <div class="flex justify-between items-center mt-4">
                            <button class="p-2 rounded-lg hover:bg-blue-100 transition-colors">
                                <i class="fas fa-chevron-left text-blue-600"></i>
                            </button>
                            <button class="p-2 rounded-lg hover:bg-blue-100 transition-colors">
                                <i class="fas fa-chevron-right text-blue-600"></i>
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-7 gap-2 text-center">
                        <div class="font-bold text-gray-600 py-3">Mo</div>
                        <div class="font-bold text-gray-600 py-3">Tu</div>
                        <div class="font-bold text-gray-600 py-3">We</div>
                        <div class="font-bold text-gray-600 py-3">Th</div>
                        <div class="font-bold text-gray-600 py-3">Fr</div>
                        <div class="font-bold text-gray-600 py-3">Sa</div>
                        <div class="font-bold text-gray-600 py-3">Su</div>
                        
                        {{-- Calendar days --}}
                        @for($i = 1; $i <= 31; $i++)
                            <div class="py-3 hover:bg-blue-100 rounded-lg transition-all duration-200 cursor-pointer group {{ $i == 18 ? 'bg-blue-600 text-white font-bold shadow-lg' : ($i == 25 || $i == 30 ? 'bg-green-100 text-green-800 font-semibold relative' : 'text-gray-700') }}">
                                {{ $i }}
                                @if($i == 25 || $i == 30)
                                    <div class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
                                @endif
                            </div>
                        @endfor
                    </div>
                    
                    {{-- Legend --}}
                    <div class="flex justify-center mt-6 space-x-6 text-sm">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-600 rounded-full mr-2"></div>
                            <span class="text-gray-600">Today</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-100 rounded-full mr-2"></div>
                            <span class="text-gray-600">Events</span>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Events List --}}
            <div class="space-y-8">
                <div class="flex items-center justify-between">
                    <h3 class="font-playfair text-3xl font-bold text-gray-900">Events on May 18, 2025</h3>
                    <a href="{{ route('events.index') }}" class="text-blue-600 hover:text-blue-700 font-semibold flex items-center group">
                        View All 
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                
                @forelse($upcomingEvents->take(2) as $event)
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 group">
                        <div class="flex">
                            <div class="w-48 h-40 bg-gradient-to-br from-blue-400 to-purple-600 flex-shrink-0 flex items-center justify-center relative overflow-hidden">
                                <div class="absolute inset-0 bg-black/20"></div>
                                <i class="fas fa-calendar text-4xl text-white relative z-10 group-hover:scale-110 transition-transform duration-300"></i>
                                <div class="absolute top-2 right-2 bg-white/20 backdrop-blur-sm rounded-full px-3 py-1 text-xs text-white font-semibold">
                                    {{ $event->category ?? 'Event' }}
                                </div>
                            </div>
                            <div class="flex-1 p-8">
                                <div class="flex justify-between items-start mb-3">
                                    <h4 class="font-bold text-xl text-gray-900 group-hover:text-blue-600 transition-colors duration-300">
                                        {{ $event->title }}
                                    </h4>
                                    @if($event->price > 0)
                                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                                            ${{ number_format($event->price, 2) }}
                                        </span>
                                    @else
                                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                                            Free
                                        </span>
                                    @endif
                                </div>
                                
                                <p class="text-gray-600 mb-4 leading-relaxed">{{ Str::limit($event->description, 120) }}</p>
                                
                                <div class="text-sm text-gray-500 mb-6 space-y-2">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar mr-2 text-blue-600"></i>
                                        {{ $event->event_date?->format('M j, Y') }}
                                        @if($event->event_time)
                                            <i class="fas fa-clock ml-4 mr-2 text-blue-600"></i>
                                            {{ $event->event_time?->format('H:i') }}
                                        @endif
                                    </div>
                                    @if($event->club)
                                        <div class="flex items-center">
                                            <i class="fas fa-users mr-2 text-green-600"></i>
                                            {{ $event->club->name }}
                                        </div>
                                    @endif
                                    @if($event->location)
                                        <div class="flex items-center">
                                            <i class="fas fa-map-marker-alt mr-2 text-red-600"></i>
                                            {{ Str::limit($event->location, 30) }}
                                        </div>
                                    @endif
                                </div>

                                <div class="flex justify-between items-center">
                                    <a href="{{ route('events.show', $event) }}" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                                        <i class="fas fa-ticket-alt mr-2"></i>
                                        Book Now
                                    </a>
                                    <div class="flex space-x-3">
                                        <button class="p-2 rounded-full hover:bg-red-50 transition-colors group">
                                            <i class="far fa-heart text-gray-400 group-hover:text-red-500 text-xl transition-colors duration-200"></i>
                                        </button>
                                        <button class="p-2 rounded-full hover:bg-blue-50 transition-colors group">
                                            <i class="fas fa-share text-gray-400 group-hover:text-blue-500 text-xl transition-colors duration-200"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center bg-white rounded-2xl shadow-xl p-12">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-calendar-times text-3xl text-gray-400"></i>
                        </div>
                        <h4 class="text-2xl font-bold text-gray-600 mb-2">No Events Scheduled</h4>
                        <p class="text-gray-500 mb-6">Check back soon for exciting new events!</p>
                        <a href="{{ route('events.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full font-semibold transition-colors duration-300">
                            Browse All Events
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
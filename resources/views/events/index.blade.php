@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-900 via-blue-800 to-teal-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Upcoming Events</h1>
                <p class="text-xl text-blue-200">Join us for amazing adventures and cultural experiences</p>
            </div>
        </div>
    </div>

    <!-- Events Grid -->
    <div class="container mx-auto px-4 py-12">
        @if($events->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($events as $event)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="h-48 bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-calendar text-4xl text-blue-900"></i>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $event->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($event->description, 100) }}</p>
                            
                            <div class="text-sm text-gray-500 mb-4">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-calendar mr-2"></i>
                                    {{ $event->event_date?->format('M j, Y') }}
                                    @if($event->event_time)
                                        <i class="fas fa-clock ml-3 mr-2"></i>
                                        {{ $event->event_time?->format('H:i') }}
                                    @endif
                                </div>
                                @if($event->club)
                                    <div class="flex items-center mb-2">
                                        <i class="fas fa-users mr-2"></i>
                                        {{ $event->club->name }}
                                    </div>
                                @endif
                                <div class="flex items-center">
                                    <i class="fas fa-tag mr-2"></i>
                                    @if($event->price > 0)
                                        ${{ number_format($event->price, 2) }}
                                    @else
                                        Free
                                    @endif
                                </div>
                            </div>

                            <a href="{{ route('events.show', $event) }}" 
                               class="inline-block bg-blue-900 hover:bg-blue-800 text-white px-6 py-2 rounded-lg transition-colors duration-300">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $events->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <i class="fas fa-calendar text-6xl text-gray-400 mb-6"></i>
                <h3 class="text-2xl font-semibold text-gray-600 mb-4">No Events Available</h3>
                <p class="text-gray-500">Check back soon for new exciting events!</p>
            </div>
        @endif
    </div>
</div>
@endsection
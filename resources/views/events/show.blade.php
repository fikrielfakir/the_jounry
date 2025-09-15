@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Event Header -->
    <div class="bg-gradient-to-r from-blue-900 via-blue-800 to-teal-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl font-bold mb-4">{{ $event->title }}</h1>
                <div class="flex flex-wrap items-center text-blue-200 space-x-6">
                    <div class="flex items-center">
                        <i class="fas fa-calendar mr-2"></i>
                        {{ $event->event_date?->format('F j, Y') }}
                    </div>
                    @if($event->event_time)
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-2"></i>
                            {{ $event->event_time?->format('g:i A') }}
                        </div>
                    @endif
                    @if($event->club)
                        <div class="flex items-center">
                            <i class="fas fa-users mr-2"></i>
                            {{ $event->club->name }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Event Image -->
                    <div class="h-64 bg-gray-200 rounded-lg mb-8 flex items-center justify-center">
                        <i class="fas fa-image text-4xl text-gray-400"></i>
                    </div>

                    <!-- Event Description -->
                    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">About This Event</h2>
                        <div class="prose max-w-none">
                            <p class="text-gray-700 leading-relaxed">{{ $event->description }}</p>
                        </div>

                        @if($event->requirements && count($event->requirements) > 0)
                            <div class="mt-8">
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Requirements</h3>
                                <ul class="list-disc list-inside text-gray-700 space-y-1">
                                    @foreach($event->requirements as $requirement)
                                        <li>{{ $requirement }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <!-- Location -->
                    @if($event->location)
                        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Location</h2>
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-blue-900 mt-1 mr-3"></i>
                                <div>
                                    <p class="text-gray-900 font-medium">{{ $event->location }}</p>
                                    @if($event->location_details)
                                        <p class="text-gray-600 mt-1">{{ is_array($event->location_details) ? implode(', ', $event->location_details) : $event->location_details }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Registration Card -->
                    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                        <div class="text-center mb-6">
                            @if($event->price > 0)
                                <div class="text-3xl font-bold text-blue-900 mb-2">${{ number_format($event->price, 2) }}</div>
                                <p class="text-gray-600">per person</p>
                            @else
                                <div class="text-3xl font-bold text-green-600 mb-2">Free</div>
                            @endif
                        </div>

                        <!-- Availability -->
                        @if($event->max_participants > 0)
                            <div class="mb-6">
                                <div class="flex justify-between text-sm text-gray-600 mb-2">
                                    <span>Availability</span>
                                    <span>{{ $event->getAvailableSpots() }} / {{ $event->max_participants }} spots</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-900 h-2 rounded-full" style="width: {{ ($event->current_participants / $event->max_participants) * 100 }}%"></div>
                                </div>
                            </div>
                        @endif

                        @if($event->isRegistrationOpen())
                            @auth
                                <form method="POST" action="{{ route('events.register', $event) }}">
                                    @csrf
                                    <button type="submit" class="w-full bg-blue-900 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-300">
                                        <i class="fas fa-user-plus mr-2"></i>Register Now
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="w-full bg-blue-900 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-300 inline-block text-center">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Login to Register
                                </a>
                            @endauth
                        @else
                            <button class="w-full bg-gray-400 text-white font-semibold py-3 px-4 rounded-lg cursor-not-allowed" disabled>
                                @if($event->isFull())
                                    <i class="fas fa-times mr-2"></i>Event Full
                                @else
                                    <i class="fas fa-clock mr-2"></i>Registration Closed
                                @endif
                            </button>
                        @endif

                        @if($event->registration_deadline)
                            <p class="text-xs text-gray-500 mt-3 text-center">
                                Registration closes: {{ $event->registration_deadline->format('M j, Y g:i A') }}
                            </p>
                        @endif
                    </div>

                    <!-- Event Details -->
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Event Details</h3>
                        <div class="space-y-3 text-sm">
                            @if($event->category)
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Category:</span>
                                    <span class="text-gray-900">{{ ucfirst($event->category) }}</span>
                                </div>
                            @endif
                            @if($event->difficulty_level)
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Difficulty:</span>
                                    <span class="text-gray-900">{{ ucfirst($event->difficulty_level) }}</span>
                                </div>
                            @endif
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="text-green-600">{{ ucfirst($event->status) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Similar Events -->
            @if($similarEvents && $similarEvents->count() > 0)
                <div class="mt-16">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Similar Events</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($similarEvents as $similar)
                            <a href="{{ route('events.show', $similar) }}" 
                               class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                <div class="h-32 bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-calendar text-2xl text-blue-900"></i>
                                </div>
                                <div class="p-4">
                                    <h4 class="font-semibold text-gray-900 mb-2">{{ $similar->title }}</h4>
                                    <p class="text-sm text-gray-600">{{ $similar->event_date?->format('M j, Y') }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
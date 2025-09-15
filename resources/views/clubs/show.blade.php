@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Club Header -->
    <div class="bg-gradient-to-r from-blue-900 via-blue-800 to-teal-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl font-bold mb-4">{{ $club->name }}</h1>
                <div class="flex justify-center items-center text-blue-200 space-x-6">
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        {{ $club->city }}
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-user-friends mr-2"></i>
                        {{ $club->members->count() }} {{ Str::plural('member', $club->members->count()) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Club Image -->
                    <div class="h-64 bg-gradient-to-br from-blue-100 to-teal-100 rounded-lg mb-8 flex items-center justify-center">
                        @if($club->logo)
                            <img src="{{ $club->logo }}" alt="{{ $club->name }}" class="max-h-32 max-w-32">
                        @else
                            <i class="fas fa-users text-6xl text-blue-900"></i>
                        @endif
                    </div>

                    <!-- Club Description -->
                    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">About {{ $club->name }}</h2>
                        <div class="prose max-w-none">
                            <p class="text-gray-700 leading-relaxed">{{ $club->description ?: 'This club is building a community of adventurers and outdoor enthusiasts.' }}</p>
                        </div>

                        @if($club->short_description)
                            <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                                <p class="text-blue-800 italic">{{ $club->short_description }}</p>
                            </div>
                        @endif
                    </div>

                    <!-- Contact Information -->
                    @if($club->contact_info && is_array($club->contact_info) && count($club->contact_info) > 0)
                        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Contact Information</h2>
                            <div class="space-y-3">
                                @if(isset($club->contact_info['email']))
                                    <div class="flex items-center">
                                        <i class="fas fa-envelope text-blue-900 mr-3"></i>
                                        <a href="mailto:{{ $club->contact_info['email'] }}" class="text-blue-900 hover:text-blue-700">
                                            {{ $club->contact_info['email'] }}
                                        </a>
                                    </div>
                                @endif
                                @if(isset($club->contact_info['phone']))
                                    <div class="flex items-center">
                                        <i class="fas fa-phone text-blue-900 mr-3"></i>
                                        <a href="tel:{{ $club->contact_info['phone'] }}" class="text-blue-900 hover:text-blue-700">
                                            {{ $club->contact_info['phone'] }}
                                        </a>
                                    </div>
                                @endif
                                @if(isset($club->contact_info['website']))
                                    <div class="flex items-center">
                                        <i class="fas fa-globe text-blue-900 mr-3"></i>
                                        <a href="{{ $club->contact_info['website'] }}" target="_blank" class="text-blue-900 hover:text-blue-700">
                                            Visit Website <i class="fas fa-external-link-alt ml-1"></i>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Join Club Card -->
                    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Join This Club</h3>
                        
                        @if($club->hasAvailableSpots())
                            <button class="w-full bg-blue-900 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-300 mb-4">
                                <i class="fas fa-user-plus mr-2"></i>Join Club
                            </button>
                            <p class="text-xs text-gray-500 text-center">
                                {{ $club->max_members - $club->getMembersCount() }} spots available
                            </p>
                        @else
                            <button class="w-full bg-gray-400 text-white font-semibold py-3 px-4 rounded-lg cursor-not-allowed mb-4" disabled>
                                <i class="fas fa-times mr-2"></i>Club Full
                            </button>
                        @endif
                    </div>

                    <!-- Club Stats -->
                    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Club Statistics</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Members:</span>
                                <span class="text-gray-900 font-medium">{{ $club->getMembersCount() }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Upcoming Events:</span>
                                <span class="text-gray-900 font-medium">{{ $club->getUpcomingEventsCount() }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Max Capacity:</span>
                                <span class="text-gray-900 font-medium">{{ $club->max_members ?: 'Unlimited' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Manager Information -->
                    @if($club->manager)
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Club Manager</h3>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-user text-blue-900"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-900">{{ $club->manager->name }}</h4>
                                    <p class="text-sm text-gray-600">Club Manager</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Upcoming Events -->
            @if($club->events && $club->events->count() > 0)
                <div class="mt-16">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Upcoming Events</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($club->events as $event)
                            <a href="{{ route('events.show', $event) }}" 
                               class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                <div class="h-32 bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-calendar text-2xl text-blue-900"></i>
                                </div>
                                <div class="p-4">
                                    <h4 class="font-semibold text-gray-900 mb-2">{{ $event->title }}</h4>
                                    <p class="text-sm text-gray-600 mb-2">{{ $event->event_date?->format('M j, Y') }}</p>
                                    @if($event->price > 0)
                                        <p class="text-sm font-medium text-blue-900">${{ number_format($event->price, 2) }}</p>
                                    @else
                                        <p class="text-sm font-medium text-green-600">Free</p>
                                    @endif
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
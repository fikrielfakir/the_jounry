@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-900 via-blue-800 to-teal-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">About THE JOURNEY Association</h1>
                <p class="text-xl text-blue-200">Connecting communities through adventure and cultural exchange</p>
            </div>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Our Mission</h2>
            <p class="text-lg text-gray-600 leading-relaxed mb-12">
                THE JOURNEY Association is dedicated to fostering connections between communities through shared adventures, 
                cultural exchanges, and meaningful experiences. We believe that every journey brings people together and 
                creates lasting bonds that transcend borders and cultures.
            </p>
        </div>

        <!-- Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-users text-2xl text-blue-900"></i>
                </div>
                <h3 class="text-3xl font-bold text-blue-900 mb-2">{{ number_format($stats['participants']) }}</h3>
                <p class="text-gray-600">Active Participants</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-tree text-2xl text-green-600"></i>
                </div>
                <h3 class="text-3xl font-bold text-green-600 mb-2">{{ number_format($stats['trees_planted']) }}</h3>
                <p class="text-gray-600">Trees Planted</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-globe text-2xl text-purple-600"></i>
                </div>
                <h3 class="text-3xl font-bold text-purple-600 mb-2">{{ number_format($stats['cultural_collaborations']) }}</h3>
                <p class="text-gray-600">Cultural Collaborations</p>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-orange-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-heart text-2xl text-orange-600"></i>
                </div>
                <h3 class="text-3xl font-bold text-orange-600 mb-2">{{ number_format($stats['community_projects']) }}</h3>
                <p class="text-gray-600">Community Projects</p>
            </div>
        </div>

        <!-- Values Section -->
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Our Values</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto mb-6 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-compass text-3xl text-blue-900"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Adventure</h3>
                    <p class="text-gray-600">We believe in the power of exploration and discovery to broaden horizons and build character.</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 mx-auto mb-6 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-hands-helping text-3xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Community</h3>
                    <p class="text-gray-600">Strong communities are built through shared experiences and mutual support.</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 mx-auto mb-6 bg-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-dove text-3xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Peace</h3>
                    <p class="text-gray-600">Cultural exchange and understanding lead to a more peaceful and connected world.</p>
                </div>
            </div>
        </div>

        <!-- Testimonials Section -->
        @if($testimonials->count() > 0)
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">What Our Members Say</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($testimonials as $testimonial)
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <div class="flex items-center mb-4">
                                @if($testimonial->user)
                                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-user text-blue-900"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">{{ $testimonial->user->name }}</h4>
                                        @if($testimonial->user_title)
                                            <p class="text-sm text-gray-500">{{ $testimonial->user_title }}</p>
                                        @endif
                                    </div>
                                @endif
                            </div>
                            <p class="text-gray-600 italic">"{{ $testimonial->content }}"</p>
                            @if($testimonial->rating)
                                <div class="mt-4 flex">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                    @endfor
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
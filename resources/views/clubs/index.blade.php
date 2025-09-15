@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-900 via-blue-800 to-teal-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Our Clubs</h1>
                <p class="text-xl text-blue-200">Connect with like-minded adventurers in your area</p>
            </div>
        </div>
    </div>

    <!-- Clubs Grid -->
    <div class="container mx-auto px-4 py-12">
        @if($clubs->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($clubs as $club)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="h-48 bg-gradient-to-br from-blue-100 to-teal-100 flex items-center justify-center">
                            <i class="fas fa-users text-4xl text-blue-900"></i>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $club->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($club->description, 100) }}</p>
                            
                            <div class="text-sm text-gray-500 mb-4">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    {{ $club->city }}
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-user-friends mr-2"></i>
                                    {{ $club->members->count() }} {{ Str::plural('member', $club->members->count()) }}
                                </div>
                            </div>

                            <a href="{{ route('clubs.show', $club) }}" 
                               class="inline-block bg-blue-900 hover:bg-blue-800 text-white px-6 py-2 rounded-lg transition-colors duration-300">
                                View Club
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $clubs->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <i class="fas fa-users text-6xl text-gray-400 mb-6"></i>
                <h3 class="text-2xl font-semibold text-gray-600 mb-4">No Clubs Available</h3>
                <p class="text-gray-500">Be the first to start a club in your area!</p>
            </div>
        @endif
    </div>
</div>
@endsection
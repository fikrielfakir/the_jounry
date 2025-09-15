@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-900 via-blue-800 to-teal-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Our Partners</h1>
                <p class="text-xl text-blue-200">Working together to create amazing experiences</p>
            </div>
        </div>
    </div>

    <!-- Partners Grid -->
    <div class="container mx-auto px-4 py-12">
        @if($partners->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($partners as $partner)
                    <div class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
                        @if($partner->logo)
                            <div class="w-20 h-20 mx-auto mb-4 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                <img src="{{ $partner->logo }}" alt="{{ $partner->name }}" class="max-w-full max-h-full">
                            </div>
                        @else
                            <div class="w-20 h-20 mx-auto mb-4 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-handshake text-2xl text-blue-900"></i>
                            </div>
                        @endif
                        
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $partner->name }}</h3>
                        @if($partner->description)
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($partner->description, 80) }}</p>
                        @endif
                        
                        @if($partner->website)
                            <a href="{{ $partner->website }}" 
                               target="_blank"
                               class="inline-block bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-lg text-sm transition-colors duration-300">
                                Visit Website <i class="fas fa-external-link-alt ml-1"></i>
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <i class="fas fa-handshake text-6xl text-gray-400 mb-6"></i>
                <h3 class="text-2xl font-semibold text-gray-600 mb-4">No Partners Yet</h3>
                <p class="text-gray-500">We're always looking for new partnerships!</p>
            </div>
        @endif
    </div>
</div>
@endsection
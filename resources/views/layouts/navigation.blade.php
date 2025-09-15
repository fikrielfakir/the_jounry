<nav x-data="{ open: false }" class="bg-transparent absolute top-0 left-0 w-full z-50">
    <!-- Top Bar -->
    <div class="bg-navy-950 bg-opacity-90">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end items-center h-10 text-beige-100 text-sm">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-1">
                        <span>English</span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                    @auth
                        <div class="flex items-center space-x-4">
                            <span>{{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-beige-100 hover:text-beige-300">logout</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-beige-100 hover:text-beige-300">login</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="bg-navy-950 bg-opacity-80 backdrop-blur-sm border-b border-beige-200 border-opacity-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Left Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('about') }}" class="text-beige-100 hover:text-beige-300 font-medium transition duration-200">About</a>
                    <a href="{{ route('events.index') }}" class="text-beige-100 hover:text-beige-300 font-medium transition duration-200">Events</a>
                    <a href="{{ route('welcome') }}#discover" class="text-beige-100 hover:text-beige-300 font-medium transition duration-200">Focus Areas</a>
                </div>

                <!-- Center Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}" class="text-center group">
                        <div class="text-beige-100 group-hover:text-beige-300 transition duration-200">
                            <i class="fas fa-compass text-3xl mb-1 text-beige-500"></i>
                            <div class="text-xs font-light">THE JOURNEY</div>
                            <div class="text-xs font-light">Association</div>
                        </div>
                    </a>
                </div>

                <!-- Right Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('clubs.index') }}" class="text-beige-100 hover:text-beige-300 font-medium transition duration-200">Our Clubs</a>
                    <a href="{{ route('partners') }}" class="text-beige-100 hover:text-beige-300 font-medium transition duration-200">Partners</a>
                    <a href="{{ route('welcome') }}#contact" class="text-beige-100 hover:text-beige-300 font-medium transition duration-200">Contact</a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button @click="open = ! open" class="bg-beige-500 bg-opacity-20 inline-flex items-center justify-center p-2 rounded-md text-beige-100 hover:text-beige-300 hover:bg-beige-500 hover:bg-opacity-30 focus:outline-none focus:ring-2 focus:ring-beige-500">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="open" class="md:hidden bg-navy-950 bg-opacity-95 backdrop-blur-sm border-t border-beige-200 border-opacity-20">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('about') }}" class="text-beige-100 hover:text-beige-300 hover:bg-beige-500 hover:bg-opacity-10 block px-3 py-2 text-base font-medium rounded-lg transition duration-200">About</a>
                <a href="{{ route('events.index') }}" class="text-beige-100 hover:text-beige-300 hover:bg-beige-500 hover:bg-opacity-10 block px-3 py-2 text-base font-medium rounded-lg transition duration-200">Events</a>
                <a href="{{ route('welcome') }}#discover" class="text-beige-100 hover:text-beige-300 hover:bg-beige-500 hover:bg-opacity-10 block px-3 py-2 text-base font-medium rounded-lg transition duration-200">Focus Areas</a>
                <a href="{{ route('clubs.index') }}" class="text-beige-100 hover:text-beige-300 hover:bg-beige-500 hover:bg-opacity-10 block px-3 py-2 text-base font-medium rounded-lg transition duration-200">Our Clubs</a>
                <a href="{{ route('partners') }}" class="text-beige-100 hover:text-beige-300 hover:bg-beige-500 hover:bg-opacity-10 block px-3 py-2 text-base font-medium rounded-lg transition duration-200">Partners</a>
                <a href="{{ route('welcome') }}#contact" class="text-beige-100 hover:text-beige-300 hover:bg-beige-500 hover:bg-opacity-10 block px-3 py-2 text-base font-medium rounded-lg transition duration-200">Contact</a>
            </div>
        </div>
    </div>
</nav>

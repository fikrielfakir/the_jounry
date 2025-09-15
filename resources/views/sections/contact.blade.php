 <!-- Contact Section -->
    <section id="contact" class="py-24 bg-gradient-to-br from-gray-100 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-16 items-center">
                <!-- Left Side - Content -->
                <div class="order-2 xl:order-1">
                    <h2 class="font-playfair text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                        Let's Get in <span class="text-blue-600">Touch!</span>
                    </h2>
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                        Have a question or need assistance? Reach out to us via email,
                        phone, or the contact form. We're eager to assist you on your journey.
                    </p>
                    <p class="text-blue-600 font-bold text-xl mb-12">Nice hearing from you!</p>
                    
                    <!-- Decorative Image -->
                    <div class="relative">
                        <div class="w-96 h-96 bg-gradient-to-br from-blue-600 to-purple-600 rounded-full mx-auto xl:mx-0 flex items-center justify-center shadow-2xl">
                            <div class="w-80 h-80 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-paper-plane text-8xl text-white opacity-80"></i>
                            </div>
                        </div>
                        <!-- Floating elements -->
                        <div class="absolute top-8 right-8 w-12 h-12 bg-yellow-400 rounded-full animate-bounce opacity-80"></div>
                        <div class="absolute bottom-16 left-8 w-8 h-8 bg-green-400 rounded-full animate-pulse opacity-80"></div>
                        <div class="absolute top-1/2 -right-4 w-6 h-6 bg-red-400 rounded-full animate-ping opacity-60"></div>
                    </div>
                </div>
                
                <!-- Right Side - Form -->
                <div class="order-1 xl:order-2">
                    <div class="bg-white rounded-3xl p-10 shadow-2xl">
                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-2xl mb-8 flex items-center">
                                <i class="fas fa-check-circle mr-3 text-xl"></i>
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <form action="{{ route('contact') }}" method="POST" class="space-y-8">
                            @csrf
                            <div class="relative">
                                <input type="text" name="name" placeholder="Full Name" class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
                                @error('name')
                                    <p class="text-red-500 text-sm mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <div class="relative">
                                <input type="email" name="email" placeholder="Email Address" class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                    <p class="text-red-500 text-sm mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <div class="relative">
                                <textarea rows="6" name="message" placeholder="Your Message" class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-lg resize-none @error('message') border-red-500 @enderror" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-red-500 text-sm mt-2 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white py-4 px-8 rounded-2xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl">
                                <i class="fas fa-paper-plane mr-3"></i>
                                Send Message
                            </button>
                        </form>
                        
                        <!-- Contact Info -->
                        <div class="mt-12 pt-8 border-t-2 border-gray-100">
                            <h3 class="font-bold text-2xl text-gray-900 mb-6">Head Office</h3>
                            <div class="space-y-4">
                                <div class="flex items-center text-gray-600 hover:text-blue-600 transition-colors">
                                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-phone text-blue-600"></i>
                                    </div>
                                    <div>
                                        <span class="font-semibold">+212 000 000000</span>
                                        <p class="text-sm text-gray-500">Call us anytime</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center text-gray-600 hover:text-blue-600 transition-colors">
                                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-envelope text-green-600"></i>
                                    </div>
                                    <div>
                                        <span class="font-semibold">info@thejourney.com</span>
                                        <p class="text-sm text-gray-500">Drop us a line</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-center text-gray-600 hover:text-blue-600 transition-colors">
                                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-map-marker-alt text-purple-600"></i>
                                    </div>
                                    <div>
                                        <span class="font-semibold">Morocco, North Africa</span>
                                        <p class="text-sm text-gray-500">Visit our office</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
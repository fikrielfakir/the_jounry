<x-guest-layout>
    <!-- Header -->
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Verify Your Email</h2>
        <p class="text-gray-600">We've sent a verification link to your email address</p>
    </div>

    <!-- Info Message -->
    <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
        <div class="flex items-center">
            <i class="fas fa-envelope text-blue-900 mr-3"></i>
            <p class="text-blue-800 text-sm">
                Please check your email and click the verification link to complete your registration. 
                If you don't see the email, check your spam folder.
            </p>
        </div>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                <p class="text-green-800 text-sm">
                    A new verification link has been sent to your email address.
                </p>
            </div>
        </div>
    @endif

    <!-- Actions -->
    <div class="space-y-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" 
                    class="w-full bg-blue-900 hover:bg-blue-800 text-white font-semibold py-3 px-4 rounded-lg transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:ring-offset-2">
                <i class="fas fa-paper-plane mr-2"></i>Resend Verification Email
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                    class="w-full border border-gray-300 text-gray-700 hover:bg-gray-50 font-semibold py-3 px-4 rounded-lg transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2">
                <i class="fas fa-sign-out-alt mr-2"></i>Sign Out
            </button>
        </form>
    </div>
</x-guest-layout>

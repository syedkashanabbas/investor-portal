<x-guest-layout>
    <div class="flex w-full h-screen">
        
        <!-- Left Side (Register Form) -->
        <div class="flex flex-col justify-center w-full px-12 bg-white shadow-xl lg:px-24 lg:w-1/2">
            <div class="w-full max-w-md mx-auto">
                <h1 class="mb-6 text-4xl font-bold text-gray-800">Create Investor Account</h1>
                <p class="mb-8 text-gray-500">Join us today and get started with your investor profile.</p>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                               class="w-full px-4 py-3 mt-1 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                               class="w-full px-4 py-3 mt-1 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                               class="w-full px-4 py-3 mt-1 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                               class="w-full px-4 py-3 mt-1 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="flex items-start mt-4">
                            <input id="terms" type="checkbox" name="terms" required class="mt-1 text-indigo-600 rounded">
                            <label for="terms" class="ml-2 text-sm text-gray-600">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-indigo-600 hover:underline">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-indigo-600 hover:underline">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </label>
                        </div>
                    @endif

                    <button type="submit" class="w-full py-3 font-semibold text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700">
                        Register
                    </button>

                    <p class="mt-4 text-sm text-center text-gray-600">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:underline">Sign In</a>
                    </p>
                </form>
            </div>
        </div>

        <!-- Right Side (Background Image + Heading) -->
        <div class="relative hidden w-1/2 bg-center bg-cover lg:flex"
             style="background-image: url('{{ asset('assets/img/login-bg.jpg') }}');">
            
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>

            <!-- Centered Heading -->
            <div class="relative flex items-center justify-center w-full h-full">
                <h2 class="text-6xl font-bold text-white" style="font-family: 'Parisienne', cursive;">
                    Join the Investors
                </h2>
            </div>
        </div>
    </div>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
</x-guest-layout>

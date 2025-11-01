<x-guest-layout>
    @section('title', 'Login - ' . config('app.name', 'Laravel'))
    @section('meta_description', 'Access your Ethica Holdings account securely. Log in to manage your investments, explore ethical AI-powered finance tools, and stay compliant with UK financial standards.')

    <div class="flex w-full h-screen">
        
        <!-- Left Side (Login Form) -->
        <div class="flex flex-col justify-center w-full px-12 bg-white shadow-xl lg:px-24 lg:w-1/2">
            <div class="w-full max-w-md mx-auto">
                <h1 class="mb-6 text-4xl font-bold text-gray-800">Accesso Investitore</h1>
                <p class="mb-8 text-gray-500">Bentornato! Inserisci i tuoi dati per accedere.</p>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Indirizzo Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                               class="w-full px-4 py-3 mt-1 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password" 
                               class="w-full px-4 py-3 mt-1 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center text-sm text-gray-600">
                            <input id="remember_me" type="checkbox" name="remember" class="text-indigo-600 rounded">
                            <span class="ml-2">Ricordami</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">Password dimenticata?</a>
                        @endif
                    </div>

                    <button type="submit" class="w-full py-3 font-semibold text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700">
                        Accedi
                    </button>

                  
                </form>
            </div>
        </div>

        <!-- Right Side (Background Image + Heading) -->
        <div class="relative hidden w-1/2 bg-center bg-cover lg:flex" 
             style="background-image: url('{{ asset('assets/img/login-bg.jpg') }}');">
            
            <!-- Overlay -->
      
            
            <!-- Centered Heading -->
            <div class="relative flex items-center justify-center w-full h-full">
                <!--<h2 class="font-bold text-white text-8xl" style="font-family: 'Parisienne', cursive;">-->
                <!--    Benvenuti Investitori-->
                <!--</h2>-->
            </div>
        </div>
    </div>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
</x-guest-layout>

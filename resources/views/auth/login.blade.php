<x-guest-layout>
    <form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto bg-white border border-blue-100 shadow rounded-xl p-6 space-y-6">
        @csrf

        <h2 class="text-2xl font-bold text-blue-700 text-center">Masuk</h2>

        <!-- Session Status -->
        <x-auth-session-status class="text-sm text-green-600 font-medium text-center" :status="session('status')" />

        <!-- Email -->
        <div>
            <label for="email" class="block font-medium text-gray-700">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                   class="w-full mt-1 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block font-medium text-gray-700">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="w-full mt-1 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center gap-2">
            <input id="remember_me" type="checkbox" name="remember" class="text-blue-600 border-blue-300 rounded shadow-sm focus:ring-blue-500">
            <label for="remember_me" class="text-sm text-gray-700">Ingat saya</label>
        </div>

        <!-- Buttons -->
        <div class="flex items-center justify-between">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800">
                    Lupa password?
                </a>
            @endif

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition-all">
                Masuk
            </button>
        </div>
    </form>
</x-guest-layout>

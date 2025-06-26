<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto bg-white border border-blue-100 shadow rounded-xl p-6 space-y-6">
        @csrf

        <h2 class="text-2xl font-bold text-blue-700 text-center">Daftar Akun</h2>

        <!-- Name -->
        <div>
            <label for="name" class="block font-medium text-gray-700">Nama</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                   class="w-full mt-1 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block font-medium text-gray-700">Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                   class="w-full mt-1 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block font-medium text-gray-700">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                   class="w-full mt-1 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
        </div>

        <!-- Password Confirmation -->
        <div>
            <label for="password_confirmation" class="block font-medium text-gray-700">Konfirmasi Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                   class="w-full mt-1 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-800">
                Sudah punya akun?
            </a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition-all">
                Daftar
            </button>
        </div>
    </form>
</x-guest-layout>

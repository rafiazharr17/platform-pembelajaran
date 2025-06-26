<section>
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-blue-700 flex items-center gap-2">
            <span class="material-icons">lock</span>
            Perbarui Password
        </h2>
        <p class="mt-1 text-sm text-gray-700">
            Gunakan password yang panjang dan acak untuk menjaga keamanan akun Anda.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block font-medium text-gray-700">Password Saat Ini</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"
                class="mt-1 block w-full border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password" class="block font-medium text-gray-700">Password Baru</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password"
                class="mt-1 block w-full border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block font-medium text-gray-700">Konfirmasi Password Baru</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                class="mt-1 block w-full border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition-all">
                Simpan
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-medium"
                >
                    Password berhasil diperbarui.
                </p>
            @endif
        </div>
    </form>
</section>

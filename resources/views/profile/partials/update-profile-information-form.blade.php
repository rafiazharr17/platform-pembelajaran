<section>
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-blue-700 flex items-center gap-2">
            <span class="material-icons">person</span>
            Informasi Profil
        </h2>
        <p class="mt-1 text-sm text-gray-700">
            Perbarui informasi akun dan alamat email Anda.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block font-medium text-gray-700">Nama</label>
            <input id="name" name="name" type="text" required autofocus autocomplete="name"
                   class="mt-1 block w-full border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('name', $user->name) }}">
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="block font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" required autocomplete="username"
                   class="mt-1 block w-full border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('email', $user->email) }}">
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-700">
                        Alamat email Anda belum diverifikasi.
                        <button form="send-verification" class="ml-1 underline text-blue-600 hover:text-blue-800 font-medium">
                            Klik di sini untuk mengirim ulang email verifikasi.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm text-green-600 font-medium">
                            Link verifikasi baru telah dikirim ke email Anda.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-lg shadow transition-all">
                Simpan
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-green-600 font-medium">
                    Data berhasil diperbarui.
                </p>
            @endif
        </div>
    </form>
</section>

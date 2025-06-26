<section class="space-y-6">
    <header>
        <h2 class="text-2xl font-bold text-blue-700 flex items-center gap-2">
            <span class="material-icons">delete</span>
            Hapus Akun
        </h2>

        <p class="mt-2 text-sm text-gray-700">
            Setelah akun Anda dihapus, semua data dan sumber daya akan terhapus secara permanen. Harap unduh semua informasi yang ingin Anda simpan sebelum melanjutkan.
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 text-white px-5 py-2 rounded-lg shadow hover:bg-red-700 transition-all"
    >
        Hapus Akun
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-blue-700">
                Apakah Anda yakin ingin menghapus akun?
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                Setelah akun Anda dihapus, semua data akan hilang secara permanen. Masukkan kata sandi Anda untuk mengonfirmasi penghapusan.
            </p>

            <div class="mt-4">
                <label for="password" class="block font-medium text-gray-700">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan password"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition"
                >
                    Hapus Permanen
                </button>
            </div>
        </form>
    </x-modal>
</section>

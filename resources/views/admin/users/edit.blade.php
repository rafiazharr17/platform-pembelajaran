<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700">Ubah Role User</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow border border-blue-100">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Nama</label>
                    <input type="text" value="{{ $user->name }}" disabled class="w-full border rounded px-3 py-2 bg-gray-100">
                </div>

                <div class="mb-4">
                    <label for="id_role" class="block font-semibold mb-1">Pilih Role</label>
                    <select name="id_role" id="id_role" class="w-full border rounded px-3 py-2">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id_role }}" {{ $user->id_role == $role->id_role ? 'selected' : '' }}>
                                {{ $role->name_role }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700 flex items-center gap-2">
            <span class="material-icons">assignment</span>
            Tambah Tugas
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow border border-blue-100">
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tugas.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="judul" class="block font-semibold">Judul Tugas</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block font-semibold">Deskripsi Tugas</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                        class="w-full border border-gray-300 rounded px-3 py-2">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="deadline" class="block font-semibold">Deadline</label>
                    <input type="datetime-local" name="deadline" id="deadline" value="{{ old('deadline') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="text-right">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition">
                        Simpan Tugas
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

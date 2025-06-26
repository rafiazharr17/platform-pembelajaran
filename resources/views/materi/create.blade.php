<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700 flex items-center gap-2">
            <span class="material-icons">add_circle</span>
            Tambah Materi
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

            <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="judul" class="block font-semibold">Judul</label>
                    <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block font-semibold">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                        class="w-full border border-gray-300 rounded px-3 py-2">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="file_type" class="block font-semibold">Jenis File</label>
                    <select name="file_type" id="file_type" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="">Pilih tipe file</option>
                        <option value="image" {{ old('file_type') == 'image' ? 'selected' : '' }}>Gambar</option>
                        <option value="video" {{ old('file_type') == 'video' ? 'selected' : '' }}>Video</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="file" class="block font-semibold">Upload File</label>
                    <input type="file" name="file" id="file" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="mb-6">
                    <label for="thumbnail" class="block font-semibold">Thumbnail (opsional untuk video)</label>
                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                        class="w-full border border-gray-300 rounded px-3 py-2">
                </div>

                <div class="text-right">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-white hover:text-blue-700 transition-all duration-300">
                        Simpan Materi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
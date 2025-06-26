{{-- resources/views/materi/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700">Edit Materi</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="judul" class="block font-semibold">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $materi->judul) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block font-semibold">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full border border-gray-300 rounded px-3 py-2">{{ old('deskripsi', $materi->deskripsi) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="file_type" class="block font-semibold">Jenis File</label>
                <select name="file_type" id="file_type" class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="">Pilih tipe file</option>
                    <option value="image" {{ $materi->file_type == 'image' ? 'selected' : '' }}>Gambar</option>
                    <option value="video" {{ $materi->file_type == 'video' ? 'selected' : '' }}>Video</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="file" class="block font-semibold">Ganti File</label>
                <input type="file" name="file" id="file"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-6">
                <label for="thumbnail" class="block font-semibold">Ganti Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="text-right">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Perbarui Materi
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

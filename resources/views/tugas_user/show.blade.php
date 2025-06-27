<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700 flex items-center gap-2">
            <span class="material-icons">assignment_turned_in</span>
            {{ $tugas->judul }}
        </h2>
    </x-slot>

    <div class="mt-6 px-4 sm:px-6 lg:px-8 max-w-3xl">
        <div class="bg-white p-6 rounded-xl shadow border border-blue-100 space-y-4">
            <p><strong>Deskripsi:</strong> {{ $tugas->deskripsi }}</p>
            <p><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('d F Y H:i') }}</p>

            @if ($pengumpulan)
            <div class="p-4 bg-green-50 border border-green-200 rounded-md">
                <p class="text-green-800">Tugas telah dikumpulkan pada: {{ $pengumpulan->created_at->format('d M Y H:i') }}</p>
                <p class="mt-2">
                    <a href="{{ asset('storage/' . $pengumpulan->file_jawaban) }}" target="_blank"
                        class="text-blue-600 underline">Lihat File Jawaban</a>
                </p>
                <form method="POST" action="{{ route('tugas-user.destroy', $pengumpulan) }}"
                    onsubmit="return confirm('Yakin ingin menghapus pengumpulan tugas ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="mt-4 inline-flex items-center gap-1 px-4 py-2 bg-red-100 text-red-700 hover:bg-red-200 rounded-md transition">
                        <span class="material-icons text-sm">delete</span>
                        Hapus Pengumpulan
                    </button>
                </form>
            </div>
            @else
            <form method="POST" action="{{ route('tugas-user.store', $tugas) }}" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="file_jawaban" class="block font-medium text-gray-700">Upload Jawaban</label>
                    <input type="file" name="file_jawaban" id="file_jawaban"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">

                    @error('file_jawaban')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="inline-flex items-center gap-1 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    <span class="material-icons text-sm">send</span>
                    Kumpulkan
                </button>
            </form>
            @endif
        </div>
    </div>
</x-app-layout>
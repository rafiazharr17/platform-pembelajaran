<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700 flex items-center gap-2">
            <span class="material-icons">description</span>
            Detail Materi
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md border border-blue-100 p-6">
            <h3 class="text-2xl font-semibold text-blue-700 mb-4">{{ $materi->judul }}</h3>

            @if ($materi->file_path)
                <div class="mt-4">
                    @if ($materi->file_type === 'image')
                        <img src="{{ asset('storage/' . $materi->file_path) }}" alt="Gambar Materi" class="rounded shadow-md max-w-full">
                    @elseif ($materi->file_type === 'video')
                        <video controls class="w-full max-w-2xl mt-2 rounded shadow-md">
                            <source src="{{ asset('storage/' . $materi->file_path) }}" type="video/mp4">
                            Browser Anda tidak mendukung video.
                        </video>
                    @endif
                </div>
            @endif

            <p class="text-gray-700 mb-4">{{ $materi->deskripsi }}</p>

            <div class="mt-6">
                <a href="{{ route('materi.index') }}" class="inline-flex items-center px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-white hover:text-blue-700 transition-all">
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

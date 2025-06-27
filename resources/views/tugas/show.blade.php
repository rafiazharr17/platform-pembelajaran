<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700 flex items-center gap-2">
            <span class="material-icons">description</span>
            Detail Tugas
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md border border-blue-100 p-6">
            <h3 class="text-2xl font-semibold text-blue-700 mb-4">{{ $tugas->judul }}</h3>
            <p class="text-gray-700 mb-4 whitespace-pre-line">{{ $tugas->deskripsi }}</p>
            <p class="text-gray-600">Deadline: {{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('d F Y H:i') }}</p>

            {{-- ✅ Tambahan: Menampilkan file jawaban dari murid --}}
            @if($pengumpulan->isNotEmpty())
                <div class="mt-8">
                    <h4 class="text-xl font-semibold text-gray-800 mb-4">Jawaban dari Murid:</h4>
                    <div class="space-y-4">
                        @foreach($pengumpulan as $item)
                            <div class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                                <p><strong>Nama Murid:</strong> {{ $item->user->name }}</p>
                                <p><strong>Waktu Kumpul:</strong> {{ $item->created_at->format('d M Y H:i') }}</p>
                                <p><strong>File Jawaban:</strong>
                                    <a href="{{ asset('storage/' . $item->file_jawaban) }}" target="_blank" class="text-blue-600 underline">
                                        Lihat File
                                    </a>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="mt-8 text-gray-500">
                    Belum ada murid yang mengumpulkan tugas ini.
                </div>
            @endif

            <div class="mt-6">
                <a href="{{ route('tugas.index') }}"
                    class="inline-flex items-center px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-white hover:text-blue-700 border border-blue-600 transition">
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

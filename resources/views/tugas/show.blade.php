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
            <p class="text-gray-700 mb-2">{{ $tugas->deskripsi }}</p>
            <p class="text-gray-600">Deadline: {{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('d F Y H:i') }}</p>

            <div class="mt-6">
                <a href="{{ route('tugas.index') }}"
                    class="inline-flex items-center px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-white hover:text-blue-700 transition-all">
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

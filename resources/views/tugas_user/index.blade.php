<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700 flex items-center gap-2">
            <span class="material-icons">assignment</span>
            Tugas Saya
        </h2>
    </x-slot>

    <div class="mt-6 px-4 sm:px-6 lg:px-8">
        @if ($tugas->isEmpty())
        <p class="text-center text-gray-500">Belum ada tugas yang tersedia.</p>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($tugas as $item)
            <div class="bg-white p-5 rounded-xl border border-blue-100 shadow-sm hover:shadow-md transition">
                <h3 class="text-xl font-semibold text-blue-700 mb-2">
                    {{ $item->judul }}
                    @if ($item->sudah_dikumpulkan)
                    <span class="material-icons text-green-600 align-middle text-base" title="Sudah dikumpulkan">check_circle</span>
                    @endif
                </h3>

                @if ($item->sudah_dikumpulkan)
                <p class="text-sm text-green-600 mb-2">✅ Sudah dikumpulkan</p>
                @else
                <p class="text-sm text-red-500 mb-2">❌ Belum dikumpulkan</p>
                @endif

                <p class="text-gray-600 mb-3">
                    Deadline: {{ \Carbon\Carbon::parse($item->deadline)->translatedFormat('d F Y H:i') }}
                </p>
                <div class="flex flex-wrap gap-2">
                    {{-- ✅ Route kumpul diberi parameter --}}
                    <!-- <a href="{{ route('tugas-user.kumpul', $item->id_tugas) }}"
                        class="inline-flex items-center gap-1 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        <span class="material-icons text-sm">cloud_upload</span>
                        Kumpulkan Tugas
                    </a> -->

                    {{-- ✅ Route show diberi parameter --}}
                    <a href="{{ route('tugas-user.show', $item->id_tugas) }}"
                        class="inline-flex items-center gap-1 px-4 py-2 bg-gray-200 text-blue-700 rounded-md hover:bg-gray-300 transition">
                        <span class="material-icons text-sm">info</span>
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</x-app-layout>
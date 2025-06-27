<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-extrabold text-blue-800 flex items-center gap-2">
            <span class="material-icons text-4xl">dashboard</span>
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        {{-- Selamat Datang --}}
        <div class="max-w-6xl mx-auto mb-10">
            <div class="bg-white border border-blue-100 rounded-xl shadow p-8">
                <h1 class="text-3xl font-extrabold text-blue-800 mb-2 flex items-center gap-2">
                    <span class="material-icons text-4xl text-blue-600">school</span>
                    Selamat Datang, {{ Auth::user()->name }}!
                </h1>
                <p class="text-base text-blue-700">Ke platform pembelajaran. Kelola materi dan tugas dengan mudah.</p>
            </div>
        </div>
    </div>


    {{-- Statistik --}}
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-md border border-blue-100 p-6">
            <div class="text-blue-700 font-semibold text-lg mb-2">Jumlah Materi</div>
            <div class="text-4xl font-bold text-blue-900">{{ $materiCount }}</div>
            <a href="{{ route('materi.index') }}" class="text-sm text-blue-600 hover:underline mt-2 inline-block">Lihat
                Materi</a>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-green-100 p-6">
            <div class="text-green-700 font-semibold text-lg mb-2">Jumlah Tugas</div>
            <div class="text-4xl font-bold text-green-900">{{ $tugasCount }}</div>
            <a href="{{ route('tugas.index') }}" class="text-sm text-green-600 hover:underline mt-2 inline-block">Lihat
                Tugas</a>
        </div>

        <div class="bg-white rounded-xl shadow-md border border-indigo-100 p-6">
            <div class="text-indigo-700 font-semibold text-lg mb-2">Tanggal Login</div>
            <div class="text-2xl font-bold text-indigo-900">{{ now()->format('d M Y') }}</div>
            <span class="text-sm text-gray-500">Hari ini</span>
        </div>
    </div>

    {{-- Materi & Tugas Terbaru --}}
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <div class="bg-white rounded-xl shadow-md border border-blue-100 p-6">
            <h3 class="text-xl font-bold text-blue-700 mb-4">📚 5 Materi Terbaru</h3>
            @forelse($recentMateri as $materi)
                <div class="mb-3 border-b pb-2">
                    <a href="{{ route('materi.show', $materi->id) }}"
                        class="text-lg font-semibold text-blue-800 hover:underline">
                        {{ $materi->judul }}
                    </a>
                    <div class="text-sm text-gray-500">{{ $materi->created_at->format('d M Y') }}</div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada materi.</p>
            @endforelse
        </div>

        <div class="bg-white rounded-xl shadow-md border border-green-100 p-6">
            <h3 class="text-xl font-bold text-green-700 mb-4">📝 5 Tugas Terbaru</h3>
            @forelse($recentTugas as $tugas)
                <div class="mb-3 border-b pb-2">
                    <a href="{{ route('tugas.index') }}#tugas-{{ $tugas->id }}"
                        class="text-lg font-semibold text-green-800 hover:underline">
                        {{ $tugas->judul }}
                    </a>
                    <div class="text-sm text-gray-500">{{ $tugas->created_at->format('d M Y') }}</div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada tugas.</p>
            @endforelse
        </div>
    </div>

    </div>
</x-app-layout>
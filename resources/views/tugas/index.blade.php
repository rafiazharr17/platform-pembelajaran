<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700 flex items-center gap-2">
            <span class="material-icons">assignment</span>
            Daftar Tugas
        </h2>
    </x-slot>

    <div class="mt-8 px-4 sm:px-6 lg:px-8">
        {{-- Tombol Tambah Tugas --}}
        @if (Auth::user()->role->name_role === 'Guru')
            <div class="flex justify-end mb-4">
                <a href="{{ route('tugas.create') }}"
                   class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-white hover:text-blue-700 transition-all duration-300">
                    <span class="material-icons">add_circle</span>
                    Tambah Tugas
                </a>
            </div>
        @endif

        {{-- Form Pencarian --}}
        <div class="mb-6">
            <form method="GET" action="{{ route('tugas.index') }}" class="flex flex-col sm:flex-row sm:items-center gap-2 max-w-full sm:max-w-xl">
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full border border-blue-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm"
                    placeholder="Cari tugas berdasarkan judul...">
                <button type="submit"
                    class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-white hover:text-blue-700 transition-all duration-300">
                    Cari
                </button>
            </form>
        </div>

        {{-- Daftar Tugas --}}
        @if ($tugas->isEmpty())
            <div class="text-center text-gray-500">
                @if (request('search'))
                    Tidak ditemukan tugas untuk: <strong>"{{ request('search') }}"</strong>
                @else
                    Belum ada tugas tersedia.
                @endif
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($tugas as $item)
                    <div class="bg-white p-6 rounded-xl border border-blue-100 shadow-sm hover:shadow-md transition">
                        <h3 class="text-xl font-semibold text-blue-700 mb-2">{{ $item->judul }}</h3>
                        <p class="text-gray-600 mb-2">
                            Deadline: {{ \Carbon\Carbon::parse($item->deadline)->translatedFormat('d F Y H:i') }}
                        </p>

                        <div class="flex justify-between mt-auto gap-2 text-sm">
                            <a href="{{ route('tugas.show', $item) }}"
                               class="inline-flex items-center gap-1 px-3 py-1 rounded-md bg-blue-100 text-blue-700 hover:bg-blue-200 transition">
                                <span class="material-icons text-base">visibility</span>
                                Lihat
                            </a>

                            @if (Auth::user()->role->name_role === 'Guru')
                                <div class="flex gap-2">
                                    <a href="{{ route('tugas.edit', $item) }}"
                                       class="inline-flex items-center gap-1 px-3 py-1 rounded-md bg-yellow-100 text-yellow-700 hover:bg-yellow-200 transition">
                                        <span class="material-icons text-base">edit</span>
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('tugas.destroy', $item) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1 px-3 py-1 rounded-md bg-red-100 text-red-600 hover:bg-red-200 transition">
                                            <span class="material-icons text-base">delete</span>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700 flex items-center gap-2">
            <span class="material-icons">library_books</span>
            Daftar Materi
        </h2>
    </x-slot>

    <div class="mt-8">
        {{-- Tombol Tambah Materi --}}
        @if (Auth::user()->role->name_role === 'Guru')
            <a href="{{ route('materi.create') }}"
                class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-white hover:text-blue-700 transition-all duration-300 mb-6">
                <span class="material-icons">add_circle</span>
                Tambah Materi
            </a>
        @endif

        {{-- Form Pencarian --}}
        <div class="mb-6">
            <form method="GET" action="{{ route('materi.index') }}" class="flex items-center gap-2 max-w-md">
                <input type="text" name="search" value="{{ request('search') }}"
                    class="w-full border border-blue-300 rounded-lg px-4 py-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm"
                    placeholder="Cari materi berdasarkan judul atau deskripsi...">
                <button type="submit"
                    class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg shadow-md hover:bg-white hover:text-blue-700 transition-all duration-300">
                    Cari
                </button>
            </form>
        </div>

        {{-- Data Materi --}}
        @if ($materi->isEmpty())
            <div class="text-center text-gray-500">
                @if (request('search'))
                    Tidak ditemukan materi untuk: <strong>"{{ request('search') }}"</strong>
                @else
                    Belum ada materi tersedia.
                @endif
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($materi as $item)
                    <div
                        class="bg-white p-6 rounded-xl border border-blue-100 shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between">

                        {{-- Preview File --}}
                        @if ($item->file_path)
                            @if ($item->file_type === 'image')
                                <img src="{{ asset('storage/' . $item->file_path) }}" alt="Gambar Materi"
                                    class="mb-4 w-full h-40 object-cover rounded-lg border border-blue-200 shadow">
                            @elseif ($item->file_type === 'video')
                                @if ($item->thumbnail_path)
                                    <img src="{{ asset('storage/' . $item->thumbnail_path) }}" alt="Thumbnail Video"
                                        class="mb-4 w-full h-40 object-cover rounded-lg border border-blue-200 shadow">
                                @else
                                    <div
                                        class="mb-4 flex items-center justify-center h-40 bg-blue-50 border border-blue-200 rounded-lg">
                                        <span class="material-icons text-blue-500 text-6xl">videocam</span>
                                    </div>
                                @endif
                            @else
                                <div
                                    class="mb-4 flex items-center justify-center h-40 bg-blue-50 border border-blue-200 rounded-lg">
                                    <span class="material-icons text-blue-500 text-6xl">insert_drive_file</span>
                                </div>
                            @endif
                        @endif

                        {{-- Judul & Deskripsi --}}
                        <h3 class="text-xl font-semibold text-blue-700 mb-2">{{ $item->judul }}</h3>
                        <p class="text-gray-600 mb-4">{{ $item->created_at->format('Y-m-d') }}</p>

                        {{-- Tombol Aksi --}}
                        <div class="flex justify-between items-center text-sm mt-auto">
                            <a href="{{ route('materi.show', $item->id) }}"
                                class="inline-flex items-center gap-1 px-3 py-1 rounded-md bg-blue-100 text-blue-700 hover:bg-blue-200 transition">
                                <span class="material-icons text-base">visibility</span>
                                Lihat
                            </a>

                            @if (Auth::user()->role->name_role === 'Guru')
                                <div class="flex gap-2">
                                    <a href="{{ route('materi.edit', $item->id) }}"
                                        class="inline-flex items-center gap-1 px-3 py-1 rounded-md bg-yellow-100 text-yellow-700 hover:bg-yellow-200 transition">
                                        <span class="material-icons text-base">edit</span>
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('materi.destroy', $item->id) }}"
                                        onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
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

            {{-- (Opsional) Pagination --}}
            {{-- <div class="mt-6">
                {{ $materi->links() }}
            </div> --}}
        @endif
    </div>
</x-app-layout>

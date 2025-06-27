<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700 flex items-center gap-2">
            <span class="material-icons">description</span>
            Detail Materi
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md border border-blue-100 p-6">
            {{-- Flash Message --}}
            @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
            @endif

            {{-- Judul --}}
            <h3 class="text-2xl font-semibold text-blue-700 mb-4">{{ $materi->judul }}</h3>

            {{-- File media --}}
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

            {{-- Deskripsi --}}
            <p class="text-gray-700 mt-6 mb-4">{{ $materi->deskripsi }}</p>

            {{-- Komentar --}}
            <div class="mt-10">
                <h4 class="text-xl font-bold text-blue-600 mb-3">Komentar</h4>

                @php
                $currentUser = auth()->user();
                @endphp

                @forelse ($materi->komentar as $komentar)
                <div class="border-b border-gray-200 pb-4 mb-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-800 font-semibold">{{ $komentar->user->name }}</p>
                            <p class="text-gray-700">{{ $komentar->isi_komentar }}</p>
                            <p class="text-sm text-gray-400">{{ $komentar->created_at->diffForHumans() }}</p>
                        </div>

                        {{-- Tombol Hapus jika pemilik komentar atau Guru --}}
                        @if ($currentUser->id === $komentar->user_id || $currentUser->role_name === 'Guru')
                        <form action="{{ route('komentar.destroy', $komentar->id_komentar) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold ml-4">
                                <i class="material-icons text-sm align-middle">delete</i> Hapus
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
                @empty
                <p class="text-gray-500">Belum ada komentar.</p>
                @endforelse
            </div>

            {{-- Form Tambah Komentar --}}
            @auth
            <div class="mt-6">
                <h4 class="text-lg font-semibold text-blue-700 mb-2">Tulis Komentar</h4>

                <form action="{{ route('komentar.store') }}" method="POST" class="mt-6">
                    @csrf
                    <input type="hidden" name="materi_id" value="{{ $materi->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <textarea name="isi_komentar" rows="3" class="w-full border rounded p-2 mb-2" placeholder="Tulis komentar..." required></textarea>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Kirim Komentar</button>
                </form>

            </div>
            @else
            <p class="mt-6 text-sm text-gray-500">Silakan <a href="{{ route('login') }}" class="text-blue-600 underline">login</a> untuk menulis komentar.</p>
            @endauth

            {{-- Tombol kembali --}}
            <div class="mt-10">
                <a href="{{ route('materi.index') }}" class="inline-flex items-center px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-white hover:text-blue-700 border border-blue-600 transition-all">
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
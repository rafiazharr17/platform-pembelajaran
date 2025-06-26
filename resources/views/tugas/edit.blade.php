<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700">Edit Tugas</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow mt-6">
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="judul" class="block font-semibold">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $tugas->judul) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block font-semibold">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="w-full border border-gray-300 rounded px-3 py-2">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="deadline" class="block font-semibold">Deadline</label>
                <input type="datetime-local" name="deadline" id="deadline"
                    value="{{ old('deadline', \Carbon\Carbon::parse($tugas->deadline)->format('Y-m-d\TH:i')) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="text-right">
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Perbarui Tugas
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

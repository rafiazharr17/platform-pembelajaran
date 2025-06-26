<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-blue-700">Manajemen User</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow border border-blue-100">
            @if (session('success'))
                <div class="mb-4 text-green-600 font-semibold">
                    {{ session('success') }}
                </div>
            @endif

            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-blue-100 text-blue-700">
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">{{ $user->role->name_role ?? '-' }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                   class="text-blue-600 hover:underline">Edit Role</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

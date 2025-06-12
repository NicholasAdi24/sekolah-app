
    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('message'))
                <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded shadow">
                    {{ session('message') }}
                </div>
            @endif

            <livewire:kelas.form />

            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Daftar Kelas</h3>

                <table class="w-full table-auto border border-gray-300 dark:border-gray-600 text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-left text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="px-3 py-2 border dark:border-gray-600">No.</th>
                            <th class="px-3 py-2 border dark:border-gray-600">Nama Kelas</th>
                            <th class="px-3 py-2 border dark:border-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-100">
                        @forelse ($kelasList as $index => $kelas)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-3 py-2 border dark:border-gray-600">{{ $index + 1 }}</td>
                                <td class="px-3 py-2 border dark:border-gray-600">{{ $kelas->nama }}</td>
                                <td class="px-3 py-2 border dark:border-gray-600 space-x-2">
                                    <button wire:click="edit({{ $kelas->id }})"
                                            class="text-blue-600 hover:underline">Edit</button>
                                    <button wire:click="delete({{ $kelas->id }})"
                                            class="text-red-600 hover:underline"
                                            onclick="return confirm('Yakin ingin menghapus kelas ini?')">Hapus</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-gray-500 dark:text-gray-400">
                                    Belum ada data kelas
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

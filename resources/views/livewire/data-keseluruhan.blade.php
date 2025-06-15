<div class="max-w-6xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Data Keseluruhan</h1>

    <div class="flex mb-4">
        <input wire:model.lazy="search" type="text" placeholder="Cari kelas, siswa, atau guru..."
               class="border p-2 rounded w-full">
    </div>

    <table class="w-full bg-white rounded shadow text-left">
        <thead>
            <tr class="border-b">
                <th class="px-3 py-2 border dark:border-gray-600">No.</th>
                <th class="p-3">Kelas</th>
                <th class="p-3">Nama Siswa</th>
                <th class="p-3">Nama Guru</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kelasList as $index => $kelas)
                <tr class="border-b align-top">
                    <td class="px-3 py-2 border dark:border-gray-600">{{ $index + 1 }}</td>
                    <td class="p-3 font-bold">{{ $kelas->nama }}</td>
                    <td class="p-3">
                        @forelse($kelas->siswas as $siswa)
                            <div>{{ $siswa->nama }}</div>
                        @empty
                            <div>-</div>
                        @endforelse
                    </td>
                    <td class="p-3">
                        @forelse($kelas->gurus as $guru)
                            <div>{{ $guru->nama }}</div>
                        @empty
                            <div>-</div>
                        @endforelse
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="p-3 text-center">Tidak ada data ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

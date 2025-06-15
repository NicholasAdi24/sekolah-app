<div class="max-w-6xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Data Keseluruhan</h1>

    <div class="flex mb-4">
        <input wire:model.lazy="search" type="text" placeholder="Cari nama siswa atau guru..."
               class="border p-2 rounded w-full">
    </div>

    <table class="w-full bg-white rounded shadow text-left">
        <thead>
            <tr class="border-b">
                <th class="p-3">Nama Siswa</th>
                <th class="p-3">Kelas</th>
                <th class="p-3">Guru</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $siswa)
                <tr class="border-b">
                    <td class="p-3">{{ $siswa->nama }}</td>
                    <td class="p-3">{{ $siswa->kelas->nama ?? '-' }}</td>
                    <td class="p-3">
                        @if ($siswa->kelas && $siswa->kelas->gurus->count())
                            {{ $siswa->kelas->gurus->pluck('nama')->join(', ') }}
                        @else
                            -
                        @endif
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

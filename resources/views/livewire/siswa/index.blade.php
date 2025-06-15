<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Kelola Siswa</h1>

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="bg-white dark:bg-gray-800 p-4 rounded shadow mb-6">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" wire:model="nama" class="w-full rounded p-2 bg-gray-100 dark:bg-gray-700">
            @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>NIS</label>
            <input type="text" wire:model="nis" class="w-full rounded p-2 bg-gray-100 dark:bg-gray-700">
            @error('nis') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <select wire:model="kelas_id" class="w-full rounded p-2 bg-gray-100 dark:bg-gray-700">
                <option value="">Pilih Kelas</option>
                @foreach ($kelasList as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                @endforeach
            </select>
            @error('kelas_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                {{ $isEdit ? 'Update' : 'Simpan' }}
            </button>
            @if($isEdit)
                <button type="button" wire:click="resetForm" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">Batal</button>
            @endif
        </div>
    </form>

    <div class="mb-6">
        <span class="font-semibold">Sortir berdasarkan Kelas:</span>
        <div class="flex flex-wrap gap-2 mt-2">
            <button wire:click="filterByKelas(null)"
                class="px-3 py-1 rounded {{ is_null($filterKelasId) ? 'bg-blue-600 text-white' : 'bg-gray-200 dark:bg-gray-700' }}">
                Semua
            </button>
            @foreach ($kelasList as $kelas)
                <button wire:click="filterByKelas({{ $kelas->id }})"
                    class="px-3 py-1 rounded {{ $filterKelasId == $kelas->id ? 'bg-blue-600 text-white' : 'bg-gray-200 dark:bg-gray-700' }}">
                    {{ $kelas->nama }} 

                </button>
            @endforeach
        </div>
    </div>


  <table class="w-full bg-white dark:bg-gray-800 rounded shadow text-left">
    <thead>
        <tr class="border-b dark:border-gray-700">
            <th class="px-3 py-2 border dark:border-gray-600">No.</th>
            <th class="p-3">Kelas</th>
            <th class="p-3">Nama Siswa</th>
            <th class="p-3">NIS</th>
            <th class="p-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kelasList as $index => $kelas)
            <tr class="border-b dark:border-gray-700 align-top">
                <td class="px-3 py-2 border dark:border-gray-600">{{ $index + 1 }}</td>
                <td class="p-3 font-bold">{{ $kelas->nama }}</td>

                <td class="p-3">
                    @forelse ($kelas->siswas as $siswa)
                        <div>{{ $siswa->nama }}</div>
                    @empty
                        <div>-</div>
                    @endforelse
                </td>

                <td class="p-3">
                    @forelse ($kelas->siswas as $siswa)
                        <div>{{ $siswa->nis }}</div>
                    @empty
                        <div>-</div>
                    @endforelse
                </td>

                <td class="p-3">
                    @forelse ($kelas->siswas as $siswa)
                        <div class="flex gap-1 mb-1">
                            <button wire:click="edit({{ $siswa->id }})" class="text-blue-500 hover:underline">Edit</button>
                            <button wire:click="delete({{ $siswa->id }})" class="text-red-500 hover:underline">Hapus</button>
                        </div>
                    @empty
                        <div>-</div>
                    @endforelse
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="p-3 text-center">Tidak ada data ditemukan</td>
            </tr>
        @endforelse
    </tbody>
</table>

</div>

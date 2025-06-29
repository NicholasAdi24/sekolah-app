<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Kelola Orang Tua</h1>

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="bg-white dark:bg-gray-800 p-4 rounded shadow mb-6">
        <div class="mb-3">
            <label>Nama Orang Tua</label>
            <input type="text" wire:model="nama" class="w-full rounded p-2 bg-gray-100 dark:bg-gray-700">
            @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Orang Tua dari</label>
            <select wire:model="siswa_id" class="w-full rounded p-2 bg-gray-100 dark:bg-gray-700">
                <option value="">Pilih Siswa</option>
                @foreach ($siswas as $siswa)
                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                @endforeach
            </select>
            @error('siswa_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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



  <table class="w-full bg-white dark:bg-gray-800 rounded shadow text-left">
    <thead>
        <tr class="border-b dark:border-gray-700">
            <th class="px-3 py-2">No.</th>
            <th class="p-3">Nama OrangTua</th>
            <th class="p-3">Nama Siswa</th>
            <th class="p-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($orangtuas as $index=>$orangtua)
            <tr class="border-b dark:border-gray-700 align-top">
                <td class="px-3 py-2 ">{{ $index + 1 }}</td>
                <td class="p-3 font-bold">{{ $orangtua->nama }}</td>

                <td class="p-3">{{ $orangtua->siswa->nama ?? '-' }}</td>

                <td class="p-3">
                    <div class="flex gap-1 mb-1">
                        <button wire:click="edit({{ $orangtua->id }})" class="text-blue-500 hover:underline">Edit</button>
                        <button wire:click="delete({{ $orangtua->id }})" class="text-red-500 hover:underline">Hapus</button>
                    </div>
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

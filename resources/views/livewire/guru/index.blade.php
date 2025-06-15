<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Kelola Guru</h1>

    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="bg-white dark:bg-gray-800 p-4 rounded shadow mb-6">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" wire:model="nama" class="w-full rounded p-2 bg-gray-100 dark:bg-gray-700">
            @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>NIP</label>
            <input type="text" wire:model="nip" class="w-full rounded p-2 bg-gray-100 dark:bg-gray-700">
            @error('nip') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <select wire:model="kelas_id" multiple class="w-full rounded p-2 bg-gray-100 dark:bg-gray-700">
                <option disabled>Pilih Kelas</option>
                @foreach ($kelasList as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                @endforeach
            </select>
            @error('kelas_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                {{ $isEdit ? 'Update' : 'Simpan' }}
            </button>
            @if($isEdit)
                <button type="button" wire:click="resetForm" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">Batal</button>
            @endif
        </div>
    </form>


    <div class="mb-4 flex flex-wrap gap-2">
        <button wire:click="setFilterKelas(null)" class="px-3 py-1 rounded bg-gray-500 text-white {{ $filterKelasId === null ? 'font-bold' : '' }}">
            Semua Kelas
        </button>
        @foreach($kelasList as $kelas)
            <button wire:click="setFilterKelas({{ $kelas->id }})" class="px-3 py-1 rounded bg-blue-600 text-white {{ $filterKelasId === $kelas->id ? 'font-bold' : '' }}">
                {{ $kelas->nama }}
            </button>
        @endforeach
    </div>


    <table class="w-full bg-white dark:bg-gray-800 rounded shadow text-left">
        <thead>
            <tr class="border-b dark:border-gray-700">
                <th class="p-3">Nama</th>
                <th class="p-3">NIP</th>
                <th class="p-3">Kelas</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($gurus as $guru)
        <tr class="border-b dark:border-gray-700">
            <td class="p-3">{{ $guru->nama }}</td>
            <td class="p-3">{{ $guru->nip }}</td>
            <td class="p-3">
                @if ($guru->kelas->count())
                    {{ $guru->kelas->pluck('nama')->join(', ') }}
                @else
                    -
                @endif
            </td>

            <td class="p-3">
                <button wire:click="edit({{ $guru->id }})" class="text-blue-500 hover:underline mr-2">Edit</button>
                <button wire:click="delete({{ $guru->id }})" class="text-red-500 hover:underline">Hapus</button>
            </td>
        </tr>
    @endforeach
</tbody>

    </table>
</div>

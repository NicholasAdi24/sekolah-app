<div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow mb-6">
    <form wire:submit.prevent="save">
        <h3 class="text-lg font-semibold mb-4">{{ $editMode ? 'Edit Kelas' : 'Tambah Kelas' }}</h3>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-200">Nama Kelas</label>
            <input type="text" wire:model.defer="nama"
                   class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:outline-none"
                   placeholder="Contoh: Kelas 1A">
            @error('nama')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                {{ $editMode ? 'Update' : 'Simpan' }}
            </button>

            @if($editMode)
                <button type="button" wire:click="resetInput"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded shadow">
                    Batal
                </button>
            @endif
        </div>
    </form>
</div>

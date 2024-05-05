<div>
    <label for="subkategori" class="text-sm font-medium">Sub Kategori</label>
    <!-- Tambahkan kondisi wire:loading untuk menampilkan "Loading..." -->
    <select wire:model="selectedSubkategori" id="subkategori"
        class="border border-gray-500/55 w-full h-10 rounded mt-1 outline-primary p-2 appearance-none"
        wire:change="subkategoriSelected($event.target.value)" required>
        <option value="" wire:loading>Pilih Sub Kategori</option>
        <option value="" wire:loading.remove>Pilih Sub Kategori</option>
        @foreach ($subkategoriOptions as $subkategori)
            <option value="{{ $subkategori->id }}">{{ $subkategori->nama }}</option>
        @endforeach
    </select>
    <!-- Tambahkan kondisi wire:loading untuk menampilkan "Loading..." -->
    <span wire:loading>Loading...</span>
</div>

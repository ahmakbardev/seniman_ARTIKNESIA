<div>
    <label for="jeniskarya" class="text-sm font-medium">Jenis Karya</label>
    <select wire:model="selectedJenisKarya" id="jenisKarya"
        class="border border-gray-500/55 w-full h-10 rounded mt-1 outline-primary p-2 appearance-none"
        wire:change="jenisKaryaSelected($event.target.value)">
        <option value="">Pilih Jenis Karya</option>
        @foreach ($jenisKaryaOptions as $jenisKarya)
            <option value="{{ $jenisKarya->id }}">{{ $jenisKarya->nama }}</option>
        @endforeach
    </select>
</div>
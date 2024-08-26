<form wire:submit.prevent="submitForm" class="my-5 flex flex-col gap-3">
    <div class="">
        <label for="email" class="text-sm font-medium">Email</label>
        <input wire:model="email" type="email" id="email"
               class="border border-gray-500/55 w-full h-10 rounded mt-1 outline-primary p-3">
        @error('email')
        <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    </div>
    <div class="">
        <label for="alamat" class="text-sm font-medium">Alamat</label>
        <input wire:model="alamat" type="text" id="alamat"
               class="border border-gray-500/55 w-full h-10 rounded mt-1 outline-primary p-3">
        @error('alamat')
        <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    </div>
    @if (Route::currentRouteName() === 'login')
        {{-- <div class="grid grid-cols-2 gap-3">
            <div>
                <label for="provinsi" class="text-sm font-medium">Provinsi</label>
                <select wire:model="selectedProvinsi" id="provinsi"
                    class="border border-gray-500/55 w-full h-10 rounded mt-1 outline-primary p-2 appearance-none">
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinsis as $provinsi)
                        <option value="{{ $provinsi->id }}">{{ $provinsi->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="kota" class="text-sm font-medium">Kota</label>
                <select wire:model="selectedKota" id="kota"
                    class="border border-gray-500/55 w-full h-10 rounded mt-1 outline-primary p-2 appearance-none">
                    <option value="">Pilih Kota</option>
                    @foreach ($kotas as $kota)
                        <option value="{{ $kota->id }}">{{ $kota->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}
    @endif

    <div class="grid md:grid-cols-2 gap-3">
        <div>
            <livewire:jenis-karya-selector/>
        </div>

        <div>
            <livewire:sub-kategori-selector/>
        </div>
    </div>


    <div class="">
        <label for="paket" class="text-sm font-medium">Paket</label>
        <select wire:model="paket" id="paket"
                class="border border-gray-500/55 w-full h-10 rounded mt-1 outline-primary p-2 after:w-[8px] after:h-[8px] appearance-none peer/chev">
            <option>Paket disini</option>
            @foreach ($pakets as $paket)
                <option value="{{ $paket->id }}">{{ $paket->nama }} -
                    Rp. {{ number_format($paket->harga, 0, ',', '.') }}</option>
            @endforeach
        </select>
        @error('paket')
        <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    </div>
    <div class="relative">
        <label for="password" class="text-sm font-medium">Password</label>
        <div class="relative">
            <input wire:model="password" type="{{ $showPassword ? 'text' : 'password' }}" id="password"
                   class="border border-gray-500/55 w-full h-10 rounded mt-1 outline-primary p-3">
            <button type="button" wire:click="togglePasswordVisibility"
                    class="absolute right-3 top-1/2 -translate-y-1/3">
                <i class="fa-regular fa-eye"></i></button>
        </div>
        @error('password')
        <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    </div>
    <div class="relative">
        <label for="confirmPassword" class="text-sm font-medium">Confirm Password</label>
        <div class="relative">
            <input wire:model="confirmPassword" type="{{ $showConfirmPassword ? 'text' : 'password' }}"
                   id="confirmPassword" class="border border-gray-500/55 w-full h-10 rounded mt-1 outline-primary p-3">
            <button type="button" wire:click="toggleConfirmPasswordVisibility"
                    class="absolute right-3 top-1/2 -translate-y-1/3">
                <i class="fa-regular fa-eye"></i></button>
        </div>
        @error('confirmPassword')
        <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit"
            class="bg-primary hover:bg-primary-darker transition-all ease-in-out text-white font-semibold py-2 rounded shadow-lg mt-4">
        Register
    </button>
</form>

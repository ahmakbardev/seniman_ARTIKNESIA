<div>
    <div wire:loading class="">Loading....</div>
    <form wire:submit.prevent="login" class="md:my-5 flex flex-col gap-3">
        <div class="">
            <label for="idOrEmail" class="text-sm font-medium">ID_Seniman/Email</label>
            <input wire:model="idOrEmail" type="text" id="idOrEmail"
                class="border w-full h-10 rounded mt-1 outline-primary p-3">
            @error('idOrEmail')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <label for="password" class="text-sm font-medium">Password</label>
            <input wire:model="password" type="password" id="password"
                class=" border w-full h-10 rounded mt-1 outline-primary p-3">
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="bg-primary hover:bg-primary-darker transition-all ease-in-out text-white font-semibold py-2 rounded shadow-lg mt-4">Login</button>
    </form>
</div>

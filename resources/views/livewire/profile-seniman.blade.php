<div>
    @push('title', 'Profile Kamu')
    <span
        class="flex items-center justify-between p-4 mb-8 text-sm font-semibold bg-primary rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                </path>
            </svg>
            <!-- Tampilkan nama paket -->
            <span>Selamat kamu berlangganan {{ $user->paket->nama }}</span>
        </div>
        <span>View more &RightArrow;</span>
    </span>

    <!-- Cards -->
    <div class="grid gap-3 mb-8">
        <!-- Card -->
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 p-6 gap-3 bg-white rounded-lg shadow-xs dark:bg-gray-800 relative">
            <div
                class="p-3 max-lg:mx-auto sm:max-lg:col-span-2 max-lg:my-3 aspect-square min-w-24 max-w-48 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-primary">
                <img class="aspect-square rounded-full"
                    src="{{ asset($user->profile_pic ?: 'assets/images/login/banner.png') }}" alt="">
            </div>
            <div class="flex flex-col justify-between">
                <!-- Jika sedang mode edit, tampilkan input untuk username -->
                @if ($isEditing)
                    <input type="text" wire:model="username"
                        class="block w-full mt-1 text-sm border-gray-600 p-3 rounded-md bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input">
                @else
                    <p class="text-2xl font-semibold text-gray-700 dark:text-gray-200 truncate hover:text-clip">
                        {{ $user->username }}</p>
                @endif
                <!-- Tampilkan nama subkategori -->
                <p class="text-base font-semibold text-gray-500 ">{{ $subkategoriName }} artist</p>

                <div class="flex flex-col">
                    <p class="text-base mt-5 font-semibold text-gray-300">Bio</p>
                    <!-- Jika sedang mode edit, tampilkan input untuk deskripsi diri -->
                    @if ($isEditing)
                        <textarea wire:model="deskripsiDiri"
                            class="block w-full mt-1 text-sm border-gray-600 p-3 rounded-md bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input"
                            style="resize: none"></textarea>
                    @else
                        <p class="text-base font-semibold text-gray-500">
                            {{ $user->deskripsi_diri ?: 'Belum ada deskripsi diri' }}</p>
                    @endif
                    <p class="text-base mt-3 font-semibold text-gray-300">Alamat</p>
                    <!-- Jika sedang mode edit, tampilkan input untuk alamat -->
                    @if ($isEditing)
                        <input type="text" wire:model="alamat"
                            class="block w-full mt-1 text-sm border-gray-600 p-3 rounded-md bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input">
                    @else
                        <p class="text-base font-semibold text-gray-500">{{ $user->alamat }}</p>
                    @endif
                </div>
            </div>
            <div class="flex flex-col justify-end">
                <p class="text-base font-semibold text-gray-200">ID_Seniman</p>
                <!-- Tampilkan email -->
                <p class="text-base font-semibold text-gray-500">{{ $user->id_seniman }}</p>

                <p class="text-base mt-3 font-semibold text-gray-200">Email</p>
                <!-- Tampilkan email -->
                <p class="text-base font-semibold text-gray-500">{{ $user->email }}</p>
                <p class="text-base mt-3 font-semibold text-gray-300">Jenis karya</p>
                <!-- Tampilkan nama jenis karya -->
                <p class="text-base font-semibold text-gray-500">{{ $user->jenisKarya->nama }}</p>
                <p class="text-base mt-3 font-semibold text-gray-300">Kategori</p>
                <!-- Tampilkan nama subkategori -->
                <p class="text-base font-semibold text-gray-500">{{ $subkategoriName }}</p>
            </div>
            <div class="flex gap-3 items-center h-fit absolute top-3 right-3 xl:relative">
                <!-- Jika belum mode edit, tampilkan tombol Edit Data -->
                @if (!$isEditing)
                    <div wire:click="edit" class="flex gap-3 items-center h-fit">
                        <button
                            class="order-2 xl:order-1 btn-color-outline peer h-fit bg-transparent rounded-full px-3 aspect-square hover:btn-color-fill hover:text-black transition-all ease-in-out"><i
                                class="fa-solid fa-pen"></i></button>
                        <p
                            class="order-1 xl:order-2 text-white peer-hover:bg-primary peer-hover:text-black peer-hover:px-4 peer-hover:py-2 peer-hover:font-semibold invisible peer-hover:visible rounded-md transition-all ease-in-out">
                            Edit Data</p>
                    </div>

                    <!-- Jika sudah mode edit, tampilkan tombol Submit dan Cancel -->
                @else
                    <div class="relative">
                        <button wire:click="cancel"
                            class="btn-color-outline hover:ring-0 peer h-fit bg-transparent rounded-full px-4 pt-1 aspect-square hover:bg-red-500 hover:text-black transition-all ease-in-out">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        <p
                            class="hidden md:inline text-white absolute text-xs top-1/2 -translate-y-1/2 -left-20 peer-hover:bg-primary peer-hover:text-black peer-hover:px-4 peer-hover:py-2 peer-hover:font-semibold invisible peer-hover:visible rounded-md transition-all ease-in-out">
                            Cancel</p>
                    </div>
                    <div class="relative">
                        <button wire:click="submit"
                            class="btn-color-fill text-black peer h-fit rounded-full px-4 pt-1 aspect-square hover:bg-transparent hover:bg-green-500 transition-all ease-in-out">
                            <i class="fa-solid fa-check"></i>
                        </button>
                        <p
                            class="hidden md:inline text-white absolute text-xs top-1/2 -translate-y-1/2 -right-20 peer-hover:bg-primary peer-hover:text-black peer-hover:px-4 peer-hover:py-2 peer-hover:font-semibold invisible peer-hover:visible rounded-md transition-all ease-in-out">
                            Cancel</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

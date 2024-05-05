<div class="flex justify-center items-center h-screen">
    {{-- <div wire:loading id="loadingModal"
        class="fixed block top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 items-center justify-center z-50">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <p>Loading...</p>
        </div>
    </div> --}}

    <div wire:loading class="fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-5">
        <div class="max-h-full absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 w-full max-w-md overflow-y-auto sm:rounded-2xl bg-white">
          <div class="w-full">
            <div class="m-8 my-10 max-w-[400px] mx-auto">
              <div class="mb-8">
                <h1 class="mb-4 text-3xl font-extrabold">Loading ...</h1>
                <p class="text-gray-600">Tunggu sebentar ..</p>
              </div> 
            </div>
          </div>
        </div>
      </div>

    <div class=" border max-w-screen-xs p-5 rounded-xl">
        <form wire:submit.prevent="submitConfirmation" class="flex flex-col gap-3" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="email" class="text-sm font-medium">Email</label>
                <!-- Tampilkan email sebagai teks -->
                <input type="hidden" id="email" wire:model="email" value="{{ $email }}">
                <span class=" w-full h-10 rounded mt-1">{{ $email }}</span>
            </div>
            <div class="mb-3">
                <label for="alamat" class="text-sm font-medium">Alamat</label>
                <!-- Tampilkan alamat sebagai teks -->
                <input type="hidden" id="alamat" wire:model="alamat" value="{{ $alamat }}">
                <span class=" w-full h-10 rounded mt-1">{{ $alamat }}</span>
            </div>
            <div class="mb-3">
                <label for="paket" class="text-sm font-medium">Paket</label>
                <!-- Tampilkan paket sebagai teks -->
                <input type="hidden" id="paket" wire:model="paket" value="{{ $paket }}">
                <span class=" w-full h-10 rounded mt-1">{{ $paket }}</span>
            </div>
            <div class="mb-3">
                <label for="jenis_karya" class="text-sm font-medium">Jenis Karya</label>
                <!-- Tampilkan jenis karya sebagai teks -->
                <input type="hidden" id="jenis_karya" wire:model="jenis_karya" value="{{ $jenis_karya }}">
                <span class=" w-full h-10 rounded mt-1">{{ $jenisKaryaNama }}</span>
            </div>
            <div class="mb-3">
                <label for="subkategori" class="text-sm font-medium">Sub Kategori</label>
                <!-- Tampilkan subkategori sebagai teks -->
                <input type="hidden" id="subkategori" wire:model="subkategori" value="{{ $subkategori }}">
                <span class=" w-full h-10 rounded mt-1">{{ $subkategoriNama }}</span>
            </div>


            <div class="mb-3">
                <label for="confirmationImage" class="text-sm font-medium">Konfirmasi Pembayaran</label>
                <input wire:model="confirmationImage" type="file" id="confirmationImage"
                    class=" w-full h-10 rounded mt-1">
                @error('confirmationImage')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="bg-primary hover:bg-primary-darker transition-all ease-in-out text-white font-semibold py-2 rounded shadow-lg mt-4"
                wire:loading.attr="disabled" wire:target="submitConfirmation" onclick="showLoadingModal()">
                Kirim Konfirmasi Pembayaran
            </button>
        </form>
    </div>

</div>

<div class="w-full mx-auto mb-5">
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.354 5.646a.5.5 0 0 0-.708 0L10 9.293 5.354 5.646a.5.5 0 0 0-.708.708L9.293 10l-4.647 4.646a.5.5 0 0 0 .708.708L10 10.707l4.646 4.647a.5.5 0 0 0 .708-.708L10.707 10l4.647-4.646a.5.5 0 0 0 0-.708z" />
                </svg>
            </span>
        </div>
    @endif
    <form wire:submit.prevent="tambahKarya" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <label class="block text-sm">
                <span class="text-gray-400">Nama</span>
                <input wire:model="name"
                    class="block w-full mt-1 text-sm border-gray-600 p-3 rounded-md bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input"
                    placeholder="Jane Doe" />
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <label class="block text-sm">
                <p class="text-gray-400">Gambar Karya <span class="text-primary">(bisa lebih dari 1 gambar)</span></p>
                <input wire:model="images" type="file" id="images" multiple
                    class="block w-full mt-1 text-sm border-gray-600 p-3 rounded-md bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-darker" />
                @error('images')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
        </div>
        <label class="block text-sm">
            <p class="text-gray-400">Jenis Karya <span class="text-primary">(tersetting secara default sesuai dengan
                    jenis karya yang didaftarkan)</span></p>
            <input type="text" id="category_id" value="{{ $category_id }}"
                class="block w-full mt-1 text-sm border-gray-600 p-3 hidden rounded-md bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input" />
            <span
                class="block w-full mt-1 text-sm border-gray-600 p-3 rounded-md bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input">{{ $jenisKarya }}</span>
        </label>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <label class="block text-sm">
                <span class="text-gray-400">Ukuran (Panjang Horizontal)</span>
                <input wire:model="size_x" type="number" id="size_x"
                    class="block w-full mt-1 text-sm border-gray-600 p-3 rounded-md bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input"
                    placeholder="Ukuran Horizontal" />
                @error('size_x')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <label class="block text-sm">
                <span class="text-gray-400">Ukuran (Panjang Vertikal)</span>
                <input wire:model="size_y" type="number" id="size_y"
                    class="block w-full mt-1 text-sm border-gray-600 p-3 rounded-md bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input"
                    placeholder="Ukuran Vertikal" />
                @error('size_y')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <label class="block text-sm">
                <span class="text-gray-400">Berat</span>
                <input wire:model="weight" type="number" id="weight"
                    class="block w-full mt-1 text-sm border-gray-600 p-3 rounded-md bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input"
                    placeholder="1 'tanpa kg, g, dll'" />
                @error('weight')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
            <label class="block text-sm">
                <span class="text-gray-400">Bahan</span>
                <input wire:model="material" type="text" id="material"
                    class="block w-full mt-1 text-sm border-gray-600 p-3 rounded-md bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input"
                    placeholder="Kanvas" />
                @error('material')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
        </div>
        <label class="block text-sm">
            <span class="text-gray-400">Filosofi Karya</span>
            <textarea wire:model="philosophy" id="philosophy" rows="3"
                class="block w-full mt-1 text-sm border-gray-600 p-3 rounded-md bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input"
                style="resize: none" placeholder="Tulis filosofi karyamu disini ..."></textarea>
            @error('philosophy')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </label>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <label class="block text-sm">
                <span class="text-gray-400">Harga</span>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">Rp</span>
                    </div>
                    <input wire:model.lazy="price" type="text" id="priceInput"
                        class="block w-full pl-10 pr-4 mt-1 text-sm border-gray-600 p-3 rounded-md bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input"
                        placeholder="Berapa harga karyamu" />
                    <!-- Tambahkan span untuk menampilkan format Rupiah -->
                    <span id="formattedPrice"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 sm:text-sm">

                    </span>
                </div>
                @error('price')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <script>
                // Fungsi untuk memformat angka menjadi format Rupiah
                function formatRupiah(angka) {
                    var reverse = angka.toString().split('').reverse().join(''),
                        ribuan = reverse.match(/\d{1,3}/g);
                    ribuan = ribuan.join('.').split('').reverse().join('');
                    return 'Rp ' + ribuan;
                }

                // Ambil input dan span untuk menampilkan format Rupiah
                const inputPrice = document.getElementById('priceInput');
                const formattedPrice = document.getElementById('formattedPrice');

                // Tambahkan event listener untuk menampilkan format Rupiah secara real-time
                inputPrice.addEventListener('input', function() {
                    // Ambil nilai input
                    let value = inputPrice.value;
                    // Hapus "Rp" dan semua karakter selain angka
                    let plainNumber = value.replace(/[^\d]/g, '');
                    // Format menjadi Rupiah
                    let rupiah = formatRupiah(plainNumber);
                    // Tampilkan format Rupiah di span
                    formattedPrice.textContent = rupiah;
                });
            </script>


            <label class="block text-sm">
                <span class="text-gray-400">Stok</span>
                <input wire:model="stock" type="number" id="stock"
                    class="block w-full mt-1 text-sm border-gray-600 p-3 rounded-md bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input"
                    placeholder="Berapa stock karyamu" />
                @error('stock')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <div>
            <button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Tambah
                Karya</button>
        </div>
    </form>
</div>

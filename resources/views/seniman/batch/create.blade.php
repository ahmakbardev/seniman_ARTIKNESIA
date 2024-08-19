@extends('seniman.layouts.layout')
@push('title', 'Tambah Karya')

@section('seniman_content')
    <div class="-mt-20 w-full mx-auto mb-5 p-6">
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                 role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('message') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                                d="M14.354 5.646a.5.5 0 0 0-.708 0L10 9.293 5.354 5.646a.5.5 0 0 0-.708.708L9.293 10l-4.647 4.646a.5.5 0 0 0 .708.708L10 10.707l4.646 4.647a.5.5 0 0 0 .708-.708z"/>
                    </svg>
                </span>
            </div>
        @endif
        <div class="card shadow-lg p-6">
            <form action="{{ route('seniman.karya.store', ['locale' => app()->getLocale()]) }}" method="POST"
                  enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label class="block text-sm">
                        <span class="text-gray-800">Nama</span>
                        <input name="name" value="{{ old('name') }}"
                               class="block w-full border mt-1 text-sm border-gray-300 p-3 rounded-md bg-white focus:border-primary focus:outline-none focus:shadow-outline-primary text-gray-700 focus:shadow-outline-gray form-input"
                               placeholder="Jane Doe"/>
                        @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="block text-sm">
                        <p class="text-gray-800">Gambar Karya <span
                                    class="text-primary">(bisa lebih dari 1 gambar)</span>
                        </p>
                        <input name="images[]" type="file" id="images" multiple
                               class="block w-full border mt-1 text-sm border-gray-300 p-3 rounded-md bg-white focus:border-primary focus:outline-none focus:shadow-outline-primary text-gray-700 focus:shadow-outline-gray form-input file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-darker"/>
                        @error('images')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <label class="block text-sm">
                    <p class="text-gray-800">Jenis Karya <span class="text-primary">(tersetting secara default sesuai dengan
                            jenis karya yang didaftarkan)</span></p>
                    <input type="text" id="category_id" name="category_id" value="{{ $category_id }}" hidden/>
                    <span
                            class="block w-full border mt-1 text-sm border-gray-300 p-3 rounded-md bg-white focus:border-primary focus:outline-none focus:shadow-outline-primary text-gray-700 focus:shadow-outline-gray form-input">{{ $jenisKarya }}</span>
                </label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label class="block text-sm">
                        <span class="text-gray-800">Ukuran (Panjang Horizontal)</span>
                        <input name="size_x" type="number" id="size_x" value="{{ old('size_x') }}"
                               class="block w-full border mt-1 text-sm border-gray-300 p-3 rounded-md bg-white focus:border-primary focus:outline-none focus:shadow-outline-primary text-gray-700 focus:shadow-outline-gray form-input"
                               placeholder="Ukuran Horizontal"/>
                        @error('size_x')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-800">Ukuran (Panjang Vertikal)</span>
                        <input name="size_y" type="number" id="size_y" value="{{ old('size_y') }}"
                               class="block w-full border mt-1 text-sm border-gray-300 p-3 rounded-md bg-white focus:border-primary focus:outline-none focus:shadow-outline-primary text-gray-700 focus:shadow-outline-gray form-input"
                               placeholder="Ukuran Vertikal"/>
                        @error('size_y')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label class="block text-sm">
                        <span class="text-gray-800">Berat</span>
                        <input name="weight" type="number" id="weight" value="{{ old('weight') }}"
                               class="block w-full border mt-1 text-sm border-gray-300 p-3 rounded-md bg-white focus:border-primary focus:outline-none focus:shadow-outline-primary text-gray-700 focus:shadow-outline-gray form-input"
                               placeholder="1 'tanpa kg, g, dll'"/>
                        @error('weight')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-800">Bahan</span>
                        <input name="material" type="text" id="material" value="{{ old('material') }}"
                               class="block w-full border mt-1 text-sm border-gray-300 p-3 rounded-md bg-white focus:border-primary focus:outline-none focus:shadow-outline-primary text-gray-700 focus:shadow-outline-gray form-input"
                               placeholder="Kanvas"/>
                        @error('material')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <label class="block text-sm">
                    <span class="text-gray-800">Filosofi Karya</span>
                    <textarea name="philosophy" id="philosophy" rows="3"
                              class="block w-full border mt-1 text-sm border-gray-300 p-3 rounded-md bg-white focus:border-primary focus:outline-none focus:shadow-outline-primary text-gray-700 focus:shadow-outline-gray form-input"
                              style="resize: none"
                              placeholder="Tulis filosofi karyamu disini ...">{{ old('philosophy') }}</textarea>
                    @error('philosophy')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label class="block text-sm">
                        <span class="text-gray-800">Harga</span>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">Rp</span>
                            </div>
                            <input name="price" type="text" id="priceInput" value="{{ old('price') }}"
                                   class="block w-full border pl-10 pr-4 mt-1 text-sm border-gray-300 p-3 rounded-md bg-white focus:border-primary focus:outline-none focus:shadow-outline-primary text-gray-700 focus:shadow-outline-gray form-input"
                                   placeholder="Berapa harga karyamu"/>
                            <span id="formattedPrice"
                                  class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 sm:text-sm"></span>
                        </div>
                        @error('price')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="block text-sm">
                        <span class="text-gray-800">Stok</span>
                        <input name="stock" type="number" id="stock" value="{{ old('stock') }}"
                               class="block w-full border mt-1 text-sm border-gray-300 p-3 rounded-md bg-white focus:border-primary focus:outline-none focus:shadow-outline-primary text-gray-700 focus:shadow-outline-gray form-input"
                               placeholder="Berapa stock karyamu"/>
                        @error('stock')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>

                <div>
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary-darker focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Tambah Karya
                    </button>
                </div>
            </form>
        </div>
    </div>

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
        inputPrice.addEventListener('input', function () {
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
@endsection

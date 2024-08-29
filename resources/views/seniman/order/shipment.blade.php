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
            <form action="{{ route('seniman.order.shipment.update', ['locale' => app()->getLocale(), 'shipment'=> $shipment->id]) }}"
                  method="POST" class="space-y-4">
                @csrf
                @method('put')
                <label class="block text-sm">
                    <span class="text-gray-800">Masukan Resi Pengiriman</span>
                    <input type="text" name="resi" value="{{ old('resi') }}"
                           class="block w-full border mt-1 text-sm border-gray-300 p-3 rounded-md bg-white focus:border-primary focus:outline-none focus:shadow-outline-primary text-gray-700 focus:shadow-outline-gray form-input"/>
                    @error('resi')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </label>
                <div>
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary-darker focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Submit
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

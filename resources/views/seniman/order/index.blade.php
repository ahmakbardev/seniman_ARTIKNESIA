@extends('seniman.layouts.layout')
@push('title', 'List Karya')

@section('seniman_content')
    <div class="-mt-12 mb-5 mx-6 grid grid-cols-1 grid-rows-1 grid-flow-row-dense gap-6">
        <div class="">
            <div class="card h-full shadow">
                <!-- heading -->
                <div class="border-b border-gray-300 px-5 py-4 flex justify-between items-center">
                    <h4 class="font-semibold">Daftar Transaksi</h4>
                </div>

                <div class="relative overflow-x-auto overflow-y-auto" style="max-height: 300px" data-simplebar="">
                    <!-- table -->
                    <table class="text-left w-full whitespace-nowrap">
                        <thead class="text-gray-700">
                        <tr>
                            <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Invoice</th>
                            <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Customer</th>
                            <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Status</th>
                            <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Total</th>
                            <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($orders->isEmpty())
                            <tr>
                                <td colspan="6" class="border-b border-gray-300 font-medium py-3 px-6 text-center">No
                                    Tidak ada transaksi
                                </td>
                            </tr>
                        @else
                            @foreach ($orders as $item)
                                <tr>

                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <h5 class="mb-1 ml-4">{{ $item->invoice }}</h5>
                                        </div>
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <h5 class="mb-1 ml-4">{{ $item->customer->name }}</h5>
                                        </div>
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <h5 class="mb-1 ml-4">{{ $item->status }}</h5>
                                        </div>
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <h5 class="mb-1 ml-4">{{ $item->total_price }}</h5>
                                        </div>
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <a href="{{ route('seniman.order.show',['locale' => app()->getLocale(), 'order' => $item->id]) }}"
                                               class="text-primary">Detail</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

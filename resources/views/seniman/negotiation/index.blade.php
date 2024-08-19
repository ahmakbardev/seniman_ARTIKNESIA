@extends('seniman.layouts.layout')
@push('title', 'List Karya')

@section('seniman_content')
    <div class="-mt-12 mb-5 mx-6 grid grid-cols-1 grid-rows-1 grid-flow-row-dense gap-6">
        <div class="">
            <div class="card h-full shadow">
                <!-- heading -->
                <div class="border-b border-gray-300 px-5 py-4 flex justify-between items-center">
                    <a href="{{ route('seniman.batch.index', [app()->getLocale()]) }}">Kembali</a>
                    <h4 class="font-semibold">List Negosiasi Batch {{ $batch->batch }}</h4>
                </div>

                <div class="relative overflow-x-auto overflow-y-auto" style="max-height: 300px" data-simplebar="">
                    <!-- table -->
                    <table class="text-left w-full whitespace-nowrap">
                        <thead class="text-gray-700">
                        <tr>
                            <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Email</th>
                            <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Price</th>
                            <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Status</th>
                            @if($status)
                                <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @if ($batch->negotiations->isEmpty())
                            <tr>
                                <td colspan="6" class="border-b border-gray-300 font-medium py-3 px-6 text-center">No
                                    Batch Found
                                </td>
                            </tr>
                        @else
                            @foreach ($batch->negotiations as $item)
                                <tr>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <h5 class="mb-1 ml-4">{{ $item->customer->email }}</h5>
                                        </div>
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <h5 class="mb-1 ml-4">Rp {{ number_format($item->price, 2, ',','.') }}</h5>
                                        </div>
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <h5 class="mb-1 ml-4">{{ $item->status }}</h5>
                                        </div>
                                    </td>
                                    @if($status)
                                        <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <a href="{{ route('seniman.negotiation.accept',[app()->getLocale(),$item->id]) }}"
                                                   class="text-primary">Setujui</a>
                                            </div>
                                        </td>
                                    @endif
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

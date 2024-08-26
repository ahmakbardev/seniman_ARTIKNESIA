@extends('seniman.layouts.layout')
@push('title', 'List Karya')

@section('seniman_content')
    <div class="-mt-12 mb-5 mx-6 grid grid-cols-1 grid-rows-1 grid-flow-row-dense gap-6">
        <div class="">
            <div class="card h-full shadow">
                <!-- heading -->
                <div class="border-b border-gray-300 px-5 py-4 flex justify-between items-center">
                    <h4 class="font-semibold">List Batch</h4>
                    <button type="button"
                            class="btn gap-x-2 bg-primary text-white border-primary disabled:opacity-50 disabled:pointer-events-none hover:bg-primary-darker hover:border-primary-darker active:bg-primary-darker active:border-primary-darker focus:outline-none focus:ring-4 focus:ring-indigo-300"
                            onclick="window.location.href='{{ route('seniman.batch.create', ['locale' => app()->getLocale()]) }}'">
                        Tambah Batch
                    </button>
                </div>

                <div class="relative overflow-x-auto overflow-y-auto" style="max-height: 300px" data-simplebar="">
                    <!-- table -->
                    <table class="text-left w-full whitespace-nowrap">
                        <thead class="text-gray-700">
                        <tr>
                            <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Karya</th>
                            <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Batch</th>
                            <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">End Date Batch</th>
                            <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($negotiationBatches->isEmpty())
                            <tr>
                                <td colspan="6" class="border-b border-gray-300 font-medium py-3 px-6 text-center">No
                                    Batch Found
                                </td>
                            </tr>
                        @else
                            @foreach ($negotiationBatches as $item)
                                <tr>

                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <h5 class="mb-1 ml-4">{{ $item->product->name }}</h5>
                                        </div>
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <h5 class="mb-1 ml-4">{{ $item->batch }}</h5>
                                        </div>
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <h5 class="mb-1 ml-4">{{ $item->finish_at }}</h5>
                                        </div>
                                    </td>
                                    <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <a href="{{ route('seniman.negotiation.index',['locale' => app()->getLocale(), 'batch' => $item->id]) }}"
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

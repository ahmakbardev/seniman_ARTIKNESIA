@extends('seniman.layouts.layout')
@push('title', 'List Karya')

@section('seniman_content')
    <div class="-mt-12 mb-5 mx-6 grid grid-cols-1 grid-rows-1 grid-flow-row-dense gap-6">
        <div class="">
            <div class="card h-full shadow">
                <!-- heading -->
                <div class="border-b border-gray-300 px-5 py-4 flex justify-between items-center">
                    <h4 class="font-semibold">List Karya</h4>
                    <button type="button"
                        class="btn gap-x-2 bg-primary text-white border-primary disabled:opacity-50 disabled:pointer-events-none hover:bg-primary-darker hover:border-primary-darker active:bg-primary-darker active:border-primary-darker focus:outline-none focus:ring-4 focus:ring-indigo-300"
                        onclick="window.location.href='{{ route('seniman.karya.tambah-karya', ['locale' => app()->getLocale()]) }}'">
                        Tambah Karya
                    </button>
                </div>

                <div class="relative overflow-x-auto overflow-y-auto" style="max-height: 300px" data-simplebar="">
                    <!-- table -->
                    <table class="text-left w-full whitespace-nowrap">
                        <thead class="text-gray-700">
                            <tr>
                                <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Nama Karya</th>
                                <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Status</th>
                                <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Category</th>
                                <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Stock</th>
                                <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Gambar Karya</th>
                                <th scope="col" class="border-b font-medium bg-gray-100 px-6 py-3">Dibuat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($karyas->isEmpty())
                                <tr>
                                    <td colspan="6" class="border-b border-gray-300 font-medium py-3 px-6 text-center">No
                                        Karya Found</td>
                                </tr>
                            @else
                                @foreach ($karyas as $karya)
                                    <tr onclick="openKaryaDetailModal({{ json_encode($karya) }})"
                                        class="cursor-pointer hover:bg-slate-200 transition-all ease-in-out">
                                        <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                            <div class="flex items-center">
                                                <h5 class="mb-1 ml-4">{{ $karya->name }}</h5>
                                            </div>
                                        </td>
                                        <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                            <span
                                                class="px-2 py-1 text-sm font-medium rounded-full inline-block whitespace-nowrap text-center
                                                @if ($karya->status == 'pending') bg-yellow-200 text-yellow-700
                                                @elseif ($karya->status == 'accepted') bg-green-200 text-green-700
                                                @elseif ($karya->status == 'rejected') bg-red-200 text-red-700
                                                @else bg-gray-200 text-gray-700 @endif">
                                                {{ ucfirst($karya->status) }}
                                            </span>
                                        </td>
                                        <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                            {{ $karya->category_id }}
                                        </td>
                                        <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                            {{ $karya->stock }}
                                        </td>
                                        <td class="border-b border-gray-300 font-medium py-3 px-6 text-left">
                                            <div class="-space-x-5">
                                                @php
                                                    $images = json_decode($karya->images);
                                                @endphp
                                                @if ($images)
                                                    @foreach ($images as $image)
                                                        <img class="relative inline-block object-cover w-8 h-8 rounded-full border-white border-2 cursor-pointer"
                                                            src="{{ asset('storage/' . $image) }}" alt="Karya image" />
                                                    @endforeach
                                                @else
                                                    <span>No Images</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="border-b border-gray-300 py-3 px-6 pe-6 text-left">
                                            {{ $karya->created_at->format('d-m-Y') }}
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

    <!-- Modal -->
    <div id="karyaDetailModal"
        class="fixed inset-0 z-50 flex items-center justify-center hidden transition-opacity duration-300 opacity-0">
        <div class="fixed inset-0 bg-gray-500 opacity-75"></div>
        <div class="bg-white rounded-lg shadow-xl transform transition-all sm:max-w-lg sm:w-full mx-4">
            <div class="bg-white p-6 rounded-md shadow-lg relative">
                <button class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none"
                    onclick="closeKaryaDetailModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="text-center mb-4">
                    <h2 class="text-2xl font-semibold text-gray-800" id="karyaName"></h2>
                    <input type="hidden" id="karyaId" />
                </div>
                <div class="space-y-4">
                    <div class="flex justify-start items-center gap-5 border-b-2 border-primary/25">
                        <span class="text-gray-600 font-medium">Status</span>
                        <span id="karyaStatus" class="text-gray-800"></span>
                    </div>
                    <div class="flex justify-start items-center gap-5 border-b-2 border-primary/25">
                        <span class="text-gray-600 font-medium">Category</span>
                        <span id="karyaCategory" class="text-gray-800"></span>
                    </div>
                    <div class="flex justify-start items-center gap-5 border-b-2 border-primary/25">
                        <span class="text-gray-600 font-medium">Stock</span>
                        <span id="karyaStock" class="text-gray-800"></span>
                    </div>
                    <div>
                        <span class="text-gray-600 font-medium">Images</span>
                        <div id="karyaImages" class="flex gap-2 mt-2"></div>
                    </div>
                    <div class="flex justify-start items-center gap-5 border-b-2 border-primary/25">
                        <span class="text-gray-600 font-medium">Created At</span>
                        <span id="karyaCreatedAt" class="text-gray-800"></span>
                    </div>
                    <div id="karyaMessage" class="text-red-500 hidden p-3 border-red-500 bg-red-50 text-sm rounded-lg mt-4">
                        Your artwork was rejected. Please review the reasons provided.
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button class="bg-primary text-white px-4 py-2 rounded mr-2"
                        onclick="window.location.href='{{ url('id/seniman/karya/edit') }}/' + document.getElementById('karyaId').value">Edit</button>
                    <button class="bg-gray-500 text-white px-4 py-2 rounded"
                        onclick="closeKaryaDetailModal()">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        function openKaryaDetailModal(karya) {
            const modal = document.getElementById('karyaDetailModal');
            document.getElementById('karyaName').innerText = ': ' + karya.name;
            document.getElementById('karyaStatus').innerText = ': ' + karya.status;
            document.getElementById('karyaCategory').innerText = ': ' + karya.category_id;
            document.getElementById('karyaStock').innerText = ': ' + karya.stock;
            document.getElementById('karyaCreatedAt').innerText = ': ' + new Date(karya.created_at).toLocaleDateString();
            document.getElementById('karyaId').value = karya.id;

            const karyaImages = document.getElementById('karyaImages');
            karyaImages.innerHTML = '';
            const images = JSON.parse(karya.images);
            images.forEach(image => {
                const img = document.createElement('img');
                img.src = `/storage/${image}`;
                img.className = 'w-16 h-16 rounded-full border-2 border-white shadow-md cursor-pointer';
                img.onclick = () => openKaryaModal(`/storage/${image}`);
                karyaImages.appendChild(img);
            });

            if (karya.status === 'rejected') {
                document.getElementById('karyaMessage').classList.remove('hidden');
                document.getElementById('karyaMessage').innerText =
                    'Your artwork was rejected. Please review the reasons provided.';
            } else {
                document.getElementById('karyaMessage').classList.add('hidden');
            }

            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.classList.add('opacity-100');
            }, 10);
        }

        function closeKaryaDetailModal() {
            const modal = document.getElementById('karyaDetailModal');
            modal.classList.add('opacity-0');
            modal.classList.remove('opacity-100');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>

@endsection

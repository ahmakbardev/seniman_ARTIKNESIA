<div>

    <div class="w-full overflow-x-auto">
        <div class="flex  justify-end items-center gap-3 py-5">
            <label class="flex items-center gap-3">
                <span class="text-gray-400">Cari Karya:</span>
                <div class="flex flex-col">
                    <input wire:model="search" wire:keydown.enter="setSearch($event.target.value)"
                        wire:key="search-{{ $locale }}" type="text" placeholder="Nama Karya"
                        class="inline-block px-3 mt-1 text-sm border-gray-600 p-3 rounded-md bg-gray-700 focus:outline-none focus:shadow-outline-purple text-gray-300 focus:shadow-outline-gray form-input peer">
                    <span class="hidden ml-2 text-primary text-sm peer-focus-within:flex">Tekan enter untuk search ...</span>
                </div>

            </label>
        </div>
        <table class="w-full whitespace-no-wrap relative">
            <div wire:loading.class="flex mx-auto w-1/2 h-px bg-sky-400 rounded-tl-md rounded-tr-md top-0 animate-ping"></div>
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left  uppercase border-b border-gray-700  text-gray-400 bg-gray-800">
                    <th class="px-4 py-3">Nama Karya</th>
                    <th class="px-4 py-3">Gambar</th>
                    <th class="px-4 py-3">Harga</th>
                    <th class="px-4 py-3">Stok</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Kategori</th>
                </tr>
            </thead>
            <tbody class=" divide-y divide-gray-700 bg-gray-800">
                @foreach ($products as $product)
                    <tr class="text-gray-400">
                        <td class="px-4 py-3">{{ $product->name }}</td>
                        <td class="px-4 py-3">
                            <!-- Show only the first image -->
                            <img onclick="openModal('{{ json_encode(json_decode($product->images)) }}')"
                                src="{{ asset('storage/' . json_decode($product->images)[0]) }}"
                                class="h-8 w-8 rounded-full object-cover product-image cursor-pointer"
                                alt="Product Image">
                        </td>
                        <td class="px-4 py-3">{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">{{ $product->stock }}</td>
                        <td class="px-4 py-3">
                            @if ($product->status == 'pending')
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-xs  rounded-full bg-yellow-700 text-yellow-100">
                                    {{ $product->status }}
                                </span>
                            @elseif ($product->status == 'confirmed')
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-xs rounded-full bg-green-700 text-green-100">
                                    {{ $product->status }}
                                </span>
                            @elseif ($product->status == 'failed')
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-xs rounded-full bg-red-700 text-red-100">
                                    {{ $product->status }}
                                </span>
                            @else
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-xs  rounded-full bg-gray-700 text-gray-100">
                                    Unknown Status
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $product->subkategori->nama }} Art</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide uppercase border-t border-gray-700 sm:grid-cols-9 text-gray-400 bg-gray-800">
        <span class="flex items-center col-span-3">
            Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }}
        </span>
        <span class="col-span-2"></span>
        <!-- Pagination -->
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center gap-2">
                    @if ($products->onFirstPage())
                        <li>
                            <span
                                class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple cursor-not-allowed"
                                aria-label="Previous">
                                <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="#" wire:click="previousPage"
                                class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple">
                                <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </a>
                        </li>
                    @endif

                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li>
                            <span
                                class="px-3 py-1 @if ($page === $products->currentPage()) bg-purple-600 text-white @else text-purple-600 @endif rounded-md focus:outline-none focus:shadow-outline-purple">
                                {{ $page }}
                            </span>
                        </li>
                    @endforeach

                    @if ($products->hasMorePages())
                        <li>
                            <a href="#" wire:click="nextPage"
                                class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple">
                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                    <path
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </a>
                        </li>
                    @else
                        <li>
                            <span
                                class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple cursor-not-allowed">
                                <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                    <path
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </span>
                        </li>
                    @endif
                </ul>
            </nav>
        </span>
    </div>
    <!-- Modal -->
    <div id="myModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        {{-- <div class="modal-overlay fixed inset-0 transition-opacity" onclick="closeModal()"></div> --}}
        <div class="modal-container bg-white w-full md:max-w-2xl mx-auto rounded shadow-lg overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!-- Modal Content -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4" id="modalContent">
                    <!-- Images will be displayed here -->
                </div>
                <div class="modal-footer bg-gray-100 text-right">
                    <button onclick="closeModal()"
                        class="px-4 py-2 text-white bg-indigo-500 rounded-lg hover:bg-indigo-400 focus:outline-none cursor-pointer">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(images) {
        images = JSON.parse(images);
        const modal = document.getElementById('myModal');
        const modalContent = document.getElementById('modalContent');

        // Clear previous images
        modalContent.innerHTML = '';

        // Populate modal with images
        images.forEach(function(imageSrc) {
            const img = document.createElement('img');
            img.src = '{{ asset('storage/') }}' + '/' + imageSrc;
            img.alt = 'Product Image';
            img.classList.add('h-96', 'object-contain', 'w-full');
            modalContent.appendChild(img);
        });

        // Show modal
        modal.classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.classList.add('hidden');
    }
</script>

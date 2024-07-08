<div class="">

    <div class="p-6">
        <div class="flex flex-col mb-4 border-b border-gray-300 pb-4">
            <h1 class="block font-semibold leading-6 text-xl mb-1">
                {{ $experienceId ? 'Edit Experience' : 'Add Experience' }}
            </h1>
            <p class="text-lg">
                {{ $experienceId ? 'Update your experience details below.' : 'Provide your experience details below.' }}
            </p>
        </div>
        <form wire:submit.prevent="save" id="experienceForm">
            <div class="flex flex-col gap-8">
                <div>
                    <div class="mb-4">
                        <h2 class="text-lg">Experience Details</h2>
                    </div>
                    <div class="card shadow">
                        <div class="tab-content p-6" id="pills-tabContent">
                            <div class="tab-pane mt-3 fade show active" id="pills-design-input" role="tabpanel"
                                aria-labelledby="pills-design-input-tab" tabindex="0">
                                <label for="title" class="mb-2 block text-gray-800">Title</label>
                                <input type="text" wire:model="title"
                                    class="border border-gray-300 text-gray-900 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Title">
                                @error('title')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="tab-pane mt-3 fade show active" id="pills-design-input" role="tabpanel"
                                aria-labelledby="pills-design-input-tab" tabindex="0">
                                <label for="description" class="mb-2 block text-gray-800">Description</label>
                                <textarea wire:model="description"
                                    class="border border-gray-300 text-gray-900 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Description" rows="4"></textarea>
                                @error('description')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="tab-pane mt-3 fade show active" id="pills-design-input" role="tabpanel"
                                aria-labelledby="pills-design-input-tab" tabindex="0">
                                <label for="start_date" class="mb-2 block text-gray-800">Start Date</label>
                                <input type="date" wire:model="start_date"
                                    class="border border-gray-300 text-gray-900 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Start Date">
                                @error('start_date')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="tab-pane mt-3 fade show active" id="pills-design-input" role="tabpanel"
                                aria-labelledby="pills-design-input-tab" tabindex="0">
                                <label for="end_date" class="mb-2 block text-gray-800">End Date</label>
                                <input type="date" wire:model="end_date"
                                    class="border border-gray-300 text-gray-900 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="End Date">
                                @error('end_date')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="tab-pane mt-3 fade show active" id="pills-design-input" role="tabpanel"
                                aria-labelledby="pills-design-input-tab" tabindex="0">
                                <label for="selectedProvince" class="mb-2 block text-gray-800">Province</label>
                                <select wire:model="selectedProvince" wire:change="loadCities"
                                    class="border border-gray-300 text-gray-900 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none">
                                    <option value="">Select Province</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->nama }}</option>
                                    @endforeach
                                </select>
                                @error('selectedProvince')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="tab-pane mt-3 fade show active" id="pills-design-input" role="tabpanel"
                                aria-labelledby="pills-design-input-tab" tabindex="0">
                                <label for="selectedCity" class="mb-2 block text-gray-800">City</label>
                                <select wire:model="selectedCity"
                                    class="border border-gray-300 text-gray-900 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none">
                                    <option value="">Select City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->nama }}</option>
                                    @endforeach
                                </select>
                                @error('selectedCity')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="tab-pane mt-3 fade show active" id="pills-design-input" role="tabpanel"
                                aria-labelledby="pills-design-input-tab" tabindex="0">
                                <label for="role" class="mb-2 block text-gray-800">Role</label>
                                <input type="text" wire:model="role"
                                    class="border border-gray-300 text-gray-900 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Role">
                                @error('role')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="tab-pane mt-3 fade show active" id="pills-design-input" role="tabpanel"
                                aria-labelledby="pills-design-input-tab" tabindex="0">
                                <label for="achievements" class="mb-2 block text-gray-800">Achievements</label>
                                <textarea wire:model="achievements"
                                    class="border border-gray-300 text-gray-900 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Achievements" rows="4"></textarea>
                                @error('achievements')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="tab-pane mt-3 fade show active" id="pills-design-input" role="tabpanel"
                                aria-labelledby="pills-design-input-tab" tabindex="0">
                                <label for="media" class="mb-2 block text-gray-800">Cover photo</label>
                                <input type="file" wire:model="media" multiple
                                    class="border border-gray-300 text-gray-900 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none">
                                @error('media.*')
                                    <span class="text-red-600">{{ $message }}</span>
                                @enderror
                                <div class="flex flex-wrap gap-4 mt-4">
                                    @foreach ($existingMedia as $index => $media)
                                        <div class="relative">
                                            <img src="{{ asset('storage/' . $media) }}" alt="Experience media"
                                                class="w-32 h-32 object-cover rounded-lg cursor-pointer"
                                                onclick="openModal('{{ asset('storage/' . $media) }}')">
                                            <button type="button"
                                                wire:click.prevent="removeMedia({{ $index }})"
                                                class="absolute top-1 right-1 bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center">&times;</button>
                                        </div>
                                    @endforeach
                                    @foreach ($newMediaPreviews as $preview)
                                        <div class="relative">
                                            <img src="{{ $preview }}" alt="New media preview"
                                                class="w-32 h-32 object-cover rounded-lg cursor-pointer"
                                                onclick="openModal('{{ $preview }}')">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane mt-3 fade show active" id="pills-design-input" role="tabpanel"
                                aria-labelledby="pills-design-input-tab" tabindex="0">
                                <button type="submit"
                                    class="btn bg-indigo-600 text-white border-indigo-600 hover:bg-indigo-800 hover:border-indigo-800 active:bg-indigo-800 active:border-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                                    {{ $experienceId ? 'Update Experience' : 'Add Experience' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Modal -->
    <div id="imageModal" class="fixed z-10 inset-0 overflow-y-auto hidden flex items-center justify-center">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-black/50 opacity-75"></div>
        </div>

        <div
            class="bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="bg-white p-4">
                <img id="modalImage" src="" alt="Experience media" class="w-full">
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse">
                <button type="button"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                    onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>

    <script>
        function openModal(imageSrc) {
            let modal = document.getElementById('imageModal');
            let modalImg = document.getElementById('modalImage');
            modalImg.src = imageSrc;
            modal.classList.remove('hidden');
            modal.classList.add('flex', 'transition', 'transform', 'duration-300', 'ease-in-out', 'opacity-100',
                'translate-y-0');
        }

        function closeModal() {
            let modal = document.getElementById('imageModal');
            modal.classList.add('opacity-0', 'translate-y-4');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex', 'opacity-100', 'translate-y-0');
            }, 300);
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('img.cursor-pointer').forEach(img => {
                img.addEventListener('click', function() {
                    openModal(this.src);
                });
            });
        });
    </script>
</div>

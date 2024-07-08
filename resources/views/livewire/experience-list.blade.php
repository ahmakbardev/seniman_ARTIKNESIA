<div class="card shadow">
    <div class="card-body">
        <div class="flex justify-between items-center">
            <h4 class="">Projects Contributions</h4>
            <a href="{{ route('experiences.add', ['locale' => app()->getLocale()]) }}"
                class="btn bg-indigo-600 text-white border-indigo-600 hover:bg-indigo-800 hover:border-indigo-800 active:bg-indigo-800 active:border-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300 md:visible invisible">Add
                Experience</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="max-h-72 overflow-y-auto my-4" data-simplebar="">

            @foreach ($experiences as $experience)
                <div class="md:flex justify-between items-center hover:bg-slate-200 transition-all ease-in-out p-3 rounded-md">
                    <div class="flex items-center">
                        <div>
                            <div class="border rounded-full overflow-hidden">
                                <img src="{{ Auth::user()->profile_pic ? asset('storage/'. Auth::user()->profile_pic) : asset('assets/images/default-profile.jpg') }}"
                                    alt="" class="w-12 h-12 object-cover" />
                            </div>
                        </div>  
                        <div class="ml-3">
                            <h5 class="text-gray-800">
                                <a href="#" class="font-medium">{{ $experience->title }}</a>
                            </h5>
                            <p class="text-sm text-slate-600">{{ $experience->description }}</p>
                        </div>
                    </div>
                    <div class="flex items-center ms-10 ms-md-0">
                        <div class="-space-x-3 flex">
                            @php
                                $mediaFiles = is_string($experience->media)
                                    ? json_decode($experience->media)
                                    : $experience->media;
                            @endphp
                            @if (!empty($mediaFiles))
                                @foreach ($mediaFiles as $media)
                                    <img class="relative inline object-cover w-8 h-8 rounded-full border-white border-2 cursor-pointer"
                                        src="{{ asset('storage/' . $media) }}" alt="Experience media"
                                        onclick="openModal('{{ asset('storage/' . $media) }}')" />
                                @endforeach
                            @else
                                <img class="relative inline object-cover w-8 h-8 rounded-full border-white border-2"
                                    src="{{ asset('assets/images/default-image.jpg') }}" alt="No media available" />
                            @endif
                        </div>
                        <div class="ml-3">
                            <div class="dropstart leading-4">
                                <button class="text-gray-600 p-2 hover:bg-gray-300 rounded-full transition-all"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i data-feather="more-vertical" class="w-4 h-4"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('experiences.edit', ['experienceId' => $experience->id, 'locale' => app()->getLocale()]) }}">Edit</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#"
                                            wire:click.prevent="deleteExperience({{ $experience->id }})">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Modal -->
    <div id="customImageModal" class="fixed z-10 inset-0 overflow-y-auto hidden flex items-center justify-center">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
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
            document.getElementById('modalImage').src = imageSrc;
            document.getElementById('customImageModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('customImageModal').classList.add('hidden');
        }
    </script>
</div>

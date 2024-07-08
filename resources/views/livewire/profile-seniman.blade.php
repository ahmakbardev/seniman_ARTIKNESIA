<div class="mb-8 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-2 lg:grid-cols-3">
    <div class="card shadow col-span-3">
        <!-- card body -->
        <div class="card-body">
            <div class="mb-6">
                <!-- title -->
                <h4 class="mb-1">General Settings</h4>
            </div>
            <div class="mb-6 inline-flex md:flex md:items-center gap-3 flex-col md:flex-row w-full">
                <div class="flex-1 text-gray-800 font-semibold">
                    <h5 class="mb-0">Avatar</h5>
                </div>
                <div class="flex-[3]">
                    <div class="flex items-center relative">
                        <!-- image -->
                        <div class="me-3">
                            <img src="{{ $profile_pic ? asset('storage/' . $profile_pic) : asset('assets/images/default-profile.jpg') }}"
                                class="rounded-full w-16 h-16 object-cover" alt="" />
                        </div>
                        <div>
                            <!-- input file -->
                            <input type="file" wire:model="new_profile_pic" class="hidden" id="profile_pic_input">
                            <label for="profile_pic_input"
                                class="btn gap-x-2 bg-white text-gray-800 border-gray-300 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300 cursor-pointer">
                                Change
                            </label>
                            @if ($profile_pic)
                                <button type="button" wire:click="$set('profile_pic', null)"
                                    class="btn gap-x-2 bg-white text-gray-800 border-gray-300 disabled:opacity-50 disabled:pointer-events-none hover:text-white hover:bg-gray-700 hover:border-gray-700 active:bg-gray-700 active:border-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                    Remove
                                </button>
                            @endif
                        </div>
                        @if ($uploadSuccess)
                            <div
                                id="upload-success"
                                class="absolute inset-0 flex items-center justify-center bg-green-500 text-white text-sm font-bold p-2 rounded transition-opacity duration-500 opacity-0">
                                Upload Successful!
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div>
                <!-- border -->
                <div class="mb-6">
                    <h4 class="mb-1">Basic information</h4>
                </div>
                <form wire:submit.prevent="submit">
                    <!-- input -->
                    <div class="mb-6 inline-flex md:flex md:items-center gap-3 flex-col md:flex-row w-full">
                        <label for="username" class="flex-1 text-gray-800 font-semibold">Username</label>
                        <div class="flex-[3] w-full">
                            <input type="text" wire:model="username"
                                class="border border-gray-300 text-gray-900 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Username" id="username" required />
                        </div>
                    </div>

                    <!-- input -->
                    <div class="mb-6 inline-flex md:flex md:items-center gap-3 flex-col md:flex-row w-full">
                        <label for="email" class="flex-1 text-gray-800 font-semibold">Email</label>
                        <div class="flex-[3] w-full">
                            <input type="email" wire:model="email"
                                class="border border-gray-300 text-gray-900 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Email" id="email" required />
                        </div>
                    </div>
                    <!-- input -->
                    <div class="mb-6 inline-flex md:flex md:items-center gap-3 flex-col md:flex-row w-full">
                        <label for="phone" class="flex-1 text-gray-800 font-semibold">
                            Phone
                            <span>(Optional)</span>
                        </label>
                        <div class="flex-[3] w-full">
                            <input type="text" wire:model="phone"
                                class="border border-gray-300 text-gray-900 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Phone" id="phone" />
                        </div>
                    </div>
                    <!-- input -->
                    <div class="mb-6 inline-flex md:flex md:items-center gap-3 flex-col md:flex-row w-full">
                        <label for="province" class="flex-1 text-gray-800 font-semibold">Province</label>
                        <div class="flex-[3] w-full">
                            <select wire:model="selectedProvince" wire:change="loadCities"
                                class="text-base border border-gray-300 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                id="province">
                                <option value="">Select Province</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- input -->
                    <div class="mb-6 inline-flex md:flex md:items-center gap-3 flex-col md:flex-row w-full">
                        <label for="city" class="flex-1 text-gray-800 font-semibold">City</label>
                        <div class="flex-[3] w-full">
                            <select wire:model="selectedCity"
                                class="text-base border border-gray-300 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                id="city">
                                <option value="">Select City</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- input -->
                    <div class="mb-6 inline-flex md:flex md:items-center gap-3 flex-col md:flex-row w-full">
                        <label for="bio" class="flex-1 text-gray-800 font-semibold">Bio</label>
                        <div class="flex-[3] w-full">
                            <textarea wire:model="bio"
                                class="border border-gray-300 text-gray-900 rounded focus:ring-1 outline-none focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2 px-3 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Bio" id="bio" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="mb-6 inline-flex md:flex md:items-center gap-3 flex-col md:flex-row w-full">
                        <div class="flex-1 text-gray-800 font-semibold"></div>
                        <div class="flex-[3]">
                            <button type="submit"
                                class="btn bg-indigo-600 text-white border-indigo-600 hover:bg-indigo-800 hover:border-indigo-800 active:bg-indigo-800 active:border-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        Livewire.on('profilePicUpdated', () => {
            const uploadSuccess = document.getElementById('upload-success');
            uploadSuccess.classList.remove('opacity-0');
            uploadSuccess.classList.add('opacity-100');
    
            setTimeout(() => {
                uploadSuccess.classList.remove('opacity-100');
                uploadSuccess.classList.add('opacity-0');
            }, 2000); // 2 seconds
        });
    </script>
</div>

{{-- @push('scripts')
@endpush --}}

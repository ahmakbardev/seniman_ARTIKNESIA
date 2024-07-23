@extends('seniman.layouts.layout')


@push('head')
@endpush

@section('seniman_content')
    {{-- @livewire('ProfileSeniman') --}}
    <div class="p-6">
        <div class="block">
            <div class="flex items-center p-5 rounded-t-md shadow bg-cover bg-no-repeat pt-28"
                style="background-image: url('{{ asset('assets/images/background/profile-cover.jpg') }}')"></div>
            <div class="bg-white rounded-b-md shadow mb-6">
                <div class="flex items-center justify-between pt-4 pb-6 px-4">
                    <div class="flex items-center">
                        <!-- avatar -->
                        <div class="w-24 h-24 mr-2 relative flex justify-end items-end -mt-10">
                            <img src="{{ Auth::user()->profile_pic ? asset('storage/' . Auth::user()->profile_pic) : asset('assets/images/avatar/avatar-1.jpg') }}"
                                class="rounded-full border-4 border-white aspect-square object-cover" alt="" />
                            <div class="absolute top-0 right-0 mr-2" data-bs-toggle="tooltip"
                                data-placement="top" title="" data-original-title="Verified"
                                data-bs-original-title="">
                                <img src="{{ asset('assets/images/svg/checked-mark.svg') }}" alt="" height="30"
                                    width="30" />
                            </div>
                        </div>
                        <!-- text -->
                        <div class="leading-4">
                            <h2 class="mb-2 text-lg whitespace-nowrap">
                                {{ Auth::user()->username }}
                                <a href="#!" class="text-decoration-none" data-bs-toggle="tooltip" data-placement="top"
                                    title="" data-original-title="Beginner" data-bs-original-title=""></a>
                            </h2>
                            <p class="mb-0 text-gray-500">{{ $role->nama }} {{ $jenisKarya->nama }}, {{ $subkategori->nama }}</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('seniman.profile.edit', ['locale' => app()->getLocale()]) }}"
                            class="btn bg-indigo-600 text-white border-indigo-600 hover:bg-indigo-800 hover:border-indigo-800 active:bg-indigo-800 active:border-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300 md:visible invisible">
                            Edit Profile
                        </a>

                    </div>
                </div>
                <!-- nav -->
                {{-- <div class=" ">
                    <!-- list -->
                    <ul class="flex flex-no-wrap overflow-auto text-center text-gray-500 border-gray-300 border-t">
                        <li class="mr-2">
                            <a href="#"
                                class="block p-4 text-indigo-600 border-t-2 font-semibold border-indigo-600 active"
                                aria-current="page">Overview</a>
                        </li>
                        <li class="mr-2">
                            <a href="#"
                                class="inline-block p-4 text-gray-800 font-semibold border-t-2 border-transparent hover:text-indigo-600 hover:border-indigo-600">Profile</a>
                        </li>
                        <li class="mr-2">
                            <a href="#"
                                class="inline-block p-4 text-gray-800 font-semibold border-t-2 border-transparent hover:text-indigo-600 hover:border-indigo-600">Files</a>
                        </li>
                        <li class="mr-2">
                            <a href="#"
                                class="inline-block p-4 text-gray-800 font-semibold border-t-2 border-transparent hover:text-indigo-600 hover:border-indigo-600">Teams</a>
                        </li>
                        <li class="mr-2">
                            <a href="#"
                                class="inline-block p-4 text-gray-800 font-semibold border-t-2 border-transparent hover:text-indigo-600 hover:border-indigo-600">Followers</a>
                        </li>
                        <li class="mr-2">
                            <a href="#"
                                class="inline-block p-4 text-gray-800 font-semibold border-t-2 border-transparent hover:text-indigo-600 hover:border-indigo-600">Activity</a>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
        <div class="mb-6 grid grid-cols-1 gap-x-6 gap-y-8 xl:grid-cols-2">
            <!-- card -->
            <div class="card shadow">
                <!-- card body -->
                <div class="card-body">
                    <!-- card title -->
                    <h4 class="mb-6">About Me</h4>
                    <h5 class="uppercase tracking-widest text-sm font-semibold">Bio</h5>
                    <!-- text -->
                    <p class="mt-2 mb-6">
                        {{ $user->deskripsi_diri }}
                    </p>
                    <!-- row -->
                    <div class="mb-5">
                        <!-- text -->
                        <h5 class="uppercase tracking-widest text-sm font-semibold">Position</h5>
                        <p class="mb-0">{{ $role->nama }} {{ $jenisKarya->nama }}, {{ $subkategori->nama }}</p>
                    </div>
                    <!-- content -->
                    <div class="flex flex-row justify-between mb-5">
                        <div class="flex-1">
                            <h5 class="uppercase tracking-widest text-sm font-semibold">Phone</h5>
                            <p class="mb-0">{{ $user->whatsapp }}</p>
                        </div>
                        <div class="flex-1">
                            <h5 class="uppercase tracking-widest text-sm font-semibold">Seniman ID</h5>
                            <p class="mb-0">{{ $user->id_seniman }}</p>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between mb-5">
                        <div class="flex-1">
                            <h5 class="uppercase tracking-widest text-sm font-semibold">Email</h5>
                            <p class="mb-0">{{ $user->email }}</p>
                        </div>
                        <div class="flex-1">
                            <h5 class="uppercase tracking-widest text-sm font-semibold">Location</h5>
                            <p class="mb-0">{{ $kota ? $kota->nama : 'N/A' }}, {{ $provinsi ? $provinsi->nama : 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card -->
            @livewire('experience-list')
        </div>
        {{-- <div class="mb-6 grid grid-cols-1 gap-x-6 gap-y-8 xl:grid-cols-2">
            <!-- card -->
            <div class="card shadow">
                <!-- card body -->
                <div class="card-body">
                    <div class="flex justify-between mb-5 items-center">
                        <!-- avatar -->
                        <div class="flex items-center">
                            <div>
                                <img src="{{ asset('assets/images/avatar/avatar-1.jpg') }}" alt=""
                                    class="w-12 h-12 rounded-full" />
                            </div>
                            <div class="ml-3">
                                <h5>Jitu Chauhan</h5>
                                <p>19 minutes ago</p>
                            </div>
                        </div>
                        <div>
                            <!-- dropdown -->
                            <div class="dropstart leading-4">
                                <button class="text-gray-600 p-2 hover:bg-gray-300 rounded-full transition-all"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i data-feather="more-vertical" class="w-4 h-4"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <!-- text -->
                        <p class="mb-4">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspen disse var ius enim in eros
                            elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor
                            interdum nulla, ut commodo diam libero vitae erat.
                        </p>
                        <img src="{{ asset('assets/images/blog/blog-img-1.jpg') }}" class="rounded-md w-full"
                            alt="" />
                    </div>
                    <!-- icons -->
                    <div class="mb-4 flex gap-4 w-full">
                        <span class="flex items-center">
                            <i data-feather="heart" class="w-4 h-4"></i>
                            <span class="ml-1">20 Like</span>
                        </span>
                        <span class="flex items-center">
                            <i data-feather="message-square" class="w-4 h-4"></i>

                            <span class="ml-1">12 Comment</span>
                        </span>
                        <span class="flex items-center">
                            <i data-feather="share-2" class="w-4 h-4"></i>
                            <span class="ml-1">Share</span>
                        </span>
                    </div>
                    <div class="border-b border-t py-5 flex items-center mb-4">
                        <!-- avatar group -->
                        <div class="-space-x-3 flex">
                            <img class="relative inline object-cover w-8 h-8 rounded-full border-white border-2"
                                src="{{ asset('assets/images/avatar/avatar-1.jpg') }}" alt="Profile image" />
                            <img class="relative inline object-cover w-8 h-8 rounded-full border-white border-2"
                                src="{{ asset('assets/images/avatar/avatar-2.jpg') }}" alt="Profile image" />
                            <img class="relative inline object-cover w-8 h-8 border-2 rounded-full border-white"
                                src="{{ asset('assets/images/avatar/avatar-1.jpg') }}" alt="Profile image" />
                        </div>
                        <div class="ml-4 text-gray-600">You and 20 more liked this</div>
                    </div>
                    <!-- row -->
                    <div class="md:flex">
                        <div class="flex-shrink-1">
                            <!-- avatar -->
                            <img src="{{ asset('assets/images/avatar/avatar-1.jpg') }}" class="w-10 h-10 rounded-full"
                                alt="" />
                        </div>

                        <div class="md:ml-3 flex-grow">
                            <!-- form -->
                            <form class="flex gap-3 items-center justify-between w-full">
                                <div>
                                    <label for="name" class="col-form-label">Name</label>
                                </div>
                                <div class="w-full">
                                    <input type="password" id="name"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2" />
                                </div>
                                <div>
                                    <button type="submit"
                                        class="btn bg-indigo-600 text-white border-indigo-600 hover:bg-indigo-800 hover:border-indigo-800 active:bg-indigo-800 active:border-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300">
                                        Post
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <!-- card -->
                <div class="card shadow mb-6">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- card title -->
                        <h4 class="mb-6">My Team</h4>
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <!-- img -->
                                <div class="w-10 h-10 d-inline-block">
                                    <img src="{{ asset('assets/images/avatar/avatar-1.jpg') }}" class="rounded-full"
                                        alt="" />
                                </div>
                                <!-- text -->
                                <div class="ml-4">
                                    <h5>Dianna Smiley</h5>
                                    <p class="text-base">UI / UX Designer</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <a href="#">
                                    <i class="mr-2 w-5 h-5" data-feather="phone-call"></i>
                                </a>
                                <a href="#">
                                    <i class="w-5 h-5" data-feather="video"></i>
                                </a>
                            </div>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <!-- img -->
                                <div class="w-10 h-10 d-inline-block">
                                    <img src="{{ asset('assets/images/avatar/avatar-2.jpg') }}" class="rounded-full"
                                        alt="" />
                                </div>
                                <!-- content -->
                                <div class="ml-4">
                                    <h5>Anne Brewer</h5>
                                    <p class="text-base">Senior UX Designer</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <!-- icons -->
                                <a href="#">
                                    <i class="mr-2 w-5 h-5" data-feather="phone-call"></i>
                                </a>
                                <a href="#">
                                    <i class="w-5 h-5" data-feather="video"></i>
                                </a>
                            </div>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <!-- img -->
                                <div class="w-10 h-10 d-inline-block">
                                    <img src="{{ asset('assets/images/avatar/avatar-4.jpg') }}" class="rounded-full"
                                        alt="" />
                                </div>
                                <!-- content -->
                                <div class="ml-4">
                                    <h5>Lisa Ewer</h5>
                                    <p class="text-base">Senior UX Designer</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <!-- icons -->
                                <a href="#">
                                    <i class="mr-2 w-5 h-5" data-feather="phone-call"></i>
                                </a>
                                <a href="#">
                                    <i class="w-5 h-5" data-feather="video"></i>
                                </a>
                            </div>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <!-- img -->
                                <div class="w-10 h-10 d-inline-block">
                                    <img src="{{ asset('assets/images/avatar/avatar-3.jpg') }}" class="rounded-full"
                                        alt="" />
                                </div>
                                <!-- text -->
                                <div class="ml-4">
                                    <h5>Richard Christmas</h5>
                                    <p class="text-base">Front-End Engineer</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <!-- icons -->
                                <a href="#">
                                    <i class="mr-2 w-5 h-5" data-feather="phone-call"></i>
                                </a>
                                <a href="#">
                                    <i class="w-5 h-5" data-feather="video"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card -->
                <div class="card shadow">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- card title -->
                        <h4 class="mb-6">Activity Feed</h4>
                        <div>
                            <div class="flex mb-5 flox-row gap-4">
                                <!-- img -->
                                <div class="w-10 h-10 d-inline-block">
                                    <img src="{{ asset('assets/images/avatar/avatar-6.jpg') }}" class="rounded-full"
                                        alt="" />
                                </div>
                                <!-- content -->
                                <div>
                                    <h5>Dianna Smiley</h5>
                                    <p class="mb-1">Just create a new Project in Dashui...</p>
                                    <p class="text-gray-400">2m ago</p>
                                </div>
                            </div>
                            <div class="flex mb-5 flox-row gap-4">
                                <!-- img -->
                                <div class="w-10 h-10 d-inline-block">
                                    <img src="{{ asset('assets/images/avatar/avatar-7.jpg') }}" class="rounded-full"
                                        alt="" />
                                </div>
                                <!-- content -->
                                <div>
                                    <h5>Irene Hargrove</h5>
                                    <p class="mb-1">Comment on Bootstrap Tutorial irene...</p>
                                    <p class="text-gray-400">1hour ago</p>
                                </div>
                            </div>
                            <div class="flex mb-5 flox-row gap-4">
                                <!-- img -->
                                <div class="w-10 h-10 d-inline-block">
                                    <img src="{{ asset('assets/images/avatar/avatar-9.jpg') }}" class="rounded-full"
                                        alt="" />
                                </div>
                                <!-- content -->
                                <div>
                                    <h5>Trevor Bradley</h5>
                                    <p class="mb-1">Just share your article on Social Media..</p>
                                    <p class="text-gray-400">2month ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection

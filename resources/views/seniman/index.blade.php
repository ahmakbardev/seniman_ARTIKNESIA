@extends('seniman.layouts.layout')

@section('seniman_content')
    <div class="flex items-center justify-center min-h-96 bg-gray-100">
        <div class="text-center">
            <h1 class="text-5xl font-bold text-gray-800 mb-4">Dashboard</h1>
            <p class="text-xl text-gray-600 mb-8">Our new features will be available soon!</p>
            <div class="relative">
                <span class="text-4xl font-semibold text-primary animate-pulse">
                    Coming Soon
                </span>
            </div>
        </div>
    </div>

    <style>
        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .animate-pulse {
            animation: pulse 2s infinite;
        }
    </style>
    {{-- halaman dashboard comingsoon --}}
@endsection

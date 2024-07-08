@extends('seniman.layouts.layout')


@section('assets')
    <link rel="stylesheet" href="{{ asset('assets/libs/dropzone/dist/dropzone.css') }}" />
@endsection

@section('seniman_content')
    {{ $slot }}

    @if (in_array(Route::currentRouteName(), ['seniman.profile.index']))

    @endif
@endsection

@section('scripts')
    <script src="{{ asset('assets/libs/dropzone/dist/dropzone-min.js') }}"></script>
@endsection

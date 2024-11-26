@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <div class="pl-20 pr-20">
    <x-dashboard.form.create-pet :clients="$clients" :species="$species" :breeds="$breeds" :sizes="$sizes" />
    </div>
@endsection

{{--@if ($errors->any())--}}
{{--    <div class="alert alert-danger">--}}
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{-- @endif--}}
{{-- --}}
{{-- @section('content')--}}
{{-- <x-dashboard.forms-display.pet-create :clients="$clients"/> --}}
{{-- @endsection --}}
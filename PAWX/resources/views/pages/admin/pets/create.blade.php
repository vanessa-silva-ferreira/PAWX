@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <div class="pl-20 pr-20">
    <x-dashboard.form.create-pet :clients="$clients" :species="$species" :breeds="$breeds" :sizes="$sizes" />
    </div>
@endsection

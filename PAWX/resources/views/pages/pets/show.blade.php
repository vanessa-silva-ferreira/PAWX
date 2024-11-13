@extends('Master.main')
@section('content')
    @component('components.pets.pet-show', ['pet' => $pet])
    @endcomponent
@endsection

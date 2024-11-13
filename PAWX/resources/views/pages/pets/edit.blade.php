@extends('Master.main')
@section('content')
    @component('components.pets.pet-edit', ['pet' => $pet])
    @endcomponent
@endsection

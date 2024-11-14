@extends('Master.main')
@section('content')
    @component('components.pets.pet-edit', ['pet' => $pet, 'clients' => $clients])
    @endcomponent
@endsection

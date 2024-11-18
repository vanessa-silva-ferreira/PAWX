@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Client Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Total Pets</div>
                    <div class="card-body">#</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Total Appointments</div>
                    <div class="card-body">#</div>
                </div>
            </div>
        </div>
    </div>
@endsection

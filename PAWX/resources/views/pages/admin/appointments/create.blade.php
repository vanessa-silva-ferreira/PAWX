@extends('layouts.dashboard')

@section('content')


    <div class="container mt-5">
        <h1>Test Appointment Form</h1>
        <form action="{{ route('employee.appointments.store') }}" method="POST">        <!-- Token de CSRF -->
            @csrf

            <!-- Pet ID -->
            <div class="mb-3">
                <label for="pet_id" class="form-label">Pet ID</label>
                <input type="number" class="form-control" id="pet_id" name="pet_id" required>
            </div>

            <!-- Employee ID -->
            <div class="mb-3">
                <label for="employee_id" class="form-label">Employee ID</label>
                <input type="number" class="form-control" id="employee_id" name="employee_id" required>
            </div>

            <!-- Appointment Date -->
            <div class="mb-3">
                <label for="appointment_date" class="form-label">Appointment Date</label>
                <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" required>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" name="status" maxlength="255" required>
            </div>

            <!-- Total Price -->
            <div class="mb-3">
                <label for="total_price" class="form-label">Total Price</label>
                <input type="number" class="form-control" id="total_price" name="total_price" step="0.01" min="0" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

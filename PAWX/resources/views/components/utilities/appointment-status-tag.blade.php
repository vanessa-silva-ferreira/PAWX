@props(['status'])

@php
    use App\Enums\AppointmentStatus;

    $tagStyles = match($status) {
        AppointmentStatus::PENDING->value => 'text-yellow-700 bg-yellow-100 border-yellow-400',
        AppointmentStatus::CONFIRMED->value => 'text-blue-700 bg-blue-100 border-blue-400',
        AppointmentStatus::COMPLETED->value => 'text-green-700 bg-green-100 border-green-400',
        AppointmentStatus::CANCELLED->value => 'text-red-700 bg-red-100 border-red-400',
        AppointmentStatus::NO_SHOW->value => 'text-gray-700 bg-gray-100 border-gray-400',
        default => 'text-gray-700 bg-gray-200 border-gray-700',
    };
@endphp

<span class="px-3 py-1 text-xs font-medium rounded-lg uppercase border {{ $tagStyles }}">
    {{ $status }}
</span>

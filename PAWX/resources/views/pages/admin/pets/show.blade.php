{{--@extends('layouts.dashboard')--}}

{{--@section('sidebar')--}}
{{--    @include('partials.dashboard.sidebar')--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <h1 class="display-4 text-center">Pet Details: {{ $pet->name }}</h1>--}}
{{--        <div class="card">--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">{{ $pet->name }}</h5>--}}
{{--                <p class="card-text"><strong>Breed:</strong> {{ $pet->breed }}</p>--}}
{{--                <p class="card-text"><strong>Age:</strong> {{ $pet->age }}</p>--}}
{{--                <p class="card-text"><strong>Owner:</strong> {{ $pet->client->name }}</p>--}}
{{--                <p class="card-text"><strong>Added On:</strong> {{ $pet->created_at->format('F j, Y') }}</p>--}}
{{--                <p class="card-text"><strong>Description:</strong> {{ $pet->description ?? 'No description available.' }}</p>--}}
{{--                <a href="{{ route('admin.pets.index') }}" class="btn btn-primary">Back to Pets</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}


@extends('layouts.dashboard')

@section('sidebar')
    @include('partials.dashboard.sidebar')
@endsection

@section('content')
    <div class="container mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col md:flex-row gap-6">
            <!-- Carousel Section -->
            <div class="w-full md:w-1/2">
                <div class="relative">
                    @if ($pet->photos->isEmpty())
                        <p class="text-center text-gray-600">No photos available for {{ $pet->name }}.</p>
                    @else
                        <div id="carousel" class="relative w-full h-96 overflow-hidden rounded-lg">
                            @foreach ($pet->photos as $index => $photo)
                                <div class="carousel-item absolute inset-0 transition-transform duration-500 ease-in-out {{ $index === 0 ? 'block' : 'hidden' }}">
                                    <img src="{{ asset($photo->photo_url) }}" alt="{{ $pet->name }}"
                                         class="w-full h-full object-cover">
                                    @if ($photo->description)
                                        <div class="absolute bottom-0 bg-black bg-opacity-50 text-white w-full p-2 text-center">
                                            <p class="text-sm">{{ $photo->description }}</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <!-- Carousel Controls -->
                        <div class="flex justify-center gap-4 mt-4">
                            <button id="prevBtn" class="px-4 py-2 bg-gray-300 rounded-full hover:bg-gray-400">
                                Prev
                            </button>
                            <button id="nextBtn" class="px-4 py-2 bg-gray-300 rounded-full hover:bg-gray-400">
                                Next
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Information Section -->
            <div class="w-full md:w-1/2">
                <h1 class="text-4xl font-bold mb-4" style="color: #81C784">{{ $pet->name }}</h1>
                <p class="mb-2"><strong>Breed:</strong> {{ $pet->breed->name }}</p>
                <p class="mb-2"><strong>Fur Type:</strong> {{ $pet->breed->fur_type }}</p>
                <p class="mb-2"><strong>Size:</strong> {{ $pet->size->category }}</p>
                <p class="mb-2"><strong>Gender:</strong> {{ ucfirst($pet->gender) }}</p>
                <p class="mb-2"><strong>Age:</strong> {{ $pet->age ?? 'Unknown' }}</p>
                <p class="mb-2"><strong>Owner:</strong> {{ $pet->client->name }}</p>
                <p class="mb-2"><strong>Status:</strong> {{ ucfirst($pet->status) }}</p>
                <p class="mb-2"><strong>Spayed/Neutered:</strong> {{ $pet->spay_neuter_status ? 'Yes' : 'No' }}</p>

                <div class="mt-4">
                    <h2 class="text-2xl font-semibold mb-2">Medical History</h2>
                    <p class="bg-gray-100 p-3 rounded-md shadow">
                        {{ $pet->medical_history ?? 'No medical history available.' }}
                    </p>
                </div>

                <div class="mt-4">
                    <h2 class="text-2xl font-semibold mb-2">Observations</h2>
                    <p class="bg-gray-100 p-3 rounded-md shadow">
                        {{ $pet->obs ?? 'No additional observations.' }}
                    </p>
                </div>

                <div class="mt-6">
                    <a href="{{ route('admin.pets.index') }}"
                       class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow hover:bg-blue-600 transition duration-200">
                        Back to Pets
                    </a>
                </div>
            </div>
        </div>
    </div>

    <img src="http://127.0.0.1:8000/storage/photos/abc.jpg" alt="shtsseresrg">@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const carouselItems = document.querySelectorAll('.carousel-item');
        let currentIndex = 0;

        function showSlide(index) {
            carouselItems.forEach((item, i) => {
                item.classList.add('hidden');
                item.classList.remove('block');
                if (i === index) {
                    item.classList.add('block');
                    item.classList.remove('hidden');
                }
            });
        }

        document.getElementById('prevBtn').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + carouselItems.length) % carouselItems.length;
            showSlide(currentIndex);
        });

        document.getElementById('nextBtn').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % carouselItems.length;
            showSlide(currentIndex);
        });

        showSlide(currentIndex);
    });
</script>

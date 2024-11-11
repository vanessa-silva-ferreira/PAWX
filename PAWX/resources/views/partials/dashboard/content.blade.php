<div class="content">
    <h1 class="text-3xl">This is the main content.</h1>
</div>
<div>

    <div class="p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Dashboard Overview</h2>

        @if ($data && count($data) > 0)
            <x-dashboard.content.table :headers="$headers" :data="$data" />
        @else
            <p class="text-gray-500">No data available.</p>
        @endif
    </div>
</div>

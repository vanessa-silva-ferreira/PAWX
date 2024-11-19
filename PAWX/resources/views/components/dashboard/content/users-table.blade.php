<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
        <tr class="bg-gray-100 text-gray-600 uppercase text-xs leading-normal">
            <th class="py-3 px-6 text-left">#</th>
            @foreach ($headers as $header)
                <th class="py-3 px-6 text-left">{{ $header }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
        @foreach ($data as $index => $row)
            <tr class="{{ $loop->odd ? 'bg-gray-50' : 'bg-white' }} border-b hover:bg-gray-100">
                @foreach ($row as $value)
                    <td class="py-3 px-6">{{ $value }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

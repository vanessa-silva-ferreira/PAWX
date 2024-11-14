<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
                    <td class="py-3 px-6 flex space-x-2 items-center">
                        <a href="/{{ $type }}/show/{{ $row['id'] }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="/{{ $type }}/update/{{ $row['id'] }}" class="text-yellow-500 hover:text-yellow-700">
                            <i class="fas fa-user-edit"></i>
                        </a>
                        <a href="/{{ $type }}/delete/{{ $row['id'] }}" class="text-red-500 hover:text-red-700">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>

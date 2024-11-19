{{--@props([--}}
{{--    'headers' => [],--}}
{{--    'rows' => [],--}}
{{--    'striped' => false,--}}
{{--    'hover' => false,--}}
{{--])--}}

{{--<table class="w-full border-collapse border border-gray-300 dark:border-gray-700">--}}
{{--    <thead class="bg-gray-200 dark:bg-gray-700">--}}
{{--    <tr>--}}
{{--        @foreach ($headers as $header)--}}
{{--            <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-left">--}}
{{--                {{ $header }}--}}
{{--            </th>--}}
{{--        @endforeach--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    @foreach ($rows as $row)--}}
{{--        <tr class="{{ $striped && $loop->even ? 'bg-gray-100 dark:bg-gray-800' : '' }} {{ $hover ? 'hover:bg-gray-200 dark:hover:bg-gray-700' : '' }}">--}}
{{--            @foreach ($row as $cell)--}}
{{--                <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">--}}
{{--                    {{ $cell }}--}}
{{--                </td>--}}
{{--            @endforeach--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </tbody>--}}
{{--</table>--}}


@props([
    'headers' => [], // Array of headers
    'rows' => [], // Array or collection of rows
    'fields' => [], // Array of fields to display
    'actions' => [] // Array of actions (optional)
])

<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
        <tr class="bg-gray-100 text-gray-600 uppercase text-xs leading-normal">
            <th class="py-3 px-6 text-left">#</th>
            @foreach ($headers as $header)
                <th class="py-3 px-6 text-left">{{ $header }}</th>
            @endforeach
            @if ($actions)
                <th class="py-3 px-6 text-left">Actions</th>
            @endif
        </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
        @foreach ($rows as $index => $row)
            <tr class="{{ $loop->odd ? 'bg-gray-50' : 'bg-white' }} border-b hover:bg-gray-100">
                <td class="py-3 px-6">{{ $index + 1 }}</td>
                @foreach ($fields as $field)
                    <td class="py-3 px-6">{{ $row[$field] ?? 'N/A' }}</td>
                @endforeach
                @if ($actions)
                    <td class="py-3 px-6">
                        @foreach ($actions as $action)
                            <a href="{{ route($action['route'], $row['id']) }}"
                               class="{{ $action['class'] }}">{{ $action['label'] }}</a>
                        @endforeach
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    @if ($rows instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
        <div class="mt-4">
            {{ $rows->links() }}
        </div>
    @endif
</div>

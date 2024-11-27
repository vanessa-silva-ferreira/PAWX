<ul>
    @foreach ($notifications as $notification)
        <li>
            {{ $notification->data['message'] }} on {{ $notification->data['date'] }} at {{ $notification->data['time'] }}
            <a href="#" onclick="markAsRead('{{ $notification->id }}')">Mark as Read</a>
        </li>
    @endforeach
</ul>


    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">{{ $newCount }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">{{ $newCount }} Notifications</span>
            <div class="dropdown-divider"></div>

            @foreach($notifications as $notification)
            <a href="{{ $notification->data['url'] }}?notification_id={{$notification->id}}" class="dropdown-item @if ($notification->unread()) text-bold @endif">
                <i class="{{ $notifications->data['icon'] }} mr-2"></i> {{ $notifications->data['body'] }}
                <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
            </a>
            <div class="dropdown-divider"></div>
            @endforeach
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
    </li>


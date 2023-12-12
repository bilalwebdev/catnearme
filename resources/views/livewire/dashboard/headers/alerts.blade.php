<div>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle after-none" href="#" id="alertsDropdown" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="la la-bell"></i>
            <span class="badge badge-danger badge-counter">{{ $unreadCount  }}+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right animated--grow-in"
             aria-labelledby="alertsDropdown">
            <h6 class="generic-list-header">Alerts Center</h6>
            <div class="generic-list scrollable-content scrollbar-hidden">

                @foreach($notifications as $notification)

                    @if(!$notification?->conversation->last_message->is_seen)
                        <a class="generic-list-item d-flex align-items-center" href="{{ route('dashboard.chat' , ['conversation' => $notification->id]) }}">
                            <div class="user-thumb flex-shrink-0 position-relative">
                                <img src="{{ $notification->messageable->getFirstMediaUrl('avatar' , 'thumb') }}" alt="author-image">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="ml-2">
                                <p class="text-truncate text-color font-size-14 font-weight-medium">{{ $notification?->conversation->last_message->body ?? __('No message')}}</p>
                                <p class="small text-gray">{{ $notification?->conversation->last_message->sender->username }} - {{ $notification?->conversation->last_message->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div><!-- end generic-list -->
            <a class="dropdown-item text-center small text-gray font-weight-medium py-2" href="#">Show
                All Alerts</a>
        </div>
    </li>
</div>

<div>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle after-none" href="#" id="messagesDropdown" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="la la-envelope"></i>
            <span class="badge badge-warning badge-counter">{{ $unreadCount }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="messagesDropdown">
            <h6 class="generic-list-header">{{ __('Messages Center') }}</h6>
            <div class="generic-list scrollable-content scrollbar-hidden">
                @foreach($conversations as $conversation)
                    @if(!$conversation?->conversation->last_message->is_seen)
                        <a class="generic-list-item d-flex align-items-center" href="{{ route('dashboard.chat' , ['conversation' => $conversation->id]) }}">
                            <div class="user-thumb user-thumb-sm flex-shrink-0 position-relative">
                                <img src="{{ $conversation->conversation->last_message->sender->getFirstMediaUrl('avatar' , 'thumb') }}"
                                     alt="author-image">
                                <div class="status-indicator bg-success"></div>
                            </div>
                            <div class="ml-2">

                                <p class="text-truncate text-color font-size-14 font-weight-medium">{{ $conversation?->conversation->last_message->body ?? __('No message')}}</p>
                                <p class="small text-gray">{{ $conversation?->conversation->last_message->sender->username }} · {{ $conversation?->conversation->last_message->created_at->diffForHumans() }}</p>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div><!-- end generic-list -->
            <a class="dropdown-item text-center small text-gray font-weight-medium py-2" href="{{ route('dashboard.chat') }}">{{ __('Read More Messages') }}</a>
        </div>
    </li>
</div>

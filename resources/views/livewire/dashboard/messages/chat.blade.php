<div wire:poll.1000ms="messages">

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/home/css/emojionearea.css') }}">
    @endpush
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">Messages</h2>
            </div>
            {{ Breadcrumbs::render('chat') }}
        </div><!-- end breadcrumb-content -->
        <div class="row">
            <div class="col-lg-3">
                <div class="block-card dashboard-card mb-4 px-0 pb-0">
                    <div class="block-card-header px-4">
                        <h2 class="widget-title pb-0">{{ __('Chats') }}</h2>
                    </div>

                        @if($conversations->isEmpty())
                            <div class="block-card-body height-500 d-flex align-items-center flex-column ">
                                <div class="text-justify">
                                    <p class="p-5">{{ __('Dialogs are missing, they will appear when you create a dialog by writing a message') }}</p>
                                </div>
                                <div class="btn-box">
                                    <a href="{{ route('listings') }}" class="theme-btn gradient-btn border-0">Go listings<i class="la la-arrow-right ml-2"></i></a>
                                </div>
                            </div>
                        @else
                            <div class="block-card-body height-500">
                              <div class="online-user-box">

                                <div class="online-user-list">
                                    <div class="generic-list chat-list scrollable-content scrollbar-hidden">

                                        @foreach($conversations as $dialog)

                                            <a class="generic-list-item d-flex align-items-center" href="{{ route('dashboard.chat' , ['conversation' => $dialog->id]) }}">
                                                <div class="user-thumb flex-shrink-0 position-relative">
                                                    <img src="{{ $dialog->messageable->getFirstMediaUrl('avatar' , 'thumb') }}" alt="author-image">
                                                    <div class="status-indicator bg-success"></div>
                                                </div>
                                                <div class="ml-2">
                                                    <p class="text-truncate text-color font-size-14 font-weight-medium">{{ $dialog?->conversation->last_message->body ?? __('No message') }}</p>
                                                    <p class="small text-gray">{{ $dialog?->conversation->last_message->sender->username }} - {{ $dialog?->conversation->last_message->created_at->diffForHumans() }}</p>
                                                </div>
                                            </a>
                                        @endforeach

                                    </div><!-- end generic-list -->
                                </div><!-- end online-user-list -->
                            </div>
                            </div>
                        @endif

                </div><!-- end block-card -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-9">
                @if($conversation)
                    <div class="block-card dashboard-card mb-4 px-0 pb-3">
                        <div class="block-card-header">
                            <div
                                class="generic-list-item d-flex align-items-center py-0 border-bottom-0 bg-transparent">
                                <div class="user-thumb flex-shrink-0">
                                    <img src="{{ $participants->getFirstMediaUrl('avatar' , 'thumb') }}">
                                </div>
                                <div class="ml-2 flex-grow-1 position-relative">

                                    @if($participants->id == 1)
                                        <p class="font-size-14 font-weight-medium text-danger">{{ $participants->username }}</p>
                                        <p class="small">{{ __('Created Account') }}: <b>{{ $participants->created_at->isoFormat('LLL') }}</b></p>
                                    @else
                                        <p class="font-size-14 font-weight-medium">{{ $participants->username }}</p>
                                        <p class="small">{{ __('Created Account') }}: <b>{{ $participants->created_at->isoFormat('LLL') }}</b></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="block-card-body pt-2">
                            <div class="message-body scrollable-content scrollbar-hidden mb-4">
                                @foreach($messages as $message)

                                    <div class="message-item {{ $message->sender->id == auth()->id() ? 'me' : '' }}">
                                        <div
                                            class="generic-list-item d-flex align-items-center border-bottom-0 bg-transparent">
                                            <div class="user-thumb flex-shrink-0">
                                                <img src="{{ $message->participation->messageable->getFirstMediaUrl('avatar' , 'thumb') }}">
                                            </div>
                                            <div class="message-bubble ml-2 position-relative p-3 rounded">
                                                <p class="text-color font-size-14 font-weight-medium">
                                                    {!! nl2br($message->body ) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div><!-- end message-item -->
                                @endforeach
                            </div>

                            @if($participants->id !== 1)
                                <div class="message-reply-body d-flex align-items-center pt-3 px-4 border-top border-top-color">
                                    <div  wire:ignore class="w-100">
                                        <label class="mb-0 d-block flex-grow-1">
                                            <textarea class="emoji-picker" placeholder="Type Your Message..."></textarea>
                                        </label>
                                    </div>
                                    <div class="message-send icon-element ml-2" id="send" >
                                        <i class="la la-paper-plane"></i>
                                    </div>
                                </div>
                            @endif

                        </div><!-- end block-card-body -->
                    </div><!-- end block-card -->
                @else
                    <div class="block-card d-flex align-items-center flex-column min-h-full] justify-content-center">
                        <h3 class="mb-2">{{ __('Select dialog') }}</h3>
                        <p class="r"> {{ __('To start communicating with your interlocutor, you must select a dialog box') }}</p>
                    </div><!-- end block-card -->
                @endif
            </div><!-- end col-lg-9 -->
        </div><!-- end row -->
    </div><!-- end dashboard-inner-body-container -->

    @push('scripts')
            <script>

                window.addEventListener('load' , () => {

                    window.addEventListener('updateChat', () => {
                       // $(".message-body").animate({ scrollTop: 20000000 }, "slow");
                    })

                    var el = $(".emoji-picker").emojioneArea({
                        pickerPosition: "top"
                    })


                    $('#send').click(function (e) {
                        const text = el[0].emojioneArea.getText()

                        @this.call('send' , text)

                        el[0].emojioneArea.setText('')

                    })
                })
            </script>
    @endpush
</div><!-- end dashboard-inner-body -->

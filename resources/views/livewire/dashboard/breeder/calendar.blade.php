<div>
    <div class="container-fluid dashboard-inner-body-container">
        <div class="breadcrumb-content d-sm-flex align-items-center justify-content-between mb-4">
            <div class="section-heading">
                <h2 class="sec__title font-size-24 mb-0">{{ __('Calendar') }}</h2>
            </div>
            {{ Breadcrumbs::render('calendar') }}
        </div><!-- end breadcrumb-content -->
        <div class="row">
            <div class="col-md-3">
                <div class="block-card mb-4">
                    <div class="block-card-header">
                        <h2 class="widget-title">{{ __('Events') }}</h2>
                        <div class="stroke-shape"></div>
                    </div>
                    <div class="block-card-body">

                        <p class="mb-3">{!! __('To add a kitten birth event you can fill in the data and click on <b>Add event</b>, to delete you must click on the <b>desired event</b> and it will be automatically deleted.') !!}</p>
                        <hr>
                        <x-home.ui.input-box title="Title" wire:model.defer="event.title" />

                        <label class="label-text">Start date</label>
                        <input type="date" class="form-control mb-3 @error('event.start') is-invalid @enderror" placeholder="{{ __('Enter start date') }}" wire:model.defer="event.start" >

                        <label class="label-text">End date</label>
                        <input type="date" class="form-control mb-3 @error('event.end') is-invalid @enderror"  placeholder="{{ __('Enter end date') }}"  wire:model.defer="event.end">

                        <button class="btn bg-rgb-success font-weight-medium mr-2" wire:click="addEvent">
                            <i class="la la-send mr-1"></i> {{ __('Add Event') }}
                        </button>

                    </div><!-- end block-card-body -->
                </div>
            </div>
            <div class="col-md-9">

                <div class="block-card mb-4">
                    <div class="block-card-body" wire:ignore>
                        <div id='calendar'></div>
                    </div><!-- end block-card-body -->
                </div>

            </div>
        </div><!-- end row -->
    </div><!-- end dashboard-inner-body-container -->


    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

        <script>

            document.addEventListener('DOMContentLoaded', function () {

                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {

                    editable: true,
                    droppable : true,
                    aspectRatio: 3,
                    eventColor: '#378006',
                    displayEventTime: false,

                    events: {{ Js::from($events) }},

                    initialView: 'dayGridMonth',

                    eventDrop : function(info) {
                        console.log(inf)
                    },

                    eventClick : function(info) {
                        info.event.remove()

                        @this.call('drop' , info)
                    }
                });

              //  calendar.addEvent({ title: 'new event', start: '2023-17-08' });

                calendar.render();
            });

        </script>
    @endpush
</div>

<ul class="navbar-nav dashboard-sidebar">
    <li>
        <span id="sidebar-close">
            <i class="la la-times"></i>
       </span>
    </li>
    <li>
        <a class="sidebar-brand" href="{{ route('home') }}">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo" width="167">
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="la la-dashboard font-size-18 mr-1"></i>
            <span>{{ __('Dashboard') }}</span>
        </a>
    </li>


    <li class="sidebar-heading">{{ __('Saves') }}</li>

    <li class="nav-item {{ request()->routeIs('dashboard.vieweds') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.vieweds') }}">
            <i class="la la-eye font-size-18 mr-1"></i>
            <span>{{ __('Viewed') }}</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('dashboard.favorites') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.favorites') }}">
            <i class="la la-bookmark font-size-18 mr-1"></i>
            <span>{{ __('Favorites') }}</span>
        </a>
    </li>


    <li><hr class="sidebar-divider border-top-color"></li>
    <li class="sidebar-heading">{{ __('Messages') }}</li>
    <li class="nav-item {{ request()->routeIs('dashboard.chat') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.chat') }}">
            <i class="la la-comment font-size-18 mr-1"></i>
            <span>{{ __('Chat') }}</span>
        </a>
    </li>



    <li><hr class="sidebar-divider border-top-color"></li>
    <li class="sidebar-heading">{{ __('Account') }}</li>
    <li class="nav-item {{ request()->routeIs('dashboard.profile') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.profile') }}">
            <i class="la la-user font-size-18 mr-1"></i>
            <span>{{ __('My Profile') }}</span>
        </a>
    </li>

    @if(!$dashboard_adverts->isEmpty())
        <hr>
        <div class="p-2">
            @foreach($dashboard_adverts as $adv)
                <a href="{{ $adv->url }}">
                    <img src="{{ $adv->getFirstMediaUrl('photo' , 'thumb') }}" width="300">
                </a>
            @endforeach
        </div>
    @endif

</ul>

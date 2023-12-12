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

    <li><hr class="sidebar-divider border-top-color"></li>
    <li class="sidebar-heading">{{ __('Others') }}</li>
    <li class="nav-item {{ request()->routeIs('dashboard.calendar') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.calendar') }}">
            <i class="la la-calendar font-size-18 mr-1"></i>
            <span>{{ __('Calendar') }}</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('dashboard.faqs') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.faqs') }}">
            <i class="la la-question font-size-18 mr-1"></i>
            <span>{{ __('Faqs') }}</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('dashboard.reviews') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.reviews') }}">
            <i class="la la-star-o font-size-18 mr-1"></i>
            <span>{{ __('Reviews') }}</span>
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
    <li class="sidebar-heading">{{ __('Subscriptions') }}</li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard.switch.plan') }}">
            <i class="la la-credit-card font-size-18 mr-1"></i>
            <span>{{ __('Change Plan') }}</span>
        </a>
    </li>


    <li><hr class="sidebar-divider border-top-color"></li>
    <li class="sidebar-heading">{{ __('Listings') }}</li>
    <li class="nav-item {{ request()->routeIs('dashboard.listing') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.listing') }}">
            <i class="la la-file-text-o font-size-18 mr-1"></i>
            <span>{{ __('My listings') }}</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('dashboard.parents') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.parents') }}">
            <i class="la la-cat font-size-18 mr-1"></i>
            <span>{{ __('Parents') }}</span>
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
</ul>

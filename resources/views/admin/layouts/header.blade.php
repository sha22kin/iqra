@php
    $nxHour = (int) now()->format('G');
    $nxGreeting = $nxHour < 12 ? 'Good morning' : ($nxHour < 17 ? 'Good afternoon' : 'Good evening');
@endphp
<!-- BEGIN: Topbar -->
<header class="nx-topbar">
    <button type="button" class="nx-icon-btn" id="nxToggle" aria-label="Toggle sidebar">
        <i class="fa-solid fa-bars-staggered"></i>
    </button>

    <div class="nx-greeting">
        <small>{{$nxGreeting}},</small>
        <strong>{{Str::limit(Auth::user()->name, 24)}}</strong>
    </div>

    <div class="nx-top-right">
        <a href="{{route('index')}}" target="_blank" rel="noopener" class="nx-visit" title="Visit Website">
            <i class="fa-solid fa-arrow-up-right-from-square"></i><span>Visit Website</span>
        </a>

        <button type="button" class="nx-icon-btn nx-theme-btn" id="nxThemeToggle" title="Switch to dark mode" aria-label="Switch to dark mode">
            <i class="fa-solid fa-moon nx-theme-moon"></i>
            <i class="fa-solid fa-sun nx-theme-sun"></i>
        </button>

        <button type="button" class="nx-icon-btn nx-hide-sm" id="nxFullscreen" title="Fullscreen" aria-label="Toggle fullscreen">
            <i class="fa-solid fa-expand"></i>
        </button>

        <div class="nx-user" id="nxUser">
            <button type="button" class="nx-user-btn" aria-haspopup="true" aria-expanded="false">
                <span class="nx-avatar">
                    <img src="{{route('imageView2',['profile',Auth::user()->imageName(),'w'=>80,'h'=>80])}}" alt="{{Auth::user()->name}}">
                </span>
                <span class="nx-user-meta">
                    <strong>{{Str::limit(Auth::user()->name, 15)}}</strong>
                    <small>{{Auth::user()->permission ? Str::limit(Auth::user()->permission->name, 18) : 'Administrator'}}</small>
                </span>
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="nx-menu" role="menu">
                <div class="nx-menu-head">
                    <strong>{{Auth::user()->name}}</strong>
                    <small>{{Auth::user()->email}}</small>
                </div>
                <a href="{{route('customer.dashboard')}}"><i class="fa-solid fa-table-cells-large"></i> My Dashboard</a>
                <a href="{{route('admin.myProfile')}}"><i class="fa-solid fa-user"></i> My Profile</a>
                <a href="{{route('index')}}" target="_blank" rel="noopener"><i class="fa-solid fa-globe"></i> Visit Website</a>
                <hr>
                <a href="{{ route('logout') }}" class="nx-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-power-off"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</header>
<!-- END: Topbar -->

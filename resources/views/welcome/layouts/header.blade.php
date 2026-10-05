<header class="iq-header">
<div class="container">
<nav class="iq-navbar">
<div class="iq-nav-container">
<!-- Brand Logo -->
<a class="iq-brand-logo" href="{{route('index')}}">
<img alt="Logo" class="iq-logo-img" src="{{asset(general()->logo())}}"/>
</a>
<!-- Mobile Toggle Button -->
<button aria-label="Toggle navigation" class="iq-mobile-toggle" id="iqMobileToggle" type="button">
<i class="fa-solid fa-bars"></i>
</button>
<!-- Navigation Links & Actions -->
<div class="iq-nav-menu-wrapper" id="iqNavMenuWrapper">
<button aria-label="Close navigation" class="iq-mobile-close-btn" id="iqMobileCloseBtn" type="button"><i class="fa-solid fa-xmark"></i></button>
<ul class="iq-nav-menu">
    @if(menu('Header Menus'))
        @foreach(menu('Header Menus')->subMenus as $menu)
            @if($menu->subMenus->count() > 0)
            <li class="iq-nav-item iq-nav-dropdown">
                <a aria-expanded="false" class="iq-nav-link iq-dropdown-trigger" href="javascript:void(0);" role="button">
                    {{$menu->menuName()}} <i class="fa-solid fa-chevron-down iq-dropdown-caret"></i>
                </a>
                <ul class="iq-dropdown-list">
                    @foreach($menu->subMenus as $subMenu)
                    <li><a class="iq-dropdown-link" href="{{asset($subMenu->menuLink())}}">{{$subMenu->menuName()}}</a></li>
                    @endforeach
                </ul>
            </li>
            @else
            <li class="iq-nav-item">
                <a class="iq-nav-link" href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a>
            </li>
            @endif
        @endforeach
    @endif
</ul>
<div class="iq-header-actions">
<!-- Social Icons -->
<div class="iq-social-links">
    @if(general()->facebook_link)
    <a aria-label="Facebook" class="iq-social-link" href="{{general()->facebook_link}}"><i class="fa-brands fa-facebook"></i></a>
    @endif
    @if(general()->twitter_link)
    <a aria-label="Twitter" class="iq-social-link" href="{{general()->twitter_link}}"><i class="fa-brands fa-twitter"></i></a>
    @endif
    @if(general()->instagram_link)
    <a aria-label="Instagram" class="iq-social-link" href="{{general()->instagram_link}}"><i class="fa-brands fa-instagram"></i></a>
    @endif
    @if(general()->linkedin_link)
    <a aria-label="LinkedIn" class="iq-social-link" href="{{general()->linkedin_link}}"><i class="fa-brands fa-linkedin"></i></a>
    @endif
    @if(general()->youtube_link)
    <a aria-label="YouTube" class="iq-social-link" href="{{general()->youtube_link}}"><i class="fa-brands fa-youtube"></i></a>
    @endif
</div>
<!-- Booking CTA Button -->
<a class="iq-btn-booking" href="{{route('pageView','contact')}}">Booking</a>
</div>
</div>
</div>
</nav>
</div>
</header>
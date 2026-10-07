<footer class="iq-footer">
<div class="container">
<!-- Footer Top: Navigation & Social Icons -->
<div class="iq-footer-top">
<ul class="iq-footer-nav">
    @if(menu('Footer Two') && menu('Footer Two')->subMenus->count())
        @foreach(menu('Footer Two')->subMenus as $menu)
        <li><a class="iq-footer-nav-link" href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
        @endforeach
    @else
        <li><a class="iq-footer-nav-link" href="{{route('index')}}">Home</a></li>
        <li><a class="iq-footer-nav-link" href="{{url('about')}}">About</a></li>
        <li><a class="iq-footer-nav-link" href="{{url('services')}}">Service</a></li>
        <li><a class="iq-footer-nav-link" href="{{url('contact')}}">Contact</a></li>
    @endif
</ul>
<div class="iq-footer-socials">
    @php $siteGeneral = general(); @endphp
    @foreach([
        'facebook_link' => ['Facebook','fa-facebook-f'],
        'twitter_link' => ['Twitter','fa-x-twitter'],
        'instagram_link' => ['Instagram','fa-instagram'],
        'linkedin_link' => ['LinkedIn','fa-linkedin-in'],
        'youtube_link' => ['YouTube','fa-youtube'],
        'pinterest_link' => ['Pinterest','fa-pinterest-p'],
    ] as $field => [$label,$icon])
        @if($siteGeneral->$field)
        <a aria-label="{{$label}}" class="iq-footer-social-btn" href="{{$siteGeneral->$field}}" target="_blank" rel="noopener">
            <i class="fa-brands {{$icon}}"></i>
        </a>
        @endif
    @endforeach
</div>
</div>
<!-- Footer Bottom: Address & Contact Info -->
<div class="iq-footer-bottom">
<p class="iq-footer-address">
    {{ strip_tags(general()->address_one) ?: 'iqragroup Limited, 6th Floor, 206/A, Tejgaon I/A, Dhaka-1208, Bangladesh' }}
</p>
<div class="iq-footer-contact-links">
    @php
        $footerEmail = general()->email ?: 'bgd-info@iqragroup.com';
        $footerPhone = general()->mobile ?: '+880 2 222296728';
    @endphp
    <div><a class="iq-footer-meta-link" href="mailto:{{$footerEmail}}">{{$footerEmail}}</a></div>
    <div><a class="iq-footer-meta-link" href="tel:{{preg_replace('/[^0-9+]/', '', $footerPhone)}}">{{$footerPhone}}</a></div>
</div>
</div>
</div>
</footer>

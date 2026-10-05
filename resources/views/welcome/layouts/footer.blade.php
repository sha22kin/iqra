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
    <a aria-label="LinkedIn" class="iq-footer-social-btn" href="{{general()->linkedin_link ?: '#'}}" target="_blank" rel="noopener">
        <i class="fa-brands fa-linkedin-in"></i>
    </a>
    <a aria-label="Facebook" class="iq-footer-social-btn" href="{{general()->facebook_link ?: '#'}}" target="_blank" rel="noopener">
        <i class="fa-brands fa-facebook-f"></i>
    </a>
    <a aria-label="Instagram" class="iq-footer-social-btn" href="{{general()->instagram_link ?: '#'}}" target="_blank" rel="noopener">
        <i class="fa-brands fa-instagram"></i>
    </a>
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

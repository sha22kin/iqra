{{-- Brand panel shared by the login and sign-up pages --}}
<aside class="auth-aside">
    <a href="{{route('index')}}" class="auth-logo" aria-label="{{general()->title}} home">
        <img src="{{asset(general()->logo())}}" alt="{{general()->title}}">
    </a>

    <h2>{{$asideTitle ?? 'Welcome to IQRA'}}</h2>
    <p>{{$asideText ?? 'Your trusted partner for freight forwarding and logistics in Bangladesh.'}}</p>

    <ul class="auth-points">
        <li>
            <span class="ap-icon"><i class="fa-solid fa-truck-fast"></i></span>
            <div><strong>Faster enquiries</strong><span>Your details are saved, so requesting a quote or booking takes less time.</span></div>
        </li>
        <li>
            <span class="ap-icon"><i class="fa-solid fa-earth-asia"></i></span>
            <div><strong>Air, sea, road &amp; rail</strong><span>Stay updated on our freight, warehousing and supply chain services.</span></div>
        </li>
        <li>
            <span class="ap-icon"><i class="fa-solid fa-headset"></i></span>
            <div><strong>Dedicated support</strong><span>Reach our teams in Dhaka and Chattogram whenever you need help.</span></div>
        </li>
    </ul>

    <div class="auth-secure"><i class="fa-solid fa-shield-halved"></i> Your information is kept private and secure.</div>
</aside>

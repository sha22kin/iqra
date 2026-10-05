<?php

$appBlade = <<< 'BLADE'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    @yield('title')
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset(general()->favicon())}}" />
    @yield('SEO')
    
    <!-- Google Fonts: Poppins (Full Weights) -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet"/>
    <!-- Bootstrap 5.3 CSS -->
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Font Awesome 6 Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet"/>
    <!-- External Custom CSS -->
    <link href="{{asset('frontend_assets/css/style.css?v=2')}}" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet"/>
    @stack('css')
</head>
<body>

    @include(welcomeTheme().'layouts.header')

    <main>
        @yield('contents')
    </main>

    @include(welcomeTheme().'layouts.footer')

    <!-- Bootstrap 5.3 JavaScript Bundle -->
    <script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome 6 Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <!-- Mobile Menu & Dropdown Handlers -->
    <script>
        const mobileToggle = document.getElementById('iqMobileToggle');
        const mobileCloseBtn = document.getElementById('iqMobileCloseBtn');
        const navMenuWrapper = document.getElementById('iqNavMenuWrapper');
        const mobileBackdrop = document.getElementById('iqMobileBackdrop');
        
        function openMenu() {
            if(navMenuWrapper) navMenuWrapper.classList.add('iq-nav-open');
            if(mobileBackdrop) mobileBackdrop.classList.add('iq-backdrop-show');
            document.body.style.overflow = 'hidden';
        }
        
        function closeMenu() {
            if(navMenuWrapper) navMenuWrapper.classList.remove('iq-nav-open');
            if(mobileBackdrop) mobileBackdrop.classList.remove('iq-backdrop-show');
            document.body.style.overflow = '';
        }

        if (mobileToggle) mobileToggle.addEventListener('click', openMenu);
        if (mobileCloseBtn) mobileCloseBtn.addEventListener('click', closeMenu);
        if (mobileBackdrop) mobileBackdrop.addEventListener('click', closeMenu);

        const dropdownTriggers = document.querySelectorAll('.iq-dropdown-trigger');
        dropdownTriggers.forEach(trigger => {
          trigger.addEventListener('click', function(e) {
            if (window.matchMedia('(max-width: 991.98px)').matches) {
              e.preventDefault();
              e.stopPropagation();
              const parent = this.closest('.iq-nav-dropdown');
              if (parent) {
                parent.classList.toggle('iq-dropdown-open');
              }
            }
          });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>AOS.init({duration: 800, once: true, offset: 50});</script>
    <div class="iq-mobile-backdrop" id="iqMobileBackdrop"></div>
    @stack('js')
</body>
</html>
BLADE;

$headerBlade = <<< 'BLADE'
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
    @foreach(social() as $social)
    <a aria-label="{{$social->name}}" class="iq-social-link" href="{{$social->link}}">
        {!! $social->icon !!}
    </a>
    @endforeach
</div>
<!-- Booking CTA Button -->
<a class="iq-btn-booking" href="{{route('pageView','contact')}}">Booking</a>
</div>
</div>
</div>
</nav>
</div>
</header>
BLADE;

$footerBlade = <<< 'BLADE'
<footer class="iq-footer">
<div class="container">
<!-- Footer Top: Navigation & Social Icons -->
<div class="iq-footer-top">
<ul class="iq-footer-nav">
    @if(menu('Footer Menus'))
        @foreach(menu('Footer Menus')->subMenus as $menu)
        <li><a class="iq-footer-nav-link" href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></li>
        @endforeach
    @endif
</ul>
<div class="iq-footer-socials">
    @foreach(social() as $social)
    <a aria-label="{{$social->name}}" class="iq-footer-social-btn" href="{{$social->link}}">
        {!! $social->icon !!}
    </a>
    @endforeach
</div>
</div>
<!-- Footer Bottom: Address & Contact Info -->
<div class="iq-footer-bottom">
<p class="iq-footer-address">
    {!! general()->address !!}
</p>
<div class="iq-footer-contact-links">
<div><a class="iq-footer-meta-link" href="mailto:{{general()->email}}">{{general()->email}}</a></div>
<div><a class="iq-footer-meta-link" href="tel:{{general()->mobile}}">{{general()->mobile}}</a></div>
</div>
</div>
</div>
</footer>
BLADE;

$indexBlade = <<< 'BLADE'
@extends(welcomeTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle()}}</title>
@endsection 
@section('SEO')
<meta name="title" property="og:title" content="{{general()->meta_title}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
<meta name="url" property="og:url" content="{{route('index')}}" />
<link rel="canonical" href="{{route('index')}}">
@endsection 
@push('css')
<script type="application/ld+json">
    { 
    "@context": "https://schema.org", 
    "@type": "WebPage", 
    "url": "{{route('index')}}", 
    "name": "{{websiteTitle()}}",
    "author": {
        "@type": "Webpage",
        "name": "{{websiteTitle()}}"
    },
    "description": "{!!general()->meta_description!!}"
    }
</script>
@endpush 

@section('contents')
<!-- Hero Banner Section -->
<section class="iq-hero-section">
<div class="iq-hero-wrapper">
<img alt="Shipping port and cargo logistics" class="iq-hero-image" src="{{asset('frontend_assets/images/hero-port.jpg')}}"/>
<div class="iq-hero-overlay">
<div class="container">
<h1 class="iq-hero-title" data-aos="fade-down">Your Logistics Made Easy</h1>
</div>
</div>
</div>
</section>

<!-- Overview Section -->
<section class="iq-overview-section">
<div class="container">
<div class="row align-items-center">
<div class="col-12 col-lg-6">
<div class="iq-overview-heading-box">
<h2 class="iq-overview-heading" data-aos="fade-down">Leading Service provider in<br/>Bangladesh</h2>
</div>
</div>
<div class="col-12 col-lg-6">
<div class="iq-overview-content-box">
<p class="iq-overview-desc">
    iqragroup is the leading forwarder and logistics service provider in Bangladesh. With more than 30 years of service experience and more than 250 trusted partners worldwide, iqragroup is always a preferred choice among our partners.
</p>
</div>
</div>
</div>
</div>
</section>

<!-- Our Services Section -->
<section class="iq-services-section" id="services">
<div class="container">
<!-- Section Heading -->
<div class="iq-section-header" data-aos="fade-down">
<h2 class="iq-section-title" data-aos="fade-down">Our Services</h2>
</div>
<!-- Service Cards Grid -->
<div class="row g-4">
@foreach($latestServices as $index => $service)
<div class="col-12 col-md-4">
<div class="iq-service-card" data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">
<div class="iq-service-image-box">
<img alt="{{$service->name}}" class="iq-service-img" src="{{route('imageView2',['template'=>'service','image'=>$service->image])}}"/>
</div>
<div class="iq-service-body">
<h3 class="iq-service-title"><a href="{{route('serviceView',$service->slug)}}">{{$service->name}}</a></h3>
<p class="iq-service-text">
    {{ Str::limit(strip_tags($service->short_description), 150) }}
</p>
</div>
</div>
</div>
@endforeach
</div>
<!-- Section CTA Button -->
<div class="iq-services-action">
<a class="iq-btn-primary" href="{{route('pageView','services')}}">More Services</a>
</div>
</div>
</section>

<!-- Contact Section -->
<section class="iq-contact-section" id="contact">
<div class="container">
<div class="row">
<div class="col-12 col-lg-5">
<div class="iq-contact-info-panel" data-aos="fade-right">
<h2 class="iq-contact-main-heading" data-aos="fade-down">Contact</h2>
<p class="iq-contact-subtitle">Feel free to contact us with any questions.</p>
<div class="iq-contact-detail-group">
<div class="iq-contact-detail-label">Email</div>
<div class="iq-contact-detail-value">
<a class="iq-contact-detail-link" href="mailto:{{general()->email}}">{{general()->email}}</a>
</div>
</div>
<div class="iq-contact-detail-group">
<div class="iq-contact-detail-label">Phone</div>
<div class="iq-contact-detail-value">
<a class="iq-contact-detail-link" href="tel:{{general()->mobile}}">{{general()->mobile}}</a>
</div>
</div>
</div>
</div>
<div class="col-12 col-lg-7">
<div class="iq-contact-form-panel" data-aos="fade-left">
<form action="{{route('contactMail')}}" method="POST">
@csrf
<div class="iq-form-group">
<div class="iq-form-heading-label">Name</div>
<div class="row g-3">
<div class="col-12 col-sm-6">
<label class="iq-form-sublabel" for="iqFirstName">First Name <span class="iq-form-label-req">(required)</span></label>
<input class="iq-form-control" id="iqFirstName" name="first_name" required="" type="text"/>
</div>
<div class="col-12 col-sm-6">
<label class="iq-form-sublabel" for="iqLastName">Last Name <span class="iq-form-label-req">(required)</span></label>
<input class="iq-form-control" id="iqLastName" name="last_name" required="" type="text"/>
</div>
</div>
<input type="hidden" name="name" value="Sender" id="realName">
<input type="hidden" name="subject" value="Contact Request from Home Page">
</div>
<div class="iq-form-group">
<label class="iq-form-sublabel" for="iqEmail">Email <span class="iq-form-label-req">(required)</span></label>
<input class="iq-form-control" id="iqEmail" name="email" required="" type="email"/>
</div>
<div class="iq-form-group">
<label class="iq-form-sublabel" for="iqMessage">Message <span class="iq-form-label-req">(required)</span></label>
<textarea class="iq-form-control iq-form-textarea" id="iqMessage" name="message" required=""></textarea>
</div>
<button class="iq-btn-submit" type="submit" onclick="document.getElementById('realName').value = document.getElementById('iqFirstName').value + ' ' + document.getElementById('iqLastName').value;">Submit</button>
</form>
</div>
</div>
</div>
</div>
</section>
@endsection
BLADE;

file_put_contents('e:/iqragrup/resources/views/welcome/layouts/app.blade.php', $appBlade);
file_put_contents('e:/iqragrup/resources/views/welcome/layouts/header.blade.php', $headerBlade);
file_put_contents('e:/iqragrup/resources/views/welcome/layouts/footer.blade.php', $footerBlade);
file_put_contents('e:/iqragrup/resources/views/welcome/index.blade.php', $indexBlade);

echo "Setup completed successfully.";

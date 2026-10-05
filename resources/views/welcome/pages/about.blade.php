@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{websiteTitle(isset($page) ? $page->name : '')}}</title>
@endsection

@section('SEO')
<meta name="title" property="og:title" content="{{isset($page) ? $page->seo_title : general()->meta_title}}" />
<meta name="description" property="og:description" content="{!!isset($page) ? $page->seo_desc : general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{isset($page) ? $page->seo_keyword : general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
<meta name="url" property="og:url" content="{{url()->current()}}" />
<link rel="canonical" href="{{url()->current()}}">
@endsection

@section('contents')

<main>
<!-- ====================================================================
         Hero Banner Section
         ==================================================================== -->
<section class="iq-hero-section">
<div class="iq-about-hero-wrapper">
<img alt="iqragroup corporate headquarters skyscraper" class="iq-about-hero-img" src="{{asset('frontend_assets/images/')}}/about-hero-building.jpg"/>
<div class="iq-about-hero-overlay">
<div class="container">
<h1 class="iq-about-hero-title" data-aos="fade-down">{{ $page->short_description ?? 'About Us' }}</h1>
</div>
</div>
</div>
</section>
<!-- ====================================================================
         Section 2: About us (Tinted Background)
         ==================================================================== -->
<section class="iq-about-section iq-section-tint" id="about-us">
<div class="container">
<div class="row align-items-center">
<div class="col-12 col-lg-6">
<div class="iq-about-img-panel" data-aos="fade-right">
<div class="iq-about-image-card">
<img alt="iqragroup logistics operation team at work" class="iq-about-card-img" src="{{asset('frontend_assets/images/')}}/about-office-work.jpg"/>
</div>
</div>
</div>
<div class="col-12 col-lg-6">
<div class="iq-about-text-panel iq-about-text-panel-alt" data-aos="fade-left">
<h2 class="iq-about-heading" data-aos="fade-down">About us</h2>
{!! $page->description !!}
</div>
</div>
</div>
</div>
</section>
<!-- ====================================================================
         Section 6: Subscribe to Our Newsletter Section
         ==================================================================== -->
<section class="iq-newsletter-section">
<div class="iq-newsletter-wrapper">
<img alt="Corporate workplace desk and laptop" class="iq-newsletter-bg-img" src="{{asset('frontend_assets/images/')}}/about-newsletter-bg.jpg"/>
<div class="iq-newsletter-overlay">
<div class="container">
<div class="row">
<div class="col-12 col-lg-7">
<div class="iq-newsletter-content" data-aos="zoom-in">
<h2 class="iq-newsletter-title" data-aos="fade-down">Subscribe to Our Newsletter</h2>
<p class="iq-newsletter-subtitle">Sign up with your email address to receive news and updates</p>
<form action="#" class="iq-newsletter-form" method="POST">
<div class="iq-newsletter-form-box">
<input class="iq-newsletter-input" placeholder="Email Address" required="" type="email"/>
<button class="iq-newsletter-btn" type="submit">Sign Up</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- ======================================================================
       Footer Section
       ====================================================================== -->

@endsection
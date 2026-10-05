<?php

$file = 'e:\iqragrup\resources\views\welcome\services\latestServices.blade.php';
$content = <<<'EOF'
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
<section class="iq-services-section">
<div class="container">
<h1 class="iq-services-main-title" data-aos="fade-down">{{ $page->short_description ?? 'Our Services' }}</h1>
<p class="text-center text-muted mb-5 mx-auto" style="max-width: 820px; font-size: 1.05rem; line-height: 1.8;">
{!! $page->description ?? '' !!}
</p>
<div class="row g-4">
@foreach($services as $index => $service)
<div class="col-12 col-md-6 col-lg-4">
<article class="iq-service-card" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 150 }}">
<div class="iq-service-img-wrap">
<img alt="{{$service->name}}" class="iq-service-img" src="{{asset($service->image())}}"/>
</div>
<div class="iq-service-card-body">
<h2 class="iq-service-card-title" data-aos="fade-down"><a href="{{route('serviceView', $service->slug)}}" class="text-decoration-none text-dark">{{$service->name}}</a></h2>
<p class="iq-service-card-desc">{{ Str::limit(strip_tags($service->short_description), 150) }}</p>
</div>
</article>
</div>
@endforeach
</div>
<div class="mt-4">
    {{ $services->links('pagination::bootstrap-5') }}
</div>
</div>
</section>

@foreach($services as $index => $service)
@php
    $isTint = $index % 2 == 1;
@endphp
<section class="iq-about-section {{ $isTint ? 'iq-section-tint' : 'iq-section-white' }}">
<div class="container">
<div class="row align-items-center">
@if($isTint)
<div class="col-12 col-lg-6 order-2 order-lg-1">
<div class="iq-about-text-panel iq-about-text-panel-alt" data-aos="fade-right">
<h2 class="iq-about-heading" data-aos="fade-down">{{$service->name}}</h2>
<div class="iq-about-text">
{!! $service->description !!}
</div>
</div>
</div>
<div class="col-12 col-lg-6 order-1 order-lg-2">
<div class="iq-about-img-panel" data-aos="fade-left">
<div class="iq-about-image-card">
<img alt="{{$service->name}}" class="iq-about-card-img" src="{{asset($service->image())}}"/>
</div>
</div>
</div>
@else
<div class="col-12 col-lg-6">
<div class="iq-about-img-panel" data-aos="fade-right">
<div class="iq-about-image-card">
<img alt="{{$service->name}}" class="iq-about-card-img" src="{{asset($service->image())}}"/>
</div>
</div>
</div>
<div class="col-12 col-lg-6">
<div class="iq-about-text-panel iq-about-text-panel-alt" data-aos="fade-left">
<h2 class="iq-about-heading" data-aos="fade-down">{{$service->name}}</h2>
<div class="iq-about-text">
{!! $service->description !!}
</div>
</div>
</div>
@endif
</div>
</div>
</section>
@endforeach

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
<form action="{{route('subscribe')}}" class="iq-newsletter-form" method="POST">
@csrf
<div class="iq-newsletter-form-box">
<input class="iq-newsletter-input" name="email" placeholder="Email Address" required="" type="email"/>
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
@endsection
EOF;

file_put_contents($file, $content);
echo "latestServices.blade.php updated.\n";
